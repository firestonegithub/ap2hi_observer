

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
                                    <li><a href="<?php echo base_url()."trip_hl/form4/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
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
                                    echo form_open_multipart('trip_hl/form4_add/'.$kode_trip,$attributes); 
                                ?>


           <div class="row">

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>



                       <tr>
                            <th width='120px' scope='row'>kode trip</th>   
                            <td><input type='text' class='form-control' name='kode_trip' value="<?php echo $kode_trip; ?>" readonly></td>
                       </tr>

                       
                      <tr>
                            <th width='120px' scope='row'>no_tangkapan (*)</th>   
                            <td><input type='number' class='form-control' name='no_tangkapan' value="<?php if( !empty($post['no_tangkapan']) ){ echo $post['no_tangkapan']; } ?>" autocomplete=off></td>
                       </tr>

                     
                      <tr>
                            <th width='120px' scope='row'>tanggal Mulai (*)</th>   
                            <td><input type='text' class='form-control' name='tanggal' id="tanggal" value="<?php if( !empty($post['tanggal']) ){ echo $post['tanggal']; } ?>" autocomplete=off ></td>
                       </tr>

                      <tr>
                            <th width='120px' scope='row'>waktu_mulai (*) (contoh: 11:45 AM)</th>   
                            <td>

                                <input type='time' class='form-control' name='waktu_mulai' value="<?php if( !empty($post['waktu_mulai']) ){ echo $post['waktu_mulai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">

                            </td>
                       </tr>

                   

                      <tr>
                            <th width='120px' scope='row'>waktu_selesai (*) (contoh: 11:45 AM)</th>   
                            <td>

                                <input type='time' class='form-control' name='waktu_selesai' value="<?php if( !empty($post['waktu_selesai']) ){ echo $post['waktu_selesai']; } ?>" autocomplete=off min="0" max ="23" placeholder="jam">
                          
                            </td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>latitude</th>   
                            <td><input type='text' class='form-control' name='latitude' value="<?php if( !empty($post['latitude']) ){ echo $post['latitude']; } ?>"></td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>longitude</th>   
                            <td><input type='text' class='form-control' name='longitude' value="<?php if( !empty($post['longitude']) ){ echo $post['longitude']; } ?>"></td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>alat_tangkap_umpan</th>   
                            <td><input type='text' class='form-control' name='alat_tangkap_umpan' value="<?php if( !empty($post['alat_tangkap_umpan']) ){ echo $post['alat_tangkap_umpan']; } ?>"></td>
                       </tr>

                        <tr>
                            <th width='120px' scope='row'>jum_alat_tangkap</th>   
                            <td><input type='text' class='form-control' name='jum_alat_tangkap' value="<?php if( !empty($post['jum_alat_tangkap']) ){ echo $post['jum_alat_tangkap']; } ?>"></td>
                       </tr>
                     

                   </tbody>
                  </table>
              </div>




              </div> 

             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
               <a href="<?php echo base_url(); ?>trip_hl/form4/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
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


  function textAddCommas(){


      var val = document.getElementById('jumlah_ember_diangkut').value;
      document.getElementById('jumlah_ember_diangkut').value = addCommas(val);  
  
      var val = document.getElementById('berat_ember_sample_umpan_kosong').value;
      document.getElementById('berat_ember_sample_umpan_kosong').value = addCommas(val);  
       
       var val = document.getElementById('berat_tupper_umpan_kosong').value;
      document.getElementById('berat_tupper_umpan_kosong').value = addCommas(val);  
       
       var val = document.getElementById('berat_sample_ember_umpan').value;
      document.getElementById('berat_sample_ember_umpan').value = addCommas(val);  
       
       var val = document.getElementById('berat_sample_tupper_umpan').value;
      document.getElementById('berat_sample_tupper_umpan').value = addCommas(val);

        var val = document.getElementById('harga_umpan').value;
      document.getElementById('harga_umpan').value = addCommas(val);  
  }


</script>
