@extends("admin_layout.main")

@section("container")


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          
            <!-- /.box-header -->
           
            <div class="box">
            <div class="box-header">
         
              <h3 class="box-title"><u>UnRegistered User</u></h3>
            </div>
            <div class="box-body">
<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Form Type</th>
                  <th>Company</th>
                  <th>IP</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @forelse($output as $ot)

              @php $fid = base64_encode($ot->id); @endphp

              <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>
                    @if($ot->ft=='operational-creditor')
                          Form-B
                      @elseif($ot->ft=='financial-creditor')
                      Form-C
                      @elseif($ot->ft=='workmen-and-employee')
                      Form-D
                      @elseif($ot->ft=='financial-creditor-in-a-class')
                      Form-CA
                      @elseif($ot->ft=='authorised-representative-of-workmen-and-employee')
                      Form-E
                      @elseif($ot->ft=='other-creditor')
                      Form-F
                      @endif
                    </td>
                  <td>{{$ot->company}}</td>
                  <td>{{$ot->ip_name}}</td>
                  <td>
                      {{$ot->name}}
                     
                      </td>
                  <td>{{$ot->email}}</td>
                  <td>{{$ot->mobile}}</td>
                  
                  <td>{{$ot->created_at}}</td>
                  <td>
                    @if($ot->ft=='operational-creditor')
                        <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-b-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>
                      @elseif($ot->ft=='financial-creditor')
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-c-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>
                      @elseif($ot->ft=='workmen-and-employee')
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-d-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>
                      @elseif($ot->ft=='financial-creditor-in-a-class')
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-ca-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>
                      @elseif($ot->ft=='authorised-representative-of-workmen-and-employee')
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-e-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>
                      @elseif($ot->ft=='other-creditor')
                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-f-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i> Details</a>
                      @endif

                    
                  </td>
              </tr>
              @empty
              <tr>
                  <td>No record found</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              @endforelse
              </tbody>
              </table>
            </div>
</div>
            
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
     
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>



@endsection