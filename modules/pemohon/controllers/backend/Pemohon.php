<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Pemohon Controller
*| --------------------------------------------------------------------------
*| Pemohon site
*|
*/
class Pemohon extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_pemohon');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Pemohons
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('pemohon_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['pemohons'] = $this->model_pemohon->get($filter, $field, $this->limit_page, $offset);
		$this->data['pemohon_counts'] = $this->model_pemohon->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/pemohon/index/',
			'total_rows'   => $this->data['pemohon_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Pemohon List');
		$this->render('backend/standart/administrator/pemohon/pemohon_list', $this->data);
	}
	
	/**
	* Add new pemohons
	*
	*/
	public function add()
	{
		$this->is_allowed('pemohon_add');

		$this->template->title('Pemohon New');
		$this->render('backend/standart/administrator/pemohon/pemohon_add', $this->data);
	}

	/**
	* Add New Pemohons
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('pemohon_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('pemohon_nama', 'Nama Pemohon', 'trim|required|max_length[65]');
		

		$this->form_validation->set_rules('pemohon_jenkel', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('pemohon_alamat', 'Alamat', 'trim|required');
		

		$this->form_validation->set_rules('pemohon_rt', 'RT', 'trim|required');
		

		$this->form_validation->set_rules('pemohon_rw', 'RW', 'trim|required');
		

		$this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('kelurahan_id', 'Kelurahan', 'trim|required');
		

		$this->form_validation->set_rules('agama_id', 'Agama', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'user_id' => $this->input->post('user_id'),
				'pemohon_nama' => $this->input->post('pemohon_nama'),
				'pemohon_jenkel' => $this->input->post('pemohon_jenkel'),
				'pemohon_alamat' => $this->input->post('pemohon_alamat'),
				'pemohon_rt' => $this->input->post('pemohon_rt'),
				'pemohon_rw' => $this->input->post('pemohon_rw'),
				'kecamatan_id' => $this->input->post('kecamatan_id'),
				'kelurahan_id' => $this->input->post('kelurahan_id'),
				'agama_id' => $this->input->post('agama_id'),
				'pemohon_created_at' => $this->input->post('pemohon_created_at'),
				'pemohon_user_id' => get_user_data('id'),			];

			
			



			
			
			$save_pemohon = $id = $this->model_pemohon->store($save_data);
            

			if ($save_pemohon) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_pemohon;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/pemohon/edit/' . $save_pemohon, 'Edit Pemohon'),
						anchor('administrator/pemohon', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/pemohon/edit/' . $save_pemohon, 'Edit Pemohon')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pemohon');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/pemohon');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Pemohons
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('pemohon_update');

		$this->data['pemohon'] = $this->model_pemohon->find($id);

		$this->template->title('Pemohon Update');
		$this->render('backend/standart/administrator/pemohon/pemohon_update', $this->data);
	}

	/**
	* Update Pemohons
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('pemohon_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('pemohon_nama', 'Nama Pemohon', 'trim|required|max_length[65]');
		

		$this->form_validation->set_rules('pemohon_jenkel', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('pemohon_alamat', 'Alamat', 'trim|required');
		

		$this->form_validation->set_rules('pemohon_rt', 'RT', 'trim|required');
		

		$this->form_validation->set_rules('pemohon_rw', 'RW', 'trim|required');
		

		$this->form_validation->set_rules('kecamatan_id', 'Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('kelurahan_id', 'Kelurahan', 'trim|required');
		

		$this->form_validation->set_rules('agama_id', 'Agama', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'pemohon_nama' => $this->input->post('pemohon_nama'),
				'pemohon_jenkel' => $this->input->post('pemohon_jenkel'),
				'pemohon_alamat' => $this->input->post('pemohon_alamat'),
				'pemohon_rt' => $this->input->post('pemohon_rt'),
				'pemohon_rw' => $this->input->post('pemohon_rw'),
				'kecamatan_id' => $this->input->post('kecamatan_id'),
				'kelurahan_id' => $this->input->post('kelurahan_id'),
				'agama_id' => $this->input->post('agama_id'),
			];

			

			


			
			
			$save_pemohon = $this->model_pemohon->change($id, $save_data);

			if ($save_pemohon) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/pemohon', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pemohon');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/pemohon');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Pemohons
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('pemohon_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'pemohon'), 'success');
        } else {
            set_message(cclang('error_delete', 'pemohon'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Pemohons
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('pemohon_view');

		$this->data['pemohon'] = $this->model_pemohon->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Pemohon Detail');
		$this->render('backend/standart/administrator/pemohon/pemohon_view', $this->data);
	}
	
	/**
	* delete Pemohons
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$pemohon = $this->model_pemohon->find($id);

		
		
		return $this->model_pemohon->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('pemohon_export');

		$this->model_pemohon->export(
			'pemohon', 
			'pemohon',
			$this->model_pemohon->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('pemohon_export');

		$this->model_pemohon->pdf('pemohon', 'pemohon');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('pemohon_export');

		$table = $title = 'pemohon';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_pemohon->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	public function ajax_kecamatan_id($id = null)
	{
		if (!$this->is_allowed('pemohon_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		$results = db_get_all_data('kecamatan', ['kecamatan_id' => $id]);
		$this->response($results);	
	}

	public function ajax_kelurahan_id($id = null)
	{
		if (!$this->is_allowed('pemohon_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		$results = db_get_all_data('kelurahan', ['kecamatan_id' => $id]);
		$this->response($results);	
	}

	public function ajax_agama_id($id = null)
	{
		if (!$this->is_allowed('pemohon_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		$results = db_get_all_data('agama', ['agama_id' => $id]);
		$this->response($results);	
	}

	
}


/* End of file pemohon.php */
/* Location: ./application/controllers/administrator/Pemohon.php */