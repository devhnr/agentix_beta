<?php include('includes/header.php');?>

<style>
    .h-vh {
    min-height: 83vh;
}

form.login-form {
    width: 100%;
    padding: 40px;
    border: 1px solid #2b4865;
    border-radius: 12px;
}

form.login-form input {
    width: 100%;
    padding: 14px 20px;
    border: none;
    border-bottom: 1px solid #797979;
    margin-bottom: 20px;
    margin-top: 12px;
    transition: 0.3s;
}


form.login-form input[type="radio"] {
    width: auto;
    padding: 10px;
    margin-right: 10px;
    height: auto;
    margin-top: 20px;
}

.form-check {
    margin-right: 20px;
    display: flex;
    align-items: center;
}
form.login-form input:focus{
    border-color: var(--altcolor)  ;
    box-shadow: none;
    outline: 0;
    
}

form.login-form button {
    width: 100%;
    text-align: center;
    background: var(--maincolor);
    padding: 10px;
    margin-top: 20px;
    color: #fff;
    text-transform: uppercase;
    transition: 0.3s;
    appearance: none;
    -webkit-appearance: none
}

form.login-form button:hover, form.login-form button:focus{
    background: var(--altcolor);
    color: #fff;
    
}
.lic-group {
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #dfdfdf;
}
</style>
<section class="pt-3 pb-3">
    <div class="container ">
        <div class="row justify-content-center align-items-center ">
            <div class="col-lg-10">
                <form class="login-form">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3>Agentix Signup</h3>
                            <p>Please enter correct details to Signup</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" class="" placeholder="First Name" name="" id="">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="" placeholder="Last Name" name="" id="">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="" placeholder="Phone Number" name="" id="">
                        </div>
                        <div class="col-lg-6">
                            <input type="mail" class="" placeholder="Email ID" name="" id="">
                        </div>
                        <div class="col-lg-12">
                            <input type="text" class="" placeholder="Agent Name" name="" id="">
                        </div>
                         <div class="col-lg-6">
                            <input type="text" class="" placeholder="Primary State" name="" id="">
                        </div>
                        <div class="col-lg-6">
                            <input type="number" class="" placeholder="Years in Business" name="" id="">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <label>Which Licence Do you have?</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                  <label class="form-check-label" for="flexRadioDefault1">
                                    Life Insurance
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                  <label class="form-check-label" for="flexRadioDefault2">
                                    General Insurance
                                  </label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <h6>Add license details</h6>
                        </div>
                        <div class=" row align-items-center justify-content-center lic-group mt-2">
                            <div class="col-lg-6">
                            <input type="text" class="" placeholder="License Number" name="" id="">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="" placeholder="Company Name" name="" id="">
                        </div>
                        <div class="col-lg-12">
                            <button class="w-auto btn ps-3 pe-3">+ Add more</button>
                        </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <button type="submit" class="btn">Signup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
 
<?php include('includes/footer.php');?>
