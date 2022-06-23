<?php $this->load->view('default/common/header') ?>

<div id="container">
  <h1>Sipariş Güncelleme Servisi!</h1>
  <div id="body">
    <p>Not: Giriş yaptıktan sonra dönen transactionCode ve görüntülemek istediğiniz order_id yi giriniz.</p>
    <form class="" action="<?=base_url('Homepage/siparisDetay')?>" method="post">
    <label for="">transactionCode *</label><br>
    <input type="text" name="transactionCode" value=""><br>
    <label for="">order_id *</label><br>
    <input type="number" name="order_id" value=""><br>
    <button type="submit">Gönder</button>
  </form><br>

    <p><b>Örnek Post İşlemi</b></p>
    <b>url: </b><?=base_url('Homepage/siparisDetay');?><br>
    {<br>
      "transactionCode": "Code",<br>
      "order_id": "1",<br>
  }
  <p><b>Başarılı İşlem</b></p>
  {</br>
    "order_id": "5",</br>
    "product_id": "1",</br>
    "quantity": "2",</br>
    "price": "33",</br>
    "address": "Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu",</br>
    "order_date": "2022-06-23 10:10:17",</br>
    "update_date": null,</br>
    "productDetail": {</br>
      "product_id": "1",</br>
      "name": "Ayakkabı",</br>
      "price": "1346",</br>
      "stok": "22"</br>
    }</br>
  }
    <p><b>Başarısız İşlem</b></p>
    { <br>
      "responseMessage": "HATA ! böyle bir sipariş bulunamadı."<br>
      "responseCode": 0<br>
      }

</div>
  <?php $this->load->view('default/common/footer') ?>
