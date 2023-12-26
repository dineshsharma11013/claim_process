@extends("home_layout/main")
@section('content')

@php
$bgImage = url('/').'/public/access/media/other/img4.webp';
@endphp

<style>
.gradient-custom-3 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
}
.gradient-custom-4 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
}

</style>

<!-- @php 
$authF = url('/').'/'.Config::get('site.authF');
$signUp = "userSignUp"

@endphp  -->

<section class="bg-image"
  style="background-image: url({{$bgImage}});">

  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
    
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card shadow-lg m-5 border-primary" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-2">Select Creditor</h2>
                  <form action="form" method="get" id="selectionForm" onsubmit="return selectionFormSubmit('selectionForm','type','ar')">  
                  
                    <div class="form-outline mb-2">
                        
                            <label class="form-label">Name <!--{{Session::get('form_a')}}--></label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" autocomplete="off" placeholder="Name" value="{{$cat->name ?? ''}}" readonly>
                            
                            <div class="error_cls" id="error_name"></div>
                    </div>
            
                    <div class="form-outline mb-2">
                      
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control form-control-lg" id="email" name="email" autocomplete="off" placeholder="Email" value="{{$cat->email ?? ''}}" readonly>
                            
                            <div class="error_cls" id="error_email"></div>
                        
                    </div>
            
                    <div class="form-outline mb-2">
                      
                            <label class="form-label">Mobile</label>
                            <input type="text" class="form-control form-control-lg" id="mobile" name="mobile" autocomplete="off" placeholder="Mobile" value="{{$cat->mobile ?? ''}}" readonly>
                            
                            <div class="error_cls" id="error_mobile"></div>
                       
                    </div>
            
                    <div class="form-outline mb-2">    
                        <label class="form-label">Select Creditor</label>
                      
                          <select name="type" id="type" onchange="selectCreditor('selectionForm', 'type', 'arType', 'ar')" class="form-control" autocomplete="off">
                            @foreach(Config::get('site.creditor_types') as $ti=>$tv)
                            <option value="{{$ti}}">{{$tv}}</option>
                            @endforeach
                          </select> 
                          <div class="error_cls" id="error_type"></div>
                       
                    </div>
            
                    <div class="form-outline mb-2" id="arType" style="display: none;">    
                        <label class="form-label">Select AR</label>
                      
                            <select name="ar" id="ar" class="form-control" onchange="selectAr('selectionForm', 'ar')" autocomplete="off">
                            <option value="">Select</option>
                            @foreach($ars as $ai=>$av)
                            <option value="{{$ai}}">{{$av}}</option>
                            @endforeach
                          </select> 
                            <div class="error_cls" id="error_ar"></div>
                       
                    </div>
            
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <button type="submit" id="selectionBtn" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Click Me !</button>
                            </div>
                            <div class="col-md-12" id="errMessage_selectionForm">
                            
                            </div>
                
                           <div class="col-md-12" id="errMessage_reportForm"><br>
                            @if(Session::has("success"))
                                    <div class="alert alert-success text-center offset-md-3 col-md-6" id="msg">{{ Session::get("success")}}</div> 
                                           @endif
                            @if(Session::has("danger"))
                                    <div class="alert alert-danger text-center offset-md-3 col-md-6" id="msg">{{ Session::get("danger")}}</div> 
                                 @endif
                                 </div>     
                
                        </div>
                        
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script type="text/javascript">
  setTimeout(function() {

        $("#msg").fadeOut('fast');

    },3000);

</script>

<!-- 
@section('nwJS')
<x-js :file="$authF" />
<x-js :file="$jsl" />
@endsection -->
@endsection