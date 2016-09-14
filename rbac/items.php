<?php
return [
    'login' => [
        'type' => 2,
    ],
    'logout' => [
        'type' => 2,
    ],
    'create' => [
        'type' => 2,
    ],
    'update' => [
        'type' => 2,
    ],
    'delete' => [
        'type' => 2,
    ],
    'user' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'login',
        ],
    ],
    'moder' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'user',
            'logout',
            'create',
            'update',
        ],
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'moder',
            'delete',
        ],
    ],
];
