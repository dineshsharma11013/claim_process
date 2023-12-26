

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              <!-- <h3 class="box-title">Send Credentials</h3><br> -->
              <h4>Mail To {{ucwords($cat->signing_person_name)}} </h4>
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
                  <input type="text" value="{{$cat->fc_email}}" name="to" id="to" class="form-control" placeholder="Enter To" readonly>
                
                  <div class="error_cls" id="error_to"></div>
                </div>
                
                <div class="form-group col-md-6">
                  <label>Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" value="Details of claim admitted" placeholder="Enter Subject">
               <div class="error_cls" id="error_irp"></div>
               </div>


              </div>

            <div class="col-md-12">


              <div class="form-group col-md-12">
                  
                
                  <label for="exampleInputEmail1">Description <span class="required_cls">*</span></label><br>
                  <textarea id="description" name="description">
                    
                <p>            
       Dear Mr. {{ucwords($cat->signing_person_name)}},</p>
 <p>This is in reference to the claim filed by you under (Under Regulation 7 of the Insolvency and Bankruptcy Board of India (Insolvency Resolution Process for Corpotate Persons) Regulations, 2016). in respect of your outstanding dues against M/s {{ isset($cat->company) ? ucwords($cat->company) : ''}} (Under CIRP). The said claim has been provisionally verified on the basis of records and information available and submitted by you and their scrutiny by me. Details of claims submitted by you and the claims provisionally admitted are mentioned below:</p>

<table style="border-color: 1px solid black;">
  <tr>
 <th> Unique Identification No. </th> <th style="width:200px"> Amount Claimed </th> <th style="width:200px"> Amount Provisionally admitted </th> <th style="width:200px"> Amount Not Admitted</th>
</tr>
<tr>
  <td></td>
           <td><span style="float: left;">Principal</span> -- <span style="margin-left: 20px;">Interest</span> </td> 
           <td><span style="float: left;">Principal</span> -- <span style="float: right;">Interest</span> </td> 
           <td><span style="float: left;">Principal</span> -- <span style="float: right;">Interest</span> </td> 
  </tr>
  <tr>
    <td>{{$cat->uId}}</td>
            <td>
              @if(isset($info->principal_amt))
              <span style="float: left;">{{isset($info->principal_amt) ? $info->principal_amt : ''}}</span> -- <span style="float: right;">{{isset($info->interest) ? $info->interest : ''}}</span> @endif</td> 
           
           <td>
            @if(isset($info->approved_principle_amt))
            <span style="float: left;">{{isset($info->approved_principle_amt) ? $info->approved_principle_amt : ''}}</span> -- <span style="float: right;">{{isset($info->approved_interest_amt) ? $info->approved_interest_amt : ''}}</span> @endif</td> 
           
            <td>
              @if(isset($info->rejected_principle_amt))
              <span style="float: left;">{{isset($info->rejected_principle_amt) ? $info->rejected_principle_amt : ''}}</span> -- <span style="float: right;">{{isset($info->rejected_interest_amt) ? $info->rejected_interest_amt : ''}}</span>@endif </td> 
</tr>
</table>

<p> 
There is a difference of amount claimed and admitted on account of the reasons: <br>
1.  Receipts of payments are only for Rs. ... as such the total principal has not been admitted <br>
2.  Please note that you have claimed the entire amount inclusive of service tax, kindly note that we can admit only the principal amount exclusive of service tax as service tax is the statutory liability of the Corporate Debtor as such there is a difference between the Principal amount claimed and Principal amount provisionally admitted. <br>
3.  Further there is a difference in the interest claimed and admitted on account of the difference in principal amount provisionally admitted.
</p>
<p> 
Kindly note that this is only a provisional admission of the claim and will undergo change(s) based on the further documents submitted by you or as available for the Corporate Debtor.
 </p>
 <p>
 
Disclaimer: Your claim has been accepted/ admitted on provisional basis based on documents and information submitted by you. We have not yet received any data from the Corporate Debtor (SIPL) to enable us to cross verify the claims with the records and books of the Corporate Debtor. Hence this admitted amount may undergo change(s) after cross verification from the appropriate data available with me from corporate debtor or any alternate authentic source. In case you have any additional corroborative information/records same may please be furnished at the earliest. 
</p>

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
        </form>

        <div class="box-footer">
                <button type="button" onclick="sendData('RPMailForm','saveBtn','/send-formCA-user-report','userModal')" id="mailBtn" class="btn btn-success">Send</button>              
                    <button type="reset" class="btn btn-info">Reset</button>
              
        <div style="margin-top: 10px;display: none;" id="mailError_RPMailForm">
          <!-- <div class='alert alert-dismissible alert-danger text-center col-md-6'>Technical Error. Try Again Later...</div> -->
        </div>

        </div>
        
      </div>
    </section>


    <!-- /.content -->


<script src="{{asset('public/access/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
  
$('#irp').select2();
CKEDITOR.replace('description');
    
</script>

