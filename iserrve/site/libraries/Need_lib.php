<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Need_lib {
    var $CI;

    public function __construct() {
        include("phpmailer/PHPMailer.php");
        include("phpmailer/SMTP.php");
        include("phpmailer/POP3.php");
        $this->CI = & get_instance();
        $this->CI->load->helper('url');
        //$this->config = $this->CI->config['base_url'];
        // $this->CI->load->model('admin_model', 'am');
        // $this->CI->load->model('public_model', 'pm');
    }

    public function send_mail($to_email, $sub, $msg) {
        $from_email = "email@example.com";
        $this->CI->load->library('email');
        $this->CI->email->from($from_email, 'Charuta Agro Pvt. Ltd.');
        $this->CI->email->to($to_email);
        $this->CI->email->set_mailtype("html");
        $this->CI->email->subject($sub);
        $this->CI->email->message($msg);
        if ($this->CI->email->send()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function upload_file($file, $tmp_file, $path) {
        $name = time() . "." . $file;
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == "pdf") {
            move_uploaded_file($tmp_file, $path . $name);
            return $name;
        } else {
            return FALSE;
        }
    }

    public function Upload_resize_file($name, $path) {
        // $name is form field name.
        if ($_FILES[$name]['error'] == 0) {
            //upload and update the file
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['overwrite'] = false;
            $config['remove_spaces'] = true;
            $new_name = time() . '-' . $_FILES[$name]['name'];
            $config['file_name'] = $new_name;
            //$config['max_size'] = '100';// in KB

            $this->CI->load->library('upload', $config);

            if (!$this->CI->upload->do_upload($name)) {
                $this->CI->session->set_flashdata('msg_e', $this->CI->upload->display_errors('', ''));
                return FALSE;
            } else {
                //Image Resizing
                $config['source_image'] = $this->CI->upload->upload_path . $this->CI->upload->file_name;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 500;
                $config['height'] = 500;

                $this->CI->load->library('image_lib', $config);

                if (!$this->CI->image_lib->resize()) {
                    $this->CI->session->set_flashdata('msg_e', $this->CI->image_lib->display_errors('', ''));
                    return FALSE;
                } else {
                    return $this->CI->upload->file_name;
                }
            }
        }
    }

    public function pagination($page_url, $table_name) {
        return $data;
    }

    // public function send_sms($mobiles, $message) {
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, "http://sms.procreations.in/api/sendhttp.php?authkey=183418Aakv3DJ8NR5a093741&mobiles=$mobiles&message=$message&sender=ABCDEF&route=1");
    //     curl_setopt($ch, CURLOPT_HEADER, 0);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // tell the return not to go to the browser
    //     $output = curl_exec($ch); // point the data to a variable
    //     curl_close($ch);
    //     return $output;
    // }

    public function general_pagination($page_url, $table_name, $id_name) {
        $this->CI->load->library('pagination');
        $config = array();
        // $page_url = base_url() . "lawyer_profile_data/lawyer_question";
        $config["base_url"] = $page_url;
        $total_row = $this->CI->am->count($table_name);
        $config["total_rows"] = $total_row;
        $config["per_page"] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->CI->pagination->initialize($config);
        if ($this->CI->uri->segment(3)) {
            $page = ($this->CI->uri->segment(3));
        } else {
            $page = 1;
        }
        $pageStart = ($page * $config["per_page"]) - $config["per_page"];
        $this->CI->pagination->initialize($config);

        $data["page_data"] = $this->CI->am->page_data($config["per_page"], $pageStart, $table_name, $id_name);
        $data["links"] = $this->CI->pagination->create_links();

        return $data;
    }

    public function webpConvert2($file, $compression_quality = 80){
      // check if file exists
      if (!file_exists($file)) {
          return false;
      }
      $file_type = exif_imagetype($file);
      //https://www.php.net/manual/en/function.exif-imagetype.php
      //exif_imagetype($file);
      // 1    IMAGETYPE_GIF
      // 2    IMAGETYPE_JPEG
      // 3    IMAGETYPE_PNG
      // 6    IMAGETYPE_BMP
      // 15   IMAGETYPE_WBMP
      // 16   IMAGETYPE_XBM
      echo '<pre>'; print_r($file);exit;
      $output_file =  $file . '.webp';
      if (file_exists($output_file)) {

          return $output_file;
      }
      if (function_exists('imagewebp')) {
          switch ($file_type) {
              case '1': //IMAGETYPE_GIF
                  $image = imagecreatefromgif($file);
                  break;
              case '2': //IMAGETYPE_JPEG
                  $image = imagecreatefromjpeg($file);
                  break;
              case '3': //IMAGETYPE_PNG
                      $image = imagecreatefrompng($file);
                      imagepalettetotruecolor($image);
                      imagealphablending($image, true);
                      imagesavealpha($image, true);
                      break;
              case '6': // IMAGETYPE_BMP
                  $image = imagecreatefrombmp($file);
                  break;
              case '15': //IMAGETYPE_Webp
                 return false;
                  break;
              case '16': //IMAGETYPE_XBM
                  $image = imagecreatefromxbm($file);
                  break;
              default:
                  return false;
          }
          // Save the image
          $result = imagewebp($image, $output_file, $compression_quality);
          if (false === $result) {
              return false;
          }
          // Free up memory
          imagedestroy($image);
          return $output_file;
      } elseif (class_exists('Imagick')) {
          $image = new Imagick();
          $image->readImage($file);
          if ($file_type === "3") {
              $image->setImageFormat('webp');
              $image->setImageCompressionQuality($compression_quality);
              $image->setOption('webp:lossless', 'true');
          }
          $image->writeImage($output_file);
          return $output_file;
      }
      return false;
  }

  public function newtwork_hospitals(){
    $AuthId = 'k3KWzKaJPgr7RQD1uUXbisuRaxj33bx1oGvp56kXe8s=';
    $operation = 'GetNetworkHospitals';
    $url="https://software.healthindiatpa.com/HiWebApi/RIBRM/".$operation;
    $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
          "AuthId": "'.$AuthId.'",
          "InsAbbrevation": "HC"
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Basic UklCUk06UklCUk0xMTg='
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }

  public function send_otp($mobile, $otp, $project){
      $curl = curl_init();
      $url = "https://enterprise.smsgupshup.com/GatewayAPI/rest?method=SendMessage&send_to=91".$mobile."&msg=".$project."&msg_type=TEXT&userid=2000214818&auth_scheme=plain&password=5E9V3QAG&v=1.1&format=text";
      curl_setopt_array($curl, array(CURLOPT_URL =>$url,
      // curl_setopt_array($curl, array(CURLOPT_URL =>"https://enterprise.smsgupshup.com/GatewayAPI/rest?method=SendMessage&send_to=91$mobile&msg=Dear%20Customer,%20Your%20OTP%20for%20Raghnall%20Login%20is%20$otp.%20%20Kindly%20do%20not%20share%20your%20OTP,%20as%20it%20is%20confidential.&msg_type=TEXT&userid=2000214818&auth_scheme=plain&password=5E9V3QAG&v=1.1&format=text",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      return TRUE;
  }

  public function enrollment_details($policy_no,$employee_no){
    // echo '<pre>'; print_r($policy_no);exit;
    $AuthId = 'k3KWzKaJPgr7RQD1uUXbisuRaxj33bx1oGvp56kXe8s=';
    $operation = 'GetEnrollmentDetails';
    $Group_Code = 'RIBRM';
    $url="https://software.healthindiatpa.com/HiWebApi/".$Group_Code."/".$operation;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "PolicyNumber": "'.$policy_no.'",
        "EmployeeNumber": "'.$employee_no.'",
        "AuthId": "'.$AuthId.'",
        "Group_Code": "'.$Group_Code.'",
        "StartIndex": 6,
        "EndIndex": 7
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Basic UklCUk06UklCUk0xMTg='
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }

  public function downloaded_Ecard($policy_no,$employee_no){
      $AuthId = 'k3KWzKaJPgr7RQD1uUXbisuRaxj33bx1oGvp56kXe8s=';
      $operation = 'GetDownloadedEcard';
      $Group_Code = 'RIBRM';
      $url="https://software.healthindiatpa.com/HiWebApi/".$Group_Code."/".$operation;
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
              "PolicyNo": "'.$policy_no.'",
              "EmployeeNumber": "'.$employee_no.'",
              "AuthId": "'.$AuthId.'",
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Basic UklCUk06UklCUk0xMTg='
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return json_decode($response);

  }

   function mail_sent($to,$subject,$message,$addcc,$AddAttachment=''){

      // ini_set('display_errors', 1);
      // ini_set('display_startup_errors', 1);
      // error_reporting(E_ALL);
      error_reporting(E_STRICT);
      $mail = new PHPMailer(true);

      try {
      /*******Server settings********/
      // $mail->SMTPDebug = 2;                                       // Enable verbose debug output
      $mail->isSMTP();                                            // Set mailer to use SMTP
      $mail->Host       = 'smtp.zeptomail.in';  // Specify main and backup SMTP servers
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'emailapikey';      // SMTP username
      $mail->Password   = 'PHtE6r0FF+vpjW4o8RVS4KDpE5WnMYou/e4yfwVEuYhKA6MDFk1crtB/wTG2qBh/UvBAFPOYwY5t4OjOteKAIGvrMD5JWmqyqK3sx/VYSPOZsbq6x00UsFsSdkfUXYfpcdVj0iDWvNbZNA==';                   // SMTP password
      $mail->SMTPSecure = "TLS";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
      $mail->Port       = 587;                                    // TCP port to connect to
      //Recipients
      $mail->setFrom('ebsupport@iserrve.raghnall.co.in', 'iSerrve by Raghnall');
      $mail->addAddress($to, "");

      /******* Add a recipient******/
      if($addcc !='' && count($addcc)>0)
      {
        foreach($addcc as $key=>$value)
        {
          $mail->addCC($value);
        }
      }

      /*******Attachment Section*******/
      /*$mail->addStringAttachment(file_get_contents($AddAttachment), 'Raghnall');
        if($AddAttachment !='' && count($AddAttachment)>0)
        {
          foreach($AddAttachment as $key=>$value)
          {
            if($value !='')
            {
              $mail->addAttachment($value);
            }
          }
        }*/
      /****** Content ********/
      $mail->isHTML(true);// Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = $message;
      $mail->send();
      return true;
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

 //  function mail_sent($to,$subject,$message,$addcc,$AddAttachment=''){

 //      // ini_set('display_errors', 1);
 //      // ini_set('display_startup_errors', 1);
 //      // error_reporting(E_ALL);
	// 	  error_reporting(E_STRICT);
	// 		$mail = new PHPMailer(true);

	// 		try {
	// 		/*******Server settings********/
	// 		// $mail->SMTPDebug = 2;                                       // Enable verbose debug output
	// 		$mail->isSMTP();                                            // Set mailer to use SMTP
	// 		$mail->Host       = 'mail.raghnall.net';  // Specify main and backup SMTP servers
	// 		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	// 		$mail->Username   = 'iSerrve@raghnall.net';      // SMTP username
	// 		$mail->Password   = 'iSerrve@rib22';                   // SMTP password
	// 		$mail->SMTPSecure = "ssl";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
	// 		$mail->Port       = 465;                                    // TCP port to connect to
	// 		//Recipients
	// 		$mail->setFrom('iSerrve@raghnall.net', 'Raghnall');
	// 		$mail->addAddress($to, "");

 //      /******* Add a recipient******/
	// 		if($addcc !='' && count($addcc)>0)
	// 		{
	// 			foreach($addcc as $key=>$value)
	// 			{
	// 				$mail->addCC($value);
	// 			}
	// 		}

 //      /*******Attachment Section*******/
	// 		/*$mail->addStringAttachment(file_get_contents($AddAttachment), 'Raghnall');
 //  			if($AddAttachment !='' && count($AddAttachment)>0)
 //  			{
 //  				foreach($AddAttachment as $key=>$value)
 //  				{
 //  					if($value !='')
 //  					{
 //  						$mail->addAttachment($value);
 //  					}
 //  				}
 //  			}*/
	// 		/****** Content ********/
	// 		$mail->isHTML(true);// Set email format to HTML
	// 		$mail->Subject = $subject;
	// 		$mail->Body    = $message;
	// 		$mail->send();
	// 		return true;
	// 	} catch (Exception $e) {
	// 		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	// 	}
	// }

  public function otpless($redirectionURL){
      $url= "https://api.otpless.app/v1/client/user/session/initiate";
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
            "loginMethod":"WHATSAPP",
            "redirectionURL":"'.$redirectionURL.'",
            "state": "YOUR_STATE"
      }
      ',
      CURLOPT_HTTPHEADER => array(
        'appId: OTPLess:STMGGYXIOYPMALYCHCBFUUNAEEGPUKIL',
        'Content-Type: application/json'
      ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return json_decode($response);

  }

  public function otpless_userdata($token){
    $url= "https://api.otpless.app/v1/client/user/session/userdata";
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,'',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "token":"'.$token.'",
        "state":"STATE_PASSED_IN_GET_URL_CALL_HERE"
    }',
      CURLOPT_HTTPHEADER => array(
        'appId: OTPLess:STMGGYXIOYPMALYCHCBFUUNAEEGPUKIL',
        'appSecret: znW5qYz4No1VJz2QyhMvFzGELo7F3b4DfZZa3vPENzBHaM4k3SbqmlyLnDV88tlak',
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);

  }

  public function add_to_healthindia($data,$policy_no,$member_id){
      $AuthId = 'k3KWzKaJPgr7RQD1uUXbisuRaxj33bx1oGvp56kXe8s=';
      $operation = 'IntimateClaimRequest';
      $Group_Code = 'RIBRM';
      $url="https://software.healthindiatpa.com/HiWebApi/".$Group_Code."/".$operation;
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
          "AilmentDescription": "'.$data["diagnosis"].'",
          "ContactNo": "'.$data["contact_no"].'",
          "DateOfAdmission": "'.$data["date_of_admission"].'",
          "HospName": "'.$data["hospital_name"].'",
          "HospAddress": "'.$data["hospital_address"].'",
          "MemberId": "'.$member_id.'",
          "Family_Code": "AVS123",
          "PolicyNo": "'.$policy_no.'",
          "AuthId": "'.$AuthId.'"
      }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Basic UklCUk06UklCUk0xMTg='
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return $response;
  }
  
    public function assessment_api($data){
      $dat = date('m-d-Y', strtotime($data["dob"]));
      $url="https://api.healthieu.in/SSO/Registration/Login";
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{
			    "Name": "'.$data["name"].'",
			    "Mobile": "'.$data["contact_no"].'",
			    "Gender": "'.$data["gender"].'",
			    "DOB": "'.$dat.'",
			    "BrokerId": 26
			}',
			  CURLOPT_HTTPHEADER => array(
			    'Content-Type: application/json'
			  ),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			return json_decode($response);
	}
}
