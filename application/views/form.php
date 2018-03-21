<div class="container-fluid">
    
<p class='h4'><?php echo $tabela; ?></p>

<?php //var_dump($registro); ?>

<?php echo form_open_multipart('Acao/save_form/'.$tabela); ?>

    <div class="form-group">

<?php 

        
        if(!isset($registro)){
            //INSERE REGISTRO 
            foreach ($fields as $field){
               
                
                if(isset($relacoes[0]) && $field->name != 'id' && $field->name != 'modificado_em' && $field->name != 'criado_em' )  {
                            //checa se campo é especial, pois está em relações e retorna o chave
                            $i=array_search($field->name,array_column($relacoes, 'campo'));
                            //var_dump($i);
                            $tipo = $relacoes[$i]['tipo'];
                            
                            //se o campo é especial entra nas regras especiais
                            if($i!==false){
                            switch ($tipo) {
                            case 'select':
                                    
                            echo '<p>'.$field->name.': <'.$tipo.' class="form-control" name="'.$field->name.'" >';
                                foreach ($relacoes as $relacao){ if ($field->name==$relacao['campo']){
                                    echo '<option value="'.$relacao['id'].'" >'.$relacao['nome'].'</option>';
                                    }
                                } 
                            echo '</'.$tipo.'></p>';
                            break;
                                    
                            case 'textarea':
                                    
                            echo '<p>'.$field->name.': <'.$tipo.' class="form-control" name="'.$field->name.'" >';
                            echo '</'.$tipo.'></p>';
                            break;

                            case 'file':
                                    
                            echo '<p>'.$field->name.': <input type="'.$tipo.'" name="imagem" accept="image/*">';
                            echo '</p>';
                            break;

                            case 'date':
                                    
                            echo '<p>'.$field->name.': <input type="text" class="form-control '.$tipo.'" name="'.$field->name.'" >';
                            echo '</p>';
                            break;

                            case 'time':
                                     
                            echo '<p>'.$field->name.': <input type="text" class="form-control '.$tipo.'" name="'.$field->name.'">';
                            echo '</p>';
                            break;
                                    
                            }
                            } elseif($field->name != 'id'){
                                    echo '<p>'.$field->name.': <input type="text" class="form-control" name="'.$field->name.'" value=""></p>';
                                }
                        }
                        elseif($field->name != 'id'){
                                echo '<p>'.$field->name.': <input type="text" class="form-control" name="'.$field->name.'" value=""></p>';
                            }
                    }
        }
        
        else{
            //EDITA REGISTRO
             foreach ($fields as $field){
                
                 if(isset($relacoes[0]) && $field->name != 'id' && $field->name != 'modificado_em' && $field->name != 'criado_em')  {
                         //checa se campo é especial, pois está em relações e retorna o chave
                            $i=array_search($field->name,array_column($relacoes, 'campo'));
                            //var_dump($i);
                            $tipo = $relacoes[$i]['tipo'];
                            
                            //se o campo é especial entra nas regras especiais
                            if($i!==false){
                            switch ($tipo) {
                            case 'select':
                                    
                            echo '<p>'.$field->name.': <'.$tipo.' class="form-control" name="'.$field->name.'" >';
                                foreach ($relacoes as $relacao){ if ($field->name==$relacao['campo']){
                                    if($relacao['id'] == $registro[$field->name] ){ echo '<option selected="selected" value="'.$relacao['id'].'" >'.$relacao['nome'].'</option>';} 
                                    else{ echo '<option value="'.$relacao['id'].'" >'.$relacao['nome'].'</option>';}
                                   
                                    }
                                } 
                            echo '</'.$tipo.'></p>';
                            break;
                                    
                            case 'textarea':
                                    
                            echo '<p>'.$field->name.': <'.$tipo.' class="form-control" name="'.$field->name.'" value="'.$registro[$field->name].'">';
                            echo '</'.$tipo.'></p>';
                            break;

                            case 'file':
                                    
                            echo '<p>'.$field->name.': <input type="'.$tipo.'" name="imagem" accept="image/*" value="'.$registro[$field->name].'">';
                            echo '</p>';
                            break;

                            case 'date':
                                    
                            echo '<p>'.$field->name.': <input type="text" class="form-control date" name="'.$field->name.'" value="'.$registro[$field->name].'">';
                            echo '</p>';
                            break;

                            case 'time':
                                     
                            echo '<p>'.$field->name.': <input type="text" class="form-control time" name="'.$field->name.'" value="'.$registro[$field->name].'">';
                            echo '</p>';
                            break;
                                    
                            }
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
                  else{
                            echo '<p>'.$field->name.': <input type="text" class="form-control" name="'.$field->name.'" value="'.$registro[$field->name].'"></p>';
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