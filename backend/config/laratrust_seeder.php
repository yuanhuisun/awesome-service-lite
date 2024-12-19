<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'sys_admin' => [
            'users' => 'c,r,u,d',
            'tickets' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'team_admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'user' => [
            'profile' => 'r,u',
            'tickets' => 'c,r,u,d',
        ],
        'team_manager' => [
            'users' => 'r,u',
            'tickets' => 'c,r,u,d',
            'profile' => 'c,r,u,d',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
