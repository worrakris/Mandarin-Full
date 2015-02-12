<?php
/* @var $this TblNewsController */
/* @var $model TblNews */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <!--	<div class="row">
    <?php echo $form->label($model, 'news_id'); ?>
    <?php echo $form->textField($model, 'news_id', array('size' => 10, 'maxlength' => 10)); ?>
            </div>-->

    <div class="row">
        <?php echo $form->label($model, 'news_title_th'); ?>
        <?php echo $form->textField($model, 'news_title_th', array('size' => 60, 'maxlength' => 250)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'news_title_en'); ?>
        <?php echo $form->textField($model, 'news_title_en', array('size' => 60, 'maxlength' => 250)); ?>
    </div>

<!--    <div class="row">
        <?php echo $form->label($model, 'news_content_th'); ?>
        <?php echo $form->textArea($model, 'news_content_th', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'news_content_en'); ?>
        <?php echo $form->textArea($model, 'news_content_en', array('rows' => 6, 'cols' => 50)); ?>
    </div>-->

    <!--	<div class="row">
    <?php echo $form->label($model, 'news_picture'); ?>
    <?php echo $form->textField($model, 'news_picture', array('size' => 60, 'maxlength' => 250)); ?>
            </div>-->

    <div class="row">
        <?php echo $form->label($model, 'news_expire_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'news_expire_date',
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
        <?php echo $form->label($model, 'news_update_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'news_update_date',
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
<!--    <div class="row">
<?php echo $form->label($model, 'news_update_date'); ?>
        <?php echo $form->textField($model, 'news_update_date'); ?>
    </div>-->

    <div class="row">
<?php echo $form->label($model, 'news_status'); ?>

        <?php echo ZHtml::enumDromDownList($model, 'news_status', array('class'=>'span5', 'maxlength'=>8)); ?>

    </div>

<!--    <div class="row">
<?php echo $form->label($model, 'news_creator'); ?>
        <?php echo $form->textField($model, 'news_creator', array('size' => 10, 'maxlength' => 10)); ?>
    </div>-->

    <div class="row buttons">
<?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->