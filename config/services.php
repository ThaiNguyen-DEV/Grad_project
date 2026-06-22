<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT'),
    ],

    'cohere' => [
        'api_key' => env('COHERE_API_KEY'),
        'chat_model' => env('COHERE_CHAT_MODEL', 'command-r-plus-08-2024'),
        'embed_model' => env('COHERE_EMBED_MODEL', 'embed-multilingual-v3.0'),
        'ca_bundle' => env('COHERE_CA_BUNDLE', ini_get('curl.cainfo') ?: null),
        'stream_handler' => env('COHERE_STREAM_HANDLER', PHP_OS_FAMILY === 'Windows'),
    ],

    'qdrant' => [
        'url' => env('QDRANT_URL', 'http://127.0.0.1:6333'),
        'api_key' => env('QDRANT_API_KEY'),
        'collection' => env('QDRANT_COLLECTION', 'lotusmile_tours'),
        'vector_size' => (int) env('QDRANT_VECTOR_SIZE', 1024),
        'enabled' => env('QDRANT_ENABLED', true),
    ],

];
