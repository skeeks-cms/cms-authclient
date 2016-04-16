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

___

> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](http://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](http://skeeks.com) | [en.cms.skeeks.com](http://en.cms.skeeks.com) | [cms.skeeks.com](http://cms.skeeks.com) | [marketplace.cms.skeeks.com](http://marketplace.cms.skeeks.com)


