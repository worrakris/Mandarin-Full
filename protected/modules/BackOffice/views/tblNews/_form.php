<?php
/* @var $this TblNewsController */
/* @var $model TblNews */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tbl-news-form',
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
            <?php echo $form->labelEx($model, 'news_title_th'); ?>
        </div>
        <div class="col-md-10">
            <?php echo $form->textField($model, 'news_title_th', array('size' => 60, 'maxlength' => 250)); ?>
            <?php echo $form->error($model, 'news_title_th'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'news_title_en'); ?>
        </div>
        <div class="col-md-10">
            <?php echo $form->textField($model, 'news_title_en', array('size' => 60, 'maxlength' => 250)); ?>
            <?php echo $form->error($model, 'news_title_en'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'news_content_th'); ?>
        </div>
        <div class="col-md-10">
            <?php echo $form->textArea($model, 'news_content_th', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'news_content_th'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'news_content_en'); ?>
        </div>
        <div class ="col-md-10">
            <?php echo $form->textArea($model, 'news_content_en', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'news_content_en'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'news_picture'); ?>
        </div>
        <div class ="col-md-10">
            <?php echo $form->fileField($model, 'news_picture'); ?>
            <?php echo $form->error($model, 'news_picture'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'news_create_date'); ?>
        </div>
        <div class="col-md-10">
            <input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="TblNews[news_create_date]" id="TblNews_news_create_date" />
            <input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="TblNews[news_update_date]" id="TblNews_news_update_date" />
            <input type="hidden" value="<?php echo Yii::app()->user->id; ?>" name="TblNews[news_creator]" id="TblNews_news_creator" />
            <?php echo date("d/m/Y"); ?>
            <?php echo $form->error($model, 'news_create_date'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'news_expire_date'); ?>
        </div>
        <div class="col-md-10">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'news_expire_date',
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
            <?php echo $form->error($model, 'news_expire_date'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'news_status'); ?>
        </div>
        <div class="col-md-10">
            <?php echo ZHtml::enumDromDownListUpdate($model, 'news_status', array('class' => 'span5', 'maxlength' => 8)); ?>

            <?php echo $form->error($model, 'news_status'); ?>
        </div>
    </div>

    

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->