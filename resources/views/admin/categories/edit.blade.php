@extends('layouts.admin')

@section('content')

<div class="d-flex align-items-center flex-column my-5">
    <div class="categories-container">
        <div class="input-container">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data">

                <h4>Categorie aanpassen</h4>

                <div class="form-group">
                    <label for="title">Naam</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}">
                </div>



                <button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
            </form>
            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                <button type="submit" class="form-control btn btn-outline-danger">Verwijderen</button>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
        </div>

        <div class="products-container">
            <h4>Products</h4>
            <ul>
                @foreach($category->products as $product)
                    <li>{{$product->title}}</li>
                @endforeach
            </ul>
        </div>
    </div>



</div>

@endsection
