@extends('layouts.app')

@section('page_title', 'Creazione prodotto')

@section('content')
  <section class="show-single-product">
    <div class="container pt-4 pb-4">
      <h4>Creazione nuovo prodotto</h4>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('products.store') }}" method="post" id="create_post_form">
        @csrf
        <div class="form-group">
          <label for="title">Titolo prodotto: </label>
          <input type="text" class="form-control" placeholder="Inserisci il nome del prodotto" name="name" value="{{ old('name') }}">
          @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Descrizione: </label>
          <textarea class="form-control" placeholder="Inserisci descrizione prodotto" name="description">{{ old('description') }}</textarea>
          @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Prezzo: </label>
          <input type="text" class="form-control" placeholder="Inserisci il prezzo del prodotto" name="price" value="{{ old('price') }}">
          @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group text-center">
          <input type="submit" value="Crea" class="btn btn-primary mr-2">
          <a href="{{ route('products.index') }}" class="btn btn-primary">Torna alla Home</a>
        </div>
      </form>
    </div>
  </section>
@endsection
