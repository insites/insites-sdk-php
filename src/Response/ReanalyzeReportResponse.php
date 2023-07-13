<?php

namespace Insites\ApiClient\Response;

class ReanalyzeReportResponse extends AbstractResponse
{
    public function getReportStatus() : string
    {
        return $this->response['report_status'];
    }

    public function getReportId() : string
    {
        return $this->response['report_id'];
    }
}
