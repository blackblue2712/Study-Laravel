Login success

<!-- --Kiểm tra đang nhập hay chưa -->
@if(Auth::check())
	@if(isset($user))

		<br>
		{{'Username: ' . $user->name}}
		<br>
		{{'Email: ' . $user->email}}
		<br>
		<a href="{{url('logout')}}">Logout</a>

	@endif
@else
	
	<h2>You need to login first</h2>

@endif