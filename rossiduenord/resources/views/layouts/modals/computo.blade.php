<div v-cloak class="opacity" v-if="isModalVisible">
    <div class="modal-full">
        {{-- header --}}
        <div class="header-modal">
            <div class="title px-2 py-2 pr-4">
                <div class="d-flex align-items-baseline">
                    <h3 class="mr-4">Computo metrico</h3>
                    <h5>Immobile: {{$practice->address}} {{$practice->civic}} {{$practice->common}} {{$practice->province}}</h5>
                </div>
                <div class="d-flex align-items-baseline">
                    <div class=" d-flex" style="width: 100%; column-gap:20px;">
                        <div @click="opencloseModal()" class="d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
                            <img src="{{asset('/img/icon/icona_esci.svg')}}" alt="exit">
                            <span>Esci</span>
                        </div>
                    </div>        
                </div>
            </div>
        </div>

        {{-- body --}}
        <div class="body-modal">
            {{--modal-top --}}
            <div class="body-top" style="height: 320px">
                <div class=" d-flex flex-column px-2" style="width: 15%; height:320px; row-gap: 10px; overflow:auto">
                    <div class="dropdown-container">
                        <button @click="openTrainanti" class="btn btn-secondary icon-center">
                            <i class="fa-solid fa-folder"></i> 
                            Interventi Trainanti
                        </button>
                        <div v-show="dropTrainanti" id="dropdownTrainanti" class="dropdown-content">
                            <a href="#">Isolamento termico</a>
                            <a href="#">Sostituzione degli impianti</a>
                            <a href="#">Interventi di miglioramento sismico</a>
                        </div>
                    </div>
                    <div class="dropdown-container">
                        <button @click="openTrainati" class="btn btn-secondary icon-center">
                            <i class="fa-solid fa-folder"></i> 
                            Interventi Trainati
                        </button>
                        <div v-show="dropTrainati" class="dropdown-content" aria-labelledby="dropdownTrainati">
                            <a href="#">Isolamento termico</a>
                            <a href="#">Sostituzione degli infissi</a>
                            <a href="#">Schermature solari e chiusure oscuranti</a>
                            <a href="#">Sostituzione degli impianti</a>
                            <a href="#">Sistemi di microgenerazione</a>
                            <a href="#">generatori a biomassa</a>
                            <a href="#">Building Automation</a>
                            <a href="#">Collettori solari</a>
                            <a href="#">Fotovoltaico</a>
                            <a href="#">Sistema di accumulo</a>
                            <a href="#">Infrastrutture per ricarica</a>
                            <a href="#">Eliminazione Barriere Architettoniche</a>
                        </div>
                    </div>
                </div>

                <div class="" style="width: 85%; height:100%;overflow:auto">
                    <table class="table_bonus" style="width: 100%">
                        <thead>
                            <tr>
                                <td style="width:5%;" class="text-center">Num.</td>
                                <td style="width:5%;" class="text-center">Prezziario</td>
                                <td style="width:5%;" class="text-center">Codice E.P.</td>
                                <td style="width:30%;">Descrizione</td>
                                <td style="width:5%;" class="text-center">Prog. Ragg.</td>
                                <td style="width:5%;" class="text-center">U.M</td>
                                <td style="width:10%;" class="text-center">Quantità</td>
                                <td style="width:10%;" class="text-center">Prezzo Un. €</td>
                                <td style="width:10%;" class="text-center">Sconto €</td>
                                <td style="width:10%;">Importo Tot. €</td>
                                <td style="width:10%;">Di cui mat. €</td>
                                <td style="width:20%;" class="text-center">Azioni</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom-style: double; border-top-style: double;" v-for="item in 5" :key="item">
                                <td>1</td>
                                <td>DEI20-R2</td>
                                <td>DSR.3.01.001.A</td>
                                <td class="text-left">
                                    <p class="tronk-text">
                                        Mascherina facciale con lato superiore dotato di filo interno per modellarlo al naso ed elastici auricolari:       
                                    </p>
                                </td>  
                                <td></td>
                                <td>cad</td>
                                <td>40.000</td>
                                <td>6.49</td>
                                <td>0.00</td>
                                <td>660.00</td>
                                <td>112.50</td>
                                <td class="d-flex" style="column-gap: 10px">
                                    <div class="d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
                                        <img src="{{asset('/img/icon/icona_modifica.svg')}}" alt="">
                                        <span>Modifica</span>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
                                        <img src="{{asset('/img/icon/icona_cancella.svg')}}" alt="">
                                        <span>Cancella</span>
                                    </div>                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{--modal-center --}}
            <div class="box-import d-flex justify-content-between px-2 py-2" style="width: 100%; background-color: #f2f2f2">
                <div style="width: 20%" class="d-flex justify-content-center">
                    <span><b>Importo intervento</b></span>
                    <input class="ml-2 px-2" placeholder="€ 0.00" type="number" name="" id="">
                </div>
                <div class="d-flex justify-content-end" style="width: 80%; column-gap:15px">
                    <div>
                        <span>Tot. Selezionato €</span>
                        <input class="ml-1 px-2" type="number" placeholder="0.00" name="" id="">
                    </div>
                    <div class="ml-5">
                        <span><b>Tot. Lavori C.M €</b></span>
                        <input class="ml-1 px-2" type="number" placeholder="0.00" name="" id="">
                    </div>
                </div>
            </div>

            {{--modal-bottom --}}
            <div class="body-bottom">

                {{-- left --}}
                <div class=" d-flex flex-column" style="width: 20%; height:400px">
                    <select class="btn btn-secondary " style="text-align: left" name="" id="">
                        <option value="">Prezziario-1</option>
                        <option value="">Prezziario-2</option>
                        <option value="">Prezziario-3</option>
                    </select>
                    <div class="p-2" style="overflow: auto">
                        <div v-for="item in 20" :key="item">
                            <p><i style="color: #61a4d7" class="fa-solid fa-folder"></i> Cartella</p>
                        </div>
                    </div>
                </div>

                {{-- right --}}
                <div class="" style="width: 80%; height:400px;">

                    <div class="d-flex justify-content-between align-items-center px-2 mb-2" style="width: 100%; height:60px">
                        <div style="width: 80%;">
                            <input type="text" class="input_search" style="width: 80%; height:50px; padding:10px 20px" placeholder="Cerca..." name="" id="">
                            <button class="add-button" style="padding: 10px 20px!important"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="pr-3">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{asset('/img/icon/icona_excel.svg')}}" alt="">
                                <span>Excel</span>
                            </div>    
                        </div>
                    </div>

                    <div style=" width: 100%; height:330px; overflow:auto">
                        <table class="table_bonus" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td style="width:5%;" class="text-center"></td>
                                    <td style="width:10%;" class="text-center">Codice E.P.</td>
                                    <td style="width:55%;">Descrizione</td>
                                    <td style="width:5%;" class="text-center">U.M</td>
                                    <td style="width:10%;" class="text-center">Prezzo</td>
                                    <td style="width:5%;" class="text-center">% Mat.</td>
                                    <td style="width:5%;"class="text-center"></td>
                                    <td style="width:5%;"class="text-center">Inserisci</td>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom-style: double; border-top-style: double" v-for="item in 15" :key="item">
                                    <td></td>
                                    <td>DSR.3.01.001.A</td>
                                    <td class="text-left">
                                        <p class="tronk-text">
                                            Mascherina facciale con lato superiore dotato di filo interno per modellarlo al naso ed elastici auricolari:
                                        </p>
                                    </td>
                                    <td>cad</td>
                                    <td>40.000</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button @click="openclosePrevent()" class="add-button bg-green" style="padding: 5px 20px!important"><i class="fa-solid fa-upload"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
