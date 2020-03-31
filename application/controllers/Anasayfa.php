<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends CI_Controller {


  function index()
   {

       $this->load->view('anasayfa');
   }

   function iletisim()
    {
      $data = array(
    'adsoyad' => $headAdi = $this->input->post('adsoyad'),
    'mail' => $mail = $this->input->post('mail'),
    'konu' => $konu = $this->input->post('konu'),
    'mesaj' => $mesaj= $this->input->post('mesaj'),
    'durum' => 0,
    'ip' => $ip = $this->input->post('ip')

  );

  $sonuc = $this->dtbs->ekle('tbliletisim',$data);

  if ($sonuc) {
    $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>Mesaj Gönderimi Başarılı :) </h4>
                  Mesaj  başarılı bir  şekilde eklendi :)
                  </div>');

      redirect($this->load->view('anasayfa')."/#iletisim");  }
  else {
    $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>Mesajınız Gönderme Başarısız !!!</h4>
                    Mesajınız Gönderilirken bir hata oluştu. <b>TEKRAR DENEYİN!!</b>
                  </div>');
      redirect($this->load->view('anasayfa')."/#iletisim");  }

    }

    function projeler()
     {

       $proje=projecek();

               $this->load->library('pagination');
               $config['base_url']=base_url().'anasayfa/projeler';
               $config['total_rows']=$proje;
               $config['per_page']=5;

               $config['full_tag_open']='<ul class="pagination">';
               $config['full_tag_close']='</ul>';
               $config['first_link']='&laquo';
               $config['first_tag_open']='<li class="page-item"><span class="page-link">';
               $config['first_tag_close']='</span></li>';
               $config['last_link']='&raquo';
               $config['last_tag_open']='<li class="page-item"><span class="page-link">';
               $config['last_tag_close']='</span></li>';
               $config['next_link']='Next';


               $config['next_tag_open']= '<span class="page-link"> <li class="page-item">';
               $config['next_tag_close']='</li></span>';
               $config['prev_link']='Previous';
               $config['prev_tag_open']='<li class="page-item"><span class="page-link">';
               $config['prev_tag_close']='</span></li>';


               $config['cur_tag_open']='<a class="page-link"><li class="page-item active">';
               $config['cur_tag_close']='</li></a>';
               $config['num_tag_open']='<li class="page-item"><span class="page-link">';
               $config['num_tag_close']='</span></li>';
               $this->pagination->initialize($config);
               $data['linkler']=$this->pagination->create_links();


               	$data['bilgi'] =$this->dtbs->projecek($config['per_page'],$this->uri->segment(3,0));


               $this->load->view('front/projeler/anasayfa',$data);
     }


    function yazilar()
     {

       $yazi=yazicek();

               $this->load->library('pagination');
               $config['base_url']=base_url().'anasayfa/yazilar';
               $config['total_rows']=$yazi;
               $config['per_page']=5;

               $config['full_tag_open']='<ul class="pagination">';
               $config['full_tag_close']='</ul>';
               $config['first_link']='&laquo';
               $config['first_tag_open']='<li class="page-item"><span class="page-link">';
               $config['first_tag_close']='</span></li>';
               $config['last_link']='&raquo';
               $config['last_tag_open']='<li class="page-item"><span class="page-link">';
               $config['last_tag_close']='</span></li>';
               $config['next_link']='Next';
               $config['next_tag_open']= '<li class="page-item"><span class="page-link"> ';
               $config['next_tag_close']='</span></li>';
               $config['prev_link']='Previous';
               $config['prev_tag_open']='<li class="page-item"><span class="page-link">';
               $config['prev_tag_close']='</span></li>';
               $config['cur_tag_open']='<li class="page-item active"><a class="page-link">';
               $config['cur_tag_close']='</a></li>';
               $config['num_tag_open']='<li class="page-item"><span class="page-link">';
               $config['num_tag_close']='</span></li>';
               $this->pagination->initialize($config);
               $data['linkler']=$this->pagination->create_links();
               	$data['bilgi'] =$this->dtbs->yazicek($config['per_page'],$this->uri->segment(3,0));
               $this->load->view('front/yazilar/anasayfa',$data);
     }




     function aramalar()
      {
        $term=$this->input->get('search');
        $term=seflink($term);
        $gelen=arama($term);
        	$data['bilgi'] = $gelen;
          $this->load->view('front/arama/anasayfa',$data);
      }
      function projedetay($seobaslik)
      {
        $sonuc=$this->dtbs->projemdetay($seobaslik);

        $data['bilgi']=$sonuc;
        $this->load->view('front/projeler/detay/anasayfa',$data);
      }

      function hakkimda()
      {

        $this->load->view('front/hakkimda/anasayfa');
      }

      function notfound()
      {

        $this->load->view('front/404/anasayfa');
      }

      function yazidetay($seobaslik)
      {

        $sonuc=$this->dtbs-> yazilarimdetay($seobaslik);

        $data['bilgi']=$sonuc;
        $this->load->view('front/yazilar/detay/anasayfa',$data);
      }

      function aramadetay($seobaslik)
      {
        $sonuc=$this->dtbs->aramalarimdetay($seobaslik);
        $data['bilgi']=$sonuc;
        $this->load->view('front/arama/detay/anasayfa',$data);
      }


    function fereli()
    {

        $fereli=ferelicek();

        $this->load->library('pagination');
        $config['base_url']=base_url().'anasayfa/fereli';
        $config['total_rows']=$fereli;
        $config['per_page']=7;

        $config['full_tag_open']='<ul class="pagination">';
        $config['full_tag_close']='</ul>';
        $config['first_link']='&laquo';
        $config['first_tag_open']='<li class="page-item"><span class="page-link">';
        $config['first_tag_close']='</span></li>';
        $config['last_link']='&raquo';
        $config['last_tag_open']='<li class="page-item"><span class="page-link">';
        $config['last_tag_close']='</span></li>';
        $config['next_link']='Next';


        $config['next_tag_open']= '<span class="page-link"> <li class="page-item">';
        $config['next_tag_close']='</li></span>';
        $config['prev_link']='Previous';
        $config['prev_tag_open']='<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']='</span></li>';


        $config['cur_tag_open']='<a class="page-link"><li class="page-item active">';
        $config['cur_tag_close']='</li></a>';
        $config['num_tag_open']='<li class="page-item"><span class="page-link">';
        $config['num_tag_close']='</span></li>';
        $this->pagination->initialize($config);
        $data['linkler']=$this->pagination->create_links();


        $data['bilgi'] =$this->dtbs->ferelicek($config['per_page'],$this->uri->segment(3,0));


        $this->load->view('front/fereli/anasayfa',$data);
    }

    function ferelidetay($seobaslik)
    {

        $sonuc=$this->dtbs-> ferelimdetay($seobaslik);

        $data['bilgi']=$sonuc;
        $this->load->view('front/fereli/detay/anasayfa',$data);
    }


    function istekgonder()
    {
        $data = array(
            'adSoyad' => $adsoyad = $this->input->post('adsoyad'),
            'mail' => $mail = $this->input->post('mail'),
            'odaNumara' => $odaNumara = $this->input->post('odaNumara'),
            'tur' => $tur= $this->input->post('tur'),
            'durum' => 2,
            'istek' => $mesaj = $this->input->post('mesaj')
        );



        $sonuc = $this->dtbs->ekle('tblistekler',$data);

        if ($sonuc) {
            $this->session->set_flashdata('durum','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>Talep & Şikayetiniz Alınmıştır :) </h4>
                  Mesaj  başarılı bir  şekilde eklendi :)
                  </div>');
        redirect(base_url('anasayfa/fereli/anasayfa/#iletisim'));         }
        else {
            $this->session->set_flashdata('durum','<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>Talep & Şikayet Gönderimi Başarısız !!!</h4>
                    Talep & Şikayet Gönderilirken bir hata oluştu. <b>TEKRAR DENEYİN!!</b>
                  </div>');
            redirect(base_url('anasayfa/fereli/anasayfa/#iletisim'));
        }

    }


}
