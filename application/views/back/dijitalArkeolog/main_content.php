<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Arkeologlar Listesi</h3>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sıra No </th>
                 <th>Ad Soyad</th>
                 <th>Mail</th>
                 <th>Telefon</th>


                 <th style="width:160px;">Resim</th>
                 <th>Durum</th>

                 <th style="width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                    <td  style="font-weight:bold"><?php echo  $sayi++; ?></td>
                  <td>  <?php echo word_limiter($bilgi['aName'],8); ?></td>
                  <td>  <?php echo word_limiter($bilgi['aEmail'],15); ?></td>
                  <td>  <?php echo word_limiter($bilgi['aPhone'],15); ?></td>



                  <td style="padding-left:40px"><img  src="<?php  echo  $bilgi['aPhoto'];?>" alt="<?php echo $bilgi['aName'];?>"   height="100" width="100"></td>
                  <td>
                    <input
                    class="toggle_check"
                    data-on="Aktif"
                    data-onstyle="success"
                    data-off="Pasif"
                    data-offstyle="danger"
                    type="checkbox"
                    dataID="<?php echo $bilgi['aId']; ?>"
                    dataURL="#"
                    <?php echo ($bilgi['aStatus']==1) ? "checked" : ""; ?>

                    >
                    </td>
                    <td>
                      <a href="<?php echo base_url('yonetim/dijitalArkeologduzenle/'.$bilgi['aId'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>

                        <a href="<?php echo base_url('yonetim/dijitalArkeologsil/'.$bilgi['aId'].'/aId/arkeologlar'); ?>">
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
