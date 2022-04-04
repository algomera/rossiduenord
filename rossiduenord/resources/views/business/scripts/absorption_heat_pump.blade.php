<script type="text/javascript">
    let ah = 0;
    function addAbsorptionHeatPump(e) {
        e.preventDefault()
        if ($('#absorption_heat_pumps_no_data_row')) {
            $('#absorption_heat_pumps_no_data_row').remove();
            ah++;
            $("#absorption_heat_pump_wrapper").append(`
        <div class="box_input" data-id="absorption_heat_pump-${ah}">
            <div class="row_input">
                <input type="hidden" name="absorption_heat_pumps[${ah}][condomino_id]" id="absorption_heat_pumps[${ah}][condomino_id]" value="{{ $condomino ?? '' }}">
                                        <label for="absorption_heat_pumps[${ah}][tipo_sostituito]">
                                            Tipo sostituito
                                            <select name="absorption_heat_pumps[${ah}][tipo_sostituito]" id="absorption_heat_pumps[${ah}][tipo_sostituito]">
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
                                        <label for="absorption_heat_pumps[${ah}][p_nom_sostituito]">
                                            P. nom. sostituito
                                            <input class="input_small" type="number" name="absorption_heat_pumps[${ah}][p_nom_sostituito]" id="absorption_heat_pumps[${ah}][p_nom_sostituito]">
                                            kW
                                        </label>
                                        <label for="absorption_heat_pumps[${ah}][tipo_di_pdc]">
                                            Tipo di PDC
                                            <select name="absorption_heat_pumps[${ah}][tipo_di_pdc]" id="absorption_heat_pumps[${ah}][tipo_di_pdc]">
                                                <option value="Aria/Aria">Aria/Aria</option>
                                                <option value="Aria/Acqua">Aria/Acqua</option>
                                                <option value="Salamoia/Aria">Salamoia/Aria</option>
                                                <option value="Salamoia/Acqua">Salamoia/Acqua</option>
                                                <option value="Acqua/Aria">Acqua/Aria</option>
                                                <option value="Acqua/Acqua">Acqua/Acqua</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="row_input">
                                        <label for="absorption_heat_pumps[${ah}][tipo_roof_top]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="absorption_heat_pumps[${ah}][tipo_roof_top]" id="absorption_heat_pumps[${ah}][tipo_roof_top]" value="true">
                                            <span class="checkmark"></span>
                                            Tipo Roof Top
                                        </label>
                                        <label for="absorption_heat_pumps[${ah}][potenza_nominale]">
                                            Potenza Nominale
                                            <input class="input_small" type="number" name="absorption_heat_pumps[${ah}][potenza_nominale]" id="absorption_heat_pumps[${ah}][potenza_nominale]">
                                            kW
                                        </label>
                                        <label for="absorption_heat_pumps[${ah}][gueh]">
                                            GUEh
                                            <input class="input_small" type="number" name="absorption_heat_pumps[${ah}][gueh]" id="absorption_heat_pumps[${ah}][gueh]">
                                        </label>
                                        <label for="absorption_heat_pumps[${ah}][reversibile]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="absorption_heat_pumps[${ah}][reversibile]" id="absorption_heat_pumps[${ah}][reversibile]" value="true">
                                            <span class="checkmark"></span>
                                            E' reversibile
                                        </label>
                                        <label for="absorption_heat_pumps[${ah}][guec]">
                                            GUEc
                                            <input class="input_small" type="number" name="absorption_heat_pumps[${ah}][guec]" id="absorption_heat_pumps[${ah}][guec]">
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="row_input">
                                            <label for="absorption_heat_pumps[${ah}][sup_riscaldata_dalla_pdc]">
                                                Sup. riscaldata dalla PDC
                                                <input class="input_small" type="number" name="absorption_heat_pumps[${ah}][sup_riscaldata_dalla_pdc]" id="absorption_heat_pumps[${ah}][sup_riscaldata_dalla_pdc]">
                                                m²
                                            </label>
                                        </div>
                                        <div onclick="removeAbsorptionHeatPump(${ah})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                            <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                        </div>
                                    </div>
                                </div>
`)
        }
    }

    function deleteAbsorptionHeatPump(pid, cid) {
        axios.delete(`/business/absorption_heat_pumps/${cid}/delete`)
        .then(() => {
            $(`div[data-id=absorption_heat_pump-${pid}-${cid}]`).remove();
        })
    }

    function removeAbsorptionHeatPump(id) {
        $(`div[data-id=absorption_heat_pumps-${id}]`).remove();
    }
</script>
