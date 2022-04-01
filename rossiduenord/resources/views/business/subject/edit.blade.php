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
                                    <div class="form-group">
                                        <label for="general_contractor" style="display:inline-block;" >General Contractor</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('general_contractor') is-invalid @enderror" id="general_contractor" name="general_contractor" value="{{old('general_contractor') ?? $subject->general_contractor}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('general_contractor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex">
                                            <label for="construction_company" class="light-grey font-500 mr-3">Azienda edile</label>
{{--                                             
                                             <label class="checkbox-wrapper d-flex">
                                                <input type="checkbox" name="" value="">     
                                                <span class="checkmark"></span> 
                                                <span>Pratica in regola</span>
                                            </label>

 --}}
                                        </div>
                                        <input type="text" class="col-md-12 form-control @error('construction_company') is-invalid @enderror" id="construction_company" name="construction_company" value="{{old('construction_company') ?? $subject->construction_company}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('construction_company')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="hydrothermal_sanitary_company" style="display:inline-block;" >Azienda imp. idrotermosanitari</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('hydrothermal_sanitary_company') is-invalid @enderror" id="hydrothermal_sanitary_company" name="hydrothermal_sanitary_company" value="{{old('hydrothermal_sanitary_company') ?? $subject->hydrothermal_sanitary_company}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('hydrothermal_sanitary_company')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="photovoltaic_company" style="display:inline-block;" >Azienda imp. elettrici/fotovoltaici</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('photovoltaic_company') is-invalid @enderror" id="photovoltaic_company" name="photovoltaic_company" value="{{old('photovoltaic_company') ?? $subject->photovoltaic_company}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('photovoltaic_company')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="technician_APE_Ante" style="display:inline-block;" >Termotecnico APE Ante</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('technician_APE_Ante') is-invalid @enderror" id="technician_APE_Ante" name="technician_APE_Ante" value="{{old('technician_APE_Ante') ?? $subject->technician_APE_Ante}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('technician_APE_Ante')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="technician_energy_efficient" style="display:inline-block;" >Termotecnico efficient. energetico</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('technician_energy_efficient') is-invalid @enderror" id="technician_energy_efficient" name="technician_energy_efficient"  value="{{old('technician_energy_efficient') ?? $subject->technician_energy_efficient}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('technician_energy_efficient')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="technician_APE_Post" style="display:inline-block;" >Termotecnico APE Post</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('technician_APE_Post') is-invalid @enderror" id="technician_APE_Post" name="technician_APE_Post" value="{{old('technician_APE_Post') ?? $subject->technician_APE_Post}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('technician_APE_Post')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="structural_engineer" style="display:inline-block;" >strutturista</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('structural_engineer') is-invalid @enderror" id="structural_engineer" name="structural_engineer" value="{{old('structural_engineer') ?? $subject->structural_engineer}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('structural_engineer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="metric_calc_technician" style="display:inline-block;" >Tecnico Computo Metrico</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('metric_calc_technician') is-invalid @enderror" id="metric_calc_technician" name="metric_calc_technician" value="{{old('metric_calc_technician') ?? $subject->metric_calc_technician}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('metric_calc_technician')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="work_director" style="display:inline-block;" >Direttore lavori</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('work_director') is-invalid @enderror" id="work_director" name="work_director" value="{{old('work_director') ?? $subject->work_director}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('work_director')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="technical_assev" style="display:inline-block;" >Asseveratore tecnico</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('technical_assev') is-invalid @enderror" id="technical_assev" name="technical_assev" value="{{old('technical_assev') ?? $subject->technical_assev}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('technical_assev')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="fiscal_assev" style="display:inline-block;" >Asseveratore fiscale</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('fiscal_assev') is-invalid @enderror" id="fiscal_assev" name="fiscal_assev"  value="{{old('fiscal_assev') ?? $subject->fiscal_assev}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('fiscal_assev')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phiscal_transferee" style="display:inline-block;" >Cessionario credito fiscale</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('phiscal_transferee') is-invalid @enderror" id="phiscal_transferee" name="phiscal_transferee" value="{{old('phiscal_transferee') ?? $subject->phiscal_transferee}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('phiscal_transferee')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="lending_bank" style="display:inline-block;" >Banca finaziatrice</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('lending_bank') is-invalid @enderror" id="lending_bank" name="lending_bank" value="{{old('lending_bank') ?? $subject->lending_bank}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('lending_bank')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="insurer" style="display:inline-block;" >Assicuratore</label><br/>
                                        <input type="text" class="col-md-12 form-control @error('insurer') is-invalid @enderror" id="insurer" name="insurer" value="{{old('insurer') ?? $subject->insurer}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('insurer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
        
                                    <div class="form group">
                                        <label for="consultant" style="display:inline-block;" >Consulente</label><br/>
                                        <div class="row">
                                            <div class="col-md form-group">
                                                <input type="text" class="col-md-12 form-control @error('consultant') is-invalid @enderror" id="consultant" name="consultant" value="{{old('consultant') ?? $subject->consultant}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                                @error('consultant')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <label for="signaler"></label>
                                            <div class="col-md form-group">
                                                <input type="text" class="col-md-12 form-control @error('signaler') is-invalid @enderror" id="signaler" name="signaler" value="{{old('signaler') ?? $subject->signaler}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                                @error('signaler')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                               @enderror
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="area_manager" style="display:inline-block;" >Area Manager</label><br/>
                                        <input type="text" class="col-md-6 form-control @error('area_manager') is-invalid @enderror" id="area_manager" name="area_manager" value="{{old('area_manager') ?? $subject->area_manager}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" />
                                        @error('area_manager')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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