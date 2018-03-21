<?php date_default_timezone_set('America/Fortaleza'); 
ini_set('max_execution_time', 300);

?>

<div class="container-fluid"> <br>
    
    <div class="btn btn-success"><a href="Acao/form/inscricao">Novo</a></div>
    <div class="btn btn-primary"><a href="Financeiro/integra">Sincronizar</a></div><br>
    <hr>
    
    <table  id="palestrantes" class="table table-striped table-bordered" cellspacing="0" width="100%">
     
<?php
    $colunas=array_keys($transacoes['0']);
    
    echo " <thead><tr>"; 
          foreach($colunas as $coluna){
                echo "<th>".$coluna."</th>";  }
        echo "</thead></tr>";
    
        echo " <tfoot><tr>"; 
          foreach($colunas as $coluna){
                echo "<th>".$coluna."</th>";  }
        echo "</tfoot></tr><tbody>";
    
    foreach ($transacoes as $transacao){
            
            echo "<tr>";
            foreach($transacao as $transacao_campo){
                echo "<td>".$transacao_campo."</td>";
            }
             echo "</tr>";
        }
          echo "</tbody>";  
?>
    </table>
</div>