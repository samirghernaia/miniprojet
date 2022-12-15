@extends('layouts.creation')

@section('titre','Formulaire')

@section('titre de page')
<h1>Creation de personnage</h1>
@endsection
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('player.store') }}" method="POST">
        @csrf
        <p>
            <label for="nom">Nom :
            <input type="text" name="nom" id="nom">
        </label>
        </p>

        <p>
            <label for="description">Description : 
                <input type="text" name="description" id="description">
            </label>
        </p>

        <p>
            <label for="specialite">Spécialité : 
                <select name="specialite" id="specialite">
                    <option value="">Archer</option>
                <option value="">Berserker</option>
                <option value="">Magicien</option>
                <option value="">Druide</option>
                <option value="">Caissier</option>
                </select>

            </label>
        </p>
        <button>Envoyer</button>

    </form>
</body>
</html>



@endsection
