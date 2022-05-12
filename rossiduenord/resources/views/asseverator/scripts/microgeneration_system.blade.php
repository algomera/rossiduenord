<script type="text/javascript">
    let ms = 0;
    function addMicrogenerationSystem(e) {
        e.preventDefault()
        if ($('#microgeneration_systems_no_data_row')) {
            $('#microgeneration_systems_no_data_row').remove();
            ms++;
            $("#microgeneration_system_wrapper").append(`
        <div class="box_input" data-id="microgeneration_system-${ms}">
            <div class="row_input">
            <input type="hidden" name="microgeneration_systems[${ms}][is_common]" id="hybrid_systems[${ms}][is_common]" value="{{ $is_common }}">
                <input type="hidden" name="microgeneration_systems[${ms}][condomino_id]" id="hybrid_systems[${ms}][condomino_id]" value="{{ $condomino ?? '' }}">
                                    <label for="microgeneration_systems[${ms}][tipo_sostituito]">
                                        Tipo sostituito
                                        <select name="microgeneration_systems[${ms}][tipo_sostituito]" id="microgeneration_systems[${ms}][tipo_sostituito]">
                                            <option value="Caldaia standard">Caldaia standard</option>
                                            <option value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="microgeneration_systems[${ms}][p_nom_sostituito]">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="microgeneration_systems[${ms}][p_nom_sostituito]" id="microgeneration_systems[${ms}][p_nom_sostituito]">
                                        kW
                                    </label>
                                    <label for="microgeneration_systems[${ms}][p_elettrica]">
                                        P. Elettrica
                                        <input class="input_small" type="number" name="microgeneration_systems[${ms}][p_elettrica]" id="microgeneration_systems[${ms}][p_elettrica]">
                                        kW
                                    </label>
                                    <label for="microgeneration_systems[${ms}][p_immessa]">
                                        P. immessa
                                        <input class="input_small" type="number" name="microgeneration_systems[${ms}][p_immessa]" id="microgeneration_systems[${ms}][p_immessa]">
                                        kW
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="microgeneration_systems[${ms}][p_term_recuperata]">
                                        P. term. recuperata
                                        <input class="input_small" type="number" name="microgeneration_systems[${ms}][p_term_recuperata]" id="microgeneration_systems[${ms}][p_term_recuperata]">
                                        kW
                                    </label>
                                    <label for="microgeneration_systems[${ms}][pes]">
                                        PES
                                        <input class="input_small" type="number" name="microgeneration_systems[${ms}][pes]" id="microgeneration_systems[${ms}][pes]">
                                        %
                                    </label>
                                    <label for="microgeneration_systems[${ms}][tipo_di_alimentazione]">
                                        Tipo di alim.
                                        <select name="microgeneration_systems[${ms}][tipo_di_alimentazione]" id="microgeneration_systems[${ms}][tipo_di_alimentazione]">
                                            <option value="Metano">Gas Naturale (metano)</option>
                                            <option value="Gpl">Gpl</option>
                                            <option value="Gasolio">Gasolio</option>
                                        </select>
                                    </label>
                                    <label for="microgeneration_systems[${ms}][tipo_intervento]">
                                        Tipo intervento
                                        <select name="microgeneration_systems[${ms}][tipo_intervento]" id="microgeneration_systems[${ms}][tipo_intervento]">
                                            <option value="Nuovo">Nuova unità</option>
                                            <option value="Rifacimento">Rifacimento</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="microgeneration_systems[${ms}][a_celle_a_combustibile]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="microgeneration_systems[${ms}][a_celle_a_combustibile]" id="microgeneration_systems[${ms}][a_celle_a_combustibile]" value="true">
                                            <span class="checkmark"></span>
                                            a Celle a Combustibile
                                        </label>
                                        <label for="microgeneration_systems[${ms}][riscaldatore_suppl]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="microgeneration_systems[${ms}][riscaldatore_suppl]" id="microgeneration_systems[${ms}][riscaldatore_suppl]" value="true">
                                            <span class="checkmark"></span>
                                            Riscaldatore suppl.
                                        </label>
                                        <label for="microgeneration_systems[${ms}][potenza_risc_suppl]">
                                            Potenza risc. suppl.
                                            <input class="input_small" type="number" name="microgeneration_systems[${ms}][potenza_risc_suppl]" id="microgeneration_systems[${ms}][potenza_risc_suppl]">
                                            kW
                                        </label>
                                        <label for="microgeneration_systems[${ms}][efficienza_ns]">
                                            Efficienza ns
                                            <input class="input_small" type="number" name="microgeneration_systems[${ms}][efficienza_ns]" id="microgeneration_systems[${ms}][efficienza_ns]">
                                            %
                                        </label>
                                        <label for="microgeneration_systems[${ms}][classe_energ]">
                                            Classe energ.
                                            <select name="microgeneration_systems[${ms}][classe_energ]" id="microgeneration_systems[${ms}][classe_energ]">
                                                <option value="B">B</option>
                                                <option value="A">A</option>
                                                <option value="A+">A+</option>
                                                <option value="A++">A++</option>
                                                <option value="A+++">A+++</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div onclick="removeMicrogenerationSystem(${ms})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </div>
                                </div>
`)
        }
    }

    function deleteMicrogenerationSystem(pid, cid) {
        axios.delete(`/asseverator/microgeneration_systems/${cid}/delete`)
        .then(() => {
            $(`div[data-id=microgeneration_system-${pid}-${cid}]`).remove();
        })
    }

    function removeMicrogenerationSystem(id) {
        $(`div[data-id=microgeneration_system-${id}]`).remove();
    }
</script>
