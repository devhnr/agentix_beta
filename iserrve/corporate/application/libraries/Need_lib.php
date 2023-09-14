<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
    }

    public function get_policies(){
        $CI =& get_instance();
        $CI->load->model('Home_Model');
        $policies =$CI->Home_Model->get_policy_by_corporate();
        return $policies['policies'] = $policies;
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

    function mail_sent($to,$subject,$message,$addcc,$AddAttachment=''){
        error_reporting(E_STRICT);
        $mail = new PHPMailer(true);
        try {
        /*******Server settings********/
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
  	// 	  error_reporting(E_STRICT);
  	// 		$mail = new PHPMailer(true);
  	// 		try {
  	// 		/*******Server settings********/
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

  	// 		$mail->isHTML(true);// Set email format to HTML
  	// 		$mail->Subject = $subject;
  	// 		$mail->Body    = $message;
  	// 		$mail->send();
  	// 		return true;
  	// 	} catch (Exception $e) {
  	// 		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  	// 	}
  	// }

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
