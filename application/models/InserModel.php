<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class InserModel extends CI_Model
{
    public function __construct()
	{
	parent::__construct();
    //$this->load->library('encrypt');
    //$this->load->library('encrypt');
    
    }
    function insert_api($data)
    {
        //return 234;
        $this->db->insert('logins', $data);
        if($this->db->affected_rows() > 0)
        {
        return true;
        }
        else
        {
        return false;
        }
    }
    function getUsers()
    {
        //return 234;
        $res=$this->db->get('logins')->result();

        $data=array(
			'statusCode' =>200,
			'status' =>'get data Successfully',
			'data'  => $res
        );
        //$data=$this->encrypt->encode($data);
        return $data;
    }

}