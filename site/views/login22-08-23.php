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

form.login-form input:focus{
    border-color: var(--altcolor)  ;
    box-shadow: none;
    outline: 0;
    
}

form.login-form input[type="radio"] {
    width: auto;
    padding: 10px;
    margin-right: 10px;
}

.form-check {

    margin-right: 20px;
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
</style>
<section class="pt-3 pb-3">
    <div class="container ">
        <div class="row justify-content-center align-items-center h-vh">
            <div class="col-lg-5">
                <form class="login-form">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3>Agentix Login</h3>
                            <p>Please enter correct details to login</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" class="" placeholder="Enter Email Id" name="" id="">
                        </div>
                        <div class="col-lg-12">
                            <input type="password" class="" placeholder="Enter password" name="" id="">
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
 
<?php include('includes/footer.php');?>
