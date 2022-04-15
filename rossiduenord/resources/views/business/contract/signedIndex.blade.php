@extends('business.layouts.business')
@section('content')
 @include('business.layouts.partials.practiceNav')
 <form action="">
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
                        <th style="whith: 20%">Stato</th>
                        <th style="whith: 15%"></th>
                    </tr>
                </thead>
                <tbody id="table_ContentListFolder" class="text-center">
                    @forelse ($signeds as $signed)
                        <td>{{$signed->id}}</td>
                        <td>{{$signed->name}}</td>
                        <td>scarica</td>
                        <td></td>
                        <td></td>
                    @empty
                        <td colspan="10">Nessun elemento </td>
                    @endforelse
                </tbody>
            </table>
            
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