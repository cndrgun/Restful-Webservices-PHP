<?php $this->load->view('default/common/header') ?>

<div id="container">
  <h1>Sipariş Güncelleme Servisi!</h1>
  <div id="body">
    <p>Not: Giriş yaptıktan sonra dönen transactionCode ve işlem yapmak istediğiniz order_id ile güncelleme yapabilirsiniz.</p>
    <form class="" action="<?=base_url('Homepage/siparisGuncelle')?>" method="post">
    <label for="">transactionCode *</label><br>
    <input type="text" name="transactionCode" value=""><br>
    <label for="">order_id *</label><br>
    <input type="number" name="order_id" value=""><br>
    <label for="">quantity</label><br>
    <input type="number" name="quantity" value=""><br>
    <label for="">price</label><br>
    <input type="number" name="price" value=""><br>
    <label for="">address</label><br>
    <input type="text" name="address" value=""><br>
    <button type="submit" >Gönder</button>
  </form><br>

    <p><b>Örnek Post İşlemi</b></p>
    <b>url: </b><?=base_url('Homepage/yeniSiparis');?><br>
    {<br>
      "transactionCode": "Code",<br>
      "order_id": "1",<br>
      "quantity": "3",<br>
      "price": "13",<br>
      "address": "Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbul",<br>      
  }
  <p><b>Başarılı İşlem</b></p>
  { <br>
    "responseMessage": "Sipariş Başarıyla Güncellendi"<br>
    "responseCode": 1<br>
    }
    <p><b>Başarısız İşlem</b></p>
    { <br>
      "responseMessage": "Sipariş Güncelleme İşlemi Başarısız."<br>
      "responseCode": 0<br>
      }

</div>
  <?php $this->load->view('default/common/footer') ?>
