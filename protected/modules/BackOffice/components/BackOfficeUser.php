<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BackOfficeUser
 *
 * @author Worrakris
 */
class BackOfficeUser extends CWebUser {

    private $_model;
    public $loginUrl=array('/BackOffice/default/login');
   
    // access it by Yii::app()->user->username
    function getUsername() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->staff_username;
    }

    function getFullname() {
        $user = $this->loadUser(Yii::app()->user->id);
        $fullName = "";
        if (Yii::app()->language == 'th') {
            $fullName = $user->staff_name_th;
        } else {
            $fullName = $user->staff_name_en;
        }
        return $fullName;
    }
    
    // access it by Yii::app()->user->email
    function getEmail() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->staff_email;
    }

// access it by Yii::app()->user->created
    function getCreated() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->staff_create_date;
    }

// access it by Yii::app()->user->lastvisit
    function getLastvisit() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->staff_update_date;
    }

// access it by Yii::app()->user->count
    function getCount() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->count_visit;
    }

    // access it by Yii::app()->user->usertype
    function getUsertype() {
        $user = $this->loadUser(Yii::app()->user->id);
        $usertype = StaffType::model()->findByPk($user->staff_type_id);
        return $usertype->staff_type_name;
    }
    
    // access it by Yii::app()->user->position
    function getPosition() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->staff_position;
    }

    // This is a function that checks the field 'role'
// in the User model to be equal to 1, that means it's admin
// Yii::app()->user->isGuest
// Yii::app()->user->isAdmin()
// Yii::app()->user->isCustomer()
// Yii::app()->user->isAgent()
// Yii::app()->user->isEmployee()


    function isAdmin() {
        $user = $this->loadUser(Yii::app()->user->id);
        return intval($user->staff_type_id) == 1;
    }

    function isAccountant() {
        $user = $this->loadUser(Yii::app()->user->id);
        return intval($user->staff_type_id) == 2;
    }

    function isReservation() {
        $user = $this->loadUser(Yii::app()->user->id);
        return intval($user->staff_type_id) == 3;
    }

    function isReception() {
        $user = $this->loadUser(Yii::app()->user->id);
        return intval($user->staff_type_id) == 4;
    }
    
    function isOperatorAcc() {
        $user = $this->loadUser(Yii::app()->user->id);
        return intval($user->staff_type_id) == 5;
    }
    
    function isOperatorResv() {
        $user = $this->loadUser(Yii::app()->user->id);
        return intval($user->staff_type_id) == 6;
    }
    
    function isOperatorRecept() {
        $user = $this->loadUser(Yii::app()->user->id);
        return intval($user->staff_type_id) == 7;
    }
    
    function isOperatorWeb() {
        $user = $this->loadUser(Yii::app()->user->id);
        return intval($user->staff_type_id) == 8;
    }

    function isMarketing() {
        $user = $this->loadUser(Yii::app()->user->id);
        return intval($user->staff_type_id) == 9;
    }
    
    protected function loadUser($id = null) {
        if ($this->_model === null) {
            if ($id !== null):
                $this->_model = StaffManage::model()->findByPk($id);
            else:
                $this->_model->staff_type_id = 0;
            endif;
        }
        return $this->_model;
    }

// loadUser
}
