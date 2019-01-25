<?php
return [

    'components' => [
        'i18n' => [
            'translations' => [
                'skeeks/authclient' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@skeeks/cms/authclient/messages',
                    'fileMap'  => [
                        'skeeks/authclient' => 'main.php',
                    ],
                ],
            ],
        ],

    ],
];