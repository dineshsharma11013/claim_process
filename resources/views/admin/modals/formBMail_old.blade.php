

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              <!-- <h3 class="box-title">Send Credentials</h3><br> -->
              <h4>Mail To RP </h4>
          <div class="box-tools pull-right">
           <button type="button" class="btn btn-danger" onclick="closeModal('userModal')">Close</button>
            
          </div>
        </div>
        <!-- /.box-header -->
         <form role="form" id="RPMailForm">
        <div class="box-body">
          <div class="row">
             <div class="form-group col-md-12">
              
              <input type="hidden" name="form_b" value="{{$cat->id}}">

              <input type="hidden" name="user_type" value="IRP">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">To <span class="required_cls">*</span></label>
                  <input type="text" name="to" id="to" class="form-control" placeholder="Enter To">
                
                  <div class="error_cls" id="error_to"></div>
                </div>
                
                <div class="form-group col-md-6">
                  <label>Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject">
               <div class="error_cls" id="error_irp"></div>
               </div>


              </div>

            <div class="col-md-12">


              <div class="form-group col-md-12">
                  
                
                  <label for="exampleInputEmail1">Description <span class="required_cls">*</span></label><br>
                  <textarea id="description" name="description">
                    
                    <br><br><br>
        <p>            
        Thanks and Regards<br><br></p>
        <hr><br>
        <p style='color:blue;'>I.P. Support Team</p> <br>
        <b >Sabre Edge  IT Solutions<b> <br>   
        <spam style='color:black'>We work “Hard” so that you can work “Smart” </spam><br><br>
        Office: 3208, 2nd floor, Mahindra Park, Near Rani Bagh, Delhi-110034<br>
        Desk:   +91 11 4702-4666    |    M:   +91 9350 444 666<br>
        Email:  mail@ipsupport.in  <br>
        Url:    www.ipsupport.in <br><br>

        <b>DISCLAIMER<b>: This communication is confidential and privileged and is directed to and for the use of the addressee only. The recipient if not the addressee should not use this message if erroneously received, and access and use of this e-mail in any manner by anyone other than the addressee is unauthorized. The recipient acknowledges that IPSupport may be unable to exercise control or ensure or guarantee the integrity of the text of the email message and the text is not warranted as to completeness and accuracy. Before opening and accessing the attachment, if any, please check and scan for virus.
                  </textarea>
                  <div class="error_cls" id="error_description"></div>
                </div>
                
                
              <!-- /.form-group -->
            </div>

            <!-- /.col -->
            <div class="col-md-12">
              
            <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">File</label>
                  <input type="file" name="file[]" accept="{{Config::get('site.acceptFile')}}" id="file" multiple>
                </div>
    
              <!-- /.form-group -->
            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">
                <button type="button" onclick="sendData('RPMailForm','saveBtn','/send-formB-user-report')" id="mailBtn" class="btn btn-success">Send</button>              
                    <button type="reset" class="btn btn-info">Reset</button>
              </div>
        </form>
        <div style="margin-left: 10px;" id="mailError"></div>
    </section>


    <!-- /.content -->


<script src="{{asset('public/access/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
  
$('#irp').select2();
CKEDITOR.replace('description');
    
</script>

