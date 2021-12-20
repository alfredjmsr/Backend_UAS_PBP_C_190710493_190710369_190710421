<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Flights extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('FlightModel');
        $this->model = $this->FlightModel;
        $this->load->model('OrderModel');
        $this->model = $this->OrderModel;
    }

    function index_get() {
        $flights = $this->db->get_where('flights', array('status =' => '1'))->result();
        $this->response(array("result"=>$flights, 200));
    }
    public function addFlights_post(){
        $data = [
            'id_flight' => $this->input->post('id_flight', TRUE),
            'from_flight' => $this->input->post('from_flight', TRUE),
            'to_flight' => $this->input->post('to_flight', TRUE),
            'fromtime_flight' => $this->input->post('fromtime_flight', TRUE),
            'totime_flight' => $this->input->post('totime_flight', TRUE),
            'price_flight'=> $this->input->post('price_flight', TRUE),
            'class_flight'=> $this->input->post('class_flight', TRUE),
            'name_flight'=> $this->input->post('name_flight', TRUE),
            'status' => '1'
        ];
        $response = $this->FlightModel->addFlights($data);
        
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

    public function updateFlights_post(){
        $id_flight = $this->input->post('id_flight', TRUE);
        $from_flight = $this->input->post('from_flight', TRUE);
        $to_flight = $this->input->post('to_flight', TRUE);
        $fromtime_flight = $this->input->post('fromtime_flight', TRUE);
        $totime_flight = $this->input->post('totime_flight', TRUE);
        $price_flight = $this->input->post('price_flight', TRUE);
        $class_flight = $this->input->post('class_flight', TRUE);
        $name_flight = $this->input->post('name_flight', TRUE);

        $updateFlights = $this->db->set('from_flight',$from_flight)
                               ->set('to_flight',$to_flight)
                               ->set('fromtime_flight',$fromtime_flight)
                               ->set('totime_flight',$totime_flight)
                               ->set('price_flight',$price_flight)
                               ->set('class_flight',$class_flight)
                               ->set('name_flight',$name_flight)
                               ->where('id_flight', $id_flight)
                               ->update('flights');  
        if($updateFlights){
            $this->response(array('status' => 'Update berhasil'), 200);  
        }else{
             $this->response(['error'=>true, 'status'=> 'Update gagal'], 401);
        } 

  
    }

    public function deleteFlights_post(){
        $id_flight = $this->input->post('id_flight', TRUE);
        $updateFlights = $this->db->set('status','2')
                               ->where('id_flight', $id_flight)
                               ->update('flights');  
        if($updateFlights){
            $this->response(array('status' => 'Delete berhasil'), 200);  
        }else{
             $this->response(['error'=>true, 'status'=> 'Delete gagal'], 401);
        } 

  
    }
}

?>