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

        'categories' => [
            [
                'title' => 'Categories',
            ],
        ],
        'create-category' => [
            [
                'title' => 'Categories',
                'route' => 'categories.index',
            ],
            [
                'title' => 'Create Category',
            ]
        ],
        'edit-category' => [
            [
                'title' => 'Categories',
                'route' => 'categories.index',
            ],
            [
                'title' => 'Edit Category',
            ]
        ],

        'types' => [
            [
                'title' => 'Types',
            ],
        ],
        'create-type' => [
            [
                'title' => 'Types',
                'route' => 'types.index',
            ],
            [
                'title' => 'Create Type',
            ]
        ],
        'edit-type' => [
            [
                'title' => 'Types',
                'route' => 'types.index',
            ],
            [
                'title' => 'Edit Type',
            ]
        ],

        'sizes' => [
            [
                'title' => 'Sizes',
            ],
        ],
        'create-size' => [
            [
                'title' => 'Sizes',
                'route' => 'sizes.index',
            ],
            [
                'title' => 'Create Size',
            ]
        ],
        'edit-size' => [
            [
                'title' => 'Sizes',
                'route' => 'sizes.index',
            ],
            [
                'title' => 'Edit Size',
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
            ],
            [
                'title' => 'Products',
                'items' => [
                    [
                        'title' => 'Categories',
                        'route' => 'categories.index',
                        'icon' => 'tags-fill',
                        'activeRoute' => 'categories.*'
                    ],
                    [
                        'title' => 'Types',
                        'route' => 'types.index',
                        'icon' => 'tags-fill',
                        'activeRoute' => 'types.*'
                    ],
                    [
                        'title' => 'Sizes',
                        'route' => 'sizes.index',
                        'icon' => '1-circle',
                        'activeRoute' => 'sizes.*'
                    ],
                ]
            ]
        ]
    ]
];
