<?php
date_default_timezone_set('America/Fortaleza');

class Acao_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
                $this->load->library('session');
                $this->load->library('form_validation');
        }
    
            public function get_campos($tabela)
        {
            
            //$fields = $this->db->list_fields($tabela);
            $fields = $this->db->field_data($tabela);
                
                    return $fields;
     
        }
    
            public function save_form($tabela,$data)
        {
            if(isset($data['id'])){
                $this->db->where('id', $data['id']);
                
                $query = $this->db->update($tabela,$data);}
               
            else{
                $query = $this->db->insert($tabela,$data);}
                
                return $query;
     
        }
    
        public function get_tabela($tabela)
        {
            
            $query = $this->db->get($tabela);
                    
            return $query->result_array();
     
        }
    
        public function get_registro($tabela,$id)
        {
            
            $query = $this->db->get_where($tabela,array('id' => $id));
                    
            return $query->row_array();
     
        }
    
          public function get_registro_completo($tabela,$campo,$id)
        {
            
            $query = $this->db->get_where($tabela,array($campo => $id));
                 
            return $query->result_array();
     
        }
    
                public function apaga($tabela,$id)
        {
            
                     $data = array(
                            'ativo' => 1
                    );

                    $this->db->where('id', $id);
                    $this->db->update($tabela, $data); 
                
                return true;
     
        }
    
            public function get_relacoes($tabela)
        {
            
                $query = $this->db->get_where('relacoes',array('t_destino' => $tabela));
                    
                $relacoes = $query->result_array();
                
                $data = [];
                
                foreach ($relacoes as $relacao){
                    
               
                    $relacao_items = $this->db->get($relacao['t_origem'])->result_array();
                    
                    
                    foreach ($relacao_items as $relacao_item){
                        
                        $tipo = $this->db->get_where('tipo_formulario',array('id' => $relacao['tipo']))->row_array();
                        $tipo = $tipo['nome'];
                        
                        $data_item = array(
                                'id' => $relacao_item[$relacao['c_origem']],
                                'nome' => $relacao_item[$relacao['c_exibivel']],
                                'campo' => $relacao['c_destino'],
                                'tipo' => $tipo

                        );
                        array_push($data,$data_item);
                        
                        //evita que selecione vários resultados que não sejam de multipla opção, como textarea
                        if ($tipo!='select') {break;}
                        }
                        
                    }
                    
                 return $data;
                
                 
        }
    
       public function get_usuario($email,$senha)
        {

            $query = $this->db->get_where('usuario',array('email' => $email,'senha' => $senha));
            $query = $query->row_array();
            
            return $query;
        
        }
    
    public function update_usuario($email,$senha,$id)
        {
            $data = array(
                        
                        'email' => $email,
                        'senha'=> $senha
                    );
            
            
            $this->db->where('id',$id);
            $this->db->update('usuario',$data);
                                    
        }
    
    
}