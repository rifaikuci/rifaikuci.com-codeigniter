<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Sertifikalar Listesi</h3>

  <a href="<?php echo base_url('yonetim/onlineSertifikaekle'); ?>" class="btn btn-primary pull-right"  ><i class="fa fa-plus"> Oluştur</i></a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th width="60px">Sıra No </th>
                 <th>Ad Soyad</th>
                 <th>Egitmen Adı</th>
                 <th>Kurs Adı</th>
                  <th>Tarih</th>
                 <th style="width:150px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1;
foreach ($bilgi as $bilgi) {?>
               <tr>

                    <td  style="font-weight:bold"><?php echo  $sayi++; ?></td>
                   <td>  <?php echo $bilgi['adSoyad']; ?></td>
                   <td>  <?php echo $bilgi['eAdiSoyadi']; ?></td>
                   <td>  <?php echo $bilgi['kursAdi']; ?></td>

                   <td>
                       <?php $tarih =$bilgi['tarih'];
                       $tarih = explode(" ", $tarih);


                       echo tarih($tarih[0]);

                       ?>
                   </td>


                   <td>
                      <a href="<?php echo base_url('yonetim/onlineSertifikaGoster/'.$bilgi['id'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Sertifika Göster</button></a>

                        <a href="<?php echo base_url('yonetim/onlineSertifikasil/'.$bilgi['id'].'/id/tblOnlineSertifika'); ?>">
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
