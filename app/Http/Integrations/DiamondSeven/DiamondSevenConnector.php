<?php

namespace App\Http\Integrations\DiamondSeven;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Saloon\Traits\Plugins\HasTimeout;

class DiamondSevenConnector extends Connector
{
    use AcceptsJson;
    use AlwaysThrowOnErrors;
    use HasTimeout;

    protected int $connectTimeout = 30;

    protected int $requestTimeout = 600;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return config('services.diamond_seven.base_url');
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'PartnerKey' => config('services.diamond_seven.PartnerKey'),
        ];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        $config = [];

        // Use proxy in development if configured
        if (config('services.diamond_seven.use_proxy') && config('services.diamond_seven.proxy')) {
            $config['proxy'] = config('services.diamond_seven.proxy');
        }

        // Disable SSL verification in local development only
        if (config('services.diamond_seven.verify_ssl', true) === false) {
            $config['verify'] = false;
        }

        $config['timeout'] = $this->requestTimeout;
        $config['connect_timeout'] = $this->connectTimeout;

        return $config;
    }
}
