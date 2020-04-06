<div class="testimonials paralax-mf bg-image"
     style="background-image: url(<?php echo base_url('');
     echo arkaplan(); ?>);margin-top:50px">
    <div class="overlay-mf"></div>
    <div class="container">
        <?php foreach (randomsoz() as $gununsozu) { ?>

        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-mf" class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                             style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 530px;">
                            <div class="owl-item active" style="width: 510px; margin-right: 20px;">
                                <div class="testimonial-box">
                                    <div class="author-test">
                                        <img width="150" height="150"
                                             src="<?php echo $gununsozu['resim']; ?>"
                                             alt="<?php echo $gununsozu['adsoyad']; ?>"
                                             class="rounded-circle b-shadow-a"/>
                                        <span class="author">
                                            <?php echo $gununsozu['adsoyad']; ?>
                                        </span>
                                    </div>

                                    <div class="content-test">
                                        <p class="description lead">
                                            <?php echo $gununsozu['gununsozu']; ?>
                                        </p>
                                        <span class="comit"><i class="fa fa-quote-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
