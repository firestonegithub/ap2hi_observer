<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trip extends CI_Controller {	

	


	public function add_trip(){

		cek_session_admin();

		cek_priviledge_return("AddTripData"); 
		
		//$kode_trip = "KodeNameSuppier_20180605_timesubmit" ; 

		$data['load_vessel_from_id_supplier']=base_url()."master/load_vessel_from_id_supplier";

		$data['select_vessel_from_id_supplier']=base_url()."master/select_vessel_from_id_supplier";

		$data['record_suppliers'] = $this->Model_master->master_supplier_lists();

		$data['record_landings'] = $this->Model_master->master_landing_lists();

		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('id_supplier', 'Supplier Code', 'required');

			$this->form_validation->set_rules('id_vessel', 'Vessel Code', 'required');

			//$this->form_validation->set_rules('nama_kapal', 'Nama Kapal', 'required');

			$this->form_validation->set_rules('tanggal_keberangkatan', 'Tanggal Keberangkatan', 'required');

			$this->form_validation->set_rules('tanggal_kedatangan', 'Tanggal Kedatangan', 'required');

			$check = 1; 

			//check apakah ada yang sama 


			if($_POST['id_supplier'] != "" && $_POST['tanggal_keberangkatan'] != "" && $_POST['tanggal_kedatangan'] && $_POST['id_vessel'] != ""){


				$code = $this->Model_trip->createCodeTrip($this->input->post());

				$check = $this->Model_trip->checkExsistingTrip($code); 


			}

			

			 if ( $this->form_validation->run() == TRUE && $check == 0  ) {

			 	//dapatkan kode trip 


			 	$data = $this->input->post();



			 	if( $_FILES['upload_foto_img']['name'] != "" ){

			  			$upload_foto_img = $this->upload_foto('upload_foto_img');
			  			$data['upload_foto_img'] =  $upload_foto_img['file_name']  ; 


				  }



	          	$kode_trip = $this->Model_trip->add_trip_utama($data);

	          	$this->sent_email($kode_trip);

				redirect('trip/trip_detail/'.$kode_trip);


	          }else{

	          	$data['post'] = $_POST; 

	          	$data['vesselData'] =  $this->Model_master->master_vessel_update($_POST['id_vessel'])->row_array();  

	          	$this->template->load('administrator/template','administrator/trip/add_trip_utama' , $data );

	          }

		
		//$this->load->view("administrator/trip/add_trip_utama" , $data);

		}else{

			$data['post'] = array();

			$this->template->load('administrator/template','administrator/trip/add_trip_utama' , $data );

		}
		

	}



	function add_trip_hl(){




	}


	function sent_email($kode_trip){

        //sent email-----------------------------------------------------------------
        $config = Array(
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email',$config);

        $this->email->from('eclair.user@gmail.com', "AP2HI Observer");
        $this->email->to('winatamika@gmail.com');
        $this->email->subject('Testing Mail');

        $email_body = '
        <html>
            <body>
                <p>Dear AP2HI Administrator, Terdapat informasi trip baru yang telah diinput :</p>
                <p>Silahkan check pada link <a href="'.base_url().'trip_detail/'.$kode_trip.'">ini</a></p>
                <br>
                <br>
                <div><i>Have a nice day...</i></div>
            </body>
        </html>';

        $this->email->message($email_body);

        $this->email->send();
    }



	public function link_forms($kode_trip){

		$data['link_form1'] = ' <a href="'.base_url().'trip/trip_update/'.$kode_trip.'"><div class="stat-text">  Form 1 </div> </a>'; 


		$checkForm2 = $this->Model_trip->checkExsisting("observerform_catatan_harian", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm2 > 0 ){
			$data['link_form2'] = ' <a href="'.base_url().'trip/form2/'.$kode_trip.'"><div class="stat-text">  Form 2 </div> </a>' ; 
		}else{
			$data['link_form2'] = ' <a href="'.base_url().'trip/form2_add/'.$kode_trip.'"><div class="stat-text">  Form 2 </div> </a>' ;
		}

		$checkForm3 = $this->Model_trip->checkExsisting("observerform_tangkapan", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm3 > 0 ){
			$data['link_form3'] = ' <a href="'.base_url().'trip/form3/'.$kode_trip.'"><div class="stat-text">  Form 3 </div> </a>' ; 
		}else{
			$data['link_form3'] = ' <a href="'.base_url().'trip/form3_add/'.$kode_trip.'"><div class="stat-text">  Form 3 </div> </a>' ;
		}


		$checkForm4 = $this->Model_trip->checkExsisting("observerform_umpan", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm4 > 0 ){
			$data['link_form4'] = ' <a href="'.base_url().'trip/form4/'.$kode_trip.'"><div class="stat-text">  Form 4 </div> </a>' ; 
		}else{
			$data['link_form4'] = ' <a href="'.base_url().'trip/form4_add/'.$kode_trip.'"><div class="stat-text">  Form 4 </div> </a>' ;
		}


		$checkForm5 = $this->Model_trip->checkExsisting("observerform_umpan_non_used", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm5 > 0 ){
			$data['link_form5'] = ' <a href="'.base_url().'trip/form5/'.$kode_trip.'"><div class="stat-text">  Form 5 </div> </a>' ; 
		}else{
			$data['link_form5'] = ' <a href="'.base_url().'trip/form5_add/'.$kode_trip.'"><div class="stat-text">  Form 5 </div> </a>' ;
		}


		$checkForm6 = $this->Model_trip->checkExsisting("observerform_etp", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm6 > 0 ){
			$data['link_form6'] = ' <a href="'.base_url().'trip/form6/'.$kode_trip.'"><div class="stat-text">  Form 6 </div> </a>' ; 
		}else{
			$data['link_form6'] = ' <a href="'.base_url().'trip/form6_add/'.$kode_trip.'"><div class="stat-text">  Form 6 </div> </a>' ;
		}


		$checkForm7 = $this->Model_trip->checkExsisting("observerform_pemindahan", array('id_trip' => $kode_trip) , 'id_trip'); 
		if($checkForm3 > 0 ){
			$data['link_form7'] = ' <a href="'.base_url().'trip/form7/'.$kode_trip.'"><div class="stat-text">  Form 7 </div> </a>' ; 
		}else{
			$data['link_form7'] = ' <a href="'.base_url().'trip/form7_add/'.$kode_trip.'"><div class="stat-text">  Form 7 </div> </a>' ;
		}


		return $data ; 

	}


	public function trip_detail($kode_trip){

		$data = $this->link_forms($kode_trip);


		$data['kode_trip'] = $kode_trip ; 

		$data['controller']=$this; 

		$data['tripDetail'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", ""); 

		$data['is_allowed'] = cek_priviledge_disable("ApproveTripDataDraft"); 
		
		$this->template->load('administrator/template','administrator/trip/menu_trip', $data);


	}


	public function trip_update($kode_trip){


		$data['kode_trip'] = $kode_trip ; 

		$data['load_vessel_from_id_supplier']=base_url()."master/load_vessel_from_id_supplier";

		$data['select_vessel_from_id_supplier']=base_url()."master/select_vessel_from_id_supplier";

		$data['record_suppliers'] = $this->Model_master->master_supplier_lists();

		$data['record_landings'] = $this->Model_master->master_landing_lists();
		
		$data['tripDetail'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();; 

		$data['nama_kapal'] = $this->getNamaKapalFromId($data['tripDetail']['id_vessel']) ; 


		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('id_supplier', 'Supplier Code', 'required');

			$this->form_validation->set_rules('id_vessel', 'Vessel Code', 'required');

			$this->form_validation->set_rules('nama_kapal', 'Nama Kapal', 'required');

			$this->form_validation->set_rules('tanggal_keberangkatan', 'Tanggal Keberangkatan', 'required');

			$this->form_validation->set_rules('tanggal_kedatangan', 'Tanggal Kedatangan', 'required');


			if ( $this->form_validation->run() == TRUE  ) {

				$data = $this->input->post();

			 	if( $_FILES['upload_foto_img']['name'] != "" ){

			  			$upload_foto_img = $this->upload_foto('upload_foto_img');
			  			$data['upload_foto_img'] =  $upload_foto_img['file_name']  ; 


				  }



	          	$this->Model_trip->update_trip_utama($data);

				redirect('trip/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip/update_trip_utama', $data);

	          }


		}else{

			

			$this->template->load('administrator/template','administrator/trip/update_trip_utama', $data);


		}




	}

	public function detail_pancing($kode_trip){

		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("observerform_detail_pancing", array('id_trip' => $kode_trip), "", "")->row_array();; 

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->update_detail_pancing($this->input->post());

				redirect('trip/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip/update_trip_utama', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/update_detail_pancing', $data);
	

		}
		

	}


	public function detail_kelengkapan($kode_trip){

		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("observerform_detail_kelengkapan", array('id_trip' => $kode_trip), "", "")->row_array();; 

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->update_detail_kelengkapan($this->input->post());

				redirect('trip/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip/update_trip_utama', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/update_detail_kelengkapan', $data);
	

		}

	}


	public function kuantitas_tangkapan($kode_trip){
		
		cek_session_admin();

		$data['kode_trip'] = $kode_trip ; 

		$data['record'] = $this->Model_master->general_select("observerform_detail_quantityfish", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip/kuantitas_tangkapan',$data);


	}

	public function add_kuantitas_tangkapan($kode_trip){

		cek_session_admin();

		$data['kode_trip'] = $kode_trip ; 


		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('kode_trip', 'kode_trip Code', 'required');

			$this->form_validation->set_rules('kode_species', 'kode_species Code', 'required');

			$this->form_validation->set_rules('jumlah_ekor', 'jumlah_ekor Code', 'required');



			 if ( $this->form_validation->run() == TRUE ) {

			 	//dapatkan kode trip 

	          	$this->Model_trip->add_kuantitas_tangkapan($this->input->post());

				redirect('trip/kuantitas_tangkapan/'.$kode_trip);


	          }else{

	          	$data['post'] = $_POST; 

	          	$this->template->load('administrator/template','administrator/trip/add_kuantitas_tangkapan' , $data );

	          }

		
		//$this->load->view("administrator/trip/add_trip_utama" , $data);

		}else{

			$data['post'] = array();

			$this->template->load('administrator/template','administrator/trip/add_kuantitas_tangkapan' , $data );

		}

	}


	public function update_kuantitas_tangkapan($kode_trip , $kode_species){

		cek_session_admin();

		$data['kode_trip'] = $kode_trip ; 

		$data['kode_species'] = $kode_species ; 


		if (isset($_POST['submit'])){

			$this->form_validation->set_rules('kode_trip', 'kode_trip Code', 'required');

			$this->form_validation->set_rules('kode_species', 'kode_species Code', 'required');

			$this->form_validation->set_rules('jumlah_ekor', 'jumlah_ekor Code', 'required');



			 if ( $this->form_validation->run() == TRUE ) {

			 	//dapatkan kode trip 

	          	$this->Model_trip->update_kuantitas_tangkapan($this->input->post());

				redirect('trip/kuantitas_tangkapan/'.$kode_trip);


	          }else{

	          	$data['post'] = $_POST; 

	          	$this->template->load('administrator/template','administrator/trip/update_kuantitas_tangkapan' , $data );

	          }

		
		//$this->load->view("administrator/trip/add_trip_utama" , $data);

		}else{

			$data['post'] = $this->Model_master->general_select("observerform_detail_quantityfish", array('id_trip' => $kode_trip , 'kode_species' => $kode_species ), "", "")->row_array() ; 

			$this->template->load('administrator/template','administrator/trip/update_kuantitas_tangkapan' , $data );

		}

	}


	public function disable_kuantitas_tangkapan($kode_trip , $kode_species){

		$this->Model_trip->disable_kuantitas_tangkapan($kode_trip , $kode_species);

		redirect('trip/kuantitas_tangkapan/'.$kode_trip);

	}

	public function palka_tuna($kode_trip){

		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("observerform_detail_palka", array('id_trip' => $kode_trip), "", "")->result();

		
		$data['numbering'][1] = "";

		$data['numbering'][2] = "";

		$data['numbering'][3] = "";

		$data['numbering'][4] = "";

		$data['numbering'][5] = "";

		$data['numbering'][6] = "";

		
		foreach ($data['detail']  as $res) {

			$data['numbering'][$res->palka_no] =  $res->palka_detail ; 

		 } 

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->update_detail_palka($this->input->post());

				redirect('trip/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip/update_trip_utama', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/update_detail_palka', $data);
	

		}

	}

	public function alat_memancing_umpan($kode_trip){

		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("observerform_detail_alat_umpan", array('id_trip' => $kode_trip), "", "")->row_array();; 

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->update_detail_alat_umpan($this->input->post());

				redirect('trip/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip/update_trip_utama', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/update_detail_alat_umpan', $data);
	

		}

	}

	public function informasi_lain($kode_trip){

		$kode_trip;

		$data['kode_trip'] = $kode_trip ; 

		$data['detail'] = $this->Model_master->general_select("observerform_detail_lain", array('id_trip' => $kode_trip), "", "")->row_array();; 

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->update_detail_lain($this->input->post());

				redirect('trip/trip_detail/'.$kode_trip);


	          }else{

	    
	          	$this->template->load('administrator/template','administrator/trip/update_trip_utama', $data);

	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/update_detail_lain', $data);
	

		}

	}


	public function list_trip_all(){

		$role = $this->session->userdata('level'); 

		$data['role'] = $role;

		$data['id_user'] = $this->session->userdata('id_user'); 

		$data['link_data_hl'] = ' <a href="'.base_url().'trip_hl/list_trip_hl/"><div class="stat-text">  Form HL </div> </a>' ; 

		$data['link_data_pl'] = ' <a href="'.base_url().'trip/list_trip/"><div class="stat-text">  Form PL </div> </a>' ; 

		$data['controller']=$this; 

		$this->template->load('administrator/template','administrator/trip/list_trip_all',$data);


	}


	public function list_trip(){

		cek_session_admin();


		$role = $this->session->userdata('level'); 

		$data['role'] = $role;

		$data['id_user'] = $this->session->userdata('id_user'); 

		if($role != '3' | $role != '4'){

			$supplier_data = json_decode($this->session->userdata('supplier_data')); 

			$landing_data = json_decode($this->session->userdata('landing_data')); 

			$data['record'] = $this->Model_master->general_select_in("observerform_trip", array('status_trip' => '1','tipe_data' => 'PL'), array('id_supplier' => $supplier_data , 'pelabuhan_keberangkatan' => $landing_data) ,  "", "");

		}else{


			$data['record'] = $this->Model_master->general_select("observerform_trip", array('status_trip' => '1'), "", "");
		}

		

		$data['controller']=$this; 

		$this->template->load('administrator/template','administrator/trip/list_trip',$data);



	}


	public function list_trip_draft(){

		cek_session_admin();

		$role = $this->session->userdata('level'); 

		cek_priviledge_return("ViewTripDataDraft"); 
			
		$supplier_data = json_decode($this->session->userdata('supplier_data')); 

		$landing_data = json_decode($this->session->userdata('landing_data')); 

		$data['record'] = $this->Model_master->general_select_in("observerform_trip", array('status_trip' => '2'), array('id_supplier' => $supplier_data , 'pelabuhan_keberangkatan' => $landing_data) ,  "", "");

		
		
		$data['controller']=$this; 

		$this->template->load('administrator/template','administrator/trip/list_trip_draft',$data);



	}

	public function extract_data(){

		$this->load->library('excel');


		//observerform_trip
	
		$objWorkSheet = $this->excel->createSheet(0); 

    	  $objWorkSheet->setCellValue('A1', 'namafile') ; 
		  $objWorkSheet->setCellValue('B1', 'id_vessel') ;
		  $objWorkSheet->setCellValue('C1', 'id_supplier') ;
		  $objWorkSheet->setCellValue('D1', 'call_sign') ;
		  $objWorkSheet->setCellValue('E1', 'wcpfc') ; 
		  $objWorkSheet->setCellValue('F1', 'iotc') ; 
		  $objWorkSheet->setCellValue('G1', 'csbt') ; 
		  $objWorkSheet->setCellValue('H1', 'nama_nahkoda') ; 
		  $objWorkSheet->setCellValue('I1', 'nama_fishing_master') ; 
		  $objWorkSheet->setCellValue('J1', 'pelabuhan_keberangkatan') ; 
		  $objWorkSheet->setCellValue('K1', 'pelabuhan_kedatangan') ; 
		  $objWorkSheet->setCellValue('L1', 'tanggal_keberangkatan') ; 
		  $objWorkSheet->setCellValue('M1', 'tanggal_kedatangan') ; 
		  $objWorkSheet->setCellValue('N1', 'jumlah_wni') ; 
		  $objWorkSheet->setCellValue('O1', 'jumlah_wna') ; 
		  $objWorkSheet->setCellValue('P1', 'vms') ;
		  $objWorkSheet->setCellValue('Q1', 'kondisi_vms') ; 
		  $objWorkSheet->setCellValue('R1', 'vts') ; 
		  $objWorkSheet->setCellValue('S1', 'kondisi_vts') ; 
		  $objWorkSheet->setCellValue('T1', 'penanganan_diatas_kapal') ; 
		  $objWorkSheet->setCellValue('U1', 'cara_penanganan_pasca_panen') ; 
		  $objWorkSheet->setCellValue('V1', 'foto_kapal') ; 
		  $objWorkSheet->setCellValue('W1', 'upload_foto') ; 
		  $objWorkSheet->setCellValue('X1', 'id_user') ;
		  $objWorkSheet->setCellValue('Y1', 'tanggal') ; 
		  $objWorkSheet->setCellValue('Z1', 'nama_kapal') ; 
		  $objWorkSheet->setCellValue('AA1', 'tanda_selar') ; 
		  $objWorkSheet->setCellValue('AB1', 'no_sipi') ; 
		  $objWorkSheet->setCellValue('AC1', 'no_siup') ; 
		  $objWorkSheet->setCellValue('AD1', 'rfmo') ; 
		  $objWorkSheet->setCellValue('AE1', 'tahun_pembuatan_kapal') ; 
		  $objWorkSheet->setCellValue('AF1', 'bendera') ; 
		  $objWorkSheet->setCellValue('AG1', 'bahan') ; 
		  $objWorkSheet->setCellValue('AH1', 'gt') ;
		  $objWorkSheet->setCellValue('AI1', 'hp') ; 
		  $objWorkSheet->setCellValue('AJ1', 'panjang_kapal') ; 
		  $objWorkSheet->setCellValue('AK1', 'lebar_kapal') ; 
		  $objWorkSheet->setCellValue('AL1', 'changed_by') ;
		  $objWorkSheet->setCellValue('AM1', 'changed_date') ;
		  $objWorkSheet->setCellValue('AN1', 'nama_pemantau') ; 
		  $objWorkSheet->setCellValue('AO1', 'id_pemantau') ;
		  $objWorkSheet->setCellValue('AP1', 'tanggal_pemantau') ; 
		  $objWorkSheet->setCellValue('AQ1', 'rfmo_choice') ;
		  $objWorkSheet->setCellValue('AR1', 'upload_foto_img') ;
		  $objWorkSheet->setCellValue('AS1', 'status_trip') ;
		  $objWorkSheet->setCellValue('AT1', 'tipe_data') ;
		  
		

		//$result = $this->Model_master->general_select("observerform_trip", array('status_trip' => '1'), "", "")->result_array();

		$result = $this->Model_trip->tripExtract()->result_array();

		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1-Trip Info");



		//observerform_detail_pancing

		$objWorkSheet = $this->excel->createSheet(1); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 

		$objWorkSheet->setCellValue('B1', 'ukuran_mata_pancing') ; 

		$objWorkSheet->setCellValue('C1', 'jumlah_pemancing') ; 

		$objWorkSheet->setCellValue('D1', 'jumlah_boiboi') ; 

		$objWorkSheet->setCellValue('E1', 'jumlah__palka') ; 

		$objWorkSheet->setCellValue('F1', 'kapasitas_palka_umpan') ; 

		$objWorkSheet->setCellValue('G1', 'sistem_sirkulasi_air_palka_umpan') ; 
		
		$result = $this->db->query("Select o.id_trip ,  ukuran_mata_pancing , jumlah_pemancing , jumlah_boiboi , jumlah__palka , kapasitas_palka_umpan , sistem_sirkulasi_air_palka_umpan  from observerform_trip t, observerform_detail_pancing o  where status_trip = '1' and t.tipe_data = 'PL' and t.id_trip = o.id_trip ")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1a-detail_pancing");

			
		
		//observerform_detail_kelengkapan

		$objWorkSheet = $this->excel->createSheet(2); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 

		$objWorkSheet->setCellValue('B1', 'sonar') ; 

		$objWorkSheet->setCellValue('C1', 'fishfinder') ; 

		$objWorkSheet->setCellValue('D1', 'radio') ; 

		$objWorkSheet->setCellValue('E1', 'gps') ; 

		$objWorkSheet->setCellValue('F1', 'telepon_satelite') ; 
		
		$result = $this->db->query("Select o.id_trip ,  sonar , fishfinder , radio , gps , telepon_satelite from observerform_trip t, observerform_detail_kelengkapan o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'   ")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1b-detail_kelengkapan");

		//observerform_detail_palka

		$objWorkSheet = $this->excel->createSheet(3); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 

		$objWorkSheet->setCellValue('B1', 'palka_no') ; 

		$objWorkSheet->setCellValue('C1', 'palka_detail') ; 
		
		$result = $this->db->query("Select o.id_trip ,  palka_no , palka_detail from observerform_trip t, observerform_detail_palka o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1c-detail_palka");


		//observerform_detail_alat_umpan
		$objWorkSheet = $this->excel->createSheet(4); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 

		$objWorkSheet->setCellValue('B1', 'lampu') ; 

		$objWorkSheet->setCellValue('C1', 'boke_ami') ; 
		
		$result = $this->db->query("Select o.id_trip ,  lampu , boke_ami  from observerform_trip t, observerform_detail_alat_umpan o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'   ")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1d-detail_alat_umpan");

		//observerform_detail_lain

		$objWorkSheet = $this->excel->createSheet(5); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 

		$objWorkSheet->setCellValue('B1', 'solar') ; 

		$objWorkSheet->setCellValue('C1', 'es') ; 

		$objWorkSheet->setCellValue('D1', 'biaya_trip') ; 
		
		$result = $this->db->query("Select o.id_trip ,  solar , es  , biaya_trip   from observerform_trip t, observerform_detail_lain o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("1e-detail_lain");

		//observerform_catatan_harian

		$objWorkSheet = $this->excel->createSheet(6); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 

		$objWorkSheet->setCellValue('B1', 'tanggal') ; 

		$objWorkSheet->setCellValue('C1', 'lintang') ; 

		$objWorkSheet->setCellValue('D1', 'u_s') ; 

		$objWorkSheet->setCellValue('E1', 'bujur') ; 

		$objWorkSheet->setCellValue('F1', 'kode_aktivitas') ; 
		
		$result = $this->db->query("Select o.id_trip ,  o.tanggal , lintang  , u_s , bujur , kode_aktivitas  from observerform_trip t, observerform_catatan_harian o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'   ")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("2-catatan_harian");


		//observerform_tangkapan

		$objWorkSheet = $this->excel->createSheet(7); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'seq') ; 
		$objWorkSheet->setCellValue('C1', 'id_pemantau') ;  
		$objWorkSheet->setCellValue('D1', 'hari') ; 
		$objWorkSheet->setCellValue('E1', 'bulan') ; 
		$objWorkSheet->setCellValue('F1', 'tahun') ;  
		$objWorkSheet->setCellValue('G1', 'set_nomor') ;  
		$objWorkSheet->setCellValue('H1', 'jam_mulai') ;  
		$objWorkSheet->setCellValue('I1', 'menit_mulai') ; 
		$objWorkSheet->setCellValue('J1', 'jam_selesai') ;   
		$objWorkSheet->setCellValue('K1', 'menit_selesai') ; 
		$objWorkSheet->setCellValue('L1', 'jumlah_pemancing') ; 
		$objWorkSheet->setCellValue('M1', 'alat_pengukur') ;  
		$objWorkSheet->setCellValue('N1', 'lintang') ; 
		$objWorkSheet->setCellValue('O1', 'u_s') ; 
		$objWorkSheet->setCellValue('P1', 'bujur') ; 
		$objWorkSheet->setCellValue('Q1', 't_b') ; 
		$objWorkSheet->setCellValue('R1', 'fad') ; 
		$objWorkSheet->setCellValue('S1', 'jenis_fad') ;  
		$objWorkSheet->setCellValue('T1', 'ikan_terasosiasi') ;  
		$objWorkSheet->setCellValue('U1', 'ikan_terlihat_dengan') ;  
		$objWorkSheet->setCellValue('V1', 'total_hasil_tangkapan') ; 
		$objWorkSheet->setCellValue('W1', 'detail_hasil_tangkapan') ; 
		$objWorkSheet->setCellValue('X1', 'foto_fad') ; 
		$objWorkSheet->setCellValue('Y1', 'no_foto_fad') ; 
		$objWorkSheet->setCellValue('Z1', 'jum_keranjang_tangkapan') ; 
		$objWorkSheet->setCellValue('AA1', 'berat_keranjang_kosong') ; 
		$objWorkSheet->setCellValue('AB1', 'fad2') ; 
		$objWorkSheet->setCellValue('AC1', 'tanggal') ;  
		
		$result = $this->db->query("Select o.id_trip ,  seq, o.id_pemantau, hari, bulan, tahun, set_nomor, jam_mulai, 
								       menit_mulai, jam_selesai, menit_selesai, jumlah_pemancing, alat_pengukur, 
								       lintang, u_s, bujur, t_b, fad, jenis_fad, ikan_terasosiasi, ikan_terlihat_dengan, 
								       total_hasil_tangkapan, detail_hasil_tangkapan, foto_fad, no_foto_fad, 
								       jum_keranjang_tangkapan, berat_keranjang_kosong, fad2, o.tanggal
								       from observerform_trip t, observerform_tangkapan o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
		
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("3-tangkapan");


		//observerform_tangkapan_hasil_rev1
		$objWorkSheet = $this->excel->createSheet(8); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'seq_tangkapan') ;
		$objWorkSheet->setCellValue('C1', 'nomor') ;
		$objWorkSheet->setCellValue('D1', 'kode_species') ; 
		$objWorkSheet->setCellValue('E1', 'total_enumerasi_jum') ; 
       	$objWorkSheet->setCellValue('F1', 'total_enumerasi_berat') ;
       	$objWorkSheet->setCellValue('G1', 'keranj1_jum') ;
       	$objWorkSheet->setCellValue('H1', 'keranj1_ber') ;
       	$objWorkSheet->setCellValue('I1', 'keranj2_jum') ;
       	$objWorkSheet->setCellValue('J1', 'keranj2_ber') ;
       	$objWorkSheet->setCellValue('K1', 'keranj3_jum') ;
        $objWorkSheet->setCellValue('L1', 'keranj3_ber') ;
        $objWorkSheet->setCellValue('M1', 'keranj4_jum') ;
        $objWorkSheet->setCellValue('N1', 'keranj4_ber') ;
       	$objWorkSheet->setCellValue('O1', 'keranj5_jum') ;
       	$objWorkSheet->setCellValue('P1', 'keranj5_ber') ;
       	$objWorkSheet->setCellValue('Q1', 'Keranj6_jum') ;
       	$objWorkSheet->setCellValue('R1', 'keranj6_ber') ;
		
		$result = $this->db->query("Select o.id_trip ,  seq_tangkapan, nomor, kode_species, total_enumerasi_jum, 
								       total_enumerasi_berat, keranj1_jum, keranj1_ber, keranj2_jum, 
								       keranj2_ber, keranj3_jum, keranj3_ber, keranj4_jum, keranj4_ber, 
								       keranj5_jum, keranj5_ber, keranj6_jum, keranj6_ber  from observerform_trip t, observerform_tangkapan_hasil_rev1 o   where status_trip = '1' and t.id_trip = o.id_trip  and t.tipe_data = 'PL'  ")->result_array();
										
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("3a-tangkapan-hasil");


		//observerform_tangkapan_detail
		$objWorkSheet = $this->excel->createSheet(9); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'seq_tangkapan') ;
		$objWorkSheet->setCellValue('C1', 'nomor') ;
		$objWorkSheet->setCellValue('D1', 'kode_species') ; 
		$objWorkSheet->setCellValue('E1', 'panjang') ; 
       	$objWorkSheet->setCellValue('F1', 'berat') ;
		
		$result = $this->db->query("Select o.id_trip ,  seq_tangkapan, nomor, kode_species, panjang, berat  from observerform_trip t, observerform_tangkapan_detail o  where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
										
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("3b-tangkapan-detail");



		//observerform_umpan

		$objWorkSheet = $this->excel->createSheet(10); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'seq') ; 
		$objWorkSheet->setCellValue('C1', 'no_angkut') ;
		$objWorkSheet->setCellValue('D1', 'hari') ;
		$objWorkSheet->setCellValue('E1', 'bulan') ;
		$objWorkSheet->setCellValue('F1', 'tahun') ;
		$objWorkSheet->setCellValue('G1', 'jam_mulai') ; 
		$objWorkSheet->setCellValue('H1', 'menit_mulai') ;
       	$objWorkSheet->setCellValue('I1', 'jam_selesai') ;
        $objWorkSheet->setCellValue('J1', 'menit_selesai') ;
        $objWorkSheet->setCellValue('K1', 'rasio_ember_umpan_kapal') ; 
        $objWorkSheet->setCellValue('L1', 'rasio_ember_umpan_sampel') ;
       	$objWorkSheet->setCellValue('M1', 'berat_ember_sample_umpan_kosong') ;
        $objWorkSheet->setCellValue('N1', 'berat_tupper_umpan_kosong') ;
        $objWorkSheet->setCellValue('O1', 'asal_umpan') ;
       	$objWorkSheet->setCellValue('P1', 'sample_ember_no, lintang') ; 
       	$objWorkSheet->setCellValue('Q1', 'bujur') ;
       	$objWorkSheet->setCellValue('R1', 'harga_umpan') ; 
       	$objWorkSheet->setCellValue('S1', 'jumlah_ember_diangkut') ; 
       	$objWorkSheet->setCellValue('T1', 'berat_sample_ember_umpan') ; 
       	$objWorkSheet->setCellValue('U1', 'berat_sample_tupper_umpan') ;
        $objWorkSheet->setCellValue('V1', 'detail_umpan') ;
      	$objWorkSheet->setCellValue('W1', 'total_umpan_dibawa') ; 
       	$objWorkSheet->setCellValue('X1', 'berat_sample_minus_tupper') ; 
       	$objWorkSheet->setCellValue('Y1', 'tanggal') ;
        $objWorkSheet->setCellValue('Z1', 'hari2') ;
       	$objWorkSheet->setCellValue('AA1', 'bulan2') ;
        $objWorkSheet->setCellValue('AB1', 'tahun2') ;
        $objWorkSheet->setCellValue('AC1', 'tanggal2') ;
		
		$result = $this->db->query("Select o.id_trip ,  seq, no_angkut, hari, bulan, tahun, jam_mulai, menit_mulai, 
							       jam_selesai, menit_selesai, rasio_ember_umpan_kapal, rasio_ember_umpan_sampel, 
							       berat_ember_sample_umpan_kosong, berat_tupper_umpan_kosong, asal_umpan, 
							       sample_ember_no, lintang, bujur, harga_umpan, jumlah_ember_diangkut, 
							       berat_sample_ember_umpan, berat_sample_tupper_umpan, detail_umpan, 
							       total_umpan_dibawa, berat_sample_minus_tupper, o.tanggal, hari2, 
							       bulan2, tahun2, tanggal2  from observerform_trip t, observerform_umpan o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
																	
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("4-umpan");



		//observerform_umpan_detail

		$objWorkSheet = $this->excel->createSheet(11); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'seq_umpan') ; 
		$objWorkSheet->setCellValue('C1', 'nomor') ;
		$objWorkSheet->setCellValue('D1', 'kode_species') ;
		$objWorkSheet->setCellValue('E1', 'jumlah') ;
		$objWorkSheet->setCellValue('F1', 'berat') ;
		$objWorkSheet->setCellValue('G1', 'berat_formula') ; 
		
		$result = $this->db->query("Select o.id_trip , seq_umpan, nomor, kode_species, jumlah, berat, berat_formula  from observerform_trip t, observerform_umpan_detail o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
																	
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("4a-umpan-detail");

		

		//observerform_umpan_non_used

		$objWorkSheet = $this->excel->createSheet(12); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'seq') ; 
		$objWorkSheet->setCellValue('C1', 'tanggal') ;
		$objWorkSheet->setCellValue('D1', 'waktu') ;
		$objWorkSheet->setCellValue('E1', 'berat_umpan_non_used') ;
		$objWorkSheet->setCellValue('F1', 'kode_aktivitas') ;
		$objWorkSheet->setCellValue('G1', 'keterangan') ; 
		$objWorkSheet->setCellValue('H1', 'kode_aktivitas1') ; 
		$objWorkSheet->setCellValue('I1', 'kode_aktivitas2') ; 
		$objWorkSheet->setCellValue('J1', 'kode_aktivitas3') ; 
       	$objWorkSheet->setCellValue('K1', 'kode_aktivitas4') ; 
		
		$result = $this->db->query("Select o.id_trip , seq, o.tanggal, waktu, berat_umpan_non_used, kode_aktivitas, 
				       keterangan, kode_aktivitas1, kode_aktivitas2, kode_aktivitas3, 
				       kode_aktivitas4  from observerform_trip t, observerform_umpan_non_used o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
																	
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("5-umpan-tak-terpakai");


		//observerform_etp

		$objWorkSheet = $this->excel->createSheet(13); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'seq') ;
		$objWorkSheet->setCellValue('C1', 'id_pemantau') ; 
		$objWorkSheet->setCellValue('D1', 'aktivitas_memancing') ; 
		$objWorkSheet->setCellValue('E1', 'tanggal') ;
		$objWorkSheet->setCellValue('F1', 'waktu') ;
		$objWorkSheet->setCellValue('G1', 'lintang') ;
		$objWorkSheet->setCellValue('H1', 'ket_lintang') ; 
		$objWorkSheet->setCellValue('I1', 'bujur') ;
		$objWorkSheet->setCellValue('J1', 'ket_bujur') ;
		$objWorkSheet->setCellValue('K1', 'jenis_pancing') ; 
		$objWorkSheet->setCellValue('L1', 'kode_posisi_pancing') ; 
		$objWorkSheet->setCellValue('M1', 'kode_kondisi_tertangkap') ; 
		$objWorkSheet->setCellValue('N1', 'kode_kondisi_tertangkap_deskripsi') ; 
		$objWorkSheet->setCellValue('O1', 'kode_kondisi_dilepas') ;
		$objWorkSheet->setCellValue('P1', 'kode_kondisi_dilepas_deskripsi') ; 
		$objWorkSheet->setCellValue('Q1', 'tanda') ;
		
		$result = $this->db->query("Select o.id_trip , seq, o.id_pemantau, aktivitas_memancing, o.tanggal, waktu, 
							       lintang, ket_lintang, bujur, ket_bujur, jenis_pancing, kode_posisi_pancing, 
							       kode_kondisi_tertangkap, kode_kondisi_tertangkap_deskripsi, kode_kondisi_dilepas, 
							       kode_kondisi_dilepas_deskripsi, tanda  from observerform_trip t, observerform_etp o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
																								
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("6-etp");


		//observerform_etp_detail
		$objWorkSheet = $this->excel->createSheet(14); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'seq_etp') ;
		$objWorkSheet->setCellValue('C1', 'nomor') ; 
		$objWorkSheet->setCellValue('D1', 'data_penyu') ; 
		$objWorkSheet->setCellValue('E1', 'data_lain') ;
		$objWorkSheet->setCellValue('F1', 'keterangan') ;
		
		$result = $this->db->query("Select o.id_trip , seq_etp, nomor, data_penyu, data_lain, keterangan from observerform_trip t, observerform_etp_detail o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
																								
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("6-etp_detail");

		
		//observerform_pemindahan
		$objWorkSheet = $this->excel->createSheet(15); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'seq') ; 
		$objWorkSheet->setCellValue('C1', 'nama_kapal') ;  
		$objWorkSheet->setCellValue('D1', 'nama_nahkoda') ; 
		$objWorkSheet->setCellValue('E1', 'bendera, sipi') ; 
		$objWorkSheet->setCellValue('F1', 'tanda_selar') ; 
      	$objWorkSheet->setCellValue('G1', 'rfmo') ; 
        $objWorkSheet->setCellValue('H1', 'no_rfmo') ; 
        $objWorkSheet->setCellValue('I1', 'foto_lambung_kapal') ;  
        $objWorkSheet->setCellValue('J1', 'no_foto') ; 
        $objWorkSheet->setCellValue('K1', 'tanggal') ; 
        $objWorkSheet->setCellValue('L1', 'waktu');
        $objWorkSheet->setCellValue('M1', 'lintang') ;  
        $objWorkSheet->setCellValue('N1', 'bujur') ; 
        $objWorkSheet->setCellValue('O1', 'detail_pindah') ; 
        $objWorkSheet->setCellValue('P1', 'total') ; 
        $objWorkSheet->setCellValue('Q1', 'nama_kapal2') ;  
        $objWorkSheet->setCellValue('R1', 'nama_nahkoda2') ; 
        $objWorkSheet->setCellValue('S1', 'bendera2') ; 
        $objWorkSheet->setCellValue('T1', 'sipi2') ; 
        $objWorkSheet->setCellValue('U1', 'tanda_selar2') ;  
        $objWorkSheet->setCellValue('V1', 'rfmo2') ; 
        $objWorkSheet->setCellValue('W1', 'no_rfmo2') ; 
        $objWorkSheet->setCellValue('X1', 'foto_lambung_kapal2') ;  
        $objWorkSheet->setCellValue('Y1', 'no_foto2') ; 
		
		$result = $this->db->query("Select o.id_trip , seq, o.nama_kapal, o.nama_nahkoda, o.bendera, o.sipi, o.tanda_selar, 
									       o.rfmo, o.no_rfmo, o.foto_lambung_kapal, o.no_foto, o.tanggal, o.waktu, o.lintang, 
									       o.bujur, o.detail_pindah, o.total, nama_kapal2, nama_nahkoda2, bendera2, 
									       sipi2, tanda_selar2, rfmo2, no_rfmo2, foto_lambung_kapal2, no_foto2
										from observerform_trip t, observerform_pemindahan o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
																								
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("7-pemindahan");


		//observerform_pemindahan_detail
		$objWorkSheet = $this->excel->createSheet(16); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'seq_pindah') ; 
		$objWorkSheet->setCellValue('C1', 'nomor') ;  
		$objWorkSheet->setCellValue('D1', 'kode_species') ; 
		$objWorkSheet->setCellValue('E1', 'tipe_produk') ; 
		$objWorkSheet->setCellValue('F1', 'berat') ; 
		
		$result = $this->db->query("Select o.id_trip , seq_pindah, nomor, kode_species, tipe_produk, berat
										from observerform_trip t, observerform_pemindahan_detail o   where status_trip = '1' and t.id_trip = o.id_trip and t.tipe_data = 'PL'  ")->result_array();
																								
		$objWorkSheet->fromArray($result, null, 'A2');
		
		$objWorkSheet->setTitle("7-pemindahan-detil");

		
		//observerform_kalkulasi_3
		$objWorkSheet = $this->excel->createSheet(17); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		$objWorkSheet->setCellValue('B1', 'sequence_id') ;  
		$objWorkSheet->setCellValue('C1', 'species') ; 
		$objWorkSheet->setCellValue('D1', 'berat') ; 
		$objWorkSheet->setCellValue('E1', 'jumlah') ; 
		
		$result = $this->db->query("Select o.id_trip , form, result 
										from observerform_trip t, kalkulasi o   where status_trip = '1' and t.id_trip = o.id_trip and o.form = 'form3' and t.tipe_data = 'PL'   order by id_trip")->result_array();

		$i = 2; 																								
		
		foreach($result as $res){

			$hasil = $res['result'];

			$hasil2 =  json_decode($hasil , true); 

			 if(count($hasil2) > 0 ){


			 	foreach($hasil2 as $key=>$value){

                		foreach($value as $key1=>$value1){


                				$objWorkSheet->setCellValue('A'.$i, $res['id_trip']) ; 
								$objWorkSheet->setCellValue('B'.$i, $key) ;  
								$objWorkSheet->setCellValue('C'.$i, $key1) ; 
								$objWorkSheet->setCellValue('D'.$i, $value1['rata2_berat']) ; 
								$objWorkSheet->setCellValue('E'.$i, number_format(round($value1['rata2_jumlah']))) ; 
		
								$i++;

                		}

            		}

			}

		}
		
		$objWorkSheet->setTitle("kalkulasi_form3");

		

		//observerform_kalkulasi_4
		
		$objWorkSheet = $this->excel->createSheet(18); 

		$objWorkSheet->setCellValue('A1', 'Trip ID') ; 
		
		$objWorkSheet->setCellValue('B1', 'sequence_id') ;  
		
		$objWorkSheet->setCellValue('C1', 'species') ; 
		
		$objWorkSheet->setCellValue('D1', 'berat') ; 
		
		$objWorkSheet->setCellValue('E1', 'jumlah') ; 
		
		$result = $this->db->query("Select o.id_trip , form, result 
			
										from observerform_trip t, kalkulasi o   where status_trip = '1' and t.id_trip = o.id_trip and o.form = 'form4' and t.tipe_data = 'PL'  order by id_trip")->result_array();
																								
		$sheet = 2; 

		
		foreach($result as $res){

			$hasil = $res['result'];

			$hasil2 =  json_decode($hasil , true); 

				$i = 0;

			foreach($hasil2 as $key=>$value){
    		
    		foreach($value as $key=>$value2){
         

            if( $key>0 ){

             if( isset($hasil2[$i][$key]) ){

            	if( count($hasil2[$i][$key]) > 0 ){
              
                foreach($hasil2[$i][$key] as $keys => $value3){


                				$objWorkSheet->setCellValue('A'.$sheet, $res['id_trip']) ; 
								$objWorkSheet->setCellValue('B'.$sheet, $key) ;  
								$objWorkSheet->setCellValue('C'.$sheet, $keys) ; 
								$objWorkSheet->setCellValue('D'.$sheet, number_format( $value3['HASIL_AKHIR_by_weight'] , 2 )) ; 
								$objWorkSheet->setCellValue('E'.$sheet, number_format($value3['HASIL_AKHIR_by_jumlah'])) ; 
		
								$sheet++;

				                		}

				                	}

				                }
				               
				                
				                $i++;
				                
				            }



				    }

				}

		}
		
		$objWorkSheet->setTitle("kalkulasi_form4");
		

		$filename='Data_Extract.xls'; //save our workbook as this file name
		 
				header('Content-Type: application/vnd.ms-excel'); //mime type
		 
				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		 
				header('Cache-Control: max-age=0'); //no cache
							
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 
				//force user to download the Excel file without writing it to server's HD
		ob_end_clean();
		
		$objWriter->save('php://output');


	}


	public function form4_get(){


		$result = $this->db->query("Select o.id_trip , form, result 
			
										from observerform_trip t, kalkulasi o   where status_trip = '1' and t.id_trip = o.id_trip and o.form = 'form4' order by id_trip")->result_array();
																								
		foreach($result as $res){

			$hasil = $res['result'];

			$hasil2 =  json_decode($hasil , true); 

			//var_dump($hasil2);

				$i = 0;

			foreach($hasil2 as $key=>$value){
    		
    		foreach($value as $key=>$value2){
         
    		echo $key; 

    		echo '<br>'; 

            if( $key>0 ){

             if( isset($hasil2[$i][$key]) ){

            	if( count($hasil2[$i][$key]) > 0 ){
              
                foreach($hasil2[$i][$key] as $keys => $value3){

                				echo $i."TheLoop ";
                				echo $res['id_trip'] ; 
								echo $key ;  
								echo $keys ; 
								echo  number_format( $value3['HASIL_AKHIR_by_weight'] , 2 ) ; 
								echo  number_format($value3['HASIL_AKHIR_by_jumlah']) ; 
		
								echo '<br>';

				                		}

				                	}

				                }
				               
				                
				                $i++;
				                
				            }



				    }

				}

			}
	}


	public function getNamaKapalFromId($id){

		$data = $this->Model_master->general_select("master_vessel", array('id_vessel' => $id), "nama_kapal", "")->row_array();; 

	
		return $data['nama_kapal']; 

	}

	public function getNamaPerusahaanFromId($id){

		$data = $this->Model_master->general_select("master_supplier", array('id_supplier' => $id), "nama_perusahaan", "")->row_array();; 

	
		return $data['nama_perusahaan']; 

	}




	/* FORM 2 */


	public function form2($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Daily Notes' ; 

		$data['page_name_detail'] = 'Form 2 Daily Notes' ; 

		$data['record'] = $this->Model_master->general_select("observerform_catatan_harian", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip/form2/list', $data);

	}


	public function form2_add($kode_trip){

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Daily Notes' ; 

		$data['page_name_detail'] = 'Add Form 2 Daily Notes' ; 

		$data['kode']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_aktivitas'), "", "kode_aktivitas");

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();



		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			//$this->form_validation->set_rules('tanggal', 'tanggal required', 'required');

			//$this->form_validation->set_rules('jam', 'jam required', 'required');

			//$this->form_validation->set_rules('menit', 'jam required', 'required');


			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->form2_add($this->input->post());

				redirect('trip/form2/'.$kode_trip);


	          }else{

	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip/form2/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/form2/add', $data);

	

		}

	}


	public function form2_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Daily Notes' ; 

		$data['page_name_detail'] = 'Update Form 2 Daily Notes' ; 

		$data['kode']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_aktivitas'), "", "kode_aktivitas");

		$data['post'] = $this->Model_master->general_select("observerform_catatan_harian", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();; 

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		
		$lintang = explode("," , $data['post']['lintang']);

            $data['post']['lintang_degree'] = $lintang[0];

            $data['post']['lintang_minutes'] = $lintang[1];

            $data['post']['lintang_us'] = $lintang[2];


		$bujur = explode("," , $data['post']['bujur']);

            $data['post']['bujur_degree'] = $bujur[0];

            $data['post']['bujur_minutes'] = $bujur[1];

            $data['post']['bujur_us'] = $bujur[2];

         $waktu = explode(":" , $data['post']['waktu']);

         	$data['post']['jam'] = $waktu[0];

         	$data['post']['menit'] = $waktu[1];


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->form2_update($this->input->post());

				redirect('trip/form2/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip/form2/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip/form2/update', $data);
	

		}


	}


	public function form2_delete($kode_trip , $id){


		$this->Model_trip->form2_delete($kode_trip , $id);

		redirect('trip/form2/'.$kode_trip);

	}




	/* form 2*/


	/* form 3*/

	public function form3($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Hasil Tangkapan' ; 

		$data['page_name_detail'] = 'Form 3 Data Hasil Tangkapan' ; 

		$data['record'] = $this->Model_master->general_select("observerform_tangkapan", array('id_trip' => $kode_trip), "", "");

		$data['data_kalkulasi'] = $this->Model_master->general_select("kalkulasi", array('id_trip' => $kode_trip , 'form' => 'form3'), "", "")->row_array();

		$this->template->load('administrator/template','administrator/trip/form3/list', $data);

	}

	public function is_digits($val) {

	 return is_numeric( $val ) && floor( $val ) != $val;
	
	}


	public function form3_add($kode_trip){


		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Hasil Tangkapan' ; 

		$data['page_name_detail'] = 'Add Form 3 Data Hasil Tangkapan' ; 

		
		$data['kode_ikan_terlihat']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_ikan_terlihat'), "", "kode_aktivitas");
		
		$data['kode_terasosiasi']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_terasosiasi'), "", "kode_aktivitas");

		$data['trip'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip ) , "", "")->row_array();

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();



		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('tanggal', 'hari required', 'required');

			$this->form_validation->set_rules('set_nomor', 'set_nomor required', 'required');


			$checkDecimal =  false;

			 if( strpos( $_POST['berat_keranjang_kosong'] , "." ) !== false ) {

			       $checkDecimal =  true;


			    }

		
			if( $this->form_validation->run() == TRUE  && /*$this->is_digits($_POST['berat_keranjang_kosong'])*/ $checkDecimal ) {

	          	$getSeq = $this->Model_trip->form3_add($this->input->post());

				redirect('trip/form3_update/'.$kode_trip.'/'.$getSeq);


	          }else{

	          	$data['post'] = $_POST;

	          	$data['berat_keranjang_kosong_dec'] = 'Berat Keranjang kosong harus desimal'; 
	    
	          	$this->template->load('administrator/template','administrator/trip/form3/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/form3/add', $data);

	

		}

	}


	public function form3_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Data Hasil Tangkapan' ; 

		$data['page_name_detail'] = 'Update Data Hasil Tangkapan' ; 

		$data['post'] = $this->Model_master->general_select("observerform_tangkapan", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		$lintang = explode("," , $data['post']['lintang']);

			$data['post']['lintang_degree'] = '';

	        $data['post']['lintang_minutes'] = '';

	        $data['post']['lintang_us'] = '';

		if (!empty($lintang)) {

			if (!empty($lintang[1]) && !(empty($lintang[2])) &&(!empty($lintang[0])) ) {

	            $data['post']['lintang_degree'] = $lintang[0];

	            $data['post']['lintang_minutes'] = $lintang[1];

	            $data['post']['lintang_us'] = $lintang[2];

        	}
        }

        
		$bujur = explode("," , $data['post']['bujur']);

			$data['post']['bujur_degree'] = '';

            $data['post']['bujur_minutes'] = '';

            $data['post']['bujur_us'] = '';

		if (!empty($bujur)) {

			if (!empty($bujur[1]) && !(empty($bujur[2])) &&(!empty($bujur[0])) ) {

            $data['post']['bujur_degree'] = $bujur[0];

            $data['post']['bujur_minutes'] = $bujur[1];

            $data['post']['bujur_us'] = $bujur[2];

        	}
        }


        $fad2 = $data['post']['fad2']; 
        	$data['post']['fad2'] = explode("," , $fad2); 


        $data['post']['waktu_mulai'] = $data['post']['jam_mulai'].":".$data['post']['menit_mulai'] ; 

        $data['post']['waktu_selesai'] = $data['post']['jam_selesai'].":".$data['post']['menit_selesai'] ; 



		$data['kode_ikan_terlihat']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_ikan_terlihat'), "", "kode_aktivitas");
		
		$data['kode_terasosiasi']  = $this->Model_master->general_select_kode_aktivitas("master_dictionary", array('jenis_aktivitas' => 'kode_terasosiasi'), "", "kode_aktivitas");

		$data['kode_ikan']  = $this->Model_master->general_select("master_species", array('jenis_species' => 'Ikan'), "", "fao");


		$data['table1'] = 'TOTAL HASIL SAMPLING TANGKAPAN'; 

		$data['table2'] = 'DETAIL TANGKAPAN'; 



		$data['button_add']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable1" id="AddDataTable1Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table']=base_url()."trip/view_observerform_tangkapan_hasil/".$kode_trip."/".$id;

		$data['url_show_table']=base_url()."trip/view_update_observerform_tangkapan_hasil/";

		$data['url_add_table1']=base_url()."trip/add_observerform_tangkapan_hasil";

		$data['url_update_table1']=base_url()."trip/update_observerform_tangkapan_hasil";

		$data['url_delete_table1']=base_url()."trip/delete_observerform_tangkapan_hasil";



		$data['button_add_2']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable2" id="AddDataTable2Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table2']=base_url()."trip/view_observerform_tangkapan_detail/".$kode_trip."/".$id;

		$data['url_show_table2']=base_url()."trip/view_update_observerform_tangkapan_detail/";

		$data['url_add_table2']=base_url()."trip/add_observerform_tangkapan_detail";

		$data['url_update_table2']=base_url()."trip/update_observerform_tangkapan_detail";

		$data['url_delete_table2']=base_url()."trip/delete_observerform_tangkapan_detail";


		if ( isset($_POST['submit']) ){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('tanggal', 'hari required', 'required');

			$this->form_validation->set_rules('set_nomor', 'set_nomor required', 'required');

			$checkDecimal =  false;

			 if( strpos( $_POST['berat_keranjang_kosong'] , "." ) !== false ) {

			       $checkDecimal =  true;


			    }

			if( $this->form_validation->run() == TRUE  && /*$this->is_digits($_POST['berat_keranjang_kosong'])*/ $checkDecimal  ) {

	          	$this->Model_trip->form3_update($this->input->post());

				redirect('trip/form3/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;

	          	$data['berat_keranjang_kosong_dec'] = 'Berat Keranjang kosong harus desimal';
	    
	          	$this->template->load('administrator/template','administrator/trip/form3/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip/form3/update', $data);
	

		}


	}


	public function form3_delete($kode_trip , $id){


		$this->Model_trip->form3_delete($kode_trip , $id);

		redirect('trip/form3/'.$kode_trip);


	}


	public function form3_kalkulasi_backup($kode_trip){

		//get jumlah set 
		$jumlah_set = $this->Model_master->get_count("observerform_tangkapan", "id_trip" ,  array( 'id_trip' => $kode_trip ) )->row_array();

		$total_set = $jumlah_set['total'];

		$data = array();

		$rata2_berat_species = array();

	//Get species list 
		$species_lists = $this->Model_trip->kalkulasi3_get_distinct_species($kode_trip) ; 

		$species_list = array();

		foreach($species_lists->result() as $row){

				$species_list[$row->kode_species] =  $row->kode_species ; 

		}


		foreach($species_list as $list){

			$species_list[$list] = array();

			$data['berat_keranjang']  = $this->Model_master->general_select("observerform_tangkapan_hasil_rev1", array('id_trip' => $kode_trip , 'kode_species' => $list), "", "seq_tangkapan") ;
				$count_seq = 0 ;
				foreach($data['berat_keranjang']->result() as $row){
					
				
					$species_list[$list][$row->seq_tangkapan][] =  array( 'jumlah' => array( 'seq' => $row->seq_tangkapan , 
												'keranj1_jum' => $row->keranj1_jum , 
												'keranj2_jum' => $row->keranj2_jum , 
												'keranj3_jum' => $row->keranj3_jum , 
												'keranj4_jum' => $row->keranj4_jum , 
												'keranj5_jum' => $row->keranj5_jum , 
												'keranj6_jum' => $row->keranj6_jum , 

											) );


					$species_list[$list][$row->seq_tangkapan][] =  array( 'berat' => array( 'seq' => $row->seq_tangkapan , 
												'keranj1_ber' => $row->keranj1_ber , 
												'keranj2_ber' => $row->keranj2_ber , 
												'keranj3_ber' => $row->keranj3_ber , 
												'keranj4_ber' => $row->keranj4_ber , 
												'keranj5_ber' => $row->keranj5_ber , 
												'keranj6_ber' => $row->keranj6_ber , 

											) );


					$species_list[$list][$row->seq_tangkapan][] =  array( 'enumerasi' => array( 'seq' => $row->seq_tangkapan , 
												'enumerasi_jum' => $row->total_enumerasi_jum , 
												'enumerasi_ber' => $row->total_enumerasi_berat , 

											) );





					
				}


			}


	

			//rata2_berat_species 
			foreach($species_list as $key=>$value){

				$total_keranj_jum[$key] = 0 ; 
				$total_keranj_ber[$key] = 0;
				$total_enumerasi_jum[$key] = 0 ; 
				$total_enumerasi_ber[$key] = 0; 
				$rata2_berat[$key] = 0; 
				$jumlah_sampling_total_keranjang_arr[$key] = 0 ;
				$jumlah_sampling_total_keranjang = 0; 


				foreach( $species_list[$key] as $nilai ){


							//keranjang_jum
							$nilai[0]["jumlah"]["keranj1_jum"]; 
								if( $nilai[0]["jumlah"]["keranj1_jum"] > 0 ){
									$jumlah_sampling_total_keranjang++; 
								}
							$nilai[0]["jumlah"]["keranj2_jum"];
							if($nilai[0]["jumlah"]["keranj2_jum"] > 0 ){
									$jumlah_sampling_total_keranjang++; 
								}
							$nilai[0]["jumlah"]["keranj3_jum"];
							if($nilai[0]["jumlah"]["keranj2_jum"] > 0 ){
									$jumlah_sampling_total_keranjang++; 
								}
							$nilai[0]["jumlah"]["keranj4_jum"];
							if($nilai[0]["jumlah"]["keranj1_jum"] > 0 ){
									$jumlah_sampling_total_keranjang++; 
								}
							$nilai[0]["jumlah"]["keranj5_jum"];
							if($nilai[0]["jumlah"]["keranj1_jum"] > 0 ){
									$jumlah_sampling_total_keranjang++; 
								}
							$nilai[0]["jumlah"]["keranj6_jum"];
							if($nilai[0]["jumlah"]["keranj1_jum"] > 0 ){
									$jumlah_sampling_total_keranjang++; 
								}

							
							//keranj1_ber
							$nilai[1]["berat"]["keranj1_ber"]; 
							$nilai[1]["berat"]["keranj2_ber"];
							$nilai[1]["berat"]["keranj3_ber"];
							$nilai[1]["berat"]["keranj4_ber"];
							$nilai[1]["berat"]["keranj5_ber"];
							$nilai[1]["berat"]["keranj6_ber"];


							//enumerasi
							$nilai[2]["enumerasi"]["enumerasi_jum"];
							if($nilai[2]["enumerasi"]["enumerasi_jum"] > 0 ){
									$jumlah_sampling_total_keranjang++; 
								}
							$nilai[2]["enumerasi"]["enumerasi_ber"];


							$total_keranj_jum[$key] = $total_keranj_jum[$key] +  (   $nilai[0]["jumlah"]["keranj1_jum"] + $nilai[0]["jumlah"]["keranj2_jum"] + $nilai[0]["jumlah"]["keranj3_jum"] + $nilai[0]["jumlah"]["keranj4_jum"] + $nilai[0]["jumlah"]["keranj5_jum"] + $nilai[0]["jumlah"]["keranj6_jum"] );
							$total_keranj_ber[$key] = $total_keranj_ber[$key] +  (   $nilai[1]["berat"]["keranj1_ber"] + $nilai[1]["berat"]["keranj2_ber"] + $nilai[1]["berat"]["keranj3_ber"] + $nilai[1]["berat"]["keranj4_ber"] + $nilai[1]["berat"]["keranj5_ber"] + $nilai[1]["berat"]["keranj6_ber"] );
							$total_enumerasi_jum[$key] = $total_enumerasi_jum[$key] + $nilai[2]["enumerasi"]["enumerasi_jum"]  ; 
							$total_enumerasi_ber[$key] = $total_enumerasi_ber[$key] + $nilai[2]["enumerasi"]["enumerasi_ber"];
							$jumlah_sampling_total_keranjang_arr[$key] = $jumlah_sampling_total_keranjang_arr[$key] +  $jumlah_sampling_total_keranjang ; 
							
					
				} 


				$rata2_berat[$key] = ( $total_keranj_ber[$key] + $total_enumerasi_ber[$key] ) / $jumlah_sampling_total_keranjang_arr[$key]; 
				$rata2_jumlah[$key] = $total_keranj_jum[$key] + $total_enumerasi_jum[$key] / $jumlah_sampling_total_keranjang_arr[$key]; 
	


			}


			$result = array(); 

			$result[]['rata2_berat'] = $rata2_berat ; 

			$result[]['rata2_jumlah'] = $rata2_jumlah ;  


			$saved = $this->Model_trip->kalkulasi_insert( $kode_trip ,  'form3',   $result );

      
			echo '
				<script> 
					alert("Kalkulasi Form 3 Running"); 
					window.location.href = "'.base_url().'/trip/form3/'.$kode_trip.' ";
				</script>';

		//echo json_encode($species_list);

		//var_dump($result); 

		//redirect('trip/form3/'.$kode_trip);



	}


		public function form3_kalkulasi($kode_trip){

		$data = array();

		$result = array(); 

		//loop semua keranjang per set 
		//masukkan per set 
			//masukkan per species hasil rata2 berat dan panjangnya setelah dikurangi berat keranjang kosong 


		$data['observerform_tangkapan_hasil_rev1']  = $this->Model_master->general_select("observerform_tangkapan_hasil_rev1", array('id_trip' => $kode_trip ), "", "seq_tangkapan") ;
			

				foreach($data['observerform_tangkapan_hasil_rev1']->result() as $row){	

					$penyebut_jumlah = 0;

					$penyebut_berat = 0; 

					$keranj1_berat = 0 ; 

					$keranj2_berat = 0 ; 

					$keranj3_berat = 0 ; 

					$keranj4_berat = 0 ; 

					$keranj5_berat = 0 ; 

					$keranj6_berat = 0 ; 

					$data['observerform_tangkapan'] =  $this->Model_master->general_select("observerform_tangkapan", array('id_trip' => $kode_trip , 'seq' => $row->seq_tangkapan ), "", "seq")->row_array();
					

						if( $row->total_enumerasi_jum > 0 ){

							$result[$row->seq_tangkapan][$row->kode_species]['rata2_jumlah'] = $row->total_enumerasi_jum ; 


						}else{

							$penyebut_jumlah = 0; 

						
							if($row->keranj1_jum > 0 ){

								$penyebut_jumlah++;

							}

							if($row->keranj2_jum > 0 ){

								$penyebut_jumlah++;

							}

							if($row->keranj3_jum > 0 ){

								$penyebut_jumlah++;

							}

							if($row->keranj4_jum > 0 ){

								$penyebut_jumlah++;

							}

							if($row->keranj5_jum > 0 ){

								$penyebut_jumlah++;

							}

							if($row->keranj6_jum > 0 ){

								$penyebut_jumlah++;

							}


							$result[$row->seq_tangkapan][$row->kode_species]['rata2_jumlah'] 	 =  round( ( ( $row->keranj1_jum +  $row->keranj2_jum +  $row->keranj3_jum +  $row->keranj4_jum +  $row->keranj5_jum +  $row->keranj6_jum ) * $data['observerform_tangkapan']['jum_keranjang_tangkapan'] ) / $penyebut_jumlah , 2  ) ;

						}

						if( $row->total_enumerasi_berat > 0 ){

							$result[$row->seq_tangkapan][$row->kode_species]['rata2_berat'] = $row->total_enumerasi_berat ; 


						}else{


						
							if($row->keranj1_ber > 0 ){

								$keranj1_berat = $row->keranj1_ber - $data['observerform_tangkapan']['berat_keranjang_kosong']  ; 

								$penyebut_berat++;

							}

							if($row->keranj2_ber > 0 ){

								$keranj2_berat = $row->keranj2_ber - $data['observerform_tangkapan']['berat_keranjang_kosong']  ; 

								$penyebut_berat++;

							}

							if($row->keranj3_ber > 0 ){

								$keranj3_berat = $row->keranj3_ber - $data['observerform_tangkapan']['berat_keranjang_kosong']  ; 

								$penyebut_berat++;

							}

							if($row->keranj4_ber > 0 ){

								$keranj4_berat = $row->keranj4_ber - $data['observerform_tangkapan']['berat_keranjang_kosong']  ; 

								$penyebut_berat++;

							}

							if($row->keranj5_ber > 0 ){

								$keranj5_berat = $row->keranj5_ber - $data['observerform_tangkapan']['berat_keranjang_kosong']  ; 

								$penyebut_berat++;

							}

							if($row->keranj6_ber > 0 ){

								$keranj6_berat = $row->keranj6_ber - $data['observerform_tangkapan']['berat_keranjang_kosong']  ; 

								$penyebut_berat++;

							}

							$result[$row->seq_tangkapan][$row->kode_species]['rata2_berat'] 	 =  round( ( ( $keranj1_berat +  $keranj2_berat +  $keranj3_berat +  $keranj4_berat +  $keranj5_berat+  $keranj6_berat ) * $data['observerform_tangkapan']['jum_keranjang_tangkapan'] ) / $penyebut_berat , 2  ) ;

						}

					

				}

		$saved = $this->Model_trip->kalkulasi_insert( $kode_trip ,  'form3',   $result );
      
			echo '
				<script> 
					alert("Kalkulasi Form 3 Running"); 
					window.location.href = "'.base_url().'/trip/form3/'.$kode_trip.' ";
				</script>';

		//var_dump($result); 

		//echo json_encode($result);

		//redirect('trip/form3/'.$kode_trip);

	}


	public function view_observerform_tangkapan_hasil($kode_trip , $id){


		$query = $this->Model_master->general_select("observerform_tangkapan_hasil_rev1", array('id_trip' => $kode_trip , 'seq_tangkapan' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable1Modal" onclick="editData(\'' .$row->id_trip.'\' , '.$row->seq_tangkapan.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable1Modal" onclick="disableData(\'' .$row->id_trip.'\'  , '.$row->seq_tangkapan.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;


           		$total_enumerasi_jum =  $row->total_enumerasi_jum ; 
           		if($row->total_enumerasi_jum == 0 ){
           			$total_enumerasi_jum = "" ; 
           		}


           		$total_enumerasi_berat =  $row->total_enumerasi_berat;
           		if( $row->total_enumerasi_berat == "0" ){
           			$total_enumerasi_berat = "" ; 
           		}


                $keranj1_jum = $row->keranj1_jum ; 
                if($row->keranj1_jum == 0 || $row->keranj1_jum == "0"){
           			$keranj1_jum = "" ; 
           		}
	            $keranj1_ber = $row->keranj1_ber ;
                if($row->keranj1_ber == 0 ){
           			$keranj1_ber = "" ; 
           		}

                $keranj2_jum = $row->keranj2_jum ;
                if($row->keranj2_jum == 0 ){
           			$keranj2_jum = "" ; 
           		}
                $keranj2_ber = $row->keranj2_ber; 
                if($row->keranj2_ber == 0 ){
           			$keranj2_ber = "" ; 
           		}

                $keranj3_jum = $row->keranj3_jum;
                if($row->keranj3_jum == 0 ){
           			$keranj3_jum = "" ; 
           		}
           		$keranj3_ber = $row->keranj3_ber;
                if($row->keranj3_ber == 0 ){
           			$keranj3_ber = "" ; 
           		}

           		$keranj4_jum = $row->keranj4_jum;
                if($row->keranj4_jum == 0 ){
           			$keranj4_jum = "" ; 
           		}
           		$keranj4_ber = $row->keranj4_ber;
                if($row->keranj4_ber == 0 ){
           			$keranj4_ber = "" ; 
           		}

           		$keranj5_jum = $row->keranj5_jum;
                if($row->keranj5_jum == 0 ){
           			$keranj5_jum = "" ; 
           		}
           		$keranj5_ber = $row->keranj5_ber;
                if($row->keranj5_ber == 0 ){
           			$keranj5_ber = "" ; 
           		}

           		$keranj6_jum = $row->keranj6_jum;
                if($row->keranj6_jum == 0 ){
           			$keranj6_jum = "" ; 
           		}
           		$keranj6_ber = $row->keranj6_ber;
                if($row->keranj6_ber == 0 ){
           			$keranj6_ber = "" ; 
           		}



                $result['data'][]=array(

                        $row->nomor, 
                        $row->kode_species, 
                        $total_enumerasi_jum , 
                        $total_enumerasi_berat,
                        $keranj1_jum , 
                        $keranj1_ber , 
                        $keranj2_jum , 
                        $keranj2_ber ,
                        $keranj3_jum , 
                        $keranj3_ber ,
                        $keranj4_jum , 
                        $keranj4_ber ,
                        $keranj5_jum , 
                        $keranj5_ber ,
                        $keranj6_jum , 
                        $keranj6_ber ,     
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);

	}


	public function add_observerform_tangkapan_hasil(){


		   //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');
        $this->form_validation->set_rules('kode_species', 'kode_species', 'required');

        if ( $this->form_validation->run()  ) {

        	$post = $this->input->post() ; 

        	$kode_trip = $post['id_trip'] ; 

        	$seq = $post['seq'] ; 

        	$data['trip_info'] = $this->Model_master->general_select("observerform_tangkapan", array('id_trip' => $kode_trip , 'seq' => $seq), "", "")->row_array();

        	$jum_keranjang_tangkapan = $data['trip_info']['jum_keranjang_tangkapan']  ; 
        	
        	$jumlah_tangkapan = $this->Model_master->get_count("observerform_tangkapan_hasil_rev1", "id_trip" ,  array( 'id_trip' => $kode_trip , 'seq_tangkapan' => $seq ) )->row_array();

        	$counting = 0 ; 

        	if(isset($post['keranj1_jum'])){

	        	if($post['keranj1_jum'] > 0){

	        		$counting++; 

	        	}

        	}

        	if(isset($post['keranj2_jum'])){

	        	if($post['keranj2_jum'] > 0){

	        		$counting++; 

	        	}
        	}

        	if(isset($post['keranj3_jum'])){

	        	if($post['keranj3_jum'] > 0){

	        		$counting++; 

	        	}
        	}

        	if(isset($post['keranj4_jum'])){

	        	if($post['keranj4_jum'] > 0){

	        		$counting++; 

	        	}
        	}

        	if(isset($post['keranj5_jum'])){

	        	if($post['keranj5_jum'] > 0){

	        		$counting++; 

	        	}
        	}

        	if(isset($post['keranj6_jum'])){

	        	if($post['keranj6_jum'] > 0){

	        		$counting++; 

	        	}
        	}



        	if(  /*$jumlah_tangkapan['total']*/ $counting > $jum_keranjang_tangkapan  ){


        		$success = false;
				$messages =  "Lebih dari keranjang tangkapan! ";



        	}else{

        		

					$check_species = $this->Model_trip->check_species_exsist("observerform_tangkapan_hasil_rev1", "add" ,  $this->input->post());
            
					            if($check_species){
					            //Insert to Database 
							             $saved = $this->Model_trip->add_observerform_tangkapan_hasil($this->input->post());

							            if ($saved)
							            {
							                 $success = true;
							                 $messages =  "Successfully adding Data! ";
							            }
							            else
							            {
							                 $success = false;
							                 $messages =  "Insert not working ! ";
							            }

					        	}else{

					        		$success = false;
							        $messages =  "Species sudah pernah dimasukkan! ";

					        	}
        	}



        	

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan data species terisi';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function view_update_observerform_tangkapan_hasil(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("observerform_tangkapan_hasil_rev1", array('id_trip' => $id_trip , 'seq_tangkapan' => $seq , 'nomor' => $nomor ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}

	
	public function update_observerform_tangkapan_hasil(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip ', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq ', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');
        $this->form_validation->set_rules('edit_kode_species', 'edit_kode_species ', 'required');


    

        
        if ( $this->form_validation->run()  ) {


        	$check_species = $this->Model_trip->check_species_exsist("observerform_tangkapan_hasil_rev1", "update" ,  $this->input->post());
            
            if($check_species){
            
		            //Insert to Database 
		             $saved = $this->Model_trip->update_observerform_tangkapan_hasil($this->input->post());

		            if ($saved)
		            {
		                 $success = true;
		                 $messages =  "Successfully adding Data! ";
		            }
		            else
		            {
		                 $success = false;
		                 $messages =  "Update not working ! ";
		            }
        	}else{

        		 $success = false;
            	 $messages =  "Species sudah pernah dimasukkan! ";

        	}

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan data species terisi';

            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}


	public function delete_observerform_tangkapan_hasil(){


        $saved = $this->Model_trip->delete_observerform_tangkapan_hasil($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}



	public function trip_disable($id_trip){

			

			$this->Model_trip->trip_disable($id_trip);


			redirect('trip/list_trip/');



	}




	public function approve($id_trip){

			$id_user = $this->session->userdata('id_user'); 

			$this->Model_trip->trip_approve($id_trip,$id_user,'1');


			redirect('trip/list_trip/');



	}


	public function cancel_approve($id_trip){

		$id_user = $this->session->userdata('id_user'); 

		$this->Model_trip->trip_approve($id_trip,$id_user,'2');


		redirect('trip/list_trip/');


	}













	public function view_observerform_tangkapan_detail($kode_trip , $id){


		$query = $this->Model_master->general_select("observerform_tangkapan_detail", array('id_trip' => $kode_trip , 'seq_tangkapan' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable2Modal" onclick="editData2(\'' .$row->id_trip.'\' , '.$row->seq_tangkapan.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable2Modal" onclick="disableData2(\'' .$row->id_trip.'\'  , '.$row->seq_tangkapan.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;
           
           		if($row->berat == '0'){

           			$row->berat = ""; 

           		}

                $result['data'][]=array(

                        $row->nomor, 
                        $row->kode_species, 
                        $row->panjang , 
                        $row->berat , 
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);

	}


	public function add_observerform_tangkapan_detail(){


		   //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');
		$this->form_validation->set_rules('kode_species', 'kode_species', 'required');

        
        if ( $this->form_validation->run()  ) {


        	$check_species = $this->Model_trip->check_species_exsist("observerform_tangkapan_hasil_rev1", "add" ,  $this->input->post());
            
	            if($check_species){

	            	$success = false;
	             	$messages =  "Species tidak ada dalam TOTAL HASIL SAMPLING TANGKAPAN ! ";
	            
	            
        	}else{

        		$saved = $this->Model_trip->add_observerform_tangkapan_detail($this->input->post());

	            if ($saved)
	            {
	                 $success = true;
	                 $messages =  "Successfully adding Data! ";
	            }
	            else
	            {
	                 $success = false;
	                 $messages =  "Insert not working ! ";
	            }

        		
        	}

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Kode Species harus diisi!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function view_update_observerform_tangkapan_detail(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("observerform_tangkapan_detail", array('id_trip' => $id_trip , 'seq_tangkapan' => $seq , 'nomor' => $nomor ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}

	
	public function update_observerform_tangkapan_detail(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip ', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq ', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');
        $this->form_validation->set_rules('edit_kode_species2', 'edit_kode_species2 ', 'required');


    

        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 
             $saved = $this->Model_trip->update_observerform_tangkapan_detail($this->input->post());

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully adding Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "Update not working ! ";
            }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}


	public function delete_observerform_tangkapan_detail(){


        $saved = $this->Model_trip->delete_observerform_tangkapan_detail($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}


	/* form 3*/



	/* form 4 */

	public function form4($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Sampling Umpan' ; 

		$data['page_name_detail'] = 'Form 4 Data Sampling Umpan' ; 

		$data['data_kalkulasi'] = $this->Model_master->general_select("kalkulasi", array('id_trip' => $kode_trip , 'form' => 'form4'), "", "")->row_array();

		$data['record'] = $this->Model_master->general_select("observerform_umpan", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip/form4/list', $data);

	}


	public function form4_add($kode_trip){


		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Sampling Umpan' ; 

		$data['page_name_detail'] = 'Add Form 4 Data Sampling Umpan' ; 

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();

		$data['post'] = array();  


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			

			if( $this->form_validation->run() == TRUE  ) {

				$data = $this->input->post(); 

				$data['total_umpan_dibawa'] =0;

				$data['berat_sample_minus_tupper'] = 0;


							if( 
							($_POST['berat_sample_ember_umpan'] > 0 )  &&  
							($_POST['berat_ember_sample_umpan_kosong'] > 0 ) && 
							($_POST['jumlah_ember_diangkut'] > 0) && 
							($_POST['rasio_ember_umpan_sampel'] > 0  ) && 
							( $_POST['berat_sample_tupper_umpan'] > 0 ) && 
							($_POST['berat_tupper_umpan_kosong'] > 0) 
							)
						{

							//formula running 

							$data['total_umpan_dibawa'] = ( $_POST['berat_sample_ember_umpan'] - $_POST['berat_ember_sample_umpan_kosong']  ) * $_POST['rasio_ember_umpan_sampel'] * $_POST['jumlah_ember_diangkut'] ; 

							$data['berat_sample_minus_tupper'] = $_POST['berat_sample_tupper_umpan'] - $_POST['berat_tupper_umpan_kosong'] ; 


						}

	          	$getSeq = $this->Model_trip->form4_add($data);

				redirect('trip/form4_update/'.$kode_trip.'/'.$getSeq);



	          }else{

	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip/form4/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/form4/add', $data);

	

		}

	}


	public function form4_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Data Sampling Umpan' ; 

		$data['page_name_detail'] = 'Update Form 4 Data Sampling Umpan' ; 

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();

		$data['post'] = $this->Model_master->general_select("observerform_umpan", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();; 

		$data['kode_umpan']  = $this->Model_master->general_select("master_species", array('jenis_species' => 'Umpan'), "", "fao");

		$data['table1'] = 'Detail Umpan'; 

		$data['button_add']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable1" id="AddDataTable1Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table']=base_url()."trip/view_observerform_umpan_detail/".$kode_trip."/".$id;

		$data['url_show_table']=base_url()."trip/view_update_observerform_umpan_detail/";

		$data['url_add_table1']=base_url()."trip/add_observerform_umpan_detail";

		$data['url_update_table1']=base_url()."trip/update_observerform_umpan_detail";

		$data['url_delete_table1']=base_url()."trip/delete_observerform_umpan_detail";

		$lintang = explode("," , $data['post']['lintang']);

			$data['post']['lintang_degree'] = '';

	        $data['post']['lintang_minutes'] = '';

	        $data['post']['lintang_us'] = '';

		if (!empty($lintang)) {

			if (!empty($lintang[1]) && !(empty($lintang[2])) &&(!empty($lintang[0])) ) {

	            $data['post']['lintang_degree'] = $lintang[0];

	            $data['post']['lintang_minutes'] = $lintang[1];

	            $data['post']['lintang_us'] = $lintang[2];

        	}
        }

        
		$bujur = explode("," , $data['post']['bujur']);

			$data['post']['bujur_degree'] = '';

            $data['post']['bujur_minutes'] = '';

            $data['post']['bujur_us'] = '';

		if (!empty($bujur)) {

			if (!empty($bujur[1]) && !(empty($bujur[2])) &&(!empty($bujur[0])) ) {

            $data['post']['bujur_degree'] = $bujur[0];

            $data['post']['bujur_minutes'] = $bujur[1];

            $data['post']['bujur_us'] = $bujur[2];

        	}
        }


        $data['post']['waktu_mulai'] = $data['post']['jam_mulai'].":".$data['post']['menit_mulai'] ; 

        $data['post']['waktu_selesai'] = $data['post']['jam_selesai'].":".$data['post']['menit_selesai'] ; 

		
		

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('seq', 'seq required', 'required');


			if( $this->form_validation->run() == TRUE  ) {


				$data = $this->input->post(); 

				$data['total_umpan_dibawa'] =0;

				$data['berat_sample_minus_tupper'] = 0;


							if( 
							($_POST['berat_sample_ember_umpan'] > 0 )  &&  
							($_POST['berat_ember_sample_umpan_kosong'] > 0 ) && 
							($_POST['jumlah_ember_diangkut'] > 0) && 
							($_POST['rasio_ember_umpan_sampel'] > 0  ) && 
							( $_POST['berat_sample_tupper_umpan'] > 0 ) && 
							($_POST['berat_tupper_umpan_kosong'] > 0) 
							)
						{

							//formula running 

							$data['total_umpan_dibawa'] = ( $_POST['berat_sample_ember_umpan'] - $_POST['berat_ember_sample_umpan_kosong']  ) * $_POST['rasio_ember_umpan_sampel'] * $_POST['jumlah_ember_diangkut'] ; 

							$data['berat_sample_minus_tupper'] = $_POST['berat_sample_tupper_umpan'] - $_POST['berat_tupper_umpan_kosong'] ; 


						}


	          	$this->Model_trip->form4_update($data);

				redirect('trip/form4/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip/form4/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip/form4/update', $data);
	

		}


	}


	public function form4_delete($kode_trip , $id){


		$this->Model_trip->form4_delete($kode_trip , $id);

		redirect('trip/form4/'.$kode_trip);


	}


	public function form4_kalkulasi_backup($kode_trip){

		$data = array();
		$set = array();
		

		$data['data_umpans']  = $this->Model_master->general_select("observerform_umpan", array('id_trip' => $kode_trip ), "", "seq") ;
		$berat_sample_ember_umpan = 0; 
		$jumlah = 0; 
		$total_umpan_dibawa_seluruh_set = 0 ; 

		foreach($data['data_umpans']->result() as $row){


			$berat_sample_ember_umpan =  $berat_sample_ember_umpan +  $row->berat_sample_ember_umpan ; 

			
			$jumlah++; 


		}

		$rata2_berat_sample_ember_umpan =  round($berat_sample_ember_umpan/$jumlah , 2) ; 

		$jumlah = 0; 

		foreach($data['data_umpans']->result() as $row){


			$berat_sample_ember_umpan =  $berat_sample_ember_umpan +  $row->berat_sample_ember_umpan ; 

			
			$total_umpan_dibawa = ( ( $rata2_berat_sample_ember_umpan - $row->berat_ember_sample_umpan_kosong ) * $row->rasio_ember_umpan_sampel * $row->jumlah_ember_diangkut ) ; 

			$total_umpan_dibawa_seluruh_set = $total_umpan_dibawa_seluruh_set + $total_umpan_dibawa ; 
		

			$set[$jumlah]['total_umpan_dibawa'] =  $total_umpan_dibawa ; 

			$set[$jumlah]['berat_sample_minus_tupper'] = $row->berat_sample_tupper_umpan - $row->berat_tupper_umpan_kosong ; 

			$id_trip = $row->id_trip ; 


			$data['data_umpan_detail']  = $this->Model_trip->kalkulasi4_get_distinct_species($kode_trip , $row->seq );

			$data['data_umpan_detail_species_sum_ekor'] = $this->Model_master->general_select_sum("observerform_umpan_detail", array('id_trip' => $kode_trip , 'seq_umpan' => $row->seq  ), "jumlah", "")->row_array() ;


				foreach($data['data_umpan_detail']->result() as $row1){


						$data['data_umpan_detail_species'] = $this->Model_master->general_select("observerform_umpan_detail", array('id_trip' => $kode_trip , 'seq_umpan' => $row->seq , 'kode_species' => $row1->kode_species ), "", "seq_umpan") ;

						
							$set[$jumlah][$row->seq][$row1->kode_species]['jumlah_ekor']  = 0; 
							$set[$jumlah][$row->seq][$row1->kode_species]['jumlah_berat'] = 0;

								foreach($data['data_umpan_detail_species']->result() as $row2){


										$set[$jumlah][$row->seq][$row1->kode_species]['jumlah_ekor'] = $set[$jumlah][$row->seq][$row1->kode_species]['jumlah_ekor'] + $row2->jumlah ;
										$set[$jumlah][$row->seq][$row1->kode_species]['jumlah_berat'] = $set[$jumlah][$row->seq][$row1->kode_species]['jumlah_berat'] + $row2->berat ;



										
								}


						

								$set[$jumlah][$row->seq][$row1->kode_species]['percentage_by_weight'] =  round( ( ( $set[$jumlah][$row->seq][$row1->kode_species]['jumlah_berat'] - $row->berat_tupper_umpan_kosong )   / $row->berat_sample_minus_tupper )  , 2 ) ; 

								$set[$jumlah][$row->seq][$row1->kode_species]['percentage_by_jumlah'] = round( $set[$jumlah][$row->seq][$row1->kode_species]['jumlah_ekor'] / $data['data_umpan_detail_species_sum_ekor']['jumlah'] , 2 ) ; 


								$set[$jumlah][$row->seq][$row1->kode_species]['HASIL_AKHIR_by_weight'] = round( $set[$jumlah][$row->seq][$row1->kode_species]['percentage_by_weight'] * $set[$jumlah]['total_umpan_dibawa'] ); 

								$set[$jumlah][$row->seq][$row1->kode_species]['HASIL_AKHIR_by_jumlah'] = round( $set[$jumlah][$row->seq][$row1->kode_species]['percentage_by_jumlah'] * $set[$jumlah]['total_umpan_dibawa'] ); 

				}







			$jumlah++; 


		}


		$saved = $this->Model_trip->kalkulasi_insert( $kode_trip ,  'form4',  $set);


			echo '
				<script> 
					alert("Kalkulasi Form 4 Running"); 
					window.location.href = "'.base_url().'/trip/form4/'.$kode_trip.' ";
				</script>'; 

		//echo json_encode($set);
			
		//redirect('trip/form4/'.$kode_trip);


	}





	public function form4_kalkulasi($kode_trip){

		

		$data = array();
		$set = array();
		

		$data['data_umpans']  = $this->Model_master->general_select("observerform_umpan", array('id_trip' => $kode_trip ), "", "seq") ;
		$berat_sample_ember_umpan = 0; 
		$jumlah = 0; 
		$total_umpan_dibawa_seluruh_set = 0 ; 

		foreach($data['data_umpans']->result() as $row){


			$berat_sample_ember_umpan =  $berat_sample_ember_umpan +  $row->berat_sample_ember_umpan ; 

			
			$jumlah++; 


		}

		$rata2_berat_sample_ember_umpan =  round($berat_sample_ember_umpan/$jumlah , 2) ; 

		$jumlah = 0; 

		foreach($data['data_umpans']->result() as $row){


			$berat_sample_ember_umpan =  $berat_sample_ember_umpan +  $row->berat_sample_ember_umpan ; 

			
			$total_umpan_dibawa = ( ( $rata2_berat_sample_ember_umpan - $row->berat_ember_sample_umpan_kosong ) * $row->rasio_ember_umpan_sampel * $row->jumlah_ember_diangkut ) ; 

			$total_umpan_dibawa_seluruh_set = $total_umpan_dibawa_seluruh_set + $total_umpan_dibawa ; 
		

			$set[$jumlah]['total_umpan_dibawa'] =  $total_umpan_dibawa ; 

			$set[$jumlah]['berat_sample_minus_tupper'] = $row->berat_sample_tupper_umpan - $row->berat_tupper_umpan_kosong ; 

			//ubah gram to kg so everything is in kg 
			$set[$jumlah]['berat_sample_minus_tupper']  = $set[$jumlah]['berat_sample_minus_tupper']  ; 


			$id_trip = $row->id_trip ; 


			$data['data_umpan_detail']  = $this->Model_trip->kalkulasi4_get_distinct_species($kode_trip , $row->seq );

			$data['data_umpan_detail_species_sum_ekor'] = $this->Model_master->general_select_sum("observerform_umpan_detail", array('id_trip' => $kode_trip , 'seq_umpan' => $row->seq  ), "jumlah", "")->row_array() ;


				foreach($data['data_umpan_detail']->result() as $row1){


						$data['data_umpan_detail_species'] = $this->Model_master->general_select("observerform_umpan_detail", array('id_trip' => $kode_trip , 'seq_umpan' => $row->seq , 'kode_species' => $row1->kode_species ), "", "seq_umpan") ;

						
							$set[$jumlah][$row->seq][$row1->kode_species]['jumlah_ekor']  = 0; 
							$set[$jumlah][$row->seq][$row1->kode_species]['jumlah_berat'] = 0;

								foreach($data['data_umpan_detail_species']->result() as $row2){


										$set[$jumlah][$row->seq][$row1->kode_species]['jumlah_ekor'] = $set[$jumlah][$row->seq][$row1->kode_species]['jumlah_ekor'] + $row2->jumlah ;
										$set[$jumlah][$row->seq][$row1->kode_species]['jumlah_berat'] = $set[$jumlah][$row->seq][$row1->kode_species]['jumlah_berat'] + ($row2->berat  ) ; //set from gram to Kg 



										
								}


						

								$set[$jumlah][$row->seq][$row1->kode_species]['percentage_by_weight'] =   ( ( $set[$jumlah][$row->seq][$row1->kode_species]['jumlah_berat'] - ($row->berat_tupper_umpan_kosong  )  )   / $row->berat_sample_minus_tupper )   ;  //set from gram to Kg 

								$set[$jumlah][$row->seq][$row1->kode_species]['percentage_by_jumlah'] = round( $set[$jumlah][$row->seq][$row1->kode_species]['jumlah_ekor'] / $data['data_umpan_detail_species_sum_ekor']['jumlah'] , 2 ) ; 

								/*
								$set[$jumlah][$row->seq][$row1->kode_species]['HASIL_AKHIR_by_weight'] = round( $set[$jumlah][$row->seq][$row1->kode_species]['percentage_by_weight'] * $set[$jumlah]['total_umpan_dibawa'] ); 

								$set[$jumlah][$row->seq][$row1->kode_species]['HASIL_AKHIR_by_jumlah'] = round( $set[$jumlah][$row->seq][$row1->kode_species]['percentage_by_jumlah'] * $set[$jumlah]['total_umpan_dibawa'] ); 
								*/

								$set[$jumlah][$row->seq][$row1->kode_species]['HASIL_AKHIR_by_weight'] =  $set[$jumlah][$row->seq][$row1->kode_species]['percentage_by_weight'] * $set[$jumlah]['total_umpan_dibawa'] ; 

								/*$set[$jumlah][$row->seq][$row1->kode_species]['HASIL_AKHIR_by_jumlah'] = round( $set[$jumlah][$row->seq][$row1->kode_species]['percentage_by_jumlah'] * $set[$jumlah]['total_umpan_dibawa'] ); */
								$set[$jumlah][$row->seq][$row1->kode_species]['HASIL_AKHIR_by_jumlah'] = ( $set[$jumlah][$row->seq][$row1->kode_species]['HASIL_AKHIR_by_weight']  *  $set[$jumlah][$row->seq][$row1->kode_species]['jumlah_ekor'] ) / ( ( ($set[$jumlah][$row->seq][$row1->kode_species]['jumlah_berat'] - ($row->berat_tupper_umpan_kosong ) )/ 1000 ))  ; 



							


				}






			$jumlah++; 


		}


		$saved = $this->Model_trip->kalkulasi_insert( $kode_trip ,  'form4',  $set);



		 echo '
				<script> 
					alert("Kalkulasi Form 4 Running"); 
					window.location.href = "'.base_url().'/trip/form4/'.$kode_trip.' ";
				</script>'; 
		
			

		//echo json_encode($set); 

	}









	public function view_observerform_umpan_detail($kode_trip , $id){

		$query = $this->Model_master->general_select("observerform_umpan_detail", array('id_trip' => $kode_trip , 'seq_umpan' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable1Modal" onclick="editData(\'' .$row->id_trip.'\' , '.$row->seq_umpan.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable1Modal" onclick="disableData(\'' .$row->id_trip.'\'  , '.$row->seq_umpan.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;
           

                if($row->berat ==0){

                	$row->berat = ""; 

                }

                $result['data'][]=array(

                        $row->nomor, 
                        $row->kode_species, 

                        $row->berat , 
                        $row->jumlah , 
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);



	}


		public function add_observerform_umpan_detail(){


		   //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');
        $this->form_validation->set_rules('kode_species', 'kode_species', 'required');



        
        if ( $this->form_validation->run()  ) {


        	//Insert to Database 

            $data = $this->input->post() ; 

            //$data['berat_formula'] = 0;

            /*

            if( $_POST['berat'] > 0 ){


            	$id_trip = $_POST['id_trip'];

            	$seq = $_POST['seq'];

            	$results = $this->Model_master->general_select("observerform_umpan", array('id_trip' => $id_trip , 'seq' => $seq ) , "", ""); 

            	$berat_sample_minus_tupper = 0;

            	$total_umpan_dibawa = 0;

            	foreach ($results->result_array() as $row){

            		$total_umpan_dibawa = $row['total_umpan_dibawa'] ; 

            		$berat_sample_minus_tupper = $row['berat_sample_minus_tupper'] ;

            	}
            	//get  total_umpan_dibawa & berat_sample_minus_tupper 


            	//formula running

            	$persentase = ( $_POST['berat'] / $berat_sample_minus_tupper ) * 100 ; 

            	$data['berat_formula'] = ( $persentase / 100 ) * $total_umpan_dibawa ; 

            } */


            $check_species = $this->Model_trip->check_species_exsist("observerform_umpan_detail", "add" ,  $this->input->post());
            
            if($check_species){
            
	            //Insert to Database 
	             $saved = $this->Model_trip->add_observerform_umpan_detail($data);

	            if ($saved)
	            {
	                 $success = true;
	                 $messages =  "Successfully adding Data! ";
	            }
	            else
	            {
	                 $success = false;
	                 $messages =  "Insert not working ! ";
	            }

        	}else{

        		$success = false;
	            $messages =  "Species sudah pernah dimasukkan ! ";

        	}

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan Kode species terisi';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function view_update_observerform_umpan_detail(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("observerform_umpan_detail", array('id_trip' => $id_trip , 'seq_umpan' => $seq , 'nomor' => $nomor ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}

	
	public function update_observerform_umpan_detail(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip ', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq ', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');
        $this->form_validation->set_rules('edit_kode_species', 'edit_kode_species ', 'required');


    

        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 

            $data = $this->input->post() ; 

            //$data['berat_formula'] = 0;

            /*
            if( $_POST['edit_berat'] > 0 ){


            	$id_trip = $_POST['edit_id_trip'];

            	$seq = $_POST['edit_seq'];

            	$results = $this->Model_master->general_select("observerform_umpan", array('id_trip' => $id_trip , 'seq' => $seq ) , "", ""); 

            	$berat_sample_minus_tupper = 0;

            	$total_umpan_dibawa = 0;

            	foreach ($results->result_array() as $row){

            		$total_umpan_dibawa = $row['total_umpan_dibawa'] ; 

            		$berat_sample_minus_tupper = $row['berat_sample_minus_tupper'] ;

            	}
            	//get  total_umpan_dibawa & berat_sample_minus_tupper 


            	//formula running

            	$persentase = ( $_POST['edit_berat'] / $berat_sample_minus_tupper ) * 100 ; 

            	$data['berat_formula'] = ( $persentase / 100 ) * $total_umpan_dibawa ; 

            } */

             $check_species = $this->Model_trip->check_species_exsist("observerform_umpan_detail", "update" ,  $this->input->post());
            
            if($check_species){


	             $saved = $this->Model_trip->update_observerform_umpan_detail($data);

	            if ($saved)
	            {
	                 $success = true;
	                 $messages =  "Successfully adding Data! ";
	            }
	            else
	            {
	                 $success = false;
	                 $messages =  "Update not working ! ";
	            }
        	}else
	         {
	            $success = false;
	            $messages =  "Species sudah pernah dimasukkan ! ";
	          }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data! Pastikan kode species terisi!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}


	public function delete_observerform_umpan_detail(){


        $saved = $this->Model_trip->delete_observerform_umpan_detail($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}

	/* form 4 */







	/* form 5 */

	public function form5($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Umpan yang tidak Gunakan' ; 

		$data['page_name_detail'] = 'Form 5 Data Umpan yang tidak Gunakan' ; 

		$data['record'] = $this->Model_master->general_select("observerform_umpan_non_used", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip/form5/list', $data);

	}

	public function form5_add($kode_trip){


		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Umpan yang tidak Gunakan' ; 

		$data['page_name_detail'] = 'Add Form 5 Data Umpan yang tidak Gunakan' ; 

		$data['post'] = array();  

		$data['kode'] = array( 'DIBUANG' , 'DIMAKAN' , 'DIAMBIL HIDUP UNTUK MANCING' , 'SISA UMPAN TIDAK DIPAKAI DARI TRIP' ) ; 
 
 		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->form5_add($this->input->post());

				redirect('trip/form5/'.$kode_trip);


	          }else{

	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip/form5/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/form5/add', $data);

	

		}

	}


	public function form5_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Data Umpan yang tidak Gunakan' ; 

		$data['page_name_detail'] = 'Update Form 5 Data Umpan yang tidak Gunakan' ; 

		$data['post'] = $this->Model_master->general_select("observerform_umpan_non_used", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();; 

		$data['kode'] = array( 'DIBUANG' , 'DIMAKAN' , 'DIAMBIL HIDUP UNTUK MANCING' , 'SISA UMPAN TIDAK DIPAKAI DARI TRIP' ) ; 
 
 		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();

 		$waktu = explode(":" , $data['post']['waktu']);

         	$data['post']['jam'] = $waktu[0];

         	$data['post']['menit'] = $waktu[1];
				

		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('seq', 'seq required', 'required');

			

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->form5_update($this->input->post());

				redirect('trip/form5/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip/form5/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip/form5/update', $data);
	

		}


	}


	public function form5_delete($kode_trip , $id){


		$this->Model_trip->form5_delete($kode_trip , $id);

		redirect('trip/form5/'.$kode_trip);


	}


	/* form 5 */









	/* form 6 */

	public function form6($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Endangered, threatened and protected species ' ; 

		$data['page_name_detail'] = 'Form 6 Endangered, threatened and protected species ' ; 

		$data['record'] = $this->Model_master->general_select("observerform_etp", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip/form6/list', $data);

	}


		public function form6_add($kode_trip){


		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Endangered, threatened and protected species ' ; 

		$data['page_name_detail'] = 'Add Form 6 Endangered, threatened and protected species ' ; 

		$data['post'] = array();  

		$data['kode_posisi_pancing_etp'] = $this->Model_master->general_select("master_dictionary", array('jenis_aktivitas' => 'kode_posisi_pancing_etp' ) , "", ""); 

		$data['kode_kondisi_etp'] = $this->Model_master->general_select("master_dictionary", array('jenis_aktivitas' => 'kode_kondisi_etp' ) , "", ""); 

		$data['trip'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip ) , "", "")->row_array();

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');


			if( $this->form_validation->run() == TRUE  ) {

	          	$getSeq =  $this->Model_trip->form6_add($this->input->post());

				redirect('trip/form6_update/'.$kode_trip.'/'.$getSeq);




	          }else{

	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip/form6/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/form6/add', $data);

	

		}

	}


	public function load_species_etp(){

                $id = $_POST['species_fao']; 

                if($id == 'Paus'){

                	$id= 'Lumba-lumba';

                }

                $results = $this->Model_master->load_species_etp($id);

                echo '<option value="">Select Species</option>';
                
                foreach($results->result() as $res){
                    echo '<option value="'.$res->fao.'">'.$res->fao.' - '.$res->english.'</option>'; 
                }
    }


    public function load_species_etp_edit(){

                $jenis = $_POST['jenis']; 

                $kode = $_POST['kode'];

                $results = $this->Model_master->load_species_etp($jenis);

                echo '<option value="">Select Species</option>';
                
                foreach($results->result() as $res){
                    if($res->fao == $kode){
                        echo '<option value="'.$res->fao.'" selected>'.$res->fao.' - '.$res->english.'</option>'; 
                    }else{
                        echo '<option value="'.$res->fao.'">'.$res->fao.' - '.$res->english.'</option>';  
                    }
                }
            }


	public function form6_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Endangered, threatened and protected species ' ; 

		$data['page_name_detail'] = 'Add Form 6 Endangered, threatened and protected species ' ; 

		$data['post'] = $this->Model_master->general_select("observerform_etp", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();; 

		$data['kode_posisi_pancing_etp'] = $this->Model_master->general_select("master_dictionary", array('jenis_aktivitas' => 'kode_posisi_pancing_etp' ) , "", ""); 

		$data['kode_kondisi_etp'] = $this->Model_master->general_select("master_dictionary", array('jenis_aktivitas' => 'kode_kondisi_etp' ) , "", ""); 
	
		$data['kode_etp_penyu']  = $this->Model_master->general_select("master_species", array('jenis_species' => 'Penyu'), "", "fao");

		$data['kode_etp_lain']  = $this->Model_trip->form6_etp_list();

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();



		$data['table1'] = 'Detail Penyu'; 

		$data['button_add']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable1" id="AddDataTable1Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table']=base_url()."trip/view_observerform_etp_detail/".$kode_trip."/".$id."/penyu";

		$data['url_show_table']=base_url()."trip/view_update_observerform_etp_detail/";

		$data['url_add_table1']=base_url()."trip/add_observerform_etp_detail";

		$data['url_update_table1']=base_url()."trip/update_observerform_etp_detail";

		$data['url_delete_table1']=base_url()."trip/delete_observerform_etp_detail";



		$data['table2'] = 'Detail Lain'; 

		$data['button_add2']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable2" id="AddDataTable2Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table2']=base_url()."trip/view_observerform_etp_detail/".$kode_trip."/".$id."/lain";

		$data['url_show_table2']=base_url()."trip/view_update_observerform_etp_detail/";


		$data['select_load_species'] = base_url()."trip/load_species_etp/";

		$data['select_load_species_edit'] = base_url()."trip/load_species_etp_edit/";


		$lintang = explode("," , $data['post']['lintang']);

			$data['post']['lintang_degree'] = '';

	        $data['post']['lintang_minutes'] = '';

	        $data['post']['lintang_us'] = '';

		if (!empty($lintang)) {

			if (!empty($lintang[1]) && !(empty($lintang[2])) &&(!empty($lintang[0])) ) {

	            $data['post']['lintang_degree'] = $lintang[0];

	            $data['post']['lintang_minutes'] = $lintang[1];

	            $data['post']['lintang_us'] = $lintang[2];

        	}
        }

        
		$bujur = explode("," , $data['post']['bujur']);

			$data['post']['bujur_degree'] = '';

            $data['post']['bujur_minutes'] = '';

            $data['post']['bujur_us'] = '';

		if (!empty($bujur)) {

			if (!empty($bujur[1]) && !(empty($bujur[2])) &&(!empty($bujur[0])) ) {

            $data['post']['bujur_degree'] = $bujur[0];

            $data['post']['bujur_minutes'] = $bujur[1];

            $data['post']['bujur_us'] = $bujur[2];

        	}
        }

        $waktu = explode(":" , $data['post']['waktu']);

         	$data['post']['jam'] = $waktu[0];

         	$data['post']['menit'] = $waktu[1];



		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('seq', 'seq required', 'required');

			

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->form6_update($this->input->post());

				redirect('trip/form6/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip/form6/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip/form6/update', $data);
	

		}


	}


	public function form6_delete($kode_trip , $id){


		$this->Model_trip->form6_delete($kode_trip , $id);

		redirect('trip/form6/'.$kode_trip);


	}


	public function view_observerform_etp_detail($kode_trip , $id , $hewan){


        $result = array();

        $no = 0;


		if($hewan == 'penyu'){

			$query = $this->Model_master->general_select_not_in("observerform_etp_detail", array('id_trip' => $kode_trip , 'seq_etp' => $id) , array('data_penyu' => ''), ""); 


			foreach($query->result() as $row){


		        	 $action1 = '<a type="button" data-toggle="modal" data-target="#editTable1Modal" onclick="editData(\'' .$row->id_trip.'\' , '.$row->seq_etp.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
		                                    <span class="fa fa-plug" aria-hidden="true"></span>
		                                    <span><strong>Edit</strong></span>            
		                                </a>
		                                ' ; 
		             $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable1Modal" onclick="disableData(\'' .$row->id_trip.'\'  , '.$row->seq_etp.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
		                                   <span class="fa fa-times" aria-hidden="true"></span>
		                                    <span><strong>Delete</strong></span>            
		                                </a>' ;

		        	$penyu = json_decode($row->data_penyu , true) ; 
				
							
						if(empty($penyu['sisik_hidung'])){
								$penyu['sisik_hidung']  = "";
							}

						if(empty($penyu['sisik_leher'])){
								$penyu['sisik_leher']  = "";
							}

						if(empty($penyu['sisik_kosta'])){
								$penyu['sisik_kosta']  = "";
							}

						if(empty($penyu['sisik_belakang'])){
								$penyu['sisik_belakang']  = "";
							}

						if(empty($penyu['no_foto'])){
								$penyu['no_foto']  = "";
							}

						if(empty($penyu['scl'])){
								$penyu['scl']  = "";
							}

						if(empty($penyu['cw'])){
								$penyu['cw']  = "";
							}


						if(empty($penyu['ccl'])){
								$penyu['ccl']  = "";
							}

					
		        	

		                $result['data'][]=array(

		                		$penyu['species_penyu'],

		                		$penyu['sisik_hidung'],
								$penyu['sisik_leher'],
								$penyu['sisik_kosta'],
								$penyu['sisik_belakang'],
								$penyu['no_foto'],
								$penyu['scl'],
								$penyu['cw'],

		                        $penyu['ccl'],  
		                        $action1, 
		                        $action2
		                
		                
		                ); 

			}

		}else{

			$query = $this->Model_master->general_select_not_in("observerform_etp_detail", array('id_trip' => $kode_trip , 'seq_etp' => $id) , array('data_lain' => ''), ""); 



			foreach($query->result() as $row){


		        	 $action1 = '<a type="button" data-toggle="modal" data-target="#editTable2Modal" onclick="editData2(\'' .$row->id_trip.'\' , '.$row->seq_etp.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
		                                    <span class="fa fa-plug" aria-hidden="true"></span>
		                                    <span><strong>Edit</strong></span>            
		                                </a>
		                                ' ; 
		             $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable2Modal" onclick="disableData2(\'' .$row->id_trip.'\'  , '.$row->seq_etp.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
		                                   <span class="fa fa-times" aria-hidden="true"></span>
		                                    <span><strong>Delete</strong></span>            
		                                </a>' ;

		        	$lain = json_decode($row->data_lain , true) ; 
				
		        	

		                $result['data'][]=array(

		                        $lain['kode_species'], 
		                        $lain['jenis_kelamin'], 
		                        $lain['foto'],  
		                        $lain['no_foto'], 
		                        $lain['panjang'],  
		                        $action1, 
		                        $action2
		                
		                
		                ); 

			}

		}

	

  
        
        /*
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable1Modal" onclick="editData(\'' .$row->id_trip.'\' , '.$row->seq_pindah.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable1Modal" onclick="disableData(\'' .$row->id_trip.'\'  , '.$row->seq_pindah.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Disable</strong></span>            
                                </a>' ;
           

                $result['data'][]=array(

                        $row->nomor, 
                        $row->kode_species, 
                        $row->tipe_produk , 
                        $row->berat , 
                        $action1, 
                        $action2
                
                
                ); 

        }

        */


         echo json_encode($result);

	}


	public function add_observerform_etp_detail(){



		   //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');



        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 
             $saved = $this->Model_trip->add_observerform_etp_detail($this->input->post());

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully adding Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "Insert not working ! ";
            }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function view_update_observerform_etp_detail(){

		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("observerform_etp_detail", array('id_trip' => $id_trip , 'seq_etp' => $seq , 'nomor' => $nomor ) , "", ""); 

        $data[] = array(); 

        foreach($results->result_array() as $res){

        	if($res['data_penyu'] != ""){ 
	
	        	$hasil = json_decode( $res['data_penyu'] , true) ; 

        		$data[0] = array( "nomor" => $res["nomor"] ,  
        			"species_penyu" => $hasil['species_penyu'] , 
        			"sisik_hidung" => $hasil['sisik_hidung'] , 
        			"sisik_leher" => $hasil['sisik_leher'] , 
        			"sisik_kosta" => $hasil['sisik_kosta'] ,
        			"sisik_belakang" => $hasil['sisik_belakang'] , 
        			"no_foto" => $hasil['no_foto'] ,
        			"scl" => $hasil['scl'] , 
        			"cw" => $hasil['cw'] ,

        			"ccl" => $hasil['ccl'] , 
        			 ) ;  
        	}
				
			if($res['data_lain'] != ""){ 
	
	        	$hasil = json_decode( $res['data_lain'] , true) ; 

        		$data[0] = array( "nomor" => $res["nomor"] ,  "jenis_kelamin" => $hasil['jenis_kelamin'] ,  "kode_species" => $hasil['kode_species'] , "jenis_species" => $hasil['jenis_species'] ,  "foto" => $hasil['foto'] , "no_foto" => $hasil['no_foto'] ,"panjang" => $hasil['panjang']  ) ;  
        	}
				
        }


        $response = array(

                'success' => true, 

                'messages' =>$data , 

            ); 

        echo json_encode($response);

	}

	public function  update_observerform_etp_detail(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip ', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq ', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');


        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 
             $saved = $this->Model_trip->update_observerform_etp_detail($this->input->post());

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully adding Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "Update not working ! ";
            }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function delete_observerform_etp_detail(){

		 $saved = $this->Model_trip->delete_observerform_etp_detail($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);

	}



	public function json_test(){

			/*

			$result = array(
					'punggung' => '1' , 
					'perut' => '2' , 
					'kepala' => '3' , 
					'ccl' => '4' , 
					'tl' => '5' , 
					'ptl' => '6'
					); 

			$test =  json_encode($result);

			*/

			$result = array(
					'kode_species' => '1' , 
					'jenis_kelamin' => '2' , 
					'foto' => '3' , 
					'no_foto' => '4' , 
					'panjang' => '5' , 
					); 

			$test =  json_encode($result);

			$kode_trip = 'HSA_20181001_20181008_2';

			$id = '3' ; 

			$this->Model_trip->json_insert($kode_trip , $id , $test );
			

		
			 //var_dump( json_decode($test , true) ); 


			

	}


	/* form 6 */










	/* form 7 */

	public function form7($kode_trip){

		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Pemindahan Ikan di Laut ' ; 

		$data['page_name_detail'] = 'Form 7 Pemindahan Ikan di Laut ' ; 

		$data['record'] = $this->Model_master->general_select("observerform_pemindahan", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip/form7/list', $data);

	}


		public function form7_add($kode_trip){


		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Pemindahan Ikan di Laut ' ; 

		$data['page_name_detail'] = 'Add Form 7 Pemindahan ikan di laut ' ; 

		$data['post'] = array();  

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');


			if( $this->form_validation->run() == TRUE  ) {

	          	$getSeq = $this->Model_trip->form7_add($this->input->post());

				redirect('trip/form7_update/'.$kode_trip.'/'.$getSeq);


	          }else{

	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip/form7/add', $data);


	          }


		}else{

		
			$this->template->load('administrator/template','administrator/trip/form7/add', $data);

	

		}

	}


		public function form7_update($kode_trip , $id){

		$data['kode_trip'] = $kode_trip; 

		$data['seq'] = $id ; 

		$data['page_name'] = 'Pemindahan Ikan di Laut ' ; 

		$data['page_name_detail'] = 'Add Form 7 Kapal penangkapan ikan ' ; 

		$data['post'] = $this->Model_master->general_select("observerform_pemindahan", array('id_trip' => $kode_trip , 'seq' => $id) , "", "")->row_array();; 

		$data['kode_species']  = $this->Model_master->general_select("master_species", array('jenis_species' => 'Ikan'), "", "fao");

		$data['trip_info'] = $this->Model_master->general_select("observerform_trip", array('id_trip' => $kode_trip), "", "")->row_array();


		$lintang = explode("," , $data['post']['lintang']);

			$data['post']['lintang_degree'] = '';

	        $data['post']['lintang_minutes'] = '';

	        $data['post']['lintang_us'] = '';

		if (!empty($lintang)) {

			if (!empty($lintang[1]) && !(empty($lintang[2])) &&(!empty($lintang[0])) ) {

	            $data['post']['lintang_degree'] = $lintang[0];

	            $data['post']['lintang_minutes'] = $lintang[1];

	            $data['post']['lintang_us'] = $lintang[2];

        	}
        }

        
		$bujur = explode("," , $data['post']['bujur']);

			$data['post']['bujur_degree'] = '';

            $data['post']['bujur_minutes'] = '';

            $data['post']['bujur_us'] = '';

		if (!empty($bujur)) {

			if (!empty($bujur[1]) && !(empty($bujur[2])) &&(!empty($bujur[0])) ) {

            $data['post']['bujur_degree'] = $bujur[0];

            $data['post']['bujur_minutes'] = $bujur[1];

            $data['post']['bujur_us'] = $bujur[2];

        	}
        }


        $waktu = explode(":" , $data['post']['waktu']);

         	$data['post']['jam'] = $waktu[0];

         	$data['post']['menit'] = $waktu[1];



		$data['table1'] = 'Detail Pemindahan Ikan Di Laut'; 

		$data['button_add']= '<div><center> <button type="button" class="btn btn-success a-btn-slide-text"  data-toggle="modal" data-target="#myModalTable1" id="AddDataTable1Btn">   <span class="fa fa-plus-square" aria-hidden="true"></span> Add New</button> </center></div>'  ;

		$data['url_load_table']=base_url()."trip/view_observerform_pemindahan_detail/".$kode_trip."/".$id;

		$data['url_show_table']=base_url()."trip/view_update_observerform_pemindahan_detail/";

		$data['url_add_table1']=base_url()."trip/add_observerform_pemindahan_detail";

		$data['url_update_table1']=base_url()."trip/update_observerform_pemindahan_detail";

		$data['url_delete_table1']=base_url()."trip/delete_observerform_pemindahan_detail";
		



		if (isset($_POST['submit'])){


			$this->form_validation->set_rules('kode_trip', 'kode_trip required', 'required');

			$this->form_validation->set_rules('seq', 'seq required', 'required');

			

			if( $this->form_validation->run() == TRUE  ) {

	          	$this->Model_trip->form7_update($this->input->post());

				redirect('trip/form7/'.$kode_trip);


	          }else{

	    
	          	$data['post'] = $_POST;
	    
	          	$this->template->load('administrator/template','administrator/trip/form7/update', $data);


	          }


		}else{

		
				$this->template->load('administrator/template','administrator/trip/form7/update', $data);
	

		}


	}


	public function form7_delete($kode_trip , $id){


		$this->Model_trip->form7_delete($kode_trip , $id);

		redirect('trip/form7/'.$kode_trip);


	}


	public function view_observerform_pemindahan_detail($kode_trip , $id){


		$query = $this->Model_master->general_select("observerform_pemindahan_detail", array('id_trip' => $kode_trip , 'seq_pindah' => $id) , "", ""); 

        $result = array();

        $no = 0;
        
        foreach($query->result() as $row){


                  $action1 = '<a type="button" data-toggle="modal" data-target="#editTable1Modal" onclick="editData(\'' .$row->id_trip.'\' , '.$row->seq_pindah.', '.$row->nomor.')" class="btn btn-primary a-btn-slide-text">
                                    <span class="fa fa-plug" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>            
                                </a>
                                ' ; 
                 $action2 = ' <a type="button" data-toggle="modal" data-target="#disableTable1Modal" onclick="disableData(\'' .$row->id_trip.'\'  , '.$row->seq_pindah.', '.$row->nomor.')" class="btn btn-danger a-btn-slide-text">
                                   <span class="fa fa-times" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>            
                                </a>' ;
           

                $result['data'][]=array(

                        $row->nomor, 
                        $row->kode_species, 
                        $row->tipe_produk , 
                        $row->berat , 
                        $action1, 
                        $action2
                
                
                ); 

        }


         echo json_encode($result);

	}


	public function add_observerform_pemindahan_detail(){


		   //form validation 
        $this->form_validation->set_rules('id_trip', 'id_trip', 'required');
        $this->form_validation->set_rules('seq', 'seq', 'required');



        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 
             $saved = $this->Model_trip->add_observerform_pemindahan_detail($this->input->post());

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully adding Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "Insert not working ! ";
            }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);



	}


	public function view_update_observerform_pemindahan_detail(){


		$response = array();

        $id_trip = $_POST['id_trip'];

        $seq = $_POST['seq'];

        $nomor = $_POST['nomor']; 


        $results = $this->Model_master->general_select("observerform_pemindahan_detail", array('id_trip' => $id_trip , 'seq_pindah' => $seq , 'nomor' => $nomor ) , "", ""); 


        $response = array(

                'success' => true, 

                'messages' => $results->result_array()
            ); 

        echo json_encode($response);

	}

	
	public function update_observerform_pemindahan_detail(){


		$this->form_validation->set_rules('edit_id_trip', 'edit_id_trip ', 'required');
        $this->form_validation->set_rules('edit_seq', 'edit_seq ', 'required');
        $this->form_validation->set_rules('edit_nomor', 'edit_nomor ', 'required');
        $this->form_validation->set_rules('edit_kode_species', 'edit_kode_species ', 'required');


    

        
        if ( $this->form_validation->run()  ) {
            
            //Insert to Database 
             $saved = $this->Model_trip->update_observerform_pemindahan_detail($this->input->post());

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully adding Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "Update not working ! ";
            }

            
        }else{

            $success = false;
            $messages = 'Trouble adding Data!';
            
        }

            $validator['success'] = $success;
            $validator['messages'] = $messages;
        

        echo json_encode($validator);


	}


	public function delete_observerform_pemindahan_detail(){


        $saved = $this->Model_trip->delete_observerform_pemindahan_detail($_POST['id_trip'] , $_POST['seq'] , $_POST['nomor']);

            if ($saved)
            {
                 $success = true;
                 $messages =  "Successfully disable Data! ";
            }
            else
            {
                 $success = false;
                 $messages =  "disable not working ! ";
            }
        
        $validator['success'] = $success;
        $validator['messages'] = $messages;

        echo json_encode($validator);


	}


	/* form 7 */



	/* Trip Summary */ 


	public function trip_summary( $kode_trip ){


		$data = $this->link_forms($kode_trip);

		$data['kode_trip'] = $kode_trip; 

		$data['page_name'] = 'Data Summary ' ; 

		$data['page_name_detail'] = 'Data Hasil Summary  ' ; 

		$data['form3'] = $this->Model_master->general_select("kalkulasi", array('id_trip' => $kode_trip , 'form' => 'form3' ), "", "")->row_array();

		$data['form4'] = $this->Model_master->general_select("kalkulasi", array('id_trip' => $kode_trip , 'form' => 'form4' ), "", "")->row_array();

		$data['form5'] = $this->Model_master->general_select("observerform_umpan_non_used", array('id_trip' => $kode_trip), "", "");

		$data['form6'] = $this->Model_master->general_select("observerform_etp_detail", array('id_trip' => $kode_trip), "", "");

		$this->template->load('administrator/template','administrator/trip/summary', $data);



	}



	/* Trip Summary */ 



	//FUNCTION GET SET 

	public function find_set_from_seq($id_set , $kode_trip , $tipe){

		if($tipe == 'Tangkapan'){

			$data = $this->Model_master->general_select("observerform_tangkapan", array('id_trip' => $kode_trip , 'seq' => $id_set), "", "")->row_array();; 


			return $data['set_nomor'] ; 

		}

		if($tipe == 'Umpan'){

			$data = $this->Model_master->general_select("observerform_umpan", array('id_trip' => $kode_trip , 'seq' => $id_set), "", "")->row_array();; 


			return $data['no_angkut'] ; 

		}

	}

	//FUNCTION GET SET 



	function upload_foto( $filename ){
    	
        $config['upload_path']          = './assets/upload/';

        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $config['encrypt_name']			= TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload(''.$filename.'');

        return $this->upload->data();
    }



	/* READ EXCELL */

	public function read_excell(){

		$this->load->library('excel');

		$namafile = 'species_list_2.xlsx'; 

		$inputFileName  = 'uploads/master_species/'.$namafile;

        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);


        $sheet = $objPHPExcel->getSheetByName('Sheet7');
        $highestRow = $sheet->getHighestRow(); 
        $highestColumn = $sheet->getHighestColumn();
        $get_sheetData=$sheet->toArray(null,true,true,true);

         $i = 1;

         for ($row = 1; $row <= $highestRow; $row++){

         	$data['jenis_species']  = $get_sheetData[$i]["A"] ? : "" ;

         	if($row > 2){

         		$data['fao'] 			= $get_sheetData[$row]["A"] ? : "" ;

	         	$data['latin']  		=  $get_sheetData[$row]["B"] ? : "" ;

	         	$data['english'] 		= $get_sheetData[$row]["C"] ? : "" ;

	         	$data['family'] 		=  $get_sheetData[$row]["D"] ? : "" ;


	         	 $saved = $this->Model_master->insert_master_species( $data);


         	}


         }


	}



}