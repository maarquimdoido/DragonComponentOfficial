@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
    <h2>Hello {{ Auth::user()->name }}<h2>
        <h4>Informations</h4>
        <table>
            <ul>
                <li>Email: {{ Auth::user()->email }}</li>
                <li>Criada em : {{ Auth::user()->created_at }}</li>
                </ul>
        </table><br><br>
        <form action="{{route('profile.edit')}}" method="GET"><input type="submit" class="btn btn-primary mr-3" value="Editar informações"></form>
@endsection
