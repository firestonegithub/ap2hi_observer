
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
                                    echo form_open_multipart('trip_hl/form5_add/'.$kode_trip,$attributes); 
                                ?>

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

    
                  <tbody>

                    <tr>
                            <th width='120px' scope='row'>kode trip</th>   
                            <td><input type='text' class='form-control' name='kode_trip' value="<?php echo $kode_trip; ?>" readonly></td>
                       </tr>

                       <tr>
                            <th width='120px' scope='row'>id_pemantau</th>   
                            <td><input type='text' class='form-control' name='id_pemantau' value="<?php if( !empty($trip_info['id_pemantau']) ){ echo $trip_info['id_pemantau']; } ?>" autocomplete=off readonly></td>
                       </tr>

                      
                       <tr>
                            <th width='120px' scope='row'>nama_pemantau</th>   
                            <td><input type='text' class='form-control' name='nama_pemantau' id="nama_pemantau" value="<?php if( !empty($post['nama_pemantau']) ){ echo $post['nama_pemantau']; } ?>" autocomplete=off ></td>
                       </tr>


                       <tr>
                            <th width='120px' scope='row'>set_nomor</th>   
                             <td><input type='number' class='form-control' name='set_nomor' value="<?php if( !empty($post['set_nomor']) ){ echo $post['set_nomor']; } ?>" autocomplete=off></td>
                       
                       </tr>
                    
                    </tbody>
                  </table>
                </div>






             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
               <a href="<?php echo base_url(); ?>trip_hl/form5/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>




                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->


