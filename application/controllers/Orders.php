<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Orders extends REST_Controller {

    //1=sudah dikonfirmasi admin
    //2=masih belum dikonfirmasi
    //3=sudah tidak aktif


    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('OrderModel');
        $this->model = $this->OrderModel;
    }

    function showOrder_post() {
        $iduser_order = $this->post('iduser_order');
        $order = $this->db->get_where('orders',['iduser_order'=>$iduser_order])->result();
        $this->response(array("result"=>$order, 200));
    }
    function showTransaksi_get() {
        $username_order = $this->post('username_order');
        $order = $this->db->get_where('orders')->result();
        $this->response(array("result"=>$order, 200));
    }
    function showLaporan_get() {
        $Laporan = $this->db->select('COUNT(*) AS jumlah_transaksi, SUM(price_order) AS total_transaksi, AVG(price_order) avg_transaksi')
            ->from('orders')
            ->get()->result();
            if($Laporan){  
                $this->response(array("result"=>$Laporan, 200));
            }else{
                $this->response(array('status' => 'Gagal'), 502);
            }
    }




}

?>