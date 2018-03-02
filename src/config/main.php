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

        'i18n' => [
            'translations' =>
            [
                'skeeks/authclient' => [
                    'class'             => 'yii\i18n\PhpMessageSource',
                    'basePath'          => '@skeeks/cms/authclient/messages',
                    'fileMap' => [
                        'skeeks/authclient' => 'main.php',
                    ],
                ]
            ]
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