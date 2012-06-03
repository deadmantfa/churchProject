<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<style type="text/css">
		body {
			padding-top: 60px;
			padding-bottom: 40px;
		}
		.sidebar-nav {
			padding: 9px 0;
		}

		@media (max-width: 980px) {
			body{
				padding-top: 0px;
			}
		}
	</style>
	<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/favicon.ico" type="image/x-icon" />
</head>
<?php flush(); ?>
<body>

<div class="container" id="page">
	<div id="header">
		<?php
			$this->widget('bootstrap.widgets.BootNavbar', array(
				'fixed'=>true,
				'brand'=>CHtml::encode(Yii::app()->name),
				'brandUrl'=>'#',
				'collapse'=>true, // requires bootstrap-responsive.css
				'fluid'=>true,
				'htmlOptions'=>array('style'=>'background-color: #049cbd;', 'class'=>'navbar-fixed-top'),
				'items'=>array(
					array(
						'class'=>'bootstrap.widgets.BootMenu',
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/site/index')),
							array(
								'label'=>'Certificates', 
								'visible'=>(!Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('Baptism.BaptismCertificate.Index') || Yii::app()->user->checkAccess('Marriage.MarriageCertificate.Index'))),
								'items'=>array(
									array('label'=>'Baptism', 'url'=>array('/Baptism/baptismCertificate/index'), 'visible'=>Yii::app()->user->checkAccess('Baptism.BaptismCertificate.Index')),
									array('label'=>'Marriage', 'url'=>array('/Marriage/marriageCertificate/index'), 'visible'=>Yii::app()->user->checkAccess('Marriage.MarriageCertificate.Index')),
								)
							),
							array(
								'label'=>'Admin', 
								'visible'=>(!Yii::app()->user->isGuest && (Yii::app()->user->checkAccess('User.Default.Index'))),
								'items'=>array(
									array('label'=>'Rights', 'url'=>array('/rights')),
									array('label'=>'Users Management', 'url'=>array('/user'), 'visible'=>Yii::app()->user->checkAccess('User.Default.Index')),
								)
							),
							array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Contact', 'url'=>array('/site/contact')),
							array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
							array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
						),
					),
				),
			));
		?>
	</div><!-- mainmenu -->
	
	<div class="content">
		<?php 
			$this->widget('bootstrap.widgets.BootAlert',array('htmlOptions'=>array('class'=>'navbar-fixed-top')));
		?>
		<!-- flashes -->

		<?php 
			if(isset($this->breadcrumbs)){
				$this->widget('bootstrap.widgets.BootBreadcrumbs', 
					array('links'=>$this->breadcrumbs,)); 
			}

		?>
		<?php echo $content; ?>
		<div class="clear"></div>
		<div id="footer">
			Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->params->companyName; ?>.<br/>
			All Rights Reserved.<br/>
			<?php echo Yii::powered(); ?>
			Created By: <a href="mailto:<?php echo Yii::app()->params->adminEmail; ?>"><?php echo Yii::app()->params->creator; ?></a>
		</div><!-- footer -->


	</div><!-- content -->
</div><!-- page -->
<?php
Yii::app()->clientScript->registerScript('main','
			$("div.content").css("display", "none");

			$("div.content").fadeIn(800);

			$("a").click(function(event){
				event.preventDefault();
				linkLocation = this.href;
				if(linkLocation.match("#")!="#" && linkLocation.length>0 && linkLocation.match("print")!="print")
					$("div.content").fadeOut(200, redirectPage);
				if(linkLocation.match("print")=="print")
					window.location = linkLocation;
			});

			function redirectPage() {
				window.location = linkLocation;
			}
	',  CClientScript::POS_READY);
?>
</body>
</html>
<?php flush(); ?>
