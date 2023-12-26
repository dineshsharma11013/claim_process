<div class="form-group {{isset($colMd)?$colMd:''}}">
                  <label for="exampleInputEmail1">{{$label}} <span class="required_cls">{{isset($comp) ? $comp : ''}}</span></label>
                  <textarea class="form-control" name="{{$name}}" id="{{$name}}" onKeyUp="Removef('{{$name}}')"></textarea>
                  <div class="error_cls" id="error_{{$name}}"></div>
                </div>