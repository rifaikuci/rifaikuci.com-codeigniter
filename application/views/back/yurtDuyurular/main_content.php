<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Duyuruların Listesi</h3>

  <a href="<?php echo base_url('yonetim/duyurularekle'); ?>" class="btn btn-primary pull-right"  ><i class="fa fa-plus"> Ekle</i></a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sıra No </th>
                 <th>Duyuru</th>
                 <th>Detay</th>
                 <th>Tarih</th>
                 <th>Durum</th>
                 <th style="width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>
                   <td  style="font-weight:bold"><?php echo  $sayi++; ?></td>
                  <td>  <?php echo word_limiter($bilgi['duyuruBaslik'],10); ?></td>
                  <td>  <?php echo $bilgi['duyuruDetay']; ?></td>
                  <td>

                      <?php $tarih =$bilgi['duyuruTarih'];
                      $tarih = explode(" ", $tarih);
                      $tarihDuyuru= tarih($tarih[0]);
                      ?>
                      <?php echo $tarihDuyuru; ?></td>

                  <td>
                    <input
                    class="toggle_check"
                    data-on="Aktif"
                    data-onstyle="success"
                    data-off="Pasif"
                    data-offstyle="danger"
                    type="checkbox"
                    dataID="<?php echo $bilgi['id']; ?>"
                    dataURL="<?php echo base_url('yonetim/duyurularset'); ?>"
                        <?php echo ($bilgi['durum']=="1") ? "checked" : ""; ?>

                    >
                    </td>
                    <td>
                      <a href="<?php echo base_url('yonetim/duyurularduzenle/'.$bilgi['id'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                        <a href="<?php echo base_url('yonetim/duyurularsil/'.$bilgi['id'].'/id/tblDuyurular'); ?>">
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
