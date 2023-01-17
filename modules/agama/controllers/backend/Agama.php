<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Agama Controller
*| --------------------------------------------------------------------------
*| Agama site
*|
*/
class Agama extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_agama');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Agamas
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('agama_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['agamas'] 		= $this->model_agama->get($filter, $field, $this->limit_page, $offset);
		$this->data['agama_counts'] = $this->model_agama->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/agama/index/',
			'total_rows'   => $this->data['agama_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Agama List');
		$this->render('backend/standart/administrator/agama/agama_list', $this->data);
	}
	
	/**
	* Add new agamas
	*
	*/
	public function add() {
		$this->is_allowed('agama_add');

		$this->template->title('Agama New');
		$this->render('backend/standart/administrator/agama/agama_add', $this->data);
	}

	/**
	* Add New Agamas
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('agama_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('agama_nama', 'Nama Agama', 'trim|required|max_length[255]');

		if ($this->form_validation->run()) {
			$save_data = [
				'agama_nama' 			=> $this->input->post('agama_nama'),
				'agama_user_created' 	=> get_user_data('id'),
				'agama_created_at' 		=> date('Y-m-d H:i:s'),
			];

			$save_agama = $id = $this->model_agama->store($save_data);

			if ($save_agama) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_agama;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/agama/edit/' . $save_agama, 'Edit Agama'),
						anchor('administrator/agama', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/agama/edit/' . $save_agama, 'Edit Agama')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/agama');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/agama');
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
	* Update view Agamas
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('agama_update');

		$this->data['agama'] = $this->model_agama->find($id);

		$this->template->title('Agama Update');
		$this->render('backend/standart/administrator/agama/agama_update', $this->data);
	}

	/**
	* Update Agamas
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('agama_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('agama_nama', 'Nama Agama', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'agama_nama' 			=> $this->input->post('agama_nama'),
				'agama_user_updated' 	=> get_user_data('id'),
				'agama_updated_at' 		=> $this->input->post('agama_updated_at'),
			];

			$save_agama = $this->model_agama->change($id, $save_data);

			if ($save_agama) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/agama', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/agama');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/agama');
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
	* delete Agamas
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('agama_delete');

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
            set_message(cclang('has_been_deleted', 'agama'), 'success');
        } else {
            set_message(cclang('error_delete', 'agama'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Agamas
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('agama_view');

		$this->data['agama'] = $this->model_agama->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Agama Detail');
		$this->render('backend/standart/administrator/agama/agama_view', $this->data);
	}
	
	/**
	* delete Agamas
	*
	* @var $id String
	*/
	private function _remove($id) {
		$agama = $this->model_agama->find($id);
		
		return $this->model_agama->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('agama_export');

		$this->model_agama->export(
			'agama', 
			'agama',
			$this->model_agama->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('agama_export');

		$this->model_agama->pdf('agama', 'agama');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('agama_export');

		$table = $title = 'agama';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_agama->find($id);
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


/* End of file agama.php */
/* Location: ./application/controllers/administrator/Agama.php */