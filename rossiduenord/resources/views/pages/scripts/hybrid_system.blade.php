<script type="text/javascript">
    let hs = 0;
    function addHybridSystem(e) {
        e.preventDefault()
        if ($('#hybrid_systems_no_data_row')) {
            $('#hybrid_systems_no_data_row').remove();
            hs++;
            $("#hybrid_system_wrapper").append(`
        <div class="box_input" data-id="hybrid_system-${hs}">
            <div class="row_input">
            <input type="hidden" name="hybrid_systems[${hs}][is_common]" id="hybrid_systems[${hs}][is_common]" value="{{ $is_common }}">
            <input type="hidden" name="hybrid_systems[${hs}][condomino_id]" id="hybrid_systems[${hs}][condomino_id]" value="{{ $condomino ?? '' }}">
            <label for="hybrid_systems[${hs}][tipo_sostituito]">
                                        Tipo sostituito
                                        <select name="hybrid_systems[${hs}][tipo_sostituito]" id="hybrid_systems[${hs}][tipo_sostituito]">
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
                                    <label for="hybrid_systems[${hs}][p_nom_sostituito]">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="hybrid_systems[${hs}][p_nom_sostituito]" id="hybrid_systems[${hs}][p_nom_sostituito]">
                                        kW
                                    </label>
                                    </div>
                                    <div class="row_input">
                                        <h6>Caldaia a condensazione:</h6>
                                        <label for="hybrid_systems[${hs}][condensing_potenza_nominale]">
                                            P. nom.
                                            <input class="input_small" type="number" name="hybrid_systems[${hs}][condensing_potenza_nominale]" id="hybrid_systems[${hs}][condensing_potenza_nominale]">
                                            kW
                                        </label>
                                        <label for="hybrid_systems[${hs}][condensing_rend_utile_nom]">
                                            Rend. utile nom. (100%)
                                            <input class="input_small" type="number" name="hybrid_systems[${hs}][condensing_rend_utile_nom]" id="hybrid_systems[${hs}][condensing_rend_utile_nom]">
                                            %
                                        </label>
                                        <label for="hybrid_systems[${hs}][condensing_efficienza_ns]">
                                            Efficienza ns
                                            <input class="input_small" type="number" name="hybrid_systems[${hs}][condensing_efficienza_ns]" id="hybrid_systems[${hs}][condensing_efficienza_ns]">
                                            %
                                        </label>
                                        <label for="hybrid_systems[${hs}][tipo_di_alimentazione]">
                                            Tipo di alim.
                                            <select name="hybrid_systems[${hs}][tipo_di_alimentazione]" id="hybrid_systems[${hs}][tipo_di_alimentazione]">
                                                <option value="Metano">Gas Naturale (metano)</option>
                                                <option value="Gpl">Gpl</option>
                                                <option value="Gasolio">Gasolio</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="row_input">
                                        <h6>Pompa di calore (PDC):</h6>
                                        <label for="hybrid_systems[${hs}][heat_tipo_di_pdc]">
                                            Tipo di PDC
                                            <select name="hybrid_systems[${hs}][heat_tipo_di_pdc]" id="hybrid_systems[${hs}][heat_tipo_di_pdc]">
                                                <option value="Aria/Aria">Aria/Aria</option>
                                                <option value="Aria/Acqua">Aria/Acqua</option>
                                                <option value="Salamoia/Aria">Salamoia/Aria</option>
                                                <option value="Salamoia/Acqua">Salamoia/Acqua</option>
                                                <option value="Acqua/Aria">Acqua/Aria</option>
                                                <option value="Acqua/Acqua">Acqua/Acqua</option>
                                            </select>
                                        </label>
                                        <label for="hybrid_systems[${hs}][heat_tipo_roof_top]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="hybrid_systems[${hs}][heat_tipo_roof_top]" id="hybrid_systems[${hs}][heat_tipo_roof_top]" value="true">
                                            <span class="checkmark"></span>
                                            Tipo Roof Top
                                        </label>
                                        <label for="hybrid_systems[${hs}][heat_potenza_nominale]">
                                            P. nom.
                                            <input class="input_small" type="number" name="hybrid_systems[${hs}][heat_potenza_nominale]" id="hybrid_systems[${hs}][heat_potenza_nominale]">
                                            kW
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="row_input">
                                            <label for="hybrid_systems[${hs}][heat_p_elettrica_assorbita]">
                                                P. Elettrica assorbita
                                                <input class="input_small" type="number" name="hybrid_systems[${hs}][heat_p_elettrica_assorbita]" id="hybrid_systems[${hs}][heat_p_elettrica_assorbita]">
                                                kW
                                            </label>
                                            <label for="hybrid_systems[${hs}][heat_inverter]" class="checkbox-wrapper d-flex">
                                                <input type="checkbox" name="hybrid_systems[${hs}][heat_inverter]" id="hybrid_systems[${hs}][heat_inverter]" value="true">
                                                <span class="checkmark"></span>
                                                inverter
                                            </label>
                                            <label for="hybrid_systems[${hs}][heat_cop]">
                                                COP
                                                <input class="input_small" type="number" name="hybrid_systems[${hs}][heat_cop]" id="hybrid_systems[${hs}][heat_cop]">
                                            </label>
                                            <label for="hybrid_systems[${hs}][heat_sonde_geotermiche]" class="checkbox-wrapper d-flex">
                                                <input type="checkbox" name="hybrid_systems[${hs}][heat_sonde_geotermiche]" id="hybrid_systems[${hs}][heat_sonde_geotermiche]" value="true">
                                                <span class="checkmark"></span>
                                                Sonde geotermiche
                                            </label>
                                        </div>
                                        <div onclick="removeHybridSystem(${hs})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                            <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                        </div>
                                </div>
`)
        }
    }

    function deleteHybridSystem(pid, cid) {
        axios.delete(`/hybrid_systems/${cid}/delete`)
        .then(() => {
            $(`div[data-id=hybrid_system-${pid}-${cid}]`).remove();
        })
    }

    function removeHybridSystem(id) {
        $(`div[data-id=hybrid_system-${id}]`).remove();
    }
</script>
