<div class="modal-header">
       <!--  <h4 class="modal-title">Task Info</h4><br> -->

       @php
        $created = DB::table('general_info_mdls')->where('id', $cat->created_by_id)->select('first_name')->first();
        $updated = DB::table('general_info_mdls')->where('id', $cat->updated_by)->select('first_name')->first();
        $users = DB::table('general_info_mdls')->where('id',$cat->assigned_to)->select('first_name')->first();

        @endphp

        <label>Created By : <span style="font-weight: normal;">{{$created->first_name}} - ({{dateFm2($cat->created_at)}}) </span>  </label><br>
        @if(userType()->user_type==2 && userType()->sub_user=='')
        
        @if($updated)
        <label>Updated By : <span style="font-weight: normal;">{{$updated->first_name}} - ({{dateFm2($cat->updated_at)}})</span></label><br>
        @endif
        <label>Assigned To : <span style="font-weight: normal;">{{$users->first_name}}  </span></label>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      	@endif
      </div>
      <div class="modal-body" >
         <form role="form" id="assignForm">
        <div class="box-body">
          <div class="row">
            @php 
               $sixDiv = Config::get('site.twelveDiv');
               @endphp
        
                @if(userType()->user_type==2 && userType()->sub_user!='')
                <div class="col-md-12">
                  <div class="form-group col-md-6">
                <label>Task :- {{$cat->task}}</label><br>
                <label>Start Date :- {{$cat->start_date}}</label><br>
                <label>End Date :- {{$cat->end_date}}</label>
              </div>
              </div>
                @endif

            @if(userType()->user_type==2 && userType()->sub_user=='')

            <div class="col-md-12">
              
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Others  <!--<span class="required_cls">*</span> --> </label>
                  <select class="form-control" name="cirp_name" id="cirp_name" onchange='Removef("cirp_name");getCompanyInfo()' autocomplete="off">  
                   <option value="">Please Select</option>
                   @foreach($updated_uniqueUsers as $iv)
                    <option value="{{$iv->id}}" {{($cat->cirp_name == $iv->id) ? 'selected':''}} >{{$iv->name}}</option>
                  @endforeach
                  <option value ="other" {{$cat->cirp_name=='other' ?'selected':''}} >Other</option>
                  </select>
                
                  <div class="error_cls" id="error_cirp_name"></div>
                  
                </div>

                @if($cat->cirp_name=='other')
                <div class="form-group col-md-6" id="company_id" {{$cat->cirp_name=='other' ? '': 'style="display: none;"'}} >
                  <label for="exampleInputEmail1">Enter Company Name <span class="required_cls">*</span></label>
                  <input type="text" name="comapny" id="comapny" onkeyup='Removef("comapny")' value="{{$cat->comapny}}" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_comapny"></div>
                </div>
                @endif

              </div>



            <div class="col-md-12">
              
                <x-input label="Task" type="text" name="task"  placeholder=""  :value="$cat->task"  :colMd="$sixDiv"/>
               <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Description <!--<span class="required_cls">*</span>--></label>
                  <textarea name="desc" id="desc" onclick ="RemoveER('desc')" class="form-control" autocomplete="off">{{$cat->message}}</textarea>
                  <div class="error_cls" id="error_desc"></div>
                </div>
               

              </div>

              

              <div class="col-md-12">

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Start Date <span class="required_cls">*</span></label>
                  <input type="text" name="start_date" id="start_date" onclick ="RemoveER('start_date')" value="{{$cat->start_date}}" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_start_date"></div>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">End Date <span class="required_cls">*</span></label>
                  <input type="text" name="end_date" id="end_date" onclick ="RemoveER('end_date')" value="{{$cat->end_date}}" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_end_date"></div>
                </div>

              </div>
              @endif
              @if(userType()->user_type==2 && userType()->sub_user!='')
              <div class="col-md-12">
              
                <x-input label="Task" type="text" name="task"  placeholder=""  :value="$cat->task"  :colMd="$sixDiv"/>
               <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Description <!--<span class="required_cls">*</span>--></label>
                  <textarea name="desc" id="desc" onclick ="RemoveER('desc')" class="form-control" autocomplete="off">{{$cat->message}}</textarea>
                  <div class="error_cls" id="error_desc"></div>
                </div>
               

              </div>

              @endif

              <div class="col-md-12">

              	<div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Priority <span class="required_cls">*</span></label>
                  {!! Form::select('priority', Config::get('site.priority'), $cat->priority, ['onchange' =>'Removef("priority")', 'autocomplete' => 'off'  ,'id' => 'priority','class'=>'form-control', 'placeholder' => 'Please Select']) !!}
                  
                
                  <div class="error_cls" id="error_priority"></div>
                </div>


                 <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Status <span class="required_cls">*</span></label>
                  {!! Form::select('status', Config::get('site.task_status'), $cat->status, ['onchange' =>'Removef("status")', 'autocomplete' => 'off'  ,'id' => 'status','class'=>'form-control', 'placeholder' => 'Please Select']) !!}
                  
                
                  <div class="error_cls" id="error_status"></div>
                </div>

              </div>


            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>


        </form>
      </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> 

      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

      <script type="text/javascript">
      	$("#assignForm *").prop("disabled", true);
      </script>