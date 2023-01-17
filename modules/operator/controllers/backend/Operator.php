<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Operator Controller
*| --------------------------------------------------------------------------
*| Operator site
*|
*/
class Operator extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_operator');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Operators
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('operator_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['operators'] = $this->model_operator->get($filter, $field, $this->limit_page, $offset);
		$this->data['operator_counts'] = $this->model_operator->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/operator/index/',
			'total_rows'   => $this->data['operator_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Operator List');
		$this->render('backend/standart/administrator/operator/operator_list', $this->data);
	}
	
	/**
	* Add new operators
	*
	*/
	public function add() {
		$this->is_allowed('operator_add');

		$this->template->title('Operator New');
		$this->render('backend/standart/administrator/operator/operator_add', $this->data);
	}

	/**
	* Add New Operators
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('operator_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('operator_nama', 'Nama Operator', 'trim|required|max_length[255]');

		if ($this->form_validation->run()) {
			$save_data = [
				'operator_nama' 		=> $this->input->post('operator_nama'),
				'operator_created_at' 	=> date('Y-m-d H:i:s'),
				'operator_user_created' => get_user_data('id'),
			];
			
			$save_operator = $id = $this->model_operator->store($save_data);

			if ($save_operator) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_operator;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/operator/edit/' . $save_operator, 'Edit Operator'),
						anchor('administrator/operator', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/operator/edit/' . $save_operator, 'Edit Operator')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/operator');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/operator');
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
	* Update view Operators
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('operator_update');

		$this->data['operator'] = $this->model_operator->find($id);

		$this->template->title('Operator Update');
		$this->render('backend/standart/administrator/operator/operator_update', $this->data);
	}

	/**
	* Update Operators
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('operator_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('operator_nama', 'Nama Operator', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'operator_nama' 		=> $this->input->post('operator_nama'),
				'operator_update_at' 	=> date('Y-m-d H:i:s'),
				'operator_user_updated' => get_user_data('id'),
			];
			
			$save_operator = $this->model_operator->change($id, $save_data);

			if ($save_operator) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/operator', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/operator');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/operator');
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
	* delete Operators
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('operator_delete');

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
            set_message(cclang('has_been_deleted', 'operator'), 'success');
        } else {
            set_message(cclang('error_delete', 'operator'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Operators
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('operator_view');

		$this->data['operator'] = $this->model_operator->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Operator Detail');
		$this->render('backend/standart/administrator/operator/operator_view', $this->data);
	}
	
	/**
	* delete Operators
	*
	* @var $id String
	*/
	private function _remove($id) {
		$operator = $this->model_operator->find($id);
		
		return $this->model_operator->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('operator_export');

		$this->model_operator->export(
			'operator', 
			'operator',
			$this->model_operator->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('operator_export');

		$this->model_operator->pdf('operator', 'operator');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('operator_export');

		$table = $title = 'operator';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_operator->find($id);
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


/* End of file operator.php */
/* Location: ./application/controllers/administrator/Operator.php */