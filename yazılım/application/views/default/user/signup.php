<?php $this->load->view('default/common/header') ?>

<div id="container">
  <h1>Kullanıcı Kayit Servisi!</h1>
  <div id="body">
    <form class="" action="<?=base_url('Homepage/kullaniciKayit')?>" method="post">
    <label for="">Ad</label><br>
    <input type="text" name="name" value=""><br>
    <label for="">Soyad</label><br>
    <input type="text" name="surname" value=""><br>
    <label for="">Kullanici Adi</label><br>
    <input type="text" name="userName" value=""><br>
    <label for="">Şifre</label><br>
    <input type="password" name="password" value=""><br>
    <button type="submit" >Gönder</button>
  </form><br>

    <p><b>Örnek Post İşlemi</b></p>
    <b>url: </b><?=base_url('Homepage/kullaniciKayit');?><br>
    {<br>
  "name": "TEST",<br>
  "surname": "TEST",<br>
  "userName": "TEST",<br>
  "password": "TEST",<br>
  }
  <p><b>Başarılı İşlem</b></p>
  { <br>
    "name": "TEST",<br>
    "responseMessage": "Kayıt İşlemi Başarılı"<br>
    "responseCode": 1<br>
    }
    <p><b>Başarısız İşlem</b></p>
    { <br>
      "responseMessage": "Kayıt İşlemi Başarısız"<br>
      "responseCode": 0<br>
      }

</div>
  <?php $this->load->view('default/common/footer') ?>
