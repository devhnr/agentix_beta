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



    <link rel="preconnect" href="https://fonts.googleapis.com">



<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>



<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">



<title>Risk Exposure Report</title>



            





    <div data-template-type="html" style=" height: auto; padding-bottom: 149px;" class="ui-sortable">

   <!--[if !mso]><!-->

   <!--<![endif]-->

   <!-- ====== Module : Intro ====== -->

   <table align="center" class="full" border="0" cellpadding="0" cellspacing="0"  data-module="Module-1" >

      <tbody>

         <tr>

            <td height="25" style="font-size:0px">&nbsp;</td>

         </tr>

         <!-- top -->

         <tr>

            <td>

               <table align="center" class="res-full ui-resizable" border="0" cellpadding="0" cellspacing="0">

                  <tbody>

                     <tr>

                        <td>

                           <table align="center" border="0" cellpadding="0" cellspacing="0">

                              <tbody>

                                 <tr>

                                    <td valign="middle" style="vertical-align: middle;">

                                       

                                    </td>

                                    <td width="10"></td>

                                    <td valign="middle" style="vertical-align: middle;">

                                       <table align="center" border="0" cellpadding="0" cellspacing="0">

                                          <!-- link -->

                                          <tbody>

                                             <tr>

                                                <td class="res-center" style="text-align: center;">

                                                   

                                                  <img src="<?php echo $base_url_views; ?>asset_new/img/pdf_lofo.jpg" alt="" height="auto" />

                                                   

                                                </td>

                                             </tr>

                                             <!-- link end -->

                                          </tbody>

                                       </table>

                                    </td>

                                 </tr>

                              </tbody>

                           </table>

                        </td>

                     </tr>

                  </tbody>

                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>

               </table>

            </td>

         </tr>

         <!-- top end -->

        

         

      </tbody>

   </table>

   <!-- ====== Module : Texts ====== -->

   <table  align="center" class="full selected-table" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-2.png" data-module="Module-2" data-bgcolor="M2 Bgcolor 1">

      <tbody>

         <tr>

            <td>

               <table bgcolor="white" width="750" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M2 Bgcolor 2">

                  <tbody>

                     <tr>

                        <td>

                           <table width="600" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">

                              <tbody>

                                 <tr>

                                    <td height="40" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- HEADING -->

                                 <!-- subtitle -->
                                 <?php $current_date = date('d/m/Y');?>
                                 <tr>

                                    <td class="res-center" style="text-align: center; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 24px; letter-spacing: 1px; word-break: break-word; font-weight: 800;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                       GENERATED ON <span style="color: #36a13d; font-weight: bold;"><?php echo $current_date;?></span>

                                    </td>

                                 </tr>

                                 <!-- subtitle end -->

                                 <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- title -->

                                 <tr>

                                    <td class="res-center selected-element" style="text-align: center; color: #405060; font-family: 'Raleway', Arial, Sans-serif; font-size: 38px; letter-spacing: 0.7px; word-break: break-word; font-weight: bold

                                    " >

                                       BUSINESS ASSESSMENT

                                    </td>

                                 </tr>

                                 <!-- title end -->

                                

                                 <!-- image end -->

                                 <!-- HEADING end -->

                                 <tr>

                                    <td height="30" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- paragraph -->

                                 <tr>

                                    <td class="res-center" style="text-align: center; color: #607080; font-family: 'Nunito', Arial, Sans-serif; font-size: 26px; letter-spacing: 0.4px; line-height: 23px; word-break: break-word; font-weight: bold" data-color="M2 Paragraph 1" data-size="M2 Paragraph 1" data-max="26" data-min="6">

                                      <span>Prepared</span>  for <br>

                                      <span style="color: #15972b !important; font-weight: bold; padding-top: 10px"><?php  echo $this->session->userdata('company');?></span>

                                    </td>

                                 </tr>



                                 <!-- paragraph end -->

                                 <tr>

                                    <td height="23" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- link -->

                                 <tr>

                                    <td class="res-center" style="text-align: center;">

                                       <img src="<?php echo $base_url_views; ?>asset_new/img/main-banner.jpg" height="600px" alt="">

                                    </td>

                                 </tr>

                                 <!-- link end -->

                                 <tr>

                                    <td height="55" style="font-size:0px">&nbsp;</td>

                                 </tr>

                              </tbody>

                           </table>

                        </td>

                     </tr>

                  </tbody>

                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>

               </table>

            </td>

         </tr>

      </tbody>

   </table>



    <table bgcolor="#fbfbfb"  align="center" class="full selected-table" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-2.png" data-module="Module-2" data-bgcolor="M2 Bgcolor 1">

      <tbody>

         <tr>

            <td>

               <table  width="750" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M2 Bgcolor 2">

                  <tbody>

                     <tr>

                        <td>

                           <table width="600" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">

                              <tbody>

                                 <tr>

                                    <td height="40" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- HEADING -->

                                 <!-- subtitle -->

                                

                                 <!-- subtitle end -->

                                 <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- title -->

                                 <tr>

                                    <td class="res-center selected-element" style="text-align: center; color: #405060; font-family: 'Raleway', Arial, Sans-serif; font-size: 38px; letter-spacing: 0.7px; word-break: break-word; font-weight: bold

                                    " >

                                      Company Profile

                                    </td>

                                 </tr>



                                 <tr>

                                    <td height="33" style="font-size:0px">&nbsp;</td>

                                 </tr>



                                  <tr>

                                    <td class="res-center" style="text-align: left; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 800;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                       Company Name:  <span style="color: #36a13d; font-weight: bold;"><?php  echo $this->session->userdata('company');?></span>

                                    </td>

                                 </tr>



                                  <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <?php $industry_name = $this->home_model->get_industry_name($this->session->userdata('industry_id'));?>

                                 <tr>

                                    <td class="res-center" style="text-align: left; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 800;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                       Industry Type:  <span style="color: #36a13d; font-weight: bold;"><?php echo $industry_name->name;?></span>

                                    </td>

                                 </tr>



                                  <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <?php
                                    $sub_industry_name = $this->home_model->get_sub_industry_name($this->session->userdata('sub_industry_id'));
                                 ?>

                                 <tr>

                                    <td class="res-center" style="text-align: left; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 800;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                       Industry Sub Type:  <span style="color: #36a13d; font-weight: bold;"><?php echo $sub_industry_name->name;?></span>

                                    </td>

                                 </tr>



                                 <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>



                                 <tr>

                                    <td class="res-center" style="text-align: left; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 800;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                       Estimated Annual Turnover:  <span style="color: #36a13d; font-weight: bold;"><?php echo $this->session->userdata('annual_turnover');?></span>

                                    </td>

                                 </tr>



                                 <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>



                                 <tr>

                                    <td class="res-center" style="text-align: left; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 800;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                       Estimated Asset Value:  <span style="color: #36a13d; font-weight: bold;"><?php echo $this->session->userdata('asses_value');?></span>

                                    </td>

                                 </tr>



                                 <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>



                                 <tr>

                                    <td class="res-center" style="text-align: left; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 800;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                       Number of Employees:  <span style="color: #36a13d; font-weight: bold;"><?php echo $this->session->userdata('no_of_emp');?></span>

                                    </td>

                                 </tr>

                                 <!-- title end -->

                                

                                 <!-- image end -->

                                 <!-- HEADING end -->

                                

                                 <!-- paragraph end -->

                                 <tr>

                                    <td height="23" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- link -->

                                 <tr>

                                    

                                 </tr>

                                 <!-- link end -->

                                 <tr>

                                    <td height="55" style="font-size:0px">&nbsp;</td>

                                 </tr>

                              </tbody>

                           </table>

                        </td>

                     </tr>

                  </tbody>

                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>

               </table>

            </td>

         </tr>

      </tbody>

   </table>

   <!-- ====== Module : Features ====== -->

<?php if($industry_name != ""){?>

    <table  align="center" class="full selected-table" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-2.png" data-module="Module-2" data-bgcolor="M2 Bgcolor 1" >

      <tbody>

         <tr>

            <td>

               <table bgcolor="white" width="750" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M2 Bgcolor 2">

                  <tbody>

                     <tr>

                        <td>

                           <table width="600" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">

                              <tbody>

                                 <tr>

                                    <td height="40" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- HEADING -->

                                 <!-- subtitle -->

                                

                                 <!-- subtitle end -->

                                 <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- title -->

                                 

                                 <tr>

                                    <td class="res-center selected-element" style="text-align: center; color: #405060; font-family: 'Raleway', Arial, Sans-serif; font-size: 38px; letter-spacing: 0.7px; word-break: break-word; font-weight: bold

                                    " >

                                      Industry Outlook

                                    </td>

                                 </tr>



                                 <tr>

                                    <td height="33" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                  <tr>

                                    <td class="res-center" style="text-align: left; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 400;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                     <?php echo $industry_name->mail_description; ?>

                                    </td>

                                </tr>



                                 <!--  <tr>

                                    <td class="res-center" style="text-align: left; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 400;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                      Agriculture and allied activities recorded a growth rate of 3.9% in FY 2021-22 and is projected to register a CAGR of 4.9% during 2022-2027. Some of the key market trends to look out for in 2022 and beyond are:

                                    </td>

                                </tr> -->
<!-- 
                                <tr>

                                    <td height="23" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                <tr>

                                    <td class="res-center" style="text-align: left; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 400;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                      <ol>

                                      	<li>Changing consumer taste - Wide array of products, coupled with increasing global connectivity, has led to a change in the taste and preference of domestic consumers.</li>

                                      	<li>Rising demand of Indian products in International Market - In November 2019, Haldiram entered into an agreement for Amazon's global selling program to E tail its delicacies in the United States.</li>

                                      	<li>Product Innovations is the key to expansion - Heritage Foods, a Hyderabad-based company, has plans to add five more milk processing units in the next five years for an investment of US$ 22.31 million as part of its expansion plan to achieve US$ 1 billion turnover by 2022.</li>

                                      	<li>Emphasis on healthier ingredients - Food processing companies are serving health and wellness as a new ingredient in processed food because of it being low on carbohydrates and cholesterol, for example, zero-% trans-fat snacks and biscuits, slim milk, and whole wheat products, etc.</li>

                                      	<li>Higher consumption of horticulture crops - There is a surge in demand for fruits and vegetables as a result of shift in consumption. Accordingly, Indian farmers are also shifting production.</li>

                                      </ol>

                                    </td>

                                 </tr> -->



                                  

                              </tbody>

                           </table>

                        </td>

                     </tr>

                  </tbody>

                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>

               </table>

            </td>

         </tr>

      </tbody>

   </table>

   <?php } ?>

   <!-- ====== Module : Center Image ====== -->

   <table bgcolor="#fbfbfb" align="center" class="full" border="0" cellpadding="0" cellspacing="0" >

      <tbody>

         <tr>

            <td>

               <table  width="750" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M4 Bgcolor 2">

                  <tbody>

                     <tr>

                        <td>

                           <table width="600" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">

                              <tbody>

                                 <tr>

                                    <td height="35" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- HEADING -->

                                 <!-- title -->

                                 <tr>

                                    <td class="res-center selected-element" style="text-align: center; color: #405060; font-family: 'Raleway', Arial, Sans-serif; font-size: 38px; letter-spacing: 0.7px; word-break: break-word; font-weight: bold

                                    " >

                                      Risk Outlook

                                    </td>

                                 </tr>

                                 <!-- title end -->

                                

                                 <!-- image -->

                                

                                 <!-- image end -->

                                 <!-- HEADING end -->

                                 <tr>

                                    <td height="30" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- column x2 -->

                                 <tr>

                                    <td>

                                       <table class="full" align="center" border="0" cellpadding="0" cellspacing="0">

                                          <tbody>

                                             <tr>

                                                <td valign="top">

                                                   <!-- left column -->

                                                   <table width="595" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">

                                                      <tbody>

                                                         <tr>

                                                            <td width="190" >

                                                               <table class="full" align="center" border="0" cellpadding="0" cellspacing="0" style="padding: 15px; line-height: 27px;">

                                                                  <!-- subtitle -->

                                                                  <tbody>

                                                                     <tr>

                                                                        <td class="res-left" width="10" height="10" style="margin-bottom: 10px; width: 23px; height: 20px; background-color: #ff0000; margin-right: 20px; height: 10px;" >

                                                                           

                                                                        </td>

                                                                        <td class="res-left"  style="text-align: left; color: #506070; font-family: 'Nunito', Arial, Sans-serif; font-size: 18px; letter-spacing: 0.7px; word-break: break-word; " >

                                                                           &nbsp;Extreme Risk

                                                                        </td>

                                                                     </tr>

                                                                     <!-- subtitle end -->

                                                                     <!-- paragraph -->

                                                                     

                                                                     <!-- paragraph end -->

                                                                     <!-- link -->

                                                                    

                                                                     <!-- link end -->

                                                                  </tbody>

                                                               </table>

                                                            </td>

                                                            <td width="15"></td>

                                                            <td width="190">

                                                               <table class="full" align="center" border="0" cellpadding="0" cellspacing="0">

                                                                  <!-- image -->

                                                                  <tbody>

                                                                     <tr>

                                                                        <td class="res-left" width="10" height="10" style="margin-bottom: 10px; width: 23px; height: 20px; background-color: #3882d7; margin-right: 20px; height: 10px;" >

                                                                           

                                                                        </td>

                                                                        <td class="res-left"  style="text-align: left; color: #506070; font-family: 'Nunito', Arial, Sans-serif; font-size: 18px; letter-spacing: 0.7px; word-break: break-word; " >

                                                                           &nbsp;Medium Risk

                                                                        </td>

                                                                     </tr>

                                                                     <!-- subtitle end -->

                                                                     <!-- paragraph -->

                                                                     

                                                                     <!-- paragraph end -->

                                                                     <!-- link -->

                                                                    

                                                                     <!-- link end -->

                                                                  </tbody>

                                                               </table>

                                                            </td>

                                                         </tr>

                                                      </tbody>

                                                   </table>

                                                   <!-- left column end -->

                                                   <!--[if (gte mso 9)|(IE)]>

                                                </td>

                                                <td>

                                                   <![endif]-->

                                                  

                                                   <!--[if (gte mso 9)|(IE)]>

                                                </td>

                                                <td valign="top">

                                                   <![endif]-->

                                                   <!-- right column -->

                                                   

                                                   <!-- right column end -->

                                                </td>

                                             </tr>

                                          </tbody>

                                       </table>

                                    </td>

                                 </tr>

                                 <!-- column x2 end -->

                                 <tr>

                                    <td height="15" style="font-size:0px">&nbsp;</td>

                                 </tr>

                              </tbody>

                           </table>

                        </td>

                     </tr>

                  </tbody>

                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>

               </table>

            </td>

         </tr>

      </tbody>

   </table>

   <!-- ====== Module : Products Samples ====== -->

   <table  align="center" class="full" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-5.png" data-module="Module-5" data-bgcolor="M5 Bgcolor 1">

      <tbody>

         <tr>

            <td>

               <table bgcolor="white" width="950" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M5 Bgcolor 2">

                  <tbody>

                     <tr>

                        <td>

                           <table width="600" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">

                              <tbody>

                                 

                                 <!-- HEADING -->

                                 <!-- title -->

                                 

                                 <!-- image -->

                                

                                 <!-- image end -->

                                 <!-- HEADING end -->

                                 <tr>

                                    <td height="30" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- column x2 -->

                                 <tr>

                                    <td>

                                       <table class="full" align="center" border="0" cellpadding="0" cellspacing="0">

                                          <tbody>

                                             <tr>

                                                <td valign="top">

                                                   <!-- left column -->

                                                   <?php if($sub_industry_name->cyber_insurance != 0){?>

                                                <td>

                                                   <table width="100" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">

                                                      <!-- subtitle -->

                                                      <tbody>

                                                      	<tr>

                                                      		<!-- <td width="1" style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;"></td> -->

                                                      		<td>

                                                      			<table width="100" style="border-spacing: 1;">

                                                      				<tbody>

                                                      					<tr>

                                                      						

                                                      						<td style="">

                                                      							<table width="100">

                                                      								<tr>

                                                      									<td >
                                                                                    <?php if($sub_industry_name->cyber_insurance == 1){?>
                                                      										<img src="<?php echo $base_url_views; ?>asset_new/img/extreme-risk.jpg" alt="">
                                                                                 <?php } else{?>
                                                                                    <img src="<?php echo $base_url_views; ?>asset_new/img/medium-risk.jpg" alt="">
                                                                                 <?php } ?>

                                                      									</td>

                                                      								</tr>

                                                      								

                                                      								

                                                      							</table>

                                                      						</td>

                                                      						<!-- <td style=" height: 146px;width: 1px;background: #f73e3e;margin-bottom: 4px;"></td> -->

                                                      					</tr>



                                                      				</tbody>

                                                      			</table>



                                                      		</td>

                                                      		<!-- <td width="1" style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;"></td> -->

                                                      	</tr>

                                                      	<tr>

                                                      									<td colspan="3" style="text-align: center; color: #232323; font-weight: bold; font-family: 'Nunito', Sans-serif; font-size: 12px; letter-spacing: 0.7px; word-break: break-word; padding-top: 10px">

                                                      										Cyber Risk

                                                      									</td>

                                                      								</tr>

                                                      </tbody>

                                                   </table>

                                               </td>

                                            <?php } ?>

                                                   <!-- left column end -->

                                                   <!--[if (gte mso 9)|(IE)]>

                                                </td>

                                                <td>

                                                   <![endif]-->

                                                  



                                               <?php if($sub_industry_name->crime_insurance != 0){?>  

                                               <td>

                                                   <table width="100" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0" style="">

                                                      <!-- subtitle -->

                                                      <tbody>

                                                      	<tr>

                                                      		<!-- <td width="1" style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;"></td> -->

                                                      		<td>

                                                      			<table width="100" style="border-spacing: 1;">

                                                      				<tbody>

                                                      					<tr>

                                                      						<!-- <td style=" height: 16px;width: 1px;background: #3882d7;margin-bottom: 4px;"></td> -->

                                                      						<td style="">

                                                      							<table width="100">

                                                      								<tr>

                                                      									<td >

                                                      										<?php if($sub_industry_name->crime_insurance == 1){?>
                                                                                    <img src="<?php echo $base_url_views; ?>asset_new/img/extreme-risk.jpg" alt="">
                                                                                 <?php } else{?>
                                                                                    <img src="<?php echo $base_url_views; ?>asset_new/img/medium-risk.jpg" alt="">
                                                                                 <?php } ?>

                                                      									</td>

                                                      								</tr>

                                                      								

                                                      								

                                                      							</table>

                                                      						</td>

                                                      						<!-- <td style=" height: 146px;width: 1px;background: #3882d7;margin-bottom: 4px;"></td> -->

                                                      					</tr>



                                                      				</tbody>

                                                      			</table>



                                                      		</td>

                                                      		<!-- <td width="1" style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;"></td> -->

                                                      	</tr>

                                                      	<tr>

                                                      									<td colspan="3" style="text-align: center; color: #232323; font-weight: bold; font-family: 'Nunito', Sans-serif; font-size: 12px; letter-spacing: 0.7px; word-break: break-word; padding-top: 10px">

                                                      										Crime Risk

                                                      									</td>

                                                      								</tr>

                                                      </tbody>

                                                   </table>

                                               </td>

                                            <?php } ?>



                                               

                                                 
                                            <?php if($sub_industry_name->pro_insurance != 0){?>
                                              <td>

                                                   <table width="100" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0">

                                                      <!-- subtitle -->

                                                      <tbody>

                                                      	<tr>

                                                      		<!-- <td width="1" style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;"></td> -->

                                                      		<td>

                                                      			<table width="100" style="border-spacing: 1;">

                                                      				<tbody>

                                                      					<tr>

                                                      						

                                                      									<td >

                                                      										<?php if($sub_industry_name->pro_insurance == 1){?>
                                                                                    <img src="<?php echo $base_url_views; ?>asset_new/img/extreme-risk.jpg" alt="">
                                                                                 <?php } else{?>
                                                                                    <img src="<?php echo $base_url_views; ?>asset_new/img/medium-risk.jpg" alt="">
                                                                                 <?php } ?>

                                                      									</td>

                                                      							

                                                      						<!-- <td style="">

                                                      							<table width="100">

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								<tr>

                                                      									<td style="border-radius: 500px; height: 13px; background: #f73e3e; margin-bottom: 4px;">

                                                      										

                                                      									</td>

                                                      								</tr>

                                                      								

                                                      							</table>

                                                      						</td> -->

                                                      						<!-- <td style=" height: 146px;width: 1px;background: #f73e3e;margin-bottom: 4px;"></td> -->

                                                      					</tr>



                                                      				</tbody>

                                                      			</table>



                                                      		</td>

                                                      		<!-- <td width="1" style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;"></td> -->

                                                      	</tr>

                                                      	<tr>

                                                      									<td colspan="3" style="text-align: center; color: #232323; font-weight: bold; font-family: 'Nunito', Sans-serif; font-size: 12px; letter-spacing: 0.7px; word-break: break-word; padding-top: 10px">

                                                      										Property Risk

                                                      									</td>

                                                      								</tr>

                                                      </tbody>

                                                   </table>

                                               </td>

                                            <?php } ?>

                                               



                                                 
                                            <?php if($sub_industry_name->emp_insurance != 0){?>
                                               <td>

                                                   <table width="100" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0" style="">

                                                      <!-- subtitle -->

                                                      <tbody>

                                                      	<tr>

                                                      		<!-- <td width="1" style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;"></td> -->

                                                      		<td>

                                                      			<table width="100" style="border-spacing: 1;">

                                                      				<tbody>

                                                      					<tr>

                                                      									<td >

                                                      										<?php if($sub_industry_name->emp_insurance == 1){?>
                                                                                    <img src="<?php echo $base_url_views; ?>asset_new/img/extreme-risk.jpg" alt="">
                                                                                 <?php } else{?>
                                                                                    <img src="<?php echo $base_url_views; ?>asset_new/img/medium-risk.jpg" alt="">
                                                                                 <?php } ?>

                                                      									</td>

                                                      								</tr>



                                                      				</tbody>

                                                      			</table>



                                                      		</td>

                                                      		<!-- <td width="1" style=" height: 136px;width: 1px;background: #f73e3e;margin-bottom: 4px;"></td> -->

                                                      	</tr>

                                                      	<tr>

                                                      									<td colspan="3" style="text-align: center; color: #232323; font-weight: bold; font-family: 'Nunito', Sans-serif; font-size: 12px; letter-spacing: 0.7px; word-break: break-word; padding-top: 10px">

                                                      										Employee Risk

                                                      									</td>

                                                      								</tr>

                                                      </tbody>

                                                   </table>

                                               </td>


                                            <?php } ?>
                                               



                                                 
                                            <?php if($sub_industry_name->liability_insurance != 0){?>
                                               <td>

                                                   <table width="100" align="left" class="res-full" border="0" cellpadding="0" cellspacing="0" style="">

                                                      <!-- subtitle -->

                                                      <tbody>

                                                      	<tr>

                                                      									<td >

                                                      										<?php if($sub_industry_name->liability_insurance == 1){?>
                                                                                    <img src="<?php echo $base_url_views; ?>asset_new/img/extreme-risk.jpg" alt="">
                                                                                 <?php } else{?>
                                                                                    <img src="<?php echo $base_url_views; ?>asset_new/img/medium-risk.jpg" alt="">
                                                                                 <?php } ?>

                                                      									</td>

                                                      								</tr>

                                                      	<tr>

                                                      									<td colspan="3" style="text-align: center; color: #232323; font-weight: bold; font-family: 'Nunito', Sans-serif; font-size: 12px; letter-spacing: 0.7px; word-break: break-word; padding-top: 10px">

                                                      										Liability Risk

                                                      									</td>

                                                      								</tr>

                                                      </tbody>

                                                   </table>

                                               </td>
                                               <?php } ?>


                                                   

                                                   <!-- right column end -->

                                                </td>

                                             </tr>

                                          </tbody>

                                       </table>

                                    </td>

                                 </tr>

                                 <!-- column x2 end -->

                                 

                              </tbody>

                           </table>

                        </td>

                     </tr>

                  </tbody>

                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>

               </table>

            </td>

         </tr>

      </tbody>

   </table>

   <!-- ====== Module : Why Raghnall ====== -->



   <table>

   	<tbody>

   		 <tr>

                                    <td height="25" style="font-size:0px">&nbsp;</td>

                                 </tr>

   	</tbody>

   </table>







   <table bg-color="#fbfbfb" align="center" class="full selected-table" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-2.png" data-module="Module-2" data-bgcolor="M2 Bgcolor 1" >

      <tbody>

         <tr>

            <td>

               <table  width="750" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M2 Bgcolor 2">

                  <tbody>

                     <tr>

                        <td>

                           <table width="600" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">

                              <tbody>

                                 <tr>

                                    <td height="40" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- HEADING -->

                                 <!-- subtitle -->

                                

                                 <!-- subtitle end -->

                                 <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- title -->

                                 <tr>

                                    <td class="res-center selected-element" style="text-align: center; color: #405060; font-family: 'Raleway', Arial, Sans-serif; font-size: 38px; letter-spacing: 0.7px; word-break: break-word; font-weight: bold

                                    " >

                                     Why Raghnall

                                    </td>

                                 </tr>



                                 <tr>

                                    <td height="33" style="font-size:0px">&nbsp;</td>

                                 </tr>



                                  <tr>

                                    <td class="res-center" style="text-align: left; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 400;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                     We, at Raghnall, build partnerships with your organization that goes beyond pure risk transfer and offer a variety of additional services, like assessing your risk exposure, crisis management support or help with preventative measures. At Raghnall, we have specialized underwriters and product experts who take time to understand your business and procure protection from the most appropriate source according to your needs.

                                    </td>

                                </tr>

                                <tr>

                                    <td height="23" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <tr>

                                    <td class="res-center" style="text-align: center; text-transform: uppercase; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 800; padding: 7px 18px;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">
                                    <a href="https://www.raghnall.co.in/contact" style="width: 200px; height: 70px; background: #06225e; color: #fff; text-decoration: none; ">Know More</a>

                                    </td>

                                </tr>

                                

                                  

                              </tbody>

                           </table>

                        </td>

                     </tr>

                  </tbody>

                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>

               </table>

            </td>

         </tr>

      </tbody>

   </table>

    <table>

   	<tbody>

   		 <tr>

                                    <td height="25" style="font-size:0px">&nbsp;</td>

                                 </tr>

   	</tbody>

   </table>



     <table bgcolor="#fff" align="center" class="full selected-table" border="0" cellpadding="0" cellspacing="0" data-thumbnail="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2020/03/22/9jhlVUzudcB8NtbnMg67SvA5/StampReady/thumbnails/thumb-2.png" data-module="Module-2" data-bgcolor="M2 Bgcolor 1" >

      <tbody>

         <tr>

            <td>

               <table bgcolor="#fff" width="750" align="center" class="margin-full ui-resizable" border="0" cellpadding="0" cellspacing="0" data-bgcolor="M2 Bgcolor 2">

                  <tbody>

                     <tr>

                        <td>

                           <table width="600" align="center" class="margin-pad" border="0" cellpadding="0" cellspacing="0">

                              <tbody>

                                 <tr>

                                    <td height="40" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- HEADING -->

                                 <!-- subtitle -->

                                

                                 <!-- subtitle end -->

                                 <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <!-- title -->

                                 <tr>

                                    <td class="res-center selected-element" style="text-align: center; color: #405060; font-family: 'Raleway', Arial, Sans-serif; font-size: 18px; letter-spacing: 0.7px; word-break: break-word; font-weight: bold

                                    " >

                                     This report has been prepared by

                                    </td>

                                 </tr>



                                 <tr>

                                    <td height="13" style="font-size:0px">&nbsp;</td>

                                 </tr>



                                  <tr>

                                    <td class="res-center" width="100" style="text-align: center; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 400;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                     Raghnall Insurance Broking and Risk Management Pvt Ltd. A-702, Rustomjee Central Park, Andheri - Kurla Rd, Chakala, Andheri East, Mumbai 400093

                                    </td>

                                </tr>

                                <tr>

                                    <td height="23" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                 <tr>

                                    <td class="res-center" style="text-align: center;  color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 800;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                    	For information, please visit -



                                    <a href="https://www.raghnall.co.in/contact" >https://www.raghnall.co.in</a>

                                    </td>

                                </tr>

                                <tr>

                                    <td height="23" style="font-size:0px">&nbsp;</td>

                                 </tr>



                                <tr>

                                    <td class="res-center" style="text-align: center;  color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 800;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                    	<img src="<?php echo $base_url_views; ?>asset_new/img/emailer-foot-banner.jpg" alt="" height="300px">

                                    </td>

                                </tr>

                                 <tr>

                                    <td height="43" style="font-size:0px">&nbsp;</td>

                                 </tr>

                                <tr>

                                    <td class="res-center selected-element" style="text-align: center; color: #405060; font-family: 'Raleway', Arial, Sans-serif; font-size: 28px; letter-spacing: 0.7px; word-break: break-word; font-weight: bold

                                    " >

                                    Disclaimer:

                                    </td>

                                 </tr>



                                 <tr>

                                    <td class="res-center" width="100" style="text-align: center; color: #506070; font-family: 'Nunito', Sans-serif; font-size: 14px; letter-spacing: 1px; word-break: break-word; font-weight: 400;" data-color="M2 Subtitle 1" data-size="M2 Subtitle 1" data-max="24" data-min="5">

                                    This assessment is provided for informational purposes only. Risk-related analyses and statements in this assessment are statements of opinion of possible risks to entities as on the date they are expressed, and not statements of current or historical fact as to the security of any entity. You should not rely upon the material or information in this report as a basis for making any business, legal, or any other decisions. Raghnall or MSME Accelerate shall not be liable for any damages arising in contract, tort or otherwise from the use or inability to use this report, or any action or decision taken as a result of using the report. Neither Raghnall nor MSME Accelerate warrant that (i) the assessment will meet all your requirement; (ii) the assessment will be uninterrupted, timely, secure or error-free; or (iii) that all the errors in the assessment will be corrected.

                                    </td>

                                </tr>



                                

                                

                                  

                              </tbody>

                           </table>

                        </td>

                     </tr>

                  </tbody>

                  <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>

               </table>

            </td>

         </tr>

      </tbody>

   </table>

   

</div>



    



    



</body>



</html>



