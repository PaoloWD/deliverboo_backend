@extends('layouts.app')

@section('content')
    <div class="bg-dashboard py-5 ">
        <div class="container h-100 overflow-auto">
            <div class="container-form rounded-4">
                <h1 class="fw-bolder custom-color">Ordini ricevuti</h1>
                <table class="table table-striped table-hover mt-3">
                    <thead class="text-white custom-bg">
                        <tr class="text-center">
                            <th scope="col">ID </th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col">Numero di telefono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Totale ordine</th>
                            <th scope="col">Data</th>
                            <th scope="col">Dettagli ordine</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order )
                        <tr class="text-center">
                            <td>
                                <h6 class="py-3">Ordine #{{ $order->id }}</h6>
                            </td>
                            <td>
                                <h6 class="py-3">{{$order->customer_name}}</h6>
                            </td>
                            <td>
                                <h6 class="py-3">{{$order->customer_address}}</h6>
                            </td>
                            <td>
                                <h6 class="py-3">{{$order->customer_phone}}</h6>
                            </td>
                            <td>
                                <h6 class="py-3">{{$order->customer_email}}</h6>
                            </td>    
                            <td>
                                <h6 class="py-3">{{ number_format($order->total_order, 2, ',', '.') }} €</h6>
                            </td>
                            <td>
                                <h6 class="py-3">{{$order->created_at}}</h6>
                            </td>    
                            <td>
                                <button class="btn btn-custom p-2 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$order->id}}" aria-expanded="false" aria-controls="collapseExample">Vedi dettagli</button>
                                <div class="collapse pt-3" id="collapseExample{{$order->id}}">
                                    <div class="card card-body">
                                        @foreach($order->dishes->groupBy('id') as $dish)
                                        <span class="fw-bold">Nome:</span> {{ $dish->first()->name }} <span class="fw-bold">Quantità:</span> {{ $dish->count() }}
                                    @endforeach
                                    </div>
                                </div>
                                     
                            </td>
                        </tr>
                         @endforeach  
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
<script>
</script>
@endsection
