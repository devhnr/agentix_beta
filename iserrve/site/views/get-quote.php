<?php include("includes/header.php"); ?>
<style>
     .margin-bottom-20px{
         margin-bottom:20px;
    }

.v-tooltip {
  position: relative;
  display: inline-block;

}

button.whatsapp-login i {
    font-size: 26px;
    vertical-align: middle;
    margin-right: 9px;
}

button.whatsapp-login {
    margin: 20px 0;
    outline: none;
    border: none;
    padding: 10px 24px;
    background: #25D366;
    color: #fff;
    font-weight: 400;
    font-family: 'Poppins', sans-serif;
    /* border-radius: 50px; */
    font-size: 13px;
}

.v-tooltip .v-tooltiptext {
    visibility: hidden;
    width: 320px;
    background-color: #1a1b1c;
    color: #fff;
    text-align: justify;
    border-radius: 6px;
    padding: 10px;
    position: absolute;
    z-index: 1;
    top: -100%;
    font-size: 13px;
    /* left: 0%; */
}

.v-tooltip:hover .v-tooltiptext {
  visibility: visible;
}

.v-check{
    margin-right: 30px;
    margin-bottom: 0;
    width: auto;
    }

    img.tte-img {
    width: 42px;
    margin-right: 9px;
}
</style>

<section class="padding-25px-tb bg-light-gray">
    <div class="container">
        <div class="row get-quote align-items-center margin-30px-bottom">
            <div class="col-lg-4">
                <a href="https://www.raghnall.co.in/iserrve" class="v-btn">BACK TO HOME</a>
            </div>
            <div class="col-lg-4 text-center">
                <h1 class="alt-font font-weight-700">Get <span class="text-blue1">Quote</span></h1>
            </div>
            <div class="col-lg-4">
                <button href="#" class="expert-btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                   <img class="tte-img" src="<?php echo $base_url_views?>img/avatar.png" alt="">
                    <span>
                    <span class="ex-btn-title">Need Help?</span>
                    <br>
                    <span class="ex-main">Talk to Our Expert</span>
                    </span>
                </button>
            </div>

        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 bg-white">
                <form id="regForm" role="regForm" method="post" action="<?=base_url()?>home/register">

    <INPUT TYPE="hidden" NAME="action" VALUE="verifyyourself11">
    <INPUT TYPE="hidden" name="ri_redirect" value="1">
    <INPUT TYPE="hidden" NAME="user_id" VALUE="<?php echo $this->session->userdata('userid');?>">
                    <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-bottom:30px; width: 100%">
    <span class="s-count text-center ">1</span>
    <span class="step active" id="step1"></span>
     <span class="s-count text-center">2</span>
    <span class="step" id="step2"></span>
     <span class="s-count text-center">3</span>
    <span class="step" id="step3"></span>
     <span class="s-count text-center">4</span>
    <span class="step" id="step4"></span>
    <span class="s-count text-center">5</span>
        <span class="step" id="step5"></span>
                    </div>

  <!-- One "tab" for each step in the form: -->
  <!--<div class="tab" id="step1">
      <div class="row justify-content-center">
          <div class="col-lg-12 text-center margin-20px-bottom">
              <h4>Tell us About your team</h4>
          </div>
          <div class="col-lg-6">
              <!--<input placeholder="Location" class="text-extra-dark-gray" name="location">
                  <select class="radio-bg1 box-shadow form-select"   aria-label="Default select example">
      <option selected>Select Location</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
          </div>

            <div class="col-lg-6">
                          <select class="form-select radio-bg1" aria-label="Default select example">
      <option selected>Average Age Of Employees</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
             </div>
             <div class="col-lg-12 text-center ">
              <span class="text-extra-dark-gray font-weight-700">Coverage for</span>
              </div>
            <div class="col-lg-6  margin-10px-bottom">
                <div class="radio-bg box-shadow">
                    <input id="radio-1" class="radio-custom" name="radio-group" type="radio" >
                <label for="radio-1" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-user text-blue1"></i> Employee Only</label>
                </div>

            </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-2" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-2" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse & Children</label>
            </div>
        </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-3" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-3" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse, Children & Parents</label>
            </div>
        </div>
          </div>
      </div>-->


  <!--<div class="tab">


     <div class="col-lg-12 text-center ">
              <h6>Coverage For</h6>
          </div>
               <div class="row">
            <div class="col-lg-6  margin-10px-bottom">
                <div class="radio-bg box-shadow">
                    <input id="radio-01" class="radio-custom"   name="radio-group" type="radio" >
                <label for="radio-01" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-user text-blue1"></i> Employee Only</label>
                </div>

            </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow position-relative">
            <input id="radio-02" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-02" class="new-display radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse & Children

            </label>
                <span class="recom-sec">(Recommended)</span>
            </div>
        </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-03" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-03" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse, Children & Parents</label>
            </div>
        </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-04" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-04" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse, Children & Parents</label>
            </div>
        </div>
          </div>
          </div>-->

                    <div class="tab1">

                        <div class="row">

                                   <span class="text-extra-dark-gray font-weight-700 text-center margin-bottom-20px">Tell Us About Your Team</span>
               <div class="col-lg-6">

                  <input placeholder="Enter Your Company Name" class="radio-bg1 form-control" id="company" name="company">
          </div>
                            <div class="col-lg-6">

                  <input placeholder="Enter Work Email Id" type="email" class="radio-bg1 form-control" id="email" name="email">
          </div>
              <div class="col-lg-6">
                          <input placeholder="Enter No. of Employees" type="number" class="radio-bg1 form-control" id="no_emp" name="no_emp">
             </div>
                 <div class="col-lg-6">
                          <input placeholder="Enter Your Name" class="radio-bg1 form-control" id="name" name="name">
             </div>
                            </div>

      <div class="row">
               <div class="col-lg-6">

                  <select class="radio-bg1 box-shadow form-select"   aria-label="Default select example" id="location" name="location">
      <option value="">Select Location</option>
					  <option value="MumbaiCity">Mumbai</option>
					  <option value="NewDelhi">New Delhi</option>
					   <option value="BangaloreUrban">Bangalore</option>
					   <option value="Hyderabad">Hyderabad</option>
					  <option value="Ahmedabad">Ahmedabad</option>
					  <option value="Chandigarh">Chandigarh</option>
					  <option value="Chennai">Chennai</option>
					  <option value="Pune">Pune</option>
					  <option value="Kolkata">Kolkata</option>
					  <option value="Kolkata">Kochi</option>
					  <option value="Indore">Indore</option>
     <option value="Adilabad">Adilabad</option> <option value="Agra">Agra</option>  <option value="Ahmednagar">Ahmednagar</option> <option value="Aizawl">Aizawl</option> <option value="Ajitgarh(Mohali)">Ajitgarh (Mohali)</option> <option value="Ajmer">Ajmer</option> <option value="Akola">Akola</option> <option value="Alappuzha">Alappuzha</option> <option value="Aligarh">Aligarh</option> <option value="Alirajpur">Alirajpur</option> <option value="Allahabad">Allahabad</option> <option value="Almora">Almora</option> <option value="Alwar">Alwar</option> <option value="Ambala">Ambala</option> <option value="AmbedkarNagar">Ambedkar Nagar</option> <option value="Amravati">Amravati</option> <option value="Amrelidistrict">Amreli district</option> <option value="Amritsar">Amritsar</option> <option value="Anand">Anand</option> <option value="Anantapur">Anantapur</option> <option value="Anantnag">Anantnag</option> <option value="Angul">Angul</option> <option value="Anjaw">Anjaw</option> <option value="Anuppur">Anuppur</option> <option value="Araria">Araria</option> <option value="Ariyalur">Ariyalur</option> <option value="Arwal">Arwal</option> <option value="AshokNagar">Ashok Nagar</option> <option value="Auraiya">Auraiya</option> <option value="Aurangabad">Aurangabad</option> <option value="Aurangabad">Aurangabad</option> <option value="Azamgarh">Azamgarh</option> <option value="Badgam">Badgam</option> <option value="Bagalkot">Bagalkot</option> <option value="Bageshwar">Bageshwar</option> <option value="Bagpat">Bagpat</option> <option value="Bahraich">Bahraich</option> <option value="Baksa">Baksa</option> <option value="Balaghat">Balaghat</option> <option value="Balangir">Balangir</option> <option value="Balasore">Balasore</option> <option value="Ballia">Ballia</option> <option value="Balrampur">Balrampur</option> <option value="Banaskantha">Banaskantha</option> <option value="Banda">Banda</option> <option value="Bandipora">Bandipora</option> <option value="BangaloreRural">Bangalore Rural</option> <option value="Banka">Banka</option> <option value="Bankura">Bankura</option> <option value="Banswara">Banswara</option> <option value="Barabanki">Barabanki</option> <option value="Baramulla">Baramulla</option> <option value="Baran">Baran</option> <option value="Bardhaman">Bardhaman</option> <option value="Bareilly">Bareilly</option> <option value="Bargarh(Baragarh)">Bargarh (Baragarh)</option> <option value="Barmer">Barmer</option> <option value="Barnala">Barnala</option> <option value="Barpeta">Barpeta</option> <option value="Barwani">Barwani</option> <option value="Bastar">Bastar</option> <option value="Basti">Basti</option> <option value="Bathinda">Bathinda</option> <option value="Beed">Beed</option> <option value="Begusarai">Begusarai</option> <option value="Belgaum">Belgaum</option> <option value="Bellary">Bellary</option> <option value="Betul">Betul</option> <option value="Bhadrak">Bhadrak</option> <option value="Bhagalpur">Bhagalpur</option> <option value="Bhandara">Bhandara</option> <option value="Bharatpur">Bharatpur</option> <option value="Bharuch">Bharuch</option> <option value="Bhavnagar">Bhavnagar</option> <option value="Bhilwara">Bhilwara</option> <option value="Bhind">Bhind</option> <option value="Bhiwani">Bhiwani</option> <option value="Bhojpur">Bhojpur</option> <option value="Bhopal">Bhopal</option> <option value="Bidar">Bidar</option> <option value="Bijapur">Bijapur</option> <option value="Bijapur">Bijapur</option> <option value="Bijnor">Bijnor</option> <option value="Bikaner">Bikaner</option> <option value="Bilaspur">Bilaspur</option> <option value="Bilaspur">Bilaspur</option> <option value="Birbhum">Birbhum</option> <option value="Bishnupur">Bishnupur</option> <option value="Bokaro">Bokaro</option> <option value="Bongaigaon">Bongaigaon</option> <option value="Boudh(Bauda)">Boudh (Bauda)</option> <option value="Budaun">Budaun</option> <option value="Bulandshahr">Bulandshahr</option> <option value="Buldhana">Buldhana</option> <option value="Bundi">Bundi</option> <option value="Burhanpur">Burhanpur</option> <option value="Buxar">Buxar</option> <option value="Cachar">Cachar</option> <option value="CentralDelhi">Central Delhi</option> <option value="Chamarajnagar">Chamarajnagar</option> <option value="Chamba">Chamba</option> <option value="Chamoli">Chamoli</option> <option value="Champawat">Champawat</option> <option value="Champhai">Champhai</option> <option value="Chandauli">Chandauli</option> <option value="Chandel">Chandel</option>  <option value="Chandrapur">Chandrapur</option> <option value="Changlang">Changlang</option> <option value="Chatra">Chatra</option>  <option value="Chhatarpur">Chhatarpur</option> <option value="ChhatrapatiShahujiMaharajNagar"> Chhatrapati Shahuji Maharaj Nagar </option> <option value="Chhindwara">Chhindwara</option> <option value="Chikkaballapur">Chikkaballapur</option> <option value="Chikkamagaluru">Chikkamagaluru</option> <option value="Chirang">Chirang</option> <option value="Chitradurga">Chitradurga</option> <option value="Chitrakoot">Chitrakoot</option> <option value="Chittoor">Chittoor</option> <option value="Chittorgarh">Chittorgarh</option> <option value="Churachandpur">Churachandpur</option> <option value="Churu">Churu</option> <option value="Coimbatore">Coimbatore</option> <option value="CoochBehar">Cooch Behar</option> <option value="Cuddalore">Cuddalore</option> <option value="Cuttack">Cuttack</option> <option value="DadraandNagarHaveli"> Dadra and Nagar Haveli </option> <option value="Dahod">Dahod</option> <option value="DakshinDinajpur">Dakshin Dinajpur</option> <option value="DakshinaKannada">Dakshina Kannada</option> <option value="Daman">Daman</option> <option value="Damoh">Damoh</option> <option value="Dantewada">Dantewada</option> <option value="Darbhanga">Darbhanga</option> <option value="Darjeeling">Darjeeling</option> <option value="Darrang">Darrang</option> <option value="Datia">Datia</option> <option value="Dausa">Dausa</option> <option value="Davanagere">Davanagere</option> <option value="Debagarh(Deogarh)">Debagarh (Deogarh)</option> <option value="Dehradun">Dehradun</option> <option value="Deoghar">Deoghar</option> <option value="Deoria">Deoria</option> <option value="Dewas">Dewas</option> <option value="Dhalai">Dhalai</option> <option value="Dhamtari">Dhamtari</option> <option value="Dhanbad">Dhanbad</option> <option value="Dhar">Dhar</option> <option value="Dharmapuri">Dharmapuri</option> <option value="Dharwad">Dharwad</option> <option value="Dhemaji">Dhemaji</option> <option value="Dhenkanal">Dhenkanal</option> <option value="Dholpur">Dholpur</option> <option value="Dhubri">Dhubri</option> <option value="Dhule">Dhule</option> <option value="DibangValley">Dibang Valley</option> <option value="Dibrugarh">Dibrugarh</option> <option value="DimaHasao">Dima Hasao</option> <option value="Dimapur">Dimapur</option> <option value="Dindigul">Dindigul</option> <option value="Dindori">Dindori</option> <option value="Diu">Diu</option> <option value="Doda">Doda</option> <option value="Dumka">Dumka</option> <option value="Dungapur">Dungapur</option> <option value="Durg">Durg</option> <option value="EastChamparan">East Champaran</option> <option value="EastDelhi">East Delhi</option> <option value="EastGaroHills">East Garo Hills</option> <option value="EastKhasiHills">East Khasi Hills</option> <option value="EastSiang">East Siang</option> <option value="EastSikkim">East Sikkim</option> <option value="EastSinghbhum">East Singhbhum</option> <option value="Eluru">Eluru</option> <option value="Ernakulam">Ernakulam</option> <option value="Erode">Erode</option> <option value="Etah">Etah</option> <option value="Etawah">Etawah</option> <option value="Faizabad">Faizabad</option> <option value="Faridabad">Faridabad</option> <option value="Faridkot">Faridkot</option> <option value="Farrukhabad">Farrukhabad</option> <option value="Fatehabad">Fatehabad</option> <option value="FatehgarhSahib">Fatehgarh Sahib</option> <option value="Fatehpur">Fatehpur</option> <option value="Fazilka">Fazilka</option> <option value="Firozabad">Firozabad</option> <option value="Firozpur">Firozpur</option> <option value="Gadag">Gadag</option> <option value="Gadchiroli">Gadchiroli</option> <option value="Gajapati">Gajapati</option> <option value="Ganderbal">Ganderbal</option> <option value="Gandhinagar">Gandhinagar</option> <option value="Ganganagar">Ganganagar</option> <option value="Ganjam">Ganjam</option> <option value="Garhwa">Garhwa</option> <option value="GautamBuddhNagar">Gautam Buddh Nagar</option> <option value="Gaya">Gaya</option> <option value="Ghaziabad">Ghaziabad</option> <option value="Ghazipur">Ghazipur</option> <option value="Giridih">Giridih</option> <option value="Goalpara">Goalpara</option> <option value="Godda">Godda</option> <option value="Golaghat">Golaghat</option> <option value="Gonda">Gonda</option> <option value="Gondia">Gondia</option> <option value="Gopalganj">Gopalganj</option> <option value="Gorakhpur">Gorakhpur</option> <option value="Gulbarga">Gulbarga</option> <option value="Gumla">Gumla</option> <option value="Guna">Guna</option> <option value="Guntur">Guntur</option> <option value="Gurdaspur">Gurdaspur</option> <option value="Gurgaon">Gurgaon</option> <option value="Gwalior">Gwalior</option> <option value="Hailakandi">Hailakandi</option> <option value="Hamirpur">Hamirpur</option> <option value="Hamirpur">Hamirpur</option> <option value="Hanumangarh">Hanumangarh</option> <option value="Harda">Harda</option> <option value="Hardoi">Hardoi</option> <option value="Haridwar">Haridwar</option> <option value="Hassan">Hassan</option> <option value="Haveridistrict">Haveri district</option> <option value="Hazaribag">Hazaribag</option> <option value="Hingoli">Hingoli</option>
                      <option value="Hissar">Hissar</option>
                      <option value="Hooghly">Hooghly</option> <option value="Hoshangabad">Hoshangabad</option> <option value="Hoshiarpur">Hoshiarpur</option> <option value="Howrah">Howrah</option> <option value="Idukki">Idukki</option> <option value="ImphalEast">Imphal East</option> <option value="ImphalWest">Imphal West</option>  <option value="Jabalpur">Jabalpur</option> <option value="Jagatsinghpur">Jagatsinghpur</option> <option value="JaintiaHills">Jaintia Hills</option> <option value="Jaipur">Jaipur</option> <option value="Jaisalmer">Jaisalmer</option> <option value="Jajpur">Jajpur</option> <option value="Jalandhar">Jalandhar</option> <option value="Jalaun">Jalaun</option> <option value="Jalgaon">Jalgaon</option> <option value="Jalna">Jalna</option> <option value="Jalore">Jalore</option> <option value="Jalpaiguri">Jalpaiguri</option> <option value="Jammu">Jammu</option> <option value="Jamnagar">Jamnagar</option> <option value="Jamtara">Jamtara</option> <option value="Jamui">Jamui</option> <option value="Janjgir-Champa">Janjgir-Champa</option> <option value="Jashpur">Jashpur</option> <option value="Jaunpurdistrict">Jaunpur district</option> <option value="Jehanabad">Jehanabad</option> <option value="Jhabua">Jhabua</option> <option value="Jhajjar">Jhajjar</option> <option value="Jhalawar">Jhalawar</option> <option value="Jhansi">Jhansi</option> <option value="Jharsuguda">Jharsuguda</option> <option value="Jhunjhunu">Jhunjhunu</option> <option value="Jind">Jind</option> <option value="Jodhpur">Jodhpur</option> <option value="Jorhat">Jorhat</option> <option value="Junagadh">Junagadh</option> <option value="JyotibaPhuleNagar">Jyotiba Phule Nagar</option> <option value="Kabirdham(formerlyKawardha)"> Kabirdham (formerly Kawardha) </option> <option value="Kadapa">Kadapa</option> <option value="Kaimur">Kaimur</option> <option value="Kaithal">Kaithal</option> <option value="Kakinada">Kakinada</option> <option value="Kalahandi">Kalahandi</option> <option value="Kamrup">Kamrup</option> <option value="KamrupMetropolitan">Kamrup Metropolitan</option> <option value="Kanchipuram">Kanchipuram</option> <option value="Kandhamal">Kandhamal</option> <option value="Kangra">Kangra</option> <option value="Kanker">Kanker</option> <option value="Kannauj">Kannauj</option> <option value="Kannur">Kannur</option> <option value="Kanpur">Kanpur</option> <option value="KanshiRamNagar">Kanshi Ram Nagar</option> <option value="Kanyakumari">Kanyakumari</option> <option value="Kapurthala">Kapurthala</option> <option value="Karaikal">Karaikal</option> <option value="Karauli">Karauli</option> <option value="KarbiAnglong">Karbi Anglong</option> <option value="Kargil">Kargil</option> <option value="Karimganj">Karimganj</option> <option value="Karimnagar">Karimnagar</option> <option value="Karnal">Karnal</option> <option value="Karur">Karur</option> <option value="Kasaragod">Kasaragod</option> <option value="Kathua">Kathua</option> <option value="Katihar">Katihar</option> <option value="Katni">Katni</option> <option value="Kaushambi">Kaushambi</option> <option value="Kendrapara">Kendrapara</option> <option value="Kendujhar(Keonjhar)"> Kendujhar (Keonjhar) </option> <option value="Khagaria">Khagaria</option> <option value="Khammam">Khammam</option> <option value="Khandwa(EastNimar)">Khandwa (East Nimar)</option> <option value="Khargone(WestNimar)"> Khargone (West Nimar) </option> <option value="Kheda">Kheda</option> <option value="Khordha">Khordha</option> <option value="Khowai">Khowai</option> <option value="Khunti">Khunti</option> <option value="Kinnaur">Kinnaur</option> <option value="Kishanganj">Kishanganj</option> <option value="Kishtwar">Kishtwar</option> <option value="Kodagu">Kodagu</option> <option value="Koderma">Koderma</option> <option value="Kohima">Kohima</option> <option value="Kokrajhar">Kokrajhar</option> <option value="Kolar">Kolar</option> <option value="Kolasib">Kolasib</option> <option value="Kolhapur">Kolhapur</option>  <option value="Kollam">Kollam</option> <option value="Koppal">Koppal</option> <option value="Koraput">Koraput</option> <option value="Korba">Korba</option> <option value="Koriya">Koriya</option> <option value="Kota">Kota</option> <option value="Kottayam">Kottayam</option> <option value="Kozhikode">Kozhikode</option> <option value="Krishna">Krishna</option> <option value="Kulgam">Kulgam</option> <option value="Kullu">Kullu</option> <option value="Kupwara">Kupwara</option> <option value="Kurnool">Kurnool</option> <option value="Kurukshetra">Kurukshetra</option> <option value="KurungKumey">Kurung Kumey</option> <option value="Kushinagar">Kushinagar</option> <option value="Kutch">Kutch</option> <option value="LahaulandSpiti">Lahaul and Spiti</option> <option value="Lakhimpur">Lakhimpur</option> <option value="LakhimpurKheri">Lakhimpur Kheri</option> <option value="Lakhisarai">Lakhisarai</option> <option value="Lalitpur">Lalitpur</option> <option value="Latehar">Latehar</option> <option value="Latur">Latur</option> <option value="Lawngtlai">Lawngtlai</option> <option value="Leh">Leh</option> <option value="Lohardaga">Lohardaga</option> <option value="Lohit">Lohit</option> <option value="LowerDibangValley">Lower Dibang Valley</option> <option value="LowerSubansiri">Lower Subansiri</option> <option value="Lucknow">Lucknow</option> <option value="Ludhiana">Ludhiana</option> <option value="Lunglei">Lunglei</option> <option value="Madhepura">Madhepura</option> <option value="Madhubani">Madhubani</option> <option value="Madurai">Madurai</option> <option value="MahamayaNagar">Mahamaya Nagar</option> <option value="Maharajganj">Maharajganj</option> <option value="Mahasamund">Mahasamund</option> <option value="Mahbubnagar">Mahbubnagar</option> <option value="Mahe">Mahe</option> <option value="Mahendragarh">Mahendragarh</option> <option value="Mahoba">Mahoba</option> <option value="Mainpuri">Mainpuri</option> <option value="Malappuram">Malappuram</option> <option value="Maldah">Maldah</option> <option value="Malkangiri">Malkangiri</option> <option value="Mamit">Mamit</option> <option value="Mandi">Mandi</option> <option value="Mandla">Mandla</option> <option value="Mandsaur">Mandsaur</option> <option value="Mandya">Mandya</option> <option value="Mansa">Mansa</option> <option value="Marigaon">Marigaon</option> <option value="Mathura">Mathura</option> <option value="Mau">Mau</option> <option value="Mayurbhanj">Mayurbhanj</option> <option value="Medak">Medak</option> <option value="Meerut">Meerut</option> <option value="Mehsana">Mehsana</option> <option value="Mewat">Mewat</option> <option value="Mirzapur">Mirzapur</option> <option value="Moga">Moga</option> <option value="Mokokchung">Mokokchung</option> <option value="Mon">Mon</option> <option value="Moradabad">Moradabad</option> <option value="Morena">Morena</option> <option value="Munger">Munger</option> <option value="Murshidabad">Murshidabad</option> <option value="Muzaffarnagar">Muzaffarnagar</option> <option value="Muzaffarpur">Muzaffarpur</option> <option value="Mysore">Mysore</option> <option value="Nabarangpur">Nabarangpur</option> <option value="Nadia">Nadia</option> <option value="Nagaon">Nagaon</option> <option value="Nagapattinam">Nagapattinam</option> <option value="Nagaur">Nagaur</option> <option value="Nagpur">Nagpur</option> <option value="Nainital">Nainital</option> <option value="Nalanda">Nalanda</option> <option value="Nalbari">Nalbari</option> <option value="Nalgonda">Nalgonda</option> <option value="Namakkal">Namakkal</option> <option value="Nanded">Nanded</option> <option value="Nandurbar">Nandurbar</option> <option value="Narayanpur">Narayanpur</option> <option value="Narmada">Narmada</option> <option value="Narsinghpur">Narsinghpur</option> <option value="Nashik">Nashik</option> <option value="Navsari">Navsari</option> <option value="Nawada">Nawada</option> <option value="Nawanshahr">Nawanshahr</option> <option value="Nayagarh">Nayagarh</option> <option value="Neemuch">Neemuch</option> <option value="Nellore">Nellore</option>  <option value="Nilgiris">Nilgiris</option> <option value="Nizamabad">Nizamabad</option> <option value="North24Parganas">North 24 Parganas</option> <option value="NorthDelhi">North Delhi</option> <option value="NorthEastDelhi">North East Delhi</option> <option value="NorthGoa">North Goa</option> <option value="NorthSikkim">North Sikkim</option> <option value="NorthTripura">North Tripura</option> <option value="NorthWestDelhi">North West Delhi</option> <option value="Nuapada">Nuapada</option> <option value="Ongole">Ongole</option> <option value="Osmanabad">Osmanabad</option> <option value="Pakur">Pakur</option> <option value="Palakkad">Palakkad</option> <option value="Palamu">Palamu</option> <option value="Pali">Pali</option> <option value="Palwal">Palwal</option> <option value="Panchkula">Panchkula</option> <option value="Panchmahal">Panchmahal</option> <option value="PanchsheelNagardistrict(Hapur)"> Panchsheel Nagar district (Hapur) </option> <option value="Panipat">Panipat</option> <option value="Panna">Panna</option> <option value="PapumPare">Papum Pare</option> <option value="Parbhani">Parbhani</option> <option value="PaschimMedinipur">Paschim Medinipur</option> <option value="Patan">Patan</option> <option value="Pathanamthitta">Pathanamthitta</option> <option value="Pathankot">Pathankot</option> <option value="Patiala">Patiala</option> <option value="Patna">Patna</option> <option value="PauriGarhwal">Pauri Garhwal</option> <option value="Perambalur">Perambalur</option> <option value="Phek">Phek</option> <option value="Pilibhit">Pilibhit</option> <option value="Pithoragarh">Pithoragarh</option> <option value="Pondicherry">Pondicherry</option> <option value="Poonch">Poonch</option> <option value="Porbandar">Porbandar</option> <option value="Pratapgarh">Pratapgarh</option> <option value="Pratapgarh">Pratapgarh</option> <option value="Pudukkottai">Pudukkottai</option> <option value="Pulwama">Pulwama</option>  <option value="PurbaMedinipur">Purba Medinipur</option> <option value="Puri">Puri</option> <option value="Purnia">Purnia</option> <option value="Purulia">Purulia</option> <option value="Raebareli">Raebareli</option> <option value="Raichur">Raichur</option> <option value="Raigad">Raigad</option> <option value="Raigarh">Raigarh</option> <option value="Raipur">Raipur</option> <option value="Raisen">Raisen</option> <option value="Rajauri">Rajauri</option> <option value="Rajgarh">Rajgarh</option> <option value="Rajkot">Rajkot</option> <option value="Rajnandgaon">Rajnandgaon</option> <option value="Rajsamand">Rajsamand</option> <option value="RamabaiNagar(KanpurDehat)"> Ramabai Nagar (Kanpur Dehat) </option> <option value="Ramanagara">Ramanagara</option> <option value="Ramanathapuram">Ramanathapuram</option> <option value="Ramban">Ramban</option> <option value="Ramgarh">Ramgarh</option> <option value="Rampur">Rampur</option> <option value="Ranchi">Ranchi</option> <option value="Ratlam">Ratlam</option> <option value="Ratnagiri">Ratnagiri</option> <option value="Rayagada">Rayagada</option> <option value="Reasi">Reasi</option> <option value="Rewa">Rewa</option> <option value="Rewari">Rewari</option> <option value="RiBhoi">Ri Bhoi</option> <option value="Rohtak">Rohtak</option> <option value="Rohtas">Rohtas</option> <option value="Rudraprayag">Rudraprayag</option> <option value="Rupnagar">Rupnagar</option> <option value="Sabarkantha">Sabarkantha</option> <option value="Sagar">Sagar</option> <option value="Saharanpur">Saharanpur</option> <option value="Saharsa">Saharsa</option> <option value="Sahibganj">Sahibganj</option> <option value="Saiha">Saiha</option> <option value="Salem">Salem</option> <option value="Samastipur">Samastipur</option> <option value="Samba">Samba</option> <option value="Sambalpur">Sambalpur</option> <option value="Sangli">Sangli</option> <option value="Sangrur">Sangrur</option> <option value="SantKabirNagar">Sant Kabir Nagar</option> <option value="SantRavidasNagar">Sant Ravidas Nagar</option> <option value="Saran">Saran</option> <option value="Satara">Satara</option> <option value="Satna">Satna</option> <option value="SawaiMadhopur">Sawai Madhopur</option> <option value="Sehore">Sehore</option> <option value="Senapati">Senapati</option> <option value="Seoni">Seoni</option> <option value="SeraikelaKharsawan">Seraikela Kharsawan</option> <option value="Serchhip">Serchhip</option> <option value="Shahdol">Shahdol</option> <option value="Shahjahanpur">Shahjahanpur</option> <option value="Shajapur">Shajapur</option> <option value="Shamli">Shamli</option> <option value="Sheikhpura">Sheikhpura</option> <option value="Sheohar">Sheohar</option> <option value="Sheopur">Sheopur</option> <option value="Shimla">Shimla</option> <option value="Shimoga">Shimoga</option> <option value="Shivpuri">Shivpuri</option> <option value="Shopian">Shopian</option> <option value="Shravasti">Shravasti</option> <option value="Sibsagar">Sibsagar</option> <option value="Siddharthnagar">Siddharthnagar</option> <option value="Sidhi">Sidhi</option> <option value="Sikar">Sikar</option> <option value="Simdega">Simdega</option> <option value="Sindhudurg">Sindhudurg</option> <option value="Singrauli">Singrauli</option> <option value="Sirmaur">Sirmaur</option> <option value="Sirohi">Sirohi</option> <option value="Sirsa">Sirsa</option> <option value="Sitamarhi">Sitamarhi</option> <option value="Sitapur">Sitapur</option> <option value="Sivaganga">Sivaganga</option> <option value="Siwan">Siwan</option> <option value="Solan">Solan</option> <option value="Solapur">Solapur</option> <option value="Sonbhadra">Sonbhadra</option> <option value="Sonipat">Sonipat</option> <option value="Sonitpur">Sonitpur</option> <option value="South24Parganas">South 24 Parganas</option> <option value="SouthDelhi">South Delhi</option> <option value="SouthGaroHills">South Garo Hills</option> <option value="SouthGoa">South Goa</option> <option value="SouthSikkim">South Sikkim</option> <option value="SouthTripura">South Tripura</option> <option value="SouthWestDelhi">South West Delhi</option> <option value="SriMuktsarSahib">Sri Muktsar Sahib</option> <option value="Srikakulam">Srikakulam</option> <option value="Srinagar">Srinagar</option> <option value="Subarnapur(Sonepur)"> Subarnapur (Sonepur) </option> <option value="Sultanpur">Sultanpur</option> <option value="Sundergarh">Sundergarh</option> <option value="Supaul">Supaul</option> <option value="Surat">Surat</option> <option value="Surendranagar">Surendranagar</option> <option value="Surguja">Surguja</option> <option value="Tamenglong">Tamenglong</option> <option value="TarnTaran">Tarn Taran</option> <option value="Tawang">Tawang</option> <option value="TehriGarhwal">Tehri Garhwal</option> <option value="Thane">Thane</option> <option value="Thanjavur">Thanjavur</option> <option value="TheDangs">The Dangs</option> <option value="Theni">Theni</option> <option value="Thiruvananthapuram">Thiruvananthapuram</option> <option value="Thoothukudi">Thoothukudi</option> <option value="Thoubal">Thoubal</option> <option value="Thrissur">Thrissur</option> <option value="Tikamgarh">Tikamgarh</option> <option value="Tinsukia">Tinsukia</option> <option value="Tirap">Tirap</option> <option value="Tiruchirappalli">Tiruchirappalli</option> <option value="Tirunelveli">Tirunelveli</option> <option value="Tirupur">Tirupur</option> <option value="Tiruvallur">Tiruvallur</option> <option value="Tiruvannamalai">Tiruvannamalai</option> <option value="Tiruvarur">Tiruvarur</option> <option value="Tonk">Tonk</option> <option value="Tuensang">Tuensang</option> <option value="Tumkur">Tumkur</option> <option value="Udaipur">Udaipur</option> <option value="Udalguri">Udalguri</option> <option value="UdhamSinghNagar">Udham Singh Nagar</option> <option value="Udhampur">Udhampur</option> <option value="Udupi">Udupi</option> <option value="Ujjain">Ujjain</option> <option value="Ukhrul">Ukhrul</option> <option value="Umaria">Umaria</option> <option value="Una">Una</option> <option value="Unnao">Unnao</option> <option value="UpperSiang">Upper Siang</option> <option value="UpperSubansiri">Upper Subansiri</option> <option value="UttarDinajpur">Uttar Dinajpur</option> <option value="UttaraKannada">Uttara Kannada</option> <option value="Uttarkashi">Uttarkashi</option> <option value="Vadodara">Vadodara</option> <option value="Vaishali">Vaishali</option> <option value="Valsad">Valsad</option> <option value="Varanasi">Varanasi</option> <option value="Vellore">Vellore</option> <option value="Vidisha">Vidisha</option> <option value="Viluppuram">Viluppuram</option> <option value="Virudhunagar">Virudhunagar</option> <option value="Visakhapatnam">Visakhapatnam</option> <option value="Vizianagaram">Vizianagaram</option> <option value="Vyara">Vyara</option> <option value="Warangal">Warangal</option> <option value="Wardha">Wardha</option> <option value="Washim">Washim</option> <option value="Wayanad">Wayanad</option> <option value="WestChamparan">West Champaran</option> <option value="WestDelhi">West Delhi</option> <option value="WestGaroHills">West Garo Hills</option> <option value="WestKameng">West Kameng</option> <option value="WestKhasiHills">West Khasi Hills</option> <option value="WestSiang">West Siang</option> <option value="WestSikkim">West Sikkim</option> <option value="WestSinghbhum">West Singhbhum</option> <option value="WestTripura">West Tripura</option> <option value="Wokha">Wokha</option> <option value="Yadgir">Yadgir</option> <option value="YamunaNagar">Yamuna Nagar</option> <option value="Yanam">Yanam</option> <option value="Yavatmal">Yavatmal</option> <option value="Zunheboto">Zunheboto</option>
    </select>
          </div>
              <div class="col-lg-6">
                          <select class="form-select radio-bg1" aria-label="Default select example" id="age_emp" name="age_emp">
      <option value="">Average Age Of Employees</option>
      <option value="19-24 Years">19-24 Years</option>
      <option value="25-34 Years">25-34 Years</option>
      <option value="35-44 Years">35-44 Years</option>
                              <option value=">45 Years">>45 Years</option>
    </select>
             </div>

                        </div>

                        <div class="row">


              <span class="text-extra-dark-gray font-weight-700 text-center">Coverage for</span>

              <div class="col-lg-6  margin-10px-bottom">
                <div class="radio-bg box-shadow">
                    <input id="radio-1" class="radio-custom" name="radio_group" type="radio" id="coverage" value="1" checked>
                <label for="radio-1" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-user text-blue1"></i> Employee Only</label>
                </div>

            </div>
       <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow position-relative">
            <input id="radio-2" class="radio-custom" name="radio_group" type="radio" id="coverage" value="2">
            <label for="radio-2" class="new-display radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse & Children

            </label>
                <span class="recom-sec">(Recommended)</span>
            </div>
        </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-3" class="radio-custom" name="radio_group" type="radio" id="coverage" value="3">
            <label for="radio-3" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse, Children & Parents</label>
            </div>
        </div>



                        </div>

                        <div class="row">

                            <div class="col-md-12" style=" margin-top: 20px;">
                    <span id="tab1_error" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="tab1_success" class="successmain alert-message"
                        style="display:none;"></span>
                </div>

                        <div class="col-lg-12">
                            <div class="bg-white">

                       <div style="float:right;">


                        <!--  <button type="button" class="v-btn2  margin-20px-bottom" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
                            <button type="button" class="v-btn  margin-20px-bottom phn_error" id="nextBtn12" onclick="get_hide_show(2);">Next</button>
                        </div>
                    </div>
                </div>
            </div>


                    </div>




                    <div class="tab2" style="display:none">


     <div class="col-lg-12 text-center ">
              <h6>Coverage For</h6>
          </div>
               <div class="row">
            <div class="col-lg-6  margin-10px-bottom">
                <div class="radio-bg box-shadow">
                    <input id="radio-01" class="radio-custom" name="sum_insurance" type="radio" required="required" value="100000" />
                <label for="radio-01" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-user text-blue1"></i> 1 Lacs</label>
                </div>

            </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow position-relative">
            <input id="radio-02" class="radio-custom" name="sum_insurance" type="radio" required="required" value="300000" />
            <label for="radio-02" class="new-display radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> 3 Lacs

            </label>
                <span class="recom-sec">(Recommended)</span>
            </div>
        </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-03" class="radio-custom" name="sum_insurance" type="radio" required="required" value="500000" />
            <label for="radio-03" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> 5 Lacs</label>
            </div>
        </div>
        <!--<div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-04" class="radio-custom" name="radio-group" type="radio" required="required" />
            <label for="radio-04" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Other - PL Specify</label>
            </div>
        </div>-->
          </div>


             <div class="row">

                            <div class="col-md-12" style=" margin-top: 20px;">
                    <span id="tab2_error" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="tab2_success" class="successmain alert-message"
                        style="display:none;"></span>
                </div>

                        <div class="col-lg-12">
                            <div class="bg-white">

                       <div style="float:right;">


                            <button type="button" class="v-btn2  margin-20px-bottom" id="prevBtn" onclick="get_hide_show(1)">Previous</button>
                            <button type="button" class="v-btn  margin-20px-bottom phn_error" id="nextBtn12" onclick="get_hide_show(3);">Next</button>
                        </div>
                    </div>
                </div>
            </div>


          </div>



  <div class="tab3" id="hide" style="display:none;">
      <div class="row">
        <div class="col-lg-8 average--section">
          <div class="col-lg-12  ">
              <h6>Enter Your Contact Details</h6>
          </div>

            <div class="col-lg-12">
                <?php $this->session->set_userdata('mobileOtp',rand (1000,9999)); ?>
                <input placeholder="Enter Your Number" name="phone" id="phone" type="tel" class="form-control">
            </div>
            <div class="col-lg-12">
              <div class="col-lg-6  margin-10px-bottom">
                  <div class="radio-bg box-shadow">
                      <input id="radio-11" class="radio-custom" name="opt_group1" type="radio" id="get_otp" value="1">
                  <label for="radio-11" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-user text-blue1"></i>Get Otp</label>
                  </div>
              </div>
                <div class="col-lg-6  margin-10px-bottom">
                  <!-- <div class="radio-bg box-shadow">
                      <input id="radio-12" class="radio-custom" name="opt_group1" type="radio" id="verify_with_whatsapp" value="2">
                  <label for="radio-12" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-user text-blue1"></i>Verify With Whats'up</label>
                  </div> -->
                 <button type="button" class="whatsapp-login"> <i class="fa fa-whatsapp"></i> Sign up with Whatsapp</button>
              </div>
            </div>
            <p>We will only use it to verify number. No Spam, we promise!</p>
            <div class="d-flex align-items-center">
            <input type="checkbox" class="v-check" name="termscondition" id="termscondition"><span>I Confirm That I Have Read, Understood And Agree To The Terms & Conditions.
            <span class="v-tooltip"><i class="fas fa-info-circle text-blue1"></i>
  <span class="v-tooltiptext">I hereby authorize Raghnall Broking and Risk Management Pvt. Ltd. and all of its affiliates, group companies, and related parties to access the details such as my name, address, telephone number, e-mail address, birth date, and/or anniversary date shared by me, and contact me to provide information on the various products and services offered. I understand that this consent will override my NDNC registration if any.  I also understand that if at any point in time I wish to stop receiving such communications from Raghnall, I can withdraw my consent at www.raghnall.co.in.</span>

</span>
                </div>


            </p>
      <!-- <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
      <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p> -->
      </div>

      </div>

      <div class="row">

                            <div class="col-md-12" style=" margin-top: 20px;">
                    <span id="tab3_error" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="tab3_success" class="successmain alert-message"
                        style="display:none;"></span>
                </div>

                        <div class="col-lg-12">
                            <div class="bg-white">

                       <div style="float:right;">


                            <button type="button" class="v-btn2  margin-20px-bottom" id="prevBtn" onclick="get_hide_show(2)">Previous</button>
                            <button type="button" class="v-btn  margin-20px-bottom phn_error" id="nextBtn12" onclick="get_hide_show(4);">Next</button>
                        </div>
                    </div>
                </div>
            </div>

  </div>
  <div class="tab4" style="display:none">   <div class="row">
    <div class="col-lg-8 average--section">
    <!--  <p><input placeholder="Enter Your Mobile" type="tel" name="dd" value="+91-8898989899" class="form-control"></p> -->

      <!-- <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
      <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p> -->
      </div>
      </div>
      <div class="row" id="show">
          <div class="col-lg-12">
      <div class=" height-100 d-flex justify-content-center align-items-center">
        <div class="position-relative">

           <div class="card p-2 text-center">
             <h6>Please enter the one time password <br> to verify your account</h6>
             <div> <span>A code has been sent to</span> <small>*******<span id="last4_digits"></span></small>

             </div> <div id="otpz" class="inputs d-flex flex-row justify-content-center mt-2">

              <input class="m-2 text-center form-control rounded" type="text" id="verify_mobile_otp" name="verify_mobile_otp" />

             <!--  <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" />
              <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" />
               <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" />
               <input class="m-2 text-center form-control rounded" type="text" id="fifth" maxlength="1" />
                <input class="m-2 text-center form-control rounded" type="text" id="sixth" maxlength="1" />  -->
              </div>
              <input type="hidden" value="0" name="isverified_mobile" id="isverified_mobile">
              <div class="mt-4">

                <div class="col-md-12">
                    <span id="contact_error1" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="contact_success1" class="successmain alert-message"
                        style="display:none;"></span>
                </div>
                <!-- <button class="btn btn-danger px-4" onclick="verify_mobileOtp();return false;">Validate</button>  -->
              </div>
            </div>
             <div class="card-2">
              <div class="content d-flex justify-content-center align-items-center">
                <span>Didn't get the code</span>
                <a href="#" class="text-decoration-none ms-3">Resend(1/3)</a>
              </div>
            </div>
          </div>
</div>
</div>
      </div>
        <div class="row">

                            <div class="col-md-12" style=" margin-top: 20px;">
                    <span id="tab4_error" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="tab4_success" class="successmain alert-message"
                        style="display:none;"></span>
                </div>

                        <div class="col-lg-12">
                            <div class="bg-white">

                       <div style="float:right;">


                            <button type="button" class="v-btn2  margin-20px-bottom" id="prevBtn" onclick="get_hide_show(3)">Previous</button>
                            <button type="button" class="v-btn  margin-20px-bottom phn_error" id="nextBtn12" onclick="get_hide_show(5);">Next</button>
                        </div>
                    </div>
                </div>
            </div>
  </div>





    <div class="tab5" style="display:none">


      <div class="new-input new-padding box-shadow">

            <div class="container">
            <div class="row">

          <div class="col-lg-12 text-center heading-section-title margin-20px-bottom">
         <h6>Thank You for sharing your details. </h6>
              <h6>Your tentative premium is INR <span id="sum_count">xxx</span> </h6>

			  <p>We will get back to you soon with detailed quotes!</p>
          </div>
                <div class="col-lg-12 col-12 padding-30px-bottom order-lg-2">
                    <div class="accountdetails">
                        <div class="row padding-30px-bottom">
                            <div class="col-sm-12">
                                <div class="displayfields">
                                    <h6 class="text-black">Plan Details<!-- <span><a href="#step1"><u>Edit</u></a></span>--></h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="displayfields">
                                    <h4>Location</h4>
                                    <p id="location_print"></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="displayfields">
                                    <h4>Coverage Type</h4>
                                    <p id="cov_print"></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="displayfields">
                                    <h4>Sum Insured</h4>
                                    <p id="sum_print"></p>
                                </div>
                            </div>

                            <input type="hidden" name="product_id" id="product_id" value="1">
                              <!--<div class="col-sm-4">
                                <div class="displayfields">
                                    <h4>Room Rent Cap</h4>
                                    <p>1% of SI for Normal and 2% of Si for ICU</p>
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="displayfields">
                                    <h4>Maternity Coverage</h4>
                                    <p>Yes</p>
                                </div>
                            </div>-->
                        </div>
                        <div class="d-flex align-items-center">
            <input type="checkbox" class="v-check " name="customize_plan" id="customize_plan" value="0"><span>I would like to customize plan


</span>
                </div>

                     <!--   <div class="row">
                            <div class="col-sm-12">
                                <div class="displayfields">
                                    <h6 class="text-black">Address<span><a href="https://evauniversal.co.uk/home/add_address"><u>Add New Address</u></a></span></h6>
                                </div>
                            </div>
                                                    </div>-->
                        <!--<p class="text-center">Your tentative premium is INR xxx</p>
<p class="text-center">Our experts will get in touch with you for detailed quotes!</p>-->
                    </div>
                </div>

            </div>
        </div>
   </div>

      <!-- <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
      <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p> -->

            <div class="row">

                            <div class="col-md-12" style=" margin-top: 20px;">
                    <span id="tab3_error" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="tab3_success" class="successmain alert-message"
                        style="display:none;"></span>
                </div>

                        <div class="col-lg-12">
                            <div class="bg-white">

                       <div style="float:right;">


                            <button type="button" class="v-btn2  margin-20px-bottom" id="prevBtn" onclick="get_hide_show(4)">Previous</button>
                            <button type="button" class="v-btn  margin-20px-bottom phn_error" id="nextBtn12" onclick="get_hide_show(6);">Talk to Expert</button>
                        </div>
                    </div>
                </div>
            </div>
      </div>





  <div class="row align-items-center justify-content-center">

      <!-- <div class="col-lg-12">
           <div class="bg-white">
            <div style="float:right;">
              <button type="button" class="v-btn2  margin-20px-bottom" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
              <button type="button" class="v-btn  margin-20px-bottom phn_error" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
  </div>
      </div> -->
      <div class="col-lg-12 text-center">
          <h4 class="margin-20px-bottom">Policy Conditions</h4>
          <div class="row">
              <div class="col-lg-6">
                  <div class="li-sec">
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Hospitalization Expenses: Covered</span>
                  </div>
                  </div>
                   <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Covid 19: Covered</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Room Rent: 2% sum insured capped at 5,000 per day</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>ICU: 4% sum insured capped at 10,000 per day</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Pre-Post Hospitalization Expenses: 30 days, 60 days</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Domiciliary Hospitalization: Covered</span>
                  </div>
                  </div>
                  </div>



              </div>
              <div class="col-lg-6">
                  <div class="li-sec">
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Day Care Treatment: Covered</span>
                  </div>
                  </div>
                   <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Pre-Existing diseases: Covered from Day 1</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Maternity Expenses: Not Covered</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Pre-Post Natal Expenses: Not Covered</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Disease wise capping: None</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Addition/Deletion of life: Pro-rated</span>
                  </div>
                  </div>
                  </div>



              </div>

          </div>
      </div>

</div>




</form>
            </div>
        </div>
        </div>

</section>

<script>
   function get_hide_show(id)
   {

    if(id == 1){

        $( "#step1" ).addClass( 'active');


        $( "#step1" ).removeClass( 'finish');

        $( "#step2" ).removeClass( 'active');
        $( "#step3" ).removeClass( 'active');
        $( "#step4" ).removeClass( 'active');
        $( "#step5" ).removeClass( 'active');

        //$( "#step2" ).addClass( 'active');



        $(".tab1").css("display", "block");
        $(".tab3").css("display", "none");
        $(".tab4").css("display", "none");
        $(".tab5").css("display", "none");

        $(".tab2").css("display", "none");

    }

    if(id == 2)
     {
       var company = $('#company').val();
      if (company == '') {
        $('#tab1_error').html("Please Enter Company Name");
        $('#tab1_error').show().delay(0).fadeIn('show');
        $('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
      }

       var email = jQuery("#email").val();
        if (email == '') {
            jQuery('#tab1_error').html("Please Enter Email Id");
            jQuery('#tab1_error').show().delay(0).fadeIn('show');
            jQuery('#tab1_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var em1 = jQuery('#email').val();
        var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter1.test(em1)) {
            jQuery('#tab1_error').html("Please Enter Valid Email Id");
            jQuery('#tab1_error').show().delay(0).fadeIn('show');
            jQuery('#tab1_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var no_emp = $("#no_emp").val();
        if (no_emp == '') {
        $("#tab1_error").html("Please Enter No Of Employees.");
        $('#tab1_error').show().delay(0).fadeIn('show');
        $('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
        }

        var coverage_val = $("input[name='radio_group']:checked").val();

     var name = $("#name").val();
        if (name == '') {
        $("#tab1_error").html("Please Enter Your Name.");
        $('#tab1_error').show().delay(0).fadeIn('show');
        $('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
     }

     var location = $("#location").val();
        if (location == '') {
        $("#tab1_error").html("Please Select Location.");
        $('#tab1_error').show().delay(0).fadeIn('show');
        $('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
     }

     var age_emp = $("#age_emp").val();
        if (age_emp == '') {
        $("#tab1_error").html("Please Select Average Age Of Employees.");
        $('#tab1_error').show().delay(0).fadeIn('show');
        $('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
     }

     var coverage =  $('input[name="radio_group"]:checked');
     if (coverage.length == 0) {
         jQuery('#tab1_error').html("Plesae Choose Coverage");
        jQuery('#tab1_error').show().delay(0).fadeIn('show');
        jQuery('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
     }
        $( "#step1" ).addClass( 'finish');
        $( "#step1" ).removeClass( 'active');

        $( "#step2" ).addClass( 'active');
        $( "#step2" ).removeClass( 'finish');

        $( "#step3" ).removeClass( 'active');
        $( "#step3" ).removeClass( 'finish');

        $( "#step4" ).removeClass( 'active');
        $( "#step4" ).removeClass( 'finish');

        $( "#step5" ).removeClass( 'active');
        $( "#step5" ).removeClass( 'finish');


        $(".tab1").css("display", "none");
        $(".tab3").css("display", "none");
        $(".tab4").css("display", "none");
        $(".tab5").css("display", "none");

        $(".tab2").css("display", "block");

    }

    if (id == 3) {

        var sum_insurance = $("input[name='sum_insurance']:checked").val();

         if (sum_insurance == undefined) {
            $('#tab2_error').html("Please Select Coverage For");
            $('#tab2_error').show().delay(0).fadeIn('show');
            $('#tab2_error').show().delay(2000).fadeOut('show');
            return false;
        }

        $( "#step2" ).addClass( 'finish');
        $( "#step2" ).removeClass( 'active');


        $( "#step3" ).addClass( 'active');
        $( "#step3" ).removeClass( 'finish');

        $( "#step4" ).removeClass( 'active');
        $( "#step4" ).removeClass( 'finish');

        $( "#step5" ).removeClass( 'active');
        $( "#step5" ).removeClass( 'finish');


        $(".tab1").css("display", "none");
        $(".tab2").css("display", "none");

        $(".tab4").css("display", "none");
        $(".tab5").css("display", "none");

        $(".tab3").css("display", "block");
    }


    if(id == 4){

        var phone = $("#phone").val();
        if (phone == '') {
            jQuery('#tab3_error').html("Please Enter Mobile Number");
            jQuery('#tab3_error').show().delay(0).fadeIn('show');
            jQuery('#tab3_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var phone = jQuery('#phone').val();
        if(phone != ''){
            var filter = /^\d{10}$/;
            if (!filter.test(phone)) {
                jQuery('#tab3_error').html("Enter Valid Mobile Number");
                jQuery('#tab3_error').show().delay(0).fadeIn('show');
                jQuery('#tab3_error').show().delay(2000).fadeOut('show');
                return false;
            }
        }


        //var otparr = $('input[type=radio][name=opt_group1]').val();

        if(!$("input:radio[name='opt_group1']").is(":checked")) {
            jQuery('#tab3_error').html("Please check get otp radio button");
            jQuery('#tab3_error').show().delay(0).fadeIn('show');
            jQuery('#tab3_error').show().delay(2000).fadeOut('show');
            return false;
        }


        if(!document.getElementById('termscondition').checked){
            jQuery('#tab3_error').html("Please Agree To The Terms & Conditions");
            jQuery('#tab3_error').show().delay(0).fadeIn('show');
            jQuery('#tab3_error').show().delay(2000).fadeOut('show');
            return false;
        }

        $( "#step3" ).addClass( 'finish');
        $( "#step3" ).removeClass( 'active');


        $( "#step4" ).addClass( 'active');
        $( "#step4" ).removeClass( 'finish');

        $( "#step5" ).removeClass( 'active');
        $( "#step5" ).removeClass( 'finish');


        $(".tab1").css("display", "none");
        $(".tab2").css("display", "none");

        $(".tab3").css("display", "none");
        $(".tab5").css("display", "none");

        $(".tab4").css("display", "block");

        const last4Str = String(phone).slice(-4); // 👉️ '6789'
    const last4Num = Number(last4Str);

    var no_emp = $("#no_emp").val();

    document.getElementById('last4_digits').innerHTML = last4Num ;
    var sum_insurance_val = $("input[name='sum_insurance']:checked").val();
    var sum_value = sum_insurance_val * no_emp * 0.85/100;

    var location = $("#location").val();
    var coverage_val = $("input[name='radio_group']:checked").val();


    // alert(sum_insurance_val);


                         var url = '<?=base_url()?>home/otpsent';
                         var otptosend = <?php echo $this->session->userdata('mobileOtp'); ?>;

                         var isverified_mobile = jQuery("#isverified_mobile").val();
                        if (isverified_mobile == 0 && $('input[name="opt_group1"]:checked').val() == 1) {
                         $.ajax({
                         url: url,
                         type: 'post',
                         data: 'phone=' + phone + '&otp=' + otptosend,

                            success: function(msg) {

                                if(msg != 0){
                                    $("#mobile_otp_display").css("display", "block");
                                    $("#mobile_button_display").css("display", "block");
                                    $("#display_none").css("display", "none");
                                    $("#show").css("display", "block");
                                    $("#message_succsess").html("OTP Sent to your Mobile Number Successfully.");
                                    $('#message_succsess').show().delay(0).fadeIn('show');
                                    $('#message_succsess').show().delay(5000).fadeOut('show');
                                    document.getElementById('location_print').innerHTML = location ;
                                    if(coverage_val == 1){
                                        document.getElementById('cov_print').innerHTML = 'Employee Only';
                                    }else if(coverage_val == 2){
                                        document.getElementById('cov_print').innerHTML = 'Employee, Spouse & Children';
                                    }else if(coverage_val == 3){
                                        document.getElementById('cov_print').innerHTML = 'Employee, Spouse, Children & Parents';
                                    }
                                    if(sum_insurance_val == 100000){
                                        document.getElementById('sum_print').innerHTML = '1 Lacs' ;
                                    }else if(sum_insurance_val == 300000){
                                        document.getElementById('sum_print').innerHTML = '3 Lacs';
                                    }else if(sum_insurance_val == 500000){
                                        document.getElementById('sum_print').innerHTML = '5 Lacs';
                                    }
                                    document.getElementById('sum_count').innerHTML = sum_value ;
                                    //$("#location_print").html(location);

                                }
                                // else{
                                //      $('#regForm').submit();
                                // }
                            }
                        });
                     }

    }

    if(id == 5){

        var isverified_mobile = jQuery("#isverified_mobile").val();
        if (isverified_mobile == 0) {

        var verify_mobile_otp = jQuery("#verify_mobile_otp").val();
        if (verify_mobile_otp == '') {
            jQuery("#tab4_error").html("Please Enter otp.");
            jQuery('#tab4_error').show().delay(0).fadeIn('show');
            jQuery('#tab4_error').show().delay(2000).fadeOut('show');
            return false;
        }

        if (verify_mobile_otp != '<?php echo $this->session->userdata('mobileOtp'); ?>') {
            jQuery("#tab4_error").html("Please Enter Valid otp.");
            jQuery('#tab4_error').show().delay(0).fadeIn('show');
            jQuery('#tab4_error').show().delay(2000).fadeOut('show');
            return false;
        }

        if (verify_mobile_otp == '<?php echo $this->session->userdata('mobileOtp'); ?>') {

            jQuery("#message_succsess").html("Mobile Number Verified Successfully.");
            jQuery('#message_succsess').show().delay(0).fadeIn('show');
            jQuery('#message_succsess').show().delay(5000).fadeOut('show');
            jQuery("#isverified_mobile").val('1');
        }

        var isverified_mobile = jQuery("#isverified_mobile").val();
        if (isverified_mobile == 0) {

            jQuery('#tab4_error').html("Please Verify Mobile Number");
            jQuery('#tab4_error').show().delay(0).fadeIn('show');
            jQuery('#tab4_error').show().delay(2000).fadeOut('show');
            return false;

        }

    }

        $( "#step4" ).addClass( 'finish');
        $( "#step4" ).removeClass( 'active');


        $( "#step5" ).addClass( 'active');
        $( "#step5" ).removeClass( 'finish');




        $(".tab1").css("display", "none");
        $(".tab2").css("display", "none");

        $(".tab3").css("display", "none");
        $(".tab4").css("display", "none");

        $(".tab5").css("display", "block");
        window.location.hash = 'Iserrve-Analytics';
    }


    if(id == 6){
        //alert('submit');
        //

        if(!document.getElementById('customize_plan').checked){
           jQuery("#customize_plan").val('0');
        }else{
            jQuery("#customize_plan").val('1');
        }

        $('#regForm').submit();
    }
}


 </script>


 <script>

    function verify_mobileOtp(){

        var verify_mobile_otp = jQuery("#verify_mobile_otp").val();
        if (verify_mobile_otp == '') {
            jQuery("#contact_error1").html("Please Enter otp.");
            jQuery('#contact_error1').show().delay(0).fadeIn('show');
            jQuery('#contact_error1').show().delay(2000).fadeOut('show');
            return false;
        }

        if (verify_mobile_otp != '<?php echo $this->session->userdata('mobileOtp'); ?>') {
            jQuery("#contact_error1").html("Please Enter Valid otp.");
            jQuery('#contact_error1').show().delay(0).fadeIn('show');
            jQuery('#contact_error1').show().delay(2000).fadeOut('show');
            return false;
        }

        if (verify_mobile_otp == '<?php echo $this->session->userdata('mobileOtp'); ?>') {

            jQuery("#message_succsess").html("Mobile Number Verified Successfully.");
            jQuery('#message_succsess').show().delay(0).fadeIn('show');
            jQuery('#message_succsess').show().delay(5000).fadeOut('show');
            jQuery("#isverified_mobile").val('1');
        }

        var isverified_mobile = jQuery("#isverified_mobile").val();
        if (isverified_mobile == 0) {

            jQuery('#contact_error1').html("Please Verify Mobile Number");
            jQuery('#contact_error1').show().delay(0).fadeIn('show');
            jQuery('#contact_error1').show().delay(2000).fadeOut('show');
            return false;

        }

    }

</script>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Talk to our Expert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="buy-now-contain">
            <form class="v-form" id="need_help" role="need_help" method="post" action="<?=base_url()?>home/chatForm">
                 <INPUT TYPE="hidden" NAME="action" VALUE="verifyyourself22">
                <INPUT TYPE="hidden" name="ri_redirect_popUp" value="1">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" class="form-control" placeholder="Enter Name" name="name" id="pop_name">
                    </div>
                    <div class="col-lg-12">
                        <input type="email" class="form-control" placeholder="Enter Email" name="email" id="pop_email">
                    </div>
                    <div class="col-lg-12">
                        <input type="tel" class="form-control" placeholder="Enter Mobile" name="phone_number" id="phone_number" onkeypress="return validateNumber(event)">
                    </div>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" placeholder="Enter Company Name" name="company" id="pop_company">
                        <input type="hidden" class="form-control" placeholder="Enter Company Name" name="product_id" id="product_id" value="<?php echo $get_product_detail->id;?>">
                    </div>
                     <div class="col-md-12">
                    <span id="contact_error2" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="contact_success2" class="successmain alert-message"
                        style="display:none;"></span>
                     </div>
                    <div class="col-lg-12">
                        <button type="button" class="v-btn" onclick="javascript:popUpform();">TALK TO EXPERT</button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    </div>
  </div>
</div>


<script>
    function popUpform(){
       // alert('test');
        var pop_name = jQuery("#pop_name").val();
        if (pop_name == '') {
            jQuery("#contact_error2").html("Please Enter Name");
            jQuery('#contact_error2').show().delay(0).fadeIn('show');
            jQuery('#contact_error2').show().delay(2000).fadeOut('show');
            return false;
        }

         var pop_email = jQuery("#pop_email").val();
        if (pop_email == '') {
            jQuery('#contact_error2').html("Please Enter Email Id");
            jQuery('#contact_error2').show().delay(0).fadeIn('show');
            jQuery('#contact_error2').show().delay(2000).fadeOut('show');
            return false;
        }

        var em1 = jQuery('#pop_email').val();
        var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter1.test(em1)) {
            jQuery('#contact_error2').html("Please Enter Valid Email Id");
            jQuery('#contact_error2').show().delay(0).fadeIn('show');
            jQuery('#contact_error2').show().delay(2000).fadeOut('show');
            return false;
        }

        var phone_number = $("#phone_number").val();
        if (phone_number == '') {
            jQuery('#contact_error2').html("Please Enter Mobile Number");
            jQuery('#contact_error2').show().delay(0).fadeIn('show');
            jQuery('#contact_error2').show().delay(2000).fadeOut('show');
            return false;
        }

        var phone_number = jQuery('#phone_number').val();
        if(phone_number != ''){
            var filter = /^\d{10}$/;
            if (!filter.test(phone_number)) {
                jQuery('#contact_error2').html("Enter Valid Mobile Number");
                jQuery('#contact_error2').show().delay(0).fadeIn('show');
                jQuery('#contact_error2').show().delay(2000).fadeOut('show');
                return false;
            }
        }

         var pop_company = jQuery("#pop_company").val();
        if (pop_company == '') {
            jQuery("#contact_error2").html("Please Enter Company Name");
            jQuery('#contact_error2').show().delay(0).fadeIn('show');
            jQuery('#contact_error2').show().delay(2000).fadeOut('show');
            return false;
        }

         $('#need_help').submit();


    }

    function validateNumber(event) {
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode === 8 || event.keyCode === 46) {
            return true;
        } else if ( key < 48 || key > 57 ) {
            return false;
        } else {
            return true;
        }
    }


    $(document).on('click', '.whatsapp-login',function() {
          $("#overlay,.loader").show();
          var no_emp = $("#no_emp").val();
          var sum_insurance_val = $("input[name='sum_insurance']:checked").val();
          var sum_value = sum_insurance_val * no_emp * 0.85/100;

          var location = $("#location").val();
          var coverage_val = $("input[name='radio_group']:checked").val();

          var company = $('#company').val();
          var email = $("#email").val();
          var name = $("#name").val();
          var age_emp = $("#age_emp").val();

          $.ajax({
              url: '<?=base_url()?>employee/otpless',
              type: 'post',
              dataType:'json',
              data: 'no_emp=' + no_emp + '&sum_insurance_val=' + sum_insurance_val + '&sum_value=' + sum_value + '&location=' + location + '&coverage_val=' + coverage_val + '&company=' + company + '&email=' + email + '&name=' + name + '&age_emp=' + age_emp,
              success: function(response) {
                   if(response!=''){
                     setTimeout(function() {
                        $("#overlay,.loader").hide();
                     }, 1800);
                     window.location.replace(response['intent']);
                   }
              }
          });
    });

</script>

<?php include("includes/footer.php"); ?>
    </body>

    </html>
