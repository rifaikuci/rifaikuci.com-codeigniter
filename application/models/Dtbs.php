<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtbs extends CI_Model{


function kontrol($email,$sifre){
$sonuc = $this->db->select('*')
-> from('tblyoneticiler')->where('email',$email)->where('durum',1)
->where('sifre',sha1(md5($sifre)))
->get()->row();
return $sonuc;
}

function listele($from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->order_by('id','desc')->get()->result_array();
  return $sonuc;

}

function okunan($from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->order_by('id','desc')->get()->result_array();
  return $sonuc;

}


function cek($id,$from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->where('id',$id)->get()->row_array();
  return $sonuc;
}
function guncelle($data = array(),$id,$where,$from)
{
  $sonuc= $this->db->where($where,$id)->update($from,$data);

  return $sonuc;
}

public function ekle($from,$data=array())
{
    $sonuc=$this->db->insert($from,$data);
    return $sonuc;
}

public function sil($id,$where,$from)
{
  $sonuc=$this->db->delete($from,array($where=>$id));
  return $sonuc;
}

function projecek($per,$segment)
{
$sonuc=$this->db->select('*')->from('tblprojeler')->where('durum','1')->order_by('id','desc')->limit($per,$segment)->get()->result_array();
return $sonuc;

}

function yazicek($per,$segment)
{
$sonuc=$this->db->select('*')->from('tblyazilar')->where('durum','1')->order_by('id','desc')->limit($per,$segment)->get()->result_array();
return $sonuc;

}

function projemdetay($seobaslik)
{
  $sonuc=$this->db->select('*')->from('tblprojeler')->where('durum','1')->where('seobaslik',$seobaslik)->get()->row_array();

  return $sonuc;
}

function yazilarimdetay($seobaslik)
{
  $sonuc=$this->db->select('*')->from('tblyazilar')->where('durum','1')->where('seobaslik',$seobaslik)->get()->row_array();

  return $sonuc;
}


function aramalarimdetay($seobaslik)
{
  require_once (__DIR__.'/deneme.php');


    $dc=new deneme('localhost','rifaikuc_rifaikuci','root', 'mardin47');

    $sonuc= $dc->from('tblyazilar')->
    select('seogenel as seogenel , baslik as baslik , id as id, resim as resim,tarih as tarih
    ,seobaslik as seobaslik ,icerik as icerik, seoicerik as seoicerik ,keywords as keywords, durum as durum ,hit as hit , type as type ,tur as idkategori
    ')->
      union()->from('tblprojeler')->select('seogenel as seogenel , baslik as baslik, id as id, resim as resim, tarih as tarih
      ,seobaslik as seobaslik ,icerik as icerik, seoicerik as seoicerik ,keywords as keywords, durum as durum ,hit as hit , type as type , idkategori as idkategori
      ')->where('seobaslik',$seobaslik)->first();
    return $sonuc;
}

function arkeologListele($from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->order_by('aId','asc')->get()->result_array();
  return $sonuc;

}


function arkeologCek($id,$from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->where('aId',$id)->get()->row_array();
  return $sonuc;
}


function eserlerListele($from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->order_by('eId','asc')->get()->result_array();
  return $sonuc;

}


function eserlerCek($id,$from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->where('eId',$id)->get()->row_array();
  return $sonuc;
}


function kazilarListele($from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->order_by('kId','asc')->get()->result_array();
  return $sonuc;

}


function kazilarCek($id,$from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->where('kId',$id)->get()->row_array();
  return $sonuc;
}

function yoneticilerListele($from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->order_by('yId','asc')->get()->result_array();
  return $sonuc;

}


function yoneticilerCek($id,$from)
{
  $sonuc= $this->db->select('*')->from($from)
  ->where('yId',$id)->get()->row_array();
  return $sonuc;
}

}
?>
