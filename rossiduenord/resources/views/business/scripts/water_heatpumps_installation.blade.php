<script type="text/javascript">
    let whi = 0;
    function addWaterHeatpumpsInstallation(e) {
        e.preventDefault()
        if ($('#water_heatpumps_installations_no_data_row')) {
            $('#water_heatpumps_installations_no_data_row').remove();
            whi++;
            $("#water_heatpumps_installation_wrapper").append(`
                <div class="box_input" data-id="water_heatpumps_installation-${whi}">
                                    <div class="row_input">
                                    <input type="hidden" name="water_heatpumps_installations[${whi}][is_common]" id="water_heatpumps_installations[${whi}][is_common]" value="{{ $is_common }}">
                                    <input type="hidden" name="water_heatpumps_installations[${whi}][condomino_id]" id="water_heatpumps_installations[${whi}][condomino_id]" value="{{ $condomino ?? '' }}">
                                    <label for="water_heatpumps_installations[${whi}][tipo_scaldacqua_sostituito]">
                                        Tipo scaldaacqua sostituito
                                        <select name="water_heatpumps_installations[${whi}][tipo_scaldacqua_sostituito]" id="water_heatpumps_installations[${whi}][tipo_scaldacqua_sostituito]">
                                            <option value="Boiler elettrico">Boiler elettrico</option>
                                            <option value="Gas/Gasolio">Gas/Gasolio</option>
                                            <option value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="water_heatpumps_installations[${whi}][pu_scaldacqua_sostituito]">
                                        Pu scaldacqua sostituito
                                        <input class="input_small" type="number" name="water_heatpumps_installations[${whi}][pu_scaldacqua_sostituito]" id="water_heatpumps_installations[${whi}][pu_scaldacqua_sostituito]">
                                        kW
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="water_heatpumps_installations[${whi}][pu_scaldacqua_a_pdc]">
                                            Pu scaldacqua a PDC
                                            <input class="input_small" type="number" name="water_heatpumps_installations[${whi}][pu_scaldacqua_a_pdc]" id="water_heatpumps_installations[${whi}][pu_scaldacqua_a_pdc]">
                                            kW
                                        </label>
                                        <label for="water_heatpumps_installations[${whi}][cop_nuovo_scaldacqua]">
                                            COP del nuovo scaldacqua
                                            <input class="input_small" type="number" name="water_heatpumps_installations[${whi}][cop_nuovo_scaldacqua]" id="water_heatpumps_installations[${whi}][cop_nuovo_scaldacqua]">
                                        </label>
                                        <label for="water_heatpumps_installations[${whi}][capacita_accumulo]">
                                            Capacità accumulo
                                            <input class="input_small" type="number" name="water_heatpumps_installations[${whi}][capacita_accumulo]" id="water_heatpumps_installations[${whi}][capacita_accumulo]">
                                            L
                                        </label>
                                    </div>
                                    <div onclick="removeWaterHeatpumpsInstallation(${whi})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </div>
                                </div>
                            </div>
                `)
        }
    }

    function deleteWaterHeatpumpsInstallation(pid, cid) {
        axios.delete(`/business/water_heatpumps_installations/${cid}/delete`)
        .then(() => {
            $(`div[data-id=water_heatpumps_installation-${pid}-${cid}]`).remove();
        })
    }

    function removeWaterHeatpumpsInstallation(id) {
        $(`div[data-id=water_heatpumps_installation-${id}]`).remove();
    }
</script>
