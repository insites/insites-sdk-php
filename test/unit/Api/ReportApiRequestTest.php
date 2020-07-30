<?php

namespace Silktide\ProspectClient\UnitTest\Api;

use Silktide\ProspectClient\Api\ReportApi;
use Silktide\ProspectClient\ApiRequest\CreateReportApiRequest;
use Silktide\ProspectClient\ApiRequest\FetchReportApiRequest;
use Silktide\ProspectClient\ApiRequest\ReanalyzeReportApiRequest;
use Silktide\ProspectClient\ApiRequest\SearchReportApiRequest;
use Silktide\ProspectClient\Entity\Report;
use Silktide\ProspectClient\Http\HttpWrapper;
use Silktide\ProspectClient\UnitTest\ApiRequest\HttpRequestTestCase;

class ReportApiRequestTest extends HttpRequestTestCase
{
    public function testFetch()
    {
        $testId = uniqid("id-");

        $httpWrapper = self::createMock(HttpWrapper::class);

        $sut = new ReportApi($httpWrapper);
        self::assertInstanceOf(FetchReportApiRequest::class, $sut->fetch());
    }

    public function testCreate()
    {
        $sut = new ReportApi(self::createMock(HttpWrapper::class));
        self::assertInstanceOf(CreateReportApiRequest::class, $sut->create());
    }

    public function testReanalyze()
    {
        $sut = new ReportApi(self::createMock(HttpWrapper::class));
        self::assertInstanceOf(ReanalyzeReportApiRequest::class, $sut->reanalyze());
    }

    public function testSearch()
    {
        $sut = new ReportApi(self::createMock(HttpWrapper::class));
        self::assertInstanceOf(SearchReportApiRequest::class, $sut->search());
    }
}