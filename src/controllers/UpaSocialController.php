<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 20.12.2017
 */

namespace skeeks\cms\authclient\controllers;

use skeeks\cms\backend\actions\BackendModelAction;
use skeeks\cms\backend\actions\BackendModelUpdateAction;
use skeeks\cms\backend\controllers\BackendModelController;
use yii\helpers\ArrayHelper;

/**
 * Class UpaPersonalController
 * @package skeeks\cms\controllers
 */
class UpaSocialController extends BackendModelController
{
    public $defaultAction = 'update';

    public function init()
    {
        $this->name = ['skeeks/cms', 'Personal data'];
        $this->modelClassName = \Yii::$app->user->identityClass;
        $this->modelShowAttribute = 'displayName';
        parent::init();
    }

    public function getModel()
    {
        return \Yii::$app->user->identity;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
                "update" => [
                    'class' => BackendModelAction::class,
                    'name'  => ['skeeks/authclient', 'Social networks'],
                    'icon'  => 'fa fa-facebook',
                ],
            ]
        );
    }
}