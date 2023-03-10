<?php

declare(strict_types=1);

namespace App\Http\Integrations\FakeIntegration\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetCommentRequest extends Request
{
    public function __construct(
        readonly protected int $postId,
    ) {
    }

    /**
     * Define the HTTP method
     */
    protected Method $method = Method::GET;

    /**
     * Define the endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/comments?postId='.$this->postId;
    }
}
