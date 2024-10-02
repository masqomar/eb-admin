<?php

return [
    /**
     * If any input file(image) as default will used options below.
     */
    'image' => [
        /**
         * Path for store the image.
         *
         * avaiable options:
         * 1. public
         * 2. storage
         */
        'path' => 'storage',

        /**
         * Will used if image is nullable and default value is null.
         */
        'default' => 'https://via.placeholder.com/350?text=No+Image+Avaiable',

        /**
         * Crop the uploaded image using intervention image.
         */
        'crop' => true,

        /**
         * When set to true the uploaded image aspect ratio will still original.
         */
        'aspect_ratio' => true,

        /**
         * Crop image size.
         */
        'width' => 500,
        'height' => 500,
    ],

    'format' => [
        /**
         * Will used to first year on select, if any column type year.
         */
        'first_year' => 1900,

        /**
         * If any date column type will cast and display used this format, but for input date still will used Y-m-d format.
         *
         * another most common format:
         * - M d Y
         * - d F Y
         * - Y m d
         */
        'date' => 'd/m/Y',

        /**
         * If any input type month will cast and display used this format.
         */
        'month' => 'm/Y',

        /**
         * If any input type time will cast and display used this format.
         */
        'time' => 'H:i',

        /**
         * If any datetime column type or datetime-local on input, will cast and display used this format.
         */
        'datetime' => 'd/m/Y H:i',

        /**
         * Limit string on index view for any column type text or longtext.
         */
        'limit_text' => 100,
    ],

    /**
     * It will used for generator to manage and showing menus on sidebar views.
     *
     * Example:
     * [
     *   'header' => 'Main',
     *
     *   // All permissions in menus[] and submenus[]
     *   'permissions' => ['test view'],
     *
     *   menus' => [
     *       [
     *          'title' => 'Main Data',
     *          'icon' => '<i class="bi bi-collection-fill"></i>',
     *          'route' => null,
     *
     *          // permission always null when isset submenus
     *          'permission' => null,
     *
     *          // All permissions on submenus[] and will empty[] when submenus equals to []
     *          'permissions' => ['test view'],
     *
     *          'submenus' => [
     *                 [
     *                     'title' => 'Tests',
     *                     'route' => '/tests',
     *                     'permission' => 'test view'
     *                  ]
     *               ],
     *           ],
     *       ],
     *  ],
     *
     * This code below always changes when you use a generator and maybe you must lint or format the code.
     */
    'sidebars' => [
    [
        'header' => 'Main',
        'permissions' => [
            'announcement view',
            'bank view',
            'category view',
            'faq view',
            'period view',
            'program type view',
            'program view',
            'tenant view',
            'commission view',
            'coupon view',
            'value category view',
            'detail value category view',
            'question title view',
            'question view',
            'exam view',
            'grade view',
            'grade detail view'
        ],
        'menus' => [
            [
                'title' => 'Main Data',
                'icon' => '<i class="bi bi-collection-fill"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Master Data',
                'icon' => '<i class="bi bi-info-circle"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [
                    'announcement view',
                    'bank view',
                    'faq view'
                ],
                'submenus' => [
                    [
                        'title' => 'Informasi',
                        'route' => '/announcements',
                        'permission' => 'announcement view'
                    ],
                    [
                        'title' => 'Bank',
                        'route' => '/banks',
                        'permission' => 'bank view'
                    ],
                    [
                        'title' => 'Faqs',
                        'route' => '/faqs',
                        'permission' => 'faq view'
                    ]
                ]
            ],
            [
                'title' => 'Master Program',
                'icon' => '<i class="bi bi-journal-album"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [
                    'program type view',
                    'program view',
                    'category view',
                    'period view',
                    'coupon view'
                ],
                'submenus' => [
                    [
                        'title' => 'Jenis Program',
                        'route' => '/program-types',
                        'permission' => 'program type view'
                    ],
                    [
                        'title' => 'Periode',
                        'route' => '/periods',
                        'permission' => 'period view'
                    ],
                    [
                        'title' => 'Kategori',
                        'route' => '/categories',
                        'permission' => 'category view'
                    ],
                    [
                        'title' => 'Program',
                        'route' => '/programs',
                        'permission' => 'program view'
                    ],
                    [
                        'title' => 'Kupon',
                        'route' => '/coupons',
                        'permission' => 'coupon view'
                    ]
                ]
            ],
            [
                'title' => 'Master Affiliate',
                'icon' => '<i class="bi bi-person-badge"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [
                    'tenant view',
                    'commission view'
                ],
                'submenus' => [
                    [
                        'title' => 'Affiliate',
                        'route' => '/tenants',
                        'permission' => 'tenant view'
                    ],
                    [
                        'title' => 'Komisi',
                        'route' => '/commissions',
                        'permission' => 'commission view'
                    ]
                ]
            ],
            [
                'title' => 'Master TOEFL',
                'icon' => '<i class="bi bi-pencil-square"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [
                    'value category view',
                    'detail value category view',
                    'question title view',
                    'question view',
                    'exam view',
                    'grade view',
                    'grade detail view'
                ],
                'submenus' => [
                    [
                        'title' => 'Kategori Nilai',
                        'route' => '/value-categories',
                        'permission' => 'value category view'
                    ],
                    [
                        'title' => 'Detail Kategori Nilai',
                        'route' => '/detail-value-categories',
                        'permission' => 'detail value category view'
                    ],
                    [
                        'title' => 'Judul Soal',
                        'route' => '/question-titles',
                        'permission' => 'question title view'
                    ],
                    [
                        'title' => 'Soal',
                        'route' => '/questions',
                        'permission' => 'question view'
                    ],
                    [
                        'title' => 'Ujian',
                        'route' => '/exams',
                        'permission' => 'exam view'
                    ],
                    [
                        'title' => 'Nilai',
                        'route' => '/grades',
                        'permission' => 'grade view'
                    ],
                    [
                        'title' => 'Detail Nilai',
                        'route' => '/grade-details',
                        'permission' => 'grade detail view'
                    ]
                ]
            ]
        ]
    ],
    [
        'header' => 'Users',
        'permissions' => [
            'user view',
            'role & permission view'
        ],
        'menus' => [
            [
                'title' => 'Users',
                'icon' => '<i class="bi bi-people-fill"></i>',
                'route' => '/users',
                'permission' => 'user view',
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Roles & Permissions',
                'icon' => '<i class="bi bi-person-check-fill"></i>',
                'route' => '/roles',
                'permission' => 'role & permission view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Transaksi',
        'permissions' => [
            'student view',
            'transaction view',
            'transaction detail view'
        ],
        'menus' => [
            [
                'title' => 'Transaksi',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [
                    'student view',
                    'transaction view',
                    'transaction detail view'
                ],
                'submenus' => [
                    [
                        'title' => 'Member',
                        'route' => '/students',
                        'permission' => 'student view'
                    ],
                    [
                        'title' => 'Transaksi',
                        'route' => '/transactions',
                        'permission' => 'transaction view'
                    ],
                    [
                        'title' => 'Detail Transaksi',
                        'route' => '/transaction-details',
                        'permission' => 'transaction detail view'
                    ]
                ]
            ]
        ]
    ],
    [
        'header' => 'SMM Panel',
        'permissions' => [
            'smm provider view'
        ],
        'menus' => [
            [
                'title' => 'Providers',
                'icon' => '<i class="bi bi-instagram"></i>',
                'route' => '/smm-providers',
                'permission' => 'smm provider view',
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Order',
                'icon' => '<i class="bi bi-instagram"></i>',
                'route' => '/smm-services',
                'permission' => 'smm provider view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ]
]
];