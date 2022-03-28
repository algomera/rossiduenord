@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')
    @include('business.layouts.partials.nav_superbonus')


            <form action="{{route('business.update_data_project', ['practice' => $practice])}}" method="POST">
                @csrf
                @method('PUT')

                <div class="px-20">
                    <h6>Dati di Progetti</h6>
                    <hr style="margin-top: 5px; background-color: #211e16;">
                </div>

                <div class="dati_progetto px-20 pb-20">
                    <div class="d-flex">
                        <p>È stata depositata la relazione tecnica prevista dall’art. 28 della legge 10/91 e dall’art. 8 comma 1 del D.lgs 192/05 e successive modificazioni</p>
                        <label for="technical_report" style="margin-left: 20px">
                            <input {{ $data_project->technical_report == 'notDefine' ? 'checked' : ''}} type="radio" value="notDefine" name="technical_report" id="technical_report">
                            N.D.
                        </label>
                        <label for="technical_report" style="margin-left: 20px">
                            <input {{ $data_project->technical_report == 'no' ? 'checked' : ''}} type="radio" value="no" name="technical_report" id="technical_report">
                            No
                        </label>
                        <label for="technical_report" style="margin-left: 20px">
                            <input {{ $data_project->technical_report == 'yes' ? 'checked' : ''}} type="radio" value="yes" name="technical_report" id="technical_report">
                            Si
                        </label>
                    </div>
                    <div class="d-flex align-items-center">
                        <p style="margin: 0">è stata depositata nell’ufficio competente del Comune di</p>
                        <input type="text" value="{{$data_project->filed_common}}" name="filed_common" id="filed_common" style="margin-left: 20px;" class="text-center border">
                        <label for="filed_province" style="margin: 0; padding-left: 20px;">
                            Prov.
                            <input type="text" value="{{$data_project->filed_province}}" name="filed_province" id="filed_province" class="text-center border">
                        </label>
                        <label for="filed_date" style="margin: 0; padding-left: 20px;">
                            in data
                            <input type="date" value="{{$data_project->filed_date}}" name="filed_date" id="filed_date" class="text-center border">
                        </label>
                        <label for="filed_protocol" style="margin: 0; padding-left: 20px;">
                            Protocollo n.
                            <input type="text" value="{{$data_project->filed_protocol}}" name="filed_protocol" id="filed_protocol" class="text-center border">
                        </label>
                    </div>
                    <div class="d-flex align-items-center mt-5">
                        <input {{ $data_project->technical_report_exclusion == 'true' ? 'checked' : ''}} type="checkbox" value="true" name="technical_report_exclusion" id="technical_report_exclusion">
                        <p class="m-0 ml-2">Non è stata depositata la relazione tecnica in quanto si ricade nei casi di esclusione previsti dal comma 1 dell’art. 8 del del D.lgs 192/05 e dal punto 2,
                            paragrafo 2.2. dell’allegato 1 del decreto 26/06/2015</p>
                    </div>

                    <div class="mt-5">
                        <label for="work_start">
                            - gli stessi lavori sono iniziati in data
                            <input type="date" value="{{$data_project->work_start}}" name="work_start" id="work_start" class="text-center border">
                        </label>
                        <label for="" style="padding-left: 20px;">
                            e conclusi in data
                            <input type="date" value="{{$data_project->end_of_works}}" name="end_of_works" id="end_of_works" class="text-center border">
                        </label>
                    </div>

                    <div>
                        <p class="m-0 mt-2">- i lavori sono eseguiti su:</p>
                        <div>
                            <label for="type_building">
                                <input {{ $data_project->type_building == 'condominium' ? 'checked' : ''}} type="radio" value="condominium" name="type_building" id="type_building" class="mr-2">
                                Edificio condominiale composto da n. unità
                            </label>
                            <input type="number" value="{{$data_project->building_unit}}" name="building_unit" id="building_unit" class="mr-4 text-center border">
                            <span>n.pertinenza</span>
                            <input type="number" value="{{$data_project->relevance}}" name="relevance" id="relevance" class="mr-4 text-center border">
                            <label for="centralized_system">
                                <input {{ $data_project->centralized_system == 'true' ? 'checked' : ''}} type="checkbox" value="true" name="centralized_system" id="centralized_system">
                                con impianto termico centralizzato
                            </label>
                        </div>
                        <label for="type_building" class="d-flex align-items-center">
                            <input {{ $data_project->type_building == 'single_property' ? 'checked' : ''}} type="radio" value="single_property" name="type_building" id="type_building" class="mr-2">
                            Unità immobiliare unifamiliare
                        </label>
                        <label for="type_building" class="d-flex align-items-center">
                            <input {{ $data_project->type_building == 'multi_property' ? 'checked' : ''}} type="radio" value="multi_property" name="type_building" id="type_building" class="mr-2">
                            Unità immobiliari situate in edifici plurifamiliari
                        </label>
                    </div>

                    <div class="d-flex align-items-center mt-4">
                        <p class="m-0">- la superficie lorda ante lavori complessiva disperdente è pari a</p>
                        <input type="number" value="{{$data_project->gross_surface_area}}" name="gross_surface_area" id="gross_surface_area" class="text-center ml-2 mr-2 border">
                        <span>m²</span>
                    </div>

                    <div class="mt-5">
                        <b>Informazioni relative ai nuovi prezzi utilizzati nel computo metrico</b>
                        <hr style="margin-top: 5px; background-color: #211e16;">
                        <div class="d-flex">
                            <div class="d-flex flex-column justify-content-between mr-4">
                                <b>Numero voci NP utilizzate</b>
                                <b  style="color: #00cfb4;">- di cui validate</b>
                                <b style="color: #e4003c;">- di cui ancora da validare</b>
                            </div>
                            <div class="d-flex flex-column">
                                <input type="number" value="{{$data_project->np}}" name="np" id="np" style="width: 150px" class="text-center font-weight-bold mb-2 bg-light border">
                                <input type="number" value="{{$data_project->np_validated}}" name="np_validated" id="np_validated" style="width: 150px" class="text-center font-weight-bold mb-2 bg-light border">
                                <input type="number" value="{{$data_project->np_not_validated}}" name="np_not_validated" id="np_not_validated" style="width: 150px" class="text-center font-weight-bold bg-light border">
                            </div>
                        </div>
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
            </form>

        </div>{{-- chiusura div box praticeNav--}}

    </div>{{-- chiusura div content-main praticeNav --}}

@endsection
