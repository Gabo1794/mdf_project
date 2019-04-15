@extends('admin.admin')

@section('content')

<div class="container-controlP">
    <div class="panel panel-primary container-control">
        <div class="panel-heading textCenter font-18">
            Entradas
        </div>
        <div class="panel-body textCenter">
            <p class="fas fa-cash-register font-200" id="controlEntradas">
            </p>
        </div>
    </div>
    <div class="panel panel-primary container-control">
        <div class="panel-heading textCenter font-18">
            Salidas
        </div>
        <div class="panel-body textCenter">
            <p class="fas fa-money-bill fa-fw font-200" id="controlSalidas">
            </p>
        </div>
    </div>
</div>
@endsection

@section('scriptMiembros')
@endsection