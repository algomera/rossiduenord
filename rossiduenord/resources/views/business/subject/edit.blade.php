@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')

            <div class="px-20">
                <ul class="nav nav-tabs pl-4" id="sectionSoggetti_pratiche" role="tablist">
                    <li class="nav-item">
                        <span class="nav-link blue frame" id="soggetti-tab" data-toggle="tab" href="#soggetti" role="tab" aria-controls="soggetti" aria-selected="true" style="color: #BBBCBC; font-weight:500; ">
                            Soggetti
                        </span>
                    </li>
{{--                     <li class="nav-item">
                        <span  @click="active = !active" class="nav-link" :class="[!active ? 'blue' : '']" id="responsabili-tab" data-toggle="tab" href="#responsabili" role="tab" aria-controls="responsabili" aria-selected="false" style="color: #BBBCBC; font-weight:500; cursor: pointer;">
                            Responsabili
                        </span>
                    </li>
 --}}                </ul>
            </div>

            <div class="scroll">
                {{-- start form --}}
                <form action="{{ route('business.subject.update', $subject->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- practice id --}}
                    <input type="hidden" id="practice_id" name="practice_id" value="{{ $subject->practice_id}}">
                    {{--  --}}
                    <div class="tab-content px-20" id="content_sectionSoggetti_pratiche">
                        <!-- TAB SOGGETTI -->
                        <div class="tab-pane fade show active" id="soggetti" role="tabpanel" aria-labelledby="soggetti-tab">
                            <h6 class="mb-3 mt-3">Attori/Soggetti</h6>
                            <div class="row">
                                <div class="col-md">
                                    <x-subject_select label="General Contractor*" name="general_contractor" :subject="$subject" :items="$general_contractor"></x-subject_select>
                                    <x-subject_select label="Azienda edile*" name="construction_company" :subject="$subject" :items="$construction_company"></x-subject_select>
                                    <x-subject_select label="Azienda imp. idrotermosanitari" name="hydrothermal_sanitary_company" :subject="$subject" :items="$hydrothermal_sanitary_company"></x-subject_select>
                                    <x-subject_select label="Azienda imp. elettrici/fotovoltaici" name="photovoltaic_company" :subject="$subject" :items="$photovoltaic_company"></x-subject_select>
                                    <x-subject_select label="Termotecnico APE Ante" name="technician_APE_Ante" :subject="$subject" :items="$technician_APE_Ante"></x-subject_select>
                                    <x-subject_select label="Termotecnico efficient. energetico" name="technician_energy_efficient" :subject="$subject" :items="$technician_energy_efficient"></x-subject_select>
                                    <x-subject_select label="Termotecnico APE Post" name="technician_APE_Post" :subject="$subject" :items="$technician_APE_Post"></x-subject_select>
                                    <x-subject_select label="Strutturista" name="structural_engineer" :subject="$subject" :items="$structural_engineer"></x-subject_select>
                                    <x-subject_select label="Tecnico Computo Metrico" name="metric_calc_technician" :subject="$subject" :items="$metric_calc_technician"></x-subject_select>
                                    <x-subject_select label="Direttore lavori" name="work_director" :subject="$subject" :items="$work_director"></x-subject_select>
                                    <x-subject_select label="Asseveratore tecnico" name="technical_assev" :subject="$subject" :items="$technical_assev"></x-subject_select>
                                    <x-subject_select label="Asseveratore fiscale" name="fiscal_assev" :subject="$subject" :items="$fiscal_assev"></x-subject_select>
                                    <x-subject_select label="Cessionario credito fiscale" name="phiscal_transferee" :subject="$subject" :items="$phiscal_transferee"></x-subject_select>
                                    <x-subject_select label="Banca finaziatrice" name="lending_bank" :subject="$subject" :items="$lending_bank"></x-subject_select>
                                    <x-subject_select label="Assicuratore" name="insurer" :subject="$subject" :items="$insurer"></x-subject_select>


                                    <div class="row">
                                        <div class="col-6">
                                            <x-subject_select label="Consulente" name="consultant" :subject="$subject" :items="$consultant"></x-subject_select>
                                        </div>
                                        @if($subject->signaler)
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="project_manager" style="display:inline-block;" >Tipo di consulente</label><br/>
                                                    <input type="text" readonly disabled class="col-md-12 form-control" value="{{$subject->signaler}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <x-subject_select label="Area Manager" name="area_manager" :subject="$subject" :items="$area_manager"></x-subject_select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB RESPONSABILI -->
                        <div class="tab-pane fade" id="responsabili" role="tabpanel" aria-labelledby="responsabili-tab">
                            <h6 class="mb-3 mt-3">Lista responsabili</h6>
                            <div class="row">
                                <div class="col-md"> <!-- Data table content -->
                                    <table class="table_bonus" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <td class="pl-3" style="width:10%;"><b>Utente</b></td>
                                                <td class="pl-3" style="width:40%;"><b>Ruolo</b></td>
                                                <td class="pl-3" style="width:25%;"><b>Email</b></td>
                                                <td class="pl-3" style="width:25%;"><b>Telefono </b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in 4" :key="item">
                                                <td class="text-left pl-3">A. Filippi</td>
                                                <td class="text-left px-3">
                                                    <div class="d-flex justify-content-between position-relative">
                                                        <span class="mt-2">Project Manager</span>
                                                        <div class="select" style="background-color: transparent; cursor:pointer"></div>
                                                    </div>
                                                </td>
                                                <td class="text-left pl-3">afilippi@italsoftspa.it</td>
                                                <td class="text-left pl-3">3281000000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="background-color: #f2f2f2; height:20px; border:none;">

                    <!-- Contatti dei responsabili -->
                    <div class="px-20">
                        <h6>Contatti dei responsabili</h6>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="project_manager" style="display:inline-block;" >Project Manager</label><br/>
                                    <input type="text" class="col-md-12 form-control @error('project_manager') is-invalid @enderror" id="project_manager" name="project_manager" value="{{old('project_manager') ?? $subject->project_manager}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                    @error('project_manager')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="responsible_technician" style="display:inline-block;" >Tecnico responsabile</label><br/>
                                    <input type="text" class="col-md-12 form-control @error('responsible_technician') is-invalid @enderror" id="responsible_technician" name="responsible_technician" value="{{old('responsible_technician') ?? $subject->responsible_technician}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                    @error('responsible_technician')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

{{--
                    <hr style="background-color: #f2f2f2; height:20px; border:none;">

                    <div class="px-20">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <input type="button" class="col-md-2 mb-3" value="Dettaglio importi" style="height:40px; width: 150px; border-radius:2px; box-shadow:0px 0px 10px 2px #DCDCDC; border:none; display:inline-block; background-color: white; color: gray; font-weight:bold; " /><br/>
                                    <input type="checkbox" class="mr-1" /><label >Importi bloccati</label>
                                </div>
                            </div>
                        </div>
                    </div>

 --}}
                    <div class="box-fixed">
                        <a href="{{ route('business.practice.index') }}" class="add-button" style="background-color: #818387" >
                            {{ __('Annulla')}}
                        </a>
                        <button type="submit" class="add-button position-relative ml-2">
                            {{ __('Conferma') }}
                        </button>
                    </div>

                </form>
            </div>

        </div>{{-- chiusura div box praticeNav --}}

    </div>{{-- chiusura div content-main praticeNav --}}


@endsection
