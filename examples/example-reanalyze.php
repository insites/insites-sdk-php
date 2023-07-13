<?php

require __DIR__ . "/../vendor/autoload.php";

use Symfony\Component\Dotenv\Dotenv;
use Insites\ApiClient\Client;

$envFile = __DIR__ . "/../.env";
if (file_exists($envFile)) {
    (new Dotenv())->load($envFile);
}
$apiKey = $_ENV["INSITES_API_KEY"] ?? null;

if (!is_string($apiKey)) {
    throw new \Exception("An API key should be specified in the ./env file to run the examples");
}

$reportId = "e69ef2c48be24356a27ff77f5d6bf5ce1678e239";

$insitesClient = Client::createFromApiKey($apiKey);
$reportApi = $insitesClient->getReportApi();

$response = $reportApi->reanalyze($reportId)
    ->execute();

echo "ReportStatus: " . $response->getReportStatus() . "\n";
