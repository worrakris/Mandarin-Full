<?php
/* @var $this PromotionsController */
/* @var $model TblPromotions */

$this->pageTitle = "Promotion Management - Update Promotion";
$this->breadcrumbs = array(
    'Promotion Management' => array('admin'),
    'Update Promotion',
);

$this->menu = array(
    array('label' => 'Promotion Management', 'url' => array('admin')),
    array('label' => 'Create Promotion', 'url' => array('create')),
    array('label' => 'View Promotion', 'url' => array('view', 'id' => $model->promotion_id)),
    array('label' => 'Delete Promotion', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->promotion_id), 'confirm' => 'Are you sure you want to delete this item?')),
);

?>

<div class="row">
    <div class="col-md-10">
        <h1>Record ID#<?php echo $model->promotion_id; ?></h1>
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
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