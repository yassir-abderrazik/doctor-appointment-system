@extends('layouts.welcome')

@section('content')

    <div>
        <div id="backgroundimage" class="container-fluid">
            <div class="row ">
                <div class="col-md-3 offset-md-1  mt-4 ">
                    <h1 class="heading-1 pt-4 text-justify">Le site de prise
                        de <strong class="text-justify text-uppercase">rendez-vous</strong> avec les <strong>professionnels
                            de santé</strong>.
                    </h1><br>
                    <a href="" class="btn btn-lg btn-primary mt-3 "> Créer votre compte maintenant <i
                            class="bi bi-play-fill"></i>
                    </a>
                </div>
                <div class="col-md-3 offset-md-3 mt-4 bg-light opacity-form rounded-form-home d-none d-md-block d-lg-block">
                       {{-- Formulaire de recherche des docteurs START --}}
                    <form class="p-3" action="{{ route('getDoctor') }}" method="GET">
                       
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
                                <option value="sup250"> Supérieur à 250 DH </option>
                            </select>
                        </div><br>
                        <center>
                            <button type="submit" class="btn btn-primary">Chercher</button>
                        </center>
                    </form>
                       {{-- Formulaire de recherche des docteurs END --}}
                </div>
            </div>
        </div>
    </div>
    <!-- box -->
    <div class="my-4">
        <h1 class="text-center my-5">Pourquoi prendre rendez-vous avec DOCMAROC ?</h1>
        <div class="box">
            <div class="row">
                <div class=" col-md-3">
                    <div class="card">
                        <div class="imgBx">
                            <img src="{{ asset('/storage/doctor1000.jpg') }}" alt="images">
                        </div>
                        <div class="details">
                            <h2>Accédez aux disponibilités de dizaines de milliers de professionnels de santé.</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="card">
                        <div class="imgBx">
                            <img src="{{ asset('/storage/enLigneApp.jpg') }}" alt="images">
                        </div>
                        <div class="details ">
                            <h2>Prenez rendez vous en ligne.</h2>
                        </div>
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card">
                        <div class="imgBx">
                            <img src="{{ asset('/storage/mailNotif.jpg') }}" alt="images">
                        </div>
                        <div class="details">
                            <h2>Recevez des rappels automatiques par email.</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="card">
                        <div class="imgBx">
                            <img src="{{ asset('/storage/historiqueDeRendezVous.png') }}" alt="images">
                        </div>
                        <div class="details .d-block">
                            <h2>Retrouvez votre historique de rendez-vous et vos documents médicaux.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- témoignent -->
    <div class="mt-5  ">
        <div class="d-none d-md-block d-lg-block ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#0099ff" fill-opacity="1"
                    d="M0,160L40,165.3C80,171,160,181,240,202.7C320,224,400,256,480,229.3C560,203,640,117,720,85.3C800,53,880,75,960,101.3C1040,128,1120,160,1200,154.7C1280,149,1360,107,1400,85.3L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                </path>
            </svg>
        </div>
        <div style="background-color: #0099ff;" class="">
            <div class="container">
                <h1 class="text-center mb-2"> <span class="badge badge-light">Les praticiens témoignent</span></h1>
                <div class="row mt-3">
                    <div class="col-md-4 mb-5">
                        <div class="bg-particiens p-3">
                            <div class="row ">
                                <div class="col-md-5 mt-3">
                                    <img src="{{ asset('/storage/journaliste.jpg') }}" alt="" class="img-thumbnail">
                                </div>
                                <div class="col-md-7 mt-4 text-center">
                                    <h4>Mariem LEKFEL</h4>
                                    <p>journaliste</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p>
                                    Les services de DOCMAROC me rendent énormément service au quotidien, cela me fait gagner
                                    un temps considérable sur mes consultations.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="bg-particiens p-3">
                            <div class="row ">
                                <div class="col-md-5 mt-3">
                                    <img src="{{ asset('/storage/journaliste.jpg') }}" alt="" class="img-thumbnail">
                                </div>
                                <div class="col-md-7 mt-4 text-center">
                                    <h4>Mariem LEKFEL</h4>
                                    <p>journaliste</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p>
                                    Les services de DOCMAROC me rendent énormément service au quotidien, cela me fait gagner
                                    un temps considérable sur mes consultations.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="bg-particiens p-3">
                            <div class="row ">
                                <div class="col-md-5 mt-3">
                                    <img src="{{ asset('/storage/journaliste.jpg') }}" alt="" class="img-thumbnail">
                                </div>
                                <div class="col-md-7 mt-4 text-center">
                                    <h4>Mariem LEKFEL</h4>
                                    <p>journaliste</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p>
                                    Les services de DOCMAROC me rendent énormément service au quotidien, cela me fait gagner
                                    un temps considérable sur mes consultations.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- témoignent end -->
@endsection
