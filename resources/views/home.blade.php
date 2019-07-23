@extends('layouts.app')

@section('content')
<section class="show-single-product">
  <div class="container pt-4 pb-4">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Dashboard</div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      You are logged in!
                      <br>

                      @if (Auth::user()->hasRole('admin'))
                        Sei un amministratore
                      @elseif (Auth::user()->hasRole('customer'))
                        Sei un cliente
                      @else
                        Non sei nè amministratore nè cliente
                      @endif

                      <br>

                      @if (Auth::user()->can('edit_product'))
                        Sei un admin, quindi puoi visualizzare e gestire i prodotti
                      @elseif (Auth::user()->can('view_product'))
                        Puoi solo vedere i prodotti
                      @else
                        Non puoi fare niente
                      @endif
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
