<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *'); 



class Consulta extends CI_Controller {
    
         public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->load->library('session');
                $this->load->model('Acao_model');
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
  
    
        public function json_table($tabela)
	{
        
        $data['table'] = $tabela;
        $data['tabela'] = $this->Acao_model->get_tabela($tabela);
        $data['relacoes'] = $this->Acao_model->get_relacoes($tabela);
        
        echo json_encode($data['tabela']);
        
	}

	public function promo(){
         
		$this->load->view('evento/promo');
		 
	     }
    
}
