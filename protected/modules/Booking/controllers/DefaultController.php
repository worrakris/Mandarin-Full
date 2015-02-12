<?php

class DefaultController extends Controller {

    public $layout = 'BookingLayouts';

    public function actionIndex() {

        $model = new mdlStep01();

        if (isset($_POST['mdlStep01'])) {
            $model->attributes = $_POST['mdlStep01'];
            Yii::app()->session['checkin'] = $model->checkInDate;
            Yii::app()->session['checkout'] = $model->checkOutDate;
            Yii::app()->session['night'] = $model->totalNight;
            $this->redirect(array('step2'));
        }
        $this->render('Step1', array('model' => $model));
    }
    
    public function actionStaffLogIn() {
        
    }

    public function actionStep2() {

        if (isset(Yii::app()->session['checkin'])) {

            $mdlRoomQuota = new RoomQuotaManage('search');
            $mdlRoomReserved = new RoomReservedManage("search");
            $roomAvailable = array();

            $stDate = date("Y-m-d", strtotime(Yii::app()->session['checkin']));
            $enDate = date("Y-m-d", strtotime(Yii::app()->session['checkout']));

            $quotaCriteria = new CDbCriteria();
            $quotaCriteria->select = 't.*';
            $quotaCriteria->condition = '((quota_start <= :stDate) AND (quota_end >= :stDate)) OR ((quota_start <= :enDate) AND (quota_end >= :enDate))';
            // $criteria->join = 'LEFT JOIN tbl_room_type ON t.room_type_id = tbl_room_type.room_type_id';
            $quotaCriteria->params = array(':stDate' => $stDate, ':enDate' => $enDate);
            $quotaResult = $mdlRoomQuota->with('RoomType')->findAll($quotaCriteria); //search(Yii::app()->session['checkin'], Yii::app()->session['checkout']);

            $cntQResult = count($quotaResult);
            for ($i = 0; $i < $cntQResult; $i++) {
                $arID = $quotaResult[$i]->RoomType->room_type_id;

                $roomAvailable[$arID]['room_type_id'] = $quotaResult[$i]->RoomType->room_type_id;
                $roomAvailable[$arID]['room_type_name'] = $quotaResult[$i]->RoomType->room_type_name;
                $roomAvailable[$arID]['room_type_desc'] = $quotaResult[$i]->RoomType->room_type_desc;
                $roomAvailable[$arID]['room_type_max_person'] = $quotaResult[$i]->RoomType->room_type_max_person;
                $roomAvailable[$arID]['room_type_size'] = $quotaResult[$i]->RoomType->room_type_size;
                $roomAvailable[$arID]['room_type_bed'] = $quotaResult[$i]->RoomType->room_type_bed;
                $roomAvailable[$arID]['room_type_extra_bed'] = $quotaResult[$i]->RoomType->room_type_extra_bed;
                $roomAvailable[$arID]['room_type_picture1'] = $quotaResult[$i]->RoomType->room_type_picture1;
                $roomAvailable[$arID]['room_type_picture2'] = $quotaResult[$i]->RoomType->room_type_picture2;
                $roomAvailable[$arID]['room_type_picture3'] = $quotaResult[$i]->RoomType->room_type_picture3;
                $roomAvailable[$arID]['room_type_picture4'] = $quotaResult[$i]->RoomType->room_type_picture4;
                $roomAvailable[$arID]['room_type_picture5'] = $quotaResult[$i]->RoomType->room_type_picture5;
                $roomAvailable[$arID]['quota_number'][$quotaResult[$i]->quota_id] = $quotaResult[$i]->quota_number;
                $roomAvailable[$arID]['quota_condition'][$quotaResult[$i]->quota_id] = $quotaResult[$i]->quota_condition;
                if (!isset($roomAvailable[$arID]['available_room'])) $roomAvailable[$arID]['available_room'] = 0;
                
                $quotaPerDay = (int) $quotaResult[$i]->quota_number;
                $startQuotaDate = $quotaResult[$i]->quota_start;
                $endQuotaDate = $quotaResult[$i]->quota_end;
                $roomType = $quotaResult[$i]->room_type_id;

                while (strtotime($startQuotaDate) <= strtotime($endQuotaDate)) {
                    $reservedCriteria = new CDbCriteria();
                    $reservedCriteria->select = 'room_type_id, rr_date, sum(rr_total_reserved) as total_room';
                    $reservedCriteria->condition = 'room_type_id = :r_type AND rr_date = :r_date';
                    $reservedCriteria->params = array(':r_type' => $roomType, ':r_date' => $startQuotaDate);
                    $reservedCriteria->group = 'room_type_id, rr_date';

                    $reservedRoomResult = $mdlRoomReserved->findAll($reservedCriteria);

                    if (count($reservedRoomResult) > 0) {
                        $rs = (int) ($quotaPerDay - $reservedRoomResult[0]->total_room);
                        if ($roomAvailable[$arID]['available_room'] > $rs || $roomAvailable[$arID]['available_room']==0) {
                            $roomAvailable[$arID]['available_room'] = $rs;
                        }
                    }

                    $startQuotaDate = date("Y-m-d", strtotime("+1 day", strtotime($startQuotaDate)));
                }
            }
//            die();
            // DEBUG Section
//            echo "<pre>";
//            print_r($roomAvailable);
//            echo "</pre>";
//            die();
            // END DEBUG Section

            $this->render('Step2', array('roomAvailable' => $roomAvailable));
        } else {
            $this->redirect(array('index'));
        }
    }

}
