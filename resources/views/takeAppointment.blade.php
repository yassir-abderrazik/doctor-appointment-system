@extends('layouts.welcome')

@section('content')
    {{-- docteur informations  START --}}
    <div class="container my-3">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ '/storage/' . $doctor->doctor->profilePhoto }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-4">
                <h1 class="h1" style="color: #1CAEC9"> {{ $doctor->name }}</h1>
                <p style="font-size: 22px">
                    Spécialité : {{ $doctor->doctor->speciality }} <br>
                    Ville : {{ $doctor->doctor->ville }} <br>
                    Prix : <strong>{{ $doctor->doctor->tarif }} DH</strong> <br>
                    Téléphone : {{ $doctor->doctor->numeroTel }} <br>
                    Temps de consultation : {{ $doctor->timeTable->timeConsultation }} mn<br></p>

            </div>
            <div class="col-md-4">
                <h4 class="h4 text-center badge badge-primary">Temps de travail</h4>
                <p style="font-size: 15px">
                    Lundi :
                    @if (!$doctor->timeTable->isAvailableOnMonday)
                        <strong class="text-danger">Fermé</strong>
                    @else
                        {{ $doctor->timeTable->mondayStartingTime }} --> {{ $doctor->timeTable->mondayClosingTime }}
                    @endif<br>

                    Mardi :
                    @if (!$doctor->timeTable->isAvailableOnTuesday)
                        <strong class="text-danger">Fermé</strong>
                    @else
                        {{ $doctor->timeTable->tuesdayStartingTime }} -->
                        {{ $doctor->timeTable->tuesdayClosingTime }}
                    @endif <br>

                    Mercredi :
                    @if (!$doctor->timeTable->isAvailableOnWednesday)
                        <strong class="text-danger">Fermé</strong>
                    @else
                        {{ $doctor->timeTable->wednesdayStartingTime }} -->
                        {{ $doctor->timeTable->wednesdayClosingTime }}
                    @endif<br>

                    Jeudi :
                    @if (!$doctor->timeTable->isAvailableOnThursday)
                        <strong class="text-danger">Fermé</strong>
                    @else
                        {{ $doctor->timeTable->thursdayStartingTime }} -->
                        {{ $doctor->timeTable->thursdayClosingTime }}
                    @endif <br>

                    Vendredi :
                    @if (!$doctor->timeTable->isAvailableOnFriday)
                        <strong class="text-danger">Fermé</strong>
                    @else
                        {{ $doctor->timeTable->fridayStartingTime }} -->
                        {{ $doctor->timeTable->fridayClosingTime }}
                    @endif<br>

                    Samedi :
                    @if (!$doctor->timeTable->isAvailableOnSaturday)
                        <strong class="text-danger">Fermé</strong>
                    @else
                        {{ $doctor->timeTable->saturdayStartingTime->format('h:i') }} -->
                        {{ $doctor->timeTable->saturdayClosingTime->format('h:i') }}
                    @endif<br>

                    Dimanche :
                    @if (!$doctor->timeTable->isAvailableOnSunday)
                        <strong class="text-danger">Fermé</strong>
                    @else
                        {{ $doctor->timeTable->sundayStartingTime }} -->
                        {{ $doctor->timeTable->sundayClosingTime }}
                    @endif <br>
                    Substitute : @if ($doctor->timeTable->substitute)
                        $doctor->timeTable->nameSubstitute

                    @else NON @endif
                </p>
            </div>
        </div>
        {{-- docteur informations  END --}}

        <div class="row  my-3">
            {{-- formulaire de création RDV  START --}}
            @auth
                <div class="col-md-4 offset-md-4">
                    <form action="{{ route('fixerAppointment', ['id' => $doctor->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="gender">Genre :</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="{{ old('gender' ?? null) }}">{{ old('gender' ?? null) }}</option>
                                <option>Homme</option>
                                <option>Femme</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="raisonsSymptômes">Raisons et symptômes :</label>
                            <input type="text" class="form-control" id="raisonsSymptômes" name="raisonsSymptômes"
                                value="{{ old('raisonsSymptômes' ?? null) }}" placeholder="Raisons et symptômes">
                            @error('raisonsSymptômes')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date">Départ :</label>
                            <input type="date" class="form-control" id="day" name="day" placeholder="day"
                                value="{{ old('day' ?? null) }}">

                            @error('day')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </center>
                    </form>
                </div>
            @endauth
            {{-- formulaire de création RDV  END --}}

            {{-- pour créer un RDV il faut s'authentifier --}}
            @guest
                <div class="col">
                    <h4 class="text-center">Créer un <a href="/register"> compte </a>pour fixer un <strong>RENDEZ-VOUS</strong>
                    </h4>
                </div>
            @endguest
        </div>
    </div>


@endsection
