<?php
/* @var $this StaffController */
/* @var $model StaffManage */

$this->pageTitle = "Staff Management - Create Staff Account";
$this->breadcrumbs = array(
    'Staff Management' => array('admin'),
    'Create Staff Account',
);

$this->menu = array(
    array('label' => 'Staff Management', 'url' => array('admin')),
);
?>
<div class="row">
    <div class="col-md-10">
        <?php $this->renderPartial('_form', array('model'=>$model, 'show'=>true)); ?>
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

