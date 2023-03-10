<?php

declare(strict_types=1);

use App\Http\Integrations\FakeIntegration\FakeConnector;
use App\Http\Integrations\FakeIntegration\Requests\GetCommentRequest;
use App\Http\Integrations\FakeIntegration\Requests\StorePostRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn () => view('welcome'));

Route::get('/saloon-post', function () {
    $connector = new FakeConnector();

    $request = new StorePostRequest();
    $request
        ->body()
        ->merge([
            'title' => 'some title',
            'content' => 'some content',
            'userId' => 15,
        ]);
    $response = $connector->send($request);

    dd($response->body(), $response->json());
});

Route::get('/saloon-get', function () {
    $connector = new FakeConnector();

    $request = new GetCommentRequest(postId: 1);
    $response = $connector->send($request);

    dd($response->body(), $response->json());
});
