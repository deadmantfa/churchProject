<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<fieldset class="span-5">
		<div class="row">
			<?php echo $form->label($model,'fatherName'); ?>
			<?php echo $form->textField($model,'fatherName'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'motherName'); ?>
			<?php echo $form->textField($model,'motherName'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'godFatherName'); ?>
			<?php echo $form->textField($model,'godFatherName'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'godMotherName'); ?>
			<?php echo $form->textField($model,'godMotherName'); ?>
		</div>
	</fieldset>
	
	<div class="column span-1">&nbsp;</div>
	
	<fieldset class="inline span-5">
		<div class="row">
			<?php echo $form->label($model,'domicile1'); ?>
			<?php echo $form->textField($model,'domicile1'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'domicile2'); ?>
			<?php echo $form->textField($model,'domicile2'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'domicile3'); ?>
			<?php echo $form->textField($model,'domicile3'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'domicile4'); ?>
			<?php echo $form->textField($model,'domicile4'); ?>
		</div>
	</fieldset>
	
	<br class="clear" />
	<fieldset class="inline last">
		<div class="row">
			<?php echo $form->label($model,'minister'); ?>
			<?php echo $form->textField($model,'minister'); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'remark'); ?>
			<?php echo $form->textArea($model,'remark',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</fieldset>
	<br class="clear" />

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->