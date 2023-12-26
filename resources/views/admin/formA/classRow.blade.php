              
              <div class="divClass" id="divClass_{{$length}}">

                <div class="form-group col-md-5">
                  <label>Classes of creditors, if any, under clauses (b) of sub-section (6A) of section 21, ascertained by the interim resolution professional </label>
                  <input type="text" name="creditor_classess[]" id="creditor_classess" value="" onclick="Removef('creditor_classess')" class="form-control" autocomplete="off">
                  <div class="error_cls" id="error_creditor_classess"></div>
                  </div>

                <div class="form-group col-md-2" style="padding-top: 20px">
                  <label for="exampleInputEmail1"> AR-1</label>
                  <select class="form-control" name="ar1[]" id="ar1" onchange='Removef("ar1");' autofocus="off" autocomplete="off">  
                   <option value="">Please Select</option>
                   @foreach($ips_nms as $ik=>$iv)
                    <option value="{{$ik}}">{{$iv}}</option>
                  @endforeach
                  </select>
                
                  <div class="error_cls" id="error_ar1"></div>
                </div>

                <div class="form-group col-md-2" style="padding-top: 20px">
                  <label for="exampleInputEmail1"> AR-2</label>
                  <select class="form-control" name="ar2[]" id="ar2" onchange='Removef("ar2");' autofocus="off" autocomplete="off">  
                   <option value="">Please Select</option>
                   @foreach($ips_nms as $ik=>$iv)
                    <option value="{{$ik}}">{{$iv}}</option>
                  @endforeach
                  </select>
                
                  <div class="error_cls" id="error_ar2"></div>
                </div>

                <div class="form-group col-md-2" style="padding-top: 20px">
                  <label for="exampleInputEmail1"> AR-3</label>
                  <select class="form-control" name="ar3[]" id="ar3" onchange='Removef("ar3");' autofocus="off" autocomplete="off">  
                   <option value="">Please Select</option>
                   @foreach($ips_nms as $ik=>$iv)
                    <option value="{{$ik}}">{{$iv}}</option>
                  @endforeach
                  </select>
                
                  <div class="error_cls" id="error_ar3"></div>
                </div>

                <div class="col-md-1" style="padding-top: 50px">
                  <button type="button" onclick="addRow('debtorClassDiv','divClass')"><i class="fa fa-fw fa-plus-square"></i></button> 
                  <button type="button" onclick="delRow('divClass_{{$length}}')"><i class="fa fa-fw fa-minus-circle"></i></button>
                </div>

            </div>    





