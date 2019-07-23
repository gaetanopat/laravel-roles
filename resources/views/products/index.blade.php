@extends('layouts.app')

@section('page_title', 'Visualizzazione prodotti')

@section('content')
  <section class="show-all-products">
    <div class="container pt-4 pb-4">
      <h3 class="float-left">Visualizzazione prodotti</h3>
      @if (Auth::user()->can('edit_product'))
        <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Crea nuovo prodotto</a>
      @endif
      <table>
        <tr>
          <th class="text-center">ID prodotto</th>
          <th class="text-center">Nome</th>
          <th class="text-center">Descrizione</th>
          <th class="text-center">Prezzo</th>
          <th class="text-center">Azioni</th>
        </tr>
        @forelse ($products as $product)
        <tr>
          <td class="text-center"><strong>{{ $product->id }}</strong></td>
          <td class="text-center">{{ $product->name }}</td>
          <td class="text-center">{{ $product->description }}</td>
          <td class="text-center">{{ $product->price }}</td>
          <td class="text-center"><a href="{{ route('products.show', $product->id) }}">Visualizza</a>
            @if (Auth::user()->can('edit_product'))
               - <a href="{{ route('products.edit', $product->id) }}">Modifica</a> -
              <form class="form_delete" action="{{ route('products.destroy', $product->id )}}" method="post">
                <input type="submit" name="" value="Cancella">
                @method('DELETE')
                @csrf
              </form>
            @endif
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="no_products"><h1>Non ci sono prodotti</h1></td>
        </tr>
      @endforelse
      </table>

    </div>
  </section>
@endsection
