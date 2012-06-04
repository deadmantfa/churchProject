<?php

class DefaultController extends Controller
{
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->checkAccess('User.Default.Index')){
			$dataProvider=new CActiveDataProvider('User', array(
				'criteria'=>array(
					'condition'=>'status>'.User::STATUS_BANED,
				),
				'pagination'=>array(
					'pageSize'=>Yii::app()->controller->module->user_page_size,
				),
			));

			$this->render('/user/index',array(
				'dataProvider'=>$dataProvider,
			));
		} else {
			$this->accessDenied();
		}
	}

}