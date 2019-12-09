<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Eserler Listesi</h3>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Sıra No </th>
                 <th>Rfid Numarası</th>
                 <th>Başlık</th>
                 <th style="width:160px;">QR</th>
                 <th style="width:160px;">Durum</th>
                 <th>Resim</th>
                 <th style="width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                    <td  style="font-weight:bold">#<?php echo  $sayi++; ?></td>
                  <td>  <?php echo word_limiter($bilgi['eRfid'],10); ?></td>
                  <td>  <?php echo word_limiter($bilgi['eBaslik'],10); ?></td>
                  <td>
                    <?php if($bilgi['eQR']==null)
                    {
                      echo "QR Oluşturulmadı";
                    }else {?>
                      <img style="margin-left:30px" src="<?php echo base_url('/').$bilgi['eQR']; ?>" alt="<?php echo "Qr Code resim";?>"   height="100" width="120">
                    <?php }?>
                  </td>

                  <td>
                    <input
                    class="toggle_check"
                    data-on="Aktif"
                    data-onstyle="success"
                    data-off="Pasif"
                    data-offstyle="danger"
                    type="checkbox"
                    dataID="<?php echo $bilgi['eId']; ?>"
                    dataURL="#"
                    <?php echo ($bilgi['eDurum']==1) ? "checked" : ""; ?>

                    >
                    </td>
                  <td><img style="margin-left:30px" src="<?php echo   $bilgi['eFoto'];?>" alt="<?php echo $bilgi['eBaslik'];?>"   height="100" width="120"></td>

                  <td>
                      <a href="<?php echo base_url('yonetim/dijitalEserduzenle/'.$bilgi['eId'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Düzenle</button></a>
                        <a href="<?php echo base_url('yonetim/dijitalEsersil/'.$bilgi['eId'].'/eId/eserler'); ?>">
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
