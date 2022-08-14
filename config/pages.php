<?php

return [
    'breadcrumbs' => [
        'dashboard' => [['title' => 'Dashboard']],

        'roles' => [
            [
                'title' => 'Roles',
            ]
        ],
        'create-role' => [
            [
                'title' => 'Roles',
                'route' => 'roles.index'
            ],
            [
                'title' => 'Create Role',
            ]
        ],
        'edit-role' => [
            [
                'title' => 'Roles',
                'route' => 'roles.index'
            ],
            [
                'title' => 'Edit Role',
            ]
        ],

        'users' => [
            [
                'title' => 'Users',
            ],
        ],
        'create-user' => [
            [
                'title' => 'Users',
                'route' => 'users.index',
            ],
            [
                'title' => 'Create User',
            ]
        ],
        'edit-user' => [
            [
                'title' => 'Users',
                'route' => 'users.index',
            ],
            [
                'title' => 'Edit User',
            ]
        ],
    ],

    'sidebar' => [
        'menus' => [
            // [
            //     'title' => 'Dashboard',
            //     'items' => [
            //         [
            //             'route' => '',
            //             'icon' => 'grid-fill',
            //             'title' => 'Dashboard',
            //             'active' => ''
            //         ]
            //     ]
            // ],
            [
                'title' => 'Users',
                'items' => [
                    [
                        'title' => 'Roles',
                        'route' => 'roles.index',
                        'icon' => 'person-check-fill',
                        'activeRoute' => 'roles.*'
                    ],
                    [
                        'title' => 'Users',
                        'route' => 'users.index',
                        'icon' => 'people-fill',
                        'activeRoute' => 'users.*'
                    ]
                ]
            ]
        ]
    ]
];
