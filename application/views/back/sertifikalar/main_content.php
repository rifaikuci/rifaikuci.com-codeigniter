<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Sertifikalar Liste Formu</h3>



  <a href="<?php echo base_url('yonetim/sertifikalarekle'); ?>" class="btn btn-primary pull-right"  ><i class="fa fa-plus"> Ekle</i></a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th style="text-align:center">Sıra No </th>
                 <th >Sertifika Adı</th>
                 <th  >Sertifika Seo Adı</th>

                  <th >Resim</th>
                 <th style=" width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                  <td  style="font-weight:bold">#<?php echo  $sayi++; ?></td>
                  <td style=""><?php echo $bilgi['sertifika'];?></td>
                  <td style=""><?php echo $bilgi['seosertifika'];?></td>

                  <td ><img style="margin-left:50px" src="<?php  echo base_url('/'). $bilgi['resim'];?>" alt="<?php echo $bilgi['sertifika'];?>"  height="50px" width="50px"></td>
                  <td style="">
                      <a href="<?php echo base_url('yonetim/sertifikalarduzenle/'.$bilgi['id'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                        <a href="<?php echo base_url('yonetim/sertifikalarsil/'.$bilgi['id'].'/id/tblsertifikalar'); ?>">
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
