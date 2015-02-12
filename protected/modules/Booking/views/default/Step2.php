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
            'id' => 'frmStep2',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
//                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>
        <div class="panel panel-success">
            <div class="panel-heading"><h3> <?php echo Yii::t('bookingWord', 'tab2Head'); ?><small><?php echo Yii::t('bookingWord', 'tab2HeadDesc'); ?></small></h3></div>
            <div class="panel-body">
                <div class="alert alert-info" role="alert">
                <!--            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
                    <?php
                    $stDate = strtotime(Yii::app()->session['checkin']);
                    $enDate = strtotime(Yii::app()->session['checkout']);
                    echo Yii::app()->dateFormatter->formatDateTime($stDate, "long", null) . " - " . Yii::app()->dateFormatter->formatDateTime($enDate, "long", null) . "&nbsp;&nbsp;&nbsp;(" . Yii::app()->session['night'] . Yii::t('bookingWord', 'tab2Night') . ")";
                    ?>
                </div>
                <div class="row" id="wrapperRoom">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <?php
                        $cItem = count($roomAvailable);
                        foreach ($roomAvailable as $rTypeID => $roomDesc) {
                            ?>
                            <div class="media">
                                <p class="pull-left">
                                    <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+" style="width: 64px; height: 64px;">
                                </p>
                                <div class="media-body">
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <h4 class="media-heading"><?php echo $roomDesc['room_type_name']; ?></h4>
                                        <?php echo $roomDesc['room_type_desc']; ?><?php echo $roomDesc['room_type_extra_bed']; ?>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1" align="center">
                                        <h5><?php echo Yii::t('bookingWord', 'condition'); ?></h5>
                                        <?php
                                        $quotaCond = "";
                                        foreach ($roomDesc['quota_condition'] as $cond) {
                                            $quotaCond .= "- " . $cond . "\n";
                                        }
                                        ?>
                                        <span class="glyphicon glyphicon-info-sign" title="<?php echo $quotaCond; ?>" style="cursor: help"></span>
                                        <span class="glyphicon glyphicon-user" title="<?php echo $roomDesc['room_type_max_person']; ?>"  style="cursor: help"></span>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2" align="center">
                                        <h5><?php echo Yii::t('bookingWord', 'roomNo'); ?></h5>
                                        <?php
                                        $d = array();
                                        for ($k = 0; $k <= $roomDesc['available_room']; $k++) {
                                            array_push($d, $k);
                                        }
                                        echo CHtml::dropDownList('mdlStep02[totalNight]', 0, $d);
                                        echo CHtml::checkBox('mdlStep02[extraBed]');
                                        echo Yii::t('bookingWord', 'extraBed');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>                       
                    </div>
                </div>
                <div class="row clear">&nbsp;</div>
                <div class="row">

                </div>
                <div class="row clear">&nbsp;</div>
                <div class="row">

                </div>
            </div>
            <div class="panel-footer">
                <button type="none" class="btn btn-default btn-lg previous">
                    <span class="glyphicon glyphicon-chevron-left"></span> Back
                </button>
                <button type="submit" class="btn btn-default btn-lg">
                    Search <span class="glyphicon glyphicon-chevron-right"></span>
                </button>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div class="col-lg-2 col-md-2">

    </div>
</div>

<script>
    $(document).ready(function () {
        containerHeight = $(window).height();
        formHeight = 0.3 * containerHeight;

        $("#wrapperRoom").css({"height": formHeight});

        $("#wrapperRoom").mCustomScrollbar({
            theme: "light"
        });
    });
</script>