<div class="col-md-8">
    <div class="post-box">

        <div style="text-align:center;margin-bottom:30px">
            <h1 style="color:#4d9ef2" class="article-title">
                Hakkımda
            </h1>
        </div>

        <div class="article-content">
            <?php foreach (siteayar() as $siteayar): ?>
                <?php echo $siteayar['hakkimda']; ?>
            <?php endforeach; ?>
            <hr style="margin-top:70px;margin-bottom:70px">

            <div class="blockquote">
                <p style="font-size:36px;color:#D2691E;"><b>Eğitim</b></p>
            </div>

            <div>
                <ul style="list-style:none">

                    <?php foreach (hakkimdaegitim() as $egitim): ?>
                        <li>
                            <span style="font-size:24px;" class="ion-checkmark"></span>
                            <a style="margin-left:15px">
                                <?php echo $egitim['ad']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                
            </div>


            <hr style="margin-top:70px;margin-bottom:70px">


            <div class="blockquote">
                <p style="font-size:36px;color:#D2691E;"><b>Diller</b></p>
            </div>


            <div>
                <ul style="list-style:none">
                    <?php foreach (hakkimdadil() as $dil): ?>
                        <li>
                            <span style="font-size:24px;" class="ion-checkmark"></span>
                            <a style="margin-left:15px">
                                <?php echo $dil['ad']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                </span>
            </div>


            <hr style="margin-top:70px;margin-bottom:70px">


            <div class="blockquote">
                <p style="font-size:36px;color:#D2691E;"><b>Programlama Dilleri & Araçlar</b></p>
            </div>


            <div>
                <ul style="list-style: none outside none;">

                    <?php foreach (ozellikresimler() as $ozellikresim): ?>
                        <li style="display:inline;">
                            <img style="margin:3px 1px 2px 2px" width="50" height="50"
                                 src="<?php echo base_url();
                                 echo $ozellikresim['resim']; ?>" alt="<?php echo $ozellikresim['ozellik']; ?>">
                        </li>
                    <?php endforeach; ?>
                </ul>


                <ul style="list-style:none;">
                    <?php foreach (ozellikbasliklar() as $ozellikbaslik): ?>
                        <li>
                            <span style="font-size:24px;" class="ion-checkmark"></span>
                            <a style="margin-left:15px"><?php echo $ozellikbaslik['ozellik']; ?> </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>


            <hr style="margin-top:70px;margin-bottom:70px">


            <div class="blockquote">
                <p style="font-size:36px;color:#D2691E;"><b>Sertifikalar</b></p>
            </div>


            <div style="margin-top:30px" class="row">


                <?php foreach (hakkimdasertifika() as $sertifika): ?>
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="<?php echo base_url('');
                            echo $sertifika['resim']; ?>" data-lightbox="gallery-mf">
                                <div class="work-img">
                                    <img src="<?php echo base_url('');
                                    echo $sertifika['resim']; ?>"
                                         alt="<?php echo $sertifika['sertifika']; ?>" class="img-fluid">
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>
    </div>
</div>
