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

                    <td style=" width: 100%; font-size: 23px;" colspan="2"><p style="margin-bottom: 5px;">Hi <span style="color: #00ce70;"><?php echo $name;?></span></p></td>

                    

                </tr>

                <tr>

                    <td style=" width: 100%; font-size: 23px;" colspan="3"><p></p></td>

                    

                </tr>


            </tbody>

        </table>





        <table style="padding: 30px 20px; border-top: 2px solid #f7f7f7">

            <tbody>
                <tr>

                    <td colspan="2"><p style="margin: 0;margin-bottom: 3%;">I hope this message finds you well. We are committed to making your insurance decisions as easy as
possible.</p></td>

                   

                </tr>

                <tr>

                    <td colspan="2"><p style="margin: 0;margin-bottom: 3%;">In line with this commitment, we have prepared a detailed product comparison for <a href="<?php echo $compare_url ;?>"> Insurance products. Please click here to access the Product Comparison.</a></p></td>

                   

                </tr>

                

                <tr>

                    <td colspan="2"><p style="color: #000; font-weight: 600;  margin: 0;">We&#39;re Here to Help:</p>

                        <p style="margin: 0;margin-bottom: 3%;">If you have any questions or need further guidance, please do not hesitate to reach out to us at <a href="mailTo: <?php echo $this->session->userdata('email');?>"><?php echo $this->session->userdata('email');?></a>

                           </p></td>

                </tr>

                <tr>

                    <td style="width: 50%;">

                        <p style="color: #000; font-weight: 600; margin: 0;">Warm Regards,</p>

                        <p style="margin-top: 0;"><?php echo $this->session->userdata('name');?></p>

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