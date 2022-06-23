<?php
class product_m extends CI_Model{

  function getProduct($product_id){
    $product=$this->db->select('*')
    ->from('product')
    ->where('product_id',$product_id)
    ->get()
    ->row();
    return $product;
  }
  function editProduct($data,$product_id){
      $order=$this->db->update('product',$data,array('product_id'=>$product_id));
      return $order;
  }
  function getProducts(){
    $products=$this->db->select('*')
    ->from('product')
    ->get()
    ->result();
    return $products;
  }






  }
?>
