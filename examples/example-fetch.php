<?php

require __DIR__ . "/../vendor/autoload.php";

use Symfony\Component\Dotenv\Dotenv;
use Insites\SDK\Client;

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

$response = $reportApi->fetch($reportId)
    ->execute();


$report = $response->getReport();
echo "Overall score: " . $report->getOverallScore() . PHP_EOL;

$amountOfContentSection = $report->getReportSection("amount_of_content");
echo "Total word count: " . $amountOfContentSection["total_word_count"] . PHP_EOL;
