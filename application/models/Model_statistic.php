<?php
class Model_statistic extends CI_Model{



    public function listsProvince(){

        $query = $this->db->query("
				
        SELECT p.id,  p.name , count(id_trip)
            FROM observerform_trip t , 
            master_supplier s , 
            master_vessel v , 
            static_provinces p 
            where 
            t.id_supplier = s.id_supplier and
            t.id_vessel  = v.id_vessel and 
            s.province = p.id  
            group by 1,2
            order by 1,2
            ;

        ");


        return $query;

    }


    public function listsAktivitas(){

        $query = $this->db->query("
                
        SELECT * from master_dictionary where jenis_aktivitas = 'kode_aktivitas'
            order by 1 
            ;

        ");


        return $query;

    }

    public function listsSupplier(){

    
    $supplier_data = json_decode($this->session->userdata('supplier_data')); 
      
    $where_supplier_id_in_ ="";

    if(!empty($supplier_data)){

    if(count($supplier_data) > 0){

    foreach ($supplier_data as $loop) {
                
        $supplier_id .= "'".$loop."',";

        
    }

    $supplier_id = rtrim($supplier_id, ",");

    $where_supplier_id_in_ .= " AND t.id_supplier in ( ".$supplier_id." ) " ;
    
    }

    }


    #list supplier in trips
        $query = $this->db->query("
				
        SELECT  t.id_supplier,  nama_perusahaan  , count(id_trip)
        FROM observerform_trip t , 
        master_supplier s , 
        master_vessel v , 
        static_provinces p 
        where 
      t.id_supplier = s.id_supplier and
      t.id_vessel  = v.id_vessel and 
      s.province = p.id  
      ".$where_supplier_id_in_."
      group by 1,2
      order by 1,2
        ;

        ");


        return $query;

    }


    public function extractYear(){


        $query = $this->db->query("
				
        select extract(YEAR from tanggal_kedatangan::date) as year  from observerform_trip   group by 1 order by 1 ; ");

        return $query;


    }


    public function catchCompSql($tipe,  $kode_perusahaan , $kode_provinsi , $tahun , $bulan, $tanggal){


        $additional1 = "";

        $additional2 = "";

        $additional3 = "";

        $additional4 = "";

        $additional5 = "";

        if($kode_perusahaan != "All"){

            $additional1 = "and t.id_supplier  = '".$kode_perusahaan."' "; 

        }

        if($kode_provinsi != "All"){

            $additional2 = " and s.province = '".$kode_provinsi."' "; 


        }

        if($tahun != "All"){

            $additional3 = " and extract(year from t.tanggal_keberangkatan::date) = '".$tahun."' "; 


        }

        if($bulan != "All"){

            $additional4 = " and extract(month from t.tanggal_keberangkatan::date) = '".$bulan."' "; 


        }

        if($tanggal != "All"){

            $additional5 = " and extract(day from t.tanggal_keberangkatan::date) = '".$tanggal."' "; 


        }


           if($tipe == 'PL'){

            $query = $this->db->query("
            SELECT  concat( p.name ,' - ', nama_perusahaan ) as label,
            kode_species , 
            sum(berat) as total_berat
            FROM observerform_trip t , 
            master_supplier s , 
            master_vessel v , 
            static_provinces p , 
            observerform_tangkapan_detail td 
            where 
            t.id_supplier = s.id_supplier and
            t.id_vessel  = v.id_vessel and 
            s.province = p.id  and 
            t.id_trip = td.id_trip 
            ".$additional1."
            ".$additional2."
            ".$additional3."
            ".$additional4."
            ".$additional5."
            group by 1,2 
            order by 1,2 
            ;
              ;
		");


           }
           
           
           if($tipe == 'HL'){
            $query = $this->db->query("
                             SELECT  concat( p.name ,' - ', nama_perusahaan ) as label,
                            kode_species , 
                            sum(berat) as total_berat
                            FROM observerform_trip t , 
                            master_supplier s , 
                            master_vessel v , 
                            static_provinces p , 
                            hl_observerform_tangkapan_detail td 
                            where 
                            t.id_supplier = s.id_supplier and
                            t.id_vessel  = v.id_vessel and 
                            s.province = p.id  and 
                            t.id_trip = td.id_trip 
                            ".$additional1."
                            ".$additional2."
                            ".$additional3."
                            ".$additional4."
                            ".$additional5."
                            group by 1,2 
                            order by 1,2 
                            ;

                    ");


           }


           return $query; 



    }


    public function baitCompSql($tipe,  $kode_perusahaan , $kode_provinsi,  $tahun , $bulan, $tanggal ){


        $additional1 = "";

        $additional2 = "";

        $additional3 = "";

        $additional4 = "";

        $additional5 = "";

        if($kode_perusahaan != "All"){

            $additional1 = "and t.id_supplier  = '".$kode_perusahaan."' "; 

        }

        if($kode_provinsi != "All"){

            $additional2 = " and s.province = '".$kode_provinsi."' "; 


        }

        if($tahun != "All"){

            $additional3 = " and extract(year from t.tanggal_keberangkatan::date) = '".$tahun."' "; 


        }

        if($bulan != "All"){

            $additional4 = " and extract(month from t.tanggal_keberangkatan::date) = '".$bulan."' "; 


        }

        if($tanggal != "All"){

            $additional5 = " and extract(day from t.tanggal_keberangkatan::date) = '".$tanggal."' "; 


        }


           if($tipe == 'PL'){

            $query = $this->db->query("
			
					SELECT  concat( p.name ,' - ', nama_perusahaan ) as label, 
						kode_species , 
						sum(berat) as total_berat
						  FROM observerform_trip t , 
						  master_supplier s , 
						  master_vessel v , 
						  static_provinces p , 
						  observerform_umpan_detail dt 
						  where 
						t.id_supplier = s.id_supplier and
						t.id_vessel  = v.id_vessel and 
						s.province = p.id  and 
						t.id_trip = dt.id_trip 
						".$additional1."
						".$additional2."
                        ".$additional3."
                        ".$additional4."
                        ".$additional5."
						group by 1,2
						order by 1,2
	
			
		");


           }
           
           
           if($tipe == 'HL'){

            $query = $this->db->query("
			
						SELECT  concat( p.name ,' - ', nama_perusahaan ) as label,
							kode_species , 
							sum(berat) as total_berat
							  FROM observerform_trip t , 
							  master_supplier s , 
							  master_vessel v , 
							  static_provinces p , 
							  hl_observerform_umpan_detail_jumlah dt 
							  where 
							t.id_supplier = s.id_supplier and
							t.id_vessel  = v.id_vessel and 
							s.province = p.id  and 
							t.id_trip = dt.id_trip 
							".$additional1."
							".$additional2."
                            ".$additional3."
                            ".$additional4."
                            ".$additional5."
							group by 1,2
							order by 1,2

						
					

                    ");


           }


           return $query; 



    }



    public function fadUsageSql($tipe,  $kode_perusahaan , $kode_provinsi,  $tahun , $bulan, $tanggal ){


        $additional1 = "";

        $additional2 = "";

        $additional3 = "";

        $additional4 = "";

        $additional5 = "";

        if($kode_perusahaan != "All"){

            $additional1 = "and t.id_supplier  = '".$kode_perusahaan."' "; 

        }

        if($kode_provinsi != "All"){

            $additional2 = " and s.province = '".$kode_provinsi."' "; 


        }

        if($tahun != "All"){

            $additional3 = " and extract(year from t.tanggal_keberangkatan::date) = '".$tahun."' "; 


        }

        if($bulan != "All"){

            $additional4 = " and extract(month from t.tanggal_keberangkatan::date) = '".$bulan."' "; 


        }

        if($tanggal != "All"){

            $additional5 = " and extract(day from t.tanggal_keberangkatan::date) = '".$tanggal."' "; 


        }


           if($tipe == 'PL'){

            $query = $this->db->query("

                        SELECT  concat( p.name ,' - ', nama_perusahaan ) as label, 
                        case 
                        when fad='menetap' then 'Ya' 
                        when fad='hanyut' then 'Ya' 
                        else 'Tidak' 
                        end as kode_species , 
                        sum(berat) as total_berat
                        FROM observerform_trip t , 
                        master_supplier s , 
                        master_vessel v , 
                        static_provinces p , 
                        observerform_tangkapan tg, 
                        observerform_tangkapan_detail dt 
                        where 
                        t.id_supplier = s.id_supplier and
                        t.id_vessel  = v.id_vessel and 
                        s.province = p.id  and 
                        t.id_trip = tg.id_trip  and
                        tg.id_trip = dt.id_trip 
                        ".$additional1."
						".$additional2."
                        ".$additional3."
                        ".$additional4."
                        ".$additional5."
                        group by 1,2
                        order by 1,2
			
		");


           }
           
           
           if($tipe == 'HL'){
            $query = $this->db->query("


                    SELECT  concat( p.name ,' - ', nama_perusahaan ) as label, 
                    case 
                    when fad='Ya' then 'Ya' 
                    when fad='Tidak' then 'Tidak' 
                    else 'Tidak' 
                    end as kode_species , 
                    sum(berat) as total_berat
                    FROM observerform_trip t , 
                    master_supplier s , 
                    master_vessel v , 
                    static_provinces p , 
                    hl_observerform_tangkapan tg, 
                    hl_observerform_tangkapan_detail dt 
                    where 
                    t.id_supplier = s.id_supplier and
                    t.id_vessel  = v.id_vessel and 
                    s.province = p.id  and 
                    t.id_trip = tg.id_trip  and
                    tg.id_trip = dt.id_trip 
                    ".$additional1."
                    ".$additional2."
                    ".$additional3."
                    ".$additional4."
                    ".$additional5."
                    group by 1,2 
                    order by 1,2 

                    ");


           }


           return $query; 



    }



    public function fadCompSql($tipe,  $kode_perusahaan , $kode_provinsi, $tahun , $bulan, $tanggal ){


        $additional1 = "";

        $additional2 = "";

        $additional3 = "";

        $additional4 = "";

        $additional5 = "";

        if($kode_perusahaan != "All"){

            $additional1 = "and t.id_supplier  = '".$kode_perusahaan."' "; 

        }

        if($kode_provinsi != "All"){

            $additional2 = " and s.province = '".$kode_provinsi."' "; 


        }

        if($tahun != "All"){

            $additional3 = " and extract(year from t.tanggal_keberangkatan::date) = '".$tahun."' "; 


        }

        if($bulan != "All"){

            $additional4 = " and extract(month from t.tanggal_keberangkatan::date) = '".$bulan."' "; 


        }

        if($tanggal != "All"){

            $additional5 = " and extract(day from t.tanggal_keberangkatan::date) = '".$tanggal."' "; 


        }


           if($tipe == 'PL'){

            $query = $this->db->query("

                        SELECT  concat( p.name ,' - ', nama_perusahaan ) as label, 
                        case 
                        when fad='menetap' then 'Ya' 
                        when fad='hanyut' then 'Ya' 
                        else 'Tidak' 
                        end as fad_select , 
                        kode_species , 
                        sum(berat) as total_berat
                        FROM observerform_trip t , 
                        master_supplier s , 
                        master_vessel v , 
                        static_provinces p , 
                        observerform_tangkapan tg, 
                        observerform_tangkapan_detail dt 
                        where 
                        t.id_supplier = s.id_supplier and
                        t.id_vessel  = v.id_vessel and 
                        s.province = p.id  and 
                        t.id_trip = tg.id_trip  and
                        tg.id_trip = dt.id_trip 
                        ".$additional1."
						".$additional2."
                        ".$additional3."
                        ".$additional4."
                        ".$additional5."
                        group by 1,2,3
                        order by 1,2,3
			
		");


           }
           
           
           if($tipe == 'HL'){
            $query = $this->db->query("


                    SELECT  concat( p.name ,' - ', nama_perusahaan ) as label, 
                    case 
                    when fad='Ya' then 'Ya' 
                    when fad='Tidak' then 'Tidak' 
                    else 'Tidak' 
                    end as fad_select , 
                    kode_species , 
                    sum(berat) as total_berat
                    FROM observerform_trip t , 
                    master_supplier s , 
                    master_vessel v , 
                    static_provinces p , 
                    hl_observerform_tangkapan tg, 
                    hl_observerform_tangkapan_detail dt 
                    where 
                    t.id_supplier = s.id_supplier and
                    t.id_vessel  = v.id_vessel and 
                    s.province = p.id  and 
                    t.id_trip = tg.id_trip  and
                    tg.id_trip = dt.id_trip 
                    ".$additional1."
					".$additional2."
                    ".$additional3."
                    ".$additional4."
                    ".$additional5."
                    group by 1,2,3
                    order by 1,2,3

                    ");


           }


           return $query; 



    }


    public function vesselNtripSql(  $kode_perusahaan , $kode_provinsi , $tahun , $bulan, $tanggal, $tipe_alat){

        $additional1 = "";

        $additional2 = "";

        $additional3 = "";

        $additional4 = "";

        $additional5 = "";

        $additional6 = "";

        if($kode_perusahaan != "All"){

            $additional1 = "and t.id_supplier  = '".$kode_perusahaan."' "; 

        }

        if($kode_provinsi != "All"){

            $additional2 = " and s.province = '".$kode_provinsi."' "; 


        }

        if($tahun != "All"){

            $additional3 = " and extract(year from t.tanggal_keberangkatan::date) = '".$tahun."' "; 


        }

        if($bulan != "All"){

            $additional4 = " and extract(month from t.tanggal_keberangkatan::date) = '".$bulan."' "; 


        }

        if($tanggal != "All"){

            $additional5 = " and extract(day from t.tanggal_keberangkatan::date) = '".$tanggal."' "; 


        }

        if($tipe_alat != "All"){

            $additional6 = " and t.tipe_data = '".$tipe_alat."' "; 
        }


        $query = $this->db->query("

                    SELECT  concat( p.name ,' - ', nama_perusahaan ) as label,  count(id_trip) as trip
                    FROM observerform_trip t , 
                    master_supplier s , 
                    master_vessel v , 
                    static_provinces p 
                    where 
                        t.id_supplier = s.id_supplier and
                        t.id_vessel  = v.id_vessel and 
                        s.province = p.id  
                            ".$additional1."
							".$additional2."
                            ".$additional3."
                            ".$additional4."
                            ".$additional5."
                            ".$additional6."
                        group by 1 
                        order by 1 

        ");


        return $query; 

    }


    public function pingCatatanSql($tipe , $kode_perusahaan , $kode_provinsi, $date , $isDate,  $kode_aktivitas , $alat_tangkap ){

        $additional1 = "";

        $additional2 = "";

        $additional3 = "";

        $additional4 = "";

        $additional5 = "";

        if($kode_perusahaan != "All"){

            $additional1 = "and t.id_supplier  = '".$kode_perusahaan."' "; 

        }

        if($kode_provinsi != "All"){

            $additional2 = " and s.province = '".$kode_provinsi."' "; 


        }


        if( $isDate == "false" ){


            $date = explode(" to ", $date); 

            $additional3 = " and  dt.tanggal between '".$date[0]."' and '".$date[1]."' "; 


        }

        if( $kode_aktivitas != "All"){

            $additional4 = " and dt.kode_aktivitas = '".$kode_aktivitas."' "; 

        }

        if( $alat_tangkap != "All"){

            $additional5 = " and t.tipe_data = '".$alat_tangkap."' "; 

        }


        if($tipe == 'PL'){

            $query = $this->db->query("

            SELECT  concat( p.name ,' - ', nama_perusahaan ) as label, 
            dt.tanggal , 
            lintang, 
            bujur, 
            kode_aktivitas 
              FROM observerform_trip t , 
              master_supplier s , 
              master_vessel v , 
              static_provinces p , 
              observerform_catatan_harian dt 
              where 
            t.id_supplier = s.id_supplier and
            t.id_vessel  = v.id_vessel and 
            s.province = p.id  and 
            t.id_trip = dt.id_trip 
            ".$additional1."
            ".$additional2."
            ".$additional3."
            ".$additional4."
            ".$additional5."
            order by 1,2,3
                    ;

        ");
            

        }



        if($tipe == 'HL'){


            $query = $this->db->query("

                    SELECT  concat( p.name ,' - ', nama_perusahaan ) as label, 
                    dt.tanggal , 
                    lintang, 
                    bujur, 
                    kode_aktivitas 
                    FROM observerform_trip t , 
                    master_supplier s , 
                    master_vessel v , 
                    static_provinces p , 
                    hl_observerform_catatan_harian dt 
                    where 
                    t.id_supplier = s.id_supplier and
                    t.id_vessel  = v.id_vessel and 
                    s.province = p.id  and 
                    t.id_trip = dt.id_trip 
                    ".$additional1."
                    ".$additional2."
                    ".$additional3."
                    ".$additional4."
                    ".$additional5."
                    order by 1,2,3;

                ");



        }

        


        return $query; 




    }


    public function lengthNWeightSql($tipe,  $kode_perusahaan , $kode_provinsi , $tahun , $bulan, $tanggal){


        $additional1 = "";

        $additional2 = "";

        $additional3 = "";

        $additional4 = "";

        $additional5 = "";

        if($kode_perusahaan != "All"){

            $additional1 = "and t.id_supplier  = '".$kode_perusahaan."' "; 

        }

        if($kode_provinsi != "All"){

            $additional2 = " and s.province = '".$kode_provinsi."' "; 


        }

        if($tahun != "All"){

            $additional3 = " and extract(year from t.tanggal_keberangkatan::date) = '".$tahun."' "; 


        }

        if($bulan != "All"){

            $additional4 = " and extract(month from t.tanggal_keberangkatan::date) = '".$bulan."' "; 


        }

        if($tanggal != "All"){

            $additional5 = " and extract(day from t.tanggal_keberangkatan::date) = '".$tanggal."' "; 


        }


        if($tipe == 'PL'){

            $query = $this->db->query("

                    SELECT concat( p.name ,' - ', nama_perusahaan ) as label,
                    kode_species , 
                    td.panjang,
                    round(sum(((td.panjang)^0.0193)*2.984)) as berat ,
                    count(t.id_trip)
                    FROM observerform_trip t , 
                    master_supplier s , 
                    master_vessel v , 
                    static_provinces p , 
                    observerform_tangkapan_detail td 
                    where 
                    t.id_supplier = s.id_supplier and
                    t.id_vessel  = v.id_vessel and 
                    s.province = p.id  and 
                    t.id_trip = td.id_trip 
                    ".$additional1."
                    ".$additional2." 
                    ".$additional3."
                    ".$additional4."
                    ".$additional5."
                    group by 1,2,3 
                    order by 1,2,3 
                    ;

        ");
            

        }



        if($tipe == 'HL'){


            $query = $this->db->query("
            SELECT concat( p.name ,' - ', nama_perusahaan ) as label,
                kode_species , 
                td.panjang,
                round(sum(((td.panjang)^0.0193)*2.984)) as berat ,
                count(t.id_trip)
                FROM observerform_trip t , 
                master_supplier s , 
                master_vessel v , 
                static_provinces p , 
                hl_observerform_tangkapan_detail td 
                where 
                t.id_supplier = s.id_supplier and
                t.id_vessel  = v.id_vessel and 
                s.province = p.id  and 
                t.id_trip = td.id_trip
                ".$additional1."
			    ".$additional2." 
                ".$additional3."
                ".$additional4."
                ".$additional5."
                group by 1,2,3
                order by 1,2,3
                ;

                ");



        }

        


        return $query; 






    }

    

    public function lengthFreqSql($tipe,  $kode_perusahaan , $kode_provinsi , $tahun , $bulan, $tanggal){
        
        $additional1 = "";

        $additional2 = "";

        $additional3 = "";

        $additional4 = "";

        $additional5 = "";

        if($kode_perusahaan != "All"){

            $additional1 = "and t.id_supplier  = '".$kode_perusahaan."' "; 

        }

        if($kode_provinsi != "All"){

            $additional2 = " and s.province = '".$kode_provinsi."' "; 


        }

        if($tahun != "All"){

            $additional3 = " and extract(year from t.tanggal_keberangkatan::date) = '".$tahun."' "; 


        }

        if($bulan != "All"){

            $additional4 = " and extract(month from t.tanggal_keberangkatan::date) = '".$bulan."' "; 


        }

        if($tanggal != "All"){

            $additional5 = " and extract(day from t.tanggal_keberangkatan::date) = '".$tanggal."' "; 


        }


        if($tipe == 'PL'){

            $query = $this->db->query("

            SELECT  concat( p.name ,' - ', nama_perusahaan ) as label,
                    kode_species , 
                    td.panjang ,
                    count(td.id_trip)
                    FROM observerform_trip t , 
                    master_supplier s , 
                    master_vessel v , 
                    static_provinces p , 
                    observerform_tangkapan_detail td 
                    where 
                    t.id_supplier = s.id_supplier and
                    t.id_vessel  = v.id_vessel and 
                    s.province = p.id  and 
                    t.id_trip = td.id_trip 
                    ".$additional1."
                    ".$additional2."
                    group by 1,2,3 
                    order by 1,2,3 
                    ;

            ");

        }


        if($tipe == 'HL'){

            $query = $this->db->query("

            SELECT concat( p.name ,' - ', nama_perusahaan ) as label,
                    kode_species , 
                    td.panjang ,
                    count(td.id_trip)
                    FROM observerform_trip t , 
                    master_supplier s , 
                    master_vessel v , 
                    static_provinces p , 
                    hl_observerform_umpan_detail_panjang td 
                    where 
                    t.id_supplier = s.id_supplier and
                    t.id_vessel  = v.id_vessel and 
                    s.province = p.id  and 
                    t.id_trip = td.id_trip
                    ".$additional1."
                    ".$additional2." 
                    group by 1,2,3 
                    order by 1,2,3 
                    ;


            ");

        }



        return $query; 

    }

}

?>
	