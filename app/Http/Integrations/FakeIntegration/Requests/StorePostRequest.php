<?php

namespace App\Http\Integrations\FakeIntegration\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class StorePostRequest extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * Define the HTTP method
     */
    protected Method $method = Method::POST;

    /**
     * Define the endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/posts';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-type' => 'application/json; charset=UTF-8',
        ];
    }
}
