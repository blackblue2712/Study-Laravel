<form action="{{route('postForm')}}" method="post">
	<input type="text" name="name">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit">
</form>