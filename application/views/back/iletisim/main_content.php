<section class="content">
     <div class="row">
       <div class="col-xs-12">
<?php echo $this->session->flashdata('durum'); ?>
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Mesajlar Listesi </h3>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th style="text-align:center">Sıra No </th>
                 <th style="text-align:center"> Ad Soyad</th>
                 <th style="text-align:center">Mail</th>
                <th style="text-align:center">Konu</th>
                 <th style="text-align:center">Mesaj</th>

                 <th style="text-align:center">İp</th>
                 <th style="text-align:center">Durum</th>
                 <th style=" text-align:center; width:105px">İşlemler</th>
               </tr>
               </thead>

<?php $sayi=1; foreach ($bilgi as $bilgi) {?>
               <tr>

                  <td  style="font-weight:bold">#<?php echo  $sayi++; ?></td>
                  <td style=""><?php echo word_limiter($bilgi['adsoyad'],4);?></td>
                  <td style=""><?php echo word_limiter($bilgi['mail'],3);?></td>
                  <td style=""><?php echo word_limiter($bilgi['konu'],5);?></td>
                  <td style=""><?php echo word_limiter($bilgi['mesaj'],3);?></td>
                  <td style=""><?php echo $bilgi['ip'];?></td>
                  <td style=""><?php $aktar= $bilgi['durum'];
                  if($aktar==1)
                  {?>

                        <button    class="btn btn-success">Okundu</button>

                  <?php }
                  else {?>

                    <button    class="btn btn-warning">Okunmadı</button>

                  <?php } ?>
                  </td>
                  <td>
                      <a href="<?php echo base_url('yonetim/iletisimoku/'.$bilgi['id'].''); ?>">
                      <button  type="button" name='button' class="btn btn-info">Oku</button></a>

                        <a href="<?php echo base_url('yonetim/iletisimsil/'.$bilgi['id'].'/id/tbliletisim'); ?>">
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
