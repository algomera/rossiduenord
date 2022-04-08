@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')
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
                                <th style="width: 15%">Scarica</th>
                                <th style="width: 10%">Mappa</th>
                                <th style="width: 10%">Nome del file</th>
                            </tr>
                        </thead>
                        <tbody id="table_ContentList">
                            @forelse ($photos as $photo)
                                <tr>
                                    @if ($photo->name != '')
                                    <td >{{$photo->created_at->format('d/m/y')}}</td> 
                                    @endif
                                    @if ($photo->name != '') 
                                    <td>{{$photo->description}}</td> 
                                    @endif
                                    @if ($photo->name != '')
                                    <td >Sal 1 </td> 
                                    @endif
                                    @if ($photo->name != '')
                                    <td ><a href="#"> <ins>Download &#8595; <i class="fa-solid fa-arrow-down"></i></ins>   </a></td> 
                                    @endif
                                    @if ($photo->name != '')
                                    <td class="text-underline"><a href="">Apri</a></td> 
                                    @endif
                                    @if ($photo->name != '')
                                    <td >{{$photo->name}}</td> 
                                    @endif
                                </tr>
                            @empty
                                Nessuna foto   
                            @endforelse
                        </tbody>
                    </table>
                    @if (count($photos) > 0)
                        <div class="d-flex justify-content-end py-3">
                            <a href="" class="btn bg-blue white">Scarica tutte le foto</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
   </div>

@endsection