<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdlStep01
 *
 * @author Worrakris
 */
class mdlStep01 extends CFormModel {

    public $checkInDate;
    public $checkOutDate;
    public $totalNight;

    public function rules() {
        return array(
            array('checkInDate, checkOutDate, totalNight', 'required'),
            array('checkInDate, checkOutDate, totalNight', 'safe'),
            array('checkInDate, checkOutDate', 'date'),
        );
    }
    
    

}
