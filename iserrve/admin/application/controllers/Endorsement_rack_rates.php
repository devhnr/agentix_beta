<?php
	class Endorsement_rack_rates extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('endorsement_rack_rates_model');
		$this->load->model('admin');
	}
	function add()
	{
		$form_field = $data = array(  
				
			'corporate_id' => '',
			'policy_no' => '',
			'sum_insured' => '',
			'endorsement_type' => '',
			'suminsure_hidden' => '',
			);
		if($this->input->post('action') == 'add_endorsement_rack_rates') 
		{
			foreach($form_field as $key => $value)
			{	
				$data[$key]= $this->admin->xss_clean_inputData($this->input->post($key));		
			}
			$this->load->library('validation');
			$rules['endorsement_type'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['endorsement_type'] = "Name";
			$this->validation->set_fields($fields);
						
			$this->endorsement_rack_rates_model->add($data);
			$log_data = array(
				'username' => $this->session->userdata('username'),
				'login_user_id' => $this->session->userdata('adminId'),
				'module_name' => 'Create Endorsement Rack Rates',
				'corporate_name' => $data['corporate_id'],
				'policy_number' => $data['policy_no'],
				'created_at' => date('Y-m-d h:i:sa')
			);

			$this->admin->log_data_manage($log_data);

			$this->session->set_flashdata('L_strErrorMessage','Endorsement Rack Rates Added Successfully');
			redirect($this->config->item('base_url').'endorsement_rack_rates/lists');

			if ($this->validation->run() == FALSE){
				$data['L_strErrorMessage'] = $this->validation->error_string;
			} 
		}
		$data['allcorporate']= $this->endorsement_rack_rates_model->allcorporate();
		//$data['allproduct_name'] = $this->endorsement_rack_rates_model->allproduct_name();
		$data['allsum_insured'] = $this->endorsement_rack_rates_model->allsum_insured();
		//$data['allproduct_type'] = $this->endorsement_rack_rates_model->allproduct_type();
		 // echo "<pre>";print_r($data['allsum_insured']);echo "</pre>";
		
		$this->load->view('add_endorsement_rack_rates',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->endorsement_rack_rates_model->get_policy_features($id);  
				//echo "<pre>";print_r($result);echo "</pre>";
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'endorsement_type' => $result->endorsement_type,
						'corporate_id' => $result->corporate_id,
						'policy_no' => $result->policy_no,
						'sum_insured' => $result->sum_insured,
						'suminsure_hidden' => $result->suminsure_val,
						);

				if($this->input->post('action') == 'edit_endorsement_rack_rates') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	}
					$this->load->library('validation');
					$rules['endorsement_type'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['endorsement_type']   = "name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['id'] = $id;
					} 
					else 
					{
						
							$this->endorsement_rack_rates_model->edit($id, $form_field);
							$log_data = array(
								'username' => $this->session->userdata('username'),
								'login_user_id' => $this->session->userdata('adminId'),
								'module_name' => 'Edit Endorsement Rack Rates',
								'corporate_name' => $form_field['corporate_id'],
								'policy_number' => $form_field['policy_no'],
								'created_at' => date('Y-m-d h:i:sa')
							);
				
							$this->admin->log_data_manage($log_data);
							$this->session->set_flashdata('L_strErrorMessage','Endorsement Rack Rates Updated Successfully');
							redirect($this->config->item('base_url').'endorsement_rack_rates/lists');
					}
				}
				//echo "<pre>";print_r($data);echo "</pre>";exit;
				$data['allcorporate'] = $this->endorsement_rack_rates_model->allcorporate();
				$data['allproduct_name'] = $this->endorsement_rack_rates_model->allproduct_name();
				$data['allpolicy_using_id'] = $this->endorsement_rack_rates_model->allpolicy_using_id($data['policy_no']);
				$data['allpolicy_using_corporate'] = $this->endorsement_rack_rates_model->allpolicy_using_corporate($data['corporate_id']);
				$data['allsum_insured'] = $this->endorsement_rack_rates_model->allsum_insured();
				$data['allproduct_type'] = $this->endorsement_rack_rates_model->allproduct_type();
				//echo "<pre>";print_r($data['allpolicy_using_id']);echo "</pre>";
				$data['addition_item'] = $this->endorsement_rack_rates_model->addition_item($id);
				$this->load->view('edit_endorsement_rack_rates',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Endorsement Rack Rates !!!!');
				redirect($this->config->item('base_url').'endorsement_rack_rates/lists');
			}
	}

	function removeprice($product_id, $id) {
        if ($this->endorsement_rack_rates_model->removeattriute($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Endorsement Rack Rates Attribite Deleted Succcessfully!!!!');
            redirect($this->config->item('base_url') . 'endorsement_rack_rates/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!!!!');
            exit;
        }
    }
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'endorsement_rack_rates/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['product_name'] = $this->admin->xss_clean_inputData($this->input->post('product_name'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->endorsement_rack_rates_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return;
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_endorsement_rack_rates', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {

				$selCheck = $this->admin->xss_clean_inputData($selCheck);

				$endorsement_rack_rates_data = $this->endorsement_rack_rates_model->get_policy_features($selCheck);
				
				if($this->endorsement_rack_rates_model->deletes($selCheck)) {
					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => 'Delete Endorsement Rack Rates',
						'corporate_name' => $endorsement_rack_rates_data->corporate_id,
						'policy_number' => $endorsement_rack_rates_data->policy_no,
						'created_at' => date('Y-m-d h:i:sa')
					);

					$this->admin->log_data_manage($log_data);
					$this->session->set_flashdata('L_strErrorMessage','Endorsement Rack Rates Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'endorsement_rack_rates/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->endorsement_rack_rates_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->endorsement_rack_rates_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'endorsement_rack_rates/lists');
	}	
	function updateorder($id,$val){
		$this->endorsement_rack_rates_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'endorsement_rack_rates/lists');
	}


	 function show_policy_number(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_rack_rates_model->show_policy_number($pro_id);
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

    function get_policy_data(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_rack_rates_model->show_policy_number($pro_id);

		$html = $data[0]->product_name;

        echo $html;
    }

	function get_policy_insurer(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_rack_rates_model->show_policy_number($pro_id);

		$html = $data[0]->insurer;

        echo $html;
    }

    function get_policy_suminsurance(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_rack_rates_model->get_policy_suminsurance($pro_id);
        // echo $data; exit;
        //echo "<pre>";print_r($data);echo"</pre>";exit;
        $html = '<select id="sum_insured" name="sum_insured" class="form-control multiple-select" onChange="get_sum_insure_val(this.value)">';
        $html .= '<option value="">Select Sum Insured</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$data[$i]->id."' ".$selected . ">" . $data[$i]->sum_insured ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }

	function show_policy_using_corporate(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_rack_rates_model->show_policy_using_corporate($pro_id);
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

	
	function get_sum_insure_val(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_rack_rates_model->get_sum_insure_val($pro_id);
        // echo $data; exit;
       // echo "<pre>";print_r($data);echo"</pre>";exit;
        
        $html .= $data->sum_insured;
        echo $html;
    }
	
}
?>