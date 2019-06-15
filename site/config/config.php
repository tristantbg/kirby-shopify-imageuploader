<?php

return [
    'panel'         => [
        // 'slug' => 'adminpanel',
        'css' => 'assets/panel.css'
    ],
    'debug'         => true,
    'thumbs'        => [
        'srcsets' => [
            'default' => [200, 400, 600, 1024, 1600, 1920],
            'cover'   => [800, 1024, 2048, 4000],
        ],
    ],
    'cache'         => [
        'pages' => [
            'active' => false,
        ],
    ],
];
