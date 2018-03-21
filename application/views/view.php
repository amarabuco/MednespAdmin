<div class="container-fluid">
    
<p class='h4'><?php echo $tabela; ?></p>
    
<?php 

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
            
         
                /*
    
    
    
            foreach ($registro as $registro_campo){
                
                $chave=array_search($registro_campo,$registro);
                
                if($chave != 'id' && $chave != 'modificado_em' && $chave != 'criado_em')  {
                    
                    
                            echo '<div class="panel panel-primary">';
                            echo '<div class="panel-heading"><i class="fas fa-info-circle"></i> '.$chave.'</div>';
                            echo '<div class="panel-body">'.$registro_campo.'</div>';
                            echo '</div>';
                                    }
                                }
                                
                                */
                ?>

           
        </form>
    </div>

<script>
        
    $( document ).ready(function() {
        $("input").prop('disabled', true);
        
});
    </script>
