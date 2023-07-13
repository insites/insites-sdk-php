<?php

namespace Insites\ApiClient\Response;

use Insites\ApiClient\Entity\Report;

class SearchReportResponse extends AbstractResponse
{
    /**
     * @return Report[]
     */
    public function getReports() : array
    {
        $reports = [];
        foreach ($this->response['reports'] as $report) {
            $reports[] = Report::create($report);
        }

        return $reports;
    }
}
