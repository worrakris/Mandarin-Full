<?php
/* @var $this PromotionsController */
/* @var $model TblPromotions */

$this->pageTitle = "Promotion Management";
$this->breadcrumbs = array(
    'Promotion Management',
);

$this->menu = array(
    array('label' => 'Create Promotion', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-promotions-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
    <div class="col-md-10">
        <p>
            You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
            or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
        </p>

        <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
        <div class="search-form" style="display:none">
            <?php
            $this->renderPartial('_search', array(
                'model' => $model,
            ));
            ?>
        </div><!-- search-form -->

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'tbl-promotions-grid',
            'emptyText' => '<center>--- NOT FOUND --</center>',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                array(
                    'name' => 'promotion_id',
                    'value' => '$data->promotion_id',
                    'filter' => false,
                ),
                array(
                    'name' => 'promotion_title_th',
                    'value' => '(mb_substr($data->promotion_title_th, 0, 50, "UTF-8") . ((mb_strlen($data->promotion_title_th, "UTF-8") > 50) ? "..." : ""))'
                ),
                array(
                    'name' => 'promotion_title_en',
                    'value' => '(mb_substr($data->promotion_title_en, 0, 50, "UTF-8") . ((mb_strlen($data->promotion_title_en, "UTF-8") > 50) ? "..." : ""))'
                ),
                array(
                    'name' => 'promotion_content_th',
                    'value' => '(mb_substr($data->promotion_content_th, 0, 100, "UTF-8") . ((mb_strlen($data->promotion_content_th, "UTF-8") > 100) ? "..." : ""))'
                ),
                array(
                    'name' => 'promotion_content_en',
                    'value' => '(mb_substr($data->promotion_content_en, 0, 100, "UTF-8") . ((mb_strlen($data->promotion_content_en, "UTF-8") > 100) ? "..." : ""))'
                ),
                 array(
                    'name' => 'promotion_start_date',
                    'value' => 'Yii::app()->dateFormatter->format("dd-MM-y", strtotime($data->promotion_start_date))',
                    'filter' => false,
                ), 
                array(
                    'name' => 'promotion_expire_date',
                    'value' => 'Yii::app()->dateFormatter->format("dd-MM-y", strtotime($data->promotion_expire_date))',
                    'filter' => false,
                ), /*
                'promotion_title_th',
                'promotion_title_en',
                'promotion_content_th',
                'promotion_content_en',
                'promotion_picture',
                
                  'promotion_create_date',
                  'promotion_start_date',
                  'promotion_expire_date',
                  'promotion_update_date',
                  'promotion_status',
                  'promotion_creator',
                  'promotion_type',
                 */
                 array(
                    'class' => 'CButtonColumn',
                    'template' => '{view} {update} {delete}',
                    'buttons' => array(
                        'view' => array(
                            'label' => '<i class="fa fa-search"></i>',
                            'imageUrl' => false,
                            'options' => array('title' => 'View'),
                        ),
                        'update' => array(
                            'label' => '<i class="fa fa-edit"></i>',
                            'imageUrl' => false,
                            'options' => array('title' => 'Update'),
                        ),
                        'delete' => array(
                            'label' => '<i class="fa fa-trash-o"></i>',
                            'imageUrl' => false,
                            'options' => array('title' => 'Delete'),
                        ),
                    ),
                ),
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