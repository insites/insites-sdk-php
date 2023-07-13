<?php
require __DIR__ . "/../vendor/autoload.php";

use Symfony\Component\Dotenv\Dotenv;
use Insites\ApiClient\Client;
use Insites\ApiClient\Request\SearchReportRequest;

$envFile = __DIR__ . "/../.env";
if (file_exists($envFile)) {
    (new Dotenv())->load($envFile);
}
$apiKey = $_ENV["INSITES_API_KEY"] ?? null;

if (!is_string($apiKey)) {
    throw new \Exception("An API key should be specified in the ./env file to run the examples");
}

$insitesClient = Client::createFromApiKey($apiKey);
$reportApi = $insitesClient->getReportApi();

$searchResponse = $reportApi->search()
    ->addFilter(
        SearchReportRequest::FILTER_PROPERTY_DOMAIN,
        SearchReportRequest::FILTER_OPERATOR_EQUAL,
        "www.bbc.co.uk"
    )
    ->execute();

$reports = $searchResponse->getReports();
echo "Found: " . count($reports) . " reports \n";

foreach ($reports as $report) {
    echo "ReportId: " . $report->getReportId() . "; Score: " . $report->getOverallScore() . "\n";
}