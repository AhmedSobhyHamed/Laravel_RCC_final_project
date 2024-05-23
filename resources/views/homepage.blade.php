@extends('master')
@section('title','home')
@section('body')
        <section class="vh-100">
        <div id="carouselExampleCaptions" class="carousel slide h-100">
            <div class="carousel-indicators">
                @foreach($slids as $slide)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" class="@if($loop->first) active @endif" aria-current="true" aria-label="Slide {{$loop->iteration}}"></button>
                @endforeach
            </div>
            <div class="carousel-inner h-100">
                @foreach($slids as $slide)
                <div class="carousel-item @if($loop->first) active @endif h-100">
                    <img src="{{ asset('storage/'.$slide->image) }}" class="d-block mx-auto h-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-dark">
                        <h5>{{ $slide->title }}</h5>
                        <p>{{ $slide->subtitle }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </section>
        <section class="mt-5">
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="{{ asset('storage/'.$product->image) }}" alt="" class="card-img-top">
                            <div class="card-body">
                                <h2 class="card-title">{{ $product->name }}</h2>
                                <div class="card-text">{!! $product->context !!}</div>
                                <div><a class="card-link" href="{{ url('product/'.$product->id) }}">read more</a></div>
                                <div><a class="card-link" href="{{ route('product',$product->id) }}">read more</a></div>
                                <div><a class="card-link" href="{{ route('product',$product) }}">read more</a></div>
                            </div>
                            <div class="card-footer d-flex justify-content-around">
                                <del class="text-danger">{{ $product->price }}EGP</del>
                                <span class="text-success">{{ $product->price_sale }}EGP</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection