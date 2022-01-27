@extends('layouts.doctor')
@section('content')


    @if (!empty($data))
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 text-center">
                    {{-- afficher les informations STARt --}}
                    <div class=" p-3 w-100 m-3" style="background-color: white;">
                        <img src="{{ asset('storage/' . $data->profilePhoto) }}" alt="" height="150px">
                        <h3 class="mt-2" style="color: #2ab7ca;">{{ Auth::user()->name }}</h3>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <strong class="badge badge-secondary" style="font-size: 15px;"> Email : </strong>
                            </div>
                            <div class="col-md-8">

                                {{ Auth::user()->email }}
                            </div>
                        </div>
                        <div class="row  mt-3">
                            <div class="col-md-4">
                                <strong class="badge badge-secondary" style="font-size: 15px;"> specialité : </strong>
                            </div>
                            <div class="col-md-8">

                                {{ $data->speciality }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <strong class="badge badge-secondary" style="font-size: 15px;"> ville : </strong>
                            </div>
                            <div class="col-md-8">{{ $data->ville }}</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><strong class="badge badge-secondary" style="font-size: 15px;"> numeroTel
                                    : </strong>
                            </div>
                            <div class="col-md-8">
                                {{ $data->numeroTel }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><strong class="badge badge-secondary" style="font-size: 15px;"> tarif :
                                </strong>
                            </div>
                            <div class="col-md-8">
                                {{ $data->tarif }} DH
                            </div>
                        </div>
                                            {{-- afficher les informations END --}}



                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modelId">
                            Modifier
                        </button>

                        <!-- Modal -->
                        {{-- modifier les informations START --}}
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="m-3" action="{{ route('doctorInfoUpdate') }}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            @method('PUT')
                                            @csrf
                                            <div class="text-center">
                                                <h4>Modifier vos informations <svg xmlns="http://www.w3.org/2000/svg"
                                                        width="30" height="30" fill="currentColor"
                                                        class="bi bi-arrow-down-square-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z" />
                                                    </svg></h4>
                                            </div>
                                            <div class="form-group ">
                                                <label for="speciality" class="form-label">Spécialité :</label>

                                                <select class="form-control" id="speciality" name="speciality">
                                                    <option value="{{ $data->speciality }}" selected>{{ $data->speciality }}
                                                    </option>

                                                    @foreach ($specialties as $speciality)
                                                        <option value="{{ $speciality->specialty }}">
                                                            {{ $speciality->specialty }}</option>
                                                    @endforeach
                                                </select>
                                                @error('speciality')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label for="ville" class="form-label">ville :</label>
                                                <select class="form-control" id="ville" name="ville">
                                                    <option value="{{ $data->ville }}" selected>{{ $data->ville }}
                                                    </option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->ville }}">{{ $city->ville }}</option>
                                                    @endforeach
                                                </select>
                                                @error('ville')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label for="numeroTel" class="form-label">Numéro de téléphone :</label>
                                                <input id="numeroTel" type="text" class="form-control" name="numeroTel"
                                                    value="{{ $data->numeroTel }}">
                                                @error('numeroTel')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label for="tarif" class="form-label text-md-right">Tarif (DH):</label>
                                                <input id="tarif" type="number" class="form-control" name="tarif"
                                                    value="{{ $data->tarif }}">
                                                @error('tarif')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label for="profilePhoto" class="form-label">photo de profile:</label>
                                                <input id="profilePhoto" type="file" class="form-control-file"
                                                    name="profilePhoto">
                                                @error('profilePhoto')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- modifier les informations END --}}
                    </div>

                </div>
            </div>
        </div>
    @else
        <a href="{{ route('doctor') }}" class="btn btn-lg ">
            <h1 class="h5">continue</h1>
        </a>

    @endif
@endsection
