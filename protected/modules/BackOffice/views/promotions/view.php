<?php
/* @var $this PromotionsController */
/* @var $model TblPromotions */
$this->pageTitle = "Promotion Management - Record ID#" . $model->promotion_id;
$this->breadcrumbs = array(
    'Promotion Management' => array('admin'),
    'Record#' . $model->promotion_id,
);

$this->menu = array(
    array('label' => 'Promotion Management', 'url' => array('admin')),
    array('label' => 'Create Promotion', 'url' => array('create')),
    array('label' => 'Update Promotion', 'url' => array('update', 'id' => $model->promotion_id)),
    array('label' => 'Delete Promotion', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->promotion_id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<div class="row">
    <div class="col-md-10">
        <h1>Record ID#<?php echo $model->promotion_id; ?></h1>

        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'attributes' => array(
                'promotion_id',
                'promotion_title_th',
                'promotion_title_en',
                'promotion_content_th',
                'promotion_content_en',
                 array(
                    'name' => 'promotion_picture',
                    'type' => 'raw',
                    'value' => CHtml::image(Yii::app()->request->baseUrl . "/images/upload/promotion/" . $model->promotion_picture, "", array('width' => '40%')),
                ),
                'promotion_create_date',
                'promotion_start_date',
                'promotion_expire_date',
                'promotion_update_date',
                'promotion_status',
                'promotion_type',
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

