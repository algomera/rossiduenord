@extends('bank.layouts.bank')

@section('content')
    <div class="content-main">
        <div class="box px-20 pb-20 pt-20">
            <span class="black text-md"><b>Mostra utente:</b> {{ $user->name}}</span>
            <hr class="bg-black">

            <div>
                <img src="{{ asset('/img/icon/arrow-left.svg')}}" alt="">
                <a class="back" href="{{ route('bank.users.index') }}">Torna indietro</a>
            </div>
            
            <table style="width: 100%; margin-top: 20px;">
                <tbody class="table">
                    <tr>
                        <td class="w-25">ID</td>
                        <td>{{ $user->id}}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Nome</td>
                        <td>{{ $user->name}}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Email</td>
                        <td>{{ $user->email}}</td>
                    </tr>
                    <tr>
                        <td class="w-25">Tipologia Profilo</td>
                        <td>{{ $user->role}}</td>
                    </tr>
                </tbody>
            </table>

            <table style="width: 100%; margin-top: 50px;">
                <tbody>
                    <tr>
                        <td class="w-25">Ragione sociale</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="w-25">Partita IVA</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="w-25">Codice Fiscale</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="w-25">Forma Legale</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="w-25">CCIAA+REA</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="w-25">Codice Ateco</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="w-25">Data registrazione</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection