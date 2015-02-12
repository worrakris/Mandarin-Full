<?php

class GalleryController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'BackOfficeLayouts';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        $users = Yii::app()->db->createCommand('SELECT staff_username FROM tbl_staff WHERE staff_type_id>=1')->queryAll();
        foreach ($users as $key => $value) {
            $users[$key] = array_shift($value);
        }
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('admin', 'create', 'update', 'view', 'index', 'delete'),
                'users' => $users,
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new GalleryManage;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['GalleryManage'])) {
            $img_data = $_FILES['gallery_image'];
            $img = CUploadedFile::getInstancesByName('gallery_image');
//            if (!empty($img_data) && isset($img_data)) {
            if (isset($img) && (count($img)>0)) {
                $model->attributes = $_POST['GalleryManage'];
                $update_date = date("Y-m-d H:i:s"); 

                foreach ($img as $image => $pic) {
                    $imgName = rand(0, 9999) . '_' . time() . strstr($pic->name, '.');
                    
                    if ($pic->saveAs(Yii::getPathOfAlias('images') . "/gallery/" . $imgName)) {
                        $img_add = new GalleryManage();
                        $img_add->gallery_image = $imgName;
                        $img_add->gallery_update_date = $update_date;
                        $img_add->save();
                    }
                }
                $this->redirect(array('admin'));
            } else {
                $this->render('view', array(
                    'data' => $img_data,
                ));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['GalleryManage'])) {
            $model->attributes = $_POST['GalleryManage'];
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        @unlink($_SERVER['SERVER_NAME'] . Yii::app()->baseUrl . "/images/gallery/", $model->gallery_image);
        $model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('GalleryManage');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new GalleryManage('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['GalleryManage']))
            $model->attributes = $_GET['GalleryManage'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return GalleryManage the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = GalleryManage::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param GalleryManage $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'gallery-manage-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
