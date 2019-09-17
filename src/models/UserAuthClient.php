<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 16.04.2016
 */
namespace skeeks\cms\authclient\models;

use skeeks\cms\models\behaviors\HasJsonFieldsBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * @property string $provider
 * @property array $provider_data
 * @property string $providerUrl
 *
 * Class UserAuthClient
 * @package skeeks\module\cms\user\model
 */
class UserAuthClient extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_user_authclient}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            HasJsonFieldsBehavior::className() =>
            [
                'class'     => HasJsonFieldsBehavior::className(),
                'fields'    => ['provider_data']
            ],
            TimestampBehavior::className() =>
            [
                'class' => TimestampBehavior::className(),
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['provider_data'], 'safe'],
            [['provider'], 'string', 'max' => 50],
            [['provider_identifier'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('skeeks/authclient', 'ID'),
            'user_id' => Yii::t('skeeks/authclient', 'User'),
            'provider' => Yii::t('skeeks/authclient', 'Provider'),
            'provider_identifier' => Yii::t('skeeks/authclient', 'Provider Identifier'),
            'provider_data' => Yii::t('skeeks/authclient', 'Provider Data'),
            'created_at' => Yii::t('skeeks/authclient', 'Created At'),
            'updated_at' => Yii::t('skeeks/authclient', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\Yii::$app->user->identityClass, ['id' => 'user_id']);
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->provider . " [{$this->provider_identifier}]";
    }

    /**
     * @return string
     */
    public function getProviderUrl()
    {
        if ($this->provider == 'facebook')
        {
            $id = ArrayHelper::getValue($this->provider_data, 'id');
            return 'https://www.facebook.com/profile.php?id=' . $id;
        }

        if ($this->provider == 'vkontakte')
        {
            $id = ArrayHelper::getValue($this->provider_data, 'user_id');
            return 'https://vk.com/id' . $id;
        }
        if ($this->provider == 'github')
        {
            return ArrayHelper::getValue($this->provider_data, 'html_url', '#');
        }

        return '#';
    }
}
