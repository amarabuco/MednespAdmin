<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Novo Palestrante</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nome</label>  
  <div class="col-md-5">
  <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">ajuda</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Origem</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Profissão</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>
    
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Bio</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="textarea">default text</textarea>
  </div>
</div>
    
<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Ativo</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
      Sim
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="radios" id="radios-1" value="2">
      Nâo
    </label>
	</div>
  </div>
</div>
    


<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Enviar imagem</label>
  <div class="col-md-4">
    <input id="filebutton" name="filebutton" class="input-file" type="file">
  </div>
</div>
    

</fieldset>
</form>
