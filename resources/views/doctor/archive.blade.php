@extends('layouts.doctor')
@section('content')
{{-- archive des RDV START --}}
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nom et prénom</th>
            <th scope="col">Départ</th>
            <th scope="col">Fin</th>
            <th scope="col">Status</th>
            <th scope="col">Plus d'information</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $index => $appointment)
        <tr>
            <th>{{ $index+1 }}</th>
            <td>{{$appointment->patient->name}}</td>
            <td>{{$appointment->start}}</td>
            <td>{{$appointment->end}}</td>
            @if($appointment->state)
            <td>Validé</td>
            @else
            <td>Non validé</td>
            @endif
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$index+1}}">
                    info
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$index+1}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Informations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        genre :
                                    </div>
                                    <div class="col-md-6">
                                        {{ $appointment->gender }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Raisons et Symptômes :
                                    </div>
                                    <div class="col-md-6">
                                        {{ $appointment->raisonsSymptômes }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Temperature :
                                    </div>
                                    <div class="col-md-6">
                                        {{ $appointment->temperature }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Tension :
                                    </div>
                                    <div class="col-md-6">
                                        {{ $appointment->tension }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Poids :
                                    </div>
                                    <div class="col-md-6">
                                        {{ $appointment->poids }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Detection allergies :
                                    </div>
                                    <div class="col-md-6">
                                        {{ $appointment->detectionAllergies }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Medicaments :
                                    </div>
                                    <div class="col-md-6">
                                        {{ $appointment->medicaments }}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

{{-- archive des RDV END --}}

<div class="d-flex justify-content-center">
    {!! $data->links() !!}
</div>

@endsection