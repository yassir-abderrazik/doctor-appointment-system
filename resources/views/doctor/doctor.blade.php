@extends('layouts.doctor')
@section('content')

@if($info)
@if($information)
{{-- Calendrier des RDV START --}}
<div id="calendar"></div>
{{-- Calendrier des RDV END --}}

@else


{{-- Si le docteur n'a pas remplis ses infos ville spécialité START --}}
<form class="mt-3" method="POST" action="{{ route('doctorInfoStore') }}" enctype="multipart/form-data">
    @csrf
    <div class="text-center">
        <h4>Vos informations <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-down-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z" />
            </svg></h4>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="speciality" class="col-md-6 col-form-label text-md-right">Spécialité :</label>
                <div class="col-md-6">
                    <select class="form-control" id="speciality" name="speciality">
                        <option value="{{ old('speciality' ?? null)}}">{{ old('speciality' ?? null)}}</option>
                        @foreach($specialties as $speciality)
                        <option value="{{$speciality->specialty}}">{{$speciality->specialty}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('speciality')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="ville" class="col-md-6 col-form-label text-md-right">ville :</label>
                <div class="col-md-6">
                    <select class="form-control" id="ville" name="ville">
                        <option value="{{ old('ville' ?? null)}}">{{ old('ville' ?? null)}}</option>
                        @foreach($cities as $city)
                        <option value="{{$city->ville}}">{{ $city->ville}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('ville')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="numeroTel" class="col-md-6 col-form-label text-md-right">Numéro de téléphone :</label>
                <div class="col-md-6">
                    <input id="numeroTel" type="text" class="form-control" name="numeroTel" value="{{ old('numeroTel' ?? null)}}">
                </div>
            </div>
            @error('numeroTel')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="tarif" class="col-md-6 col-form-label text-md-right">Tarif (DH):</label>
                <div class="col-md-6">
                    <input id="tarif" type="number" class="form-control" name="tarif" value="{{ old('tarif' ?? null)}}">
                </div>
            </div>
            @error('tarif')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="profilePhoto" class="col-md-6 col-form-label text-md-right">photo de profile:</label>
                <div class="col-md-6">
                    <input id="profilePhoto" type="file" class="form-control-file" name="profilePhoto" value="{{ old('profilePhoto' ?? null)}}">
                </div>
            </div>
            @error('profilePhoto')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <center>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </center>
</form>
{{-- Si le docteur n'a pas remplis ses infos ville spécialité END --}}


@endif
@else


{{-- Si le docteur n'a pas remplis son créneu START --}}
<form class="mt-3" method="POST" action="{{ route('doctorTimeTablePost') }}">
    @csrf

    <div class="text-center">
        <h4>Les jours de travail <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-down-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z" />
            </svg></h4>
    </div>
    <!-- Lundi  -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="isAvailableOnMonday" class="col-md-6 col-form-label text-md-right">Lundi :</label>
                <div class="col-md-6">
                    <select class="form-control @error('isAvailableOnMonday') is-invalid @enderror" id="isAvailableOnMonday" name="isAvailableOnMonday">
                        <option value="1" @if (old('isAvailableOnMonday')==1) selected="selected" @endif>oui</option>
                        <option value="0" @if (old('isAvailableOnMonday')==0) selected="selected" @endif>non</option>
                    </select>
                </div>
            </div>
            @error('isAvailableOnMonday')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="mondayStartingTime" class="col-md-6 col-form-label text-md-right">Heure d'ouverture :</label>
                <div class="col-md-6">
                    <input id="mondayStartingTime" type="time" class="form-control" name="mondayStartingTime" value="{{ old('mondayStartingTime' ?? null )}}">
                </div>
            </div>
            @error('mondayStartingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="mondayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de fermeture :</label>
                <div class="col-md-6">
                    <input id="mondayClosingTime" type="time" class="form-control" name="mondayClosingTime">
                </div>
            </div>
            @error('mondayClosingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- mardi -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="isAvailableOnTuesday" class="col-md-6 col-form-label text-md-right">Mardi :</label>
                <div class="col-md-6">
                    <select class="form-control" id="isAvailableOnTuesday" name="isAvailableOnTuesday">
                        <option value="1" @if (old('isAvailableOnTuesday')==1) selected="selected" @endif>oui</option>
                        <option value="0" @if (old('isAvailableOnTuesday')==0) selected="selected" @endif>non</option>

                    </select>
                </div>
            </div>
            @error('isAvailableOnTuesday')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="tuesdayStartingTime" class="col-md-6 col-form-label text-md-right">Heure d'ouverture :</label>
                <div class="col-md-6">
                    <input id="tuesdayStartingTime" type="time" class="form-control" name="tuesdayStartingTime">
                </div>
            </div>
            @error('tuesdayStartingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="tuesdayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de fermeture :</label>
                <div class="col-md-6">
                    <input id="tuesdayClosingTime" type="time" class="form-control" name="tuesdayClosingTime">
                </div>
            </div>
            @error('tuesdayClosingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- mercredi -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="isAvailableOnWednesday" class="col-md-6 col-form-label text-md-right">Mercredi :</label>
                <div class="col-md-6">
                    <select class="form-control" id="isAvailableOnWednesday" name="isAvailableOnWednesday">
                        <option value="1" @if (old('isAvailableOnWednesday')==1) selected="selected" @endif>oui</option>
                        <option value="0" @if (old('isAvailableOnWednesday')==0) selected="selected" @endif>non</option>

                    </select>
                </div>
            </div>
            @error('isAvailableOnWednesday')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="wednesdayStartingTime" class="col-md-6 col-form-label text-md-right">Heure d'ouverture :</label>
                <div class="col-md-6">
                    <input id="wednesdayStartingTime" type="time" class="form-control" name="wednesdayStartingTime">
                </div>
            </div>
            @error('wednesdayStartingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="wednesdayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de fermeture :</label>
                <div class="col-md-6">
                    <input id="wednesdayClosingTime" type="time" class="form-control" name="wednesdayClosingTime">
                </div>
            </div>
            @error('wednesdayClosingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- jeudi -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="isAvailableOnThursday" class="col-md-6 col-form-label text-md-right">Jeudi :</label>
                <div class="col-md-6">
                    <select class="form-control" id="isAvailableOnThursday" name="isAvailableOnThursday">
                        <option value="1" @if (old('isAvailableOnThursday')==1) selected="selected" @endif>oui</option>
                        <option value="0" @if (old('isAvailableOnThursday')==0) selected="selected" @endif>non</option>
                    </select>
                </div>
            </div>
            @error('isAvailableOnThursday')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="thursdayStartingTime" class="col-md-6 col-form-label text-md-right">Heure d'ouverture :</label>
                <div class="col-md-6">
                    <input id="thursdayStartingTime" type="time" class="form-control" name="thursdayStartingTime">
                </div>
            </div>
            @error('thursdayStartingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="thursdayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de fermeture :</label>
                <div class="col-md-6">
                    <input id="thursdayClosingTime" type="time" class="form-control" name="thursdayClosingTime">
                </div>
            </div>
            @error('thursdayClosingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- vendredi -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="isAvailableOnFriday" class="col-md-6 col-form-label text-md-right">Vendredi :</label>
                <div class="col-md-6">
                    <select class="form-control" id="isAvailableOnFriday" name="isAvailableOnFriday">
                        <option value="1" @if (old('isAvailableOnFriday')==1) selected="selected" @endif>oui</option>
                        <option value="0" @if (old('isAvailableOnFriday')==0) selected="selected" @endif>non</option>
                    </select>
                </div>
            </div>
            @error('isAvailableOnFriday')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="fridayStartingTime" class="col-md-6 col-form-label text-md-right">Heure d'ouverture :</label>
                <div class="col-md-6">
                    <input id="fridayStartingTime" type="time" class="form-control" name="fridayStartingTime">
                </div>
            </div>
            @error('fridayStartingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="fridayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de fermeture :</label>
                <div class="col-md-6">
                    <input id="fridayClosingTime" type="time" class="form-control" name="fridayClosingTime">
                </div>
            </div>
            @error('fridayClosingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- samedi -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="isAvailableOnSaturday" class="col-md-6 col-form-label text-md-right">Samedi :</label>
                <div class="col-md-6">
                    <select class="form-control" id="isAvailableOnSaturday" name="isAvailableOnSaturday">
                        <option value="1" @if (old('isAvailableOnSaturday')==1) selected="selected" @endif>oui</option>
                        <option value="0" @if (old('isAvailableOnSaturday')==0) selected="selected" @endif>non</option>

                    </select>
                </div>
            </div>
            @error('isAvailableOnSaturday')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="saturdayStartingTime" class="col-md-6 col-form-label text-md-right">Heure d'ouverture :</label>
                <div class="col-md-6">
                    <input id="saturdayStartingTime" type="time" class="form-control" name="saturdayStartingTime">
                </div>
            </div>
            @error('saturdayStartingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="saturdayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de fermeture :</label>
                <div class="col-md-6">
                    <input id="saturdayClosingTime" type="time" class="form-control" name="saturdayClosingTime">
                </div>
            </div>
            @error('saturdayClosingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- dimanche -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="isAvailableOnSunday" class="col-md-6 col-form-label text-md-right">Dimanche :</label>
                <div class="col-md-6">
                    <select class="form-control" id="isAvailableOnSunday" name="isAvailableOnSunday">
                        <option value="1" @if (old('isAvailableOnSunday')==1) selected="selected" @endif>oui</option>
                        <option value="0" @if (old('isAvailableOnSunday')==0) selected="selected" @endif>non</option>

                    </select>
                </div>
            </div>
            @error('isAvailableOnSunday')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="sundayStartingTime" class="col-md-6 col-form-label text-md-right">Heure d'ouverture :</label>
                <div class="col-md-6">
                    <input id="sundayStartingTime" type="time" class="form-control" name="sundayStartingTime">
                </div>
            </div>
            @error('sundayStartingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="sundayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de fermeture :</label>
                <div class="col-md-6">
                    <input id="sundayClosingTime" type="time" class="form-control" name="sundayClosingTime">
                </div>
            </div>
            @error('sundayClosingTime')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- timeConsultation -->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label for="timeConsultation" class="col-md-6 col-form-label text-md-right">Durée de consultation (mn) :</label>
                <div class="col-md-6">
                    <input id="timeConsultation" type="number" class="form-control" name="timeConsultation">
                </div>
            </div>
            @error('timeConsultation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <center>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </center>
</form>
{{-- Si le docteur n'a pas remplis son créneu END --}}


@endif
{{-- <div class="modal hide" id="yourModalID">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Modal Header</h3>
    </div>
    <div class="modal-body">
        <p>Modal Body…</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save Changes</a>
    </div>
</div> --}}

<script src="{{ asset('js/fullcalendar.js') }}"></script>
<script src="{{ asset('js/fr.js') }}"></script>

<script>
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            locale: 'fr',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            timeFormat: 'H:mm',
            events: <?php echo $data; ?>,
            eventColor: '#3eadcf',
            selectable: true,
            selectHelper: true,
            eventClick: function(calEvent) {
                if (calEvent.state) {
                    calEvent.state = 'Validé'
                } else {
                    calEvent.state = 'Non validé'
                }
                Swal.fire({
                    icon: 'info',
                    title: 'Patient informations',
                    html: `<div class="row  mt-3">
                    <div class="col-md-4">
                        <strong class="badge badge-secondary" style="font-size: 15px;"> Nom et Prénom : </strong>
                    </div>
                    <div class="col-md-8">
                        ` + calEvent.patient.name + `
                    </div>
                </div><div class="row  mt-3">
                    <div class="col-md-4">
                        <strong class="badge badge-secondary" style="font-size: 15px;"> genre : </strong>
                    </div>
                    <div class="col-md-8">
                        ` + calEvent.gender + `
                    </div>
                </div><div class="row  mt-3">
                    <div class="col-md-4">
                        <strong class="badge badge-secondary" style="font-size: 15px;"> Raisons et Symptômes : </strong>
                    </div>
                    <div class="col-md-8">
                        ` + calEvent.raisonsSymptômes + `
                    </div>
                </div><div class="row  mt-3">
                    <div class="col-md-4">
                        <strong class="badge badge-secondary" style="font-size: 15px;"> Rendez-vous  : </strong>
                    </div>
                    <div class="col-md-8">
                        ` + moment(calEvent.start).format('h:mm') +
                        ` mn  --> ` + moment(calEvent.end).format('h:mm') + `mn
                    </div>
                </div><div class="row  mt-3">
                    <div class="col-md-4">
                        <strong class="badge badge-danger" style="font-size: 15px;"> status : </strong>
                    </div>
                    <div class="col-md-8">
                    ` + calEvent.state + `
                    </div>
                </div>`,
                })
            }
        });

    });
</script>

@endsection