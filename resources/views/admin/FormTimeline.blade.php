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
              <!--<a href="{{url(admin().'/add-ar')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD AR</a>-->
              <h3 class="box-title"><u>Form-2-Timeline</u></h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
              
                <tr >
                  <th>S. No.</th>
                  <th>Corporate Debitor</th>
                  <th>Entry Data</th>
                  <th>Process Chart</th>
                  <th>IPA</th>
                  
                </tr>
               
                </thead>
                <tbody>
            @foreach($debitor_details as $list)
                  <tr>
             
                    <td>{{$loop->index+1}}</td>
                    <td>{{$list->vs_name_of_corporate_debtor}}</td>
                    <td><a href="{{url(admin().'/form-2-timeline')}}/{{$list->id}}">View</a></td>
                    <td><a href="{{url(admin().'/form-2-processchat')}}/{{$list->id}}">View</a></td>
                    <td></td>
           
                  </tr>
            @endforeach
                  
               
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