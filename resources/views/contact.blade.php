@extends('layouts.app')
@section('container')
<h1>This is Contact page</h1>
	
	@if(count($people))
		<ul>
			@foreach( $people as $person )
			<li>{{$person}}</li>
			@endforeach
		</ul>
	@endif

@stop

@section('footer')
<script type="text/javascript">
	//alert('here');
</script>
@stop