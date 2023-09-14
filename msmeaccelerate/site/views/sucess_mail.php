
<?php
$front_base_url = $this->config->item('front_base_url');
$base_url       = $this->config->item('base_url');
$index_url      = $this->config->item('index_url');
$findex_url         = $this->config->item('findex_url');
$base_url_views = $this->config->item('base_url_views');
$http_host = $this->config->item('http_host');
?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>Risk Exposure Report</title>

    

</head>

<body style="margin: 0 auto;">

    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background: #f5f7f8;">



        <tr>

            <td align="center">

                <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:20px;">

                 <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Anek+Latin:wght@500&display=swap" rel="stylesheet">

                    <tbody>

                        <tr>

                            <td align="center" valign="top" bgcolor="#fff">

                                <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="

                               

                                background-color: white;

                                margin: 20px;

                                

                            ">

                                    <tbody>



                                        



                                    <tr>

                                      <td align="center" style="font-family: 'Helvetica', sans-serif; font-size: 30pt; color:#3c3c3c; line-height: 34pt; font-weight: bold; ">

                                        <img src="<?php echo $base_url_views?>asset_new/img/logo.png">

                                      </td>

                                    </tr>



                                    <tr>

                                        <td height="20"></td>

                                    </tr>



                                    <tr>

                                      <td align="center" style="font-family: 'Helvetica', sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">

                                        <h3 style="    text-align: center;

margin: 0px ; font-size: 30px; font-family: 'Anek Latin', sans-serif;">Your Risk Exposure Report is here!</h3>

                                      </td>

                                    </tr>
                                 
                                    <tr>

                                        <td height="20"></td>

                                    </tr>

                                    <tr>

                                      <td align="center" style="font-family: 'Helvetica', sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">
                                          

 <a href="#" title="HTML Email Check" target="_blank">
    <img src="https://msmeaccelerate.in/beta/site/views/asset_new/img/bgimg.jpg" alt="HTML Email Check">
  </a>



                                      </td>

                                    </tr>

                                    </tbody>

                                </table>

                            </td>

                        </tr>



                        <tr>

                            <td align="center" valign="top" bgcolor="#fff">

                                <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">

                                    <tbody>



                                    <tr>

                                      <td align="center" style="font-family: 'Helvetica', sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">

                                        <h3 style="    text-align: left;

margin: 10px; font-size: 18px; font-family: 'Anek Latin', sans-serif;">Dear <?php echo $username;?>,</h3>

                                      </td>

                                    </tr>



                                    

                                    <tr>

                                        <td align="center" style=" font-family: 'Helvetica', sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">

                                          <h3 style="   font-weight:100;  text-align: left;

  margin: 10px; font-size: 17px; font-family: 'Anek Latin', sans-serif;">Thank You for choosing Raghnall. Please find attached the Risk Exposure Report for your organization.</h3>

                                        </td>





                                      </tr>



                                    <tr>

                                        <td align="center" style=" font-family: 'Helvetica', sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">

                                          <h3 style="   font-weight:100;  text-align: left;

  margin: 10px; font-size: 17px; font-family: 'Anek Latin', sans-serif;">MSME Accelerate by Raghnall is an ecosystem catering to the needs of Small, Medium, and Micro Enterprises and startups. We enable organizations to identify and evaluate risks unique to their business and provide expert guidance on Insurance, Finance, Claims, Employee Wellness, and other related matters.</h3>

                                        </td>





                                      </tr>
                                       

                                    <tr>

                                        <td align="center" style="font-family: 'Helvetica', sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">

                                          <h3 style=" font-weight:100;    text-align: left;

  margin: 10px; font-size: 17px; font-family: 'Anek Latin', sans-serif;">To find out more about how we can help you manage your risk, schedule a call with our expert now or connect with us at <a href="mailto:consult@raghnall.co.in."> consult@raghnall.co.in.</a></h3>

                                        </td>



                                        

                                      </tr>


  <tr>

                                        <td align="center" style="font-family: 'Helvetica', sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">
<a href="https://calendly.com/raghnall_cal/meeting-with-msmeaccelerate" target="_blank">
                                       <button style="background-color:#85ba14; color:white;   padding: 10px 32px; border:none; font-family: 'Helvetica', sans-serif; font-size:15pt;  line-height: 22pt; font-weight: 400; border-radius:5px;">Schedule a call with our expert</button>
</a>
                                        </td>



                                        

                                      </tr>



                                      <tr>

                                        <td align="center" style="font-family: 'Helvetica', sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">

                                            <h3 style="    text-align: left;

    margin: 10px; font-size: 17px; font-family: 'Anek Latin', sans-serif;">Sincerely,<br>

Raghnall</h3>

                                          </td>



                                      </tr>



                                      

                                      <tr>

                                        <td align="center" style="font-family: 'Helvetica', sans-serif; font-size:15pt; color:#3c3c3c; line-height: 22pt; font-weight: 400;">

                                            <h5 style="margin: 0px;

                                            font-size: 20px; font-family: 'Anek Latin', sans-serif;">Follow Us</h5>

                                            <ul style="display: inline-flex;

                                            padding-left: 0;

                                            list-style: none;

                                            margin:0px;">

                                                <!--<li><a href="https://www.facebook.com/Raghnallinsurance/"><i class="fab fa-facebook-f" style="color:red;"></i></a>

                                                </li>-->

                                                     <li><a href="https://www.facebook.com/Raghnallinsurance/" target="_blank"><img src="<?php echo $base_url_views?>asset_new/img/facebook1.png" style="  height: 40px;

                                                        width: 40px;"></a>

                                                </li>

                                               

                                                <li><a href="https://in.linkedin.com/company/raghnallinsurance" target="_blank"><img src="<?php echo $base_url_views?>asset_new/img/linkedin.png" style="  height: 40px;

                                                    width: 40px;"></a>

                                                </li>

                                                   <li><a href="https://instagram.com/raghnallinsurance?utm_medium=copy_link" target="_blank"><img src="<?php echo $base_url_views?>asset_new/img/instagram.png" style="  height: 40px;

                                                    width: 40px;"></a>

                                                </li>

                                              

                                              </ul>   

                                        

                                        </td>







                                      </tr>

<tr><td><p style="padding:0px; margin:0px; text-align:center; font-family: 'Anek Latin', sans-serif;">Copyright 2022 <a href="https://www.raghnall.co.in/" target="_blank" style="color:blue;">Raghnall Insurance</a> All Right Reserved</p>

    

  </tr>



  <tr>

      

      <td><p style="text-align:center; font-family: 'Anek Latin', sans-serif; font-size: 15px;"><a href="https://www.raghnall.co.in/disclaimer" target="_blank" style="color:blue;"> Disclaimer </a> | <a href="https://www.raghnall.co.in/grievance-redressal-policy" target="_blank" style="color:blue;"> Grievance Redressal Policy</a> | <a href="https://www.raghnall.co.in/site/views/pdf/code_of_conduct.pdf" target="_blank" style="color:blue;"> Code of Conduct</a> |<a href="https://www.raghnall.co.in/privacy-policy" target="_blank" style="color:blue;"> Privacy Policy</a> </p></td> 

  

  

      </tr>



                                    </tbody>

                                </table>

                            </td>

                        </tr>

                    </tbody>

    

    















    </table>

    </td>

</tr>

</body>

</html>