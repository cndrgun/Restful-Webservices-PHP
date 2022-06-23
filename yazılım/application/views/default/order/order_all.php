<?php $this->load->view('default/common/header') ?>

<div id="container">
  <h1>Tüm Siparişler Servisi!</h1>
  <div id="body">
    <p>Not: Giriş yaptıktan sonra dönen transactionCode ile tüm siparişleri görüntüleyebilirsiniz.</p>
    <form class="" action="<?=base_url('Homepage/tumSiparisler')?>" method="post">
    <label for="">transactionCode *</label><br>
    <input type="text" name="transactionCode" value=""><br>
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
   "order_id": "1",</br>
   "product_id": "2",</br>
   "quantity": "22",</br>
   "price": "44",</br>
   "address": "",</br>
   "order_date": "0000-00-00 00:00:00",</br>
   "update_date": "2022-06-23 12:27:46"</br>
 },</br>
 {</br>
   "order_id": "2",</br>
   "product_id": "2",</br>
   "quantity": "22",</br>
   "price": "44",</br>
   "address": "",</br>
   "order_date": "0000-00-00 00:00:00",</br>
   "update_date": "2022-06-23 12:27:50"</br>
 },</br>
 {</br>
   "order_id": "3",</br>
   "product_id": "1",</br>
   "quantity": "44",</br>
   "price": "44",</br>
   "address": "23233232",</br>
   "order_date": "0000-00-00 00:00:00",</br>
   "update_date": "2022-06-23 11:00:11"</br>
 },</br>
    <p><b>Başarısız İşlem</b></p>
    { <br>
      "responseMessage": "HATA ! Beklenmedik Bir Hata Oluştu."<br>
      "responseCode": 0<br>
      }

</div>
  <?php $this->load->view('default/common/footer') ?>
