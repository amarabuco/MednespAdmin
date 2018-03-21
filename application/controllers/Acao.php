<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acao extends CI_Controller {
    
         public function __construct()
        {
                parent::__construct();
                $this->load->helper('file');
                $this->load->helper('form');
                $this->load->helper('url_helper');
                $this->load->library('session');
                $this->load->model('Acao_model');
                $this->load->view('header');
                $this->load->view('login_request');

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
  
    
            public function imprime($id)
	{
        
        $data['processo'] = $this->Analise_model->get_processo($id);
        $data['usuario'] = $this->Analise_model->get_usuario($data['processo']['usuario']);
        $data['orgao'] = $this->Analise_model->get_orgao($data['processo']['orgao']);
        $data['analise'] = $this->Analise_model->get_analise($data['processo']['analise']);
                
        $this->load->view('analise/print',$data);
        
	}
    
         public function view($tabela,$id)
	{
        
        $data['tabela'] = $tabela;
        $data['fields'] = $this->Acao_model->get_campos($tabela);
        $data['registro'] = $this->Acao_model->get_registro($tabela,$id);
                
        $this->load->view('menu');
        $this->load->view('library/data_table'); 
        $this->load->view('view',$data);
        $this->load->view('footer'); 
        
	}
    
        public function form_simples($tabela,$id=false)
	{
        if($id != false){$data['registro'] = $this->Acao_model->get_registro($tabela,$id);}
        
        $data['tabela'] = $tabela;
        $data['fields'] = $this->Acao_model->get_campos($tabela);
                
        $this->load->view('menu');
        $this->load->view('library/data_table');
        $this->load->view('form_simples',$data);
        $this->load->view('footer');        
    }
    
     public function form($tabela,$id=false,$copia=false)
	{
        if($id != false){
                $data['registro'] = $this->Acao_model->get_registro($tabela,$id);
        if($copia==1){
                $data['registro']['id']='';
                }
        }
        
        $data['tabela'] = $tabela;
        $data['fields'] = $this->Acao_model->get_campos($tabela);
        $data['relacoes'] = $this->Acao_model->get_relacoes($tabela);
                
        $this->load->view('menu');
        $this->load->view('library/data_table');
        $this->load->view('form',$data);
        $this->load->view('footer');        
    }
    
    public function save_form($tabela)
	{
        
        if(array_key_exists(0,$_POST)){ unset($_POST[0]);}

                if(isset($_FILES['imagem']) && $_FILES['imagem']['name'] != ''){
                
                        $config['upload_path']          = './uploads/palestrante/';
                        $config['allowed_types']        = 'gif|jpg|png';


                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload('imagem'))
                        {
                                $error = array('error' => $this->upload->display_errors());

                                echo $error;
                        }
                        else
                        {
                                $data = array('upload_data' => $this->upload->data());

                                echo 'Arquivo enviado com sucesso!';

                                $_POST['imagem'] = $data['upload_data']['file_name'];
                        }
                }

                if($_POST['id'] == ''){unset($_POST['id']);}

                $data['registro'] = $this->Acao_model->save_form($tabela,$_POST); 
     
        $this->table($tabela);

        }
        

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';


                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('imagem'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_sucess', $data);
                }
        }
        
    
        public function table($tabela)
	{
        
        $data['table'] = $tabela;
        $data['tabela'] = $this->Acao_model->get_tabela($tabela);
        $data['relacoes'] = $this->Acao_model->get_relacoes($tabela);
        
        $this->load->view('menu');
        $this->load->view('library/data_table'); 
        $this->load->view('table',$data);
        $this->load->view('footer');
        
	}
    
        public function json_table($tabela)
	{
        
        $data['table'] = $tabela;
        $data['tabela'] = $this->Acao_model->get_tabela($tabela);
        $data['relacoes'] = $this->Acao_model->get_relacoes($tabela);
        
        return json_encode($data['tabela']);
        
        }
    
    public function apaga($tabela,$id)
	{
        
        $data['tabela'] = $this->Acao_model->apaga($tabela,$id);
        
        //var_dump($data['tabela']);
        
        
        $this->table($tabela);
        
	}
    
              public function teste()
        {
            
                $this->load->view('upload_form', array('error' => ' ' ));
     
        }

    
}
