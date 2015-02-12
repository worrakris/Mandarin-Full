<?php
/* @var $this GalleryController */
/* @var $model GalleryManage */

$this->pageTitle = "Gallery Management - Update Image Description";
$this->breadcrumbs = array(
    'Gallery Management' => array('admin'),
    'Update Image Description',
);

$this->menu = array(
    array('label' => 'Gallery Management', 'url' => array('admin')),
    array('label' => 'Add More Image', 'url' => array('create')),
    array('label' => 'Remove Image', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->gallery_id), 'confirm' => 'Are you sure you want to delete this item?')),
);

?>

<div class="row">
    <div class="col-md-10">
        <?php $this->renderPartial('_form_update', array('model'=>$model)); ?>
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
