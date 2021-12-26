
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><?php echo $page_name ; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."trip/form5/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
                                    <li class="active"><?php echo $page_name_detail ; ?></li>
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
                                <strong class="card-title">Add Data <?php echo $page_name_detail; ?></strong>
                              
                            </div>


                            <div class="card-body">

                                
                                <?php 
                                 $attributes = array('class'=>'form-horizontal','role'=>'form');
                                    echo form_open_multipart('trip/form5_add/'.$kode_trip,$attributes); 
                                ?>

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

    
                  <tbody>

                    

                       <tr>
                            <th width='120px' scope='row'>kode trip</th>   
                            <td><input type='text' class='form-control' name='kode_trip' value="<?php echo $kode_trip; ?>" readonly></td>
                       </tr>

                       
                      <tr>
                            <th width='120px' scope='row'>tanggal</th>   
                            <td><input type='text' class='form-control' name='tanggal' id="tanggal" value="<?php if( !empty($post['tanggal']) ){ echo $post['tanggal']; } ?>" autocomplete=off></td>
                       </tr>

                       <tr>
                            <th width='120px' scope='row'>waktu (contoh: 11:45 AM)</th>   
                            <td><!--<input type='text' class='form-control' name='waktu' value="<?php if( !empty($post['waktu']) ){ echo $post['waktu']; } ?>" autocomplete=off>-->
                               
                              <input type='time' class='form-control' name='waktu' value="<?php if( !empty($post['waktu']) ){ echo $post['waktu']; } ?>" placeholder="waktu">
                              
                               <!--<div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' placeholder="Jam" name='jam' required autocomplete=off required min='0' max='23' value="<?php if( !empty($post['jam']) ){ echo $post['jam']; } ?>">
                                    </div>
                                    <b>:</b> 
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' placeholder="Menit" name='menit' required autocomplete=off required min='0' max='59' value="<?php if( !empty($post['menit']) ){ echo $post['menit']; } ?>">
                                    </div>
                                </div>-->
                            </td>
                       </tr>


                       <tr>
                            <th width='120px' scope='row'>berat_umpan_non_used (Kg)</th>   
                            <td><input type='text' class='form-control' name='berat_umpan_non_used' id="berat_umpan_non_used" value="<?php if( !empty($post['berat_umpan_non_used']) ){ echo $post['berat_umpan_non_used']; } ?>"  onkeyup="berat_umpan_non_used_1()" autocomplete=off ></td>
                       </tr>


                       <!--<tr>
                            <th width='120px' scope='row'>kode_aktivitas</th>   
                            <td>
                              <select class="form-control" name="kode_aktivitas" id="kode_aktivitas">
                                   <option value="">Select Kode</option>
                                   <?php foreach($kode as $row){ ?>
                                    <option value="<?php echo $row ; ?>" <?php if( !empty($post['kode_aktivitas']) ){ if( $row ==  $post['kode_aktivitas']) { echo 'selected';  } } ?>><?php echo $row ; ?></option>
                                   <?php  } ?>
                              </select>
                              

                            </td>
                       </tr>-->

                       <tr>
                            <th width='120px' scope='row'>Mati (Dibuang)</th>   
                             <td><input type='number' class='form-control' name='kode_aktivitas1' value="<?php if( !empty($post['kode_aktivitas1']) ){ echo $post['kode_aktivitas1']; } ?>" autocomplete=off></td>
                       
                       </tr>

                       <tr>
                            <th width='120px' scope='row'>Mati (Dimakan)</th>   
                             <td><input type='number' class='form-control' name='kode_aktivitas2' value="<?php if( !empty($post['kode_aktivitas2']) ){ echo $post['kode_aktivitas2']; } ?>" autocomplete=off></td>
                       
                       </tr>

                       <tr>
                            <th width='120px' scope='row'>Diambil Hidup Untuk Mancing</th>   
                             <td><input type='number' class='form-control' name='kode_aktivitas3' value="<?php if( !empty($post['kode_aktivitas3']) ){ echo $post['kode_aktivitas3']; } ?>" autocomplete=off></td>
                       
                       </tr>

                       <tr>
                            <th width='120px' scope='row'>Sisa Umpan Tidak Dipakai dari Trip</th>   
                             <td><input type='number' class='form-control' name='kode_aktivitas4' value="<?php if( !empty($post['kode_aktivitas4']) ){ echo $post['kode_aktivitas4']; } ?>" autocomplete=off></td>
                       
                       </tr>


                       <tr>
                            <th width='120px' scope='row'>keterangan</th>   
                            <td><input type='text' class='form-control' name='keterangan' value="<?php if( !empty($post['keterangan']) ){ echo $post['keterangan']; } ?>" autocomplete=off></td>
                       </tr>

                    
                    
                    </tbody>
                  </table>
                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
               <a href="<?php echo base_url(); ?>trip/form5/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>




                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<script>

 $( function() {
    $( "#tanggal" ).datepicker(
    {   
        dateFormat: 'yy-mm-dd', 
        changeMonth: true,
        changeYear: true,
        minDate: new Date("<?php echo $trip_info['tanggal_keberangkatan']; ?>"),
        maxDate: new Date("<?php echo $trip_info['tanggal_kedatangan']; ?>"),
        numberOfMonths: 2,
        onSelect: function(selected) {
          $("#tanggal").datepicker("option","minDate", selected)
        }

    });


       $("#berat_umpan_non_used").keyup(function () {
          
          var num = $("#berat_umpan_non_used").val();
          
            var comma = /,/g;
          
            num = num.replace(comma,'');
          
            $(hidden).val(num);
          
                var numCommas = addCommas(num);
              
                $("#berat_umpan_non_used").val(numCommas);
        });







  } );


 function addCommas(str){

       // return str.replace(/^0+/, '').replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");

       //allow decimal
        var check = str; 
      
        if(check.charAt(0) == '.') {

            var zero = "0"; 

            check = zero.concat(check);

            return check; 

        }else if(check.includes('.')){

          if((check.split(".").length > 2) ){
            
            return check = str.substring(0, str.length-1);

          }
            return check = str.replace(/[^0-9\.]+/g, '');

        }
        else{
          
           check =   str.replace(/^0+/, '').replace(/(?!-)[^0-9.]/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            return check; 
        
        }

    }

function jum_keranjang_tangkapan_1(){


      var val = document.getElementById('jum_keranjang_tangkapan').value;

      document.getElementById('jum_keranjang_tangkapan').value = addCommas(val);  
  

    }



    function berat_umpan_non_used_1(){


      var val = document.getElementById('berat_umpan_non_used').value;

      document.getElementById('berat_umpan_non_used').value = addCommas(val);  
  

  }


</script>
