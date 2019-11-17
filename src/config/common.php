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

        'authManager' => [
            'config' => [
                'roles' => [
                    [
                        'name'  => \skeeks\cms\rbac\CmsManager::ROLE_ADMIN,
                        'child' => [
                            //Есть доступ к системе администрирования
                            'permissions' => [
                                "authclient/admin-user-auth-client",
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];