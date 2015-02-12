<?php
/* @var $this SubscriptionController */
/* @var $model SubscriptionManage */

$this->pageTitle = "Subscriber Management";
$this->breadcrumbs = array(
    'Subscriber Management' => array('admin'),
    'Update Subscriber',
);

$this->menu = array(
    array('label' => 'Subscriber Management', 'url' => array('admin')),
    array('label' => 'Delete Subscriber', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->email), 'confirm' => 'Are you sure you want to delete this item?')),
);

?>
<div class="row">
    <div class="col-md-10">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
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

