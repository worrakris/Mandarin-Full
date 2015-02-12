<?php
/* @var $this StaffController */
/* @var $model StaffManage */
$show = true;

if (Yii::app()->user->id === $model->staff_id && !Yii::app()->user->isAdmin()) {
    $show = false;
}

$this->pageTitle = "Staff Profile";

if ($show) {
    $this->breadcrumbs = array(
        'Staff Management' => array('admin'),
        'Staff Profile',
    );
}

$this->menu = array(
    array('label' => 'Staff Management', 'url' => array('admin')),
    array('label' => 'Create Staff Account', 'url' => array('create')),
    array('label' => 'Delete Staff Account', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->staff_id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>
<div class="row">
    <div class="col-md-10">
        <?php $this->renderPartial('_form', array('model' => $model, 'show' => $show)); ?>
    </div>
    <?php if ($show) { ?>
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
    <?php } ?>
</div>


