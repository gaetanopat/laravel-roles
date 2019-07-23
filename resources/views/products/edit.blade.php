@extends('layouts.app')

@section('page_title', 'Modifica prodotto')

@section('content')
  <section class="show-single-product">
    <div class="container pb-4 pt-4">
      <h4>Modifica prodotto</h4>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('products.update', $product->id) }}" method="post" id="#edit_post_form">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="name">Nome prodotto: </label>
          <input type="text" class="form-control" placeholder="Inserisci il nome del prodotto" name="name" value="{{ old('name', $product->name) }}">
          @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Descrizione: </label>
          <textarea class="form-control" placeholder="Inserisci descrizione prodotto" name="description">{{ old('description', $product->description) }}</textarea>
          @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Prezzo: </label>
          <input type="text" class="form-control" placeholder="Inserisci il prezzo del prodotto" name="price" value="{{ old('price', $product->price) }}">
          @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group text-center">
          <input type="submit" value="Aggiorna" class="btn btn-primary mr-2">
          <a href="{{ route('products.index') }}" class="btn btn-primary">Torna alla Gestione dei Prodotti</a>
        </div>
      </form>
    </div>
  </section>
@endsection
