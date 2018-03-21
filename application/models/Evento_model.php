<?php
class Evento_model extends CI_Model {
        
    public function __construct()
        {
                $this->load->database();
        }
    
    public function get_bread($template)
        {
            
            
            $query = $this->db->get_where('menu',array('template' => $template));
            
            $pai=$query->row()->pai;
            
            $breadcumb="";

            $breadcumb= array(
                array(
                "nome" => $query->row()->nome,
                "pai" => $query->row()->pai,
                    )
            );
            
            while($pai != NULL){
            $query = $this->db->get_where('menu',array('id' => $pai));
            $pai=$query->row()->pai;
            $nome=$query->row()->nome;
                $b=  array(
                "nome" => $query->row()->nome,
                "pai" => $query->row()->pai                
                    );
            array_unshift($breadcumb,$b);
               
            }
            
            return $breadcumb;
                        
        }
    
         public function get_breadbadge($template){
             $query = $this->db->get_where('template',array('id' => $template));
             
             return $query->row()->respostas;
         }
    
        public function get_menu(){
            
            $this->db->select ('*');
            $this->db->from('menu');
            $query = $this->db->get();
            
             return $query->result_array();
         }
    
     public function get_palestrantes(){
            
            $this->db->select ('*');
            $this->db->from('palestrante');
            $query = $this->db->get();
            
             return $query->result_array();
         }
      
    
    public function get_palestras(){
            
            $this->db->select ('*');
            $this->db->from('palestra');
            $query = $this->db->get();
            
             return $query->result_array();
         }
    
    public function get_palestra(){
            
            $this->db->select ('*');
            $this->db->from('palestra');
            $query = $this->db->get();
            
             return $query->row_array();
         }
    
    }

?>