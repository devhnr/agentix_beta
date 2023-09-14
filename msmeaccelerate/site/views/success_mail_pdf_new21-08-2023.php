<?php







$front_base_url = $this->config->item('front_base_url');







$base_url       = $this->config->item('base_url');







$index_url      = $this->config->item('index_url');







$findex_url         = $this->config->item('findex_url');







$base_url_views = $this->config->item('base_url_views');







$http_host = $this->config->item('http_host');







?>







  



 



  



   



     



      



      <!DOCTYPE html>



      <html lang="en">



      <head>



         <meta charset="UTF-8">



         <meta name="viewport" content="width=device-width, initial-scale=1.0">



         <title>Risk Assessment Report</title>



         <link rel="preconnect" href="https://fonts.googleapis.com">



         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>



         <link href="https://fonts.googleapis.com/css2?family=Anek+Latin:wght@500&display=swap" rel="stylesheet">



      </head>



      <body style="margin: 0 auto; font-family: 'Anek Latin', sans-serif;">



         <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#d2e9f1">



                                       <tbody>



                                          <tr>



                                             <td height="200"></td>



                                          </tr>



                                          <tr>



                                             <td align="right" style=" width:50%; font-family: 'Anek Latin', sans-serif; font-size: 30pt; color:#3c3c3c; line-height: 34pt; font-weight: bold; ">



                                                <img src="<?php echo $base_url_views; ?>emailerimg/raghnalllogo.jpg">



                                             </td>



                                             <td align="left" style=" border-left:1px solid black; width:50%; font-family: 'Anek Latin', sans-serif; font-size: 30pt; color:#3c3c3c; line-height: 34pt; font-weight: bold; ">



                                                <img src="<?php echo $base_url_views; ?>emailerimg/msmelogo.jpg" style="margin-left:30px; ">



                                             </td>



                                          </tr>



                                          <tr>



                                             <td height="20"></td>



                                          </tr>



                                          <tr>



                                             <?php $current_date = date('d/m/Y');?>



                                             <td align="center" style="text-align: center;" colspan="3">



                                                <h4 style="text-align: center;margin: 0px; font-size: 30px; letter-spacing:2px; line-height:30px; font-family: 'Anek Latin', sans-serif; color:#32bec2;">GENERATED ON <?php echo $current_date;?></h4>



                                             </td>



                                          </tr>



                                          <tr>



                                             <td height="40"></td>



                                          </tr>



                                          <tr>



                                             <td align="center" style="text-align: center" colspan="2">



                                                <h3 style="text-align: center;margin: 0px; font-size: 40px; letter-spacing: 4px; line-height: 45px; font-family: 'Anek Latin', sans-serif; color:#0063ae;">RISK EXPOSURE REPORT</h3>



                                             </td>



                                          </tr>



                                          <tr>



                                             <td height="40"></td>



                                          </tr>



                                          <tr>



                                             <td colspan="2" align="center">



                                                <table align="center" style="text-align: center;" width="100%">



                                                   <tbody>



                                                      <tr>



                                                         <td>&nbsp;</td>



                                                          <td align="center" style="font-family:'Helvetica',sans-serif;font-size:15pt;color:#3c3c3c;line-height:22pt;font-weight:400; background-color:white;color:#4f4f4f;padding:10px 32px; text-transform: uppercase; border:none;font-family:'Helvetica',sans-serif;font-size:15pt;line-height:22pt;font-weight:600;">



                                                         Prepared For <?php  echo $this->session->userdata('company');?>



                                                         </td>



                                             <td>&nbsp;</td>



                                                      </tr>



                                                   </tbody>



                                                </table>



                                             </td>



                                            



                                             



                                          </tr>



                                          <tr>



                                             <td height="30"></td>



                                          </tr>



                                          <tr>



                                             <td colspan="2">



                                                <img src="<?php echo $base_url_views; ?>emailerimg/bgscreen.jpg" style="width: 100%;">



                                             </td>



                                          </tr>



                                       </tbody>



                                    </table>







                                    <table>



                                       <tbody>



                                          <tr>



                                             <td height="40">&nbsp;</td>



                                          </tr>



                                       </tbody>



                                    </table>







                                    <!-- section 1 ends -->



                                    <!-- section 2 -->



                                    <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin: 0 auto;">



                                       <tbody>



                                          <tr>



                                             <td align="center" width="400px" colspan="2" style="background-color: #0063ae; color:white; padding:10px 32px; text-align:  center; text-transform: uppercase; border:none;font-family: 'Poppins', sans-serif; font-size:15pt;line-height:22pt; font-weight:600;">COMPANY PROFILE</td>



                                          </tr>



                                       </tbody>



                                          



                                    </table>



                                    <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#e8f4f8" style="margin: 0px auto 0; padding: 20px;">



                                        <tbody>



                                          



                                                     



                                                      <tr style="border-bottom: 2px solid #5ccace; height:30px;">



                                                         <th scope="row" style="width:50%; color:#0063ae; text-align: left; font-size: 14px;font-family: 'Poppins', sans-serif;">Company Name:</th>



                                                         <td style="width:50%; color:#4a5a69;font-size: 14px;  font-weight: 600;font-family: 'Poppins', sans-serif;"><?php  echo $this->session->userdata('company');?></td>



                                                      </tr>



                                                     



                                                      <tr>



                                                         <td height="10"></td>



                                                      </tr>



                                                      <?php $industry_name = $this->home_model->get_industry_name($this->session->userdata('industry_id'));?>



                                                      <tr style="border-bottom: 2px solid #5ccace; height:30px;">



                                                         <th scope="row" style="width:50%; color:#0063ae; text-align: left; font-size: 14px;font-family: 'Poppins', sans-serif;">Industry Type:</th>



                                                         <td style="width:50%; color:#4a5a69; font-size: 14px; font-weight: 600;font-family: 'Poppins', sans-serif;"><?php echo $industry_name->name;?></td>



                                                      </tr>



                                                      <tr>



                                                         <td height="10"></td>



                                                      </tr>



                                                      <?php



                                                         $sub_industry_name = $this->home_model->get_sub_industry_name($this->session->userdata('sub_industry_id'));



                                                         ?>



                                                      <tr style="border-bottom: 2px solid #5ccace; height:30px;">



                                                         <th scope="row" style="width:50%; color:#0063ae; text-align: left; font-size: 14px;font-family: 'Poppins', sans-serif;">Industry Sub Type:</th>



                                                         <td style="width:50%; color:#4a5a69; font-size: 14px; font-weight: 600;font-family: 'Poppins', sans-serif;"><?php echo $sub_industry_name->name;?></td>



                                                      </tr>



                                                      <tr>



                                                         <td height="10"></td>



                                                      </tr>



                                                      <tr style="border-bottom: 2px solid #5ccace; height:30px;">



                                                         <th scope="row" style="width:50%; color:#0063ae; text-align: left; font-size: 14px;font-family: 'Poppins', sans-serif;">Estimated Annual Turnover:</th>



                                                         <td style="width:50%; color:#4a5a69; font-size: 14px; font-weight: 600;font-family: 'Poppins', sans-serif;"><?php echo $this->session->userdata('annual_turnover');?></td>



                                                      </tr>



                                                      <tr>



                                                         <td height="10"></td>



                                                      </tr>



                                                      <tr style="border-bottom: 2px solid #5ccace; height:30px;">



                                                         <th scope="row" style="width:50%; color:#0063ae; text-align: left; font-size: 14px;font-family: 'Poppins', sans-serif;">Estimated Asset Value:</th>



                                                         <td style="width:50%; color:#4a5a69;font-size: 14px;  font-weight: 600;font-family: 'Poppins', sans-serif;"><?php echo $this->session->userdata('asses_value');?></td>



                                                      </tr>



                                                      <tr>



                                                         <td height="10"></td>



                                                      </tr>



                                                      <tr style="height:30px;">



                                                         <th scope="row" style="width:50%; color:#0063ae; text-align: left; font-size: 14px;font-family: 'Poppins', sans-serif;">Number of Employees:</th>



                                                         <td style="width:50%; color:#4a5a69; font-size: 14px; font-weight: 600;font-family: 'Poppins', sans-serif;"><?php echo $this->session->userdata('no_of_emp');?></td>



                                                      </tr>



                                                      <tr>



                                                         <td height="10"></td>



                                                      </tr>



                                                      <tr>



                                                         <td height="20"></td>



                                                      </tr>



                                                     



                                                    



                                                   



                                       </tbody>



                                          



                                    </table>







                                    <!-- section 2 ends  -->







                                   <table>



                                       <tbody>



                                          <tr>



                                             <td height="40">&nbsp;</td>



                                          </tr>



                                       </tbody>



                                    </table>



                                    <!-- section 3 start -->



                                     <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin: 0 auto;">



                                       <tbody>



                                          <tr>



                                             <td align="center" width="400px" colspan="2" style="background-color: #0063ae; color:white; padding:10px 32px; text-align:  center; text-transform: uppercase; border:none;font-family: 'Poppins', sans-serif; font-size:15pt;line-height:22pt; font-weight:600;">INDUSTRY OUTLOOK</td>



                                          </tr>



                                       </tbody>



                                          



                                    </table>







                                    <!--- Industry Outlook -->



                                    <?php if($industry_name != ""){?>



                                        <?php echo $industry_name->mail_description; ?>



                                    <?php }?>







                                    <!-- section 3 ends  -->



                                    <table>



                                       <tbody>



                                          <tr>



                                             <td height="50">&nbsp;</td>



                                          </tr>



                                       </tbody>



                                    </table>



                                    <!-- section 4 starts   -->



                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f4ffca" style="margin: 0 auto; padding: 40px 0;">



                                       <tbody>



                                          <tr>



                                             <td align="center">



                                                <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin: 0 auto;">



                                                   <tbody>



                                                      <tr>



                                                         <td align="center" width="400px" colspan="2" style="width:60%; background-color:#86b914; color:white; padding:10px 32px; text-transform: uppercase; border:none;font-family:'Helvetica',sans-serif; font-size:15pt; line-height:22pt; font-weight:600;">RISK OUTLOOK</td>



                                                      </tr>



                                                   </tbody>



                                                      



                                                </table>



                                             </td>



                                          </tr>



                                          <tr>



                                             <td align="center">



                                                <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin: 0 auto; padding: 20px">



                                                   <tbody>



                                                      <tr>



                                                        <td align="center" >



                                                           <table width="100%" align="center"  border="0" cellpadding="0" cellspacing="0">



                                                            <tbody>



                                                               <tr>



                                                                  <td width="190">



                                                                     <table class="full" align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 15px; line-height: 27px;">



                                                                        <!-- subtitle -->



                                                                        <tbody>



                                                                           <tr>



                                                                              <td>



                                                                                <img style="width:20px; height:20px;" src="<?php echo $base_url_views; ?>emailerimg/high.jpg" alt="">



                                                                              </td>



                                                                              <td style="text-align: left; color: #506070;  font-family: 'poppins', Sans-serif; font-size: 12px; letter-spacing: 0.7px; word-break: break-word; font-weight: 500;">



                                                                                 &nbsp;Extreme



                                                                              </td>



                                                                           </tr>



                                                                        </tbody>



                                                                     </table>



                                                                  </td>



                                                                  <td width="15"></td>



                                                                  <td width="190">



                                                                     <table class="full" align="center" border="0" cellpadding="0" cellspacing="0">



                                                                        <!-- image -->



                                                                        <tbody>



                                                                           <tr>



                                                                              <td>



                                                                                 <img style="width:20px; height:20px;" src="<?php echo $base_url_views; ?>emailerimg/medium.jpg" alt="">



                                                                                <!-- <span style="width:20px; height:20px; background-color:#ffb302; color:white;  text-transform: uppercase; border:none;font-family:'Helvetica',sans-serif;font-weight:600;"></span>-->



                                                                              </td>



                                                                              <td class="res-left" style="text-align: left; color: #506070;  font-family: 'poppins', Sans-serif; font-size: 12px; letter-spacing: 0.7px; word-break: break-word;font-weight: 500; ">



                                                                                 &nbsp;Medium



                                                                              </td>



                                                                           </tr>



                                                                        </tbody>



                                                                     </table>



                                                                  </td>



                                                               </tr>



                                                            </tbody>



                                                            </table>



                                                        </td>



                                                      </tr>



                                                   </tbody>



                                                      



                                                </table>



                                             </td>



                                          </tr>



                                          <tr>



                                             <td align="center">



                                                 <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin: -20px auto 0; padding: 20px">



                                                   <tbody>



                                                         



                                                         



                                                         <tr>



                                                            <?php if($sub_industry_name->cyber_insurance != 0){?>



                                                            <td style="text-align: center;">



                                                               <table>



                                                                  <tbody>



                                                                     <tr>



                                                                        <td style="text-align: center">



                                                                           <?php if($sub_industry_name->cyber_insurance == 1){?>



                                                                           <img src="<?php echo $base_url_views; ?>emailerimg/extreme-risk.jpg" alt="">



                                                                           <?php } else{?>



                                                                           <img src="<?php echo $base_url_views; ?>emailerimg/medium-risk.jpg" alt="">



                                                                           <?php } ?>



                                                                        </td>



                                                                     </tr>



                                                                     <tr>



                                                                        <td style="text-align: center; font-size: 12px; font-weight: 500; font-family: 'Poppins', sans-serif;">Cyber Risk</td>



                                                                     </tr>



                                                                  </tbody>



                                                               </table>



                                                            </td>



                                                            <?php } ?>



                                                            <?php if($sub_industry_name->crime_insurance != 0){?>  



                                                            <td style="text-align: center;">



                                                               <table>



                                                                  <tbody>



                                                                     <tr>



                                                                        <td style="text-align: center">



                                                                           <?php if($sub_industry_name->crime_insurance == 1){?>



                                                                           <img src="<?php echo $base_url_views; ?>emailerimg/extreme-risk.jpg" alt="">



                                                                           <?php } else{?>



                                                                           <img src="<?php echo $base_url_views; ?>emailerimg/medium-risk.jpg" alt="">



                                                                           <?php } ?>



                                                                        </td>



                                                                     </tr>



                                                                     <tr>



                                                                        <td style="text-align: center; font-size: 12px; font-weight: 500; font-family: 'Poppins', sans-serif;">Crime Risk</td>



                                                                     </tr>



                                                                  </tbody>



                                                               </table>



                                                            </td>



                                                            <?php } ?>



                                                            <?php if($sub_industry_name->pro_insurance != 0){?>



                                                            <td style="text-align: center;">



                                                               <table>



                                                                  <tbody>



                                                                     <tr>



                                                                        <td style="text-align: center">



                                                                           <?php if($sub_industry_name->pro_insurance == 1){?>



                                                                           <img src="<?php echo $base_url_views; ?>emailerimg/extreme-risk.jpg" alt="">



                                                                           <?php } else{?>



                                                                           <img src="<?php echo $base_url_views; ?>emailerimg/medium-risk.jpg" alt="">



                                                                           <?php } ?>



                                                                        </td>



                                                                     </tr>



                                                                     <tr>



                                                                        <td style="text-align: center; font-size: 12px; font-weight: 500; font-family: 'Poppins', sans-serif;">Property Risk</td>



                                                                     </tr>



                                                                  </tbody>



                                                               </table>



                                                            </td>



                                                            <?php } ?>



                                                            <?php if($sub_industry_name->emp_insurance != 0){?>



                                                            <td style="text-align: center;">



                                                               <table>



                                                                  <tbody>



                                                                     <tr>



                                                                        <td style="text-align: center">



                                                                           <?php if($sub_industry_name->emp_insurance == 1){?>



                                                                           <img src="<?php echo $base_url_views; ?>emailerimg/extreme-risk.jpg" alt="">



                                                                           <?php } else{?>



                                                                           <img src="<?php echo $base_url_views; ?>emailerimg/medium-risk.jpg" alt="">



                                                                           <?php } ?>



                                                                        </td>



                                                                     </tr>



                                                                     <tr>



                                                                        <td style="text-align: center; font-size: 12px; font-weight: 500; font-family: 'Poppins', sans-serif;">Employee Risk</td>



                                                                     </tr>



                                                                  </tbody>



                                                               </table>



                                                            </td>



                                                            <?php } ?>



                                                            <?php if($sub_industry_name->liability_insurance != 0){?>



                                                            <td style="text-align: center;">



                                                               <table>



                                                                  <tbody>



                                                                     <tr>



                                                                        <td style="text-align: center">



                                                                           <?php if($sub_industry_name->liability_insurance == 1){?>



                                                                           <img src="<?php echo $base_url_views; ?>emailerimg/extreme-risk.jpg" alt="">



                                                                           <?php } else{?>



                                                                           <img src="<?php echo $base_url_views; ?>emailerimg/medium-risk.jpg" alt="">



                                                                           <?php } ?>



                                                                        </td>



                                                                     </tr>



                                                                     <tr>



                                                                        <td style="text-align: center; font-size: 12px; font-weight: 500; font-family: 'Poppins', sans-serif;">Liability Risk</td>



                                                                     </tr>



                                                                  </tbody>



                                                               </table>



                                                            </td>



                                                            <?php } ?>



                                                         </tr>



                                                        



                                            



                                                    



                                                </tbody>



                                             </table>



                                          </td>



                                       </tr>



                                      



                                       



                                       </tbody>



                                          



                                    </table>

                                     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f4ffca" style="margin: 0 auto; padding: 40px 0;">



                                       <tbody>



                                          



                                          



                                          <tr>



                                             <td align="center">



                                                 <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin: -20px auto 0; padding: 20px">



                                                   <tbody>



                                                         



                                                        <tr>



                                                            <td height="40"></td>



                                                         </tr>



                                                         <tr>



                                                            <td align="center" colspan="5" style="width:60%; background-color:#86b914; color:white; padding:10px 32px; text-transform: uppercase; border:none;font-family:'Helvetica',sans-serif; font-size:15pt; line-height:22pt; font-weight:600;">



                                                               RISK INSIGHTS



                                                            </td>



                                                         </tr>



                                                         <tr>



                                                            <td height="30">



                                                               &nbsp;



                                                            </td>



                                                         </tr>







                                                        



                                                         <tr >



                                                            <td colspan="6" style="padding: 0px 50px 20px;font-family: 'Poppins', sans-serif;">



                                                              <table>

                              <thead>

                                 <tr>

                                    <th>Name of Insurance</th>

                                    <th>Sum Insured</th>

                                    <th>Premium</th>

                                 </tr>

                              </thead>

                              <tbody>

                                 <tr>

                                     <td colspan="3">Employee Insurance</td>

                                    

                                 </tr>

                                 <tr>

                                 <td>Emp 1nsurance 1</td>

                                 <td>27000</td>

                                    <td>28000</td>                                 

                                 </tr>

                                 <tr>

                                 <td>Emp 1nsurance 2</td>

                                 <td>27000</td>

                                    <td>28000</td>                                 

                                 </tr>

                                 <tr>

                                 <td>Emp 1nsurance 3</td>

                                 <td>27000</td>

                                    <td>28000</td>                                 

                                 </tr>



                                 <tr>

                                     <td colspan="3">Liability Insurance</td>

                                    

                                 </tr>

                                 <tr>

                                 <td>Lia 1nsurance 1</td>

                                 <td>27000</td>

                                    <td>28000</td>                                 

                                 </tr>

                                 <tr>

                                 <td>Lia 1nsurance 2</td>

                                 <td>27000</td>

                                    <td>28000</td>                                 

                                 </tr>

                                 <tr>

                                 <td>Lia 1nsurance 3</td>

                                 <td>27000</td>

                                    <td>28000</td>                                 

                                 </tr>



                                 <tr>

                                     <td colspan="3">Total Premium</td>

                                    

                                 </tr>

                                 <tr>

                                 <td>Net Premium</td>

                                 <td>27000</td>

                                    <td>28000</td>                                 

                                 </tr>

                                 <tr>

                                 <td>GST (18%)</td>

                                 <td>27000</td>

                                    <td>28000</td>                                 

                                 </tr>

                                 <tr>

                                 <td>Total Premium Year</td>

                                 <td>27000</td>

                                    <td>28000</td>                                 

                                 </tr>

                              </tbody>   

                           </table>



                                                            </td>



                                                         </tr>



                                

                                             



                                                      



                                                    



                                                </tbody>



                                             </table>



                                          </td>



                                       </tr>



                                      



                                       



                                       </tbody>



                                          



                                    </table>



                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f4ffca" style="margin: 0 auto; padding: 40px 0;">



                                       <tbody>



                                          



                                          



                                          <tr>



                                             <td align="center">



                                                 <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin: -20px auto 0; padding: 20px">



                                                   <tbody>



                                                         



                                                        <tr>



                                                            <td height="40"></td>



                                                         </tr>



                                                         <tr>



                                                            <td align="center" colspan="5" style="width:60%; background-color:#86b914; color:white; padding:10px 32px; text-transform: uppercase; border:none;font-family:'Helvetica',sans-serif; font-size:15pt; line-height:22pt; font-weight:600;">



                                                               RISK INSIGHTS



                                                            </td>



                                                         </tr>



                                                         <tr>



                                                            <td height="30">



                                                               &nbsp;



                                                            </td>



                                                         </tr>







                                                         <?php 







                                                            $industry_add_more = $this->home_model->industry_add_more($this->session->userdata('industry_id'));







                                                            if($industry_add_more !=''){







                                                               foreach($industry_add_more as $industry_add_more_data){



                                                            ?>



                                                         <tr >



                                                            <td colspan="5" style="padding: 0px 50px 20px;font-family: 'Poppins', sans-serif;">



                                                               <h6 style="color:#106cb3; font-size: 14px; font-weight: 600; margin: 10px 0px;"><?php echo $industry_add_more_data->title?></h6>



                                                               <p style="margin: 0px;color:#717d89; font-size: 12px; font-weight: 600;"><?php echo $industry_add_more_data->description?>



                                                               </p>



                                                            </td>



                                                         </tr>



                                             <?php } } ?>



                                             <!-- <tr>



                                                <td colspan="5" style="padding: 0px 50px 20px; font-family: 'Poppins', sans-serif;">



                                                   <h6 style="color:#106cb3; font-size: 14px; font-weight: 600; margin: 10px 0px;">CRIME</h6>



                                                   <p style="margin: 0px;color:#717d89; font-size: 12px; font-weight: 600;">As per PwC’s Global Economic Crime and Fraud Survey (GECS) 2022, 52% of Indian organizations



                                                      experienced fraud or economic crime within the last 24 months. Out of these, 17% of the companies lost



                                                      between USD 1Mn - 50Mn. The major crime faced by the Business & IT sector was cyber fraud (50%)



                                                      followed by customer fraud (35%) and procurement fraud (26%).



                                                   </p>



                                                </td>



                                             </tr> -->



                                             <!-- <tr>



                                                <td colspan="5" style="padding: 0px 50px 20px;font-family: 'Poppins', sans-serif;">



                                                   <h6 style="color:#106cb3; font-size: 14px; font-weight: 600; margin: 10px 0px;">EMPLOYEE</h6>



                                                   <p style="margin: 0px;color:#717d89; font-size: 12px; font-weight: 600;">2021 has been unparalleled when it comes to the talent exchange we are witnessing across sectors. The



                                                      overall annualized attrition number for 2021 stands at an astounding 20% which is a record high since 2011.



                                                      Technology takes a chunk of the big attrition stories in India with 24.4% attrition rate in the IT sector and a



                                                      20.5% attrition rate in e-commerce businesses. Professional services sector stood at the 2nd position with



                                                      an attrition rate of 20.5%. Further, 84% of IT firms are also experiencing a shortage of skilled talent.



                                                   </p>



                                                </td>



                                             </tr> -->







                                             <!-- <tr>



                                                <td colspan="5" style="padding: 0px 50px 20px;font-family: 'Poppins', sans-serif;">



                                                   <h6 style="color:#106cb3; font-size: 14px; font-weight: 600; margin: 10px 0px;">LIABILITY</h6>



                                                   <p style="margin: 0px;color:#717d89; font-size: 12px; font-weight: 600;">Indian legal environment is changing very fast and the legal expenses of companies are also increasing



                                                      each year. The legal requirement of industries varies from industry to industry. As per the analysis of



                                                      various costs incurred by different industries over a period of 10 years (2010-2019), the legal cost incurred



                                                      by the Business & Information industry was 7.29% of their total expenses and 0.81% of their 10 year



                                                      average sales revenue.



                                                   </p>



                                                </td>



                                             </tr> -->



                                                      



                                                    



                                                </tbody>



                                             </table>



                                          </td>



                                       </tr>



                                      



                                       



                                       </tbody>



                                          



                                    </table>



                                    <!-- section 4 ends -->











                                     <table>



                                       <tbody>



                                          <tr>



                                             <td height="50">&nbsp;</td>



                                          </tr>



                                       </tbody>



                                    </table>







                                    <!-- section 5 starts -->



                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#d2e9f1" style="margin: 0 auto; padding: 40px 0;">



                                      <tbody>



                                         <tr>



                                            <td>



                                               <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="" style="margin: 0 auto;">



                                                   <tbody>



                                                      <tr>



                                                         <td align="center" width="400px" colspan="2" style="width:60%; background-color:#0063ae; color:white; padding:10px 32px; text-transform: uppercase; border:none;font-family:'Helvetica',sans-serif; font-size:15pt; line-height:22pt; font-weight:600;">WHY RAGHNALL</td>



                                                      </tr>



                                                   </tbody>



                                                      



                                                </table>



                                            </td>



                                         </tr>



                                        <tr>



                                             <td align="center">



                                                <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#e8f3f7" style="margin: 0 auto; padding: 20px">



                                                   <tr>



                                                      <td height="80">&nbsp;</td>



                                                      <td height="80">&nbsp;</td>



                                                   </tr>



                                                   <tr>



                                                        <td colspan="2" align="center" style=" width:50%; font-family: 'Poppins', sans-serif; font-size: 30pt; color:#3c3c3c; line-height: 34pt; font-weight: bold; ">



                                                           <img src="<?php echo $base_url_views; ?>emailerimg/raghnalllogo.jpg">



                                                        </td>



                                                   </tr>



                                                   <tr>



                                                      <td height="30">&nbsp;</td>



                                                      <td height="30">&nbsp;</td>



                                                   </tr>



                                                   <tr>



                                            



                                                       <td>



                                                        <h6 style="padding: 10px 30px;font-size: 14px;line-height: 28px;font-family: 'Poppins', sans-serif; font-weight: 600;color:#667582;">We, at Raghnall, build partnerships with your organization that goes beyond pure risk transfer and



                                                            offer a variety of additional services, like assessing your risk exposure, crisis management support



                                                            or help with preventative measures. At Raghnall, we have specialized underwriters and product



                                                            experts who take time to understand your business and procure protection from the most



                                                            



                                                            appropriate source according to your needs.</h6>



                                                       </td>



                                        



                                                   </tr>



                       



                                                   <tr>



                                                        <td height="50"></td>



                                                    </tr>



                         



                     



                                                      



                                                </table>



                                             </td>



                                          </tr>



                                          <tr>



                                             <td align="center">



                                                <table width="20%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="" style="margin: 0 auto;">



                                                   <tbody>



                                                      <tr>



                                                         <td align="center" width="400px" colspan="2" style="width:25%; background-color:#e5661e; color:white; padding:10px 32px; text-transform: uppercase; border:none;font-family: 'Poppins', sans-serif;font-size:15pt;line-height:22pt;font-weight:600; border-radius: 30px;"><a href="https://www.raghnall.co.in/" style="color: #ffffff; text-decoration: none;">KNOW MORE</a></td>



                                                      </tr>



                                                   </tbody>



                                                      



                                                </table>



                                             </td>



                                          </tr>



                                      </tbody>



                                          



                                    </table>







                                    <!-- section 5 ends  -->



                                    <table>



                                       <tbody>



                                          <tr>



                                             <td height="50">&nbsp;</td>



                                          </tr>



                                       </tbody>



                                    </table>



                                     <!-- section 6 Starts  -->







                                     <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin: 0 auto;">



                                       <tbody>



                                          <tr>



                                             <td align="center" width="400px" colspan="2" style="background-color: #0063ae; color:white; padding:10px 32px; text-align:  center; text-transform: uppercase; border:none;font-family: 'Poppins', sans-serif; font-size:15pt;line-height:22pt; font-weight:600;">THIS REPORT HAS BEEN PREPARED BY</td>



                                          </tr>



                                       </tbody>



                                          



                                    </table>







                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin: 0 auto; padding: 20px;">



                                       <tbody>



                                          <tr>



                                            <td align="center" style="font-family: 'Poppins', sans-serif; font-size: 14px; color:#667380; line-height: 25px; font-weight: bold; ">



                                     <p style="margin-bottom: 10px;">Raghnall Insurance Broking and Risk Management Pvt Ltd. A-702, Rustomjee Central







                                        Park, Andheri - Kurla Rd, Chakala, Andheri East, Mumbai 400093</p>



                                    </td>



                                          </tr>



                                          <tr>



                                    <td align="center" style="font-family: 'Poppins', sans-serif; font-size: 14px; color:#667380; line-height: 25px; font-weight: bold; ">



                                     <p style="margin-bottom: 10px;">For information, please visit - <span style="color:#32bec2;"><a href="https://www.raghnall.co.in"></a>https://www.raghnall.co.in</span></p>



                                    </td>



                                 </tr>



                                 <tr>



                                    <td height="30"></td>



                                </tr>



                                <tr>



                                        <td><hr></td>



                                    </tr>



                                    <tr><td>



                                    <h2 style="color:#32bec2;font-family: 'Poppins', sans-serif; ">Disclaimer</h2>



                                    <p style="font-size: 12px; margin:0px; line-height: 25px; text-align:justify ; font-family:  'Poppins', sans-serif; font-weight: 600;color:#667582;">This assessment is provided for informational purposes only. Risk-related analyses and statements



                                        in this assessment are statements of opinion of possible risks to entities as on the date they are



                                        expressed, and not statements of current or historical fact as to the security of any entity. You



                                        should not rely upon the material or information in this report as a basis for making any business,



                                        legal, or any other decisions. Raghnall or MSME Accelerate shall not be liable for any damages



                                        arising in contract, tort or otherwise from the use or inability to use this report, or any action or



                                        decision taken as a result of using the report. Neither Raghnall nor MSME Accelerate warrant that (i)



                                        the assessment will meet all your requirement; (ii) the assessment will be uninterrupted, timely,



                                        secure or error-free; or (iii) that all the errors in the assessment will be corrected.</p>



                                   </td>



                                



                                  </tr>



                                  <tr>



                                    <td height="50"></td>



                                </tr>



                                       </tbody>



                                          



                                    </table>











         



      </body>



      </html>
      <?php echo"";exit; ?>