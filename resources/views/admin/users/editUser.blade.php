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
          
              <h3 class="box-title">Update User</h3>
          <!-- <div class="box-tools pull-right">
            <a href="{{url(admin().'/user-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div> -->
        </div>
        <!-- /.box-header -->
        <form role="form" id="updateUserForm">
        <div class="box-body">
          <div class="row">
            @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $formMethod = 'adminGeneral';
                @endphp
            <div class="col-md-12">
              
             
              

                <x-input label="Name" type="text" name="name" :value="$cat->name" placeholder="Name" :comp="$comp" :colMd="$sixDiv"/>
                 <x-input label="Email" type="text" name="email" placeholder="Email" :value="$cat->email" :comp="$comp" :colMd="$sixDiv"/>
   
              </div>


            <div class="col-md-12">
              <x-input label="Address" type="text" name="address" :value="$cat->address" placeholder="Address" :colMd="$sixDiv"/>
              <x-input label="Contact" type="text" name="mobile"  placeholder="Contact" :value="$cat->mobile" :comp="$comp" :colMd="$sixDiv"/>
             
            </div>

            <div class="col-md-12">
               
                <x-input label="User Name" type="text" name="unique_id" :value="$cat->unique_id" placeholder="User Name" :comp="$comp" :colMd="$sixDiv"/>
                  <x-input label="Password" type="password" name="password" :value="$cat->password" placeholder="Password" :comp="$comp" :colMd="$sixDiv"/>
            </div>
            <div class="col-md-12">
            
              <x-select label="Authentication Type" :value="Config::get('site.auth_type')" :selected="$cat->auth_type" name="auth_type" placeholder="Please Select" :colMd="$sixDiv"/>

               <x-select label="User Type" :value="Config::get('site.claimant_type')" :selected="$cat->user_type" name="user_type" placeholder="Please Select" :colMd="$sixDiv"/>

            </div>

            <div class="col-md-12">
            
               <x-select label="Status" :value="Config::get('site.status_2')" name="status" :selected="$cat->status" placeholder="Please Select" :comp="$comp" :colMd="$sixDiv"/>  

            </div>


            <!-- /.col -->
           
        
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">

                <!--   <button type="button" id="updateUserBtn" onclick="updateUserData('updateUserForm','updateUserBtn','/edit-user/313',UserValidate,'none')" class="btn btn-primary btn-sm">Update</button> -->

                  <button type="button" id="updateUserBtn" onclick="updateUserData('updateUserForm','updateUserBtn','/edit-user/{{$cat->id}}',UserValidate,'none')" class="btn btn-primary btn-sm">Update</button>

                    <!-- <x-asbutton value="Update" redirect="none" form="updateUserForm" btnId="updateUserBtn" path="/edit-user/{{$cat->id}}" btnClass="{{Config::get('site.btnPrimary')}}" :method="$a_vl" /> -->
               
                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
                    <a href="javascript:void(0);" onclick="closeMdl('userModal');" class="btn btn-default">Close</a>

                    <div class="col-md-12" id="errMessage_updateUserForm">
  
                        
  </div>

              </div>
        </form>

        <!-- /.box-body -->
        
      <!-- /.row -->
    </section>

