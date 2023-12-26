<div>
<label for="exampleInputEmail1">Select Forms </label>

{!! Form::select('form[]', Config::get('site.formNames'),$formNm, ['id' => 'form', 'onchange' =>'Removef("form");', 'class'=>'form-control', 'autocomplete' => 'off', 'multiple'=>'multiple']) !!}

</div>







<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script type="text/javascript">
  $('#form').select2();
</script>