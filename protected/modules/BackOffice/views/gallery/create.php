<?php
/* @var $this GalleryController */
/* @var $model GalleryManage */

$this->pageTitle = "Gallery Management - Add More Images";
$this->breadcrumbs = array(
    'Add More Images',
);

$this->menu = array(
    array('label' => 'Gallery Management', 'url' => array('admin')),
);
?>
<div class="row">
    <div class="col-md-10">
        <h3>Please choose image.</h3>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'gallery-upload-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));

        $this->widget('CMultiFileUpload', array(
//            'model' => $model,
//            'attribute' => 'gallery_image',
            'name' => 'gallery_image',
            'accept' => 'jpeg|jpg|gif|png',
            'duplicate' => 'Dupplicate File!!',
            'denied' => 'Invalid file type.',
            'max' => 10,
            'remove' => Yii::t('ui', 'Remove'),
        ));
        ?>

        <input type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" name="GalleryManage[gallery_update_date]" id="GalleryManage_gallery_update_date" />
        <br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Upload' : 'Save'); ?>

        <?php
        $this->endWidget();
        ?>
    </div>
    <div class="col-md-2">
        <div class="span-5 last">
            <div id="sidebar">
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'operations'),
                ));
                $this->endWidget();
                ?>
            </div><!-- sidebar -->
        </div>
    </div>
</div>