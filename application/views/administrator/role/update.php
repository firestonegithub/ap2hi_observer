


 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><?php echo $page_name ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."user/user_list"; ?>"><?php echo $page_category ?></a></li>
                                    <li class="active"><?php echo $page_name ?></li>
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
                                <strong class="card-title"><?php echo $page_name ?></strong>
                                
                            </div>


                            <div class="card-body">

                            	<?php echo validation_errors(); ?>
                            	<?php 
                            	 $attributes = array('class'=>'form-horizontal','role'=>'form');
             						echo form_open_multipart('user/role_update/'.$role_id.'',$attributes); 
                            	?>

              <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                   <input type='hidden' class='form-control' name='role_id' id="role_id" value="<?php if( !empty($post['role_id']) ){ echo $post['role_id']; } ?>" autocomplete=off> 
                    <tr>
                            <th width='120px' scope='row'>Role Name</th>    
                            <td><input type='text' class='form-control' name='role_name' id="role_name" value="<?php if( !empty($post['role_name']) ){ echo $post['role_name']; } ?>" autocomplete=off></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>Role Desc</th>    
                            <td><input type='text' class='form-control' name='role_desc' id="role_desc" value="<?php if( !empty($post['role_desc']) ){ echo $post['role_desc']; } ?>" autocomplete=off></td>
                    </tr>
             
                    </tbody>
                  </table>
                </div>


               <div id="showLanding">
                    <div>
                       <label for="exampleInputEmail1">Select access ... </label>
                     </div><br>
                    <div class="form-row"> 
                    
                     <?php 
                     //var_dump($this_permissions);
                     foreach($permissions->result() as $row ){ 



                           $checked = "";

                           foreach($this_permissions->result() as $loop ){ 

                            if($loop->perm_id == $row->perm_id ){

                                  $checked = "checked";


                                }
                            }

                             
                            ?>

                        <div class="form-group col-md-3">
                            <table>
                              <tr>
                                <td>
                              <input type='checkbox' name="perm_id[]" id="perm_id" value='<?php echo $row->perm_id; ?>' <?php echo $checked; ?> /> 
                                </td>
                                <td>
                                 <?php  echo $row->perm_desc ; ?> 
                                 </td>                       
                              </tr>
                            </table>
                        </div>
                        
                      <?php
                          } 
                      ?>

                    </div>
                </div>

              

             
               <button type='submit' name='submit' class='btn btn-info'>Add</button>
               <a href='<?php echo base_url()."user/user_list/"; ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->

