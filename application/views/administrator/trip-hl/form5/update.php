

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
                                    <li><a href="<?php echo base_url()."trip_hl/form5/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
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
                                    echo form_open_multipart('trip_hl/form5_update/'.$kode_trip."/".$seq,$attributes); 
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
                            <th width='120px' scope='row'>seq</th>   
                            <td><input type='text' class='form-control' name='seq' value="<?php echo $seq; ?>" readonly></td>
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




              </div> 
             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                <a href="<?php echo base_url(); ?>trip_hl/form5/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>
                  </form>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->



 <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                               
                                <strong class="card-title">TABLE <?php echo $table1; ?></strong>
                              
                            </div>


                            <div class="card-body">

                              <?php echo $button_add ; ?>

                      <table id="observerform_umpan_detail" border="1" class="table-style table table-striped table-bordered" cellspacing="0" width="100%">
        
                            <thead>
                                <tr>
                                      <th> nomor  </th>
                                      <th> kode_species  </th>
                                      <th> pakura1_jum  </th>
                                      <th> pakura1_ber </th>
                                      <th> pakura2_jum </th>
                                      <th> pakura2_ber </th>
                                      <th> pakura3_jum </th>
                                      <th> pakura3_ber </th>
                                      <th> pakura4_jum  </th>
                                      <th> pakura4_ber  </th>
                                      <th> pakura5_jum </th>
                                      <th> pakura5_ber  </th>
                                      <th> pakura6_jum  </th>
                                      <th> pakura6_ber  </th>
                                      <th> kapal_jum  </th>
                                      <th> kapal_ber  </th>
                                      <th> Edit </th>
                                      <th> Delete </th>
                                </tr>
                            </thead>

                             <tfoot>
                                <tr>
                                      <th> nomor  </th>
                                      <th> kode_species  </th>
                                      <th> pakura1_jum  </th>
                                      <th> pakura1_ber </th>
                                      <th> pakura2_jum </th>
                                      <th> pakura2_ber </th>
                                      <th> pakura3_jum </th>
                                      <th> pakura3_ber </th>
                                      <th> pakura4_jum  </th>
                                      <th> pakura4_ber  </th>
                                      <th> pakura5_jum </th>
                                      <th> pakura5_ber  </th>
                                      <th> pakura6_jum  </th>
                                      <th> pakura6_ber  </th>
                                      <th> kapal_jum  </th>
                                      <th> kapal_ber  </th>
                                      <th> Edit </th>
                                      <th> Delete </th>
                                </tr>
                             </tfoot>
                            
                            </table>
                              

              <div class='col-md-12'>


              </div>
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
                               
                                <strong class="card-title">TABLE <?php echo $table2; ?></strong>
                              
                            </div>


                            <div class="card-body">

                              <?php echo $button_add2 ; ?>

                      <table id="observerform_umpan_detail_pemikat" border="1" class="table-style table table-striped table-bordered" cellspacing="0" width="100%">
        
                            <thead>
                                <tr>
                                      <th> pakura1_pemikat </th>
                                      <th> pakura2_pemikat </th>
                                      <th> pakura3_pemikat </th>
                                      <th> pakura4_pemikat </th>
                                      <th> pakura5_pemikat </th>
                                      <th> pakura6_pemikat </th>
                                      <th> kapal_pemikat </th>
                                      <th> Edit </th>
                                      <th> Delete </th>
                                </tr>
                            </thead>

                             <tfoot>
                                <tr>
                                      <th> pakura1_pemikat </th>
                                      <th> pakura2_pemikat </th>
                                      <th> pakura3_pemikat </th>
                                      <th> pakura4_pemikat </th>
                                      <th> pakura5_pemikat </th>
                                      <th> pakura6_pemikat </th>
                                      <th> kapal_pemikat </th>
                                      <th> Edit </th>
                                      <th> Delete </th>
                                </tr>
                             </tfoot>
                            
                            </table>
                              

              <div class='col-md-12'>


              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



<!-- Modal -->

 <div class="modal fade" tabindex="-1" role="dialog" id="myModalTable1">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Tambah observerform_umpan_detail </h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_add_table1; ?>" method="post" id="AddDataTable1Form">
       <div class="modal-body">

        <div class="messages"></div>


          <div class="form-group">
          <label for="exampleInputEmail1">id_trip</label>
          <input type="text" class="form-control" id="id_trip" name="id_trip" value="<?php echo $kode_trip ; ?>" readonly required>
        </div>

          <div class="form-group">
          <label for="exampleInputEmail1">seq</label>
          <input type="text" class="form-control" id="seq" name="seq" value="<?php echo $seq ; ?>" readonly required>
        </div>


          <tr>
                            <th width='120px' scope='row'>kode_species</th>   
                             <td>
                              <select class="form-control" name="kode_species" id="kode_species">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_umpan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select></td>
                       
                       </tr>


                        <tr>
                            <th width='120px' scope='row'>pakura1_jum</th>   
                             <td><input type='number' class='form-control' name='pakura1_jum' value="<?php if( !empty($post['pakura1_jum']) ){ echo $post['pakura1_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura1_ber</th>   
                             <td><input type='number' class='form-control' name='pakura1_ber' value="<?php if( !empty($post['pakura1_ber']) ){ echo $post['pakura1_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                         <tr>
                            <th width='120px' scope='row'>pakura2_jum</th>   
                             <td><input type='number' class='form-control' name='pakura2_jum' value="<?php if( !empty($post['pakura2_jum']) ){ echo $post['pakura2_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura2_ber</th>   
                             <td><input type='number' class='form-control' name='pakura2_ber' value="<?php if( !empty($post['pakura2_ber']) ){ echo $post['pakura2_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

                         <tr>
                            <th width='120px' scope='row'>pakura3_jum</th>   
                             <td><input type='number' class='form-control' name='pakura3_jum' value="<?php if( !empty($post['pakura3_jum']) ){ echo $post['pakura3_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura3_ber</th>   
                             <td><input type='number' class='form-control' name='pakura3_ber' value="<?php if( !empty($post['pakura3_ber']) ){ echo $post['pakura3_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

                         <tr>
                            <th width='120px' scope='row'>pakura4_jum</th>   
                             <td><input type='number' class='form-control' name='pakura4_jum' value="<?php if( !empty($post['pakura4_jum']) ){ echo $post['pakura4_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura4_ber</th>   
                             <td><input type='number' class='form-control' name='pakura4_ber' value="<?php if( !empty($post['pakura4_ber']) ){ echo $post['pakura4_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

                         <tr>
                            <th width='120px' scope='row'>pakura5_jum</th>   
                             <td><input type='number' class='form-control' name='pakura5_jum' value="<?php if( !empty($post['pakura5_jum']) ){ echo $post['pakura5_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura5_ber</th>   
                             <td><input type='number' class='form-control' name='pakura5_ber' value="<?php if( !empty($post['pakura5_ber']) ){ echo $post['pakura5_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

                         <tr>
                            <th width='120px' scope='row'>pakura6_jum</th>   
                             <td><input type='number' class='form-control' name='pakura6_jum' value="<?php if( !empty($post['pakura6_jum']) ){ echo $post['pakura6_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura6_ber</th>   
                             <td><input type='number' class='form-control' name='pakura6_ber' value="<?php if( !empty($post['pakura6_ber']) ){ echo $post['pakura6_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

                       
                        <tr>
                            <th width='120px' scope='row'>kapal_jum</th>   
                             <td><input type='number' class='form-control' name='kapal_jum' value="<?php if( !empty($post['kapal_jum']) ){ echo $post['kapal_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                       
                        <tr>
                            <th width='120px' scope='row'>kapal_ber</th>   
                             <td><input type='number' class='form-control' name='kapal_ber' value="<?php if( !empty($post['kapal_ber']) ){ echo $post['kapal_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

 

       </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Submit data</button>
        </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" tabindex="-1" role="dialog" id="myModalTable2">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Tambah <?php echo $table2; ?> </h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_add_table2; ?>" method="post" id="AddDataTable2Form">
       <div class="modal-body">

        <div class="messages"></div>


          <div class="form-group">
          <label for="exampleInputEmail1">id_trip</label>
          <input type="text" class="form-control" id="id_trip" name="id_trip" value="<?php echo $kode_trip ; ?>" readonly required>
        </div>

          <div class="form-group">
          <label for="exampleInputEmail1">seq</label>
          <input type="text" class="form-control" id="seq" name="seq" value="<?php echo $seq ; ?>" readonly required>
        </div>

          <tr>
            <th width='120px' scope='row'>pakura1_pemikat</th>   
            <td><input type='number' class='form-control' name='pakura1_pemikat' value="<?php if( !empty($post['pakura1_pemikat']) ){ echo $post['pakura1_pemikat']; } ?>" autocomplete=off></td>     
          </tr>

        
        <tr>
            <th width='120px' scope='row'>pakura2_pemikat</th>   
            <td><input type='number' class='form-control' name='pakura2_pemikat' value="<?php if( !empty($post['pakura2_pemikat']) ){ echo $post['pakura2_pemikat']; } ?>" autocomplete=off></td>     
          </tr>

        
        <tr>
            <th width='120px' scope='row'>pakura3_pemikat</th>   
            <td><input type='number' class='form-control' name='pakura3_pemikat' value="<?php if( !empty($post['pakura3_pemikat']) ){ echo $post['pakura3_pemikat']; } ?>" autocomplete=off></td>     
          </tr>

        
        <tr>
            <th width='120px' scope='row'>pakura4_pemikat</th>   
            <td><input type='number' class='form-control' name='pakura4_pemikat' value="<?php if( !empty($post['pakura4_pemikat']) ){ echo $post['pakura4_pemikat']; } ?>" autocomplete=off></td>     
          </tr>

        
        <tr>
            <th width='120px' scope='row'>pakura5_pemikat</th>   
            <td><input type='number' class='form-control' name='pakura5_pemikat' value="<?php if( !empty($post['pakura5_pemikat']) ){ echo $post['pakura5_pemikat']; } ?>" autocomplete=off></td>     
          </tr>

        
        <tr>
            <th width='120px' scope='row'>pakura6_pemikat</th>   
            <td><input type='number' class='form-control' name='pakura6_pemikat' value="<?php if( !empty($post['pakura6_pemikat']) ){ echo $post['pakura6_pemikat']; } ?>" autocomplete=off></td>     
          </tr>

        
        <tr>
            <th width='120px' scope='row'>kapal_pemikat</th>   
            <td><input type='number' class='form-control' name='kapal_pemikat' value="<?php if( !empty($post['kapal_pemikat']) ){ echo $post['kapal_pemikat']; } ?>" autocomplete=off></td>     
          </tr>
                

 

       </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Submit data</button>
        </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




 <div class="modal fade" tabindex="-1" role="dialog" id="editTable1Modal">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Update observerform_umpan_detail</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_update_table1; ?>" method="post" id="EditDataTable1Form">
       <div class="modal-body">

        <div class="edit-messages"></div>

              <div class="form-group">
          <label for="exampleInputEmail1">id_trip</label>
          <input type="text" class="form-control" id="edit_id_trip" name="edit_id_trip" value="<?php echo $kode_trip ; ?>" readonly required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">seq</label>
          <input type="text" class="form-control" id="edit_seq" name="edit_seq" value="<?php echo $seq ; ?>" readonly required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">nomor</label>
          <input type="text" class="form-control" id="edit_nomor" name="edit_nomor" readonly required>
        </div>

            <tr>
                            <th width='120px' scope='row'>kode_species</th>   
                             <td>
                              <select class="form-control" name="edit_kode_species" id="edit_kode_species">
                                     <option value="">Select Kode Species</option>
                                       <?php foreach($kode_umpan->result() as $row){ ?>
                                        <option value="<?php echo $row->fao ; ?>" ><?php echo $row->fao ; ?> - <?php echo $row->english ; ?></option>
                                       <?php  } ?>
                                </select></td>
                       
                       </tr>


                        <tr>
                            <th width='120px' scope='row'>pakura1_jum</th>   
                             <td><input type='number' class='form-control' name='edit_pakura1_jum' id='edit_pakura1_jum' value="<?php if( !empty($post['edit_pakura1_jum']) ){ echo $post['edit_pakura1_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura1_ber</th>   
                             <td><input type='number' class='form-control' name='edit_pakura1_ber' id='edit_pakura1_ber' value="<?php if( !empty($post['edit_pakura1_ber']) ){ echo $post['edit_pakura1_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                         <tr>
                            <th width='120px' scope='row'>pakura2_jum</th>   
                             <td><input type='number' class='form-control' name='edit_pakura2_jum' id='edit_pakura2_jum' value="<?php if( !empty($post['edit_pakura2_jum']) ){ echo $post['edit_pakura2_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura2_ber</th>   
                             <td><input type='number' class='form-control' name='edit_pakura2_ber' id='edit_pakura2_ber' value="<?php if( !empty($post['edit_pakura2_ber']) ){ echo $post['edit_pakura2_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

                         <tr>
                            <th width='120px' scope='row'>pakura3_jum</th>   
                             <td><input type='number' class='form-control' name='edit_pakura3_jum' id='edit_pakura3_jum' value="<?php if( !empty($post['edit_pakura3_jum']) ){ echo $post['edit_pakura3_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura3_ber</th>   
                             <td><input type='number' class='form-control' name='edit_pakura3_ber' id='edit_pakura3_ber' value="<?php if( !empty($post['edit_pakura3_ber']) ){ echo $post['edit_pakura3_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

                         <tr>
                            <th width='120px' scope='row'>pakura4_jum</th>   
                             <td><input type='number' class='form-control' name='edit_pakura4_jum' id='edit_pakura4_jum' value="<?php if( !empty($post['edit_pakura4_jum']) ){ echo $post['edit_pakura4_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura4_ber</th>   
                             <td><input type='number' class='form-control' name='edit_pakura4_ber' id='edit_pakura4_ber' value="<?php if( !empty($post['edit_pakura4_ber']) ){ echo $post['edit_pakura4_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

                         <tr>
                            <th width='120px' scope='row'>pakura5_jum</th>   
                             <td><input type='number' class='form-control' name='edit_pakura5_jum' id='edit_pakura5_jum' value="<?php if( !empty($post['edit_pakura5_jum']) ){ echo $post['edit_pakura5_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura5_ber</th>   
                             <td><input type='number' class='form-control' name='edit_pakura5_ber' id='edit_pakura5_ber' value="<?php if( !empty($post['edit_pakura5_ber']) ){ echo $post['edit_pakura5_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

                         <tr>
                            <th width='120px' scope='row'>pakura6_jum</th>   
                             <td><input type='number' class='form-control' name='edit_pakura6_jum' id='edit_pakura6_jum' value="<?php if( !empty($post['edit_pakura6_jum']) ){ echo $post['edit_pakura6_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                        
                        <tr>
                            <th width='120px' scope='row'>pakura6_ber</th>   
                             <td><input type='number' class='form-control' name='edit_pakura6_ber' id='edit_pakura6_ber' value="<?php if( !empty($post['edit_pakura6_ber']) ){ echo $post['edit_pakura6_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>

                       
                        <tr>
                            <th width='120px' scope='row'>kapal_jum</th>   
                             <td><input type='number' class='form-control' name='edit_kapal_jum' id='edit_kapal_jum' value="<?php if( !empty($post['edit_kapal_jum']) ){ echo $post['edit_kapal_jum']; } ?>" autocomplete=off></td>
                       
                       </tr>
                       
                        <tr>
                            <th width='120px' scope='row'>kapal_ber</th>   
                             <td><input type='number' class='form-control' name='edit_kapal_ber' id='edit_kapal_ber' value="<?php if( !empty($post['edit_kapal_ber']) ){ echo $post['edit_kapal_ber']; } ?>" autocomplete=off></td>
                       
                       </tr>


 
       </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Submit data</button>
        </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




 <div class="modal fade" tabindex="-1" role="dialog" id="editTable2Modal">
  <div class="modal-dialog  modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <center><h5 class="modal-title">Update observerform_umpan_pakura</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-horizontal" action="<?php echo $url_update_table2; ?>" method="post" id="EditDataTable2Form">
       <div class="modal-body">

        <div class="edit-messages"></div>

              <div class="form-group">
          <label for="exampleInputEmail1">id_trip</label>
          <input type="text" class="form-control" id="edit_id_trip2" name="edit_id_trip2" value="<?php echo $kode_trip ; ?>" readonly required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">seq</label>
          <input type="text" class="form-control" id="edit_seq2" name="edit_seq2" value="<?php echo $seq ; ?>" readonly required>
        </div>

        <tr>
            <th width='120px' scope='row'>pakura1_pemikat</th>   
            <td><input type='number' class='form-control' name='edit_pakura1_pemikat' id='edit_pakura1_pemikat' value="<?php if( !empty($post['edit_pakura1_pemikat']) ){ echo $post['edit_pakura1_pemikat']; } ?>" autocomplete=off></td>
                       
        </tr>

        <tr>
            <th width='120px' scope='row'>pakura2_pemikat</th>   
            <td><input type='number' class='form-control' name='edit_pakura2_pemikat' id='edit_pakura2_pemikat' value="<?php if( !empty($post['edit_pakura1_pemikat']) ){ echo $post['edit_pakura1_pemikat']; } ?>" autocomplete=off></td>
                       
        </tr>

        <tr>
            <th width='120px' scope='row'>pakura3_pemikat</th>   
            <td><input type='number' class='form-control' name='edit_pakura3_pemikat' id='edit_pakura3_pemikat' value="<?php if( !empty($post['edit_pakura3_pemikat']) ){ echo $post['edit_pakura3pemikat']; } ?>" autocomplete=off></td>
                       
        </tr>

        <tr>
            <th width='120px' scope='row'>pakura4_pemikat</th>   
            <td><input type='number' class='form-control' name='edit_pakura4_pemikat' id='edit_pakura4_pemikat' value="<?php if( !empty($post['edit_pakura4_pemikat']) ){ echo $post['edit_pakura4_pemikat']; } ?>" autocomplete=off></td>
                       
        </tr>

        <tr>
            <th width='120px' scope='row'>pakura5_pemikat</th>   
            <td><input type='number' class='form-control' name='edit_pakura5_pemikat' id='edit_pakura5_pemikat' value="<?php if( !empty($post['edit_pakura5_pemikat']) ){ echo $post['edit_pakura5_pemikat']; } ?>" autocomplete=off></td>
                       
        </tr>

        <tr>
            <th width='120px' scope='row'>pakura6_pemikat</th>   
            <td><input type='number' class='form-control' name='edit_pakura6_pemikat' id='edit_pakura6_pemikat' value="<?php if( !empty($post['edit_pakura6_pemikat']) ){ echo $post['edit_pakura6_pemikat']; } ?>" autocomplete=off></td>
                       
        </tr>

         <tr>
            <th width='120px' scope='row'>kapal_pemikat</th>   
            <td><input type='number' class='form-control' name='edit_kapal_pemikat' id='edit_kapal_pemikat' value="<?php if( !empty($post['edit_kapal_pemikat']) ){ echo $post['edit_kapal_pemikat']; } ?>" autocomplete=off></td>
                       
        </tr>
                        
 
       </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Submit data</button>
        </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<!-- remove modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="disableTable1Modal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
              <center><h5 class="modal-title">Disable</h5></center>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="disable-messages"></div>
          <p>Do you really want to disable ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="hapusBtn">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /remove modal -->



<!-- remove modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="disableTable2Modal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
              <center><h5 class="modal-title">Disable</h5></center>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="disable-messages"></div>
          <p>Do you really want to disable ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="hapusBtn2">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /remove modal -->






<script>



$(document).ready(function() {
  
   observerform_umpan_detail = $("#observerform_umpan_detail").DataTable({
    "ajax": "<?php echo $url_load_table1 ?>",
        "order": [],   
    "scrollX": true
    });


    observerform_umpan_detail_pemikat = $("#observerform_umpan_detail_pemikat").DataTable({
    "ajax": "<?php echo $url_load_table2 ?>",
        "order": [],   
    "scrollX": true
    });

     $('#AddDataTable1Btn').on('click',function(){
        
      $('#AddDataTable1Form')[0].reset();
      $('.form-group').removeClass('has-error').removeClass('has-success');
      $('.text-danger').remove();
      $('.messages').html("");
       
      $('#AddDataTable1Form').unbind('submit').bind('submit',function(e){

        $('.text-danger').remove();
        $('.messages').html("");
          var form = $(this);

                      var me = $(this);
                        e.preventDefault();
                      if ( me.data('requestRunning') ) {
                        return;
                      }
                      me.data('requestRunning', true);
                      
          $.ajax({
                    url : form.attr('action'),
                    type : form.attr('method'),
                    data : form.serialize(),
                    dataType :'json',
                    success:function(response){
                        // remove pesan error
                        $('.form-group').removeClass('has-error').removeClass('has-success');

                        if (response.success == true) {
                            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');

                            //reset form 
                            $('#AddDataTable1Form')[0].reset();
                            //reload the datatables
                            observerform_umpan_detail.ajax.reload(null,false);
                        }else{
                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                        }
                    }
                    , error: function( xhr, status, error){
                            console.log(xhr.statusText);
                            console.log(error);
                            console.log(status);


                            alert('500 Internal server error !');
                      } ,
                      complete: function() {
                        me.data('requestRunning', false);
                      } 
                });





          return false;  
      });
      
    });



      $('#AddDataTable2Btn').on('click',function(){
        
      $('#AddDataTable2Form')[0].reset();
      $('.form-group').removeClass('has-error').removeClass('has-success');
      $('.text-danger').remove();
      $('.messages').html("");
       
      $('#AddDataTable2Form').unbind('submit').bind('submit',function(e){

        $('.text-danger').remove();
        $('.messages').html("");
          var form = $(this);

                      var me = $(this);
                        e.preventDefault();
                      if ( me.data('requestRunning') ) {
                        return;
                      }
                      me.data('requestRunning', true);
                      
          $.ajax({
                    url : form.attr('action'),
                    type : form.attr('method'),
                    data : form.serialize(),
                    dataType :'json',
                    success:function(response){
                        // remove pesan error
                        $('.form-group').removeClass('has-error').removeClass('has-success');

                        if (response.success == true) {
                            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');

                            //reset form 
                            $('#AddDataTable2Form')[0].reset();
                            //reload the datatables
                            observerform_umpan_detail_pemikat.ajax.reload(null,false);
                        }else{
                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                        }
                    }
                    , error: function( xhr, status, error){
                            console.log(xhr.statusText);
                            console.log(error);
                            console.log(status);


                            alert('500 Internal server error !');
                      } ,
                      complete: function() {
                        me.data('requestRunning', false);
                      } 
                });





          return false;  
      });
      
    });


}) ; 


function editData(id_trip = null, seq=null , nomor=null ){


  if(id_trip){
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $(".text-danger").remove();
        // empty the message div
        $(".edit-messages").html("");

         $('#EditDataTable1Form')[0].reset();

         $.ajax({
            url: '<?php echo $url_show_table1; ?>',
            type: 'post',
            data: {id_trip : id_trip , seq : seq , nomor : nomor  },
            dataType: 'json',
            success:function(response) {

              $('#edit_nomor').val(response.messages[0].nomor);
              $('#edit_kode_species').val(response.messages[0].kode_species);
              $('#edit_pakura1_jum').val(response.messages[0].pakura1_jum); 
              $('#edit_pakura1_ber').val(response.messages[0].pakura1_ber); 
              $('#edit_pakura2_jum').val(response.messages[0].pakura2_jum); 
              $('#edit_pakura2_ber').val(response.messages[0].pakura2_ber); 
              $('#edit_pakura3_jum').val(response.messages[0].pakura3_jum); 
              $('#edit_pakura3_ber').val(response.messages[0].pakura3_ber); 
              $('#edit_pakura4_jum').val(response.messages[0].pakura4_jum); 
              $('#edit_pakura4_ber').val(response.messages[0].pakura4_ber); 
              $('#edit_pakura5_jum').val(response.messages[0].pakura5_jum); 
              $('#edit_pakura5_ber').val(response.messages[0].pakura5_ber); 
              $('#edit_pakura6_jum').val(response.messages[0].pakura6_jum); 
              $('#edit_pakura6_ber').val(response.messages[0].pakura6_ber); 
              $('#edit_kapal_jum').val(response.messages[0].kapal_jum); 
              $('#edit_kapal_ber').val(response.messages[0].kapal_ber);
            
          
              $("#EditDataTable1Form").unbind('submit').bind('submit', function(e) {

                 $(".text-danger").remove();

                    var form = $(this);
                    var me = $(this);
                        e.preventDefault();
                      if ( me.data('requestRunning') ) {
                        return;
                      }
                      me.data('requestRunning', true);

                   $.ajax({
                                url: form.attr('action'),
                                type: form.attr('method'),
                                data: form.serialize(),
                                dataType: 'json',
                                success:function(response) {
                    if (response.success == true) {
                        $(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                          '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                        '</div>');
                        
                    
                        observerform_umpan_detail.ajax.reload(null,false);
                        
                      }else{
                        $(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                          '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                        '</div>');
                        alert('Gagal');
                      }
                          } ,
                       error: function(xhr, status, error) {
                        console.log(status);
                        console.log(error);
                    },
                      complete: function() {
                        me.data('requestRunning', false);
                      } 
                  }); // /ajax



                 return false;
                   
                });


            }  // /success
            , error: function( xhr, status, error){
                console.log(xhr.statusText);
                console.log(error);
                console.log(status);


               alert('500 Internal server error !');
            } 
        }); // /fetch selected member info

   } else {
        alert('Error: Refresh the page again');
    }

    
    }





function editData2(id_trip = null, seq=null ){


  if(id_trip){
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $(".text-danger").remove();
        // empty the message div
        $(".edit-messages").html("");

         $('#EditDataTable2Form')[0].reset();

         $.ajax({
            url: '<?php echo $url_show_table2; ?>',
            type: 'post',
            data: {id_trip : id_trip , seq : seq  },
            dataType: 'json',
            success:function(response) {

              $('#edit_pakura1_pemikat').val(response.messages[0].pakura1_pemikat); 
              $('#edit_pakura2_pemikat').val(response.messages[0].pakura2_pemikat); 
              $('#edit_pakura3_pemikat').val(response.messages[0].pakura3_pemikat); 
              $('#edit_pakura4_pemikat').val(response.messages[0].pakura4_pemikat); 
              $('#edit_pakura5_pemikat').val(response.messages[0].pakura5_pemikat); 
              $('#edit_pakura6_pemikat').val(response.messages[0].pakura6_pemikat); 
              $('#edit_kapal_pemikat').val(response.messages[0].kapal_pemikat); 
            
          
              $("#EditDataTable2Form").unbind('submit').bind('submit', function(e) {

                 $(".text-danger").remove();

                    var form = $(this);
                    var me = $(this);
                        e.preventDefault();
                      if ( me.data('requestRunning') ) {
                        return;
                      }
                      me.data('requestRunning', true);

                   $.ajax({
                                url: form.attr('action'),
                                type: form.attr('method'),
                                data: form.serialize(),
                                dataType: 'json',
                                success:function(response) {
                    if (response.success == true) {
                        $(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                          '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                        '</div>');
                        
                    
                        observerform_umpan_detail_pemikat.ajax.reload(null,false);
                        
                      }else{
                        $(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                          '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                        '</div>');
                        alert('Gagal');
                      }
                          } ,
                       error: function(xhr, status, error) {
                        console.log(status);
                        console.log(error);
                    },
                      complete: function() {
                        me.data('requestRunning', false);
                      } 
                  }); // /ajax



                 return false;
                   
                });


            }  // /success
            , error: function( xhr, status, error){
                console.log(xhr.statusText);
                console.log(error);
                console.log(status);


               alert('500 Internal server error !');
            } 
        }); // /fetch selected member info

   } else {
        alert('Error: Refresh the page again');
    }

    
}




    function disableData(id_trip = null, seq=null , nomor=null ){


     if(id_trip) {
      
      $("#hapusBtn").unbind('click').bind('click', function() {


          $.ajax({
                url: '<?php echo $url_delete_table1; ?>',
                type: 'post',
                data: { id_trip : id_trip , seq : seq , nomor : nomor },
                dataType: 'json',
                success:function(response) {
                  console.log(response);
                     if (response.success == true) {       
                        $(".disable-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');
                    
                    observerform_umpan_detail.ajax.reload(null,false);
                    alert('berhasil');
                    $('#disableTable1Modal').modal('hide');

                    } else {
                        $(".disable-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                    }
                }, error: function(xhr, status, error) {
          console.log(status);
          console.log(error);
      }
            });


      }); // click remove btn
    } 
    else {
        alert('Error: Refresh the page again');
    }


}




    function disableData2(id_trip = null, seq=null  ){


     if(id_trip) {
      
      $("#hapusBtn2").unbind('click').bind('click', function() {


          $.ajax({
                url: '<?php echo $url_delete_table2; ?>',
                type: 'post',
                data: { id_trip : id_trip , seq : seq  },
                dataType: 'json',
                success:function(response) {
                  console.log(response);
                     if (response.success == true) {       
                        $(".disable-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                            '</div>');
                    
                    observerform_umpan_detail_pemikat.ajax.reload(null,false);
                    alert('berhasil');
                    $('#disableTable1Modal').modal('hide');

                    } else {
                        $(".disable-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                              '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                            '</div>');
                    }
                }, error: function(xhr, status, error) {
          console.log(status);
          console.log(error);
      }
            });


      }); // click remove btn
    } 
    else {
        alert('Error: Refresh the page again');
    }


}





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

      var val = document.getElementById('harga_umpan').value;
      document.getElementById('harga_umpan').value = addCommas(val);  

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

       var val = document.getElementById('jumlah').value;
      document.getElementById('jumlah').value = addCommas(val);  

       var val = document.getElementById('berat').value;
      document.getElementById('berat').value = addCommas(val);  

       var val = document.getElementById('edit_jumlah').value;
      document.getElementById('edit_jumlah').value = addCommas(val);  

       var val = document.getElementById('edit_berat').value;
      document.getElementById('edit_berat').value = addCommas(val);  
  }


   function allowOneDot(e) {
        var dots = 0;
        var length = txt.value.length;
        var text = txt.value;
        for(var i=0; i<length; i++) {
            if(text[i]=='.') dots++;
            if(dots>1) {
                txt.value = prevValue;
                return false;
            }
        }
        prevValue = text;
        return true;
    }


</script>
