<?php

class AdminController extends Controller
{
	public $defaultAction = 'admin';
	
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(Yii::app()->user->checkAccess('User.Admin.Admin')){
			$dataProvider=new CActiveDataProvider('User', array(
				'pagination'=>array(
					'pageSize'=>Yii::app()->controller->module->user_page_size,
				),
			));

			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		} else {
			$this->accessDenied();
		}
	}


	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		if(Yii::app()->user->checkAccess('User.Admin.View')){
			$model = $this->loadModel();
			$this->render('view',array(
				'model'=>$model,
			));
		} else {
			$this->accessDenied();
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if(Yii::app()->user->checkAccess('User.Admin.Create')){
			$model=new User;
			$profile=new Profile;
			if(isset($_POST['User']))
			{
				$model->attributes=$_POST['User'];
				$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
				$model->createtime=time();
				$model->lastvisit=time();
				$profile->attributes=$_POST['Profile'];
				$profile->user_id=0;
				if($model->validate()&&$profile->validate()) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					if($model->save()) {
						$profile->user_id=$model->id;
						$profile->save();
					}
					$this->redirect(array('view','id'=>$model->id));
				} else $profile->validate();
			}

			$this->render('create',array(
				'model'=>$model,
				'profile'=>$profile,
			));
		} else {
			$this->accessDenied();
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		if(Yii::app()->user->checkAccess('User.Admin.Update')){
			$model=$this->loadModel();
			$profile=$model->profile;
			if(isset($_POST['User']))
			{
				$model->attributes=$_POST['User'];
				$profile->attributes=$_POST['Profile'];

				if($model->validate()&&$profile->validate()) {
					$old_password = User::model()->notsafe()->findByPk($model->id);
					if ($old_password->password!=$model->password) {
						$model->password=Yii::app()->controller->module->encrypting($model->password);
						$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
					}
					$model->save();
					$profile->save();
					$this->redirect(array('view','id'=>$model->id));
				} else $profile->validate();
			}

			$this->render('update',array(
				'model'=>$model,
				'profile'=>$profile,
			));
		} else {
			$this->accessDenied();
		}
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->user->checkAccess('User.Admin.Delete')){
			if(Yii::app()->request->isPostRequest)
			{
				// we only allow deletion via POST request
				$model = $this->loadModel();
				$profile = Profile::model()->findByPk($model->id);
				$profile->delete();
				$model->delete();
				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if(!isset($_POST['ajax']))
					$this->redirect(array('/user/admin'));
			}
			else
				throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		} else {
			$this->accessDenied();
		}
	}
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->notsafe()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
}