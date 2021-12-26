
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Update Trip Detail Lain</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."trip/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
                                    <li class="active">Update  Trip Detail Lain</li>
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
             						echo form_open_multipart('trip/informasi_lain/'.$kode_trip,$attributes); 
                            	?>

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                    <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                
                    <tr>
                            <th width='120px' scope='row'>Solar (Liter)</th>    
                            <td><input type='text' class='form-control' name='solar' id="solar" value="<?php if( !empty($detail['solar']) ){ echo $detail['solar']; } ?>" onkeyup="commasKey()"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>Es (Kg)</th>    
                            <td><input type='text' class='form-control' name='es' id="es" value="<?php if( !empty($detail['es']) ){ echo $detail['es']; } ?>" onkeyup="commasKey()"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>Biaya_trip (Rp)</th>    
                            <td><input type='text' class='form-control' name='biaya_trip' id="biaya_trip" value="<?php if( !empty($detail['biaya_trip']) ){ echo $detail['biaya_trip']; } ?>" onkeyup="commasKey()"></td>
                    </tr>


             
     
                    </tbody>
                  </table>
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

function commasKey(){


      var val = document.getElementById('solar').value;

      document.getElementById('solar').value = addCommas(val); 


      var val = document.getElementById('es').value;

      document.getElementById('es').value = addCommas(val); 


      var val = document.getElementById('biaya_trip').value;

      document.getElementById('biaya_trip').value = addCommas(val);  
  

  }


</script>