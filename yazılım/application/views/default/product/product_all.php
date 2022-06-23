<?php $this->load->view('default/common/header') ?>
<div id="container">
  <h1>Tüm Ürünler Servisi!</h1>
  <div id="body">
    <p>Not: Giriş yaptıktan sonra dönen transactionCode ile tüm siparişleri görüntüleyebilirsiniz.</p>
    <form class="" action="<?=base_url('Homepage/tumUrunler')?>" method="post">
    <label for="">transactionCode *</label><br>
    <input type="text" name="transactionCode" value=""><br>
    <button type="submit">Gönder</button>
  </form><br>

    <p><b>Örnek Post İşlemi</b></p>
    <b>url: </b><?=base_url('Homepage/tumUrunler');?><br>
    {<br>
      "transactionCode": "Code",<br>
  }
  <p><b>Başarılı İşlem</b></p>
  {<br>
  "product_id": "1",<br>
  "name": "Ayakkabı",<br>
  "price": "1346",<br>
  "stok": "0"<br>
},<br>
{<br>
  "product_id": "2",<br>
  "name": "Spor Ayakkabı",<br>
  "price": "789",<br>
  "stok": "21"<br>
}<br>
    <p><b>Başarısız İşlem</b></p>
    { <br>
      "responseMessage": "HATA ! Beklenmedik Bir Hata Oluştu."<br>
      "responseCode": 0<br>
      }

</div>
  <?php $this->load->view('default/common/footer') ?>
