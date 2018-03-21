<div class="container">
<?php echo form_open('welcome/login_envio'); ?>
    
    <div><?=$erro;?></div>

<br>
<p>Esqueceu a senha? Clique <span class="badge badge-default"><a href="<?php echo site_url("welcome/lembrete_senha"); ?>">aqui</a></span></p>    
    
<h5>E-mail</h5>
<p><input class="form-control" type="text" name="email" value="" required/></p>

<h5>Senha</h5>
<p><input class="form-control" type="password" name="senha" value="" required/></p>

<p><input class="btn btn-success"  type="submit" value="Enviar" /></p>


</form>

</div>