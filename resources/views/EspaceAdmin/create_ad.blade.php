@extends('layouts.app')
    
    
@section('content')
<div class="container">
    <form enctype="multipart/form-data" method="POST" action="{{ route('storeAd')}}">
        @csrf
        <div class="container form-row">
            <label for="inputTitle">Title</label>
            <input name="title" type="text" class="form-control" placeholder="Title">
        </div>
        <div class="container form-row">
            <label for="inputTitle">Ville</label>
            <input name="ville" type="text" class="form-control" placeholder="Ville">
        </div>
        <div class="container form-row">
            <label for="inputImage">Image</label>
            <input name="image" type="file" class="form-control-file" id="inputImage">
        </div>
        <div class="container form-row">
            <label for="inputTime">Time (days)</label>
            <input name="time" type="number" class="form-control" placeholder="Time(days)">
        </div>
        <div class="container form-row">
            <label for="inputPrix">Prix</label>
            <input name="prix" type="number" class="form-control" placeholder="Prix">
        </div>
        <div class="container form-group">
            <small class="container form-text text-muted">Pays</small>
            <div class="custom-file">
                <select name="pays" onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                    @foreach ($pays as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
             
        <div class="container form-group">
            <small class="form-text text-muted">Type</small>
            <div class="custom-file">
                <select name="type" class="form-select" aria-label="Default select example">
                    @foreach ($types as $item)
                        <option value="{{ $item->id }}">{{ $item->type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter l'Annonce </button>
    </form>
</div> 
@endsection