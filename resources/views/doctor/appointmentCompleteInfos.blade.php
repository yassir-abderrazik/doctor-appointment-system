@extends('layouts.doctor')
@section('content')

    <h1 class="text-center text-primary">Patient Informations</h1>
    {{-- info du RDV + patient START --}}
    <div class="row">
        <div class="col-md-4">
            <p class="h4">
                Nom : {{ $appointment->patient->name }}
            </p>
        </div>
        <div class="col-md-4">
            <p class="h4">
                Date de rendez-vous : {{ $appointment->start }}</p>
        </div>
        <div class="col-md-4">
            <p class="h4">
                Genre : {{ $appointment->gender }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="h4">
                Raisons et Symptômes : {{ $appointment->raisonsSymptômes }}
            </p>
        </div>

    </div>
    {{-- info du RDV + patient END --}}
    <h1 class="text-center text-primary">Compléter les informations</h1>
    {{-- compléter info du RDV  START --}}
    <form action="{{ route('updateAppointmentCompleteInfos', ['id' => $appointment->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="temperature">Temperature :</label>
                    <input type="text" class="form-control" id="temperature" name="temperature"
                        value="{{ $appointment->temperature }}" placeholder="Enter temperature">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tension">Tension :</label>
                    <input type="text" class="form-control" id="tension" name="tension"
                        value="{{ $appointment->tension }}" placeholder="Enter tension">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="poids">Poids :</label>
                    <input type="text" class="form-control" id="poids" name="poids" value="{{ $appointment->poids }}"
                        placeholder="Enter poids">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="allergies">Allergies :</label>
                    <input type="text" class="form-control" id="allergies" name="allergies"
                        value="{{ $appointment->detectionAllergies }}" placeholder="Enter allergies">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="medicaments">Medicaments :</label>
                    <input type="text" class="form-control" id="medicaments" name="medicaments"
                        value="{{ $appointment->medicaments }}" placeholder="Enter medicaments">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
            </div>
        </div>
        <center>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </center>
    </form>
        {{-- compléter info du RDV  END --}}

@endsection
