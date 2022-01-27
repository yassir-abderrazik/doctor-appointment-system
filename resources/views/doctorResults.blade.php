@extends('layouts.welcome')

@section('content')

    <div class="container my-3">
        <div class="row">
            <div class="col-md-3 rounded-form-home" style="background-color: #DCDCDC">
                {{-- Formulaire de recherche des docteurs START --}}
                <form class="p-3" action="{{ route('getDoctor') }}" method="GET">
                    @csrf
                    <h1 class="text-center">Recherche</h1>
                    <hr>
                    <div class="form-group">
                        <label for="specialty">Spécialité du médecin :</label>
                        <select class="form-control" id="speciality" name="speciality">
                            @foreach ($specialties as $speciality)
                                <option value="{{ $speciality->specialty }}">
                                    {{ $speciality->specialty }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Region">Région :</label>
                        <select class="form-control" id="ville" name="ville">
                            @foreach ($cities as $city)
                                <option value="{{ $city->ville }}">{{ $city->ville }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Tarifs :</label>
                        <select class="form-control" id="tarif" name="tarif">
                            <option value="inf250">
                                inférieur à 250 DH</option>
                            <option value="sup250">Supérieur à 250 DH </option>
                        </select>
                    </div><br>
                    <center>
                        <button type="submit" class="btn btn-light">Chercher</button>
                    </center>
                </form>
                {{-- Formulaire de recherche des docteurs START --}}
            </div>
            {{-- afficher les docteurs disponibles START --}}
            <div class="col-md-9 my-3">
                @foreach ($doctors as $doctor)
                    <div class="container  my-3" style="background-color: #E9ECEF;">
                        <div class="row">
                            <div class="col-md-3 my-3">
                                <img src="{{ '/storage/' . $doctor->profilePhoto }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6 my-3">
                                <h2 class="h2" style="color: #1CAEC9"> {{ $doctor->doctor->name }}</h2>
                                Spécialité : {{ $doctor->speciality }} <br>
                                Ville : {{ $doctor->ville }} <br>
                                Prix : {{ $doctor->tarif }} <br>
                            </div>
                            <div class="col-md-3 my-3">
                                <form class="w-100 h-100"
                                    action="{{ route('takeAppointment', ['id' => $doctor->doctor->id]) }}" method="GET">

                                    <button type="submit" class="w-100 h-100 btn text-light"
                                        style="background-color: #1CAEC9">FIXER UN RDV</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- afficher les docteurs disponibles END --}}
        </div>
    </div>

@endsection
