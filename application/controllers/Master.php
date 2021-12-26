<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends CI_Controller {	


	function add_master_supplier(){
		cek_session_admin();

        cek_priviledge_return("AddSupplier");

	 	$data['countryLists'] = $this->Model_master->countryLists();

	 	$data['provinceLists'] = $this->Model_master->provinceLists();

	 	$data['select_load_regencies']=base_url()."master/load_regencies";

        $data['select_load_districts']=base_url()."master/load_districts";

        $data['select_load_villages']=base_url()."master/load_villages";


		if (isset($_POST['submit'])){

			 $this->form_validation->set_rules('kode_name', 'Supplier Code', 'required');
	         
	         $this->form_validation->set_rules('nama_perusahaan', 'Supplier Name', 'required');
	         
	         $this->form_validation->set_rules('tipe_perusahaan', 'Supplier Type', 'required');
	       
	         $this->form_validation->set_rules('address', 'Supplier Address', 'required');

			         //check if code name sudah pernah ada 
		        $kode_name = strtoupper($this->input->post('kode_name'));

		        $checkCode = $this->Model_master->checkCodeSupplier($kode_name , 'add' , "");


	          if ( $this->form_validation->run() && $checkCode == 0 ) {

	          	$this->Model_master->add_master_supplier($this->input->post());

				redirect('master/master_supplier');


	          }else{


	          	$this->template->load('administrator/template','administrator/master/master_supplier/add_supplier', $data);


	          }


			

		}else{

			$this->template->load('administrator/template','administrator/master/master_supplier/add_supplier', $data);

		}
	}


	 	  public function load_regencies(){

                $id = $_POST['id']; 

                $results = $this->Model_master->load_regencies($id);

                echo '<option value="">Select Regencies</option>';
                
                foreach($results->result() as $res){
                    echo '<option value="'.$res->id.'">'.$res->name.'</option>'; 
                }
            }

            public function load_regencies_edit(){

                $province = $_POST['province']; 

                $regencies = $_POST['regencies'];

                $results = $this->Model_master->load_regencies($province);

                echo '<option value="">Select Regencies</option>';
                
                foreach($results->result() as $res){
                    if($res->id == $regencies){
                        echo '<option value="'.$res->id.'" selected>'.$res->name.'</option>'; 
                    }else{
                        echo '<option value="'.$res->id.'">'.$res->name.'</option>';  
                    }
                }
            }
            

            public function load_districts(){

                $id = $_POST['id']; 

                $results = $this->Model_master->load_districts($id);

                echo '<option value="">Select District</option>';
                
                foreach($results->result() as $res){
                    echo '<option value="'.$res->id.'">'.$res->name.'</option>'; 
                }

            }

            public function load_districts_edit(){

                $regencies = $_POST['regencies']; 

                $district = $_POST['district']; 

                $results = $this->Model_master->load_districts($regencies);

                echo '<option value="">Select District</option>';
                
                foreach($results->result() as $res){
                    if($district == $res->id){
                        echo '<option value="'.$res->id.'" selected>'.$res->name.'</option>'; 
                    }else{
                        echo '<option value="'.$res->id.'">'.$res->name.'</option>'; 
                    }
                }

            }

            public function load_villages(){

                $id = $_POST['id']; 

                $results = $this->Model_master->load_villages($id);

                echo '<option value="">Select Village</option>';
                
                foreach($results->result() as $res){
                    echo '<option value="'.$res->id.'">'.$res->name.'</option>'; 
                }
            }

            public function load_villages_edit(){

                $district = $_POST['district']; 

                $village = $_POST['village']; 

                $results = $this->Model_master->load_villages($district);

                echo '<option value="">Select Village</option>';
                
                foreach($results->result() as $res){
                    if($village == $res->id){
                        echo '<option value="'.$res->id.'" selected>'.$res->name.'</option>'; 
                    }else{
                        echo '<option value="'.$res->id.'">'.$res->name.'</option>'; 
                    }
                }
            }



	function master_supplier(){
		cek_session_admin();

        cek_priviledge_return("ViewSupplier");

		$data['record'] = $this->Model_master->master_supplier_lists();

		$this->template->load('administrator/template','administrator/master/master_supplier/view_supplier',$data);
	}


	function update_master_supplier(){

		cek_session_admin();

        cek_priviledge_return("EditSupplier");

		$data['countryLists'] = $this->Model_master->countryLists();

	 	$data['provinceLists'] = $this->Model_master->provinceLists();

	 	$data['select_load_regencies']=base_url()."master/load_regencies";

        $data['select_load_districts']=base_url()."master/load_districts";

        $data['select_load_villages']=base_url()."master/load_villages";

        $data['select_load_regencies_edit']=base_url()."master/load_regencies_edit";

        $data['select_load_district_edit']=base_url()."master/load_districts_edit";

        $data['select_load_villages_edit']=base_url()."master/load_villages_edit";

		$id = $this->uri->segment(3);
		
		if (isset($_POST['submit'])){


				  //form validation 


		        $this->form_validation->set_rules('kode_name', 'Supplier Code', 'required');
			    $this->form_validation->set_rules('nama_perusahaan', 'Supplier Name', 'required');
			    $this->form_validation->set_rules('tipe_perusahaan', 'Supplier Type', 'required');
			    $this->form_validation->set_rules('address', 'Supplier Address', 'required');

	        
	        	$kode_name = strtoupper($this->input->post('kode_name'));

		        $checkCode = $this->Model_master->checkCodeSupplier($kode_name , 'edit' , $this->input->post('id_supplier'));
		        

		        if ( $this->form_validation->run() && $checkCode == "0"  ) {
            
            		$this->Model_master->update_master_supplier($this->input->post());

					redirect('master/master_supplier');

            	}

			
		}

		$data['row'] = $this->Model_master->master_supplier_update($id)->row_array();

		$this->template->load('administrator/template','administrator/master/master_supplier/edit_supplier', $data);

	}


	public function disable_master_supplier(){

        cek_priviledge_return("DeleteSupplier");

		$id = $this->uri->segment(3);

		$this->Model_master->disable_supplier($id);

		redirect('master/master_supplier');

	}


    public function add_master_landing(){

        cek_session_admin();

        cek_priviledge_return("AddLanding");

        $data['provinceLists'] = $this->Model_master->provinceLists();

        $data['select_load_regencies']=base_url()."master/load_regencies";

        $data['select_load_districts']=base_url()."master/load_districts";

        $data['select_load_villages']=base_url()."master/load_villages";


        if (isset($_POST['submit'])){

             
             $this->form_validation->set_rules('nama_landing', 'Landing Name', 'required');
             
             $this->form_validation->set_rules('lokasi', 'Supplier Location', 'required');

             $this->form_validation->set_rules('province', 'Province', 'required');

             $this->form_validation->set_rules('regencies', 'Regencies', 'required');



              if ( $this->form_validation->run() ) {

                $this->Model_master->add_master_landing($this->input->post());

                redirect('master/master_landing');


              }else{


                $this->template->load('administrator/template','administrator/master/master_landing/add_landing', $data);


              }


            

        }else{

            $this->template->load('administrator/template','administrator/master/master_landing/add_landing', $data);

        }

    }


    public function master_landing(){

        cek_session_admin();

        cek_priviledge_return("ViewLanding");

        $data['record'] = $this->Model_master->master_landing_lists();

        $this->template->load('administrator/template','administrator/master/master_landing/view_landing',$data);


    }

    public function update_master_landing(){

        cek_session_admin();

        cek_priviledge_return("EditLanding");

        $data['provinceLists'] = $this->Model_master->provinceLists();

        $data['select_load_regencies']=base_url()."master/load_regencies";

        $data['select_load_districts']=base_url()."master/load_districts";

        $data['select_load_villages']=base_url()."master/load_villages";

        $data['select_load_regencies_edit']=base_url()."master/load_regencies_edit";

        $data['select_load_district_edit']=base_url()."master/load_districts_edit";

        $data['select_load_villages_edit']=base_url()."master/load_villages_edit";

        $id = $this->uri->segment(3);
        
        if (isset($_POST['submit'])){

                  //form validation 
                $this->form_validation->set_rules('nama_landing', 'Supplier Name', 'required');

                $this->form_validation->set_rules('lokasi', 'Supplier Location', 'required');


                if ( $this->form_validation->run() ) {
            
                    $this->Model_master->update_master_landing($this->input->post());

                    redirect('master/master_landing');

                }

        }

        $data['row'] = $this->Model_master->master_landing_update($id)->row_array();

        $this->template->load('administrator/template','administrator/master/master_landing/edit_landing', $data);


    }


    public function disable_master_landing(){

        cek_priviledge_return("DeleteLanding");

        $id = $this->uri->segment(3);

        $this->Model_master->disable_landing($id);

        redirect('master/master_landing');

    }

    public function getProvince($id){

         $results = $this->Model_master->getProvince($id);
                
                foreach($results->result() as $res){

                    return $res->name ; 

                }

    }


    public function getRegencies($id){

        $results = $this->Model_master->getRegencies($id);
                
                foreach($results->result() as $res){

                    return $res->name ; 

                }

    }

    public function getDistrict($id){


        $results = $this->Model_master->getDistrict($id);
                
                foreach($results->result() as $res){

                    return $res->name ; 

                }
    }


    public function getVillage($id){

        $results = $this->Model_master->getVillage($id);
                
                foreach($results->result() as $res){

                    return $res->name ; 

                }

    }


      public function load_vessel_from_id_supplier(){

                $id = $_POST['id']; 

                $results = $this->Model_master->load_vessel_from_id_supplier($id);

                echo '<option value="">Select Vessel</option>';
                
                foreach($results->result() as $res){
                    echo '<option value="'.$res->id_vessel.'">'.$res->nama_kapal.'</option>'; 
                }
            }

    public function select_vessel_from_id_supplier(){

        $response = array();

        $id = $_POST['id'];

        $results = $this->Model_master->master_vessel_update($id);

        $response = array(
                'success' => true, 
                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

    }


    public function add_master_vessel(){


        cek_session_admin();

        cek_priviledge_return("AddVessel");

        $data['suppliers'] = $this->Model_master->master_supplier_lists(); 


        if (isset($_POST['submit'])){


             $this->form_validation->set_rules('id_supplier', 'Supplier Name', 'required');
             
             $this->form_validation->set_rules('nama_kapal', 'Nama Kapal', 'required');

                     //check if code name sudah pernah ada 
                $nama_kapal = strtoupper($this->input->post('nama_kapal'));

                $id_supplier =  $this->input->post('id_supplier');


                 $checks = array('nama_kapal' => $nama_kapal , 
                    
                                    'id_supplier' => $id_supplier 
                    );


              $check = $this->Model_master->checkVesselExsist($checks);


              if ( $this->form_validation->run() && $check == 0 ) {

                $this->Model_master->add_master_vessel($this->input->post());

                redirect('master/master_vessel');


              }else{


                $this->template->load('administrator/template','administrator/master/master_vessel/add_vessel', $data);


              }

        }else{

             $this->template->load('administrator/template','administrator/master/master_vessel/add_vessel', $data);

        }
    }


    public function master_vessel(){

        cek_session_admin();

        cek_priviledge_return("ViewVessel");

        $data['record'] = $this->Model_master->master_vessel_lists();

        $this->template->load('administrator/template','administrator/master/master_vessel/view_vessel',$data);


    }


    public function update_master_vessel(){

        cek_session_admin();

        cek_priviledge_return("EditVessel");

        $data['suppliers'] = $this->Model_master->master_supplier_lists(); 

        $id = $this->uri->segment(3);
        

        if (isset($_POST['submit'])){

            echo 'masuk';

                  //form validation 
                $this->form_validation->set_rules('id_supplier', 'Supplier Name', 'required');
             
                $this->form_validation->set_rules('nama_kapal', 'Nama Kapal', 'required');

               //$this->form_validation->set_rules('ukuran', 'Ukuran panjang Kapal', 'required');

                      //check if code name sudah pernah ada 

                $id_vessel = strtoupper($this->input->post('id_vessel'));

                $id = $id_vessel ; 

                $nama_kapal = strtoupper($this->input->post('nama_kapal'));

                //$ukuran = $this->input->post('ukuran');

                $id_supplier =  $this->input->post('id_supplier');


                 $checks = array('nama_kapal' => $nama_kapal , 

                                   // 'ukuran' => $ukuran , 
                    
                                    'id_supplier' => $id_supplier 
                    );


                  $check = $this->Model_master->checkVesselExsistUpdate($checks , $id_vessel);


                if ( $this->form_validation->run() && $check == 0 ) {
            
                    $this->Model_master->update_master_vessel($this->input->post());

                    redirect('master/master_vessel');

                }

        }

        $data['row'] = $this->Model_master->master_vessel_update($id)->row_array();

        $this->template->load('administrator/template','administrator/master/master_vessel/edit_vessel', $data);


    }


    public function disable_master_vessel(){

        cek_priviledge_return("DeleteVessel");

        $id = $this->uri->segment(3);

        $this->Model_master->disable_vessel($id);

        redirect('master/master_vessel');


    }

    public function update_master_dictionary(){


        cek_session_admin();

        $tipe = $this->uri->segment(3);

        $id = $this->uri->segment(4);
        
        if (isset($_POST['submit'])){

                  //form validation 
                $this->form_validation->set_rules('kode_aktivitas', 'Kode Aktivitas', 'required');

                $this->form_validation->set_rules('nama_aktivitas', 'Nama Aktivitas', 'required');


                $jenis_aktivitas = $_POST['jenis_aktivitas'];


                if ( $this->form_validation->run() ) {
            
                    $this->Model_master->update_master_dictionary( $this->input->post());

                

                    redirect('master/'.$jenis_aktivitas);

                }

        }

        $data['row'] = $this->Model_master->master_dictionary_update($tipe , $id)->row_array();

        $this->template->load('administrator/template','administrator/master/master_dictionary/edit_dictionary', $data);


    }

    public function add_master_dictionary(){


        cek_session_admin();


        $data['jenis_aktivitas'] = $this->uri->segment(3);


        if (isset($_POST['submit'])){


                $this->form_validation->set_rules('kode_aktivitas', 'Kode Aktivitas', 'required');


                $this->form_validation->set_rules('nama_aktivitas', 'Nama Aktivitas', 'required');


                $jenis_aktivitas = $_POST['jenis_aktivitas'];



              if ( $this->form_validation->run() ) {


                    $this->Model_master->add_master_dictionary($this->input->post());


                    redirect('master/'.$jenis_aktivitas);


              }else{


                $this->template->load('administrator/template','administrator/master/master_dictionary/add_dictionary', $data);



              }

        }else{

                $this->template->load('administrator/template','administrator/master/master_dictionary/add_dictionary', $data );

        }
    }


    public function disable_master_dictionary(){

        $jenis_aktivitas = $this->uri->segment(3);

        $id = $this->uri->segment(4);

        

        $this->Model_master->disable_master_dictionary($id, $jenis_aktivitas);

        redirect('master/'.$jenis_aktivitas);



    }


    public function kode_aktivitas(){

        cek_session_admin();

        cek_priviledge_return("ViewMisscelaneus"); 

        $checks = array('jenis_aktivitas' => 'kode_aktivitas');

        $table = 'master_dictionary' ; 

        $data['record'] = $this->Model_master->master_dictionary_lists( $checks , $table );

        $data['name'] = 'Kode Aktivitas';

        $data['tipe'] = 'kode_aktivitas';

        $this->template->load('administrator/template','administrator/master/master_dictionary/view_dictionary',$data);



    }





    public function kode_ikan_terlihat(){


        cek_session_admin();

        $checks = array('jenis_aktivitas' => 'kode_ikan_terlihat');

        $table = 'master_dictionary' ; 

        $data['record'] = $this->Model_master->master_dictionary_lists( $checks , $table );

        $data['name'] = 'Kode Ikan Terlihat';

        $data['tipe'] = 'kode_ikan_terlihat';

        $this->template->load('administrator/template','administrator/master/master_dictionary/view_dictionary',$data);



    }

    public function kode_terasosiasi(){

        cek_session_admin();

        $checks = array('jenis_aktivitas' => 'kode_terasosiasi');

        $table = 'master_dictionary' ; 

        $data['record'] = $this->Model_master->master_dictionary_lists( $checks , $table );

        $data['name'] = 'Kode Ikan Terasosiasi';

        $data['tipe'] = 'kode_terasosiasi';

        $this->template->load('administrator/template','administrator/master/master_dictionary/view_dictionary',$data);

    }

    public function kode_posisi_pancing_etp(){

        cek_session_admin();

        cek_priviledge_return("ViewMisscelaneus"); 

        $checks = array('jenis_aktivitas' => 'kode_posisi_pancing_etp');

        $table = 'master_dictionary' ; 

        $data['record'] = $this->Model_master->master_dictionary_lists( $checks , $table );

        $data['name'] = 'Kode Posisi Pancing ETP';

        $data['tipe'] = 'kode_posisi_pancing_etp';

        $this->template->load('administrator/template','administrator/master/master_dictionary/view_dictionary',$data);

    }

    public function kode_kondisi_etp(){

        cek_session_admin();

        cek_priviledge_return("ViewMisscelaneus"); 

        $checks = array('jenis_aktivitas' => 'kode_kondisi_etp');

        $table = 'master_dictionary' ; 

        $data['record'] = $this->Model_master->master_dictionary_lists( $checks , $table );

        $data['name'] = 'Kode Kondisi ETP';

        $data['tipe'] = 'kode_kondisi_etp';

        $this->template->load('administrator/template','administrator/master/master_dictionary/view_dictionary',$data);


    }


    public function fishbank(){

        cek_session_admin();

        cek_priviledge_return("ViewMisscelaneus"); 

        $table = "master_fishcode";

        $data['record'] =  $this->Model_master->general_select($table, array(), "" , $order_by="fishcode"); 

        $this->template->load('administrator/template','administrator/master/master_fishbank/view_fishbank',$data);
    }

}