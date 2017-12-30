<section class="content-header">
  <h1>
    Details Berita Acara Pemeriksaan Pertanahan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Berita Acara</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-9">
        <div class="box box-warning">
            <div class="box-header">
                <h4 class="box-title"><i class="fa fa-globe"></i> Visual Data Tanah</h4>
            </div>
            <div class="box-body">
                <div  style="height: 480px;" id="map-canvas"></div>
            </div>       
        </div>
        </div>
        <div class="col-md-3">
            <div class="box box-danger"  valign="bottom">
                <div class="box-header">
                    <h4 class="box-title"><i class="fa fa-gear"></i> Push Data Peta</h4>
                </div>
                <div class="box-body">
                    <p>Dengan menekan tombol dibawah ini, Data Akan disetujui dan di input langsung ke Database Finalisasi SKT / Surat Rekomendasi, dan akan muncul setelah mendapat persetujuan dari sistem dan pejabat terkait untuk print out akhir <b>Surat Keterangan Tanah (SKT) / Surat Rekomendasi Pengelolaan Tanah</b> beserta lampiran</p>
                </div>
                <div class="box-footer">
                <button onclick="push_data()" class="btn btn-md btn-warning btn-block">Push Data Final <i class="fa fa-ban"></i></button>
                </div>
            </div>
        </div>
        </div> 

        <div class="row">
        <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header">
                <h4 class="box-title"><i class="fa fa-map-o"></i> Data Patok Batas</h4>
            </div>
            
                 <?php 
                 if($titik_tengah != null){
                     echo "<div class='box-body'>";
                     echo "<p class='well'>".$titik_tengah['keterangan']."</p>";
                     echo "<h4>Latitude : <b>".$titik_tengah['lat']."</b> <br> Longitude : <b>".$titik_tengah['lng']."</b></h4>";
                     echo "</div>";
                     echo "<div class='box-footer'>";
                     echo "<div class='pull-right'>";
                     echo "<button onclick='edit_titik_tengah(".$titik_tengah['id'].")' class='btn btn-flat btn-warning'>Edit Titik Tengah Koordinat <i class='fa fa-edit'></i></button>";
                     echo "</div>";
                     echo "</div>";
                     ?>
            
        </div>
         <?php if($patok->num_rows() > 0){ ?>
                     <div class="row"> 
                     <?php 
                     $n = 1;
                     foreach($patok->result() as $patok){
                ?>
                <div class="col-md-6">
                 <div class="box box-info">
                    <div class="box-body">
                    <div class="row"> 
                     <div class="col-md-4">
                        <a class="fancybox" rel="fancybox" href="<?php echo base_url().PATOK.$patok->link_dokumentasi; ?>" title="Patok <?php echo $n; ?>">
                            <img class="img img-responsive img-rounded main-img"  src="<?php echo base_url().PATOK.$patok->link_dokumentasi; ?>" alt="">
                        </a>
                        <hr>
                        <button onclick="edit_patok(<?php echo $patok->id;?>)" class="btn btn-warning btn-block">Edit Patok <i class="fa fa-edit"></i></button>
                        </div>

                        <div class="col-md-8">
                            <dt>Patok <?php echo $n; ?></dt>
                            <dd>Lat . <b><?php echo $patok->lat; ?></b> | Lng. <b><?php echo $patok->lng; ?></b></dd><br>
                            <dt>Batas - Batas Patok</dt>
                            <dd>Utara : <b><?php echo $patok->utara; ?></b></dd>
                            <dd>Selatan : <b><?php echo $patok->selatan; ?></b></dd>
                            <dd>Barat : <b><?php echo $patok->barat; ?></b></dd>
                            <dd>Timur : <b><?php echo $patok->timur; ?></b></dd>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
                <?php 
                $n++;
                     }  
                     ?> 
                     </div>
                     <?php                    
                 }else{
                 ?>
                 <div class="box box-warning">
                 <div class="box-footer">
                 <div class="well">
                    <h5 class="text-center">Data Koordinat Patok Belum Ada !!</h5>
                 </div>
                 </div>
                 </div>
                 <?php }
                 ?> 
                 <div class="box box-warning">
                    <div class="box-footer">
                        <button onclick="add_koordinat()" class="btn btn-primary btn-flat btn-block btn-lg">Input Koordinat Tanah/ Patok <i class="fa fa-plus"></i></button>
                    </div>
                 </div>
                 <?php 
                 }else{
                    ?>
                    <div class="box box-warning">
                    <div class="box-footer">
                    <div class="well">
                       <h5 class="text-center">Titik Tengah Tanah Belum di Definisikan !!</h5>                    
                    </div>
                    <button onclick="add_koordinat_tengah()" class="btn btn-success btn-flat btn-block btn-lg">Input Koordinat Titik Tengah Data <i class="fa fa-plus"></i></button>
                    </div>
                 </div>
                    <?php   
                                
                 } ?>
            <!-- </div>
         </div> -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="box box-warning">
             <div class="box-header">
                <h4 class="box-title"><i class="fa fa-file-archive-o"></i> Data Pemohon</h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <dt>Pemohon</dt>
                        <dd>a/n. <?php echo $data['nama'];?> <br>NIK. <b><?php echo $data['no_nik'];?></b></dd>
                        <br>
                        <dt>Alamat Pemohon</dt>
                        <dd> <?php echo $data['alamat'];?></dd>
                        <br>
                        <dt>Lokasi yg dimohon</dt>
                        <dd>  <b><?php echo $data['lokasi'];?></b><br> Dusun <?php echo $data['nama_dusun'];?> Desa <?php echo $data['nama_desa'];?> Kecamatan <?php echo $data['nama_kecamatan'];?> Kabupaten <?php echo $data['nama_kabupaten'];?> <br>
                        - Luas tanah &plusmn;<b> <?php echo $data['luas'];?></b> m<sup>2</sup></dd>
                        <br>
                        </div>
                    <div class="col-md-4 hidden-xs hidden-sm">
                        <img class="img img-responsive img-rounded"  src="<?php echo base_url().QRCODE.$data['permohonan_qr'];?>" alt="">
                     </div>
                     <div class="col-md-8">
                        <dt>Tanggal Permohonan</dt>
                        <dd><?php echo mdate("%d %D %Y - %H:%i %a", $data['time_permohonan']); ?></dd>
                        <br>
                        <dt>Tanggal Peryataan</dt>
                        <dd><?php echo mdate("%d %D %Y - %H:%i %a", $data['time_pernyataan']); ?></dd>
                        <br>
                    </div>
                    <div class="col-md-4 hidden-xs hidden-sm">
                        <img class="img img-responsive img-rounded"  src="<?php echo base_url().QRCODE.$data['pernyataan_qr'];?>" alt="">
                     </div>
                </div>
                <div class="row">
                    <div class="col-md-12"><b>Lampiran :</b></div>
                    <div class="col-md-4">
                    <a class="fancybox" rel="fancybox" href="<?php echo base_url().KTP.$data['ktp'];?>" title="Lampiran Scan KTP/ Pengantar Kepala Dusun">
                        <img class="img img-responsive img-rounded"  src="<?php echo base_url().KTP.$data['ktp'];?>" alt="">
                    </a>
                    </div>
                    <div class="col-md-4">
                    <a class="fancybox" rel="fancybox" href="<?php echo base_url().PBB.$data['scan_bukti_pbb'];?>" title="Scan Bukti Pembayaran PBB">
                        <img class="img img-responsive img-rounded" src="<?php echo base_url().PBB.$data['scan_bukti_pbb'];?>" alt="">
                    </a>
                    </div>
                    <div class="col-md-4">
                    <a class="fancybox" rel="fancybox" href="<?php echo base_url().SURATKADUS.$data['lampiran_permohonan'];?>" title="Lampiran Scan SURATKADUS/ Pengantar Kepala Dusun">
                        <img class="img img-responsive img-rounded"  src="<?php echo base_url().SURATKADUS.$data['lampiran_permohonan'];?>" alt="">
                    </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="box box-warning">
             <div class="box-header">
                <h4 class="box-title"><i class="fa fa-sticky-note-o"></i> Data Pemeriksaan</h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <dt>Ketua Tim Pemeriksa</dt>
                        <dd><?php echo $ketua_pemeriksa['fullname'];?></dd>
                        <br>
                        <dt>Anggota</dt>
                        <dd><?php echo $pemeriksa_1['fullname'];?></dd>
                        <dd><?php echo $pemeriksa_2['fullname'];?></dd>
                        <dd><?php echo $pemeriksa_3['fullname'];?></dd>
                        <dd><?php echo $pemeriksa_4['fullname'];?></dd>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <dt>Saksi 1</dt>
                        <dd>Nama : <?php echo $data['saksi1_nama'];?> <br> Pekerjaan :  <?php echo $data['saksi1_pekerjaan'];?><br> Alamat :  <?php echo $data['saksi1_alamat'];?></dd><br>
                        <dt>Saksi 2</dt>
                        <dd>Nama :  <?php echo $data['saksi2_nama'];?> <br> Pekerjaan :  <?php echo $data['saksi2_pekerjaan'];?><br> Alamat :  <?php echo $data['saksi2_alamat'];?></dd>
                    </div>
                    <div class="col-md-6">
                        <dt>Saksi 3</dt>
                        <dd>Nama : <?php echo $data['saksi3_nama'];?> <br> Pekerjaan :  <?php echo $data['saksi3_pekerjaan'];?><br> Alamat :  <?php echo $data['saksi3_alamat'];?></dd><br>
                        <dt>Saksi 4</dt>
                        <dd>Nama :  <?php echo $data['saksi4_nama'];?> <br> Pekerjaan :  <?php echo $data['saksi4_pekerjaan'];?><br> Alamat :  <?php echo $data['saksi4_alamat'];?></dd>                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>


<!-- Modal Setuju Dan Pilihan Rekomedasi -->
<div class="modal fade" id="modal_koordinat" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Input Data Koordinat</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'data_koordinat','class'=>'form-horizontal'));?>
      <div class="modal-body form">
          
          <input type="hidden" name="id" value="<?php echo $data['id'];?>">  

            <div class="box box-warning">
                <div class="box-body"> 
                   <!--  -->
                   
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Latitude</label>
                        <div class="col-sm-8">
                           <input type="text" name="lat" class="form-control" id="">                        
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-4" for="">Longitude</label>
                        <div class="col-sm-8">
                           <input type="text" name="lng" class="form-control" id="">                        
                        </div>                        
                    </div>

                    <div id="patok" class="form-group">
                        <label  class="control-label col-sm-4" for="">Foto Patok / Batas</label>
                        <div class="col-sm-8">
                            <input type="file" name="patok" class="form-control" id="">                        
                        </div>                        
                    </div>

                    <div id="utara" class="form-group">
                        <label  class="control-label col-sm-4" for="">Batas Utara</label>
                        <div class="col-sm-8">
                           <input type="text" name="utara" class="form-control" id="">                        
                        </div>                        
                    </div>

                     <div id="selatan" class="form-group">
                        <label  class="control-label col-sm-4" for="">Batas Selatan</label>
                        <div class="col-sm-8">
                           <input type="text" name="selatan" class="form-control" id="">                        
                        </div>                        
                    </div>

                     <div id="barat" class="form-group">
                        <label  class="control-label col-sm-4" for="">Batas Barat</label>
                        <div class="col-sm-8">
                           <input type="text" name="barat" class="form-control" id="">                        
                        </div>                        
                    </div>

                     <div id="timur" class="form-group">
                        <label  class="control-label col-sm-4" for="">Batas Timur</label>
                        <div class="col-sm-8">
                           <input type="text" name="timur" class="form-control" id="">                        
                        </div>                        
                    </div>

                    <div id="keterangan" class="form-group">
                        <label  class="control-label col-sm-4" for="">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea rows="4" cols="8" class="form-control" name="keterangan"></textarea>                  
                        </div>                        
                    </div>
                    <!--  -->
                </div>
            </div>
                    
      </div>
      <input type="hidden" name="tanah_id" value="<?php echo $data['id'];?>">
      <input type="hidden" name="status" value="1">
      <?php if($titik_tengah!=null || $titik_tengah!='') {?>
      <input type="hidden" name="data_link_id" value="<?php echo  $titik_tengah['id'];?>">
      <?php } ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="save_koordinat()" class="btn btn-success">Save Koordinat <i class="fa fa-map-o"></i></button>
      </div>
    </form>
    </div> 
  </div> 
</div>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY"></script>
<script type="text/javascript" src="<?php echo base_url().APPS.'maps.js';?>"></script>