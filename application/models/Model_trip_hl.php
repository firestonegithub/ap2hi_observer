<?php
class Model_trip_hl extends CI_Model{
	
	function createCodeTrip($POST){

		$supplierData = $this->Model_master->master_supplier_update($POST['id_supplier'])->row_array();

		$codeSupplier = $supplierData['kode_name'] ; 

		$tanggal_keberangkatan=strtotime($POST['tanggal_keberangkatan']); 

		$tanggal_keberangkatan=date("Ymd",$tanggal_keberangkatan);

		$tanggal_kedatangan=strtotime($POST['tanggal_kedatangan']); 

		$tanggal_kedatangan=date("Ymd",$tanggal_kedatangan);

		$id_vessel = $_POST['id_vessel']; 

		$code = $codeSupplier."_".$tanggal_keberangkatan."_".$tanggal_kedatangan."_".$id_vessel; 

		return $code; 
	}

	function checkExsisting($table, $data, $column=""){

		$where_ = "";
        if (count($data)>0) {
            foreach ($data as $inputkey => $input_value) {
                $where_ .= " AND ".$inputkey." = '".$input_value."' ";
            }
        }
        $where_ = ($where_ != ""?"(".substr($where_, 4).")":"(1=1)");

        $select = "*";
        if ($column!="") {
            $select = $column;
        }

     

        $query = "
            SELECT ".$select." 
            FROM ".$table." 
            WHERE (1=1)
            AND ".$where_;


        return $this->db->query($query)->num_rows();

	}

	function add_trip_utama($data=array()){

		$ci = & get_instance();

		if($data){

			$code = $this->createCodeTrip($data);

			$id_user = $ci->session->userdata('id_user');

            $created_date = date('Y-m-d h:i:s');

			$tanggal_keberangkatan=strtotime($data['tanggal_keberangkatan']); 

			$tanggal_keberangkatan=date("Y-m-d",$tanggal_keberangkatan);

			$tanggal_kedatangan=strtotime($data['tanggal_kedatangan']); 

			$tanggal_kedatangan=date("Y-m-d",$tanggal_kedatangan);

			$tanggal_pemantau=strtotime($data['tanggal_pemantau']); 

			$tanggal_pemantau=date("Y-m-d",$tanggal_pemantau);


			$sql = "INSERT INTO observerform_trip(
		            id_trip, id_vessel, id_supplier, call_sign, wcpfc, iotc, csbt, 
		            nama_nahkoda, nama_fishing_master, pelabuhan_keberangkatan, pelabuhan_kedatangan, 
		            tanggal_keberangkatan, tanggal_kedatangan, jumlah_wni, jumlah_wna, 
		            vms, kondisi_vms, vts, kondisi_vts, penanganan_diatas_kapal, 
		            cara_penanganan_pasca_panen, foto_kapal, upload_foto, id_user, 
		            tanggal, nama_kapal, tanda_selar, no_sipi, no_siup, rfmo, tahun_pembuatan_kapal, 
		            bendera, bahan, gt, hp, panjang_kapal, lebar_kapal , rfmo_choice , nama_pemantau , id_pemantau , tanggal_pemantau , upload_foto_img , status_trip, tipe_data, hl_pakura_sampan , hl_mitigasi_etp , hl_nama_pemilik_perusahaan , hl_jumlah_pakura_sampan)
					    VALUES ('".$code."', '".$data['id_vessel']."', '".$data['id_supplier']."', '".$data['call_sign']."', '".$data['wcpfc']."', '".$data['iotc']."', '".$data['csbt']."', 
		            '".$data['nama_nahkoda']."', '".$data['nama_fishing_master']."', '".$data['pelabuhan_keberangkatan']."', '".$data['pelabuhan_kedatangan']."', 
		            '".$tanggal_keberangkatan."', '".$tanggal_kedatangan."', '".$data['jumlah_wni']."', '".$data['jumlah_wna']."', 
		            '".$data['vms']."', '".$data['kondisi_vms']."', '".$data['vts']."', '".$data['kondisi_vts']."', '".$data['penanganan_diatas_kapal']."', 
		            '".$data['cara_penanganan_pasca_panen']."', '".$data['foto_kapal']."', '".$data['upload_foto']."', '".$id_user."', 
		            '".$created_date."', '".$data['nama_kapal']."', '".$data['tanda_selar']."', '".$data['no_sipi']."', '".$data['no_siup']."', '".$data['rfmo']."', '".$data['tahun_pembuatan_kapal']."', 
		            '".$data['bendera']."', '".$data['bahan']."', '".$data['gt']."', '".$data['hp']."', '".$data['panjang_kapal']."', '".$data['lebar_kapal']."' , '".$data['rfmo_choice']."' , '".$data['nama_pemantau']."' , '".$data['id_pemantau']."' ,'".$tanggal_pemantau."' ,  '".$data['upload_foto_img']."' , '2' , 'HL' , '".$data['hl_pakura_sampan']."' , '".$data['hl_mitigasi_etp']."' , '".$data['hl_nama_pemilik_perusahaan']."' , '".$data['hl_jumlah_pakura_sampan']."');" ; 

			
			$result = $this->db->query($sql);



			return $code; 
		}


	}


	public function update_trip_utama($data=array()){

		$ci = & get_instance();

		if ($data)
        {

        	$id_user = $ci->session->userdata('id_user');

        	$changed_date = date('Y-m-d h:i:s');


        	

        	$add = "";

        	if($data['upload_foto_img'] != ''){


        		$add .= " , upload_foto_img = '".$data['upload_foto_img']."' ";
        	}

        	$tanggal_keberangkatan=strtotime($data['tanggal_keberangkatan']); 

			$tanggal_keberangkatan=date("Y-m-d",$tanggal_keberangkatan);

			$tanggal_kedatangan=strtotime($data['tanggal_kedatangan']); 

			$tanggal_kedatangan=date("Y-m-d",$tanggal_kedatangan);


        	$sql = "UPDATE observerform_trip
						   SET 
						   tanggal_keberangkatan='".$tanggal_keberangkatan."' ,
						   tanggal_kedatangan='".$tanggal_kedatangan."',
						   call_sign='".$data['call_sign']."', wcpfc='".$data['wcpfc']."', 
						       iotc='".$data['iotc']."', csbt='".$data['csbt']."', nama_nahkoda='".$data['nama_nahkoda']."', nama_fishing_master='".$data['nama_fishing_master']."', pelabuhan_keberangkatan='".$data['pelabuhan_keberangkatan']."', 
						       pelabuhan_kedatangan='".$data['pelabuhan_kedatangan']."', 
						       jumlah_wni='".$data['jumlah_wni']."', jumlah_wna='".$data['jumlah_wna']."', vms='".$data['vms']."', kondisi_vms='".$data['kondisi_vms']."', vts='".$data['vts']."', kondisi_vts='".$data['kondisi_vts']."', 
						       penanganan_diatas_kapal='".$data['penanganan_diatas_kapal']."', cara_penanganan_pasca_panen='".$data['cara_penanganan_pasca_panen']."', foto_kapal='".$data['foto_kapal']."', 
						       upload_foto='".$data['upload_foto']."', tanda_selar='".$data['tanda_selar']."', 
						       no_sipi='".$data['no_sipi']."', no_siup='".$data['no_siup']."', rfmo='".$data['rfmo']."', tahun_pembuatan_kapal='".$data['tahun_pembuatan_kapal']."', bendera='".$data['bendera']."', 
						       bahan='".$data['bahan']."', gt='".$data['gt']."', hp='".$data['hp']."', panjang_kapal='".$data['panjang_kapal']."', lebar_kapal='".$data['lebar_kapal']."', changed_by='".$id_user."', 
						       changed_date='".$changed_date."' , nama_pemantau='".$data['nama_pemantau']."' , id_pemantau='".$data['id_pemantau']."' , tanggal_pemantau='".$data['tanggal_pemantau']."' , rfmo_choice='".$data['rfmo_choice']."' ".$add.", 
						       	   hl_pakura_sampan='".$data['hl_pakura_sampan']."' ,	
						       	   hl_mitigasi_etp='".$data['hl_mitigasi_etp']."',	
						       	   hl_nama_pemilik_perusahaan='".$data['hl_nama_pemilik_perusahaan']."',
						       	   hl_jumlah_pakura_sampan='".$data['hl_jumlah_pakura_sampan']."'
 					WHERE  id_trip = '".$data['kode_trip']."'"; 

			$this->db->query($sql);


			return TRUE;
        }

        return FALSE;


	}


	public function update_detail_pancing($data=array()){

		$kode_trip = $data['kode_trip'];

		$table = "hl_observerform_detail_pancing"; 

		$where = array('id_trip' => $kode_trip); 

		if($this->db->escape($data['gambar_mata_pancing']) != ""){

				$gambar_select = ", gambar_mata_pancing ";
				$gambar_value =  ",".$this->db->escape($data['gambar_mata_pancing'])."";
				$gambar_set =  ",gambar_mata_pancing=".$this->db->escape($data['gambar_mata_pancing'])."";
				echo $this->db->escape($data['gambar_mata_pancing']) ;
				//break;

			}else{
				$gambar_select = "";
				$gambar_value = ""; 
				$gambar_set = "";
			}
		
		if( $this->checkExsisting($table , $where , "") == 0 ){

			

				$sql = "INSERT INTO hl_observerform_detail_pancing(
		            id_trip, 
		            ukuran_mata_pancing_tuna, 
		            ukuran_mata_pancing_umpan, 
		            jenis_mata_pancing, 
		            tali_baja, 
		            pengolahan_limbah, 
		            alat_tangkap 
		            ".$gambar_select." )
					    VALUES 
					 (".$this->db->escape($data['kode_trip']).", 
					 ".$this->db->escape($data['ukuran_mata_pancing_tuna']).", 
					 ".$this->db->escape($data['ukuran_mata_pancing_umpan']).", 
					 ".$this->db->escape($data['jenis_mata_pancing']).", 
					 ".$this->db->escape($data['tali_baja']).", 
					 ".$this->db->escape($data['pengolahan_limbah'])." ,  
					 ".$this->db->escape($data['alat_tangkap'])."
					 ".$gambar_value."
					  ) " ; 

		}else{

				$sql = "UPDATE hl_observerform_detail_pancing
						   SET 
						   ukuran_mata_pancing_tuna = ".$this->db->escape($data['ukuran_mata_pancing_tuna']).", 
						   ukuran_mata_pancing_umpan=".$this->db->escape($data['ukuran_mata_pancing_umpan']).", 
						   jenis_mata_pancing=".$this->db->escape($data['jenis_mata_pancing']).", 
						   tali_baja=".$this->db->escape($data['tali_baja']).",
						   pengolahan_limbah=".$this->db->escape($data['pengolahan_limbah']).",
						   alat_tangkap=".$this->db->escape($data['alat_tangkap'])."
						   ".$gambar_set."

						 WHERE id_trip = ".$this->db->escape($data['kode_trip'])." ;
						" ; 



		}

		$this->db->query($sql);


		return TRUE; 


	}


	public function update_alat_bantu($data=array()){

		$kode_trip = $data['kode_trip'];

		$table = "hl_observerform_alat_bantu"; 

		$where = array('id_trip' => $kode_trip); 

		
		if( $this->checkExsisting($table , $where , "") == 0 ){

				$sql = "
					INSERT INTO hl_observerform_alat_bantu(
            		id_trip, 
            		sonar, 
            		sonar_kondisi, 
            		fishfinder, 
            		fishfinder_kondisi, 
            		radio, 
            		radio_kondisi, 
            		gps, 
            		gps_kondisi, 
            		telepon_satelite, 
            		telepon_satelite_kondisi, 
            		batu_pemberat, 
            		batu_pemberat_kondisi
            		)
    				VALUES (
    				".$this->db->escape($data['kode_trip']).", 
            		".$this->db->escape($data['sonar']).", 
            		".$this->db->escape($data['sonar_kondisi']).", 
            		".$this->db->escape($data['fishfinder']).", 
            		".$this->db->escape($data['fishfinder_kondisi']).", 
            		".$this->db->escape($data['radio']).", 
            		".$this->db->escape($data['radio_kondisi']).", 
            		".$this->db->escape($data['gps']).", 
            		".$this->db->escape($data['gps_kondisi']).", 
            		".$this->db->escape($data['telepon_satelite']).", 
            		".$this->db->escape($data['telepon_satelite_kondisi']).", 
            		".$this->db->escape($data['batu_pemberat']).", 
            		".$this->db->escape($data['batu_pemberat_kondisi'])."
            		);" ; 

		}else{

				$sql = "UPDATE hl_observerform_alat_bantu
				   SET 
				   sonar=".$this->db->escape($data['sonar']).", 
				   sonar_kondisi=".$this->db->escape($data['sonar_kondisi']).", 
				   fishfinder=".$this->db->escape($data['fishfinder']).", 
				   fishfinder_kondisi=".$this->db->escape($data['fishfinder_kondisi']).", 
				   radio=".$this->db->escape($data['radio']).", 
				   radio_kondisi=".$this->db->escape($data['radio_kondisi']).", 
				   gps=".$this->db->escape($data['gps']).", 
				   gps_kondisi=".$this->db->escape($data['gps_kondisi']).", 
				   telepon_satelite=".$this->db->escape($data['telepon_satelite']).", 
				   telepon_satelite_kondisi=".$this->db->escape($data['telepon_satelite_kondisi']).", 
				   batu_pemberat=".$this->db->escape($data['batu_pemberat']).", 
				   batu_pemberat_kondisi=".$this->db->escape($data['batu_pemberat_kondisi'])."
				 WHERE id_trip = ".$this->db->escape($data['kode_trip'])." ;
						" ; 



		}

		$this->db->query($sql);


		return TRUE; 

	}


	public function update_detail_palka($data=array()){

		$kode_trip = $data['kode_trip'];


		$sql = " DELETE FROM hl_observerform_detail_palka WHERE id_trip = '".$kode_trip."'  " ; 

		$this->db->query($sql);

		$palka_no_1 = $data['palka_no_1']; 

		$palka_no_2 = $data['palka_no_2']; 

		$palka_no_3 = $data['palka_no_3']; 

		$palka_no_4 = $data['palka_no_4']; 
		
		$palka_no_5 = $data['palka_no_5']; 

		$palka_no_6 = $data['palka_no_6']; 

		$palkas = array( '1' =>  $palka_no_1 , '2' => $palka_no_2 , '3' =>$palka_no_3 , '4' => $palka_no_4 , '5' => $palka_no_5 , '6' => $palka_no_6 ) ;


			for($i=1; $i<=6; $i++ ){




					$sql = "INSERT INTO hl_observerform_detail_palka(
						            id_trip, palka_no, palka_detail)
						    VALUES (".$this->db->escape($data['kode_trip']).", ".$this->db->escape($i).", ".$this->db->escape($palkas[$i])." )" ; 


					$this->db->query($sql);

			}

			return TRUE; 



	}


	public function update_alat_keselamatan($data=array()){

		$kode_trip = $data['kode_trip'];

		$table = "hl_observerform_alat_keselamatan"; 

		$where = array('id_trip' => $kode_trip); 

		
		if( $this->checkExsisting($table , $where , "") == 0 ){

				$sql = "
					INSERT INTO hl_observerform_alat_keselamatan(
            		id_trip, 
            		jaket_keselamatan, 
            		jumlah_ring, 
            		rakit_jumlah, 
            		rakit_kapasitas, 
            		rakit_kondisi, 
            		p3k, 
            		palka_detail
            		)
    				VALUES (
    				".$this->db->escape($data['kode_trip']).", 
            		".$this->db->escape($data['jaket_keselamatan']).", 
            		".$this->db->escape($data['jumlah_ring']).", 
            		".$this->db->escape($data['rakit_jumlah']).", 
            		".$this->db->escape($data['rakit_kapasitas']).", 
            		".$this->db->escape($data['rakit_kondisi']).", 
            		".$this->db->escape($data['p3k']).", 
            		".$this->db->escape($data['palka_detail'])."
            		);" ; 

		}else{

				$sql = "UPDATE hl_observerform_alat_bantu
				   SET 
				   jaket_keselamatan=".$this->db->escape($data['jaket_keselamatan']).", 
				   jumlah_ring=".$this->db->escape($data['jumlah_ring']).", 
				   rakit_jumlah=".$this->db->escape($data['rakit_jumlah']).", 
				   rakit_kapasitas=".$this->db->escape($data['rakit_kapasitas']).", 
				   rakit_kondisi=".$this->db->escape($data['rakit_kondisi']).", 
				   p3k=".$this->db->escape($data['p3k']).", 
				   palka_detail=".$this->db->escape($data['palka_detail'])."
				 WHERE id_trip = ".$this->db->escape($data['kode_trip'])." ;
						" ; 



		}

		$this->db->query($sql);


		return TRUE; 



	}


		public function update_informasi_lain($data=array()){

		$kode_trip = $data['kode_trip'];

		$table = "hl_observerform_informasi_lain"; 

		$where = array('id_trip' => $kode_trip); 

		
		if( $this->checkExsisting($table , $where , "") == 0 ){

				$sql = "
					INSERT INTO hl_observerform_informasi_lain(
            		id_trip, 
            		solar, 
            		bensin, 
            		es, 
            		biaya
            		)
    				VALUES (
    				".$this->db->escape($data['kode_trip']).", 
            		".$this->db->escape($data['solar']).", 
            		".$this->db->escape($data['bensin']).", 
            		".$this->db->escape($data['es']).", 
            		".$this->db->escape($data['biaya'])."
            		);" ; 

		}else{

				$sql = "UPDATE hl_observerform_informasi_lain
				   SET 
				   solar=".$this->db->escape($data['solar']).", 
				   bensin=".$this->db->escape($data['bensin']).", 
				   es=".$this->db->escape($data['es']).", 
				   biaya=".$this->db->escape($data['biaya'])."
				 WHERE id_trip = ".$this->db->escape($data['kode_trip'])." ;
						" ; 



		}

		$this->db->query($sql);


		return TRUE; 



	}



	public function form2_add($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];
			


			$sql = "

					INSERT INTO hl_observerform_catatan_harian(
           			 id_trip, tanggal, waktu, lintang , bujur, kode_aktivitas)
				    VALUES (".$this->db->escape($data['kode_trip'] ? : "").", ".$this->db->escape($data['tanggal'] ? : "").", ".$this->db->escape($data['waktu'] ? : "").", ".$this->db->escape($lintang ? : "").", ".$this->db->escape($bujur ? : "").", ".$this->db->escape($data['kode_aktivitas'] ? : "").");
        	
          	";


			$this->db->query($sql);

		

			return TRUE; 

	}


	

	public function form2_update($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];


			$sql = "

			UPDATE hl_observerform_catatan_harian
				   SET tanggal=".$this->db->escape($data['tanggal']).", waktu=".$this->db->escape($data['waktu']).", lintang=".$this->db->escape($lintang)." , bujur=".$this->db->escape($bujur).", 
				       kode_aktivitas=".$this->db->escape($data['kode_aktivitas'])."
				 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq']).";

				   	";


			$this->db->query($sql);

		

			return TRUE; 

		}


	public function form2_delete($kode_trip , $id){


		 return $this->db->query("DELETE from hl_observerform_catatan_harian where id_trip ='$kode_trip' and seq = '$id'");



	}



		public function form3_add($data=array()){

			$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

			$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

			$fad2 = "";

			if(count($data['fad2']) > 0 ){

				foreach($data['fad2'] as $fad2_checkbox){

					$fad2 .= $fad2_checkbox.",";
				}

				$fad2 = substr($fad2, 0, -1);

			}

			

			$data['tanggal'] = strtotime($data['tanggal'] ); 

			$data['tanggal'] = date("Y-m-d",$data['tanggal']);

			$data['hari'] 	= date("d", strtotime( $data['tanggal']) ) ; 

			$data['bulan'] 	= date("m", strtotime( $data['tanggal']) ); 

			$data['tahun'] 	= date("Y", strtotime($data['tanggal'])) ; 

				$data['waktu_mulai'] = explode(":" , $data['waktu_mulai'] ); 

				$data['jam_mulai'] = $data['waktu_mulai'][0] ; 

				$data['menit_mulai'] = $data['waktu_mulai'][1] ;

				$data['waktu_selesai'] = explode(":" , $data['waktu_selesai'] ); 

				$data['jam_selesai'] = $data['waktu_selesai'][0] ; 

				$data['menit_selesai'] = $data['waktu_selesai'][1] ;


			$sql = "

			INSERT INTO hl_observerform_tangkapan(
            id_trip,  id_pemantau, nama_pemantau , hari, bulan, tahun, set_nomor, jam_mulai, 
            menit_mulai, jam_selesai, menit_selesai, jumlah_pemancing, alat_pengukur, 
            lintang , bujur , fad, jenis_fad , jenis_fad2 , ikan_terasosiasi, lokasi_pemancingan, 
            foto_fad , no_foto_fad , tanggal)
			    VALUES (
			    ".$this->db->escape($data['kode_trip']).", 
			    ".$this->db->escape($data['id_pemantau']).", 
			    ".$this->db->escape($data['nama_pemantau']).", 
			    ".$this->db->escape($data['hari']).", 
			    ".$this->db->escape($data['bulan']).", 
			    ".$this->db->escape($data['tahun']).", 
			    ".$this->db->escape($data['set_nomor']).", 
			    ".$this->db->escape($data['jam_mulai']).", 
			    ".$this->db->escape($data['menit_mulai']).", 
			    ".$this->db->escape($data['jam_selesai']).", 
			    ".$this->db->escape($data['menit_selesai']).", 
			    ".$this->db->escape($data['jumlah_pemancing']).", 
			    ".$this->db->escape($data['alat_pengukur']).", 
			    ".$this->db->escape($lintang).", 
			    ".$this->db->escape($bujur).", 
			    ".$this->db->escape($data['fad']).",  
			    ".$this->db->escape($data['jenis_fad']).",  
			    ".$this->db->escape($fad2).",
			    ".$this->db->escape($data['ikan_terasosiasi']).", 
			    ".$this->db->escape($data['lokasi_pemancingan']).", 
			    ".$this->db->escape($data['foto_fad'])." , 
			    ".$this->db->escape($data['no_foto_fad'])." ,  
			    ".$this->db->escape($data['tanggal'])." );

			  	";


			$this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 


			return $getid_; 

	}


	public function form3_update($data=array()){

			$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

			$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

			$fad2 = "";

			foreach($data['fad2'] as $fad2_checkbox){

				$fad2 .= $fad2_checkbox.",";
			}

			$fad2 = substr($fad2, 0, -1);

			$data['tanggal'] = strtotime($data['tanggal'] ); 

			$data['tanggal'] = date("Y-m-d",$data['tanggal']);

			$data['hari'] 	= date("d", strtotime( $data['tanggal']) ) ; 

			$data['bulan'] 	= date("m", strtotime( $data['tanggal']) ); 

			$data['tahun'] 	= date("Y", strtotime($data['tanggal'])) ; 



				$data['waktu_mulai'] = explode(":" , $data['waktu_mulai'] ); 

				$data['jam_mulai'] = $data['waktu_mulai'][0] ; 

				$data['menit_mulai'] = $data['waktu_mulai'][1] ;

				$data['waktu_selesai'] = explode(":" , $data['waktu_selesai'] ); 

				$data['jam_selesai'] = $data['waktu_selesai'][0] ; 

				$data['menit_selesai'] = $data['waktu_selesai'][1] ;

			
		$sql = "


		UPDATE hl_observerform_tangkapan
				   SET id_pemantau=".$this->db->escape($data['id_pemantau']).", 
				   nama_pemantau=".$this->db->escape($data['nama_pemantau']).",
				   hari=".$this->db->escape($data['hari']).", 
				   bulan=".$this->db->escape($data['bulan']).", 
				   tahun=".$this->db->escape($data['tahun']).", 
				   set_nomor=".$this->db->escape($data['set_nomor']).", 
				   jam_mulai=".$this->db->escape($data['jam_mulai']).", 
				   menit_mulai=".$this->db->escape($data['menit_mulai']).", 
				   jam_selesai=".$this->db->escape($data['jam_selesai']).", 
				   menit_selesai=".$this->db->escape($data['menit_selesai']).",
				   jumlah_pemancing=".$this->db->escape($data['jumlah_pemancing']).", 
				   alat_pengukur=".$this->db->escape($data['alat_pengukur']).", 
				   lintang=".$this->db->escape($lintang).",  
				   bujur=".$this->db->escape($bujur).", 
				   fad=".$this->db->escape($data['fad']).", 
				   jenis_fad=".$this->db->escape($data['jenis_fad']).", 
				   jenis_fad2=".$this->db->escape($fad2).", 
				   ikan_terasosiasi=".$this->db->escape($data['ikan_terasosiasi']).",
				   lokasi_pemancingan= ".$this->db->escape($data['lokasi_pemancingan']).",
				   foto_fad=".$this->db->escape($data['foto_fad'])." , 
				   no_foto_fad=".$this->db->escape($data['no_foto_fad'])."  , 
				   tanggal = ".$this->db->escape($data['tanggal'])."
				 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq'])." ;



			  	";


			$this->db->query($sql);

		
		

			return TRUE; 



	}


	public function form3_delete($kode_trip , $id){


		 return $this->db->query("DELETE from hl_observerform_tangkapan where id_trip ='$kode_trip' and seq = '$id'");



	}

	function check_species_exsist($table , $tipe ,  $data=array()){

		if($data){


			if($table == 'hl_observerform_tangkapan_hasil' && $tipe =='add'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['id_trip']."' and  seq_tangkapan = '".$data['seq']."' and kode_species = '".$data['kode_species']."' ");

		
			$check =  $query->num_rows();

			}

			if($table == 'hl_observerform_tangkapan_hasil' && $tipe =='update'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['edit_id_trip']."' and  seq_tangkapan = '".$data['edit_seq']."' and kode_species = '".$data['edit_kode_species']."' and nomor != '".$data['edit_nomor']."' ");

		
			$check =  $query->num_rows();

			}


			if($table == 'hl_observerform_tangkapan_detail' && $tipe =='add'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['id_trip']."' and  seq_tangkapan = '".$data['seq']."' and kode_species = '".$data['kode_species']."' ");

		
			$check =  $query->num_rows();

			}


			if($table == 'hl_observerform_tangkapan_detail' && $tipe =='update'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['edit_id_trip']."' and  seq_tangkapan = '".$data['edit_seq']."' and kode_species = '".$data['edit_kode_species2']."' and nomor != '".$data['edit_nomor2']."' ");

		
			$check =  $query->num_rows();

			}

			 
			if($table == 'hl_observerform_umpan_detail' && $tipe =='add'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['id_trip']."' and  seq_umpan = '".$data['seq']."' and kode_species = '".$data['kode_species']."' ");

		
			$check =  $query->num_rows();

			}

			if($table == 'hl_observerform_umpan_detail' && $tipe =='update'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['edit_id_trip']."' and  seq_umpan = '".$data['edit_seq']."' and kode_species = '".$data['edit_kode_species']."' and nomor != '".$data['edit_nomor']."' ");

		
			$check =  $query->num_rows();

			}


			if($table == 'hl_observerform_umpan_detail_jumlah' && $tipe =='add'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['id_trip']."' and  seq_umpan = '".$data['seq']."' and kode_species = '".$data['kode_species']."' ");

		
			$check =  $query->num_rows();

			}

			if($table == 'hl_observerform_umpan_detail_jumlah' && $tipe =='update'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['edit_id_trip']."' and  seq_umpan = '".$data['edit_seq']."' and kode_species = '".$data['edit_kode_species']."' and nomor != '".$data['edit_nomor']."' ");

		
			$check =  $query->num_rows();

			}


			if($table == 'hl_observerform_umpan_detail_panjang' && $tipe =='add'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['id_trip2']."' and  seq_umpan = '".$data['seq2']."' and kode_species = '".$data['kode_species2']."' ");

		
			$check =  $query->num_rows();

			}

			if($table == 'hl_observerform_umpan_detail_panjang' && $tipe =='update'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['edit_id_trip2']."' and  seq_umpan = '".$data['edit_seq2']."' and kode_species = '".$data['edit_kode_species2']."' and nomor != '".$data['edit_nomor2']."' ");

		
			$check =  $query->num_rows();

			}	


			
			if($table == 'hl_observerform_umpan_terpakai_detail' && $tipe =='add'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['id_trip']."' and  seq_umpan = '".$data['seq']."' and kode_species = '".$data['kode_species']."' ");

		
			$check =  $query->num_rows();

			}

			if($table == 'hl_observerform_umpan_terpakai_detail' && $tipe =='update'){


			$query = $this->db->query("Select id_trip from ".$table." where id_trip = '".$data['edit_id_trip']."' and  seq_umpan = '".$data['edit_seq']."' and kode_species = '".$data['edit_kode_species']."' and nomor != '".$data['edit_nomor']."' ");

		
			$check =  $query->num_rows();

			}


			if($check > 0){

				return false; 

			}else{

				return true;
				
			}
		}


		return false; 


	}


	public function add_observerform_tangkapan_hasil($data=array()){

		if ($data)
        {

        	$no = $this->Model_master->select_max( "hl_observerform_tangkapan_hasil" , array('id_trip' => $data['id_trip'] , 'seq_tangkapan' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        		if( empty($data['pakura1_jum']) ){ $data['pakura1_jum'] = 0; }
        		if( empty($data['pakura1_ber']) ){ $data['pakura1_ber'] = 0; }

        		if( empty($data['pakura2_jum']) ){ $data['pakura2_jum'] = 0; }
        		if( empty($data['pakura2_ber']) ){ $data['pakura2_ber'] = 0; }

        		if( empty($data['pakura3_jum']) ){ $data['pakura3_jum'] = 0; }
        		if( empty($data['pakura3_ber']) ){ $data['pakura3_ber'] = 0; }

        		if( empty($data['pakura4_jum']) ){ $data['pakura4_jum'] = 0; }
        		if( empty($data['pakura4_ber']) ){ $data['pakura4_ber'] = 0; }

        		if( empty($data['pakura5_jum']) ){ $data['pakura5_jum'] = 0; }
        		if( empty($data['pakura5_ber']) ){ $data['pakura5_ber'] = 0; }

        		if( empty($data['pakura6_jum']) ){ $data['pakura6_jum'] = 0; }
        		if( empty($data['pakura6_ber']) ){ $data['pakura6_ber'] = 0; }

        		if( empty($data['kapal_jum']) ){ $data['kapal_jum'] = 0; }
        		if( empty($data['kapal_ber']) ){ $data['kapal_ber'] = 0; }

        			$sql = "


        			INSERT INTO hl_observerform_tangkapan_hasil
        						(
					id_trip, 
					seq_tangkapan, 
					nomor, 
					kode_species, 
					pakura1_jum, 
					pakura1_ber, 
            		pakura2_jum, 
            		pakura2_ber, 
            		pakura3_jum, 
            		pakura3_ber, 
            		pakura4_jum, 
            		pakura4_ber, 
            		pakura5_jum, 
            		pakura5_ber, 
            		pakura6_jum, 
            		pakura6_ber, 
            		kapal_jum, 
            		kapal_ber
						            )
					    VALUES (
					".$this->db->escape($data['id_trip']).", 
					".$this->db->escape($data['seq']).", 
					'".$no."', 
					".$this->db->escape($data['kode_species']).",
					".$this->db->escape($this->removeComma($data['pakura1_jum']) ).", 
					".$this->db->escape($this->removeComma($data['pakura1_ber'])).",

					".$this->db->escape($this->removeComma($data['pakura2_jum']) ).", 
					".$this->db->escape($this->removeComma($data['pakura2_ber'])).",

					".$this->db->escape($this->removeComma($data['pakura3_jum']) ).", 
					".$this->db->escape($this->removeComma($data['pakura3_ber'])).",

					".$this->db->escape($this->removeComma($data['pakura4_jum']) ).", 
					".$this->db->escape($this->removeComma($data['pakura4_ber'])).",

					".$this->db->escape($this->removeComma($data['pakura5_jum']) ).", 
					".$this->db->escape($this->removeComma($data['pakura5_ber'])).",

					".$this->db->escape($this->removeComma($data['pakura6_jum']) ).", 
					".$this->db->escape($this->removeComma($data['pakura6_ber'])).",

					".$this->db->escape($this->removeComma($data['kapal_jum']) ).", 
					".$this->db->escape($this->removeComma($data['kapal_ber']))." 
					            )
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 

	}


	public function update_observerform_tangkapan_hasil($data=array()){

		if ($data)
        {


        		if( empty($data['edit_pakura1_jum']) ){ $data['edit_pakura1_jum'] = 0; }
        		if( empty($data['edit_pakura1_ber']) ){ $data['edit_pakura1_ber'] = 0; }

        		if( empty($data['edit_pakura2_jum']) ){ $data['edit_pakura2_jum'] = 0; }
        		if( empty($data['edit_pakura2_ber']) ){ $data['edit_pakura2_ber'] = 0; }

        		if( empty($data['edit_pakura3_jum']) ){ $data['edit_pakura3_jum'] = 0; }
        		if( empty($data['edit_pakura3_ber']) ){ $data['edit_pakura3_ber'] = 0; }

        		if( empty($data['edit_pakura4_jum']) ){ $data['edit_pakura4_jum'] = 0; }
        		if( empty($data['edit_pakura4_ber']) ){ $data['edit_pakura4_ber'] = 0; }

        		if( empty($data['edit_pakura5_jum']) ){ $data['edit_pakura5_jum'] = 0; }
        		if( empty($data['edit_pakura5_ber']) ){ $data['edit_pakura5_ber'] = 0; }

        		if( empty($data['edit_pakura6_jum']) ){ $data['edit_pakura6_jum'] = 0; }
        		if( empty($data['edit_pakura6_ber']) ){ $data['edit_pakura6_ber'] = 0; }

        		if( empty($data['edit_kapal_jum']) ){ $data['edit_kapal_jum'] = 0; }
        		if( empty($data['edit_kapal_ber']) ){ $data['edit_kapal_ber'] = 0; }


        		
        
        	$sql = "

        		UPDATE hl_observerform_tangkapan_hasil 
						   SET kode_species=".$this->db->escape($data['edit_kode_species']).", 
						  
		pakura1_jum=".$this->db->escape($this->removeComma( $data['edit_pakura1_jum'])).", 
   		pakura1_ber=".$this->db->escape($this->removeComma( $data['edit_pakura1_ber'])).", 
   		pakura2_jum=".$this->db->escape($this->removeComma( $data['edit_pakura2_jum'])).", 
		pakura2_ber=".$this->db->escape($this->removeComma( $data['edit_pakura2_ber'])).", 
		pakura3_jum=".$this->db->escape($this->removeComma( $data['edit_pakura3_jum'])).", 
		pakura3_ber=".$this->db->escape($this->removeComma( $data['edit_pakura3_ber'])).", 
		pakura4_jum=".$this->db->escape($this->removeComma( $data['edit_pakura4_jum'])).", 
		pakura4_ber=".$this->db->escape($this->removeComma( $data['edit_pakura4_ber'])).", 
		pakura5_jum=".$this->db->escape($this->removeComma( $data['edit_pakura5_jum'])).", 
		pakura5_ber=".$this->db->escape($this->removeComma( $data['edit_pakura5_ber'])).", 
		pakura6_jum=".$this->db->escape($this->removeComma( $data['edit_pakura6_jum'])).", 
		pakura6_ber=".$this->db->escape($this->removeComma( $data['edit_pakura6_ber'])).",
		kapal_jum=".$this->db->escape($this->removeComma( $data['edit_kapal_jum'])).", 
		kapal_ber=".$this->db->escape($this->removeComma( $data['edit_kapal_ber']))."
		WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_tangkapan=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 

	}



	public function delete_observerform_tangkapan_hasil($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM hl_observerform_tangkapan_hasil WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_tangkapan = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;

	}


	public function add_observerform_tangkapan_hasil_pakura($data=array()){

		if ($data)
        {

       
        			$sql = "


        			INSERT INTO hl_observerform_tangkapan_hasil_pakura
        			(
					  id_trip ,
					  seq_tangkapan ,
					  pakura1_mulai ,
					  pakura1_selesai ,
					  pakura1_mata_pancing ,
					  pakura2_mulai ,
					  pakura2_selesai ,
					  pakura2_mata_pancing ,
					  pakura3_mulai ,
					  pakura3_selesai ,
					  pakura3_mata_pancing ,
					  pakura4_mulai ,
					  pakura4_selesai ,
					  pakura4_mata_pancing ,
					  pakura5_mulai ,
					  pakura5_selesai ,
					  pakura5_mata_pancing ,
					  pakura6_mulai ,
					  pakura6_selesai ,
					  pakura6_mata_pancing ,
					  kapal_mulai ,
					  kapal_selesai ,
					  kapal_mata_pancing ,
					  ikan_bertanda_tag ,
					  kode_species ,
					  kelamin ,
					  panjang ,
					  berat
					)
					    VALUES (
					".$this->db->escape($data['id_trip']).", 
					".$this->db->escape($data['seq']).", 
					".$this->db->escape($data['pakura1_mulai']).",
					".$this->db->escape($data['pakura1_selesai']).",
					".$this->db->escape($data['pakura1_mata_pancing']).",

					".$this->db->escape($data['pakura2_mulai']).",
					".$this->db->escape($data['pakura2_selesai']).",
					".$this->db->escape($data['pakura2_mata_pancing']).",

					".$this->db->escape($data['pakura3_mulai']).",
					".$this->db->escape($data['pakura3_selesai']).",
					".$this->db->escape($data['pakura3_mata_pancing']).",

					".$this->db->escape($data['pakura4_mulai']).",
					".$this->db->escape($data['pakura4_selesai']).",
					".$this->db->escape($data['pakura4_mata_pancing']).",

					".$this->db->escape($data['pakura5_mulai']).",
					".$this->db->escape($data['pakura5_selesai']).",
					".$this->db->escape($data['pakura5_mata_pancing']).",

					".$this->db->escape($data['pakura6_mulai']).",
					".$this->db->escape($data['pakura6_selesai']).",
					".$this->db->escape($data['pakura6_mata_pancing']).",

					".$this->db->escape($data['kapal_mulai']).",
					".$this->db->escape($data['kapal_selesai']).",
					".$this->db->escape($data['kapal_mata_pancing']).",

					".$this->db->escape($data['ikan_bertanda_tag']).",
					".$this->db->escape($data['kode_species_pakura']).",
					".$this->db->escape($data['kelamin']).",
					".$this->db->escape($data['panjang']).",
					".$this->db->escape($data['berat'])."

					
					            )
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 

	}


	public function update_observerform_tangkapan_hasil_pakura($data=array()){

		if ($data)
        {


	
        
        	$sql = "

        		UPDATE hl_observerform_tangkapan_hasil_pakura 
						  set
		pakura1_mulai=".$this->db->escape($this->removeComma( $data['edit_pakura1_mulai'])).", 
   		pakura1_selesai=".$this->db->escape($this->removeComma( $data['edit_pakura1_selesai'])).", 
   		pakura1_mata_pancing=".$this->db->escape($this->removeComma( $data['edit_pakura1_mata_pancing'])).", 

   		pakura2_mulai=".$this->db->escape($this->removeComma( $data['edit_pakura2_mulai'])).", 
   		pakura2_selesai=".$this->db->escape($this->removeComma( $data['edit_pakura2_selesai'])).", 
   		pakura2_mata_pancing=".$this->db->escape($this->removeComma( $data['edit_pakura2_mata_pancing'])).", 

   		pakura3_mulai=".$this->db->escape($this->removeComma( $data['edit_pakura3_mulai'])).", 
   		pakura3_selesai=".$this->db->escape($this->removeComma( $data['edit_pakura3_selesai'])).", 
   		pakura3_mata_pancing=".$this->db->escape($this->removeComma( $data['edit_pakura3_mata_pancing'])).", 

   		pakura4_mulai=".$this->db->escape($this->removeComma( $data['edit_pakura4_mulai'])).", 
   		pakura4_selesai=".$this->db->escape($this->removeComma( $data['edit_pakura4_selesai'])).", 
   		pakura4_mata_pancing=".$this->db->escape($this->removeComma( $data['edit_pakura4_mata_pancing'])).", 

   		pakura5_mulai=".$this->db->escape($this->removeComma( $data['edit_pakura5_mulai'])).", 
   		pakura5_selesai=".$this->db->escape($this->removeComma( $data['edit_pakura5_selesai'])).", 
   		pakura5_mata_pancing=".$this->db->escape($this->removeComma( $data['edit_pakura5_mata_pancing'])).", 

   		kapal_mulai=".$this->db->escape($this->removeComma( $data['edit_kapal_mulai'])).", 
   		kapal_selesai=".$this->db->escape($this->removeComma( $data['edit_kapal_selesai'])).", 
   		kapal_mata_pancing=".$this->db->escape($this->removeComma( $data['edit_kapal_mata_pancing'])).", 

   		pakura6_mulai=".$this->db->escape($this->removeComma( $data['edit_pakura6_mulai'])).", 
   		pakura6_selesai=".$this->db->escape($this->removeComma( $data['edit_pakura6_selesai'])).", 
   		pakura6_mata_pancing=".$this->db->escape($this->removeComma( $data['edit_pakura6_mata_pancing'])).", 

   		ikan_bertanda_tag=".$this->db->escape($this->removeComma( $data['edit_ikan_bertanda_tag'])).", 
   		kode_species=".$this->db->escape($this->removeComma( $data['edit_kode_species_pakura'])).", 
   		kelamin=".$this->db->escape($this->removeComma( $data['edit_kelamin_pakura'])).", 
   		panjang=".$this->db->escape($this->removeComma( $data['edit_panjang_pakura'])).", 
   		berat=".$this->db->escape($this->removeComma( $data['edit_berat_pakura']))."
		
		WHERE id_trip=".$this->db->escape($data['edit_id_trip_pakura'])." and seq_tangkapan=".$this->db->escape($data['edit_seq_pakura'])."


        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 

	}



	public function delete_observerform_tangkapan_hasil_pakura($id_trip , $seq  ){

		if($id_trip){


			$sql = "DELETE FROM hl_observerform_tangkapan_hasil_pakura WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_tangkapan = ".$this->db->escape($seq)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;

	}

	public function add_observerform_tangkapan_detail($data=array()){

		if ($data)
        {

        	$no = $this->Model_master->select_max( "hl_observerform_tangkapan_detail" , array('id_trip' => $data['id_trip'] , 'seq_tangkapan' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        	if($data['berat'] == ""){
        		$data['berat'] = 0 ;
        	}

        			$sql = "


        			INSERT INTO hl_observerform_tangkapan_detail(
					            id_trip, seq_tangkapan, nomor, kode_species, panjang, 
					            berat,alat_tangkap)
					    VALUES (
					    ".$this->db->escape($data['id_trip']).", 
					    ".$this->db->escape($data['seq']).", 
					    '".$no."',
					    ".$this->db->escape($data['kode_species']).", 
					    ".$this->db->escape($data['panjang']).", 
					    ".$this->db->escape($data['berat']).",
					    ".$this->db->escape($data['alat_tangkap']).")
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 

	}


	public function update_observerform_tangkapan_detail($data=array()){

		if ($data)
        {

        	if($data['edit_berat'] == ""){
        		$data['edit_berat'] = 0 ;
        	}
        
        	 $sql = "

        		UPDATE hl_observerform_tangkapan_detail
						   SET kode_species=".$this->db->escape($data['edit_kode_species2']).", panjang=".$this->db->escape($data['edit_panjang']).", 
						       berat=".$this->db->escape($data['edit_berat']).",
						       alat_tangkap=".$this->db->escape($data['edit_alat_tangkap'])."
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_tangkapan=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        		  	";


			$this->db->query($sql);


			return TRUE; 




        	   }

        return FALSE; 

	}


	public function delete_observerform_tangkapan_detail($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM hl_observerform_tangkapan_detail WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_tangkapan = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;

	}


	public function form4_add($data=array()){


			$data['tanggal'] = strtotime($data['tanggal'] ); 

			$data['tanggal'] = date("Y-m-d",$data['tanggal']);

			$data['hari'] 	= date("d", strtotime( $data['tanggal']) ) ; 

			$data['bulan'] 	= date("m", strtotime( $data['tanggal']) ); 

			$data['tahun'] 	= date("Y", strtotime($data['tanggal'])) ;





				$data['waktu_mulai'] = explode(":" , $data['waktu_mulai'] ); 

				$data['jam_mulai'] = $data['waktu_mulai'][0] ; 

				$data['menit_mulai'] = $data['waktu_mulai'][1] ;

				$data['waktu_selesai'] = explode(":" , $data['waktu_selesai'] ); 

				$data['jam_selesai'] = $data['waktu_selesai'][0] ; 

				$data['menit_selesai'] = $data['waktu_selesai'][1] ; 


		$sql = "


						INSERT INTO hl_observerform_umpan(
				            id_trip, 
				            no_tangkapan, 
				            hari, 
				            bulan, 
				            tahun, 
				            jam_mulai, 
				            menit_mulai, 
            				jam_selesai, 
            				menit_selesai, 
            				latitude, 
            				longitude,
            				alat_tangkap_umpan, 
            				jum_alat_tangkap,
            				tanggal
            				)
				    VALUES (
				    ".$this->db->escape($data['kode_trip']).",  
				    ".$this->db->escape($data['no_tangkapan']).", 
				    ".$this->db->escape($data['hari']).", 
				    ".$this->db->escape($data['bulan']).", 
				    ".$this->db->escape($data['tahun']).", 

				    ".$this->db->escape($data['jam_mulai']).", 
				    ".$this->db->escape($data['menit_mulai']).", 
				    ".$this->db->escape($data['jam_selesai']).", 
				    ".$this->db->escape($data['menit_selesai']).", 

				    ".$this->db->escape($data['latitude']).", 
				    ".$this->db->escape($data['longitude']).", 

				     ".$this->db->escape($data['alat_tangkap_umpan']).", 
				    ".$this->db->escape($data['jum_alat_tangkap'])." ,
				    ".$this->db->escape($data['tanggal'])." 
				    )
		
			  	";


			$this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 


			return $getid_; 


	}


	public function form4_update($data=array()){

			$data['tanggal'] = strtotime($data['tanggal'] ); 

			$data['tanggal'] = date("Y-m-d",$data['tanggal']);

			$data['hari'] 	= date("d", strtotime( $data['tanggal']) ) ; 

			$data['bulan'] 	= date("m", strtotime( $data['tanggal']) ); 

			$data['tahun'] 	= date("Y", strtotime($data['tanggal'])) ; 


			

				$data['waktu_mulai'] = explode(":" , $data['waktu_mulai'] ); 

				$data['jam_mulai'] = $data['waktu_mulai'][0] ; 

				$data['menit_mulai'] = $data['waktu_mulai'][1] ;

				$data['waktu_selesai'] = explode(":" , $data['waktu_selesai'] ); 

				$data['jam_selesai'] = $data['waktu_selesai'][0] ; 

				$data['menit_selesai'] = $data['waktu_selesai'][1] ; 

		$sql = "

		UPDATE hl_observerform_umpan
			   SET  
			   no_tangkapan=".$this->db->escape($data['no_tangkapan']).", 
			   hari=".$this->db->escape($data['hari']).", 
			   bulan=".$this->db->escape($data['bulan']).", 
			   tahun=".$this->db->escape($data['tahun']).", 
			   jam_mulai=".$this->db->escape($data['jam_mulai']).", 
			   menit_mulai=".$this->db->escape($data['menit_mulai']).", 
			   jam_selesai=".$this->db->escape($data['jam_selesai']).", 
			   menit_selesai=".$this->db->escape($data['menit_selesai']).", 
			   latitude=".$this->db->escape($data['latitude']).", 
			   longitude=".$this->db->escape($data['longitude']).", 
			   alat_tangkap_umpan=".$this->db->escape($data['alat_tangkap_umpan']).", 
			   jum_alat_tangkap=".$this->db->escape($data['jum_alat_tangkap']).", 
			   tanggal=".$this->db->escape($data['tanggal'])."

			 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq']).";



			  	";


			$this->db->query($sql);

		

			return TRUE; 



	}


	public function form4_delete($kode_trip , $id){


		 return $this->db->query("DELETE from hl_observerform_umpan where id_trip ='$kode_trip' and seq = '$id'");


	}



	public function add_observerform_umpan_detail($data=array()){

		if ($data)
        {

        	$no = $this->Model_master->select_max( "hl_observerform_umpan_detail_jumlah" , array('id_trip' => $data['id_trip'] , 'seq_umpan' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        			$sql = "
 

        			INSERT INTO hl_observerform_umpan_detail_jumlah(
					            id_trip, seq_umpan, nomor, kode_species, jumlah, 
					            berat)
					    VALUES (".$this->db->escape($data['id_trip']).", ".$this->db->escape($data['seq']).", '".$no."', ".$this->db->escape($data['kode_species']).", ".$this->db->escape($this->removeComma($data['jumlah'])).", 
					            ".$this->db->escape($this->removeComma($data['berat']))." )
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 



	}


	public function update_observerform_umpan_detail($data=array()){

		if ($data)
        {
        
        	$sql = "

        		UPDATE hl_observerform_umpan_detail_jumlah
						   SET kode_species=".$this->db->escape($data['edit_kode_species']).", jumlah=".$this->db->escape($this->removeComma($data['edit_jumlah'])).", 
						       berat=".$this->db->escape($this->removeComma($data['edit_berat']))." 
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_umpan=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 

	}


	public function delete_observerform_umpan_detail($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM hl_observerform_umpan_detail_jumlah WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_umpan = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;


	}


	public function add_observerform_umpan_detail_jumlah($data=array()){

		if ($data)
        {

        	$no = $this->Model_master->select_max( "hl_observerform_umpan_detail_panjang" , array('id_trip' => $data['id_trip2'] , 'seq_umpan' =>  $data['seq2'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        			$sql = "
 

        			INSERT INTO hl_observerform_umpan_detail_panjang(
					            id_trip, seq_umpan, nomor, kode_species, panjang, 
					            berat)
					    VALUES (".$this->db->escape($data['id_trip2']).", ".$this->db->escape($data['seq2']).", '".$no."', ".$this->db->escape($data['kode_species2']).", ".$this->db->escape($this->removeComma($data['panjang2'])).", 
					            ".$this->db->escape($this->removeComma($data['berat2']))." )
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 



	}


	public function update_observerform_umpan_detail_panjang($data=array()){

		if ($data)
        {
        
        	$sql = "

        		UPDATE hl_observerform_umpan_detail_panjang
						   SET kode_species=".$this->db->escape($data['edit_kode_species2']).", panjang=".$this->db->escape($this->removeComma($data['edit_panjang2'])).", 
						       berat=".$this->db->escape($this->removeComma($data['edit_berat2']))." 
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip2'])." and seq_umpan=".$this->db->escape($data['edit_seq2'])." and nomor=".$this->db->escape($data['edit_nomor2'])."


        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 

	}


	public function delete_observerform_umpan_detail_panjang($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM hl_observerform_umpan_detail_panjang WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_umpan = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;


	}

	public function form5_add($data=array()){



	$sql = "

	INSERT INTO hl_observerform_umpan_terpakai(
            id_trip, 
			id_pemantau,
			nama_pemantau, 
			set_nomor
			
            )
    VALUES (
    		".$this->db->escape($data['kode_trip']).", 
    		".$this->db->escape($data['id_pemantau']).", 
			".$this->db->escape($data['nama_pemantau']).", 
			".$this->db->escape($data['set_nomor'])."
    );	";


			$this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 


			return $getid_; 

	}


	public function form5_update($data=array()){

		if ($data)
        {
        
        	$sql = "

        		UPDATE hl_observerform_umpan_terpakai
						   SET 
						   nama_pemantau=".$this->db->escape($data['nama_pemantau']).", 
						   set_nomor=".$this->db->escape($data['set_nomor'])."
						 WHERE 
						 id_trip=".$this->db->escape($data['kode_trip'])." and 
						 seq=".$this->db->escape($data['seq'])."
        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 

	}

	public function form5_delete($kode_trip , $id){


		 return $this->db->query("DELETE from hl_observerform_umpan_terpakai where id_trip ='$kode_trip' and seq = '$id'");


	}


	
	public function add_observerform_umpan_terpakai_detail($data=array()){

		if ($data)
        {

        	$no = $this->Model_master->select_max( "hl_observerform_umpan_terpakai_detail" , array('id_trip' => $data['id_trip'] , 'seq_umpan' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        			$sql = "
 

        			INSERT INTO hl_observerform_umpan_terpakai_detail(
						id_trip, 
						seq_umpan, 
						nomor, 
						kode_species, 
						pakura1_jum, 
						pakura1_ber, 
           				pakura2_jum, 
           				pakura2_ber, 
           				pakura3_jum, 
           				pakura3_ber, 
           				pakura4_jum, 
            			pakura4_ber, 
            			pakura5_jum, 
            			pakura5_ber, 
            			pakura6_jum, 
            			pakura6_ber, 
            			kapal_jum, 
            			kapal_ber            

					            )
					    VALUES (
					    ".$this->db->escape($data['id_trip']).", 
					    ".$this->db->escape($data['seq']).", 
					    '".$no."', 
					    ".$this->db->escape($data['kode_species']).", 
					    ".$this->db->escape($data['pakura1_jum']).", 
						".$this->db->escape($data['pakura1_ber']).",  
           				".$this->db->escape($data['pakura2_jum']).",  
           				".$this->db->escape($data['pakura2_ber']).",  
           				".$this->db->escape($data['pakura3_jum']).",  
           				".$this->db->escape($data['pakura3_ber']).",  
           				".$this->db->escape($data['pakura4_jum']).",  
            			".$this->db->escape($data['pakura4_ber']).",  
            			".$this->db->escape($data['pakura5_jum']).",  
            			".$this->db->escape($data['pakura5_ber']).",  
            			".$this->db->escape($data['pakura6_jum']).",  
            			".$this->db->escape($data['pakura6_ber']).",  
            			".$this->db->escape($data['kapal_jum']).",  
            			".$this->db->escape($data['kapal_ber'])."  
					)
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 



	}


	public function update_observerform_umpan_terpakai_detail($data=array()){

		if ($data)
        {
        
        	$sql = "

        		UPDATE hl_observerform_umpan_terpakai_detail
						   SET 
						    kode_species=".$this->db->escape($data['edit_kode_species']).",
						    pakura1_jum=".$this->db->escape($data['edit_pakura1_jum']).", 
       						pakura1_ber=".$this->db->escape($data['edit_pakura1_ber']).",
       						pakura2_jum=".$this->db->escape($data['edit_pakura2_jum']).", 
       						pakura2_ber=".$this->db->escape($data['edit_pakura2_ber']).", 
       						pakura3_jum=".$this->db->escape($data['edit_pakura3_jum']).", 
       						pakura3_ber=".$this->db->escape($data['edit_pakura3_ber']).", 
       						pakura4_jum=".$this->db->escape($data['edit_pakura4_jum']).", 
       						pakura4_ber=".$this->db->escape($data['edit_pakura4_ber']).", 
       						pakura5_jum=".$this->db->escape($data['edit_pakura5_jum']).", 
       						pakura5_ber=".$this->db->escape($data['edit_pakura5_ber']).", 
       						pakura6_jum=".$this->db->escape($data['edit_pakura6_jum']).", 
       						pakura6_ber=".$this->db->escape($data['edit_pakura6_ber']).",
       						kapal_jum=".$this->db->escape($data['edit_kapal_jum']).", 
       						kapal_ber=".$this->db->escape($data['edit_kapal_ber'])."
       
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_umpan=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 

	}


	public function delete_observerform_umpan_terpakai_detail($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM hl_observerform_umpan_terpakai_detail WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_umpan = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;


	}

	
	public function add_observerform_umpan_terpakai_pemikat($data=array()){

		if ($data)
        {

       
        			$sql = "


        			INSERT INTO hl_observerform_umpan_terpakai_pemikat
        			(
					  id_trip ,
					  seq_umpan,
					  pakura1_pemikat ,
					  pakura2_pemikat ,
					  pakura3_pemikat,
					  pakura4_pemikat ,
					  pakura5_pemikat ,
					  pakura6_pemikat,
					  kapal_pemikat
					)
					    VALUES (
					".$this->db->escape($data['id_trip']).", 
					".$this->db->escape($data['seq']).", 
					".$this->db->escape($data['pakura1_pemikat']).",
					".$this->db->escape($data['pakura2_pemikat']).",
					".$this->db->escape($data['pakura3_pemikat']).",
					".$this->db->escape($data['pakura4_pemikat']).",
					".$this->db->escape($data['pakura5_pemikat']).",
					".$this->db->escape($data['pakura6_pemikat']).",
					".$this->db->escape($data['kapal_pemikat'])."
					
					            )
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 

	}


	public function update_observerform_umpan_terpakai_pemikat($data=array()){

		if ($data)
        {
        
        	$sql = "

        	UPDATE hl_observerform_umpan_terpakai_pemikat
			SET 
			pakura1_pemikat=".$this->db->escape($data['edit_pakura1_pemikat']).",
			pakura2_pemikat=".$this->db->escape($data['edit_pakura2_pemikat']).",
			pakura3_pemikat=".$this->db->escape($data['edit_pakura3_pemikat']).",
			pakura4_pemikat=".$this->db->escape($data['edit_pakura4_pemikat']).",
			pakura5_pemikat=".$this->db->escape($data['edit_pakura5_pemikat']).",
			pakura6_pemikat=".$this->db->escape($data['edit_pakura6_pemikat']).", 
			kapal_pemikat=".$this->db->escape($data['edit_kapal_pemikat'])."
			WHERE id_trip=".$this->db->escape($data['edit_id_trip2'])." 
			and seq_umpan=".$this->db->escape($data['edit_seq2'])."
        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 

	}



	public function delete_observerform_umpan_terpakai_pemikat($id_trip , $seq ){

		if($id_trip){


			$sql = "DELETE FROM hl_observerform_umpan_terpakai_pemikat WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_umpan = ".$this->db->escape($seq).""; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;


	}





	public function form6_add($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$data['lintang'] = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$data['bujur'] = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 


		$sql = "

					INSERT INTO hl_observerform_etp(
					            id_trip, id_pemantau, aktivitas_memancing, tanggal, waktu, 
					            lintang, bujur , jenis_pancing, kode_posisi_pancing, 
					            kode_kondisi_tertangkap, kode_kondisi_tertangkap_deskripsi, kode_kondisi_dilepas, 
					            kode_kondisi_dilepas_deskripsi, tanda)
					    VALUES (".$this->db->escape($data['kode_trip']).", ".$this->db->escape($data['id_pemantau']).", ".$this->db->escape($data['aktivitas_memancing']).", ".$this->db->escape($data['tanggal']).", ".$this->db->escape($data['waktu']).", 
					            ".$this->db->escape($data['lintang']).", ".$this->db->escape($data['bujur']).", ".$this->db->escape($data['jenis_pancing']).", ".$this->db->escape($data['kode_posisi_pancing']).", 
					            ".$this->db->escape($data['kode_kondisi_tertangkap']).", ".$this->db->escape($data['kode_kondisi_tertangkap_deskripsi']).", ".$this->db->escape($data['kode_kondisi_dilepas']).", 
					            ".$this->db->escape($data['kode_kondisi_dilepas_deskripsi']).", ".$this->db->escape($data['tanda']).")

			  	";


			$this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 


			return $getid_; 


	}

	public function form6_update($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$data['lintang'] = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$data['bujur'] = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 


		$sql = "


		UPDATE hl_observerform_etp
		   SET id_pemantau=".$this->db->escape($data['id_pemantau']).", aktivitas_memancing=".$this->db->escape($data['aktivitas_memancing']).", tanggal=".$this->db->escape($data['tanggal']).", 
		       waktu=".$this->db->escape($data['waktu']).", lintang=".$this->db->escape($data['lintang']).", bujur=".$this->db->escape($data['bujur']).", jenis_pancing=".$this->db->escape($data['jenis_pancing']).", 
		       kode_posisi_pancing=".$this->db->escape($data['kode_posisi_pancing']).", kode_kondisi_tertangkap=".$this->db->escape($data['kode_kondisi_tertangkap']).", kode_kondisi_tertangkap_deskripsi=".$this->db->escape($data['kode_kondisi_tertangkap_deskripsi']).", 
		       kode_kondisi_dilepas=".$this->db->escape($data['kode_kondisi_dilepas']).", kode_kondisi_dilepas_deskripsi=".$this->db->escape($data['kode_kondisi_dilepas_deskripsi']).", tanda=".$this->db->escape($data['tanda'])."
		 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq']).";




			  	";


			$this->db->query($sql);

		

			return TRUE; 



	}


	public function form6_delete($kode_trip , $id){


		 return $this->db->query("DELETE from hl_observerform_etp where id_trip ='$kode_trip' and seq = '$id'");


	}


	public function form6_etp_list(){

		 return $this->db->query("SELECT * FROM master_species WHERE  jenis_species in ('Burung' , 'Hiu' , 'Burung' , 'Lumba-lumba')");


	}


	public function json_insert($kode_trip , $id , $data  ){



		$sql = "

		INSERT INTO hl_observerform_etp_detail(
            id_trip, seq_etp, nomor, data_lain )
    				VALUES (".$this->db->escape($kode_trip).", ".$this->db->escape($id).", '3', ".$this->db->escape($data)." );
 "; 

		$this->db->query($sql);

		$this->db->query($sql);

	}


	public function add_observerform_etp_detail($data=array()){

	
		if ($data)
        {

        	$input = array() ; 

        	$col = "data_penyu";

			if($data['tipe'] == 'penyu'){


		
		
				$input = array(
						'species_penyu' => $data['species_penyu'], 
						'sisik_hidung' => $data['sisik_hidung'] , 
						'sisik_leher' => $data['sisik_leher'] , 
						'sisik_kosta' => $data['sisik_kosta'] , 
						'sisik_belakang' => $data['sisik_belakang'] , 
						'no_foto' => $data['no_foto'] , 
						'scl' => $data['scl'] , 
						'cw' => $data['cw'] ,  
						'ccl' => $data['ccl']  , 
						); 

				
				$col = "data_penyu";

			}else{

					$input = array(
						'kode_species' => $data['kode_species'] , 
						'jenis_species' => $data['jenis_species'] , 
						'jenis_kelamin' => $data['jenis_kelamin']  , 
						'foto' => $data['foto'] , 
						'no_foto' => $data['no_foto']  , 
						'panjang' => $data['panjang']  
						); 

				$col = "data_lain";

			}

			$json =  json_encode($input);
        
        	$no = $this->Model_master->select_max( "hl_observerform_etp_detail" , array('id_trip' => $data['id_trip'] , 'seq_etp' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        			$sql = "


        			INSERT INTO hl_observerform_etp_detail(
					            id_trip, seq_etp, nomor, ".$col."  )
					    VALUES (".$this->db->escape($data['id_trip']).", ".$this->db->escape($data['seq']).", '".$no."', ".$this->db->escape($json).")
		
			  	";


			$this->db->query($sql);

			return TRUE; 


        	   }

        return FALSE; 


	}


	public function update_observerform_etp_detail($data=array()){

		if ($data)
        {


        	$input = array() ; 

        	$col = "data_penyu"; 

			if($data['edit_tipe'] == 'penyu'){



				$input = array(
						'species_penyu' => $data['edit_species_penyu'] , 
						'sisik_hidung' => $data['edit_sisik_hidung'] , 
						'sisik_leher' => $data['edit_sisik_leher'] , 
						'sisik_kosta' => $data['edit_sisik_kosta'] , 
						'sisik_belakang' => $data['edit_sisik_belakang'] , 
						'no_foto' => $data['edit_no_foto'] , 
						'scl' => $data['edit_scl'] , 
						'cw' => $data['edit_cw'] ,  
						'ccl' => $data['edit_ccl']  , 
						); 

				$col = "data_penyu"; 


			}else{


				$input = array(
						'kode_species' => $data['edit_kode_species'] , 
						'jenis_species' => $data['edit_jenis_species'] , 
						'jenis_kelamin' => $data['edit_jenis_kelamin']  , 
						'foto' => $data['edit_foto'] , 
						'no_foto' => $data['edit_no_foto2']  , 
						'panjang' => $data['edit_panjang']  
						); 

				$col = "data_lain"; 

			}

			$json =  json_encode($input);
        		$sql = "


        			UPDATE hl_observerform_etp_detail
						   SET ".$col." = ".$this->db->escape($json)."
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_etp=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        	
			  	";


			$this->db->query($sql);

			return TRUE; 


        }

         return FALSE; 

	}

	
	public function delete_observerform_etp_detail($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM hl_observerform_etp_detail WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_etp = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;


	}




	public function removeComma($str){


    	$str = str_replace(",", "", $str);

    	return $str ; 
    }





    public function update_hl_observerform_fg_hilang($data=array()){

		$kode_trip = $data['kode_trip'];

		$table = "hl_observerform_fg_hilang"; 

		$where = array('id_trip' => $kode_trip); 

		
		$sql = "DELETE FROM hl_observerform_fg_hilang WHERE id_trip = ".$this->db->escape($kode_trip)." "; 

		$this->db->query($sql);



		for($i=1;$i<=7;$i++){

				$jenis = "jenis_alat".$i;
				$jumlah = "jumlah_alat".$i;
				$satuan = "satuan_alat".$i;


				$sql = "
					INSERT INTO hl_observerform_fg_hilang(
            		  id_trip,
					  nomor ,
					  jenis_alat, 
					  jumlah_alat, 
					  satuan_alat 
            		)
    				VALUES (
    				".$this->db->escape($data['kode_trip']).", 
            		".$i.", 
            		".$this->db->escape($data[$jenis]).", 
            		".$this->db->escape($data[$jumlah]).", 
            		".$this->db->escape($data[$satuan])." 
            		);" ; 


				$this->db->query($sql);
		}

			$sql = "
					INSERT INTO hl_observerform_fg_hilang(
            		  id_trip,
					  nomor ,
					  jenis_alat, 
					  lainnya 
            		)
    				VALUES (
    				".$this->db->escape($data['kode_trip']).", 
            		8, 
            		".$this->db->escape($data['jenis_alat8']).", 
            		".$this->db->escape($data['lainnya'])." 
            		);" ; 


				$this->db->query($sql);

			

		

		


		return TRUE; 

	}




	public function form8_add($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];



		$sql = "

		INSERT INTO hl_observerform_pemindahan(
            id_trip, nama_kapal, nama_nahkoda, bendera, sipi, tanda_selar, 
		            rfmo, no_rfmo, foto_lambung_kapal, no_foto, tanggal, waktu, lintang, 
		            bujur , 
		            nama_kapal2 , nama_nahkoda2 , bendera2 , sipi2 , tanda_selar2 , rfmo2 , no_rfmo2 , foto_lambung_kapal2 , no_foto2
		             )
		    VALUES (".$this->db->escape($data['kode_trip']).",  ".$this->db->escape($data['nama_kapal']).", ".$this->db->escape($data['nama_nahkoda']).", ".$this->db->escape($data['bendera']).", ".$this->db->escape($data['sipi']).", ".$this->db->escape($data['tanda_selar']).", 
		            ".$this->db->escape($data['rfmo']).", ".$this->db->escape($data['no_rfmo']).", ".$this->db->escape($data['foto_lambung_kapal']).", ".$this->db->escape($data['no_foto']).", ".$this->db->escape($data['tanggal']).", ".$this->db->escape($data['waktu']).", ".$this->db->escape($lintang).", 
		            ".$this->db->escape($bujur)." , 
		            ".$this->db->escape($data['nama_kapal2']).", ".$this->db->escape($data['nama_nahkoda2']).", ".$this->db->escape($data['bendera2']).", ".$this->db->escape($data['sipi2']).", ".$this->db->escape($data['tanda_selar2']).", ".$this->db->escape($data['rfmo2']).",
		            ".$this->db->escape($data['no_rfmo2']).", ".$this->db->escape($data['foto_lambung_kapal2']).", ".$this->db->escape($data['no_foto2'])."
		             )
			
			  	";


			$this->db->query($sql);

			$getid_ = $this->db->insert_id() ; 

			return $getid_; 


	}

	public function form8_update($data=array()){

		$data['tanggal'] = strtotime($data['tanggal'] ); 

		$data['tanggal'] = date("Y-m-d",$data['tanggal']);

		$lintang = $data['lintang_degree'].','.$data['lintang_minutes'].','.$data['lintang_us'];

		$bujur = $data['bujur_degree'].','.$data['bujur_minutes'].','.$data['bujur_us'];

		//$data['waktu'] = $data['jam'].':'.$data['menit'] ; 


		$sql = "

		UPDATE hl_observerform_pemindahan
			   SET nama_kapal=".$this->db->escape($data['nama_kapal']).", nama_nahkoda=".$this->db->escape($data['nama_nahkoda']).", bendera=".$this->db->escape($data['bendera']).", sipi=".$this->db->escape($data['sipi']).", 
			       tanda_selar=".$this->db->escape($data['tanda_selar']).", rfmo=".$this->db->escape($data['rfmo']).", no_rfmo=".$this->db->escape($data['no_rfmo']).", foto_lambung_kapal=".$this->db->escape($data['foto_lambung_kapal']).", no_foto=".$this->db->escape($data['no_foto']).", 
			       tanggal=".$this->db->escape($data['tanggal']).", waktu=".$this->db->escape($data['waktu']).", lintang=".$this->db->escape($lintang).", bujur=".$this->db->escape($bujur)." , 

			      	nama_kapal2 =".$this->db->escape($data['nama_kapal']).",nama_nahkoda2=".$this->db->escape($data['nama_nahkoda2']).", bendera2=".$this->db->escape($data['bendera2']).",
					sipi2=".$this->db->escape($data['sipi2']).",tanda_selar2=".$this->db->escape($data['tanda_selar2']).",
					rfmo2=".$this->db->escape($data['rfmo2']).",no_rfmo2=".$this->db->escape($data['no_rfmo2']).",
					foto_lambung_kapal2=".$this->db->escape($data['foto_lambung_kapal2']).", no_foto2=".$this->db->escape($data['no_foto2'])."

			 WHERE id_trip=".$this->db->escape($data['kode_trip'])." and seq=".$this->db->escape($data['seq'])."

	  	";


			$this->db->query($sql);

		

			return TRUE; 



	}


	public function form8_delete($kode_trip , $id){


		 return $this->db->query("DELETE from hl_observerform_pemindahan where id_trip ='$kode_trip' and seq = '$id'");


	}


	public function add_observerform_pemindahan_detail($data=array()){


			if ($data)
        {

        	$no = $this->Model_master->select_max( "hl_observerform_pemindahan_detail" , array('id_trip' => $data['id_trip'] , 'seq_pindah' =>  $data['seq'] ) , "nomor" )->row_array();
        	$no = $no['max'] + 1; 

        			$sql = "


        			INSERT INTO hl_observerform_pemindahan_detail(
					            id_trip, seq_pindah, nomor, kode_species, tipe_produk, 
					            berat)
					    VALUES (".$this->db->escape($data['id_trip']).", ".$this->db->escape($data['seq']).", '".$no."', ".$this->db->escape($data['kode_species']).", ".$this->db->escape($data['tipe_produk']).", 
					            ".$this->db->escape($data['berat']).")
		
			  	";


			$this->db->query($sql);

			return TRUE; 

        }

        return FALSE; 

	}


	public function update_observerform_pemindahan_detail($data=array()){

		if ($data)
        {
        
        	$sql = "

        		UPDATE hl_observerform_pemindahan_detail
						   SET kode_species=".$this->db->escape($data['edit_kode_species']).", tipe_produk=".$this->db->escape($data['edit_tipe_produk']).", 
						       berat=".$this->db->escape($data['edit_berat'])."
						 WHERE id_trip=".$this->db->escape($data['edit_id_trip'])." and seq_pindah=".$this->db->escape($data['edit_seq'])." and nomor=".$this->db->escape($data['edit_nomor'])."


        		  	";


			$this->db->query($sql);

			return TRUE; 




        	   }

        return FALSE; 


	}

	

	public function delete_observerform_pemindahan_detail($id_trip , $seq , $nomor){

		if($id_trip){


			$sql = "DELETE FROM hl_observerform_pemindahan_detail WHERE id_trip = ".$this->db->escape($id_trip)."  and seq_pindah = ".$this->db->escape($seq)." and nomor = ".$this->db->escape($nomor)." "; 

			$this->db->query($sql);


			return TRUE;

		}

		return FALSE;


	}


	public function update_form9($data=array()){

		$kode_trip = $data['kode_trip'];

		$table = "hl_observerform_laporan"; 

		$where = array('id_trip' => $kode_trip); 

		if( $this->checkExsisting($table , $where , "") == 0 ){


				$sql = "INSERT INTO hl_observerform_laporan(
		            id_trip, 
		            nama_pemantau, 
		            tgl_berangkat, 
		            tgl_kedatangan, 
		            kendala, 
		            perubahan, 
		            masukan )
					    VALUES 
					 (".$this->db->escape($data['kode_trip']).", 
					 ".$this->db->escape($data['nama_pemantau']).", 
					 ".$this->db->escape($data['tgl_berangkat']).", 
					 ".$this->db->escape($data['tgl_kedatangan']).", 
					 ".$this->db->escape($data['kendala']).", 
					 ".$this->db->escape($data['perubahan'])." ,  
					 ".$this->db->escape($data['masukan'])."
					  ) " ; 

		}else{

				$sql = "UPDATE hl_observerform_laporan
						   SET 
						   nama_pemantau = ".$this->db->escape($data['nama_pemantau']).", 
						   tgl_berangkat=".$this->db->escape($data['tgl_berangkat']).", 
						   tgl_kedatangan=".$this->db->escape($data['tgl_kedatangan']).", 
						   kendala=".$this->db->escape($data['kendala']).",
						   perubahan=".$this->db->escape($data['perubahan']).",
						   masukan=".$this->db->escape($data['masukan'])."

						 WHERE id_trip = ".$this->db->escape($data['kode_trip'])." ;
						" ; 



		}

		$this->db->query($sql);


		return TRUE; 



	}


	function tripExtract(){


			$query = $this->db->query("

				SELECT t.id_trip, t.id_vessel, t.id_supplier, call_sign, wcpfc, iotc, csbt, 
			       nama_nahkoda, nama_fishing_master, pelabuhan_keberangkatan, pelabuhan_kedatangan, 
			       tanggal_keberangkatan, tanggal_kedatangan, jumlah_wni, jumlah_wna, 
			       v.vms, kondisi_vms, vts, kondisi_vts, penanganan_diatas_kapal, 
			       cara_penanganan_pasca_panen, foto_kapal, upload_foto, id_user, 
			       tanggal, v.nama_kapal, v.tanda_selar, v.no_sipi,  v.no_siup, v.rfmo, v.tahun_pembuatan_kapal, 
			       v.bendera, v.bahan, v.gt, t.hp, t.panjang_kapal, lebar_kapal, t.changed_by, 
			       t.changed_date, nama_pemantau, id_pemantau, tanggal_pemantau, t.rfmo_choice, 
			       upload_foto_img, 

				CASE
					    WHEN status_trip = '1' THEN 'Approved'
					    WHEN status_trip = '2' THEN 'Draft'
					    ELSE 'None'
					END AS status_trip
	
			        , tipe_data
			  FROM observerform_trip t , master_vessel v , master_supplier s where t.id_supplier = s.id_supplier and t.id_vessel = v.id_vessel
			  and tipe_data = 'HL'
			  order by id_trip 


				");


			return $query ; 

	}





}