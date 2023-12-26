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
             
              <h3 class="box-title"><u>IPS Details </u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
              <!--     <th>S. No.</th> -->
                
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                
                  
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <!-- <td></td> -->
                    
                    

                    <td>{{ucwords($sbrs->name)}}</td>
                    <td>
                     {{$sbrs->email}}
                    </td>
                    <td>
                    {{$sbrs->contact}}
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