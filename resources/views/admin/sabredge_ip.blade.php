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
             
              <h3 class="box-title"><u>Sabredge Representative </u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
              <!--     <th>S. No.</th> -->
                  <th>Company</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Contact</th>
                  <th>Signature</th>
                  
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <!-- <td></td> -->
                    
                    <td>
                      {{$us->company}}
                    </td>

                    <td>{{ucwords($us->employee)}}</td>
                    <td>
                     {{$us->design}}
                    </td>
                    <td>
                    {{$us->contact}}
                    </td>
                    <td>
                     @if(!empty($us->signature))
                    @if(file_exists(publicP() . '/access/media/sabredge/'.$us->signature))
                   <img src="{{ asset('public/access/media/sabredge/'.$us->signature) }}" width="50" height="50">
                    @endif @endif
                    </td>
               
                      
                      
                    
                  </tr>
           
          
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


@endsection