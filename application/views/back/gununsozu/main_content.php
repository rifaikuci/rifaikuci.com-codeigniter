<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Günün Sözündekilerin Listesi</h3>

  <a href="<?php echo base_url('yonetim/gununsozuekle'); ?>" class="btn btn-primary pull-right"  ><i class="fa fa-plus"> Ekle</i></a>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sıra No </th>
                 <th>Ad Soyad</th>
                 <th>Günün Sözü</th>
                 <th style="width:160px;">Resim</th>
                  <th>Durum</th>
                 <th style="width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                    <td  style="font-weight:bold"><?php echo  $sayi++; ?></td>
                  <td>  <?php echo word_limiter($bilgi['adsoyad'],5); ?></td>
                  <td>  <?php echo word_limiter($bilgi['gununsozu'],7); ?></td>
                  <td style="padding-left:40px"><img  src="<?php  echo base_url('/'). $bilgi['resim'];?>" alt="<?php echo $bilgi['adsoyad'];?>"   height="100" width="100"></td>
                  <td>
                    <input
                    class="toggle_check"
                    data-on="Aktif"
                    data-onstyle="success"
                    data-off="Pasif"
                    data-offstyle="danger"
                    type="checkbox"
                    dataID="<?php echo $bilgi['id']; ?>"
                    dataURL="<?php echo base_url('yonetim/gununsozuset'); ?>"
                    <?php echo ($bilgi['durum']==1) ? "checked" : ""; ?>

                    >
                    </td>
                    <td>
                      <a href="<?php echo base_url('yonetim/gununsozuduzenle/'.$bilgi['id'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                        <a href="<?php echo base_url('yonetim/gununsozusil/'.$bilgi['id'].'/id/tblgununsozu'); ?>">
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