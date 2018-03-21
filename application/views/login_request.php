<?php

    //var_dump($this->session->userdata);
    //var_dump(!array_key_exists('user',$this->session->userdata));
    //var_dump(!array_key_exists(!$this->session->has_userdata('user')));

    if (!$this->session->has_userdata('user') || !array_key_exists('user',$this->session->userdata)){
        
        header("Location:".site_url());
        
   } 

   ?>