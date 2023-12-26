<div class="form-group {{isset($colMd)?$colMd:''}}">
                  <label for="exampleInputEmail1">{{$label}} <span class="required_cls">{{isset($comp) ? $comp : ''}}</span></label>
                  {!! Form::select($name, $value ?? ['' => 'Please Select'], $selected ?? null, ["onchange" =>"Removef('$name')","id" => $name,"class"=>"form-control", "placeholder"=> $placeholder ?? '', 'autocomplete'=>'off']) !!}
                  <div class="error_cls" id="error_{{$name}}"></div>
                </div>