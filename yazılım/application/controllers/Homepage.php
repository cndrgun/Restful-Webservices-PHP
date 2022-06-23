<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{	

		$this->load->view('default/common/homepage');
	}
	public function kullaniciKayit(){
		$this->load->model('user/user_m');
		$posts = file_get_contents('php://input');
		$jsonData = json_decode($posts, true);
		if($this->input->post() || !empty($jsonData)){
		if($this->input->post()){
		$name				= $this->input->post('name',true) ?? "";
		$surname		= $this->input->post('surname',true) ?? "";
		$userName		= $this->input->post('userName',true);
		$password		= $this->input->post('password',true);
	}else{
		$name				= $jsonData['name'] ?? "";
		$surname		= $jsonData['surname'] ?? "";
		$userName		= $jsonData['userName'];
		$password		= $jsonData['password'];
	}
		if(!empty($userName) && !empty($password)){
				$checkUser=$this->user_m->checkUser($userName);
				if(!empty($checkUser)){
					$response = array (
											'responseMessage'		=>	'Başarısız! Böyle Bir Kullanıcı zaten sisteme Kayıtlı',
											'responseCode'		=>	0,
										);
					echo json_encode($response);
					die();
				}
			$data 		= array(
									'name'				=>$name,
									'surname'			=>$surname,
									'username'		=>$userName,
									'password'		=>md5($password),
			);
			$add=$this->user_m->addUser($data);
			if($add){
				$response = array (
									'name'							=> $name,
									'responseMessage'		=>	'Kayıt İşlemi Başarılı',
									'responseCode'			=>	1,
								);
			}else {
				$response = array (
													'responseMessage'		=>	'Beklenmedik Bir Hata Oluştu',
													'responseCode'		=>	0,
												);
			}
		}else{
			$response = array (
									'responseMessage'		=>	'Kayıt İşlemi Başarısız',
									'responseCode'		=>	0,
								);
		}

		echo json_encode($response);

		}else{
			$this->load->view('default/user/signup');
		}
	}
	public function kullaniciGiris(){
		$this->load->model('user/user_m');
		$this->load->model('user/user_m');
		$posts = file_get_contents('php://input');
		$jsonData = json_decode($posts, true);
		if($this->input->post() || !empty($jsonData)){
			if($this->input->post()){
				$userName		= $this->input->post('userName',true);
				$password		= $this->input->post('password',true);
			}else{
				$userName		= $jsonData['userName'];
				$password		= $jsonData['password'];
			}
		$checkUser=$this->user_m->checkUser($userName);
		if(!empty($checkUser) && $checkUser->password==md5($password)){
			if($checkUser->status==0){
				$response = array (
								'responseMessage'		=>	'Üyeliğiniz Askıya Alınmıştır',
								'responseCode'			=>	0,
													);
				echo json_encode($response);
				die();
						}
			$transactionCode = md5($checkUser->username.rand(999999,9999999));
			$data = array (
								'transactioncode'=>$transactionCode
			);
			$edit=$this->user_m->editUser($data,$checkUser->user_id);
			if($edit){
				$response = array (
									'transactionCode'		=> 	$transactionCode,
									'responseMessage'		=>	'Giriş İşlemi Başarılı!',
									'responseCode'			=>	1,
								);
				}else{
					$response = array (
									'responseMessage'		=>	'Beklenmedik Bir Hata Oluştu',
									'responseCode'			=>	0,
														);
							}
		}else{
			$response = array (
									'responseMessage'		=>	'Başarısız! Kullanıcı adı Veya Şifre Hatalı',
									'responseCode'		=>	0,
								);
		}
		echo json_encode($response);
		}else{
				$this->load->view('default/user/login');
		}
	}
	public function yeniSiparis(){
		$this->load->model('user/user_m');
		$this->load->model('order/order_m');
		$this->load->model('product/product_m');
		$posts = file_get_contents('php://input');
		$jsonData = json_decode($posts, true);
		if($this->input->post() || !empty($jsonData)){
			if($this->input->post()){
				$transactionCode		= $this->input->post('transactionCode',true);
				$productId					= $this->input->post('productId',true);
				$quantity						= $this->input->post('quantity',true);
				$price							= $this->input->post('price',true);
				$address						= $this->input->post('address',true);
				$orderDate					= !empty($this->input->post('orderDate',true)) ? $this->input->post('orderDate',true) :date("Y-m-d H:i:s");
			}else{
				$transactionCode		= $jsonData['transactionCode'];
				$productId					= $jsonData['productId'];
				$quantity						= $jsonData['quantity'];
				$price							= $jsonData['price'];
				$address						= $jsonData['address'];
				$orderDate					= !empty($jsonData['orderDate']) ? $jsonData['orderDate'] :date("Y-m-d H:i:s");
			}
		if(empty($productId) || empty($quantity) || empty($price)){
			$response = array (
									'responseMessage'		=>	'Hata ! "productId","quantity","price" değerleri boş bırakılamaz.',
									'responseCode'		=>	0,
								);
								echo json_encode($response);
								die();
		}

		if(!empty($transactionCode)){
			$checkTransaction = $this->user_m->checkTransaction($transactionCode);
			$data = array(
				'product_id' 				=> $productId,
				'user_id' 					=> $checkTransaction->user_id,
				'quantity' 					=> $quantity,
				'price' 						=> $price,
				'address'						=> $address,
				'order_date'				=> $orderDate,
			);

			if($checkTransaction){
			$getProduct=$this->product_m->getProduct($productId);
			if(!empty($getProduct)){
				if($getProduct->stok >= $quantity){
					$up_stok	= $getProduct->stok-$quantity;
					$_data		= array('stok'=>$up_stok);
					$update 	= $this->product_m->editProduct($_data,$getProduct->product_id);

				}else{
					$response = array (
											'responseMessage'		=>	'HATA ! Ürün Stok Yetersiz Stok sayısı: '.$getProduct->stok,
											'responseCode'			=>	0,
										);
					echo json_encode($response);
					die();

				}

			}else{
				$response = array (
										'responseMessage'		=>	'HATA ! Gönderdiğiniz Ürün Koduna Ait Ürün Bulunamadı.',
										'responseCode'			=>	0,
									);
				echo json_encode($response);
				die();
			}

			$add = $this->order_m->addOrder($data);
			if($add){
				$response = array (
										'responseMessage'		=>	'Yeni Sipariş Oluşturuldu.',
										'responseCode'			=>	1,
									);

			}else{
				$response = array (
										'responseMessage'		=>	'HATA ! Beklenmedik Bir Hata Oluştu.',
										'responseCode'		=>	0,
									);
			}

			}else{
				$response = array (
										'responseMessage'		=>	'HATA ! transactionCode ait kullanıcı bulunamadı',
										'responseCode'		=>	0,
									);
			}
		}else{
			$response = array (
									'responseMessage'		=>	'HATA ! transactionCode boş bırakılamaz.',
									'responseCode'		=>	0,
								);
		}
		echo json_encode($response);
		}else{
				$this->load->view('default/order/order');
		}
	}
	public function siparisGuncelle(){
		$this->load->model('user/user_m');
		$this->load->model('order/order_m');
		$this->load->model('product/product_m');
		$posts = file_get_contents('php://input');
		$jsonData = json_decode($posts, true);
		if($this->input->post() || !empty($jsonData)){
			if($this->input->post()){
				$transactionCode		= $this->input->post('transactionCode',true);
				$order_id						= $this->input->post('order_id',true);
				$quantity						= $this->input->post('quantity',true);
				$price							= $this->input->post('price',true);
				$address						= $this->input->post('address',true);
				$updateDate					= date("Y-m-d H:i:s");
			}else{
				$transactionCode		= $jsonData['transactionCode'];
				$order_id						= $jsonData['order_id'];
				$quantity						= $jsonData['quantity'];
				$price							= $jsonData['price'];
				$address						= $jsonData['address'];
				$updateDate					= date("Y-m-d H:i:s");
			}
		if(empty($quantity) || empty($price) || empty($address)){
			$response = array (
									'responseMessage'		=>	'Hata ! "quantity","price","address" değerleri boş bırakılamaz.',
									'responseCode'		=>	0,
								);
								echo json_encode($response);
								die();
		}
		$data = array(
			'quantity' 					=> $quantity,
			'price' 						=> $price,
			'address'						=> $address,
			'update_date'				=> $updateDate,
		);

		if(!empty($transactionCode)){
			$checkTransaction = $this->user_m->checkTransaction($transactionCode);
			if($checkTransaction){
					$checkOrder 		= $this->order_m->checkOrder($order_id);
				if(!empty($checkOrder)){
					if($checkOrder->user_id!=$checkTransaction->user_id){
						$response = array (
												'responseMessage'		=>	'HATA ! Bu siparişi güncelleme yetkiniz yok.',
												'responseCode'		=>	0,
											);
											echo json_encode($response);
											die();
					}
					$order_product=$this->product_m->getProduct($checkOrder->product_id);
					$qua	=	 $quantity - $checkOrder->quantity;
					if($order_product->stok >= $qua){
						$up_stok	= $order_product->stok - $qua;
						$_data		= array('stok'=>$up_stok);
						$update 	= $this->product_m->editProduct($_data,$order_product->product_id);

					}else{
						$response = array (
												'responseMessage'		=>	'HATA ! Bu siparişin stoğu yetersiz.',
												'responseCode'		=>	0,
											);
											echo json_encode($response);
											die();
					}

					$update = $this->order_m->editOrder($data,$order_id);
					if($update){
						$response = array (
												'responseMessage'		=>	$order_id.' order_id ye ait sipariş başarıyla güncellendi.',
												'responseCode'			=>	1,
											);
					}else{
						$response = array (
												'responseMessage'		=>	'HATA ! Beklenmedik Bir Hata Oluştu.',
												'responseCode'		=>	0,
											);
					}
				}else{
					$response = array (
											'responseMessage'		=>	'Gönderdiğiniz order_id ye ait sipariş bulunamadı.',
											'responseCode'			=>	0,
										);
										echo json_encode($response);
										die();
				}
			}else{
				$response = array (
										'responseMessage'		=>	'HATA ! transactionCode ait kullanıcı bulunamadı',
										'responseCode'		=>	0,
									);
			}
		}else{
			$response = array (
									'responseMessage'		=>	'HATA ! transactionCode boş bırakılamaz.',
									'responseCode'		=>	0,
								);
		}
		echo json_encode($response);
		}else{
				$this->load->view('default/order/order_edit');
		}


	}
	public function siparisDetay(){
		$this->load->model('user/user_m');
		$this->load->model('order/order_m');
		$this->load->model('product/product_m');
		$posts = file_get_contents('php://input');
		$jsonData = json_decode($posts, true);
		if($this->input->post() || !empty($jsonData)){
			if($this->input->post()){
				$transactionCode		= $this->input->post('transactionCode',true);
				$order_id						= $this->input->post('order_id',true);
			}else{
				$transactionCode		= $jsonData['transactionCode'];
				$order_id						= $jsonData['order_id'];
			}
		if(empty($order_id)){
			$response = array (
									'responseMessage'		=>	'Hata ! "order_id" değeri boş bırakılamaz.',
									'responseCode'		=>	0,
								);
								echo json_encode($response);
								die();
		}

		if(!empty($transactionCode)){
			$checkTransaction = $this->user_m->checkTransaction($transactionCode);
			if($checkTransaction){
					$getOrder 		= $this->order_m->checkOrder($order_id);
					if($getOrder->user_id!=$checkTransaction->user_id){
						$response = array (
												'responseMessage'		=>	'HATA ! Bu siparişin detayını görme yetkiniz yok.',
												'responseCode'		=>	0,
											);
											echo json_encode($response);
											die();
					}

				if($getOrder){
					$getOrder->productDetail = $this->product_m->getProduct($getOrder->product_id);
					$response=$getOrder;
				}else{
					$response = array (
											'responseMessage'		=>	'HATA ! böyle bir sipariş bulunamadı.',
											'responseCode'		=>	0,
										);
				}

			}else{
				$response = array (
										'responseMessage'		=>	'HATA ! transactionCode ait kullanıcı bulunamadı',
										'responseCode'		=>	0,
									);
			}
		}else{
			$response = array (
									'responseMessage'		=>	'HATA ! transactionCode boş bırakılamaz.',
									'responseCode'		=>	0,
								);
		}
		echo json_encode($response);
		}else{
				$this->load->view('default/order/order_detail');
		}
	}
	public function tumSiparisler(){
		$this->load->model('user/user_m');
		$this->load->model('order/order_m');
		$this->load->model('product/product_m');
		$posts = file_get_contents('php://input');
		$jsonData = json_decode($posts, true);
		if($this->input->post() || !empty($jsonData)){
			if($this->input->post()){
				$transactionCode		= $this->input->post('transactionCode',true);
			}else{
				$transactionCode		= $jsonData['transactionCode'];
			}
		if(!empty($transactionCode)){
			$checkTransaction = $this->user_m->checkTransaction($transactionCode);
			if($checkTransaction){
					$getOrders 		= $this->order_m->getOrders($checkTransaction->user_id);
				if($getOrders){
					$response=$getOrders;
				}else{
					$response = array (
											'responseMessage'		=>	'HATA ! sipariş bulunamadı.',
											'responseCode'			=>	0,
										);
				}
			}else{
				$response = array (
										'responseMessage'		=>	'HATA ! transactionCode ait kullanıcı bulunamadı',
										'responseCode'		=>	0,
									);
			}
		}else{
			$response = array (
									'responseMessage'		=>	'HATA ! transactionCode boş bırakılamaz.',
									'responseCode'		=>	0,
								);
		}
		echo json_encode($response);
		}else{
				$this->load->view('default/order/order_all');
		}
	}
	public function tumUrunler(){
		$this->load->model('user/user_m');
		$this->load->model('order/order_m');
		$this->load->model('product/product_m');
		$posts = file_get_contents('php://input');
		$jsonData = json_decode($posts, true);
		if($this->input->post() || !empty($jsonData)){
			if($this->input->post()){
				$transactionCode		= $this->input->post('transactionCode',true);
			}else{
				$transactionCode		= $jsonData['transactionCode'];
			}
		if(!empty($transactionCode)){
			$checkTransaction = $this->user_m->checkTransaction($transactionCode);
			if($checkTransaction){
					$getProducts 		= $this->product_m->getProducts();
				if($getProducts){
					$response=$getProducts;
				}else{
					$response = array (
											'responseMessage'		=>	'HATA ! ürün bulunamadı.',
											'responseCode'			=>	0,
										);
				}
			}else{
				$response = array (
										'responseMessage'		=>	'HATA ! transactionCode ait kullanıcı bulunamadı',
										'responseCode'		=>	0,
									);
			}
		}else{
			$response = array (
									'responseMessage'		=>	'HATA ! transactionCode boş bırakılamaz.',
									'responseCode'		=>	0,
								);
		}
		echo json_encode($response);
		}else{
				$this->load->view('default/product/product_all');
		}
	}
	public function uyelikSonlandirma(){
		$this->load->model('user/user_m');
		$posts = file_get_contents('php://input');
		$jsonData = json_decode($posts, true);
		if($this->input->post() || !empty($jsonData)){
			if($this->input->post()){
				$userName		= $this->input->post('userName',true);
				$password		= $this->input->post('password',true);
			}else{
				$userName		= $jsonData['userName'];
				$password		= $jsonData['password'];
			}
		$checkUser=$this->user_m->checkUser($userName);
		if(!empty($checkUser) && $checkUser->password==md5($password)){
			if($checkUser->status==0){
				$response = array (
								'responseMessage'		=>	'Üyeliğiniz Daha Önceden Sonlandırılmış',
								'responseCode'			=>	0,
													);
				echo json_encode($response);
				die();
						}
			$data = array (
								'status'=>0,
								'transactioncode'=>""
			);
			$edit=$this->user_m->editUser($data,$checkUser->user_id);
			if($edit){
				$response = array (
									'responseMessage'		=>	'Üyelik Sonlandırma İşlemi Başarılı!',
									'responseCode'			=>	1,
								);
				}else{
					$response = array (
									'responseMessage'		=>	'Beklenmedik Bir Hata Oluştu',
									'responseCode'			=>	0,
														);
							}
		}else{
			$response = array (
									'responseMessage'		=>	'Başarısız! Kullanıcı adı Veya Şifre Hatalı',
									'responseCode'		=>	0,
								);
		}
		echo json_encode($response);
		}else{
				$this->load->view('default/user/suspend');
		}
	}
}
