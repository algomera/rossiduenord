<script type="text/javascript">
    let h = 0;
    function addHeatPump(e) {
        e.preventDefault()
        if ($('#heat_pumps_no_data_row')) {
            $('#heat_pumps_no_data_row').remove();
            h++;
            $("#heat_pump_wrapper").append(`
        <div class="box_input" data-id="heat_pumps-${h}">
        <div class="row_input">
        <input type="hidden" name="heat_pumps[${h}][is_common]" id="heat_pumps[${h}][is_common]" value="{{ $is_common }}">
        <input type="hidden" name="heat_pumps[${h}][condomino_id]" id="heat_pumps[${h}][condomino_id]" value="{{ $condomino ?? '' }}">
            <label for="heat_pumps[${h}][tipo_sostituito]">
                Tipo sostituito
                <select name="heat_pumps[${h}][tipo_sostituito]" id="heat_pumps[${h}][tipo_sostituito]">
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
            <label for="heat_pumps[${h}][p_nom_sostituito]">
                P. nom. sostituito
                <input class="input_small" type="number" name="heat_pumps[${h}][p_nom_sostituito]" id="heat_pumps[${h}][p_nom_sostituito]">
                kW
            </label>
            <label for="heat_pumps[${h}][tipo_di_pdc]">
                Tipo di PDC
                <select name="heat_pumps[${h}][tipo_di_pdc]" id="heat_pumps[${h}][tipo_di_pdc]">
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
            <label for="heat_pumps[${h}][tipo_roof_top]" class="checkbox-wrapper d-flex">
                <input type="checkbox" name="heat_pumps[${h}][tipo_roof_top]" id="heat_pumps[${h}][tipo_roof_top]" value="true">
                <span class="checkmark"></span>
                Tipo Roof Top
            </label>
            <label for="heat_pumps[${h}][potenza_nominale]">
                Potenza Nominale
                <input class="input_small" type="number" name="heat_pumps[${h}][potenza_nominale]" id="heat_pumps[${h}][potenza_nominale]">
                kW
            </label>
            <label for="heat_pumps[${h}][p_elettrica_assorbita]">
                P. Elettrica assorbita
                <input class="input_small" type="number" name="heat_pumps[${h}][p_elettrica_assorbita]" id="heat_pumps[${h}][p_elettrica_assorbita]">
                kW
            </label>
            <label for="heat_pumps[${h}][inverter]" class="checkbox-wrapper d-flex">
                <input type="checkbox" name="heat_pumps[${h}][inverter]" id="heat_pumps[${h}][inverter]" value="true">
                <span class="checkmark"></span>
                Inverter
            </label>
            <label for="heat_pumps[${h}][cop]">
                COP
                <input class="input_small" type="number" name="heat_pumps[${h}][cop]" id="heat_pumps[${h}][cop]">
            </label>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="row_input">
                <label for="heat_pumps[${h}][reversibile]" class="checkbox-wrapper d-flex">
                    <input type="checkbox" name="heat_pumps[${h}][reversibile]" id="heat_pumps[${h}][reversibile]" value="true">
                    <span class="checkmark"></span>
                    E' reversibile
                </label>
                <label for="heat_pumps[${h}][eer]">
                    EER
                    <input class="input_small" type="number" name="heat_pumps[${h}][eer]" id="heat_pumps[${h}][eer]">
                </label>
                <label for="heat_pumps[${h}][sonde_geotermiche]" class="checkbox-wrapper d-flex">
                    <input type="checkbox" name="heat_pumps[${h}][sonde_geotermiche]" id="heat_pumps[${h}][sonde_geotermiche]" value="true">
                    <span class="checkmark"></span>
                    Sonde geotermiche
                </label>
                <label for="heat_pumps[${h}][sup_riscaldata_dalla_pdc]">
                    Sup. riscaldata dalla PDC
                    <input class="input_small" type="number" name="heat_pumps[${h}][sup_riscaldata_dalla_pdc]" id="heat_pumps[${h}][sup_riscaldata_dalla_pdc]">
                    m²
                </label>
            </div>
            <div onclick="removeHeatPump(${h})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
            </div>
        </div>
    </div>
`)
        }
    }

    function deleteHeatPump(pid, cid) {
        axios.delete(`/heat_pumps/${cid}/delete`)
        .then(() => {
            $(`div[data-id=heat_pump-${pid}-${cid}]`).remove();
        })
    }

    function removeHeatPump(id) {
        $(`div[data-id=heat_pumps-${id}]`).remove();
    }
</script>
