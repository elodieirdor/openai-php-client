<?php

namespace OpenAI\Testing\Resources;

use OpenAI\Contracts\Resources\ThreadsMessagesContract;
use OpenAI\Resources\ThreadsMessages;
use OpenAI\Responses\Threads\Messages\ThreadMessageDeleteResponse;
use OpenAI\Responses\Threads\Messages\ThreadMessageListResponse;
use OpenAI\Responses\Threads\Messages\ThreadMessageResponse;
use OpenAI\Testing\Resources\Concerns\Testable;

final class ThreadsMessagesTestResource implements ThreadsMessagesContract
{
    use Testable;

    public function resource(): string
    {
        return ThreadsMessages::class;
    }

    public function create(string $threadId, array $parameters): ThreadMessageResponse
    {
        return $this->record(__FUNCTION__, $threadId, $parameters);
    }

    public function retrieve(string $threadId, string $messageId): ThreadMessageResponse
    {
        return $this->record(__FUNCTION__, $threadId, $messageId);
    }

    public function modify(string $threadId, string $messageId, array $parameters): ThreadMessageResponse
    {
        return $this->record(__FUNCTION__, $threadId, $messageId, $parameters);
    }

    public function delete(string $threadId, string $messageId): ThreadMessageDeleteResponse
    {
        return $this->record(__FUNCTION__, $threadId, $messageId);
    }

    public function list(string $threadId, array $parameters = []): ThreadMessageListResponse
    {
        return $this->record(__FUNCTION__, $threadId, $parameters);
    }

    public function files(): ThreadsMessagesFilesTestResource
    {
        return $this->record(__FUNCTION__);
    }
}
