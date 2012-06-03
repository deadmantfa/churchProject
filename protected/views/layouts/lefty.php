<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-6">
		<p>
			<h2>Sidebar</h2>
			<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>'Operations',
				));
				$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'operations'),
				));
				$this->endWidget();
			?>
		</p>

	</div>
	<div id="content" class="span-16">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
