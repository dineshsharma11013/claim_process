<h6>I, {{!empty($user->signing_person_name) ? $user->signing_person_name : $cat->name}} currently residing at {{isset($user->signing_address) ? $user->signing_address : ''}}, do hereby declare and state as follows: - </h6><br>

    @php
      $borrower_claim_amount = is_numeric($user->borrower_claim_amount) ? $user->borrower_claim_amount :0;
      $guarantor_claim_amount = is_numeric($user->guarantor_claim_amount) ? $user->guarantor_claim_amount :0;
      $financial_claim_amt = is_numeric($user->financial_claim_amt) ? $user->financial_claim_amt :0;
      $total_amount = $borrower_claim_amount + $guarantor_claim_amount + $financial_claim_amt;  
    @endphp


              <span>1. {{isset($comp->name) ? ucwords($comp->name) : ''}}, the corporate debtor was, at the insolvency commencement date, being the {{dateFm3($user->insolvency_commencement_date)}} actually indebted to me for a sum of Rs. {{is_numeric($total_amount) ? $total_amount :''}}.</span><br><br>

              <span>2. In respect of my claim of the said sum or any part thereof, I have relied on the documents specified below: [Please list the documents relied on as evidence of claim].</span><br><br>


               @if(isset($updated_data) && $updated_data == 'view')
              @if(count($senctionDetails) > 0)
              <table id="sanctionAmtTbl">
                 <tr>  
                <td style="padding-right:30px;">
                    <label>Date</label><br>
                    </td>
                <td style="padding-right:30px;">
                     <label>Sanction Amount and facility (Amt in lakh)</label><br> 
              </td> 
                </tr>   

                @foreach($senctionDetails as $fl)

                 <tr id="row_sanctionAmtTbl_{{$loop->index+1}}">  
                <td style="padding-right:30px;">
                    <input type="text" placeholder="enter date" value="{{$fl->date}}" autocomplete="off" readonly></td>
               
                <td style="padding-right:30px;">
                    <textarea placeholder="enter details" value="{{$fl->senction_amt}}" readonly style="width:425px;">{{$fl->senction_amt}}</textarea>
                  <input type="hidden" name="other_senc_id[]" value="{{$fl->id}}">
              </td> 
             
                </tr>

                
                @endforeach
              </table>
                @endif
                @else

                @if(count($senctionDetails)>0)
                <table id="sanctionAmtTbl">
                <tr>  
                <td style="padding-right:30px;">
                    <label>Date</label></td>

                <td style="padding-right:30px;">
                     <label>Sanction Amount and facility (Amt in lakh)</label><br> 
              </td> 
                <td></td>
                </tr>

              @foreach($senctionDetails as $fl)

                 <tr id="row_sanctionAmtTbl_{{$loop->index+1}}">  
                <td style="padding-right:30px;">
                    <input type="date" class="sanction_date" placeholder="enter date" name="sanction_date[]" id="sanction_date" value="{{$fl->date}}" autocomplete="off" ></td>
               
                <td style="padding-right:30px;"> 
                    <textarea placeholder="enter details" name="section_amt[]" id="section_amt" value="{{$fl->senction_amt}}" style="width:425px;">{{$fl->senction_amt}}</textarea>
                  <input type="hidden" name="other_senc_id[]" value="{{$fl->id}}">
              </td> 
                <td> <button class="btn btn-primary btn-sm" type="button" id="addMore" onclick="addSenction('sanctionAmtTbl', 'sanction_date', 'section_amt', 'other_senc_id')">Add More</button>
                <button class="btn btn-primary btn-sm" type="button" id="deleteRowBtn{{$loop->index+1}}" onclick="delSenction('{{$loop->index+1}}', 'sanctionAmtTbl', '{{$fl->id}}', '/remove-senction-data', 'deleteRowBtn', 'financialCreditorForm', 'errMessage_4', '{{Config::get('site.formCSenctionMdl')}}')">Delete Row</button></td>
                </tr>

                @endforeach
              </table>
                @else
                <table id="sanctionAmtTbl">
                <tr id="row_sanctionAmtTbl_1">  
                <td style="padding-right:30px;">
                    <label>Date</label><br>
                    <input type="date" class="sanction_date" value="" placeholder="enter date" name="sanction_date[]" id="sanction_date" autocomplete="off" ></td>
               
                <td style="padding-right:30px;">
                     <label>Sanction Amount and facility (Amt in lakh)</label><br> 
                    <textarea placeholder="enter details" name="section_amt[]" id="section_amt"  style="width:425px;"></textarea>
                    <input type="hidden" name="other_senc_id[]" value="">
              </td>
                <td> <button class="btn btn-primary btn-sm" type="button" id="addMore" onclick="addSenction('sanctionAmtTbl', 'sanction_date', 'section_amt', 'other_senc_id')">Add More</button>
                <button class="btn btn-primary btn-sm" type="button" onclick="delSenction('1', 'sanctionAmtTbl')">Delete Row</button></td>
                </tr>
              </table>
                @endif
                @endif


              <span>3.The said documents are true, valid and genuine to the best of my knowledge, information and belief and no material facts have been concealed therefrom. </span><br><br>

              <span>4. In respect of the said sum or any part thereof, neither I, nor any person, by my order, to my knowledge or belief, for my use, had or received any manner of satisfaction or security whatsoever, save and except the following:</span><br>

              <span class="text-danger"><i>[Please state details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim]. – To be copied from S. No. 8</i></span><br><br>

               @if(isset($updated_data) && $updated_data == 'view')
              <table id="sanctionDeclTbl">
                <tr>  
                <td style="padding-right:30px;">
                    <label>Date</label><br>
                  </td>
                <td style="padding-right:30px;">
                     <label>Details</label><br> 
              </td> 
                </tr>
                @forelse($declarationMdls as $fl)
                 <tr id="row_sanctionDeclTbl_{{$loop->index+1}}">  
                <td style="padding-right:30px;">
                    <input type="text" placeholder="enter date" value="{{$fl->date}}" autocomplete="off" readonly>
                  </td>
               
                <td style="padding-right:30px;">
                    <textarea placeholder="enter details" value="{{$fl->senction_amt}}" readonly style="width:425px;">{{$fl->senction_amt}}</textarea>
                  <input type="hidden" name="othr_senc_id[]" value="{{$fl->id}}">
              </td> 
                </tr>
                @empty
                @endforelse
              </table>
                @else

                @if(count($declarationMdls)>0)
                <table id="sanctionDeclTbl">
                <tr>  
                <td style="padding-right:30px;">
                    <label>Date</label><br>
                    </td>
               
                <td style="padding-right:30px;">
                     <label>Details</label><br> 
              </td> 
                <td> </td>
                </tr>

              @foreach($declarationMdls as $fl)

                 <tr id="row_sanctionDeclTbl_{{$loop->index+1}}">  
                <td style="padding-right:30px;">
                    <input type="date" class="sanct_date" placeholder="enter date" name="sanct_date[]" id="sanct_date" value="{{$fl->date}}" autocomplete="off" ></td>
               
                <td style="padding-right:30px;">
                    <textarea placeholder="enter details" name="sect_amt[]" id="sect_amt" value="{{$fl->senction_amt}}" style="width:425px;">{{$fl->senction_amt}}</textarea>
                  <input type="hidden" name="othr_senc_id[]" value="{{$fl->id}}">
              </td> 
                <td> 
                  <button class="btn btn-primary btn-sm" type="button" id="addMore" onclick="addSenction('sanctionDeclTbl', 'sanct_date', 'sect_amt', 'othr_senc_id')">Add More</button>
                <button class="btn btn-primary btn-sm" type="button" id="deleteRowBtn{{$loop->index+1}}" onclick="delSenction('{{$loop->index+1}}', 'sanctionDeclTbl', '{{$fl->id}}', '/remove-senction-data', 'deleteRowBtn', 'financialCreditorForm', 'errMessage_4', '{{Config::get('site.formCDecTblMdl')}}')">Delete Row</button></td>
                </tr>

                @endforeach
              </table>
                @else
                <table id="sanctionDeclTbl">
                <tr id="row_sanctionDeclTbl_1">  
                <td style="padding-right:30px;">
                    <label>Date</label><br>
                    <input type="date" class="sanct_date" placeholder="enter date" name="sanct_date[]" id="sanct_date" autocomplete="off" ></td>
               
                <td style="padding-right:30px;">
                     <label>Details</label><br> 
                    <textarea placeholder="enter details" name="sect_amt[]" id="sect_amt"  style="width:425px;"></textarea>
                    <input type="hidden" name="othr_senc_id[]" value="">
              </td>
                <td> <button class="btn btn-primary btn-sm" type="button" id="addMore" onclick="addSenction('sanctionDeclTbl', 'sanct_date', 'sect_amt', 'othr_senc_id')">Add More</button>
                <button class="btn btn-primary btn-sm" type="button" onclick="delSenction('1', 'sanctionDeclTbl')">Delete Row</button></td>
                </tr>
              </table>
                @endif

                </table> 
                @endif
                
              <span>I undertake to update my claim as and when the claim is satisfied, partly or fully, from any source in any manner, after the insolvency commencement date.  </span><br><br>

              <span>
                @if(isset($updated_data) && $updated_data == 'view')
                  {{$user->select_option == 1 ? 'I am' : 'I am not'}}
                @else
                <select name="select_option">
                <option value="1" {{$user->select_option==1 ? 'selected' : '' }}>I am</option>
                <option value="2" {{$user->select_option==2 ? 'selected' : '' }}>I am not</option>
              </select>
              @endif
              
            a related party of the corporate debtor, as defined under section 5 (24) of the Code.</span><br><br>

              <span>I am eligible to join committee of creditors by virtue of proviso to section 21 (2) of the Code even though I am a related party of the corporate debtor.</span><br><br>


              <label>Date: @if(isset($user)) {{ ($user->submitted == 1) ? dateFm($user->date) : date("d-M-Y")}} @else {{date("d-M-Y")}} @endif</label>  <br>    
              <div>

                     
                     @if(isset($updated_data) && $updated_data == 'view')
                      <label>Place: {{isset($user->place) ? $user->place : ''}}</label>  
                     @else
                     <label>Place:</label>
                     <input type="text" name="place" id="place" value="{{isset($user->place) ? $user->place : ''}}" onKeyUp="Removefd('financialCreditorForm', 'place')" style="margin-left: 10px;width: 250px;" autocomplete="off"><br>
                     <div class="error_cls" id="error_place" style="margin-left: 55px;"></div>
                     @endif
                     
                     
              </div>

              @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formC/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
              <span><img class="profile-pic-user" src="{{ asset('public/access/media/forms/formC/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" style="float: right;"></span>
              @endif @endif<br><br><br><br>
              <span class="float-right" style="float: right;">( Signature of the claimant )</span><br><br>       


              <h2 class="text-center">VERIFICATION</h2><br>


              <p>I,{{!empty($user->signing_person_name) ? $user->signing_person_name : $cat->name}} the claimant hereinabove, do hereby verify that the contents of his proof of claim are true and correct to my Knowledge and belief and no material fact has been concealed therefrom.</p><br>

              <h5>Varified at @if(isset($user)) {{ ($user->submitted == 1) ? getDat($user->date) : date("d")}} @else {{date("d")}} @endif @if(isset($user)) {{ ($user->submitted == 1) ? getMonth($user->date) : date("M")}} @else {{date("M")}} @endif @if(isset($user)) {{ ($user->submitted == 1) ? getYear($user->date) : date("Y")}} @else {{date("Y")}} @endif</h5><br><br>


              @if(isset($user->operational_creditor_signature))
              @if($user->operational_creditor_signature != '' && file_exists('public/access/media/forms/formC/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature))
              <span><img class="profile-pic-user" src="{{ asset('public/access/media/forms/formC/documents/'.$user->unique_id.'/'.$user->operational_creditor_signature) }}" width="75" height="75" style="float: right;"></span>
              @endif @endif<br><br><br><br>
              <span class="float-right" style="float: right;">( Signature of the claimant )</span><br><br><br>

              <p>[Note: In the case of company or limited liability pertnership, the declaration and verification shall be made by the director/manager/secretary and in the case of other entities, an officer authorised for the purpose by the entity ].</p>