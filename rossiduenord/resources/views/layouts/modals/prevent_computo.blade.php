<div v-cloak class="opacity" v-if="isPreventVisible">
    <div class="modal-full-2 ">
        {{-- header --}}
        <div class="header-modal">
            <div class="title px-2 py-2 pr-4">
                <div class="d-flex align-items-baseline">
                    <h3 class="mr-4">Computo metrico</h3>
                    <h5>Immobile: {{$practice->address}} {{$practice->civic}} {{$practice->common}} {{$practice->province}}</h5>
                </div>
                <div>
                    <div  @click="openclosePrevent()" class="d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
                        <img src="{{asset('/img/icon/icona_esci.svg')}}" alt="exit">
                        <span>Indietro</span>
                    </div>
                </div>        
            </div>
        </div>

        {{-- body --}}
        <div class="body-modal">
            <div class="body-top px-2 pt-2 pb-4">
                {{-- left --}}
                <div style="width: 20%;" class="d-flex flex-column justify-content-center">
                    <div class="input-container">
                        <span><b>Num. Progr.</b></span>
                        <input class="input_custom_s" type="number" name="" id="">
                    </div>
                    <div class="input-container">
                        <span><b>Un. Misura</b></span>
                        <input class="input_custom" type="text" name="" id="">
                    </div>
                    <div class="input-container">
                        <span><b>Prez. Unit €</b></span>
                        <input class="input_custom" type="number" name="" id="">
                    </div>
                    <div class="input-container">
                        <span><b>Sconto Unit €</b></span>
                        <input class="input_custom_s" type="number" name="" id="">
                    </div>
                </div>
                {{-- right --}}
                <div style="width: 80%">
                    <div class="input-container-xl mb-2">
                        <span><b>Codice E.P.</b></span>
                        <span class="EP input_custom">DSR.3.01.001.A</span>
                    </div>
                    <div class="input-container-xl">
                        <span><b>Descrizione E.P.</b></span>
                        <p style="overflow: auto" class="description_EP input_custom">Fornitura  e posa di serramenti in PVC/Alluminio Tipo FINSTRAL FIN-Window Nova-line in policloruro di vinile non plastificato, non schiumato, tutti i profili principali con spessore delle pareti esterne in classe A secondo UNI EN 12608-1, profili di in alluminio con resistenza all'impatto mediante massa cadente classe II secondo UNI EN 12608-1, superficie colore bianco satinato (45), con rivestimento esterno in alluminio colore sablè 894 grigio scuro completa di ferramenta a vista interna di sicurezza, triplo vetro su anta Max-Valor 3/Multiprotect+Bodysafe 40 mm, 33.1m-12-4F-13-4Tm, I: 2(B)2,  E: 1(C)2, Ug=0.7 W/m²K, g=0,60, LT=0,76, Isolamento acustico elemento completo Rw (C, Ctr): 40 (-2,-5) dB valore Uf medio: 1.0 W/m²K dotato di scarico acqua, fermavetro distanziale termoisolante, smontaggio dell'elemento esistente e quant'altro a dare l'opera completa</p>
                    </div>
                </div>
            </div>
            <div class="body-bottom">
                <div style=" width: 100%; height:330px; overflow:auto">
                    <table class="table_bonus" style="width: 100%;">
                        <thead>
                            <tr>
                                <td style="width:5%;" class="text-center">N.</td>
                                <td style="width:55%;">Commento</td>
                                <td style="width:10%;">Espressione</td>
                                <td style="width:5%;" class="text-center">NPS</td>
                                <td style="width:10%;" class="text-center">Lunghezza</td>
                                <td style="width:5%;" class="text-center">Larghezza</td>
                                <td style="width:5%;"class="text-center">H-P-S</td>
                                <td style="width:5%;"class="text-center">Totale</td>                                    
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom-style: double; border-top-style: double" v-for="item in 15" :key="item">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- footer --}}
        <div class="footer-modal">
            <div class="d-flex" style="column-gap: 50px;">
                <div class="input-container">
                    <span><b>Quantità mq</b></span>
                    <input class="input_custom_s" type="number" name="" id="">
                </div>
                <div class="input-container">
                    <span><b>Prezzo Un. €</b></span>
                    <input class="input_custom_s" type="text" name="" id="">
                </div>
                <div class="input-container">
                    <span><b>Totale immissione €</b></span>
                    <input class="input_custom_s" type="number" name="" id="">
                </div>
            </div>
        </div>
    </div>
</div>