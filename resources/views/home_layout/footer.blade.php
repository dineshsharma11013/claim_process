
<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="">

  <footer class="text-center text-white" style="background-color: #f1f1f1;">
  <!-- Grid container -->
  <div class="container pt-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-linkedin"></i
      ></a>
      <!-- Github -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-dark" href="#">Claim Process</a>
  </div>
  <!-- Copyright -->
</footer>
  
</div>
<!-- End of .container -->


<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"></circle><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"></circle></svg></div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="{{asset('public/public/media/js/8891-js-jquery.min.js')}}"></script>
<script src="{{asset('public/public/media/js/cloudflare-static-email-decode.min.js')}}"></script>
<script src="{{asset('public/public/media/js/6rS3Cn6ZxM.js')}}"></script><script>eval(mod_pagespeed_YgNxllFXD4);</script>
<script>eval(mod_pagespeed_UDmpTSObsH);</script>
<script>eval(mod_pagespeed_uRER00OAmW);</script>

<script src="{{asset('public/public/media/js/Mgo9OYOi5G.js')}}"></script><script>eval(mod_pagespeed_1gCYGiHbM9);</script>
<script>eval(mod_pagespeed_8EvmmGDyCK);</script>
<script>eval(mod_pagespeed_1DoCc_EEAp);</script>
<script>eval(mod_pagespeed_2mnIkk1i4p);</script>
<script src="{{asset('public/public/media/js/eIhfEvsAmk.js')}}"></script><script>eval(mod_pagespeed_bGDXmnGcnW);</script>
<script>eval(mod_pagespeed_UGjS7Lz9kp);</script>
<script>eval(mod_pagespeed_kYUzhmgmTg);</script>
<script>eval(mod_pagespeed_jIUsHblPht);</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script>
<script>eval(mod_pagespeed_E5v$mbbxth);</script>
<script>eval(mod_pagespeed_wBb5LK83Ja);</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('public/access/js/common.js')}}"></script>
<script src="{{ asset('public/access/toast/notific.js') }}"></script>
<!-- <script src="{{asset('public/public/media/login/login.js')}}"></script>  -->
<script type="text/javascript">
     var b_pth = "{{url('/')}}";
   var token = '{{ csrf_token() }}';
   var time_period = 3000;
   var home_url = "{{route('home')}}";


</script>

<!-- <script type="text/javascript">
    $(function() {
        $('.sanction_date').datepicker();
    });
</script> -->


@yield("nwJS")
</body>
</html>
