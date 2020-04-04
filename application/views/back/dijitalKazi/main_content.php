<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Kazılar Listesi</h3>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sıra No </th>
                 <th>Kazı Adı</th>
                 <th>Kazı Yeri</th>
                 <th>Başlangıç Tarihi</th>
                 <th>Bitiş Tarihi</th>
                 <th style="width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                    <td  style="font-weight:bold"><?php echo  $sayi++; ?></td>
                  <td>  <?php echo word_limiter($bilgi['kAdi'],10); ?></td>
                  <td>  <?php echo $bilgi['kAdres']; ?></td>
                  <td>  <?php $tarih =$bilgi['kBasTarih'];
                  $tarih = explode(" ", $tarih);
                  echo tarih($tarih[0]);
                   ?></td>
                  <td> <?php $tarih2 =$bilgi['kBitTarih'];
                  $tarih2 = explode(" ", $tarih2);
                  echo tarih($tarih2[0]);
                   ?></td>

                       <td style="">
                           <a href="<?php echo base_url('yonetim/dijitalKaziduzenle/'.$bilgi['kId'].''); ?>">
                           <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                             <a href="<?php echo base_url('yonetim/dijitalKazisil/'.$bilgi['kId'].'/kId/kazilar'); ?>">
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
