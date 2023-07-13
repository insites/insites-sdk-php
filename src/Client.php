<?php

namespace Insites\SDK;

use Insites\SDK\Api\ReportApi;
use Insites\SDK\Http\HttpWrapper;

class Client
{
    private HttpWrapper $httpWrapper;

    private function __construct(HttpWrapper $httpWrapper)
    {
        $this->httpWrapper = $httpWrapper;
    }

    public static function createFromApiKey(string $apiKey, ?string $locale = null, ?string $host = null): Client
    {
        return new Client(new HttpWrapper($apiKey, $locale, null, $host));
    }

    public static function createFromHttpWrapper(HttpWrapper $httpWrapper): Client
    {
        return new Client($httpWrapper);
    }

    public function getReportApi(): ReportApi
    {
        return new ReportApi($this->httpWrapper);
    }
}
