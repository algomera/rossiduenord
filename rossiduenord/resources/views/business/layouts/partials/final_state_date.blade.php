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
    <div class="px-20 mt-5">
        <p class="font-500" style="text-decoration: underline;">APE DC. Dati Climatici</p>
        <div class="d-flex align-items-center">
            <p class="m-0">Temperatura di progetto</p>
            <label for="" class=" m-0 mr-4 black">
                <input type="text" value="" style="width: 120px;" class="border ml-2 px-2 text-right">
                c°
            </label>
        </div>
        <div class="mt-5">
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
</div>


