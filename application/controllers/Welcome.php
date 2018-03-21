<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->load->library('session');
                 $this->load->library('form_validation');
                $this->load->model('Acao_model');
                $this->load->view('header');
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

        $this->load->view('menu');
		$this->load->view('welcome_message');
        $this->load->view('footer');
    
	}
    
    public function home()
	{
        $this->load->view('header');
        $this->load->view('menu');
        $this->load->view('home');
        $this->load->view('footer');
        
	}
    
        public function login()
	{
        $data['erro'] = '';
        
        $this->session->visitante = 0;
        
        
        $this->load->view('login',$data);
        $this->load->view('footer');
       
    }
    
            public function lembrete_senha()
	{
        
        
        $this->load->view('lembrete_senha');
        $this->load->view('footer');
       
    }
    
     public function login_envio()
	{
        
 
         
        $data['email'] = $this->input->post('email');
        $data['senha'] = ($this->input->post('senha'));
        
        $login= $this->Acao_model->get_usuario($data['email'],$data['senha']);
        
        if($login != FALSE){
            
             $array = array(
                        'user'  => $login['nome'],
                        'user_id' => $login['id']
                        //'termos' => $login['termos_uso']
                    );

        $this->session->set_userdata($array);
            
            $this->load->view('header');
            $this->load->view('menu');
            $this->load->view('home');
            $this->load->view('footer');
            
        } else{
        
            $data['erro'] = '<div class="alert alert-danger"> Erro de e-mail e/ou senha.</div>';
            
            $this->load->view('header');
            $this->load->view('login',$data);
            $this->load->view('footer');
        }
    }
    
    public function email_senha()
	{
        
        $data['email'] = $this->input->post('email');
        $data['resultado'] = $this->Acao_model->get_registro_completo('usuario','email',$data['email']);
        
        $destino = $data['email'];
        $assunto="teste assunto";
        $mensagem="teste mensagem";
            
            $this->load->view('header');            
            if ($data['resultado'] != null) {
                
                    $destino = $data['email'];
                    $assunto="Alteração de senha";
                    $mensagem="<p>Se você solicitou alterar sua senha do Mednesp2019 Admin clique <a href='".site_url('Welcome/perfil/').$data['resultado'][0]['id']."'>aqui</a> para prosseguir.</p>
                    <p>Caso não tenha solicitado, ignore essa mensagem ou entre em contato com o administrador do sistema.</p>
                    ";
                
                    $envio=$this->set_email ($destino,$assunto,$mensagem);
                
                    echo "<h1>Acesse seu e-mail para cadastrar nova senha!</h1>";
                    $this->index();
                   
                
                //echo "<h1>E-mail para recadastrar a senha enviado com sucesso.</h1>";
            } 
                else {echo "<h1>E-mail não cadastrado. Entrar em contato com administrador do sistema.</h1>";}
        
        
    }
    
    public function perfil($id)
	{
        
         $data['perfil']= $this->Acao_model->get_registro('usuario',$id);
         $data['atualiza']= '';
    
        $this->load->view('header');
        //$this->load->view('login_request');
        $this->load->view('menu',$data);
		$this->load->view('perfil',$data);
        $this->load->view('footer');
	}
    
    
    public function update_cadastro()
	{
        $id = $this->input->post('id');
        $data['nome'] = $this->input->post('usuario');
        $data['email'] = $this->input->post('email');
        $data['senha'] = $this->input->post('senha');
        $data['senha2'] = $this->input->post('senha2');
        
        $data['perfil']= $this->Acao_model->get_registro('usuario',$id);
        
        if($data['senha']  ==  $data['senha2'] ) {
               
        $update = $this->Acao_model->update_usuario($data['email'],$data['senha'],$id);
        $data['atualiza']= '<h2>Atualizado com sucesso.</h2>';
        
            
             $this->index();
            
            } else {
            
            $data['atualiza']= '<h2>Não atualizado.Senhas não coincidem.</h2>';
            
            
            $this->load->view('header');
            $this->load->view('menu',$data);
            $this->load->view('perfil',$data);
            $this->load->view('footer');
        }
            
           
        
    }
    
        public function set_email($destino,$assunto,$mensagem)
        {
            
            $this->load->library('email');
            
            //$config = array();
            $config['protocol'] = 'mail';
            $config['smtp_host'] = 'br652.hostgator.com.br';
            $config['smtp_user'] = 'naoresponder@pocketsolucoes.com.br';
            $config['smtp_pass'] = 'pocket123';
            $config['smtp_port'] = '465';
            $config['mailtype'] = 'html';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = 'TRUE';
            
            $this->email->initialize($config);

            $this->email->set_newline('\r\n');
           
            $this->email->from('naoresponder@pocketsolucoes.com.br', 'Mednesp 2019 - ADMIN');
            
            $this->email->to($destino);

            $this->email->subject($assunto);
            $this->email->message($mensagem);
                        
            $this->email->send();
            
            //var_dump($this->email->send());
            
            //print_r($this->email);
            
            
    
     
        }

    
}
