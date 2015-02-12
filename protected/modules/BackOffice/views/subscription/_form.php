<?php
/* @var $this SubscriptionController */
/* @var $model SubscriptionManage */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'subscription-manage-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <?php echo $form->labelEx($model, 'email'); ?>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo $model->email; ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <?php echo $form->labelEx($model, 'subscribe_date'); ?>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo $model->subscribe_date; ?>
            <?php echo $form->error($model, 'subscribe_date'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-md-2">
            <?php echo $form->labelEx($model, 'status'); ?>
        </div>
        <div class="col-lg-10 col-md-10">
            <?php echo ZHtml::enumDromDownListUpdate($model, 'status', array('class' => 'span5', 'maxlength' => 8)); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->