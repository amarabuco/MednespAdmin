<div class="container-fluid">
    
<p class='h4'><?php echo $tabela; ?></p>

<?php //print_r($fields); ?>


<?php echo form_open('Acao/save_form/'.$tabela); ?>

    <div class="form-group">

<?php 

        
        if(!isset($registro)){
            //INSERE REGISTRO 
            foreach ($fields as $field){
               
                
                if($field->name != 'id' && $field->name != 'modificado_em' && $field->name != 'criado_em')  {
                            if($field->type == 'text'){
                            echo '<p>'.$field->name.': <textarea class="form-control" name="'.$field->name.'" ></textarea>';                            
                        } else{
                                echo '<p>'.$field->name.': <input type="text" class="form-control" name="'.$field->name.'" value=""></p>';
                            }
                        }
                    }
        }
        
        else{
            //EDITA REGISTRO
             foreach ($fields as $field){
                
                 if($field->name != 'id' && $field->name != 'modificado_em' && $field->name != 'criado_em')  {
                        if($field->type == 'text'){
                            echo '<p>'.$field->name.': <textarea class="form-control" name="'.$field->name.'" >'.$registro[$field->name].'</textarea>';                            
                        } else{
                            echo '<p>'.$field->name.': <input type="text" class="form-control" name="'.$field->name.'" value="'.$registro[$field->name].'"></p>';
                                            }
                                    }
                 elseif($field->name == 'id'){
                 echo '<input type="hidden" class="form-control" name="'.$field->name.'" value="'.$registro[$field->name].'"></p>';
                    }
                 elseif($field->name == 'modificado_em'){
                 echo '<input id="'.$field->name.'" type="hidden" class="form-control" name="'.$field->name.'" value="'.$registro[$field->name].'"></p>';
                    }  
                }
            
        } 
                ?>

            <button id="save" type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>

<script>
        
    $( document ).ready(function() {
        $("#save").click(function(){
               $("#modificado_em").val("<?php echo date('Y-m-d H:i:s',strtotime("now")); ?>")
            });
                
                $("input[name='cpf']").mask('000.000.000-00', {reverse: true});
                $("input[name='cnpj']").mask('00.000.000/0000-00', {reverse: true});
        
});
    </script>