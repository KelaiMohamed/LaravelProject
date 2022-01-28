@extends('layouts.app')
@section('content')
    
<div class="favourite-place">
<div class="container">
    <a href="{{ route('AdForm') }}" style="margin-bottom:10px" class="btn btn-primary btn-lg active d-flex justify-content-center" role="button" aria-pressed="true">Ajouter Une Annonce</a>
    <div class="row">       
        @foreach ($ads_data as $elm)          
        <div class="col-xl-3 col-lg-4 col-md-2">
            <div class="single-place mb-30">
                <div class="place-img">
                    <img src="{{ Storage::url($elm->image_path) }}" alt="">
                </div>
                <div class="place-cap">
                    <div class="place-cap-top">
                        <h3><a href="#">{{$elm->title}}</a></h3>
                    </div>
                    <div class="place-cap-bottom">  
                        <ul>
                            <li><i class="far fa-clock"></i>{{$elm->time_in_days}} Days</li>
                            <li><i class="fas fa-map-marker-alt"></i>{{$elm->ville}}</li>
                            <a style="width:200px;margin-top:10px" class="btn btn-primary btn-xs" href="{{ route('updateAd', ['id' => $elm->id]) }}" role="button">Edit</a>
                            <a style="width:200px;margin-top:15px" class="btn btn-primary btn-xs" href="{{ route('deleteAd', ['id' => $elm->id]) }}" role="button">Delete</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
        @endforeach                  
    </div>
</div>
</div>

@endsection