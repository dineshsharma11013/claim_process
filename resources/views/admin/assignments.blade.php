@extends("admin_layout.main")

@section("container")

 
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assignments
       <!--  <small>Version 2.0</small> -->
      </h1>

    </section>

    <!-- Main content -->

<section class="content">

<div class="row">
        <div class="col-md-4"> 

      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">Filter</h3>
         
        </div>
        
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
                              
                 <div class="form-group">
                  <label for="exampleInputEmail1">Select Status <span class="required_cls">*</span></label>
                  <select onchange="getassignment(this.value)" id="company" class="form-control" name="company">
                     @foreach(Config::get('site.cases') as $ck=>$cv)
                     <option value="{{$ck}}">{{$cv}}</option>
                     @endforeach
                  
                  </select>
                  <div class="error_cls" id="error_company"></div>
                </div>

              </div>
          </div>
   
        </div>
      </div>

    </div>

  
        
        

    </div>

    
    <div class="col-md-12 box">
    



          <div class="box-header with-border">
          
              <h3 class="box-title"><span id="assignment_typ">All</span> Assignments</h3>
    
        </div>
        <div class="col-md-12">
      <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>IP</th>
                  <th>Company</th>
                  <th>Designation</th>
                  <th>Start date</th>
                  <th>End</th>
                  <th>View</th>
                  
                </tr>
                </thead>
                <tbody id="appendFilterData">
                    @foreach($output as $list)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                         <td>{{$list->ip}}</td>
                        <td>{{$list->company}}</td>
                        <td>{{$list->designation}}</td>
                        <td>{{$list->corporate_debtor_insolvency_date}}</td>
                        <td>{{$list->insolvency_closing_date}}</td>
                       <td> <a class="btn btn-sm btn-primary" href="{{url('form-a/'.$list->unique_id)}}" target="_blank" role="button" style="padding:4px 15px;"><i class='fa fa-eye'></i> View</a></td>
                    
                    </tr>
                     @endforeach
                    
                           
                    </tbody>
                    </table>
       
        </div>
       </div>

         <script>
  const getassignment = (txt)=>{
   if(txt=="")
   {
         $('#assignment_typ').html("All");   
   }
   else
   {
   $('#assignment_typ').html(txt);   
}
$.ajax
(
{
url: "{{url(admin().'/fliter_assignments')}}",
type: "GET",
data    : {txt1:txt},
cache: false,
success: function(data)
{

$('#appendFilterData').html(data);


}
}
);

}
  </script>


    </section>

  </div>
  


@endsection