
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Update Form 9</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."trip_hl/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
                                    <li class="active">Update  Trip AlaForm 9</li>
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
             						echo form_open_multipart('trip_hl/form9_update/'.$kode_trip,$attributes); 
                            	?>

        <div class="row">
             
 			

                <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                     <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                
                
                    <tr>
                            <th width='120px' scope='row'>nama_pemantau</th>    
                            <td><input type='text' class='form-control' name='nama_pemantau' id="nama_pemantau" value="<?php if( !empty($detail['nama_pemantau'])){ echo $detail['nama_pemantau']; } ?>"></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>tgl_berangkat</th>    
                            <td><input type='text' class='form-control' name='tgl_berangkat' id="tgl_berangkat" value="<?php if( !empty($trip_info['tanggal_keberangkatan'])){ echo $trip_info['tanggal_keberangkatan']; } ?>" readonly></td>
                    </tr>


                    <tr>
                            <th width='120px' scope='row'>tgl_kedatangan</th>    
                            <td><input type='text' class='form-control' name='tgl_kedatangan' id="tgl_kedatangan" value="<?php if( !empty($trip_info['tanggal_kedatangan'])){ echo $trip_info['tanggal_kedatangan']; } ?>" readonly></td>
                    </tr>


                    <tr>
                            <th width='120px' scope='row'>kendala</th>    
                            <td><input type='text' class='form-control' name='kendala' id="kendala" value="<?php if( !empty($detail['kendala'])){ echo $detail['kendala']; } ?>"></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>perubahan</th>    
                            <td><input type='text' class='form-control' name='perubahan' id="perubahan" value="<?php if( !empty($detail['perubahan'])){ echo $detail['perubahan']; } ?>"></td>
                    </tr>


                    <tr>
                            <th width='120px' scope='row'>masukan</th>    
                            <td><input type='text' class='form-control' name='masukan' id="masukan" value="<?php if( !empty($detail['masukan'])){ echo $detail['masukan']; } ?>"></td>
                    </tr>

             
     
                    </tbody>
                  </table>
                </div>

 			</div> <!-- Row -->



             
               <button type='submit' name='submit' class='btn btn-info'>Update</button>
               <a href='<?php echo base_url()."trip/trip_detail/".$kode_trip; ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->
