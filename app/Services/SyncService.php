<?php

namespace App\Services;

class SyncService
{

    /**
     * Clean JSON content by removing UTF-8 BOM and control characters
     */
    public function cleanContent(string $content): array
    {
        $bomStripped = false;

        // Strip UTF-8 BOM if present
        if (str_starts_with($content, "\xEF\xBB\xBF")) {
            $content = substr($content, 3);
            $bomStripped = true;
        }

        // Strip ALL ASCII control characters (including raw newlines/CR that break JSON strings)
        $content = preg_replace('/[\x00-\x1F\x7F]/', '', $content);

        return [
            'content' => $content,
            'bom_stripped' => $bomStripped,
        ];
    }
}
