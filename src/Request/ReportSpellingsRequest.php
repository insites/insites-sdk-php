<?php

namespace Insites\SDK\Request;

use Insites\SDK\Exception\Api\ReportNotFoundException;
use Insites\SDK\Http\HttpWrapper;
use Insites\SDK\Response\ReportSpellingsResponse;

class ReportSpellingsRequest extends AbstractRequest
{
    protected string $path = 'spelling-dictionary';
    protected string $reportId;

    public function __construct(HttpWrapper $httpWrapper, string $reportId)
    {
        parent::__construct($httpWrapper);
        $this->reportId = $reportId;
    }

    public function addWord(string $word, string $language = 'en_GB', bool $caseSensitive = false): self
    {
        $this->method = 'POST';

        $this->body['reportId'] = $this->reportId;
        $this->body['level'] = 'report';
        $this->body['word'] = $word;
        $this->body['language'] = $language;
        $this->body['caseSensitive'] = $caseSensitive;

        return $this;
    }

    public function deleteWord(int $id): self
    {
        $this->method = 'DELETE';

        $this->body['id'] = $id;
        $this->body['level'] = 'report';

        return $this;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function execute(): ReportSpellingsResponse
    {
        $httpResponse = $this->httpWrapper->execute($this);
        $response = $httpResponse->getResponse();

        if ($httpResponse->getStatusCode() === 404) {
            throw new ReportNotFoundException($response['error_message'] ?? 'Report not found');
        }

        return new ReportSpellingsResponse($httpResponse->getResponse());
    }
}