<div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="work_purchase_order" name="work_purchase_order" onchange="handleChange('financialCreditorFormF','work_purchase_order','work_purchase_order_file');" autocomplete="off" @if(isset($user->work_purchase_order)) @if($user->work_purchase_order=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Work order/ Purchase order</label></div>
                    </div>
                    <div class="col-md-6">
                      <input class="form-control mb-2" type="file" name="work_purchase_order_file" id="work_purchase_order_file" autocomplete="off" 
                      @if(isset($user->work_purchase_order))
                      @if($user->work_purchase_order!='on') style="display:none;" @endif
                      @else
                      @endif
                      >
                    </div>
                    </div>
                    

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="invoices" name="invoices" onchange="handleChange('financialCreditorFormF','invoices','invoices_file');" autocomplete="off" @if(isset($user->invoices)) @if($user->invoices=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Invoices</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" name="invoices_file" id="invoices_file" autocomplete="off" @if(isset($user->invoices)) @if($user->invoices!='on') style="display:none;" @endif @endif></div>
                    </div>


                    

                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" id="balance_confirmation" name="balance_confirmation" onchange="handleChange('financialCreditorFormF','balance_confirmation','balance_confirmation_file');" autocomplete="off" @if(isset($user->balance_confirmation)) @if($user->balance_confirmation=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Balance Confirmation</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" name="balance_confirmation_file" id="balance_confirmation_file"  autocomplete="off" @if(isset($user->balance_confirmation)) @if($user->balance_confirmation!='on') style="display:none;" @endif @endif></div>
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" id="any_correspondence" name="any_correspondence" onchange="handleChange('financialCreditorFormF','any_correspondence','any_correspondence_file');" autocomplete="off" @if(isset($user->any_correspondence)) @if($user->any_correspondence=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Any correspondence etc</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" name="any_correspondence_file" id="any_correspondence_file"  autocomplete="off" @if(isset($user->any_correspondence)) @if($user->any_correspondence!='on') style="display:none;" @endif @endif></div>
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" name="authorisation_letter" id="authorisation_letter" onchange="handleChange('financialCreditorFormF','authorisation_letter','authorisation_letter_file');" autocomplete="off" @if(isset($user->authorisation_letter)) @if($user->authorisation_letter=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Authorisation letter</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" name="authorisation_letter_file" id="authorisation_letter_file"   autocomplete="off" @if(isset($user->authorisation_letter)) @if($user->authorisation_letter!='on') style="display:none;" @endif @endif></div>
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" id="bank_statement" name="bank_statement" onchange="handleChange('financialCreditorFormF','bank_statement','bank_statement_file');" autocomplete="off" @if(isset($user->bank_statement)) @if($user->bank_statement=='on') checked @endif @endif> 
                    <label class="form-check-label" for="flexCheckDefault">Bank Statement</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" name="bank_statement_file" id="bank_statement_file" autocomplete="off" @if(isset($user->bank_statement)) @if($user->bank_statement!='on') style="display:none;" @endif @endif></div>
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" id="ledger_copy" name="ledger_copy" onchange="handleChange('financialCreditorFormF','ledger_copy','ledger_copy_file');" autocomplete="off" @if(isset($user->ledger_copy)) @if($user->ledger_copy=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Copy of ledger</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" name="ledger_copy_file" id="ledger_copy_file" autocomplete="off"  @if(isset($user->ledger_copy)) @if($user->ledger_copy!='on') style="display:none;" checked @endif @endif></div>
                    </div>


                    <div class="row">
                    <div class="col-md-6"><div class="form-check">
                    <input class="form-check-input" type="checkbox" name="computation_sheet" id="computation_sheet" onchange="handleChange('financialCreditorFormF','computation_sheet','computation_sheet_file');" autocomplete="off" @if(isset($user->computation_sheet)) @if($user->computation_sheet=='on') checked @endif @endif>
                    <label class="form-check-label" for="flexCheckDefault">Computation sheet</label></div></div>
                    <div class="col-md-6"><input class="form-control mb-2" type="file" name="computation_sheet_file" id="computation_sheet_file" autocomplete="off" @if(isset($user->computation_sheet)) @if($user->computation_sheet!='on') style="display:none;" @endif @endif></div>
                    </div>



                    