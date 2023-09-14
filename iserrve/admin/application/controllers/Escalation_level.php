<?php
	class Escalation_level extends CI_Controller {
	private $_data = array();
	function __construct()
	{
// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('escalation_level_model');
		$this->load->model('admin');
	}
	function add()
	{
		//echo "sd";exit;
		$form_field = $data = array(  
				
			'corporate_id' => '',
			'policy_no' => '',
			'level' => '',
			'user_id' => '',
			

			);
		if($this->input->post('action') == 'add_escalation_level') 
		{
			foreach($form_field as $key => $value)
			{	
				$data[$key]= $this->admin->xss_clean_inputData($this->input->post($key));		
			}
			$this->load->library('validation');
			$rules['inception_premium_amount'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['inception_premium_amount'] = "Name";
			$this->validation->set_fields($fields);
			
			$this->escalation_level_model->add($data);
			
			$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Create Escalation Level',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
			$this->session->set_flashdata('L_strErrorMessage','Escalation Level Added Successfully');
			redirect($this->config->item('base_url').'escalation_level/lists');
			
			if ($this->validation->run() == FALSE){
				$data['L_strErrorMessage'] = $this->validation->error_string;
			} 
		}
		$data['allcorporate']= $this->escalation_level_model->allcorporate();
		$data['allproduct_name'] = $this->escalation_level_model->allproduct_name();
		$data['allsum_insured'] = $this->escalation_level_model->allsum_insured();
		$data['alluser_escalation'] = $this->escalation_level_model->alluser_escalation();
		 // echo "<pre>";print_r($data['allsum_insured']);echo "</pre>";
		
		$this->load->view('add_escalation_level',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->escalation_level_model->get_policy_features($id);  
				//echo "<pre>";print_r($result);echo "</pre>";
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'corporate_id' => $result->corporate_id,
						'policy_no' => $result->policy_no,
						'level' => $result->level,
						'user_id' => $result->user_id,						
											
						);

				if($this->input->post('action') == 'edit_escalation_level') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	}
					$this->load->library('validation');
					$rules['level'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['level']   = "name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['id'] = $id;
					} 
					else 
					{
							$this->escalation_level_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Escalation Level Updated Successfully');
							redirect($this->config->item('base_url').'escalation_level/lists');
					}
				}

				$data['allcorporate'] = $this->escalation_level_model->allcorporate();
				$data['allproduct_name'] = $this->escalation_level_model->allproduct_name();
				$data['allpolicy_using_id'] = $this->escalation_level_model->allpolicy_using_id($data['policy_no']);
				$data['allpolicy_using_corporate'] = $this->escalation_level_model->allpolicy_using_corporate($data['corporate_id']);
				$data['allsum_insured'] = $this->escalation_level_model->allsum_insured();
				$data['allproduct_type'] = $this->escalation_level_model->allproduct_type();
				$data['alluser_escalation'] = $this->escalation_level_model->alluser_escalation();
				//echo "<pre>";print_r($data['allpolicy_using_id']);echo "</pre>";
				
				$this->load->view('edit_escalation_level',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Escalation Level !!!!');
				redirect($this->config->item('base_url').'escalation_level/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
	
		
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'escalation_level/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['product_name'] = $this->admin->xss_clean_inputData($this->input->post('product_name'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		//echo "sd";exit;
		$return = $this->escalation_level_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		
		$this->load->view('list_escalation_level', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {

				$selCheck = $this->admin->xss_clean_inputData($selCheck);
				
				if($this->escalation_level_model->deletes($selCheck)) {
					
					$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Delete Escalation Level',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
					$this->session->set_flashdata('L_strErrorMessage','Escalation Level Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'escalation_level/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->escalation_level_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'escalation_level/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->escalation_level_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'escalation_level/lists');
	}	
	function updateorder($id,$val){
		$this->escalation_level_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'escalation_level/lists');
	}


	 function show_policy_number(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->escalation_level_model->show_policy_number($pro_id);
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
        $data = $this->escalation_level_model->show_policy_using_corporate($pro_id);
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
	function check_user_level(){
		//echo "sd";exit;
		$corporate_id = $_POST['corporate_id'];
        $level = $_POST['level'];

		$chek_levelexit = $this->escalation_level_model->check_level_exit($corporate_id,$level);

		echo $chek_levelexit;
	}



    
}
?>