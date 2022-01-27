@extends('layouts.doctor')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nom et prénom</th>
                <th scope="col">Départ</th>
                <th scope="col">Fin</th>

                <th scope="col">Plus d'information</th>
                <th scope="col">Validation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $appointment)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->start }}</td>
                    <td>{{ $appointment->end }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal{{ $index + 1 }}">
                            info
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $index + 1 }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Informations</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- afficher plus d'infos du RDV STARt --}}

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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                                    </div>
                                    {{-- afficher plus d'infos du RDV END --}}

                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{-- Valider un RDV STARt --}}

                        <form action="{{ route('validateAppointment', $appointment->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn">
                                @if ($appointment->state)
                                    Validé
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                        <path fill="green"
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                                    </svg>
                                @endif
                            </button>
                        </form>
                        {{-- Valider un RDV END --}}

                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

@endsection
