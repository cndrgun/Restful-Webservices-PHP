<?php
class user_m extends CI_Model{

  function addUser($data=array()){
    $user=$this->db->insert('user',$data);
    return $user;
  }
  function checkUser($userName){
    $user=$this->db->select('*')
    ->from('user')
    ->where('username',$userName)
    ->get()
    ->row();
    return $user;
  }
  function editUser($data,$user_id){
      $user=$this->db->update('user',$data,array('user_id'=>$user_id));
      return $user;
  }
  function checkTransaction($transactionCode){
    $user=$this->db->select('*')
    ->from('user')
    ->where('transactioncode',$transactionCode)
    ->get()
    ->row();
    return $user;
  }





  }
?>
