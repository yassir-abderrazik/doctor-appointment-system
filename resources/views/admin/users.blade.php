@extends('layouts.admin')
@section('content')
    <form class="p-3" action="{{ route('addUser') }}" method="POST">
        @method('POST')
        @csrf
        <h3 class="text-center">Ajouter Docteur/Admin</h3>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="email"  value="{{ old('email' ?? null) }}"
                        placeholder="Enter email">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name"  value="{{ old('name' ?? null) }}"
                        placeholder="Enter name">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="password"
                        placeholder="Enter password">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">type du compte :</label>
                    <select class="form-control" id="type" name="type">
                        <option value="{{ old('type' ?? null) }}">{{ old('type' ?? null) }}</option>
                        <option value="doctor">Docteur</option>
                        <option value="admin">Administrateur</option>

                    </select>
                    @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
        <center>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </center>
    </form>
    <hr>
    <h3 class="text-center"> Comptes Docteur/Admin</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
        {{ $users->links() }}
 


@endsection
