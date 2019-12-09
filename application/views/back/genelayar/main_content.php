<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Genel Ayar Listesi</h3>

  <a href="<?php echo base_url('yonetim/genelayarekle'); ?>" class="btn btn-primary pull-right"  ><i class="fa fa-plus"> Ekle</i></a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sıra No </th>
                 <th>Title</th>
                 <th>Title Logo</th>
                 <th style="width:160px;">Resim</th>
                 <th style="width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                    <td  style="font-weight:bold">#<?php echo  $sayi++; ?></td>
                  <td>  <?php echo word_limiter($bilgi['title'],5); ?></td>
                  <td>  <?php echo word_limiter($bilgi['logotitle'],7); ?></td>
                  <td><img style="margin-left:30px" src="<?php  echo base_url('/'). $bilgi['resim'];?>" alt="<?php echo $bilgi['title'];?>"   height="100" width="120"></td>

                  <td>
                      <a href="<?php echo base_url('yonetim/genelayarduzenle/'.$bilgi['id'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                        <a href="<?php echo base_url('yonetim/genelayarsil/'.$bilgi['id'].'/id/tblgenelayar'); ?>">
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
