<?php
/* @var $this PromotionsController */
/* @var $model TblPromotions */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tbl-promotions-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'promotion_title_th'); ?>
        </div>
        <div class="col-md-10">
            <?php echo $form->textField($model, 'promotion_title_th', array('size' => 60, 'maxlength' => 250)); ?>
            <?php echo $form->error($model, 'promotion_title_th'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'promotion_title_en'); ?>
        </div>
        <div class="col-md-10">
            <?php echo $form->textField($model, 'promotion_title_en', array('size' => 60, 'maxlength' => 250)); ?>
            <?php echo $form->error($model, 'promotion_title_en'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'promotion_content_th'); ?>
        </div>
        <div class="col-md-10">
            <?php echo $form->textArea($model, 'promotion_content_th', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'promotion_content_th'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'promotion_content_en'); ?>
        </div>
        <div class="col-md-10">
            <?php echo $form->textArea($model, 'promotion_content_en', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'promotion_content_en'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'promotion_picture'); ?>
        </div>
        <div class ="col-md-10">
            <?php echo $form->fileField($model, 'promotion_picture'); ?>
            <?php echo $form->error($model, 'promotion_picture'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'promotion_create_date'); ?>
        </div>
        <div class="col-md-10">
            <input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="TblPromotions[promotion_create_date]" id="TblPromotions_promotion_create_date" />
            <input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="TblPromotions[promotion_update_date]" id="TblPromotions_promotion_update_date" />
            <input type="hidden" value="<?php echo Yii::app()->user->id; ?>" name="TblPromotions[promotion_creator]" id="TblPromotions_promotion_creator" />
            <?php echo date("d/m/Y"); ?>
            <?php echo $form->error($model, 'promotion_create_date'); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'promotion_start_date'); ?>
        </div>
        <div class="col-md-10">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'promotion_start_date',
                'options' => array(
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'yearRange' => '-1:+10',
                    'dateFormat' => 'yy-mm-dd',
                    'value' => date('yy-mm-dd'),
                ),
                'htmlOptions' => array(
                    'style' => 'vertical-align:top',
                    'class' => 'span2',
                ),
            ));
            ?>
            <?php echo $form->error($model, 'promotion_start_date'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'promotion_expire_date'); ?>
        </div>
        <div class="col-md-10">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'promotion_expire_date',
                'options' => array(
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'yearRange' => '-1:+10',
                    'dateFormat' => 'yy-mm-dd',
                    'value' => date('yy-mm-dd'),
                ),
                'htmlOptions' => array(
                    'style' => 'vertical-align:top',
                    'class' => 'span2',
                ),
            ));
            ?>
            <?php echo $form->error($model, 'promotion_expire_date'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'promotion_status'); ?>
        </div>
        <div class="col-md-10">
            <?php echo ZHtml::enumDromDownList($model, 'promotion_status', array('class' => 'span5', 'maxlength' => 8)); ?>
            <?php echo $form->error($model, 'promotion_status'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'promotion_type'); ?>
        </div>
        <div class="col-md-10">
            <?php echo ZHtml::enumDromDownList($model, 'promotion_type', array('class' => 'span5', 'maxlength' => 13)); ?>
            <?php echo $form->error($model, 'promotion_type'); ?>
        </div>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->