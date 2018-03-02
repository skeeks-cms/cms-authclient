<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 02.03.2018
 */
?>
<? if (\Yii::$app->authClientCollection->clients) : ?>
    <div id="sx-social" class="">
        <? \yii\bootstrap\Alert::begin([
            'options' => [
              'class' => 'alert-info',
            ],
        ])?>
            Вы можете подключить профиль социальной сети, или стороннего приложения, и авторизовываться через него на нашем сайте.
        <? \yii\bootstrap\Alert::end()?>


        <? if (\Yii::$app->user->identity->cmsUserAuthClients) : ?>
            <h4>Уже подключены:</h4>
            <?=
                \yii\grid\GridView::widget([
                    'dataProvider' => new \yii\data\ArrayDataProvider([
                        'allModels' => \Yii::$app->user->identity->cmsUserAuthClients
                    ]),
                    'columns' =>
                    [
                        [
                            'class' => \yii\grid\DataColumn::class,
                            'label' => 'Социальная сеть',
                            'format' => 'raw',
                            'value' => function(\skeeks\cms\authclient\models\UserAuthClient $userAuthClient) {
                                return \yii\helpers\Html::a($userAuthClient->provider, $userAuthClient->providerUrl, [
                                    'target' => '_blank'
                                ]);
                            }
                        ],
                    ]
                ])
            ?>
        <? endif; ?>

        <hr />
        <h4>Подключить:</h4>
        <?= yii\authclient\widgets\AuthChoice::widget([
             'baseAuthUrl'  => ['/authclient/auth/client'],
             'popupMode'    => true,
        ]) ?>
    </div>
<? endif; ?>