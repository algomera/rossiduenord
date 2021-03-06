@extends('layouts.app')
@section('content')
 @include('layouts.partials.practiceNav')
 <form action="{{route('signed.store',$contract)}}" method="post" enctype="multipart/form-data">
     @csrf
     <div class="px-20 pb-5 bg-white">
        <a href="{{route('contracts.index', $contract->practice)}}" class="back"> <i class="fa-solid fa-arrow-left"></i> Torna indietro</a>
        <p class="black text-md"><b>Elenco contratti firmati</b></p>
        <hr class="bg-black">
        {{-- table --}}
        <div class="table mt-2">
            <table class="w-100">
                <thead class="text-center">
                    <tr style="border-top: 1px solid #707070">
                        <th >#</th>
                        <th >Nome file</th>
                        <th>Scarica</th>
                        <th>Data caricamento</th>
                    </tr>
                </thead>
                <tbody id="table_ContentListFolder" class="text-center">
                    @forelse ($signeds as $signed)
                        <tr>
                            <td>{{$signed->id}}</td>
                            <td>{{$signed->name}}</td>
                            <td>
                                <a href="{{route('signed.download',$signed->id)}}" class="clickable"> Scarica <i class="fa-solid fa-file-arrow-down fa-1x"></i> </a>
                             </td>
                             <td>{{$signed->created_at ? $signed->created_at->format('d/m/y') : '' }}</td>
                             <td class="text-left" > <a href="{{route('signed.show', $signed)}}" class="btn btn-primary">Vedi</a> </td>
                        </tr>
                    @empty
                        <td colspan="10">Nessun elemento </td>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3 contenitore file-container">
                <label for="signed_upload" class="btn bg-logo-green white">
                      Scegli file <i class="fa-solid fa-file-arrow-up"></i>
                </label>
                <input type="file" name="signed" id="signed_upload" class="mt-1">
            </div>
        </div>
        <div class="box-fixed">
            <a href="{{ route('practice.index') }}" class="add-button" style="background-color: #818387" >
                {{ __('Annulla')}}
            </a>
            <button type="submit" class="add-button position-relative ml-2">
                {{ __('Conferma') }}
            </button>
        </div>
     </div>
 </form>
@endsection