<?php

return [
    'create_users' => false,

    'truncate_tables' => true,

    'roles_structure' => [

        'super_admin' => [
            'admins' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'books' => 'c,r,u,d',
            'loans' => 'r,u',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
