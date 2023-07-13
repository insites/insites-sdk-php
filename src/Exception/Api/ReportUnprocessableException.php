<?php

namespace Insites\SDK\Exception\Api;

use Insites\SDK\Exception\ClientException;

class ReportUnprocessableException extends ClientException
{
    private ?string $issue = null;
    private ?string $url = null;
    private bool $isUrlRecommended = false;

    public function setIssue(?string $issue): void
    {
        $this->issue = $issue;
    }

    public function getIssue(): ?string
    {
        return $this->issue;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrlRecommended(bool $recommended): void
    {
        $this->isUrlRecommended = $recommended;
    }

    public function isUrlRecommended(): bool
    {
        return $this->isUrlRecommended;
    }
}
