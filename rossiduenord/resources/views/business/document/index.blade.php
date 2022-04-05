@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')
   
    <div class="d-flex pb-20">

        {{-- column left --}}
        <div class="px-20 pb-20" style="width: 20%; border-right: 1px solid lightgrey;">
            <h3>Cartelle</h3>
            @foreach ($folders as $folder)
            <div>
                <button class="add-button mb-2">{{$folder->name}}</button>
            </div>
            @endforeach
        </div>

        {{-- column right --}}
        <div class="px-20 pb-20" style="width: 80%">
            <h3>Documenti</h3>

            <table class="table_bonus" style="width: 100%">
                <thead>
                    <tr>
                        <td class="text-center" style="width:10%;"><b>N.</b></td>
                        <td style="width:10%;"><b>Stato</b></td>
                        <td style="width:20%;"><b>Descrizione</b></td>
                        <td style="width:20%;"><b>Ruolo</b></td>
                        <td style="width:20%;"><b>N. identificativo</b></td>
                        <td style="width:20%;"><b>Note documento</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection