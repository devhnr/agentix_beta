<?php
$front_base_url = $this->config->item('front_base_url');
$base_url       = $this->config->item('base_url');
$index_url      = $this->config->item('index_url');
$findex_url         = $this->config->item('findex_url');
$base_url_views = $this->config->item('base_url_views');
$http_host = $this->config->item('http_host');

//echo $base_url;
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>agentix</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>

   <style>

        body{

            background-color: #f7f7f7;

            padding: 0;

            margin: 0;

            font-family: 'Poppins', sans-serif;

        }



        center{

            width: 800px;

            background-color: #fff;

            height: 100%;

            margin: auto;

        }



        table{

            border: none;

            width: 100%;

        }



        

        

   </style>



   <center>

        <table style="padding: 30px 20px; background-color: #fefefe;">

            <tbody>

                <tr>

                    <td style=" width: 50%;"><img src="<?php echo $base_url_views; ?>agent-admin/email_temp/img/logo.png" style="max-height: 54px;" alt=""></td>

                    <td style="padding: 0; width: 50%;"> <img src="<?php echo $base_url_views; ?>agent-admin/email_temp/img/banner.png" alt=""></td>

                </tr>

            </tbody>

        </table>



        <table style="padding: 30px 20px;">

            <tbody>

                <tr>

                    <td style=" width: 100%; font-size: 23px;" colspan="2"><p style="margin-bottom: 5px;">Hi <span style="color: #00ce70;"><?php echo $agent_name;?></span></p></td>

                    

                </tr>

                <tr>

                    <td style=" width: 100%; font-size: 23px;" colspan="3"><p>Welcome Aboard! We're thrilled to welcome you to the Agentix

                        community. Please find below your registration details:</p></td>

                    

                </tr>

                <tr>

                    <td style="width: 20%; padding: 13px; font-size: 20px; font-weight: bold;">Agent Name </td>

                    <td style="width: 5%; padding: 13px; font-size: 20px; font-weight: bold;">:</td>

                    <td style="width: 65%; font-size: 20px;"><?php echo $agent_name;?></td>

                </tr>

                <tr>

                    <td style="width: 20%; padding: 13px; font-size: 20px; font-weight: bold;">Email Id </td>

                    <td style="width: 5%; padding: 13px; font-size: 20px; font-weight: bold;">:</td>

                    <td style="width: 65%; font-size: 20px;"><?php echo $agent_email;?></td>

                </tr>

                <tr>

                    <td style="width: 20%; padding: 13px; font-size: 20px; font-weight: bold;">Password </td>

                    <td style="width: 5%; padding: 13px; font-size: 20px; font-weight: bold;">:</td>

                    <td style="width: 65%; font-size: 20px;"><?php echo $agent_password;?></td>

                </tr>



                <tr>

                    <td style="width: 20%; padding: 13px; font-size: 20px; font-weight: bold;">Mobile No </td>

                    <td style="width: 5%; padding: 13px; font-size: 20px; font-weight: bold;">:</td>

                    <td style="width: 65%; font-size: 20px;"><?php echo $mobile;?></td>

                </tr>

                <tr>

                    <td style="width: 20%; padding: 13px; font-size: 20px; font-weight: bold;">License No </td>

                    <td style="width: 5%; padding: 13px; font-size: 20px; font-weight: bold;">:</td>

                    <td style="width: 65%; font-size: 20px;"><?php echo $agent_licence_no;?></td>

                </tr>

                <tr>

                    <td style="width: 20%; padding: 13px; font-size: 20px; font-weight: bold;">PAN No </td>

                    <td style="width: 5%; padding: 13px; font-size: 20px; font-weight: bold;">:</td>

                    <td style="width: 65%; font-size: 20px;"><?php echo $agent_pan;?></td>

                </tr>

            </tbody>

        </table>





        <table style="padding: 30px 20px; border-top: 2px solid #f7f7f7">

            <tbody>

                <tr>

                    <td style="text-align: center;"><h2>Login now to activate your free subscription!</h2></td>

                   

                </tr>

                <tr>

                    <td style="text-align: center;"><a href="<?php echo $base_url;?>login" style="display: inline-block; margin-top: 10px; background: #125acc; padding: 13px 30px;

                        color: #fff;

                        text-decoration: none;

                    ">Access Feature</a></td>

                </tr>

            </tbody>

        </table>



        <table style="padding: 30px 20px; border-top: 2px solid #f7f7f7">

            <tbody>

                <tr>

                    <td colspan="2"><p style="margin: 0;">As an agent, your success is our mission. The journey to elevate

                        your insurance business starts here.</p></td>

                   

                </tr>

                <tr>

                    <td colspan="2"><p style="margin: 0;">Stay tuned for valuable insights, tips, and updates tailored just

                        for you.</p></td>

                </tr>

                <tr>

                    <td colspan="2"><p style="color: #000; font-weight: 600;  margin: 0;">Need Help?</p>

                        <p style="margin-top: 0;">Just reach out to us at <a href="mailTo: support@agentix.in">support@agentix.in</a>. Our dedicated

                            support team is here to ensure your success.</p></td>

                </tr>

                <tr>

                    <td colspan="2">

                        <p style="margin-top: 0;">To a bright digital future together!</p></td>

                </tr>

                <tr>

                    <td style="width: 50%;">

                        <p style="color: #000; font-weight: 600; margin: 0;">Regard,</p>

                        <p style="margin-top: 0;">Team Agentix</p>

                    </td>

                    <td style="width: 50%; text-align: right;">

                        <ul style="list-style: none">

                            <li style="display: inline-block; margin-right: 10px;">

                                <a href="#" style="display: inline-block;"><img src="<?php echo $base_url_views; ?>agent-admin/email_temp/img/fb.png" style="max-height: 30px;" alt=""></a>

                            </li>

                            <li style="display: inline-block; margin-right: 10px;">

                                <a href="#" style="display: inline-block;"><img src="i<?php echo $base_url_views; ?>agent-admin/email_temp/mg/in.png" style="max-height: 30px;" alt=""></a>

                            </li>

                            <li style="display: inline-block; margin-right: 10px;">

                                <a href="#" style="display: inline-block;"><img src="<?php echo $base_url_views; ?>agent-admin/email_temp/img/ins.png" style="max-height: 30px;" alt=""></a>

                            </li>

                        </ul>

                    </td>



                </tr>

               

            </tbody>

        </table><table style="padding: 0px 20px 30px; border-top: 2px solid #f7f7f7">

                <tbody>

                    <tr>

                        <td>

                            <ul style="list-style: none; color: #00ce70; padding: 0;">

                                <li style="display: inline-block;"><a href="#" style="text-decoration: none; display: inline-block; color: #00ce70; margin-right: 10px;">Website</a></li>

                                <li style="display: inline-block;"><a href="#" style="text-decoration: none; display: inline-block; color: #00ce70; margin-right: 10px;">Terms </a></li>

                                <li style="display: inline-block;"><a href="#" style="text-decoration: none; display: inline-block; color: #00ce70; margin-right: 10px;">About </a></li>

                            </ul>

                        </td>

                    </tr>

                    <tr>

                        <td>

                            <p>Why You're Receiving This Email: You are receiving this email because you

                                have signed up for Agentix, the platform designed to elevate your insurance

                                business. If you believe you have received this email in error or no longer wish to receive communication from Agentix, please let us know by replying to this email or contacting us at <a href="mailTo: support@agentix.in" style="color: #125acc; text-decoration: none;">support@agentix.in</a></p>

                            

                        </td>

                    </tr>

                </tbody>

        </table>

   </center>

</body>

</html>