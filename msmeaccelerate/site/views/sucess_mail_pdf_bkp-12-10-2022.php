
<!-- <?php
$front_base_url = $this->config->item('front_base_url');
$base_url       = $this->config->item('base_url');
$index_url      = $this->config->item('index_url');
$findex_url         = $this->config->item('findex_url');
$base_url_views = $this->config->item('base_url_views');
$http_host = $this->config->item('http_host');
?> -->
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Risk Report</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style type="text/css">

        body{

            margin: 0;

            background: #ccc;

        }

        

        table{

            width: 100%;

            border-spacing: 0;

            border: none;

        }

    



    



    </style>

</head>

<body>

    <center style="

        width: 100%;

        table-layout: fixed;

        background-color: #ccc;

        padding-bottom: 60px;

    ">

    <table style="background-color: #fff;

    margin: 0 auto;

    width: 100%;

    max-width: 600px;

    border-spacing: 0;

    font-family: 'Work Sans', sans-serif;

    color: #151515;

    vertical-align: middle; ">

        <tr>

            <td>

                <div style=" width: 100%;

                max-width: 600px;

            

        ">



            <div style="display: flex;  align-items: center;">

                <img src="<?php echo $base_url_views; ?>asset_new/img/pdf_lofo.jpg" style="margin-left: 20px; width: 100%; margin-top: 20px; max-width: 150px; " alt="">

                <img src="<?php echo $base_url_views; ?>asset_new/img/1651833342.logo_hori_new_pdf.jpg" style=" max-width: 150px; margin-left: auto;  width: 100%; max-height: 58px;;   margin-right: 20px;" alt="">

            </div>



            <div style="padding: 20px 20px; text-align: left;">
                <?php $current_date = date('d/m/Y');?>
                <span style="font-size: 1.5em;">Generated on <span style="color: #36a13d; font-weight: bold;"><?php echo $current_date;?></span></span>

                <h1 style="margin: 0; color: #06225e; padding-left: 0px; margin-top: 20px; font-size: 30px; text-transform: uppercase;">Business <br/>Assessment</h1>

                <h3 style="margin: 0; padding-left: 0px; margin-top: 10px;">Prepared for <br/><span style="color: #06225e">Raghnall Insurance</span>

                </h3>

                <img src="https://msmeaccelerate.in/asset_new/img/main-banner.jpg" style="width: 100%; height: auto; max-width: 500px; margin-left: auto;" alt="">

            </div>



            <div style="padding: 20px 20px; text-align: left;">

                <div style="max-width: 90%; margin-right: auto;">

                    <h2 style="margin: 0; color: #06225e; margin-top: 40px;">Company Profile</h2>

                    <div style="display: flex; margin-top: 30px; align-items: center">

                        <span style="font-weight:bold; margin-top: 2px; width: 50%">Company Name:</span> 

                        <span style=" font-size: 14px; flex: auto; text-align: left; margin-left: 20px; width: 50%"><?php  echo $this->session->userdata('company');?></span> 

                    </div>

                    <div style="display: flex; margin-top: 30px; align-items: center">

                        <span style="font-weight:bold; margin-top: 2px; width: 50%">Industry Type:</span> 
                        <?php

                            $industry_name = $this->home_model->get_industry_name($this->session->userdata('industry_id'));

                         ?>
                        <span style=" font-size: 14px; flex: auto; text-align: left; margin-left: 20px; width: 50%"><?php echo $industry_name;?></span> 

                    </div>

                    <div style="display: flex; margin-top: 30px; align-items: center">

                        <?php

                            $sub_industry_name = $this->home_model->get_sub_industry_name($this->session->userdata('sub_industry_id'));

                         ?>

                        <span style="font-weight:bold; margin-top: 2px; width: 50%">Industry Sub Type:</span> 

                        <span style=" font-size: 14px; flex: auto; text-align: left; margin-left: 20px; width: 50%"><?php echo $sub_industry_name->name;?></span> 

                    </div>

                    <div style="display: flex; margin-top: 30px; align-items: center">

                        <span style="font-weight:bold; margin-top: 2px; width: 50%">Estimated Annual Turnover:</span> 

                        <span style=" font-size: 14px; flex: auto; text-align: left; margin-left: 10px;"><?php echo $this->session->userdata('annual_turnover');?></span> 

                    </div>

                    <div style="display: flex; margin-top: 30px; align-items: center">

                        <span style="font-weight:bold; margin-top: 2px; width: 50%">Estimated Asset Value:</span> 

                        <span style=" font-size: 14px; flex: auto; text-align: left; margin-left: 20px; width: 50%"><?php echo $this->session->userdata('asses_value');?></span> 

                    </div>

                    <div style="display: flex; margin-top: 30px; align-items: center">

                        <span style="font-weight:bold; margin-top: 2px; width: 50%">Number of Employees:</span> 

                        <span style=" font-size: 14px; flex: auto; text-align: left; margin-left: 20px; width: 50%"><?php echo $this->session->userdata('no_of_emp');?></span> 

                    </div>

                </div>

            </div>

            <div style="background: #f1f1f1;  padding: 35px 25px">

                <h2 style="margin-top: 30px; color: #06225e;">Industry Outlook</h2>

                

                <p style="font-size: 13px">

                    Agriculture and allied activities recorded a growth rate of 3.9% in FY 2021-22 and is projected to register a CAGR of 4.9% during 2022-2027. Some of the key market trends to look out for in 2022 and beyond are:



<ol>

    <li style="font-size: 13px">Changing consumer taste - Wide array of products, coupled with increasing global connectivity, has led to a change in the taste and preference of domestic consumers.</li>

    <li style="font-size: 13px">Rising demand of Indian products in International Market - In November 2019, Haldiram entered into an agreement for Amazon's global selling program to E tail its delicacies in the United States.</li>

    <li style="font-size: 13px">Product Innovations is the key to expansion - Heritage Foods, a Hyderabad-based company, has plans to add five more milk processing units in the next five years for an investment of US$ 22.31 million as part of its expansion plan to achieve US$ 1 billion turnover by 2022.</li>

    <li style="font-size: 13px">Emphasis on healthier ingredients - Food processing companies are serving health and wellness as a new ingredient in processed food because of it being low on carbohydrates and cholesterol, for example, zero-% trans-fat snacks and biscuits, slim milk, and whole wheat products, etc.</li>

    <li style="font-size: 13px">Higher consumption of horticulture crops - There is a surge in demand for fruits and vegetables as a result of shift in consumption. Accordingly, Indian farmers are also shifting production.</li>

</ol>











                </p>

            </div>

            

                <div style="padding: 20px 20px; text-align: left; width: 100%">

                        <h2 style="margin: 0; color: #06225e; margin-top: 40px;">Risk Profile</h2>

                        <div style="display: flex;">

                        <div style="padding: 0 20px; display: flex; margin: 20px 0 0 20px;">

                            <div style="margin-bottom: 10px; width: 20px; height: 20px; background-color: #ff0000; margin-right: 20px;"></div>

                            <h5 style="margin: 0;">Extreme Risk</h5>

                        </div>

                        <div style="padding: 0 20px; display: flex; margin: 20px 0 0 20px;">

                            <div style="margin-bottom: 10px; width: 20px; height: 20px; background-color: #3882d7; margin-right: 20px;"></div>

                            <h5 style="margin: 0;">Medium Risk</h5>

                        </div>

                    </div>

                    <div style="display: flex; padding: 30px 20px; justify-content: space-between; ">

                        <?php if($sub_industry_name->emp_insurance != 0){?>


                            <?php if($sub_industry_name->emp_insurance == 1){?>

                                <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                                    <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                        <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;left: 0;"></div>

                                      <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;right: 0;"></div>

                                            <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Employee Risk</span>

                                        </div>

                                    </div>

                            <?php } else { ?>

                                    <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                                            <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                                <div style="border-radius: 50%; height: 13px; background: transparency; margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;left: 0;"></div>

                                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;right: 0;"></div>

                                                    <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Employee Risk</span>

                                                </div>

                                            </div>


                            <?php } ?>



                        <?php } ?>


                        <?php if($sub_industry_name->pro_insurance != 0){?>


                            <?php if($sub_industry_name->pro_insurance == 1){?>

                                <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                                    <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                        <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;left: 0;"></div>

                                      <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;right: 0;"></div>

                                            <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Property Risk</span>

                                        </div>

                                    </div>

                            <?php } else { ?>

                                    <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                                            <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                                <div style="border-radius: 50%; height: 13px; background: transparency; margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;left: 0;"></div>

                                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;right: 0;"></div>

                                                    <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Property Risk</span>

                                                </div>

                                            </div>


                            <?php } ?>



                        <?php } ?>


                        <?php if($sub_industry_name->liability_insurance != 0){?>


                            <?php if($sub_industry_name->liability_insurance == 1){?>

                                <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                                    <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                        <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;left: 0;"></div>

                                      <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;right: 0;"></div>

                                            <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Liability Risk</span>

                                        </div>

                                    </div>

                            <?php } else { ?>

                                    <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                                            <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                                <div style="border-radius: 50%; height: 13px; background: transparency; margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;left: 0;"></div>

                                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;right: 0;"></div>

                                                    <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Liability Risk</span>

                                                </div>

                                            </div>


                            <?php } ?>



                        <?php } ?>

                        <?php if($sub_industry_name->crime_insurance != 0){?>


                            <?php if($sub_industry_name->crime_insurance == 1){?>

                                <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                                    <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                        <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;left: 0;"></div>

                                      <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;right: 0;"></div>

                                            <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Crime Risk</span>

                                        </div>

                                    </div>

                            <?php } else { ?>

                                    <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                                            <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                                <div style="border-radius: 50%; height: 13px; background: transparency; margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;left: 0;"></div>

                                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;right: 0;"></div>

                                                    <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Crime Risk</span>

                                                </div>

                                            </div>


                            <?php } ?>



                        <?php } ?>

                        <?php if($sub_industry_name->cyber_insurance != 0){?>


                            <?php if($sub_industry_name->cyber_insurance == 1){?>

                                <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                                    <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                        <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                     <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                                      <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;left: 0;"></div>

                                      <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;right: 0;"></div>

                                            <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Cyber Risk</span>

                                        </div>

                                    </div>

                            <?php } else { ?>

                                    <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                                            <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                                <div style="border-radius: 50%; height: 13px; background: transparency; margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;left: 0;"></div>

                                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;right: 0;"></div>

                                                    <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Cyber Risk</span>

                                                </div>

                                            </div>


                            <?php } ?>



                        <?php } ?>

                            

                            <!-- <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                            <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;left: 0;"></div>

                              <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;right: 0;"></div>

                                    <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Liability Risk</span>

                                </div>

                            </div>

                            

                            <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                            <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                <div style="border-radius: 50%; height: 13px; background: transparency; margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;left: 0;"></div>

                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;right: 0;"></div>

                                    <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Cyber Risk</span>

                                </div>

                            </div>

                            <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                            <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #f73e3e; margin-bottom: 4px;"></div>

                              <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;left: 0;"></div>

                              <div style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;position: absolute;top: 7px;right: 0;"></div>

                                    <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Crime Risk</span>

                                </div>

                            </div>
 -->
                            

                           <!--  <div  style="margin-right: 20px; width: 20%; margin-top: auto;">

                            <div style="background: transparent; position: relative; width: 100%; height: 200px">

                                <div style="border-radius: 50%; height: 13px; background: transparency; margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                             <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: transparency;margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                              <div style="border-radius: 50%; height: 13px; background: #3882d7; margin-bottom: 4px;"></div>

                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;left: 0;"></div>

                              <div style=" height: 51px;width: 1px;background: #3882d7;margin-bottom: 4px;position: absolute;top: 92px;right: 0;"></div>

                                    <span style="margin-top: 10px; font-size: 11px; font-weight: bold;text-align: center;">Cyber Risk</span>

                                </div>

                            </div> -->

                        

                            

                            

                            

                        </div>

                        

                        

                    </div>

                    

                    </div>

            

            <!--<div style="padding: 20px 20px; text-align: left; width: 100%">-->

                

            <!--        <h2 style="margin: 0; color: #06225e; margin-top: 40px;">Risk Profile</h2>-->

            <!--        <div style="display: flex;">-->

            <!--            <div style="padding: 0 20px; display: flex; margin: 20px 0 0 20px;">-->

            <!--                <div style="margin-bottom: 10px; width: 20px; height: 20px; background-color: #ff0000; margin-right: 20px;"></div>-->

            <!--                <h5 style="margin: 0;">Extreme Risk</h5>-->

            <!--            </div>-->

            <!--            <div style="padding: 0 20px; display: flex; margin: 20px 0 0 20px;">-->

            <!--                <div style="margin-bottom: 10px; width: 20px; height: 20px; background-color: #3882d7; margin-right: 20px;"></div>-->

            <!--                <h5 style="margin: 0;">Medium Risk</h5>-->

            <!--            </div>-->

            <!--        </div>-->

                    

                        

            

            <!--        <div style="display: flex; padding: 30px 20px; justify-content: space-between; ">-->

            <!--            <div  style="margin-right: 20px; width: 20%; margin-top: auto;">-->

            <!--                <div style="background: #ff0000; width: 100%; height: 200px">-->

            <!--                </div>-->

            <!--                <span style="margin-top: 10px; font-size: 11px; font-weight: bold; text-align: center;">Employee Risk</span>-->

            <!--            </div>-->

            <!--            <div  style="margin-right: 20px; width: 20%; margin-top: auto;">-->

            <!--                <div style="background: #3882d7; width:100%; height: 100px; vertical-align: bottom; ">-->

            <!--                </div>-->

            <!--                <span style="margin-top: 10px; font-size: 11px; font-weight: bold; text-align: center;">Property Risk</span>-->

            <!--            </div>-->

            <!--            <div style="margin-right: 20px; width: 20%; margin-top: auto;" >-->

            <!--                <div style="background: #ff0000; width: 100%; height: 200px">-->

            <!--                </div>-->

            <!--                <span style="margin-top: 10px; font-size: 11px; font-weight: bold; text-align: center;">Liability Risk</span>-->

            <!--            </div>-->

            <!--            <div style="margin-right: 20px; width: 20%; margin-top: auto;" >-->

            <!--                <div style="background: #3882d7; width: 100%; height: 100px; vertical-align: bottom; ">-->

            <!--                </div>-->

            <!--                <span style="margin-top: 10px; font-size: 11px; font-weight: bold; text-align: center;">Crime  Risk</span>-->

            <!--            </div>-->

            <!--            <div style="margin-right: 20px; width: 20%; margin-top: auto;" >-->

            <!--                <div style="background: #ff0000; width: 100%; height: 200px"></div>-->

            <!--                <span style="margin-top: 10px; font-size: 11px; font-weight: bold; text-align: center;">Cyber  Risk</span>-->

            <!--            </div>-->

                        

            <!--        </div>-->

                    

            <!--        <div >-->

            <!--            <h2 style="margin: 0; color: #06225e; margin-top: 40px;">Risk Outlook</h2>-->

            <!--            <ul style="margin-top: 30px;">-->

            <!--                <li>Employee Insurance increased premium from 5%</li>-->

            <!--                <li>Liability Insurance increased premium from 5%</li>-->

                            

            <!--            </ul>-->

            <!--        </div>-->

                

            <!--</div>-->

            <div style="background: #f1f1f1;  padding: 35px 25px; margin-bottom: 40px">

                <div>

                <h2 style="margin-top: 30px; color: #06225e;">Why Raghnall?</h2>

                

                <p style="font-size: 13px">We, at Raghnall, build partnerships with your organization that goes beyond pure risk transfer and offer a variety of additional services, like assessing your risk exposure, crisis management support or help with preventative measures. At Raghnall, we have specialized underwriters and product experts who take time to understand your business and procure protection from the most appropriate source according to your needs.</p>

                <div style="margin-top: 20px;">

                <a href="https://www.raghnall.co.in/contact" style="padding: 7px 18px; background: #06225e; color: #fff; text-decoration: none; ">Read More</a>

                </div>

                </div>

            </div>

            

            <div style="padding: 0px 20px; text-align: left; width: 100%">

                <span><strong>This report has been prepared by</strong></span>

                <p style="width: 50%; font-size: 13px;">Raghnall Insurance Broking and Risk Management Pvt Ltd.

                    A-702, Rustomjee Central Park, Andheri - Kurla Rd, Chakala,

                    Andheri East, Mumbai 400093</p>

                    <p style=" font-size: 13px;">For information, please visit - <br/> <a href="#">https://www.raghnall.co.in</a> </p>

                    <img src="https://msmeaccelerate.in/asset_new/img/emailer-foot-banner.jpg" style=" width: 100%; max-width: 300px; margin: 0 auto;" alt="">



                    <h2 style="margin: 0; color: #06225e; margin-top: 40px;">Disclaimer:</h2>

                    <p style="font-size: 10px; width: 70%; margin-bottom: 30px;">This assessment is provided for informational purposes only. Risk-related analyses and statements in this assessment are

                        statements of opinion of possible risks to entities as on the date they are expressed, and not statements of current or historical

                        fact as to the security of any entity. You should not rely upon the material or information in this report as a basis for making

                        any business, legal, or any other decisions. Raghnall or MSME Accelerate shall not be liable for any damages arising in

                        contract, tort or otherwise from the use or inability to use this report, or any action or decision taken as a result of using the

                        report. Neither Raghnall nor MSME Accelerate warrant that (i) the assessment will meet all your requirement; (ii) the

                        assessment will be uninterrupted, timely, secure or error-free; or (iii) that all the errors in the assessment will be corrected.</p>

            </div>

    

    </div>



            </td>

        </tr>

    </table>



        



    



        

    </center>

</body>

</html>