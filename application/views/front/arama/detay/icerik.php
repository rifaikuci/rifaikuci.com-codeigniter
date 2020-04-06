<?php
$cookie = $bilgi['seobaslik'];

if (@$_COOKIE[$cookie]) {

} else {
    set_cookie($cookie, $cookie, time() + 3600);


    if ($bilgi['type'] == "proje") {
        projehitarttir($bilgi['id'], $bilgi['hit']);
    } else {
        yazihitarttir($bilgi['id'], $bilgi['hit']);
    }
}
?>

<div class="col-md-8">
    <div class="post-box">

        <div class="post-thumb">
            <img
                    src="<?php echo base_url('');
                    echo $bilgi['resim']; ?>" class="img-fluid"
                    alt="<?php echo $bilgi['baslik']; ?>">
        </div>

        <div class="post-meta">
            <h2 class="article-title"><?php echo $bilgi['baslik']; ?></h2>
            <ul>

                <li>
                    <span class="ion-ios-clock"></span>
                    <a>
                        <?php echo tarih($bilgi['tarih']); ?>
                    </a>
                </li>

                <li>
                    <span class="ion-folder"></span>
                    <a>


                        <?php
                        if ($bilgi['type'] == "proje") {

                            $kategorilerliste = kategoriliste();
                            foreach ($kategorilerliste as $kategorilerliste) {
                                $yazdir = "";

                                if ($kategorilerliste['id'] == $bilgi['idkategori']) {
                                    echo $yazdir = $kategorilerliste['ad'];
                                }
                            }
                        } else {
                            echo $bilgi['idkategori'];
                        } ?>
                    </a>
                </li>
            </ul>
        </div>

        <div class="article-content">
            <?php echo $bilgi['icerik'] ?>
        </div>
    </div>
</div>
