<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Yönetici Listesi</h3>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sıra No </th>
                 <th>Rfid Numarası</th>
                 <th>Ad Soyad</th>
                 <th>Email</th>
                 <th style="width:160px;">Resim</th>
                 <th style="width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                    <td  style="font-weight:bold">#<?php echo  $sayi++; ?></td>
                  <td>  <?php echo word_limiter($bilgi['yRfid'],15); ?></td>
                  <td>  <?php echo word_limiter($bilgi['yName'],15); ?></td>
                  <td>  <?php echo word_limiter($bilgi['yEmail'],15); ?></td>
                  <td><img style="margin-left:30px" src="<?php  echo  $bilgi['yFoto'];?>" alt="<?php echo $bilgi['yName'];?>"   height="100" width="120"></td>

                  <td>
                      <a href="<?php echo base_url('yonetim/dijitalYoneticiduzenle/'.$bilgi['yId'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>
                        <a href="<?php echo base_url('yonetim/dijitalYoneticisil/'.$bilgi['yId'].'/yId/yoneticiler'); ?>">
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
