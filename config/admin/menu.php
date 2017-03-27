<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.04.2016
 */
return
[
    'other' =>
    [
        'items' =>
        [
            [
                "label"     => \Yii::t('skeeks/authclient', "Social profiles"),
                "img"       => ['\skeeks\cms\authclient\assets\CmsAuthclientAsset', 'icons/facebook.png'],

                'items' =>
                [
                    [
                        "label" => \Yii::t('app', "Settings"),
                        "url"   => ["cms/admin-settings", "component" => 'skeeks\cms\authclient\CmsAuthClientSettings'],
                        "img"       => ['skeeks\cms\assets\CmsAsset', 'images/icons/settings-big.png'],
                        "activeCallback"       => function($adminMenuItem)
                        {
                            return (bool) (\Yii::$app->request->getUrl() == $adminMenuItem->getUrl());
                        },
                    ],

                    [
                        "label"     => \Yii::t('skeeks/authclient', "Social profiles"),
                        "url"       => ["authclient/admin-user-auth-client"],
                        "img"       => ['\skeeks\cms\authclient\assets\CmsAuthclientAsset', 'icons/facebook.png']
                    ],

                ],
            ],
        ]
    ]
];