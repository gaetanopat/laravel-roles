@extends('layouts.app')

@section('page_title', 'Visualizzazione prodotto')

@section('content')
  <section class="show-single-product section-flex">
    <div class="container pt-4 pb-4">
      <div class="card" style="width: 40rem;">
        <div class="card-body">
          <h5 class="card-title">Prodotto: {{ $product->id }}</h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Titolo prodotto:</strong> {{ $product->name }}</li>
          <li class="list-group-item"><strong>Descrizione:</strong> {{ $product->description }}</li>
          <li class="list-group-item"><strong>Prezzo:</strong> {{ $product->price }}</li>
        </ul>
        <div class="card-body">
          <a href="{{ route('products.edit', $product->id) }}" class="card-link">Modifica prodotto</a>
          <a href="{{ route('products.index') }}" class="card-link">Torna alla Gestione dei Prodotti</a>
        </div>
      </div>
    </div>
  </section>
@endsection
