<div class="form-group {{isset($colMd)?$colMd:''}}">
                  <label for="exampleInputEmail1">{{$label}} <span class="required_cls">{{isset($comp) ? $comp : ''}}</span></label>
                 <input type="file" class="form-control" accept="{{isset($accept) ? $accept : ''}}" name="{{$name}}" id="{{$name}}" onKeyUp="Removef('{{$name}}')">
                  <div class="error_cls" id="error_{{$name}}"></div>
                </div>