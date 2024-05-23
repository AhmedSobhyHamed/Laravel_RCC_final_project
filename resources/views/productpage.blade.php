@extends('master')
@section('title',$product->name)
@section('body')
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h2 class="">{{ $product->name }}</h2>
                        <div class="">{!! $product->context !!}</div>
                        <div class="d-flex justify-content-start">
                            <del class="text-danger">{{ $product->price }}EGP</del>
                            <span class="text-success">{{ $product->price_sale }}EGP</span>
                        </div>
                        @auth
                        <form action="{{route('order')}}" method="post">
                            @csrf
                            <input type="hidden" name="prdct_id" value="{{$product->id}}">
                            <label for="" class="form-label mt-4">how many:</label>
                            <input type="number" class="form-control" name="count" id="">
                            <button type="submit" class="btn mt-5 btn-primary">order now</button>
                        </form>
                        @else
                        <a href="{{route('login')}}" class="btn btn-primary">log in</a>
                        <a href="{{route('register')}}" class="btn btn-primary">sign up</a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
@endsection