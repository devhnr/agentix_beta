<?php include('includes/header.php');?>
<style>
    #more {display: none;}
    #more2 {display: none;}
    #more3 {display: none;}
</style>

<section class="" style="background: url(<?php echo $base_url_views ?>agent-admin/img/blue-bg.png); background-size: cover; background-repeat: no-repeat">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 p-0">
                <div class="inner-banner">
                    <div class="banner-img">
                        
                        <h1>Find Newly Launched Products & Accelerate your Business</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if($new_products != ''){?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-3">
                <h3>New Products</h3>
            </div>
            <?php foreach($new_products as $new_products_data){ 

                $company_data = $this->agent_admin_model->get_company_logo($new_products_data->company_id);
                //echo "<pre>";print_r($company_data);echo"</pre>";
                ?>
            <div class="col-lg-4">
                <div class="prod-col">
                    <div class="prod-flag">
                        <span>New</span>
                    </div>
                    <div class="prod-img">
                        <?php if($company_data->image != ''){?>
                            <img src="<?php echo $base_url;?>upload/policies_image/<?php echo $company_data->image;?>" alt="">
                        <?php } else{ ?>
                            <img src="<?php echo $base_url;?>upload/policies_image/no-image.png" alt="">
                        <?php } ?>    
                         <div class="prod-name mt-3 mb-3">
                             <h5><?php echo $new_products_data->name;?></h5>
                        </div>
                    </div>
                    <div class="prod-content">
                     <?php
                        

                        $words = preg_split('/\s+/', $new_products_data->description);

                        $wordsPerSegment = 30;

                        $segments = array();

                        // Iterate over the words and create segments
                        for ($i = 0; $i < count($words); $i += $wordsPerSegment) {
                            $segments[] = implode(' ', array_slice($words, $i, $wordsPerSegment));
                        }

                        echo '<p>';
                        foreach ($segments as $index => $segment) {
                            echo '<span class="segment">' . $segment . '</span>';
                            if ($index === 0) {
                                echo '<span id="dots_'.$new_products_data->id.'">...</span>';
                                echo '<span id="more_'.$new_products_data->id.'" style="display: none;">';
                            }
                        }
                        echo '</span></p>';

                     ?>   
                       <!-- <p>AgentiX is a cutting-edge platform designed to empower insurance agents with advanced tools and solutions. It aims to uplift agents, granting them access to technology and products, while allowing them to maintain ownership of their business.<span id="dots">...</span><span id="more">granting them access to technology and products, while allowing them to maintain ownership of their business.</span></p> -->
                       <button onclick="ReadMore_<?php echo $new_products_data->id;?>()" class="btn" id="readmore_<?php echo $new_products_data->id;?>">Read more</button>
                       
                    </div>
                    
                    <?php if($new_products_data->url != ''){?>
                        
                        <div class="pro-cta">
                            <a href="<?php echo $new_products_data->url;?>" target="_blank" class="btn ">See Details <i class="feather icon-feather-chevrons-right"></i></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
          <!--   
            <div class="col-lg-4">
                <div class="prod-col">
                    <div class="prod-flag">
                        <span>New</span>
                    </div>
                    <div class="prod-img">
                        <img src="<?php echo $base_url_views ?>agent-admin/img/pro1.png" alt="">
                         <div class="prod-name mt-3 mb-3">
                             <h5>HDFC Ergo</h5>
                        </div>
                    </div>
                    <div class="prod-content">
                       <p>AgentiX is a cutting-edge platform designed to empower insurance agents with advanced tools and solutions. It aims to uplift agents, granting them access to technology and products, while allowing them to maintain ownership of their business.<span id="dots2">...</span><span id="more2">granting them access to technology and products, while allowing them to maintain ownership of their business.</span></p>
                       <button onclick="ReadMore2()" class="btn" id="readmore2">Read more</button>
                       
                    </div>
                    
                    <div class="pro-cta">
                        <a href="#"  class="btn ">See Details <i class="feather icon-feather-chevrons-right"></i></a>
                    </div>
                </div>
            </div>
             <div class="col-lg-4">
                <div class="prod-col">
                    <div class="prod-flag">
                        <span>New</span>
                    </div>
                    <div class="prod-img">
                        <img src="<?php echo $base_url_views ?>agent-admin/img/pro1.png" alt="">
                         <div class="prod-name mt-3 mb-3">
                             <h5>HDFC Ergo</h5>
                        </div>
                    </div>
                    <div class="prod-content">
                       <p>AgentiX is a cutting-edge platform designed to empower insurance agents with advanced tools and solutions. It aims to uplift agents, granting them access to technology and products, while allowing them to maintain ownership of their business.<span id="dots3">...</span><span id="more3">granting them access to technology and products, while allowing them to maintain ownership of their business.</span></p>
                       <button onclick="ReadMore3()" class="btn" id="readmore3">Read more</button>
                       
                    </div>
                    
                    <div class="pro-cta">
                        <a href="#"  class="btn ">See Details <i class="feather icon-feather-chevrons-right"></i></a>
                    </div>
                </div>
            </div> -->
        </div>
        
    </div>
</section>
<?php }else{echo 'No Product Available';} ?>

<?php include('includes/footer.php');?>

 <?php foreach($new_products as $new_products_data){ ?>
    <script>
        
function ReadMore_<?php echo $new_products_data->id; ?>() {
  var dots = document.getElementById("dots_<?php echo $new_products_data->id; ?>");
  var moreText = document.getElementById("more_<?php echo $new_products_data->id; ?>");
  var btnText = document.getElementById("readmore_<?php echo $new_products_data->id; ?>");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
    </script>

<?php } ?>
    
      <script>
        
function ReadMore2() {
  var dots2 = document.getElementById("dots2");
  var moreText2 = document.getElementById("more2");
  var btnText2 = document.getElementById("readmore2");

  if (dots2.style.display === "none") {
    dots2.style.display = "inline";
    btnText2.innerHTML = "Read more"; 
    moreText2.style.display = "none";
  } else {
    dots2.style.display = "none";
    btnText2.innerHTML = "Read less"; 
    moreText2.style.display = "inline";
  }
}
    </script>
    
      <script>
        
function ReadMore3() {
  var dots3 = document.getElementById("dots3");
  var moreText3 = document.getElementById("more3");
  var btnText3 = document.getElementById("readmore3");

  if (dots3.style.display === "none") {
    dots3.style.display = "inline";
    btnText3.innerHTML = "Read more"; 
    moreText3.style.display = "none";
  } else {
    dots3.style.display = "none";
    btnText3.innerHTML = "Read less"; 
    moreText3.style.display = "inline";
  }
}
    </script>





