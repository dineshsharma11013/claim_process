<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('public/public/user.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ucwords(userType()->first_name)}}</p>
          <a href="{{url(admin().'/')}}"><i class="fa fa-circle text-success" id="connection_msg"></i> <span id="connection_status">Online</span></a>
        </div>
      </div> -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <!--  <li class="header">NAVIGATION</li>
         -->
        
        <li class=""><a href="{{url(admin().'/')}}"><i class="fa fa-dashboard"></i> Dashboard {{Session::get('admin_id')}}</a></li>
        <li class=""><a href="{{url(admin().'/general-info')}}"><i class="fa fa-circle-o text-aqua"></i> Profile </a></li>


     


     

     

       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>CIRP Cases</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">  
            @foreach(cirpTeam() as $iv)
          <li class=""><a href="{{url(admin().'/dashboard-user/'.$iv->cmId)}}"><i class="fa fa-circle-o text-aqua"></i>{{$iv->name}}</a></li>
          
         @endforeach
          </ul>
        </li>
        

    
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
      




        <li class=""><a href="{{url(admin().'/ips-manager')}}"><i class="fa fa-circle-o text-aqua"></i> <span>IPS Manager</span></a>
        
      <li class=""><a href="{{url(admin().'/sign-out')}}"><i class="fa fa-circle-o text-aqua"></i> Sign Out </a></li>

      
        
      </ul>
    </section>