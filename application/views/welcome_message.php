<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<body>
<div class="container">
    <h3>Bem vindo(a) ao Mednesp 2019 Admin!</h3>
    

	<ul class="list-group">
        
        <?php if($this->session->has_userdata('user')){echo '
        <div class="list-group-item" id="menu"></div>
        
        <div class="list-group-item" id="deslogar"></div>
        
        '; } else { echo '
        
        <div class="list-group-item"><a style="text-decoration:none" href="'.site_url("Welcome/login").'"><span class="btn btn-success btn-block"><span id="login" class="glyphicon glyphicon-envelope" style="font-size:14pt" aria-hidden="true"></span> Login com e-mail</span></a></div>
        
        '; } ?>
        
        
	</ul>
    
    
    
</div>

</body>
<script>
 $(document).ready(function(){
    $("#deslogar").html('<span  class="btn btn-danger btn-block">Deslogar</span>');
     $("#menu").html('<a href="index.php/Welcome/home"><span class="btn btn-default btn-block">Menu</span></a>');
   });
</script>
</html>