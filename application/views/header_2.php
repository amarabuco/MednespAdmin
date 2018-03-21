<?php date_default_timezone_set('America/Fortaleza'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mednesp Admin 2</title>

<meta name="viewport" content="width=device-width, initial-scale=1" />

<!--- Meta tags --->
<meta name="google-site-verification" content="N__cJWqVxo9HDXxGotN7N6Q0cH4IF-3--DoaqVXnqow" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="description" content="Aplicativos para concurso. Pratique seus conhecimentos." />
<meta name="keywords" content="concurso público, exame da oab,testes,aplicativo,questões,aprendizado,estudo,direito,jurídico,auditoria" />
<meta name="robots" content="index,follow" />
<meta property="og:image" content="http://www.pocketconcurso.com.br/pocket/images/pocket_img_2.png" />
<meta property="og:image:type" content="image/png" />
<meta property="og:url" content="http://www.pocketconcurso.com.br/pocket/index.php" />
<meta property="fb:app_id" content="840923079387796" />
<meta property="og:title" content="Pocket Concurso" />
<meta property="og:description" content="Aplicativos para concurso. Pratique seus conhecimentos." />
    
    
<link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico') ?>" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('images/apple-icon-57x57.png')?>" />
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('images/apple-icon-60x60.png')?>" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('images/apple-icon-72x72.png')?>" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('images/apple-icon-76x76.png')?>" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('images/apple-icon-114x114.png')?>" />
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('images/apple-icon-120x120.png')?>" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('images/apple-icon-144x144.png')?>" />
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('images/apple-icon-152x152.png')?>" />
<link rel="apple-touch-icon" sizes="180x180" href=<?php echo base_url('images/apple-icon-180x180.png')?>"" />
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('images/android-icon-192x192.png')?>" />
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('images/android-icon-144x144.png')?>" />
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('images/android-icon-96x96.png')?>" />
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('images/android-icon-72x72.png')?>" />
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('images/android-icon-48x48.png')?>" />
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('images/android-icon-36x36.png')?>" />
    
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('images/favicon-32x32.png')?>" />
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('images/favicon-96x96.png')?>" />
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('images/favicon-16x16.png')?>" />
<link rel="manifest" href="/manifest.json" />
<meta name="theme-color" content="#ffffff" />

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<link type="text/css" rel="stylesheet" href="<?php echo base_url('menu/demo/css/pocket.css');?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('menu/dist/css/jquery.mmenu.all.css');?>"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('menu/dist/wrappers/bootstrap/jquery.mmenu.bootstrap.css');?>"/>

<!--- Javascript --->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    
<!--- Menu --->
<script type="text/javascript" src="<?php echo base_url('menu/dist/js/jquery.mmenu.all.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('menu/dist/wrappers/bootstrap/jquery.mmenu.bootstrap.min.js');?>"></script>

    
		<script type="text/javascript">
			$(function() {
				$('nav#menu').mmenu({
                    "offCanvas": {
                        "position": "left"
                        },
					extensions				: [ 
                        'effect-menu-zoom',
                        'effect-panels-zoom',
                        'effect-slide-menu',
                        'shadow-page', 
                        'shadow-panels',  
                        'theme-white' 
                    ],
					keyboardNavigation 		: true,
					screenReader 			: true,
					counters				: true,
					navbar 	: {
						
                        title	: 'Menu',
					},
					navbars	: [
						 {
							position	: 'top',
							content		: [
								'prev',
								'title',
								'close'
							]
						},
                         {
							position	: 'top',
							content		: [
				        "<a class='fa fa-user' href='/pocket/index.php/Page/perfil'></a>",
                        "<a class='fa fa-lightbulb-o' href='/pocket/index.php/Page/info'></a>",
                        "<a class='fa fa-graduation-cap' href='http://www.pocketconcurso.com.br'></a>"
							]
						}
					]
				});
                
               
                
			});
		</script>
    
</head>
<body>    
