<?php

$config = [
    'example-userpass' => [
        'exampleauth:UserPass',
        'admin:adminpass' => [
            'UID' => ['admin'],
            'Role' => ['One_Admin'],
            'displayName' => ['Admin User'],
            'mail' => ['admin@example.com'],
        ],
        'viewer:password' => [
            'UID' => ['viewer'],
            'Role' => ['One_View'],
            'displayName' => ['Viewer User'],
            'mail' => ['viewer@anglianinternet.com'],
        ],
        'editor:password' => [
            'UID' => ['editor'],
            'Role' => ['One_Edit'],
            'displayName' => ['Editor User'],
            'mail' => ['editor@anglianinternet.com'],
        ],
        'creator:password' => [
            'UID' => ['creator'],
            'Role' => ['One_Create'],
            'displayName' => ['Creator User'],
            'mail' => ['creator@anglianinternet.com'],
        ],
        'ben.minter:password' => [
            'UID' => ['ben.minter'],
            'Role' => ['One_Finance'],
            'displayName' => ['Ben Minter'],
            'mail' => ['ben.minter@anglianinternet.com'],
        ],
        'martin:password' => [
            'UID' => ['martin'],
            'Role' => ['One_Finance'],
            'displayName' => ['Martin'],
            'mail' => ['martin@anglianinternet.com'],
        ],
    ],
];
