<?php

date_default_timezone_set('America/Fortaleza'); 
ini_set('max_execution_time', 30000);

class Financeiro_model extends CI_Model {

    public function __construct()
        {
                $this->load->database();
                $this->load->view('api');
        }
    
    public function get_transacoes(){

    $this->db->from('inscricao');
    $this->db->order_by('id DESC');
    $inscricoes=$this->db->get()->result_array();
    
    $transacoes=[];
        foreach ($inscricoes as $inscricao)
                {
            
                $status= $this->db->get_where('status', array('codigo' => $inscricao['status']))->row_array();
                $tipo_pgto= $this->db->get_where('meio_pagamento', array('codigo' => $inscricao["tipo_pagamento"]))->row_array();
                $pessoa= $this->db->get_where('pessoa', array('id' => $inscricao['pessoa']))->row_array();
                    
                $data_item = array(
                                "data da transacao"=>$inscricao["data_transacao"],
                                "pessoa"=>$pessoa["nome"],
                                "codigo"=>$inscricao["codigo"],
                                "status"=>$status['nome'],
                                "data da atualizacao"=>$inscricao["data_atualizacao"],
                                "forma de pagamento"=>$tipo_pgto["nome"],
                                "valor bruto"=>$inscricao["valor_bruto"],
                                "valor taxa"=>$inscricao["valor_taxa"],
                                "valor desconto"=>$inscricao["valor_desconto"],
                                "valor liquido"=>$inscricao["valor_liquido"],	
                                "data_liquidacao"=>$inscricao["data_liquidacao"],	
                                "parcelas"=>$inscricao["parcelas"],	
                                "qtd"=>$inscricao["qtd"],	
                                //"id_produto"=>$inscricao["id_produto"],	
                                "produto"=>$inscricao["produto"],	
                                "preco"=>$inscricao["preco"],	
                                "data_api"=>$inscricao["data_api"]
                    
                    );
            
                    array_push($transacoes,$data_item);

                }

        return $transacoes;
    
    }
    
    public function integra_pagseguro($prazo){

        $this->db->from('config_api');
        $query=$this->db->get();
        $api=$query->row_array();

$dia=date_create(date('Y-m-d',strtotime('now')));
date_sub($dia, date_interval_create_from_date_string($prazo.' days'));
$fim=date('Y-m-d',strtotime('now')).'T00:00';
$inicio=date_format($dia, 'Y-m-d').'T00:00';
        
//acesso api
$email=$api['email'];
$token=$api['token'];
//$data_inicio=$inicio;
//$data_fim=$fim;
$data_inicio=$inicio;
$data_fim=$fim;
$page=$api['pagina'];
$maxresultados=$api['max'];

//variaveis inscricao
$data_transacao;
$codigo;
$status;
$data_atualizacao;
$tipo_pagamento;
$link_pgto;
$valor_bruto;
$valor_taxa;
$valor_desconto;
$valor_liquido;	
$data_liquidacao;	
$parcelas;	
$qtd;	
$id_produto;	
$produto;	
$preco;	
$data_api;

//variaveis pessoa
$pessoa;
$id;	
$nome;	
$email;
$senha;	
$telefone;

//variaveis endereco
$endereco;
$rua;
$numero;
$complemento;	
$bairro;
$cidade;
$estado;	
$pais;	
$cep;



               
$request_url = "https://ws.pagseguro.uol.com.br/v2/transactions?initialDate=".$data_inicio."&finalDate=".$data_fim."&page=".$page."&maxPageResults=".$maxresultados."&email=".$email."&token=".$token;

 
//$request_url2="https://ws.pagseguro.uol.com.br/v2/transactions?initialDate=2017-07-01T00:00&finalDate=2017-08-01T00:00&page=1&maxPageResults=100&email=katiamarabuco@gmail.com&token=47DD9DC135F24BE7935C9FDBB917844B";

$inscricoes=[];
$k=0;



$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $request_url);
curl_setopt($curl, CURLOPT_TIMEOUT, 130);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($curl);
            curl_close($curl);    

$xml = new SimpleXMLElement($response);
        

if(!isset($xml->transactions->transaction)){return 0;}


foreach($xml->transactions->transaction as $transaction){
    
    $inscricoes[$k]= $transaction->code;
    $k++;

/*    
$data_transacao=$transacao->date;
$codigo=$transacao->code;
$status=$transacao->status;
$data_atualizacao=$transacao->lastEventDate;
$tipo_pagamento=$transacao->type;
$link_pgto=$transacao->;
$valor_bruto=$transacao->grossAmount;
$valor_taxa=$transacao->feeAmount;
$valor_desconto=$transacao->discountAmount;
$valor_liquido=$transacao->netAmount;	
$data_liquidacao=$transacao->;	
$parcelas=$transacao->;	
$qtd=$transacao->;	
$id_produto=$transacao->;	
$produto=$transacao->;	
$preco=$transacao->;	
$data_api=$transacao->;
*/
    
    
}



/*
$request_url_2 = "https://ws.pagseguro.uol.com.br/v3/transactions/".$inscricoes[0]."?email=".$email."&token=".$token;

    $curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $request_url_2);
curl_setopt($curl, CURLOPT_TIMEOUT, 130);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($curl);
            curl_close($curl);    

$i = new SimpleXMLElement($response);
*/


foreach($inscricoes as $inscricao){
   
    $request_url_2 = "https://ws.pagseguro.uol.com.br/v3/transactions/".$inscricao."?email=".$email."&token=".$token;
    
        
    
    $curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $request_url_2);
curl_setopt($curl, CURLOPT_TIMEOUT, 130);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($curl);
            curl_close($curl);    

$i = new SimpleXMLElement($response);
    
    
$transacao["data_transacao"]=$i->date;
$transacao["codigo"]=$i->code;
$transacao["status"]=$i->status;
$transacao["data_atualizacao"]=$i->lastEventDate;
$transacao["tipo_pagamento"]=$i->type;
$transacao["codigo_pagamento"]=$i->paymentMethod->code;
$transacao["valor_bruto"]=$i->grossAmount;
$transacao["valor_taxa"]=$i->creditorFees->commissionFeeAmount;
$transacao["valor_desconto"]=$i->discountAmount;
$transacao["valor_liquido"]=$i->netAmount;	
$transacao["data_liquidacao"]=$i->escrowEndDate;	
$transacao["parcelas"]=$i->installmentCount;	
$transacao["qtd"]=$i->items->item->quantity;	
$transacao["id_produto"]=$i->items->item->id;	
$transacao["produto"]=$i->items->item->description;	
$transacao["preco"]=$i->items->item->amount;	
$transacao["data_api"]=date("c");
 
$pessoa["nome"]=$i->sender->name;	
$pessoa["email"]=$i->sender->email;
$pessoa["telefone"]=$i->sender->phone;
    
$endereco["rua"]=$i->shipping->address->street;
$endereco["numero"]=$i->shipping->address->number;
$endereco["complemento"]=$i->shipping->address->complement;	
$endereco["bairro"]=$i->shipping->address->district;
$endereco["cidade"]=$i->shipping->address->city;
$endereco["estado"]=$i->shipping->address->state;	
$endereco["pais"]=$i->shipping->address->country;	
$endereco["cep"]=$i->shipping->address->postalCode;

//echo"Pessoa";
//print_r($pessoa);
//echo"<br>endereco";
//print_r($endereco);
//echo"<br>transacao";

//echo"<br><br>";
//}
/*
$this->db->where('codigo', $transacao["codigo"]);
            $this->db->from('inscricao');
             
            $this->session->total_perguntas = $this->db->count_all_results();
                
             $query = $this->db->get_where('template',array('id' => $template));
             if (count($query->row_array()) > 0){
             
             return $query->row_array();
*/
$x=1;
    
if($x!=0){
 
//print("CODIGO: ".$transacao['codigo']);
    
$this->db->from('inscricao');
    $this->db->where('codigo',$transacao["codigo"]);
    $query=$this->db->get();

//$query = $this->db->get('inscricao', array('codigo' => $transacao["codigo"]));
//print("<BR>QUERY: ");
//print_r($query->row_array()); 
if ($query->row_array() != null)

{ 
    //echo date("c");
    $this->db->where('codigo',$transacao["codigo"]);
    $this->db->update('inscricao', $transacao);
    
} 


else { 
    
    $this->db->insert('inscricao', $transacao);
    /*
    $this->db->from('inscricao');
    $this->db->limit(1);
    $this->db->order_by('id DESC');
    $id_inscricao=$this->db->get()->row_array();
    echo $id_inscricao['id'];
    */
    
    $this->db->insert('endereco', $endereco);
    $this->db->from('endereco');
    $this->db->limit(1);
    $this->db->order_by('id DESC');
    $id_endereco=$this->db->get()->row_array();
    echo $id_endereco['id'];
    
    $this->db->insert('pessoa', $pessoa);
    $this->db->from('pessoa');
    $this->db->limit(1);
    $this->db->order_by('id DESC');
    $id_pessoa=$this->db->get()->row_array();
    echo $id_pessoa['id'];
    
    //insere pessoa e endereco na inscricao
    $this->db->set('pessoa', $id_pessoa['id']);
    $this->db->set('endereco', $id_endereco['id']);
    $this->db->where('codigo',$transacao["codigo"]);
    $this->db->update('inscricao');
    
    //insere pessoa no endereco
    $this->db->set('pessoa', $id_pessoa['id']);
    $this->db->where('id',$id_endereco['id']);
    $this->db->update('endereco');
    
            }
    
    

        }

    }
        return true;
}
    
    
    
    }

?>