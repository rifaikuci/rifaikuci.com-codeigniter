<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php $admin=admincek(); ?>
        <img src="<?php echo base_url(); echo $admin->resim;?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo admincek()->adsoyad; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i> <span> Genel Ayarlar</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('yonetim/icon'); ?>"><i class="fa fa-circle-o"></i> Üst İcon Ayarları</a></li>
          <li><a href="<?php echo base_url('yonetim/arkaplan'); ?>"><i class="fa fa-circle-o"></i> Arkaplan Ayarları</a></li>
          <li><a href="<?php echo base_url('yonetim/genelayar'); ?>"><i class="fa fa-circle-o"></i> Genel  Ayarlar</a></li>
          <li><a href="<?php echo base_url('yonetim/site'); ?>"><i class="fa fa-circle-o"></i> Site  Ayarları</a></li>
        <?php $smedyaSayisi=  smedyacek(); ?>
          <li><a href="<?php echo base_url('yonetim/smedya'); ?>"><i class="fa fa-circle-o"></i>
               <span class="label label-success pull-right"><?php echo $smedyaSayisi; ?></span>Sosyal Medya Ayarları</a></li>
                 <li><a href="<?php echo base_url('yonetim/sifre'); ?>"><i class="fa fa-circle-o"></i> Şifre Ayarları</a></li>
        </ul>
      </li>
      <li >
        <a href="<?php echo base_url('yonetim/gununsozu'); ?>">
          <i class="fa fa-pencil"></i>
          <span>Güne Ait Sözler</span>
          <span class="pull-right-container">
              <?php $gununsozuSayisi=gununsozucek(); ?>
            <span class="label label-success pull-right"><?php echo $gununsozuSayisi; ?></span>
          </span>
        </a>

      </li>
      <li>
        <a href="<?php echo base_url('yonetim/headMenu'); ?>">
          <i class="fa fa-th"></i> <span>Head Menü Ayarları</span>
          <span class="pull-right-container">
            <?php $headSayisi=headmenucek(); ?>
            <span class="label label-success pull-right"><?php echo $headSayisi; ?></span>
          </span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('yonetim/kategoriler'); ?>">
          <i class="fa fa-list-alt"></i> <span>Kategori Ayarları</span>
          <span class="pull-right-container">
            <?php $kategoriSayisi=kategoricek(); ?>
            <span class="label label-success pull-right"><?php echo $kategoriSayisi; ?></span>
          </span>
        </a>
      </li>

        <li>
            <a href="<?php echo base_url('yonetim/onlineSertifika'); ?>">
                <i class="fa fa-list-alt"></i> <span>Online Sertifika</span>
            </a>
        </li>

      <li>
        <a href="<?php echo base_url('yonetim/projeler'); ?>">
          <i class="fa fa-file-text"></i> <span>Projeler</span>
          <span class="pull-right-container">
            <?php $projeSayisi=projecek(); ?>
            <span class="label label-success pull-right"><?php echo $projeSayisi; ?></span>
          </span>
        </a>
      </li>


      <li>
        <a href="<?php echo base_url('yonetim/yazilar'); ?>">
          <i class="fa fa-book"></i> <span>Yazılar</span>
          <span class="pull-right-container">
            <?php $yaziSayisi=yazicek(); ?>
            <span class="label label-success pull-right"><?php echo $yaziSayisi; ?></span>
          </span>
        </a>
      </li>



      <li>
        <a href="#">
          <i class="fa fa-calendar"></i> <span>Takvim</span>
          <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo date('Y'); ?></small>
              <small class="label pull-right bg-blue"><?php echo date('m'); ?></small>
            <small class="label pull-right bg-red"><?php echo date('d'); ?></small>


          </span>
        </a>
      </li>
      <li>
        <a href="<?php echo  base_url('yonetim/iletisim'); ?>">
          <i class="fa fa-envelope"></i> <span>Mesajlar</span>
          <span class="pull-right-container">
              <?php $okunanSayisi=okunancek(); ?>
            <small class="label pull-right bg-green"><?php echo $okunanSayisi; ?></small>
              <?php $okunmayan=okunmayancek(); ?>
            <small class="label pull-right bg-red"><?php echo $okunmayan; ?></small>
          </span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('yonetim/ozellikler'); ?>">
          <i class="fa fa-check"></i> <span>Özellik Ayarları</span>
          <span class="pull-right-container">
            <?php $ozellikSayisi=ozellikcek(); ?>
            <span class="label label-success pull-right"><?php echo $ozellikSayisi; ?></span>
          </span>
        </a>
      </li>


      <li>
        <a href="<?php echo base_url('yonetim/sertifikalar'); ?>">
          <i class="fa fa-database"></i> <span>Sertifika Ayarları</span>
          <span class="pull-right-container">
            <?php $sertifikasayisi=sertifikacek(); ?>
            <span class="label label-success pull-right"><?php echo $sertifikasayisi; ?></span>
          </span>
        </a>
      </li>


      <li>
        <a href="<?php echo base_url('yonetim/admin'); ?>">
          <i class="fa fa-user"></i> <span>Admin Ayarları</span>
          <span class="pull-right-container">

            <span class="label label-success pull-right"></span>
          </span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('yonetim/egitim'); ?>">
          <i class="glyphicon glyphicon-education"></i> <span>Eğitim Ayarları</span>
          <span class="pull-right-container">

            <span class="label label-success pull-right"></span>
          </span>
        </a>
      </li>

      <li>
        <a href="<?php echo base_url('yonetim/dil'); ?>">
          <i class="fa fa-language"></i> <span>Dil Ayarları</span>
          <span class="pull-right-container">

            <span class="label label-success pull-right"></span>
          </span>
        </a>
      </li>


      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i> <span> Kitaplığım</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php $okunacaksayi=okunacakkitapcek() ; ?>
          <?php $okunansayi=okunankitapcek() ; ?>
          <li><a href="<?php echo base_url('yonetim/okunan'); ?>"><i class="fa fa-circle-o"></i>
   <span class="label label-success pull-right"><?php echo $okunansayi; ?>
   </span>Okuduğum Kitaplar</a></li>
          <li><a href="<?php echo base_url('yonetim/okunacak'); ?>"><i class="fa fa-circle-o"></i>
   <span class="label label-danger pull-right"><?php echo $okunacaksayi; ?></span>
             Okunacak Kitaplar</a></li>


        </ul>
      </li>
      
      
      

      <li>
        <a href="<?php echo base_url('yonetim/resimler'); ?>">
          <i class="fa fa-image"></i> <span>Resimler</span>
          <span class="pull-right-container">

            <span class="label label-success pull-right"></span>
          </span>
        </a>
      </li>
      
      
      
   
   <li class="treeview">
            <a href="#">
                <i class="fa fa-gears"></i> <span> Dijital Müze</span>
                <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('yonetim/dijitalYonetici'); ?>"><i class="fa fa-circle-o">

                        </i> Yöneticiler <span class="pull-right-container">
            <?php $dijitalMuzeSayisi=dijitalMuzeYoneticicek(); ?>
            <span class="label label-success pull-right"><?php echo $dijitalMuzeSayisi; ?></span>
          </span></a></li>


                <li><a href="<?php echo base_url('yonetim/dijitalArkeolog'); ?>"><i class="fa fa-circle-o"></i> Arkeologlar

                        <span class="pull-right-container">
                <?php $arkeologActivecek=arkeologActivecek(); ?>
              <small class="label pull-right bg-green"><?php echo $arkeologActivecek; ?></small>
                <?php $arkeologInActivecek=arkeologInActivecek(); ?>
              <small class="label pull-right bg-red"> <?php echo $arkeologInActivecek; ?></small>
            </span>
                    </a></li>

                <li><a href="<?php echo base_url('yonetim/dijitalKazi'); ?>"><i class="fa fa-circle-o"></i> Kazılar
                        <span class="pull-right-container">
                <?php $kazilarActivecek=kazilarActivecek(); ?>
              <small class="label pull-right bg-green"><?php echo $kazilarActivecek; ?></small>
                <?php $kazilarInActivecek=kazilarInActivecek(); ?>
              <small class="label pull-right bg-red"><?php echo $kazilarInActivecek; ?></small>
            </span>

                    </a></li>
                <li><a href="<?php echo base_url('yonetim/dijitalEser'); ?>"><i class="fa fa-circle-o"></i> Eserler
                        <span class="pull-right-container">
                <?php $eserlerActivecek=eserlerActivecek(); ?>
              <small class="label pull-right bg-green"><?php echo $eserlerActivecek; ?></small>
                <?php $eserlerInActivecek=eserlerInActivecek(); ?>
              <small class="label pull-right bg-red"><?php echo $eserlerInActivecek; ?></small>
            </span>

                    </a></li>


            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-gears"></i> <span> Türlerin Yayılışı</span>
                <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
            </a>
            <ul class="treeview-menu">





                <li><a href="<?php echo base_url('yonetim/turler'); ?>"><i class="fa fa-circle-o"></i> Türler
                        <span class="pull-right-container">
                <?php $kazilarActivecek=kazilarActivecek(); ?>
              <small class="label pull-right bg-green"><?php echo $kazilarActivecek; ?></small>
                <?php $kazilarInActivecek=kazilarInActivecek(); ?>
              <small class="label pull-right bg-red"><?php echo $kazilarInActivecek; ?></small>
            </span>

                    </a></li>

            </ul>
        </li>




      <li class="header text-red">İşlemler</li>
      <li ><a href="<?php echo base_url('yonetim/cikis'); ?>"><i class="fa fa-circle-o text-red"></i> <span>
        <button style="width:180px" type="button" class="btn btn-danger" name= "button">  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; Çıkış Yap &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        </span></button></a></li>

        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o text-green"></i> <span>

          <button style="width:180px" type="button" class="btn btn-success" name= "button"> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; Siteye Giriş &nbsp;&nbsp;   &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </span></button></a></li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
