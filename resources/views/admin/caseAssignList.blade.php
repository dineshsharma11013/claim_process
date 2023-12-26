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
             
              <h3 class="box-title"><u>Case Details</u></h3>

              @foreach(getCompanyDetails() as $iv)
          @if($iv->id == $id)
          <div style="float: right;">
            <span class="text text-info" style="text-transform: uppercase;font-size: 18px;">{{$iv->name}} </span>
          <a href="{{url(admin().'/assign-case/'.$id)}}" class="btn btn-sm bg-maroon btn-flat" style="margin-right: 5px;" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Assign Case</a>  
          </div>
            
          @endif
        @endforeach
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                
                  <th>Name</th>
                  <th>Cases</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @forelse($users as $us)
                  <tr>
                   
                   <td>{{$loop->index+1}}</td> 
                    <td>{{$us->name}}</td>
                    <td>
                     @php
                        $rightsArray = [];
                        $rights = explode(', ', $us->cases);
                      @endphp

                      @foreach(Config::get('site.teamCase') as $sk => $sv)
                        @foreach($rights as $rt)
                          @if($sk == $rt)
                            @php $rightsArray[] = $sv; @endphp
                          @endif
                        @endforeach
                      @endforeach

                      {{ implode(', ', $rightsArray) }}

                    </td>
                    <td>
                      @foreach(Config::get('site.rp_status') as $sk=>$sv)
                     @if($sk==$us->status)
                     {{$sv}}
                     @endif
                     @endforeach
                    </td>
                    <td>{{dateFm2($us->created_at)}}</td>
                    <td>
                      {{ $us->updated_at ? dateFm2($us->updated_at) : ''}}
                    </td>
                    <td>
                      <a class="{{Config::get('site.editDataBtn')}}" href="{{url(admin().'/edit-assign-case/'.$id.'/'.$us->id)}}"><i class="fa fa-edit"></i> Edit</a>
                          <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete-assign-case/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                    
                 @empty  
               <tr>
                   
                   <td>{{Config::get('site.no_data')}}</td> 
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                @endforelse  
           
          
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