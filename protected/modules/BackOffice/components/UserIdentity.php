<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;

    public function authenticate() {
        $record = StaffAccess::model()->findByAttributes(array('staff_username' => $this->username));
//        echo "<pre>";
//        print_r($record);
//        echo "</pre>";
        if ($record === null) {
            $this->_id = "n/a";
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($record->staff_password !== md5($this->password)) {
            $this->_id = $record->staff_id;
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
//            echo "jsdfkajdf";
//            die();
        } else {
            if ($record->staff_status !== 'Active') {
                $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
                $this->errorMessage = "Staff Account is inactive.";
            } else {
                $this->_id = $record->staff_id;
                $this->setState('s_name_th', $record->staff_name_th);
                $this->setState('s_name_en', $record->staff_name_en);
                $this->setState('s_position', $record->staff_position);
                $this->setState('s_email', $record->staff_email);
                $this->setState('s_type_id', $record->staff_type_id);
                $this->errorCode = self::ERROR_NONE;
            }
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}
