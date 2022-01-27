@extends('layouts.doctor')
@section('content')
    @if (!empty($data))
        {{-- afficher le Temps de travail STARt --}}

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Les jours</th>
                    <th scope="col">Heure d'ouverture</th>
                    <th scope="col">Heure de fermeture</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lundi
                        @if ($data->isAvailableOnMonday == true)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-check-all" viewBox="0 0 16 16">
                                <path fill="#9ACD32"
                                    d="M8.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14l.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-excel-fill" viewBox="0 0 16 16">
                                <path fill="#FF0000"
                                    d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5.884 4.68L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 1 1 .768-.64z" />
                            </svg>
                        @endif
                    </td>
                    <td>{{ $data->mondayStartingTime }}</td>
                    <td>{{ $data->mondayClosingTime }}</td>
                </tr>
                <tr>
                    <td>Mardi
                        @if ($data->isAvailableOnTuesday == true)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-check-all" viewBox="0 0 16 16">
                                <path fill="#9ACD32"
                                    d="M8.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14l.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-excel-fill" viewBox="0 0 16 16">
                                <path fill="#FF0000"
                                    d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5.884 4.68L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 1 1 .768-.64z" />
                            </svg>
                        @endif
                    </td>
                    <td>{{ $data->tuesdayStartingTime }}</td>
                    <td>{{ $data->tuesdayClosingTime }}</td>
                </tr>
                <tr>
                    <td>Mercredi
                        @if ($data->isAvailableOnWednesday == true)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-check-all" viewBox="0 0 16 16">
                                <path fill="#9ACD32"
                                    d="M8.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14l.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-excel-fill" viewBox="0 0 16 16">
                                <path fill="#FF0000"
                                    d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5.884 4.68L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 1 1 .768-.64z" />
                            </svg>
                        @endif
                    </td>
                    <td>{{ $data->wednesdayStartingTime }}</td>
                    <td>{{ $data->wednesdayClosingTime }}</td>
                </tr>
                <tr>
                    <td>Jeudi
                        @if ($data->isAvailableOnThursday == true)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-check-all" viewBox="0 0 16 16">
                                <path fill="#9ACD32"
                                    d="M8.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14l.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-excel-fill" viewBox="0 0 16 16">
                                <path fill="#FF0000"
                                    d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5.884 4.68L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 1 1 .768-.64z" />
                            </svg>
                        @endif
                    </td>
                    <td>{{ $data->thursdayStartingTime }}</td>
                    <td>{{ $data->thursdayClosingTime }}</td>
                </tr>
                <tr>
                    <td>Vendredi
                        @if ($data->isAvailableOnFriday == true)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-check-all" viewBox="0 0 16 16">
                                <path fill="#9ACD32"
                                    d="M8.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14l.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-excel-fill" viewBox="0 0 16 16">
                                <path fill="#FF0000"
                                    d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5.884 4.68L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 1 1 .768-.64z" />
                            </svg>
                        @endif
                    </td>
                    <td>{{ $data->fridayStartingTime }}</td>
                    <td>{{ $data->fridayClosingTime }}</td>

                </tr>
                <tr>
                    <td>Samedi
                        @if ($data->isAvailableOnSaturday == true)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-check-all" viewBox="0 0 16 16">
                                <path fill="#9ACD32"
                                    d="M8.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14l.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-excel-fill" viewBox="0 0 16 16">
                                <path fill="#FF0000"
                                    d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5.884 4.68L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 1 1 .768-.64z" />
                            </svg>
                        @endif
                    </td>
                    <td>{{ $data->saturdayStartingTime }}</td>
                    <td>{{ $data->saturdayClosingTime }}</td>
                </tr>
                <tr>
                    <td>Dimanche
                        @if ($data->isAvailableOnSunday == true)
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-check-all" viewBox="0 0 16 16">
                                <path fill="#9ACD32"
                                    d="M8.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14l.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-excel-fill" viewBox="0 0 16 16">
                                <path fill="#FF0000"
                                    d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5.884 4.68L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 1 1 .768-.64z" />
                            </svg>
                        @endif
                    </td>
                    <td>{{ $data->sundayStartingTime }}</td>
                    <td>{{ $data->sundayClosingTime }}</td>
                </tr>

            </tbody>
        </table>

        {{-- afficher le Temps de travail END --}}

        <div class="row">
            <div class="col-md">
                <h4>Durée de consultation : {{ $data->timeConsultation }} mn</h4>
            </div>
        </div>
        <center>
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target=".bd-example-modal-lg">Modifier</button>
        </center>

        <div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    {{-- Modifier le Temps de travail STARt --}}
                    <form class="m-3" action="{{ route('doctorTimeTablePut') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="text-center">
                            <h4>Les jours de travail <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    fill="currentColor" class="bi bi-arrow-down-square-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z" />
                                </svg></h4>
                        </div>
                        <!-- Lundi  -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="isAvailableOnMonday" class="col-md-6 col-form-label text-md-right">Lundi
                                        :</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="isAvailableOnMonday" name="isAvailableOnMonday">
                                            @if ($data->isAvailableOnMonday === null)
                                                <option value=""></option>
                                                <option value="1">oui</option>
                                                <option value="0">non</option>
                                            @else
                                                @if ($data->isAvailableOnMonday)
                                                    <option selected="selected" value="1">
                                                        oui
                                                    </option>
                                                    <option value="0">non</option>
                                                @else
                                                    <option selected="selected" value="0">
                                                        non
                                                    </option>
                                                    <option value="1">oui</option>
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                @error('isAvailableOnMonday')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="mondayStartingTime" class="col-md-6 col-form-label text-md-right">Heure
                                        d'ouverture :</label>
                                    <div class="col-md-6">
                                        <input id="mondayStartingTime" type="time" class="form-control"
                                            name="mondayStartingTime" value="{{ $data->mondayStartingTime }}">
                                    </div>
                                </div>
                                @error('mondayStartingTime')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="mondayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de
                                        fermeture :</label>
                                    <div class="col-md-6">
                                        <input id="mondayClosingTime" type="time" class="form-control"
                                            name="mondayClosingTime" value="{{ $data->mondayClosingTime }}">
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
                                    <label for="isAvailableOnTuesday" class="col-md-6 col-form-label text-md-right">Mardi
                                        :</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="isAvailableOnTuesday" name="isAvailableOnTuesday">
                                            @if ($data->isAvailableOnTuesday === null)
                                                <option value=""></option>
                                                <option value="1">oui</option>
                                                <option value="0">non</option>
                                            @else
                                                @if ($data->isAvailableOnTuesday)
                                                    <option selected="selected" value="1">
                                                        oui
                                                    </option>
                                                    <option value="0">non</option>
                                                @else
                                                    <option selected="selected" value="0">
                                                        non
                                                    </option>
                                                    <option value="1">oui</option>
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                    @error('isAvailableOnTuesday')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="tuesdayStartingTime" class="col-md-6 col-form-label text-md-right">Heure
                                        d'ouverture :</label>
                                    <div class="col-md-6">
                                        <input id="tuesdayStartingTime" type="time" class="form-control"
                                            name="tuesdayStartingTime" value="{{ $data->tuesdayStartingTime }}">
                                    </div>
                                </div>
                                @error('tuesdayStartingTime')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="tuesdayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de
                                        fermeture :</label>
                                    <div class="col-md-6">
                                        <input id="tuesdayClosingTime" type="time" class="form-control"
                                            name="tuesdayClosingTime" value="{{ $data->tuesdayClosingTime }}">
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
                                    <label for="isAvailableOnWednesday"
                                        class="col-md-6 col-form-label text-md-right">Mercredi :</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="isAvailableOnWednesday"
                                            name="isAvailableOnWednesday">
                                            @if ($data->isAvailableOnWednesday === null)
                                                <option value=""></option>
                                                <option value="1">oui</option>
                                                <option value="0">non</option>
                                            @else
                                                @if ($data->isAvailableOnWednesday)
                                                    <option selected="selected" value="1">
                                                        oui
                                                    </option>
                                                    <option value="0">non</option>
                                                @else
                                                    <option selected="selected" value="0">
                                                        non
                                                    </option>
                                                    <option value="1">oui</option>
                                                @endif
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                @error('isAvailableOnWednesday')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="wednesdayStartingTime" class="col-md-6 col-form-label text-md-right">Heure
                                        d'ouverture :</label>
                                    <div class="col-md-6">
                                        <input id="wednesdayStartingTime" type="time" class="form-control"
                                            name="wednesdayStartingTime" value="{{ $data->wednesdayStartingTime }}">
                                    </div>
                                </div>
                                @error('wednesdayStartingTime')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="wednesdayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de
                                        fermeture :</label>
                                    <div class="col-md-6">
                                        <input id="wednesdayClosingTime" type="time" class="form-control"
                                            name="wednesdayClosingTime" value="{{ $data->wednesdayClosingTime }}">
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
                                    <label for="isAvailableOnThursday" class="col-md-6 col-form-label text-md-right">Jeudi
                                        :</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="isAvailableOnThursday"
                                            name="isAvailableOnThursday">
                                            @if ($data->isAvailableOnThursday === null)
                                                <option value=""></option>
                                                <option value="1">oui</option>
                                                <option value="0">non</option>
                                            @else
                                                @if ($data->isAvailableOnThursday)
                                                    <option selected="selected" value="1">
                                                        oui
                                                    </option>
                                                    <option value="0">non</option>
                                                @else
                                                    <option selected="selected" value="0">
                                                        non
                                                    </option>
                                                    <option value="1">oui</option>
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                @error('isAvailableOnThursday')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="thursdayStartingTime" class="col-md-6 col-form-label text-md-right">Heure
                                        d'ouverture :</label>
                                    <div class="col-md-6">
                                        <input id="thursdayStartingTime" type="time" class="form-control"
                                            name="thursdayStartingTime" value="{{ $data->thursdayStartingTime }}">
                                    </div>
                                </div>
                                @error('thursdayStartingTime')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="thursdayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de
                                        fermeture :</label>
                                    <div class="col-md-6">
                                        <input id="thursdayClosingTime" type="time" class="form-control"
                                            name="thursdayClosingTime" value="{{ $data->thursdayClosingTime }}">
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
                                    <label for="isAvailableOnFriday" class="col-md-6 col-form-label text-md-right">Vendredi
                                        :</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="isAvailableOnFriday" name="isAvailableOnFriday">
                                            @if ($data->isAvailableOnFriday === null)
                                                <option value=""></option>
                                                <option value="1">oui</option>
                                                <option value="0">non</option>
                                            @else
                                                @if ($data->isAvailableOnFriday)
                                                    <option selected="selected" value="1">
                                                        oui
                                                    </option>
                                                    <option value="0">non</option>
                                                @else
                                                    <option selected="selected" value="0">
                                                        non
                                                    </option>
                                                    <option value="1">oui</option>
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                @error('isAvailableOnFriday')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="fridayStartingTime" class="col-md-6 col-form-label text-md-right">Heure
                                        d'ouverture :</label>
                                    <div class="col-md-6">
                                        <input id="fridayStartingTime" type="time" class="form-control"
                                            name="fridayStartingTime" value="{{ $data->fridayStartingTime }}">
                                    </div>
                                </div>
                                @error('fridayStartingTime')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="fridayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de
                                        fermeture :</label>
                                    <div class="col-md-6">
                                        <input id="fridayClosingTime" type="time" class="form-control"
                                            name="fridayClosingTime" value="{{ $data->fridayClosingTime }}">
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
                                    <label for="isAvailableOnSaturday" class="col-md-6 col-form-label text-md-right">Samedi
                                        :</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="isAvailableOnSaturday"
                                            name="isAvailableOnSaturday">
                                            @if ($data->isAvailableOnSaturday === null)
                                                <option value=""></option>
                                                <option value="1">oui</option>
                                                <option value="0">non</option>
                                            @else
                                                @if ($data->isAvailableOnSaturday)
                                                    <option selected="selected" value="1">
                                                        oui
                                                    </option>
                                                    <option value="0">non</option>
                                                @else
                                                    <option selected="selected" value="0">
                                                        non
                                                    </option>
                                                    <option value="1">oui</option>
                                                @endif
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                @error('isAvailableOnSaturday')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="saturdayStartingTime" class="col-md-6 col-form-label text-md-right">Heure
                                        d'ouverture :</label>
                                    <div class="col-md-6">
                                        <input id="saturdayStartingTime" type="time" class="form-control"
                                            name="saturdayStartingTime" value="{{ $data->saturdayStartingTime }}">
                                    </div>
                                </div>
                                @error('saturdayStartingTime')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="saturdayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de
                                        fermeture :</label>
                                    <div class="col-md-6">
                                        <input id="saturdayClosingTime" type="time" class="form-control"
                                            name="saturdayClosingTime" value="{{ $data->saturdayClosingTime }}">
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
                                    <label for="isAvailableOnSunday" class="col-md-6 col-form-label text-md-right">Dimanche
                                        :</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="isAvailableOnSunday" name="isAvailableOnSunday">
                                            @if ($data->isAvailableOnSunday === null)
                                                <option value=""></option>
                                                <option value="1">oui</option>
                                                <option value="0">non</option>
                                            @else
                                                @if ($data->isAvailableOnSunday)
                                                    <option selected="selected" value="1">
                                                        oui
                                                    </option>
                                                    <option value="0">non</option>
                                                @else
                                                    <option selected="selected" value="0">
                                                        non
                                                    </option>
                                                    <option value="1">oui</option>
                                                @endif
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                @error('isAvailableOnSunday')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="sundayStartingTime" class="col-md-6 col-form-label text-md-right">Heure
                                        d'ouverture :</label>
                                    <div class="col-md-6">
                                        <input id="sundayStartingTime" type="time" class="form-control"
                                            name="sundayStartingTime" value="{{ $data->sundayStartingTime }}">
                                    </div>
                                </div>
                                @error('sundayStartingTime')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="sundayClosingTime" class="col-md-6 col-form-label text-md-right">Heure de
                                        fermeture :</label>
                                    <div class="col-md-6">
                                        <input id="sundayClosingTime" type="time" class="form-control"
                                            name="sundayClosingTime" value="{{ $data->sundayClosingTime }}">
                                    </div>
                                </div>
                                @error('sundayClosingTime')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- timeConsultation -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="timeConsultation" class="col-md-6 col-form-label text-md-right">Durée de
                                        consultation (mn) :</label>
                                    <div class="col-md-6">
                                        <input id="timeConsultation" type="number" class="form-control"
                                            name="timeConsultation" value="{{ $data->timeConsultation }}">
                                    </div>
                                </div>
                                @error('timeConsultation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Mise à jour</button>
                        </center>
                    </form>
                    {{-- Modifier le Temps de travail STARt --}}

                </div>
            </div>
        </div>
    @else
        <a href="{{ route('doctor') }}" class="btn btn-lg ">
            <h1 class="h5">continue</h1>
        </a>

    @endif



@endsection
