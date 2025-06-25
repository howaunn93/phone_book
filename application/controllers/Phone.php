<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phone extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Phone_model');
		}

	public function index(){
		$q = $this->input->get('q', TRUE);
		$q = ($q !== null) ? urldecode($q) : null;
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config = array(
				"base_url"	=> base_url() . 'phone/index?q=' . urlencode($q),
				"first_url"	=> base_url() . 'phone/index?q=' . urlencode($q)
			);
		} else {
			$config = array(
				"base_url"	=> base_url() . 'phone/index',
				"first_url"	=> base_url() . 'phone/index'
			);
		}
		$config['full_tag_open']    		= '<ul class="pagination justify-content-center">';
		$config['full_tag_close']   		= '</ul>';
		$config['num_tag_open']     		= '<li class="page-item">';
		$config['num_tag_close']    		= '</li>';
		$config['cur_tag_open']     		= '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']    		= '</a></li>';
		$config['next_tag_open']    		= '<li class="page-item">';
		$config['next_tag_close']   		= '</li>';
		$config['prev_tag_open']    		= '<li class="page-item">';
		$config['prev_tag_close']   		= '</li>';
		$config['first_tag_open']   		= '<li class="page-item">';
		$config['first_tag_close']  		= '</li>';
		$config['last_tag_open']    		= '<li class="page-item">';
		$config['last_tag_close']   		= '</li>';
		$config['attributes'] 					= array('class' => 'page-link');
		$config['per_page'] 						= 10;
		$config['page_query_string'] 		= TRUE;
		$config['query_string_segment'] = 'start';
		$config['total_rows'] 					= $this->Phone_model->total_rows($q);
		
		$list_data = $this->Phone_model->get_limit_data($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			"list_data"			=> $list_data,
			"q"							=> $q,
			"pagination"		=> $this->pagination->create_links(),
			"total_rows"		=> $config['total_rows'],
			"start"					=> $start,
		);

		$this->load->view('phonebook/index', $data);
	}

	public function add(){
		$data = array(
			"type"			=> "Add",
			"action"		=> "phone/add_action",
			"id"				=> set_value('id'),
			"name"			=> set_value('name'),
			"phone"			=> set_value('phone'),
			"status"		=> "1",
		);
		$this->load->view('phonebook/form', $data);
	}

	public function add_action(){
		$data = array(
			"name"			=> $this->input->post('name'),
	 		"phone"			=> $this->input->post('phone'),
			"status"		=> $this->input->post('status'),
			"active"		=> 1,
		);
		if($this->Phone_model->insert($data)){
			$this->session->set_flashdata('add_success', 'Contact added successfully!');
		}else{
			$this->session->set_flashdata('add_error', 'Failed to add contact.');
		}
		redirect(site_url("phone"));
	}

	public function edit($id){
		$dat = $this->Phone_model->get_by_id($id);
		$data = array(
			"type"		=> "Edit",
			"action"	=> "phone/edit_action",
			"id"			=> $dat->id,
			"name"		=> $dat->name,
			"phone"		=> $dat->phone,
			"status"	=> $dat->status,
		);
		$this->load->view('phonebook/form', $data);
	}

	public function edit_action(){
		$id = $this->input->post('id');
		$data = array(
			"name"			=> $this->input->post('name'),
	 		"phone"			=> $this->input->post('phone'),
			"status"		=> $this->input->post('status'),
			"active"		=> 1,
		);
		if($this->Phone_model->update($id, $data)){
			$this->session->set_flashdata('edit_success', 'Contact updated successfully!');
		}else{
			$this->session->set_flashdata('edit_error', 'Failed to update contact.');
		}
		redirect(site_url("phone"));
 	}

	public function view($id){
		$dat = $this->Phone_model->get_by_id($id);
		$data = array(
			"type"		=> "View",
			"action"	=> "phone/edit_action",
			"id"			=> $dat->id,
			"name"		=> $dat->name,
			"phone"		=> $dat->phone,
			"status"	=> $dat->status,
		);
		$this->load->view('phonebook/form', $data);
	}

	public function delete($id){
		$data['active'] = 0;
		if($this->Phone_model->update($id, $data)){
			$this->session->set_flashdata('delete_success', 'Contact deleted successfully!');
		}else{
			$this->session->set_flashdata('delete_error', 'Failed to delete contact.');
		}
		redirect(site_url("phone"));
 	}

}
