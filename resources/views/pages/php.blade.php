@extends('layouts.master')

@section('content')
	<h3>php</h3>
	{{ $author }}
	<br>
	{!! $author !!}

	@if($author == "<b>BlackBlue</b>")
		{{'origin'}}
	@else
		{{'fake'}}
	@endif

	<br>

	@for( $i = 0; $i  < 10; $i++)
		{{$i}}
	@endfor

	<br>

	<?php $arr = ['Laravel', 'PHP', 'Javascript', 'Nodejs'] ?>

	@forelse($arr as $value)
		@continue($value == 'PHP')
		{{$value}}
	@empty
		{{'Empty array'}}
	@endforelse

	{{-- Comment --}}
@endsection