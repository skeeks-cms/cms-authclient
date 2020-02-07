<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 27.03.2015
 */
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model \skeeks\cms\models\WidgetConfig */

?>
<? $fieldSet = $form->fieldSet(\Yii::t('skeeks/authclient','Are common')); ?>
    <?= $form->field($model, 'enabled')->checkbox(); ?>
<? $fieldSet::end(); ?>

<? $fieldSet = $form->fieldSet('GitHub'); ?>

    <p><?=\Yii::t('skeeks/authclient','Create application at page')?>: <?= Html::a('https://github.com/settings/applications', 'https://github.com/settings/applications', [
            'target' => '_blank'
        ]); ?><?=\Yii::t('skeeks/authclient',', and get its settings.')?></p>
    <hr />

    <?= $form->field($model, 'githubEnabled')->radioList(\Yii::$app->formatter->booleanFormat); ?>

    <?= $form->field($model, 'githubClientId')->textInput(['placeholder' => 'c692de6c3c3247e39cf4']); ?>
    <?= $form->field($model, 'githubClientSecret')->textInput(['placeholder' => 'f01f7bc7d41f38e4049d15786c0f1b93a5e96e90']); ?>
    <?= $form->field($model, 'githubClass')->textInput(['placeholder' => 'yii\authclient\clients\GitHub'])->hint(\Yii::t('skeeks/authclient','Optional parameter, if not filled will be used {yii}',['yii' => 'yii\authclient\clients\GitHub'])); ?>

<? $fieldSet::end(); ?>

<? $fieldSet = $form->fieldSet('Vk'); ?>

    <p><?=\Yii::t('skeeks/authclient','Create application at page')?>: <?= Html::a('http://vk.com/editapp?act=create', 'http://vk.com/editapp?act=create', [
            'target' => '_blank'
        ]); ?><?=\Yii::t('skeeks/authclient',', and get its settings.')?></p>
    <hr />

    <?= $form->field($model, 'vkEnabled')->radioList(\Yii::$app->formatter->booleanFormat); ?>

    <?= $form->field($model, 'vkClientId')->textInput(['placeholder' => '5040380']); ?>
    <?= $form->field($model, 'vkClientSecret')->textInput(['placeholder' => 'sxAWws6ATNj5vDabPysA']); ?>
    <?= $form->field($model, 'vkClass')->textInput(['placeholder' => 'yii\authclient\clients\VKontakte'])->hint(\Yii::t('skeeks/authclient','Optional parameter, if not filled will be used {yii}',['yii' => 'yii\authclient\clients\VKontakte'])); ?>

<? $fieldSet::end(); ?>


<? $fieldSet = $form->fieldSet('Facebook'); ?>

    <p><?=\Yii::t('skeeks/authclient','Create application at page')?>: <?= Html::a('https://developers.facebook.com/apps', 'https://developers.facebook.com/apps', [
            'target' => '_blank'
        ]); ?><?=\Yii::t('skeeks/authclient',', and get its settings.')?></p>
    <hr />

    <?= $form->field($model, 'facebookEnabled')->radioList(\Yii::$app->formatter->booleanFormat); ?>

    <?= $form->field($model, 'facebookClientId')->textInput(['placeholder' => '5040380']); ?>
    <?= $form->field($model, 'facebookClientSecret')->textInput(['placeholder' => 'sxAWws6ATNj5vDabPysA']); ?>
    <?= $form->field($model, 'facebookClass')->textInput(['placeholder' => 'yii\authclient\clients\Facebook'])->hint(\Yii::t('skeeks/authclient','Optional parameter, if not filled will be used {yii}',['yii' => 'yii\authclient\clients\VKontakte'])); ?>

<? $fieldSet::end(); ?>

<? $fieldSet = $form->fieldSet('Google'); ?>

    <p>
        <?=\Yii::t('skeeks/authclient', 'Create application at page')?>: <?= Html::a('https://console.developers.google.com/project', 'https://console.developers.google.com/project', [
            'target' => '_blank'
        ]); ?><?=\Yii::t('skeeks/authclient',', and get its settings.')?>
        https://console.developers.google.com/project/[yourProjectId]/apiui/credential
    </p>
    <hr />

    <?= $form->field($model, 'googleEnabled')->radioList(\Yii::$app->formatter->booleanFormat); ?>

    <?= $form->field($model, 'googleClientId')->textInput(['placeholder' => '330404612095-b82l5d8ir7m11m154gij7jb6npfitnpd.apps.googleusercontent.com']); ?>
    <?= $form->field($model, 'googleClientSecret')->textInput(['placeholder' => 'pJRpdS7UQRabOumyqRj-HaDR']); ?>
    <?= $form->field($model, 'googleClass')->textInput(['placeholder' => 'yii\authclient\clients\Google'])->hint(\Yii::t('skeeks/authclient','Optional parameter, if not filled will be used {yii}',['yii' => 'yii\authclient\clients\Google'])); ?>

<? $fieldSet::end(); ?>



