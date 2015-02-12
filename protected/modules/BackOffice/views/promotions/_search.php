<?php
/* @var $this PromotionsController */
/* @var $model TblPromotions */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'promotion_title_th'); ?>
        <?php echo $form->textField($model, 'promotion_title_th', array('size' => 60, 'maxlength' => 250)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'promotion_title_en'); ?>
        <?php echo $form->textField($model, 'promotion_title_en', array('size' => 60, 'maxlength' => 250)); ?>
    </div>

    <!--	<div class="row">
    <?php echo $form->label($model, 'promotion_content_th'); ?>
    <?php echo $form->textArea($model, 'promotion_content_th', array('rows' => 6, 'cols' => 50)); ?>
            </div>
    
            <div class="row">
    <?php echo $form->label($model, 'promotion_content_en'); ?>
    <?php echo $form->textArea($model, 'promotion_content_en', array('rows' => 6, 'cols' => 50)); ?>
            </div>-->

    <!--	<div class="row">
    <?php echo $form->label($model, 'promotion_create_date'); ?>
    <?php echo $form->textField($model, 'promotion_create_date'); ?>
            </div>-->

    <div class="row">
        <?php echo $form->label($model, 'promotion_start_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'promotion_start_date',
            'options' => array(
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'yearRange' => '-10:+1',
                'dateFormat' => 'yy-mm-dd',
                'value' => date('yy-mm-dd'),
            ),
            'htmlOptions' => array(
                'style' => 'vertical-align:top',
                'class' => 'span2',
            ),
        ));
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'promotion_expire_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'promotion_expire_date',
            'options' => array(
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'yearRange' => '-10:+1',
                'dateFormat' => 'yy-mm-dd',
                'value' => date('yy-mm-dd'),
            ),
            'htmlOptions' => array(
                'style' => 'vertical-align:top',
                'class' => 'span2',
            ),
        ));
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'promotion_status'); ?>
        <?php echo ZHtml::enumDromDownList($model, 'promotion_status', array('class' => 'span5', 'maxlength' => 8)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'promotion_type'); ?>
        <?php echo ZHtml::enumDromDownList($model, 'promotion_type', array('class' => 'span5', 'maxlength' => 13)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->