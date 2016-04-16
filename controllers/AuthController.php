<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 16.04.2016
 */
namespace skeeks\cms\authclient\controllers;

/**
 * Class AuthController
 * @package skeeks\cms\modules\admin\controllers
 */
class AuthController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [

            'client' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
                'successUrl' => Url::to(['/cms/user/profile']),
                'cancelUrl' => Url::to(['/cms/user/profile']),
            ],
        ];
    }


    /**
     * @param BaseOAuth $client
     * @throws \yii\db\Exception
     */
    public function onAuthSuccess($client)
    {
        \Yii::info('start auth client: ' . $client->id, 'authClient');

        $attributes = $client->getUserAttributes();

        /* @var $userAuthClient UserAuthClient */
        $userAuthClient = UserAuthClient::find()->where([
            'provider'              => $client->id,
            'provider_identifier'   => ArrayHelper::getValue($attributes, 'id'),
        ])->one();

        if (\Yii::$app->user->isGuest)
        {
            if ($userAuthClient)
            {
                // Все просто идет авторизация
                $userAuthClient->provider_data = $attributes;
                $userAuthClient->save();

                $user = $userAuthClient->user;
                \Yii::$app->user->login($user);

            } else
            {
                // Регистрация

                /**
                 * @var $user User
                 */
                $user = null;
                //Если соц сеть вернула нам email то на него можно опираться.
                if ($emailFromAuthClient = ArrayHelper::getValue($attributes, 'email'))
                {
                    //Нашли email
                    $userEmailModel = CmsUserEmail::find()->where(['value' => $emailFromAuthClient])
                        //->andWhere(['approved' => Cms::BOOL_Y])
                        ->one();
                    if ($userEmailModel)
                    {
                        if ($userEmailModel->user)
                        {
                            $user = $userEmailModel->user;
                        }
                    }
                }

                if (!$user)
                {
                    $userClassName = \Yii::$app->user->identityClass;
                    $user                   = new $userClassName();
                    $user->populate();

                    if (!$user->save())
                    {
                        \Yii::error("Не удалось создать пользователя: " . serialize($user->getErrors()), 'authClient');
                        return false;
                    }


                    //Тут можно обновить данные пользователя.
                    if ($login = ArrayHelper::getValue($attributes, 'screen_name'))
                    {
                        $user->username = $login;
                        if (!$user->save())
                        {
                            \Yii::error("Не удалось обновить данные пользователя: " . serialize($user->getErrors()), 'authClient');
                        }
                    }


                    //Тут можно обновить данные пользователя.
                    if ($login = ArrayHelper::getValue($attributes, 'login'))
                    {
                        $user->username = $login;
                        if (!$user->save())
                        {
                            \Yii::error("Не удалось обновить данные пользователя: " . serialize($user->getErrors()), 'authClient');
                        }
                    }


                    if ($email = ArrayHelper::getValue($attributes, 'email'))
                    {
                        $user->email = $email;
                        if (!$user->save())
                        {
                            \Yii::error("Не удалось обновить данные пользователя: " . serialize($user->getErrors()), 'authClient');
                        }
                    }

                    if ($name = ArrayHelper::getValue($attributes, 'name'))
                    {
                        $user->name = $name;
                        if (!$user->save())
                        {
                            \Yii::error("Не удалось обновить данные пользователя: " . serialize($user->getErrors()), 'authClient');
                        }
                    }

                    $firstName = ArrayHelper::getValue($attributes, 'first_name');
                    $lastName = ArrayHelper::getValue($attributes, 'last_name');

                    if ($firstName || $lastName)
                    {
                        $user->name = $lastName . " " . $firstName;
                        if (!$user->save())
                        {
                            \Yii::error("Не удалось обновить данные пользователя: " . serialize($user->getErrors()), 'authClient');
                        }
                    }
                }


                //$transaction = $user->getDb()->beginTransaction();

                $auth = new UserAuthClient([
                    'user_id'               => $user->id,
                    'provider'              => $client->id,
                    'provider_identifier'   => (string)$attributes['id'],
                    'provider_data'         => $attributes,
                ]);
                if ($auth->save())
                {
                    //$transaction->commit();
                    Yii::$app->user->login($user);

                    if (!$user->image)
                    {
                        try
                        {
                            if ($photoUrl = ArrayHelper::getValue($attributes, 'photo'))
                            {
                                $file = \Yii::$app->storage->upload($photoUrl, [
                                    'name' => $user->name
                                ]);

                                $user->link('image', $file);
                            }
                        } catch(\Exception $e)
                        {

                        }

                    }

                    if (!$user->image)
                    {
                        try
                        {
                            if ($photoUrl = ArrayHelper::getValue($attributes, 'avatar_url'))
                            {
                                $file = \Yii::$app->storage->upload($photoUrl, [
                                    'name' => $user->name
                                ]);

                                $user->link('image', $file);
                            }
                        } catch(\Exception $e)
                        {

                        }


                    }

                } else
                {
                    \Yii::error("Не удалось создать социальный профиль: " . serialize($auth->getErrors()), 'authClient');
                }
            }
        } else
        { // user already logged in
            if (!$userAuthClient)
            { // add auth provider

                $userAuthClient = new UserAuthClient([
                    'user_id'               => \Yii::$app->user->identity->id,
                    'provider'              => $client->id,
                    'provider_identifier'   => (string) $attributes['id'],
                    'provider_data'         => $attributes,
                ]);


                if (!$userAuthClient->save())
                {
                    print_r($userAuthClient->getErrors());
                    die('no');
                }
            } else
            {
                $userAuthClient->provider_data = $attributes;
                $userAuthClient->save();
            }
        }

    }

}