
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Update Trip Detail Palka</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."trip/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
                                    <li class="active">Update  Trip Detail Palka</li>
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
             						echo form_open_multipart('trip/palka_tuna/'.$kode_trip,$attributes); 
                            	?>

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                    <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                
                    <tr>
                            <th width='120px' scope='row'>palka_no_1 (TON)</th>    
                            <td><input type='number' class='form-control' name='palka_no_1' id="palka_no_1" value="<?php echo $numbering['1']; ?>" step=".01"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>palka_no_2 (TON)</th>    
                            <td><input type='number' class='form-control' name='palka_no_2' id="palka_no_2" value="<?php echo $numbering['2']; ?>" step=".01"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>palka_no_3 (TON)</th>    
                            <td><input type='number' class='form-control' name='palka_no_3' id="palka_no_3" value="<?php echo $numbering['3']; ?>" step=".01"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>palka_no_4 (TON)</th>    
                            <td><input type='number' class='form-control' name='palka_no_4' id="palka_no_4" value="<?php echo $numbering['4']; ?>" step=".01"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>palka_no_5 (TON)</th>    
                            <td><input type='number' class='form-control' name='palka_no_5' id="palka_no_5" value="<?php echo $numbering['5']; ?>" step=".01"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>palka_no_6</th>    
                            <td><input type='number' class='form-control' name='palka_no_6' id="palka_no_6" value="<?php echo $numbering['6']; ?>" step=".01"></td>
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
