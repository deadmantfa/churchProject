<?php
$this->breadcrumbs=array(
	'Baptism Certificates'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Baptism Certificate', 'url'=>array('index'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Index")),
	array('label'=>'Create Baptism Certificate', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Create")),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('baptismCertificate-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Baptism Certificates</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'baptismCertificate-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',
	'htmlOptions'=>array('class'=>'grid-view span10'),
	'columns'=>array(
		array(
			'name' => 'year',
			'value' => 'CHtml::encode($data->year)',
			'filter'=>commonFunc::getYears(),
		),
		'dateOfBaptism',
		'dateOfBirth',
		array(
			'name' => 'childName',
			'type' => 'raw',
			'value' => 'CHtml::encode($data->childName)'
		),
		array(
			'name' => 'surname',
			'type' => 'raw',
			'value' => 'CHtml::encode($data->surname)'
		),
		array(
			'name' => 'gender',
			'type' => 'raw',
			'value' => 'commonFunc::getGender($data->gender)',
			'filter'=>commonFunc::getGender()
		),
		array(
			'name' => 'nationalityId',
			'type' => 'raw',
			'value' => 'commonFunc::getCountries($data->nationalityId)',
			'filter'=>commonFunc::getCountries()
		),
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{view}{update}{print}{delete}',
			'buttons'=>array
			(
				'view' => array
				(
					'visible'=>'Yii::app()->user->checkAccess("Baptism.BaptismCertificate.View")'
				),
				'update' => array
				(
					'visible'=>'Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Update")'
				),
				'delete' => array
				(
					'visible'=>'Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Delete")'
				),
				'print' => array
				(
					'label'=>'Print Baptism Certificate',
					'icon'=>'icon-print',
					'url'=>'Yii::app()->createUrl("Baptism/baptismCertificate/print", array("id"=>$data->id))',
					'visible'=>'Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Print")'
				),
			),
			'htmlOptions'=>array('class'=>'span2'),
		),
	),
)); ?>
