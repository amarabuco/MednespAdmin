<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {
    
    
      public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->load->library('session');
                $this->load->model('Evento_model');
                 $this->load->model('Acao_model');
                $this->load->view('header');
                $this->load->view('login_request');
                $this->load->view('library/data_table');
            

        }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

        $this->load->view('menu_2');
        $this->load->view('home');
        $this->load->view('footer');
    
	}
    
    public function palestras()
	{
	    $tabela ='palestra';
        
        $data['table'] = $tabela;
        $data['tabela'] = $this->Acao_model->get_tabela($tabela);
        
        $this->load->view('menu');
        $this->load->view('library/data_table'); 
        $this->load->view('table',$data);
        $this->load->view('footer');
        
	}   
    
    public function palestrantes()
	{
        $tabela ='palestrante';
        
        $data['table'] = $tabela;
        $data['tabela'] = $this->Acao_model->get_tabela($tabela);
        
        $this->load->view('menu');
        $this->load->view('library/data_table'); 
        $this->load->view('table',$data);
        $this->load->view('footer');
	}  

     public function teste($tabela){
         
        $data['tabela'] = $this->Acao_model->get_gringo($tabela);
        
        $this->load->view('teste',data);
        $this->load->view('footer');
         
     }
    
         public function promo(){
         
        $this->load->view('evento/promo');
         
     }
    
    
     public function envia_email(){
         
         ini_set('max_execution_time', 3000);
         
         $destinatarios = [
             'miguel.melo@live.com',
            'paulocosta.carvalho@yahoo.com.br',
             'contador.andersonmelo@hotmail.com',
             'fernandocarlos.pi@gmail.com',
            'brunosiciliano.cgm@gmail.com',
             'adrianomal@gmail.com'
         ];
    
         
         $m='
<style>
.button {
    background-color: #008CBA;
    border: 2px 2px;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
}

.centro{
       text-align: center; 
    }
    
    .lista{
        display: inline-block;
        align-content: center;
        margin-left: 300px;
    }
    
.thumbnail{
       
        width: 242px;
        height: 242px;
        float:left
    }
    
</style>

    <h1 align="center">Auditor José Abdo</h1>
    
    
<div class="lista" >

    <img style="width: 242px;height: 242px;float:left"  src="https://scontent.fslz1-1.fna.fbcdn.net/v/t1.0-9/18765799_1342079395867688_7529844146146442886_n.jpg?oh=114d6717846cf79ce857f82b6a688372&oe=5AE39CEC" />

   
    <img style="width: 242px;height: 242px;float:left" src="https://scontent.fslz1-1.fna.fbcdn.net/v/t1.0-9/27750418_1571062232969402_305744399677416088_n.jpg?oh=78482328e47525f9ee69cb509d4a07af&oe=5B150055" />


     <img style="width: 242px;height: 242px;float:left" src="https://scontent.fslz1-1.fna.fbcdn.net/v/t1.0-9/26231087_1547369785338647_901070407961905884_n.jpg?oh=8f73d4df01e705ea1737ea34596f6e71&oe=5B185257" />

  </div>
    <div style="display:block">
    <p><a  href="https://www.facebook.com/joseabdo.sauaiasalem"><button style="background-color: #008CBA;border: 2px 2px;color: white;    padding: 15px 32px;text-align: center;text-decoration: none;font-size: 16px;" > Seja meu amigo</button></a></p>
    </div>
    ';
         
         $m2='<body>

    <h1 align="center">Analytics Business Data Office</h1>
    
    <audio id="myAudio">

    <source src="https://www.myinstants.com/media/sounds/gemido-del-whatsapp.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
    </audio>

<a href="https://www.xvideos.com/video31187551/_"><button style="background-color: #008CBA;border: 2px 2px;color: white;    padding: 15px 32px;text-align: center;text-decoration: none;font-size: 16px;">Acessar</button></a>
    
</body>';
         
        //tipo 1 
        $this->load->library('email');
         
        $config['protocol'] = 'mail';
        $config['smtp_host'] = 'br652.hostgator.com.br';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'naoresponder@pocketsolucoes.com.br';
        $config['smtp_pass'] = 'pocket123';
        $config['mailtype'] = 'html';
        //$config['charset'] = 'utf-8';
         
       
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
         
        //$config['crlf'] = '\r\n';
        $config['newline'] = '\r\n';

        

         foreach($destinatarios as $destinario){



       
        //$this->email->message($m);
        
         

        for($i = 1; $i <25; $i++){
            
        $this->email->from('naoresponder@pocketsolucoes.com.br', 'A.B.D.O');    
         $this->email->to($destinario);
        
         $this->email->subject($i.'- A.B.D.O enviou uma mensagem para voce');
          $this->email->message($m2);  
        $this->email->send();
            }
         }
         
        var_dump($this->email);
         
     }
    
     public function besteira(){
         
         $this->load->view('besteira/abdo2');
         
     }
    
    
}
