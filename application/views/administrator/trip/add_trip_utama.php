
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><b>Data Trip Pole&Line</b></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."/trip/list_trip" ?>">Data Trip</a></li>
                                    <li class="active">Tambah Trip Baru</li>
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
                        echo form_open_multipart('trip/add_trip',$attributes); 
                              ?>


  
         


                       <div class="row">
            

            <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>
                    <input type='hidden' name='id' value=''>

                    <tr>
                        <th width='120px' scope='row'>Supplier</th>    
                        <td>
                                <select class="form-control" name="id_supplier" id="id_supplier">
                                     <option value="">Select Supplier</option>
                                       <?php foreach($record_suppliers->result() as $row){ ?>
                                        <option value="<?php echo $row->id_supplier ; ?>" <?php if( !empty($post['id_supplier']) ){  if ( $post['id_supplier'] == $row->id_supplier ) { echo 'selected'; } } ?> ><?php echo $row->nama_perusahaan ; ?></option>
                                       <?php  } ?>
                                </select>
                            </td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>Pilih Kapal</th>    
                            <td><select class="form-control" name="id_vessel" id="id_vessel">
                                   <option value="<?php if( !empty($post['id_vessel']) ){ echo $post['id_vessel']; } ?>"><?php if( !empty($post['id_vessel']) ){ echo $vesselData['nama_kapal'];  }else{ echo 'Select vessel'; } ?> </option>

                                </select></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>nama_kapal (*)</th>    
                            <td><input type='text' class='form-control' name='nama_kapal' id="nama_kapal" value="<?php if( !empty($post['nama_kapal']) ){ echo $post['nama_kapal']; } ?>" autocomplete=off required readonly></td>
                    </tr>
                    

                    <!--<tr>
                            <th width='120px' scope='row'>nama_kapal (*)</th>    
                            <td><input type='text' class='form-control' name='nama_kapal' id="nama_kapal" value="<?php if( !empty($post['nama_kapal']) ){ echo $post['nama_kapal']; } ?>" required></td>
                    </tr> -->

                     
                     <tr>
                            <th width='120px' scope='row'>tanda_selar</th>    
                            <td><input type='text' class='form-control' name='tanda_selar' id="tanda_selar" value="<?php if( !empty($post['tanda_selar']) ){ echo $post['tanda_selar']; } ?>" autocomplete=off></td>
                    </tr>
                     
                    <tr>
                            <th width='120px' scope='row'>no_sipi</th>    
                            <td><input type='text' class='form-control' name='no_sipi' id="no_sipi" value="<?php if( !empty($post['no_sipi']) ){ echo $post['no_sipi']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>no_siup</th>    
                            <td><input type='text' class='form-control' name='no_siup' id="no_siup" value="<?php if( !empty($post['no_siup']) ){ echo $post['no_siup']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>call_sign</th>    
                            <td><input type='text' class='form-control' name='call_sign' id="call_sign" value="<?php if( !empty($post['call_sign']) ){ echo $post['call_sign']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>rfmo code</th>    
                            <td><input type='text' class='form-control' name='rfmo' id="rfmo" value="<?php if( !empty($post['rfmo']) ){ echo $post['rfmo']; } ?>" autocomplete=off></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>rfmo choice</th>    
                            <td >
                                 <select class='form-control' name='rfmo_choice' id="rfmo_choice">
                                  <option value="" >Silahkan Pilih</option>
                                    <option value="WCPFC" <?php if( !empty($post['rfmo_choice']) ){ if($post['rfmo_choice'] == "wcpfc"){ echo 'selected';  } } ?>>wcpfc</option>
                                    <option value="IOTC" <?php if( !empty($post['rfmo_choice']) ){ if($post['rfmo_choice'] == "iotc"){ echo 'selected';  } } ?>>iotc</option>
                                    <option value="CSBT" <?php if( !empty($post['rfmo_choice']) ){ if($post['rfmo_choice'] == "csbt"){ echo 'selected';  } } ?>>csbt</option>
                                </select>
                            </td>
                    </tr>


                      <input type='hidden' class='form-control' name='wcpfc' id="wcpfc" value="<?php if( !empty($post['wcpfc']) ){ echo $post['wcpfc']; } ?>" autocomplete=off>
                    <input type='hidden' class='form-control' name='iotc' id="iotc" value="<?php if( !empty($post['iotc']) ){ echo $post['iotc']; } ?>" autocomplete=off>
                    <input type='hidden' class='form-control' name='csbt' id="csbt" value="<?php if( !empty($post['csbt']) ){ echo $post['csbt']; } ?>" autocomplete=off>
                    
                     
                    <!-- <tr>
                            <th width='120px' scope='row'>wcpfc</th>    
                            <td><input type='text' class='form-control' name='wcpfc' id="wcpfc" value="<?php if( !empty($post['wcpfc']) ){ echo $post['wcpfc']; } ?>" autocomplete=off></td>
                    </tr>
                     
                    
                    <tr>
                            <th width='120px' scope='row'>iotc</th>    
                            <td><input type='text' class='form-control' name='iotc' id="iotc" value="<?php if( !empty($post['iotc']) ){ echo $post['iotc']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>csbt</th>    
                            <td><input type='text' class='form-control' name='csbt' id="csbt" value="<?php if( !empty($post['csbt']) ){ echo $post['csbt']; } ?>" autocomplete=off></td>
                    </tr> -->
                     
                    
              
                    </tbody>
                  </table>
                </div>



                  <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>
          
          
                     <tr>
                            <th width='120px' scope='row'>tahun_pembuatan_kapal</th>    
                            <td><input type='number' class='form-control' name='tahun_pembuatan_kapal' id="tahun_pembuatan_kapal" value="<?php if( !empty($post['tahun_pembuatan_kapal']) ){ echo $post['tahun_pembuatan_kapal']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>bendera</th>    
                            <td> <input type='text' class='form-control' name='bendera' id="bendera" value="<?php if( !empty($post['bendera']) ){ echo $post['bendera']; } ?>" autocomplete=off ></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>bahan</th>    
                            <td>
                                <!--<input type='text' class='form-control' name='bahan' id="bahan" value="<?php if( !empty($post['bahan']) ){ echo $post['bahan']; } ?>">-->
                                <select class='form-control' name='bahan' id="bahan">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Kayu" <?php if( !empty($post['bahan']) ){ if($post['bahan'] == "Kayu"){ echo 'selected';  } } ?>>Kayu</option>
                                    <option value="Besi" <?php if( !empty($post['bahan']) ){ if($post['bahan'] == "Besi"){ echo 'selected';  } } ?>>Besi</option>
                                    <option value="Fiberglass" <?php if( !empty($post['bahan']) ){ if($post['bahan'] == "Fiberglass"){ echo 'selected';  } } ?>>Fiberglass</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>gt</th>    
                            <td><input type='number' class='form-control' name='gt' id="gt" value="<?php if( !empty($post['gt']) ){ echo $post['gt']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>hp</th>    
                            <td><input type='number' class='form-control' name='hp' id="hp" value="<?php if( !empty($post['hp']) ){ echo $post['hp']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     
                     <tr>
                            <th width='120px' scope='row'>nama_fishing_master</th>    
                            <td><input type='text' class='form-control' name='nama_fishing_master' id="nama_fishing_master" value="<?php if( !empty($post['nama_fishing_master']) ){ echo $post['nama_fishing_master']; } ?>" autocomplete=off></td>
                    </tr>
          
          
          

                     <tr>
                            <th width='120px' scope='row'>nama_nahkoda  (*)</th>    
                            <td><input type='text' class='form-control' name='nama_nahkoda' id="nama_nahkoda" required value="<?php if( !empty($post['nama_nahkoda']) ){ echo $post['nama_nahkoda']; } ?>" autocomplete=off></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>pelabuhan_keberangkatan  (*)</th>    
                            <td>
                              <!--<input type='text' class='form-control' name='pelabuhan_keberangkatan' id="pelabuhan_keberangkatan" required value="<?php if( !empty($post['pelabuhan_keberangkatan']) ){ echo $post['pelabuhan_keberangkatan']; } ?>">-->
                               <select class="form-control" name="pelabuhan_keberangkatan" id="pelabuhan_keberangkatan">
                                     <option value="">Select Pelabuhan</option>
                                       <?php foreach($record_landings->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_name ; ?>" <?php if( !empty($post['pelabuhan_keberangkatan']) ){  if ( $post['pelabuhan_keberangkatan'] == $row->kode_name ) { echo 'selected'; } } ?> ><?php echo $row->nama_landing ; ?></option>
                                       <?php  } ?>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>pelabuhan_kedatangan  (*)</th>    
                            <td><!--<input type='text' class='form-control' name='pelabuhan_kedatangan' id="pelabuhan_kedatangan" required value="<?php if( !empty($post['pelabuhan_kedatangan']) ){ echo $post['pelabuhan_kedatangan']; } ?>">-->
                               <select class="form-control" name="pelabuhan_kedatangan" id="pelabuhan_kedatangan">
                                     <option value="">Select Pelabuhan</option>
                                       <?php foreach($record_landings->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_name ; ?>" <?php if( !empty($post['pelabuhan_kedatangan']) ){  if ( $post['pelabuhan_kedatangan'] == $row->kode_name ) { echo 'selected'; } } ?> ><?php echo $row->nama_landing ; ?></option>
                                       <?php  } ?>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>tanggal_keberangkatan  (*)</th>    
                            <td><input type="text" class='form-control' name='tanggal_keberangkatan' id="tanggal_keberangkatan"  onkeydown="return false" required value="<?php if( !empty($post['tanggal_keberangkatan']) ){ echo $post['tanggal_keberangkatan']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>tanggal_kedatangan  (*)</th>    
                            <td><input type="text" class='form-control' name='tanggal_kedatangan' id="tanggal_kedatangan"  onkeydown="return false" required value="<?php if( !empty($post['tanggal_kedatangan']) ){ echo $post['tanggal_kedatangan']; } ?>" autocomplete=off></td>
                    </tr>
                     

             


                    </tbody>
                  </table>
                </div>



                <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                                <tr>
                            <th width='120px' scope='row'>jumlah_wni  (*)</th>    
                            <td><input type='number' class='form-control' name='jumlah_wni' id="jumlah_wni" required value="<?php if( !empty($post['jumlah_wni']) ){ echo $post['jumlah_wni']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>jumlah_wna  (*)</th>    
                            <td><input type='number' class='form-control' name='jumlah_wna' id="jumlah_wna" required value="<?php if( !empty($post['jumlah_wna']) ){ echo $post['jumlah_wna']; } ?>" autocomplete=off></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>panjang_kapal (m)</th>    
                            <td><input type='number' class='form-control' name='panjang_kapal' id="panjang_kapal" value="<?php if( !empty($post['panjang_kapal']) ){ echo $post['panjang_kapal']; } ?>" autocomplete=off step=".01"></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>lebar_kapal (m)</th>    
                            <td><input type='number' class='form-control' name='lebar_kapal' id="lebar_kapal" value="<?php if( !empty($post['lebar_kapal']) ){ echo $post['lebar_kapal']; } ?>" autocomplete=off step=".01"></td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>vms</th>    
                            <td>
                              <!--<input type='text' class='form-control' name='vms' id="vms" value="<?php if( !empty($post['vms']) ){ echo $post['vms']; } ?>" >-->
                               <select class='form-control' name='vms' id="vms">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($post['vms']) ){ if($post['vms'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($post['vms']) ){ if($post['vms'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>kondisi_vms</th>    
                            <td>
                              <!--<input type='text' class='form-control' name='kondisi_vms' id="kondisi_vms" value="<?php if( !empty($post['kondisi_vms']) ){ echo $post['kondisi_vms']; } ?>">-->
                               <select class='form-control' name='kondisi_vms' id="kondisi_vms">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="On" <?php if( !empty($post['kondisi_vms']) ){ if($post['kondisi_vms'] == "On"){ echo 'selected';  } } ?>> On</option>
                                    <option value="Off" <?php if( !empty($post['kondisi_vms']) ){ if($post['kondisi_vms'] == "Off"){ echo 'selected';  } } ?>> Off</option>
                                </select>
                            </td>
                    </tr>
                        
                     <tr>
                            <th width='120px' scope='row'>vts</th>    
                            <td>
                             <!-- <input type='text' class='form-control' name='vts' id="vts" value="<?php if( !empty($post['vts']) ){ echo $post['vts']; } ?>">-->
                             <select class='form-control' name='vts' id="vts">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($post['vts']) ){ if($post['vts'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($post['vts']) ){ if($post['vts'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>kondisi_vts</th>    
                            <td>
                              <!--<input type='text' class='form-control' name='kondisi_vts' id="kondisi_vts" value="<?php if( !empty($post['kondisi_vts']) ){ echo $post['kondisi_vts']; } ?>">-->
                                <select class='form-control' name='kondisi_vts' id="kondisi_vts">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="On" <?php if( !empty($post['kondisi_vts']) ){ if($post['kondisi_vts'] == "On"){ echo 'selected';  } } ?>> On</option>
                                    <option value="Off" <?php if( !empty($post['kondisi_vts']) ){ if($post['kondisi_vts'] == "Off"){ echo 'selected';  } } ?>> Off</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>penanganan_diatas_kapal</th>    
                            <td>
                             <!-- <input type='text' class='form-control' name='penanganan_diatas_kapal' id="penanganan_diatas_kapal" value="<?php if( !empty($post['penanganan_diatas_kapal']) ){ echo $post['penanganan_diatas_kapal']; } ?>">-->
                              <select class='form-control' name='penanganan_diatas_kapal' id="penanganan_diatas_kapal">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Utuh" <?php if( !empty($post['penanganan_diatas_kapal']) ){ if($post['penanganan_diatas_kapal'] == "Y"){ echo 'selected';  } } ?>>Utuh</option>
                                    <option value="Loins" <?php if( !empty($post['penanganan_diatas_kapal']) ){ if($post['penanganan_diatas_kapal'] == "T"){ echo 'selected';  } } ?>>Loins</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>cara_penanganan_pasca_panen</th>    
                            <td>
                              <!--<input type='text' class='form-control' name='cara_penanganan_pasca_panen' id="cara_penanganan_pasca_panen" value="<?php if( !empty($post['cara_penanganan_pasca_panen']) ){ echo $post['cara_penanganan_pasca_panen']; } ?>">-->
                               <select class='form-control' name='cara_penanganan_pasca_panen' id="cara_penanganan_pasca_panen">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Es" <?php if( !empty($post['cara_penanganan_pasca_panen']) ){ if($post['cara_penanganan_pasca_panen'] == "Y"){ echo 'selected';  } } ?>>Es</option>
                                    <option value="Frozen" <?php if( !empty($post['cara_penanganan_pasca_panen']) ){ if($post['cara_penanganan_pasca_panen'] == "T"){ echo 'selected';  } } ?>>Frozen</option>
                                </select>
                              </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>foto_kapal</th>    
                            <td><!--<input type='text' class='form-control' name='foto_kapal' id="foto_kapal" value="<?php if( !empty($post['foto_kapal']) ){ echo $post['foto_kapal']; } ?>">-->
                               <select class='form-control' name='foto_kapal' id="foto_kapal">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($post['foto_kapal']) ){ if($post['foto_kapal'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($post['foto_kapal']) ){ if($post['foto_kapal'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
                    </tr>
                     
                     <tr>
                            <th width='120px' scope='row'>upload_foto</th>    
                            <td><input type='text' class='form-control' name='upload_foto' id="upload_foto" value="<?php if( !empty($post['upload_foto']) ){ echo $post['upload_foto']; } ?>" autocomplete=off></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>upload_foto img</th>    
                            <td> <input type="file" class="form-control" name="upload_foto_img" id="upload_foto_img" accept="image/*" ></td>
                    </tr>

                   
                            

                    <tr>
                            <th width='120px' scope='row'>nama_pemantau</th>    
                            <td><input type='text' class='form-control' name='nama_pemantau' id="nama_pemantau" value="<?php if( !empty($post['nama_pemantau']) ){ echo $post['nama_pemantau']; } ?>" autocomplete=off></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>id Trip-Pemantau</th>    
                            <td><input type='text' class='form-control' name='id_pemantau' id="id_pemantau" value="<?php if( !empty($post['id_pemantau']) ){ echo $post['id_pemantau']; } ?>" autocomplete=off></td>
                    </tr>


                    <tr>
                            <th width='120px' scope='row'>tanggal_pemantau</th>    
                            <td><input type='text' class='form-control' name='tanggal_pemantau' id="tanggal_pemantau" value="<?php if( !empty($post['tanggal_pemantau']) ){ echo $post['tanggal_pemantau']; } ?>" autocomplete=off></td>
                    </tr>

                     </tbody>
                  </table>
                </div>

              </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                <a href="<?php echo base_url(); ?>trip/list_trip"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
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
        minDate: "-365D",
        maxDate: 0,
        numberOfMonths: 2,
        onSelect: function(selected) {
          $("#tanggal_kedatangan").datepicker("option","minDate", selected)
        }
    });

     $( "#tanggal_kedatangan" ).datepicker({

        dateFormat: 'yy-mm-dd', 
        minDate: "-365D",
        maxDate: 0,
        numberOfMonths: 2,
        onSelect: function(selected) {
           $("#tanggal_keberangkatan").datepicker("option","maxDate", selected)
        }

         
     });

        $( "#tanggal_pemantau" ).datepicker(
    {   
        dateFormat: 'yy-mm-dd', 
        minDate: "-365D",
        maxDate: 0,
        numberOfMonths: 2
    });


  } );


$(document).ready(function() {

     /* Dropdown Dinamic */
   $("#id_supplier").change(function(){

        var id = $("#id_supplier").val();
       

       $("#id_vessel").html('<option value="">Select Vessel</option>');

       //alert(id); 

       $("#nama_kapal").val('');
       $("#tanda_selar").val('');
       $("#no_sipi").val('');
       $("#no_siup").val('');
       $("#call_sign").val('');
       $("#rfmo").val('');
       $("#wcpfc").val('');
       $("#iotc").val('');
       $("#tahun_pembuatan_kapal").val('');
       $("#bendera").val('');
       //$("#bahan").html('');
       $("#gt").val('');
       $("#hp").val('');
       $("#panjang_kapal").val('');
       $("#lebar_kapal").val('');

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
       
        //alert(id); 

       $("#nama_kapal").val('');
       $("#tanda_selar").val('');
       $("#no_sipi").val('');
       $("#no_siup").val('');
       $("#call_sign").val('');
       $("#rfmo").val('');
       $("#wcpfc").val('');
       $("#iotc").val('');
       $("#tahun_pembuatan_kapal").val('');
       $("#bendera").val('');
       //$("#bahan").html('');
       $("#gt").val('');
       $("#hp").val('');
       $("#panjang_kapal").val('');
       $("#lebar_kapal").val('');
       //$("#vms").html('');

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
                $('#rfmo_choice').val(response.messages[0].rfmo_choice);
                $('#tahun_pembuatan_kapal').val(response.messages[0].tahun_pembuatan_kapal);
                $('#bendera').val(response.messages[0].bendera);
                $('#bahan').val(response.messages[0].bahan);
                $('#call_sign').val(response.messages[0].irc);

                $('#gt').val(response.messages[0].gt);
                $('#hp').val(response.messages[0].kapasitas_mesin_utama);
                $('#panjang_kapal').val(response.messages[0].panjang);
                $('#lebar_kapal').val(response.messages[0].lebar);
                $('#vms').val(response.messages[0].vms);
             
            }
        });    
    });

 } );

</script>