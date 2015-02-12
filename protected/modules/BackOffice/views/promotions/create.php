<?php
/* @var $this PromotionsController */
/* @var $model TblPromotions */

$this->pageTitle = "Promotion Management - Create Promotion";
$this->breadcrumbs = array(
    'Promotion Management' => array('admin'),
    'Create Promotion',
);

$this->menu = array(
    array('label' => 'Promotion Management', 'url' => array('admin')),
);

?>
<div class="row">
    <div class="col-md-10">
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