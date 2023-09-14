<?php
	class Product_model extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
	}

	  function get_user($id){
		  $this->db->where('id = ',$id);
		  $query = $this->db->get('admin_user');	
		  if ($query->num_rows() > 0)	{	
		  $result = $query->result();	
		  return $result;	
		  } else {		
		  return false;	
		  }	

		  }

		  function edit_pass($content) {	

		  $data['password']  = $content['newpassword'];	 

		  $this->_data = $data;	

		  $this->db->where('id', $this->session->userdata('adminId'));	

		  if ($this->db->update('admin_user', $this->_data))

			  {			return true;	

		  } else {			return false;	

		  }	}

		  

	function add($content) 

	{
		$L_strErrorMessage='';
		$data['name'] = $content['name'];	
		$data['page_url'] = $content['page_url'];
        if($content['get_quote'] !=''){
            $data['get_quote'] = $content['get_quote']; 
        }
        if($content['for_employee'] !=''){
            $data['for_employee'] = $content['for_employee']; 
        }	
		
		$data['group_title'] = $content['group_title'];	
		$data['short_description'] = $content['short_description'];	
        $data['uniemp_desc'] = $content['uniemp_desc']; 
        $data['section_two_desc'] = $content['section_two_desc']; 
        $data['title_1'] = $content['title_1']; 
        $data['title_2'] = $content['title_2']; 
        // $data['whoshouldgroup_desc'] = $content['whoshouldgroup_desc']; 
        $data['advantage_desc'] = $content['advantage_desc']; 
        // $data['whybuygroup_desc'] = $content['whybuygroup_desc']; 
		$data['description'] = $content['description'];	
		$data['category_id'] = $content['category_id'];	
		$data['tags'] = $content['tags'];
		$data['metatitle'] = $content['metatitle'];
		$data['metakeywords'] = $content['metakeywords'];
		$data['metadescription'] = $content['metadescription'];
        // table of Contente's Input Fields
        $data['section_1'] = $content['section_1'];
        $data['section_2'] = $content['section_2'];
        $data['section_3'] = $content['section_3'];
        $data['section_4'] = $content['section_4'];
        $data['section_5'] = $content['section_5'];
        $data['section_6'] = $content['section_6'];
        $data['section_7'] = $content['section_7'];
        $data['section_8'] = $content['section_8'];

        // table of Contente's Select Fields
        $data['display_1'] = $content['display_1'];
        $data['display_2'] = $content['display_2'];
        $data['display_3'] = $content['display_3'];
        $data['display_4'] = $content['display_4'];
        $data['display_5'] = $content['display_5'];
        $data['display_6'] = $content['display_6'];
        $data['display_7'] = $content['display_7'];
        $data['display_8'] = $content['display_8'];

         $data['main_title1'] = $content['main_title1'];
        $data['main_title2'] = $content['main_title2'];
        $data['main_title3'] = $content['main_title3'];
        $data['main_title4'] = $content['main_title4'];
        $data['main_title5'] = $content['main_title5'];
        $data['main_title6'] = $content['main_title6'];
        $data['main_title7'] = $content['main_title7'];
        $data['main_title8'] = $content['main_title8'];
		if($content['image'] !=''){
			$data['image'] = $content['image'];
		}
		if($content['gimage'] !=''){
			$data['gimage'] = $content['gimage'];
		}
		$this->_data = $data;
		if ($this->db->insert('product', $this->_data))	
		{	
			 $id = $this->db->insert_id();

            if (count($_POST['emp_benefit_desc']) > 0 && $_POST['emp_benefit_desc'] != '') 
            {
                for ($i = 0; $i < count($_POST['emp_benefit_desc']); $i++) 
                {   
                    if($_POST['emp_benefit_desc'][$i] !='')
                    {

                        $data1['p_id'] = $id;
                         $data1['emp_benefit_desc'] = $_POST['emp_benefit_desc'][$i];
                         $data1['title'] = $_POST['title'][$i];
                         $data1['altername'] = $_POST['altername'][$i];
                        
                        if($_FILES['s_image_'.$i]['name'] != '') { 
                            $tmp_name1 =  $_FILES['s_image_'.$i]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."products/emp_benefit_image/";
                            $remove_space1 = str_replace(' ', '',$_FILES['s_image_'.$i]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $tmp_path = $this->config->item('upload')."products/emp_benefit_image/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/emp_benefit_image/medium/".$logoname; 
                            $height = 100;
                            $width = 100;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            
                            $data1['s_image']   = $logoname;                         
                        }
                        $this->insert_employeebenifit($data1);
                   }
                }
            }

            if (count($_POST['group_ins_desc']) > 0 && $_POST['group_ins_desc'] != '') 
            {
                for ($i = 0; $i < count($_POST['group_ins_desc']); $i++) 
                {   
                    if($_POST['group_ins_desc'][$i] !='')
                    {

                        $data1['pid'] = $id;
                         $data1['group_ins_desc'] = $_POST['group_ins_desc'][$i];
                         $data1['title'] = $_POST['sec2_title'][$i];
                        
                        if($_FILES['section2_'.$i]['name'] != '') { 
                            $tmp_name1 =  $_FILES['section2_'.$i]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."products/section2/";
                            $remove_space1 = str_replace(' ', '',$_FILES['section2_'.$i]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $tmp_path = $this->config->item('upload')."products/section2/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/section2/medium/".$logoname; 
                            $height = 100;
                            $width = 100;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            
                            $data1['section2']   = $logoname;                         
                        }

                        $this->insert_groupInsurance($data1);
                   }
                }
            }

             if (count($_POST['section3_desc']) > 0 && $_POST['section3_desc'] != '') 
            {
                for ($i = 0; $i < count($_POST['section3_desc']); $i++) 
                {   
                    if($_POST['section3_desc'][$i] !='')
                    {

                        $data1['pro_id'] = $id;
                         $data1['description'] = $_POST['section3_desc'][$i];
                         $data1['name'] = $_POST['section3_name'][$i];
                        
                        if($_FILES['sec3_image_'.$i]['name'] != '') { 
                            $tmp_name1 =  $_FILES['sec3_image_'.$i]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."products/section3/";
                            $remove_space1 = str_replace(' ', '',$_FILES['sec3_image_'.$i]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $tmp_path = $this->config->item('upload')."products/section3/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/section3/medium/".$logoname; 
                            $height = 100;
                            $width = 100;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            
                            $data1['sec3_image']   = $logoname;                         
                        }
                        $this->insert_adavantage_group_ins($data1);
                   }
                }
            }

            if (count($_POST['feature_desc']) > 0 && $_POST['feature_desc'] != '') 
            {
                for ($i = 0; $i < count($_POST['feature_desc']); $i++) 
                {   
                    if($_POST['feature_desc'][$i] !='')
                    {

                        $data1['prod_id'] = $id;
                         $data1['description'] = $_POST['feature_desc'][$i];
                         $data1['name'] = $_POST['feature_name'][$i];
                        
                        if($_FILES['feature_image_'.$i]['name'] != '') { 
                            $tmp_name1 =  $_FILES['feature_image_'.$i]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."products/section4/";
                            $remove_space1 = str_replace(' ', '',$_FILES['feature_image_'.$i]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $tmp_path = $this->config->item('upload')."products/section4/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/section4/medium/".$logoname; 
                            $height = 100;
                            $width = 100;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            
                            $data1['feature_image']   = $logoname;                         
                        }
                        $this->insert_featureGroupIns($data1);
                   }
                }
            }

            //  Why buy Group Health Insurance from Raghnall ? //
            if (count($_POST['whybuy_desc']) > 0 && $_POST['whybuy_desc'] != '') 
            {
                for ($i = 0; $i < count($_POST['whybuy_desc']); $i++) 
                {   
                    if($_POST['whybuy_desc'][$i] !='')
                    {

                        $data1['proid'] = $id;
                         $data1['description'] = $_POST['whybuy_desc'][$i];
                         $data1['name'] = $_POST['whybuy_name'][$i];
                        $this->insert_WhybuyGroupIns($data1);
                   }
                }
            }

            //  Who should buy Group Health Insurance //
            if (count($_POST['whyshould_desc']) > 0 && $_POST['whyshould_desc'] != '') 
            {
                for ($i = 0; $i < count($_POST['whyshould_desc']); $i++) 
                {   
                    if($_POST['whyshould_desc'][$i] !='')
                    {

                        $data1['produc_id'] = $id;
                         $data1['description'] = $_POST['whyshould_desc'][$i];
                         $data1['name'] = $_POST['whyshould_name'][$i];
                        
                        if($_FILES['whyshould_image_'.$i]['name'] != '') { 
                            $tmp_name1 =  $_FILES['whyshould_image_'.$i]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."products/who_shouldGroup/";
                            $remove_space1 = str_replace(' ', '',$_FILES['whyshould_image_'.$i]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $tmp_path = $this->config->item('upload')."products/who_shouldGroup/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/who_shouldGroup/large/".$logoname; 
                            $height = 440;
                            $width = 530;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();

                            $tmp_path = $this->config->item('upload')."products/who_shouldGroup/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/who_shouldGroup/medium/".$logoname; 
                            $height = 312;
                            $width = 376;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            $data1['whyshould_image']   = $logoname;                         
                        }
                        $this->insert_whoShouldBuy($data1);
                   }
                }
            }

            //  Purchasing Group Health Insurance for your employees //
            if (count($_POST['purchase_desc']) > 0 && $_POST['purchase_desc'] != '') 
            {
                for ($i = 0; $i < count($_POST['purchase_desc']); $i++) 
                {   
                    if($_POST['purchase_desc'][$i] !='')
                    {

                        $data1['produ_id'] = $id;
                         $data1['description'] = $_POST['purchase_desc'][$i];
                         $data1['name'] = $_POST['purchase_name'][$i];
                        $this->insert_purchaseGroupIns($data1);
                   }
                }
            }

            //  FAQ  //
            if (count($_POST['faq_desc']) > 0 && $_POST['faq_desc'] != '') 
            {
                for ($i = 0; $i < count($_POST['faq_desc']); $i++) 
                {   
                    if($_POST['faq_desc'][$i] !='')
                    {

                        $data1['faq_pid'] = $id;
                         $data1['description'] = $_POST['faq_desc'][$i];
                         $data1['name'] = $_POST['faq_name'][$i];
                        $this->insert_faq($data1);
                   }
                }
            }
			return true; 
		} 
		else 
		{
			return false;
		}
	}

		

	function edit($id, $content) 
	{

      //  echo "<pre>";print_r($_POST);echo "</pre>";exit;

		$data['name'] = $content['name'];
		$data['page_url'] = $content['page_url'];
		if($content['get_quote'] !=''){
            $data['get_quote'] = $content['get_quote']; 
        }
        if($content['for_employee'] !=''){
            $data['for_employee'] = $content['for_employee']; 
        }
		$data['short_description'] = $content['short_description'];
        $data['uniemp_desc'] = $content['uniemp_desc'];
        $data['section_two_desc'] = $content['section_two_desc'];
        $data['title_1'] = $content['title_1']; 
        $data['title_2'] = $content['title_2']; 
        $data['advantage_desc'] = $content['advantage_desc'];
		$data['description'] = $content['description'];
		$data['group_title'] = $content['group_title'];
		$data['category_id'] = $content['category_id'];
		$data['tags'] = $content['tags'];

        // table of Contente's Input Fields
        $data['section_1'] = $content['section_1'];
        $data['section_2'] = $content['section_2'];
        $data['section_3'] = $content['section_3'];
        $data['section_4'] = $content['section_4'];
        $data['section_5'] = $content['section_5'];
        $data['section_6'] = $content['section_6'];
        $data['section_7'] = $content['section_7'];
        $data['section_8'] = $content['section_8'];

        // table of Contente's Select Fields
        $data['display_1'] = $content['display_1'];
        $data['display_2'] = $content['display_2'];
        $data['display_3'] = $content['display_3'];
        $data['display_4'] = $content['display_4'];
        $data['display_5'] = $content['display_5'];
        $data['display_6'] = $content['display_6'];
        $data['display_7'] = $content['display_7'];
        $data['display_8'] = $content['display_8'];

        $data['main_title1'] = $content['main_title1'];
        $data['main_title2'] = $content['main_title2'];
        $data['main_title3'] = $content['main_title3'];
        $data['main_title4'] = $content['main_title4'];
        $data['main_title5'] = $content['main_title5'];
        $data['main_title6'] = $content['main_title6'];
        $data['main_title7'] = $content['main_title7'];
        $data['main_title8'] = $content['main_title8'];

		$data['metatitle'] = $content['metatitle'];
		$data['metakeywords'] = $content['metakeywords'];
		$data['metadescription'] = $content['metadescription'];
		if($content['image'] !=''){
			$data['image'] = $content['image'];
		}
		if($content['gimage'] !=''){
			$data['gimage'] = $content['gimage'];
		}
		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('product', $this->_data))	{

			//echo "<pre>";print_r($_POST);echo "</pre>";exit;
		//	echo "<pre>";print_r($_POST['emp_benefit_desc1']);echo "</pre>";exit;     

			if ($_POST['emp_benefit_desc1'] != '' && count($_POST['emp_benefit_desc1']) > 0) {

                for ($i = 0; $i < count($_POST['emp_benefit_desc1']); $i++) {

                    if ($_POST['emp_benefit_desc1'][$i] != '') {
                        $content2['p_id'] = $id;
                         $content2['emp_benefit_desc'] = $_POST['emp_benefit_desc1'][$i];
                         $content2['title'] = $_POST['title1'][$i];
                        
                        if($_FILES['e_image1_'.$i]['name'] != '') { 
                            $tmp_name1 =  $_FILES['e_image1_'.$i]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."products/emp_benefit_image/";
                            $remove_space1 = str_replace(' ', '',$_FILES['e_image1_'.$i]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $tmp_path = $this->config->item('upload')."products/emp_benefit_image/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/emp_benefit_image/medium/".$logoname; 
                            $height = 100;
                            $width  = 100;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            
                            $content2['s_image'] = $logoname;                         
                        }
                         $this->insert_employeebenifit($content2);
                    }
                }
                
            }

             if (count($_POST['emp_benefit_descu']) > 0 && $_POST['emp_benefit_descu'] != '') {

                $k=0;
                for ($i = 0; $i < count($_POST['emp_benefit_descu']); $i++) {

                     $content1['p_id'] = $id;

                      $content1['emp_benefit_descu'] = $_POST['emp_benefit_descu'][$i];
                      $content1['titleu'] = $_POST['titleu'][$i];
                      $content1['updateid1xxx'] = $_POST['updateid1xxx'][$i];

                     if($_FILES['s_imageu_'.$i]['name'] != '') { 
                        $tmp_name1 =  $_FILES['s_imageu_'.$i]['tmp_name'];  
                        $rootpath1 =  $this->config->item('upload')."products/emp_benefit_image/";
                        $remove_space1 = str_replace(' ', '',$_FILES['s_imageu_'.$i]['name']);
                        $logoname = time().$remove_space1;
                        move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                        $tmp_path = $this->config->item('upload')."products/emp_benefit_image/".$logoname;
                        $image_thumb = $this->config->item('upload')."products/emp_benefit_image/medium/".$logoname; 
                        $height = 100;
                        $width  = 100;
                        $this->load->library('image_lib');
                        $config['image_library']    = 'gd2';
                        $config['source_image']     = $tmp_path;
                        $config['new_image']        = $image_thumb;
                        $config['maintain_ratio']   = false;
                        $config['height']           = $height;
                        $config['width']            = $width;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        
                        $content1['s_image'] = $logoname;   
                    }else
                        {
                            $content1['s_image'] ="";
                        } 
                        $this->update_emp_benifit($content1);  
               $k++; }

            }


           // echo "<pre>";print_r($_POST['emp_benefit_desc2']);echo "</pre>";exit;
            if ($_POST['emp_benefit_desc2'] != '' && count($_POST['emp_benefit_desc2']) > 0) {

                for ($d = 0; $d < count($_POST['emp_benefit_desc2']); $d++) {

                    if ($_POST['emp_benefit_desc2'][$d] != '') {
                         $content2['pid'] = $id;
                         $content2['group_ins_desc'] = $_POST['emp_benefit_desc2'][$d];
                         $content2['title'] = $_POST['title2'][$d];

                        if($_FILES['gsection2_'.$d]['name'] != '') { 
                            $tmp_name1 =  $_FILES['gsection2_'.$d]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."products/section2/";
                            $remove_space1 = str_replace(' ', '',$_FILES['gsection2_'.$d]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $tmp_path = $this->config->item('upload')."products/section2/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/section2/medium/".$logoname; 
                            $height = 100;
                            $width  = 100;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            
                            $content2['section2'] = $logoname;                         
                        }        
            			$this->insert_groupInsurance($content2);
                    }
                }
                
            }

             if (count($_POST['group_health_descu']) > 0 && $_POST['group_health_descu'] != '') {

                $k=0;
               // echo "<pre>";print_r($_POST['emp_benefit_descu']);echo "</pre>";exit;
                for ($i = 0; $i < count($_POST['group_health_descu']); $i++) {

                     $content1['pid'] = $id;

                      $content1['group_health_descu'] = $_POST['group_health_descu'][$i];
                      $content1['sec2_titleu'] = $_POST['sec2_titleu'][$i];
                      $content1['updateid1xxx11'] = $_POST['updateid1xxx11'][$i];

                     if($_FILES['section2u_'.$i]['name'] != '') { 
                        $tmp_name1 =  $_FILES['section2u_'.$i]['tmp_name'];  
                        $rootpath1 =  $this->config->item('upload')."products/section2/";
                        $remove_space1 = str_replace(' ', '',$_FILES['section2u_'.$i]['name']);
                        $logoname = time().$remove_space1;
                        move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                        $tmp_path = $this->config->item('upload')."products/section2/".$logoname;
                        $image_thumb = $this->config->item('upload')."products/section2/medium/".$logoname; 
                        $height = 100;
                        $width  = 100;
                        $this->load->library('image_lib');
                        $config['image_library']    = 'gd2';
                        $config['source_image']     = $tmp_path;
                        $config['new_image']        = $image_thumb;
                        $config['maintain_ratio']   = false;
                        $config['height']           = $height;
                        $config['width']            = $width;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        
                        $content1['section2'] = $logoname;   
                    }else
                        {
                            $content1['section2'] ="";
                        } 
                        $this->update_groupInsurance($content1);  
               $k++; }

            }

            //echo "<pre>";print_r($_POST);echo "</pre>";exit;
            if ($_POST['desctiption1'] != '' && count($_POST['desctiption1']) > 0) {

                for ($i = 0; $i < count($_POST['desctiption1']); $i++) {

                    if ($_POST['desctiption1'][$i] != '') {
                        $content2['pro_id'] = $id;
                         $content2['description'] = $_POST['desctiption1'][$i];
                         $content2['name'] = $_POST['section3_name1'][$i];
                        
                        if($_FILES['sec3_image1_'.$i]['name'] != '') { 
                            $tmp_name1 =  $_FILES['sec3_image1_'.$i]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."products/section3/";
                            $remove_space1 = str_replace(' ', '',$_FILES['sec3_image1_'.$i]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $tmp_path = $this->config->item('upload')."products/section3/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/section3/medium/".$logoname; 
                            $height = 100;
                            $width  = 100;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            
                            $content2['sec3_image'] = $logoname;                         
                        }
                         $this->insert_adavantage_group_ins($content2);
                    }
                }
                
            }

             if (count($_POST['descriptionu']) > 0 && $_POST['descriptionu'] != '') {

                $k=0;
                for ($i = 0; $i < count($_POST['descriptionu']); $i++) {

                     $content1['pro_id'] = $id;

                      $content1['descriptionu'] = $_POST['descriptionu'][$i];
                      $content1['section3_nameu'] = $_POST['section3_nameu'][$i];
                      $content1['updateid1xxx33'] = $_POST['updateid1xxx33'][$i];

                     if($_FILES['sec3_imageu_'.$i]['name'] != '') { 
                        $tmp_name1 =  $_FILES['sec3_imageu_'.$i]['tmp_name'];  
                        $rootpath1 =  $this->config->item('upload')."products/section3/";
                        $remove_space1 = str_replace(' ', '',$_FILES['sec3_imageu_'.$i]['name']);
                        $logoname = time().$remove_space1;
                        move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                        $tmp_path = $this->config->item('upload')."products/section3/".$logoname;
                        $image_thumb = $this->config->item('upload')."products/section3/medium/".$logoname; 
                        $height = 100;
                        $width  = 100;
                        $this->load->library('image_lib');
                        $config['image_library']    = 'gd2';
                        $config['source_image']     = $tmp_path;
                        $config['new_image']        = $image_thumb;
                        $config['maintain_ratio']   = false;
                        $config['height']           = $height;
                        $config['width']            = $width;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        
                        $content1['sec3_image'] = $logoname;   
                    }else
                        {
                            $content1['sec3_image'] ="";
                        } 
                        $this->update_advantage_group_ins($content1);  
               $k++; }

            }

            if ($_POST['feature_desc1'] != '' && count($_POST['feature_desc1']) > 0) {

                for ($i = 0; $i < count($_POST['feature_desc1']); $i++) {

                    if ($_POST['feature_desc1'][$i] != '') {
                        $content2['prod_id'] = $id;
                         $content2['description'] = $_POST['feature_desc1'][$i];
                         $content2['name'] = $_POST['feature_name1'][$i];
                        
                        if($_FILES['feature_image1_'.$i]['name'] != '') { 
                            $tmp_name1 =  $_FILES['feature_image1_'.$i]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."products/section4/";
                            $remove_space1 = str_replace(' ', '',$_FILES['feature_image1_'.$i]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $tmp_path = $this->config->item('upload')."products/section4/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/section4/medium/".$logoname; 
                            $height = 100;
                            $width  = 100;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            
                            $content2['feature_image'] = $logoname;                         
                        }
                         $this->insert_featureGroupIns($content2);
                    }
                }
                
            }

             if (count($_POST['feature_descu']) > 0 && $_POST['feature_descu'] != '') {

                $k=0;
                for ($i = 0; $i < count($_POST['feature_descu']); $i++) {

                     $content1['prod_id'] = $id;

                      $content1['feature_descu'] = $_POST['feature_descu'][$i];
                      $content1['feature_nameu'] = $_POST['feature_nameu'][$i];
                      $content1['updateid1xxx44'] = $_POST['updateid1xxx44'][$i];

                     if($_FILES['feature_imageu_'.$i]['name'] != '') { 
                        $tmp_name1 =  $_FILES['feature_imageu_'.$i]['tmp_name'];  
                        $rootpath1 =  $this->config->item('upload')."products/section4/";
                        $remove_space1 = str_replace(' ', '',$_FILES['feature_imageu_'.$i]['name']);
                        $logoname = time().$remove_space1;
                        move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                        $tmp_path = $this->config->item('upload')."products/section4/".$logoname;
                        $image_thumb = $this->config->item('upload')."products/section4/medium/".$logoname; 
                        $height = 100;
                        $width  = 100;
                        $this->load->library('image_lib');
                        $config['image_library']    = 'gd2';
                        $config['source_image']     = $tmp_path;
                        $config['new_image']        = $image_thumb;
                        $config['maintain_ratio']   = false;
                        $config['height']           = $height;
                        $config['width']            = $width;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        
                        $content1['feature_image'] = $logoname;   
                    }else
                        {
                            $content1['feature_image'] ="";
                        } 
                        $this->update_feature_group_ins($content1);  
               $k++; }

            }

            if ($_POST['whybuy_desc1'] != '' && count($_POST['whybuy_desc1']) > 0) {

                for ($i = 0; $i < count($_POST['whybuy_desc1']); $i++) {

                    if ($_POST['whybuy_desc1'][$i] != '') {
                        $content2['proid'] = $id;
                         $content2['description'] = $_POST['whybuy_desc1'][$i];
                         $content2['name'] = $_POST['whybuy_name1'][$i];
                         $this->insert_WhybuyGroupIns($content2);
                    }
                }
                
            }

             if (count($_POST['whybuy_descu']) > 0 && $_POST['whybuy_descu'] != '') {

                $k=0;
                for ($i = 0; $i < count($_POST['whybuy_descu']); $i++) {

                     $content1['proid'] = $id;

                      $content1['whybuy_descu'] = $_POST['whybuy_descu'][$i];
                      $content1['whybuy_nameu'] = $_POST['whybuy_nameu'][$i];
                      $content1['updateid1xxx55'] = $_POST['updateid1xxx55'][$i];
                      $this->update_whyBuygroup_ins($content1);  
               $k++; }

            }



             if ($_POST['whyshould_desc1'] != '' && count($_POST['whyshould_desc1']) > 0) {

                for ($i = 0; $i < count($_POST['whyshould_desc1']); $i++) {

                    if ($_POST['whyshould_desc1'][$i] != '') {
                        $content2['produc_id'] = $id;
                         $content2['description'] = $_POST['whyshould_desc1'][$i];
                         $content2['name'] = $_POST['whyshould_name1'][$i];
                        
                        if($_FILES['whyshould_image1_'.$i]['name'] != '') { 
                            $tmp_name1 =  $_FILES['whyshould_image1_'.$i]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."products/who_shouldGroup/";
                            $remove_space1 = str_replace(' ', '',$_FILES['whyshould_image1_'.$i]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $tmp_path = $this->config->item('upload')."products/who_shouldGroup/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/who_shouldGroup/large/".$logoname; 
                            $height = 440;
                            $width  = 530;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();

                            $tmp_path = $this->config->item('upload')."products/who_shouldGroup/".$logoname;
                            $image_thumb= $this->config->item('upload')."products/who_shouldGroup/medium/".$logoname; 
                            $height = 312;
                            $width  = 376;
                            $this->load->library('image_lib');
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            
                            $content2['whyshould_image'] = $logoname;                         
                        }
                         $this->insert_whoShouldBuy($content2);
                    }
                }
                
            }

             if (count($_POST['whyshould_descu']) > 0 && $_POST['whyshould_descu'] != '') {

                $k=0;
                for ($i = 0; $i < count($_POST['whyshould_descu']); $i++) {

                     $content1['produc_id'] = $id;

                      $content1['whyshould_descu'] = $_POST['whyshould_descu'][$i];
                      $content1['whyshould_nameu'] = $_POST['whyshould_nameu'][$i];
                      $content1['updateid1xxx14'] = $_POST['updateid1xxx14'][$i];

                     if($_FILES['whyshould_imageu_'.$i]['name'] != '') { 
                        $tmp_name1 =  $_FILES['whyshould_imageu_'.$i]['tmp_name'];  
                        $rootpath1 =  $this->config->item('upload')."products/who_shouldGroup/";
                        $remove_space1 = str_replace(' ', '',$_FILES['whyshould_imageu_'.$i]['name']);
                        $logoname = time().$remove_space1;
                        move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                        $tmp_path = $this->config->item('upload')."products/who_shouldGroup/".$logoname;
                        $image_thumb = $this->config->item('upload')."products/who_shouldGroup/large/".$logoname; 
                        $height = 440;
                        $width  = 530;
                        $this->load->library('image_lib');
                        $config['image_library']    = 'gd2';
                        $config['source_image']     = $tmp_path;
                        $config['new_image']        = $image_thumb;
                        $config['maintain_ratio']   = false;
                        $config['height']           = $height;
                        $config['width']            = $width;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();

                         $image_thumb = $this->config->item('upload')."products/who_shouldGroup/medium/".$logoname; 
                        $height = 312;
                        $width  = 376;
                        $this->load->library('image_lib');
                        $config['image_library']    = 'gd2';
                        $config['source_image']     = $tmp_path;
                        $config['new_image']        = $image_thumb;
                        $config['maintain_ratio']   = false;
                        $config['height']           = $height;
                        $config['width']            = $width;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        
                        $content1['whyshould_image'] = $logoname;   
                    }else
                        {
                            $content1['whyshould_image'] ="";
                        } 
                        $this->update_WhoShouldgroup_ins($content1);  
               $k++; }

            }

            if ($_POST['purchase_desc1'] != '' && count($_POST['purchase_desc1']) > 0) {

                for ($i = 0; $i < count($_POST['purchase_desc1']); $i++) {

                    if ($_POST['purchase_desc1'][$i] != '') {
                        $content2['produ_id'] = $id;
                         $content2['description'] = $_POST['purchase_desc1'][$i];
                         $content2['name'] = $_POST['purchase_name1'][$i];
                         $this->insert_purchaseGroupIns($content2);
                    }
                }
                
            }

             if (count($_POST['purchase_descu']) > 0 && $_POST['purchase_descu'] != '') {

                $k=0;
                for ($i = 0; $i < count($_POST['purchase_descu']); $i++) {

                     $content1['produ_id'] = $id;

                      $content1['purchase_descu'] = $_POST['purchase_descu'][$i];
                      $content1['purchase_nameu'] = $_POST['purchase_nameu'][$i];
                      $content1['updateid1xxx22'] = $_POST['updateid1xxx22'][$i];
                      $this->update_purchasegroup_ins($content1);  
               $k++; }

            }

             if ($_POST['faq_desc1'] != '' && count($_POST['faq_desc1']) > 0) {

                for ($i = 0; $i < count($_POST['faq_desc1']); $i++) {

                    if ($_POST['faq_desc1'][$i] != '') {
                        $content2['faq_pid'] = $id;
                         $content2['description'] = $_POST['faq_desc1'][$i];
                         $content2['name'] = $_POST['faq_name1'][$i];
                         $this->insert_faq($content2);
                    }
                }
                
            }

             if (count($_POST['faq_descu']) > 0 && $_POST['faq_descu'] != '') {

                $k=0;
                for ($i = 0; $i < count($_POST['faq_descu']); $i++) {

                     $content1['faq_pid'] = $id;

                      $content1['faq_descu'] = $_POST['faq_descu'][$i];
                      $content1['faq_nameu'] = $_POST['faq_nameu'][$i];
                      $content1['updateid1xxx13'] = $_POST['updateid1xxx13'][$i];
                      $this->update_faq($content1);  
               $k++; }

            }
			return true;
		} else {
			return false;
		}
	}

	function update_emp_benifit($content) 
    {
        $data1['p_id'] = $content['p_id'];
        if($content['s_image'] !="")
        {
            $data1['emp_image'] = $content['s_image'];
        }
        $data1['emp_benefit_desc'] = $content['emp_benefit_descu'];
        $data1['title'] = $content['titleu'];
        $this->db->where('id =', $content['updateid1xxx']);

        if ($this->db->update('product_emp_benefits', $data1)){
            return true;
        } else {
            return false;
        }
    }

    function update_groupInsurance($content) 
    {
        $data1['pid'] = $content['pid'];
        if($content['section2'] !="")
        {
            $data1['image'] = $content['section2'];
        }
        $data1['group_ins_desc'] = $content['group_health_descu'];
        $data1['title'] = $content['sec2_titleu'];
        $this->db->where('id =', $content['updateid1xxx11']);
        if ($this->db->update('group_health_ins', $data1)){
            return true;
        } else {
            return false;
        }
    }

    function update_advantage_group_ins($content) 
    {
        $data1['pro_id'] = $content['pro_id'];
        if($content['sec3_image'] !="")
        {
            $data1['image'] = $content['sec3_image'];
        }
        $data1['description'] = $content['descriptionu'];
        $data1['name'] = $content['section3_nameu'];
        $this->db->where('id =', $content['updateid1xxx33']);

        if ($this->db->update('advantage_group_ins', $data1)){
            return true;
        } else {
            return false;
        }
    }

    function update_feature_group_ins($content) 
    {
        $data1['prod_id'] = $content['prod_id'];
        if($content['feature_image'] !="")
        {
            $data1['image'] = $content['feature_image'];
        }
        $data1['description'] = $content['feature_descu'];
        $data1['name'] = $content['feature_nameu'];
        $this->db->where('id =', $content['updateid1xxx44']);

        if ($this->db->update('feature_group_ins', $data1)){
            return true;
        } else {
            return false;
        }
    }

     function update_WhoShouldgroup_ins($content) 
    {
        $data1['produc_id'] = $content['produc_id'];
        if($content['whyshould_image'] !="")
        {
            $data1['image'] = $content['whyshould_image'];
        }
        $data1['description'] = $content['whyshould_descu'];
        $data1['name'] = $content['whyshould_nameu'];
        $this->db->where('id =', $content['updateid1xxx14']);

        if ($this->db->update('whoshould_group_ins', $data1)){
            return true;
        } else {
            return false;
        }
    }

    function update_whyBuygroup_ins($content) 
    {
        $data1['proid'] = $content['proid'];
        $data1['description'] = $content['whybuy_descu'];
        $data1['name'] = $content['whybuy_nameu'];
        $this->db->where('id =', $content['updateid1xxx55']);

        if ($this->db->update('why_buy_nowgroup', $data1)){
            return true;
        } else {
            return false;
        }
    }

    function update_purchasegroup_ins($content) 
    {
        $data1['produ_id'] = $content['produ_id'];
        $data1['description'] = $content['purchase_descu'];
        $data1['name'] = $content['purchase_nameu'];
        $this->db->where('id =', $content['updateid1xxx22']);

        if ($this->db->update('purchase_group_ins', $data1)){
            return true;
        } else {
            return false;
        }
    }


    function update_faq($content) 
    {
        $data1['faq_pid'] = $content['faq_pid'];
        $data1['description'] = $content['faq_descu'];
        $data1['name'] = $content['faq_nameu'];
        $this->db->where('id =', $content['updateid1xxx13']);

        if ($this->db->update('faq_attribute', $data1)){
            return true;
        } else {
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

		

	function featured_product($pid,$value)
	{
		$query = "update product set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM product where id <> 0 ";
		if($content['categoryname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['categoryname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  product  WHERE id <> 0";

		if($content['categoryname'] !='')
		{
			$sql_count .= " AND `name` like '".$content['categoryname']."%'";
		}
		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}

	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
		if ($this->db->delete('product'))	{
			return true;
		} else {
			return false;
		}
	}

	function insert_employeebenifit($content)
    {
        $data['p_id'] = $content['p_id'];

        if($content['s_image'] !="")
        {
            $data['emp_image'] = $content['s_image']; 
        }
         $data['emp_benefit_desc'] = $content['emp_benefit_desc'];
         $data['title'] = $content['title'];
        $this->_data = $data;
        if ($this->db->insert('product_emp_benefits', $this->_data)){
            return true;
        } else {
            return false;
        }
    }

    function insert_adavantage_group_ins($content)
    {
        $data['pro_id'] = $content['pro_id'];

        if($content['sec3_image'] !="")
        {
            $data['image'] = $content['sec3_image']; 
        }
         $data['description'] = $content['description'];
         $data['name'] = $content['name'];
        $this->_data = $data;
        if ($this->db->insert('advantage_group_ins', $this->_data)){
            return true;
        } else {
            return false;
        }
    }

    function insert_groupInsurance($content)
    {
        $data['pid'] = $content['pid'];

        if($content['section2'] !="")
        {
            $data['image'] = $content['section2']; 
        }
         $data['group_ins_desc'] = $content['group_ins_desc'];
         $data['title'] = $content['title'];
        $this->_data = $data;
        if ($this->db->insert('group_health_ins', $this->_data)){
            return true;
        } else {
            return false;
        }
    }

    function insert_featureGroupIns($content)
    {
        $data['prod_id'] = $content['prod_id'];

        if($content['feature_image'] !="")
        {
            $data['image'] = $content['feature_image']; 
        }
         $data['description'] = $content['description'];
         $data['name'] = $content['name'];
        $this->_data = $data;
        if ($this->db->insert('feature_group_ins', $this->_data)){
            return true;
        } else {
            return false;
        }
    }

    function insert_WhybuyGroupIns($content)
    {
         $data['proid'] = $content['proid'];
         $data['description'] = $content['description'];
         $data['name'] = $content['name'];
        $this->_data = $data;
        if ($this->db->insert('why_buy_nowgroup', $this->_data)){
            return true;
        } else {
            return false;
        }
    }

    function insert_purchaseGroupIns($content)
    {
         $data['produ_id'] = $content['produ_id'];
         $data['description'] = $content['description'];
         $data['name'] = $content['name'];
        $this->_data = $data;
        if ($this->db->insert('purchase_group_ins', $this->_data)){
            return true;
        } else {
            return false;
        }
    }

    function insert_faq($content)
    {
         $data['faq_pid'] = $content['faq_pid'];
         $data['description'] = $content['description'];
         $data['name'] = $content['name'];
        $this->_data = $data;
        if ($this->db->insert('faq_attribute', $this->_data)){
            return true;
        } else {
            return false;
        }
    }

    function insert_whoShouldBuy($content)
    {
        $data['produc_id'] = $content['produc_id'];

        if($content['whyshould_image'] !="")
        {
            $data['image'] = $content['whyshould_image']; 
        }
         $data['description'] = $content['description'];
         $data['name'] = $content['name'];
        $this->_data = $data;
        if ($this->db->insert('whoshould_group_ins', $this->_data)){
            return true;
        } else {
            return false;
        }
    }


	function get_product($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('product');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function addition_item($id) {
        $this->db->where('p_id = ', $id);
        $query = $this->db->get('product_emp_benefits');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function advantage_group_ins($id) {
        $this->db->where('pro_id = ', $id);
        $query = $this->db->get('advantage_group_ins');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function group_healthInsurance($id) {
        $this->db->where('pid = ', $id);
        $query = $this->db->get('group_health_ins');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function feature_groupInsurance($id) {
        $this->db->where('prod_id=', $id);
        $query = $this->db->get('feature_group_ins');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function whyBuy_groupInsurance($id) {
        $this->db->where('proid=', $id);
        $query = $this->db->get('why_buy_nowgroup');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function purchase_groupInsurance($id) {
        $this->db->where('produ_id=', $id);
        $query = $this->db->get('purchase_group_ins');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function faq_additional_data($id) {
        $this->db->where('faq_pid=', $id);
        $query = $this->db->get('faq_attribute');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function whoShould_groupInsurance($id) {
        $this->db->where('produc_id=', $id);
        $query = $this->db->get('whoshould_group_ins');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

	

	function updateorder($id,$val){
		$content['set_order'] = $val;
		$this->db->where('id',$id);
		return $this->db->update('product', $content);	
	}

	function getgourp_name($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('group1');
		if($query->num_rows() > 0)
		{
			return $query->row()->name;
		}
		else
		{
			return false;
		}
	}

	function get_categoryname($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            $result = $query->row()->name;
            return $result;
        } else {
            return false;
        }
    }

	function is_already_exist_add($user)
	{
		$this->db->where('email',$user['email']);
		$query = $this->db->get('user');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}	

	function is_already_exist_edit($user,$id)
	{
		$this->db->where('id !=',$id);
		$this->db->where('email',$user['email']);
		$query = $this->db->get('user');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function removeattriute($product_id, $id) {
        $this->db->where('p_id = ', $product_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('product_emp_benefits')) {
            return true;
        } else {
            return false;
        }
    }

    function removeprice_faq($product_id, $id) {
        $this->db->where('faq_pid = ', $product_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('faq_attribute')) {
            return true;
        } else {
            return false;
        }
    }

    function removeprice_purchase($product_id, $id) {
        $this->db->where('produ_id = ', $product_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('purchase_group_ins')) {
            return true;
        } else {
            return false;
        }
    }

    function removeattriute1($product_id, $id) {
        $this->db->where('pid = ', $product_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('group_health_ins')) {
            return true;
        } else {
            return false;
        }
    }
    function removeattriute2($product_id, $id) {
        $this->db->where('pro_id = ', $product_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('advantage_group_ins')) {
            return true;
        } else {
            return false;
        }
    }

    function removeattriute3($product_id, $id) {
        $this->db->where('prod_id = ', $product_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('feature_group_ins')) {
            return true;
        } else {
            return false;
        }
    }

    function removeattriute4($product_id, $id) {
        $this->db->where('proid = ', $product_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('why_buy_nowgroup')) {
            return true;
        } else {
            return false;
        }
    }

    function removeattriute5($product_id, $id) {
        $this->db->where('produc_id = ', $product_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('whoshould_group_ins')) {
            return true;
        } else {
            return false;
        }
    }

	function updatestatus($id,$is_active)
	{	
		$sql= " update user set active_deactive= '".$is_active."' where id='".$id."' ";		
		if ($query = $this->db->query($sql))	
			{			
				return true;		
			} else {			
				return false;			
			}	
	}

}

?>