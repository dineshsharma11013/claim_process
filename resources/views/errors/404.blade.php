<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>{{company()}}</title>
</head>
<style type="text/css">
	/* Red */
.danger {
  border-color: #f44336;
  color: red;
  background-color: #F6F6F6;
}

.danger:hover {
  background: #f44336;
  color: white;
}
</style>
<body style="background-color: #F6F6F6;">
	
@php 

	$url = url('/');



@endphp


<div style="text-align: center;margin-top: 100px;">
<img src="{{asset('public/access/error/404.png')}}" width="400" /><br>
<button onclick="location.href = '{{url($url)}}';" class="danger" style="border-radius: 20px;font-size: 18px;">Go to Home</button>
</div>



</body>
</html>
