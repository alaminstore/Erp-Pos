<?php

use SkylarkSoft\GoRMG\Skeleton\PackageConst;

return [
    [
        'title'=>'Stock',
        'icon'=>'',
        'url'=>'',
        'items'=>[
            [
                'title' => 'Fabric Booking',
                'icon' => '',
                'url' => url('fabricbooking'),
            ],
            [
                'title' => 'Stock In',
                'icon' => '',
                'url' => url('stockin'),
            ],
            [
                'title' => 'Stock Out',
                'icon' => '',
                'url' => url('stockout'),
            ],

        ]

    ],
    [
        'title' => 'General Settings',
        'icon' => '',
        'url' => '',
        'items' => [
            [
                'title' => 'Buyers',
                'icon' => '',
                'url' => url('buyers'),
            ],
            [
                'title' => 'Zalo Po',
                'icon' => '',
                'url' => url('styles'),
            ],
            [
                'title' => 'Style',
                'icon' => '',
                'url' => url('zalopo'),
            ],
            [
                'title' => 'Suppliers',
                'icon' => '',
                'url' => url('suppliers'),
            ],
            [
                'title' => 'Fabrical Composition',
                'icon' => '',
                'url' => url('fabric'),
            ],
            [
                'title' => 'Color',
                'icon' => '',
                'url' => url('colors'),
            ],

            [
                'title' => 'Season',
                'icon' => '',
                'url' => url('season'),
            ],
            [
                'title' => 'Rack List',
                'icon' => '',
                'url' => url('racklist'),
            ],
            [
                'title' => 'UOM',
                'icon' => '',
                'url' => url('uom'),
            ]
        ]
    ]
];
