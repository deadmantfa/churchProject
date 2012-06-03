<?php

class commonFunc
{
	public static function getYears($id=null)
	{
		$year = date("Y");
		$arr = array();
		for ($i = 0; $i <= 80; $i++){
			$y = $year--;
			$arr[$y] = $y; 
		}
		if(empty($id))
			return $arr;
		else 
			return $arr[$id];
	}
	public static function getCountries($id=null)
	{
		$arr = CHtml::listData(Nationality::model()->findAll(array('order'=>'`nationality` ASC')), 'id', 'nationality');
		if(empty($id))
			return $arr;
		else 
			return $arr[$id];
	}
	public static function getGender($id=null)
	{
		$arr = array(
						'1'=>'Male',
						'2'=>'Female'
					);
		if(empty($id))
			return $arr;
		else 
			return $arr[$id];
	}
	public static function getMarriageStatus($id=null)
	{
		$arr = array(
						'1'=>'Single',
						'2'=>'Divorced',
						'3'=>'Widowed'
					);
		if(empty($id))
			return $arr;
		else 
			return $arr[$id];
	}
	public static function output_yii_models($model_or_array) {
		echo "<pre>";
        if(is_object($model_or_array)) {
			print_r($model_or_array->getAttributes());
        }
        else {
            $array = array();
            foreach($model_or_array AS $model) {
                $array[] = $model->getAttributes();
            }
            print_r($array);
        }
		echo "</pre>";exit;
    }
}
?>
