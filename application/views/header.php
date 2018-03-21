<?php date_default_timezone_set('America/Sao_Paulo'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mednesp Admin</title>

<meta name="viewport" content="width=device-width, initial-scale=1" />


<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link type="text/css" rel="stylesheet" href="<?php echo base_url('css/estilo.css');?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('menu/demo/css/pocket.css');?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('menu/dist/css/jquery.mmenu.all.css');?>"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('menu/dist/wrappers/bootstrap/jquery.mmenu.bootstrap.css');?>"/>

<!--- Javascript -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>

    
<!--- Menu -->
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
						}
					]
				});
                
               
                
			});
		</script>
    <script type="text/javascript" src="<?php echo base_url("tinymce/tinymce.min.js"); ?>"></script>
     <script>tinymce.init({ 
    
    selector:'textarea',
    //language:'pt_BR', ALTERAR
    theme:'modern',
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
 
                         });</script>

<!-- mascaras -->    
<script type="text/javascript" src="<?php echo base_url("mask/dist/jquery.mask.min.js"); ?>"></script>
<script>
  $(document).ready(function(){
  $('.date').mask('00/00/00');
  $('.time').mask('00:00');
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
});

</script>

</head>
<body>    
