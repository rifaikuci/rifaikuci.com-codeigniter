<?php


class Yonetim extends CI_Controller {

// admine girişte güvenlik amacı ile yazılan kod
	public function protect()
	{
	$giris = $this->session->userdata('giris');
	  if (!$giris) {
	    redirect('yonetim');
	  }
	}

//rifaikuci.com'a girerken ilk ulaşılacak yer
	 function index()
	  {
	    $giris= $this->session->userdata('giris'); // eğer giriş yapmadan yapmaya çalışılırsa
 	    if ($giris) {
	    redirect('yonetim/anasayfa');
	    }
	      $this->load->view('back/giris');
	  }

	public function girisyap()
	{
      
	  $email = strip_tags($this->input->post('email'));
		$sifre = $this->input->post('sifre');
		$sifre=strip_tags($sifre);

 	  $kontrol = $this->dtbs->kontrol($email,$sifre);

	  if ($kontrol)
		 {
	  $this->session->set_userdata('giris',true);
	  redirect('yonetim/anasayfa');
	   }else
		{
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	  <h4><i class="icon fa fa-ban"></i> Uyarı!</h4>
	  Şifre yada mail de hatalı giriş yaptınız!!!
	  </div>');
	  redirect('yonetim');
	 }
	}

	public function anasayfa()
	{
	  $this->protect();
	  $this->load->view('back/anasayfa');
	}
// admin panelinden çıkış işlemleri yapılır.
	public function cikis()
	{
	  $this->session->sess_destroy();
	  redirect('yonetim');
	}


//Şifre Ayarları
public function sifre()
{
	$this->protect();
	$this->load->view('back/sifre/anasayfa');
}

	//Şifre Güncelleme İşlemleri
 function sifreguncelle()
{
	 $email = $this->input->post('email');
	 $sifre = $this->input->post('sifre');
	 $id = $this->input->post('id');
	 $sifre1 = $this->input->post('sifre1');
	 $sifre2 = $this->input->post('sifre2');
	 $sonuc =$this->dtbs->listele('tblyoneticiler');
	 $tsifre="";
	 $tmail="";
	 foreach ($sonuc as $sonuc) {
	 	$tmail= $sonuc['email'];
		 $tsifre=$sonuc['sifre'];
	 }
$sifre=  sha1(md5($sifre));
$sifre1= sha1(md5($sifre1));
$sifre2= sha1(md5($sifre2));

	if($sifre==$tsifre && $email==$tmail)
	{
		if($sifre1==$sifre2)
		{
			if(strlen($sifre1)>6)
			{
				$data = array(
			'id' => $id= $this->input->post('id'),
			'sifre' => $sifre1
				);

				$sonuc =$this->dtbs->guncelle($data,$id,'id','tblyoneticiler');
				if ($sonuc) {
				  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
				Şifreniz Başarılı Bir Şekilde Güncellendi  :) </div>');
				  redirect('yonetim/sifre');
				}
			}
			else {
				$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> HATA!!!</h4>
				Şifreniz En Az 6 Karakter Olmalıdır <b> TEKRAR DENEYİN!!</b>
				</div>');
				redirect('yonetim/sifre');
			}
			}
			else {
				$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> HATA !!!</h4>
				Şifrelerin Aynı Olduğundan Emin Olunuz... <b> TEKRAR DENEYİN!!</b>
				</div>');
				redirect('yonetim/sifre');
			}
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> HATA !!!</h4>
			Şifre İle Maili doğru girdiğinizden  Emin Olunuz  <b> TEKRAR DENEYİN!!</b>
			</div>');
			redirect('yonetim/sifre');
		}


	}
//Şifre bitiş



// head menü başlıkları başlanguçı
// head menüdekileri liste şeklinde görme işlemi
	public function headMenu()
	{
$this->protect();
			$sonuc =$this->dtbs->listele('tblheadmenu');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/headMenuler/anasayfa',$data);
	}

// head menü ekleme formunu yönlendirir
	public function headMenuekle()
	{
 		$this->protect();
		$this->load->view('back/headMenuler/ekle/anasayfa');
	}

//head menü formu ekleme işlemini tamamlar
	public function headMenuekleme()
{
	$this->protect();
    $data = array(
  'headAdi' => $headAdi = $this->input->post('headAdi'),
  'durum' => $durum = $this->input->post('durum'),
  'headSeoAd' =>seflink($headAdi)
);
$sonuc = $this->dtbs->ekle('tblHeadmenu',$data);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                Head Menü Listesine   başarılı bir  şekilde eklendi :)
                </div>');
  redirect('yonetim/headMenu');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Head Menü Listesine Eklerken Sorun Oluştu. <b>TEKRAR DENEYİN!!</b>
                </div>');
  redirect('yonetim/headMenu');
}
}

//head menunu durumunu toggle button yardımı ile aktif yada inaktif yapar
public function headset()
{
	$this->protect();
  $id = $this->input->post('id');
  $durum = ($this->input->post('durum')=="true")?1:0;
  $this->db->where('id',$id)->update('tblheadmenu',array('durum'=>$durum));
}

//head menu guncelleme formunu yönlendirir.
public function headMenuduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tblheadmenu');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/headMenuler/edit/anasayfa',$data);
}


// head menu güncelleme işlemlerini kaydeder
public function headguncelle()
{
	$this->protect();
  $data = array(
'id' => $id= $this->input->post('id'),
'headAdi' => $headAdi= $this->input->post('headAdi'),
'headSeoAd' =>seflink($headAdi),
'durum' => $durum= $this->input->post('durum')
  );

$sonuc =$this->dtbs->guncelle($data,$id,'id','tblheadmenu');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
Head Menüler Listesi Başarılı Bir Şekilde Güncellendi </div>');
  redirect('yonetim/headMenu');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-ban"></i> HATA !!!</h4>
  Head Menüler Listesi Güncellerken Bir Hata Oluştu <b> TEKRAR DENEYİN !!!</b>
  </div>');
  redirect('yonetim/headMenu');}
}
// head menu silme işlemini yapar.
public function headMenusil($id,$where,$from)
{
	$this->protect();
  $sonuc = $this->dtbs->sil($id,$where,$from);
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
                   Seçtiğiniz   Head Menü  Başlığı Silindi
                  </div>');
    redirect('yonetim/headMenu');
  }
  else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Seçtiğiniz  Head Menü Başlığının Silerken Bir Hata Oluştu .<b> TEKRAR DENEYİN!!!</b>
                  </div>');
    redirect('yonetim/headMenu');
}}
/* head menü başlıkları bitiş -*/


// kategoriler menü başlıkları başlanguçı
// Kategoriler  liste şeklinde görme işlemi
	public function kategoriler()
	{
		$this->protect();
		$sonuc =$this->dtbs->listele('tblkategoriler');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/kategoriler/anasayfa',$data);
	}

// Kategoriler ekleme formunu yönlendirir
	public function kategorilerekle()
	{
		$this->protect();
		$this->load->view('back/kategoriler/ekle/anasayfa');
	}

//kategoriler formu ekleme işlemini tamamlar
	public function kategorilerekleme()
{
	$this->protect();
    $data = array(
'ad' => $ad = $this->input->post('ad'),
'seoAd' =>seflink($ad)
);
$sonuc = $this->dtbs->ekle('tblkategoriler',$data);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
                		Kategori Listesine  başarılı bir  şekilde eklendi.
                </div>');
  redirect('yonetim/kategoriler');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> HATA!!!</h4>
                  Kategoriyi  Eklerken bir Hata Oluştu. <b>TEKRAR DENEYİN!!!</b>
                </div>');
  redirect('yonetim/kategoriler');
}
}

//kategoriler guncelleme formunu yönlendirir.
public function kategorilerduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tblkategoriler');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/kategoriler/edit/anasayfa',$data);
}

// kategoriler güncelleme işlemlerini kaydeder
public function kategorilerguncelle()
{
	$this->protect();
  $data = array(
'id' => $id= $this->input->post('id'),
'ad' => $ad= $this->input->post('ad'),
'seoAd' =>seflink($ad)
  );

$sonuc =$this->dtbs->guncelle($data,$id,'id','tblkategoriler');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i>BAŞARILI :)</h4>
Kategori Başarılı Bir Şekilde Güncellendi  :) </div>');
  redirect('yonetim/kategoriler');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i> HATA !!!</h4>
  Seçtiğiniz Kategoriyi Güncellerken Bir Hata Oluştu <b> TEKRAR DENEYİN !!!</b>
  </div>');
  redirect('yonetim/kategoriler');}
}
// Kategoriler silme işlemini yapar.
public function kategorilersil($id,$where,$from)
{
	$this->protect();
  $sonuc = $this->dtbs->sil($id,$where,$from);
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
                    Seçtiğiniz Kategori  Silindi
                  </div>');
    redirect('yonetim/kategoriler');
  }
  else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                    Seçtiğiniz Kategori Silerken Bir Hata oluştu <b> TEKRAR DENEYİN !!! </b>
                  </div>');
    redirect('yonetim/kategoriler');
}}
/* kategoriler başlıkları bitiş -*/

// Günün Sözü liste şeklinde görme işlemi
	public function gununsozu()
	{	$this->protect();
		$sonuc =$this->dtbs->listele('tblgununsozu');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/gununsozu/anasayfa',$data);
	}

// günün sözü ekleme formunu yönlendirir
	public function gununsozuekle()
	{
		$this->protect();
		$this->load->view('back/gununsozu/ekle/anasayfa');
	}

//günün sözü ve resim formu ekleme işlemini tamamlar
	public function gununsozuekleme()
{
	$this->protect();
	$adsoyad =$this->input->post('adsoyad');
	$durum =$this->input->post('durum');
	$gununsozu =$this->input->post('gununsozu');

	$seogununsozu =seflink(	$gununsozu );
	$seogununsozu=rtrim($seogununsozu,"-p");
	$seogununsozu=ltrim($seogununsozu,"p-");
	$seogununsozu =seflink(	$seogununsozu );


	$config['upload_path'] = FCPATH.'assets/front/img/gununsozu';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/gununsozu/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/gununsozu/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/gununsozu/'.$resimyolu.'';


		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='60%';
		$config['width'] =160;
		$config['height'] =160;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();

		$data = array('resim'=>$resimkayit,'adsoyad'=>$adsoyad,'seogununsozu'=>$seogununsozu,
		'durum'=>$durum,'gununsozu'=>$gununsozu);

		$sonuc = $this->dtbs->ekle('tblgununsozu',$data);
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
										Günün Sözü Listesine  başarılı bir şekilde eklediniz.
										</div>');
			redirect('yonetim/gununsozu');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i>HATA !!!</h4>
										Günün Sözü Ekleme işlemi başarısız..
										</div>');
			redirect('yonetim/gununsozu');
					}


}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i>HATA!!!</h4>
						 Resmi Eklerken Bir hata oluştu
					</div>');
redirect('yonetim/gununsozu');
}
}

//Günün sözü durumunu toggle button yardımı ile aktif yada inaktif yapar
public function gununsozuset()
{
	$this->protect();
  $id = $this->input->post('id');
  $durum = ($this->input->post('durum')=="true")?1:0;
  $this->db->where('id',$id)->update('tblgununsozu',array('durum'=>$durum));
}
//Günün sözü guncelleme formunu yönlendirir.
public function gununsozuduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tblgununsozu');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/gununsozu/edit/anasayfa',$data);
}

// gunun sözü ve resim işlemlerini kaydeder
public function gununsozuguncelle()
{
	$this->protect();
	$adsoyad =$this->input->post('adsoyad');
	$durum =$this->input->post('durum');
	$gununsozu =$this->input->post('gununsozu');
  $id =$this->input->post('id');
	$seogununsozu =seflink(	$gununsozu );
	$seogununsozu=rtrim($seogununsozu,"-p");
	$seogununsozu=ltrim($seogununsozu,"p-");
	$seogununsozu =seflink(	$seogununsozu );

// resim işlemi başlangıç
	$config['upload_path'] = FCPATH.'assets/front/img/gununsozu';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/gununsozu/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/gununsozu/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/gununsozu/'.$resimyolu.'';
		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='60%';
		$config['width'] =160;
		$config['height'] =160;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
$resimsil=gununsozuresim($id);
unlink($resimsil);
//resim bitiş işlemleri


		$data = array('resim'=>$resimkayit,'adsoyad'=>$adsoyad,'seogununsozu'=>$seogununsozu,
		'durum'=>$durum,'gununsozu'=>$gununsozu);

		$sonuc =$this->dtbs->guncelle($data,$id,'id','tblgununsozu');
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
										Günün Sözü Listesine  başarılı bir şekilde Güncellediniz.
										</div>');
			redirect('yonetim/gununsozu');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-ban"></i> BAŞARISIZ !!!</h4>
										Günün Sözü Listesini Baiaroşo bir şekilde güncellediniz..
										</div>');
			redirect('yonetim/gununsozu');
					}


}else {
	$data = array('adsoyad'=>$adsoyad,'seogununsozu'=>$seogununsozu,
	'durum'=>$durum,'gununsozu'=>$gununsozu);

	$sonuc =$this->dtbs->guncelle($data,$id,'id','tblgununsozu');
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i>BAŞARILI :)</h4>
									Günün Sözü Listesini  başarılı bir şekilde Güncellediniz.
									</div>');
		redirect('yonetim/gununsozu');
	}else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> BAŞARISIZ !!!</h4>
									Günün Sözü Güncelleme işlemi başarısız..
									</div>');
		redirect('yonetim/gununsozu');
				}
}
}

// Günün Sözü ve resim  silme işlemini yapar.
public function gununsozusil($id,$where,$from)
{
	$this->protect();
	$resimsil=gununsozuresim($id);
	unlink($resimsil);

	$sonuc = $this->dtbs->sil($id,$where,$from);
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
									  	Seçtiğiniz Günün Sözü Silindi :)
									</div>');
		redirect('yonetim/gununsozu');
	}
	else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> BAŞARISIZ !!!</h4>
										Günün Sözünü Silerken Bir Hata oluştu .<b> TEKRAR DENEYİN!!</b>
									</div>');
		redirect('yonetim/gununsozu');
	}}
/* Günün sözü bitiş -*/

// Sosyal Medya Hesapları  liste şeklinde görme işlemi
	public function smedya()
	{
$this->protect();
			$sonuc =$this->dtbs->listele('tblsmedya');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/smedya/anasayfa',$data);
	}

// smedya ekleme formunu yönlendirir
	public function smedyaekle()
	{
		$this->protect();
		$this->load->view('back/smedya/ekle/anasayfa');
	}

//smedya formu ekleme işlemini tamamlar
	public function smedyaekleme()
{
	$this->protect();
    $data = array(
'ad' => $ad = $this->input->post('ad'),
'url' => $url = $this->input->post('url'),
'seoAd' =>seflink($ad)
);
$sonuc = $this->dtbs->ekle('tblsmedya',$data);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
                Sosyal Medya Hesabı  başarılı bir  şekilde eklendi.
                </div>');
  redirect('yonetim/smedya');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> HATA !!!</h4>
                  Sosyal Medya Hesabını Eklerken bir  Sorun oluştu . <b>TEKRAR DENEYİN!!</b>
                </div>');
  redirect('yonetim/smedya');
}
}
//smedya guncelleme formunu yönlendirir.
public function smedyaduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tblsmedya');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/smedya/edit/anasayfa',$data);
}
// smedya güncelleme işlemlerini kaydeder
public function smedyaguncelle()
{
	$this->protect();
  $data = array(
'id' => $id= $this->input->post('id'),
'url' => $url= $this->input->post('url'),
'ad' => $ad= $this->input->post('ad'),
'seoAd' =>seflink($ad)
  );

$sonuc =$this->dtbs->guncelle($data,$id,'id','tblsmedya');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i>BAŞARILI  :)</h4>
  Sosyal Medya Hesabınız Başarılı Bir Şekilde Güncellendi  :) </div>');
  redirect('yonetim/smedya');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-ban"></i> HATA!!!</h4>
  Sosyal Medya Hesabınızı Güncellerken Bir Hata Oluştu <b> TEKRAR DENEYİN!!</b>
  </div>');
  redirect('yonetim/smedya');}
}
// smedya silme işlemini yapar.
public function smedyasil($id,$where,$from)
{
	$this->protect();
  $sonuc = $this->dtbs->sil($id,$where,$from);
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
                    Seçtiğiniz Sosyal Medya Hesabı  Silindi :)
                  </div>');
    redirect('yonetim/smedya');
  }
  else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                    Seçtiğiniz Sosyal Medya Hesabını Silerken Bir Hata oluştu <b> TEKRAR DENEYİN!!</b>
                  </div>');
    redirect('yonetim/smedya');
}}
/* smedya başlıkları bitiş -*/



// ozellikler menü başlıkları başlanguçı

// ozellikler  liste şeklinde görme işlemi
	public function ozellikler()
	{	$this->protect();
		$sonuc =$this->dtbs->listele('tblozellikler');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/ozellikler/anasayfa',$data);
	}

// ozellikler ekleme formunu yönlendirir
	public function ozelliklerekle()
	{$this->protect();
		$this->load->view('back/ozellikler/ekle/anasayfa');
	}

//ozellikler formu ekleme işlemini tamamlar
	public function ozelliklerekleme()
{
	$this->protect();
	$ozellik =$this->input->post('ozellik');
	$puan =$this->input->post('puan');
	$seo =seflink($ozellik);

	$config['upload_path'] = FCPATH.'assets/front/img/ozellik';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/ozellik/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/ozellik/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/ozellik/'.$resimyolu.'';


		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='60%';
		$config['width'] =160;
		$config['height'] =160;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();





    $data = array(
'ozellik' => $ozellik ,
'resim' =>$resimkayit,

'puan' => $puan ,
'seoOzellik' =>$seo
);
$sonuc = $this->dtbs->ekle('tblozellikler',$data);

if ($sonuc) {
	$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i>BAŞARILI :)</h4>
								Özellik Listesine  başarılı bir şekilde eklediniz.
								</div>');
	redirect('yonetim/ozellikler');
}else {
	$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i>HATA !!!</h4>
								Özellik Ekleme işlemi başarısız..
								</div>');
	redirect('yonetim/ozellikler');
			}


}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
			Özellik Resmi Eklenirken Bir hata oluştu..
			</div>');
redirect('yonetim/ozellikler');
}
}
//ozellikler guncelleme formunu yönlendirir.
public function ozelliklerduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tblozellikler');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/ozellikler/edit/anasayfa',$data);
}
// ozellikler güncelleme işlemlerini kaydeder
public function ozelliklerguncelle()
{
	$this->protect();

	$ozellik =$this->input->post('ozellik');
	$puan =$this->input->post('puan');
	$id =$this->input->post('id');
	$seoOzellik =seflink(	$ozellik );

	// resim işlemi başlangıç
	$config['upload_path'] = FCPATH.'assets/front/img/ozellik';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/ozellik/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/ozellik/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/ozellik/'.$resimyolu.'';
		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='60%';
		$config['width'] =160;
		$config['height'] =160;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	$resimsil=ozellikresim($id);
	unlink($resimsil);
	//resim bitiş işlemleri


		$data = array('resim'=>$resimkayit,'ozellik'=>$ozellik,'seoOzellik'=>$seoOzellik,
		'puan'=>$puan);

		$sonuc =$this->dtbs->guncelle($data,$id,'id','tblozellikler');
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i>  BAŞARILI :) </h4>
										Özellikler Listesine  başarılı bir şekilde Güncellediniz.
										</div>');
			redirect('yonetim/ozellikler');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
										Özellik Güncelleme işlemi başarısız..
										</div>');
			redirect('yonetim/ozellikler');
					}


	}else {
	$data = array('ozellik'=>$ozellik,'seoOzellik'=>$seoOzellik,
		'puan'=>$puan);

	$sonuc =$this->dtbs->guncelle($data,$id,'id','tblozellikler');
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i>BAŞARILI :)</h4>
									Özellikler Listesine  başarılı bir şekilde Güncellediniz.
									</div>');
		redirect('yonetim/ozellikler');
	}else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
									Özellik Güncelleme  işlemi başarısız..
									</div>');
		redirect('yonetim/ozellikler');
				}
	}
}

public function ozelliklersil($id,$where,$from)
{
	$this->protect();
	$resimsil=ozellikresim($id);
	unlink($resimsil);

	$sonuc = $this->dtbs->sil($id,$where,$from);
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
									  	Seçtiğiniz Özellik  Silindi :)
									</div>');
		redirect('yonetim/ozellikler');
	}
	else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i>HATA!!!</h4>
										Seçtiğiniz Özellik Silerken Bir Hata ile karşılaştı .<b> TEKRAR DENEYİN!!</b>
									</div>');
		redirect('yonetim/ozellikler');
	}}
/* ozellikler başlıkları bitiş -*/


// Admin liste şeklinde görme işlemi
	public function admin()
	{$this->protect();
			$sonuc =$this->dtbs->listele('tbladmin');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/admin/anasayfa',$data);
	}

// Admin ekleme formunu yönlendirir
	public function adminekle()
	{
		$this->protect();
		$this->load->view('back/admin/ekle/anasayfa');
	}

//günün sözü ve resim formu ekleme işlemini tamamlar
	public function adminekleme()
{
$this->protect();
	$adsoyad =$this->input->post('adsoyad');
	$ozellik =$this->input->post('ozellik');
	$site_url =$this->input->post('site_url');
	$site_adi =$this->input->post('site_adi');
	$version =$this->input->post('version');


	$config['upload_path'] = FCPATH.'assets/front/img/admin';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/admin/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/admin/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/admin/'.$resimyolu.'';

		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='60%';
		$config['width'] =400;
		$config['height'] =400;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();

		$data = array('resim'=>$resimkayit,'adsoyad'=>$adsoyad, 'ozellik'=>$ozellik,
'site_url'=>$site_url, 'site_adi'=>$site_adi, 'version'=>$version,
	);

		$sonuc = $this->dtbs->ekle('tbladmin',$data);
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
										Yönetici Ayarları  başarılı bir şekilde eklediniz.
										</div>');
			redirect('yonetim/admin');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
										Yönetici Ayar Ekleme işlemi başarısız..
										</div>');
			redirect('yonetim/admin');
					}


}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
						 Resmi Eklenirken Bir hata oluştu..
					</div>');
redirect('yonetim/admin');
}
}


//Yönetici guncelleme formunu yönlendirir.
public function adminduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tbladmin');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/admin/edit/anasayfa',$data);
}

// Admin ve resim işlemlerini kaydeder
public function adminguncelle()
{
$this->protect();
	$adsoyad =$this->input->post('adsoyad');
	$ozellik =$this->input->post('ozellik');
	$site_url =$this->input->post('site_url');
	$site_adi =$this->input->post('site_adi');
	$version =$this->input->post('version');
	$id =$this->input->post('id');

// resim işlemi başlangıç
	$config['upload_path'] = FCPATH.'assets/front/img/admin';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/admin/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/admin/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/admin/'.$resimyolu.'';
		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='60%';
		$config['width'] =400;
		$config['height'] =400;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
$resimsil=adminresim($id);
unlink($resimsil);
//resim bitiş işlemleri

$data = array('resim'=>$resimkayit,'adsoyad'=>$adsoyad, 'ozellik'=>$ozellik,
'site_url'=>$site_url, 'site_adi'=>$site_adi, 'version'=>$version,
);

		$sonuc =$this->dtbs->guncelle($data,$id,'id','tbladmin');
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
										Yönetici Ayarları  başarılı bir şekilde Güncellediniz.
										</div>');
			redirect('yonetim/admin');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-ban"></i> BAŞARISIZ!!!</h4>
										Yönetici Ayar Güncelleme işlemi başarısız..
										</div>');
			redirect('yonetim/admin');
					}


}else {
	$data = array('adsoyad'=>$adsoyad, 'ozellik'=>$ozellik,
'site_url'=>$site_url, 'site_adi'=>$site_adi, 'version'=>$version,
);

	$sonuc =$this->dtbs->guncelle($data,$id,'id','tbladmin');
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
								Yönetici Ayar  başarılı bir şekilde güncellediniz.
									</div>');
		redirect('yonetim/admin');
	}else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> BAŞARISIZ!!!</h4>
									Yönetici Ayar Güncelleme işlemi başarısız..
									</div>');
		redirect('yonetim/admin');
				}
}
}

// Yönetici ve resim  silme işlemini yapar.
public function adminsil($id,$where,$from)
{
	$this->protect();
	$resimsil=adminresim($id);
	unlink($resimsil);

	$sonuc = $this->dtbs->sil($id,$where,$from);
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
									  	Seçtiğiniz Yönetici ayarları  Silindi :)
									</div>');
		redirect('yonetim/admin');
	}
	else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> HATA !!!</h4>
										Yönetici Ayarını Silerken Bir Hata oluştu .<b> TEKRAR DENEYİN!!</b>
									</div>');
		redirect('yonetim/admin');
	}}
/* Yönetici  bitiş -*/



// Site Ayar liste şeklinde görme işlemi
	public function site()
	{
$this->protect();
		$sonuc =$this->dtbs->listele('tblsite');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/site/anasayfa',$data);
	}

// Site Ayar ekleme formunu yönlendirir
	public function siteekle()
	{
		$this->protect();
		$this->load->view('back/site/ekle/anasayfa');
	}

//Site Ayar ve resim formu ekleme işlemini tamamlar
	public function siteekleme()
{
	$this->protect();
	$adsoyad =$this->input->post('adsoyad');
	$baslik =$this->input->post('baslik');
	$ozellik =$this->input->post('ozellik');
	$mail =$this->input->post('mail');
	$telefon =$this->input->post('telefon');
	$hakkimda =$this->input->post('hakkimda');

	$adres =$this->input->post('adres');
	$footerAd =$this->input->post('footerAd');
	$footerLink =$this->input->post('footerLink');
	$durum =$this->input->post('durum');


	$seohakkimda =seflink(	$hakkimda );



	$config['upload_path'] = FCPATH.'assets/front/img/site';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/site/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/site/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/site/'.$resimyolu.'';


		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='60%';
		$config['width'] =500;
		$config['height'] =500;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();

		$data = array('resim'=>$resimkayit,
		'adsoyad'=>$adsoyad,
		'baslik'=>$baslik,
		'seoHakkimda'=>$seohakkimda,
		'ozellik'=>$ozellik,
		'mail'=>$mail,
		'telefon'=>$telefon,
		'hakkimda'=>$hakkimda,
		'adres'=>$adres,
		'footerAd'=>$footerAd,
		'footerLink'=>$footerLink,
		'durum'=>$durum);

		$sonuc = $this->dtbs->ekle('tblsite',$data);
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i>BAŞARILI :)</h4>
										Site Ayar Listesine  başarılı bir şekilde eklediniz.
										</div>');
			redirect('yonetim/site');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i>HATA !!!</h4>
										Site Ayarları Ekleme işlemi başarısız..
										</div>');
			redirect('yonetim/site');
					}


}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
						 Resim Eklenirken Bir hata oluştu..
					</div>');
redirect('yonetim/site');
}
}

//Site Ayar durumunu toggle button yardımı ile aktif yada inaktif yapar
public function siteset()
{
	$this->protect();
  $id = $this->input->post('id');
  $durum = ($this->input->post('durum')=="true")?1:0;
  $this->db->where('id',$id)->update('tblsite',array('durum'=>$durum));
}
//site Ayar guncelleme formunu yönlendirir.
public function siteduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tblsite');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/site/edit/anasayfa',$data);
}

// Site Ayar ve resim işlemlerini kaydeder
public function siteguncelle()
{
	$this->protect();
	$adsoyad =$this->input->post('adsoyad');
	$id =$this->input->post('id');
	$baslik =$this->input->post('baslik');
	$ozellik =$this->input->post('ozellik');
	$mail =$this->input->post('mail');
	$telefon =$this->input->post('telefon');
	$hakkimda =$this->input->post('hakkimda');

	$adres =$this->input->post('adres');
	$footerAd =$this->input->post('footerAd');
	$footerLink =$this->input->post('footerLink');
	$durum =$this->input->post('durum');


	$seohakkimda =seflink(	$hakkimda );


// resim işlemi başlangıç
	$config['upload_path'] = FCPATH.'assets/front/img/site';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/site/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/site/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/site/'.$resimyolu.'';
		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='60%';
		$config['width'] =500;
		$config['height'] =500;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
$resimsil=siteresim($id);
unlink($resimsil);
//resim bitiş işlemleri


$data = array('resim'=>$resimkayit,
'adsoyad'=>$adsoyad,
'baslik'=>$baslik,
'seoHakkimda'=>$seohakkimda,
'ozellik'=>$ozellik,
'mail'=>$mail,
'telefon'=>$telefon,
'hakkimda'=>$hakkimda,
'adres'=>$adres,
'footerAd'=>$footerAd,
'footerLink'=>$footerLink,
'durum'=>$durum);

		$sonuc =$this->dtbs->guncelle($data,$id,'id','tblsite');
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i>BAŞARILI :)</h4>
										Site Ayarlar Listesine  başarılı bir şekilde Güncellediniz.
										</div>');
			redirect('yonetim/site');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
										Site Ayar Güncelleme işlemi başarısız..
										</div>');
			redirect('yonetim/site');
					}

}else {
	$data = array(
	'adsoyad'=>$adsoyad,
	'baslik'=>$baslik,
	'seoHakkimda'=>$seohakkimda,
	'ozellik'=>$ozellik,
	'mail'=>$mail,
	'telefon'=>$telefon,
	'hakkimda'=>$hakkimda,
	'adres'=>$adres,
	'footerAd'=>$footerAd,
	'footerLink'=>$footerLink,
	'durum'=>$durum);

	$sonuc =$this->dtbs->guncelle($data,$id,'id','tblsite');
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
									Site Ayarlar Listesini  başarılı bir şekilde Güncellediniz.
									</div>');
		redirect('yonetim/site');
	}else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
									Site Ayarlar Güncelleme işlemi başarısız..
									</div>');
		redirect('yonetim/site');
				}
}
}

// Site Ayarlar ve resim  silme işlemini yapar.
public function sitesil($id,$where,$from)
{
	$this->protect();
	$resimsil=siteresim($id);

	unlink($resimsil);

	$sonuc = $this->dtbs->sil($id,$where,$from);
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
									  	Seçtiğiniz Site Ayar Bölümü Silindi :)
									</div>');
		redirect('yonetim/site');
	}
	else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
										Site Ayarlarını Silerken Bir Hata ile karşılaştı .<b> TEKRAR DENEYİN!!</b>
									</div>');
		redirect('yonetim/site');
	}}
/* Site Ayarlar bitiş -*/



// genelayar liste şeklinde görme işlemi
	public function genelayar()
	{$this->protect();
			$sonuc =$this->dtbs->listele('tblgenelayar');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/genelayar/anasayfa',$data);
	}

// genelayar ekleme formunu yönlendirir
	public function genelayarekle()
	{
		$this->protect();
		$this->load->view('back/genelayar/ekle/anasayfa');
	}

//genelayar ve resim formu ekleme işlemini tamamlar
	public function genelayarekleme()
{

$this->protect();
	$title =$this->input->post('title');
	$logotitle =$this->input->post('logotitle');

	$config['upload_path'] = FCPATH.'assets/front/img/arkaplan';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/arkaplan/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/arkaplan/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/arkaplan/'.$resimyolu.'';


		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='100%';
		$config['width'] =1920;
		$config['height'] =1055;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();

		$data = array('resim'=>$resimkayit,
		'title'=>$title,
		 'logotitle'=>$logotitle
	);

		$sonuc = $this->dtbs->ekle('tblgenelayar',$data);
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
										Genel Ayar Listesine  başarılı bir şekilde eklediniz.
										</div>');
			redirect('yonetim/genelayar');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
										Genel Ayar Ekleme işlemi başarısız..
										</div>');
			redirect('yonetim/genelayar');
					}


}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
						Arka Plan Resmi Eklenirken Bir hata oluştu..
					</div>');
redirect('yonetim/genelayar');
}
}


//genelayar guncelleme formunu yönlendirir.
public function genelayarduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tblgenelayar');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/genelayar/edit/anasayfa',$data);
}

// genelayar ve resim işlemlerini kaydeder
public function genelayarguncelle()
{
$this->protect();

	$title =$this->input->post('title');
	$id =$this->input->post('id');
	$logotitle =$this->input->post('logotitle');


// resim işlemi başlangıç
	$config['upload_path'] = FCPATH.'assets/front/img/arkaplan';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/arkaplan/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/arkaplan/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/arkaplan/'.$resimyolu.'';
		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='100%';
		$config['width'] =1920;
		$config['height'] =1055;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
$resimsil=genelayarresim($id);
unlink($resimsil);
//resim bitiş işlemleri

$data = array('resim'=>$resimkayit,'title'=>$title, 'logotitle'=>$logotitle
);

		$sonuc =$this->dtbs->guncelle($data,$id,'id','tblgenelayar');
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
										Genel Ayar Listesine  başarılı bir şekilde güncellediniz.
										</div>');
			redirect('yonetim/genelayar');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
										Genel Ayar Güncelleme işlemi başarısız..
										</div>');
			redirect('yonetim/genelayar');
					}


}else {
	$data = array('title'=>$title, 'logotitle'=>$logotitle
);

	$sonuc =$this->dtbs->guncelle($data,$id,'id','tblgenelayar');
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
								Genel Ayar Listesine  başarılı bir şekilde güncellediniz.
									</div>');
		redirect('yonetim/genelayar');
	}else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
									Genel Ayar  Güncelleme işlemi başarısız..
									</div>');
		redirect('yonetim/genelayar');
				}
}
}

// gENEL aYAR ve resim  silme işlemini yapar.
public function genelayarsil($id,$where,$from)
{
	$this->protect();
	$resimsil=genelayarresim($id);
	unlink($resimsil);

	$sonuc = $this->dtbs->sil($id,$where,$from);
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
									  	Seçtiğiniz Ayar  Silindi :)
									</div>');
		redirect('yonetim/genelayar');
	}
	else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i>Genel Ayar İŞLEMİ BAŞARISIZ!!!</h4>
										Seçtiğiniz Genel Ayarı  Silerken Bir Hata ile karşılaştı .<b> TEKRAR DENEYİN!!</b>
									</div>');
		redirect('yonetim/genelayar');
	}}
/* Genel AYAR  bitiş -*/


//icon ayar başlanıgcı
public function icon()
{$this->protect();
		$sonuc =$this->dtbs->listele('tblicon');
  $data['bilgi'] = $sonuc;
  $this->load->view('back/icon/anasayfa',$data);
}

// icon ekleme formunu yönlendirir
public function iconekle()
{
	$this->protect();
  $this->load->view('back/icon/ekle/anasayfa');
}

//icon formu ekleme işlemini tamamlar
public function iconekleme()
{
	$this->protect();
$config['upload_path'] = FCPATH.'assets/front/img/icon';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = TRUE;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/icon/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/icon/img/ozellik/'.$resimyolu.'';
  $config['new_image'] =     'assets/icon/img/ozellik/'.$resimyolu.'';


  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='60%';
  $config['width'] =400;
  $config['height'] =400;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();

  $data = array(
'resim' =>$resimkayit
);
$sonuc = $this->dtbs->ekle('tblicon',$data);

if ($sonuc) {
$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
              İcon Listesine  başarılı bir şekilde eklediniz.
              </div>');
redirect('yonetim/icon');
}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>HATA !!!</h4>
              İcon Ekleme işlemi başarısız..
              </div>');
redirect('yonetim/icon');
    }


}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
    İcon Resmi Eklenirken Bir hata oluştu..
    </div>');
redirect('yonetim/icon');
}
}
//icon guncelleme formunu yönlendirir.
public function iconduzenle($id)
{
	$this->protect();
$sonuc =$this->dtbs->cek($id,'tblicon');
$data['bilgi'] = $sonuc;
$this->load->view('back/icon/edit/anasayfa',$data);
}
// icon güncelleme işlemlerini kaydeder
public function iconguncelle()
{
$id =$this->input->post('id');

// resim işlemi başlangıç
$config['upload_path'] = FCPATH.'assets/front/img/icon';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = TRUE;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/icon/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/icon/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/icon/'.$resimyolu.'';
  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='60%';
  $config['width'] =400;
  $config['height'] =400;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();
$resimsil=iconresim($id);
unlink($resimsil);
//resim bitiş işlemleri


  $data = array('resim'=>$resimkayit);

  $sonuc =$this->dtbs->guncelle($data,$id,'id','tblicon');
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>  BAŞARILI :) </h4>
                  İcon Listesine  başarılı bir şekilde Güncellediniz.
                  </div>');
    redirect('yonetim/icon');
  }else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  İcon Güncellemesi işlemi başarısız..
                  </div>');
    redirect('yonetim/icon');
        }


}else {

$data = array('id'=>$id);
$sonuc =$this->dtbs->guncelle($data,$id,'id','tblicon');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i>Güncelleme BAŞARILI!</h4>
                İcon Listesine  başarılı bir şekilde Güncellediniz.
                </div>');
  redirect('yonetim/icon');
}else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                İcon Güncelleme  işlemi başarısız..
                </div>');
  redirect('yonetim/icon');
      }
}
}

public function iconsil($id,$where,$from)
{
	$this->protect();
$resimsil=iconresim($id);
unlink($resimsil);

$sonuc = $this->dtbs->sil($id,$where,$from);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                    Seçtiğiniz İcon  Silindi :)
                </div>');
  redirect('yonetim/icon');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Seçtiğiniz İcon Silerken Bir Hata ile oluştu.<b> TEKRAR DENEYİN!!</b>
                </div>');
  redirect('yonetim/icon');
}}
/* icon başlıkları bitiş -*/



// Projeler  Başlangıç
public function projeler()
{
	$this->protect();
	$sonuc =$this->dtbs->listele('tblprojeler');
  $data['bilgi'] = $sonuc;
  $this->load->view('back/projeler/anasayfa',$data);
}

// Projeler ekleme formunu yönlendirir
public function projelerekle()
{$this->protect();
  $this->load->view('back/projeler/ekle/anasayfa');
}

//Projeler ve resim formu ekleme işlemini tamamlar
public function projelerekleme()
{
$this->protect();
	$baslik =$this->input->post('baslik');
	$idkategori =$this->input->post('idkategori');
	$durum =$this->input->post('durum');
	$hit=0;
	$keywords=$this->input->post('keywords');
	$icerik=$this->input->post('icerik');
  $seoicerik=seflink($icerik);
	$seobaslik=seflink($baslik);

	$seogenel = $seoicerik.'';
  $seogenel .=$seobaslik.' ' ;
	$seogenel.=seflink($keywords).' ';
	$seogenel=seflink($seogenel);

$config['upload_path'] = FCPATH.'assets/front/img/projeler';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = TRUE;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/projeler/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/projeler/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/projeler/'.$resimyolu.'';


  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='100%';
  $config['width'] =1000;
  $config['height'] =666;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();

  $data = array(
		'resim'=>$resimkayit,
		'baslik'=>$baslik,
		'idkategori'=>$idkategori,
  	'durum'=>$durum,
		'seobaslik'=>$seobaslik,
		'icerik'=>$icerik,
  	'keywords'=>$keywords,
		'seoicerik'=>$seoicerik,
		'seogenel'=>$seogenel,
		'hit'=>$hit);

  $sonuc = $this->dtbs->ekle('tblprojeler',$data);
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                  Projeler Listesine  başarılı bir şekilde eklediniz.
                  </div>');
    redirect('yonetim/projeler');
  }else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>HATA !!!</h4>
                  Proje  Ekleme işlemi başarısız..
                  </div>');
    redirect('yonetim/projeler');
        }


}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
          Proje Resmi Eklenirken Bir hata oluştu..
        </div>');
redirect('yonetim/projeler');
}
}

//Projeler durumunu toggle button yardımı ile aktif yada inaktif yapar
public function projelerset()
{
	$this->protect();
$id = $this->input->post('id');
$durum = ($this->input->post('durum')=="true")?1:0;
$this->db->where('id',$id)->update('tblprojeler',array('durum'=>$durum));
}
//Projerler guncelleme formunu yönlendirir.
public function projelerduzenle($id)
{
	$this->protect();
$sonuc =$this->dtbs->cek($id,'tblprojeler');
$data['bilgi'] = $sonuc;
$this->load->view('back/projeler/edit/anasayfa',$data);
}

// Projeler ve resim işlemlerini kaydeder
public function projelerguncelle()
{
	$this->protect();
		$id =$this->input->post('id');
	$baslik =$this->input->post('baslik');
	$idkategori =$this->input->post('idkategori');
	$durum =$this->input->post('durum');
	$keywords=$this->input->post('keywords');
	$icerik=$this->input->post('icerik');
	$seobaslik=seflink($baslik);
	$seoicerik=seflink($icerik);
	$seogenel = $seoicerik.' ';
$seogenel .=$seobaslik.' ' ;
$seogenel.=seflink($keywords).' ';
$seogenel=seflink($seogenel);

// resim işlemi başlangıç
$config['upload_path'] = FCPATH.'assets/front/img/projeler';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = TRUE;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/projeler/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/projeler/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/projeler/'.$resimyolu.'';
  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='100%';
  $config['width'] =1000;
  $config['height'] =666;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();
$resimsil=projelerresim($id);
unlink($resimsil);
//resim bitiş işlemleri


$data = array(
	'resim'=>$resimkayit,
	'baslik'=>$baslik,
	'idkategori'=>$idkategori,
	'durum'=>$durum,
	'seobaslik'=>$seobaslik,
	'icerik'=>$icerik,
	'keywords'=>$keywords,
	'seoicerik'=>$seoicerik,
	'seogenel'=>$seogenel);

  $sonuc =$this->dtbs->guncelle($data,$id,'id','tblprojeler');
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                  Projeler Listesine  başarılı bir şekilde Güncellediniz.
                  </div>');
    redirect('yonetim/projeler');
  }else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Proje Güncelleme işlemi başarısız..
                  </div>');
    redirect('yonetim/projeler');
        }


}else {
	$data = array(

		'baslik'=>$baslik,
		'idkategori'=>$idkategori,
		'durum'=>$durum,
		'seobaslik'=>$seobaslik,
		'icerik'=>$icerik,
		'keywords'=>$keywords,
		'seoicerik'=>$seoicerik,
		'seogenel'=>$seogenel);

$sonuc =$this->dtbs->guncelle($data,$id,'id','tblprojeler');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                Projeler Listesine  başarılı bir şekilde Güncellediniz.
                </div>');
  redirect('yonetim/projeler');
}else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                Proje Güncelleme işlemi başarısız..
                </div>');
  redirect('yonetim/projeler');
      }
}
}

// Proje ve resim  silme işlemini yapar.
public function projelersil($id,$where,$from)
{
	$this->protect();
$resimsil=projelerresim($id);
unlink($resimsil);

$sonuc = $this->dtbs->sil($id,$where,$from);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                    Seçtiğiniz Proje Silindi :)
                </div>');
  redirect('yonetim/projeler');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Projenizi Silerken Bir Hata ile karşılaştı .<b> TEKRAR DENEYİN!!</b>
                </div>');
  redirect('yonetim/projeler');
}}
/* Projeler bitiş -*/




// yazilar  Başlangıç
public function yazilar()
{	$this->protect();
	$sonuc =$this->dtbs->listele('tblyazilar');
  $data['bilgi'] = $sonuc;
  $this->load->view('back/yazilar/anasayfa',$data);
}

// yazilar ekleme formunu yönlendirir
public function yazilarekle()
{
	$this->protect();
  $this->load->view('back/yazilar/ekle/anasayfa');
}

//yazilar ve resim formu ekleme işlemini tamamlar
public function yazilarekleme()
{
$this->protect();
	$baslik =$this->input->post('baslik');
	$tur =$this->input->post('tur');
	$durum =$this->input->post('durum');
	$hit=0;
	$keywords=$this->input->post('keywords');
	$icerik=$this->input->post('icerik');
  $seoicerik=seflink($icerik);
	$seobaslik=seflink($baslik);


	$seogenel = $seoicerik.' ';
$seogenel .=$seobaslik.' ' ;
$seogenel.=seflink($keywords).' ';
$seogenel=seflink($seogenel);

$config['upload_path'] = FCPATH.'assets/front/img/yazilar';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = TRUE;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/yazilar/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/yazilar/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/yazilar/'.$resimyolu.'';


  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='100%';
  $config['width'] =960;
  $config['height'] =600;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();

  $data = array(
		'resim'=>$resimkayit,
		'baslik'=>$baslik,
		'tur'=>$tur,
  	'durum'=>$durum,
		'seobaslik'=>$seobaslik,
		'icerik'=>$icerik,
		'seogenel'=>$seogenel,
  	'keywords'=>$keywords,
		'seoicerik'=>$seoicerik,
		'hit'=>$hit);

  $sonuc = $this->dtbs->ekle('tblyazilar',$data);
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                  Yazılar Listesine  başarılı bir şekilde eklediniz.
                  </div>');
    redirect('yonetim/yazilar');
  }else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>HATA !!!</h4>
                  Yazı Ekleme işlemi başarısız..
                  </div>');
    redirect('yonetim/yazilar');
        }

}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
          Yazı Resmi Eklenirken Bir hata oluştu..
        </div>');
redirect('yonetim/yazilar');
}
}

//yazilar durumunu toggle button yardımı ile aktif yada inaktif yapar
public function yazilarset()
{
	$this->protect();
$id = $this->input->post('id');
$durum = ($this->input->post('durum')=="true")?1:0;
$this->db->where('id',$id)->update('tblyazilar',array('durum'=>$durum));
}
//Projerler guncelleme formunu yönlendirir.
public function yazilarduzenle($id)
{
	$this->protect();
$sonuc =$this->dtbs->cek($id,'tblyazilar');
$data['bilgi'] = $sonuc;
$this->load->view('back/yazilar/edit/anasayfa',$data);
}

// yazilar ve resim işlemlerini kaydeder
public function yazilarguncelle()
{
$this->protect();
	$id =$this->input->post('id');
	$baslik =$this->input->post('baslik');
	$tur =$this->input->post('tur');
	$durum =$this->input->post('durum');

	$keywords=$this->input->post('keywords');
	$icerik=$this->input->post('icerik');
	$seobaslik=seflink($baslik);
	$seoicerik=seflink($icerik);
	$seogenel = $seoicerik.'';
	$seogenel .=$seobaslik.' ' ;
	$seogenel.=seflink($keywords).' ';
	$seogenel=seflink($seogenel);


// resim işlemi başlangıç
$config['upload_path'] = FCPATH.'assets/front/img/yazilar';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = TRUE;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/yazilar/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/yazilar/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/yazilar/'.$resimyolu.'';
  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='100%';
  $config['width'] =960;
  $config['height'] =600;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();
$resimsil=yazilarresim($id);
unlink($resimsil);
//resim bitiş işlemleri

$data = array(
	'resim'=>$resimkayit,
	'baslik'=>$baslik,
	'tur'=>$tur,
	'durum'=>$durum,
	'seobaslik'=>$seobaslik,
	'icerik'=>$icerik,
	'keywords'=>$keywords,
	'seogenel'=>$seogenel,
	'seoicerik'=>$seoicerik);

  $sonuc =$this->dtbs->guncelle($data,$id,'id','tblyazilar');
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                  Yazılar Listesine  başarılı bir şekilde Güncellediniz.
                  </div>');
    redirect('yonetim/yazilar');
  }else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Yazılar Güncelleme işlemi başarısız..
                  </div>');
    redirect('yonetim/yazilar');
        }
}else {
	$data = array(

		'baslik'=>$baslik,
		'tur'=>$tur,
		'durum'=>$durum,
		'seobaslik'=>$seobaslik,
		'icerik'=>$icerik,
		'seogenel'=>$seogenel,
		'keywords'=>$keywords,
		'seoicerik'=>$seoicerik);

$sonuc =$this->dtbs->guncelle($data,$id,'id','tblyazilar');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                Yazılar Listesine  başarılı bir şekilde Güncellediniz.
                </div>');
  redirect('yonetim/yazilar');
}else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                Yazı Güncelleme işlemi başarısız..
                </div>');
  redirect('yonetim/yazilar');
      }
}
}

// Proje ve resim  silme işlemini yapar.
public function yazilarsil($id,$where,$from)
{
	$this->protect();
$resimsil=yazilarresim($id);
unlink($resimsil);

$sonuc = $this->dtbs->sil($id,$where,$from);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                    Seçtiğiniz Yazı Silindi :)
                </div>');
  redirect('yonetim/yazilar');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Yazı silinirken Bir Hata ile oluştu .<b> TEKRAR DENEYİN!!</b>
                </div>');
  redirect('yonetim/yazilar');
}}
/* yazilar bitiş -*/

// İletişim  liste şeklinde görme işlemi
	public function iletisim()
	{
$this->protect();
			$sonuc =$this->dtbs->listele('tbliletisim');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/iletisim/anasayfa',$data);
	}

//gelen mesajı okumaya  yönlendirir.
public function iletisimoku($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tbliletisim');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/iletisim/oku/anasayfa',$data);
}

// gelen mesajı  silme işlemini yapar.
public function iletisimsil($id,$where,$from)
{
	$this->protect();
  $sonuc = $this->dtbs->sil($id,$where,$from);
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
                    Seçtiğiniz Mesaj  Silindi
                  </div>');
    redirect('yonetim/iletisim');
  }
  else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> BAŞARISIZ:) </h4>
                    Seçtiğiniz Mesajı Silerken Bir Hata ile karşılaştı <b> TEKRAR DENEYİN!!</b>
                  </div>');
    redirect('yonetim/iletisim');
}}
/* iletisim başlıkları bitiş -*/


// sertifikalar menü başlıkları başlanguçı

// sertifikalar  liste şeklinde görme işlemi
	public function sertifikalar()
	{	$this->protect();
		$sonuc =$this->dtbs->listele('tblsertifikalar');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/sertifikalar/anasayfa',$data);
	}

// sertifikalar ekleme formunu yönlendirir
	public function sertifikalarekle()
	{$this->protect();
		$this->load->view('back/sertifikalar/ekle/anasayfa');
	}

//sertifikalar formu ekleme işlemini tamamlar
	public function sertifikalarekleme()
{
	$this->protect();
	$sertifika =$this->input->post('sertifika');
	$seo =seflink($sertifika);
	$config['upload_path'] = FCPATH.'assets/front/img/sertifikalar';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/sertifikalar/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/sertifikalar/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/sertifikalar/'.$resimyolu.'';
		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='60%';
		$config['width'] =960;
		$config['height'] =600;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();

    $data = array(
'sertifika' => $sertifika ,
'resim' =>$resimkayit,
'seosertifika' =>$seo
);
$sonuc = $this->dtbs->ekle('tblsertifikalar',$data);

if ($sonuc) {
	$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
								Sertifikalar Listesine  başarılı bir şekilde eklediniz.
								</div>');
	redirect('yonetim/sertifikalar');
}else {
	$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i>HATA !!!</h4>
								Sertifika Ekleme işlemi başarısız..
								</div>');
	redirect('yonetim/sertifikalar');
			}
}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
			 Resmi Eklenirken Bir hata oluştu..
			</div>');
redirect('yonetim/sertifikalar');
}
}
//sertifikalar guncelleme formunu yönlendirir.
public function sertifikalarduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tblsertifikalar');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/sertifikalar/edit/anasayfa',$data);
}
// sertifikalar güncelleme işlemlerini kaydeder
public function sertifikalarguncelle()
{
	$this->protect();
	$sertifika =$this->input->post('sertifika');
	$id =$this->input->post('id');
	$seosertifika =seflink(	$sertifika );

	// resim işlemi başlangıç
	$config['upload_path'] = FCPATH.'assets/front/img/sertifikalar';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('resim')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/sertifikalar/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/sertifikalar/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/sertifikalar/'.$resimyolu.'';
		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='60%';
		$config['width'] =960;
		$config['height'] =600;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	$resimsil=sertifikaresim($id);
	unlink($resimsil);
	//resim bitiş işlemleri

		$data = array('resim'=>$resimkayit,'sertifika'=>$sertifika,'seosertifika'=>$seosertifika);

		$sonuc =$this->dtbs->guncelle($data,$id,'id','tblsertifikalar');
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
										Sertifika Listesini  başarılı bir şekilde Güncellediniz.
										</div>');
			redirect('yonetim/sertifikalar');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
										Sertifika Güncelleme işlemi başarısız..
										</div>');
			redirect('yonetim/sertifikalar');
					}
	}else {
	$data = array('sertifika'=>$sertifika,'seosertifika'=>$seosertifika);

	$sonuc =$this->dtbs->guncelle($data,$id,'id','tblsertifikalar');
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
									Sertifikalar Listesini  başarılı bir şekilde Güncellediniz.
									</div>');
		redirect('yonetim/sertifikalar');
	}else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
									Sertifika Güncelleme  işlemi başarısız..
									</div>');
		redirect('yonetim/sertifikalar');
				}
	}
}

public function sertifikalarsil($id,$where,$from)
{
	$this->protect();
	$resimsil=sertifikaresim($id);
	unlink($resimsil);

	$sonuc = $this->dtbs->sil($id,$where,$from);
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
									  	Seçtiğiniz Sertifika  Silindi :)
									</div>');
		redirect('yonetim/sertifikalar');
	}
	else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
										Seçtiğiniz Sertifika Silerken Bir Hata ile karşılaştı .<b> TEKRAR DENEYİN!!</b>
									</div>');
		redirect('yonetim/sertifikalar');
	}}
/* sertifikalar başlıkları bitiş -*/



// egitim menü başlıkları başlanguçı

// egitim  liste şeklinde görme işlemi
	public function egitim()
	{
		$this->protect();
		$sonuc =$this->dtbs->listele('tblegitim');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/egitim/anasayfa',$data);
	}

// egitim ekleme formunu yönlendirir
	public function egitimekle()
	{
		$this->protect();
		$this->load->view('back/egitim/ekle/anasayfa');
	}

//egitim formu ekleme işlemini tamamlar
	public function egitimekleme()
{
	$this->protect();
    $data = array(
'ad' => $ad = $this->input->post('ad'),
'seoAd' =>seflink($ad)
);
$sonuc = $this->dtbs->ekle('tblegitim',$data);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI  :)</h4>
                		Eğitim Bilgilerine   başarılı bir  şekilde eklendi.
                </div>');
  redirect('yonetim/egitim');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> HATA !!!</h4>
                  Eğitim bilgilerine  Eklerken Sorun oluştu. <b>TEKRAR DENEYİN!!</b>
                </div>');
  redirect('yonetim/egitim');
}
}

//egitim guncelleme formunu yönlendirir.
public function egitimduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tblegitim');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/egitim/edit/anasayfa',$data);
}


// egitim güncelleme işlemlerini kaydeder
public function egitimguncelle()
{
	$this->protect();
  $data = array(
'id' => $id= $this->input->post('id'),
'ad' => $ad= $this->input->post('ad'),
'seoAd' =>seflink($ad)
  );

$sonuc =$this->dtbs->guncelle($data,$id,'id','tblegitim');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i>BAŞARILI  :)</h4>
Eğitim Bilgileri Başarılı Bir Şekilde Güncellendi  :) </div>');
  redirect('yonetim/egitim');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i> HATA !!!</h4>
  Eğitim Bilgileri Güncellerken Bir Hata Oluştu <b> TEKRAR DENEYİN!!</b>
  </div>');
  redirect('yonetim/egitim');}
}
// egitim silme işlemini yapar.
public function egitimsil($id,$where,$from)
{
	$this->protect();
  $sonuc = $this->dtbs->sil($id,$where,$from);
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>BAŞARILI :)</h4>
                    Seçtiğiniz Eğitim Bilgileri  Silindi :)
                  </div>');
    redirect('yonetim/egitim');
  }
  else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                    Seçtiğiniz Eğitim Bilgilerini Silerken Bir Hata ile karşılaştı <b> TEKRAR DENEYİN!!</b>
                  </div>');
    redirect('yonetim/egitim');
}}
/* egitim başlıkları bitiş -*/





// dil menü başlıkları başlanguçı

// dil  liste şeklinde görme işlemi
	public function dil()
	{
		$this->protect();
		$sonuc =$this->dtbs->listele('tbldil');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/dil/anasayfa',$data);
	}

// dil ekleme formunu yönlendirir
	public function dilekle()
	{
		$this->protect();
		$this->load->view('back/dil/ekle/anasayfa');
	}
//dil formu ekleme işlemini tamamlar
	public function dilekleme()
{
	$this->protect();
    $data = array(
'ad' => $ad = $this->input->post('ad'),
'seoAd' =>seflink($ad)
);
$sonuc = $this->dtbs->ekle('tbldil',$data);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
                		Dil Bilgileri   başarılı bir  şekilde eklendi.
                </div>');
  redirect('yonetim/dil');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> HATA !!!</h4>
                  Dil Eklerken Sorun Yaşanmıştır. <b>TEKRAR DENEYİN!!</b>
                </div>');
  redirect('yonetim/dil');
}
}
//dil guncelleme formunu yönlendirir.
public function dilduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->cek($id,'tbldil');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/dil/edit/anasayfa',$data);
}
// dil güncelleme işlemlerini kaydeder
public function dilguncelle()
{
	$this->protect();
  $data = array(
'id' => $id= $this->input->post('id'),
'ad' => $ad= $this->input->post('ad'),
'seoAd' =>seflink($ad)
  );

$sonuc =$this->dtbs->guncelle($data,$id,'id','tbldil');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i>BAŞARILI :)  </h4>
Dil Bilgileri Başarılı Bir Şekilde Güncellendi   </div>');
  redirect('yonetim/dil');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i> HATA!!!</h4>
  Dil Bilgileri Güncellerken Bir Hata Oluştu <b> TEKRAR DENEYİN!!</b>
  </div>');
  redirect('yonetim/dil');}
}
// dil silme işlemini yapar.
public function dilsil($id,$where,$from)
{
	$this->protect();
  $sonuc = $this->dtbs->sil($id,$where,$from);
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i BAŞARILI :)> </h4>
                    Seçtiğiniz Dil Bilgileri  Silindi
                  </div>');
    redirect('yonetim/dil');
  }
  else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                    Seçtiğiniz Dil Bilgileri Silerken Bir Hata oluştu <b> TEKRAR DENEYİN!!</b>
                  </div>');
    redirect('yonetim/dil');
}}
/* dil başlıkları bitiş -*/

//arkaplan ayar başlanıgcı
public function arkaplan()
{$this->protect();
		$sonuc =$this->dtbs->listele('tblarkaplan');
  $data['bilgi'] = $sonuc;
  $this->load->view('back/arkaplan/anasayfa',$data);
}

// arkaplan ekleme formunu yönlendirir
public function arkaplanekle()
{
	$this->protect();
  $this->load->view('back/arkaplan/ekle/anasayfa');
}

//arkaplan formu ekleme işlemini tamamlar
public function arkaplanekleme()
{
	$this->protect();
$config['upload_path'] = FCPATH.'assets/front/img/arkaplan';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = TRUE;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/arkaplan/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/arkaplan/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/arkaplan/'.$resimyolu.'';

  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='100%';
  $config['width'] =1920;
  $config['height'] =1055;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();

  $data = array(
'resim' =>$resimkayit
);
$sonuc = $this->dtbs->ekle('tblarkaplan',$data);

if ($sonuc) {
$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
              Arka Plan Resmi  başarılı bir şekilde eklediniz.
              </div>');
redirect('yonetim/arkaplan');
}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>HATA !!!</h4>
              Arkaplan Resmini Eklerken bir hata oluştu..
              </div>');
redirect('yonetim/arkaplan');
    }

}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
    Arka Plan  Resmini Eklenirken Bir hata oluştu..
    </div>');
redirect('yonetim/arkaplan');
}
}
//arkaplan guncelleme formunu yönlendirir.
public function arkaplanduzenle($id)
{
	$this->protect();
$sonuc =$this->dtbs->cek($id,'tblarkaplan');
$data['bilgi'] = $sonuc;
$this->load->view('back/arkaplan/edit/anasayfa',$data);
}
// arkaplan güncelleme işlemlerini kaydeder
public function arkaplanguncelle()
{
$id =$this->input->post('id');

// resim işlemi başlangıç
$config['upload_path'] = FCPATH.'assets/front/img/arkaplan';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = TRUE;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/arkaplan/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/arkaplan/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/arkaplan/'.$resimyolu.'';
  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='100%';
  $config['width'] =1920;
  $config['height'] =1055;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();
$resimsil=arkaplanresim($id);
unlink($resimsil);
//resim bitiş işlemleri


  $data = array('resim'=>$resimkayit);

  $sonuc =$this->dtbs->guncelle($data,$id,'id','tblarkaplan');
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>  BAŞARILI :) </h4>
                  Arkaplan  Resmini  başarılı bir şekilde Güncellediniz.
                  </div>');
    redirect('yonetim/arkaplan');
  }else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Arkaplan Güncelleme işlemi başarısız..
                  </div>');
    redirect('yonetim/arkaplan');
        }


}else {

$data = array('id'=>$id);
$sonuc =$this->dtbs->guncelle($data,$id,'id','tblarkaplan');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                Arkaplan Listesini başarılı bir şekilde Güncellediniz.
                </div>');
  redirect('yonetim/arkaplan');
}else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                Arka Plan Güncelleme  işlemi başarısız..
                </div>');
  redirect('yonetim/arkaplan');
      }
}}


public function arkaplansil($id,$where,$from)
{
	$this->protect();
$resimsil=arkaplanresim($id);
unlink($resimsil);

$sonuc = $this->dtbs->sil($id,$where,$from);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                    Seçtiğiniz Arka Plan  Silindi
                </div>');
  redirect('yonetim/arkaplan');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Seçtiğiniz Arkaplanı Silerken Bir Hata oluştu
                </div>');
  redirect('yonetim/arkaplan');
}}
/* arkaplan başlıkları bitiş -*/



// Okunan Kitaplar Ekleme Formu başlangıç
public function okunan()
{$this->protect();
		$sonuc =$this->dtbs->okunan('tblokunan');
  $data['bilgi'] = $sonuc;
  $this->load->view('back/okunan/anasayfa',$data);
}
// Projeler ekleme formunu yönlendirir
public function okunanekle()
{$this->protect();
  $this->load->view('back/okunan/ekle/anasayfa');
}


//Projeler ve resim formu ekleme işlemini tamamlar
public function okunanekleme()
{
date_default_timezone_set( "Europe/Istanbul" ) ;
$this->protect();
	$kitapadi =$this->input->post('kitapadi');
	$yazaradi =$this->input->post('yazaradi');
	$yayinevi =$this->input->post('yayinevi');
	$sayfa=$this->input->post('sayfa');
	$kitapresim=seflink($kitapadi);

$baslatarihi=$this->input->post('baslatarihi');
 $tarih1=strtotime($baslatarihi);
	$bitistarihi=$this->input->post('bitistarihi');
$tarih2=strtotime($bitistarihi);

$sure= ($tarih2-$tarih1)/86400 ;

$config['upload_path'] = FCPATH.'assets/front/img/kitaplar/okunan';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = TRUE;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/kitaplar/okunan/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/kitaplar/okunan/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/kitaplar/okunan/'.$resimyolu.'';
  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='100%';
  $config['width'] =179;
  $config['height'] =281;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();

  $data = array(
		'kitapadi'=>$kitapadi,
		'yazaradi'=>$yazaradi,
		'yayinevi'=>$yayinevi,
  	'sayfa'=>$sayfa,
		'baslatarihi'=>$baslatarihi,
		'bitistarihi'=>$bitistarihi,
  	'sure'=>$sure,
		'resim'=>$resimkayit
		);

  $sonuc = $this->dtbs->ekle('tblokunan',$data);
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                  Kitap Okunan Listesine  başarılı bir şekilde eklediniz.
                  </div>');
    redirect('yonetim/okunan');
  }else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Kitap Ekleme işlemi başarısız
                  </div>');
    redirect('yonetim/okunan');
        }
}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
          Kitabın Resmi Eklenirken Bir hata oluştu..
        </div>');
redirect('yonetim/okunan');
}
}
public function okunanduzenle($id)
{

	date_default_timezone_set( "Europe/Istanbul" ) ;
	$this->protect();
$sonuc =$this->dtbs->cek($id,'tblokunan');
$data['bilgi'] = $sonuc;
$this->load->view('back/okunan/edit/anasayfa',$data);
}

public function okunanguncelle()
{
	$this->protect();
	$id =$this->input->post('id');
	$kitapadi =$this->input->post('kitapadi');
	$yazaradi =$this->input->post('yazaradi');
	$yayinevi =$this->input->post('yayinevi');
	$sayfa=$this->input->post('sayfa');
	$kitapresim=seflink($kitapadi);

$baslatarihi=$this->input->post('baslatarihi');
 $tarih1=strtotime($baslatarihi);
	$bitistarihi=$this->input->post('bitistarihi');
$tarih2=strtotime($bitistarihi);

$sure= ($tarih2-$tarih1)/86400 ;
// resim işlemi başlangıç
$config['upload_path'] = FCPATH.'assets/front/img/kitaplar/okunan';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = true;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/kitaplar/okunan/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/kitaplar/okunan/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/kitaplar/okunan/'.$resimyolu.'';
  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='100%';
  $config['width'] =179;
  $config['height'] =281;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();
$resimsil=okunanresim($id);
unlink($resimsil);
//resim bitiş işlemleri
$data = array(
	'kitapadi'=>$kitapadi,
	'yazaradi'=>$yazaradi,
	'yayinevi'=>$yayinevi,
	'sayfa'=>$sayfa,
	'baslatarihi'=>$baslatarihi,
	'bitistarihi'=>$bitistarihi,
	'sure'=>$sure,
	'resim'=>$resimkayit
	);

  $sonuc =$this->dtbs->guncelle($data,$id,'id','tblokunan');
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                  Kitaplar Listesini  başarılı bir şekilde Güncellediniz.
                  </div>');
    redirect('yonetim/okunan');
  }else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Kitaplar Güncelleme işlemi başarısız..
                  </div>');
    redirect('yonetim/okunan');
        }
}else {
	$data = array(
		'kitapadi'=>$kitapadi,
		'yazaradi'=>$yazaradi,
		'yayinevi'=>$yayinevi,
  	'sayfa'=>$sayfa,
		'baslatarihi'=>$baslatarihi,
		'bitistarihi'=>$bitistarihi,
  	'sure'=>$sure
		);

$sonuc =$this->dtbs->guncelle($data,$id,'id','tblokunan');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                Kitaplar Listesine  başarılı bir şekilde Güncellediniz.
                </div>');
  redirect('yonetim/okunan');
}else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                Kitaplar Güncelleme işlemi başarısız
                </div>');
  redirect('yonetim/okunan');
      }
}
}

public function okunansil($id,$where,$from)
{
	$this->protect();
$resimsil=okunanresim($id);
unlink($resimsil);

$sonuc = $this->dtbs->sil($id,$where,$from);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                    Seçtiğiniz Kitap Silindi
                </div>');
  redirect('yonetim/okunan');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Kitabı Silerken Bir Hata oluştu
                </div>');
  redirect('yonetim/okunan');
}}
// okunacak Kitaplar Ekleme Formu başlangıç
public function okunacak()
{$this->protect();
		$sonuc =$this->dtbs->listele('tblokunacak');
  $data['bilgi'] = $sonuc;
  $this->load->view('back/okunacak/anasayfa',$data);
}

// Okunacak ekleme formunu yönlendirir
public function okunacakekle()
{$this->protect();
  $this->load->view('back/okunacak/ekle/anasayfa');
}

//Okunacak ve resim formu ekleme işlemini tamamlar
public function okunacakekleme()
{

$this->protect();
	$kitapadi =$this->input->post('kitapadi');
	$yazaradi =$this->input->post('yazaradi');



  $data = array(
		'kitapadi'=>$kitapadi,
		'yazaradi'=>$yazaradi
  );

  $sonuc = $this->dtbs->ekle('tblokunacak',$data);
    if ($sonuc) {
        $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                Okunacak  Kitap Listesini  başarılı bir şekilde eklediniz.
                  </div>');
        redirect('yonetim/okunacak');
    }else {
        $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                 Okunacak  Kitap Ekleme işlemi başarısız..
                  </div>');
        redirect('yonetim/okunacak');
    }

}

public function okunacakduzenle($id)
{
$this->protect();
$sonuc =$this->dtbs->cek($id,'tblokunacak');
$data['bilgi'] = $sonuc;
$this->load->view('back/okunacak/edit/anasayfa',$data);
}

public function okunacakguncelle()
{
	$this->protect();
	$id =$this->input->post('id');
	$kitapadi =$this->input->post('kitapadi');
	$yazaradi =$this->input->post('yazaradi');


	$data = array(
		'kitapadi'=>$kitapadi,
		'yazaradi'=>$yazaradi
		);

$sonuc =$this->dtbs->guncelle($data,$id,'id','tblokunacak');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                Okunacak Kitaplar Listesiness  başarılı bir şekilde Güncellediniz.
                </div>');
  redirect('yonetim/okunacak');
}else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
              Okunacak  Kitaplar Güncelleme işlemi başarısız..
                </div>');
  redirect('yonetim/okunacak');
      }

}
public function okunacaksil($id,$where,$from)
{
	$this->protect();


$sonuc = $this->dtbs->sil($id,$where,$from);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                    Seçtiğiniz Kitap Silindi :)
                </div>');
  redirect('yonetim/okunacak');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Kitabı Silerken Bir Hata ile oluştu
                </div>');
  redirect('yonetim/okunacak');
}}

//resimler ayar başlanıgcı
public function resimler()
{$this->protect();
		$sonuc =$this->dtbs->listele('tblresimler');
  $data['bilgi'] = $sonuc;
  $this->load->view('back/resimler/anasayfa',$data);
}

// resimler ekleme formunu yönlendirir
public function resimlerekle()
{
	$this->protect();
  $this->load->view('back/resimler/ekle/anasayfa');
}

//resimler formu ekleme işlemini tamamlar
public function resimlerekleme()
{
	$this->protect();
$config['upload_path'] = FCPATH.'assets/front/img/resimler';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = false;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/resimler/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/resimler/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/resimler/'.$resimyolu.'';


  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='60%';
  $config['width'] =960;
  $config['height'] =600;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();

  $data = array(
'resim' =>$resimkayit
);
$sonuc = $this->dtbs->ekle('tblresimler',$data);

if ($sonuc) {
$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
              Resmi, Resimler Listesine  başarılı bir şekilde eklediniz.
              </div>');
redirect('yonetim/resimler');
}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
               Resmi Ekleme işlemi başarısız..
              </div>');
redirect('yonetim/resimler');
    }
}else {
$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
      Resmi Eklerken Bir hata oluştu..
    </div>');
redirect('yonetim/resimler');
}
}
//resimler guncelleme formunu yönlendirir.
public function resimlerduzenle($id)
{
	$this->protect();
$sonuc =$this->dtbs->cek($id,'tblresimler');
$data['bilgi'] = $sonuc;
$this->load->view('back/resimler/edit/anasayfa',$data);
}
// resimler güncelleme işlemlerini kaydeder
public function resimlerguncelle()
{
$id =$this->input->post('id');

// resim işlemi başlangıç
$config['upload_path'] = FCPATH.'assets/front/img/resimler';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = false;
$this->load->library('upload',$config);
if ($this->upload->do_upload('resim')) {
  $resim =$this->upload->data();
  $resimyolu= $resim['file_name'];
  $resimkayit='assets/front/img/resimler/'.$resimyolu.'';
  $config['image_library'] ='gd2';
  $config['source_image'] = 'assets/front/img/resimler/'.$resimyolu.'';
  $config['new_image'] =     'assets/front/img/resimler/'.$resimyolu.'';
  $config['create_thumb'] = false;
  $config['maintain_ratio'] =false;
  $config['quality'] ='60%';
  $config['width'] =960;
  $config['height'] =600;
  $this->load->library('image_lib',$config);
  $this->image_lib->initialize($config);
  $this->image_lib->resize();
  $this->image_lib->clear();
$resimsil=resimlerresim($id);
unlink($resimsil);
//resim bitiş işlemleri
  $data = array('resim'=>$resimkayit);

  $sonuc =$this->dtbs->guncelle($data,$id,'id','tblresimler');
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>  BAŞARILI :) </h4>
                  Resimi  Listesine  başarılı bir şekilde Güncellediniz.
                  </div>');
    redirect('yonetim/resimler');
  }else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Resmi Güncellerken bir hata oluştu..
                  </div>');
    redirect('yonetim/resimler');
        }

}else {

$data = array('id'=>$id);
$sonuc =$this->dtbs->guncelle($data,$id,'id','tblresimler');
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                Resimler Listesini başarılı bir şekilde Güncellediniz.
                </div>');
  redirect('yonetim/resimler');
}else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                Resimler Güncelleme  işlemi başarısız..
                </div>');
  redirect('yonetim/resimler');
      }
}
}

public function resimlersil($id,$where,$from)
{
	$this->protect();
$resimsil=resimlerresim($id);
unlink($resimsil);

$sonuc = $this->dtbs->sil($id,$where,$from);
if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                    Seçtiğiniz Resim  Silindi :)
                </div>');
  redirect('yonetim/resimler');
}
else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Seçtiğiniz Resmi Silerken Bir Hata ile oluştu
                </div>');
  redirect('yonetim/resimler');
}}
/* resimler başlıkları bitiş -*/

    
public function dijitalArkeolog()
{	$this->protect();
	$sonuc =$this->dtbs->arkeologListele('arkeologlar');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/dijitalArkeolog/anasayfa',$data);
}



//Günün sözü durumunu toggle button yardımı ile aktif yada inaktif yapar

//Günün sözü guncelleme formunu yönlendirir.
public function dijitalArkeologduzenle($aId)
{
$this->protect();
$sonuc =$this->dtbs->arkeologCek($aId,'arkeologlar');
$data['bilgi'] = $sonuc;
$this->load->view('back/dijitalArkeolog/edit/anasayfa',$data);
}

// gunun sözü ve resim işlemlerini kaydeder
public function dijitalArkeologguncelle()
{

$this->protect();
$aName =$this->input->post('aName');
$aStatus =$this->input->post('aStatus');
$aEmail =$this->input->post('aEmail');
$aPhone =$this->input->post('aPhone');
$aId =$this->input->post('aId');


// resim işlemi başlangıç
$config['upload_path'] = FCPATH.'assets/front/img/arkeolog';
$config['allowed_types'] ='gif|jpg|jgep|png';
$config['encrypt_name'] = TRUE;
$this->load->library('upload',$config);
if ($this->upload->do_upload('aPhoto')) {
	$resim =$this->upload->data();
	$resimyolu= $resim['file_name'];
	$resimkayit='assets/front/img/arkeolog/'.$resimyolu.'';
	$config['image_library'] ='gd2';
	$config['source_image'] = 'assets/front/img/arkeolog/'.$resimyolu.'';
	$config['new_image'] =     'assets/front/img/arkeolog/'.$resimyolu.'';
	$config['create_thumb'] = false;
	$config['maintain_ratio'] =false;
	$config['quality'] ='60%';
	$config['width'] =160;
	$config['height'] =160;
	$this->load->library('image_lib',$config);
	$this->image_lib->initialize($config);
	$this->image_lib->resize();
	$this->image_lib->clear();
 $resimsil=arkeologresim($aId);
 unlink($resimsil);
//resim bitiş işlemleri
    
    $resimkayit=base_url('/').$resimkayit;

	$data = array('aPhoto'=>$resimkayit,'aName'=>$aName,
	'aStatus'=>$aStatus,'aEmail'=>$aEmail,'aPhone'=>$aPhone);

	$sonuc =$this->dtbs->guncelle($data,$aId,'aId','arkeologlar');
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
									Arkeolog Listesine  başarılı bir şekilde Güncellediniz.
									</div>');
		redirect('yonetim/dijitalArkeolog');
	}else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i> BAŞARISIZ !!!</h4>
								Arkeolog Listesini Baiaroşo bir şekilde güncellediniz..
									</div>');
		redirect('yonetim/dijitalArkeolog');
				}


}else {
$data = array('aName'=>$aName,'aPhone'=>$aPhone,
'aStatus'=>$aStatus,'aEmail'=>$aEmail);

$sonuc =$this->dtbs->guncelle($data,$aId,'aId','arkeologlar');
if ($sonuc) {
	$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i>BAŞARILI :)</h4>
								Arkeolog Listesini  başarılı bir şekilde Güncellediniz.
								</div>');
	redirect('yonetim/dijitalArkeolog');
}else {
	$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-ban"></i> BAŞARISIZ !!!</h4>
								Arkeolog Güncelleme işlemi başarısız..
								</div>');
	redirect('yonetim/dijitalArkeolog');
			}
}
}

// Günün Sözü ve resim  silme işlemini yapar.
public function dijitalArkeologsil($aId,$where,$from)
{


$this->protect();

$resimsil=arkeologresim($aId);

unlink($resimsil);

$sonuc = $this->dtbs->sil($aId,$where,$from);
if ($sonuc) {
	$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i> BAŞARILI :)</h4>
										Seçtiğiniz Arkeolog Silindi :)
								</div>');
	redirect('yonetim/dijitalArkeolog');
}
else {
	$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-ban"></i> BAŞARISIZ !!!</h4>
									Arkeoloğu Silerken Bir Hata oluştu .<b> TEKRAR DENEYİN!!</b>
								</div>');
	redirect('yonetim/dijitalArkeolog');
}}
/* Günün sözü bitiş -*/




// genelayar liste şeklinde görme işlemi
	public function dijitalYonetici()
	{$this->protect();
			$sonuc =$this->dtbs->yoneticilerListele('yoneticiler');
		$data['bilgi'] = $sonuc;
		$this->load->view('back/dijitalYonetici/anasayfa',$data);
	}


//genelayar guncelleme formunu yönlendirir.
public function dijitalYoneticiduzenle($yId)
{
	$this->protect();
	$sonuc =$this->dtbs->yoneticilerCek($yId,'yoneticiler');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/dijitalYonetici/edit/anasayfa',$data);
}

// genelayar ve resim işlemlerini kaydeder
public function dijitalYoneticiguncelle()
{
$this->protect();

	$yId =$this->input->post('yId');

	$yName =$this->input->post('yName');
	$yEmail =$this->input->post('yEmail');


// resim işlemi başlangıç
	$config['upload_path'] = FCPATH.'assets/front/img/yonetici';
	$config['allowed_types'] ='gif|jpg|jgep|png';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload',$config);
	if ($this->upload->do_upload('yFoto')) {
		$resim =$this->upload->data();
		$resimyolu= $resim['file_name'];
		$resimkayit='assets/front/img/yonetici/'.$resimyolu.'';
		$config['image_library'] ='gd2';
		$config['source_image'] = 'assets/front/img/yonetici/'.$resimyolu.'';
		$config['new_image'] =     'assets/front/img/yonetici/'.$resimyolu.'';
		$config['create_thumb'] = false;
		$config['maintain_ratio'] =false;
		$config['quality'] ='100%';
		$config['width'] =150;
		$config['height'] =150;
		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
$resimsil=yoneticiresim($yId);
unlink($resimsil);
//resim bitiş işlemleri

    $resimkayit=base_url('/').$resimkayit;


$data = array('yFoto'=>$resimkayit,'yName'=>$yName, 'yEmail'=>$yEmail
);

		$sonuc =$this->dtbs->guncelle($data,$yId,'yId','yoneticiler');
		if ($sonuc) {
			$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
										Yöneticiler Listesine  başarılı bir şekilde güncellediniz.
										</div>');
			redirect('yonetim/dijitalYonetici');
		}else {
			$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
										Yöneticiler Güncelleme işlemi başarısız..
										</div>');
			redirect('yonetim/dijitalYonetici');
					}


}else {
	$data = array('yName'=>$yName, 'yEmail'=>$yEmail
);

	$sonuc =$this->dtbs->guncelle($data,$yId,'yId','yoneticiler');
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
								Yöneticiler Listesine  başarılı bir şekilde güncellediniz.
									</div>');
		redirect('yonetim/dijitalYonetici');
	}else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
									Yöneticiler  Güncelleme işlemi başarısız..
									</div>');
		redirect('yonetim/dijitalYonetici');
				}
}
}

// gENEL aYAR ve resim  silme işlemini yapar.
public function dijitalYoneticisil($yId,$where,$from)
{

	$this->protect();
	$resimsil=yoneticiresim($yId);
	unlink($resimsil);

	$sonuc = $this->dtbs->sil($yId,$where,$from);
	if ($sonuc) {
		$this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
									  	Seçtiğiniz Yönetici  Silindi :)
									</div>');
		redirect('yonetim/dijitalYonetici');
	}
	else {
		$this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-ban"></i>Genel Ayar İŞLEMİ BAŞARISIZ!!!</h4>
										Seçtiğiniz Yöneticinin Ayarı  Silerken Bir Hata ile karşılaştı .<b> TEKRAR DENEYİN!!</b>
									</div>');
		redirect('yonetim/dijitalYonetici');
	}}
/* Genel AYAR  bitiş -*/

public function dijitalKazi()
{
	$this->protect();
	$sonuc =$this->dtbs->kazilarListele('kazilar');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/dijitalKazi/anasayfa',$data);
}

public function dijitalKaziset()
{
	$this->protect();
  $kId= $this->input->post('kId');
  $kDurum= ($this->input->post('kDurum')=="true")?1:0;
  $this->db->where('kId',$kId)->update('kazilar',array('kDurum'=>$kDurum));
}

public function dijitalKazisil($id,$where,$from)
{
	$this->protect();
  $sonuc = $this->dtbs->sil($id,$where,$from);
  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
                   Seçtiğiniz   Kazı  Başlığı Silindi
                  </div>');
    redirect('yonetim/dijitalKazi');
  }
  else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Seçtiğiniz Kazı Başlığının Silerken Bir Hata Oluştu .<b> TEKRAR DENEYİN!!!</b>
                  </div>');
    redirect('yonetim/dijitallKazi');
}}

public function dijitalKaziduzenle($id)
{
	$this->protect();
	$sonuc =$this->dtbs->kazilarCek($id,'kazilar');
	$data['bilgi'] = $sonuc;
	$this->load->view('back/dijitalKazi/edit/anasayfa',$data);
}

public function dijitalKaziguncelle()
{

	$data = array(
'kId' => $kId= $this->input->post('kId'),

'kAdi' => $kAdi= $this->input->post('kAdi'),
'kAdres' => $kAdres= $this->input->post('kAdres'),
'kBasTarih' => $kBasTarih= $this->input->post('kBasTarih'),
'kBitTarih' => $kBasTarih= $this->input->post('kBitTarih'),

'kDurum' => $kDurum= $this->input->post('kDurum')
  );

$sonuc =$this->dtbs->guncelle($data,$kId,'kId','kazilar');

if ($sonuc) {
  $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                Kazılar Listesini  başarılı bir şekilde Güncellediniz.
                </div>');
  redirect('yonetim/dijitalKazi');
}else {
  $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                Kazılar Güncelleme işlemi başarısız
                </div>');
  redirect('yonetim/dijitalKazi');
      }
}


 public function dijitalEser()
 {
$this->protect();
		 $sonuc =$this->dtbs->eserlerListele('eserler');
	 $data['bilgi'] = $sonuc;
	 $this->load->view('back/dijitalEser/anasayfa',$data);
 }

 public function dijitalEsersil($eId,$where,$from)
 {

 	$this->protect();
 $resimsil=eserresim($eId);
 $resimsil2=QRresim($eId);

 unlink($resimsil);
 unlink($resimsil2);

 $sonuc = $this->dtbs->sil($eId,$where,$from);
 if ($sonuc) {
   $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                     Seçtiğiniz Eser Silindi :)
                 </div>');
   redirect('yonetim/dijitalEser');
 }
 else {
   $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                   Eserinizi Silerken Bir Hata ile karşılaştı .<b> TEKRAR DENEYİN!!</b>
                 </div>');
   redirect('yonetim/dijitalEser');
 }}


 public function dijitalEserduzenle($id)
 {
 	$this->protect();
 	$sonuc =$this->dtbs->eserlerCek($id,'eserler');

 	$data['bilgi'] = $sonuc;
 	$this->load->view('back/dijitalEser/edit/anasayfa',$data);
 }

 public function dijitalEserguncelle()
 {
 	$this->protect();
   $data = array(
 'eId' => $eId= $this->input->post('eId'),
 'eEnvanter' => $eEnvanter= $this->input->post('eEnvanter'),
 'eBaslik' => $eBaslik= $this->input->post('eBaslik'),
 'eBilgi' => strip_tags($eBilgi= $this->input->post('eBilgi')),
 'eDurum' => $eDurum= $this->input->post('eDurum')   );

 $sonuc =$this->dtbs->guncelle($data,$eId,'eId','eserler');
 if ($sonuc) {
   $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <h4><i class="icon fa fa-check"></i>BAŞARILI :)</h4>
 Eser Başarılı Bir Şekilde Güncellendi  :) </div>');
   redirect('yonetim/dijitalEser');
 }
 else {
   $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <h4><i class="icon fa fa-check"></i> HATA !!!</h4>
   Seçtiğiniz Eseri Güncellerken Bir Hata Oluştu <b> TEKRAR DENEYİN !!!</b>
   </div>');
   redirect('yonetim/dijitalEser');}
 }

 public function dijitalQrKod($eId,$eRfid)
 {

	 $this->load->library('ciqrcode');

	 $params['data'] = $eRfid;
	 $params['level'] = 'H';
	 $params['size'] = 10;
	 $resimAdi='assets/front/img/eserlerQR/'.$eRfid.'.png';
	 $params['savename'] = FCPATH.$resimAdi;
	 $this->ciqrcode->generate($params);

	 $data = array('eQR'=>$resimAdi);

	 $sonuc =$this->dtbs->guncelle($data,$eId,'eId','eserler');
	 redirect('yonetim/dijitalEserduzenle/'.$eId.'');







 }





    // Projeler  Başlangıç
    public function onlineSertifika()
    {
        $this->protect();
        $sonuc =$this->dtbs->listele('tblOnlineSertifika');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/onlineSertifika/anasayfa',$data);
    }

// Projeler ekleme formunu yönlendirir
    public function onlineSertifikaekle()
    {$this->protect();
        $this->load->view('back/onlineSertifika/ekle/anasayfa');
    }



    public function onlineSertifikaekleme()
    {
        $this->protect();
        echo $this->input->post('tarih');
        $data = array(
            'adSoyad' => $adSoyad = $this->input->post('adSoyad'),
            'eAdiSoyadi' => $eAdiSoyadi = $this->input->post('eAdiSoyadi'),

            'tarih' => $tarih = $this->input->post('tarih'),

            'kursAdi' => $kursAdi = $this->input->post('kursAdi')

        );
        $sonuc = $this->dtbs->ekle('tblOnlineSertifika',$data);
        if ($sonuc) {
            $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> BAŞARILI :) </h4>
                Online Sertika   başarılı bir  şekilde eklendi :)
                </div>');
            redirect('yonetim/onlineSertifika');
        }
        else {
            $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Head Menü Listesine Eklerken Sorun Oluştu. <b>TEKRAR DENEYİN!!</b>
                </div>');
            redirect('yonetim/onlineSertifika');
        }
    }
    public function onlineSertifikasil($id,$where,$from)
    {
        $this->protect();
        $sonuc = $this->dtbs->sil($id,$where,$from);
        if ($sonuc) {
            $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>BAŞARILI :) </h4>
                   Seçtiğiniz  Setifika Silindi
                  </div>');
            redirect('yonetim/onlineSertifika');
        }
        else {
            $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>HATA !!!</h4>
                  Seçtiğiniz  Setifikayı Bir Hata Oluştu .<b> TEKRAR DENEYİN!!!</b>
                  </div>');
            redirect('yonetim/onlineSertifika');
        }}




}// son parantez


