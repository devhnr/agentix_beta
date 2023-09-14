<?php
if(isset($_POST["industry"])){
    // Capture selected country
    $industry = $_POST["industry"];

     
    // Define country and city array
    $countryArr = array(
                    "clothing" => array("Wholesale"),
                    "commercial" => array("Employees using Motor Cycles/Scooters"),
                    "domestic" => array("Bearers, Khitmatgars, Hamals, Cooks, Sweepers and Mehters", "Motor Car Driver, Cleaners and attendants"),
                    "paper" =>array("Machine Made"),
                    "yarn" =>array("All Processes"),
                    "other" =>array("N/A"),
                );
     
    // Display city dropdown based on country name
    if($industry !== 'Select'){
       
        foreach($countryArr[$industry] as $value){
           
            echo "<option>". $value . "</option>";
        }
        
    }
}
?>