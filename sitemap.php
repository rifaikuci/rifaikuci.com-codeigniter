<?php header('Content-type: application/xml; charset="utf-8"', true); ?>

<urlset
    @xmlns="https://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="https://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="https://www.sitemaps.org/schemas/sitemap/0.9
        https://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <?php



    $site = $_SERVER["https_HOST"]."rifaikuci.com/";
    $tarih = date("Y-m-d");


    $conn = mysqli_connect("localhost", "rifaikuc", "Gt36wwY2x7", "rifaikuc_rifaikuci");
    mysqli_set_charset($conn, 'utf8');
    ?>

    <url>
        <loc>https://<?php echo $site; ?></loc>
        <lastmod><?php echo $tarih; ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>

    <url>
        <loc>https://<?php echo $site; ?>/anasayfa/hakkimda</loc>
        <lastmod><?php echo $tarih; ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>

    <url>
        <loc>https://<?php echo $site; ?>/anasayfa/projeler</loc>
        <lastmod><?php echo $tarih; ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>

    <url>
        <loc>https://<?php echo $site; ?>/anasayfa/yazilar</loc>
        <lastmod><?php echo $tarih; ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>

    <url>
        <loc>https://<?php echo $site; ?>/anasayfa/fereli</loc>
        <lastmod><?php echo $tarih; ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>

    <url>
        <loc>https://<?php echo $site; ?>/anasayfa</loc>
        <lastmod><?php echo $tarih; ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>

    <?php

    $sql = 'SELECT seobaslik,durum FROM tblprojeler where durum=1';
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) { ?>
        <url>
            <loc>https://<?php echo $site; ?>/anasayfa/projedetay/<?php echo $row['seobaslik']; ?></loc>
            <lastmod><?php echo $tarih; ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>1.00</priority>
        </url>
    <?php } ?>

    <?php

    $sql = 'SELECT seobaslik,durum FROM tblyazilar where durum=1';
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) { ?>
        <url>
            <loc>https://<?php echo $site; ?>/anasayfa/yazidetay/<?php echo $row['seobaslik']; ?></loc>
            <lastmod><?php echo $tarih; ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>1.00</priority>
        </url>
    <?php } ?>

    <?php

    $sql = 'SELECT seobaslik,durum FROM tblduyurular where durum=1';
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) { ?>
        <url>
            <loc>https://<?php echo $site; ?>/anasayfa/ferelidetay/<?php echo $row['seobaslik']; ?></loc>
            <lastmod><?php echo $tarih; ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>1.00</priority>
        </url>
    <?php } ?>
</urlset>