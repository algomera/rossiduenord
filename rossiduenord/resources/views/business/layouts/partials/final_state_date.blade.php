<div class="px-20">
    <h6>Dati stato finale</h6>
    <hr style="margin-top: 5px; background-color: #211e16;">
</div>

<div class="scroll" style="font-weight: 500">
    <p class="font-500 px-20" style="text-decoration: underline;">Impianto termico esistente nella situazione ante intervento:</p>
    
    <div class="px-20" style="width: 80%">{{-- select pre intervento --}}
        <div class="form-group">
            <label for="" class="grey">Tipo di impianto</label>
            <div class="position-relative">
                <div class="select"></div>
                <select class="form-control px-3" style="background-color: #f2f2f2" name="" id="">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="grey">Terminali di erogazione del calore</label>
            <div class="position-relative">
                <div class="select"></div>
                <select class="form-control px-3" style="background-color: #f2f2f2" name="" id="">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="grey">Tipo di distribuzione</label>
            <div class="position-relative">
                <div class="select"></div>
                <select class="form-control px-3" style="background-color: #f2f2f2" name="" id="">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="grey">Tipo di regolazione</label>
            <div class="position-relative">
                <div class="select"></div>
                <select class="form-control px-3" style="background-color: #f2f2f2" name="" id="">
                    <option value=""></option>
                </select>
            </div>
        </div>
    </div>
    
    <div class=" mt-5 px-20">{{-- Tipo e numero di generatori presenti prima dell’intervento --}}
        <p class="ml-3"><b>Tipo e numero di generatori presenti prima dell’intervento</b></p>
        <div class="py-2 px-3" style="width: 80%; height: 150px; background-color: #f2f2f2; position: relative; ">
            <div class="d-flex">
                <span class="mr-2">1) Tipo</span>
                <select name="" id="" style="width: 200px; background-color: #dbdcdb; border: none;">
                    <option value=""></option>
                </select>
                <span class="ml-4">N° di generatori</span>
                <input type="text" class="border ml-2 px-2 text-right" style="width: 100px">
            </div>
            <div class="d-flex">
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <div class="d-flex align-items-center">
                        <p class="m-0">Rendimento al 100% della potenza</p>
                        <label for="" class=" m-0 mr-4 black">
                            <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                            %
                        </label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-3 ml-4">
                    <div class="d-flex align-items-center">
                        <p class="m-0">Potenza utile nominale complessiva</p>
                        <label for="" class=" m-0 mr-4 black">
                            <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                            kW
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn-delete" style="position: absolute; bottom:10px; right:10px">Elimina</button>
        </div>
    </div>

    <div class="mt-5 px-20" style="width: 80%">{{-- Potenza nominale complessiva --}}
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <p class="m-0">Potenza nominale complessiva</p>
                <label for="" class=" m-0 mr-4 black">
                    <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                    kW
                </label>
            </div>
        </div>
        <div class="form-group mt-2">
            <label for="" class="grey">Vettore energetico prevalente</label>
            <div class="position-relative">
                <div class="select"></div>
                <select class="form-control px-3" style="background-color: #f2f2f2" name="" id="">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <label class="checkbox-wrapper d-flex">
            <input type="checkbox" name="" value="">     
            <span class="checkmark"></span> 
            <span class="black" >Presenza dell’impianto di condizionamento estivo</span>
        </label>
        <p class="m-0">Eventuali interventi di manutenzione straordinaria</p>
        <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; ">

        </div>
    </div>

    <div class="mt-5 px-20" style="width: 80%">{{-- APE IE. Involucro Edilizio: --}}
        <p class="font-500" style="text-decoration: underline;">APE IE. Involucro Edilizio:</p>
        <div class="form-group mt-2">
            <label for="" class="grey">Tipologia costruttiva</label>
            <div class="position-relative">
                <div class="select"></div>
                <select class="form-control px-3" style="background-color: #f2f2f2" name="" id="">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <p class="m-0">Volume lordo riscaldato V</p>
            <label for="" class=" m-0 mr-4 black">
                <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                m²
            </label>
        </div>
        <div class="d-flex mt-3">
            <div class="d-flex align-items-center">
                <p class="m-0">Superficie disperdente S</p>
                <label for="" class=" m-0 mr-4 black">
                    <input type="text" value="" style="width: 120px;" class="border ml-3 px-2 text-right">
                    m²
                </label>
            </div>
            <div class="d-flex align-items-center">
                <p class="m-0">Rapporto S/V</p>
                <label for="" class=" m-0 mr-4 black">
                    <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                    m²
                </label>
            </div>
            <div class="d-flex align-items-center">
                <p class="m-0">Superficie utile riscaldata</p>
                <label for="" class=" m-0 mr-4 black">
                    <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                    m²
                </label>
            </div>
        </div>

        <div class="d-flex mt-3">
            <div class="d-flex align-items-center">
                <p class="m-0">Superficie utile raffrescata</p>
                <label for="" class=" m-0 mr-4 black">
                    <input type="text" value="" style="width: 120px;" class="border ml-1 px-2 text-right">
                    m²
                </label>
            </div>
            <div class="d-flex align-items-center">
                <p class="m-0">Anno di installazione del generatore</p>
                <label for="" class=" m-0 mr-4 black">
                    <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                </label>
            </div>
        </div>
        <p class="m-0 mt-3">Eventuali interventi di manutenzione straordinaria o ristrutturazione</p>
        <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; ">

        </div>
    </div>

    {{-- divider --}}

    <hr style="background-color: #f2f2f2; height:3px; border:none;">

    {{--  --}}
    <div class=" mt-5 px-20">
        <p class="font-500" style="text-decoration: underline;">APE IR. Impianto di Riscaldamento nella situazione post intervento</p>
        <label class="checkbox-wrapper d-flex">
            <input type="checkbox" name="" value="">     
            <span class="checkmark"></span> 
            <span class="black" >Climatizzazione invernale</span>
        </label>
        <label class="checkbox-wrapper d-flex">
            <input type="checkbox" name="" value="">     
            <span class="checkmark"></span> 
            <span class="black" >Produzione acqua calda sanitaria</span>
        </label>
        <label class="checkbox-wrapper d-flex">
            <input type="checkbox" name="" value="">     
            <span class="checkmark"></span> 
            <span class="black" >Ventilazione meccanica</span>
        </label>
        <label class="checkbox-wrapper d-flex">
            <input type="checkbox" name="" value="">     
            <span class="checkmark"></span> 
            <span class="black" >Climatizzazione estiva</span>
        </label>
        <label class="checkbox-wrapper d-flex">
            <input type="checkbox" name="" value="">     
            <span class="checkmark"></span> 
            <span class="black" >Illuminazione</span>
        </label>
        <label class="checkbox-wrapper d-flex">
            <input type="checkbox" name="" value="">     
            <span class="checkmark"></span> 
            <span class="black" >Trasporto di persone o cose</span>
        </label>
    </div>
    {{-- divider --}}
    <hr style="background-color: #f2f2f2; height:3px; border:none;">
    {{--  --}}
    <div class="px-20">
        <p class="font-500" style="text-decoration: underline;">APE DC. Dati Climatici</p>
        <div class="d-flex align-items-center">
            <p class="m-0">Temperatura di progetto</p>
            <label for="" class=" m-0 mr-4 black">
                <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                c°
            </label>
        </div>
        <div class="mt-3">
            <p class="font-500" style="text-decoration: underline;">APE TR. Tecnologie di utilizzo delle fonti rinnovabili, ove presenti</p>
            <div class="d-flex align-items-center my-2">
                <p class="m-0">Fotovoltaico potenza di picco</p>
                <label for="" class=" m-0 mr-4 black">
                    <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                    kW
                </label>
            </div>
            <div class="d-flex align-items-center my-2">
                    <p class="m-0">Eolico potenza nominale</p>
                    <label for="" class=" m-0 mr-4 black">
                        <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                        kW
                    </label>
            </div>
            <div class="d-flex align-items-center my-2">
                <p class="m-0">Solare termico superficie dei collettori</p>
                <label for="" class=" m-0 mr-4 black">
                    <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                    m²
                </label>
            </div>
        </div>
    </div>

    {{-- divider --}}
    <hr style="background-color: #f2f2f2; height:3px; border:none;">
    {{-- divider --}}

    <div class="px-20 w-80">
        <b class="m-0 mt-3 black">Risultati della valutazione energetica</b>
        <p class="font-500" style="text-decoration: underline;">APE NM: Norme e Metodologie</p>
        <div>
            <p>Riferimento alle norme tecniche utilizzate</p>
            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; "></div>
        </div>
        <div class="my-3">
            <p>Metodo di valutazione della prestazione energetica utilizzato</p>
            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; "></div>
        </div>
    </div>

    {{-- divider --}}
    <hr style="background-color: #f2f2f2; height:3px; border:none;">
    {{-- divider --}}

    <div class="px-20 w-80">
        <p class="font-500" style="text-decoration: underline;">APE DE: Descrizione edificio</p>
        <div class="my-3">
            <p>Descrizione dell'edificio e della sua localizzazione e destinazione d'uso</p>
            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; "></div>
        </div>
    </div>

    {{-- divider --}}
    <hr style="background-color: #f2f2f2; height:3px; border:none;">
    {{-- divider --}}

    <div class="px-20">
        <p class="font-500" style="text-decoration: underline;">APE I: Indici di presentrazione energetica </p>
        <div class="d-flex align-items-center">
            <p class="m-0">Indice di prestazione energetica non rinnovabile per le climatizazzione invernale proprio dell'edificio EPH,nren</p>
            <label for="" class=" m-0 mr-4 black">
                <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                kW/m² anno
            </label>
        </div>
        <div class="d-flex align-items-center my-3">
            <p class="m-0">Indice di prestazione energetica rinnovabile per le climatizazzione invernale proprio dell'edificio EPH,nren</p>
            <label for="" class=" m-0 mr-4 black">
                <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                kW/m² anno
            </label>
        </div>
    </div>

    {{-- divider --}}
    <hr style="background-color: #f2f2f2; height:3px; border:none;">
    {{-- divider --}}

    <div class="px-20">
        <p class="font-500" style="text-decoration: underline;">APE Q: Qualità invernale ed estiva dell'involucro</p>
        <div class="d-flex">
            <label for="" class=" m-0 mr-4 black">EPH,nd
                <input type="text" value="" class="border ml-2 px-2" style="width: 120px;" >
                kW/kW/m² anno
            </label>
            <label for="" class=" m-0 mr-4 black">Asol,est/Asup utile
                <input type="text" value="" class="border ml-2 px-2" style="width: 120px;">
            </label>
        </div>
        <div class="my-3">
            <label for="" class=" m-0 mr-4">
                <span class="black">YIE</span>
                <input type="text" value="" class="border ml-2 px-2" style="width: 120px;">
            </label>
        </div>
        {{--  --}}
        <div class="d-flex">
            <p>
                Indice di prestaziione energetica globale dell'edificio espresso in energia primaria non rinnovabile EPgl,nren
            </p> 
            <label for="" class=" m-0 mr-4 black">
                <input type="text" value="" class="border ml-2 px-2" style="width: 120px;">
                kW/kW/m² anno
            </label>
        </div>
        <div class="row">
            <div class="col-3">
                <span class="mr-2">Qualità invernale dell'involucro</span>
            </div>
            <div class="col-9">
                <select name="" id="" style="width: 200px; background-color: #dbdcdb; border: none;">
                    <option value=""></option>
                </select>
            </div>
            <div class="col-3">
                <span class="mr-2">Qualità estiva dell'involucro</span>
            </div>
            <div class="col-9">
                <select name="" id="" style="width: 200px; background-color: #dbdcdb; border: none;">
                    <option value=""></option>
                </select>
            </div>
            <div class="col-3">
                <span class="mr-2">Classe energetica</span>
            </div>
            <div class="col-9">
                <select name="" id="" style="width: 50px; background-color: #dbdcdb; border: none;">
                    <option value=""></option>
                </select>
            </div>
    </div>

    {{-- divider --}}
    <hr style="background-color: #f2f2f2; height:3px; border:none;">
    {{-- divider --}}

    <div class=" w-80">
        <p class="font-500" style="text-decoration: underline;">APE LC: Lista delle raccomandazioni</p>
        <div class="my-3">
            <p>Possibili interventi di miglioramento</p>
            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; "></div>
        </div>
    </div>
    {{-- end page --}}
</div>


