<?php
class order_m extends CI_Model{

  function addOrder($data=array()){
    $order=$this->db->insert('order',$data);
    return $order;
  }
  function editOrder($data,$order_id){
      $order=$this->db->update('order',$data,array('order_id'=>$order_id));
      return $order;
  }
  function checkOrder($order_id){
    $order=$this->db->select('*')
    ->from('order')
    ->where('order_id',$order_id)
    ->get()
    ->row();
    return $order;
  }
  function getOrders($user_id){
    $this->load->model('product/product_m');
    $orders=$this->db->select('*')
    ->from('order')
    ->where('user_id',$user_id)
    ->get()
    ->result();
    if(!empty($orders)){
      foreach ($orders as $key => $value) {
        $orders[$key]->productDetail = $this->product_m->getProduct($value->product_id);
      }
    }
    return $orders;
  }






  }
?>
