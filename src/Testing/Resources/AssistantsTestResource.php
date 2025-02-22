<?php

namespace OpenAI\Testing\Resources;

use OpenAI\Contracts\Resources\AssistantsContract;
use OpenAI\Contracts\Resources\AssistantsFilesContract;
use OpenAI\Resources\Assistants;
use OpenAI\Responses\Assistants\AssistantDeleteResponse;
use OpenAI\Responses\Assistants\AssistantListResponse;
use OpenAI\Responses\Assistants\AssistantResponse;
use OpenAI\Testing\Resources\Concerns\Testable;

final class AssistantsTestResource implements AssistantsContract
{
    use Testable;

    public function resource(): string
    {
        return Assistants::class;
    }

    public function create(array $parameters): AssistantResponse
    {
        return $this->record(__FUNCTION__, $parameters);
    }

    public function retrieve(string $id): AssistantResponse
    {
        return $this->record(__FUNCTION__, $id);
    }

    public function modify(string $id, array $parameters): AssistantResponse
    {
        return $this->record(__FUNCTION__, $id, $parameters);
    }

    public function delete(string $id): AssistantDeleteResponse
    {
        return $this->record(__FUNCTION__, $id);
    }

    public function list(array $parameters = []): AssistantListResponse
    {
        return $this->record(__FUNCTION__, $parameters);
    }

    public function files(): AssistantsFilesContract
    {
        return new AssistantsFilesTestResource($this->fake);
    }
}
