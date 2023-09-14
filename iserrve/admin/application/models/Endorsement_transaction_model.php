<?php
    class Endorsement_transaction_model extends CI_Model 
    {
		private $_data = array();
	    function __construct() 
    {
		parent::__construct();
	}


    function get_coupan($id)
    {
		$this->db->where('id = ',$id);
		$query = $this->db->get('faq');
        if ($query->num_rows() > 0)	
        {
			$result = $query->result();
			return $result;
        } 
        else 
        {
			return false;
		}
	}


	function add($content)
 	{	

		 // echo "<pre>";print_r($content);echo "</pre>";exit;
		$L_strErrorMessage='';
		$data['corporate_id'] 	 = $content['corporate_id'];
		$data['cd_number_id'] 	 = $content['cd_number_id'];
        $data['policy_endorsement_entry'] = $content['policy_endorsement_entry'];

        if($content['policy_no_cheque'] != ''){
        	$data['policy_no'] = $content['policy_no_cheque'];
    	}else{
    		$data['policy_no'] = $content['policy_no'];
    	}

        if($content['product_type_cheque'] != ''){
        	$data['product_type'] 	 = $content['product_type_cheque'];
    	}else{
    		$data['product_type'] 	 = $content['product_type'];
    	}

        $data['bank_name'] = $content['bank_name'];
        $data['cheque_utr_no'] = $content['cheque_utr_no'];

		if($content['particular'] != ''){
		$data['particular'] 	 = $content['particular'];
		}

		if($content['date'] != ''){
		$data['date'] 	 = $content['date'];
		}

        $data['upload_file'] = $content['upload_file'];
        $data['amount'] = $content['amount'];

		if($content['particular_policy'] != ''){
        $data['particular'] = $content['particular_policy'];
		}
		
        
        $data['policy_start_date'] = $content['policy_start_date'];
        $data['policy_end_date'] = $content['policy_end_date'];
		$data['endorsement_no_policy'] 	 = $content['endorsement_no_policy'];
		$data['employee_count_policy'] 	 = $content['employee_count_policy'];
        $data['dependent_count_policy'] = $content['dependent_count_policy'];
        $data['transaction_type'] = $content['transaction_type'];

		if($content['date_policy'] != ''){
		$data['date'] = $content['date_policy'];
		}
		
		$data['net_premium'] 	 = $content['net_premium'];
        $data['gst'] = $content['gst'];
        $data['gross_premium_policy'] = $content['gross_premium_policy'];
        $data['created_at'] = date('Y-m-d h:i:sa');
        

		$this->_data = $data;
		if ($this->db->insert('endorsement_transaction', $this->_data))
			{
				return true;
		 	}else
			{
				return false;
			}
    }


	function edit($id, $content) 
	{
		$L_strErrorMessage='';
		$data['corporate_id'] 	 = $content['corporate_id'];
		$data['cd_number_id'] 	 = $content['cd_number_id'];
        $data['policy_endorsement_entry'] = $content['policy_endorsement_entry'];
        $data['bank_name'] = $content['bank_name'];
        $data['cheque_utr_no'] = $content['cheque_utr_no'];

		if($content['particular'] != ''){
		$data['particular'] 	 = $content['particular'];
		}

		if($content['date'] != ''){
		$data['date'] 	 = $content['date'];
		}

        $data['upload_file'] = $content['upload_file'];
        $data['amount'] = $content['amount'];

		if($content['particular_policy'] != ''){
        $data['particular'] = $content['particular_policy'];
		}
		$data['product_type'] 	 = $content['product_type'];
        $data['policy_no'] = $content['policy_no'];
        $data['policy_start_date'] = $content['policy_start_date'];
        $data['policy_end_date'] = $content['policy_end_date'];
		$data['endorsement_no_policy'] 	 = $content['endorsement_no_policy'];
		$data['employee_count_policy'] 	 = $content['employee_count_policy'];
        $data['dependent_count_policy'] = $content['dependent_count_policy'];
        $data['transaction_type'] = $content['transaction_type'];

		if($content['date_policy'] != ''){
		$data['date'] = $content['date_policy'];
		}
		
		$data['net_premium'] 	 = $content['net_premium'];
        $data['gst'] = $content['gst'];
        $data['gross_premium_policy'] = $content['gross_premium_policy'];
		
		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('endorsement_transaction', $this->_data))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
	}

	function edit_popup($id, $content) 
	{
		$L_strErrorMessage='';
		
		if($content['upload_file'] != ''){
        	$data['upload_file'] = $content['upload_file'];
		}
        
		if($content['particular_policy'] != ''){
        	$data['particular'] = $content['particular_policy'];
		}
		
		
		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('endorsement_transaction', $this->_data))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
	}


    function lists($num, $offset, $content) 
	{
		/* if($offset == '')
		{
			$offset = '0';
		}
		$sql = "SELECT * FROM endorsement_transaction where id <> 0  group by corporate_id";
		if($num!='' || $offset!='')
			{
				$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
			}
		$query = $this->db->query($sql);
		
		$sql_count = "SELECT * FROM endorsement_transaction WHERE id <> 0 group by corporate_id";
		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result_array();
		$ret['count']  = $query1->num_rows();
	    return $ret; */
		
		if($this->session->userdata('role_id') == 1){
			$sql = "SELECT * FROM endorsement_transaction group by corporate_id";
		}else{
			
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM endorsement_transaction where corporate_id IN (".$corp_id.") group by corporate_id ";
		}
		

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}
	}
	
	
	function get_admin_data($id){
		
		$sql = "SELECT * FROM admin_user where id = '".$id."'  ";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row()->corp_id;
			return $result;
		}else{
			return false;
		}
	}
	

	function lists_new($corporate_id,$cd_no) 
	{

		//echo"<pre>";print_r($content['corporate_id']);echo"</pre>";exit;
		// if($offset == '')
		// {
		// 	$offset = '0';
		// }
		// $sql = "SELECT * FROM endorsement_transaction where corporate_id = '".$content['corporate_id']."'  ";
		// if($num!='' || $offset!='')
		// 	{
		// 		$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		// 	}
		// $query = $this->db->query($sql);
		// /*if($num!='' || $offset!='')
		// 	{
		// 		$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		// 	}*/

		// echo $sql;
		// $sql_count = "SELECT * FROM endorsement_transaction WHERE corporate_id = '".$content['corporate_id']."' ";
		// $query1 = $this->db->query($sql_count);
		// $ret['result'] = $query->result_array();
		// $ret['count']  = $query1->num_rows();
	    // return $ret;

		$this->db->where('corporate_id = ', $corporate_id);
		$this->db->where('cd_number_id = ', $cd_no);
        $query = $this->db->get('endorsement_transaction');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
	}

	function get_corporate_name($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('corporate');
        if ($query->num_rows() > 0) {
            $result = $query->row()->co_name;
            return $result;
        } else {
            return false;
        }
    }

	function updateorder_popular($id, $val) {
        $query = "update endorsement_transaction set popular = '" . $val . "'  where id = '" . $id . "'";
        $result = $this->db->query($query);
        return $result;
    }

	function updateorder_status($id, $val) {
        $query = "update endorsement_transaction set status = '" . $val . "'  where id = '" . $id . "'";
        $result = $this->db->query($query);
        return $result;
    }

	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
        if ($this->db->delete('endorsement_transaction'))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }


	function allcorporate(){
		$sql = "select * from corporate where active_deactive = 0";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function all_cd_entry(){
		$sql = "select * from cd_statement_entry";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function endersoment_net_premium_with_gst_total($corporate_id){
		$sql = "SELECT SUM(net_premium_with_gst) as total FROM endorsement_calculation WHERE corporate_id = ".$corporate_id."";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->row()->total;
            return $result;
		}
		else
		{
			return false;
		}
	}

	function all_cd_entry_new($id){
		$sql = "select * from cd_statement_entry where id = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function allproduct_type(){
		$sql = "select * from product_type";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function corporate_endersoment_calculation($corporate_id){
		$sql = "select * from endorsement_calculation where corporate_id = '".$corporate_id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	


	function show_policy_using_corporate($pro_id)
    {

        $this->db->where('corporate_id',$pro_id);
		
		$this->db->where("policy_end_date >= '".date('Y-m-d')."'");

        $query = $this->db->get('policy');

        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }
    }

	function show_cd_Number_using_corporate($pro_id)
    {

        $this->db->where('corporate_id',$pro_id);

        $query = $this->db->get('cd_statement_entry');

        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }
    }


	function allproduct_name(){
		$sql = "select * from policy";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}
	
	function get_all_data($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('endorsement_transaction');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function allproduct_name_new($id){
		$sql = "select * from policy where corporate_id = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}


	function show_policy_number($pro_id)
    {   
    
        $this->db->where('id =',$pro_id);

        $query = $this->db->get('policy');
       
        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }
    }


	  /*function getsubcate_name($id)


	{


 		$this->db->where('id = ',$id);


		$query = $this->db->get('subcategory');


		if ($query->num_rows() > 0)


		{


			$result = $query->row()->subcategoryname;


			return $result;


		}


		else


		{


			return false;


		}


    }*/


	 /*function allcategory()


	{


		$this->db->order_by('id', 'desc');


		$query = $this->db->get('category');


		if ($query->num_rows() > 0)	{


			$result = $query->result();


			return $result;


		} else {


			return false;


		}


    }*/


	/*function allcategory_product($id='')


	{


		if($id!='')


		{


			$this->db->where('category_id = ',$id);


		}


 		$query = $this->db->get('product');


		if ($query->num_rows() > 0)	{


			$result = $query->result();


			return $result;


		} else {


			return false;


		}


    }*/


	/*function getcate_name($id)


	{


 		$this->db->where('id = ',$id);


		$query = $this->db->get('category');


		if ($query->num_rows() > 0)


		{


			$result = $query->row()->categoryname;


			return $result;


		}


		else


		{


			return false;


		}


    }*/


	function updatestatus($id,$is_active)
	{
	$sql= " update tbl_coupan set enabled= '".$is_active."' where id='".$id."' ";
        if ($query = $this->db->query($sql))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }

	 function is_add($name)
	{
		$this->db->where('code',$name);
		$query = $this->db->get('tbl_coupan');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function is_exist($id)
	{
		$this->db->where('id = ',$id);
		$query = $this->db->get('endorsement_transaction');
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}
		else
		{
			return false;
		}
	}

	function alldata($table_name) {
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function get_corp_name($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('corporate');
        if ($query->num_rows() > 0) {
            $result = $query->row()->co_name;
            return $result;
        } else {
            return false;
        }
    }
	
	function get_corp_data($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('corporate');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result;
        } else {
            return false;
        }
    }
	
	function get_cd_data($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('cd_statement_entry');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result;
        } else {
            return false;
        }
    }
	
	function get_cd_number_using_corporate($id) {
        $this->db->where('corporate_id = ', $id);
        $query = $this->db->get('cd_statement_entry');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

	function get_cd_number($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('cd_statement_entry');
        if ($query->num_rows() > 0) {
            $result = $query->row()->cd_number;
            return $result;
        } else {
            return false;
        }
    }

	function get_policy_type_name($id){
		$this->db->where('id =',$id);
		$query = $this->db->get('product_type');
		if ($query->num_rows() > 0) {
            $result = $query->row()->name;
            return $result;
        } else {
            return false;
        }

	}

	function get_policy_number($id){
		$this->db->where('id =',$id);
		$query = $this->db->get('policy');
		if ($query->num_rows() > 0) {
            $result = $query->row()->policy_no;
            return $result;
        } else {
            return false;
        }

	}
	
	function export_addition_xl_file_data($e_id,$endorsement_type){
		$this->db->where('ec_id =',$e_id);

		if($endorsement_type == 'Family Wise'){
			$this->db->where('relationship =','Employee');
		}
		$query = $this->db->get('endorsement_calculation_addition_attribute_xlfile');
		if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }

	}
	
	function export_deletion_xl_file_data($e_id,$endorsement_type){
		$this->db->where('ec_id =',$e_id);
		if($endorsement_type == 'Family Wise'){
			$this->db->where('relationship =','Employee');
		}
		$query = $this->db->get('endorsement_calculation_deletion_attribute_xlfile');
		if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }

	}
	
	function get_endorsement_calculation_table_data($e_id){
		$this->db->where('id =',$e_id);
		$query = $this->db->get('endorsement_calculation');
		if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result;
        } else {
            return false;
        }

	}
	
	
	function get_rack_rate_id($corporate_id,$policy_no,$endorsement_type){
		$this->db->where('corporate_id =',$corporate_id);
		$this->db->where('policy_no =',$policy_no);
		$this->db->where('endorsement_type =',$endorsement_type);
		

        $query = $this->db->get('endorsement_rack_rates');
       
        if($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result;
        }
        else
        {
            return false;
        }

	}
	
	function get_rack_rate_attribute($rack_rate_id,$age_array){
		
		//echo "<pre>";print_r($age_array[0]);echo"</pre>";exit;
		$this->db->where('endorsement_rack_rates_id =',$rack_rate_id);
		$this->db->where('agefrom =',$age_array[0]);
		$this->db->where('ageto =',$age_array[1]);
		

        $query = $this->db->get('endorsement_rack_rates_attribute');
       
        if($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result;
        }
        else
        {
            return false;
        }

	}

	function get_rack_rate_id_new($corporate_id,$policy_no,$endorsement_type,$suminsure_val){
		$this->db->where('corporate_id =',$corporate_id);
		$this->db->where('policy_no =',$policy_no);
		$this->db->where('endorsement_type =',$endorsement_type);
		$this->db->where('suminsure_val =',$suminsure_val);
		

        $query = $this->db->get('endorsement_rack_rates');
       
        if($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result;
        }
        else
        {
            return false;
        }

	}
	
	function get_endorsement_calculation_addition_attribute($calculation_id){
		
		//echo "<pre>";print_r($age_array[0]);echo"</pre>";exit;
		$this->db->where('endorsement_calculation_id =',$calculation_id);
		
		

        $query = $this->db->get('endorsement_calculation_addition_attribute');
       
        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }

	}
	
	function get_endorsement_calculation_addition_attribute_using_id($id){
		
		//echo "<pre>";print_r($age_array[0]);echo"</pre>";exit;
		$this->db->where('id =',$id);
		
		

        $query = $this->db->get('endorsement_calculation_addition_attribute');
       
        if($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result;
        }
        else
        {
            return false;
        }

	}
	
	function get_endorsement_calculation_deletion_attribute_using_id($id){
		
		//echo "<pre>";print_r($age_array[0]);echo"</pre>";exit;
		$this->db->where('id =',$id);
		
		

        $query = $this->db->get('endorsement_calculation_deletion_attribute');
       
        if($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result;
        }
        else
        {
            return false;
        }

	}
	
	
	function get_endorsement_calculation_deletion_attribute($calculation_id){
		
		//echo "<pre>";print_r($age_array[0]);echo"</pre>";exit;
		$this->db->where('endorsement_calculation_id =',$calculation_id);
		
		

        $query = $this->db->get('endorsement_calculation_deletion_attribute');
       
        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }

	}
	
	function get_calculation_table_data($calculation_id){
		
		//echo "<pre>";print_r($age_array[0]);echo"</pre>";exit;
		$this->db->where('id =',$calculation_id);
		
		

        $query = $this->db->get('endorsement_calculation');
       
        if($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result;
        }
        else
        {
            return false;
        }

	}
	
	function update_calculation_table_data_using_addition_attribute($id,$content){
		
		$data['total_additional_premium']       = $content['total_additional_premium'];
		$data['total_deletion_premium'] 	 = $content['total_deletion_premium'];
        $data['net_premium'] 	 = $content['net_premium'];
		
		$data['net_premium_with_gst'] 	 = $content['net_premium_with_gst'];
        
		
		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('endorsement_calculation', $this->_data))	
        {
			return true;
        } 
        else 
        {
			return false;
		}

	}
	
	function update_rack_rate_calculation($content){
		
		
		$id = $content['calc_id'];
		
		
		$data['endersoment_title']       = $content['endersoment_title'];
		$data['endersoment_number'] 	 = $content['endersoment_number'];
        $data['transaction_statement'] 	 = $content['transaction_statement'];
        
		
		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('endorsement_calculation', $this->_data))	
        {
			return true;
        } 
        else 
        {
			return false;
		}

	}
	
	function addition_attribute_delete($id) 
	{
 		$this->db->where('id = ',$id);
        if ($this->db->delete('endorsement_calculation_addition_attribute'))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }
	
	function deletion_attribute_delete($id) 
	{
 		$this->db->where('id = ',$id);
        if ($this->db->delete('endorsement_calculation_deletion_attribute'))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }
	
	
	function get_product_type($pro_id)
    {   
    
        $this->db->where('id',$pro_id);
		
		//$this->db->where("policy_end_date >= '".date('Y-m-d')."'");

        $query = $this->db->get('policy');
       
        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }
    }
	
	
	function get_type_id($name)
    {   
    
        $this->db->where('name',$name);
		
		//$this->db->where("policy_end_date >= '".date('Y-m-d')."'");

        $query = $this->db->get('product_type');
       
        if($query->num_rows() > 0)
        {
            $result = $query->row()->id;
            return $result;
        }
        else
        {
            return false;
        }
    }
	
	
	
}
?>