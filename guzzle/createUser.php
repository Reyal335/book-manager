<?php

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Http;

$response = Http::acceptJson()->post('http://localhost:8000/api/users', [
    'name' => 'Samuel',
    'email' => 'chingcuangco7904@gmail.com',
    'password' => 'Anyasam101',
]);

echo $response->status(), PHP_EOL, $response->body(), PHP_EOL;
