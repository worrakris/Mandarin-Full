<?php
/* @var $this TblNewsController */
/* @var $model TblNews */

$this->pageTitle = "News Management - Create News";
$this->breadcrumbs = array(
    'News Management' => array('admin'),
    'Create News',
);

$this->menu = array(
    array('label' => 'News Management', 'url' => array('admin')),
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