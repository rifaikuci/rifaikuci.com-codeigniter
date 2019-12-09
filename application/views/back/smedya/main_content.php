<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Sosyal Medya Liste Formu</h3>

  <a href="<?php echo base_url('yonetim/smedyaekle'); ?>" class="btn btn-primary pull-right"  ><i class="fa fa-plus"> Ekle</i></a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th style="text-align:center">Sıra No </th>
                 <th style="text-align:center">Sosyal Medya Adı</th>
                 <th style="text-align:center">Sosyal M. Seo Adı</th>
                 <th style="text-align:center">Url</th>
                 <th style=" text-align:center; width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                  <td  style="font-weight:bold">#<?php echo  $sayi++; ?></td>
                  <td style=""><?php echo $bilgi['ad'];?></td>
                  <td style=""><?php echo $bilgi['seoAd'];?></td>
                  <td style=""><?php echo $bilgi['url'];?></td>
                  <td>
                      <a href="<?php echo base_url('yonetim/smedyaduzenle/'.$bilgi['id'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                        <a href="<?php echo base_url('yonetim/smedyasil/'.$bilgi['id'].'/id/tblsmedya'); ?>">
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
