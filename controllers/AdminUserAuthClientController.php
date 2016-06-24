<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 31.05.2015
 */
namespace skeeks\cms\authclient\controllers;

use skeeks\cms\authclient\models\UserAuthClient;
use skeeks\cms\models\user\UserEmail;
use skeeks\cms\modules\admin\controllers\AdminModelEditorController;
use yii\helpers\ArrayHelper;

/**
 * Class AdminUserAuthClientController
 * @package skeeks\cms\controllers
 */
class AdminUserAuthClientController extends AdminModelEditorController
{
    public function init()
    {
        $this->name                   = \Yii::t('skeeks/authclient', 'Social profiles');
        $this->modelShowAttribute      = "displayName";
        $this->modelClassName          = UserAuthClient::className();

        parent::init();

    }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [

            'create' =>
            [
                'visible'    => false
            ]
        ]);
    }

}