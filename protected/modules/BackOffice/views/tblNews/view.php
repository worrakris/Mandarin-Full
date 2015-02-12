<?php
/* @var $this TblNewsController */
/* @var $model TblNews */
$this->pageTitle = "News Management - Record ID#" . $model->news_id;
$this->breadcrumbs = array(
    'News Management' => array('admin'),
    'Record#' . $model->news_id,
);

$this->menu = array(
    array('label' => 'News Management', 'url' => array('admin')),
    array('label' => 'Create News', 'url' => array('create')),
    array('label' => 'Update News', 'url' => array('update', 'id' => $model->news_id)),
    array('label' => 'Delete News', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->news_id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<div class="row">
    <div class="col-md-10">
        <h1>Record ID#<?php echo $model->news_id; ?></h1>
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'attributes' => array(
                'news_id',
                'news_title_th',
                'news_title_en',
                'news_content_th',
                'news_content_en',
                array(
                    'name' => 'news_picture',
                    'type' => 'raw',
                    'value' => CHtml::image(Yii::app()->request->baseUrl . "/images/upload/news/" . $model->news_picture, "", array('width' => '40%')),
                ),
                'news_create_date',
                'news_expire_date',
                'news_update_date',
                'news_status',
            ),
        ));
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

