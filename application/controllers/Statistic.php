<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Statistic extends CI_Controller {
 
	function index(){


        cek_session_admin();

        $data['name'] = 'Graph';

        $data['listsSupplier'] = $this->Model_statistic->listsSupplier(); 

        $data['listsProvince'] = $this->Model_statistic->listsProvince(); 

        $data['years'] = $this->Model_statistic->extractYear(); 

        

        $data['tipe_graph'] = array( 

         'catch_comp' => 'Catch Composition' ,
         'bait_comp' => 'Bait Composition' ,
         'catch_n_bait_comp' => 'Catch and Bait Composition' , 
         'fad_usage' => 'FAD Usage' , 
         'fad_composition' => 'FAD Composition' , 
         'vessel_n_trip' => 'Vessel n Trip Number',
         'length_freq' => 'Length Freq',
         'length_n_weight' => 'Ratio',


        
         ) ; 

        $data['url_get_graph'] = base_url()."statistic/getGraph";

        $this->template->load('administrator/template' , 'administrator/statistic/graphic' , $data );
        

    }


    function getGraph(){

        $response = array();
        
        
        $kode_perusahaan = isset( $_POST['kode_perusahaan'] ) ? $_POST['kode_perusahaan']  : '' ; 
        $kode_provinsi  = isset($_POST['kode_provinsi']) ? $_POST['kode_provinsi'] : ""; 
        $tipe = isset($_POST['tipe']) ? $_POST['tipe'] : "" ;
        $tahun = isset($_POST['tahun']) ? $_POST['tahun'] : "" ;
        $bulan = isset($_POST['bulan']) ? $_POST['bulan'] : "" ;
        $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : "" ;
        $tipe_alat =  isset($_POST['tipe_alat']) ? $_POST['tipe_alat'] : "" ;
        
        /*
        $kode_perusahaan = 'All';
        $kode_provinsi  = 'All';
        $tipe = 'length_n_weight';
        */
     
        if($kode_perusahaan == 'All'  && $kode_provinsi == 'All'){

            if($tipe == 'catch_comp'  ){

                #histack
                $response = $this->catch_comp_histack($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 


            }

            if($tipe == 'bait_comp'  ){

                #histack
                $response = $this->histack($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                
            }

            if($tipe == 'catch_n_bait_comp'){

                #histack
                $response = $this->histack($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                
            }


            if($tipe == 'fad_usage'){

                #histack
                $response = $this->histack($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                

            }


            if($tipe == 'fad_composition'){

                #histack
                $response = $this->fad_comp_histack($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                

            }

            if($tipe == 'vessel_n_trip'){

                $response = $this->vesselNtrip($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                

            }

            if($tipe == 'length_freq'){
                
                $response = $this->lengthFreq($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                
            }

            if($tipe == 'length_n_weight'){

                $response = $this->lengthNWeight($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                
            }

            

             
            
        }else{

            if($tipe == 'catch_comp'  ){

                #pie
                $response = $this->catch_comp_pie($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 


            }


            if($tipe == 'bait_comp'  ){

                #histack
                $response = $this->pie($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                
            }

            if($tipe == 'catch_n_bait_comp'){

                #histack
                $response = $this->pie($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                
            }

            if($tipe == 'fad_usage'){

                #histack
                $response = $this->pie($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                

            }

            if($tipe == 'fad_composition'){

                #histack
                $response = $this->fad_comp_pie($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                

            }

            if($tipe == 'vessel_n_trip'){

                $response = $this->vesselNtrip($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                

            }

            if($tipe == 'length_freq'){
                
                $response = $this->lengthFreq($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                
            }


            if($tipe == 'length_n_weight'){

                $response = $this->lengthNWeight($kode_perusahaan,$kode_provinsi , $tipe, $tahun , $bulan, $tanggal, $tipe_alat); 
                
            }

        }


        echo json_encode($response,JSON_NUMERIC_CHECK); 

    }






    function coba_graph(){

        $data['name'] = 'Coba Graph';

        $data['check'] = $this->Model_master->general_select("static_provinces", array('id' => '52'), "", "")->row_array(); 

        var_dump($data['check']['name']);
        
        $this->template->load('administrator/template' , 'administrator/statistic/view_data' , $data );
        

    }

    function catch_comp_pie($kode_perusahaan, $kode_provinsi  , $tipe, $tahun , $bulan, $tanggal, $tipe_alat){


        $response = array();
        
        $dataPoints = array();

        if($tipe_alat =='HL'){
           
            $resultHL = $this->Model_statistic->catchCompSql('PL', $kode_perusahaan , $kode_provinsi, $tahun , $bulan, $tanggal, $tipe_alat);
        
            $result_merger = $resultHL->result();

        }

        if($tipe_alat =='PL'){

            $resultPL =  $this->Model_statistic->catchCompSql('HL', $kode_perusahaan , $kode_provinsi, $tahun , $bulan, $tanggal, $tipe_alat);
    
            $result_merger = $resultPL->result();

        }


        if($tipe_alat =='All'){

            $resultHL = $this->Model_statistic->catchCompSql('PL', $kode_perusahaan , $kode_provinsi, $tahun , $bulan, $tanggal, $tipe_alat);
        
            $resultPL =  $this->Model_statistic->catchCompSql('HL', $kode_perusahaan , $kode_provinsi, $tahun , $bulan, $tanggal, $tipe_alat);
    
            $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 


        }
        
        

        if(count($result_merger) > 0){

                foreach($result_merger as $row ) {

                    $speciesUniq[] = $row->kode_species ; 

                    $labelUniq[] = $row->label ; 

                }


                $speciesUniq = array_unique($speciesUniq);


                foreach($speciesUniq as $loop1){


                    $total_berat = 0;
                    foreach($result_merger as $row ) {

                        if($loop1 == $row->kode_species ){

                            $total_berat = $total_berat + $row->total_berat ; 

                        }

                    }


                    $arrayRes[] = array("y" => $total_berat , "label" => $loop1 ); 




                }
   
                $dataPoints =  $arrayRes;

                $perusahaan = $kode_perusahaan;

                $provinsi = $kode_provinsi; 

                if($kode_perusahaan != 'All'){

                    $data = $this->Model_master->general_select("master_supplier", array('id_supplier' => $kode_perusahaan), "", "")->row_array(); 
                    $perusahaan = $data['nama_perusahaan'] ; 
                }

                if($kode_provinsi != 'All'){

                    $data = $this->Model_master->general_select("static_provinces", array('id' => $kode_provinsi ), "", "")->row_array(); 
                    $provinsi = $data['name'] ; 
                }


        $response = array(
            'success' => 'true', 
            'title' => 'CATCH COMPOSITION OBSERVER DATA Company '.$perusahaan.' Province '.$provinsi  ,
            'dataPoints' => $dataPoints ,
            'messages' => 'Data Didapatkan !'
        );


    }



    return $response; 

    }


    


    function catch_comp_histack($kode_perusahaan, $kode_provinsi,$tipe,$tahun , $bulan, $tanggal, $tipe_alat){

        $response = array();
        
        $dataPoints = array();

                $arrayRes2 = array();

                if($tipe_alat == 'HL'){

                    $resultHL = $this->Model_statistic->catchCompSql('PL', $kode_perusahaan, $kode_provinsi,$tahun , $bulan, $tanggal);

                    $result_merger = $resultHL->result(); 

                }


                if($tipe_alat == 'PL'){

                    $resultPL =  $this->Model_statistic->catchCompSql('HL', $kode_perusahaan, $kode_provinsi,$tahun , $bulan, $tanggal);
    
                    $result_merger = $resultPL->result(); 
                }

                if($tipe_alat == 'All'){

                    $resultHL = $this->Model_statistic->catchCompSql('PL', $kode_perusahaan, $kode_provinsi,$tahun , $bulan, $tanggal);

                    $resultPL =  $this->Model_statistic->catchCompSql('HL', $kode_perusahaan, $kode_provinsi,$tahun , $bulan, $tanggal);
    
                    $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 
    

                }

               
                foreach($result_merger as $row ) {

                    $speciesUniq[] = $row->kode_species ; 
                    $labelUniq[] = $row->label ; 

                }



                $speciesUniq = array_unique($speciesUniq);

                $labelUniq = array_unique($labelUniq);

               
                foreach($speciesUniq as $loop1){

                    foreach($labelUniq as $loop2){

                        $total_berat = 0;
                        foreach($result_merger as $row ) {

                            if($loop1 == $row->kode_species && $loop2 == $row->label){

                                $total_berat = $total_berat + $row->total_berat ; 

                            }

                        }


                        $arrayRes[$loop1][] = array("y" => $total_berat , "label" => $loop2 ); 

                    }


                    $arrayRes2[] = array("type" => "stackedColumn100" , 
                    "name" =>  $loop1 ,
                    "showInLegend" => true,
                    "dataPoints" => $arrayRes[$loop1],
                    );

                }
               
                $dataPoints =  $arrayRes2;


                $response = array(
                    'success' => 'true', 
                    'title' => 'CATCH COMPOSITION OBSERVER DATA ' ,
                    'dataPoints' => $dataPoints ,
                    'messages' => 'Data Didapatkan !'
                );



        return $response; 


    }


function fad_comp_histack($kode_perusahaan, $kode_provinsi,$tipe, $tahun , $bulan, $tanggal, $tipe_alat){


    $response = array();
        
        $dataPoints = array();

                $arrayRes2 = array();

                $resultHL = $this->Model_statistic->fadCompSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                $resultPL =  $this->Model_statistic->fadCompSql('HL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                if($tipe_alat == 'HL'){

                    $result_merger = $resultHL->result();

                }

                if($tipe_alat == 'PL'){

                    $result_merger = $resultPL->result(); 

                }

                if($tipe_alat == 'All'){

                    $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 


                }

                foreach($result_merger as $row ) {


                    $fadUniq[] = $row->fad_select;
                    $speciesUniq[] = $row->kode_species ; 
                    $labelUniq[] = $row->label ; 

                }



                $fadUniq = array_unique($fadUniq); 

                $speciesUniq = array_unique($speciesUniq);

                $labelUniq = array_unique($labelUniq);

               
                foreach($speciesUniq as $loop1){

                    foreach($labelUniq as $loop2){

                        foreach($fadUniq as $loop3){

                        $total_berat = 0;
                        foreach($result_merger as $row ) {

                            if($loop1 == $row->kode_species && $loop2 == $row->label && $loop3 == $row->fad_select ){

                                $total_berat = $total_berat + $row->total_berat ; 

                            }

                        }


                        $arrayRes[$loop1][] = array("y" => $total_berat , "label" => $loop2.' '.$loop3 ); 

                        
                    
                    }


                        

                    }


                    $arrayRes2[] = array("type" => "stackedColumn100" , 
                    "name" =>  $loop1 ,
                    "showInLegend" => true,
                    "dataPoints" => $arrayRes[$loop1],
                    );

                }
               
                $dataPoints =  $arrayRes2;


                $response = array(
                    'success' => 'true', 
                    'title' => 'FAD COMPOSITION OBSERVER DATA' ,
                    'dataPoints' => $dataPoints ,
                    'messages' => 'Data Didapatkan !'
                );



        return $response; 

}


  function histack($kode_perusahaan, $kode_provinsi,$tipe, $tahun , $bulan, $tanggal, $tipe_alat){

        $response = array();
        
        $dataPoints = array();

                $arrayRes2 = array();
				
				$title = array('bait_comp' => 'BAIT COMPOSITION ',
                        'catch_n_bait_comp' => 'CATCH AND BAIT COMPOSITION',
                        'fad_usage' => 'FAD USAGE'

                ); 
				
				if($tipe == 'bait_comp'){
					
				$resultHL = $this->Model_statistic->baitCompSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                $resultPL =  $this->Model_statistic->baitCompSql('HL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                    if($tipe_alat == 'HL'){

                        $result_merger = $resultHL->result(); 

                    }

                    if($tipe_alat == 'PL'){

                        $result_merger = $resultPL->result(); 

                    }


                    if($tipe_alat == 'All'){

                        $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 

                    }

				}

                if($tipe == 'catch_n_bait_comp'){

                $resultHL = $this->Model_statistic->baitCompSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                $resultPL =  $this->Model_statistic->baitCompSql('HL', $kode_perusahaan, $kode_provinsi,  $tahun , $bulan, $tanggal);
  
                    if($tipe_alat == 'HL'){

                        $result_merger1 = $resultHL->result(); 

                    }

                    if($tipe_alat == 'PL'){

                        $result_merger1 = $resultPL->result(); 

                    }


                    if($tipe_alat == 'All'){

                        $result_merger1 = array_merge($resultHL->result() , $resultPL->result() ) ; 

                    }
			
                $resultHL = $this->Model_statistic->catchCompSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                $resultPL =  $this->Model_statistic->catchCompSql('HL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                    if($tipe_alat == 'HL'){

                        $result_merger2 = $resultHL->result(); 

                    }

                    if($tipe_alat == 'PL'){

                        $result_merger2 = $resultPL->result(); 

                    }


                    if($tipe_alat == 'All'){

                        $result_merger2 = array_merge($resultHL->result() , $resultPL->result() ) ; 

                    }

                $result_merger = array_merge($result_merger1 , $result_merger2);

                }


                if($tipe == 'fad_usage'){

                    $resultHL = $this->Model_statistic->fadUsageSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                    $resultPL =  $this->Model_statistic->fadUsageSql('HL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);
    
                    if($tipe_alat == 'HL'){

                        $result_merger = $resultHL->result(); 

                    }

                    if($tipe_alat == 'PL'){

                        $result_merger = $resultPL->result(); 

                    }


                    if($tipe_alat == 'All'){

                        $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 

                    }
				

                }
               

                foreach($result_merger as $row ) {

                    $speciesUniq[] = $row->kode_species ; 
                    $labelUniq[] = $row->label ; 

                }



                $speciesUniq = array_unique($speciesUniq);

                $labelUniq = array_unique($labelUniq);

               
                foreach($speciesUniq as $loop1){

                    foreach($labelUniq as $loop2){

                        $total_berat = 0;
                        foreach($result_merger as $row ) {

                            if($loop1 == $row->kode_species && $loop2 == $row->label){

                                $total_berat = $total_berat + $row->total_berat ; 

                            }

                        }


                        $arrayRes[$loop1][] = array("y" => $total_berat , "label" => $loop2 ); 

                    }


                    $arrayRes2[] = array("type" => "stackedColumn100" , 
                    "name" =>  $loop1 ,
                    "showInLegend" => true,
                    "dataPoints" => $arrayRes[$loop1],
                    );

                }
               
                $dataPoints =  $arrayRes2;


                $response = array(
                    'success' => 'true', 
                    'title' => $title[$tipe].' OBSERVER DATA' ,
                    'dataPoints' => $dataPoints ,
                    'messages' => 'Data Didapatkan !'
                );



        return $response; 


    }


    function fad_comp_pie($kode_perusahaan, $kode_provinsi  , $tipe, $tahun , $bulan, $tanggal, $tipe_alat){

        $response = array();
        
        $dataPoints = array();

        $arrayRes2 = array();

        $resultHL = $this->Model_statistic->fadCompSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

        $resultPL =  $this->Model_statistic->fadCompSql('HL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

        if($tipe_alat == 'HL'){

            $result_merger = $resultHL->result();

        }

        if($tipe_alat == 'PL'){

            $result_merger = $resultPL->result(); 

        }


        if($tipe_alat == 'All'){

            $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 


        }

        foreach($result_merger as $row ) {


            $fadUniq[] = $row->fad_select;
            $speciesUniq[] = $row->kode_species ; 
            $labelUniq[] = $row->label ; 

        }



        $fadUniq = array_unique($fadUniq); 

        $speciesUniq = array_unique($speciesUniq);

        $labelUniq = array_unique($labelUniq);

       
        foreach($speciesUniq as $loop1){

            foreach($labelUniq as $loop2){

                foreach($fadUniq as $loop3){

                $total_berat = 0;
                foreach($result_merger as $row ) {

                    if($loop1 == $row->kode_species && $loop2 == $row->label && $loop3 == $row->fad_select ){

                        $total_berat = $total_berat + $row->total_berat ; 

                    }

                }


                $arrayRes[$loop1][] = array("y" => $total_berat , "label" => $loop2.' '.$loop3 ); 

                
            
            }


                

            }


            $arrayRes2[] = array("type" => "stackedColumn100" , 
            "name" =>  $loop1 ,
            "showInLegend" => true,
            "dataPoints" => $arrayRes[$loop1],
            );

        }
       
        $dataPoints =  $arrayRes2;


        $response = array(
            'success' => 'true', 
            'title' => "FAD COMPOSITION OBSERVER DATA $kode_perusahaan $kode_provinsi" ,
            'dataPoints' => $dataPoints ,
            'messages' => 'Data Didapatkan !'
        );



        return $response; 



    }


    function pie($kode_perusahaan, $kode_provinsi  , $tipe, $tahun , $bulan, $tanggal, $tipe_alat){


        $response = array();
        
        $dataPoints = array();
		
		
		$title = array('bait_comp' => 'BAIT COMPOSITION ',
                        'catch_n_bait_comp' => 'CATCH AND BAIT COMPOSITION',
                        'fad_usage' => 'FAD USAGE'

                ); 
				
		if($tipe == 'bait_comp'){


			$resultHL = $this->Model_statistic->baitCompSql('PL', $kode_perusahaan, $kode_provinsi , $tahun , $bulan, $tanggal);

            $resultPL =  $this->Model_statistic->baitCompSql('HL', $kode_perusahaan, $kode_provinsi , $tahun , $bulan, $tanggal);

            
            if($tipe_alat == 'HL'){

                $result_merger = $resultHL->result();

            }

            if($tipe_alat == 'PL'){

                $result_merger = $resultPL->result(); 

            }

            if($tipe_alat == 'All'){

                $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 


            }
				
		
		
		}


        if($tipe == 'catch_n_bait_comp'){

            $resultHL = $this->Model_statistic->baitCompSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                $resultPL =  $this->Model_statistic->baitCompSql('HL', $kode_perusahaan, $kode_provinsi,  $tahun , $bulan, $tanggal);
  
                    if($tipe_alat == 'HL'){

                        $result_merger1 = $resultHL->result(); 

                    }

                    if($tipe_alat == 'PL'){

                        $result_merger1 = $resultPL->result(); 

                    }


                    if($tipe_alat == 'All'){

                        $result_merger1 = array_merge($resultHL->result() , $resultPL->result() ) ; 

                    }
			
                $resultHL = $this->Model_statistic->catchCompSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                $resultPL =  $this->Model_statistic->catchCompSql('HL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

                    if($tipe_alat == 'HL'){

                        $result_merger2 = $resultHL->result(); 

                    }

                    if($tipe_alat == 'PL'){

                        $result_merger2 = $resultPL->result(); 

                    }


                    if($tipe_alat == 'All'){

                        $result_merger2 = array_merge($resultHL->result() , $resultPL->result() ) ; 

                    }

                $result_merger = array_merge($result_merger1 , $result_merger2);


        }



        if($tipe == 'fad_usage'){

            $resultHL = $this->Model_statistic->fadUsageSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

            $resultPL =  $this->Model_statistic->fadUsageSql('HL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

            if($tipe_alat == 'HL'){

                $result_merger = $resultHL->result();

            }

            if($tipe_alat == 'PL'){

                $result_merger = $resultPL->result(); 

            }

            if($tipe_alat == 'All'){

                $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 


            }
        

        }
		
		
		

        if(count($result_merger) > 0){
                foreach($result_merger as $row ) {

                    $speciesUniq[] = $row->kode_species ; 
                    $labelUniq[] = $row->label ; 

                }


                $speciesUniq = array_unique($speciesUniq);


                foreach($speciesUniq as $loop1){


                    $total_berat = 0;
                    foreach($result_merger as $row ) {

                        if($loop1 == $row->kode_species ){

                            $total_berat = $total_berat + $row->total_berat ; 

                        }

                    }


                    $arrayRes[] = array("y" => $total_berat , "label" => $loop1 ); 




                }
   
                $dataPoints =  $arrayRes;

                $perusahaan = $kode_perusahaan;

                $provinsi = $kode_provinsi; 

                if($kode_perusahaan != 'All'){

                    $data = $this->Model_master->general_select("master_supplier", array('id_supplier' => $kode_perusahaan), "", "")->row_array(); 
                    $perusahaan = $data['nama_perusahaan'] ; 
                }

                if($kode_provinsi != 'All'){

                    $data = $this->Model_master->general_select("static_provinces", array('id' => $kode_provinsi ), "", "")->row_array(); 
                    $provinsi = $data['name'] ; 
                }


        $response = array(
            'success' => 'true', 
            'title' => $title[$tipe].' OBSERVER DATA Company '.$perusahaan.' Province '.$provinsi  ,
            'dataPoints' => $dataPoints ,
            'messages' => 'Data Didapatkan !'
        );


    }



    return $response; 

    }



    function vesselNtrip($kode_perusahaan, $kode_provinsi  , $tipe, $tahun , $bulan, $tanggal, $tipe_alat){

        $response = array();
        
        $dataPoints = array();




        $perusahaan = $kode_perusahaan;

        $provinsi = $kode_provinsi; 

        if($kode_perusahaan != 'All'){

            $data = $this->Model_master->general_select("master_supplier", array('id_supplier' => $kode_perusahaan), "", "")->row_array(); 
            $perusahaan = $data['nama_perusahaan'] ; 
        }

        if($kode_provinsi != 'All'){

            $data = $this->Model_master->general_select("static_provinces", array('id' => $kode_provinsi ), "", "")->row_array(); 
            $provinsi = $data['name'] ; 
        }


        $result =  $this->Model_statistic->vesselNtripSql( $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal, $tipe_alat);

        foreach($result->result() as $row){

            $arrayRes[] = array("y" => $row->trip , "label" => $row->label ); 

        }

    
        $dataPoints =  $arrayRes;


        $response = array(
            'success' => 'true', 
            'title' => 'TRIP DATA Company '.$perusahaan.' Province '.$provinsi  ,
            'dataPoints' => $dataPoints ,
            'messages' => 'Data Didapatkan !'
        );


        return $response; 

    }


    function lengthFreq($kode_perusahaan, $kode_provinsi,$tipe, $tahun , $bulan, $tanggal, $tipe_alat){

        $response = array();
        
        $dataPoints = array();


        $resultHL = $this->Model_statistic->lengthFreqSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

        $resultPL =  $this->Model_statistic->lengthFreqSql('HL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

        if($tipe_alat == 'HL'){

            $result_merger = $resultHL->result();

        }

        if($tipe_alat == 'PL'){

            $result_merger = $resultPL->result(); 

        }

        if($tipe_alat == 'All'){

            $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 


        }
			
        foreach($result_merger as $row ) {

            $speciesUniq[] = $row->kode_species ; 
            $labelUniq[] = $row->label ; 

        }

        $speciesUniq = array_unique($speciesUniq);

        $labelUniq = array_unique($labelUniq);

        foreach($speciesUniq as $loop1){

            for($i=0;$i<= 250 ; $i++){

                if ( $i % 5 == 0 ) {

                    $freq = 0;
                    foreach($result_merger as $row ) {

                        if($loop1 == $row->kode_species &&  $row->panjang >= $i-5 && $row->panjang <= $i ){


                            $freq = $freq + $row->count ; 

                        }

                    }

                    $arrayRes[$loop1][] = array("y" => $freq , "label" => $i ); 

                }


            }

            $arrayRes2[] = array("type" => "stackedColumn" , 
            "name" =>  $loop1 ,
            "showInLegend" => true,
            "dataPoints" => $arrayRes[$loop1],
            );

        }

        $dataPoints =  $arrayRes2;

        $perusahaan = $kode_perusahaan;

        $provinsi = $kode_provinsi; 

        if($kode_perusahaan != 'All'){

            $data = $this->Model_master->general_select("master_supplier", array('id_supplier' => $kode_perusahaan), "", "")->row_array(); 
            $perusahaan = $data['nama_perusahaan'] ; 
        }

        if($kode_provinsi != 'All'){

            $data = $this->Model_master->general_select("static_provinces", array('id' => $kode_provinsi ), "", "")->row_array(); 
            $provinsi = $data['name'] ; 
        }


        $response = array(
            'success' => 'true', 
            'title' => 'Length Frequency OBSERVER DATA '.$perusahaan.' Province '.$provinsi  ,
            'dataPoints' => $dataPoints ,
            'messages' => 'Data Didapatkan !'
        );

        return $response; 

    }


    function lengthNWeight($kode_perusahaan, $kode_provinsi,$tipe, $tahun , $bulan, $tanggal, $tipe_alat){
        
        $response = array();
        
        $dataPoints = array();

        $resultHL = $this->Model_statistic->lengthNWeightSql('PL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

        $resultPL =  $this->Model_statistic->lengthNWeightSql('HL', $kode_perusahaan, $kode_provinsi, $tahun , $bulan, $tanggal);

        if($tipe_alat == 'HL'){

            $result_merger = $resultHL->result();

        }

        if($tipe_alat == 'PL'){

            $result_merger = $resultPL->result(); 

        }

        if($tipe_alat == 'All'){

            $result_merger = array_merge($resultHL->result() , $resultPL->result() ) ; 


        }
				

        foreach($result_merger as $row ) {

            $speciesUniq[] = $row->kode_species ; 
            $labelUniq[] = $row->label ; 

        }

        $speciesUniq = array_unique($speciesUniq);

        $labelUniq = array_unique($labelUniq);

        $arrayRes = array();

        foreach($speciesUniq as $loop1){

            foreach($labelUniq as $loop2){

                foreach($result_merger as $row ) {

                if($loop1 == $row->kode_species && $loop2 == $row->label){

                    $arrayRes[$loop1][] = array("x" => $row->panjang , "y" => $row->berat ); 

                }

                }

            }


            $arrayRes2[] = array(
                    "type" => "scatter",                 "name" =>  $loop1 ,
                    "showInLegend" => true,
                    "dataPoints" => $arrayRes[$loop1],
                    );

        }


        $dataPoints =  $arrayRes2;
        
        
        $perusahaan = $kode_perusahaan;

        $provinsi = $kode_provinsi; 

        if($kode_perusahaan != 'All'){

            $data = $this->Model_master->general_select("master_supplier", array('id_supplier' => $kode_perusahaan), "", "")->row_array(); 
            $perusahaan = $data['nama_perusahaan'] ; 
        }

        if($kode_provinsi != 'All'){

            $data = $this->Model_master->general_select("static_provinces", array('id' => $kode_provinsi ), "", "")->row_array(); 
            $provinsi = $data['name'] ; 
        }

        
        $response = array(
            'success' => 'true', 
            'title' => 'LENGTH AND WEIGHT RATIO OBSERVER DATA '.$perusahaan.' Province '.$provinsi  , 
            'dataPoints' => $dataPoints ,
            'messages' => 'Data Didapatkan !'
        );



        return $response; 

    }
}


?>