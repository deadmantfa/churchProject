<?php
$this->breadcrumbs=array(
	'Marriage Certificates',
);

$this->menu=array(
	array('label'=>'Create Marriage Certificate', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Create")),
	array('label'=>'Manage Marriage Certificates', 'url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Admin")),
);
?>

<h1>Marriage Certificates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
