<?php
/* @var $this GalleryController */
/* @var $model GalleryManage */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'gallery-manage-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        $src = Yii::app()->request->baseUrl . "/images/gallery/" . $model->gallery_image;
        $alt = "/images/gallery/" . $model->gallery_image;
        echo CHtml::image($src, $alt, array('style' => 'width: 50%;'));
        ?>
        
        <input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="GalleryManage[gallery_update_date]" id="GalleryManage_gallery_update_date" />
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'gallery_capt_th'); ?>
        <?php echo $form->textField($model, 'gallery_capt_th', array('size' => 60, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'gallery_capt_th'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'gallery_capt_en'); ?>
        <?php echo $form->textField($model, 'gallery_capt_en', array('size' => 60, 'maxlength' => 250)); ?>
        <?php echo $form->error($model, 'gallery_capt_en'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->