<?php

return [
    'role_structure' => [
        'doctor' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'nurse' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
