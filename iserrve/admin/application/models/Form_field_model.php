<?php
    class Form_field_model extends CI_Model 
    {
	private $_data = array();
    function __construct() 
    {
		parent::__construct();
	}

	function get_state($id)
    {
		$this->db->where('id = ',$id);
		$query = $this->db->get('form_field');
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

	function get_product_type(){

		$sql = "select * from product_type ";

		$query = $this->db->query($sql);

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
		$L_strErrorMessage='';
		
		$data['product_type_id'] 	 = implode(',', $content['product_type_id']);
		$data['label_name'] 	 = $this->admin->xss_clean_inputData($content['label_name']);
		$data['type'] 	 = $this->admin->xss_clean_inputData($content['type']);
        
		$this->_data = $data;
		if ($this->db->insert('form_field', $this->_data))
		{
			$id = $this->db->insert_id();

			if (count($_POST['option']) > 0 && $_POST['option'] != '') {
                for ($i = 0; $i < count($_POST['option']); $i++) {
					if($_POST['option'][$i] != ''){
						$content['form_field_id'] = $id;
						$content['option_name'] = $_POST['option'][$i];
						$this->insert_attribute($content);
					}
                }
            }

			//echo "<pre>";print_r($data);echo"</pre>";exit;

			if($data['type'] == 4){
				if (count($_POST['label_name_raido']) > 0 && $_POST['label_name_raido'] != '') {
					for ($i = 0; $i < count($_POST['label_name_raido']); $i++) {
						if($_POST['label_name_raido'][$i] != ''){
							$content['form_field_id'] = $id;
							$content['form_field_type'] = $data['type'];
							$content['product_type_id'] = $data['product_type_id'];
							$content['label_name'] = $_POST['label_name_raido'][$i];
							$content['type'] = $_POST['type_radio'][$i];

							//echo "<pre>";print_r($content);echo"</pre>";exit;
							$this->insert_attribute_radio($content);
						}
					}
				}
			}

            return $id;

		}else
		{
			return false;
		}
    }

	function insert_attribute($content) {
        $data['form_field_id'] = $content['form_field_id'];
        $data['option_name'] = $content['option_name'];
        $this->_data = $data;
        if ($this->db->insert('form_field_attribute', $this->_data)) {
            return true;
        } else {
            return false;
        }
    }

	function insert_attribute_radio($content) {
        $data['form_field_id'] = $content['form_field_id'];
        $data['form_field_type'] = $content['form_field_type'];
		$data['product_type_id'] = $content['product_type_id'];
		$data['label_name'] = $content['label_name'];
		$data['type'] = $content['type'];
        $this->_data = $data;
        if ($this->db->insert('form_field_attribute_radio', $this->_data)) {
            return true;
        } else {
            return false;
        }
    }
    
	function edit($id, $content) 
	{

// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
		//$data['product_type_id'] 	 = $content['product_type_id'];
		$data['product_type_id'] 	 = implode(',', $content['product_type_id']);
		$data['label_name'] 	 = $this->admin->xss_clean_inputData($content['label_name']);
		$data['type'] 	 = $this->admin->xss_clean_inputData($content['type']);

		if($data['type'] == 1 || $data['type'] == 2){
			$this->delete_old_attribut($id);
		}

		if($data['type'] == 1 || $data['type'] == 2 || $data['type'] == 3){
			$this->delete_old_attribut_radio($id);
		}

	//echo "<pre>";print_r($_POST);echo"</pre>";exit;

		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('form_field', $this->_data))	
        {
			if ($_POST['option1'] != '' && count($_POST['option1']) > 0) {


                for ($i = 0; $i < count($_POST['option1']); $i++) {

                    if ($_POST['option1'][$i] != '') {
                        $content2['form_field_id'] = $id;
                        $content2['option_name'] = $_POST['option1'][$i];
                        $this->insert_attribute($content2);
                    }
                }
            }

			if($data['type'] == 4){

				if ($_POST['label_name_raido1'] != '' && count($_POST['label_name_raido1']) > 0) {


					for ($i = 0; $i < count($_POST['label_name_raido1']); $i++) {

						if ($_POST['label_name_raido1'][$i] != '') {
							// $content2['form_field_id'] = $id;
							// $content2['option_name'] = $_POST['label_name_raido1'][$i];
							// $this->insert_attribute($content2);

							$content['form_field_id'] = $id;
							$content['form_field_type'] = $data['type'];
							$content['product_type_id'] = $data['product_type_id'];
							$content['label_name'] = $_POST['label_name_raido1'][$i];
							$content['type'] = $_POST['type_radio1'][$i];

							//echo "<pre>";print_r($content);echo"</pre>";exit;
							$this->insert_attribute_radio($content);
						}
					}
				}


				if($_POST['label_name_raidou'] != ''){
					if (count($_POST['label_name_raidou']) > 0 && $_POST['label_name_raidou'] != '') {
						for ($i = 0; $i < count($_POST['label_name_raidou']); $i++) {
		
							if ($_POST['label_name_raidou'][$i] != '') {
		
							$content1['form_field_id'] = $id;

							$content1['form_field_type'] = $data['type'];
							$content1['product_type_id'] = $data['product_type_id'];
							$content1['label_name'] = $_POST['label_name_raidou'][$i];
							$content1['type'] = $_POST['type_radiou'][$i];

							$content1['updateid1xxx_radio'] = $_POST['updateid1xxx_radio'][$i];
		
							$this->update_attribute_radio($content1);
		
							}
						}
					}
				}

			}


			if($_POST['optionu'] != ''){
			if (count($_POST['optionu']) > 0 && $_POST['optionu'] != '') {
                for ($i = 0; $i < count($_POST['optionu']); $i++) {

					if ($_POST['optionu'][$i] != '') {

                    $content1['form_field_id'] = $id;
                    $content1['optionu'] = $_POST['optionu'][$i];
                    $content1['updateid1xxx'] = $_POST['updateid1xxx'][$i];

                    $this->update_attribute($content1);

					}
                }
            }
		}

        } 
        else 
        {
			return false;
		}
	}

	
	function delete_old_attribut($id) 
	{
 		$this->db->where('form_field_id = ',$id);
        if ($this->db->delete('form_field_attribute'))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }

	function delete_old_attribut_radio($id) 
	{
 		$this->db->where('form_field_id = ',$id);
        if ($this->db->delete('form_field_attribute_radio'))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }

	function update_attribute($content) {

        $data1['form_field_id'] = $content['form_field_id'];

        $data1['option_name'] = $content['optionu'];
        $this->db->where('id =', $content['updateid1xxx']);

        if ($this->db->update('form_field_attribute', $data1)) {
            return true;
        } else {
            return false;
        }
    }

	function update_attribute_radio($content) {

        $data1['form_field_id'] = $content['form_field_id'];
		$data1['form_field_type'] = $content['form_field_type'];
		$data1['product_type_id'] = $content['product_type_id'];
		$data1['label_name'] = $content['label_name'];
        $data1['type'] = $content['type'];

        $this->db->where('id =', $content['updateid1xxx_radio']);

        if ($this->db->update('form_field_attribute_radio', $data1)) {
            return true;
        } else {
            return false;
        }
    }
		
    function lists($num, $offset, $content) 
	{
		
		if($offset == '')
		{
			$offset = '0';
		}
		
		$sql = "SELECT * FROM form_field where id <> 0 ";
		
		if($num!='' || $offset!='')
			{
				$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
			}
			
		$query = $this->db->query($sql);
		
		$sql_count = "SELECT * FROM form_field WHERE id <> 0";

		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result_array();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}
	    
	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
        if ($this->db->delete('form_field'))	
        {
			$this->delete_old_attribut($id);
			return true;
        } 
        else 
        {
			return false;
		}
    }

	function updateorder($id,$val){
		$content['set_order'] = $val;
		$this->db->where('id',$id);
		return $this->db->update('form_field', $content);	
	}	

	function addition_item($id) {
        $this->db->where('form_field_id = ', $id);
        $query = $this->db->get('form_field_attribute');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

	function addition_item_radio($id) {
        $this->db->where('form_field_id = ', $id);
        $query = $this->db->get('form_field_attribute_radio');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

	function removeattriute($form_field_id, $id) {
        $this->db->where('form_field_id = ', $form_field_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('form_field_attribute')) {
            return true;
        } else {
            return false;
        }
    }

	function removeattriute_radio($form_field_id, $id) {
        $this->db->where('form_field_id = ', $form_field_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('form_field_attribute_radio')) {
            return true;
        } else {
            return false;
        }
    }

	

	function get_product_type_name($id){

		$sql = "select * from product_type  where id in (".$id.")";

		$query = $this->db->query($sql);

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
    
}
?>