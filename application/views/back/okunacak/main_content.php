<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Okunacak Kitaplar Listesi</h3>

  <a href="<?php echo base_url('yonetim/okunacakekle'); ?>" class="btn btn-primary pull-right"  ><i class="fa fa-plus"> Ekle</i></a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sıra No </th>
                 <th>Kitap Adı</th>
                 <th>Yazar Adı</th>

                 <th style="width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                    <td  style="font-weight:bold"><?php echo  $sayi++; ?></td>
                  <td>  <?php echo word_limiter($bilgi['kitapadi'],5); ?></td>
                  <td>  <?php echo $bilgi['yazaradi']; ?></td>


                       <td style="">
                           <a href="<?php echo base_url('yonetim/okunacakduzenle/'.$bilgi['id'].''); ?>">
                           <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                             <a href="<?php echo base_url('yonetim/okunacaksil/'.$bilgi['id'].'/id/tblokunacak'); ?>">
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
