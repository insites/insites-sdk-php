<?php

namespace Insites\SDK\Api;

use Insites\SDK\Request\CreateReportRequest;
use Insites\SDK\Request\FetchReportRequest;
use Insites\SDK\Request\ReanalyzeReportRequest;
use Insites\SDK\Request\ReportSettingsRequest;
use Insites\SDK\Request\ReportSpellingsRequest;
use Insites\SDK\Request\SearchReportRequest;
use Insites\SDK\Http\HttpWrapper;

class ReportApi
{
    protected HttpWrapper $httpWrapper;

    public function __construct(HttpWrapper $httpWrapper)
    {
        $this->httpWrapper = $httpWrapper;
    }

    public function create(): CreateReportRequest
    {
        return new CreateReportRequest($this->httpWrapper);
    }

    public function fetch(string $reportId): FetchReportRequest
    {
        return new FetchReportRequest($this->httpWrapper, $reportId);
    }

    public function reanalyze(string $reportId): ReanalyzeReportRequest
    {
        return new ReanalyzeReportRequest($this->httpWrapper, $reportId);
    }

    public function search(): SearchReportRequest
    {
        return new SearchReportRequest($this->httpWrapper);
    }

    public function settings(string $reportId): ReportSettingsRequest
    {
        return new ReportSettingsRequest($this->httpWrapper, $reportId);
    }

    public function spellings(string $reportId): ReportSpellingsRequest
    {
        return new ReportSpellingsRequest($this->httpWrapper, $reportId);
    }
}
