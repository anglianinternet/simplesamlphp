<?php

$config = [
    'example-userpass' => [
        'exampleauth:UserPass',
        'admin:adminpass' => [
            'UID' => ['admin'],
            'eduPersonAffiliation' => ['member', 'employee'],
            'displayName' => ['Admin User'],
            'mail' => ['admin@example.com'],
        ],
        'ben.minter:password' => [
            'UID' => ['ben.minter'],
            'eduPersonAffiliation' => ['member', 'employee'],
            'displayName' => ['Ben Minter'],
            'mail' => ['ben.minter@anglianinternet.com'],
        ],
        'martin:password' => [
            'UID' => ['martin'],
            'eduPersonAffiliation' => ['member', 'employee'],
            'displayName' => ['Martin'],
            'mail' => ['martin@anglianinternet.com'],
        ],
    ],
];
