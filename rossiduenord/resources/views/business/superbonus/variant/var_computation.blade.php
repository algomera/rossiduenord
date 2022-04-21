@extends('business.layouts.business')

@section('content')
@include('business.layouts.partials.practiceNav')
@include('business.layouts.partials.nav_superbonus')

            <form action="{{ route('business.update_var_computation', ['practice' => $practice]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="px-20">
                    <h6>Spese complessive e dichiarazioni</h6>
                    <hr style="margin-top: 5px; background-color: #211e16;">
                </div>

                {{-- navbar --}}
                <div class="nav_bonus d-flex align-items-center">
                    <a class="frame">Varianti computo</a>
                    <a>Storico SAL</a>
                </div>

                <div class="scroll">

                    <section class="px-20">{{-- Richiedi variante a SAl 2  --}}
                        <label for="sai2_variant_request" class="checkbox-wrapper d-flex">
                            <input {{$variant->sai2_variant_request == 'true' ? 'checked' : ''}} type="checkbox" name="sai2_variant_request" id="sai2_variant_request" value="true">
                            <span class="checkmark"></span>
                            <span class="black">
                                <b>Richiedi variante a SAl 2</b>
                            </span>
                        </label>

                        <section class="px-20">
                            <div class="d-flex align-items-center">

                                <label for="technical_relation" class="checkbox-wrapper d-flex"><p class="black">Relazione tecnica prevista dall'art:28 della legge 10791 e dall'art.8 comma 1 del D.lgs 192/05 e s...</p>
                                    <input {{$variant->technical_relation == 'true' ? 'checked' : ''}} type="checkbox" name="technical_relation" id="technical_relation" value="true">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="d-flex">
                                <p>
                                    è stata depositata nell'ufficio competente del Comune di
                                </p>
                                <label for="sai2_common" class=" m-0 mr-4 black">
                                    <span class="invisible">comune</span>
                                    <input type="text" value="{{$variant->sai2_common}}" name="sai2_common" id="sai2_common" class="border ml-2 px-2" style="width: 120px;" placeholder="comune L.10">
                                </label>
                                <label for="sai2_province" class=" m-0 mr-4 black">Prov.
                                    <input type="text" value="{{$variant->sai2_province}}" name="sai2_province" id="sai2_province" class="border ml-2 px-2" style="width: 120px;" placeholder="PROV">
                                </label>
                                <label for="sai2_date" class=" m-0 mr-4 black">In data
                                    <input type="date" value="{{$variant->sai2_date}}" name="sai2_date" id="sai2_date" class="border ml-2 px-2" style="width: 120px;" placeholder="gg/mm/aaaaa">
                                </label>
                            </div>
                            <div>
                                <label for="protocol_number" class=" m-0 mr-4"><span class="black">Protocollo n.</span>
                                    <input type="text" value="{{$variant->protocol_number}}" name="protocol_number" id="protocol_number" class="border ml-2 px-2" style="width: 120px;">
                                </label>
                            </div>

                            {{-- chehckbox --}}
                            <div class="my-2">
                                <div class="d-flex align-items-center m-0">{{-- APE post convenzionale --}}
                                    <label for="post_conventionale_APE" class="checkbox-wrapper d-flex"><p class="black">APE post convenzionale</p>
                                        <input {{$variant->post_conventionale_APE == 'true' ? 'checked' : ''}} type="checkbox" name="post_conventionale_APE" id="post_conventionale_APE" value="true">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="d-flex align-items-center m-0">{{-- Variazioni dati superbonus 110%(Interventi trainanti, trainati e computo metri...) --}}
                                    <label for="superbonus_variations" class="checkbox-wrapper d-flex"><p class="black">Variazioni dati superbonus 110%(Interventi trainanti, trainati e computo metri...)</p>
                                        <input {{$variant->superbonus_variations}} type="checkbox" name="superbonus_variations" id="superbonus_variations" value="true">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="w-80">{{-- Descrizione DETTAGLIATA delle variazioni: --}}
                                <p class="black"><b>Descrizione DETTAGLIATA delle variazioni:</b></p>

                                <div class="my-2">
                                    <span class="font-500">Interventi trainanti</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                        <textarea  class="w-100 h-100 px-1" name="driving_interventions" id="" cols="30" rows="10">{{$variant->driving_interventions}}</textarea>
                                    </div>
                                </div>

                                <div class="my-2">{{-- Interventi trainati --}}
                                    <span class="font-500">Interventi trainati</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                        <textarea  class="w-100 h-100 px-1" name="towed_interventions" id="" cols="30" rows="10">{{$variant->towed_interventions}}</textarea>
                                    </div>
                                </div>

                                <div class="my-2">{{-- Computo metrico --}}
                                    <span class="font-500">Computo metrico</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                        <textarea  class="w-100 h-100 px-1" name="metric_calc" id="" cols="30" rows="10">{{$variant->metric_calc}}</textarea>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center m-0">{{-- Variante approvata --}}
                                    <label for="approved_variants" class="checkbox-wrapper d-flex"><p class="black">Variante approvata</p>
                                        <input {{$variant->approved_variants == 'true' ? 'checked' : ''}} type="checkbox" name="approved_variants" id="approved_variants" value="true">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </section>
                    </section>

                    <hr class="divider">{{-- divider --}}

                    <section class="px-20">{{-- Richiedi variante a SAl finale  --}}
                        <label for="finalSAI_variant_request" class="checkbox-wrapper d-flex">
                            <input {{$variant->finalSAI_variant_request == 'true' ? 'checked' : ''}} type="checkbox" name="finalSAI_variant_request" id="finalSAI_variant_request" value="true">
                            <span class="checkmark"></span>
                            <span class="black">
                                <b>Richiedi variante a SAl finale</b>
                            </span>
                        </label>

                        <section class="px-20">
                            <div class="d-flex align-items-center">

                                <label for="final_technical_relation" class="checkbox-wrapper d-flex"><p class="black">Relazione tecnica prevista dall'art:28 della legge 10791 e dall'art.8 comma 1 del D.lgs 192/05 e s...</p>
                                    <input {{$variant->final_technical_relation == 'true' ? 'checked' : ''}} type="checkbox" name="final_technical_relation" id="final_technical_relation" value="true">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="d-flex">
                                <p>
                                    è stata depositata nell'ufficio competente del Comune di
                                </p>
                                <label for="finalSai_common" class=" m-0 mr-4 black">
                                    <span class="invisible">Common</span>
                                    <input type="text" value="{{$variant->finalSai_common}}" name="finalSai_common" id="finalSai_common" class="border ml-2 px-2" style="width: 120px;" placeholder="comune L.10">
                                </label>
                                <label for="finalSai2_province" class=" m-0 mr-4 black">Prov.
                                    <input type="text" value="{{$variant->finalSai2_province}}" name="finalSai2_province" id="finalSai2_province" class="border ml-2 px-2" style="width: 120px;" placeholder="PROV">
                                </label>
                                <label for="finalSai2_date" class=" m-0 mr-4 black">In data
                                    <input type="date" value="{{$variant->finalSai2_date}}" name="finalSai2_date" id="finalSai2_date" class="border ml-2 px-2" style="width: 120px;" placeholder="gg/mm/aaaaa">
                                </label>
                            </div>
                            <div>
                                <label for="final_protocol_number" class=" m-0 mr-4"><span class="black">Protocollo n.</span>
                                    <input type="text" value="{{$variant->final_protocol_number}}" name="final_protocol_number" id="final_protocol_number" class="border ml-2 px-2" style="width: 120px;">
                                </label>
                            </div>

                            {{-- chehckbox --}}
                            <div class="my-2">
                                <div class="d-flex align-items-center m-0">{{-- APE post convenzionale --}}
                                    <label for="final_post_conventionale_APE" class="checkbox-wrapper d-flex"><p class="black">APE post convenzionale</p>
                                        <input {{$variant->final_post_conventionale_APE == 'true' ? 'checked' : ''}} type="checkbox" name="final_post_conventionale_APE" id="final_post_conventionale_APE" value="true">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="d-flex align-items-center m-0">{{-- Variazioni dati superbonus 110%(Interventi trainanti, trainati e computo metri...) --}}
                                    <label for="final_superbonus_variations" class="checkbox-wrapper d-flex"><p class="black">Variazioni dati superbonus 110%(Interventi trainanti, trainati e computo metri...)</p>
                                        <input {{$variant->final_superbonus_variations == 'true' ? 'checked' : ''}} type="checkbox" name="final_superbonus_variations" id="final_superbonus_variations" value="true">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>

                            {{-- variations description --}}
                            <div class="w-80">
                                <p class="black">descrizione DETTAGLIATA delle variazioni:</p>

                                <div class="my-2">{{-- Interventi trainanti --}}
                                    <span class="font-500">Interventi trainanti</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                        <textarea  class="w-100 h-100 px-1" name="final_driving_interventions" id="" cols="30" rows="10">{{$variant->final_driving_interventions}}</textarea>
                                    </div>
                                </div>

                                <div class="my-2">{{-- Interventi trainati --}}
                                    <span class="font-500">Interventi trainati</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                        <textarea  class="w-100 h-100 px-1" name="final_towed_interventions" id="" cols="30" rows="10">{{$variant->final_towed_interventions}}</textarea>

                                    </div>
                                </div>

                                <div class="my-2">{{-- Computo metrico --}}
                                    <span class="font-500">Computo metrico</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                        <textarea  class="w-100 h-100 px-1" name="final_metric_calc" id="" cols="30" rows="10">{{$variant->final_metric_calc}}</textarea>

                                    </div>
                                </div>

                                <div class="d-flex align-items-center m-0">{{-- Variante approvata --}}
                                    <label for="final_approved_variants" class="checkbox-wrapper d-flex"><p class="black">Variante approvata</p>
                                        <input {{$variant->final_approved_variants == 'true' ? 'checked' : ''}} type="checkbox" name="final_approved_variants" id="final_approved_variants" value="true">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </section>
                    </section>
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
