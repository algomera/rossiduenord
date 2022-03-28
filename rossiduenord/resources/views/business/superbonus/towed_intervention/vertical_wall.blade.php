@extends('business.layouts.business')

@section('content')
@include('business.layouts.partials.practiceNav')

            <div class="nav_bonus">
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == 'business.superbonus.show' ? 'frame' : ''}}">Dati di Progetto</a>
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Interventi trainanti</a>
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Interventi trainati</a>
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Dati stato finale</a>
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Tot. Spese e Dichiarazioni</a>
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Varianti</a>
            </div>

            <form action="" method="POST">
                @csrf
                @method('PUT')

                <div class="px-20">
                    <h6>Interventi trainati</h6>
                    <hr style="margin-top: 5px; background-color: #211e16;">
                    
                    <p class="m-0">Interventi trainanti oggetto dei lavori</p>
                    <hr style="margin-top: 5px; background-color: #818387;">
                </div>
                
                <div class="d-flex" style="font-weight: 500">
                
                    <div class="px-20 border-right" style="width: 20%">{{-- column left --}}
                        <div class="d-flex align-items-center pb-2 pt-0">
                            <img src="{{ asset('/img/icon/round-yellow.svg')}}" alt="">
                            <p class="m-0 ml-2 font-weight-bold">Parti comuni</p>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <img src="{{ asset('/img/icon/round-green.svg')}}" alt="">
                            <p class="m-0 ml-2">Nome Cognome -Fog Part.Sub</p>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <img src="{{ asset('/img/icon/round-green.svg')}}" alt="">
                            <p class="m-0 ml-2">Nome Cognome -Fog Part.Sub</p>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <img src="{{ asset('/img/icon/round-green.svg')}}" alt="">
                            <p class="m-0 ml-2">Nome Cognome -Fog Part.Sub</p>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <img src="{{ asset('/img/icon/round-green.svg')}}" alt="">
                            <p class="m-0 ml-2">Nome Cognome -Fog Part.Sub</p>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <img src="{{ asset('/img/icon/round-green.svg')}}" alt="">
                            <p class="m-0 ml-2">Nome Cognome -Fog Part.Sub</p>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <img src="{{ asset('/img/icon/round-green.svg')}}" alt="">
                            <p class="m-0 ml-2">Nome Cognome -Fog Part.Sub</p>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <img src="{{ asset('/img/icon/round-green.svg')}}" alt="">
                            <p class="m-0 ml-2">Nome Cognome -Fog Part.Sub</p>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <img src="{{ asset('/img/icon/round-green.svg')}}" alt="">
                            <p class="m-0 ml-2">Nome Cognome -Fog Part.Sub</p>
                        </div>
                    </div>
                
                    <div style="width: 80%" class="pb-20 px-4 scroll">{{-- column right --}}
                
                        <div>{{-- 1. Intervento di isolamento termico delle superfici opache verticali e orizzontali --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="thermical_isolation_intervention" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>1. Intervento di isolamento termico delle superfici opache verticali e orizzontali</b></span>
                            </label>
                            <p>Le superfici oggetto dell'intervento sono:</p>
                            
                            <div class="nav_bonus d-flex align-items-center">
                                <a class="frame">(PV) Pareti Verticali</a>
                                <a>(PO) Coperture</a>
                                <a>(PS) Pavimenti</a>
                            </div>
                
                            <table class="table_bonus" style="width: 100%">
                                <thead>
                                    <tr>
                                        <td class="text-center" style="width:5%;"><b>N.</b></td>
                                        <td style="width:20%;"><b>Descrizione</b></td>
                                        <td style="width:13%;"><b>Superficie (m2)</b></td>
                                        <td style="width:10%;">
                                            <b>
                                                Trasm. ante
                                                (W/m2k)    
                                            </b>
                                        </td>
                                        <td style="width:10%;">
                                            <b>
                                                Trasm. post
                                                (W/m2k)    
                                            </b>
                                        </td>
                                        <td style="width:15%;">
                                            <b>
                                                Trasm. Term.
                                                Period. YIE (W/m2k)    
                                            </b>
                                        </td>
                                        <td style="width:15%;"><b>Confine</b></td>
                                        <td style="width:15%;"><b>Coibentazione</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center"></td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right">0,00 </td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                
                            <div class="d-flex mt-5" style="background-color: #f2f2f2; width:100%; padding:5px 10px">
                                <div class="d-flex mr-4">
                                    <p class="m-0">Totale “pareti verticali”</p>
                                    <label for="" class="m-0 black">
                                        <input type="text" value="656,46" name="total_vertical_walls" class="border ml-2 px-2 text-right" style="width: 80px">
                                        m²
                                    </label>
                                </div>
                                <div class="d-flex mr-4">
                                    <p class="m-0">di cui realizzati SAL n. 1</p>
                                    <label for="" class="m-0  black">
                                        <input type="text" value="557,99" name="vw_realized_1" class="border ml-2 px-2 text-right" style="width: 80px">
                                        m²
                                    </label>
                                </div>
                                <div class="d-flex mr-4">
                                    <p class="m-0">SAL n. 2</p>
                                    <label for="" class="m-0  black">
                                        <input type="text" value="65,65" name="vw_realized_2" class="border ml-2 px-2 text-right" style="width: 80px">
                                        m²
                                    </label>
                                </div>
                                <div class="d-flex mr-4">
                                    <p class="m-0">SAL F.</p>
                                    <label for="" class="m-0  black">
                                        <input type="text" value="" class="border ml-2 px-2 text-right" style="width: 80px">
                                        m²
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3" style="width:100%;">
                                <p class="m-0">Superficie totale oggetto dell’intervento</p>
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" value="1.045,81" name="total_intervention_surface" style="width: 80px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                    m²
                                </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo complessivo previsto in progetto dei lavori sulle pratiche opache ammonta a*</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="500.115,13" name="expected_project_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                        </div>
                        
                        <div>{{-- IN. Sostituzione degli infissi --}}
                            <label class="checkbox-wrapper d-flex mt-5">
                                <input type="checkbox" name="fixture_replacing_intervention" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>IN. Sostituzione degli infissi</b></span>
                            </label>
                    
                            <p>Le superfici oggetto dell'intervento sono:</p>
                    
                            <table class="table_bonus" style="width: 100%">
                                <thead>
                                    <tr>
                                        <td class="text-center" style="width:5%;"><b>N.</b></td>
                                        <td style="width:15%;"><b>Descrizione</b></td>
                                        <td style="width:10%;"><b>Superficie (m2)</b></td>
                                        <td style="width:10%;">
                                            <b>
                                                Trasm. ante
                                                (W/m2k)    
                                            </b>
                                        </td>
                                        <td style="width:10%;">
                                            <b>
                                                Trasm. post
                                                (W/m2k)    
                                            </b>
                                        </td>
                                        <td style="width:10%;">
                                            <b>Telaio prima</b>
                                        </td>
                                        <td style="width:10%;"><b>Vetro prima</b></td>
                                        <td style="width:10%;"><b>Telaio dopo</b></td>
                                        <td style="width:10%;"><b>Vetro dopo</b></td>
                                        <td style="width:10%;"><b>Oscurante</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center"></td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                    
                            <div class="d-flex align-items-center justify-content-between mt-5" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Le spese previste in progetto dei lavori al punto IN ammontano a*</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="" name="fixture_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                            
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa prevista per gli interventi di cui ai punti PV, PO, PS e IN ammonta a*</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" name="work_expected_cost" value="0,00" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                    
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" name="max_possible_cost" value="1.418.170,00" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                    
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="0,00"  name="fixture_energetic_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div class="mt-5">{{-- SS. Schermate solari e chiusure oscuranti --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>SS. Schermate solari e chiusure oscuranti</b></span>
                            </label>
                            <div style="width: 100%; height: 200px; background-color: #f2f2f2 ">
                        
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Le spese previste in progetto dei lavori al punto SS ammontano a*</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="" name="ss_project_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                    
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" name="ss_max_cost" value="1.418.170,00" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                    
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" name="ss_energetic_savings" value="0,00" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div class="mt-5">{{-- 2 sezione inpianti --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="wacs_replacement" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>2.Intervento di sostituzione degli impianti di climatizzazione invernale esistenti</b></span>
                            </label>
                            <p>Con impianti dotati di:</p>
                            <hr>
                        </div>
                
                        <div class="mt-5">{{-- CC. Caldaie a condensazione --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="condensing_boiler" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>CC. Caldaie a condensazione</b></span>
                            </label>
                            <div style="width: 100%; height: 200px; background-color: #f2f2f2 ">
                        
                            </div>
                        </div>
                
                        <div class="mt-5">{{-- GA. Generatori di aria calda a condensazione --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="condensing_generator" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>GA. Generatori di aria calda a condensazione</b></span>
                            </label>
                            <div style="width: 100%; height: 200px; background-color: #f2f2f2 ">
                        
                            </div>
                        </div>
                
                        <div class="mt-5">{{-- PCA. Pompe di calore ad assorbimento a… --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="absorption_heat_pumps" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>PCA. Pompe di calore ad assorbimento a…</b></span>
                            </label>
                            <div style="width: 100%; height: 200px; background-color: #f2f2f2 ">
                        
                            </div>
                        </div>
                
                        <div class="mt-5">{{-- SI. Sistemi ibridi --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="hybrid_system" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>SI. Sistemi ibridi</b></span>
                            </label>
                            <div style="width: 100%; height: 200px; background-color: #f2f2f2 ">
                        
                            </div>
                        </div>
                
                        <div>{{-- SA. Installazione di scaldacqua a pompa di c… --}}
                            <div class="mt-5">
                                <label class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="water_heatpumps_installation" value="">     
                                    <span class="checkmark"></span> 
                                    <span class="black" ><b>SA. Installazione di scaldacqua a pompa di c…</b></span>
                                </label>
                                <p class="font-italic">In sostituzione di scaldacqua tradizionali con scaldacqua a pompa di calore dedicati alla produzione di acqua calda sanitaria</p>
                                <div style="width: 100%; height: 200px; background-color: #f2f2f2 ">
                            
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo complessivo previsto degli interventi sull’impianto (Punto 2) ammonta a *</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="" name="SA_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile per la sostituzione degli impianti è pari a</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" name="SA_max_cost" value="709.072,00" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" name="SA_nr_savings" value="0,00" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div>{{-- CO. Sistemi di microgenerazione --}}
                            <div class="mt-5">
                                <label class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="microgeneration_system" value="">     
                                    <span class="checkmark"></span> 
                                    <span class="black" ><b>CO. Sistemi di microgenerazione</b></span>
                                </label>
                                <div style="width: 100%; height: 200px; background-color: #f2f2f2 ">
                            
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per i sistemi di microgenerazione CO) ammonta a *</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" name="CO_expected_cost" value="" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile per l’intrevento è pari a</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="90.909,00" name="CO_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="0,00" name="CO_nr_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div>{{-- IB. Generatori a bioma… --}}
                            <div class="mt-5">
                                <label class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="biome_generators" value="">     
                                    <span class="checkmark"></span> 
                                    <span class="black" ><b>IB. Generatori a bioma…</b></span>
                                </label>
                                <p class="font-italic">Installazione di impianti di climatizzazione invernale dotati di generatori di calore alimentati da biomasse combustibili</p>
                                <div style="width: 100%; height: 200px; background-color: #f2f2f2 ">
                            
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per i generatori a biomassa IB) ammonta a *</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="" name="IB_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile per l’intrevento è pari a</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="709.072,00" name="IB_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="0,00" name="IB_nr_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div>{{-- BA. Bullding automation --}}
                            <div class="mt-5">
                                <label class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="building_automation" value="">     
                                    <span class="checkmark"></span> 
                                    <span class="black" ><b>BA. Bullding automation</b></span>
                                </label>
                            </div>
                            <p>I sistemi di Building Automation dedicati al controllo di:</p>
                            <div class="d-flex">
                                <div class="mr-5">
                                    <p class="m-0">Climatizzazione invernale</p>
                                    <input type="radio" name="BA_winter_acs" id="">
                                    <label for="" class="mr-3 black" >N.D</label>
                                    <input type="radio" name="BA_winter_acs" id="">
                                    <label for="" class="mr-3 black">No</label>
                                    <input type="radio" name="BA_winter_acs" id="">
                                    <label for="" class="mr-3 black">Si</label>
                                </div>
                                <div class="mr-5">
                                    <p class="m-0">Climatizzazione estiva</p>
                                    <input type="radio" name="BA_summer_acs" id="">
                                    <label for="" class="mr-3 black">N.D</label>
                                    <input type="radio" name="BA_summer_acs" id="">
                                    <label for="" class="mr-3 black">No</label>
                                    <input type="radio" name="BA_summer_acs" id="">
                                    <label for="" class="mr-3 black">Si</label>
                                </div>
                                <div class="mr-5">
                                    <p class="m-0">Produzione di acqua calda sanitaria</p>
                                    <input type="radio" name="BA_hot_water_production" id="">
                                    <label for="" class="mr-3 black">N.D</label>
                                    <input type="radio" name="BA_hot_water_production" id="">
                                    <label for="" class="mr-3 black">No</label>
                                    <input type="radio" name="BA_hot_water_production" id="">
                                    <label for="" class="mr-3 black">Si</label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Superficie utile degli ambienti controllati</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="0,00" name="BA_usable_area" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        m²
                                    </label>
                                </div>
                            </div>
                            <p>I dispositivi installati hanno caratteristiche e funzioni conformi a quanto previsto dal “decreto requisiti ecobonus”</p>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per Building automation BA) ammonta a *</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="" name="BA_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile dal “decreto requisiti ecobonus” è pari a</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="13.636,36" name="BA_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="0,00" name="BA_nr_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div>{{-- Gli impianti sopra indicati sono destinati a: --}}
                            <p class="font-weight-bold">Gli impianti sopra indicati sono destinati a:</p>
                            <div class="d-flex">
                                <label class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="winter_acs" value="">     
                                    <span class="checkmark"></span> 
                                    <span class="black" >Climatizzazione invernale</span>
                                </label>
                                <label class="checkbox-wrapper d-flex ml-5">
                                    <input type="checkbox" name="summer_acs" value="">     
                                    <span class="checkmark"></span> 
                                    <span class="black" >Climatizzazione estiva</span>
                                </label>
                                <label class="checkbox-wrapper d-flex ml-5">
                                    <input type="checkbox" name="hot_water_production" value="">     
                                    <span class="checkmark"></span> 
                                    <span class="black" >Produzione di acqua calda sanitaria</span>
                                </label>
                            </div>
                        </div>
                
                        <div class="mt-5">{{-- ST. Collettori solari --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="TS" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>ST. Collettori solari</b></span>
                            </label>
                            <div style="width: 100%; height: 200px; background-color: #f2f2f2 ">
                        
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per i Collettori solari ST) ammonta a *</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="" name="TS_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                            
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="54.545,00" name="TS_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="0,00" name="TS_nr_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div class="mt-5">{{-- FV. Fotovoltaico --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="FV" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>FV. Fotovoltaico</b></span>
                            </label>
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label for="" class=" m-0 mr-4 black">Codice POD</label>
                                        <input type="text" value="" name="POD_code" style="width: 180px;" class="border ml-2 px-2 text-right">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between ml-5">
                                    <div class="d-flex align-items-center">
                                        <p class="m-0 black" style="font-weight: 500">Potenza di picco</p>
                                        <label for="" class=" m-0 mr-4 black">
                                            <input type="text" value="0,00" name="max_power" style="width: 120px;" class="border ml-2 px-2 text-right">
                                            kW
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per il Fotovoltaico FV) ammonta a *</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="" name="FV_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="0,00" name="FV_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div class="mt-5">{{-- AC. Sistema di accumulo --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="AC" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>AC. Sistema di accumulo</b></span>
                            </label>
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label for="" class=" m-0 mr-4 black">Capacità</label>
                                        <input type="text" value="0,00" name="capacity" style="width: 180px;" class="border ml-2 px-2 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per il Sistema di accumulo AC) ammonta a *</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="" name="AC_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="0,00" name="AC_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div class="mt-5">{{-- CR. Infrastrutture per la ricarica di veicoli elettrici --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="CR" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>CR. Infrastrutture per la ricarica di veicoli elettrici</b></span>
                            </label>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per le infrastrutture CR) ammonta a *</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="" name="CR_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                            
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label for="" class=" m-0 mr-4 black">Numero di colonnine installate</label>
                                        <input type="text" value="12" name="CR_installed_columns" style="width: 180px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="14.400,00" name="CR_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-5">{{-- EBA. Eliminazione delle barriere architettoniche --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="EBA" value="">     
                                <span class="checkmark"></span> 
                                <span class="black" ><b>EBA. Eliminazione delle barriere architettoniche</b></span>
                            </label>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-end" style="width: 65%">
                                    <p class="m-0">
                                        a) Il costo omnicomprensivo previsto in progetto dell’intervento di cui all’articolo 16-bis, comma 1, lettera e), 
                                        del testo unico di cui al decreto del Presidente della Repubblica 22 dicembre 1986, n.917 anche ove effettuati in 
                                        favore di persone di età superiore a sessantacinque anni è di
                                        <label for="" class=" m-0 mr-4 black">
                                            <input type="text" value="0,00" name="EBA_expected_cost" style="width: 120px;" class="border mr-2 px-2 text-right">
                                            €
                                        </label>
                                    </p>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <div class="d-flex align-items-end mt-4" style="width: 65%">
                                <p class="m-0">
                                    b) Per le stesse unità immobiliari sono previste spese complessive relative ad interventi antisismici di cui 
                                    al comma 4 dell’art.119 del D.L. 34/2020 e successive modificazioni e ad altri interventi di cui all’art. 16 bis 
                                    del DPR 917/86, pari a
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="0,00" name="EBA_sismic_costs" style="width: 120px;" class="border mr-2 px-2 text-right">
                                        €
                                    </label>
                                </p>
                            </div>
                            <div class="d-flex align-items-end mt-4" style="width: 65%">
                                <p class="m-0">
                                    Fermo restando che la spesa massima ammissibile per tutti gli interventi di cui ai precedenti punti a) e b) 
                                    non può superare 96.000 € per unità immobiliare, la spesa massima ammissibile disponibile per l’eliminazione 
                                    delle barriere architettoniche è pertanto pari a
                                    <label for="" class=" m-0 black">
                                        <input type="text" value="0,00" name="EBA_barr_deleting_cost" style="width: 120px; background-color: #f2f2f2" class="border px-2 text-right">
                                    </label>
                                    <span>€ che in ogni caso, non può superare N x 96.000 €</span>
                                </p>
                            </div>
                            <div class="d-flex align-items-end mt-4" style="width: 65%">
                                <p class="m-0">
                                    La spesa massima ammissibile è pari a
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="0,00" value="EBA_max_cost" style="width: 120px; background-color: #f2f2f2" class="border mr-2 px-2 text-right">
                                        €
                                    </label>
                                </p>
                            </div>
                
                            <div class="d-flex justify-content-between mt-4" style="width: 100%">
                                <p class="m-0 mt-2 font-500">Avanzamento lavori trainanti</p>
                                <table class="table_bonus" style="width: 70%">
                                    <thead>
                                        <tr>
                                            <td style="width:25%;"><b>Lavori</b></td>
                                            <td style="width:10%;"><b>% SAL 1</b></td>
                                            <td style="width:10%;"><b>% SAL 2</b></td>
                                            <td style="width:10%;"><b>% SAL F</b></td>
                                            <td style="width:15%;"><b>Importo SAL 1</b></td>
                                            <td style="width:15%;"><b>Importo SAL 2</b></td>
                                            <td style="width:15%;"><b>Importo SAL F</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                        </tr>
                                    </tbody>
                                </table>    
                            </div>
                            
                            <div class="d-flex align-items-center mt-5" style="width: 80%">
                                <p class="m-0 font-500">per un ammontare pari a</p>
                                <div class="d-flex align-items-center ml-5">
                                    <span>SAL. n.1</span>
                                    <label for="" class="d-flex align-items-end m-0 mr-1">
                                        <input type="text" name="EBA_cost_1" value="0,00" class="ml-2 text-right px-2 border" style="width:120px; background-color: #f2f2f2">
                                    </label>
                                    <span>€</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <span>SAL. n.2</span>
                                    <label for="" class="d-flex align-items-end m-0 mr-1">
                                        <input type="text" value="0,00" name="EBA_cost_2" class="ml-2 text-right px-2 border" style="width:120px; background-color: #f2f2f2">
                                    </label>
                                    <span>€</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <span>SAL. n.F</span>
                                    <label for="" class="d-flex align-items-end m-0 mr-1">
                                        <input type="text" value="0,00" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                                    </label>
                                    <span>€</span>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mt-3" style="width: 80%">
                                <p class="m-0"><b>La spesa ammessa è pari </b></p>
                                <label for="" class="d-flex align-items-end black m-0 mr-1 ml-5">
                                    <input type="text" value="0,00" name="EBA_max_cost" class="ml-2 mr-1 text-right px-2 border" style="width:120px; background-color: #f2f2f2">
                                    €
                                </label>
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