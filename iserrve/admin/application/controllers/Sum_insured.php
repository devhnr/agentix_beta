<?php
date_default_timezone_set("Asia/Calcutta");
	class sum_insured extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('sum_insured_model');
		$this->load->model('admin');
	}
	function add()
	{
		$form_field = $data = array(
				// 'name' => '',
				// 'page_url' => '',
			'insurer' => '',
			'corporate_id' => '',
			'product_name' => '',
			'policy_no' => '',
			'sum_insured' => '',

			);
		if($this->input->post('action') == 'add_sum_insured')
		{
			foreach($form_field as $key => $value)
			{
				$data[$key]=$this->admin->xss_clean_inputData($this->input->post($key));
			}
			$this->load->library('validation');
			$rules['product_name'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['product_name'] = "Name";
			$this->validation->set_fields($fields);

						foreach ($_POST['sum_insured'] as $val) {
				        $data['sum_insured'] = $val;
				        $sum_insured_id =   $this->sum_insured_model->add($data);
				    }


						$log_data = array(
							'username' => $this->session->userdata('username'),
							'login_user_id' => $this->session->userdata('adminId'),
							'module_name' => 'Create Sum Insured',
							'corporate_name' => $data['corporate_id'],
							'policy_number' => $data['policy_no'],
							'created_at' => date('Y-m-d h:i:sa')
						);

						$this->admin->log_data_manage($log_data);

						if($sum_insured_id != ''){

							$newdata = array('sum_insured_id_session' => $sum_insured_id);

							$this->session->set_userdata($newdata);
						}

						$this->session->set_flashdata('L_strErrorMessage','Sum Insured Added Successfully');
						redirect($this->config->item('base_url').'sum_insured/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					}
		}
		$data['allcorporate']= $this->sum_insured_model->allcorporate();
		$data['allproduct_name'] = $this->sum_insured_model->allproduct_name();
		// 	echo "<pre>";print_r($data['allproduct_name']);echo "</pre>";
		// echo "<pre>";print_r($data['allcorporate']);echo "</pre>";exit;
		$this->load->view('add_sum_insured',$data);
	}
    function edit($id)
	{
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->sum_insured_model->get_sum_insured($id);
				//echo "<pre>";print_r($result);echo "</pre>";
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'insurer' => $result->insurer,
						'corporate_id' => $result->corporate_id,
						'product_name' => $result->product_name,
						'policy_no' => $result->policy_no,
						'sum_insured' => $result->sum_insured,

						);

				if($this->input->post('action') == 'edit_sum_insured')
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	}
					$this->load->library('validation');
					$rules['product_name'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['product_name']   = "name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE)
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['id'] = $id;
					}
					else
					{
							$this->sum_insured_model->edit($id, $form_field);

							$log_data = array(
								'username' => $this->session->userdata('username'),
								'login_user_id' => $this->session->userdata('adminId'),
								'module_name' => 'Edit Sum Insured',
								'corporate_name' => $form_field['corporate_id'],
								'policy_number' => $form_field['policy_no'],
								'created_at' => date('Y-m-d h:i:sa')
							);

							$this->admin->log_data_manage($log_data);

							$this->session->set_flashdata('L_strErrorMessage','Sum Insured Updated Successfully');
							redirect($this->config->item('base_url').'sum_insured/lists');
					}
				}

				$data['allcorporate'] = $this->sum_insured_model->allcorporate();
				$data['allpolicy_using_corporate'] = $this->sum_insured_model->allpolicy_using_corporate($data['corporate_id']);
				$data['allproduct_name'] = $this->sum_insured_model->allproduct_name();
				// echo "<pre>";print_r($data['allproduct_name']);echo "</pre>";
				// $data['allinsurer']= $this->sum_insured_model->allinsurer();
				// $data['allsum_insured_type']= $this->sum_insured_model->allsum_insured_type();
				// $data['allproduct_type']= $this->sum_insured_model->allproduct_type();
				// $data['alltpa']= $this->sum_insured_model->alltpa();
				$this->load->view('edit_sum_insured',$data);
			}
			else
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Sum Insured !!!!');
				redirect($this->config->item('base_url').'sum_insured/lists');
			}
	}
	//first function calling after pressing coupan tab...
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'sum_insured/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['product_name'] = $this->admin->xss_clean_inputData($this->input->post('product_name'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->sum_insured_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_sum_insured', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {

				$selCheck = $this->admin->xss_clean_inputData($selCheck);
				$sum_insured_data = $this->sum_insured_model->get_sum_insured($selCheck);


				//echo "<pre>";print_r($sum_insured_data);echo "</pre>";exit;
				if($this->sum_insured_model->deletes($selCheck)) {

					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => 'Delete Sum Insured',
						'corporate_name' => $sum_insured_data->corporate_id,
						'policy_number' => $sum_insured_data->policy_no,
						'created_at' => date('Y-m-d h:i:sa')
					);

					$this->admin->log_data_manage($log_data);

					$this->session->set_flashdata('L_strErrorMessage','Sum Insured Deleted Successfully');
				}
				else
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'sum_insured/lists');
	}
	function userstatus($id,$value)	{
	$result=$this->sum_insured_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->sum_insured_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'sum_insured/lists');
	}
	function updateorder($id,$val){
		$this->sum_insured_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'sum_insured/lists');
	}


	 function show_policy_number(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->sum_insured_model->show_policy_number($pro_id);
        // echo $data; exit;
        $html = '<select id="policy_no" name="policy_no" class="form-control multiple-select">';
        $html .= '<option value="">Select Policy No</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$data[$i]->id."' ".$selected . ">" . $data[$i]->policy_no ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }

	function show_policy_using_corporate(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->sum_insured_model->show_policy_using_corporate($pro_id);
		//echo "<pre>";print_r($data);echo"</pre>";exit;
        // echo $data; exit;
        $html = '<select id="policy_no" name="policy_no" class="form-control multiple-select" onChange="showproduct_name(this.value)">';
        $html .= '<option value="">Select Policy No</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$data[$i]->id."' ".$selected . ">" . $data[$i]->policy_no ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }

	function get_policy_data(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->sum_insured_model->show_policy_number($pro_id);

		$html = $data[0]->product_name;

        echo $html;
    }

	function get_policy_insurer(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->sum_insured_model->show_policy_number($pro_id);

		$html = $data[0]->insurer;

        echo $html;
    }
}
?>
