<style>
    .padding {
        padding: 100px;
        color: white;
    }

    .padding-1 {
        padding: 20px;
    }

    .image-bg {
        height: 150px;
        width: 100%;
        background-color: #000000;
        border-bottom: solid 5px #EC2E88;
    }

    .card {
        background-color: #222222;
        height: 300px;
        width: 100%;
    }

    .text {
        font-family: Georgia, serif;
        font-size: 17px;
        letter-spacing: 2px;
        word-spacing: 2px;
        color: #ffff;
        font-weight: 400;
        text-decoration: none;
        font-style: normal;
        font-variant: normal;
        text-transform: none;
    }

    ul {
        list-style-type: square;
        list-style-position: outside;
    }

    li {
        padding: 8px;
        margin: 0px;
    }
</style>
{{-- Valider RDV contenu START  --}}

<div class="padding">
    <div class="image-bg">
        <div class="padding-1">

            <h1 style=" font-size: 40px"><strong style="color: #EC2E88;">DOC</strong>MAROC</h1>
        </div>
    </div>
    <div class="card">
        <div class="padding-1">

            <p class="text">
                Bonjour, votre rendez-vous a été validé Mr/Mme {{ $appointment->patient->name }} .
            </p>
            <p class="text">
            <ul>
                <li>Nom du docteur : {{ $appointment->doctor->name }}</li>
                <li>Date de rendez-vous : {{ $appointment->start }}</li>
            </ul>
            </p>
            {{-- <center>
                <a href="{{ route('appointmentCompleteInfos', [ 'id' =>  $appointment->id ]) }}" class="myButton" style="background-color: #EC008C;padding: 20px;color:white; font-size: 15px">
                    Suivre</a>
            </center> --}}
        </div>
    </div>
    <div class="image-bg">
        <div class="padding-1">
            <p class="text">Adresse: Avenue Mohammed V, 40000 Marrakech, Maroc</p>
            <p class="text">Email: docmaroc@gmail.com</p>
        </div>
    </div>
</div>
{{-- Valider RDV contenu END  --}}
