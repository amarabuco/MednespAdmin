<div class="container-fluid">
    <p><a href="<?php echo site_url("acao/form/".$table);?>"><button class="btn btn-success">Novo</button></a>
        <?php if($table == 'inscricao'){echo '<button class="btn btn-primary"  data-toggle="modal" data-target="#syncm">Sincronizar</button>';}?>
    </p>


<?php //var_dump($relacoes); 
     
    //echo $data=date('Y-m-d',strtotime('tomorrow')).'T00:00';
    ?>
    
<?php if($tabela != []){ ?>
<div class="panel panel-primary">
  <div class="panel-body">
<?php echo '<h3>'.$table.'</h3>'; ?>      
      
    <table id="tabela" class="display table table-striped table-hover table-condensed table-bordered responsive" cellspacing="0" width="100%">

    <?php         
             $colunas=array_keys($tabela['0']);

            echo " <thead><tr class='info'>"; 
              foreach($colunas as $coluna){
                    echo "<th>".$coluna."</th>";  }
            echo "<th>Ação</th>";
            echo "</thead></tr>";

            echo " <tfoot><tr class='info'>"; 
              foreach($colunas as $coluna){
                    echo "<th>".$coluna."</th>";  }
            echo "<th>Ação</th>";
            echo "</tfoot></tr><tbody>";

        foreach ($tabela as $tabela_item){

                echo "<tr>";
                foreach($tabela_item as $k=>$tabela_campo){
                    $i=false;
                    foreach($relacoes as $relacao){
                        
                    if($k == $relacao['campo'] &&  $relacao['id']==$tabela_campo){
                       //var_dump($tabela_item[$relacao['campo']]);
                        //echo $relacao['campo'];
                        echo "<td>".$relacao['nome']."</td>";
                        $i=true;
                        
                        
                    } 
                        }
                    
                    if($i == false) {echo "<td>".$tabela_campo."</td>"; 
                        }
                        
                    
                }
                 echo "<td> 
                 
                 <a href=".site_url('Acao/form/'.$table.'/'.$tabela_item['id'])."><button class='btn btn-warning'><i class='far fa-edit'></i></button></a>
                 
                 <a href=".site_url('Acao/form/'.$table.'/'.$tabela_item['id']).'/1'."><button class='btn btn-primary clone'><i class='far fa-copy'></i></button></a>

                 <a href=".site_url('Acao/view/'.$table.'/'.$tabela_item['id'])."><button class='btn btn-info'><i class='fas fa-eye'></i></button></a>
                 
                 </td>";
                 echo "</tr>";
           
            }
              echo "</tbody>";  
    ?>
    </table>
              </div>
        </div>
    </div>

<?php } else { echo ("<h1><i class='fas fa-exclamation-triangle fa-1x'> </i> Não há dados.</h1>"); } ?>

<form action="<?php echo site_url("Financeiro/integra");?>" method='post'>
<div class="modal fade" id="syncm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sincronização PagSeguro</h4>
      </div>
      <div class="modal-body">
        <select class="form-control" name='prazo'>
            <option value='1'>Hoje</option>
            <option value='7'>Últimos 7 dias</option>
            <option value='15'>Últimos 15 dias</option>
            <option value='30'>Últimos 30 dias</option>
        </select>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info">Enviar</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>
        
    $( document ).ready(function() {

        $('.clone').click(function(){
           var r = confirm("Deseja clonar esse registro?");
            
            if(r == false){ event.preventDefault();}
        })
        
});
    </script>
