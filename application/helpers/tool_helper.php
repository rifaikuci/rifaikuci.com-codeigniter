<?php


function database(){
    return new basicdb('localhost','rifaikuc_rifaikuci','root', 'mardin47');
}

//Basicdb kullanılanlar başlangıç
function etiketproje()
{
    require_once __DIR__. '/basicdb.php';

    $da = database();

    $querry=$da->from('tblprojeler')->select('keywords,seobaslik,id,durum,hit')->limit(0,3)->where('durum','1')->orderBy('hit','desc')->all();
    return $querry;
}

function etiketyazilar()
{
    require_once __DIR__. '/basicdb.php';

    $dk=database();

    $querry=$dk->from('tblyazilar')->select('keywords,seobaslik,id,durum,hit')->limit(0,3)->where('durum','1')->orderBy('hit','desc')->all();
    return $querry;
}

function genelyazilarokunan()
{
    require_once __DIR__. '/basicdb.php';
    $de=database();

    $sonuc= $de->from('tblyazilar')->
    select('seogenel as seogenel , baslik as baslik , id as id, resim as resim,tarih as tarih
  ,seobaslik as seobaslik ,icerik as icerik, seoicerik as seoicerik ,keywords as keywords, durum as durum ,hit as hit , type as type ,tur as idkategori
  ')->
    union()->from('tblprojeler')->select('seogenel as seogenel , baslik as baslik, id as id, resim as resim, tarih as tarih
    ,seobaslik as seobaslik ,icerik as icerik, seoicerik as seoicerik ,keywords as keywords, durum as durum ,hit as hit , type as type , idkategori as idkategori
    ')->limit('0','5')->where('durum','1')->orderBy('hit','desc')->all();
    return $sonuc;
}

function keywords()
{
    require_once __DIR__. '/basicdb.php';
    $de=database();
    $sonuc= $de->from('tblyazilar')->
    select(' baslik as baslik , id as id, durum as durum')->
    union()->from('tblprojeler')->select('baslik as baslik , id as id, durum as durum')->limit(0,3)
        ->where('durum','1')->all();
    return $sonuc;
}

function genelyazilartarih()
{
    require_once __DIR__. '/basicdb.php';
    $dc=database();
    $querry=$dc->from('tblprojeler')->select('tarih,baslik,seobaslik,type')->union()->from('tblyazilar')
        ->select('tarih,baslik,seobaslik,type')->where('durum','1')->limit('0','5')->orderBy('tarih','desc')->all();

    return $querry;
}

function arama($arama)
{
    require_once (__DIR__.'/basicdb.php');
    $dc=database();
    $sonuc= $dc->from('tblyazilar')->
    select('seogenel as seogenel , baslik as baslik , id as id, resim as resim,tarih as tarih
 ,seobaslik as seobaslik ,icerik as icerik, seoicerik as seoicerik ,keywords as keywords, durum as durum ,hit as hit , type as type ,tur as idkategori
 ')->
    union()->from('tblprojeler')->select('seogenel as seogenel , baslik as baslik, id as id, resim as resim, tarih as tarih
   ,seobaslik as seobaslik ,icerik as icerik, seoicerik as seoicerik ,keywords as keywords, durum as durum ,hit as hit , type as type , idkategori as idkategori
   ')->where('durum','1')->
    LIKE('seogenel ',$arama)->orderBy('tarih','desc')->limit(0,10)->all();
    return $sonuc;
}

function anayaziprojelerhit()
{
    require_once __DIR__. '/basicdb.php';
    $dy=database();
    $querry=$dy->from('tblprojeler')->select('baslik,resim,icerik,seobaslik,tarih,type,hit')->union()->from('tblyazilar')
        ->select('baslik,resim,icerik,seobaslik,tarih,type,hit')->where('durum','1')->limit('0','6')->orderBy('hit','desc')->all();
    return $querry;
}

function hakkimdakeywords()
{
    require_once __DIR__. '/basicdb.php';
    $de=database();
    $sonuc= $de->from('tblyazilar')->
    select('durum,id,seobaslik,keywords,type,hit
    ')->
    union()->from('tblprojeler')->select('durum,id,seobaslik,keywords,type,hit
      ')->limit('0','5')->where('durum','1')->orderBy('hit','desc')->all();
    return $sonuc;
}

function adminhit()
{
    require_once __DIR__. '/basicdb.php';
    $de=database();
    $sonuc= $de->from('tblyazilar')->
    select('seogenel as seogenel , baslik as baslik , id as id, resim as resim,tarih as tarih
  ,seobaslik as seobaslik ,icerik as icerik, seoicerik as seoicerik ,keywords as keywords, durum as durum ,hit as hit , type as type ,tur as idkategori
  ')->
    union()->from('tblprojeler')->select('seogenel as seogenel , baslik as baslik, id as id, resim as resim, tarih as tarih
    ,seobaslik as seobaslik ,icerik as icerik, seoicerik as seoicerik ,keywords as keywords, durum as durum ,hit as hit , type as type , idkategori as idkategori
    ')->limit('0','3')->where('durum','1')->orderBy('hit','desc')->all();
    return $sonuc;
}
//Basicdb kullanılanlar bitiş


//seflink - seo ayarları
function seflink($str, $options = array())
{
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => true
    );
    $options = array_merge($defaults, $options);
    $char_map = array(
        // Latin
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
        'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
        'ß' => 'ss',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
        'ÿ' => 'y',
        // Latin symbols
        '©' => '(c)',
        // Greek
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
        'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
        'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
        'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
        'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
        'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
        'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
        // Turkish
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
        // Russian
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',
        // Ukrainian
        'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
        'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
        // Czech
        'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
        'Ž' => 'Z',
        'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
        'ž' => 'z',
        // Polish
        'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
        'Ż' => 'Z',
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
        'ż' => 'z',
        // Latvian
        'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
        'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
        'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
        'š' => 's', 'ū' => 'u', 'ž' => 'z'
    );
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}
//seflink - seo ayarları

//tblheadmenu işlemleri başlangıç
function headmenucek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,durum')->from('tblheadmenu')->where('durum','1')
        ->count_all_results();
    return $sonuc;
}

function menucek()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('*')->from('tblheadmenu')->where('durum','1')
        ->get()->result_array();
    return $sonuc;
}
//tblheadmenu işlemleri bitiş


//tbliletisim işlemleri başlangıç
function okunancek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,durum')->from('tbliletisim')->where('durum','1')
        ->count_all_results();
    return $sonuc;
}

function headiletisim()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('*')->from('tbliletisim')->limit('4')->where('durum','0')->order_by('tarih','desc')
        ->get()->result_array();
    return $sonuc;
}

function mesajdurum($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->set('durum','1')
        ->where('id',$id)->update('tbliletisim');

}

function okunmayancek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,durum')->from('tbliletisim')->where('durum','0')
        ->count_all_results();
    return $sonuc;
}

function mesajlar()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tbliletisim')
        ->count_all_results();
    return $sonuc;
}
//tbliletisim işlemleri bitiş


//tbladmin işlemleri başlangıç
function admincek(){
    $ci =& get_instance();
    $sonuc = $ci->db->select('*')->from('tbladmin')->order_by('id','desc')->get()->row();
    return $sonuc;
}

function adminresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tbladmin')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}
//tbladmin işlemleri bitiş


//tblsmedya işlemleri başlangıç
function smedyacek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tblsmedya')
        ->count_all_results();
    return $sonuc;
}

function smedyaion()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('*')->from('tblsmedya')
        ->get()->result_array();
    return $sonuc;
}
//tblsmedya işlemleri bitiş


//tblokunan işlemleri başlangıç
function okunankitapcek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tblokunan')
        ->count_all_results();
    return $sonuc;
}

function okunanresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblokunan')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}
//tblokunan işlemleri bitiş


//tblokunacak  işlemleri başlangıç
function okunacakkitapcek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tblokunacak')
        ->count_all_results();
    return $sonuc;
}
//tblokunacak  işlemleri bitiş


//tblozellikler işlemleri başlangıç
function ozellikcek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tblozellikler')
        ->count_all_results();
    return $sonuc;
}

function ozellik4()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('*')->from('tblozellikler')->limit('5')->order_by('id','desc')
        ->get()->result_array();
    return $sonuc;
}

function ozellikresimler()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('resim,id,ozellik')->from('tblozellikler')->order_by('id','desc')
        ->get()->result_array();
    return $sonuc;
}

function ozellikbasliklar()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('id,ozellik')->from('tblozellikler')->order_by('id','desc')
        ->get()->result_array();
    return $sonuc;
}

function ozellikresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblozellikler')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}
//tblozellikler işlemleri bitiş


//tblsertifikalar işlemleri baslangic
function sertifikacek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tblsertifikalar')
        ->count_all_results();
    return $sonuc;
}

function sertifikaresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblsertifikalar')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}

function hakkimdasertifika()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('*')->from('tblsertifikalar')
        ->get()->result_array();
    return $sonuc;
}
//tblsertifikalar işlemleri bitiş


//tblgununsozu işlemleri başlangıç
function gununsozuresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblgununsozu')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}

function randomsoz()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('*')->from('tblgununsozu')->where('durum','1')->limit('1')->order_by('RAND()')
        ->get()->result_array();
    return $sonuc;
}

function gununsozucek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,durum')->from('tblgununsozu')->where('durum','1')
        ->count_all_results();
    return $sonuc;
}
//tblgununsozu işlemleri bitiş


//tblkategoriler işlemleri baslangic
function kategoricek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tblkategoriler')
        ->count_all_results();
    return $sonuc;
}

function kategoriliste(){
    $ci =& get_instance();
    $sonuc = $ci->db->select('*')->from('tblkategoriler')->order_by('id','desc')->get()->result_array();
    return $sonuc;
}
//tblkategoriler işlemleri bitiş



//tblprojeler işlemleri baslangic
function projecek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,durum')->from('tblprojeler')->where('durum','1')
        ->count_all_results();
    return $sonuc;
}

function projelerresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblprojeler')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}

function anaproje()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('id,resim,baslik,seobaslik,icerik,tarih,hit,idkategori,durum')->from('tblprojeler')->where('durum','1')->limit('3')->order_by('id','desc')
        ->get()->result_array();
    return $sonuc;
}

function   projehitarttir($id,$hit)
{
    $ci =& get_instance();
    $sonuc=$ci->db->where('id',$id)->update('tblprojeler',array('hit'=>$hit+1));
}

function projeliste()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('id,resim,baslik,seobaslik,icerik,tarih,idkategori')->from('tblprojeler')->where('durum','1')->order_by('tarih','desc')
        ->get()->result_array();
    return $sonuc;
}
//tblprojeler işlemleri bitiş


//tblyazilar işlemleri başlangıç
function yazicek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,durum')->from('tblyazilar')->where('durum','1')
        ->count_all_results();
    return $sonuc;
}

function yazilarresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblyazilar')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}

function anayazilar()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('id,resim,baslik,seobaslik,tarih,tur,hit')->from('tblyazilar')->where('durum','1')->limit('3')->order_by('id','desc')
        ->get()->result_array();
    return $sonuc;
}

function yazilarliste()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('id,resim,baslik,seobaslik,icerik,tarih,tur')->from('tblyazilar')->where('durum','1')->order_by('tarih','desc')
        ->get()->result_array();
    return $sonuc;
}

function   yazihitarttir($id,$hit)
{
    $ci =& get_instance();
    $sonuc=$ci->db->where('id',$id)->update('tblyazilar',array('hit'=>$hit+1));
}
//tblyazilar işlemleri bitiş


// tblsite işlemleri başlangıç
function sitedurum()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('durum')->from('tblsite')
        ->limit(1)->get()->row();
    return $sonuc->durum;
}

function siteayar()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('*')->from('tblsite')->limit('1')->order_by('id','desc')->where('durum','1')
        ->get()->result_array();
    return $sonuc;
}

function   sayfahitarttir($hit)
{
    $ci =& get_instance();
    $sonuc=$ci->db->update('tblsite',array('hit'=>$hit+1));
}

function sayfahitcek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,hit')->from('tblsite')->get()->row();
    return $sonuc->hit;
}

function siteresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblsite')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}
// tblsite işlemleri bitiş


//tblresimler işlemi başlangıç
function resimlerresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblresimler')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}
//tblresimler işlemi bitiş


//tblgenelayar işlemleri baslangic
function genelayarresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblgenelayar')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}

function anaayar()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('*')->from('tblgenelayar')->limit('1')->order_by('id','asc')
        ->get()->result_array();
    return $sonuc;
}
//tblgenelayar işlemleri bitiş


//tblicon işlemleri başlangıç
function iconresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblicon')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}

function icon()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('resim')->from('tblicon')
        ->limit(1)->get()->row();
    return $sonuc->resim;
}
//tblicon işlemleri bitiş


//tblarkaplan işlemleri başlangıç
function arkaplanresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,resim')->from('tblarkaplan')
        ->where('id',$id)->get()->row();
    return $sonuc->resim;
}

function arkaplan()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('resim')->from('tblarkaplan')
        ->limit(1)->get()->row();
    return $sonuc->resim;
}
//tblarkaplan bitis


//tblyoneticiler işlem başlangıç
function adminid()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('id')->from('tblyoneticiler')->limit('1')->order_by('id','asc')
        ->get()->result_array();
    return $sonuc;
}
//tblyoneticiler işlem bitiş


//tbldil baslangic
function hakkimdadil()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('*')->from('tbldil')
        ->get()->result_array();
    return $sonuc;
}
//tbldil bitis


//tblegitim baslangic
function hakkimdaegitim()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('*')->from('tblegitim')
        ->get()->result_array();
    return $sonuc;
}
//tblegitim bitis


//tarih başlangç
//sadece tarih döndürür.
function tarih($ayirilacak)
{
    $tarih=explode(" ",$ayirilacak);
    $ayBul =explode("-",$tarih[0]);


    if($ayBul[1]==1){$ay= "Ocak"; }
    else if($ayBul[1] ==2){$ay = "Şubat";}
    else if($ayBul[1] ==3){$ay = "Mart";}
    else if($ayBul[1] ==4){$ay = "Nisan";}
    else if($ayBul[1] ==5){$ay = "Mayıs";}
    else if($ayBul[1] ==6){$ay = "Haziran";}
    else if($ayBul[1] ==7){$ay = "Temmuz";}
    else if($ayBul[1] ==8){$ay = "Ağustos";}
    else if($ayBul[1] ==9){$ay = "Eylül";}
    else if($ayBul[1] ==10){$ay = "Ekim";}
    else if($ayBul[1] ==11){$ay = "Kasım";}
    else {$ay="Aralık";}

    $yazilacak =$ayBul[2] ." " .$ay . " ". $ayBul[0] ;
    return $yazilacak;

}

//tarih ve saat bilgisi döndürür
function tarihSaat($ayirilacak)
{
    $tarih=explode(" ",$ayirilacak);
    $ayBul =explode("-",$tarih[0]);


    if($ayBul[1]==1){$ay= "Ocak"; }
    else if($ayBul[1] ==2){$ay = "Şubat";}
    else if($ayBul[1] ==3){$ay = "Mart";}
    else if($ayBul[1] ==4){$ay = "Nisan";}
    else if($ayBul[1] ==5){$ay = "Mayıs";}
    else if($ayBul[1] ==6){$ay = "Haziran";}
    else if($ayBul[1] ==7){$ay = "Temmuz";}
    else if($ayBul[1] ==8){$ay = "Ağustos";}
    else if($ayBul[1] ==9){$ay = "Eylül";}
    else if($ayBul[1] ==10){$ay = "Ekim";}
    else if($ayBul[1] ==11){$ay = "Kasım";}
    else {$ay="Aralık";}

    $yazilacak =$ayBul[2] ." " .$ay . " ". $ayBul[0] ."\t" .$tarih[1];
    return $yazilacak;

}
//tarih bitis


//GetIP baslangic
function GetIP(){
    if(getenv("HTTP_CLIENT_IP")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        if (strstr($ip, ',')) {
            $tmp = explode (',', $ip);
            $ip = trim($tmp[0]);
        }
    } else {
        $ip = getenv("REMOTE_ADDR");
    }
    return $ip;
}
//GetIP bitis


//Dijital Müzel İşlemleri başlangıç
function dijitalMuzeYoneticicek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('yID')->from('yoneticiler')
        ->count_all_results();
    return $sonuc;
}

function arkeologInActivecek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('*')->from('arkeologlar')->where('aStatus','2')
        ->count_all_results();
    return $sonuc;
}

function arkeologActivecek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('*')->from('arkeologlar')->where('aStatus','1')
        ->count_all_results();
    return $sonuc;
}

function kazilarInActivecek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('kId,durum')->from('kazilar')->where('kDurum','2')
        ->count_all_results();
    return $sonuc;
}

function kazilarActivecek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('kId,durum')->from('kazilar')->where('kDurum','1')
        ->count_all_results();
    return $sonuc;
}

function eserlerInActivecek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('eId,durum')->from('eserler')->where('eDurum','0')
        ->count_all_results();
    return $sonuc;
}

function eserlerActivecek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('eId,durum')->from('eserler')->where('eDurum','1')
        ->count_all_results();
    return $sonuc;
}

function arkeologresim($aId)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('aId,aPhoto')->from('arkeologlar')
        ->where('aId',$aId)->get()->row();
    return $sonuc->aPhoto;
}

function yoneticiresim($yId)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('yId,yFoto')->from('yoneticiler')
        ->where('yId',$yId)->get()->row();
    return $sonuc->yFoto;
}

function eserresim($eId)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('eId,eFoto')->from('eserler')
        ->where('eId',$eId)->get()->row();
    return $sonuc->eFoto;
}

function QRresim($eId)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('eId,eQR')->from('eserler')
        ->where('eId',$eId)->get()->row();
    return $sonuc->eQR;
}
//Dijital Müzel İşlemleri bitiş


//Lisans türler proje başlangıç
function turlerResim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,turResim')->from('turler')
        ->where('id',$id)->get()->row();
    return $sonuc->turResim;
}

function aktifTurKullanici()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('turKullanici')->where('durum',1)
        ->count_all_results();
    return $sonuc;
}

function pasifTurKullanici()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('turKullanici')->where('durum',0)
        ->count_all_results();
    return $sonuc;
}

function aktifTur()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('turler')->where('durum',1)
        ->count_all_results();
    return $sonuc;
}

function pasifTur()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('turler')->where('durum',0)
        ->count_all_results();
    return $sonuc;
}
//Lisans türler proje bitiş


//Akıllı yurt işlemleri başlangıç
function ferelicek()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,durum')->from('tblduyurular')->where('durum','1')
        ->count_all_results();
    return $sonuc;
}

function istekdurum($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->set('durum','1')
        ->where('id',$id)->update('tblistekler');

}

function duyurularresim($id)
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id,duyuruResim')->from('tblduyurular')
        ->where('id',$id)->get()->row();
    return $sonuc->duyuruResim;
}

function duyuruAktif()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tblduyurular')->where('durum',1)
        ->count_all_results();
    return $sonuc;
}

function duyuruPasif()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tblduyurular')->where('durum',0)
        ->count_all_results();
    return $sonuc;
}

function sonDuyurular()
{
    $ci =& get_instance();
    $sonuc = $ci->db->select('id,duyuruBaslik,seobaslik,durum,duyuruTarih')->from('tblduyurular')->where('durum','1')->order_by('duyuruTarih','desc')->limit(5)
        ->get()->result_array();
    return $sonuc;
}

function dilekSayi()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tblistekler')->where('durum',1)
        ->count_all_results();
    return $sonuc;
}

function sikayetSayi()
{
    $ci =&get_instance();
    $sonuc=$ci->db->select('id')->from('tblistekler')->where('durum',0)
        ->count_all_results();
    return $sonuc;
}
//Akıllı yurt işlemleri bitiş
?>