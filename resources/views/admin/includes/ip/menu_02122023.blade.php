<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('public/public/user.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ucwords(userType()->first_name)}}</p>
          <a href="{{url(admin().'/')}}"><i class="fa fa-circle text-success" id="connection_msg"></i> <span id="connection_status">Online</span></a>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <!--  <li class="header">NAVIGATION</li>
         -->
        
        <li class=""><a href="{{url(admin().'/')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li class=""><a href="{{url(admin().'/general-info')}}"><i class="fa fa-circle-o text-aqua"></i> Profile </a></li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>Form Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class=""><a href="{{route('formBRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form B Registered</a></li>
            <li class=""><a href="{{route('formBUnRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form B Un-Registered</a></li>
            
            <li class=""><a href="{{route('formCRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form C Registered</a></li>
            <li class=""><a href="{{route('formCUnRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form C Un-Registered</a></li>

            <li class=""><a href="{{route('formDRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form D Registered</a></li>
            <li class=""><a href="{{route('formDUnRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form D Un-Registered</a></li>

            <li class=""><a href="{{route('formCaRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form CA Registered</a></li>
            <li class=""><a href="{{route('formCaUnRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form CA Un-Registered</a></li>

            <li class=""><a href="{{route('formERegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form E Registered</a></li>
            <li class=""><a href="{{route('formEUnRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form E Un-Registered</a></li>

            <li class=""><a href="{{route('formFRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form F Registered</a></li>
            <li class=""><a href="{{route('formFUnRegDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Form F Un-Registered</a></li>

          </ul>
        </li>


        <li class="treeview">
                <a href="#">
                  <i class="fa fa-plus"></i> <span>New Case</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  
                  <li class=""><a href="{{url(admin().'/company-details')}}"><i class="fa fa-circle-o text-aqua"></i>Add Company</a></li>
                  <li class=""><a href="{{url(admin().'/form-a-details')}}"><i class="fa fa-circle-o text-aqua"></i>Form A</a></li>
                  <li class=""><a href="javascript:void(0)"><i class="fa fa-circle-o text-aqua"></i>Public Announcement</a></li>
                  <li class=""><a href="javascript:void(0)"><i class="fa fa-circle-o text-aqua"></i>Time Chart</a></li>
                </ul>
              </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>All Type of reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">  
          <li class=""><a href="{{route('formsReport')}}"><i class="fa fa-circle-o text-aqua"></i>Generate Reports</a></li>
         <li class=""><a href="{{url(admin().'/forms_genertae_Report')}}"><i class="fa fa-circle-o text-aqua"></i>Form Generate Reports</a></li>
         <li class=""><a href="{{url(admin().'/forms_anexure_Report')}}"><i class="fa fa-circle-o text-aqua"></i>Form Anexure Reports</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>Activities</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">  
          <li class=""><a href="{{route('todoDetails')}}"><i class="fa fa-circle-o text-aqua"></i>Todo List</a></li>
          <li class=""><a href="{{route('publication')}}"><i class="fa fa-circle-o text-aqua"></i>Publication</a></li>
         
          </ul>
        </li>

        @if(userType()->sub_user == '')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>CIRP Cases</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">  
            @foreach(getCompanyDetails() as $iv)
          <li class=""><a href="{{url(admin().'/dashboard-user/'.$iv->id)}}"><i class="fa fa-circle-o text-aqua"></i>{{$iv->name}}</a></li>
          
         @endforeach
          </ul>
        </li>
        @endif

        @if(userType()->sub_user == '')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>Liquidation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">  
            @foreach(getCompanyDetails() as $iv)
          <li class=""><a href="{{url(admin().'/dashboard-user/'.$iv->id)}}"><i class="fa fa-circle-o text-aqua"></i>{{$iv->name}}</a></li>
          
         @endforeach
          </ul>
        </li>
        @endif




        <li class=""><a href="{{url(admin().'/sabredge-representative')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Sabredge Representative</span></a>
        <li class=""><a href="{{url(admin().'/company-details')}}"><i class="fa fa-circle-o text-aqua"></i> Company Details </a></li>

        <li class=""><a href="{{url(admin().'/cirp-details')}}"><i class="fa fa-circle-o text-aqua"></i> CIRP Details </a></li>

        <li class=""><a href="{{url(admin().'/authentication')}}"><i class="fa fa-circle-o text-aqua"></i> Authentication </a></li>

        @if(userType()->sub_user == '')

        <li class=""><a href="{{url(admin().'/sub-ip-details')}}"><i class="fa fa-circle-o text-aqua"></i> Sub-IP Details</a></li>

        @endif

        <!--here is ip panel code-->
        
               <li class=""><a href="{{url(admin().'/assignments')}}"><i class="fa fa-circle-o text-aqua"></i> Cases </a></li>

        <li class=""><a href="{{url(admin().'/form-g-details')}}"><i class="fa fa-circle-o text-aqua"></i> Form G</a></li>       
        
        <li class=""><a href="{{url(admin().'/form-2-details')}}"><i class="fa fa-circle-o text-aqua"></i> Form 2</a></li>


        <li class=""><a href="{{url(admin().'/form-a-details')}}"><i class="fa fa-circle-o text-aqua"></i> Form A </a></li>

        <li class=""><a href="{{url(admin().'/form-aa-list')}}"><i class="fa fa-circle-o text-aqua"></i> Form AA</a></li>
        
        <li class=""><a href="{{url(admin().'/sub-ip-details')}}"><i class="fa fa-circle-o text-aqua"></i> Sub-Users </a></li>
        
        <li class=""><a href="{{url(admin().'/claimants')}}"><i class="fa fa-circle-o text-aqua"></i> Claimants </a></li>  
        
       <li class=""><a href="{{url(admin().'/user-details')}}"><i class="fa fa-circle-o text-aqua"></i> User Details </a></li>
        
      <li class="">
      <a href="{{url(admin().'/llp_master_data')}}"><i class="fa fa-circle-o text-aqua"></i> Llp master data </a></li>

      <li class="">
      <a href="{{url(admin().'/view_llp_master_data')}}"><i class="fa fa-circle-o text-aqua"></i> View Llp master data </a></li>
      <li class=""><a href="{{url(admin().'/sign-out')}}"><i class="fa fa-circle-o text-aqua"></i> Sign Out </a></li>

      
        
      </ul>
    </section>