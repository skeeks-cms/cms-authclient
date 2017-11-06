Authorization by social networks for SkeekS CMS
===================================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/cms-authclient "*"
```

or add

```
"skeeks/cms-authclient": "*"
```

Configuration app
----------

```php

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

```

##Links
* [Web site](http://en.cms.skeeks.com)
* [Web site (rus)](http://cms.skeeks.com)
* [Author](http://skeeks.com)
* [ChangeLog](https://github.com/skeeks-cms/cms-authclient/blob/master/CHANGELOG.md)


___

> [![skeeks!](https://skeeks.com/img/logo/logo-no-title-80px.png)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)


