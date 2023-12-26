@extends("admin_layout.main")

@section("container")


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <a href="{{url(admin().'/form_aa')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD Form AA</a>
              <h3 class="box-title"><u>Form AA Details</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  @if(userType()->user_type==1)
                  <th>Created By</th>
                  @endif
                  <th>Name of corporate debtor</th>
                  <th>Name of insolvency professional agency</th>
                  <th>Name of commeetee</th>
                  
                  <th>Process of name of corporate debtor</th>
                  <th>Created</th>
                  <th style="width: 145px;">Action</th>
                  
                </tr>
                </thead>
               <tbody>
             
                   
    
                   @forelse($data as $dta)
                   <tr>
                    <td>{{$loop->index+1}}</td>
                    @if(userType()->user_type==1)
                    <td>
                      {{ucwords($dta->first_name)}}
                    </td>
                    @endif
                    <td>{{$dta->name_of_corporate_debtor}}</td>
                    <td>{{$dta->insolvency_agency_name}}</td>
                    <td>{{$dta->commeetee_name}}</td>
                    <td>{{$dta->process_of_name_of_corporate_debtor}}</td>
                    <td>{{$dta->created_time}}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{url(admin().'/form-aa')}}/{{$dta->unique_id}}" target="_blank" role="button"> <i class="fa fa-eye"></i> View</a>
                      <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit_formaa')}}/{{$dta->id}}"><i class="fa fa-edit"></i> Edit</a>
                      
                      @if(userType()->user_type==2)
                      
                     <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete_formaa/{{$dta->id}}','deleteFormAAData')" id="deleteFormAAData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a> 
                    @endif
                    @if(userType()->user_type==1)
                    @if($dta->deleted==1)
                    <a href="javascript:void(0);" class="btn btn-info btn-sm">Deleted</a>
                    @endif
                    @endif

                    <!-- <a onclick="return confirm('Are you sure you want to delete..?')" href="{{url(admin().'/delete_formaa')}}/{{$dta->id}}" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Delete</a> -->
                    
                    
                    </td>
                     

                       
                       
                       
                       </tr>
                   @empty

                   <tr>
                    <td>{{Config::get('site.no_data')}}</td>
                    @if(userType()->user_type==1)
                    <td></td>
                    @endif
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                   </tr>
                   @endforelse
                  
               </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@section('script')

<x-js :file="$jsl" />
@endsection
@endsection