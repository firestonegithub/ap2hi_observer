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
                                    <li><a href="<?php echo base_url()."trip/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
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
                    <div class="col-lg-12" style="margin-top:100px">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title"><h1>Form 3  Summary berat dan jumlah semua species per set untuk trip ID <?php echo $kode_trip; ?></h1></strong>
                            </div>



                             <div class="card-body">

                            	

									<?php if(count($form3) > 0){  ?>


									<?php 
									    $form3 =  $form3['result'];
									    $form3_decode = json_decode($form3 , true);

									    //var_dump($form3_decode);

									    if(count($form3_decode) > 0 ){

									    	?>

									    	 <table id="example1" class="display" style="width:100%">
											        <thead>
											            <tr>
											                <th>id_set</th>
											                <th>Berat</th>
											                <th>Jumlah</th>
											            </tr>
											        </thead>
											        <tbody>
											            <?php 

											            $form3 = array(); 

											            $summary_form3 = array();

											             foreach($form3_decode as $key=>$value){

											            	foreach($value as $key1=>$value1){

											             		    $form3[$key1]['total_berat'] = 0 ; 

												                	$form3[$key1]['total_jumlah'] = 0 ;

												             } 

												         }

											             foreach($form3_decode as $key=>$value){

																$summary_form3[$key]['total_berat'] = 0 ; 

																$summary_form3[$key]['total_jumlah'] = 0 ; 

											                foreach($value as $key1=>$value1){

												         
											                		$form3[$key1]['total_berat'] = $form3[$key1]['total_berat'] +  $value1['rata2_berat'] ; 

											                		$form3[$key1]['total_jumlah'] = $form3[$key1]['total_jumlah'] +  $value1['rata2_jumlah'] ; 
											             
											                    }
											                }


											             

											              foreach($form3_decode as $key=>$value){

											              		foreach($value as $key1=>$value1){

											              			$summary_form3[$key]['total_berat'] = $summary_form3[$key]['total_berat'] + round($value1['rata2_berat']) ; 

											              			$summary_form3[$key]['total_jumlah'] = $summary_form3[$key]['total_jumlah'] + round($value1['rata2_jumlah']) ; 

											              		}
											              	

											              }

											              $total_berat = 0 ;

											              $total_jumlah = 0 ;

											              foreach($summary_form3 as $key=>$value){

											              		$total_berat = $total_berat + $value['total_berat'] ;

											              		$total_jumlah = $total_jumlah + $value['total_jumlah']; 

											              	?>

											              	  <tr>
													                <td><?php echo $key; ?></td>
													                <td><?php echo number_format($value['total_berat'] , 2) ; ?></td>
													                <td><?php echo number_format( round($value['total_jumlah']) ); ?></td>
													           </tr>

											              	<?php 


											              }


											            ?>
											        </tbody>
											        <tfoot>
											              <tr>
											                <th>id_set</th>
											                <th>Berat</th>
											                <th>Jumlah</th>
											            </tr>
											        </tfoot>
											    </table>

											    <h3>Total Berat : <b><?php echo number_format(round($total_berat)); ?></b> Kg  Total Jumlah : <b><?php echo number_format($total_jumlah); ?> Ekor</b></h3>

									    	<?php 



									    }

									?>


									<?php } ?>


                             </div> <!-- /.table-stats -->
                        </div>
                    </div>



                    <br><br><br><br><br>




                     <div class="col-lg-12" style="margin-top:100px">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title"><h1>Form 3  Berat dan jumlah per species semua set per trip ID <?php echo $kode_trip; ?></h1></strong>
                            </div>



                             <div class="card-body">

	                            <?php 
	                            
	                            
	                            if(count($form3) > 0 && $form3 != "[]" ){  ?>
		
									 <table id="example2" class="display" style="width:100%">
									        <thead>
									            <tr>
									                <th>id_trip</th>
									                <th>Species</th>
									                <th>Berat</th>
									                <th>Jumlah</th>
									            </tr>
									        </thead>
									        <tbody>
									            <?php 
									             
									            $total_berat = 0 ;

											    $total_jumlah = 0 ;


									             foreach($form3 as $key=>$value){

									             	$total_berat = $total_berat + $value['total_berat'] ;

											        $total_jumlah = $total_jumlah + round($value['total_jumlah']); 

									            ?>
									            <tr>
									                <td><?php echo $kode_trip; ?></td>
									                <td><?php echo $key; ?></td>
									                <td><?php echo number_format($value['total_berat'] , 2); ?></td>
									                <td><?php echo number_format(round($value['total_jumlah']) , 2); ?></td>
									            </tr>

									            <?php 
									                    }
									                
									            ?>
									        </tbody>
									        <tfoot>
									              <tr>
									                <th>id_trip</th>
									                <th>Species</th>
									                <th>Berat</th>
									                <th>Jumlah</th>
									            </tr>
									        </tfoot>
									    </table>


									    <h3>Total Berat : <b><?php echo number_format(round($total_berat)); ?></b> Kg  Total Jumlah : <b><?php echo number_format($total_jumlah); ?> Ekor</b></h3>


									   <?php }  ?>

                             </div> <!-- /.table-stats -->
                        </div>
                    </div>



                    <div class="col-lg-12" style="margin-top:100px">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title"><h1>Form 4  Summary berat dan jumlah semua species umpan per set untuk trip ID <?php echo $kode_trip;  ?></h1></strong>
                            </div>



                             <div class="card-body">

                             	<?php if(count($form4) > 0){  ?>



                            	 <table id="example3" class="display" style="width:100%">
							        <thead>
							            <tr>
							                <th>id_set</th>
							                <th>Berat</th>
							                <th>Jumlah</th>
							            </tr>
							        </thead>
							        <tbody>

							            <?php 


							 $i=0;

							

							 $hasil =  $form4['result'];

 							 $hasil2 = json_decode($hasil , true);

 							 $form4 = array(); 

 							 $summary_form4 = array(); 

 						
 							 foreach($hasil2 as $key=>$value){

							    foreach($value as $key=>$value2){
							         
							            if($key>0){
							              
							                foreach($hasil2[$i][$key] as $keys => $value3){

							                	 $form4[$keys]['total_berat'] = 0 ; 

												 $form4[$keys]['total_jumlah'] = 0 ;

							                } 

							                $i++;  

							            } 

							        } 

							    }



							$i=0;
							foreach($hasil2 as $key=>$value){

							    foreach($value as $key=>$value2){
							         
							            if($key>0){
							              
							                foreach($hasil2[$i][$key] as $keys => $value3){

							                	$summary_form4[$key]['total_berat'] = 0 ; 

							                	$summary_form4[$key]['total_jumlah'] = 0 ;


							                		$form4[$keys]['total_berat'] = $form4[$keys]['total_berat'] +  $value3['HASIL_AKHIR_by_weight'] ; 

											        $form4[$keys]['total_jumlah'] = $form4[$keys]['total_jumlah'] +  $value3['HASIL_AKHIR_by_jumlah'] ; 

							

							                }
							               
							                
							                $i++;
							                
							            }



							    }

							}


							$i=0;

							foreach($hasil2 as $key=>$value){

							    foreach($value as $key=>$value2){

							    	if($key>0){

							    		 foreach($hasil2[$i][$key] as $keys => $value3){

							    		 	$summary_form4[$key]['total_berat'] =$summary_form4[$key]['total_berat'] + round($value3['HASIL_AKHIR_by_weight']) ; 

							    		 	$summary_form4[$key]['total_jumlah'] = $summary_form4[$key]['total_jumlah'] + round($value3['HASIL_AKHIR_by_jumlah']) ; 

							    		 }

							    		 $i++;

							    		}


							    	}


							    }


				 										  $total_berat = 0 ;

											              $total_jumlah = 0 ;

											              foreach($summary_form4 as $key=>$value){

											              		$total_berat = $total_berat + $value['total_berat'] ;

											              		$total_jumlah = $total_jumlah + $value['total_jumlah']; 

											              	?>

											              	  <tr>
													                <td><?php echo $key; ?></td>
													                <td><?php echo number_format($value['total_berat'] , 2); ?></td>
													                <td><?php echo number_format(round($value['total_jumlah'])); ?></td>
													           </tr>

											              	<?php 


											              }


											            ?>
											            

							           
							        </tbody>
							        <tfoot>
							              <tr>
							                <th>id_set</th>
							                <th>Berat</th>
							                <th>Jumlah</th>
							            </tr>
							        </tfoot>
							    </table>

							     <h3>Total Berat : <b><?php echo number_format(round($total_berat)); ?></b> Kg  Total Jumlah : <b><?php echo number_format($total_jumlah); ?> Ekor</b></h3>


							    <?php } ?>

                             </div> <!-- /.table-stats -->
                        </div>
                    </div>




                       <div class="col-lg-12" style="margin-top:100px">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title"><h1>Form 4  Berat dan jumlah per species umpan semua set per trip ID <?php echo $kode_trip; ?> <h1></strong>
                            </div>



                             <div class="card-body">

                            <?php if(count($form4) > 0 ){ ?>
                             	<table id="example4" class="display" style="width:100%">
									        <thead>
									            <tr>
									                <th>id_trip</th>
									                <th>Species</th>
									                <th>Berat</th>
									                <th>Jumlah</th>
									            </tr>
									        </thead>
									        <tbody>
									            <?php

									             $total_berat = 0 ;

 												 $total_jumlah = 0 ; 

									             foreach($form4 as $key=>$value){

									             	//var_dump($value);

									             	$total_berat = $total_berat + $value['total_berat'] ;

													$total_jumlah = $total_jumlah + round($value['total_jumlah']); 

									            ?>
									            <tr>
									                <td><?php echo $kode_trip; ?></td>
									                <td><?php echo $key; ?></td>
									                <td><?php echo number_format($value['total_berat'] , 2); ?></td>
									                <td><?php echo number_format(round($value['total_jumlah'])); ?></td>
									            </tr>

									            <?php 
									                    }
									                
									            ?>
									        </tbody>
									        <tfoot>
									              <tr>
									                <th>id_trip</th>
									                <th>Species</th>
									                <th>Berat</th>
									                <th>Jumlah</th>
									            </tr>
									        </tfoot>
									    </table>

									     <h3>Total Berat : <b><?php echo number_format(round($total_berat)); ?></b> Kg  Total Jumlah : <b><?php echo number_format($total_jumlah); ?> Ekor</b></h3>


									     <?php } ?>

                             </div> <!-- /.table-stats -->
                        </div>
                    </div>


                     <div class="col-lg-12" style="margin-top:100px">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title"><h1>Form 5  Data Umpan yang tidak Gunakan </h1></strong>
                            </div>



                             <div class="card-body">

                           
                            	<?php 

                            	 $berat_umpan_non_used = 0 ;
                            	
                            	 foreach($form5->result_array() as $row){

                            		$berat_umpan_non_used = $berat_umpan_non_used + $row['berat_umpan_non_used'] ; 

                            	}


                            	if($berat_umpan_non_used <= 0 ){
                            		$berat_umpan_non_used = '-' ; 
                            	}

                            echo '<h3> Berat Umpan Tidak Digunakan : <b>'.number_format($berat_umpan_non_used).'</b> Kg</h3>';  ?>



                             </div> <!-- /.table-stats -->
                        </div>
                    </div>


                     <div class="col-lg-12" style="margin-top:100px">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title"><h1>Form 6  Jumlah ETP per trip ID <?php echo $kode_trip; ?> yang ditangkap </h1></strong>
                            </div>



                             <div class="card-body">

                            	
                            	<?php 
                            	$dataForm6 = array(); 

                            	$penyu =  0 ; 

                            	$burung = 0 ; 

                            	$hiu = 0 ;

                            	$paus = 0 ; 

                            	$lumba = 0 ; 

                            	if( count($form6->result_array()) > 0 ){
                            	
                            	foreach($form6->result_array() as $row){

                            		if($row['data_penyu'] != ''){
                            		$data = json_decode($row['data_penyu'] , true);

                            			//echo $data['species_penyu'] ; 

                            			$dataForm6[$data['species_penyu']] = 'Penyu' ; 

                            			$penyu++; 

                            			//var_dump($dataform6);
                            			//var_dump($data);

                            		}


                            		if($row['data_lain'] != ''){
                            		$data = json_decode($row['data_lain'] , true);

                            			//echo $data['kode_species'] ; 

                            			$dataForm6[$data['kode_species']] = $data['jenis_species'] ; 


                            			if( $data['jenis_species'] == 'Burung'){

                            				$burung++;

                            			}


                            			if( $data['jenis_species'] == 'Hiu'){

                            				$hiu++;


                            			}


                            			if( $data['jenis_species'] == 'Paus'){

                            				$paus++;

                            			}


                            			if( $data['jenis_species'] == 'Lumba-lumba'){


                            				$lumba++;

                            			}
	                            		//$dataForm6[$data['kode_species']]['tes'] = $data['jenis_species'] ; 



                            			//var_dump($data);

                            		}



                            		/*

                            		$dataForm6[$row['data_penyu']]['fao'] = $row['data_penyu'] ;

                            		$dataForm6[$row['data_penyu']]['tipe'] = 'Penyu' ; 


                            		$dataForm6[$row['data_penyu']]['fao'] = $row['data_penyu'] ;

                            		$dataForm6[$row['data_penyu']]['tipe'] = 'Penyu' ; 


                            		echo $row['data_penyu'] ; 
                            		echo '<br>'; 
                            		echo $row['data_lain'];
                            		echo '<br>'; 

									*/

                            	}


                            	}


                            	if($penyu > 0 ){

                            		echo '<h3> Penyu : <b>'.number_format($penyu).'</b> Ekor </h3>';  


                            	}


                            	if($burung > 0 ){

                            		echo '<h3> Burung : <b>'.number_format($burung).'</b> Ekor </h3>';  


                            	}


                            	if($hiu > 0 ){

                            		echo '<h3> Hiu : <b>'.number_format($hiu).'</b> Ekor </h3>';  


                            	}


                            	if($paus > 0 ){

                            		echo '<h3> Paus : <b>'.number_format($paus).'</b> Ekor </h3>';  


                            	}


                            	if($lumba > 0 ){

                            		echo '<h3> Lumba : <b>'.number_format($lumba).'</b> Ekor </h3>';  


                            	}

                            	?>



                             </div> <!-- /.table-stats -->
                        </div>
                    </div>



        </div>
    </div><!-- .animated -->
</div><!-- .content -->



<script>

$(document).ready(function() {
    $('#example1').DataTable();

    $('#example2').DataTable();

    $('#example3').DataTable();

    $('#example4').DataTable();

} );

</script>