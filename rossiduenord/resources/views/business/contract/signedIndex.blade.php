@extends('business.layouts.business')
@section('content')
 @include('business.layouts.partials.practiceNav')
 <form action="{{route('business.signed.store',$contract)}}" method="post" enctype="multipart/form-data">
    @csrf
     <div class="px-20 py-3 bg-white">
        <span class="black text-md"><b>Elenco contratti firmati</b></span>
        <hr class="bg-black">
        {{-- table --}}
        <div class="table mt-2">
            <table class="w-100">
                <thead class="text-center">
                    <tr style="border-top: 1px solid #707070">
                        <th style="width: 5%">#</th>
                        <th style="width: 20%">Nome file</th>
                        <th style="width: 20%">Scarica</th>
                    </tr>
                </thead>
                <tbody id="table_ContentListFolder" class="text-center">
                    @forelse ($signeds as $signed)
                        <tr>
                            <td>{{$signed->id}}</td>
                            <td>{{$signed->name}}</td>
                            <td> <a href="{{route('business.signed.download',$signed->id)}}" class="clickable"> Scarica <i class="fa-solid fa-file-arrow-down fa-1x"></i> </a> </td>
                        </tr>
                    @empty
                        <td colspan="10">Nessun elemento </td>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                <label for="signed_upload" class="btn bg-logo-green white">
                    Inserisci <i class="fa-solid fa-file-arrow-up"></i>
                    <input type="file" name="signed" id="signed_upload" hidden>
                </label>
            </div>
        </div>
        <div class="box-fixed">
            <a href="{{ route('business.practice.index') }}" class="add-button" style="background-color: #818387" >
                {{ __('Annulla')}}
            </a>
            <button type="submit" class="add-button position-relative ml-2">
                {{ __('Conferma') }}
            </button>
        </div>
     </div>
 </form>
@endsection