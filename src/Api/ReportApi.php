<?php

namespace Insites\ApiClient\Api;

use Insites\ApiClient\Request\CreateReportRequest;
use Insites\ApiClient\Request\FetchReportRequest;
use Insites\ApiClient\Request\ReanalyzeReportRequest;
use Insites\ApiClient\Request\ReportSettingsRequest;
use Insites\ApiClient\Request\ReportSpellingsRequest;
use Insites\ApiClient\Request\SearchReportRequest;
use Insites\ApiClient\Http\HttpWrapper;

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
