<?php

class BackOfficeModule extends CWebModule {

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'BackOffice.models.*',
            'BackOffice.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
//            if (Yii::app()->user->checkAccess('admin')) {
//                if (Yii::app()->user->isDemo) {
//                    $url = Yii::app()->createUrl(Yii::app()->user->loginUrl);
//                    Yii::app()->user->returnUrl = Yii::app()->createUrl('/admin/');
//                    Yii::app()->request->redirect($url);
//                } else {
//                    throw new CHttpException(403, 'Have no permission');
//                }
//            }
            return true;
        } else {
            return false;
        }
    }

}
