<?php
/* @var $this SiteController */

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$this->pageTitle = Yii::app()->name;
$baseUrl = Yii::app()->request->baseUrl;

$dta = array();
$today = date('Y-m-j') . "00:00:00";

// Log Visitor

if (empty(Yii::app()->request->cookies['ip_address'])) {
    $cookie = new CHttpCookie('ip_address', get_client_ip());
    $cookie->expire = strtotime(date('Y-m-j') . "23:59:59");
    Yii::app()->request->cookies['ip_address'] = $cookie;
    $visitorModel = new TblVisitorCounter();
    $visitorModel->ip_address = Yii::app()->request->cookies['ip_address'];
    $visitorModel->log_date = date('Y-m-j');
    $visitorModel->save();
}


// Loading Latest News
$newsProvider = new CActiveDataProvider('TblNews', array(
    'criteria' => array(
        'condition' => 'news_expire_date >=\'' . $today . '\' and news_status=\'Active\'',
        'order' => 'news_update_date DESC'
    )
        ));
$newsProvider->setPagination(false);
$news = array();
$ite = new CDataProviderIterator($newsProvider);
$x = 0;
$allNewsCount = $ite->count();
foreach ($ite as $dta) {
    $news[] = $dta;
    $x++;
    if ($x > 1 || $x >= $ite->count()) {
        break;
    }
}

// Loading Latest Promotion
$promoProvider = new CActiveDataProvider('TblPromotions', array(
    'criteria' => array(
        'condition' => 'promotion_expire_date >=\'' . $today . '\' and promotion_status=\'Active\'',
        'order' => 'promotion_update_date DESC'
    )
        ));
$promoProvider->setPagination(false);
$promotion = array();
$ite = new CDataProviderIterator($promoProvider);
$x = 0;
$allPromotionCount = $ite->count();
foreach ($ite as $dta) {
    $promotion[] = $dta;
    $x++;
    if ($x > 2 || $x >= $ite->count()) {
        break;
    }
}

// Loading gallery data
$dataProvider = new CActiveDataProvider('TblGallery');
$dataProvider->setPagination(false);
$images = array();
$iterator = new CDataProviderIterator($dataProvider);
foreach ($iterator as $dta) {
    $images[] = $dta;
}

// Loading Investor Docs
$dataDocTypeProvider = new CActiveDataProvider('TblInvestDocType', array(
    'criteria' => array(
        'condition' => 'doc_type_status=\'Active\'',
        'order' => 'doc_type_update_date DESC'
    )
        ));
$dataDocTypeProvider->setPagination(false);
$DocType = array();
$iterator1 = new CDataProviderIterator($dataDocTypeProvider);
foreach ($iterator1 as $dta) {
    $DocType[] = $dta;
}

$Doc = array();
$cntDoctype = count($DocType);

for ($i = 0; $i < $cntDoctype; $i++) {
    $id = $DocType[$i]->doc_type_id;

    $dataDocProvider = new CActiveDataProvider('TblInvestDocument', array(
        'criteria' => array(
            'condition' => 'doc_type_id=' . $id . ' AND invest_doc_status=\'Active\'',
            'order' => 'invest_doc_update_date DESC'
        )
    ));
    $dataDocProvider->setPagination(false);
    $Doc[$i] = array();
    $iterator2 = new CDataProviderIterator($dataDocProvider);
    foreach ($iterator2 as $dta) {
        $Doc[$i][] = $dta;
    }
}
?>

<div class="section " id="section0">
    <div id="wrapper">
        <div class="row" style="margin-left: 0px; margin-right: 0px;">
            <div class="col-sm-5" id="conPanels">
                <div style="position: relative; text-align: justify;"  id="overviewText">
                    <p style="font-family: 'CopperFont'; font-size: xx-large; padding-top: 10px;">WELCOME ...</p>
                    <p style="text-align: center;"><?php echo Yii::t("translateWord", "IntroPoet"); ?></p>
                    <p> 
<?php echo Yii::t("translateWord", "IntroParagraph1"); ?><br />
<?php echo Yii::t("translateWord", "IntroParagraph2"); ?><br />
                        <?php echo Yii::t("translateWord", "IntroParagraph3"); ?><br />
                        <?php echo Yii::t("translateWord", "IntroParagraph4"); ?><br />
                    </p>
                </div>

            </div>
            <div class="col-sm-7"  id="conPanels">
                <div style="position: relative;" id="overviewText2">
                    <div>
                        <p style="font-family: 'CopperFont'; font-size: x-large; padding-top: 10px;"><?php echo Yii::t("translateWord", "IntroPromotion"); ?></p>
                    </div>
                    <div class="row" style="margin-left: 0px; margin-right: 0px;">
<?php if (count($promotion) == 0) { ?>
                            <div class="col-sm-12" id="promoDiv">
                                <p id="pHeadline" style="text-align: center;"><?php echo Yii::t("translateWord", "IntroNotPro"); ?></p>
                            </div>
<?php } else { ?>
    <?php for ($x = 0; $x < 3; $x++) { ?>
                                <?php if (isset($promotion[$x])) { ?> 
                                    <div class="col-sm-4" id="promoDiv">
                                        <img src="<?php echo $baseUrl; ?>/images/<?php echo $promotion[$x]->promotion_type; ?>.jpg" />
                                        <p id="pHeadline">
            <?php
            if (Yii::app()->language == "th") {
                echo mb_substr($promotion[$x]->promotion_title_th, 0, 35, "UTF-8");
            } else {
                echo mb_substr($promotion[$x]->promotion_title_en, 0, 35, "UTF-8");
            }
            ?>
                                        </p>
                                        <p id="pDesc">
                                            <?php
                                            if (Yii::app()->language == "th") {
                                                echo mb_substr($promotion[$x]->promotion_content_th, 0, 88, "UTF-8");
                                            } else {
                                                echo mb_substr($promotion[$x]->promotion_content_en, 0, 88, "UTF-8");
                                            }
                                            ?>
                                        </p>
                                    </div>
                                        <?php } else { ?>
                                    <div class="col-sm-4" id="promoDiv">                                       
                                    </div>
                                <?php } ?> 
    <?php } ?>
                        <?php } ?>
                    </div>
                    <div>
                        <p style=" text-align: right;">
<?php
if ($allPromotionCount > 3) {
    echo CHtml::link(Yii::t('translateWord', 'All'), "allPromotion", array('class' => 'showAllBtn'));
}
?>
                        </p>
                    </div>
                    <div>
                        <p style="font-family: 'CopperFont'; font-size: x-large; padding-top: 10px;"><?php echo Yii::t("translateWord", "IntroNews"); ?></p>
                    </div>
                    <div class="row" style="margin-left: 0px; margin-right: 0px;">
<?php if (count($news) == 0) { ?>
                            <div class="col-sm-12" id="newsDiv">
                                <p id="pHeadline" style="text-align: center;"><?php echo Yii::t("translateWord", "IntroNotNews"); ?></p>
                            </div>
<?php } else { ?>
    <?php for ($x = 0; $x < 2; $x++) { ?>
                                <?php if (isset($news[$x])) { ?>
                                    <div class="col-sm-6" id="newsDiv">          
                                        <div class="row">
                                            <div class="col-sm-2" id="dateDiv">
            <?php //echo date("Y-m-d", strtotime($news[$x]->news_create_date));  ?>
                                                <label id="nDate"><?php echo date("d", strtotime($news[$x]->news_create_date)); ?></label>
                                                <label id="nMonth"><?php echo strtoupper(date("M", strtotime($news[$x]->news_create_date))); ?></label>
                                                <label id="nYear"><?php echo date("Y", strtotime($news[$x]->news_create_date)); ?></label>
                                            </div>
                                            <div class="col-sm-10">
                                                <p id="pHeadline">
            <?php
            if (Yii::app()->language == "th") {
                echo mb_substr($news[$x]->news_title_th, 0, 35, "UTF-8");
            } else {
                echo mb_substr($news[$x]->news_title_en, 0, 35, "UTF-8");
            }
            ?>
                                                </p>
                                                <p id="pDesc">
                                                    <?php
                                                    if (Yii::app()->language == "th") {
                                                        echo mb_substr($news[$x]->news_content_th, 0, 88, "UTF-8");
                                                    } else {
                                                        echo mb_substr($news[$x]->news_content_en, 0, 88, "UTF-8");
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        <?php } ?>
    <?php } ?>
                        <?php } ?>
                    </div>
                    <div>
                        <p style=" text-align: right;">
<?php
if ($allNewsCount > 2) {
    echo CHtml::link(Yii::t('translateWord', 'All'), "allPromotion", array('class' => 'showAllBtn'));
}
?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section" id="section1">
    <div id="intro">
        Meeting & Seminar Services
    </div>
    <div id="wrapper">
        <div class="row" style="margin-left: 0px; margin-right: 0px;">
            <div class="col-sm-4" id="conPanels">
                <div style="position: relative; text-align: justify;"  id="overviewText3">
                    <div id="sImage">
                        <img src="<?php echo $baseUrl; ?>/images/seminar/pic1.jpg" style="width: 100%" />
                        <div id="iLabel"><?php echo Yii::t("translateWord", "SeminarBear"); ?></div>
                    </div>
                    <div id="sImage">
                        <img src="<?php echo $baseUrl; ?>/images/seminar/pic2.jpg" style="width: 100%" />
                        <div id="iLabel"><?php echo Yii::t("translateWord", "SeminarPalm"); ?></div>
                    </div>
                    <div id="sImage">
                        <img src="<?php echo $baseUrl; ?>/images/seminar/pic3.jpg" style="width: 100%" />
                        <div id="iLabel"><?php echo Yii::t("translateWord", "SeminarPeacock"); ?></div>
                    </div>
                </div>

            </div>
            <div class="col-sm-8"  id="conPanels">
                <div style="position: relative;" id="overviewText4">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <p><?php echo Yii::t('translateWord', 'SeminarIntro'); ?></p>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <p id="headlineMsg"><?php echo Yii::t('translateWord', 'SeminarCapacity'); ?></p>
                            <table>
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="text-align: center; vertical-align: middle;" ><?php echo Yii::t('translateWord', 'SeminarRoomName'); ?></th>
                                        <th colspan="4" style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'SeminarCapByType'); ?></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'SeminarDinType'); ?></th>
                                        <th style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'SeminarCinemaType'); ?></th>
                                        <th style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'SeminarClassType'); ?></th>
                                        <th style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'SeminarUType'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo Yii::t('translateWord', 'SeminarBear'); ?></td>
                                        <td style=" text-align: center; vertical-align: middle;">220</td>
                                        <td style=" text-align: center; vertical-align: middle;">550</td>
                                        <td style=" text-align: center; vertical-align: middle;">350</td>
                                        <td style=" text-align: center; vertical-align: middle;">200</td>                        
                                    </tr>
                                    <tr>
                                        <td><?php echo Yii::t('translateWord', 'SeminarPalm'); ?></td>
                                        <td style=" text-align: center; vertical-align: middle;">180</td>
                                        <td style=" text-align: center; vertical-align: middle;">250</td>
                                        <td style=" text-align: center; vertical-align: middle;">200</td>
                                        <td style=" text-align: center; vertical-align: middle;">100</td>                           
                                    </tr>
                                    <tr>
                                        <td><?php echo Yii::t('translateWord', 'SeminarPeacock'); ?></td>
                                        <td style=" text-align: center; vertical-align: middle;">80</td>
                                        <td style=" text-align: center; vertical-align: middle;">120</td>
                                        <td style=" text-align: center; vertical-align: middle;">100</td>
                                        <td style=" text-align: center; vertical-align: middle;">80</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <p id="headlineMsg"><?php echo Yii::t('translateWord', 'SeminarRSize'); ?></p>
                            <table >
                                <thead>
                                    <tr>
                                        <th style=" text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'SeminarRoomName'); ?></th>
                                        <th style=" text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'SeminarWidth'); ?></th>
                                        <th style=" text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'SeminarLong'); ?></th>
                                        <th style=" text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'SeminarArea'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo Yii::t('translateWord', 'SeminarBear'); ?></td>
                                        <td style=" text-align: center; vertical-align: middle;">27.00</td>
                                        <td style=" text-align: center; vertical-align: middle;">13.50</td>
                                        <td style=" text-align: center; vertical-align: middle;">364.50</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo Yii::t('translateWord', 'SeminarPalm'); ?></td>
                                        <td style=" text-align: center; vertical-align: middle;">27.00</td>
                                        <td style=" text-align: center; vertical-align: middle;">21.50</td>
                                        <td style=" text-align: center; vertical-align: middle;">310.50</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo Yii::t('translateWord', 'SeminarPeacock'); ?></td>
                                        <td style=" text-align: center; vertical-align: middle;">18.00</td>
                                        <td style=" text-align: center; vertical-align: middle;">9.00</td>
                                        <td style=" text-align: center; vertical-align: middle;">162.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section" id="section2">
    <div id="intro">
        Facilities
    </div>
    <div id="wrapper2">
        <div class="row" style="margin-left: 0px; margin-right: 0px;">
            <div class="col-sm-12" id="conPanels">
                <div style="position: relative; text-align: justify;"  id="overviewText5">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/swim.jpg" style="width: 100%" />
                        </div>
                        <div class="col-sm-8">
                            <p><?php echo Yii::t('translateWord', 'FacilitiesParagraph1'); ?></p>
                            <ul>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesParagraph1List1'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesParagraph1List2'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesParagraph1List3'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesParagraph1List4'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesParagraph1List5'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesParagraph1List6'); ?></li>
                            </ul>
                        </div>
                    </div><br/>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <p id="headlineMsg"><?php echo Yii::t('translateWord', 'FacilitiesRestaurant'); ?></p>
                            <p>&nbsp;&nbsp;&nbsp;<?php echo Yii::t('translateWord', 'FacilitiesRestaurantMsg'); ?></p>
                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic8.jpg" style="width: 49%" />
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic9.jpg" style="width: 49%" />
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic10.jpg" style="width: 49%" />
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic11.jpg" style="width: 49%" />
                        </div>
                    </div>
                    <br />
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <p id="headlineMsg" style="text-align:  left;"><?php echo Yii::t('translateWord', 'FacilitiesAttractions'); ?></p>
                            <p><?php echo Yii::t('translateWord', 'FacilitiesAttractionsMsg'); ?></p>
                            <ul>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesAttractionsMsgList1'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesAttractionsMsgList2'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesAttractionsMsgList3'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesAttractionsMsgList4'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesAttractionsMsgList5'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesAttractionsMsgList6'); ?></li>
                                <li><?php echo Yii::t('translateWord', 'FacilitiesAttractionsMsgList7'); ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic5.jpg" style="width: 100%" />
                        </div>
                        <div class="col-sm-3">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic1.jpg" style="width: 100%" />
                        </div>
                        <div class="col-sm-3">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic4.jpg" style="width: 100%" />
                        </div>
                        <div class="col-sm-3">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic3.jpg" style="width: 100%" />
                        </div>
                    </div>
                    <br />
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic9.jpg" style="width: 100%" />
                        </div>
                        <div class="col-sm-3">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic11.jpg" style="width: 100%" />
                        </div>
                        <div class="col-sm-3">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic10.jpg" style="width: 100%" />
                        </div>
                        <div class="col-sm-3">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/facilities/pic2.jpg" style="width: 100%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section" id="section3">
    <div id="intro">
        Room Rate & Special Offers
    </div>
    <div id="wrapper2">
        <div class="row" style="margin-left: 0px; margin-right: 0px;">
            <div class="col-sm-12" id="conPanels">
                <div style="position: relative; text-align: justify;"  id="overviewText6">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <p><img src="<?php echo Yii::app()->baseUrl; ?>/images/room/pic-head.jpg" style="width: 100%; border: 6px solid #FFF" /></p><br />
                            <p><?php echo Yii::t('translateWord', 'AccomIntro'); ?></p><br />
                            <p id="headlineMsg"><?php echo Yii::t('translateWord', 'AccomPrice'); ?></p>
                            <p>
                            <table>
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="text-align: center; vertical-align: middle;" ></th>
                                        <th colspan="2" style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'AccomFirstSec'); ?></th>
                                        <th colspan="2" style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'AccomSecondSec'); ?></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'AccomWeekday'); ?></th>
                                        <th style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'AccomWeekend'); ?></th>
                                        <th style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'AccomWeekday'); ?></th>
                                        <th style="text-align: center; vertical-align: middle;"><?php echo Yii::t('translateWord', 'AccomWeekend'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Deluxe</td>
                                        <td style=" text-align: center; vertical-align: middle;">1,800</td>
                                        <td style=" text-align: center; vertical-align: middle;">2,300</td>
                                        <td style=" text-align: center; vertical-align: middle;">2,000</td>
                                        <td style=" text-align: center; vertical-align: middle;">2,500</td>                        
                                    </tr>
                                    <tr>
                                        <td>Grand Suite</td>
                                        <td style=" text-align: center; vertical-align: middle;">3,000</td>
                                        <td style=" text-align: center; vertical-align: middle;">3,500</td>
                                        <td style=" text-align: center; vertical-align: middle;">3,000</td>
                                        <td style=" text-align: center; vertical-align: middle;">3,500</td>                           
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                            <p id="headlineMsg"><?php echo Yii::t('translateWord', 'AccomUpgrade'); ?></p>
                            <p><?php echo Yii::t('translateWord', 'AccomUpgradeMsg'); ?></p><br />
                            <p id="headlineMsg"><?php echo Yii::t('translateWord', 'AccomMeal'); ?></p>
                            <p>
                            <table style="width: 50%"> 
                                <tr>
                                    <td style="width: 70%"><?php echo Yii::t('translateWord', 'AccomBreakfast'); ?></td>
                                    <td style="width: 20%; text-align: right; border-right: 0px; padding-right: 2px;">250</td>
                                    <td style="width: 10%; text-align: left; border-left: 0px; padding-left: 1px;"><?php echo Yii::t('translateWord', 'Baht'); ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 70%"><?php echo Yii::t('translateWord', 'AccomLunch'); ?></td>
                                    <td style="width: 20%; text-align: right; border-right: 0px; padding-right: 2px;">350</td>
                                    <td style="width: 10%; text-align: left; border-left: 0px; padding-left: 1px;"><?php echo Yii::t('translateWord', 'Baht'); ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 70%"><?php echo Yii::t('translateWord', 'AccomDinner'); ?></td>
                                    <td style="width: 20%; text-align: right; border-right: 0px; padding-right: 2px;">350</td>
                                    <td style="width: 10%; text-align: left; border-left: 0px; padding-left: 1px;"><?php echo Yii::t('translateWord', 'Baht'); ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 70%"><?php echo Yii::t('translateWord', 'AccomExtra'); ?></td>
                                    <td style="width: 20%; text-align: right; border-right: 0px; padding-right: 2px;">800</td>
                                    <td style="width: 10%; text-align: left; border-left: 0px; padding-left: 1px;"><?php echo Yii::t('translateWord', 'Baht'); ?></td>
                                </tr>
                            </table>
                            </p>
                            <p id="headlineMsg"><?php echo Yii::t('translateWord', 'AccomRemark'); ?></p>
                            <p><?php echo Yii::t('translateWord', 'AccomRemarkMsg'); ?></p><br />
                            <p id="headlineMsg"><?php echo Yii::t('translateWord', 'AccomSurcharge'); ?></p>
                            <p><?php echo Yii::t('translateWord', 'AccomSurchargeMsg'); ?></p><br />
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/room/room1.jpg" style="width: 100%; border: 5px solid white;" />
                                    <div style="position: relative; width: 100%; background-color: white; color: black; font-family: CopperFont;">Deluxe Room</div>
                                </div>
                                <div class="col-sm-5">
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/room/room2.jpg" style="width: 100%; border: 5px solid white;" />
                                    <div style="position: relative; width: 100%; background-color: white; color: black; font-family: CopperFont;">Grand Suite  Room</div>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section" id="section4">
    <div id="intro">
        Gallery
    </div>
    <div id="wrapper">
        <div class="row" style="margin-left: 0px; margin-right: 0px;">
            <div class="col-sm-12" id="conPanels">
                <div style="position: relative; text-align: justify;"  id="overviewText7">
                    <div class="row clearfix">
                        <div class="col-sm-12">
<?php
$pic_cnt = count($images);
for ($i = 0; $i < $pic_cnt; $i++) {
    ?>
                                <div class="col-md-2" style="padding: 8px;">
                                    <a href="<?php echo Yii::app()->baseUrl; ?>/images/gallery/<?php echo $images[$i]->gallery_image; ?>" data-lightbox="mandarin">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/gallery/<?php echo $images[$i]->gallery_image; ?>" style="width: 100%; border: 3px solid #2a2a2a;" />
                                    </a>
                                </div>    
    <?php
}
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section" id="section5">
    <div id="intro">
        Investor Relations
    </div>
    <div id="wrapper2">
        <div class="row" style="margin-left: 0px; margin-right: 0px;">
            <div class="col-sm-12" id="conPanels">
                <div style="position: relative; text-align: justify;"  id="overviewText8">
                    <div class="row clearfix">
                        <div class="col-sm-12">
<?php
for ($i = 0; $i < $cntDoctype; $i++) {
    $cntDoc = count($Doc[$i]);
    if ($cntDoc > 0) {
        ?>
                                    <div style="font-size: 1.25em; font-weight: bold; "> 
                                    <?php
                                    if (Yii::app()->language == 'en') {
                                        echo $DocType[$i]->doc_type_title_en;
                                    } else {
                                        echo $DocType[$i]->doc_type_title_th;
                                    }
                                    ?>
                                    </div>
                                        <?php
                                        for ($j = 0; $j < $cntDoc; $j++) {
                                            ?>
                                        <ul style="list-style: none">
                                            <li>
                                                <span class="glyphicon glyphicon-link"></span>&nbsp;
            <?php
            if (Yii::app()->language == 'en') {
                if (!empty($Doc[$i][$j]->invest_doc_file_en)) {
                    echo "<a href='{$baseUrl}/docs/{$Doc[$i][$j]->invest_doc_file_en}' target=_blank>{$Doc[$i][$j]->invest_doc_title_en}</a>";
                } else {
                    echo $Doc[$i][$j]->invest_doc_title_en;
                }
            } else {
                if (!empty($Doc[$i][$j]->invest_doc_file_th)) {
                    echo "<a href='{$baseUrl}/docs/{$Doc[$i][$j]->invest_doc_file_th}' target=_blank>{$Doc[$i][$j]->invest_doc_title_th}</a>";
                } else {
                    echo $Doc[$i][$j]->invest_doc_title_th;
                }
            }
            echo "&nbsp;&nbsp;({$Doc[$i][$j]->invest_doc_update_date})";
            ?>
                                            </li>
                                        </ul>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section" id="section6">
    <div id="intro">
        Contact Us
    </div>
    <div id="wrapper">
        <div class="row" style="margin-left: 0px; margin-right: 0px;">
            <div class="col-sm-12" id="conPanels">
                <div style="position: relative; text-align: justify;"  id="overviewText9">
                    <div class="row clearfix">
                        <div class="col-sm-5">
                            <h3><?php echo Yii::t('translateWord', 'ContactAddr'); ?></h3>
                            <p><?php echo Yii::t('translateWord', 'HotelName'); ?></p>
                            <p><?php echo Yii::t('translateWord', 'ContactAddress'); ?></p><br/>
                            <h3 class="headlineMsg"><?php echo Yii::t('translateWord', 'ContactHead'); ?></h3>
                            <p><?php echo Yii::t('translateWord', 'HotelName'); ?><br/><?php echo Yii::t('translateWord', 'ContactKYTel'); ?></p>
                            <p><?php echo Yii::t('translateWord', 'ContactBKK'); ?><br/><?php echo Yii::t('translateWord', 'ContactBKKTel'); ?></p>
                        </div>
                        <div class="col-sm-7">
                            <div>
                                <h4><?php echo Yii::t('translateWord', 'ContactMap'); ?></h4>
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/map-small.jpg" style="width: 100%" /><br />
                                Latitude: 14.541895 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Longitude: 101.375443<br />
                                <span class="glyphicon glyphicon-map-marker"></span>
                                <a href="https://www.google.co.th/maps/place/14%C2%B032'30.8%22N+101%C2%B022'31.6%22E/@14.5418889,101.3754444,15z/data=!3m1!4b1!4m2!3m1!1s0x0:0x0" target=_blank >
                                    Open in Google Map.
                                </a>
                            </div><br />
                            <div>
                                <h4><?php echo Yii::t('translateWord', 'ContactSendQuestion'); ?></h4>
                                <p><?php echo Yii::t('translateWord', 'ContactFormIntro'); ?></p>
<?php if (Yii::app()->user->hasFlash('contact')) { ?>
                                    <div class="flash-success"><?php echo Yii::app()->user->getFlash('contact'); ?></div>
                                <?php } else { ?>
                                    <div class="form">
                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'contact-form',
                                        'enableAjaxValidation' => true,
//                                            'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    ));
                                    ?>
                                        <p class="note">
                                        <?php echo Yii::t('translateWord', 'ContactField'); ?>
                                            <span class="required">*</span>
                                            <?php echo Yii::t('translateWord', 'ContactRequire'); ?>
                                        </p>
                                        <div class="row">
                                            <div class="col-sm-12">
    <?php echo $form->errorSummary($modelContact); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"><?php echo Yii::t('translateWord', 'ContactName'); ?> <span class="required">*</span></div>
                                            <div class="col-sm-9" style="color: black;"><?php echo $form->textField($modelContact, 'contact_name'); ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"><?php echo Yii::t('translateWord', 'ContactEmail'); ?> <span class="required">*</span></div>
                                            <div class="col-sm-9" style="color: black;"><?php echo $form->textField($modelContact, 'contact_email'); ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"><?php echo Yii::t('translateWord', 'ContactSubject'); ?> <span class="required">*</span></div>
                                            <div class="col-sm-9" style="color: black;"><?php echo $form->textField($modelContact, 'contact_subject', array('size' => 60, 'maxlength' => 128)); ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"><?php echo Yii::t('translateWord', 'ContactDescription'); ?> <span class="required">*</span></div>
                                            <div class="col-sm-9" style="color: black;"><?php echo $form->textArea($modelContact, 'contact_description', array('rows' => 6, 'cols' => 50)); ?></div>
                                        </div>
                                        <div class="row buttons">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9" style="color: black;"><?php echo CHtml::submitButton('Submit'); ?></div>
                                        </div>
    <?php $this->endWidget(); ?>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>