<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class klub_model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getDataKlub()
		{
			$this->db->select("id,nama,logo");
			$query = $this->db->get('klub');
			return $query->result();
		}

		public function getDataKlubId($id)
		{
			$this->db->select("id,nama,logo");
			$this->db->where('id', $id);	
			$query = $this->db->get('klub');
			return $query->result();
		}

		public function insertKlub()
		{
			$object = array(
				'nama' => $this->input->post('nama'),
				'logo' => $this->upload->data('file_name')
				);
			$this->db->insert('klub', $object);
		}

		public function getPemainByKlub($idKlub)
		{
			$this->db->select("pemain.id as idpemain,pemain.nama as pemain, posisi ,DATE_FORMAT(tanggal_lahir,'%d-%m-%Y') as tanggalLahir, klub.nama as klub, fk_klub");
			$this->db->where('fk_klub', $idKlub);	
			$this->db->join('klub', 'klub.id = pemain.fk_klub', 'left');	
			$query = $this->db->get('pemain');
			return $query->result();
		}
		public function getPemainID($id)
		{
			$this->db->select("pemain.nama as pemain, posisi ,DATE_FORMAT(tanggal_lahir,'%d-%m-%Y') as tanggalLahir");
			$this->db->where('id', $id);
			$query = $this->db->get('pemain');
			return $query->result();
		}

		public function insertPemain($fkklub)
		{
			$object = array(
				'nama' => $this->input->post('nama'),
				'posisi' => $this->input->post('posisi'),
				'tanggal_lahir' => $this->input->post('tanggalLahir'),
				'fk_klub' => $fkklub
				);
			$this->db->insert('pemain', $object);
		}



		public function updateById($id)
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				'logo' => $this->upload->data('file_name')
				);
			$this->db->where('id', $id);
			$this->db->update('klub', $data);
		}

		public function deleteById($id)
		{
			$this -> db -> where('id', $id);
  			$this -> db -> delete('klub');
		}

		public function deleteByIdPemain($id)
		{
			$this -> db -> where('id', $id);
  			$this -> db -> delete('pemain');
		}
		public function updateByIdPemain($id)
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				'posisi' => $this->input->post('posisi'),
				'tanggal_lahir' => $this->input->post('tanggalLahir')
				);
			$this->db->where('id', $id);
			$this->db->update('pemain', $data);
		}









}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>