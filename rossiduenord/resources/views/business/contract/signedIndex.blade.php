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
                        <th >#</th>
                        <th >Nome file</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody id="table_ContentListFolder" class="text-center">
                    @forelse ($signeds as $signed)
                        <tr>
                            <td>{{$signed->id}}</td>
                            <td>{{$signed->name}}</td>
                            <td class="">
                                <a href="{{route('business.signed.download',$signed->id)}}" class="clickable btn btn-primary"> Scarica <i class="fa-solid fa-file-arrow-down fa-1x"></i> </a>
                                <button type="button" class="btn bg-red white px-1" data-toggle="modal" data-target="#del{{$signed->id}}">
                                    elimina <i class="fa-solid fa-trash-can"></i>
                                </button>
                                <div class="modal fade" id="del{{$signed->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Conferma elimina contratto</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di volere eliminare {{$signed->name}} ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">indietro</button>
                                                <form action="{{ Route('business.signed.delete', $signed) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-custom white bg-red mr-0">
                                                        Conferma
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </td>
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