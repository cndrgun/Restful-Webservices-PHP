  <?php $this->load->view('default/common/header') ?>

  <div id="container">
  	<h1>Hoşgeldiniz Lütfen almak istediğiniz servisi seçiniz!</h1>

  	<div id="body">
      <a href="<?=base_url('Homepage/kullaniciKayit')?>"> <p>/kullaniciKayit</p></a>
      <a href="<?=base_url('Homepage/kullaniciGiris')?>"> <p>/kullaniciGiris</p></a>
      <a href="<?=base_url('Homepage/yeniSiparis')?>">    <p>/yeniSipariş</p></a>
      <a href="<?=base_url('Homepage/siparisGuncelle')?>"><p>/SiparişGüncelleme</p></a>
      <a href="<?=base_url('Homepage/siparisDetay')?>">   <p>/siparisDetay</p></a>
      <a href="<?=base_url('Homepage/tumSiparisler')?>">   <p>/tümSiparişler</p></a>
      <a href="<?=base_url('Homepage/tumUrunler')?>">   <p>/tümÜrünler</p></a>
  	  <a href="<?=base_url('Homepage/uyelikSonlandirma')?>">  <p>/uyelikSonlandirma</p></a>
  </div>


    <?php $this->load->view('default/common/footer') ?>
