<?php
/* @var $this DefaultController */
$this->pageTitle = Yii::app()->name;
$baseUrl = Yii::app()->request->baseUrl;
$today = date("m/d/Y");
$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="row clearfix">
    <div class="col-lg-2 col-md-2 clear">

    </div>
    <div class="col-lg-8 col-md-8" >
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'frmStep1',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
//                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>
        <div class="panel panel-success">
            <div class="panel-heading"><h3> <?php echo Yii::t('bookingWord', 'tab1Head'); ?><small><?php echo Yii::t('bookingWord', 'tab1HeadDesc'); ?></small></h3></div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-2">
                        <b><?php echo Yii::t('bookingWord', 'tab1Check'); ?></b>
                    </div>
                    <div class="col-md-10">
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'checkInDate',
                            'language' => Yii::app()->language,
                            'options' => array(
                                'changeMonth' => 'true',
                                'changeYear' => 'true',
                                'yearRange' => '0:+1',
                                'minDate' => $today,
                                'dateFormat' => 'mm/dd/yy',
                                'value' => date('mm/dd/yy'),
                            ),
                            'htmlOptions' => array(
                                'style' => 'vertical-align:top; cursor: pointer;',
                                'class' => 'span2',
                            ),
                        ));
                        ?>
                        <small><?php echo Yii::t('bookingWord', 'tab1hint1'); ?></small>
                    </div>
                </div>
                <div class="row clear">&nbsp;</div>
                <div class="row">
                    <div class="col-md-2">
                        <b><?php echo Yii::t('bookingWord', 'tab1Night'); ?></b>
                    </div>
                    <div class="col-md-10">
                        <?php
                        $d = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30);
                        echo CHtml::dropDownList('mdlStep01[totalNight]', 2, $d);
                        ?>
                    </div>
                </div>
                <div class="row clear">&nbsp;</div>
                <div class="row">
                    <div class="col-md-2">
                        <b><?php echo Yii::t('bookingWord', 'tab1Out'); ?></b>
                    </div>
                    <div class="col-md-10">
                        <input type="hidden" name="mdlStep01[checkOutDate]" id="mdlStep01_checkOutDate" value="<?php echo date("m/d/Y"); ?>" />
                        <span id="abc"><?php echo date("m/d/Y"); ?></span>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-default btn-lg">
                    Search <span class="glyphicon glyphicon-chevron-right"></span>
                </button>
            </div>
        </div>
        <?php $this->endWidget(); ?>
        <div class="alert alert-danger alert-dismissible" role="alert" id="warnAlert">
<!--            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
            <strong>Warning!</strong>&nbsp;<?php echo Yii::t('bookingWord', 'tab1Warn1'); ?>
        </div>
    </div>
    <div class="col-lg-2 col-md-2">

    </div>
</div>

<script>
    $(document).ready(function() {
        $('#warnAlert').hide();
        $('#mdlStep01_checkInDate').attr('readonly', true);

        $('#mdlStep01_checkInDate').on('change', function() {
            $('#warnAlert').hide();
            var std = new Date($('#mdlStep01_checkInDate').val());
            var cod = new Date(std);
            cod.setDate(cod.getDate() + parseInt($('#mdlStep01_totalNight').val()));
            var mm = (cod.getMonth() + 1);
            if (mm < 10) {
                mm = "0" + mm;
            }
            var dd = cod.getDate();
            if (dd < 10) {
                dd = "0" + dd;
            }
            var choD = mm + "/" + dd + "/" + cod.getFullYear();
            $('#abc').text(choD);
            $('#mdlStep01_checkOutDate').val(choD);
        });

        $('#mdlStep01_totalNight').on('change', function() {
            var std = new Date($('#mdlStep01_checkInDate').val());
            var cod = new Date(std);
            cod.setDate(cod.getDate() + parseInt($('#mdlStep01_totalNight').val()));
            var mm = (cod.getMonth() + 1);
            if (mm < 10) {
                mm = "0" + mm;
            }
            var dd = cod.getDate();
            if (dd < 10) {
                dd = "0" + dd;
            }
            var choD = mm + "/" + dd + "/" + cod.getFullYear();
            $('#abc').text(choD);
            $('#mdlStep01_checkOutDate').val(choD);
        });

        $('#frmStep1').on('submit', function() {
            if ($('#mdlStep01_checkInDate').val() === '') {
                $('#warnAlert').show();
                return false;
            }
            return true;
        });
    });
</script>