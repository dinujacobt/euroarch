<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('admin_model');
        if (!isset($this->session->userdata['user_id'])) {
            redirect('login');
            exit;
        }
    }

    public function index($messages = NULL) {
        $products['active'] = $this->admin_model->product_list_active();
        $products['inactive'] = $this->admin_model->product_list_inactive();

        $this->load->view('product_list', $products);
    }

    public function add_product() {
        $this->load->view('add_product');
    }

    public function add_product_fn() {
        $this->admin_stock = realpath('./uploads/admin_stock');
        $this->stock_view = realpath('./uploads/stock_view');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'xss_clean|trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|xss_clean');
        if (!$this->form_validation->run() == FALSE) {
            $name = $this->input->post("name");
            $description = $this->input->post("description");
            $stock = $this->input->post("stock");
            if (isset($_FILES['userfile']) && is_uploaded_file($_FILES['userfile']['tmp_name'])) {
                $config_pf['upload_path'] = './uploads/';
                $config_pf['allowed_types'] = 'gif|jpg|png|jpeg';
                $config_pf['max_size'] = '2048';
                $this->load->library('image_lib');
                $this->load->library('upload');
                $this->upload->initialize($config_pf);
                $fileExt = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                $filename = $name . "." . $fileExt;
                $_FILES['userfile']['name'] = $filename;
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('add_product', $data);
                } else {
                    $upload_data = $this->upload->data();

                    $configin = array(
                        'source_image' => $upload_data['full_path'], //path to the uploaded image
                        'new_image' => $this->admin_stock, //path to
                        'maintain_ratio' => true,
                        'width' => 128
                    );
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configin);
                    $this->image_lib->resize();
                    $config = array(
                        'source_image' => $upload_data['full_path'], //path to the uploaded image
                        'new_image' => $this->stock_view, //path to
                        'maintain_ratio' => true,
                        'width' => 400
                    );
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();


                    $file_url = $upload_data['file_name'];
                    $this->admin_model->add_product($name, $description, $stock, $file_url);
                    $this->session->set_flashdata('success', 'Product Added Successfully');
                    redirect('admin');
                }
            } else {
                $this->admin_model->add_product($name, $description, $stock, NULL);
                $this->session->set_flashdata('success', 'Product Added Successfully');
                redirect('admin');
            }
        } else {
            $this->load->view('add_product');
        }
    }

    function edit_product($id = NULL) {
        $res = $this->admin_model->product_details($id);
        $this->load->view('edit_product', $res);
    }

    function status_change($id = NULL, $status = NULL) {
        $res = $this->admin_model->status_change($id, $status);
        if ($res) {
            $this->session->set_flashdata('success', 'status changed successfull');
        } else {
            $this->session->set_flashdata('error', 'error');
        }

        redirect('admin');
    }

    function delete_product($id = NULL) {
        $res = $this->admin_model->delete_product($id);
        if ($res) {
            $this->session->set_flashdata('success', 'product deleted successfull');
        } else {
            $this->session->set_flashdata('error', 'error');
        }

        redirect('admin');
    }

    function update_product_fn() {
        $this->admin_stock = realpath('./uploads/admin_stock');
        $this->stock_view = realpath('./uploads/stock_view');
        $this->form_validation->set_rules('id', 'Id', 'trim|required');
        $this->form_validation->set_rules('rank', 'Rank', 'trim|required|integer', array('integer' => 'Rank should be an integer number'));
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'xss_clean|trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|xss_clean');
        $id = $this->input->post("id");
        $file_url = NULL;
        if (!$this->form_validation->run() == FALSE) {

            $name = $this->input->post("name");
            $rank = $this->input->post("rank");

            $description = $this->input->post("description");
            $stock = $this->input->post("stock");
            if (isset($_FILES['userfile']) && is_uploaded_file($_FILES['userfile']['tmp_name'])) {
                $config_pf['upload_path'] = './uploads/';
                $config_pf['allowed_types'] = 'gif|jpg|png|jpeg';
                $config_pf['max_size'] = '2048';
                $this->load->library('image_lib');
                $this->load->library('upload');
                $this->upload->initialize($config_pf);
                $fileExt = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                $filename = $name . "." . $fileExt;
                $_FILES['userfile']['name'] = $filename;
                if (!$this->upload->do_upload('userfile')) {
                    $data = $this->admin_model->product_details($id);
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('edit_product', $data);
                } else {
                    $upload_data = $this->upload->data();
                    $configin = array(
                        'source_image' => $upload_data['full_path'], //path to the uploaded image
                        'new_image' => $this->admin_stock, //path to
                        'maintain_ratio' => true,
                        'width' => 128
                    );
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configin);
                    $this->image_lib->resize();
                    $config = array(
                        'source_image' => $upload_data['full_path'], //path to the uploaded image
                        'new_image' => $this->stock_view, //path to
                        'maintain_ratio' => true,
                        'width' => 400
                    );
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $file_url = $upload_data['file_name'];
                    $this->admin_model->edit_product($name, $description, $stock, $file_url, $id, $rank);
                    $this->session->set_flashdata('success', 'Product Edited Successfully');
                    redirect('admin');
                }
            } else {
                $this->admin_model->edit_product($name, $description, $stock, $file_url, $id, $rank);
                $this->session->set_flashdata('success', 'Product Edited Successfully');
                redirect('admin');
            }
        } else {
            $data = $this->admin_model->product_details($id);
            $data['error'] = "some fileds were empty . Coudn't update";
            $this->load->view('edit_product', $data);
        }
    }

    function profile() {
        $this->load->view('change_password');
    }

    function update_password() {
        if (isset($this->session->userdata['user_id'])) {
            $this->form_validation->set_rules('old', 'Old Password', 'xss_clean|trim|required');
            $this->form_validation->set_rules('new', 'New Password', 'xss_clean|trim|required');
            $this->form_validation->set_rules('new1', 'Password Confirmation', 'xss_clean|trim|required|matches[new]');
            if (!$this->form_validation->run() == FALSE) {
                $old = $this->input->post("old");
                $new = $this->input->post("new");
                $res = $this->admin_model->check_old_pass($old);
                if ($res) {
                    $this->admin_model->update_pass($new);
                    $this->session->set_flashdata('success', 'New Password updated.');
                    redirect('admin/profile');
                } else {
                    $this->session->set_flashdata('error', 'Old Password not matched .Password Not changed .');
                    redirect('admin/profile');
                }
            } else {
                $this->load->view('change_password');
            }
        } else {
            redirect('login');
        }
    }

    function gallery() {
        $res['images'] = $this->admin_model->images_list();
        $this->load->view('gallery_admin', $res);
    }

    function add_gallery_image() {
        $this->gallery_view = realpath('./uploads/gallery_view');
        if (isset($_FILES['userfile']) && is_uploaded_file($_FILES['userfile']['tmp_name'])) {
            $config_pf['upload_path'] = './uploads/';
            $config_pf['allowed_types'] = 'gif|jpg|png|jpeg';
            $config_pf['max_size'] = '2048';
            $config_pf['encrypt_name'] = TRUE;
            $this->load->library('image_lib');
            $this->load->library('upload');
            $this->upload->initialize($config_pf);
            if (!$this->upload->do_upload('userfile')) {
                $data['error'] = $this->upload->display_errors();
                $data['images'] = $this->admin_model->images_list();
                $this->load->view('gallery_admin', $data);
            } else {
                $upload_data = $this->upload->data();
                $configin = array(
                    'source_image' => $upload_data['full_path'], //path to the uploaded image
                    'new_image' => $this->gallery_view, //path to
                    'maintain_ratio' => true,
                    'width' => 350
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configin);
                $this->image_lib->resize();

                $file_url = $upload_data['file_name'];
                $this->admin_model->add_gallery_image($file_url);
                $this->session->set_flashdata('success', 'Image added successfully');
                redirect('admin/gallery');
            }
        } else {
            $this->session->set_flashdata('error', 'Select a image to upload');
            redirect('admin/gallery');
        }
    }

    function remove_image($id = NULL) {
        if ($id != NULL) {
            $res = $this->admin_model->remove_image($id);
            if ($res) {
                $this->session->set_flashdata('success', 'Image Deleted');
                redirect('admin/gallery');
            } else {
                $this->session->set_flashdata('error', 'Server Error');
                redirect('admin/gallery');
            }
        }
    }

}
