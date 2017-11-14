<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Gallery extends CI_Controller{
    function index(){
        $this->load->model('admin_model');
        $res['images'] = $this->admin_model->images_list();
        $this->load->view('gallery',$res);
    }
}
