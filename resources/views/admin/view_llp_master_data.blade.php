@extends("admin_layout.main")

@section("container")


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">LLP Master Data</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/company-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>S. No.</th>
                    <th>Date of Incorporation</th>
                    <th>Company</th>
                    <th>ROC code</th>
                    <th>Registeration number</th>
                    <th>Company Category</th>
                    <th>Class of company</th>
                    <th>Authorised capital</th>
                    <th>Action</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach($llp_data as $list)
                    <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$list->date_of_incorporation}}</td>
                    <td>{{$list->company_name}}</td>
                    <td>{{$list->roc_code}}</td>
                    <td>{{$list->registeration_number}}</td>
                    <td>{{$list->company_category}}</td>
                    <td>{{$list->class_of_company}}</td>
                    <td>{{$list->authorised_capital}}</td>
                    <td>
                      <a href="{{url(admin().'/edit_llp')}}/{{$list->id}}" class="{{Config::get('site.editDataBtn')}}">Edit</a> 
                      <a class="{{Config::get('site.deleteDataBtn')}}" onclick="deleteData('/delete_llp/{{$list->id}}','deleteLlpData')" id="deleteLlpData" href="javascript:void(0)"> Delete</a>
                      <!-- <a href="{{url(admin().'/delete_llp')}}/{{$list->id}}" class="{{Config::get('site.deleteDataBtn')}}">Delete</a> </td> -->
                    </tr>

@endforeach
                    </tbody>
                    </table>

        <!-- /.box-body -->
        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> 
<script src="{{ asset('public/access/datepicker/bootstrap-datetimepicker.min.js') }}"></script> 
<script type="text/javascript">
//  $('#irp').select2();



  $('#insolvency_commencement_date').datetimepicker({
    format: 'YYYY-MM-DD'
  }).on("dp.change", function (e) {
     //console.log(e.date._d);
    
     var startDt = $('#insolvency_commencement_date').val(); 
      
     var mm2Dt = moment(startDt).add('days', 14);
     var cl2Dt = mm2Dt.format('YYYY-MM-DD');  

     var mmDt = moment(startDt).add('days', 180);
     var clDt = mmDt.format('YYYY-MM-DD');
     $("#end_date").val(clDt);
     $("#claim_filing_date").val(cl2Dt);


    
});
  $('#claim_filing_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });

  $('#start_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#end_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });

</script>


<x-js :file="$jsl" />
@endsection  
@endsection  
