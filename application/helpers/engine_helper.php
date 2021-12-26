<?php 
    function cek_session_admin(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        if ($session == ''){
            redirect(base_url());
        }
    }


    function cek_priviledge_return($check){


        $ci = & get_instance();

        $role_data = $ci->session->userdata('role_data');

        $role_name = $ci->session->userdata('role_name');

        if (!array_key_exists($check,$role_data[$role_name])){

                redirect(base_url());

        }

    }


    function cek_priviledge_disable($check){


        $ci = & get_instance();

        $role_data = $ci->session->userdata('role_data');

        $role_name = $ci->session->userdata('role_name');

        if (!array_key_exists($check,$role_data[$role_name])){

                return FALSE;

        }else{

            return TRUE;

        }

    }


    



    function cek_session_akses($link,$id){
    	$ci = & get_instance();
    	$session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    	if ($session == '0' AND $ci->session->userdata('level') != 'admin'){
    		redirect(base_url().'administrator/home');
    	}
    }

    function template(){
        $ci = & get_instance();
        $query = $ci->db->query("SELECT folder FROM templates where aktif='Y'");
        $tmp = $query->row_array();
        if ($query->num_rows()>=1){
            return $tmp['folder'];
        }else{
            return 'errors';
        }
    }