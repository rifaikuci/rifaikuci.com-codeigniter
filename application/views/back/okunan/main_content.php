<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Kitaplar Listesi</h3>

  <a href="<?php echo base_url('yonetim/okunanekle'); ?>" class="btn btn-primary pull-right"  ><i class="fa fa-plus"> Ekle</i></a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sıra No </th>
                 <th>Kitap Adı</th>
                 <th>Yazar Adı</th>
                  <th>Süre</th>
                    <th>Bitis Tarihi</th>
                  <th>Yayınevi</th>
                 <th style="width:160px;">Resim</th>
                 <th style="width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                    <td  style="font-weight:bold"><?php echo  $sayi++; ?></td>
                  <td>  <?php echo word_limiter($bilgi['kitapadi'],5); ?></td>
                  <td>  <?php echo $bilgi['yazaradi']; ?></td>
                  <td>  <?php echo $bilgi['sure'];?></td>
                  <td> <?php $tarih =$bilgi['bitistarihi'];
                  $tarih = explode(" ", $tarih);


                  echo tarih($tarih[0]);

                   ?></td>
                  <td>  <?php echo $bilgi['yayinevi'];?></td>
                  <td style="padding-left:40px"><img  src="<?php  echo base_url('/'). $bilgi['resim'];?>"
                     alt="<?php echo $bilgi['kitapadi'];?>"
                       height="56" width="35"></td>

                       <td style="">
                           <a href="<?php echo base_url('yonetim/okunanduzenle/'.$bilgi['id'].''); ?>">
                           <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                             <a href="<?php echo base_url('yonetim/okunansil/'.$bilgi['id'].'/id/tblokunan'); ?>">
                             <button  type="button" name='button' class="btn btn-danger ">Sil</button></a>


                         </td>


               </tr>
  <?php } ?>
             </table>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </section>
