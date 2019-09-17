<?php
<<<<<<< HEAD

return [

=======
return [
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */
<<<<<<< HEAD

=======
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],
<<<<<<< HEAD

=======
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */
<<<<<<< HEAD

    'guards' => [
=======
    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'teacher' => [
            'driver' => 'session',
            'provider' => 'teachers',
        ],
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
<<<<<<< HEAD

=======
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],
<<<<<<< HEAD

=======
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */
<<<<<<< HEAD

=======
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
<<<<<<< HEAD

=======
       'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],
        'teachers' => [
            'driver' => 'eloquent',
            'model' => App\Teacher::class,
        ],
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],
<<<<<<< HEAD

=======
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */
<<<<<<< HEAD

=======
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
<<<<<<< HEAD
    ],

];
=======
        'teachers' => [
            'provider' => 'teachers',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
];
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
