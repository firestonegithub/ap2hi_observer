

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
                                    <li><a href="<?php echo base_url()."trip/form2/".$kode_trip; ?>"><?php echo $page_name ; ?></a></li>
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

                                <b><?php echo form_error('kode_trip'); ?></b>
                                <b><?php echo form_error('tanggal'); ?></b>
                                
                                <?php 
                                 $attributes = array('class'=>'form-horizontal','role'=>'form');
                                    echo form_open_multipart('trip/form2_add/'.$kode_trip,$attributes); 
                                ?>

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

    
                  <tbody>

                    <tr>
                            <th width='120px' scope='row'>kode_trip</th>   
                            <td><input type='text' class='form-control' name='kode_trip' value="<?php echo $kode_trip; ?>" readonly></td>
                    </tr>

                   
                    <tr>
                            <th width='120px' scope='row'>tanggal</th>   
                            <td><input type='text' class='form-control' name='tanggal' id="tanggal" value="<?php if( !empty($post['tanggal']) ){ echo $post['tanggal']; } ?>"  readonly></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>waktu (contoh: 11:45 AM)</th>   
                             <td>

                                 <input type='time' class='form-control' name='waktu' value="<?php if( !empty($post['waktu']) ){ echo $post['waktu']; } ?>" placeholder="waktu">
                                
                                <!--<div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' placeholder="Jam" name='jam' required autocomplete=off required min='0' max='23' value="<?php if( !empty($post['jam']) ){ echo $post['jam']; } ?>">
                                    </div>
                                    <b>:</b> 
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' placeholder="Menit" name='menit' required autocomplete=off required min='0' max='59' value="<?php if( !empty($post['menit']) ){ echo $post['menit']; } ?>">
                                    </div>
                                </div>-->
                             </td>
                    </tr>
                  
                    <tr>
                            <th width='120px' scope='row'>lintang</th>   
                            <td>
                                <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_degree' placeholder="Lintang Degree" required autocomplete=off value="<?php if( !empty($post['lintang_degree']) ){ echo $post['lintang_degree']; } ?>">
                                    </div>
                                     <div class='col-md-4'>
                                        <input type='number' class='form-control' name='lintang_minutes'  placeholder="Lintang Minutes" required autocomplete=off min="0" max="60" step=".01" value="<?php if( !empty($post['lintang_minutes']) ){ echo $post['lintang_minutes']; } ?>">
                                    </div>
                                     <div class='col-md-4'>
                                        <select class='form-control' name='lintang_us' id="lintang_us">
                                            <option value="U" <?php if( !empty($post['lintang_us']) ){ if($post['lintang_us'] == 'U'){ echo 'selected';  } } ?> >Utara</option>
                                            <option value="S" <?php if( !empty($post['lintang_us']) ){ if($post['lintang_us'] == 'S'){ echo 'selected';  }} ?> >Selatan</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>bujur</th>   
                             <td>
                                <div class="row">
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_degree'  placeholder="Bujur Degree" required autocomplete=off value="<?php if( !empty($post['bujur_degree']) ){ echo $post['bujur_degree']; } ?>">
                                    </div>
                                    <div class='col-md-4'>
                                        <input type='number' class='form-control' name='bujur_minutes' placeholder="Bujur Minutes" required autocomplete=off min="0" max="60" step=".01" value="<?php if( !empty($post['bujur_minutes']) ){ echo $post['bujur_minutes']; } ?>">
                                    </div>
                                    <div class='col-md-4'>
                                       <select class='form-control' name='bujur_us' id="bujur_us">
                                            <option value="T" >Timur</option>
                                        </select>
                                    </div>
                                </div>
                             </td>
                    </tr>

                   <!-- <tr>
                            <th width='120px' scope='row'>us</th>   
                             <td><input type='text' class='form-control' name='u_s'  required></td>
                    </tr>-->

                    <tr>
                            <th width='120px' scope='row'>kode_aktivitas</th>   
                             <td>
                                <select class="form-control" name="kode_aktivitas" id="kode_aktivitas">
                                     <option value="">Select Kode Aktivitas</option>
                                       <?php foreach($kode->result() as $row){ ?>
                                        <option value="<?php echo $row->kode_aktivitas ; ?>" <?php if( !empty($post['kode_aktivitas']) ){ if($post['kode_aktivitas'] == $row->kode_aktivitas ){ echo 'selected';  } } ?>> <?php echo $row->kode_aktivitas; ?> - <?php echo $row->nama_aktivitas ; ?> </option>
                                       <?php  } ?>
                                </select>
                             </td>
                    </tr>


                    
                    </tbody>
                  </table>
                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
               <a href="<?php echo base_url(); ?>trip/form2/<?php echo $kode_trip ; ?>"><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
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




</script>
