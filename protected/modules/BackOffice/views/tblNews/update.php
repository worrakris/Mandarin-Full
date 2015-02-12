<?php
/* @var $this TblNewsController */
/* @var $model TblNews */

$this->pageTitle = "News Management - Update News";
$this->breadcrumbs = array(
    'News Management' => array('admin'),
    'Update News',
);

$this->menu = array(
    array('label' => 'News Management', 'url' => array('admin')),
    array('label' => 'Create News', 'url' => array('create')),
    array('label' => 'View News', 'url' => array('view', 'id' => $model->news_id)),
    array('label' => 'Delete News', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->news_id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<div class="row">
    <div class="col-md-10">
        <h1>Record ID#<?php echo $model->news_id; ?></h1>
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