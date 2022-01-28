@extends('layouts.app')

@section('content')
<div class="container">
<div class="progress-table-wrap">
	<div class="progress-table">
		<div class="table-head">
			<div class="serial">#</div>
			<div class="country">Title</div>
            <div class="country">Ville</div>
            <div class="country">Time</div>
            <div class="country">Prix</div>
			<div class="country">Actions</div>
		</div>
        @foreach ($ads as $item)          
		    <div class="table-row">
                <div class="serial"></div>
                <div class="country">{{ $item->title }}</div>
                <div class="country">{{ $item->ville }}</div>
                <div class="country">{{ $item->created_at }}</div>
                <div class="country">{{ $item->price }} MAD</div>
                <div class="country">
                    <a href="{{route('deleteReservation', ['id'=> $item->id])}}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Delete</a>
                </div>    
            </div>	
        @endforeach
							             
	</div>
</div>
</div>


@endsection
