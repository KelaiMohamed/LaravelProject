@extends('layouts.app')

@section('content')
<div class="container">
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ Storage::url($ad->image_path) }}" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">{{ $ad->ville }}, {{$pays}}</div>
                <h1 class="display-5 fw-bolder">{{$ad->title}}</h1>
                <div class="fs-5 mb-5">
                    <span id="prix1" class="text-decoration-line-through">{{$ad->price + 20}} MAD</span>
                    <span id="prix2">{{$ad->price}}MAD</span>
                </div>
                <span>Nombre de Perdonnes</span>
                <div class="d-flex">   
                <select id="prix" class="form-select" size="3" aria-label="size 3 select example" onchange="selec()">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <a href="{{ route('reserver', ['id' => $ad->id]) }}"><button class="btn btn-outline-dark flex-shrink-0" type="button">
                    <i class="bi-cart-fill me-1"></i>
                    Réserver
                </button></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($data as $item)     
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ Storage::url($item->image_path) }}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $item->title }}</h5>
                            <!-- Product price-->
                            {{ $item->price }} MAD
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                    </div>
                </div>
            </div> 
            @endforeach              
        </div>
    </div>
</section>
</div>
<script>
    function selec(){
        document.getElementById('prix2').innerHTML = document.getElementById('prix').value*{{ $ad->price }} +" MAD";
        document.getElementById('prix1').innerHTML = document.getElementById('prix').value*{{ $ad->price }} + 20 +" MAD";

    }
</script>    
@endsection