<?php

namespace Tests\Feature;

use App\Http\Integrations\FakeIntegration\FakeConnector;
use App\Http\Integrations\FakeIntegration\Requests\GetCommentRequest;
use Saloon\Http\Faking\MockResponse;
use Saloon\Laravel\Facades\Saloon;

it('registers response', function () {
    Saloon::fake([
        MockResponse::fixture('comments.index'),
    ]);

    $connector = new FakeConnector();
    $connector->send(new GetCommentRequest(postId: 1));
});

it('returns valid json', function () {
    Saloon::fake([
        MockResponse::make(['title' => 'Sam'], 200),
    ]);

    $connector = new FakeConnector();
    $response = $connector->send(new GetCommentRequest(postId: 1));

    expect($response->body())
        ->json()
        ->toHaveCount(1)
        ->title->toBe('Sam');
})->only();
