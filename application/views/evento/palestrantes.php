<div class="container-fluid"> <br>
    
<div class="btn btn-success"><a href="../Acao/form/palestrantes">Novo</a></div><hr>
    
<table id="palestrantes" class="table table-striped table-bordered" cellspacing="0" width="100%">
    
<?php 
    
     $colunas=array_keys($palestrantes['0']);
        
        echo " <thead><tr>"; 
          foreach($colunas as $coluna){
                echo "<th>".$coluna."</th>";  }
        echo "</thead></tr>";
    
        echo " <tfoot><tr>"; 
          foreach($colunas as $coluna){
                echo "<th>".$coluna."</th>";  }
        echo "</tfoot></tr><tbody>";
    
    foreach ($palestrantes as $palestrante){
            
            echo "<tr>";
            foreach($palestrante as $palestrante_campo){
                echo "<td>".$palestrante_campo."</td>";
            }
             echo "</tr>";
        }
          echo "</tbody>";  
?>
</table>

</div>
