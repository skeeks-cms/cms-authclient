<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 23.06.2016
 */

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchs\Game */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<? $pjax = \skeeks\cms\modules\admin\widgets\Pjax::begin(); ?>

    <?php /*echo $this->render('_search', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider
    ]); */?>

    <?= \skeeks\cms\modules\admin\widgets\GridViewStandart::widget([
        'dataProvider'  => $dataProvider,
        'filterModel'   => $searchModel,
        'adminController'   => $controller,
        'pjax'              => $pjax,
        'columns' =>
            [
                [
                    'class'         => \yii\grid\DataColumn::className(),
                    'attribute'     => "provider",
                    'format'     => "raw",
                    'value' => function(\skeeks\cms\authclient\models\UserAuthClient $userAuthClient)
                    {
                        return \yii\helpers\Html::a($userAuthClient->provider, $userAuthClient->providerUrl, [
                            'target' => '_blank'
                        ]);
                    }
                ],

                [
                    'class'         => \yii\grid\DataColumn::className(),
                    'attribute'     => "provider_identifier",
                    'format'     => "raw",
                    'value' => function(\skeeks\cms\authclient\models\UserAuthClient $userAuthClient)
                    {
                        return \yii\helpers\Html::a($userAuthClient->provider_identifier, $userAuthClient->providerUrl, [
                            'target' => '_blank'
                        ]);
                    }
                ],

                [
                    'class'         => \skeeks\cms\grid\UserColumnData::className(),
                    'attribute'     => "user_id"
                ],

                [
                    'class'         => \skeeks\cms\grid\DateTimeColumnData::className(),
                    'attribute'     => "created_at"
                ],
            ]
    ]); ?>

<? $pjax::end(); ?>
