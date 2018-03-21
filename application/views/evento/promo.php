<?php 

date_default_timezone_set('America/Fortaleza');

$data_inicio='23-02-2018 00:00:00';
$data_fim='24-02-2018 23:59:59';

//$data_inicio='03-02-2018 11:16:00';
//$data_fim='03-02-2018 11:23:00';

$limite = 300;
$preco_normal=150;
$preco_promo=120;

$data=date('d-m-Y H:i:s',strtotime("now"));


if($data>$data_inicio && $data<$data_fim){

?>
<h4>PROMOÇÃO ABERTA</h4>

<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="itemCode" value="416D2FA41B1B8A91144BEFB1F072FAA5" />
<input type="hidden" name="iot" value="button" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/99x61-comprar-azul-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->

<?php  } 

elseif($data<$data_inicio) { echo "<div class='alert alert-danger'><h4>Promoção</h4> Inscrição com desconto a partir de ".$data_inicio." até ".$data_fim.". Limitadas até ".$limite." inscrições. Preço lote inicial: R$ <span style='text-decoration: line-through;'>".$preco_normal."</span>. Preço promocional: R$ ".$preco_promo." </div>";
                            $d1=new DateTime($data); 
                            $d2=new DateTime($data_inicio); 
                            $diff=$d2->diff($d1);
                            $d=$diff->d;

                           echo "<h3>Faltam ".$d." dias!!! </h3>";
                            
                         ?>   
<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  round( $d/28 * 100,0).'%'; ?>">
      <?php //echo  round( $d/28 * 100,0).'%'; ?>
  </div>
</div>
                      
                      <?php
                           }

elseif($data>$data_fim) { ?>

<h4>1º LOTE</h4>

<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="itemCode" value="243253B0ADAD28AFF4396FA4E2CD7146" />
<input type="hidden" name="iot" value="button" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/99x61-comprar-preto-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->


<?php 
                        }

?>