<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Need_lib {
    var $CI;

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->helper('url');
    }

    public function upload_file($file, $tmp_file, $path) {
        $name = time() . "." . $file;
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == "jpg" || $ext == "png" || $ext == "jpeg") {
            move_uploaded_file($tmp_file, $path . $name);
            return $name;
        } else {
            return FALSE;
        }
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

  function mail_sent($to,$subject,$message,$addcc,$AddAttachment=''){
      include("phpmailer/PHPMailer.php");
      include("phpmailer/SMTP.php");
      include("phpmailer/POP3.php");
      // ini_set('display_errors', 1);
      // ini_set('display_startup_errors', 1);
      // error_reporting(E_ALL);
		  error_reporting(E_STRICT);
			$mail = new PHPMailer(true);

			try {
			/*******Server settings********/
			//$mail->SMTPDebug = 2;                                       // Enable verbose debug output
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
          "ProviderNumber": "1234",
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

  public function insert_claim_by_api($policy_no){
      $AuthId = 'k3KWzKaJPgr7RQD1uUXbisuRaxj33bx1oGvp56kXe8s=';
      $operation = 'GetClaimsList';
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
        "PolicyNumber": "'.$policy_no.'",
        "FromDate": "",
        "ToDate": "",
        "AuthId": "'.$AuthId.'",
      }',
      CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return json_decode($response);
  }

  public function getEnrollmentDetails($policy_no){
    //$policy_no = '0239749029 00';
    $AuthId = 'k3KWzKaJPgr7RQD1uUXbisuRaxj33bx1oGvp56kXe8s=';
    $operation = 'GetEnrollmentDetails';
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
        "PolicyNumber": "'.$policy_no.'",
        "AuthId": "'.$AuthId.'",
        "Group_Code": "",
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

}

?>
