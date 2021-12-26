
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

                <?php $i=0; ?>
                <?php  
                foreach($detail->result() as $row){  ?>
                <?php 

                $i++; 
                $jenis="jenis_alat".$i;
                $jumlah="jumlah_alat".$i;
                $satuan="satuan_alat".$i;

                ?>

                <?php if($i<8){ ?>

                    <tr> 
                            <th width='120px' scope='row'><?php echo $row->jenis_alat; ?></th>    
                            <td><input type='hidden' class='form-control' name='<?php echo $jenis; ?>' id="<?php echo $jenis; ?>" value="<?php echo $row->jenis_alat; ?>" step=".01"></td>
                            <td><input type='number' class='form-control' name='<?php echo $jumlah; ?>' id="<?php echo $jumlah; ?>" value="<?php echo $row->jumlah_alat; ?>" step=".01"></td>
                              <td><input type='text' class='form-control' name='<?php echo $satuan; ?>' id="<?php echo $satuan; ?>" value="<?php echo $row->satuan_alat; ?>" step=".01"></td>
                    </tr>

                <?php }else{ ?>


                    <tr>
                            <th width='120px' scope='row'><?php echo $row->jenis_alat; ?></th>    
                            <td><input type='hidden' class='form-control' name='<?php echo $jenis; ?>' id="<?php echo $jenis; ?>" value="<?php echo $row->jenis_alat; ?>" step=".01"></td>
                            <td>-</td>
                              <td><input type='text' class='form-control' name='lainnya'  value="<?php echo $row->lainnya; ?>"></td>
                    </tr>

                <?php } ?>


                <?php } ?>

                     

                   
     
                    </tbody>
                  </table>
                </div>


                
            </div>            
               <button type='submit' name='submit' class='btn btn-info'>Update</button>
               <a href='<?php echo base_url()."trip_hl/trip_detail/".$kode_trip; ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->
