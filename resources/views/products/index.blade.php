@extends('layouts.app')

@section('content')

    <div class="products">
        <div class="dropdown">
            <p>Categories</p>
            <div class="dropdown-content">
                @foreach($categories as $category)
                    <a href="/categories/{{$category->id}}/">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
        @foreach($products as $product)
            <a class="product-row no-link" href="{{ route('products.show', $product) }}">
                <img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->title }}" class="rounded">
                <div class="product-body">
                    <div>
                        <h5 class="product-title"><span>{{ $product->title }}</span><em>&euro;{{ $product->getPriceAttribute($product->price) }}</em></h5>
                        @unless(empty($product->description))
                            <p>{{ $product->description }}</p>
                        @endunless
                        @unless($product->discount == 0)
                            <p class="discount">Nu <strong>{{$product->discount . "%"}}</strong> korting! Originele prijs: &euro;{{$product->price}}</p>
                        @endunless
                    </div>
                    <button class="btn btn-primary">Meer info &amp; bestellen</button>
                </div>
            </a>
        @endforeach
    </div>

@endsection
