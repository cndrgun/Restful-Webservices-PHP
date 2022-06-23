<?php $this->load->view('default/common/header') ?>

<div id="container">
  <h1>Kullanıcı Giriş Servisi!</h1>
  <div id="body">
    <form class="" action="<?=base_url('Homepage/kullaniciGiris')?>" method="post">
    <label for="">Kullanici Adi</label><br>
    <input type="text" name="userName" value=""><br>
    <label for="">Şifre</label><br>
    <input type="password" name="password" value=""><br>
    <button type="submit" >Gönder</button>
  </form><br>

    <p><b>Örnek Post İşlemi</b></p>
    <b>url: </b><?=base_url('Homepage/kullaniciGiris');?><br>
    {<br>
  "userName": "TEST",<br>
  "password": "TEST",<br>
  }
  <p><b>Başarılı İşlem</b></p>
  { <br>
    "transactionCode": "Giriş İşlemi Başarılı"<br>
    "responseMessage": "Giriş İşlemi Başarılı"<br>
    "responseCode": 1<br>
    }
    <p><b>Başarısız İşlem</b></p>
    { <br>
      "responseMessage": "Giriş İşlemi Başarısız"<br>
      "responseCode": 0<br>
      }

</div>
  <?php $this->load->view('default/common/footer') ?>
