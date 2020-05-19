<?php


class Yonetim extends CI_Controller
{

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
        $giris = $this->session->userdata('giris'); // eğer giriş yapmadan yapmaya çalışılırsa

        if ($giris) {
            redirect('yonetim/anasayfa');
        }

        $this->load->view('back/giris');
    }

    //şifre ve mail bilgilerinin kontrolünü sağlar
    public function girisyap()
    {

        $email = strip_tags($this->input->post('email'));
        $sifre = $this->input->post('sifre');
        $sifre = strip_tags($sifre);

        $kontrol = $this->dtbs->kontrol($email, $sifre);

        if ($kontrol) {
            $this->session->set_userdata('giris', true);
            redirect('yonetim/anasayfa');

        } else {
            $this->durum("Uyarı !", "Şifre veya mail bilgileri hatalı girilmiştir.", 0);
            redirect('yonetim');
        }
    }

    // anasayfaya yönlendirme işlemi yapar
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

    //Şifre işlemleri başlangıç
    public function sifre()
    {
        $this->protect();
        $this->load->view('back/sifre/anasayfa');
    }

    function sifreguncelle()
    {
        $email = $this->input->post('email');
        $sifre = $this->input->post('sifre');
        $id = $this->input->post('id');
        $sifre1 = $this->input->post('sifre1');
        $sifre2 = $this->input->post('sifre2');
        $sonuc = $this->dtbs->listele('tblyoneticiler');
        $tsifre = "";
        $tmail = "";

        foreach ($sonuc as $sonuc) {
            $tmail = $sonuc['email'];
            $tsifre = $sonuc['sifre'];
        }

        $sifre = sha1(md5($sifre));
        $sifre1 = sha1(md5($sifre1));
        $sifre2 = sha1(md5($sifre2));

        if ($sifre == $tsifre && $email == $tmail) {
            if ($sifre1 == $sifre2) {
                if (strlen($sifre1) > 6) {
                    $data = array(
                        'id' => $id = $this->input->post('id'),
                        'sifre' => $sifre1
                    );

                    $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblyoneticiler');

                    if ($sonuc) {
                        $this->durum("Başarılı :)", "Şifreniz başarılı bir şekilde güncellendi", 1);
                        redirect('yonetim/sifre');
                    }
                } else {
                    $this->durum("Hata!!!", "Şifreniz en az 6 karakter olmalıdır", 0);
                    redirect('yonetim/sifre');
                }
            } else {
                $this->durum("Hata!!!", "Şifrelerin aynı olduğundan emin olunuz", 0);
                redirect('yonetim/sifre');
            }
        } else {
            $this->durum("Hata!!!", "Şifre ile maili doğru girdiğinden emin olunuz.", 0);
            redirect('yonetim/sifre');
        }
    }
    //Şifre işlemleri bitiş


    // Headmenü işlemleri başlangıç
    public function headMenu()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblheadmenu');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/headMenuler/anasayfa', $data);
    }

    public function headMenuekle()
    {
        $this->protect();
        $this->load->view('back/headMenuler/ekle/anasayfa');
    }

    public function headMenuekleme()
    {
        $this->protect();
        $data = array(
            'headAdi' => $headAdi = $this->input->post('headAdi'),
            'durum' => $this->input->post('durum'),
            'headSeoAd' => seflink($headAdi)
        );

        $sonuc = $this->dtbs->ekle('tblHeadmenu', $data);

        if ($sonuc) {
            $this->durum("Başarılı :)", "Headmenüsüne başarılı bir şekilde eklendi", 1);
            redirect('yonetim/headMenu');

        } else {
            $this->durum("Hata!!!", "Headmenüsüne eklerken bir hata oluştu", 0);
            redirect('yonetim/headMenu');

        }
    }

    public function headset()
    {
        $this->protect();
        $id = $this->input->post('id');
        $durum = ($this->input->post('durum') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('tblheadmenu', array('durum' => $durum));
    }

    public function headMenuduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblheadmenu');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/headMenuler/edit/anasayfa', $data);
    }

    public function headguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');

        $data = array(
            'headAdi' => $headAdi = $this->input->post('headAdi'),
            'headSeoAd' => seflink($headAdi),
            'durum' => $this->input->post('durum')
        );

        $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblheadmenu');
        if ($sonuc) {
            $this->durum("Başarılı :)", "Head menüsü güncelleme işlemi tamamlandı", 1);
            redirect('yonetim/headMenu');
        } else {
            $this->durum("Hata!!!", "Head menüsü güncellereken hata oluştu", 0);
            redirect('yonetim/headMenu');
        }
    }

    public function headMenusil($id, $where, $from)
    {
        $this->protect();
        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {
            $this->durum("Başarılı :)", "Seçtiğiniz head menü silindi.", 1);
            redirect('yonetim/headMenu');
        } else {
            $this->durum("Hata!!!", "Head menü silinirken bir hata oluştu", 0);
            redirect('yonetim/headMenu');
        }
    }
    //Headmenü işlemleri bitiş


    //Kategori işlemleri başlangıç
    public function kategoriler()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblkategoriler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/kategoriler/anasayfa', $data);
    }

    public function kategorilerekle()
    {
        $this->protect();
        $this->load->view('back/kategoriler/ekle/anasayfa');
    }

    public function kategorilerekleme()
    {
        $this->protect();
        $data = array(
            'ad' => $ad = $this->input->post('ad'),
            'seoAd' => seflink($ad)
        );

        $sonuc = $this->dtbs->ekle('tblkategoriler', $data);

        if ($sonuc) {
            $this->durum("Başarılı :)", "Kategori başarılı bir şekilde eklendi", 1);
            redirect('yonetim/kategoriler');
        } else {
            $this->durum("Hata!!!", "Kategori eklenirken bir hata oluştu", 0);
            redirect('yonetim/kategoriler');
        }
    }

    public function kategorilerduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblkategoriler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/kategoriler/edit/anasayfa', $data);
    }

    public function kategorilerguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');

        $data = array(
            'ad' => $ad = $this->input->post('ad'),
            'seoAd' => seflink($ad)
        );

        $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblkategoriler');

        if ($sonuc) {
            $this->durum("Başarılı :)", "Kategori başarılı bir şekilde güncellendi", 1);
            redirect('yonetim/kategoriler');
        } else {
            $this->durum("Hata!!!", "Kategori güncellenirken bir hata oluştu", 0);
            redirect('yonetim/kategoriler');
        }
    }

    public function kategorilersil($id, $where, $from)
    {
        $this->protect();
        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {
            $this->durum("Başarılı :)", "Seçtiğiniz kategori silindi", 1);
            redirect('yonetim/kategoriler');
        } else {
            $this->durum("Hata!!!", "Seçtiğiniz kategori silinirken bir hata oluştu", 0);
            redirect('yonetim/kategoriler');
        }
    }
    //Kategori işlemleri bitiş


    // Günün sözü işlemleri başlangıç
    public function gununsozu()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblgununsozu');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/gununsozu/anasayfa', $data);
    }

    public function gununsozuekle()
    {
        $this->protect();
        $this->load->view('back/gununsozu/ekle/anasayfa');
    }

    public function gununsozuekleme()
    {
        $this->protect();
        $gununsozu = $this->input->post('gununsozu');
        $seogununsozu = seflink($gununsozu);
        $seogununsozu = rtrim($seogununsozu, "-p");
        $seogununsozu = ltrim($seogununsozu, "p-");
        $seogununsozu = seflink($seogununsozu);

        $resimkayit = $this->imageUpload('assets/front/img/gununsozu/', 'resim', 160, 160);

        if ($resimkayit != '0') {
            $data = array('resim' => $resimkayit,
                'adsoyad' => $this->input->post('adsoyad'),
                'durum' => $this->input->post('durum'),
                'seogununsozu' => $seogununsozu,
                'gununsozu' => $gununsozu
            );

            $sonuc = $this->dtbs->ekle('tblgununsozu', $data);

            if ($sonuc) {
                $this->durum("Başarılı :)", "Günün sözü başarılı bir şekilde eklendi", 1);
                redirect('yonetim/gununsozu');

            } else {
                $this->durum("Hata!!!", "Günün sözü eklenirken bir hata oluştu", 0);
                redirect('yonetim/gununsozu');

            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/gununsozu');
        }
    }

    public function gununsozuset()
    {
        $this->protect();
        $id = $this->input->post('id');
        $durum = ($this->input->post('durum') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('tblgununsozu', array('durum' => $durum));
    }

    public function gununsozuduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblgununsozu');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/gununsozu/edit/anasayfa', $data);
    }

    public function gununsozuguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');
        $gununsozu = $this->input->post('gununsozu');
        $seogununsozu = seflink($gununsozu);
        $seogununsozu = rtrim($seogununsozu, "-p");
        $seogununsozu = ltrim($seogununsozu, "p-");
        $seogununsozu = seflink($seogununsozu);

        $resimkayit = $this->imageUpload('assets/front/img/gununsozu/', 'resim', 160, 160);

        if ($resimkayit != '0') {
            $data = array('resim' => $resimkayit,
                'adsoyad' => $this->input->post('adsoyad'),
                'durum' => $this->input->post('durum'),
                'seogununsozu' => $seogununsozu,
                'gununsozu' => $gununsozu
            );

            $resimsil = gununsozuresim($id);
            unlink($resimsil);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblgununsozu');

            if ($sonuc) {
                $this->durum("Başarılı :)", "Günün sözü başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/gununsozu');

            } else {
                $this->durum("Hata!!!", "Günün sözü güncellenirken bir hata oluştu", 0);
                redirect('yonetim/gununsozu');

            }
        } else {
            $data = array('adsoyad' => $adsoyad = $this->input->post('adsoyad'),
                'durum' => $durum = $this->input->post('durum'),
                'seogununsozu' => $seogununsozu,
                'gununsozu' => $gununsozu
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblgununsozu');

            if ($sonuc) {
                $this->durum("Başarılı :)", "Günün sözü başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/gununsozu');

            } else {
                $this->durum("Hata!!!", "Günün sözü güncellenirken bir hata oluştu", 0);
                redirect('yonetim/gununsozu');

            }
        }
    }

    public function gununsozusil($id, $where, $from)
    {
        $this->protect();
        $resimsil = gununsozuresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {
            $this->durum("Başarılı :)", "Günün sözü başarılı bir şekilde silindi", 1);
            redirect('yonetim/gununsozu');

        } else {
            $this->durum("Hata!!!", "Günün sözü silinirken bir hata oluştu", 0);
            redirect('yonetim/gununsozu');

        }
    }
    // Günün sözü işlemleri bitiş


    // Sosyal medya hesap işlemleri başlangıç
    public function smedya()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblsmedya');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/smedya/anasayfa', $data);
    }

    public function smedyaekle()
    {
        $this->protect();
        $this->load->view('back/smedya/ekle/anasayfa');
    }

    public function smedyaekleme()
    {
        $this->protect();

        $data = array(
            'ad' => $ad = $this->input->post('ad'),
            'url' => $url = $this->input->post('url'),
            'seoAd' => seflink($ad)
        );

        $sonuc = $this->dtbs->ekle('tblsmedya', $data);

        if ($sonuc) {
            $this->durum("Başarılı :)", "Sosyal medya hesabınız listeye eklendi", 1);
            redirect('yonetim/smedya');

        } else {
            $this->durum("Hata !!!", "Sosyal medya hesabınız listeye eklenirken hata oluştu", 0);
            redirect('yonetim/smedya');
        }
    }

    public function smedyaduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblsmedya');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/smedya/edit/anasayfa', $data);
    }

    public function smedyaguncelle()
    {
        $this->protect();
        $data = array(
            'id' => $id = $this->input->post('id'),
            'url' => $url = $this->input->post('url'),
            'ad' => $ad = $this->input->post('ad'),
            'seoAd' => seflink($ad)
        );

        $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblsmedya');

        if ($sonuc) {
            $this->durum("Başarılı :)", "Sosyal medya hesabınız güncellendi", 1);
            redirect('yonetim/smedya');

        } else {
            $this->durum("Hata!!!", "Sosyal medya hesabınız güncellenirken hata oluştu", 0);
            redirect('yonetim/smedya');

        }
    }

    public function smedyasil($id, $where, $from)
    {
        $this->protect();
        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {
            $this->durum("Balarılı :)", "Sosyal medya hesabınız silindi", 1);
            redirect('yonetim/smedya');
        } else {
            $this->durum("Hata !!!", "Sosyal medya hesabınız silinirken bir hata oluştu", 0);
            redirect('yonetim/smedya');
        }
    }
    // Sosyal medya hesap işlemleri bitiş


    // ozellikler işlemi başlangıç
    public function ozellikler()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblozellikler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/ozellikler/anasayfa', $data);
    }

    public function ozelliklerekle()
    {
        $this->protect();
        $this->load->view('back/ozellikler/ekle/anasayfa');
    }

    public function ozelliklerekleme()
    {
        $this->protect();
        $ozellik = $this->input->post('ozellik');
        $seo = seflink($ozellik);

        $resimkayit = $this->imageUpload('assets/front/img/ozellik/', 'resim', 160, 160);
        if ($resimkayit != '0') {
            $data = array(
                'ozellik' => $ozellik,
                'resim' => $resimkayit,
                'puan' => $puan = $this->input->post('puan'),
                'seoOzellik' => $seo
            );

            $sonuc = $this->dtbs->ekle('tblozellikler', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Özellik başarılı bir şekilde eklendi", 1);
                redirect('yonetim/ozellikler');
            } else {

                $this->durum("Hata!!!", "Özellik eklenirken bir hata oluştu", 0);
                redirect('yonetim/ozellikler');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/ozellikler');
        }
    }

    public function ozelliklerduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblozellikler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/ozellikler/edit/anasayfa', $data);
    }

    public function ozelliklerguncelle()
    {
        $this->protect();

        $id = $this->input->post('id');
        $ozellik = $this->input->post('ozellik');
        $seoOzellik = seflink($ozellik);

        $resimkayit = $this->imageUpload('assets/front/img/ozellik/', 'resim', 160, 160);

        if ($resimkayit != '0') {
            $data = array('resim' => $resimkayit,
                'ozellik' => $ozellik,
                'seoOzellik' => $seoOzellik,
                'puan' => $puan = $this->input->post('puan')
            );

            $resimsil = ozellikresim($id);
            unlink($resimsil);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblozellikler');

            if ($sonuc) {
                $this->durum("Başarılı :)", "Özellik başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/ozellikler');

            } else {
                $this->durum("Hata!!!", "Özellik güncellenirken bir hata oluştu", 0);
                redirect('yonetim/ozellikler');

            }
        } else {
            $data = array('ozellik' => $ozellik,
                'seoOzellik' => $seoOzellik,
                'puan' => $puan = $this->input->post('puan')
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblozellikler');

            if ($sonuc) {
                $this->durum("Başarılı :)", "Özellik başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/ozellikler');

            } else {
                $this->durum("Hata!!!", "Özellik güncellenirken bir hata oluştu", 0);
                redirect('yonetim/ozellikler');

            }
        }
    }

    public function ozelliklersil($id, $where, $from)
    {
        $this->protect();
        $resimsil = ozellikresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);

        if ($sonuc) {
            $this->durum("Başarılı :)", "Özellik başarılı bir silindi", 1);
            redirect('yonetim/ozellikler');

        } else {
            $this->durum("Hata!!!", "Özellik silinirken bir hata oluştu", 0);
            redirect('yonetim/ozellikler');

        }
    }
    //Özellik işlemleri bitiş


    // Admin işlemleri başlangıç
    public function admin()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tbladmin');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/admin/anasayfa', $data);
    }

    public function adminekle()
    {
        $this->protect();
        $this->load->view('back/admin/ekle/anasayfa');
    }

    public function adminekleme()
    {
        $this->protect();

        $resimkayit = $this->imageUpload('assets/front/img/admin/', 'resim', 400, 400);

        if ($resimkayit != '0') {
            $data = array('resim' => $resimkayit,
                'adsoyad' => $adsoyad = $this->input->post('adsoyad'),
                'ozellik' => $ozellik = $this->input->post('ozellik'),
                'site_url' => $site_url = $this->input->post('site_url'),
                'site_adi' => $site_adi = $this->input->post('site_adi'),
                'version' => $version = $this->input->post('version')
            );

            $sonuc = $this->dtbs->ekle('tbladmin', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Yönetici ayarı başarılı bir şekilde eklendi", 1);
                redirect('yonetim/admin');
            } else {

                $this->durum("Hata!!!", "Yönetici ayarı eklenirken bir hata oluştu", 0);
                redirect('yonetim/admin');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/admin');
        }
    }

    public function adminduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tbladmin');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/admin/edit/anasayfa', $data);
    }

    public function adminguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');
        $resimkayit = $this->imageUpload('assets/front/img/admin/', 'resim', 400, 400);

        if ($resimkayit != '0') {
            $data = array('resim' => $resimkayit,
                'adsoyad' => $adsoyad = $this->input->post('adsoyad'),
                'ozellik' => $ozellik = $this->input->post('ozellik'),
                'site_url' => $site_url = $this->input->post('site_url'),
                'site_adi' => $site_adi = $this->input->post('site_adi'),
                'version' => $version = $this->input->post('version')
            );

            $resimsil = adminresim($id);
            unlink($resimsil);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tbladmin');

            if ($sonuc) {
                $this->durum("Başarılı :)", "Yönetici ayarı başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/admin');

            } else {
                $this->durum("Hata!!!", "Yönetici ayarı güncellenirken bir hata oluştu", 0);
                redirect('yonetim/admin');

            }
        } else {
            $data = array('adsoyad' => $adsoyad = $this->input->post('adsoyad'),
                'ozellik' => $ozellik = $this->input->post('ozellik'),
                'site_url' => $site_url = $this->input->post('site_url'),
                'site_adi' => $site_adi = $this->input->post('site_adi'),
                'version' => $version = $this->input->post('version')
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tbladmin');

            if ($sonuc) {
                $this->durum("Başarılı :)", "Yönetici ayarı başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/admin');

            } else {
                $this->durum("Hata!!!", "Yönetici ayarı güncellenirken bir hata oluştu", 0);
                redirect('yonetim/admin');

            }
        }
    }

    public function adminsil($id, $where, $from)
    {
        $this->protect();
        $resimsil = adminresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);

        if ($sonuc) {
            $this->durum("Başarılı :)", "Yönetici ayarı başarılı bir şekilde silindi", 1);
            redirect('yonetim/admin');

        } else {
            $this->durum("Hata!!!", "Yönetici ayarı silinirken bir hata oluştu", 0);
            redirect('yonetim/admin');

        }
    }
    //Admin işlemleri bitiş


    // Site Ayar işlemleri başlangıç
    public function site()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblsite');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/site/anasayfa', $data);
    }

    public function siteekle()
    {
        $this->protect();
        $this->load->view('back/site/ekle/anasayfa');
    }

    public function siteekleme()
    {
        $this->protect();
        $hakkimda = $this->input->post('hakkimda');

        $resimkayit = $this->imageUpload('assets/front/img/site/', 'resim', 500, 500);

        if ($resimkayit != '0') {

            $data = array('resim' => $resimkayit,
                'adsoyad' => $adsoyad = $this->input->post('adsoyad'),
                'baslik' => $baslik = $this->input->post('baslik'),
                'seoHakkimda' => $seohakkimda = seflink($hakkimda),
                'ozellik' => $ozellik = $this->input->post('ozellik'),
                'mail' => $mail = $this->input->post('mail'),
                'telefon' => $telefon = $this->input->post('telefon'),
                'hakkimda' => $hakkimda,
                'adres' => $adres = $this->input->post('adres'),
                'footerAd' => $footerAd = $this->input->post('footerAd'),
                'footerLink' => $footerLink = $this->input->post('footerLink'),
                'durum' => $durum = $this->input->post('durum')
            );

            $sonuc = $this->dtbs->ekle('tblsite', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Site ayarı başarılı bir şekilde eklendi", 1);
                redirect('yonetim/site');
            } else {

                $this->durum("Hata!!!", "Site ayarı eklenirken bir hata oluştu", 0);
                redirect('yonetim/site');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/site');
        }
    }

    public function siteset()
    {
        $this->protect();
        $id = $this->input->post('id');
        $durum = ($this->input->post('durum') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('tblsite', array('durum' => $durum));
    }

    public function siteduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblsite');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/site/edit/anasayfa', $data);
    }

    public function siteguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');
        $hakkimda = $this->input->post('hakkimda');

        $resimkayit = $this->imageUpload('assets/front/img/site/', 'resim', 500, 500);

        if ($resimkayit != '0') {

            $data = array('resim' => $resimkayit,
                'adsoyad' => $adsoyad = $this->input->post('adsoyad'),
                'baslik' => $baslik = $this->input->post('baslik'),
                'seoHakkimda' => $seohakkimda = seflink($hakkimda),
                'ozellik' => $ozellik = $this->input->post('ozellik'),
                'mail' => $mail = $this->input->post('mail'),
                'telefon' => $telefon = $this->input->post('telefon'),
                'hakkimda' => $hakkimda,
                'adres' => $adres = $this->input->post('adres'),
                'footerAd' => $footerAd = $this->input->post('footerAd'),
                'footerLink' => $footerLink = $this->input->post('footerLink'),
                'durum' => $durum = $this->input->post('durum')
            );
            $resimsil = siteresim($id);
            unlink($resimsil);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblsite');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Site ayarı başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/site');
            } else {

                $this->durum("Hata!!!", "Site ayarı güncellenirken bir hata oluştu", 0);
                redirect('yonetim/site');
            }
        } else {
            $data = array(
                'adsoyad' => $adsoyad = $this->input->post('adsoyad'),
                'baslik' => $baslik = $this->input->post('baslik'),
                'seoHakkimda' => $seohakkimda = seflink($hakkimda),
                'ozellik' => $ozellik = $this->input->post('ozellik'),
                'mail' => $mail = $this->input->post('mail'),
                'telefon' => $telefon = $this->input->post('telefon'),
                'hakkimda' => $hakkimda,
                'adres' => $adres = $this->input->post('adres'),
                'footerAd' => $footerAd = $this->input->post('footerAd'),
                'footerLink' => $footerLink = $this->input->post('footerLink'),
                'durum' => $durum = $this->input->post('durum')
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblsite');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Site ayarı başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/site');
            } else {

                $this->durum("Hata!!!", "Site ayarı güncellenirken bir hata oluştu", 0);
                redirect('yonetim/site');
            }
        }

    }

    public function sitesil($id, $where, $from)
    {
        $this->protect();
        $resimsil = siteresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);

        if ($sonuc) {
            $this->durum("Başarılı :)", "Site ayarı başarılı bir şekilde silindi", 1);
            redirect('yonetim/site');

        } else {
            $this->durum("Hata!!!", "Site ayarı silinirken bir hata oluştu", 0);
            redirect('yonetim/site');

        }
    }
    // Site Ayar işlemleri bitiş


    //Genel ayar işlemleri başlangıç
    public function genelayar()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblgenelayar');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/genelayar/anasayfa', $data);
    }

    public function genelayarekle()
    {
        $this->protect();
        $this->load->view('back/genelayar/ekle/anasayfa');
    }

    public function genelayarekleme()
    {
        $this->protect();
        $resimkayit = $this->imageUpload('assets/front/img/arkaplan/', 'resim', 1920, 1055);

        if ($resimkayit != '0') {

            $data = array('resim' => $resimkayit,
                'title' => $title = $this->input->post('title'),
                'logotitle' => $this->input->post('logotitle')
            );

            $sonuc = $this->dtbs->ekle('tblgenelayar', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Genel ayar başarılı bir şekilde eklendi", 1);
                redirect('yonetim/genelayar');
            } else {

                $this->durum("Hata!!!", "Genel ayar eklenirken bir hata oluştu", 0);
                redirect('yonetim/genelayar');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/genelayar');
        }
    }

    public function genelayarduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblgenelayar');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/genelayar/edit/anasayfa', $data);
    }

    public function genelayarguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');

        $resimkayit = $this->imageUpload('assets/front/img/arkaplan/', 'resim', 1920, 1055);

        if ($resimkayit != '0') {

            $resimsil = genelayarresim($id);
            unlink($resimsil);

            $data = array('resim' => $resimkayit,
                'title' => $title = $this->input->post('title'),
                'logotitle' => $this->input->post('logotitle')
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblgenelayar');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Genel ayar başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/genelayar');
            } else {

                $this->durum("Hata!!!", "Genel ayar güncellenirken bir hata oluştu", 0);
                redirect('yonetim/genelayar');
            }
        } else {
            $data = array('title' => $title = $this->input->post('title'),
                'logotitle' => $this->input->post('logotitle')
            );


            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblgenelayar');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Genel ayar başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/genelayar');
            } else {

                $this->durum("Hata!!!", "Genel ayar güncellenirken bir hata oluştu", 0);
                redirect('yonetim/genelayar');
            }
        }
    }

    public function genelayarsil($id, $where, $from)
    {
        $this->protect();
        $resimsil = genelayarresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Genel ayar başarılı bir şekilde silinid", 1);
            redirect('yonetim/genelayar');
        } else {

            $this->durum("Hata!!!", "Genel ayar silinirken bir hata oluştu", 0);
            redirect('yonetim/genelayar');
        }
    }
    //Genel ayar işlemleri bitiş


    //icon ayar işlemleri başlangıç
    public function icon()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblicon');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/icon/anasayfa', $data);
    }

    public function iconekle()
    {
        $this->protect();
        $this->load->view('back/icon/ekle/anasayfa');
    }

    public function iconekleme()
    {
        $this->protect();
        $resimkayit = $this->imageUpload('assets/front/img/icon/', 'resim', 400, 400);

        if ($resimkayit != '0') {

            $data = array('resim' => $resimkayit);

            $sonuc = $this->dtbs->ekle('tblicon', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Icon başarılı bir şekilde eklendi", 1);
                redirect('yonetim/icon');
            } else {

                $this->durum("Hata!!!", "Icon  eklenirken bir hata oluştu", 0);
                redirect('yonetim/icon');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/icon');
        }
    }

    public function iconduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblicon');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/icon/edit/anasayfa', $data);
    }

    public function iconguncelle()
    {
        $id = $this->input->post('id');

        $resimkayit = $this->imageUpload('assets/front/img/icon/', 'resim', 400, 400);

        if ($resimkayit != '0') {

            $resimsil = iconresim($id);
            unlink($resimsil);

            $data = array('resim' => $resimkayit);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblicon');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Icon başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/icon');
            } else {

                $this->durum("Hata!!!", "Icıb güncellenirken bir hata oluştu", 0);
                redirect('yonetim/icon');
            }
        } else {
            $data = array('id' => $id);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblicon');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Icon başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/icon');
            } else {

                $this->durum("Hata!!!", "Icon güncellenirken bir hata oluştu", 0);
                redirect('yonetim/icon');
            }
        }
    }

    public function iconsil($id, $where, $from)
    {
        $this->protect();
        $resimsil = iconresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Icon başarılı bir şekilde silinid", 1);
            redirect('yonetim/icon');
        } else {

            $this->durum("Hata!!!", "Icon silinirken bir hata oluştu", 0);
            redirect('yonetim/icon');
        }
    }
    //icon ayar işlemleri bitiş


    // Proje işlemleri başlangıç
    public function projeler()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblprojeler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/projeler/anasayfa', $data);
    }

    public function projelerekle()
    {
        $this->protect();
        $this->load->view('back/projeler/ekle/anasayfa');
    }

    public function projelerekleme()
    {
        $this->protect();
        $hit = 0;

        $baslik = strip_tags($this->input->post('baslik'));
        $icerik = strip_tags($this->input->post('icerik'));
        $keywords = $this->input->post('keywords');
        $seoicerik = seflink($icerik);
        $seobaslik = seflink($baslik);
        $seogenel = $seoicerik . '';
        $seogenel .= $seobaslik . ' ';
        $seogenel .= seflink($keywords) . ' ';
        $seogenel = seflink($seogenel);

        $resimkayit = $this->imageUpload('assets/front/img/projeler/', 'resim', 1000, 666);

        if ($resimkayit != '0') {

            $data = array(
                'resim' => $resimkayit,
                'baslik' => $baslik,
                'idkategori' => $idkategori = $this->input->post('idkategori'),
                'aciklama' => strip_tags($aciklama = $this->input->post('aciklama')),
                'video' => $video = $this->input->post('video'),
                'durum' => $durum = $this->input->post('durum'),
                'seobaslik' => $seobaslik,
                'icerik' => $icerik,
                'keywords' => $keywords,
                'seoicerik' => $seoicerik,
                'seogenel' => $seogenel,
                'hit' => $hit);

            $sonuc = $this->dtbs->ekle('tblprojeler', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Proje başarılı bir şekilde eklendi", 1);
                redirect('yonetim/projeler');
            } else {

                $this->durum("Hata!!!", "Proje  eklenirken bir hata oluştu", 0);
                redirect('yonetim/projeler');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/projeler');
        }
    }

    public function projelerset()
    {
        $this->protect();
        $id = $this->input->post('id');
        $durum = ($this->input->post('durum') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('tblprojeler', array('durum' => $durum));
    }

    public function projelerduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblprojeler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/projeler/edit/anasayfa', $data);
    }

    public function projelerguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');

        $baslik = strip_tags($this->input->post('baslik'));
        $icerik = strip_tags($this->input->post('icerik'));
        $keywords = $this->input->post('keywords');
        $seoicerik = seflink($icerik);
        $seobaslik = seflink($baslik);
        $seogenel = $seoicerik . '';
        $seogenel .= $seobaslik . ' ';
        $seogenel .= seflink($keywords) . ' ';
        $seogenel = seflink($seogenel);

        $resimkayit = $this->imageUpload('assets/front/img/projeler/', 'resim', 1000, 666);

        if ($resimkayit != '0') {

            $resimsil = projelerresim($id);
            unlink($resimsil);

            $data = array(
                'resim' => $resimkayit,
                'baslik' => $baslik,
                'idkategori' => $idkategori = $this->input->post('idkategori'),
                'aciklama' => strip_tags($aciklama = $this->input->post('aciklama')),
                'video' => $video = $this->input->post('video'),
                'durum' => $durum = $this->input->post('durum'),
                'seobaslik' => $seobaslik,
                'icerik' => $icerik,
                'keywords' => $keywords,
                'seoicerik' => $seoicerik,
                'seogenel' => $seogenel);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblprojeler');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Proje başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/projeler');
            } else {

                $this->durum("Hata!!!", "Proje  güncellenirken bir hata oluştu", 0);
                redirect('yonetim/projeler');
            }
        } else {
            $data = array(
                'baslik' => $baslik,
                'idkategori' => $idkategori = $this->input->post('idkategori'),
                'aciklama' => strip_tags($aciklama = $this->input->post('aciklama')),
                'video' => $video = $this->input->post('video'),
                'durum' => $durum = $this->input->post('durum'),
                'seobaslik' => $seobaslik,
                'icerik' => $icerik,
                'keywords' => $keywords,
                'seoicerik' => $seoicerik,
                'seogenel' => $seogenel
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblprojeler');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Proje başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/projeler');
            } else {

                $this->durum("Hata!!!", "Proje  güncellenirken bir hata oluştu", 0);
                redirect('yonetim/projeler');
            }
        }
    }

    public function projelersil($id, $where, $from)
    {
        $this->protect();
        $resimsil = projelerresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Proje başarılı bir şekilde silindi", 1);
            redirect('yonetim/projeler');
        } else {

            $this->durum("Hata!!!", "Proje silinirken bir hata oluştu", 0);
            redirect('yonetim/projeler');
        }
    }
    // Proje işlemleri bitiş


    // Yazı işlemleri başlangıç
    public function yazilar()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblyazilar');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/yazilar/anasayfa', $data);
    }

    public function yazilarekle()
    {
        $this->protect();
        $this->load->view('back/yazilar/ekle/anasayfa');
    }

    public function yazilarekleme()
    {
        $this->protect();
        $hit = 0;
        $baslik = strip_tags($this->input->post('baslik'));
        $icerik = strip_tags($this->input->post('icerik'));
        $aciklama = strip_tags($this->input->post('aciklama'));
        $keywords = $this->input->post('keywords');
        $seoicerik = seflink($icerik);
        $seobaslik = seflink($baslik);
        $seogenel = $seoicerik . ' ';
        $seogenel .= $seobaslik . ' ';
        $seogenel .= seflink($keywords) . ' ';
        $seogenel = seflink($seogenel);

        $resimkayit = $this->imageUpload('assets/front/img/yazilar/', 'resim', 960, 600);

        if ($resimkayit != '0') {

            $data = array(
                'resim' => $resimkayit,
                'baslik' => $baslik,
                'tur' => $tur = $this->input->post('tur'),
                'aciklama' => $aciklama,
                'video' => $video = $this->input->post('video'),
                'durum' => $durum = $this->input->post('durum'),
                'seobaslik' => $seobaslik,
                'icerik' => $icerik,
                'seogenel' => $seogenel,
                'keywords' => $keywords,
                'seoicerik' => $seoicerik,
                'hit' => $hit);

            $sonuc = $this->dtbs->ekle('tblyazilar', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Yazı başarılı bir şekilde eklendi", 1);
                redirect('yonetim/yazilar');
            } else {

                $this->durum("Hata!!!", "Yazı eklenirken bir hata oluştu", 0);
                redirect('yonetim/yazilar');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/yazilar');

        }
    }

    public function yazilarset()
    {
        $this->protect();
        $id = $this->input->post('id');
        $durum = ($this->input->post('durum') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('tblyazilar', array('durum' => $durum));
    }

    public function yazilarduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblyazilar');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/yazilar/edit/anasayfa', $data);
    }

    public function yazilarguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');
        $baslik = strip_tags($this->input->post('baslik'));
        $icerik = strip_tags($this->input->post('icerik'));
        $aciklama = strip_tags($this->input->post('aciklama'));
        $keywords = $this->input->post('keywords');
        $seoicerik = seflink($icerik);
        $seobaslik = seflink($baslik);
        $seogenel = $seoicerik . ' ';
        $seogenel .= $seobaslik . ' ';
        $seogenel .= seflink($keywords) . ' ';
        $seogenel = seflink($seogenel);

        $resimkayit = $this->imageUpload('assets/front/img/yazilar/', 'resim', 960, 600);

        if ($resimkayit != '0') {

            $resimsil = yazilarresim($id);
            unlink($resimsil);

            $data = array(
                'resim' => $resimkayit,
                'baslik' => $baslik,
                'tur' => $tur = $this->input->post('tur'),
                'aciklama' => $aciklama,
                'video' => $video = $this->input->post('video'),
                'durum' => $durum = $this->input->post('durum'),
                'seobaslik' => $seobaslik,
                'icerik' => $icerik,
                'seogenel' => $seogenel,
                'keywords' => $keywords,
                'seoicerik' => $seoicerik);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblyazilar');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Yazı başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/yazilar');
            } else {

                $this->durum("Hata!!!", "Yazı güncellerken bir hata oluştu", 0);
                redirect('yonetim/yazilar');
            }
        } else {
            $data = array(
                'baslik' => $baslik,
                'tur' => $tur = $this->input->post('tur'),
                'aciklama' => $aciklama,
                'video' => $video = $this->input->post('video'),
                'durum' => $durum = $this->input->post('durum'),
                'seobaslik' => $seobaslik,
                'icerik' => $icerik,
                'seogenel' => $seogenel,
                'keywords' => $keywords,
                'seoicerik' => $seoicerik);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblyazilar');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Yazı başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/yazilar');
            } else {

                $this->durum("Hata!!!", "Yazı güncellerken bir hata oluştu", 0);
                redirect('yonetim/yazilar');
            }
        }
    }

    public function yazilarsil($id, $where, $from)
    {
        $this->protect();
        $resimsil = yazilarresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Yazı başarılı bir şekilde silindi", 1);
            redirect('yonetim/yazilar');
        } else {

            $this->durum("Hata!!!", "Yazı silinirken bir hata oluştu", 0);
            redirect('yonetim/yazilar');
        }
    }
    // Yazı işlemleri bitiş


    // İletişim işlemleri başlangıç
    public function iletisim()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tbliletisim');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/iletisim/anasayfa', $data);
    }

    public function iletisimoku($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tbliletisim');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/iletisim/oku/anasayfa', $data);
    }

    public function iletisimsil($id, $where, $from)
    {
        $this->protect();
        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Mesaj başarılı bir şekilde silindi", 1);
            redirect('yonetim/iletisim');
        } else {

            $this->durum("Hata!!!", "Mesaj silinirken bir hata oluştu", 0);
            redirect('yonetim/iletisim');
        }
    }
    // İletişim işlemleri bitiş


    // Sertifika işlemleri başlangıç
    public function sertifikalar()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblsertifikalar');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/sertifikalar/anasayfa', $data);
    }

    public function sertifikalarekle()
    {
        $this->protect();
        $this->load->view('back/sertifikalar/ekle/anasayfa');
    }

    public function sertifikalarekleme()
    {
        $this->protect();
        $sertifika = $this->input->post('sertifika');
        $seo = seflink($sertifika);

        $resimkayit = $this->imageUpload('assets/front/img/sertifikalar/', 'resim', 960, 600);

        if ($resimkayit != '0') {

            $data = array(
                'sertifika' => $sertifika,
                'resim' => $resimkayit,
                'seosertifika' => $seo
            );

            $sonuc = $this->dtbs->ekle('tblsertifikalar', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Sertifika başarılı bir şekilde eklendi", 1);
                redirect('yonetim/sertifikalar');
            } else {

                $this->durum("Hata!!!", "Sertifika eklenirken bir hata oluştu", 0);
                redirect('yonetim/sertifikalar');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/sertifikalar');
        }
    }

    public function sertifikalarduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblsertifikalar');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/sertifikalar/edit/anasayfa', $data);
    }

    public function sertifikalarguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');
        $sertifika = $this->input->post('sertifika');
        $seo = seflink($sertifika);

        $resimkayit = $this->imageUpload('assets/front/img/sertifikalar/', 'resim', 960, 600);

        if ($resimkayit != '0') {
            $resimsil = sertifikaresim($id);
            unlink($resimsil);
            $data = array(
                'sertifika' => $sertifika,
                'resim' => $resimkayit,
                'seosertifika' => $seo
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblsertifikalar');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Sertifika başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/sertifikalar');
            } else {

                $this->durum("Hata!!!", "Sertifika güncellenirken bir hata oluştu", 0);
                redirect('yonetim/sertifikalar');
            }
        } else {
            $data = array(
                'sertifika' => $sertifika,
                'seosertifika' => $seo
            );
            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblsertifikalar');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Sertifika başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/sertifikalar');
            } else {

                $this->durum("Hata!!!", "Sertifika güncellenirken bir hata oluştu", 0);
                redirect('yonetim/sertifikalar');
            }
        }
    }

    public function sertifikalarsil($id, $where, $from)
    {
        $this->protect();
        $resimsil = sertifikaresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Sertifika başarılı bir şekilde silindi", 1);
            redirect('yonetim/sertifikalar');
        } else {

            $this->durum("Hata!!!", "Sertifika silinirken bir hata oluştu", 0);
            redirect('yonetim/sertifikalar');
        }
    }
    // Sertifika işlemleri bitiş


    // Eğitim işlemleri başlangıç
    public function egitim()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblegitim');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/egitim/anasayfa', $data);
    }

    public function egitimekle()
    {
        $this->protect();
        $this->load->view('back/egitim/ekle/anasayfa');
    }

    public function egitimekleme()
    {
        $this->protect();

        $data = array('ad' => $ad = $this->input->post('ad'), 'seoAd' => seflink($ad));

        $sonuc = $this->dtbs->ekle('tblegitim', $data);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Eğitim bilgisi başarılı bir şekilde eklendi", 1);
            redirect('yonetim/egitim');
        } else {

            $this->durum("Hata!!!", "Eğitim bilgisi eklenirken bir hata oluştu", 0);
            redirect('yonetim/egitim');
        }
    }

    public function egitimduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblegitim');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/egitim/edit/anasayfa', $data);
    }

    public function egitimguncelle()
    {
        $this->protect();
        $data = array(
            'id' => $id = $this->input->post('id'),
            'ad' => $ad = $this->input->post('ad'),
            'seoAd' => seflink($ad));

        $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblegitim');

        if ($sonuc) {

            $this->durum("Başarılı :)", "Eğitim bilgisi başarılı bir şekilde güncellendi", 1);
            redirect('yonetim/egitim');
        } else {

            $this->durum("Hata!!!", "Eğitim bilgisi güncellenirken bir hata oluştu", 0);
            redirect('yonetim/egitim');
        }
    }

    public function egitimsil($id, $where, $from)
    {
        $this->protect();
        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Eğitim başarılı bir şekilde silindi", 1);
            redirect('yonetim/egitim');
        } else {

            $this->durum("Hata!!!", "Eğitim bilgisi silinirken bir hata oluştu", 0);
            redirect('yonetim/egitim');
        }
    }
    // Eğitim işlemleri bitiş


    // Dil bilgisi işlemleri başlangıç
    public function dil()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tbldil');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/dil/anasayfa', $data);
    }

    public function dilekle()
    {
        $this->protect();
        $this->load->view('back/dil/ekle/anasayfa');
    }

    public function dilekleme()
    {
        $this->protect();

        $data = array('ad' => $ad = $this->input->post('ad'), 'seoAd' => seflink($ad));

        $sonuc = $this->dtbs->ekle('tbldil', $data);

        if ($sonuc) {

            $this->durum("Başarılı :)", "Dil bilgisi başarılı bir şekilde eklendi", 1);
            redirect('yonetim/dil');
        } else {

            $this->durum("Hata!!!", "Dil bilgisi eklenirken bir hata oluştu", 0);
            redirect('yonetim/dil');
        }
    }

    public function dilduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tbldil');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/dil/edit/anasayfa', $data);
    }

    public function dilguncelle()
    {
        $this->protect();

        $data = array(
            'id' => $id = $this->input->post('id'),
            'ad' => $ad = $this->input->post('ad'),
            'seoAd' => seflink($ad)
        );

        $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tbldil');
        if ($sonuc) {

            $this->durum("Başarılı :)", "Dil bilgisi başarılı bir şekilde güncellendi", 1);
            redirect('yonetim/dil');
        } else {

            $this->durum("Hata!!!", "Dil bilgisi güncellenirken bir hata oluştu", 0);
            redirect('yonetim/dil');
        }
    }

    public function dilsil($id, $where, $from)
    {
        $this->protect();
        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Dil başarılı bir şekilde silindi", 1);
            redirect('yonetim/dil');
        } else {

            $this->durum("Hata!!!", "Dil bilgisi silinirken bir hata oluştu", 0);
            redirect('yonetim/dil');
        }
    }
    // Dil bilgisi işlemleri bitiş


    //Arka plan işlemleri başlangıç
    public function arkaplan()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblarkaplan');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/arkaplan/anasayfa', $data);
    }

    public function arkaplanekle()
    {
        $this->protect();
        $this->load->view('back/arkaplan/ekle/anasayfa');
    }

    public function arkaplanekleme()
    {
        $this->protect();

        $resimkayit = $this->imageUpload('assets/front/img/arkaplan/', 'resim', 1920, 1055);

        if ($resimkayit != '0') {

            $data = array('resim' => $resimkayit);

            $sonuc = $this->dtbs->ekle('tblarkaplan', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Arkaplan başarılı bir şekilde eklendi", 1);
                redirect('yonetim/arkaplan');
            } else {

                $this->durum("Hata!!!", "Arkaplan eklenirken bir hata oluştu", 0);
                redirect('yonetim/arkaplan');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/arkaplan');
        }
    }

    public function arkaplanduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblarkaplan');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/arkaplan/edit/anasayfa', $data);
    }

    public function arkaplanguncelle()
    {
        $id = $this->input->post('id');

        $resimkayit = $this->imageUpload('assets/front/img/arkaplan/', 'resim', 1920, 1055);

        if ($resimkayit != '0') {

            $resimsil = arkaplanresim($id);
            unlink($resimsil);
            $data = array('resim' => $resimkayit);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblarkaplan');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Arkaplan başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/arkaplan');
            } else {

                $this->durum("Hata!!!", "Arkaplan güncellenirken bir hata oluştu", 0);
                redirect('yonetim/arkaplan');
            }
        }
        $data = array('id' => $id);

        $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblarkaplan');

        if ($sonuc) {

            $this->durum("Başarılı :)", "Arkaplan başarılı bir şekilde güncellendi", 1);
            redirect('yonetim/arkaplan');
        } else {

            $this->durum("Hata!!!", "Arkaplan güncellenirken bir hata oluştu", 0);
            redirect('yonetim/arkaplan');
        }
    }

    public function arkaplansil($id, $where, $from)
    {
        $this->protect();
        $resimsil = arkaplanresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Arka plan başarılı bir şekilde silindi", 1);
            redirect('yonetim/arkaplan');
        } else {

            $this->durum("Hata!!!", "Arka plan bilgisi silinirken bir hata oluştu", 0);
            redirect('yonetim/arkaplan');
        }
    }
    //Arka plan işlemleri bitiş


    //Okunan kitap işlemleri başlangıç
    public function okunan()
    {
        $this->protect();
        $sonuc = $this->dtbs->okunan('tblokunan');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/okunan/anasayfa', $data);
    }

    public function okunanekle()
    {
        $this->protect();
        $this->load->view('back/okunan/ekle/anasayfa');
    }

    public function okunanekleme()
    {
        date_default_timezone_set("Europe/Istanbul");
        $this->protect();
        $kitapadi = $this->input->post('kitapadi');

        $baslatarihi = $this->input->post('baslatarihi');
        $tarih1 = strtotime($baslatarihi);
        $bitistarihi = $this->input->post('bitistarihi');
        $tarih2 = strtotime($bitistarihi);
        $sure = ($tarih2 - $tarih1) / 86400;

        $resimkayit = $this->imageUpload('assets/front/img/kitaplar/okunan/', 'resim', 179, 281);

        if ($resimkayit != '0') {

            $data = array(
                'kitapadi' => $kitapadi,
                'yazaradi' => $yazaradi = $this->input->post('yazaradi'),
                'yayinevi' => $yayinevi = $this->input->post('yayinevi'),
                'sayfa' => $sayfa = $this->input->post('sayfa'),
                'baslatarihi' => $baslatarihi,
                'bitistarihi' => $bitistarihi,
                'sure' => $sure,
                'resim' => $resimkayit
            );

            $sonuc = $this->dtbs->ekle('tblokunan', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Kitap başarılı bir şekilde eklendi", 1);
                redirect('yonetim/okunan');
            } else {

                $this->durum("Hata!!!", "Kitap eklenirken bir hata oluştu", 0);
                redirect('yonetim/okunan');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/okunan');

        }
    }

    public function okunanduzenle($id)
    {
        date_default_timezone_set("Europe/Istanbul");
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblokunan');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/okunan/edit/anasayfa', $data);
    }

    public function okunanguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');
        $kitapadi = $this->input->post('kitapadi');

        $baslatarihi = $this->input->post('baslatarihi');
        $tarih1 = strtotime($baslatarihi);
        $bitistarihi = $this->input->post('bitistarihi');
        $tarih2 = strtotime($bitistarihi);
        $sure = ($tarih2 - $tarih1) / 86400;

        $resimkayit = $this->imageUpload('assets/front/img/kitaplar/okunan/', 'resim', 179, 281);

        if ($resimkayit != '0') {

            $resimsil = okunanresim($id);
            unlink($resimsil);

            $data = array(
                'kitapadi' => $kitapadi,
                'yazaradi' => $yazaradi = $this->input->post('yazaradi'),
                'yayinevi' => $yayinevi = $this->input->post('yayinevi'),
                'sayfa' => $sayfa = $this->input->post('sayfa'),
                'baslatarihi' => $baslatarihi,
                'bitistarihi' => $bitistarihi,
                'sure' => $sure,
                'resim' => $resimkayit
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblokunan');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Kitap başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/okunan');
            } else {

                $this->durum("Hata!!!", "Kitap güncellenirken bir hata oluştu", 0);
                redirect('yonetim/okunan');
            }
        } else {
            $data = array(
                'kitapadi' => $kitapadi,
                'yazaradi' => $yazaradi = $this->input->post('yazaradi'),
                'yayinevi' => $yayinevi = $this->input->post('yayinevi'),
                'sayfa' => $sayfa = $this->input->post('sayfa'),
                'baslatarihi' => $baslatarihi,
                'bitistarihi' => $bitistarihi,
                'sure' => $sure
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblokunan');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Kitap başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/okunan');
            } else {

                $this->durum("Hata!!!", "Kitap güncellenirken bir hata oluştu", 0);
                redirect('yonetim/okunan');
            }
        }
    }

    public function okunansil($id, $where, $from)
    {
        $this->protect();
        $resimsil = okunanresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Kitap başarılı bir şekilde silindi", 1);
            redirect('yonetim/okunan');
        } else {

            $this->durum("Hata!!!", "Kitap bilgisi silinirken bir hata oluştu", 0);
            redirect('yonetim/okunan');
        }
    }
    //Okunan kitap işlemleri bitiş


    //Okunacak kitap işlemleri başlangıç
    public function okunacak()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblokunacak');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/okunacak/anasayfa', $data);
    }

    public function okunacakekle()
    {
        $this->protect();
        $this->load->view('back/okunacak/ekle/anasayfa');
    }

    public function okunacakekleme()
    {
        $this->protect();

        $data = array(
            'kitapadi' => $kitapadi = $this->input->post('kitapadi'),
            'yazaradi' => $yazaradi = $this->input->post('yazaradi')
        );

        $sonuc = $this->dtbs->ekle('tblokunacak', $data);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Kitap başarılı bir şekilde eklendi", 1);
            redirect('yonetim/okunacak');
        } else {

            $this->durum("Hata!!!", "Kitap eklenirken bir hata oluştu", 0);
            redirect('yonetim/okunacak');
        }
    }

    public function okunacakduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblokunacak');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/okunacak/edit/anasayfa', $data);
    }

    public function okunacakguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');

        $data = array(
            'kitapadi' => $kitapadi = $this->input->post('kitapadi'),
            'yazaradi' => $yazaradi = $this->input->post('yazaradi')
        );

        $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblokunacak');

        if ($sonuc) {

            $this->durum("Başarılı :)", "Kitap başarılı bir şekilde güncellendi", 1);
            redirect('yonetim/okunacak');
        } else {

            $this->durum("Hata!!!", "Kitap güncellenirken bir hata oluştu", 0);
            redirect('yonetim/okunacak');
        }

    }

    public function okunacaksil($id, $where, $from)
    {
        $this->protect();


        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Kitap başarılı bir şekilde silindi", 1);
            redirect('yonetim/okunacak');
        } else {

            $this->durum("Hata!!!", "Kitap bilgisi silinirken bir hata oluştu", 0);
            redirect('yonetim/okunacak');
        }
    }
    //Okunacak kitap işlemleri bitiş


    //Resim işlemleri başlangıç
    public function resimler()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblresimler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/resimler/anasayfa', $data);
    }

    public function resimlerekle()
    {
        $this->protect();
        $this->load->view('back/resimler/ekle/anasayfa');
    }

    public function resimlerekleme()
    {
        $this->protect();

        $resimkayit = $this->imageUpload('assets/front/img/resimler/', 'resim', 0, 0);

        if ($resimkayit != '0') {

            $data = array('resim' => $resimkayit);

            $sonuc = $this->dtbs->ekle('tblresimler', $data);

            if ($sonuc) {

                $this->durum("Başarılı :)", "Resim başarılı bir şekilde eklendi", 1);
                redirect('yonetim/resimler');
            } else {

                $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
                redirect('yonetim/resimler');
            }
        } else {
            $this->durum("Hata!!!", "Resim eklenirken bir hata oluştu", 0);
            redirect('yonetim/resimler');
        }
    }

    public function resimlerduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblresimler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/resimler/edit/anasayfa', $data);
    }

    public function resimlerguncelle()
    {
        $id = $this->input->post('id');

        $resimkayit = $this->imageUpload('assets/front/img/resimler/', 'resim', 0, 0);

        if ($resimkayit != '0') {

            $resimsil = resimlerresim($id);
            unlink($resimsil);

            $data = array('resim' => $resimkayit);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblresimler');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Resim başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/resimler');
            } else {

                $this->durum("Hata!!!", "Resim güncellenirken bir hata oluştu", 0);
                redirect('yonetim/resimler');
            }
        } else {
            $data = array('id' => $id);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblresimler');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Resim başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/resimler');
            } else {

                $this->durum("Hata!!!", "Resim güncellenirken bir hata oluştu", 0);
                redirect('yonetim/resimler');
            }
        }
    }

    public function resimlersil($id, $where, $from)
    {
        $this->protect();
        $resimsil = resimlerresim($id);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Resim başarılı bir şekilde silindi", 1);
            redirect('yonetim/resimler');
        } else {

            $this->durum("Hata!!!", "Resim silinirken bir hata oluştu", 0);
            redirect('yonetim/resimler');
        }
    }
    //Resim işlemleri bitiş


    //Dijital müze işlemleri başlangıç

    //Arkeolog işlemleri başlangıç
    public function dijitalArkeolog()
    {
        $this->protect();
        $sonuc = $this->dtbs->arkeologListele('arkeologlar');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/dijitalArkeolog/anasayfa', $data);
    }

    public function dijitalArkeologduzenle($aId)
    {
        $this->protect();
        $sonuc = $this->dtbs->arkeologCek($aId, 'arkeologlar');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/dijitalArkeolog/edit/anasayfa', $data);
    }

    public function dijitalArkeologguncelle()
    {
        $this->protect();
        $aId = $this->input->post('aId');

        $resimkayit = $this->imageUpload('assets/front/img/arkeolog/', 'aPhoto', 160, 160);

        if ($resimkayit != '0') {

            $resimsil = arkeologresim($aId);
            unlink($resimsil);

            $data = array('aPhoto' => $resimkayit,
                'aName' => $aName = $this->input->post('aName'),
                'aStatus' => $aStatus = $this->input->post('aStatus'),
                'aEmail' => $aEmail = $this->input->post('aEmail'),
                'aPhone' => $aPhone = $this->input->post('aPhone')
            );

            $sonuc = $this->dtbs->guncelle($data, $aId, 'aId', 'arkeologlar');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Arkeolog başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/dijitalArkeolog');
            } else {

                $this->durum("Hata!!!", "Arkeolog güncellenirken bir hata oluştu", 0);
                redirect('yonetim/dijitalArkeolog');
            }
        } else {
            $data = array(
                'aName' => $aName = $this->input->post('aName'),
                'aStatus' => $aStatus = $this->input->post('aStatus'),
                'aEmail' => $aEmail = $this->input->post('aEmail'),
                'aPhone' => $aPhone = $this->input->post('aPhone'));

            $sonuc = $this->dtbs->guncelle($data, $aId, 'aId', 'arkeologlar');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Arkeolog başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/dijitalArkeolog');
            } else {

                $this->durum("Hata!!!", "Arkeolog güncellenirken bir hata oluştu", 0);
                redirect('yonetim/dijitalArkeolog');
            }
        }
    }

    public function dijitalArkeologsil($aId, $where, $from)
    {
        $this->protect();

        $resimsil = arkeologresim($aId);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($aId, $where, $from);

        if ($sonuc) {

            $this->durum("Başarılı :)", "Arkeolog başarılı bir şekilde silindi", 1);
            redirect('yonetim/dijitalArkeolog');
        } else {

            $this->durum("Hata!!!", "Arkeolog silinirken bir hata oluştu", 0);
            redirect('yonetim/dijitalArkeolog');
        }
    }
    //Arkeolog işlemleri bitiş


    //Yönetici işlemleri başlangıç
    public function dijitalYonetici()
    {
        $this->protect();
        $sonuc = $this->dtbs->yoneticilerListele('yoneticiler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/dijitalYonetici/anasayfa', $data);
    }

    public function dijitalYoneticiduzenle($yId)
    {
        $this->protect();
        $sonuc = $this->dtbs->yoneticilerCek($yId, 'yoneticiler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/dijitalYonetici/edit/anasayfa', $data);
    }

    public function dijitalYoneticiguncelle()
    {
        $this->protect();

        $yId = $this->input->post('yId');

        $resimkayit = $this->imageUpload('assets/front/img/yonetici/', 'yFoto', 150, 150);

        if ($resimkayit != '0') {

            $resimsil = arkeologresim($yId);
            unlink($resimsil);

            $data = array('yFoto' => $resimkayit,
                'yName' => $yName = $this->input->post('yName'),
                'yEmail' => $yEmail = $this->input->post('yEmail')
            );

            $sonuc = $this->dtbs->guncelle($data, $yId, 'yId', 'yoneticiler');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Yönetici başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/dijitalYonetici');
            } else {

                $this->durum("Hata!!!", "Yönetici güncellenirken bir hata oluştu", 0);
                redirect('yonetim/dijitalYonetici');
            }
        } else {
            $data = array('yFoto' => $resimkayit,
                'yName' => $yName = $this->input->post('yName'),
                'yEmail' => $yEmail = $this->input->post('yEmail')
            );

            $sonuc = $this->dtbs->guncelle($data, $yId, 'yId', 'yoneticiler');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Yönetici başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/dijitalYonetici');
            } else {

                $this->durum("Hata!!!", "Yönetici güncellenirken bir hata oluştu", 0);
                redirect('yonetim/dijitalYonetici');
            }
        }
    }

    public function dijitalYoneticisil($yId, $where, $from)
    {
        $this->protect();

        $resimsil = yoneticiresim($yId);
        unlink($resimsil);

        $sonuc = $this->dtbs->sil($yId, $where, $from);

        if ($sonuc) {

            $this->durum("Başarılı :)", "Yönetici başarılı bir şekilde silindi", 1);
            redirect('yonetim/dijitalYonetici');
        } else {

            $this->durum("Hata!!!", "Yönetici silinirken bir hata oluştu", 0);
            redirect('yonetim/dijitalYonetici');
        }
    }
    //Yönetici işlemleri bitiş


    //Kazı işlemleri başlangıç
    public function dijitalKazi()
    {
        $this->protect();
        $sonuc = $this->dtbs->kazilarListele('kazilar');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/dijitalKazi/anasayfa', $data);
    }

    public function dijitalKaziduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->kazilarCek($id, 'kazilar');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/dijitalKazi/edit/anasayfa', $data);
    }

    public function dijitalKaziguncelle()
    {
        $this->protect();
        $kId = $this->input->post('kId');

        $data = array(
            'kAdi' => $kAdi = $this->input->post('kAdi'),
            'kAdres' => $kAdres = $this->input->post('kAdres'),
            'kBasTarih' => $kBasTarih = $this->input->post('kBasTarih'),
            'kBitTarih' => $kBasTarih = $this->input->post('kBitTarih'),
            'kDurum' => $kDurum = $this->input->post('kDurum')
        );

        $sonuc = $this->dtbs->guncelle($data, $kId, 'kId', 'kazilar');

        if ($sonuc) {

            $this->durum("Başarılı :)", "Kazılar başarılı bir şekilde güncellendi", 1);
            redirect('yonetim/dijitalKazi');
        } else {

            $this->durum("Hata!!!", "Kazılar güncellenirken bir hata oluştu", 0);
            redirect('yonetim/dijitalKazi');
        }
    }

    public function dijitalKazisil($id, $where, $from)
    {
        $this->protect();
        $sonuc = $this->dtbs->sil($id, $where, $from);

        if ($sonuc) {

            $this->durum("Başarılı :)", "Kazı başarılı bir şekilde silindi", 1);
            redirect('yonetim/dijitalKazi');
        } else {

            $this->durum("Hata!!!", "Kazı silinirken bir hata oluştu", 0);
            redirect('yonetim/dijitalKazi');
        }
    }
    //Kazı işlemleri bitiş

    //Eser işlemleri başlangıç
    public function dijitalEser()
    {
        $this->protect();
        $sonuc = $this->dtbs->eserlerListele('eserler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/dijitalEser/anasayfa', $data);
    }

    public function dijitalEserduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->eserlerCek($id, 'eserler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/dijitalEser/edit/anasayfa', $data);
    }

    public function dijitalEserguncelle()
    {
        $this->protect();

        $eId = $this->input->post('eId');

        $data = array(
            'eEnvanter' => $eEnvanter = $this->input->post('eEnvanter'),
            'eBaslik' => $eBaslik = $this->input->post('eBaslik'),
            'eBilgi' => strip_tags($eBilgi = $this->input->post('eBilgi')),
            'eDurum' => $eDurum = $this->input->post('eDurum'));

        $sonuc = $this->dtbs->guncelle($data, $eId, 'eId', 'eserler');
        if ($sonuc) {

            $this->durum("Başarılı :)", "Eser başarılı bir şekilde güncellendi", 1);
            redirect('yonetim/dijitalEser');
        } else {

            $this->durum("Hata!!!", "Eser güncellenirken bir hata oluştu", 0);
            redirect('yonetim/dijitalEser');
        }
    }

    public function dijitalEsersil($eId, $where, $from)
    {
        $this->protect();

        $resimsil = eserresim($eId);
        $resimsil2 = QRresim($eId);
        unlink($resimsil);
        unlink($resimsil2);

        $sonuc = $this->dtbs->sil($eId, $where, $from);

        if ($sonuc) {

            $this->durum("Başarılı :)", "Eser başarılı bir şekilde silindi", 1);
            redirect('yonetim/dijitalEser');
        } else {

            $this->durum("Hata!!!", "Eser silinirken bir hata oluştu", 0);
            redirect('yonetim/dijitalEser');
        }
    }
    //Eser işlemleri bitiş


    //Qr kod işlemleri başlangıç
    public function dijitalQrKod($eId, $eRfid)
    {
        $this->load->library('ciqrcode');

        $params['data'] = $eRfid;
        $params['level'] = 'H';
        $params['size'] = 10;
        $resimAdi = 'assets/front/img/eserlerQR/' . $eRfid . '.png';
        $params['savename'] = FCPATH . $resimAdi;
        $this->ciqrcode->generate($params);

        $data = array('eQR' => $resimAdi);

        $sonuc = $this->dtbs->guncelle($data, $eId, 'eId', 'eserler');

        redirect('yonetim/dijitalEserduzenle/' . $eId . '');
    }
    //Qr kod işlemleri bitiş

    //Dijital müze işlemleri bitiş


    // lisan projesi başlangıç

    // Kullanıcı işlemleri başlangıç
    public function turKullanici()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('turKullanici');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/turKullanici/anasayfa', $data);
    }

    public function turKullaniciekle()
    {
        $this->protect();
        $this->load->view('back/turKullanici/ekle/anasayfa');
    }

    public function turKullaniciekleme()
    {
        $this->protect();
        $adSoyad = $this->input->post('adSoyad');
        $mail = $this->input->post('mail');
        $sifre = $this->input->post('sifre');
        $resim = $this->input->post('resim');
        $durum = $this->input->post('durum');

        $resimkayit = $this->imageUpload('lisans/images/kullanicilar/', 'resim');
        $resimkayit = "https://rifaikuci.com/".$resimkayit;
        $data = array(
            'adSoyad' => $adSoyad,
            'mail' => $mail,
            'sifre' => $sifre,
            'resim' => $resimkayit,
            'durum' => $durum
        );

        $sonuc = $this->dtbs->ekle('turKullanici', $data);

        if ($sonuc) {

            $this->durum("Başarılı :) ", "Kullanıcı başarılı bir şekilde eklendi", 1);
            redirect('yonetim/turKullanici');
        } else {
            $this->durum("Hata !!! ", "Kullanıcı Eklenirken bir hata oluştu", 0);
            redirect('yonetim/turKullanici');
        }
    }

    public function turKullaniciduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'turKullanici');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/turKullanici/edit/anasayfa', $data);
    }

    public function turKullaniciguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');
        $adSoyad = $this->input->post('adSoyad');
        $mail = $this->input->post('mail');
        $sifre = $this->input->post('sifre');
        $resim = $this->input->post('resim');
        $durum = $this->input->post('durum');


        $resimkayit = $this->imageUpload('lisans/images/kullanicilar/', 'resim');
        if ($resimkayit != '0') {

            $resimkayit = "https://rifaikuci.com/".$resimkayit;

            $data = array('resim' => $resimkayit,
                'adSoyad' => $adSoyad,
                'mail' => $mail,
                'sifre' => $sifre,
                'resim' => $resimkayit,
                'durum' => $durum
            );

            $resimsil = turKullaniciResim($id);
            unlink($resimsil);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'turKullanici');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Kullanıcı başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/turKullanici');
            } else {

                $this->durum("Hata !!!", "Kullanıcı güncellenirken bir hata oluştu", 0);
                redirect('yonetim/turKullanici');
            }
        } else {
            $data = array(
                'id' => $id,
                'adSoyad' => $adSoyad,
                'mail' => $mail,
                'sifre' => $sifre,
                'durum' => $durum
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'turKullanici');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Kullanıcı başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/turKullanici');
            } else {

                $this->durum("Hata !!!", "Kullanıcı güncellenirken bir hata oluştu", 0);
                redirect('yonetim/turKullanici');
            }
        }
    }

    public function turKullaniciset()
    {
        $this->protect();
        $id = $this->input->post('id');
        $durum = ($this->input->post('durum') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('turKullanici', array('durum' => $durum));
    }

    public function turKullanicisil($id, $where, $from)
    {
        $this->protect();
        $resimsil = turKullaniciResim($id);
        unlink($resimsil);
        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Kullanıcı başarılı bir şekilde silindi", 1);
            redirect('yonetim/turKullanici');
        } else {

            $this->durum("Hata!!!", "Kullanıcı silinirken bir hata oluştu", 0);
            redirect('yonetim/turKullanici');
        }
    }
    // Kullanıcı işlemleri bitiş

    //Türler işlemleri başlangıç
    public function turTurler()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('turler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/turTurler/anasayfa', $data);
    }

    public function turgoruntule($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'turler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/turTurler/goruntule/anasayfa', $data);
    }


    //Türler işlemleri bitiş

    //Kesfet islemleri baslangıc
    public function turKesfet()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('kesfet');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/turKesfet/anasayfa', $data);
    }

    public function turKesfetekle()
    {
        $this->protect();
        $this->load->view('back/turKesfet/ekle/anasayfa');
    }

    public function turKesfetekleme()
    {
        $this->protect();
        $turAd = $this->input->post('turAd');
        $turDetay = $this->input->post('turDetay');
        $paylasanKullanici = $this->input->post('paylasanKullanici');
        $turEnlem = $this->input->post('turEnlem');
        $turBoylam = $this->input->post('turBoylam');
        $durum = $this->input->post('durum');
        $tur = $this->input->post('tur');

        if($tur==1){
            $tur ="Bitki";
        }else{
            $tur = "Kuş";
        }

        $resimkayit = $this->imageUpload('lisans/images/kesfet/', 'turResim');
        $resimkayit = "https://rifaikuci.com/".$resimkayit;
        $data = array(
            'turAd' => $turAd,
            'turDetay' => $turDetay,
            'paylasanKullanici' => $paylasanKullanici,
            'turEnlem' => $turEnlem,
            'turBoylam' => $turBoylam,
            'turResim' => $resimkayit,
            'durum' => $durum,
            'tur' => $tur
        );

        $sonuc = $this->dtbs->ekle('kesfet', $data);

        if ($sonuc) {

            $this->durum("Başarılı :) ", "Keşfet listesine tür başarılı bir şekilde eklendi", 1);
            redirect('yonetim/turKesfet');
        } else {
            $this->durum("Hata !!! ", "Keşfet listesine tür Eklenirken bir hata oluştu", 0);
            redirect('yonetim/turKesfet');
        }
    }

    public function turKesfetduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'kesfet');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/turKesfet/edit/anasayfa', $data);
    }

    public function turKesfetguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');
        $turAd = $this->input->post('turAd');
        $turDetay = $this->input->post('turDetay');
        $paylasanKullanici = $this->input->post('paylasanKullanici');
        $turEnlem = $this->input->post('turEnlem');
        $turBoylam = $this->input->post('turBoylam');
        $durum = $this->input->post('durum');
        $tur = $this->input->post('tur');

        if($tur==1){
            $tur ="Bitki";
        }else{
            $tur = "Kuş";
        }

        $resimkayit = $this->imageUpload('lisans/images/kesfet/', 'turResim');
        if ($resimkayit != '0') {

            $resimkayit = "https://rifaikuci.com/".$resimkayit;

            $data = array(
                'turAd' => $turAd,
                'turDetay' => $turDetay,
                'paylasanKullanici' => $paylasanKullanici,
                'turEnlem' => $turEnlem,
                'turBoylam' => $turBoylam,
                'turResim' => $resimkayit,
                'durum' => $durum,
                'tur' => $tur
            );

            $resimsil = turKesfetResim($id);
            unlink($resimsil);

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'kesfet');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Keşfet bilgisi başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/turKesfet');
            } else {

                $this->durum("Hata !!!", "Keşfet bilgisi güncellenirken bir hata oluştu", 0);
                redirect('yonetim/turKesfet');
            }
        } else {
            $data = array(
                'turAd' => $turAd,
                'turDetay' => $turDetay,
                'paylasanKullanici' => $paylasanKullanici,
                'turEnlem' => $turEnlem,
                'turBoylam' => $turBoylam,
                'durum' => $durum,
                'tur' => $tur
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'kesfet');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Keşfet bilgisi başarılı bir şekilde güncellendi", 1);
                redirect('yonetim/turKesfet');
            } else {

                $this->durum("Hata !!!", "Keşfet bilgisi güncellenirken bir hata oluştu", 0);
                redirect('yonetim/turKesfet');
            }
        }
    }

    public function turKesfetset()
    {
        $this->protect();
        $id = $this->input->post('id');
        $durum = ($this->input->post('durum') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('kesfet', array('durum' => $durum));
    }

    public function turKesfetsil($id, $where, $from)
    {
        $this->protect();
        $resimsil = turKesfetResim($id);
        unlink($resimsil);
        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Keşfet başarılı bir şekilde silindi", 1);
            redirect('yonetim/turKesfet');
        } else {

            $this->durum("Hata!!!", "Keşfet silinirken bir hata oluştu", 0);
            redirect('yonetim/turKesfet');
        }
    }

    //Kesfet islemleri bitis

    // lisan projesi bitiş


    // Dijital yurt başlangıç

    //Duyuru işlemler başlangıç
    public function duyurular()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblduyurular');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/yurtDuyurular/anasayfa', $data);
    }

    public function duyurularekle()
    {
        $this->protect();
        $this->load->view('back/yurtDuyurular/ekle/anasayfa');
    }

    public function duyurularekleme()
    {
        $this->protect();
        $duyuruBaslik = $this->input->post('duyuruBaslik');
        $duyuruDetay = $this->input->post('duyuruDetay');
        $duyuruDetay = trim($duyuruDetay);
        $seoBaslik = seflink($duyuruBaslik);
        $duyuruVideo = $this->input->post('duyuruVideo');
        $durum = $this->input->post('durum');

        $resimkayit = $this->imageUpload('akilliYurt/images/', 'duyuruResim', 0, 0);

        if ($resimkayit != '0') {

            $resimkayit = "https://rifaikuci.com/".$resimkayit;

            $data = array(
                'duyuruResim' => $resimkayit,
                'duyuruBaslik' => $duyuruBaslik,
                'duyuruDetay' => $duyuruDetay,
                'duyuruVideo' => $duyuruVideo,
                'seobaslik' => $seoBaslik,
                'durum' => $durum
            );

            $sonuc = $this->dtbs->ekle('tblduyurular', $data);

            if ($sonuc) {
                if ($durum == 1) {
                    $to = "/topics/dispositivos";
                    $dataNotif = array(
                        'duyuruResim' => $resimkayit,
                        'duyuruBaslik' => $duyuruBaslik,
                        'duyuruDetay' => strip_tags($duyuruDetay),
                        'duyuruVideo' => $duyuruVideo
                    );
                    //    sendPushNotification($to,  $dataNotif);
                }

                $this->durum("Başarılı :) ", "Duyuru başarılı bir şekilde eklendi", 1);
                redirect('yonetim/duyurular');
            } else {
                $this->durum("Hata !!! ", "Duyuru Eklenirken bir hata oluştu", 0);
                redirect('yonetim/duyurular');
            }
        } else {

            $resimkayit =  "https://rifaikuci.com/akilliYurt/images/default.png";

            $data = array(
                'duyuruResim' => $resimkayit,
                'duyuruBaslik' => $duyuruBaslik,
                'duyuruDetay' => $duyuruDetay,
                'duyuruVideo' => $duyuruVideo,
                'seobaslik' => $seoBaslik,
                'durum' => $durum);

            $sonuc = $this->dtbs->ekle('tblduyurular', $data);
            if ($sonuc) {
                if ($durum == 1) {
                    $to = "/topics/dispositivos";
                    $dataNotif = array(
                        'duyuruResim' => $resimkayit,
                        'duyuruBaslik' => $duyuruBaslik,
                        'duyuruDetay' => strip_tags($duyuruDetay),
                        'duyuruVideo' => $duyuruVideo
                    );
                    //     sendPushNotification($to,  $dataNotif);
                }

                $this->durum("Başarılı :) ", "Duyuru başarılı bir şekilde eklendi resim default olarak seçildi", 1);
                redirect('yonetim/duyurular');
            } else {
                $this->durum("Hata !!! ", "Duyuru Eklenirken bir hata oluştu", 0);
                redirect('yonetim/duyurular');
            }
        }
    }

    public function duyurularduzenle($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblduyurular');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/yurtDuyurular/edit/anasayfa', $data);
    }

    public function duyurularguncelle()
    {
        $this->protect();
        $id = $this->input->post('id');
        $duyuruBaslik = $this->input->post('duyuruBaslik');
        $duyuruVideo = $this->input->post('duyuruVideo');
        $duyuruDetay = $this->input->post('duyuruDetay');
        $duyuruDetay = trim($duyuruDetay);
        $seoBaslik = seflink($duyuruBaslik);
        $durum = $this->input->post('durum');

        $resimkayit = $this->imageUpload('akilliYurt/images/', 'duyuruResim', 0, 0);
        if ($resimkayit != '0') {
            $resim = explode("/", duyurularresim($id));
            $resim = $resim[count($resim) - 1];

            if ($resim != "default.png") {
                $resimsil = duyuruResim($id);
                echo  $resimsil;
                exit();
                unlink($resimsil);
            }

            $resimkayit = base_url() . $resimkayit;
            $data = array(
                'duyuruResim' => $resimkayit,
                'duyuruBaslik' => $duyuruBaslik,
                'duyuruVideo' => $duyuruVideo,
                'duyuruDetay' => $duyuruDetay,
                'seobaslik' => $seoBaslik,
                'durum' => $durum
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblduyurular');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Duyuru başarılı bir şekilde Güncellendi", 1);
                redirect('yonetim/duyurular');
            } else {

                $this->durum("Hata!!!", "Duyuru güncellenirken bir hata oluştu", 0);
                redirect('yonetim/duyurular');
            }
        } else {
            $data = array(
                'duyuruBaslik' => $duyuruBaslik,
                'duyuruVideo' => $duyuruVideo,
                'duyuruDetay' => $duyuruDetay,
                'seobaslik' => $seoBaslik,
                'durum' => $durum
            );

            $sonuc = $this->dtbs->guncelle($data, $id, 'id', 'tblduyurular');

            if ($sonuc) {

                $this->durum("Başarılı :)", "Duyuru başarılı bir şekilde Güncellendi", 1);
                redirect('yonetim/duyurular');
            } else {

                $this->durum("Hata!!!", "Duyuru güncellenirken bir hata oluştu", 0);
                redirect('yonetim/duyurular');
            }
        }
    }

    public function duyurularset()
    {
        $this->protect();
        $id = $this->input->post('id');
        $durum = ($this->input->post('durum') == "true") ? 1 : 0;
        $this->db->where('id', $id)->update('tblduyurular', array('durum' => $durum));

    }

    public function duyurularsil($id, $where, $from)
    {
        $this->protect();
        $resim = explode("/", duyurularresim($id));
        $resim = $resim[count($resim) - 1];
        if ($resim != "default.png") {
            $resimsil = duyuruResim($id);
            unlink($resimsil);
            echo $resim;
            exit();
        }

        $sonuc = $this->dtbs->sil($id, $where, $from);

        if ($sonuc) {

            $this->durum("Başarılı :)", "Duyuru başarılı bir şekilde silindi", 1);
            redirect('yonetim/duyurular');
        } else {

            $this->durum("Hata!!!", "Duyuru silinirken bir hata oluştu", 0);
            redirect('yonetim/duyurular');
        }
    }
    //Duyuru işlemler bitiş


    // istek ve şikayet işlemleri başlangıç
    public function istekler()
    {
        $this->protect();
        $sonuc = $this->dtbs->listele('tblistekler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/yurtistekler/anasayfa', $data);
    }

    public function istekleroku($id)
    {
        $this->protect();
        $sonuc = $this->dtbs->cek($id, 'tblistekler');
        $data['bilgi'] = $sonuc;
        $this->load->view('back/yurtistekler/oku/anasayfa', $data);
    }

    public function isteklersil($id, $where, $from)
    {
        $this->protect();
        $sonuc = $this->dtbs->sil($id, $where, $from);
        if ($sonuc) {

            $this->durum("Başarılı :)", "Dilek ve şikayet başarılı bir şekilde silindi", 1);
            redirect('yonetim/istekler');
        } else {

            $this->durum("Hata!!!", "Dilek ve şikayet silinirken bir hata oluştu", 0);
            redirect('yonetim/istekler');
        }
    }

    public function istekYazdir()
    {
        $this->protect();

        $this->load->view('back/yurtistekler/istekler.php');

        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->dompdf->loadHtml($html);

        $this->dompdf->setPaper('A4', 'landscape');

        $this->dompdf->render();

        $this->dompdf->stream('istekler.pdf', array('Attachment' => 0));
    }
    // istek ve şikayet işlemleri bitiş

    // Dijital yurt bitiş


    // Bulanık Mantık işlemleri giriş
    public function bulanik()
    {
        $this->protect();
        $this->load->view('back/bulanik/anasayfa');
    }

    public function bulanikVeri()
    {
        $this->protect();

        $secenek = $this->input->post('secenek');
        $secenekDizi = explode(",", $secenek);

        $kriter = $this->input->post('kriter');
        $kriterDizi = explode(",", $kriter);


        $ac = fopen(__DIR__ . "/bulanik/tablo1.csv", "w+");

        $deger = "#," . $kriter . "\n";

        foreach ($secenekDizi as $s) {

            $deger = $deger . trim($s);

            for ($i = 0; $i < count($kriterDizi); $i++) {
                $deger = $deger . ",";
            }

            $deger = $deger . "\n";
        }

        fwrite($ac, $deger);
        fclose($ac);

        $data['kriter'] = $kriterDizi;
        $data['secenek'] = $secenekDizi;
        $this->load->view('back/bulanik/bulanikVeri/anasayfa', $data);
    }

    public function bulanikVeriGirisi($secenek, $kriter)
    {
        $this->protect();

        for ($i = 0; $i < $secenek; $i++) {
            for ($j = 0; $j < $kriter; $j++) {
                $deneme[$i][$j] = $this->input->post($i . '-' . $j);
            }
        }

        if (($h = fopen(__DIR__ . "/bulanik/tablo1.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {
                $the_big_array[] = $data;
            }
            fclose($h);
        }

        for ($i = 1; $i < count($the_big_array); $i++) {
            for ($j = 1; $j < $kriter + 1; $j++) {
                $the_big_array[$i][$j] = $deneme[$i - 1][$j - 1];
            }
        }

        $aktarilacak = "";
        for ($i = 0; $i < count($the_big_array); $i++) {

            for ($j = 0; $j < $kriter + 1; $j++) {

                if ($j == $kriter) {
                    $aktarilacak = $aktarilacak . $the_big_array[$i][$j];
                } else {
                    $aktarilacak = $aktarilacak . $the_big_array[$i][$j] . ",";
                }

            }
            $aktarilacak = $aktarilacak . "\n";
        }


        $ac = fopen(__DIR__ . "/bulanik/tablo2.csv", "w+");
        fwrite($ac, $aktarilacak);
        fclose($ac);

        $this->load->view('back/bulanik/bulanikTablo/anasayfa');
    }

    public function bulanikAgirlik()
    {
        $this->protect();
        $this->load->view('back/bulanik/bulanikAgirlik/anasayfa');
    }

    public function bulanikAgirlikVeri($kriter)
    {
        $this->protect();

        for ($j = 0; $j < $kriter; $j++) {
             $deneme[$j] = $this->input->post($j);
        }

        if (($h = fopen(__DIR__ . "/bulanik/tablo4.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($h, 1000, ",")) !== FALSE) {
                $the_big_array[] = $data;
            }
            fclose($h);
        }

        $gecici = array();

        for ($i = 0; $i < $kriter; $i++) {
            $gecici[0][$i] = $the_big_array[0][$i];
        }

        for ($i = 0; $i < $kriter; $i++) {
            $gecici[1][$i] = $deneme[$i];
        }

        $secenek = count($the_big_array);

        for ($i = 1; $i < $secenek; $i++) {
            $a = $i + 1;
            for ($j = 0; $j < $kriter; $j++) {
                $gecici[$a][$j] = $the_big_array[$i][$j];
            }
        }


        $aktarilacak = "";

        for ($i = 0; $i < count($gecici); $i++) {

            for ($j = 0; $j < $kriter; $j++) {

                if ($j == $kriter - 1) {
                    $aktarilacak = $aktarilacak . $gecici[$i][$j];
                } else {
                    $aktarilacak = $aktarilacak . $gecici[$i][$j] . ",";
                }
            }
            $aktarilacak = $aktarilacak . "\n";
        }


        $ac = fopen(__DIR__ . "/bulanik/tablo5.csv", "w+");

        fwrite($ac, $aktarilacak);
        fclose($ac);

        $this->load->view('back/bulanik/bulanikSonuc/anasayfa');
    }

    // Bulanık Mantık işlemleri bitiş


    function imageUpload($resimPath, $resimname, $width = 0, $height = 0)
    {
        $config['upload_path'] = FCPATH . $resimPath;
        $config['allowed_types'] = 'gif|jpg|jgep|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($resimname)) {

            $resim = $this->upload->data();
            $resimyolu = $resim['file_name'];
            $resimkayit = $resimPath . $resimyolu . '';
            $config['image_library'] = 'gd2';
            $config['source_image'] = $resimPath . $resimyolu . '';
            $config['new_image'] = $resimPath . $resimyolu . '';
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = false;
            $config['width'] = $width;
            $config['height'] = $height;
            $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);
            if ($width != 0 && $height != 0) {
                $this->image_lib->resize();
            }
            $this->image_lib->clear();

            return $resimkayit;
        } else {
            return 0;
        }
    }

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
}// son parantez


//Bildirim gönderme işlemleri
function sendPushNotification($to = '', $data = array())
{

    $apiKey = 'AAAA1ku8mGM:APA91bGsUYr9ksKP_eSmRQImuAZgdFkNv1Cld0IYU9RH7Xflh2B1N6R4xWkFMdIPwjGsBCQUmxRL2SGJ85DQ5gAax9XNG8MxEnY77YaYM1E-PopRJXWGwSp1ROwroqX0U43dptWL8Wl2';

    $fields = array(
        'to' => $to,
        'data' => $data,
    );

    $headers = array('Authorization: key=' . $apiKey, 'Content-Type: application/json');

    $url = 'https://fcm.googleapis.com/fcm/send';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    echo json_encode($fields);
    echo "<br><br>RESPUESTA SERVIDOR: ";

    $result = curl_exec($ch);

    curl_close($ch);

    return json_decode($result, true);
}






