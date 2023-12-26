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
             <!--  <a href="{{url(admin().'/add-company')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD Company</a> -->
              <h3 class="box-title"><u>User Details List </u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                 <th>Form</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <!-- <th>Status</th>   -->
                  <th>Created</th>
                  <th>Details</th>
                  
                </tr>
                </thead>
                <tbody>
                @forelse($output as $ot)
                  
                @if(!isset($form_type))
                      @if($ot->ft=='operational-creditor')
                         @php $form = "Form-B" @endphp
                      @elseif($ot->ft=='financial-creditor')
                      @php $form = "Form-C" @endphp
                      @elseif($ot->ft=='workmen-and-employee')
                      @php $form = "Form-D" @endphp
                      @elseif($ot->ft=='financial-creditor-in-a-class')
                      @php $form = "Form-CA" @endphp
                      @elseif($ot->ft=='authorised-representative-of-workmen-and-employee')
                      @php $form = "Form-E" @endphp
                      @elseif($ot->ft=='other-creditor')
                      @php $form = "Form-F" @endphp
                      @endif
                      @endif

                      @php 
                            $fid = base64_encode($ot->form_id);
                          @endphp         
                  <tr>
                 <td>{{$loop->index+1}}</td>
                  <td>
                    {{$form}}
                  </td>
                  <td>
                      {{$ot->name}} 
                      
                      </td>
                  <td>{{$ot->email}}</td>
                  <td>{{$ot->mobile}}</td>
                 <!--  <td></td> -->
                  <td>{{$ot->created_at}}</td>
                  <td>
                      @if($form == 'Form-B')
                        <a href="{{url(admin().'/get-form-b-pdf-report/'.$ot->selected_id.'/'.$ot->form_id)}}" target="_blank" id="export" class="btn bg-orange btn-sm" ><i class="fa fa-file-pdf-o"></i> View</a>
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-b-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>

                      @elseif($form == 'Form-C')
                        <a href="{{url(admin().'/get-form-c-pdf-report/'.$ot->selected_id.'/'.$ot->form_id)}}" target="_blank" id="export" class="btn bg-orange btn-sm" ><i class="fa fa-file-pdf-o"></i> View</a>
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-c-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>

                      @elseif($form == 'Form-D')
                        <a href="{{url(admin().'/get-form-d-pdf-report/'.$ot->selected_id.'/'.$ot->form_id)}}" target="_blank" id="export" class="btn bg-orange btn-sm" ><i class="fa fa-file-pdf-o"></i> View</a>
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-d-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>

                      @elseif($form == 'Form-E')
                        <a href="{{url(admin().'/get-form-e-pdf-report/'.$ot->selected_id.'/'.$ot->form_id)}}" target="_blank" id="export" class="btn bg-orange btn-sm" ><i class="fa fa-file-pdf-o"></i> View</a>
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-e-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>

                      @elseif($form == 'Form-F')
                        <a href="{{url(admin().'/get-form-f-pdf-report/'.$ot->selected_id.'/'.$ot->form_id)}}" target="_blank" id="export" class="btn bg-orange btn-sm" ><i class="fa fa-file-pdf-o"></i> View</a>
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-f-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>

                      @elseif($form == 'Form-CA')
                        <a href="{{url(admin().'/get-form-ca-pdf-report/'.$ot->selected_id.'/'.$ot->form_id)}}" target="_blank" id="export" class="btn bg-orange btn-sm" ><i class="fa fa-file-pdf-o"></i> View</a>
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-ca-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>

                      @endif

                      <a class="btn btn-info btn-sm" href="../../form-a/{{$ot->fA_unique_id}}" target="_blank" role="button"> <i class="fa fa-eye"></i> Form A</a>

                  </td>    
                    
                  </tr>
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td>
                  
                  <td></td><td></td><td></td><td></td><td></td></tr>
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