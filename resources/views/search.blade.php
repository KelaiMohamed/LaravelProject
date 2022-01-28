@extends('layouts.app')
@section('content')
<div class="favourite-place">
    <div class="container">
    <h4 class="mb-3 text-center">Filtrer par :</h4>
    <h4 class="mb-3">Type d'Hébergement</h4>

    <a class="btn btn-primary" href="{{route('searchByType',['type'=>1])}}" role="button">Appartements</a>         
    <a class="btn btn-primary" href="{{route('searchByType',['type'=>2])}}" role="button">Hotels</a> 
    <a class="btn btn-primary" href="{{route('searchByType',['type'=>3])}}" role="button">Villas</a> 
    <a class="btn btn-primary" href="{{route('searchByType',['type'=>4])}}" role="button">Auberge</a> 
    <a class="btn btn-primary" href="{{route('searchByType',['type'=>5])}}" role="button">Maisons</a> 

        
    <h4 class="mb-3">Prix d'Hébergement</h4>
        
    <a class="btn btn-primary" href="{{route('prixL')}}" role="button">Lowest First</a> 
    <a class="btn btn-primary" href="{{route('prixH')}}" role="button">Highest First</a>     
    
    <h4 class="mb-3">temps et Etoiles</h4>

    <a class="btn btn-primary" href="{{route('searchByCreationTime')}}" role="button">Nearest First</a>     
    <a class="btn btn-primary" href="{{route('searchBystars')}}" role="button">Etoiles</a>
        
    <h4 class="mb-3 text-center">{{ count($ad) }} : Hébergements trouvés</h4>   
    <!-- Ads -->
    <div class="row">
        @foreach ($ad as $elm)          
        <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-place mb-30">
                <div class="place-img">
                    <img src="{{ Storage::url($elm->image_path) }}" alt="">
                </div>
                <div class="place-cap">
                    <div class="place-cap-top">
                        <span><i class="fas fa-star"></i><span>{{ $elm->stars }}</span> </span>
                        <h3><a href="{{ route('showAd', ['id'=> $elm->id]) }}">{{$elm->title}}</a></h3>
                        <p class="dolor">{{$elm->price}}MAD <span>/ Per Person</span></p>
                    </div>
                    <div class="place-cap-bottom">
                        <ul>
                            <li><i class="far fa-clock"></i>{{$elm->time_in_days}} Days</li>
                            <li><i class="fas fa-map-marker-alt"></i>{{$elm->ville}}</li>
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