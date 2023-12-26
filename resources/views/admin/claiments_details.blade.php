@extends("admin_layout.main")

@section("container")

 
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Claimants
       <!--  <small>Version 2.0</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->

@if(userType()->user_type == 2)
<section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">Filter <!-- {{Session::get('admin_id')}} --></h3>
    
        </div>
        <!-- /.box-header -->
        <form>
          <input type="hidden" name="_token" value="xyYHUYSNi48TE6QlyzsZpYV4yszw3AcVmeC6NLyT">       
          <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
                              
                 <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Select Form Type <span class="required_cls">*</span></label>
                  <select class="form-control" onChange="get_data(this.value)" id="form_type" name="form_type" autocomplete="off">
                      <option value="">Choose FormType</option>
                      <option value="From_b">From B</option>
                      <option value="From_c">From C</option>
                      <option value="From_d">From D</option>
                      <option value="From_e">From E</option>
                      <option value="From_f">From F</option>
                      <option value="From_ca">From CA</option>
                  </select>
                  <div class="error_cls" id="error_company"></div>
                </div>
                
                
                      <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Select Company <span class="required_cls">*</span></label>
                  <select class="form-control" onChange="get_cmp_data(this.value)" id="company" name="company" autocomplete="off">
                      <option value="">Choose Company</option>
                      @foreach($company as $cl=>$cv)
                      <option value="{{$cl}}">{{$cv}}</option>
                      @endforeach
                  </select>
                  <div class="error_cls" id="error_company"></div>
                </div>

                
                


              </div>

          </div>
          <!-- /.row -->
        </div>


        </form>
        


        <!-- /.box-body -->
        
      <!-- /.row -->
    </div></section>
 <section class="content">
  
      <div class="col-md-12 box">
          <div class="box-header with-border">
          
              <h3 class="box-title"><span id="assignment_typ">All</span> Claimants</h3>
    
        </div>
        <div class="col-md-12">
      <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Status</th>
                  <th>Created</th>
                 
                </tr>
                </thead>
                <tbody id="appendFilterData">
<!--@foreach($output as $list)-->

<!--               <tr>-->
<!--                   <td>{{$loop->index+1}}</td>-->
<!--                   <td>{{$list->name}}</td>-->
<!--                   <td>{{$list->email}}</td>-->
<!--                   <td>{{$list->mobile}}</td>-->
<!--                   <td>@if($list->status==1)-->
<!--                   Active -->
<!--                   @else-->
<!--                   De-Active -->
<!--                   @endif-->
<!--                   </td>-->
<!--                   <td>{{$list->created_at}}</td>-->
<!--               </tr>-->
                     
<!--@endforeach                    -->
                    </tbody>
                    </table>
       
        </div>
     


       
        <div class="clearfix visible-sm-block"></div>

      
        
        @if(userType()->user_type==1) 
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-file-text-o"></i></span>

            <a href="{{url('/'.admin().'/ip-details')}}">
              <div class="info-box-content">
              <span class="info-box-text">IP Details</span>
             <!--  <span class="info-box-number">Unregistered</span> -->
            </div>
            </a>
          
          </div>
        
        </div>
     
        @endif
       
        <div class="clearfix visible-sm-block"></div>

     

       
        <div class="clearfix visible-sm-block"></div>


      
        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-fw fa-file-text-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number">Unregistered</span>
            </div>
       
          </div>
        
        </div> -->
       
      </div>



    </section>
@endif  
  </div>
  


@section('script')

<x-js :file="$jsl" />
@endsection
@endsection