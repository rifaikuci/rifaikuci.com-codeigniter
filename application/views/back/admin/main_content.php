<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Yöneticiler Listesi</h3>

  <a href="<?php echo base_url('yonetim/adminekle'); ?>" class="btn btn-primary pull-right"  ><i class="fa fa-plus"> Ekle</i></a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sıra No </th>
                 <th>Ad Soyad</th>
                 <th>Özellik</th>
                 <th>Site_adi</th>
                 <th style="width:160px;">Resim</th>
                 <th style="width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                    <td  style="font-weight:bold">#<?php echo  $sayi++; ?></td>
                  <td>  <?php echo word_limiter($bilgi['adsoyad'],5); ?></td>
                  <td>  <?php echo word_limiter($bilgi['ozellik'],7); ?></td>
                  <td>  <?php echo word_limiter($bilgi['site_adi'],7); ?></td>
                  <td><img style="margin-left:30px" src="<?php  echo base_url('/'). $bilgi['resim'];?>" alt="<?php echo $bilgi['adsoyad'];?>"   height="100" width="120"></td>

                  <td>
                      <a href="<?php echo base_url('yonetim/adminduzenle/'.$bilgi['id'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                        <a href="<?php echo base_url('yonetim/adminsil/'.$bilgi['id'].'/id/tbladmin'); ?>">
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
