<?php

namespace App\Console\Commands;

use App\Http\Integrations\DiamondSeven\DiamondSevenConnector;
use App\Http\Integrations\DiamondSeven\Requests\GetWebstockRequest;
use App\Service\WebstockSyncService;
use App\Services\SyncService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Throwable;

#[Signature('diamond-seven:fetch-webstock {--fresh : Delete cached file and re-fetch from API}')]
#[Description('Fetch and cache webstock data from the DiamondSeven API')]
class FetchDiamondSevenWebstock extends Command
{
    public function handle(): int
    {
        $this->info('Fetching DiamondSeven webstock...');

        try {
            $connector = new DiamondSevenConnector;
            $response = $connector->send(new GetWebstockRequest);

            $this->line('Status: ' . $response->status());

            // Delete cached file if exists (after successful response)
            if (Storage::disk('local')->exists('diamond_seven/webstock.json')) {
                Storage::disk('local')->delete('diamond_seven/webstock.json');
                $this->line('Deleted existing cached file.');
            }

            // Get raw content from response
            $content = $response->body();

            // Clean content (remove BOM and control characters)
            $syncService = new SyncService();
            $cleanedData = $syncService->cleanContent($content);
            $content = $cleanedData['content'];

            if ($cleanedData['bom_stripped']) {
                $this->line('Stripped UTF-8 BOM.');
            }

            $this->line('Stripped control characters.');
            // Store cleaned content
            Storage::disk('local')->put('diamond_seven/webstock.json', $content);

            $this->info('Saved cleaned response to storage/app/private/diamond_seven/webstock.json');

            $this->line('File size: ' . strlen($content) . ' bytes');

            $data = json_decode($content, true, 512, JSON_INVALID_UTF8_IGNORE);

            $total = count($data);
            $inStock = count(array_filter($data, fn($item) => ($item['Qty'] ?? 0) > 0));
            $outOfStock = count(array_filter($data, fn($item) => ($item['Qty'] ?? 0) <= 0));

            $stats = [
                'total' => $total,
                'in_stock' => $inStock,
                'out_of_stock' => $outOfStock,
                'cached_at' => now()->toDateTimeString(),
            ];

            // Store in cache permanently (will be replaced on next job run)
            Cache::forever('diamond_seven.webstock_stats', $stats);

            // Also store in file
            Storage::disk('local')->put('diamond_seven/webstock_stats.json', json_encode($stats));

            $this->info("Cached stats: {$total} total, {$inStock} in stock, {$outOfStock} out of stock.");

            return self::SUCCESS;
        } catch (Throwable $e) {
            $this->error('Failed: ' . $e->getMessage());

            return self::FAILURE;
        }
    }
}
