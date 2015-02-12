<?php /* @var $this Controller */ ?>
<?php
ob_start();
$session = new CHttpSession;
$session->open();

$http = new CHttpRequest;
Yii::app()->user->returnUrl = $http->getUrl();

$baseUrl = Yii::app()->request->baseUrl;

$lang = Yii::app()->session['sess_lang'];
if (empty($lang)) {
    Yii::app()->language = 'th';
    $cur_lang = 'th';
} else {
    Yii::app()->language = $lang;
    $cur_lang = $lang;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content="โรงแรมแมนดารินโกลเด้นวัลเลย์ แอนด์ รีสอร์ท เป็นโรงแรมระดับ 4 ดาว ตั้งอยู่ท่ามกลางธรรมชาติอันสวยงาม 
              ในบรรยากาศที่ร่มรื่นและเขียวขจีของหมู่แมกไม้ ซึ่งรายล้อมด้วยขุนเขาใหญ่น้อยอันตระการ ในเขตวนอุทยานแห่งชาติเขาใหญ่
              โรงแรมแมนดารินโกลเด้นวัลเลย์ แอนด์ รีสอร์ท มีสิ่งอำนวยความสะดวกที่เพียบพร้อมและครบครัน กอปรกับการบริการอย่างละเมียด 
              ที่เปี่ยมล้นด้วยไมตรีและรอยยิ้มของพนักงานผู้ซึ่งได้รับการฝึกฝนมาอย่างดี ด้วยระยะทางเพียง 165 กิโลเมตรจากกรุงเทพฯ 
              ท่านจึงสามารถขับรถถึงได้ในหนึ่งเพลิน ดังนั้น โรงแรมแมนดารินโกลเด้นวัลเลย์ แอนด์ รีสอร์ท เขาใหญ่ จึงเหมาะอย่างยิ่งสำหรับการพักผ่อนของท่านในวันว่าง 
              ไม่ว่าจะเป็นการส่วนตัว เป็นครอบครัวหรือหมู่คณะ" name="description" />
        <meta content="แมนดาริน, Mandarin, เขาใหญ่, Khaoyai, แมนดารินเขาใหญ่, Mandarin Khaoyai, โรงแรม 4 ดาว, อัครสถาน, Hotel" name="Keywords" />
        <meta name="robots" content="index,follow" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <!--Custom CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/bootstrap.min.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/jquery.fullPage.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/customCss.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/jquery.mCustomScrollbar.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/lightbox.css" />
        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/bootstrap-combined.min.css" />-->

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/jquery-1.11.0.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/jquery-ui-1.10.4.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/vendors/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/jquery.fullPage.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/lightbox-2.6.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/jquery.mCustomScrollbar.js"></script>
<!--<script src="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>-->
        <!--[if lt IE 9]>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/lightview/js/excanvas/excanvas.js"></script>
        <![endif]-->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/lightview/js/spinners/spinners.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/lightview/js/lightview/lightview.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/lightview/css/lightview/lightview.css"/>

        <script type="text/javascript" >
            $(document).ready(function() {
                containerHeight = $(window).height();
                formHeight = 0.60 * containerHeight;

                $("#wrapper").css({"height": formHeight});
                $("#wrapper").css({"min-height": formHeight});
                $("#overviewText").css({"height": formHeight});
                $("#overviewText").css({"min-height": formHeight});
                $("#overviewText2").css({"height": formHeight});
                $("#overviewText2").css({"min-height": formHeight});
                $("#overviewText3").css({"height": formHeight});
                $("#overviewText3").css({"min-height": formHeight});
                $("#overviewText4").css({"height": formHeight});
                $("#overviewText4").css({"min-height": formHeight});
                $("#overviewText5").css({"height": formHeight});
                $("#overviewText5").css({"min-height": formHeight});
                $("#overviewText6").css({"height": formHeight});
                $("#overviewText6").css({"min-height": formHeight});
                $("#overviewText7").css({"height": formHeight});
                $("#overviewText7").css({"min-height": formHeight});
                $("#overviewText8").css({"height": formHeight});
                $("#overviewText8").css({"min-height": formHeight});
                $("#overviewText9").css({"height": formHeight});
                $("#overviewText9").css({"min-height": formHeight});
                $("#conPanels").css({"height": formHeight});
                $("#conPanels").css({"min-height": formHeight});

                $('#fullpage').fullpage({
                    menu: '#menu',
                    anchors: ['Home', 'Seminar', 'Facilities', 'RoomRate', 'Gallery', 'Investors', 'Contact'],
                    autoScrolling: true,
                    //easing: 'easeOutBack',
                    //css3: true,
                    verticalCentered: false,
                    scrollOverflow: true
                });

                $("#overviewText").mCustomScrollbar({
                    theme: "light"
                });
                $("#overviewText2").mCustomScrollbar({
                    theme: "light"
                });
                $("#overviewText3").mCustomScrollbar({
                    theme: "light"
                });
                $("#overviewText4").mCustomScrollbar({
                    theme: "light"
                });
                $("#overviewText5").mCustomScrollbar({
                    theme: "light"
                });
                $("#overviewText6").mCustomScrollbar({
                    theme: "light"
                });
                $("#overviewText7").mCustomScrollbar({
                    theme: "light"
                });
                $("#overviewText8").mCustomScrollbar({
                    theme: "light"
                });
                $("#overviewText9").mCustomScrollbar({
                    theme: "light",
                    advanced: {
                        autoScrollOnFocus: false,
                        updateOnContentResize: true,
                        updateOnBrowserResize: true
                    }
                });
                $("button#submit").click(function() {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::app()->request->baseUrl; ?>/protected/views/site/subscribe.php",
                        data: $('form.subscribe').serialize(),
                        success: function(msg) {
                            if (msg !== "error") {
                                $("#subscribeDiv").html(msg);
                                $("#form-subscribe").modal('hide');
                            } else {
                                alert("Wrong e-mail, please check your e-mail format.");
                            }
                        }
                    });

                });

                $('#subscribeBtn').click(function() {
                    $('#form-subscribe').modal({show: true});
                });
            });
        </script>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body style="background-color: #ccc;">
        <div id="Mheader">
            <div id="langBar">
                <?php
                if ($cur_lang == 'th') {
                    echo 'TH | ';
                    echo CHtml::link('EN', array('setlanguage', 'lang' => 'en'));
                } else {
                    echo CHtml::link('TH', array('setlanguage', 'lang' => 'th'));
                    echo " | EN";
                }
                ?>
            </div>
            <div id="resBox">
                <span><?php echo Yii::t('translateWord', 'Reservation'); ?></span>
            </div>
            <div id="logoPNG">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_bg.png" style="width: 100%"></img>
            </div>
            <ul id="menu">
                <li data-menuanchor="Home" class="active"><?php echo CHtml::link(Yii::t('translateWord', 'Home'), "#Home"); ?></li>
                <li data-menuanchor="Seminar" ><?php echo CHtml::link(Yii::t('translateWord', 'Seminar'), "#Seminar"); ?></li>
                <li data-menuanchor="Facilities" ><?php echo CHtml::link(Yii::t('translateWord', 'Facilities'), "#Facilities"); ?></li>
                <li data-menuanchor="RoomRate" ><?php echo CHtml::link(Yii::t('translateWord', 'Room'), "#RoomRate"); ?></li>
                <li data-menuanchor="Gallery" ><?php echo CHtml::link(Yii::t('translateWord', 'Gallery'), "#Gallery"); ?></li>
                <li data-menuanchor="Investors" ><?php echo CHtml::link(Yii::t('translateWord', 'Investor'), "#Investors"); ?></li>
                <li data-menuanchor="Contact" ><?php echo CHtml::link(Yii::t('translateWord', 'ContactUs'), "#Contact"); ?></li>
            </ul>
        </div>

        <div id="fullpage">

            <?php echo $content; ?>
            <div class="clear"></div>

        </div><!-- fullpage -->

        <div id="Mfooter">
            <div style="position: fixed; margin-left: 0;">
                Copyright &copy; <?php echo date('Y'); ?> by MANDARIN GOLDEN VALLEY HOTEL AND RESORT (KHAO YAI). All Rights Reserved.<br/>Power By M-Tech Dreams co.,ltd.
            </div>

            <div style="position: absolute; bottom: 0; right: 0; float: left; display: table; padding: 8px;">
                <div id="subscribeDiv" style="display: table-cell">
                    <a data-toggle="modal" href="#form-subscribe" id="subscribeBtn">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-letter.png" />
                    </a>
                </div>
                <div style="display: table-cell; padding-left: 4px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-Facebook.png" /></div>
                <div style="display: table-cell; padding-left: 4px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-Twitter.png" /></div>
                <div style="display: table-cell; padding-left: 4px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-Instagram.png" /></div>
                <div style="display: table-cell; padding-left: 4px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-Pinterest.png" /></div>
                <div style="display: table-cell; padding-left: 4px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-Blogger.png" /></div>
            </div>

        </div><!-- footer -->

        <div class="modal fade" id="form-subscribe">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"><?php echo Yii::t('translateWord', 'SubscribeTitle'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo Yii::t('translateWord', 'SubscribeIntro'); ?>
                        <form class="subscribe">
                            <fieldset>
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input name="email" type="text" class="form-control" placeholder="Your E-mail" />
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="submit">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<!-- model content -->	
