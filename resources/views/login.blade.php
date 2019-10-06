{{isset($error) ? $error:''}}
<form action="{{route('checklogin')}}" method="post">
	<input type="text" name="username" placeholder="Username">
	<input type="text" name="password" placeholder="Password">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="submit">
</form>