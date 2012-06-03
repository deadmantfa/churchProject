<div class="form">

<?php 
Yii::app()->clientScript->registerScript('test','
		var national = "'.$model->nationality->nationality.'";
		$("#nationalityId").val(national);
	');

$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', 
				array(
					'id'=>'baptism-form',
//					'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'clientOptions' =>array(
							'validateOnSubmit'=>true,
							'validateOnChange'=>true,
							'validateOnType'=>true,
					),
					'htmlOptions'=>array( 'class'=>'well' ),
				) 
		);
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
	
	<div class="row-fluid">
		<div class="row-fluid">
			<div class="span6">
				<?php echo $form->labelEx($model,'year'); ?>
				<?php echo $form->dropDownList($model,'year',commonFunc::getYears(), array('empty'=>'--Select--')); ?>
				<?php echo $form->error($model,'year'); ?>
			</div>
			<div class="span6">
				<?php echo $form->labelEx($model,'dateOfBaptism'); ?>
				<?php 
					$this->widget('zii.widgets.jui.CJuiDatePicker',
						array(
							'model'=>$model,
							'attribute'=>'dateOfBaptism',
							'options' => array(
								'changeYear' => true,
								'showButtonPanel' => true,
							),
							'value' => $model->dateOfBaptism,
						)
					);
				?>
				<?php echo $form->error($model,'dateOfBaptism'); ?>
			</div>
		</div>

		<br class="clear" />

		<div class="row-fluid">
			<div class="span6">
				<div class="row">
					<?php echo $form->labelEx($model,'dateOfBirth'); ?>
					<?php 
						$this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'dateOfBirth',
								'value' => $model->dateOfBirth,
							)
						);
					?>
					<?php echo $form->error($model,'dateOfBirth'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'childName'); ?>
					<?php echo $form->textField($model,'childName'); ?>
					<?php echo $form->error($model,'childName'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'surname'); ?>
					<?php echo $form->textField($model,'surname'); ?>
					<?php echo $form->error($model,'surname'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'nationalityId'); ?>
					<?php 
						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
							'name'=>'nationalityId',
							'sourceUrl'=>$this->createUrl('/Common/countriesAutoComplete'),
							// additional javascript options for the autocomplete plugin
							'options'=>array(
									'showAnim'=>'fold',
									'select'=>'js:function(event, ui){
													var data = ui.item.value.split(" - ");
													jQuery("#nationalityId").val(data[1]);
													jQuery("#BaptismCertificate_nationalityId").val(data[0]);
													return false;
												}'
							),

						));
					?>
					<?php echo $form->hiddenField($model,'nationalityId'); ?>
					<?php echo $form->error($model,'nationalityId'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'gender'); ?>
					<?php echo $form->dropDownList($model,'gender', commonFunc::getGender(), array('empty'=>'--Select--')); ?>
					<?php echo $form->error($model,'gender'); ?>
				</div>
			</div>

			<div class="span6">
				<div class="row">
					<?php echo $form->labelEx($model,'fatherName'); ?>
					<?php echo $form->textField($model,'fatherName'); ?>
					<?php echo $form->error($model,'fatherName'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'motherName'); ?>
					<?php echo $form->textField($model,'motherName'); ?>
					<?php echo $form->error($model,'motherName'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'godFatherName'); ?>
					<?php echo $form->textField($model,'godFatherName'); ?>
					<?php echo $form->error($model,'godFatherName'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'godMotherName'); ?>
					<?php echo $form->textField($model,'godMotherName'); ?>
					<?php echo $form->error($model,'godMotherName'); ?>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<div class="row">
					<?php echo $form->labelEx($model,'domicile1'); ?>
					<?php echo $form->textField($model,'domicile1'); ?>
					<?php echo $form->error($model,'domicile1'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'domicile2'); ?>
					<?php echo $form->textField($model,'domicile2'); ?>
					<?php echo $form->error($model,'domicile2'); ?>
				</div>
			</div>
			<div class="span6">
				<div class="row">
					<?php echo $form->labelEx($model,'domicile3'); ?>
					<?php echo $form->textField($model,'domicile3'); ?>
					<?php echo $form->error($model,'domicile3'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'domicile4'); ?>
					<?php echo $form->textField($model,'domicile4'); ?>
					<?php echo $form->error($model,'domicile4'); ?>
				</div>
			</div>
		</div>
		<br class="clear" />

		<div class="row-fluid">
			<div class="span6">
				<?php echo $form->labelEx($model,'minister'); ?>
				<?php echo $form->textField($model,'minister'); ?>
				<?php echo $form->error($model,'minister'); ?>
			</div>

			<div class="span6">
				<?php echo $form->labelEx($model,'remark'); ?>
				<?php echo $form->textArea($model,'remark',array('rows'=>3, 'cols'=>100)); ?>
				<?php echo $form->error($model,'remark'); ?>
			</div>
		</div>
	</div>
	<br class="clear" />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array( 'class'=>'btn btn-primary', 'name'=>'jstsav')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create and Print' : 'Save and Print', array( 'class'=>'btn btn-inverse', 'name'=>'savprn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->