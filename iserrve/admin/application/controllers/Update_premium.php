<?php
date_default_timezone_set("Asia/Calcutta");
	class Update_premium extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('update_premium_model');
		$this->load->model('admin');
	}
	function add()
	{
		$form_field = $data = array(

			'corporate_id' => '',
			'policy_no' => '',
			'policy_type' => '',
			'inception_premium_amount' => '',
			'addition_premium_amount' => '',
			'deletion_premium_amount' => '',
			'total_premium_amount' => '',
			'reported_claim_amount' => '',
			'total_claim_paid_amount' => '',
			'claim_under_process_amount' => '',
			'claim_closed_reject' => '',


			);
		if($this->input->post('action') == 'add_update_premium')
		{
			foreach($form_field as $key => $value)
			{
				$data[$key]=$this->admin->xss_clean_inputData($this->input->post($key));
			}
			$this->load->library('validation');
			$rules['inception_premium_amount'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['inception_premium_amount'] = "Name";
			$this->validation->set_fields($fields);

			$this->update_premium_model->add($data);

			$log_data = array(
				'username' => $this->session->userdata('username'),
				'login_user_id' => $this->session->userdata('adminId'),
				'module_name' => 'Create Update Premium',
				'corporate_name' => $data['corporate_id'],
				'policy_number' => $data['policy_no'],
				'created_at' => date('Y-m-d h:i:sa')
			);

			$this->admin->log_data_manage($log_data);

			$this->session->set_flashdata('L_strErrorMessage','Update Premium Added Successfully');
			redirect($this->config->item('base_url').'update_premium/lists');

			if ($this->validation->run() == FALSE){
				$data['L_strErrorMessage'] = $this->validation->error_string;
			}
		}
		$data['allcorporate']= $this->update_premium_model->allcorporate();
		$data['allproduct_name'] = $this->update_premium_model->allproduct_name();
		$data['allsum_insured'] = $this->update_premium_model->allsum_insured();
		$data['allproduct_type'] = $this->update_premium_model->allproduct_type();
		 // echo "<pre>";print_r($data['allsum_insured']);echo "</pre>";

		$this->load->view('add_update_premium',$data);
	}
    function edit($id)
	{
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->update_premium_model->get_policy_features($id);
				//echo "<pre>";print_r($result);echo "</pre>";
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'corporate_id' => $result->corporate_id,
						'policy_no' => $result->policy_no,
						'policy_type' => $result->policy_type,
						'inception_premium_amount' => $result->inception_premium_amount,
						'addition_premium_amount' => $result->addition_premium_amount,
						'deletion_premium_amount' => $result->deletion_premium_amount,
						'total_premium_amount' => $result->total_premium_amount,
						'reported_claim_amount' => $result->reported_claim_amount,
						'total_claim_paid_amount' => $result->total_claim_paid_amount,
						'claim_under_process_amount' => $result->claim_under_process_amount,
						'claim_closed_reject' => $result->claim_closed_reject,
						);

				if($this->input->post('action') == 'edit_update_premium')
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	}
					$this->load->library('validation');
					$rules['inception_premium_amount'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['inception_premium_amount']   = "name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE)
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['id'] = $id;
					}
					else
					{
							$this->update_premium_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Update Premium Updated Successfully');
							redirect($this->config->item('base_url').'update_premium/lists');
					}
				}

				$data['allcorporate'] = $this->update_premium_model->allcorporate();
				$data['allproduct_name'] = $this->update_premium_model->allproduct_name();
				$data['allpolicy_using_id'] = $this->update_premium_model->allpolicy_using_id($data['policy_no']);
				$data['allpolicy_using_corporate'] = $this->update_premium_model->allpolicy_using_corporate($data['corporate_id']);
				$data['allsum_insured'] = $this->update_premium_model->allsum_insured();
				$data['allproduct_type'] = $this->update_premium_model->allproduct_type();
				//echo "<pre>";print_r($data['allpolicy_using_id']);echo "</pre>";

				$this->load->view('edit_update_premium',$data);
			}
			else
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Update Premium !!!!');
				redirect($this->config->item('base_url').'update_premium/lists');
			}
	}
	//first function calling after pressing coupan tab...
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'update_premium/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['product_name'] = $this->admin->xss_clean_inputData($this->input->post('product_name'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->update_premium_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_update_premium', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {
				$update_premium_data = $this->update_premium_model->get_policy_features($selCheck);
				//echo "<pre>";print_r($sum_insured_data);echo "</pre>";exit;
				if($this->update_premium_model->deletes($selCheck)) {

					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => 'Delete Update Premium',
						'corporate_name' => $update_premium_data->corporate_id,
						'policy_number' => $update_premium_data->policy_no,
						'created_at' => date('Y-m-d h:i:sa')
					);

					$this->admin->log_data_manage($log_data);

					$this->session->set_flashdata('L_strErrorMessage','Update Premium Deleted Successfully');
				}
				else
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'update_premium/lists');
	}
	function userstatus($id,$value)	{
	$result=$this->update_premium_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'update_premium/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->update_premium_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'update_premium/lists');
	}
	function updateorder($id,$val){
		$this->update_premium_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'update_premium/lists');
	}


	 function show_policy_number(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->update_premium_model->show_policy_number($pro_id);
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
        $data = $this->update_premium_model->show_policy_using_corporate($pro_id);
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


	function get_product_type(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->update_premium_model->get_product_type($pro_id);
		//echo "<pre>";print_r($data);echo"</pre>";exit;
        // echo $data; exit;
        $html = '<select id="policy_type" name="policy_type" class="form-control multiple-select">';
        // $html .= '<option value="">Select Policy Type</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$data[$i]->id."' ".$selected . ">" . $data[$i]->product_type ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }



}
?>
