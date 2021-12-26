<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Update Data <?php echo $row['jenis_aktivitas'] ; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data <?php echo $row['jenis_aktivitas'] ; ?></a></li>
                                    <li class="active">Update Data <?php echo $row['jenis_aktivitas'] ; ?></li>
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
                                <strong class="card-title">Update Data <?php echo $row['jenis_aktivitas'] ; ?></strong>
                              
                            </div>


                            <div class="card-body">

                            	
                            	<?php 
                            	 $attributes = array('class'=>'form-horizontal','role'=>'form');
             						echo form_open_multipart('master/update_master_dictionary',$attributes); 
                            	?>

              <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>

    
                  <tbody>
                    <input type='hidden' name='jenis_aktivitas' value="<?php echo $row['jenis_aktivitas'] ; ?>">

                    <input type='hidden' name='kode_aktivitas' value="<?php echo $row['kode_aktivitas'] ; ?>">
                  
                    <tr>
                    		<th width='120px' scope='row'>Nama AKtivitas</th>   
                    		 <td><input type='text' class='form-control' name='nama_aktivitas' value="<?php echo $row['nama_aktivitas'] ; ?>"  required></td>
                    </tr>
                    
                    </tbody>
                  </table>
                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Update</button>
               <a href="<?php echo base_url(); ?>master/".$row['jenis_aktivitas']."/"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->