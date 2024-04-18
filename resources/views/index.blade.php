@extends('layout')
@section('content')
<div class="d-flex justify-content-center">
    <div class="container">
        <div class="row">
            @foreach ($legos as $i => $item)
                @if($i % 3 == 0)
                    <div class="clearfix visible-md-block"></div>
                @endif
                <div class="col">
                    <div class="card mb-4" style="width: 18rem; height: 36rem">
                        <img src="{{ asset('storage/images/' . $item->image_url) }}" alt="Product Image" width="240px" height="200px">
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text">{{$item->price}}</p>

                        </div>
                        <a href="{{route('legos.show',$item->id)}}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
