<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.04.2016
 */
namespace skeeks\cms\authclient;
use yii\helpers\ArrayHelper;
/**
 * Class CmsAuthClientCollection
 * @package skeeks\cms\authclient
 */
class CmsAuthClientCollection extends \yii\authclient\Collection
{
    public function init()
    {
        parent::init();

        if (\Yii::$app->authClientSettings && \Yii::$app->authClientSettings->enabled === false)
        {
            return;
        }

        $this->clients = \Yii::$app->authClientSettings->clients;
    }
}