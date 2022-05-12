@extends('asseverator.layouts.asseverator')

@section('content')
    @include('asseverator.layouts.partials.practiceNav')

    <div class="px-20 pb-20 pt-20">
        <table class="table_bonus">
            <thead>
                <tr>
                    <th style="width:50%; height:50px; text-align: left;"><b>Immobile</b></th>
                    <th style="width:50%; height:50px; text-align: left;"><b>Data inserimento</b></th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($buildings as $building) --}}
                <tr>
                    <td style="text-align: left;">
                        <a href="{{route('asseverator.superbonus.show', [$practice->id, $building->id]) }}">
                            {{$building->intervention_name}} <br>
                            {{$building->build_address}}
                            {{$building->build_civic_number}}
                            {{$building->cap}} <br>
                            {{$building->region}}
                            {{$building->common}}
                            {{$building->province}}
                        </a>
                    </td>
                    <td style="text-align: left;">
                        <a href="{{route('asseverator.superbonus.show', [$practice->id, $building->id]) }}">{{$building->created_at}}</a>
                    </td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection
