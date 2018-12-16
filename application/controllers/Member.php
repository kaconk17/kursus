<?php

class Member extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('system_model');
    }

    function index(){
       
            if ($this->session->userdata('login_status')==false) {
               $this->load->view('landing');
            } else{
                if ($this->session->userdata('status_profil')=='guru') {
                    $this->load->view('guru/home');
                }else {
                    $this->load->view('index');
                }
                
            }
            
        
    }

    function profile(){
        if ($this->session->userdata('login_status')==true) {
            $id = $this->session->userdata('id_member');
            $this->data['member'] = $this->system_model->get_where('tb_member','id_member',$id);
            $this->data['profil'] = $this->system_model->get_where('tb_profile','id_member',$id);
    
            $this->load->view('guru/profile',$this->data);
        }
        
    }

    function update_pass(){
        $id = $this->input->post('id');
        $pass_lama = sha1(trim( $this->input->post('pass_lama')));
        $pass_baru = sha1(trim($this->input->post('pass_baru')));
        $email = $this->input->post('email');

        $data = array(
            'password'=> $pass_baru
        );
        $kondisi= array(
            'id_member'=> $id
        );
        $check = $this->system_model->login($email,$pass_lama);
        if ($check) {
           
            $ganti = $this->system_model->update_data('tb_member',$data,$kondisi);
            if ($ganti) {
                echo "success";
            }else{
                echo "gagal ganti";
            }

           
           
        }else{
            echo "salah password";
        }
    }

    function update_profile(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $pend = $this->input->post('pend');

        $data = array(
            
            'alamat'=> $alamat,
            'nomer_telp'=> $telp,
            'pendidikan' => $pend
        );

        $col = array(
            'user_name' => $nama
        );

        $kondisi = array(
            'id_member' =>$id
        );
        $ubah = $this->system_model->update_data('tb_member',$col,$kondisi);
        if ($ubah) {
            $ganti = $this->system_model->update_data('tb_profile',$data,$kondisi);
            if ($ganti) {
                echo "success";
            }else{
                echo "gagal update";
            }
        }else {
            echo "gagal update";
        }
        

    }

    function upload_foto(){

        //$file = $this->input->post('file');

        $config['upload_path']          = './assets/img/profile';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('upload_foto'))
        {
                $error = array('error' => $this->upload->display_errors());

                //$this->load->view('upload_form', $error);
                foreach ($error as $key ) {
                    echo $key;
                }
                
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                //$this->load->view('upload_success', $data);
                echo $data;
        }
    }

}