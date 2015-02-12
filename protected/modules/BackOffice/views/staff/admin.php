<?php
/* @var $this StaffController */
/* @var $model StaffManage */

$this->pageTitle = "Staff Management";
$this->breadcrumbs = array(
    'Staff Management',
);

$this->menu = array(
    array('label' => 'Create Staff Account', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#staff-manage-grid').yiiGridView('update', {
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

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'staff-manage-grid',
            'emptyText' => '<center>--- NOT FOUND --</center>',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                array(
                    'name' => 'staff_id',
                    'value' => '$data->staff_id',
                    'filter' => false,
                    'htmlOptions' => array('style' => 'width: 5%; text-align: center;'),
                ),
                'staff_name_th',
//                'staff_name_en',
                'staff_position',
                'staff_email',
//                'staff_tel',
//                'staff_create_date',
//                'staff_update_date',
                array(
                    'name' => 'staff_username',
                    'value' => '$data->staff_username',
                    'htmlOptions' => array('style' => 'width: 10%;'),
                ),
//                'staff_password',
                array(
                    'name' => 'staff_status',
                    'value' => function($data) {
                if ($data->staff_status === 'Active') {
                    return '<span class="label label-success">' . $data->staff_status . '</span>';
                } else {
                    return '<span class="label label-danger">' . $data->staff_status . '</span>';
                }
            },
                    'type' => 'raw',
                    'filter' => false,
                    'htmlOptions' => array('style' => 'width: 5%; text-align: center;'),
                ),
//                'staff_type_id',
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{update} {delete}',
                    'buttons' => array(
                        'update' => array(
                            'label' => '<i class="ion ion-compose"></i>',
                            'imageUrl' => false,
                            'options' => array('title' => 'Update'),
                        ),
                        'delete' => array(
                            'label' => '<i class="ion ion-trash-a"></i>',
                            'imageUrl' => false,
                            'options' => array('title' => 'Delete'),
                        ),
                    ),
                    'htmlOptions' => array('style' => 'width: 5%; font-size: 14pt; text-align: center'),
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