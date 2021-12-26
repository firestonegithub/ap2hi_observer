
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Update Trip Detail Pancing</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."/administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."/trip_hl/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
                                    <li class="active">Update  Trip Detail Pancing</li>
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
                                <strong class="card-title">Trip Detail Pancing</strong>
                                
                            </div>


                            <div class="card-body">

                            	<?php echo validation_errors(); ?>
                            	<?php 
                            	 $attributes = array('class'=>'form-horizontal','role'=>'form');
             						echo form_open_multipart('trip_hl/form7_update/'.$kode_trip,$attributes); 
                            	?>
<div class="row">
              <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                    <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                
                    <tr>
                            <th width='120px' scope='row'><?php echo $add['jenis_alat1']; ?></th>    
                            <td><input type='hidden' class='form-control' name='jenis_alat1' id="jenis_alat1" value="<?php echo $add['jenis_alat1']; ?>" step=".01"></td>
                            <td><input type='number' class='form-control' name='jumlah_alat1'  value="" step=".01"></td>
                              <td><input type='text' class='form-control' name='satuan_alat1' value="" step=".01"></td>
                    </tr>


                    <tr>
                            <th width='120px' scope='row'><?php echo $add['jenis_alat2']; ?></th>    
                            <td><input type='hidden' class='form-control' name='jenis_alat2' value="<?php echo $add['jenis_alat2']; ?>" step=".01"></td>
                            <td><input type='number' class='form-control' name='jumlah_alat2'  value="" step=".01"></td>
                              <td><input type='text' class='form-control' name='satuan_alat2'
                                value="" step=".01"></td>
                    </tr>


                    <tr>
                            <th width='120px' scope='row'><?php echo $add['jenis_alat2']; ?></th>    
                            <td><input type='hidden' class='form-control' name='jenis_alat2' value="<?php echo $add['jenis_alat2']; ?>" step=".01"></td>
                            <td><input type='number' class='form-control' name='jumlah_alat2'  value="" step=".01"></td>
                              <td><input type='text' class='form-control' name='satuan_alat2'
                                value="" step=".01"></td>
                    </tr>


                    <tr>
                            <th width='120px' scope='row'><?php echo $add['jenis_alat3']; ?></th>    
                            <td><input type='hidden' class='form-control' name='jenis_alat3' value="<?php echo $add['jenis_alat3']; ?>" step=".01"></td>
                            <td><input type='number' class='form-control' name='jumlah_alat3'  value="" step=".01"></td>
                              <td><input type='text' class='form-control' name='satuan_alat3'
                                value="" step=".01"></td>
                    </tr>


                    <tr>
                            <th width='120px' scope='row'><?php echo $add['jenis_alat4']; ?></th>    
                            <td><input type='hidden' class='form-control' name='jenis_alat4' value="<?php echo $add['jenis_alat4']; ?>" step=".01"></td>
                            <td><input type='number' class='form-control' name='jumlah_alat4'  value="" step=".01"></td>
                              <td><input type='text' class='form-control' name='satuan_alat4'
                                value="" step=".01"></td>
                    </tr>


                    <tr>
                            <th width='120px' scope='row'><?php echo $add['jenis_alat5']; ?></th>    
                            <td><input type='hidden' class='form-control' name='jenis_alat5' value="<?php echo $add['jenis_alat5']; ?>" step=".01"></td>
                            <td><input type='number' class='form-control' name='jumlah_alat5'  value="" step=".01"></td>
                              <td><input type='text' class='form-control' name='satuan_alat5'
                                value="" step=".01"></td>
                    </tr>



                    <tr>
                                <th width='120px' scope='row'><?php echo $add['jenis_alat6']; ?></th>    
                            <td><input type='hidden' class='form-control' name='jenis_alat6' value="<?php echo $add['jenis_alat6']; ?>" step=".01"></td>
                            <td><input type='number' class='form-control' name='jumlah_alat6'  value="" step=".01"></td>
                              <td><input type='text' class='form-control' name='satuan_alat6'
                                value="" step=".01"></td>
                    </tr>


                    <tr>
                                <th width='120px' scope='row'><?php echo $add['jenis_alat7']; ?></th>    
                            <td><input type='hidden' class='form-control' name='jenis_alat7' value="<?php echo $add['jenis_alat7']; ?>" step=".01"></td>
                            <td><input type='number' class='form-control' name='jumlah_alat7'  value="" step=".01"></td>
                              <td><input type='text' class='form-control' name='satuan_alat7'
                                value="" step=".01"></td>
                    </tr>


                     <tr>
                            <th width='120px' scope='row'><?php echo $add['jenis_alat8']; ?></th>    
                            <td><input type='hidden' class='form-control' name='jenis_alat8' value="<?php echo $add['jenis_alat8']; ?>" step=".01"></td>
                              <td><input type='text' class='form-control' name='lainnya'
                                value="" step=".01"></td>
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
