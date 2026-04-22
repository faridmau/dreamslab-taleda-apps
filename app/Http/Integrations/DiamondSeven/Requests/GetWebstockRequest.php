<?php

namespace App\Http\Integrations\DiamondSeven\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetWebstockRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/export/webstock';
    }

    protected function defaultQuery(): array
    {
        return [
            'version' => '1.0',
        ];
    }
}
