<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kawasan Controller
*| --------------------------------------------------------------------------
*| Kawasan site
*|
*/
class Kawasan extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_kawasan');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Kawasans
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('kawasan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kawasans'] 		= $this->model_kawasan->get($filter, $field, $this->limit_page, $offset);
		$this->data['kawasan_counts'] 	= $this->model_kawasan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kawasan/index/',
			'total_rows'   => $this->data['kawasan_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kawasan List');
		$this->render('backend/standart/administrator/kawasan/kawasan_list', $this->data);
	}
	
	/**
	* Add new kawasans
	*
	*/
	public function add() {
		$this->is_allowed('kawasan_add');

		$this->template->title('Kawasan New');
		$this->render('backend/standart/administrator/kawasan/kawasan_add', $this->data);
	}

	/**
	* Add New Kawasans
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('kawasan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('kawasan_nama', 'Input Kawasan', 'trim|required|max_length[255]');

		if ($this->form_validation->run()) {
			$save_data = [
				'kawasan_nama' 			=> $this->input->post('kawasan_nama'),
				'kawasan_user_created' 	=> get_user_data('id'),
				'kawasan_created_at' 	=> date('Y-m-d H:i:s'),
			];

			$save_kawasan = $id = $this->model_kawasan->store($save_data);

			if ($save_kawasan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kawasan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kawasan/edit/' . $save_kawasan, 'Edit Kawasan'),
						anchor('administrator/kawasan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kawasan/edit/' . $save_kawasan, 'Edit Kawasan')
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kawasan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kawasan');
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
	* Update view Kawasans
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('kawasan_update');

		$this->data['kawasan'] = $this->model_kawasan->find($id);

		$this->template->title('Kawasan Update');
		$this->render('backend/standart/administrator/kawasan/kawasan_update', $this->data);
	}

	/**
	* Update Kawasans
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('kawasan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('kawasan_nama', 'Input Kawasan', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'kawasan_nama' 			=> $this->input->post('kawasan_nama'),
				'kawasan_user_updated' 	=> get_user_data('id'),
				'kawasan_updated_at' 	=> date('Y-m-d H:i:s'),
			];
			
			$save_kawasan = $this->model_kawasan->change($id, $save_data);

			if ($save_kawasan) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kawasan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kawasan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kawasan');
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
	* delete Kawasans
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('kawasan_delete');

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
            set_message(cclang('has_been_deleted', 'kawasan'), 'success');
        } else {
            set_message(cclang('error_delete', 'kawasan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kawasans
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('kawasan_view');

		$this->data['kawasan'] = $this->model_kawasan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kawasan Detail');
		$this->render('backend/standart/administrator/kawasan/kawasan_view', $this->data);
	}
	
	/**
	* delete Kawasans
	*
	* @var $id String
	*/
	private function _remove($id) {
		$kawasan = $this->model_kawasan->find($id);
		
		return $this->model_kawasan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('kawasan_export');

		$this->model_kawasan->export(
			'kawasan', 
			'kawasan',
			$this->model_kawasan->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('kawasan_export');

		$this->model_kawasan->pdf('kawasan', 'kawasan');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('kawasan_export');

		$table = $title = 'kawasan';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_kawasan->find($id);
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

	
}


/* End of file kawasan.php */
/* Location: ./application/controllers/administrator/Kawasan.php */