<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Phone_model extends CI_Model {

		public $table = 'phone_book';

    function __construct(){
			parent::__construct();
    }

		function get_limit_data($limit, $start=0, $q=null){
			$this->db->order_by('id', 'DESC');
			$this->db->where("active", 1);
			if($q){
				$this->db->like('name', $q);
				$this->db->or_like('phone', $q);
			}
			$this->db->limit($limit, $start);
			return $this->db->get($this->table)->result();
		}

		function total_rows($q=null){
			if($q){
				$this->db->like('name', $q);
				$this->db->or_like('phone', $q);
			}
			$this->db->where("active", 1);
			$this->db->from($this->table);
			return $this->db->count_all_results();
		}

    function insert($data){
			$this->db->insert($this->table, $data);
			return true;
    }

		function update($id, $data){
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
			return true;
		}

		function get_by_id($id){
			$this->db->where('id', $id);
      return $this->db->get($this->table)->row();
		}

}