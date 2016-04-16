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
    ],

    'modules' =>
    [
        'authclient' => [
            'class'         => 'skeeks\cms\authclient\CmsAuthclientModule',
        ]
    ]

];