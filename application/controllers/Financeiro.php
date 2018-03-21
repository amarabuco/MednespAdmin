<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro extends CI_Controller {
    
    
      public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->load->library('session');
                $this->load->model('Financeiro_model');
                $this->load->model('Acao_model');
                $this->load->view('header');
                $this->load->view('login_request');
                $this->load->view('library/data_table');
                $this->load->view('menu');

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
        
        $data['transacoes'] = $this->Financeiro_model->get_transacoes();
        
        $this->load->view('financeiro/financeiro',$data); 
        $this->load->view('footer');
        

	}
    
    
    
    public function get_transacoes()
	{
		$data['transacoes'] = $this->Financeiro_model->get_transacoes();
        
        $this->load->view('financeiro/financeiro',$data);       
        
	} 
    
    public function integra()
	{
		$prazo=$_POST['prazo']; 
        $resposta= $this->Financeiro_model->integra_pagseguro($prazo);
        
        $data['table'] = 'inscricao';
        $data['tabela'] = $this->Acao_model->get_tabela('inscricao');
        $data['relacoes'] = $this->Acao_model->get_relacoes('inscricao');
        
        if($resposta == 0){      
            echo "<h2>Não foram encontradas transações</h2>";
            $this->load->view('footer');
         }
        else {
            
            //var_dump($resposta);
            $this->load->view('table',$data);
            $this->load->view('footer');
        } 
        
	}
    
     public function integra_auto()
	{
      $resposta= $this->Financeiro_model->integra_pagseguro(15);
     
     }
    
    public function nova_transacao()
	{
        
        $this->load->view('financeiro/nova_transacao');       
        
	}
    
        public function credenciamento()
	{
        
        $this->load->view('financeiro/credenciamento');       
        
	}
    
}
