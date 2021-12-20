<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Users extends REST_Controller {
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('UsersModel');
        $this->model = $this->UsersModel;
    }



   

    // public function registrasi_post(){    
    //     $data = [
    //         'id_user' => $this->input->post('id_user', TRUE),
    //         'nama_user' => $this->input->post('nama_user', TRUE),
    //         'password_user' => md5($this->input->post('password_user', TRUE)),
    //         'phonenumber_user' => $this->input->post('phonenumber_user', TRUE),
    //         'birthdate_user' => $this->input->post('birthdate_user', TRUE),
    //         'role_user' => '2'
    //     ];
    //     $response = $this->UsersModel->save_user($data);
    //     if($response){
    //         $this->response(array('status' => 'Sukses register'), 200);
    //     }else{
    //         $this->response(['error'=>true, 'status'=> 'Register Gagal'], 401);
    //     }
    // }



    public function Login_post(){
            $nama_user = $this->post('nama_user');
            $password_user = $this->post('password_user');
           	$query = $this->db->select('id_user,nama_user, role_user, phonenumber_user,birthdate_user')
                ->from('users')
                ->where('nama_user', $nama_user)
                ->where('password_user', md5($password_user))
                ->where('aktivasi', '1')
                ->get()->result();
            if($query)
            {  
                $this->response(array("result"=>$query,'status' => 'Sukses login'), 200);
            }else{
                $this->response(array('status' => 'Gagal login'), 401);
            }
    }

    public function Profil_post(){
        $nama_user = $this->post('nama_user');
        $query = $this->db->select('nama_user, role_user, phonenumber_user,birthdate_user, image_user')
            ->from('users')
            ->where('nama_user', $nama_user)
            ->get()->result();
        if($query)
        {  
            $this->response(array("result"=>$query,'status' => 'Berhasil'), 200);
        }else{
            $this->response(array('status' => 'Gagal login'), 401);
        }
    }
    //travelyuk123@gmail.com
    //Travel123456!
    function updateprofile_post(){
            $config['upload_path'] = './assets/files/image/';
			$config['allowed_types'] = 'png|jpg|jpeg|bmp';
			$config['max_size'] = '20480';
			$path="./assets/files/image/";
			$image_user = $_FILES['image_user']['name'];
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('image_user')) 
			{
				$this->response(array('status' => 'fail', 502));
			} 
			else 
			{
				$id = $this->post('id_user');
				$queryimg = $this->db->query("SELECT image_user FROM `".$this->db->dbprefix('users')."` WHERE id_user='".$id."'");
				$row = $queryimg->row();
				//$picturepath="./assets/files/image/".$row->image_user;	
				//unlink($picturepath);
				
				$data = array(
					'id_user'=> $this->post('id_user'),
					'nama_user' => $this->input->post('nama_user', TRUE),
                    'image_user' => $image_user,
                    'phonenumber_user' => $this->input->post('phonenumber_user', TRUE),
                    'birthdate_user' => $this->input->post('birthdate_user', TRUE));
				$this->db->where('id_user', $id);
				$update = $this->db->update('users', $data);
				$this->response($data, 200);	
			}
        // $id_user = $this->input->post('id_user', TRUE);
        // $data = [
        //     'nama_user' => $this->input->post('nama_user', TRUE),
        //     'image_user' => $this->input->post('image_user', TRUE),
        //     'phonenumber_user' => $this->input->post('phonenumber_user', TRUE),
        //     'birthdate_user' => $this->input->post('birthdate_user', TRUE),
        // ];
        // $response = $this->UsersModel->update_user($id_user,$data);
        // if($response)
        // {  
        //     $this->response(array("result"=>$response,'status' => 'Sukses update'), 200);
        // }else{
        //     $this->response(array('status' => 'Gagal login'), 401);
        // }
    }



    function tampiluser_post(){
        $status = 1;
        $id_cabang = $this->post('id_cabang');
        $tampiluser = $this->db->select('id_user,nama_user,nohp_user, noktp_user, jabatan_user, email_user')
                                ->from('users')
                                ->where('status_user', $status)
                                ->where('id_cabang', $id_cabang)
                                ->where('jabatan_user>','1')
                                ->get()->result();
        if($tampiluser){  
            $this->response(array("result"=>$tampiluser, 200));
        }else{
            $this->response(array('status' => 'Gagal'), 502);
        }
    }

    function profileuser_post(){
        $status = 1;
        $id_cabang = $this->post('id_cabang');
        $nama_user = $this->post('nama_user');
        $profile = $this->db->select('id_user,nama_user,nohp_user, noktp_user, jabatan_user, email_user')
                                ->from('users')
                                ->where('status_user', $status)
                                ->where('id_cabang', $id_cabang)
                                ->where('nama_user', $nama_user)
                                //->where('jabatan_user', $jabatan_user)
                                ->get()->result();
        if($profile){  
            $this->response(array("result"=>$profile, 200));
        }else{
            $this->response(array('status' => 'Gagal'), 502);
        }
    }

  
    function deleteuser_post(){
        $status = 1;
        $id_user = $this->post('id_user',TRUE);
        $id_cabang = $this->post('id_cabang',TRUE);
        $nama_user = $this->post('nama_user',TRUE);
        $deleteuser = $this->db->set('status_user','0')
                                ->where('id_user', $id_user)
                                ->where('status_user', $status)
                                ->where('nama_user', $nama_user)
                                ->update('users');
        if($deleteuser){
            $this->response(array('status' => 'User sukses dihapus'), 200);
        }else{
            $this->response(['error'=>true, 'status'=> 'User gagal diupdate'], 401);
        }
    
        
    }

    public function getusername_post(){
      
        $status = '1';
        $nama_user = $this->input->post('nama_user', TRUE);
        $query = $this->db->query("SELECT * FROM `".$this->db->dbprefix('users')."` WHERE nama_user = '".$nama_user."'");
        if ($query->num_rows() > 0 )
        {  
            $this->response(['error'=>true, 'status'=> 'Username sudah ada'], 401);         
        }else{
            $this->response(array('status' => 'username tidak ada'), 200);   
        }
    }

    public function Register_post(){ 
        $base_url = "https://travelyuk2.000webhostapp.com/";
        $data = [
            'id_user' => $this->input->post('id_user', TRUE),
            'nama_user' => $this->input->post('nama_user', TRUE),
            'password_user' => md5($this->input->post('password_user', TRUE)),
            'email_user' => $this->input->post('email_user', TRUE),
            'phonenumber_user' => $this->input->post('phonenumber_user', TRUE),
            'birthdate_user' => $this->input->post('birthdate_user', TRUE),
            'role_user' => '2',
            'aktivasi'=>'2',
            'image_user' => 'profile.jpeg'
        ];
        $response = $this->UsersModel->save_user($data);

        if($response){
            $username=$this->input->post('nama_user');
            $email=$this->input->post('email_user', TRUE);
            $kodeemail=md5($this->input->post('password_user', TRUE));
            $this->load->library('email');
            $config = array();
            $config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
            $config['protocol']="smtp";
            $config['charset'] ='utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['mailtype']= "html";
            $config['smtp_host']= "smtp.gmail.com";
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "travelyuk123@gmail.com"; 
            $config['smtp_pass']= "Travel123456!";
            $config['smtp_crypto']  = "ssl" ;
            $config['crlf']="\r\n"; 
            $config['newline']="\r\n"; 
            $config['wordwrap'] = TRUE;
            $this->email->initialize($config);
            $this->email->from('travelyuk123@gmail.com','TravelYuk'); 
            $this->email->to($email);
            $this->email->subject('Account Activation');
            $this->email->message('<p> '.$username.', berikut link untuk aktivasi akun anda <br> ' . $base_url.'users/verifikasi/'.$username.'/'.$kodeemail.' <br> <p> Terimakasih</p>');
            $resp = $this->email->send();
            if($resp)
             {
                $this->response(array('status' => 'Sukses register'), 200);
             }       
             else{
                $this->response(array('status' => 'Gagal'), 502);
                 echo "tidak terkirim"; 
                echo $this->email->print_debugger();
                die ;
             }
        }else{
            $this->response(['error'=>true, 'status'=> 'Register Gagal'], 401);
        }
    }

    function index_get() {
       $username = $this->uri->segment(3);
       $kode = $this->uri->segment(4);
       $update = $this->db->set('aktivasi','1')
                           ->where('nama_user', $username)
                           ->where('password_user', $kode)
                           ->update('users');
       if($update){
           echo "<button> Aktivasi Berhasil</button>";
       }else{
           echo $this->email->print_debugger();
       }
   }

}


?>