<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{$res['totalNotification']}}</span>
            </a>


@if($res['totalNotification']>0)
 <ul class="dropdown-menu">
              <li class="header">You have {{$res['totalNotification'] > 1 ? $res['totalNotification'].' notifications': $res['totalNotification'].' notification'}}</li>
              <li>
                <ul class="menu">
                  @if(count($res['formBTotalNotification'])>0)
                  	
                  @foreach($res['formBTotalNotification'] as $fb)
                  @foreach($res['users'] as $user)	
              		@if($user->id==$fb->user_id)

              		@php
              		$fid = base64_encode($fb->form_id);
              		@endphp
	                  <li><!-- start message -->

                      @if($fb->form_type=='Form-B Update Request')
	                    <a href="{{url(admin().'/form-b-registered-details/'.$fid)}}" title="{{ucwords($user->name)}} sent request to update form-b"> 
	                    @elseif($fb->form_type=='Form-C Update Request')
                        <a href="{{url(admin().'/form-c-registered-details/'.$fid)}}" title="{{ucwords($user->name)}} sent request to update form-C"> 
                      @elseif($fb->form_type=='Form-D Update Request')
                        <a href="{{url(admin().'/form-d-registered-details/'.$fid)}}" title="{{ucwords($user->name)}} sent request to update form-D">
                      @elseif($fb->form_type=='Form-E Update Request')
                        <a href="{{url(admin().'/form-e-registered-details/'.$fid)}}" title="{{ucwords($user->name)}} sent request to update form-E">
                      @elseif($fb->form_type=='Form-CA Update Request')
                        <a href="{{url(admin().'/form-ca-registered-details/'.$fid)}}" title="{{ucwords($user->name)}} sent request to update form-CA">       
                      @elseif($fb->form_type=='Form-F Update Request')
                        <a href="{{url(admin().'/form-f-registered-details/'.$fid)}}" title="{{ucwords($user->name)}} sends request to update form-F">       
                      @endif
                          
                        <div class="pull-left">
	                        <img src="{{asset('public/public/user.png')}}" class="img-circle" alt="User Image">
	                      </div>
	                      <h4>
	                        Notification
	                        <small><i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($fb->request_sent_time)->diffForHumans()}} </small>
	                      </h4>

                        @if($fb->form_type=='Form-B Update Request')
	                      <p>{{ucwords($user->name)}}  sent request to update form-b <!--at {{dateFm2($fb->request_sent_time)}}--></p>
	                     @elseif($fb->form_type=='Form-C Update Request')
                        <p>{{ucwords($user->name)}}  sent request to update form-c </p>
                       @elseif($fb->form_type=='Form-D Update Request')
                        <p>{{ucwords($user->name)}}  sent request to update form-d </p>
                       @elseif($fb->form_type=='Form-E Update Request')
                        <p>{{ucwords($user->name)}}  sent request to update form-e </p> 
                       @elseif($fb->form_type=='Form-CA Update Request')
                        <p>{{ucwords($user->name)}}  sent request to update form-ca </p>
                       @elseif($fb->form_type=='Form-F Update Request')
                        <p>{{ucwords($user->name)}}  sent request to update form-f </p>  
                       @endif

                      </a>
	                  </li>
              
                  @endif
                  @endforeach
                  @endforeach
                  @endif
                 
                </ul>
              </li>
             <!--  <li class="footer"><a href="#">View all</a></li> -->
            </ul>            
@endif            