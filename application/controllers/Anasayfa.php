<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends CI_Controller
{

    // url yönlendirme işlemleri başlangıç
    function index()    { $this->load->view('anasayfa'); }

    function hakkimda() { $this->load->view('front/hakkimda/anasayfa'); }

    function notfound() { $this->load->view('front/404/anasayfa'); }
    // url yönlendirme işlemleri bitiş


    //Kullancııların mesajlarını post etme başlangıç
    function iletisim()
    {
        $data = array(
            'adsoyad' => $headAdi = $this->input->post('adsoyad'),
            'mail' => $mail = $this->input->post('mail'),
            'konu' => $konu = $this->input->post('konu'),
            'mesaj' => $mesaj = $this->input->post('mesaj'),
            'ip' => $ip = $this->input->post('ip'),
            'durum' => 0
        );

        $sonuc = $this->dtbs->ekle('tbliletisim', $data);

        if ($sonuc) {

            $this->durum("Başarılı :)", "Mesajınız alınmıştır.", 1);
            redirect($this->load->view('anasayfa') . "/#iletisim");

        } else {

            $this->durum(" Hata !!!", "Mesaj Gönderilirken Bir Hata Oluştu.", 0);
            redirect($this->load->view('anasayfa') . "/#iletisim");
        }
    }
    //Kullancııların mesajlarını post etme bitiş

    // Proje işlemleri başlangıç
    function projeler()
    {
        $data = $this->sayfalama(projecek(), "projecek", 'anasayfa/projeler', 5, 3, 0);
        $this->load->view('front/projeler/anasayfa', $data);
    }

    function projedetay($seobaslik)
    {
        $sonuc = $this->dtbs->projemdetay($seobaslik);
        $data['bilgi'] = $sonuc;
        $this->load->view('front/projeler/detay/anasayfa', $data);
    }
    //Proje işlemleri bitiş


    // Yazı işlemleri başlangıç
    function yazilar()
    {
        $data = $this->sayfalama(projecek(), "yazicek", 'anasayfa/yazilar', 5, 3, 0);
        $this->load->view('front/yazilar/anasayfa', $data);
    }

    function yazidetay($seobaslik)
    {
        $sonuc = $this->dtbs->yazilarimdetay($seobaslik);
        $data['bilgi'] = $sonuc;
        $this->load->view('front/yazilar/detay/anasayfa', $data);
    }
    //Yazı işlemleri bitiş


    //Arama işlemleri başlangıç
    function aramalar()
    {
        $term = $this->input->get('search');
        $term = seflink($term);
        $gelen = arama($term);
        $data['bilgi'] = $gelen;
        $this->load->view('front/arama/anasayfa', $data);
    }

    function aramadetay($seobaslik)
    {
        $sonuc = $this->dtbs->aramalarimdetay($seobaslik);
        $data['bilgi'] = $sonuc;
        $this->load->view('front/arama/detay/anasayfa', $data);
    }
    //Arama işlemleri bitiş


    // Fereli işlemleri başlangıç
    function fereli()
    {
        $data = $this->sayfalama(ferelicek(), "ferelicek", 'anasayfa/fereli', 5, 3, 0);
        $this->load->view('front/fereli/anasayfa', $data);
    }

    function ferelidetay($seobaslik)
    {
        $sonuc = $this->dtbs->ferelimdetay($seobaslik);
        $data['bilgi'] = $sonuc;
        $this->load->view('front/fereli/detay/anasayfa', $data);
    }

    function istekgonder()
    {
        $data = array(
            'adSoyad' => $adsoyad = $this->input->post('adsoyad'),
            'mail' => $mail = $this->input->post('mail'),
            'odaNumara' => $odaNumara = $this->input->post('odaNumara'),
            'tur' => $tur = $this->input->post('tur'),
            'durum' => 0,
            'istek' => $mesaj = $this->input->post('mesaj')
        );


        $sonuc = $this->dtbs->ekle('tblistekler', $data);

        if ($sonuc) {
            $this->durum("Başarılı :)","Talep & Şikayetiniz Alınmıştır.",1);
            redirect(base_url('anasayfa/fereli/anasayfa/#iletisim'));

        } else{
            $this->durum("Hata !!!","Talep & Şikayet Gönderilirken bir hata oluştu. ",0);
            redirect(base_url('anasayfa/fereli/anasayfa/#iletisim'));
        }

    }
    //Fereli işlemleri Bitiş


    //karşı tarafa işlemin başarılı mı başarısız mı olduğunu döndüreceğimiz durum
    function durum($gonderimBaslik, $gonderimIcerik, $durum)
    {
        if ($durum == 1) {
            $this->session->set_flashdata('durum', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>' . $gonderimBaslik . ' </h4>' .
                $gonderimIcerik .
                '</div>');
        } else {
            $this->session->set_flashdata('durum', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i>' . $gonderimBaslik . ' </h4>' .
                $gonderimIcerik .
                '</div>');
        }
    }

    function sayfalama($veriFonksiyon, $veri, $url, $listelemeSayisi, $segmentUrlBitis, $segmentUrlBaslangic)
    {
        //$veriFonksiyon: sayfalanacak verileri çeker metod tool_helperden çeker
        // veri : Dtbs 'Den modeli çeker
        //$url : sayfalanacak url
        // $listelemeSayisi : Lisetenecek veri sayısı
        //$segmentUrlBitis: URL kaçıncı slaştan sonra listelenme yazılsım
        // $segmentUrlBaslangic: URL kaçıncı slaştan sayılmaya başlansın

        $proje = $veriFonksiyon; // sayfalanacak verileri çeker metod tool_helperden çeker

        $this->load->library('pagination');
        $config['base_url'] = base_url() . $url;
        $config['total_rows'] = $proje;
        $config['per_page'] = $listelemeSayisi;
        $config['full_tag_open'] = '<ul  class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_link'] = '&raquo';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['next_link'] = 'Sonraki';
        $config['next_tag_open'] = '<span class="page-link"> <li class="page-item">';
        $config['next_tag_close'] = '</li></span>';
        $config['prev_link'] = 'Önceki';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<a style="background:#0078ff;color: #ffffff"  class="page-link"><li  class="page-item active">';
        $config['cur_tag_close'] = '</li></a>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $data['linkler'] = $this->pagination->create_links();
        $data['bilgi'] = $this->dtbs->$veri($config['per_page'], $this->uri->segment($segmentUrlBitis, $segmentUrlBaslangic));

        return $data;

    }
}