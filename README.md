Insites PHP API Client
=======================================================

Example usage
-------------

### Making Client

```php
// The actual API key needs to be created at https://app.insites.com/en_GB/admin/settings#/api
$apiKey = "0123456789abcdef";
$insitesClient = \Insites\SDK\Client::createFromApiKey($apiKey);
$reportApi = $insitesClient->getReportApi();
```

For more in detail examples, see the `examples` folder

### Create a new report,
```php
$response = $reportApi->create()
    ->setUrl("https://example.insites.com")
    ->setAddress("Insites Technologies Ltd", "17", "Brunel Parkway", "Pride Park", "Derby", "DE24 8HR")
    ->setName("Insites")
    ->setPhone("01322 460460")
    ->execute();

echo "ReportId: " . $response->getReportId() . "\n";
```
  