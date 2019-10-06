
@foreach($listBook as $value)
	{{$value->id}}
	{{$value->name}}
	<br>	
@endforeach

{!! $listBook->links() !!}
<br>
{!! $listBook->appends(['author' => 'linz'])->links() !!}