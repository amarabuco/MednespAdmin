<?php
    $novo_msg=" <span class='label label-success  h6'>novo</span>";
    
if ($perfil['email'] == false){ ?>
<!--- Visitante --->
<div class="panel panel-danger">
    <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span id="testeLabel"></span></div>
	<div class="panel-body">
        <h3>Usuário não está pré-cadastrado.</h3>

    </div>
</div>

<?php } else { ?>
<!--- Normal --->
<div class="panel panel-success">
    <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Dados gerais<span id="testeLabel"></span></div>
	<div class="panel-body">
        
        <?php echo form_open('welcome/update_cadastro'); ?>
            
            <!--<div>
             <img class="img-rounded img-responsive " src="" />
            </div> -->
        
            <p><input class="form-control" type="hidden" name="id" value="<?=$perfil['id']?>" required/></p>
        
            <h5>Usuario</h5>
            <p><input class="form-control" type="text" name="usuario" value="<?=$perfil['nome']?>" required/></p>

            <h5>E-mail</h5>
            <p><input class="form-control" type="email" pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" name="email" value="<?=$perfil['email']?>" required/></p>
             
            <h5>Nova senha</h5>
            <p><input class="form-control" type="password" name="senha" value="" required/></p>
        
            <h5>Senha novamente</h5>
            <p><input class="form-control" type="password" name="senha2" value="" required/></p>
        
            <div><?php echo $atualiza; ?></div>
            
            <p><input class="btn btn-success" type="submit" value="Atualizar"/></p>
    
    </div>
</div>

<script>

    $('document').ready(function(){

        /*
        $("input[type='submit']").click(function(){
            
             var senha = $("input[name='senha']").val();
            var senha2 = $("input[name='senha2']").val();
           
            if(senha==senha2){ $("input[type='submit']").prop('disabled','false');} else {alert("senhas não coincidem.");}
            
        });
       
        */
    });
    
</script>

<?php } ?>

