@extends('business.layouts.business')
@section('content')
 @include('business.layouts.partials.practiceNav')
 <form action="{{route('business.policies.signed.store', $policy)}}" method="post" enctype="multipart/form-data">
     @csrf
     <div class="px-20 bg-white">
        <a href="{{route('business.policies.index',$policy->practice)}}" class="black"> <i class="fa-solid fa-arrow-left"></i> Torna indietro</a>
        <p class="black text-md"><b>Elenco polizze caricate</b></p>
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
                    @forelse ($modifieds as $modified)
                        <tr>
                            <td>{{$modified->id}}</td>
                            <td>{{$modified->name}}</td>
                            <td>
                                <a href="{{route('business.modified.download',$modified->id)}}" class="clickable"> Scarica <i class="fa-solid fa-file-arrow-down fa-1x"></i> </a>
                             </td>
                             <td>{{$modified->created_at ? $modified->created_at->format('d/m/y') : '' }}</td>
                             <td class="text-left" > <a href="{{route('business.modified.show', $modified)}}" class="btn btn-primary">Vedi</a> </td>
                        </tr>
                    @empty
                        <td colspan="10">Nessun elemento </td>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                <label for="signed_upload" class="btn bg-logo-green white">
                      Scegli file <i class="fa-solid fa-file-arrow-up"></i>
                    <input type="file" name="modified" id="signed_upload" hidden>
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