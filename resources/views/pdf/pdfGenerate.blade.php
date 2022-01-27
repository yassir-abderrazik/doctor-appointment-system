<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>

<body>
    <center>
        <h1 style="text-align: center;color: red;">Rendez-vous Informations</h1>
    </center>
    <div class="margin-top: 20px">
        <p style="font-size: 30px"> Nom docteur: {{ $appointment->doctor->name}}</p>
        <p style="font-size: 30px"> Docteur spécialité: {{ $appointment->doctor->speciality}}</p>
        <p style="font-size: 30px"> Date de départ: {{ $appointment->start}}</p>
        <p style="font-size: 30px"> Date de Fin : {{ $appointment->end}}</p>
    </div>
</body>

</html>
