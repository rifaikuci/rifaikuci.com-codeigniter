<section class="paralax-mf footer-paralax bg-image sect-mt4 route"
         style="background-image: url(<?php echo base_url('');
         echo arkaplan(); ?>)">

    <div class="overlay-mf"></div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-mf">
                    <div id="iletisim" class="box-shadow-full">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="title-box-2">

                                    <h4 class="title-left">Mesaj Gönderin</h4>

                                </div>

                                <?php $this->load->view('front/include/contact.php') ?>

                            </div>

                            <div class="col-md-6">
                                <div class="title-box-2 pt-4 pt-md-0">

                                    <h5 class="title-left">İletişim</h5>

                                </div>

                                <div class="more-info">

                                    <?php foreach (siteayar() as $siteayar) { ?>
                                        <ul class="list-ico">
                                            <a target="_blank" href="http://maps.google.com/?q=
                                            <?php echo $siteayar['adres']; ?>">
                                                <li>
                                                    <span class="ion-ios-location"></span>
                                                    <?php echo $siteayar['adres']; ?>
                                                </li>
                                            </a>

                                            <a href="mailto:<?php echo $siteayar['mail']; ?>@gmail.com?Subject=rifaikuci.com%20Adresinden"
                                               target="_top">
                                                <li><span class="ion-email"></span>
                                                    <?php echo $siteayar['mail']; ?>
                                                </li>
                                            </a>
                                        </ul>
                                    <?php } ?>

                                </div>

                                <?php $this->load->view('front/include/smedya.php') ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('front/include/footer.php') ?>

</section>
