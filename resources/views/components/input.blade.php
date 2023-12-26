<div class="form-group {{isset($colMd)?$colMd:''}}">
                  <label for="exampleInputEmail1">{{$label}} <span class="required_cls">{{isset($comp) ? $comp : ''}}</span></label>
                  <input type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{$value ?? ''}}" onKeyUp="Removef('{{$name}}')" class="form-control" placeholder="{{isset($placeholder) ? $placeholder : ''}}" autocomplete="off">
                  @if($type == 'password')
                  <input type="checkbox" id="showPassword" onclick="showPwd('password');" autocomplete="off"> Show password
                  @endif

                  <div class="error_cls" id="error_{{$name}}"></div>
                </div>