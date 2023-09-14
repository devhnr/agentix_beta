<body class="dashboard-page"><script> var boxtest = localStorage.getItem('boxed'); if (boxtest === 'true') {document.body.className+=' boxed-layout';} </script> 

<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" > <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9" > <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" > <!--<![endif]-->

<?php include('include/header.php');?><!-- Start: Main -->


<style>
    .table-section{
        background: #fff;
        padding: 20px;
    }
    
    .count-sec {
    display: flex;
    justify-content: center;
    align-items: center;
}

.count-col {
    background: #fff;
    padding: 20px;
    border: 1px solid #efefef;
    margin-right: 10px;
    width: 19%;
    border-radius: 3px;
}

.count-col h4 {
    margin: 0;
    color: #1e1e1e;
    font-size: 1.8em;
    font-weight: 700;
    margin-top: 18px;
}
</style>
<div id="main"> 

   <?php include('include/sidebar_left.php');?>  <!-- Start: Content -->  <section id="content_wrapper"> 

   <div id="topbar">     

   <div class="topbar-left">      

   <ol class="breadcrumb">    

   <li class="crumb-active"><a href="javascript:void(0);">Summary</a></li>  

   <li class="crumb-icon"><a href="javascript:void(0);"><span class="glyphicon glyphicon-home"></span></a></li> 

   <li class="crumb-link"><a href="javascript:void(0);">Home</a></li>

   <li class="crumb-trail">Summary</li> 

   </ol>  

   </div>      

   </div>   


    
	<div class="tab-pane p15 active" id="tab3">    

		<h2>Summary</h2>

	</div>
  <div id="content">
      <div class="row">
          <div class="col-lg-12">
              <div class="box table-section">
                  <div class="box-body">
                      <div class="insurance-det">
                  <h3>Insurance Name</h3>
                  <h5><strong>TPA:</strong> <span></span>Alankit Insurance TPA Limited</span></h5>
                  <p><strong>Policy No:</strong> 673451324</p>
                  <p><strong>Validity:</strong> <span> 04/04/2023 </span> - <span> 04/04/2023 </span></p>
              </div>
                  </div>
              </div>
              
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
                <div class="box table-section ">
                     <div class="box-body">
                         <div class="count-sec">
                             <div class="count-col">
                                 <h5 class="mb-2">Inception Premium</h5>
                                 <h4 class="">₹ 1500000</h4>
                             </div>
                             <div class="count-col">
                                 <h5 class="mb-2">Additional Premium</h5>
                                 <h4 class="">₹ 2500000</h4>
                             </div>
                             <div class="count-col">
                                 <h5 class="mb-2">Deletion Premium</h5>
                                 <h4 class="">₹ 500000</h4>
                             </div>
                             <div class="count-col">
                                 <h5 class="mb-2">NFT Premium</h5>
                                 <h4 class="">₹ 3500000</h4>
                             </div>
                             <div class="count-col">
                                 <h5 class="mb-2">Active Lives</h5>
                                 <h4 class="">40</h4>
                             </div>
                         </div>
                    </div>
                </div>
          </div>
      </div>
         <div class="row">
             <div class="col-lg-12 mb-3">
                 <div class="box table-section ">
                     <div class="box-body">
                        <h5>Enrollment Summary</h5>
                         
                          <table id="example2" class="table table-bordered table-bordered" >
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Lives</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Inception Lives</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Additional Lives</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Deletion Lives</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Active Lives</th>
                </tr>
                </thead>
                <tbody>
                
                
                <tr role="row" class="odd">
                <td class="sorting_1">Employee</td>
                <td>0</td>
                <td>0</td>
                <td>1.7</td>
                <td>0</td>
                </tr>
                
                <tr role="row" class="even">
                <td class="sorting_1">Spouse</td>
               <td>0</td>
                <td>0</td>
                <td>1.7</td>
                <td>0</td>
                </tr>
                
                <tr role="row" class="odd">
                <td class="sorting_1">Children</td>
                <td>0</td>
                <td>0</td>
                <td>1.7</td>
                <td>0</td>
                </tr>
                
                <tr role="row" class="even">
                <td class="sorting_1">Parents</td>
                <td>0</td>
                <td>0</td>
                <td>1.7</td>
                <td>0</td>
                </tr>
                
                <tr role="row" class="odd">
                <td class="sorting_1">Others</td>
                <td>0</td>
                <td>0</td>
                <td>1.7</td>
                <td>0</td>
                </tr>
                
               </tbody>
<tfoot>
<tr><th rowspan="1" colspan="1">Total</th><th rowspan="1" colspan="1">0</th><th rowspan="1" colspan="1">0</th><th rowspan="1" colspan="1">0 </th><th rowspan="1" colspan="1">0</th></tr>
</tfoot>
</table>
                     </div>
                     
                 </div>
                 
                
             </div>
             <div class="col-lg-12 mb-3">
                  <div class="box table-section mb-3">
                     <div class="box-body">
                        <h5>Claim Ratio (%) Summary</h5>
                         
                          <table id="example2" class="table table-bordered table-bordered" >
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Net Permium</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Earned Permium</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Incurred Permium</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Claim Ratio (%)</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Incurred Claim Ratio (%)</th>
                </tr>
                </thead>
                <tbody>
                
                
                <tr role="row" class="odd">
                <td class="sorting_1">₹ 3500000</td>
                <td>₹ 9695.290858725763</td>
                <td>₹ 440000</td>
                <td>41.285714285714285</td>
                <td>14904.142857142857</td>
                </tr>
                
               
               </tbody>
<tfoot>
<tr>
    <th rowspan="1" colspan="1">Total</th><th rowspan="1" colspan="1">0</th><th rowspan="1" colspan="1">0</th><th rowspan="1" colspan="1">0 </th><th rowspan="1" colspan="1">0</th>

</tr>
</tfoot>
</table>
                     </div>
                     
                 </div>
             </div>
             <div class="col-lg-12 mb-3">
                  <div class="box table-section mb-3">
                     <div class="box-body">
                        <h5>Claim Status Summary</h5>
                         
                         <table class="table table-bordered table-responsive text-nowrap" style="display: block !important;overflow-x: auto !important;white-space: nowrap !important;">
                                                <thead class="thead-light  font-size-15px">
                                                    <tr style="text-align:center;">
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Status</th>
                                                        <th scope="col" colspan="3">Cashless</th>
                                                        <th scope="col" colspan="3">Reimbursement</th>
                                                        <th scope="col" colspan="3">Total</th>

                                                    </tr>
                                                    <tr>
                                                      <!-- <td >total Claim</td> -->
                                                      <td>Total Claim</td>
                                                      <td>Claim Amount</td>
                                                      <td>Incurred Amount</td>
                                                      <td>Total Claim</td>
                                                      <td>Claim Amount</td>
                                                      <td>Incurred Amount</td>
                                                      <td>Total Claim</td>
                                                      <td>Claim Amount</td>
                                                      <td>Incurred Amount</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="claim_summary_tbl"><tr><td>Closed</td><td>2</td><td>390000</td><td>0</td><td>1</td><td>180000</td><td>0</td>
            <td>3</td>
            <td>570000</td>
            <td>0</td>
            </tr><tr><td>Outstanding</td><td>3</td><td>595000</td><td>0</td><td>2</td><td>410000</td><td>0</td>
            <td>5</td>
            <td>1005000</td>
            <td>0</td>
            </tr><tr><td>Paid</td><td>3</td><td>385000</td><td>260000</td><td>2</td><td>300000</td><td>180000</td>
            <td>5</td>
            <td>685000</td>
            <td>440000</td>
            </tr><tr><td>Rejected</td><td>2</td><td>355000</td><td>0</td><td>3</td><td>490000</td><td>0</td>
            <td>5</td>
            <td>845000</td>
            <td>0</td>
            </tr></tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <th id="total_val">10</th>
                                                        <th id="total_val1">1725000</th>
                                                        <th id="total_val2">260000</th>
                                                        <th id="total_val3">8</th>
                                                        <th id="total_val4">1380000</th>
                                                        <th id="total_val5">180000</th>
                                                        <th id="total_val6">18</th>
                                                        <th id="total_val7">3105000</th>
                                                        <th id="total_val8">440000</th>
                                                    </tr>
                                                </thead>
                                            </table>
                     </div>
                     
                 </div>
             </div>
              <div class="col-lg-12 mb-3">
                  <div class="box table-section mb-3">
                     <div class="box-body">
                        <h5>Settled (ACS)</h5>
                         
                         <table class="table table-bordered table-responsive text-nowrap" style="display: block !important;overflow-x: auto !important;white-space: nowrap !important;">
                                                <thead class="thead-light  font-size-15px">
                                                    <tr style="text-align:center;">
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Status</th>
                                                        <th scope="col" colspan="3">Cashless</th>
                                                        <th scope="col" colspan="3">Reimbursement</th>
                                                        <th scope="col" colspan="3">Total</th>

                                                    </tr>
                                                    <tr>
                                                      <!-- <td >total Claim</td> -->
                                                      <td>Total Claim</td>
                                                      <td>Claim Amount</td>
                                                      <td>Incurred Amount</td>
                                                      <td>Total Claim</td>
                                                      <td>Claim Amount</td>
                                                      <td>Incurred Amount</td>
                                                      <td>Total Claim</td>
                                                      <td>Claim Amount</td>
                                                      <td>Incurred Amount</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="claim_summary_tbl"><tr><td>Closed</td><td>2</td><td>390000</td><td>0</td><td>1</td><td>180000</td><td>0</td>
            <td>3</td>
            <td>570000</td>
            <td>0</td>
            </tr></tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <th id="total_val">10</th>
                                                        <th id="total_val1">1725000</th>
                                                        <th id="total_val2">260000</th>
                                                        <th id="total_val3">8</th>
                                                        <th id="total_val4">1380000</th>
                                                        <th id="total_val5">180000</th>
                                                        <th id="total_val6">18</th>
                                                        <th id="total_val7">3105000</th>
                                                        <th id="total_val8">440000</th>
                                                    </tr>
                                                </thead>
                                            </table>
                     </div>
                     
                 </div>
             </div>
             <div class="col-lg-12 mb-3">
                  <div class="box table-section mb-3">
                     <div class="box-body">
                        <h5>Agewise Settled Claim Summary</h5>
                         
                        <table class="table table-bordered table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Age Group</th>
                                                        <th scope="col">Total Claims</th>
                                                        <th scope="col">Paid Claim Count</th>
                                                        <th scope="col">Settled Amount</th>
                                                        <th scope="col">% of Claims</th>
                                                        <th scope="col">ACS</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="age_tbl"><tr><td>0-25</td><td>3</td><td>2</td><td>160000</td><td>11.111111111111</td><td>80000</td></tr><tr><td>26-35</td><td>6</td><td>2</td><td>160000</td><td>22.222222222222</td><td>80000</td></tr><tr><td>36-45</td><td>6</td><td>1</td><td>100000</td><td>22.222222222222</td><td>100000</td></tr><tr><td>46-55</td><td>6</td><td>2</td><td>180000</td><td>22.222222222222</td><td>90000</td></tr><tr><td>56-65</td><td>3</td><td>0</td><td>0</td><td>11.111111111111</td><td>-</td></tr><tr><td>&gt; 65</td><td>3</td><td>1</td><td>100000</td><td>11.111111111111</td><td>100000</td></tr></tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th id="age_total_val">27</th>
                                                        <th id="age_total_val1">8</th>
                                                        <th id="age_total_val2">₹ 700000 /-</th>
                                                        <th id="age_total_val3">100</th>
                                                        <th id="age_total_val4">87500</th>
                                                    </tr>
                                                </thead>
                                            </table>
                     </div>
                     
                 </div>
             </div>
             <div class="col-lg-12 mb-3">
                  <div class="box table-section mb-3">
                     <div class="box-body">
                        <h5>Outstanding Claim TAT Summary</h5>
                         
                       <table class="table table-bordered table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Internal Processing TAT (No)</th>
                                                        <th scope="col">Claims Count</th>
                                                        <th scope="col">Claims (%)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tat_tbl"><tr><td>8-17 days</td><td>5</td><td>100</td></tr><tr><td>18-30 days</td><td>0</td><td>-</td></tr><tr><td>&gt; 30 days</td><td>0</td><td>-</td></tr></tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <th id="tal_total_val">5</th>
                                                        <th id="tal_total_val1">100</th>
                                                    </tr>
                                                </thead>
                                            </table>
                     </div>
                     
                 </div>
             </div>
             <div class="col-lg-12 mb-3">
                  <div class="box table-section mb-3">
                     <div class="box-body">
                        <h5>Relationwise Settled Claim Summary</h5>
                         

                          <table class="table table-bordered table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Internal Processing TAT (No)</th>
                                                        <th scope="col">Claims Count</th>
                                                        <th scope="col">Claims (%)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="out_tbl"><tr><td>8-17 days</td><td>0</td><td>-</td></tr><tr><td>18-30 days</td><td>0</td><td>-</td></tr><tr><td>&gt; 30 days</td><td>5</td><td>100</td></tr></tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <th id="out_total_val">5</th>
                                                        <th id="out_total_val1">100</th>
                                                    </tr>
                                                </thead>
                                            </table>
                       
                     </div>
                     
                 </div>
             </div>

             <div class="col-lg-12 mb-3">
               <div class="box table-section mb-3">
                     <div class="box-body">
                       <h5>Network / Non Network Claim Summary</h5>
                       <table class="table table-bordered table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Relation</th>
                                                        <th scope="col">Total Claims</th>
                                                        <th scope="col">Paid Claim Count</th>
                                                        <th scope="col">Settled Amount</th>
                                                        <th scope="col">% of Claims</th>
                                                        <th scope="col">ACS</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ralation_tbl"><tr><td>Daughter</td><td>1</td><td>0</td><td>0</td><td>5.8823529411765</td><td>-</td></tr><tr><td>Employee</td><td>8</td><td>3</td><td>260000</td><td>47.058823529412</td><td>86666.666666667</td></tr><tr><td>Father</td><td>1</td><td>1</td><td>100000</td><td>5.8823529411765</td><td>100000</td></tr><tr><td>Mother</td><td>1</td><td>0</td><td>0</td><td>5.8823529411765</td><td>-</td></tr><tr><td>Sister</td><td>1</td><td>0</td><td>0</td><td>5.8823529411765</td><td>-</td></tr><tr><td>Son</td><td>3</td><td>0</td><td>0</td><td>17.647058823529</td><td>-</td></tr><tr><td>Spouse</td><td>2</td><td>1</td><td>80000</td><td>11.764705882353</td><td>80000</td></tr></tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th id="ralation_total_val">17</th>
                                                        <th id="ralation_total_val1">5</th>
                                                        <th id="ralation_total_val2">₹ 440000 /-</th>
                                                        <th id="ralation_total_val3">100</th>
                                                        <th id="ralation_total_val4">88000</th>
                                                    </tr>
                                                </thead>
                                            </table>
                     </div>
                   </div>
              
             </div>

              <div class="col-lg-12 mb-3">
                <div class="box table-section">
                  <div class="box-body">
                    <h5>Amount Band Settled Claim Summary</h5>
                      <table class="table table-bordered table-responsive text-nowrap">
                                                <thead class="thead-light  font-size-15px">
                                                    <tr>
                                                        <th scope="col">Network Type</th>
                                                        <th scope="col">Type of Claim</th>
                                                        <th scope="col">Total Claim</th>
                                                        <th scope="col">Paid Claim</th>
                                                        <th scope="col">Settled Amount</th>
                                                        <th scope="col">ACS</th>
                                                        <th scope="col">% of Claims</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="network_tbl">
                                                  <tr>
                                                    <td rowspan="4">Network</td></tr>
                                                    <tr><td>Cashless</td><td>8</td><td>3</td><td>260000</td><td>86666.666666667</td><td rowspan="4" style="padding: 4.9% !important;">67</td></tr>
                                                    <tr><td>Reimbursement</td><td>4</td><td>2</td><td>180000</td><td>90000</td></tr>
                                                    <tr><td>Total</td><td>12</td>
                                                    <td>5</td><td>440000</td><td>88000</td></tr><tr><td rowspan="4">Non Network</td></tr><tr><td>Cashless</td><td>2</td><td>0</td><td>0</td><td>-</td><td rowspan="4" style="padding: 4.9% !important;">33</td></tr>
                                                    <tr><td>Reimbursement</td><td>4</td><td>0</td><td>0</td><td>-</td></tr>
                                                    <tr><td>Total</td><td>6</td>
                                                    <td>0</td><td>0</td><td>-</td></tr>
                                                  </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th></th>
                                                        <th>Grand Total</th>
                                                        <th id="network_total_val">18</th>
                                                        <th id="network_total_val1">5</th>
                                                        <th id="network_total_val2">₹ 440000 /-</th>
                                                        <th id="network_total_val3">88000</th>
                                                        <th id="network_total_val4">100</th>
                                                    </tr>
                                                </thead>
                                            </table>
                  </div>
                </div>
               
             </div>
             <div class="col-lg-12 mb-3">
              <div class="box table-section mb-3">
                  <div class="box-body">
                    <h5>Level of Care Settled Claim Summary</h5>
                    <table class="table table-bordered table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Amount Band</th>
                                                        <th scope="col">Total Claims</th>
                                                        <th scope="col">Paid Claim Count</th>
                                                        <th scope="col">Settled Amount</th>
                                                        <th scope="col">% of Claims</th>
                                                        <th scope="col">ACS</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="amount_tbl">
                                                  <tr><td>Upto 25 K</td><td>0</td><td>0</td><td>440000</td><td>0</td><td>-</td></tr>
                                                  <tr><td>&gt; 25K to 50K</td><td>6</td><td>0</td><td>0</td><td>25</td><td>-</td></tr><tr><td>&gt; 50 K to 1 Lac</td><td>12</td><td>5</td><td>0</td><td>50</td><td>0</td></tr><tr><td>&gt; 1 Lac to 2 Lac</td><td>6</td><td>2</td><td>0</td><td>25</td><td>0</td></tr><tr><td>&gt; 2 Lac</td><td>0</td><td>0</td><td>0</td><td>0</td><td>-</td></tr></tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th id="amount_total_val">24</th>
                                                        <th id="amount_total_val1">14</th>
                                                        <th id="amount_total_val2">₹ 440000 /-</th>
                                                        <th id="amount_total_val3">100</th>
                                                        <th id="amount_total_val4">31428.571428571428</th>
                                                    </tr>
                                                </thead>
                                            </table>
                  </div>
              </div>
               
             </div>
             <div class="col-lg-12 mb-3">
              <div class="box table-section mb-3">
                  <div class="box-body">
                    <h5>Level of Care Settled Claim Summary</h5>
               <table class="table table-bordered table-responsive text-nowrap">
                                                <thead class="thead-light  font-size-15px">
                                                    <tr style="text-align:center;">
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Level of Care</th>
                                                        <th scope="col" colspan="4">Medical</th>
                                                        <th scope="col" colspan="4">Surgical</th>

                                                    </tr>
                                                    <tr>
                                                      <td>Total Claim</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>ACS</td>
                                                      <td>Total Claim</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>ACS</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="level_tbl"><tr><td>Primary</td><td>2</td><td>1</td><td>80000</td><td>80000</td>
                                                    <td>2</td><td>1</td><td>80000</td><td>80000</td></tr><tr><td>Secondary</td><td>4</td><td>0</td><td>0</td><td>-</td>
                                                    <td>0</td><td>0</td><td>0</td><td>-</td></tr><tr><td>Tertiary</td><td>0</td><td>0</td><td>0</td><td>-</td>
                                                    <td>4</td><td>1</td><td>100000</td><td>100000</td></tr><tr><td>Intermediate</td><td>2</td><td>1</td><td>80000</td><td>80000</td>
                                                    <td>0</td><td>0</td><td>0</td><td>-</td></tr><tr><td>Intensive</td><td>2</td><td>0</td><td>0</td><td>-</td>
                                                    <td>0</td><td>0</td><td>0</td><td>-</td></tr><tr><td>General</td><td>2</td><td>1</td><td>100000</td><td>100000</td>
                                                    <td>0</td><td>0</td><td>0</td><td>-</td></tr></tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th id="level_val">6</th>
                                                        <th id="level_val1">3</th>
                                                        <th id="level_val2">₹ 260000 /-</th>
                                                        <th id="level_val3">246666.6666666667</th>
                                                        <th id="level_val4">6</th>
                                                        <th id="level_val5">2</th>
                                                        <th id="level_val6">₹ 180000 /-</th>
                                                        <th id="level_val7">170000</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                          </div>
                                        </div>
             </div>

             <div class="col-lg-12 mb-3">
               <div class="box table-section mb-3">
                  <div class="box-body">
                    <h5>Disease Category Wise Settled Claim Summary (Based on Amount)</h5>
               <table class="table table-bordered table-responsive text-nowrap" style="display: block !important;overflow-x: auto !important; white-space: nowrap !important;">
                                                <thead class="thead-light  font-size-15px">
                                                    <tr style="text-align:center;">
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Disease Category</th>
                                                        <th scope="col" colspan="2">Cashless</th>
                                                        <th scope="col" colspan="2">Reimbursement</th>
                                                        <th scope="col" colspan="2">Total</th>

                                                    </tr>
                                                    <tr>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="disease_tbl"><tr><td>Certain conditions originating in the perinatal period</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><tr><td>Certain infectious and parasitic diseases</td><td>1</td><td>100000</td><td>0</td><td>0</td><td>1</td><td>100000</td></tr><tr><td>Covid - 19</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><tr><td>Diseases of the digestive system</td><td>0</td><td>0</td><td>1</td><td>80000</td><td>1</td><td>80000</td></tr><tr><td>Diseases of the eye and adnexa</td><td>0</td><td>0</td><td>1</td><td>100000</td><td>1</td><td>100000</td></tr><tr><td>Diseases of the genitourinary system</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><tr><td>Diseases of the nervous system</td><td>1</td><td>80000</td><td>0</td><td>0</td><td>1</td><td>80000</td></tr><tr><td>Diseases of the respiratory system</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><tr><td>Injury,poisoning and certain other consequences of external causes</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr><tr><td>Symptoms, signs and abnormal clinical and laboratory findings, not elsewhere classified</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr></tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th id="disease_val">2</th>
                                                        <th id="disease_val1">₹ 180000 /-</th>
                                                        <th id="disease_val2">2</th>
                                                        <th id="disease_val3">₹ 180000 /-</th>
                                                        <th id="disease_val4">4</th>
                                                        <th id="disease_val5">₹ 360000 /-</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                          </div>
                                        </div>
             </div>

             <div class="col-lg-12 mb-3">
               <div class="box table-section mb-3">
                  <div class="box-body">
                      <h5>Top 20 Hospital Settled Claim Summary (Based on Count)</h5>
               <table class="table table-bordered table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Hospital Name with City</th>
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Network Type</th>
                                                        <th scope="col" colspan="2">Cashless</th>
                                                        <th scope="col" colspan="2">Reimbursement</th>
                                                        <th scope="col" colspan="2">Total</th>
                                                    </tr>
                                                    <tr>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="hospital_tbl"><tr><td>Apollo Hospitals (LA)</td><td>Network</td><td>2</td><td>160000</td><td>0</td><td>0</td><td>2</td><td>160000</td></tr><tr><td>AIIMS (LA)</td><td>Network</td><td>0</td><td>0</td><td>1</td><td>80000</td><td>1</td><td>80000</td></tr><tr><td>Max Super Speciality (LA)</td><td>Network</td><td>1</td><td>100000</td><td>0</td><td>0</td><td>1</td><td>100000</td></tr><tr><td>Lilavati Hospital (LA)</td><td>Network</td><td>0</td><td>0</td><td>1</td><td>100000</td><td>1</td><td>100000</td></tr></tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th></th>
                                                        <th>Grand Total</th>
                                                        <th id="hospital_val">3</th>
                                                        <th id="hospital_val1">₹ 260000 /-</th>
                                                        <th id="hospital_val2">2</th>
                                                        <th id="hospital_val3">₹ 180000 /-</th>
                                                        <th id="hospital_val4">5</th>
                                                        <th id="hospital_val5">₹ 440000 /-</th>
                                                        <!-- <th id='out_total_val1'></th> -->
                                                    </tr>
                                                </thead>
                                            </table>
                                          </div>
                                        </div>
             </div>
             
             
         </div>
      </div>

			    
	</section> 

	<?php include('include/sidebar_right.php');?> </div><!-- End #Main --> 

<?php include('include/footer.php')?></body></html>