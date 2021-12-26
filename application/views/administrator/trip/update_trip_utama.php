
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data Trip</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."/administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."/trip/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
                                    <li class="active">Update Trip</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

           <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title">Trip Add</strong>
                                
                            </div>


                            <div class="card-body">

                            	<?php echo validation_errors(); ?>
                            	<?php 
                            	 $attributes = array('class'=>'form-horizontal','role'=>'form');
             						echo form_open_multipart('trip/trip_update/'.$kode_trip,$attributes); 
                            	?>


         <div class="row">

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                    <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                
                    <tr>
                            <th width='120px' scope='row'>Supplier</th>    
                            <td><input type='text' class='form-control' name='id_supplier' id="id_supplier" value="<?php if( !empty($tripDetail['id_supplier']) ){ echo $tripDetail['id_supplier']; } ?>" readonly></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>Kapal</th>    
                            <td><input type='text' class='form-control' name='id_vessel' id="id_vessel" value="<?php if( !empty($tripDetail['id_vessel']) ){ echo $tripDetail['id_vessel']; } ?>" readonly></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>nama_kapal (*)</th>    
                            <td><input type='text' class='form-control' name='nama_kapal' id="nama_kapal" value="<?php if( !empty($nama_kapal) ){ echo $nama_kapal; } ?>" readonly></td>
                    </tr>

                     
                     <tr>
                            <th width='120px' scope='row'>tanda_selar</th>    
                            <td><input type='text' class='form-control' name='tanda_selar' id="tanda_selar" value="<?php if( !empty($tripDetail['tanda_selar']) ){ echo $tripDetail['tanda_selar']; } ?>" autocomplete=off></td>
                    </tr>
                     
                    <tr>
                            <th width='120px' scope='row'>no_sipi</th>    
                            <td><input type='text' class='form-control' name='no_sipi' id="no_sipi" value="<?php if( !empty($tripDetail['no_sipi']) ){ echo $tripDetail['no_sipi']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>no_siup</th>    
                            <td><input type='text' class='form-control' name='no_siup' id="no_siup" value="<?php if( !empty($tripDetail['no_siup']) ){ echo $tripDetail['no_siup']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>call_sign</th>    
                            <td><input type='text' class='form-control' name='call_sign' id="call_sign" value="<?php if( !empty($tripDetail['call_sign']) ){ echo $tripDetail['call_sign']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>rfmo</th>    
                            <td><input type='text' class='form-control' name='rfmo' id="rfmo" value="<?php if( !empty($tripDetail['rfmo']) ){ echo $tripDetail['rfmo']; } ?>" autocomplete=off></td>
                    </tr>


                     <tr>
                            <th width='120px' scope='row'>rfmo choice</th>    
                            <td >
                                 <select class='form-control' name='rfmo_choice'>
                                  <option value="" >Silahkan Pilih</option>
                                    <option value="WCPFC" <?php if( !empty($tripDetail['rfmo_choice']) ){ if($tripDetail['rfmo_choice'] == "wcpfc"){ echo 'selected';  } } ?>>wcpfc</option>
                                    <option value="IOTC" <?php if( !empty($tripDetail['rfmo_choice']) ){ if($tripDetail['rfmo_choice'] == "iotc"){ echo 'selected';  } } ?>>iotc</option>
                                    <option value="CSBT" <?php if( !empty($tripDetail['rfmo_choice']) ){ if($tripDetail['rfmo_choice'] == "csbt"){ echo 'selected';  } } ?>>csbt</option>
                                </select>
                            </td>
                    </tr>

                    <input type='hidden' class='form-control' name='wcpfc' id="wcpfc" value="<?php if( !empty($tripDetail['wcpfc']) ){ echo $tripDetail['wcpfc']; } ?>" autocomplete=off>
                    <input type='hidden' class='form-control' name='iotc' id="iotc" value="<?php if( !empty($tripDetail['iotc']) ){ echo $tripDetail['iotc']; } ?>" autocomplete=off>
                    <input type='hidden' class='form-control' name='csbt' id="csbt" value="<?php if( !empty($tripDetail['csbt']) ){ echo $tripDetail['csbt']; } ?>" autocomplete=off>
                     
                   <!--  <tr>
                            <th width='120px' scope='row'>wcpfc</th>    
                            <td><input type='text' class='form-control' name='wcpfc' id="wcpfc" value="<?php if( !empty($tripDetail['wcpfc']) ){ echo $tripDetail['wcpfc']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>iotc</th>    
                            <td><input type='text' class='form-control' name='iotc' id="iotc" value="<?php if( !empty($tripDetail['iotc']) ){ echo $tripDetail['iotc']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>csbt</th>    
                            <td><input type='text' class='form-control' name='csbt' id="csbt" value="<?php if( !empty($tripDetail['csbt']) ){ echo $tripDetail['csbt']; } ?>" autocomplete=off></td>
                    </tr>

                    -->
                     
                       <tr>
                            <th width='120px' scope='row'>tahun_pembuatan_kapal</th>    
                            <td><input type='number' class='form-control' name='tahun_pembuatan_kapal' id="tahun_pembuatan_kapal" value="<?php if( !empty($tripDetail['tahun_pembuatan_kapal']) ){ echo $tripDetail['tahun_pembuatan_kapal']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>bendera</th>    
                            <td><input type='text' class='form-control' name='bendera' id="bendera" value="<?php if( !empty($tripDetail['bendera']) ){ echo $tripDetail['bendera']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     
                    </tbody>
                  </table>
                </div>




                 <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                     <tr>
                            <th width='120px' scope='row'>bahan</th>    
                            <td>
                               <!-- <input type='text' class='form-control' name='bahan' id="bahan" value="<?php if( !empty($tripDetail['bahan']) ){ echo $tripDetail['bahan']; } ?>">-->
                                 <select class='form-control' name='bahan' id="bahan">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Kayu" <?php if( !empty($tripDetail['bahan']) ){ if($tripDetail['bahan'] == "Kayu"){ echo 'selected';  } } ?>>Kayu</option>
                                    <option value="Besi" <?php if( !empty($tripDetail['bahan']) ){ if($tripDetail['bahan'] == "Besi"){ echo 'selected';  } } ?>>Besi</option>
                                    <option value="Fiberglass" <?php if( !empty($tripDetail['bahan']) ){ if($tripDetail['bahan'] == "Fiberglass"){ echo 'selected';  } } ?>>Fiberglass</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>gt</th>    
                            <td><input type='number' class='form-control' name='gt' id="gt" value="<?php if( !empty($tripDetail['gt']) ){ echo $tripDetail['gt']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>hp</th>    
                            <td><input type='number' class='form-control' name='hp' id="hp" value="<?php if( !empty($tripDetail['hp']) ){ echo $tripDetail['hp']; } ?>" autocomplete=off></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>nama_fishing_master</th>    
                            <td><input type='text' class='form-control' name='nama_fishing_master' id="nama_fishing_master" value="<?php if( !empty($tripDetail['nama_fishing_master']) ){ echo $tripDetail['nama_fishing_master']; } ?>" autocomplete=off></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>nama_nahkoda  (*)</th>    
                            <td><input type='text' class='form-control' name='nama_nahkoda' id="nama_nahkoda" required value="<?php if( !empty($tripDetail['nama_nahkoda']) ){ echo $tripDetail['nama_nahkoda']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     
                     <tr>
                            <th width='120px' scope='row'>pelabuhan_keberangkatan  (*)</th>    
                            <td><!--<input type='text' class='form-control' name='pelabuhan_keberangkatan' id="pelabuhan_keberangkatan" required value="<?php if( !empty($tripDetail['pelabuhan_keberangkatan']) ){ echo $tripDetail['pelabuhan_keberangkatan']; } ?>">-->
                                 <select class="form-control" name="pelabuhan_keberangkatan" id="pelabuhan_keberangkatan">
                                     <option value="">Select Pelabuhan</option>
                                       <?php foreach($record_landings->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_name ; ?>" <?php if( !empty($tripDetail['pelabuhan_keberangkatan']) ){  if ( $tripDetail['pelabuhan_keberangkatan'] == $row->kode_name ) { echo 'selected'; } } ?> ><?php echo $row->nama_landing ; ?></option>
                                       <?php  } ?>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>pelabuhan_kedatangan  (*)</th>    
                            <td><!--<input type='text' class='form-control' name='pelabuhan_kedatangan' id="pelabuhan_kedatangan" required value="<?php if( !empty($tripDetail['pelabuhan_kedatangan']) ){ echo $tripDetail['pelabuhan_kedatangan']; } ?>">-->
                                 <select class="form-control" name="pelabuhan_kedatangan" id="pelabuhan_kedatangan">
                                     <option value="">Select Pelabuhan</option>
                                       <?php foreach($record_landings->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_name ; ?>" <?php if( !empty($tripDetail['pelabuhan_kedatangan']) ){  if ( $tripDetail['pelabuhan_kedatangan'] == $row->kode_name ) { echo 'selected'; } } ?> ><?php echo $row->nama_landing ; ?></option>
                                       <?php  } ?>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>tanggal_keberangkatan  (*)</th>    
                            <td><input type="text" class='form-control' name='tanggal_keberangkatan' id="tanggal_keberangkatan"   required value="<?php if( !empty($tripDetail['tanggal_keberangkatan']) ){ echo $tripDetail['tanggal_keberangkatan']; } ?>" ></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>tanggal_kedatangan  (*)</th>    
                            <td><input type="text" class='form-control' name='tanggal_kedatangan' id="tanggal_kedatangan"   required value="<?php if( !empty($tripDetail['tanggal_kedatangan']) ){ echo $tripDetail['tanggal_kedatangan']; } ?>" ></td>
                    </tr>
                     
                       <tr>
                            <th width='120px' scope='row'>jumlah_wni  (*)</th>    
                            <td><input type='number' class='form-control' name='jumlah_wni' id="jumlah_wni" required value="<?php if( !empty($tripDetail['jumlah_wni']) ){ echo $tripDetail['jumlah_wni']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>jumlah_wna  (*)</th>    
                            <td><input type='number' class='form-control' name='jumlah_wna' id="jumlah_wna" required value="<?php if( !empty($tripDetail['jumlah_wna']) ){ echo $tripDetail['jumlah_wna']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>panjang_kapal</th>    
                            <td><input type='number' class='form-control' name='panjang_kapal' id="panjang_kapal" value="<?php if( !empty($tripDetail['panjang_kapal']) ){ echo $tripDetail['panjang_kapal']; } ?>" autocomplete=off step=".01"></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>lebar_kapal</th>    
                            <td><input type='number' class='form-control' name='lebar_kapal' id="lebar_kapal" value="<?php if( !empty($tripDetail['lebar_kapal']) ){ echo $tripDetail['lebar_kapal']; } ?>" autocomplete=off step=".01"></td>
                    </tr>


                  </tbody>
                  </table>
                </div>




                 <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>


                      
                     
                     <tr>
                            <th width='120px' scope='row'>vms</th>    
                            <td>
                               <!-- <input type='text' class='form-control' name='vms' id="vms" value="<?php if( !empty($tripDetail['vms']) ){ echo $tripDetail['vms']; } ?>" >-->
                               <select class='form-control' name='vms' id="vms">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($tripDetail['vms']) ){ if($tripDetail['vms'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($tripDetail['vms']) ){ if($tripDetail['vms'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>kondisi_vms</th>    
                            <td>
                               <!-- <input type='text' class='form-control' name='kondisi_vms' id="kondisi_vms" value="<?php if( !empty($tripDetail['kondisi_vms']) ){ echo $tripDetail['kondisi_vms']; } ?>">-->
                                <select class='form-control' name='kondisi_vms' id="kondisi_vms">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="On" <?php if( !empty($tripDetail['kondisi_vms']) ){ if($tripDetail['kondisi_vms'] == "On"){ echo 'selected';  } } ?>> On</option>
                                    <option value="Off" <?php if( !empty($tripDetail['kondisi_vms']) ){ if($tripDetail['kondisi_vms'] == "Off"){ echo 'selected';  } } ?>> Off</option>
                                </select>
                            </td>
                    </tr>
                        
                     <tr>
                            <th width='120px' scope='row'>vts</th>    
                            <td>
                                <!--<input type='text' class='form-control' name='vts' id="vts" value="<?php if( !empty($tripDetail['vts']) ){ echo $tripDetail['vts']; } ?>">-->
                                 <select class='form-control' name='vts' id="vts">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($tripDetail['vts']) ){ if($tripDetail['vts'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($tripDetail['vts']) ){ if($tripDetail['vts'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>kondisi_vts</th>    
                            <td>
                               <!-- <input type='text' class='form-control' name='kondisi_vts' id="kondisi_vts" value="<?php if( !empty($tripDetail['kondisi_vts']) ){ echo $tripDetail['kondisi_vts']; } ?>">-->
                                 <select class='form-control' name='kondisi_vts' id="kondisi_vts">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="On" <?php if( !empty($tripDetail['kondisi_vts']) ){ if($tripDetail['kondisi_vts'] == "On"){ echo 'selected';  } } ?>> On</option>
                                    <option value="Off" <?php if( !empty($tripDetail['kondisi_vts']) ){ if($tripDetail['kondisi_vts'] == "Off"){ echo 'selected';  } } ?>> Off</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>penanganan_diatas_kapal</th>    
                            <td>
                                <!--<input type='text' class='form-control' name='penanganan_diatas_kapal' id="penanganan_diatas_kapal" value="<?php if( !empty($tripDetail['penanganan_diatas_kapal']) ){ echo $tripDetail['penanganan_diatas_kapal']; } ?>">-->
                                <select class='form-control' name='penanganan_diatas_kapal' id="penanganan_diatas_kapal">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Utuh" <?php if( !empty($tripDetail['penanganan_diatas_kapal']) ){ if($tripDetail['penanganan_diatas_kapal'] == "Utuh"){ echo 'selected';  } } ?>>Utuh</option>
                                    <option value="Loins" <?php if( !empty($tripDetail['penanganan_diatas_kapal']) ){ if($tripDetail['penanganan_diatas_kapal'] == "Loins"){ echo 'selected';  } } ?>>Loins</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>cara_penanganan_pasca_panen</th>    
                            <td><!--<input type='text' class='form-control' name='cara_penanganan_pasca_panen' id="cara_penanganan_pasca_panen" value="<?php if( !empty($tripDetail['cara_penanganan_pasca_panen']) ){ echo $tripDetail['cara_penanganan_pasca_panen']; } ?>">-->
                                 <select class='form-control' name='cara_penanganan_pasca_panen' id="cara_penanganan_pasca_panen">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Es" <?php if( !empty($tripDetail['cara_penanganan_pasca_panen']) ){ if($tripDetail['cara_penanganan_pasca_panen'] == "Es"){ echo 'selected';  } } ?>>Es</option>
                                    <option value="Frozen" <?php if( !empty($tripDetail['cara_penanganan_pasca_panen']) ){ if($tripDetail['cara_penanganan_pasca_panen'] == "Frozen"){ echo 'selected';  } } ?>>Frozen</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>foto_kapal</th>    
                            <td><!--<input type='text' class='form-control' name='foto_kapal' id="foto_kapal" value="<?php if( !empty($tripDetail['foto_kapal']) ){ echo $tripDetail['foto_kapal']; } ?>">-->
                                <select class='form-control' name='foto_kapal' id="foto_kapal">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($tripDetail['foto_kapal']) ){ if($tripDetail['foto_kapal'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($tripDetail['foto_kapal']) ){ if($tripDetail['foto_kapal'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>upload_foto</th>    
                            <td><input type='text' class='form-control' name='upload_foto' id="upload_foto" value="<?php if( !empty($tripDetail['upload_foto']) ){ echo $tripDetail['upload_foto']; } ?>" autocomplete=off></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>upload_foto img</th>    
                            <td> <input type="file" class="form-control" name="upload_foto_img" id="upload_foto_img" accept="image/*" >

                                <?php if( !empty($tripDetail['upload_foto_img']) ){ ?>
                                                <img src="<?php echo base_url() ?>assets/upload/<?php echo $tripDetail['upload_foto_img']; ?> " class="thumbnail" width="100px" height="100px">
                                <?php }  ?>

                            </td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>nama_pemantau</th>    
                            <td><input type='text' class='form-control' name='nama_pemantau' id="nama_pemantau" value="<?php if( !empty($tripDetail['nama_pemantau']) ){ echo $tripDetail['nama_pemantau']; } ?>" autocomplete=off></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>id Trip-Pemantau</th>    
                            <td><input type='text' class='form-control' name='id_pemantau' id="id_pemantau" value="<?php if( !empty($tripDetail['id_pemantau']) ){ echo $tripDetail['id_pemantau']; } ?>" autocomplete=off></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>tanggal_pemantau (*)</th>    
                            <td><input type='text' class='form-control' name='tanggal_pemantau' id="tanggal_pemantau" value="<?php if( !empty($tripDetail['tanggal_pemantau']) ){ echo $tripDetail['tanggal_pemantau']; } ?>" autocomplete=off></td>
                    </tr>

                    </tbody>
                  </table>
                </div>



        </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Update</button>
               <a href='<?php echo base_url()."trip/trip_detail/".$kode_trip; ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->




<script>

 $( function() {
    $( "#tanggal_keberangkatan" ).datepicker(
    {   
        dateFormat: 'yy-mm-dd', 
        changeMonth: true,
        changeYear: true,
    });

     $( "#tanggal_kedatangan" ).datepicker({
        dateFormat: 'yy-mm-dd', 
         changeMonth: true,
        changeYear: true,
     });

     $( "#tanggal_pemantau" ).datepicker({
        dateFormat: 'yy-mm-dd', 
         changeMonth: true,
        changeYear: true,
     });
  } );


$(document).ready(function() {

     /* Dropdown Dinamic */
   $("#id_supplier").change(function(){

        var id = $("#id_supplier").val();
       

       $("#id_vessel").html('<option value="">Select Vessel</option>');

       alert(id); 

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo $load_vessel_from_id_supplier; ?>",
            data: "id="+id,
            success: function(msg){

                if(msg == ''){
                    $("#id_vessel").html('<option value="">Select Vessel</option>');

                }else{
                    $("#id_vessel").html(msg);                                                     
                }
            }
        });    
    });


   $("#id_vessel").change(function(){

        var id = $("#id_vessel").val();
       
        alert(id); 

       $("#nama_kapal").html('');
       $("#tanda_selar").html('');
       $("#no_sipi").html('');
       $("#no_siup").html('');
       $("#call_sign").html('');
       $("#rfmo").html('');
       $("#wcpfc").html('');
       $("#iotc").html('');
       $("#tahun_pembuatan_kapal").html('');
       $("#bendera").html('');
       $("#bahan").html('');
       $("#gt").html('');
       $("#hp").html('');
       $("#panjang_kapal").html('');
       $("#lebar_kapal").html('');
       $("#vms").html('');


        $.ajax({
            url: "<?php echo $select_vessel_from_id_supplier; ?>",
            type: 'post',
            data: {id : id },
            dataType: 'json',
            success: function(response){

                console.log(response);

                $('#nama_kapal').val(response.messages[0].nama_kapal);
                $('#tanda_selar').val(response.messages[0].tanda_selar);
                $('#no_sipi').val(response.messages[0].no_sipi);
                $('#no_siup').val(response.messages[0].no_siup);
                $('#rfmo').val(response.messages[0].rfmo);
                $('#tahun_pembuatan_kapal').val(response.messages[0].tahun_pembuatan_kapal);
                $('#bendera').val(response.messages[0].bendera);
                $('#bahan').val(response.messages[0].bahan);
                $('#gt').val(response.messages[0].gt);
                $('#hp').val(response.messages[0].pk);
                $('#panjang_kapal').val(response.messages[0].ukuran);
                $('#lebar_kapal').val(response.messages[0].lebar);
                $('#vms').val(response.messages[0].vms);
             
            }
        });    
    });

 } );

</script>