@extends('business.layouts.business')

@section('content')
    {{-- @include('business.layouts.partials.practiceNav') --}}
   <div class="bg-white">
    <div class="nav_bonus">
        <a class="frame">Foto</a> 
        <a>Videoispezioni</a>
    </div>
    <div class="px-20">
        <div class="row">
            <div class="col-4">
                <div class="preview">
                    <img src="{{asset('img/placeholder.png')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-8">
                <div class="table mt-2">
                    <table class="table_bonus" style="width: 100%">
                        <thead>
                            <tr style="border-top: 1px solid #707070">
                                <th style="width: 10%">Data Caricamento</th>
                                <th style="width: 5%">Descrizione</th>
                                <th style="width: 10%">Riferito a </th>
                                <th style="width: 15%">Apri/Salva</th>
                                <th style="width: 10%">Mappa</th>
                                <th style="width: 10%">Nome del file</th>
                            </tr>
                        </thead>
                        <tbody id="table_ContentList">
                            <tr>
                                <td>18/11/21</td>
                                <td>Foto n.1</td>
                                <td>SAl 1</td>
                                <td><a href="#">Vedi</a></td>
                                <td class="text-underline">Apri</td>
                                <td>Sal1_foo_1.jpg</td>
                            </tr>
                            <tr>
                                <td>18/11/21</td>
                                <td>Foto n.1</td>
                                <td>SAl 1</td>
                                <td><a href="#">Vedi</a></td>
                                <td class="text-underline">Apri</td>
                                <td>Sal1_foo_1.jpg</td>
                            </tr>
                            <tr>
                                <td>18/11/21</td>
                                <td>Foto n.1</td>
                                <td>SAl 1</td>
                                <td><a href="#">Vedi</a></td>
                                <td class="text-underline">Apri</td>
                                <td>Sal1_foo_1.jpg</td>
                            </tr>
                            <tr>
                                <td>18/11/21</td>
                                <td>Foto n.1</td>
                                <td>SAl 1</td>
                                <td><a href="#">Vedi</a></td>
                                <td class="text-underline">Apri</td>
                                <td>Sal1_foo_1.jpg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>

@endsection