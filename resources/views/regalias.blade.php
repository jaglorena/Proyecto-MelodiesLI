@extends('layouts.app')

@section('title', 'Regalías - Melodies Li')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Regalías</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col"># de reproducciones</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalSum = 0; @endphp
                    @if (isset($reproducciones) && count($reproducciones) > 0)
                        @foreach($reproducciones as $registro)
                            @php
                                $total = $registro->cantidad_reproducciones * $monto;
                                $totalSum += $total;
                            @endphp
                            <tr>
                                <td>{{ $registro->titulo }}</td>
                                <td>{{ $registro->cantidad_reproducciones }}</td>
                                <td>$ {{ number_format($total, 2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"><strong>Total Sumado</strong></td>
                            <td><strong>$ {{ number_format($totalSum, 2) }}</strong></td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="3" class="text-center">No hay regalías registradas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
