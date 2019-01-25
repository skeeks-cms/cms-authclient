<?php
return [

    'components' =>
    [
        'authClientCollection' =>
        [
            'class' => 'skeeks\cms\authclient\CmsAuthClientCollection',
            'clients' => [
                //clients configs
            ]
        ],

        'authClientSettings' =>
        [
            //clients configs in a database
            'class' => 'skeeks\cms\authclient\CmsAuthClientSettings',
        ],


        'upaBackend' => [
            'menu' => [
                'data' => [
                    'personal' => [
                        'items' => [
                            [
                                'name' => ['skeeks/authclient', 'Social networks'],
                                'url' => ['/authclient/upa-social/update'],
                                'icon' => 'fa fa-facebook',
                            ]
                        ],
                    ],
                ],
            ],
        ],
    ],

    'modules' =>
    [
        'authclient' => [
            'class'         => 'skeeks\cms\authclient\CmsAuthClientModule',
        ]
    ]

];