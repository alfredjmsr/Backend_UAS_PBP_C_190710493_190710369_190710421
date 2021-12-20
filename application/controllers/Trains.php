<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Trains extends REST_Controller {
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('TrainModel');
        $this->model = $this->TrainModel;
        $this->load->model('OrderModel');
        $this->model = $this->OrderModel;
    }

    function index_get() {
        $trains = $this->db->get_where('trains', array('status =' => '1'))->result();
        $this->response(array("result"=>$trains, 200));
    }
    public function addtrains_post(){
        $data = [
            'id_train' => $this->input->post('id_train', TRUE),
            'from_train' => $this->input->post('from_train', TRUE),
            'to_train' => $this->input->post('to_train', TRUE),
            'fromtime_train' => $this->input->post('fromtime_train', TRUE),
            'totime_train' => $this->input->post('totime_train', TRUE),
            'price_train'=> $this->input->post('price_train', TRUE),
            'class_train'=> $this->input->post('class_train', TRUE),
            'name_train'=> $this->input->post('name_train', TRUE),
            'status' => '1'
        ];
        $response = $this->TrainModel->addtrains($data);
        
        if($response){
            $this->response(array('status' => 'Tiket sukses ditambah'), 200);  
        }else{
            $this->response(['error'=>true, 'status'=> 'Ticket gagal ditambah'], 401);
        }

    }
    public function buyTicket_post(){
        $data = [
            'id_order' => $this->input->post('id_order', TRUE),
            'firstname_order' => $this->input->post('firstname_order', TRUE),
            'lastname_order' => $this->input->post('lastname_order', TRUE),
            'email_order' => $this->input->post('email_order', TRUE),
            'phonenumber_order' => $this->input->post('phonenumber_order', TRUE),
            'fromflight_order'=> $this->input->post('fromflight_order', TRUE),
            'toflight_order'=> $this->input->post('toflight_order', TRUE),
            'fromflighttime_order'=> $this->input->post('fromflighttime_order', TRUE),
            'toflighttime_order'=> $this->input->post('toflighttime_order', TRUE),
            'nameflight_order'=> $this->input->post('nameflight_order', TRUE),
            'iduser_order' => $this->input->post('iduser_order', TRUE),
            'price_order' => $this->input->post('price_order', TRUE),
        ];
        $response = $this->OrderModel->buyTicket($data);
        
        if($response){
            $this->response(array('status' => 'Ticket sukses dibeli'), 200);  
        }else{
            $this->response(['error'=>true, 'status'=> 'Ticket gagal dibeli'], 401);
        }

    }

    public function updateTrains_post(){
        $id_train = $this->input->post('id_train', TRUE);
        $from_train = $this->input->post('from_train', TRUE);
        $to_train = $this->input->post('to_train', TRUE);
        $fromtime_train = $this->input->post('fromtime_train', TRUE);
        $totime_train = $this->input->post('totime_train', TRUE);
        $price_train = $this->input->post('price_train', TRUE);
        $class_train= $this->input->post('class_train', TRUE);
        $name_train = $this->input->post('name_train', TRUE);

        $updateTrains = $this->db->set('from_train',$from_train)
                               ->set('to_train',$to_train)
                               ->set('fromtime_train',$fromtime_train)
                               ->set('totime_train',$totime_train)
                               ->set('price_train',$price_train)
                               ->set('class_train',$class_train)
                               ->set('name_train',$name_train)
                               ->where('id_train', $id_train)
                               ->update('trains');  
        if($updateTrains){
            $this->response(array('status' => 'Update berhasil'), 200);  
        }else{
             $this->response(['error'=>true, 'status'=> 'Update gagal'], 401);
        } 

  
    }

    public function deleteTrains_post(){
        $id_train = $this->input->post('id_train', TRUE);
        $updateTrains = $this->db->set('status','2')
                               ->where('id_train', $id_train)
                               ->update('trains');  
        if($updateTrains){
            $this->response(array('status' => 'Delete berhasil'), 200);  
        }else{
             $this->response(['error'=>true, 'status'=> 'Delete gagal'], 401);
        } 

  
    }



  

}

?>