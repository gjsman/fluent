<?php

use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Middleware\AuthenticateSession;

return [
    'stack' => 'livewire',

    'middleware' => ['web'],

    'auth_session' => AuthenticateSession::class,

    /*
    |--------------------------------------------------------------------------
    | Jetstream Guard
    |--------------------------------------------------------------------------
    |
    | Here you may specify the authentication guard Jetstream will use while
    | authenticating users. This value should correspond with one of your
    | guards that is already present in your "auth" configuration file.
    |
    */

    'guard' => 'sanctum',

    /*
    |--------------------------------------------------------------------------
    | Fluent + Jetstream Features
    |--------------------------------------------------------------------------
    |
    | Some of Jetstream's features are optional. You may disable the features
    | by removing them from this array. You're free to only remove some of
    | these features, or you can even remove all of these if you need to.
    |
    | Teams support and API tokens are not supported by Fluent. Most of the
    | backend code is still there, but you'll need to manually build out
    | the user interface for the features you need.
    |
    | Remember that fortify.php has a 'features' array, with even more settings.
    */

    'features' => [
        Features::termsAndPrivacyPolicy(),
        Features::profilePhotos(),
        Features::accountDeletion(),
    ],

    /*
    |--------------------------------------------------------------------------
    | Profile Photo Disk
    |--------------------------------------------------------------------------
    |
    | This configuration value determines the default disk that will be used
    | when storing profile photos for your application's users. Typically,
    | this will be the "public" disk, but you may adjust this if needed.
    |
    */

    'profile_photo_disk' => 'public',
];
