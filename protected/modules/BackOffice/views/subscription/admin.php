<?php
/* @var $this SubscriptionController */
/* @var $model SubscriptionManage */

$this->pageTitle = "Subscriber Management";
$this->breadcrumbs = array(
    'Subscriber Management',
);

$this->menu = array(
    array('label' => 'E-Newsletter', 'url' => array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subscription-manage-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
    <div class="col-lg-10 col-md-10">
        <p>
            You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
            or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
        </p>

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'subscription-manage-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'email',
                'subscribe_date',
                'status',
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{update}  {delete}',
                    'buttons' => array(
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
    <div class="col-lg-2 col-md-2">
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