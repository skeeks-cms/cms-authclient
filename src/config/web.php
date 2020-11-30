<?php
return [

    'components' =>
        [
            'authClientCollection' =>
                [
                    'class'   => 'skeeks\cms\authclient\CmsAuthClientCollection',
                    'clients' => [
                        //clients configs
                    ],
                ],

            'backendAdmin' => [
                'menu' => [
                    'data' => [
                        'other' => [
                            'items' => [
                                [
                                    "name"  => ['skeeks/authclient', "Social profiles"],
                                    "image" => ['\skeeks\cms\authclient\assets\CmsAuthclientAsset', 'icons/facebook.png'],

                                    'items' =>
                                        [
                                            /*[
                                                "name"           => ['skeeks/cms', "Settings"],
                                                "url"            => ["cms/admin-settings", "component" => 'skeeks\cms\authclient\CmsAuthClientSettings'],
                                                "image"          => ['skeeks\cms\assets\CmsAsset', 'images/icons/settings-big.png'],
                                                "activeCallback" => function ($adminMenuItem) {
                                                    return (bool)(\Yii::$app->request->getUrl() == $adminMenuItem->getUrl());
                                                },
                                            ],*/

                                            [
                                                "name"  => ['skeeks/authclient', "Social profiles"],
                                                "url"   => ["authclient/admin-user-auth-client"],
                                                "image" => ['\skeeks\cms\authclient\assets\CmsAuthclientAsset', 'icons/facebook.png'],
                                            ],

                                        ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],

            'authClientSettings' =>
                [
                    //clients configs in a database
                    'class' => 'skeeks\cms\authclient\CmsAuthClientSettings',
                ],


            /*'upaBackend' => [
                'menu' => [
                    'data' => [
                        'personal' => [
                            'items' => [
                                [
                                    'name' => ['skeeks/authclient', 'Social networks'],
                                    'url'  => ['/authclient/upa-social/update'],
                                    'icon' => 'fa fa-facebook',
                                ],
                            ],
                        ],
                    ],
                ],
            ],*/
        ],

    'modules' =>
        [
            'authclient' => [
                'class' => 'skeeks\cms\authclient\CmsAuthClientModule',
            ],
        ],

];