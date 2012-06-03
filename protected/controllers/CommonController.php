<?php

class CommonController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('countriesAutoComplete'),
				'users'=>array('admin'),
			),
		);
	}
	public function actionCountriesAutoComplete()
	{
		$res =array();

		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT CONCAT(`id`,' - ',`nationality`) FROM ". Nationality::tableName()." WHERE `nationality` LIKE :nationality Order By `nationality`";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":nationality", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}

		echo CJSON::encode($res);
		Yii::app()->end();
	}
}
?>
