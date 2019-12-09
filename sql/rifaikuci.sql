-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 02 Mar 2019, 18:54:45
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `rifaikuci`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(50) NOT NULL,
  `ozellik` varchar(50) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `site_adi` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `adsoyad`, `ozellik`, `site_url`, `site_adi`, `version`, `resim`) VALUES
(12, 'Rifai Kuçi', 'rifaikuci CEO ', 'http://www.rifaikuci.com', 'rifaikuci.com', '1.0.0', 'assets/front/img/admin/4be5179e7b8f84eb7177ee2abfdecaf6.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblarkaplan`
--

CREATE TABLE `tblarkaplan` (
  `id` int(11) NOT NULL,
  `resim` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblarkaplan`
--

INSERT INTO `tblarkaplan` (`id`, `resim`) VALUES
(1, 'assets/front/img/arkaplan/13de7d7c357efac4c4a3bbaa14601c16.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbldil`
--

CREATE TABLE `tbldil` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `seoAd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbldil`
--

INSERT INTO `tbldil` (`id`, `ad`, `seoAd`) VALUES
(1, 'Türkçe - Ana dil', 'turkce-ana-dil'),
(2, 'İngilizce', 'ingilizce'),
(3, 'Arapça', 'arapca');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblegitim`
--

CREATE TABLE `tblegitim` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `seoAd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblegitim`
--

INSERT INTO `tblegitim` (`id`, `ad`, `seoAd`) VALUES
(1, 'İskenderpaşa İlköğretim Okulu   2003 - 2011', 'iskenderpasa-ilkogretim-okulu-2003-2011'),
(2, 'İstanbul Anadolu İmam Hatip Lisesi   2011 - 2015', 'istanbul-anadolu-imam-hatip-lisesi-2011-2015'),
(4, 'Mehmet Akif Ersoy Üniversitesi   2016 - 3.Sınf Olarak Devam etmekte', 'mehmet-akif-ersoy-universitesi-2016-3-sinf-olarak-devam-etmekte');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblgenelayar`
--

CREATE TABLE `tblgenelayar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `logotitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblgenelayar`
--

INSERT INTO `tblgenelayar` (`id`, `title`, `resim`, `logotitle`) VALUES
(3, 'RifaiKuçi | rifaikuci.com', 'assets/front/img/arkaplan/aa16d50aeda4955cc11e471f632c58f1.jpg', 'RifaiKuçi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblgununsozu`
--

CREATE TABLE `tblgununsozu` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(100) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `durum` int(11) NOT NULL,
  `gununsozu` text NOT NULL,
  `seogununsozu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblgununsozu`
--

INSERT INTO `tblgununsozu` (`id`, `adsoyad`, `resim`, `durum`, `gununsozu`, `seogununsozu`) VALUES
(9, 'Cemil Meriç', 'assets/front/img/gununsozu/19c9fcd9cab1bd0c5dda673d93c7ea4f.jpg', 1, '<p>Nereye gidersen git, bulacağın aydınlık, zihninin aydınlığı kadar olacaktır.</p>\r\n', 'nereye-gidersen-git-bulacagin-aydinlik-zihninin-aydinligi-kadar-olacaktir'),
(10, 'Cemil Meriç', 'assets/front/img/gununsozu/6bc59400b1b859be8e3f9b9ed088121d.jpg', 1, '<p>İnsanlar sevilmek i&ccedil;in yaratıldılar, eşyalar ise kullanılmak i&ccedil;in.</p>\r\n\r\n<p>D&uuml;nyadaki kaosun nedeni; eşyaların sevilmeleri ve insanların kullanılmalarıdır.</p>\r\n', 'insanlar-sevilmek-i-ccedil-in-yaratildilar-esyalar-ise-kullanilmak-i-ccedil-in-p-p-d-uuml-nyadaki-kaosun-nedeni-esyalarin-sevilmeleri-ve-insanlarin-kullanilmalaridir'),
(11, 'Cemil Meriç', 'assets/front/img/gununsozu/d3c6e258d51fde240be0171ddaadc1a6.jpg', 1, '<p>&nbsp;Me&ccedil;hule a&ccedil;ılan bir kapıdır kitap. Me&ccedil;hule, yani masala, esrara, sonsuza.</p>\r\n', 'nbsp-me-ccedil-hule-a-ccedil-ilan-bir-kapidir-kitap-me-ccedil-hule-yani-masala-esrara-sonsuza'),
(12, 'Cemil Meriç', 'assets/front/img/gununsozu/8a390670fdc1f12ae201f4fddbae3422.jpg', 1, '<p>Hayat herkesin yaşadığı, kimsenin yaşamaktan hoşlanmadığı komedya.</p>\r\n', 'hayat-herkesin-yasadigi-kimsenin-yasamaktan-hoslanmadigi-komedya'),
(13, 'Cemil Meriç', 'assets/front/img/gununsozu/00853520ec4527e1c37977cacaea1d6a.jpg', 2, '<p>Olimpos dağının &ccedil;ocukları, Hira dağının evlatlarını asla kabullenemeyecektir.</p>\r\n', 'olimpos-daginin-ccedil-ocuklari-hira-daginin-evlatlarini-asla-kabullenemeyecektir'),
(14, 'Cemil Meriç', 'assets/front/img/gununsozu/87c25fc03550991513a26aba51b51237.jpg', 1, '<p>Kahramanlık, hatada ısrar etmemektir.</p>\r\n', 'kahramanlik-hatada-israr-etmemektir'),
(15, 'Cemil Meriç', 'assets/front/img/gununsozu/bd3883d9efd94d3dcab24d76d42b4832.jpg', 1, '<p><strong>G&uuml;neş &uuml;lkeleri aydınlatır, s&ouml;zler milleti.</strong></p>\r\n', 'strong-g-uuml-nes-uuml-lkeleri-aydinlatir-s-ouml-zler-milleti-strong'),
(16, 'Cemil Meriç', 'assets/front/img/gununsozu/8a51246036d4616b5a6fd07bb2f9f227.jpg', 1, '<p>Kitap, zekayı kibarlaştırır.</p>\r\n', 'kitap-zekayi-kibarlastirir');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblheadmenu`
--

CREATE TABLE `tblheadmenu` (
  `id` int(11) NOT NULL,
  `headAdi` varchar(50) NOT NULL,
  `headSeoAd` varchar(50) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblheadmenu`
--

INSERT INTO `tblheadmenu` (`id`, `headAdi`, `headSeoAd`, `tarih`, `durum`) VALUES
(12, 'Anasayfa', 'anasayfa', '2019-02-06 09:06:07', 1),
(13, 'Hakkımda', 'hakkimda', '2019-02-06 09:06:16', 1),
(14, 'Projelerİm', 'projelerim', '2019-02-06 09:06:32', 1),
(15, 'Yazılar', 'yazilar', '2019-02-06 09:06:40', 1),
(16, 'Çok Okunan', 'cok-okunan', '2019-02-06 09:07:24', 1),
(17, 'İletİşİm', 'iletisim', '2019-02-06 09:07:31', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblicon`
--

CREATE TABLE `tblicon` (
  `id` int(11) NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblicon`
--

INSERT INTO `tblicon` (`id`, `resim`) VALUES
(1, 'assets/front/img/icon/8d5e7f037662db727ce1e4e464e78b2f.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbliletisim`
--

CREATE TABLE `tbliletisim` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `konu` varchar(100) NOT NULL,
  `mesaj` text NOT NULL,
  `ip` varchar(100) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT '0',
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbliletisim`
--

INSERT INTO `tbliletisim` (`id`, `adsoyad`, `mail`, `konu`, `mesaj`, `ip`, `durum`, `tarih`) VALUES
(14, 'Rifai Kuçi', 'rfai0747@gmail.com', 'ererreer', 'dssdsdsddssd', '::1', 1, '2019-02-07 13:25:08'),
(15, 'Rifai Kuçi', 'rfai0747@gmail.com', 'neden eski gençlik', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', '::1', 1, '2019-02-07 21:10:56'),
(16, 'Rifai Kuçi', 'rfai0747@gmail.com', 'YENİ gönderdim', 'sddssdsdssd', '::1', 1, '2019-02-19 11:27:22'),
(17, 'Rifai Kuçi', 'rfai0747@gmail.com', 'MeSAJ Hondermedi', 'sssdssddssdsds', '::1', 0, '2019-02-19 13:51:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblkategoriler`
--

CREATE TABLE `tblkategoriler` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `seoAd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblkategoriler`
--

INSERT INTO `tblkategoriler` (`id`, `ad`, `seoAd`) VALUES
(6, 'Php Programlama', 'php-programlama'),
(7, 'C Sharp', 'c-sharp'),
(8, 'Android  Mobil Programlama', 'android-mobil-programlama'),
(9, 'kategori proje', 'kategori-proje');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblokunacak`
--

CREATE TABLE `tblokunacak` (
  `id` int(11) NOT NULL,
  `kitapadi` varchar(100) NOT NULL,
  `yazaradi` varchar(100) NOT NULL,
  `resim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblokunacak`
--

INSERT INTO `tblokunacak` (`id`, `kitapadi`, `yazaradi`, `resim`) VALUES
(1, '19845', 'George Orwellasaa', 'assets/front/img/kitaplar/okunacak/aedcdbcc378a6c6a9a9f506b3f4eaa2d.png'),
(2, 'ekle bir tane', 'denememe', 'assets/front/img/kitaplar/okunacak/22904339.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblokunan`
--

CREATE TABLE `tblokunan` (
  `id` int(11) NOT NULL,
  `kitapadi` varchar(100) NOT NULL,
  `yazaradi` varchar(100) NOT NULL,
  `yayinevi` varchar(100) NOT NULL,
  `sayfa` int(11) NOT NULL,
  `baslatarihi` datetime NOT NULL,
  `bitistarihi` datetime NOT NULL,
  `sure` int(11) NOT NULL,
  `resim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblokunan`
--

INSERT INTO `tblokunan` (`id`, `kitapadi`, `yazaradi`, `yayinevi`, `sayfa`, `baslatarihi`, `bitistarihi`, `sure`, `resim`) VALUES
(6, 'Siraci Münir', 'Saffet Bakırcı', 'Serendib', 205, '2017-01-01 00:00:00', '2017-01-04 00:00:00', 3, 'assets/front/img/kitaplar/okunan/594e156ccc4c0380abd8c2d03877402c.jpg'),
(7, 'Riyazus Salihin', 'İmam Nevevi', 'Kitap Dünyası', 614, '2017-01-04 00:00:00', '2017-01-10 00:00:00', 6, 'assets/front/img/kitaplar/okunan/0ed3a6c5bec40e12ddaf595708dabf51.jpg'),
(8, 'Erbain Kırk Yılın Şiirleri', 'İsmet Özel', 'Tiyo Yayınları', 240, '2017-01-12 00:00:00', '2017-01-14 00:00:00', 2, 'assets/front/img/kitaplar/okunan/5d4061f69891c5f39ef8036ca4c34c17.jpg'),
(9, 'Çile', 'Necip Fazıl Kısakürek', 'Büyük Doğu', 512, '2017-01-15 00:00:00', '2017-01-22 00:00:00', 7, 'assets/front/img/kitaplar/okunan/74d8248b5659e10fc5868ed2972c5cd6.jpg'),
(10, 'Kürk Mantolu Madonna', 'Sabahattin Ali', 'Yapı Kredi Yayınları', 164, '2017-01-23 00:00:00', '2017-01-26 00:00:00', 3, 'assets/front/img/kitaplar/okunan/7e4a19c6fa7038e5b7f5b8008b7c8b2b.jpg'),
(11, 'Kısa Açıklamalı Kuranı  Kerim Meali', 'Mahmud Kıssa', 'Kervan', 584, '2017-01-27 00:00:00', '2017-02-15 00:00:00', 19, 'assets/front/img/kitaplar/okunan/c7cd17adb641e5cba6b9eb4d6ce3ba33.jpg'),
(12, 'Bana İkimizi Anlat', 'Ahmet Batman', 'Destek', 184, '2017-02-16 00:00:00', '2017-02-18 00:00:00', 2, 'assets/front/img/kitaplar/okunan/5f80df308caf1285f44f05a70204da97.jpg'),
(13, 'Korkma Kalbim', 'Ahmet Batman', 'Destek', 216, '2017-02-19 00:00:00', '2017-02-22 00:00:00', 3, 'assets/front/img/kitaplar/okunan/eabf302ec58d4e428c971c14d4c8d7e3.jpg'),
(14, 'Gökyüzüne Not', 'Ahmet Batman', 'Destek', 216, '2017-02-23 00:00:00', '2017-02-28 00:00:00', 5, 'assets/front/img/kitaplar/okunan/869d340f718b6f12e66564a5829ad7de.jpg'),
(15, '30 Adımda Özgüven', 'Sam Horn', 'Koridor', 432, '2017-03-01 00:00:00', '2017-03-11 00:00:00', 10, 'assets/front/img/kitaplar/okunan/77b77f1b50c8210c783d98eb82092103.jpg'),
(16, 'Elif Gibi Sevmek 1 ', 'Hikmet Anıl Öztekin', 'Hayy Kitap', 192, '2017-03-12 00:00:00', '2017-03-16 00:00:00', 4, 'assets/front/img/kitaplar/okunan/b1301b90b6c62e19b1f0fb0d15e9463b.jpg'),
(17, 'Elif Gibi Sevmek 2', 'Hikmet Anıl Öztekin', 'Hayy Kitap', 383, '2017-03-17 00:00:00', '2017-03-25 00:00:00', 8, 'assets/front/img/kitaplar/okunan/7599b74c9d98ea47dccc68abc5121773.jpg'),
(18, 'Aklından Bir Sayı Tut', 'John Verdon', 'Koridor', 480, '2017-03-26 00:00:00', '2017-04-10 00:00:00', 15, 'assets/front/img/kitaplar/okunan/125e2d743af6966c9166f190f511bba8.jpg'),
(19, 'Sil Baştan', 'Ken Grimwood', 'Koridor', 381, '2017-04-10 00:00:00', '2017-04-20 00:00:00', 10, 'assets/front/img/kitaplar/okunan/51fff33ea84c98b6844fab82040c0b2e.jpg'),
(20, 'Gözlerini Sımsıkı Kapat', 'John Verdon', 'Koridor', 566, '2017-04-21 00:00:00', '2017-05-01 00:00:00', 10, 'assets/front/img/kitaplar/okunan/cff83a64fb3b9ecb9291a0c7eefba4c9.jpg'),
(21, 'Zeka Oyunları', 'Maurice Leblanc', 'Tutku', 366, '2017-05-02 00:00:00', '2017-05-07 00:00:00', 5, 'assets/front/img/kitaplar/okunan/5cbe18dcff00ef3ee746721d88f44059.jpg'),
(22, 'Şah Sultan', 'İskender Pala', 'Kapı', 390, '2017-05-08 00:00:00', '2017-05-15 00:00:00', 7, 'assets/front/img/kitaplar/okunan/e1e38998429dee89c3bdcecfb2bae5b0.jpg'),
(23, 'Od', 'İskender Pala', 'Kapı', 381, '2017-05-16 00:00:00', '2017-05-24 00:00:00', 8, 'assets/front/img/kitaplar/okunan/d83d08b46c1a455066a40cde73b810e6.jpg'),
(24, 'Kayıt Dışı Tarihimiz', 'Yavuz Bahadıroğlu', 'Nesil', 290, '2017-06-25 00:00:00', '2017-07-01 00:00:00', 6, 'assets/front/img/kitaplar/okunan/960afa9b6582c8d43eca1d70fd778112.jpg'),
(25, 'Muhteşem Süleyman ve Hürrem Sultan', 'Yavuz Bahadıroğlu', 'Panama', 320, '2017-07-02 00:00:00', '2017-07-08 00:00:00', 6, 'assets/front/img/kitaplar/okunan/1d7a917c9960f315ba6363ab96342913.jpg'),
(26, 'Malazgirtte Bir Cuma Sabahı', 'Yavuz Bahadıroğlu', 'Nesil', 220, '2017-07-09 00:00:00', '2017-07-14 00:00:00', 5, 'assets/front/img/kitaplar/okunan/05592f984673a69b7397a038476845fc.jpg'),
(27, 'Osmancık', 'Tarık Buğra', 'Ötüken', 366, '2017-07-15 00:00:00', '2017-07-24 00:00:00', 9, 'assets/front/img/kitaplar/okunan/672ea6708616277db8c4c5152c768600.jpg'),
(28, 'Gözlerini Haramdan Sakın', 'Merve Özcan', 'Portakal', 512, '2017-07-25 00:00:00', '2017-08-01 00:00:00', 7, 'assets/front/img/kitaplar/okunan/6c101e781409bf8e83beb63408bd4f24.jpg'),
(29, '4N1K', 'Büşra Yılmaz', 'Epsilon', 400, '2017-08-02 00:00:00', '2017-08-08 00:00:00', 6, 'assets/front/img/kitaplar/okunan/aa47bf30ca7c59c246acb4a1b5c259fb.jpg'),
(30, 'Mahalleden Arkadaşlar', 'Büşra Yılmaz', 'Sayfa6', 224, '2017-08-09 00:00:00', '2017-08-14 00:00:00', 5, 'assets/front/img/kitaplar/okunan/bbe1c7365bc157ad04529f66de6a81f1.jpg'),
(31, 'Yoldaki Mühendis', 'Abdullah Bergusi', 'Ekin', 200, '2017-08-15 00:00:00', '2017-08-19 00:00:00', 4, 'assets/front/img/kitaplar/okunan/ea6366c56f6043594e43a38b4c9d009a.jpg'),
(32, 'Mavi Kırmızı', 'Ramazan Kayan', 'Çıra', 180, '2017-08-20 00:00:00', '2017-08-22 00:00:00', 2, 'assets/front/img/kitaplar/okunan/2d20b27c87226e5b0829e44881e97c5c.jpg'),
(33, 'Vefa', 'Bedriye Zobu', 'Epsilon', 259, '2017-08-23 00:00:00', '2017-08-31 00:00:00', 8, 'assets/front/img/kitaplar/okunan/7e64e51587066c93dc7b86eef202ef1f.jpg'),
(34, 'Soğuk', 'Bedriye Zobu', 'Epsilon', 482, '2017-09-01 00:00:00', '2017-09-12 00:00:00', 11, 'assets/front/img/kitaplar/okunan/76760978be54a633b7628625078ea82b.jpg'),
(35, 'Hamza', 'Ömer Faruk Dönmez', 'İz', 224, '2017-09-13 00:00:00', '2017-09-18 00:00:00', 5, 'assets/front/img/kitaplar/okunan/91d9769eddfcc0ab943ab7766910c3ba.jpg'),
(36, 'Allah İnsana Ne Demişti', 'Feyzullah Birışık', 'Polen', 240, '2017-09-19 00:00:00', '2017-09-23 00:00:00', 4, 'assets/front/img/kitaplar/okunan/51caef5d4ad5d0badd0875b08dfce74e.jpg'),
(37, 'Her Şeyi Allahtan İste', 'Gazanfer Şanlıtop', 'Hayat', 216, '2017-09-24 00:00:00', '2017-09-30 00:00:00', 6, 'assets/front/img/kitaplar/okunan/fefa1f50c0e2f8755c99fd2b528cb6a6.jpg'),
(38, 'Pirandan Yükselen Feryat', 'Sadullah Aydın', 'İhsan', 199, '2017-10-01 00:00:00', '2017-10-05 00:00:00', 4, 'assets/front/img/kitaplar/okunan/84ea713855006c6f81c5c4eb88cbb8f2.jpg'),
(39, 'Kurana Göre 4 Terim', 'Mevdudi', 'Beyan', 126, '2017-10-06 00:00:00', '2017-10-10 00:00:00', 4, 'assets/front/img/kitaplar/okunan/a938bb10c127b28dee9862bfeeaf46c1.jpg'),
(40, 'Avucumuzdaki Kelebekler', 'Ahmet Şerif İzgören', 'Elma', 126, '2017-10-16 00:00:00', '2017-10-20 00:00:00', 4, 'assets/front/img/kitaplar/okunan/46e8fdd49e3fdf75f54cbe2e3364c625.jpg'),
(41, 'Düşünüyorsam Öyleyse Deliyim', 'Jochen Mai, Daniel Rettig', 'Pegasus', 384, '2017-10-21 00:00:00', '2017-10-31 00:00:00', 10, 'assets/front/img/kitaplar/okunan/5bc9f83ea2613364639ec8978267f94c.jpg'),
(42, 'Şu Hortumlu Dünyada Fil Yalnız Bir Hayvandır', 'Ahmet Şerif İzgören', 'Elma', 226, '2017-11-01 00:00:00', '2017-11-05 00:00:00', 4, 'assets/front/img/kitaplar/okunan/bb7a083dbc33c7de64879ad104f94aea.jpg'),
(43, 'Otomatik Portakal', 'Anthony Burgess', 'Türkiye İş Bankası', 172, '2017-11-06 00:00:00', '2017-11-12 00:00:00', 6, 'assets/front/img/kitaplar/okunan/06b5f7a633c31220113f0035e57fe31b.jpg'),
(44, '40 ının da Kulpu Kırık 40 Türk', 'Ahmet Şerif İzgören', 'İzgören', 192, '2017-11-13 00:00:00', '2017-11-15 00:00:00', 2, 'assets/front/img/kitaplar/okunan/864fe9528ff67e193fdc504be866d348.jpg'),
(45, 'Sad Bin Ebi Vakkas', 'Muhammed Emin Yıldırım', 'Siyer', 166, '2017-11-19 00:00:00', '2017-11-22 00:00:00', 3, 'assets/front/img/kitaplar/okunan/6372cb7d59628cba8e2e5b09884076d5.jpg'),
(46, 'Süpermen ve Uğur Böceği', 'Ahmet Şerif İzgören', 'Elma', 191, '2017-11-23 00:00:00', '2017-11-26 00:00:00', 3, 'assets/front/img/kitaplar/okunan/12c4c8f179f71c6eda6174ca8c21c5df.jpg'),
(47, 'Ebu Ubeyde Bin Cerrah', 'Muhammed Emin Yıldırım', 'Siyer', 150, '2017-11-26 00:00:00', '2017-11-30 00:00:00', 4, 'assets/front/img/kitaplar/okunan/079a41693c1355fc51deb46d2633724e.jpg'),
(48, 'Dünya Görüşü ve İdeoloji', 'Ali Şeriati', 'Fecr', 384, '2017-12-01 00:00:00', '2017-12-06 00:00:00', 5, 'assets/front/img/kitaplar/okunan/893d63059f046c52cb5d28ee36dae6b7.jpg'),
(49, 'Şah Baba', 'Murat Bardakçı', 'İnkılap', 676, '2017-12-07 00:00:00', '2017-12-18 00:00:00', 11, 'assets/front/img/kitaplar/okunan/50a62d8df8a99dd18d7c27ee9898e345.jpg'),
(50, 'Namaz Bir Tevhid Eylemi', 'Abdullah Yıldız', 'Pınar', 200, '2017-12-19 00:00:00', '2017-12-21 00:00:00', 2, 'assets/front/img/kitaplar/okunan/e338a706bccf0d9000ac022e56a17079.jpg'),
(51, 'Kavgam', 'Adolf Hitler', 'Perseus', 660, '2017-12-22 00:00:00', '2017-12-31 00:00:00', 9, 'assets/front/img/kitaplar/okunan/b1a6289e73a238d38a39337f6d45277b.jpg'),
(52, 'Nietzche Ağladığında', 'Irwin D. Yalom', 'Ayrıntı', 374, '2018-01-01 00:00:00', '2018-01-09 00:00:00', 8, 'assets/front/img/kitaplar/okunan/5d02edba929a582490a376495c385260.jpg'),
(53, 'Hayatın Farkında Olmak', 'Bünyamin Çetinkaya', 'Pegem', 156, '2018-01-09 00:00:00', '2018-01-12 00:00:00', 3, 'assets/front/img/kitaplar/okunan/adcb5e3be70b8857ba12595764b41989.jpg'),
(54, 'Olgunluk Günahtan Sakınmaktır', 'İsmail Çetin', 'Dilara', 288, '2018-01-13 00:00:00', '2018-01-19 00:00:00', 6, 'assets/front/img/kitaplar/okunan/3e0c6d036441240e042dbb05a578a7a5.jpg'),
(55, 'İtirazım Var', 'Yusuf Efe Göçer', 'Carpe Dieam', 159, '2018-01-20 00:00:00', '2018-01-25 00:00:00', 5, 'assets/front/img/kitaplar/okunan/ac8ebe320b90207683b01176fcb5477d.jpg'),
(56, 'Beş Şehir', 'Ahmet Hamdi Tanpınar', 'Dergah', 224, '2018-01-25 00:00:00', '2018-01-29 00:00:00', 4, 'assets/front/img/kitaplar/okunan/fc9ccaca83d6f2ab4220d17b61822cfc.jpg'),
(57, '1984', 'George Orwell', 'Can', 350, '2018-01-30 00:00:00', '2018-02-09 00:00:00', 10, 'assets/front/img/kitaplar/okunan/d3481c9adbce9969139ad0e717477f9e.jpg'),
(58, 'Bülbülü Öldürmek', 'Harper Lee', 'Sel', 357, '2018-02-10 00:00:00', '2018-02-17 00:00:00', 7, 'assets/front/img/kitaplar/okunan/64b4c11f43fde104458f1607903daf65.jpg'),
(59, 'Son Elçi', 'Günay Bayburt Kesler', 'Çıra', 604, '2018-02-17 00:00:00', '2018-03-01 00:00:00', 12, 'assets/front/img/kitaplar/okunan/cbf8bdc5369d1b56706a31da8215e4fc.jpg'),
(60, 'Dirilt Kalbini', 'Nouman Ali Khan', 'Timaş', 222, '2018-03-01 00:00:00', '2018-03-05 00:00:00', 4, 'assets/front/img/kitaplar/okunan/9e138d55d9980143c7f76e6ecf42a48f.jpg'),
(61, 'Kardeşlik Çağrısı', 'Ramazan Kayan', 'Çıra', 128, '2018-03-05 00:00:00', '2018-03-06 00:00:00', 1, 'assets/front/img/kitaplar/okunan/9a7ffa9eef78b7334c8d2a8d19e7e22f.jpg'),
(62, 'Hür Yürekli Genç', 'Nureddin Yıldız', 'Tahlil', 270, '2018-03-07 00:00:00', '2018-03-12 00:00:00', 5, 'assets/front/img/kitaplar/okunan/18a5365acc166f1e087a59ce157ced60.jpg'),
(63, 'El-edebül Müfred', 'İmam Buhari', 'Beka', 512, '2018-03-12 00:00:00', '2018-03-21 00:00:00', 9, 'assets/front/img/kitaplar/okunan/75f656e7fc65124a706c47963017d641.jpg'),
(64, 'Vahiyle Varolmak', 'Ramazan Kayan', 'Çıra', 151, '2018-03-21 00:00:00', '2018-03-23 00:00:00', 2, 'assets/front/img/kitaplar/okunan/ab516c36965d1f18e7b569d3e3652c87.jpg'),
(65, 'Arınma Yolu 1 ', 'Abdülhamid Bilali', 'Buruc', 313, '2018-03-24 00:00:00', '2018-03-28 00:00:00', 4, 'assets/front/img/kitaplar/okunan/c72bed145e0248e656ca7fdfb73a83e0.jpg'),
(66, 'Arınma Yolu 2', 'Abdülhamid Bilali', 'Buruc', 151, '2018-03-29 00:00:00', '2018-04-01 00:00:00', 3, 'assets/front/img/kitaplar/okunan/d5a9adcdcd7d41950bd706153b5c15f1.jpg'),
(67, 'Diriliş Muştusu', 'Sezai Karakoç', 'Diriliş', 131, '2018-04-01 00:00:00', '2018-04-07 00:00:00', 6, 'assets/front/img/kitaplar/okunan/5cac5f37f43bcc25c2f58a3f8ec59480.jpg'),
(68, 'İnsani İlişkilerde İlahi Ölçü', 'Muhammed Emin Yıldırım', 'Siyer', 252, '2018-04-07 00:00:00', '2018-04-10 00:00:00', 3, 'assets/front/img/kitaplar/okunan/311189b955cde753e4720010a4b2f379.jpg'),
(69, 'Çıkış Yolu Nerede', 'Mecdi El Hilali', 'Beka', 120, '2018-04-10 00:00:00', '2018-04-10 00:00:00', 0, 'assets/front/img/kitaplar/okunan/016cbc0602ae6b1de9a42756e54ceaa0.jpg'),
(70, 'Öncelikler Fıkhı', 'Yusuf El Kardavi', 'Nida', 334, '2018-04-11 00:00:00', '2018-04-19 00:00:00', 8, 'assets/front/img/kitaplar/okunan/128341d844ab875f200557629ccbe63d.jpg'),
(71, 'Davet Esasları', 'Hasan El Benna', 'Nida', 230, '2018-04-19 00:00:00', '2018-04-23 00:00:00', 4, 'assets/front/img/kitaplar/okunan/309c84835b1e09cf937fe05ed1aef02c.jpg'),
(72, 'Rahmet Peygamberi', 'Nedvi', 'İz', 456, '2018-04-23 00:00:00', '2018-05-10 00:00:00', 17, 'assets/front/img/kitaplar/okunan/438ba1ecca8f3db2a9a0b0a2a0f07657.jpg'),
(73, 'Tapusuz Süleyman', 'Mehmet Alagaş', 'İnsan', 158, '2018-05-10 00:00:00', '2018-05-15 00:00:00', 5, 'assets/front/img/kitaplar/okunan/1e604c977aeb49ede9b3a31d110833b0.jpg'),
(74, 'Peygamber Efendimizin Eğitim Methodu', 'İbrahim Halil Er', 'Öğder', 222, '2018-05-15 00:00:00', '2018-06-08 00:00:00', 24, 'assets/front/img/kitaplar/okunan/358908ea86c3b3282e3d7c462dea032e.jpg'),
(75, 'Kumarbaz', 'Dostoyevski', 'Karaca', 191, '2018-06-09 00:00:00', '2018-07-03 00:00:00', 24, 'assets/front/img/kitaplar/okunan/ea503676ea8f887aebb48781b6d3c98f.jpg'),
(76, 'İslam Diyen Kızlar', 'İhsan Şenocak', 'Hüküm Kitap', 273, '2018-07-04 00:00:00', '2018-07-16 00:00:00', 12, 'assets/front/img/kitaplar/okunan/39ffcdfa2c5376f39268ea365b2c5fe3.jpg'),
(77, 'Dönüşüm', 'Franz Kafka', 'Nora', 79, '2018-07-17 00:00:00', '2018-07-23 00:00:00', 6, 'assets/front/img/kitaplar/okunan/2a92e7e473dadcd149da863e392be631.jpg'),
(78, 'Hayata Yön Veren Hikayeler', 'Kahraman  Arslan', 'Neden Kitap', 295, '2018-07-24 00:00:00', '2018-08-01 00:00:00', 8, 'assets/front/img/kitaplar/okunan/6558352c8dd4ddabf86acd5c4e661dff.jpg'),
(79, 'Hesap Günü', 'Mustafa Kutlu', 'Dergah', 157, '2018-08-01 00:00:00', '2018-08-04 00:00:00', 3, 'assets/front/img/kitaplar/okunan/e333f101d19edc58ef456512bc5d2301.jpg'),
(80, 'Allah Resülünü Görenler', 'Ömer Döngeloğlu', 'Timaş', 192, '2018-08-05 00:00:00', '2018-08-12 00:00:00', 7, 'assets/front/img/kitaplar/okunan/223e272afa083b55022f709c92cecdcf.jpg'),
(81, 'Sis ve Gece', 'Ahmet Ümit', 'Everest', 439, '2018-08-13 00:00:00', '2018-09-02 00:00:00', 20, 'assets/front/img/kitaplar/okunan/7629a210977da952be76c9054d08700e.jpg'),
(82, 'Elveda Güzel Vatanım', 'Ahmet Ümit', 'Everest', 776, '2018-09-02 00:00:00', '2018-09-25 00:00:00', 23, 'assets/front/img/kitaplar/okunan/0acf7c973a4daec9af0e72a85076186b.jpg'),
(83, 'Sol Ayağım', 'Christy Brown', 'Nemesis', 189, '2018-09-25 00:00:00', '2018-10-03 00:00:00', 8, 'assets/front/img/kitaplar/okunan/6695a27675cefc5038f78dfd57b0545a.jpg'),
(84, 'Mutluluk', 'Zülfü Livaneli', 'Doğan Kitap', 376, '2018-10-09 00:00:00', '2018-10-21 00:00:00', 12, 'assets/front/img/kitaplar/okunan/f0b8fff7ab78df9def664d7d0a5736f5.jpg'),
(85, 'Doğal Aile', 'Nureddin Yıldız', 'Tahlil', 297, '2018-10-21 00:00:00', '2018-10-25 00:00:00', 4, 'assets/front/img/kitaplar/okunan/712505a5bf90f2891fa4767b71bd5735.jpg'),
(86, 'Adaletin Esasları', 'Gazali', 'Ezr', 143, '2018-10-26 00:00:00', '2018-10-29 00:00:00', 3, 'assets/front/img/kitaplar/okunan/31c0b35218c0be40439b12f52f2ceee5.jpg'),
(87, 'Mümin Kimliğimiz', 'Nureddin Yıldız', 'Tahlil', 320, '2018-10-30 00:00:00', '2018-11-07 00:00:00', 8, 'assets/front/img/kitaplar/okunan/1a63edda4e15e4d63bb7787ca66747d5.jpg'),
(88, 'Minyeli Abdullah', 'Hekimoğlu İsmail', 'Mihrab', 270, '2018-11-07 00:00:00', '2018-11-13 00:00:00', 6, 'assets/front/img/kitaplar/okunan/a6d933ee7dcc6b3025852b72c6346c5e.jpg'),
(89, 'Bu Zamanın Sabrı', 'Nureddin Yıldız', 'Tahlil', 287, '2018-11-14 00:00:00', '2018-11-26 00:00:00', 12, 'assets/front/img/kitaplar/okunan/b543394b417a721d05d9f02b9f2dba0f.jpg'),
(90, 'Yoldaki İşaretler', 'Seyyid Kutub', 'Pınar', 222, '2018-11-26 00:00:00', '2018-12-12 00:00:00', 16, 'assets/front/img/kitaplar/okunan/03a2575c38da29fab27d93a02007e218.jpg'),
(91, 'Müslümanların Gerilemesiyle Dünya Neler Kaybetti', 'Nedvi', 'Kayıhan', 416, '2018-12-13 00:00:00', '2018-12-20 00:00:00', 7, 'assets/front/img/kitaplar/okunan/3fc94071e84e6e2f553dd51e085ae236.jpg'),
(92, 'Elbette Allahuekber', 'Nureddin Yıldız', 'Tahlil', 200, '2018-12-22 00:00:00', '2019-01-01 00:00:00', 10, 'assets/front/img/kitaplar/okunan/440bca574c6734adff84043ebb8a0f24.jpg'),
(93, 'İslam Alimlerinin Gözüyle Zamanın Kıymeti', 'Abdulfettah Ebu Gudde', 'Otto', 138, '2018-01-01 00:00:00', '2018-01-06 00:00:00', 5, 'assets/front/img/kitaplar/okunan/853aaa8d7df5ec9c2c23a372ece00ef7.jpg'),
(94, 'İhtilaf ve Tefrikalar Karşısında İslami Tavır', 'Yusuf El Kardavi', 'Nida', 231, '2019-01-07 00:00:00', '2019-01-21 00:00:00', 14, 'assets/front/img/kitaplar/okunan/c298d2c428bdb84f2eb79149ce42a987.jpg'),
(95, 'Devlet', 'Plato', 'Ezr', 127, '2019-01-22 00:00:00', '2019-01-29 00:00:00', 7, 'assets/front/img/kitaplar/okunan/a1d49a41c6e7aa410adca3c273e29533.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblozellikler`
--

CREATE TABLE `tblozellikler` (
  `id` int(11) NOT NULL,
  `ozellik` varchar(100) NOT NULL,
  `seoOzellik` varchar(100) NOT NULL,
  `puan` int(3) NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblozellikler`
--

INSERT INTO `tblozellikler` (`id`, `ozellik`, `seoOzellik`, `puan`, `resim`) VALUES
(11, 'HTML', 'html', 74, 'assets/front/img/ozellik/7727f112f9e1d2d474e09e6350f73e90.png'),
(12, 'CSS', 'css', 52, 'assets/front/img/ozellik/2110c727f7e8eaa6b83be695ee9ead2b.png'),
(14, 'PHP', 'php', 81, 'assets/front/img/ozellik/cd29706e91c7da370e9e5a9f90f7eb60.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblprojeler`
--

CREATE TABLE `tblprojeler` (
  `id` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `seobaslik` varchar(255) NOT NULL,
  `tarih` datetime DEFAULT CURRENT_TIMESTAMP,
  `keywords` varchar(255) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `durum` int(11) NOT NULL,
  `icerik` text NOT NULL,
  `seoicerik` text NOT NULL,
  `hit` int(11) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT 'proje',
  `seogenel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblprojeler`
--

INSERT INTO `tblprojeler` (`id`, `idkategori`, `baslik`, `seobaslik`, `tarih`, `keywords`, `resim`, `durum`, `icerik`, `seoicerik`, `hit`, `type`, `seogenel`) VALUES
(1, 7, 'Rifai ', 'rifai', '2019-03-01 12:35:22', 'Deneme , Son denemeler ', 'assets/front/img/projeler/5dde921a1b9743a7607d195509122c2d.jpg', 1, '<p><strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.<strong>Lorem Ipsum</strong>, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>\r\n', 'p-strong-lorem-ipsum-strong-dizgi-ve-baski-end-uuml-strisinde-kullanilan-migir-metinlerdir-lorem-ipsum-adi-bilinmeyen-bir-matbaacinin-bir-hurufat-numune-kitabi-olusturmak-uuml-zere-bir-yazi-galerisini-alarak-karistirdigi-1500-39-lerden-beri-end-uuml-stri-standardi-sahte-metinler-olarak-kullanilmistir-besy-uuml-z-yil-boyunca-varligini-s-uuml-rd-uuml-rmekle-kalmamis-ayni-zamanda-pek-degismeden-elektronik-dizgiye-de-si-ccedil-ramistir-1960-39-larda-lorem-ipsum-pasajlari-da-i-ccedil-eren-letraset-yapraklarinin-yayinlanmasi-ile-ve-yakin-zamanda-aldus-pagemaker-gibi-lorem-ipsum-s-uuml-r-uuml-mleri-i-ccedil-eren-masa-uuml-st-uuml-yayincilik-yazilimlari-ile-pop-uuml-ler-olmustur-strong-lorem-ipsum-strong-dizgi-ve-baski-end-uuml-strisinde-kullanilan-migir-metinlerdir-lorem-ipsum-adi-bilinmeyen-bir-matbaacinin-bir-hurufat-numune-kitabi-olusturmak-uuml-zere-bir-yazi-galerisini-alarak-karistirdigi-1500-39-lerden-beri-end-uuml-stri-standardi-sahte-metinler-olarak-kullanilmistir-besy-uuml-z-yil-boyunca-varligini-s-uuml-rd-uuml-rmekle-kalmamis-ayni-zamanda-pek-degismeden-elektronik-dizgiye-de-si-ccedil-ramistir-1960-39-larda-lorem-ipsum-pasajlari-da-i-ccedil-eren-letraset-yapraklarinin-yayinlanmasi-ile-ve-yakin-zamanda-aldus-pagemaker-gibi-lorem-ipsum-s-uuml-r-uuml-mleri-i-ccedil-eren-masa-uuml-st-uuml-yayincilik-yazilimlari-ile-pop-uuml-ler-olmustur-p', 0, 'proje', 'p-strong-lorem-ipsum-strong-dizgi-ve-baski-end-uuml-strisinde-kullanilan-migir-metinlerdir-lorem-ipsum-adi-bilinmeyen-bir-matbaacinin-bir-hurufat-numune-kitabi-olusturmak-uuml-zere-bir-yazi-galerisini-alarak-karistirdigi-1500-39-lerden-beri-end-uuml-stri-standardi-sahte-metinler-olarak-kullanilmistir-besy-uuml-z-yil-boyunca-varligini-s-uuml-rd-uuml-rmekle-kalmamis-ayni-zamanda-pek-degismeden-elektronik-dizgiye-de-si-ccedil-ramistir-1960-39-larda-lorem-ipsum-pasajlari-da-i-ccedil-eren-letraset-yapraklarinin-yayinlanmasi-ile-ve-yakin-zamanda-aldus-pagemaker-gibi-lorem-ipsum-s-uuml-r-uuml-mleri-i-ccedil-eren-masa-uuml-st-uuml-yayincilik-yazilimlari-ile-pop-uuml-ler-olmustur-strong-lorem-ipsum-strong-dizgi-ve-baski-end-uuml-strisinde-kullanilan-migir-metinlerdir-lorem-ipsum-adi-bilinmeyen-bir-matbaacinin-bir-hurufat-numune-kitabi-olusturmak-uuml-zere-bir-yazi-galerisini-alarak-karistirdigi-1500-39-lerden-beri-end-uuml-stri-standardi-sahte-metinler-olarak-kullanilmistir-besy-uuml-z-yil-boyunca-varligini-s-uuml-rd-uuml-rmekle-kalmamis-ayni-zamanda-pek-degismeden-elektronik-dizgiye-de-si-ccedil-ramistir-1960-39-larda-lorem-ipsum-pasajlari-da-i-ccedil-eren-letraset-yapraklarinin-yayinlanmasi-ile-ve-yakin-zamanda-aldus-pagemaker-gibi-lorem-ipsum-s-uuml-r-uuml-mleri-i-ccedil-eren-masa-uuml-st-uuml-yayincilik-yazilimlari-ile-pop-uuml-ler-olmustur-prifai-deneme-son-denemeler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblresimler`
--

CREATE TABLE `tblresimler` (
  `id` int(11) NOT NULL,
  `resim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblresimler`
--

INSERT INTO `tblresimler` (`id`, `resim`) VALUES
(2, 'assets/front/img/resimler/work-1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblsertifikalar`
--

CREATE TABLE `tblsertifikalar` (
  `id` int(11) NOT NULL,
  `sertifika` varchar(250) NOT NULL,
  `resim` varchar(250) NOT NULL,
  `seosertifika` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblsertifikalar`
--

INSERT INTO `tblsertifikalar` (`id`, `sertifika`, `resim`, `seosertifika`) VALUES
(2, 'Android', 'assets/front/img/sertifikalar/4cfe887a9011a0e7c6218324f0e41cca.jpg', 'android'),
(3, 'Python', 'assets/front/img/sertifikalar/d6dfcbc2cdff75acc883b1eb31c4ccb9.jpg', 'python'),
(4, 'Codeigniter', 'assets/front/img/sertifikalar/ef0f1bf31c28f17ec519777b8f4ccc6f.jpg', 'codeigniter');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblsite`
--

CREATE TABLE `tblsite` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(100) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `ozellik` varchar(100) NOT NULL,
  `resim` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `hakkimda` text NOT NULL,
  `adres` varchar(255) NOT NULL,
  `footerAd` varchar(100) NOT NULL,
  `footerLink` varchar(100) NOT NULL,
  `durum` int(2) NOT NULL,
  `seoHakkimda` text NOT NULL,
  `hit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblsite`
--

INSERT INTO `tblsite` (`id`, `adsoyad`, `baslik`, `ozellik`, `resim`, `mail`, `telefon`, `hakkimda`, `adres`, `footerAd`, `footerLink`, `durum`, `seoHakkimda`, `hit`) VALUES
(2, 'Rifai Kuçi', 'RifaiKuci', 'Bilgisayar Mühendisliği', 'assets/front/img/site/ddfb47b371e4c0377de8a819df95c570.jpg', 'rfai0747@gmail.com', '+90538 392 8948 ', '<p>1997 Mardin doğumluyum 5 yaşından beri Fatih İstanbulda yaşıyorum. 2016 yılında Mehmet Akif Ersoy &Uuml;niversitesinde (MAK&Uuml;)&nbsp; Bilgisayar m&uuml;hendisliği b&ouml;l&uuml;m&uuml;ne başlayarak yeni bir ser&uuml;vene başlamış oldum . Bu yeni ser&uuml;venle beraber artık gelişen teknolojilere ilgim arttı , okuduğum b&ouml;l&uuml;m gereğide pop&uuml;ler olan uygulamalar ve ara&ccedil;ları sadece kullanmak yerine acaba bunlar nasıl yapılıyor merakı başladı.&nbsp;</p>\r\n\r\n<p>Farklı t&uuml;rlerden kitaplar okuyarak , farklı d&uuml;ş&uuml;ncelere&nbsp;&nbsp;sahip olmayı seviyorum,&nbsp;&nbsp;Okuduğum kitaplar &nbsp; &nbsp;herhangi bir olaya veya &ccedil;alıştığım yazılım sorunlara karşı farklı &ccedil;&ouml;z&uuml;mler &uuml;retmemde ışık oluyor. Televizyon ve m&uuml;zik dinlemekten pek hazetmiyorum , nedense televizyon sanki &ouml;zg&uuml;rl&uuml;ğ&uuml;m&uuml; kısıtlıyor gibi geliyor , farklı d&uuml;ş&uuml;nmeme engelmiş gibi...</p>\r\n\r\n<p>Yazılım geliştiricisiyim , bu sitede de yaptıklarım projeler ile birlikte &ccedil;eşitli makaleler, yazılar paylaşarak bilgilerimi sizlerle paylaşmaktan b&uuml;y&uuml;k bir heyecan&nbsp;duyuyorum.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Fatih / İstanbul', 'Rifai Kuçi', 'https://www.linkedin.com/in/rifai-kuci-817367139/', 1, 'p-1997-mardin-dogumluyum-5-yasindan-beri-fatih-istanbulda-yasiyorum-2016-yilinda-mehmet-akif-ersoy-uuml-niversitesinde-mak-uuml-nbsp-bilgisayar-m-uuml-hendisligi-b-ouml-l-uuml-m-uuml-ne-baslayarak-yeni-bir-ser-uuml-vene-baslamis-oldum-bu-yeni-ser-uuml-venle-beraber-artik-gelisen-teknolojilere-ilgim-artti-okudugum-b-ouml-l-uuml-m-geregide-pop-uuml-ler-olan-uygulamalar-ve-ara-ccedil-lari-sadece-kullanmak-yerine-acaba-bunlar-nasil-yapiliyor-meraki-basladi-nbsp-p-p-farkli-t-uuml-rlerden-kitaplar-okuyarak-farkli-d-uuml-s-uuml-ncelere-nbsp-nbsp-sahip-olmayi-seviyorum-nbsp-nbsp-okudugum-kitaplar-nbsp-nbsp-herhangi-bir-olaya-veya-ccedil-alistigim-yazilim-sorunlara-karsi-farkli-ccedil-ouml-z-uuml-mler-uuml-retmemde-isik-oluyor-televizyon-ve-m-uuml-zik-dinlemekten-pek-hazetmiyorum-nedense-televizyon-sanki-ouml-zg-uuml-rl-uuml-g-uuml-m-uuml-kisitliyor-gibi-geliyor-farkli-d-uuml-s-uuml-nmeme-engelmis-gibi-p-p-yazilim-gelistiricisiyim-bu-sitede-de-yaptiklarim-projeler-ile-birlikte-ccedil-esitli-makaleler-yazilar-paylasarak-bilgilerimi-sizlerle-paylasmaktan-b-uuml-y-uuml-k-bir-heyecan-nbsp-duyuyorum-nbsp-p-p-nbsp-p', 28);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblsmedya`
--

CREATE TABLE `tblsmedya` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `seoAd` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblsmedya`
--

INSERT INTO `tblsmedya` (`id`, `ad`, `seoAd`, `url`) VALUES
(7, 'Linkedin', 'linkedin', 'https://www.linkedin.com/in/rifai-kuci-817367139/'),
(8, 'Github', 'github', 'https://github.com/rfai47'),
(9, 'Youtube', 'youtube', 'https://www.youtube.com/channel/UCPFKbOmcgBaa_HEQxbhhK_Q?view_as=subscriber'),
(10, 'Twitter', 'twitter', 'https://twitter.com/rfai_kuci'),
(11, 'İnstagram', 'instagram', 'https://www.instagram.com/rifaikuci/?hl=tr'),
(12, 'Facebook', 'facebook', 'https://www.facebook.com/profile.php?id=100009579571061');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblyazilar`
--

CREATE TABLE `tblyazilar` (
  `id` int(11) NOT NULL,
  `tur` varchar(255) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `seobaslik` varchar(255) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keywords` varchar(255) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `durum` int(11) NOT NULL,
  `icerik` text NOT NULL,
  `seoicerik` text NOT NULL,
  `hit` int(11) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT 'yazi',
  `seogenel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblyoneticiler`
--

CREATE TABLE `tblyoneticiler` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL DEFAULT '',
  `soyad` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sifre` varchar(100) NOT NULL,
  `sehir` varchar(50) NOT NULL,
  `ilce` varchar(50) NOT NULL,
  `kayitTarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `durum` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tblyoneticiler`
--

INSERT INTO `tblyoneticiler` (`id`, `ad`, `soyad`, `email`, `sifre`, `sehir`, `ilce`, `kayitTarihi`, `durum`) VALUES
(1, 'Rifai', 'Kuçi', 'rfai4747@hotmail.com', 'fc29fa42b214b04709f9d86410347274c795e0a5', 'İstanbul', 'Fatih', '2019-01-21 19:24:58', b'1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblarkaplan`
--
ALTER TABLE `tblarkaplan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbldil`
--
ALTER TABLE `tbldil`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblegitim`
--
ALTER TABLE `tblegitim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblgenelayar`
--
ALTER TABLE `tblgenelayar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblgununsozu`
--
ALTER TABLE `tblgununsozu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblheadmenu`
--
ALTER TABLE `tblheadmenu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblicon`
--
ALTER TABLE `tblicon`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbliletisim`
--
ALTER TABLE `tbliletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblkategoriler`
--
ALTER TABLE `tblkategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblokunacak`
--
ALTER TABLE `tblokunacak`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblokunan`
--
ALTER TABLE `tblokunan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblozellikler`
--
ALTER TABLE `tblozellikler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblprojeler`
--
ALTER TABLE `tblprojeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblresimler`
--
ALTER TABLE `tblresimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblsertifikalar`
--
ALTER TABLE `tblsertifikalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblsite`
--
ALTER TABLE `tblsite`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblsmedya`
--
ALTER TABLE `tblsmedya`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblyazilar`
--
ALTER TABLE `tblyazilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tblyoneticiler`
--
ALTER TABLE `tblyoneticiler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Tablo için AUTO_INCREMENT değeri `tblarkaplan`
--
ALTER TABLE `tblarkaplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `tbldil`
--
ALTER TABLE `tbldil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `tblegitim`
--
ALTER TABLE `tblegitim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `tblgenelayar`
--
ALTER TABLE `tblgenelayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `tblgununsozu`
--
ALTER TABLE `tblgununsozu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Tablo için AUTO_INCREMENT değeri `tblheadmenu`
--
ALTER TABLE `tblheadmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Tablo için AUTO_INCREMENT değeri `tblicon`
--
ALTER TABLE `tblicon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `tbliletisim`
--
ALTER TABLE `tbliletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Tablo için AUTO_INCREMENT değeri `tblkategoriler`
--
ALTER TABLE `tblkategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `tblokunacak`
--
ALTER TABLE `tblokunacak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `tblokunan`
--
ALTER TABLE `tblokunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- Tablo için AUTO_INCREMENT değeri `tblozellikler`
--
ALTER TABLE `tblozellikler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `tblprojeler`
--
ALTER TABLE `tblprojeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `tblresimler`
--
ALTER TABLE `tblresimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `tblsertifikalar`
--
ALTER TABLE `tblsertifikalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `tblsite`
--
ALTER TABLE `tblsite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `tblsmedya`
--
ALTER TABLE `tblsmedya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Tablo için AUTO_INCREMENT değeri `tblyazilar`
--
ALTER TABLE `tblyazilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `tblyoneticiler`
--
ALTER TABLE `tblyoneticiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
