<?php

 function upimage($config,$name){
   $ci=get_instance();
   $ci->upload->initialize($config,$name);
   if($ci->upload->do_upload($name)){
     $image=$ci->upload->data();
     $imageName=$image['file_name'];
     $source=base_url().$config['upload_path'].$imageName;
     return $source;
   }else{
     return $ci->upload->display_errors();
   }


 }






 ?>
