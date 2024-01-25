<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="{{asset('public/access/home/css/bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('public/access/home/css/boxicons.min.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('public/access/home/css/owl.carousel.min.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('public/access/home/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('public/access/home/css/owl.theme.default.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('public/access/home/css/styles.css')}}">
<!-- 	<link rel="stylesheet" href="{{asset('public/access/home/css/font-awesome.min.css')}}"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/public/media/login/login.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CLAIMPROCESS</title>
  </head>
  <style>
body{
   background-image:url("{{asset('public/access/home/img/download.svg')}}"); 
   background-repeat:no-repeat;
}
.sticky{
  position:fixed;
  top: 0;
  width: 100%;
  z-index:1;
}
.sticky + .content {
  padding-top: 60px;
}
.btn-danger{
	color: #fff;
    background-color: #223544;
    border-color: #223544;
}
.btn-danger:hover{
	color: #fff;
	background-color: #304352;
	border-color: #304352;
}
  .error_cls{
  color: red;
 font-size:13px;
 }
.required_cls{
color:red;
 }
 .top-nav {
    background-color: #223645;
}
.navbar-brand {
    font-weight: 700;
    font-size: 22px;
}

</style>

  <body data-bs-spy="scroll" data-bs-target="#navbar-example">
 

	<div class="top-nav" id="home">
      <div class="container">
        <div class="row justify-content-between">
         
          <div class="col-auto">
          </div>
		</div>
      </div>
    </div>
	
    @php 
$authF = url('/').'/'.Config::get('site.authF');
$signUp = "userSignUp";

@endphp

@if(!Session::has('user_id'))

@include('home.include.login')

@endif
	
    <nav class="navbar navbar-expand-lg navbar-dark" style="background:#db2352;"id="navbar">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">CLAIMPROCESS</a>
			<div class=" mx-2">   
			<i class='bx bx-envelope' style="color:white"></i>

			<span class="text-white"><a href="mailto:mail@ipsupport.in" class="text-white">cirp.samarestates@gmail.com  
</span> &nbsp;
			</div>

			<!-- <div class="mx-2">
			<i class='bx bxs-phone-call' style="color:white" ></i>
			<span class="text-white"><a href="tel:+91-9350444666" class="text-white"> +91-9350444666 </a></span>
			</div> -->
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
              
           <!-- <li class="nav-item">
              <a class="nav-link text-white" href="index.html">Home</a>
            </li>  
       
            <li class="nav-item">
              <a class="nav-link text-white" href="biddinginfo.html">Info</a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link text-white" href="contact.html">Contact</a>
            </li>
			-->

			@if(Session::has('user_id'))	

		  <li class="nav-item"><a href="{{url('/dashboard')}}" class="nav-link text-white">Dashboard</a></li>
		<li class="nav-item"><a href="{{route('signOut')}}" class="nav-link text-white">Sign Out</a></li>
		  @else
<li class="nav-item"><a href="javascript:void(0);" id="loginBtn" onclick="loginFmOn()" class="btn btn-sm btn-danger text-white">Login</a></li>
@endif
                               
          </ul> 
        </div>
      </div>
    </nav>


 


		<div class='container'>
        <div class='row'>
         <div class="col-md-1">
         <img src="{{asset('public/access/home/img/images-removebg-preview.png')}}" height="100" style="width: 164px;">
         </div>
         <div class='col-md-11 pt-3 text-white px-5'>
         <marquee>
		 <h5 style="color:#223645!important;">Last date of claim submission is 26-Jan-2024.</h5>
		 </marquee>
         </div>
        </div>
    
      <form action='form-apply' method='get' id="selectForm" onsubmit="return selectFormSubmit('selectForm','company_name','ip_name')">
		
      	<input type="hidden" name="unId" id="unId" value="{{Session::has('user_id') ?? '' }}">
		<div class="card p-2 rounded shadow mb-5" style="border-radius: 30px !important;">
        <div class='row justify-content-center'>
             <div class="card-title text-center"><h3>Announcements</h3></div>
			
			<!-- <div class="col-md-3  p-2">
			<h5 class="text-center">Live Claim Process</h5>
			<marquee height="200px" direction = "up" behaviour="scroll" scrolldelay="150" onmouseover='this.stop();' onmouseout='this.start();' style="position: relative;top:0px;">
			@forelse($live as $lv)
			<p> {{$loop->index+1}} Company - {{$lv->company}} <br>
			 IP - {{$lv->ip}} <br> 
			 Designation - {{$lv->designation}} <br>
			 Start - {{dateFm($lv->corporate_debtor_insolvency_date)}} <br>
			 End - {{dateFm($lv->insolvency_closing_date)}}  <br>
			 <a class="btn btn-sm btn-danger" href="{{url('form-a/'.$lv->unique_id)}}" target="_blank" role="button" style="padding:4px 15px;">View</a>
			</p>
			@empty
			<p style="color: #263e89;font-weight: 600;text-align:center;" >No Claim</p>
			@endforelse	
			
			</marquee>
			</div>
             -->


			<div class="col-md-6 border  bg-light">
			<div class="row mb-4">
			<div class="col-md-6">
			<div class="form-outline">
			<label class="form-label" for="form6Example1">Company</label>
			<select onchange="Removef(&quot;company_name&quot;);selectCompany(&quot;selectForm&quot;, this.value,&quot;ip_name&quot;, &quot;claimDiv&quot;, &quot;claimDetails&quot;);" id="company_name" class="form-control" autocomplete="off" name="company_name"><option value="27" selected>M/S SAMAR ESTATES PRIVATE LIMITED</option></select>
			<div class="error_cls" id="error_company_name"></div>
			<!-- <input type="hidden" name="user_id" id="user_id" value=""> -->
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-outline">
			<label class="form-label" for="form6Example2">IP</label>
			<input type="text" name="ip_name" value="Rahul Jindal" id="ip_name" class="form-control" disabled autocomplete="off">
			<div class="error_cls" id="error_ip_name"></div>
			</div>
			</div>
			</div>

			<div class="row mb-4">


			<div class="d-flex w-100 justify-content-center align-items-center m-2">

			<button type="submit" class="btn btn-danger" id='sbt_serch'>Submit Your Claim</button>
			<!-- <button type="reset" class="btn btn-danger mx-2">Clear</button>	 -->
			

			</div>
			<div class="col-md-12 text-center errMsg" id="errMessage_selectForm">
            
                </div>

			</div>
			</div>
	
		<!-- <div class="col-md-3 p-2 " id='upcoming_laptop'>
		<h5 class="text-center">Upcomming Claim Process</h5>
		<marquee height="200px" direction = "up" behaviour="scroll" scrolldelay="150" onmouseover='this.stop();' onmouseout='this.start();' style="position: relative;top:0px;">
		@forelse($upcomings as $lv)
			<p> {{$loop->index+1}} Company - {{$lv->company}} <br>
			 IP - {{$lv->ip}} <br> 
			 Designation - {{$lv->designation}} <br>
			 Start - {{dateFm($lv->corporate_debtor_insolvency_date)}} <br>
			 End - {{dateFm($lv->insolvency_closing_date)}}  <br>
			 <a class="btn btn-sm btn-green" href="{{url('form-a/'.$lv->unique_id)}}" target="_blank" role="button" style="padding:4px 15px;">View</a>
			</p>
			@empty
			<p style="color: #263e89;font-weight: 600;text-align:center;" >No Claim</p>
			@endforelse	
		</marquee>
		</div> -->
		
    </div>
  </div>
  </form>
  
   <!-- bottom scroll -->
     <!-- <div class="row">
        <div class="col-md-12 mb-5">
            <div class="d-flex justify-content-between align-items-center breaking-news " style="background:#223645;">
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center btn-danger py-2 text-white px-1 news"><span class="d-flex align-items-center">&nbsp;Important</span></div>
                <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> <a href="#" style="color:white;font-weight:bold">There is no upcoming claim </a>
                </marquee>
            </div>
        </div>
    </div> -->
	<!-- bottom scroll -->
	
 </div>


		<div class="container py-5" id="claimDiv" style="display: none;">
		<div class="row">            
		<h3 class="text-center" style="font-family: arial;">Current Claim Process</h3>
		<div class="col-lg-12">
		<div class="card  card-primary" style="border: none;">
		
		<div class="card-body mb-3">
            <div class="table table-responsive">
            <table class="table tabe-hover table-bordered border-dark  table-striped mb-3" id="list">
             
				<thead>
                    <tr class="bg-dark text-white" style="font-family:arial;">
						<th>S.no</th>
						<th>Company</th>
                        <th>IP</th>
                        <th>RP/IRP</th>
						<th>Start Date</th>
                        <th>End Date</th>
                        <th>Form A</th>
                    </tr>
                </thead>
				
					<tbody id="claimDetails">
					
					</tbody>
  
             </table>
            </div>
        </div>
		
    </div>
</div>


                   </div>
               </div>  
			   
			   
		<!-- 	   <div class="container pb-5 mb-2">
		<div class="row">            
		<h3 style="font-family: arial;">Features of Claim Process</h3>
		<div class="col-lg-12">
		<ul>
		<li> <b> Reserve/Base Price:</b> Reverse or Base price is the minimum price of any good/service that a seller demands. IP Support’s Platform provides the seller the right to set a base price. Only the bids higher than the base price are accepted</li>
		<li> <b> Incremental Value: </b> Incremental Value is some amount of increase in the price of the bid that the second bidder has to make in order to make their bid higher than the previous bidder. The seller gets to set a minimum incremental value.</li>
		<li> <b>Automatic Time Extension: </b> Our platform provides an Automatic Time Extension feature in our system which helps in keeping the bidding process fair for everyone. Bidders try to bid at the last minute with the highest bid in order to buy the asset. With this feature, if any bidder places a bid in the last 5-10 mins of the E-Auction process, the time period extends with the equivalent time.</li>
		<li> <b>Reverse Auction:</b> In reverse auction the bidder bids lower than the previous bids.</li>
		<li><b>Currency: </b> The seller has the liberty of choosing which currency the bidding will be done in like, Indian Rupee; USD; ASD; Euro, etc.</li>
		<li> <b> Unit: </b> Here, the seller gets to decide the unit of money like, Millions; Billions; Crore; Thousand, etc.</li>
		<li> <b>Other Features: </b> Some of the other features of E-Auction are similar to E-Voting service</li>
		</ul>
		</div>
		</div>
		
		<div class="row mt-2">            
		<h3 style="font-family: arial;">Claim Process</h3>
		<div class="col-lg-12">
		<p><b>The process to file a claim is as follows </b>- To promote interest, the foremost step is to list the specifics of the items up for auction and then advertise/inform as many people as you can about them. The information about the eAuction is first provided in this first section on the IP support website under the eAuction section (eAuction). Here, the following information is mentioned:</p>
		<ul>
		<li> The liquidator shall make public announcement within five days from his / her appointment calling upon the stakeholders to submit their claims or update the claims submitted during corporate insolvency resolution process.</li>
		<li>To make the claim online now claimants are invited and they are required to fill forms with their prices.</li>
		<li>The creditors has to fill all the asked information correctly.</li>
		<li>The Insolvency Professional will verify the claims and will call the petitioners.</li>
		<li>The announcement indicates insolvency by stating that the corporate debtor is in the process of insolvency and that all interested candidates or bidders are invited to submit a resolution plan that could potentially be implemented. These bidders could be potential investors, creditors, or others.</li>
		<li>The COC reviews resolution plans based on the number of proposals. The plan that receives approval from more than 75% of the COC is guaranteed.</li>
		<li>The resolution plan that was approved by the COC is presented to the NCLT. If the NCLT approves the resolution plan, it is carried out and becomes legally binding on the corporate debtor and all stakeholders.</li>
		</ul>
		<p class="fw-bold">In all of the above mentioned points and process IP solution provides solution to Insolvency Professionals.</p>
		</div>
		</div>
		
		</div> -->
			   
			   

  <!-- Footer -->
  <footer class="text-center text-lg-start text-white p-2" style="background:#223645;" >
	<!-- Section: Links  -->
    <section class="footer_bottom">
      <div class="container text-center text-md-start mt-5" style="background: #223645; ">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold text-white" style='font-family:arial;'>CLAIMPROCESS</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color:#db2352; height: 2px;opacity: 1;"
                />
            <p class="p-0" style='font-family:arial;'>IP Supports is committed to provide, efficient and easy to use claim process platform for Insolvency Professionals to make CIRP process easy and effortless.
            </p>
          </div>
        
          <!-- Grid column -->
          <!-- <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
           
            <h6 class="text-uppercase fw-bold text-white" style='font-family:arial;'>Useful links</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                 style="width: 60px; background-color:#db2352; height: 2px;opacity: 1;"
                />
            <p class="p-0 m-0" style='font-family:arial;'>
              <a href="contact.html" class="text-white">Contact Us</a>
            </p>
            <p class="p-0 m-0" style='font-family:arial;'>
              <a href="aboutus.html" class="text-white">About Us</a>
            </p>
           
            <p class="p-0 m-0" style='font-family:arial;'>
              <a href="#!" class="text-white">Help</a>
            </p>
          </div> -->
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold text-white" style='font-family:arial;'>Contact</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto"   style="width: 60px; background-color:#db2352; height: 2px;opacity: 1;"/>
            <p class="mt-0 p-0" style='font-family:arial;'><i class='bx bxs-home-alt-2 mr-3'></i>EssVee Apartments in front of GHS-105, Sector-20 Panchkula, Panchkula, Haryana, India, 134112</p>
            <p class="mt-0 p-0" style='font-family:arial;'><i class='bx bxs-envelope' ></i> cirp.samarestates@gmail.com</p>
            <!-- <p class="mt-0 p-0" style='font-family:arial;'><i class='bx bxs-phone'></i> +91-9350444666 </p> -->
           
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
<hr class="mb-1 mt-0 d-inline-block mx-auto " style="width: 100%; background-color:white; height: 2px">
    <!-- Copyright -->
    <div class="text-center p-3" style="font-family:arial; border-top:1">
      © Copyright Sabre-Edge All Rights Reserved
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->



  
  <script src="{{asset('public/access/home/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/access/js/common.js')}}"></script>
 <!--  <script src="{{asset('public/access/home/js/app.js')}}"></script>
 -->
	<script type="text/javascript">
     var b_pth = "{{url('/')}}";
   var token = '{{ csrf_token() }}';
   var time_period = 3000;
   var home_url = "{{route('home')}}";

   $(".errMsg").hide();

</script>		  

	<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}


document.getElementById("ip_name").disabled = true;

$("input [type='text']").attr("disabled", "disabled");

$(".error_cls").css('margin-bottom', '10px');
$("#ip_name").attr("disabled", "disabled");

</script>
  <x-js :file="$authF" />
	<x-js :file="$jsl" />

  </body>
</html> 


