<?php $this->load->view('default/common/header') ?>

<div id="container">
  <h1>Yeni Sipariş Servisi!</h1>
  <div id="body">
    <p>Not: Giriş yaptıktan sonra dönen transactionCode ile işlem yapabilirsiniz.</p>
    <form class="" action="<?=base_url('Homepage/yeniSiparis')?>" method="post">
    <label for="">transactionCode *</label><br>
    <input type="text" name="transactionCode" value=""><br>
    <label for="">productId</label><br>
    <input type="number" name="productId" value=""><br>
    <label for="">quantity</label><br>
    <input type="number" name="quantity" value=""><br>
    <label for="">price</label><br>
    <input type="number" name="price" value=""><br>
    <label for="">address</label><br>
    <input type="text" name="address" value=""><br>
    <label for="">orderDate</label><br>
    <input type="date" name="orderDate" value=""><br>
    <button type="submit" >Gönder</button>
  </form><br>

    <p><b>Örnek Post İşlemi</b></p>
    <b>url: </b><?=base_url('Homepage/yeniSiparis');?><br>
    {<br>
      "transactionCode": "Code",<br>
      "productId": "1",<br>
      "quantity": "3",<br>
      "price": "13",<br>
      "address": "Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbul",<br>
      "orderDate": "2022-02-02",<br>
  }
  <p><b>Başarılı İşlem</b></p>
  { <br>
    "responseMessage": "Yeni Sipariş Oluşturuldu"<br>
    "responseCode": 1<br>
    }
    <p><b>Başarısız İşlem</b></p>
    { <br>
      "responseMessage": "Yeni Sipariş Oluşturma İşlemi Başarısız."<br>
      "responseCode": 0<br>
      }

</div>
  <?php $this->load->view('default/common/footer') ?>
