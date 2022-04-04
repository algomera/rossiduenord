@props(['vertwall', 'practice', 'items', 'condomino'])

<div class="mt-5">
    <div class="d-flex align-items-center mb-3">
        <label class="checkbox-wrapper d-flex align-items-center mb-0">
            <input {{$vertwall->microgeneration_system == 'true' ? 'checked' : ''}} type="checkbox" name="microgeneration_system" id="microgeneration_system" value="true">
            <span class="checkmark"></span>
            <span class="black" ><b>CO. Sistemi di microgenerazione</b></span>
        </label>
        <div class="add-btn-custom" onclick="addMicrogenerationSystem(event)">+</div>
        @if($items->count() > 0)
            <span><strong>(Inserite: {{ $items->count() }})</strong></span>
        @endif
    </div>
    <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
        <div id="microgeneration_system_wrapper">
            @forelse($items as $i => $item)
                <div class="box_input" data-id="microgeneration_system-{{$practice->id}}-{{$item->id}}">
                    {{ $i + 1 }}
                    <div class="row_input">
                        <input type="hidden" name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][condomino_id]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][condomino_id]" value="{{ $condomino ?? $item->condomino_id }}">
                        <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][tipo_sostituito]">
                            Tipo sostituito
                            <select name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][tipo_sostituito]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][tipo_sostituito]">
                                <option {{ $item->tipo_sostituito === 'Caldaia standard' ? 'selected' : ''}} value="Caldaia standard">Caldaia standard</option>
                                <option {{ $item->tipo_sostituito === 'Caldaia a bassa temperatura' ? 'selected' : ''}} value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                <option {{ $item->tipo_sostituito === 'Caldaia a condensazione a gas' ? 'selected' : ''}} value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                <option {{ $item->tipo_sostituito === 'Caldaia a condesazione a gasolio' ? 'selected' : ''}} value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                <option {{ $item->tipo_sostituito === 'Pompa di calore anche con sonda geotermica' ? 'selected' : ''}} value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                <option {{ $item->tipo_sostituito === 'Generatori di aria calda' ? 'selected' : ''}} value="Generatori di aria calda">Generatori di aria calda</option>
                                <option {{ $item->tipo_sostituito === 'Teleriscaldamento' ? 'selected' : ''}} value="Teleriscaldamento">Teleriscaldamento</option>
                                <option {{ $item->tipo_sostituito === 'Impianto a biomassa' ? 'selected' : ''}} value="Impianto a biomassa">Impianto a biomassa</option>
                                <option {{ $item->tipo_sostituito === 'Altro' ? 'selected' : ''}} value="Altro">Altro</option>
                            </select>
                        </label>
                        <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]">
                            P. nom. sostituito
                            <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]" value="{{ $item->p_nom_sostituito }}">
                            kW
                        </label>
                        <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_elettrica]">
                            P. Elettrica
                            <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_elettrica]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_elettrica]" value="{{ $item->p_elettrica }}">
                            kW
                        </label>
                        <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_immessa]">
                            P. immessa
                            <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_immessa]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_immessa]" value="{{ $item->p_immessa }}">
                            kW
                        </label>
                    </div>
                    <div class="row_input">
                        <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_term_recuperata]">
                            P. term. recuperata
                            <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_term_recuperata]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][p_term_recuperata]" value="{{ $item->p_term_recuperata }}">
                            kW
                        </label>
                        <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][pes]">
                            PES
                            <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][pes]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][pes]" value="{{ $item->pes }}">
                            %
                        </label>
                        <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]">
                            Tipo di alim.
                            <select name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]">
                                <option {{ $item->tipo_di_alimentazione === 'Metano' ? 'selected' : '' }} value="Metano">Gas Naturale (metano)</option>
                                <option {{ $item->tipo_di_alimentazione === 'Gpl' ? 'selected' : '' }} value="Gpl">Gpl</option>
                                <option {{ $item->tipo_di_alimentazione === 'Gasolio' ? 'selected' : '' }} value="Gasolio">Gasolio</option>
                            </select>
                        </label>
                        <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][tipo_intervento]">
                            Tipo intervento
                            <select name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][tipo_intervento]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][tipo_intervento]">
                                <option {{ $item->tipo_intervento === 'Nuovo' ? 'selected' : '' }} value="Nuovo">Nuova unità</option>
                                <option {{ $item->tipo_intervento === 'Rifacimento' ? 'selected' : '' }} value="Rifacimento">Rifacimento</option>
                            </select>
                        </label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="row_input">
                            <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][a_celle_a_combustibile]" class="checkbox-wrapper d-flex">
                                <input type="checkbox" {{ $item->a_celle_a_combustibile ? 'checked' : '' }} name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][a_celle_a_combustibile]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][a_celle_a_combustibile]" value="true">
                                <span class="checkmark"></span>
                                a Celle a Combustibile
                            </label>
                            <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][riscaldatore_suppl]" class="checkbox-wrapper d-flex">
                                <input type="checkbox" {{ $item->riscaldatore_suppl ? 'checked' : '' }} name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][riscaldatore_suppl]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][riscaldatore_suppl]" value="true">
                                <span class="checkmark"></span>
                                Riscaldatore suppl.
                            </label>
                            <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][potenza_risc_suppl]">
                                Potenza risc. suppl.
                                <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][potenza_risc_suppl]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][potenza_risc_suppl]" value="{{ $item->potenza_risc_suppl }}">
                                kW
                            </label>
                            <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][efficienza_ns]">
                                Efficienza ns
                                <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][efficienza_ns]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][efficienza_ns]" value="{{ $item->efficienza_ns }}">
                                %
                            </label>
                            <label for="microgeneration_systems[{{$practice->id}}-{{$item->id}}][classe_energ]">
                                Classe energ.
                                <select name="microgeneration_systems[{{$practice->id}}-{{$item->id}}][classe_energ]" id="microgeneration_systems[{{$practice->id}}-{{$item->id}}][classe_energ]">
                                    <option {{ $item->classe_energ === 'B' ? 'selected' : '' }} value="B">B</option>
                                    <option {{ $item->classe_energ === 'A' ? 'selected' : '' }} value="A">A</option>
                                    <option {{ $item->classe_energ === 'A+' ? 'selected' : '' }} value="A+">A+</option>
                                    <option {{ $item->classe_energ === 'A++' ? 'selected' : '' }} value="A++">A++</option>
                                    <option {{ $item->classe_energ === 'A+++' ? 'selected' : '' }} value="A+++">A+++</option>
                                </select>
                            </label>
                        </div>
                        <div onclick="deleteMicrogenerationSystem({{$practice->id}}, {{$item->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                            <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                        </div>
                    </div>
                </div>
            @empty
                <p id="microgeneration_systems_no_data_row">Nessun impianto inserito</p>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
    @include('business.scripts.microgeneration_system')
@endpush
