<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    function index() {
        $this->load->view('contact');
    }

    function send_mail() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pno', 'Phone Number', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Meassge', 'trim|required|xss_clean');
        if (!$this->form_validation->run() == FALSE) {
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $pno = $this->input->post("pno");
            $message = $this->input->post("message");
            $config = Array(                
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );
//            $config = Array(
//                'protocol' => 'smtp',
//                'smtp_host' => 'ssl://smtp.gmail.com',
//                'smtp_port' => 465,
//                'smtp_user' => 'euroarchmailer@gmail.com',
//                'smtp_pass' => '123qaz!@',
//                'mailtype' => 'html',
//                'charset' => 'iso-8859-1'
//            );
            $this->load->library('email', $config);
            $content_user = '<html>
<head></head>
<body>
<div style="padding: 16px;border: 1px;width: auto;height: auto;">
<table style="border:1px solid #000;">
<tr style="background: #bcc1d1;">
<th style="padding: 8px;">Name</th>
<td style="padding: 8px;">' . $name . '</td>
</tr>
<tr style="background: #b3ffd5;">
<th style="padding: 8px;">Email</th>
<td style="padding: 8px;"><a href="mailto:' . $email . '">' . $email . '</a></td>
</tr>
<tr style="background: #bcc1d1;">
<th style="padding: 8px;">contact</th>
<td style="padding: 8px;">' . $pno . '</td>
</tr>
<tr style="background: #b3ffd5;">
<th style="padding: 8px;">Meassage</th>
<td style="padding: 8px;">' . $message . '</td>
</tr>
</table>
</div>
</body>
</html>';
            $this->email->set_newline("\r\n");
            $this->email->initialize($config);
            $this->email->from($email, $name);
            $this->email->to('info@euroarchindia.com');

            $this->email->subject('Enquiry From Website');

            $this->email->message($content_user);
            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Message Sent successfully');
                redirect('contact');
            } else {
                $this->session->set_flashdata('error', 'Server Error . Please try again Later.' . $this->email->print_debugger());
                redirect('contact');
            }
        } else {
            $this->load->view('contact');
        }
    }

}
