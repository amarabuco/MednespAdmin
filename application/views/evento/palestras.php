<div class="container-fluid"> <br>

<div class="btn btn-success"><a href="../Acao/form/palestrantes">Nova</a></div><hr>
    
<table id="palestras" class="table table-striped table-bordered" cellspacing="0" width="100%">
    
<?php 
    
     $colunas=array_keys($palestras['0']);
        
        echo " <thead><tr>"; 
          foreach($colunas as $coluna){
                echo "<th>".$coluna."</th>";  }
        echo "</thead></tr>";
    
        echo " <tfoot><tr>"; 
          foreach($colunas as $coluna){
                echo "<th>".$coluna."</th>";  }
        echo "</tfoot></tr><tbody>";
    
    foreach ($palestras as $palestra){
            
            echo "<tr>";
            foreach($palestra as $palestra_campo){
                echo "<td>".$palestra_campo."</td>";
            }
             echo "</tr>";
        }
          echo "</tbody>";  
?>
</table>

</div>
