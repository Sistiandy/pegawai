<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai_model extends CI_Model {
	private $table_name; 
	
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'pegawai'; 
	}

	function create_data($data)
	{
	  	$this->db->insert($this->table_name, $data);
                redirect('pegawai/index');
	}
	
	function read_data() 
	{
		$sql = $this->db->get($this->table_name);
	  	if($sql->num_rows() > 0){			
			foreach($sql->result() as $row){
				$data[] = $row;
			}			
			return $data;
		} else {
			return null;
		}
	}
	
	function update($id, $pegawai) {
            
            $this->db->where('id', $id);
            $this->db->update($this->table_name, $pegawai);
            }
            
	function delete_data($kode) 
	{
	  	$this->db->where('id', $kode);
	  	$this->db->delete($this->table_name);
		if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}	  	
	}
	
	function get_data($id)
	{
	$this->db->select('id, nama,alamat,email,no_telp');
        $this->db->where('id', $id);
        $res = $this->db->get($this->table_name);
		return $res->row_array();
	}	
	
}