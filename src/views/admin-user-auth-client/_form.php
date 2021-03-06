<?php
/* @var $this yii\web\View */
/* @var $model \yii\db\ActiveRecord */
?>
<?php $form = skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab::begin(); ?>

    <?= $form->fieldSet(\Yii::t('app',"Main")); ?>
    <? if (\Yii::$app->request->get('user_id')) : ?>
        <?= $form->field($model, 'user_id')->hiddenInput(['value' => \Yii::$app->request->get('user_id')])->label(false) ?>
    <? else: ?>
        <?= $form->field($model, 'user_id')->widget(
            \skeeks\cms\backend\widgets\SelectModelDialogUserWidget::class
        ); ?>
    <? endif; ?>

    <?= $form->fieldSetEnd(); ?>

    <? if (!$model->isNewRecord) : ?>
        <?= $form->fieldSet(\Yii::t('app',"Data of provider")); ?>
            <?/*= \yii\widgets\DetailView::widget([
                'model'         => $model->provider_data,
                'attributes'    => array_keys((array) $model->provider_data),
            ])*/?>
            <pre>
            <?
                print_r($model->provider_data);
            ?>
            </pre>
        <?= $form->fieldSetEnd(); ?>
    <? endif; ?>


    <?= $form->buttonsStandart($model); ?>
<?php skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab::end(); ?>
