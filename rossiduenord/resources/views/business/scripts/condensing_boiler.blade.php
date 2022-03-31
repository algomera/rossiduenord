<script type="text/javascript">
    let i = 0;
    function addCondensingBoiler(e) {
        e.preventDefault()
        if ($('#consensing_boilers_no_data_row')) {
            $('#consensing_boilers_no_data_row').remove();
            i++;
            $("#condensing_boiler_wrapper").append(`
                <div class="box_input" data-id="${i}">
                    <div class="row_input">
                        <label for="condensing_boilers[${i}][tipo_sostituito]">
                            Tipo sostituito
                            <select name="condensing_boilers[${i}][tipo_sostituito]" id="condensing_boilers[${i}][tipo_sostituito]">
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
                                    <label for="condensing_boilers[${i}][p_nom_sostituito]">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="condensing_boilers[${i}][p_nom_sostituito]" id="condensing_boilers[${i}][p_nom_sostituito]">
                                        kW
                                    </label>
                                    <label for="condensing_boilers[${i}][potenza_nominale]">
                                        Potenza nominale
                                        <input class="input_small" type="number" name="condensing_boilers[${i}][potenza_nominale]" id="condensing_boilers[${i}][potenza_nominale]">
                                        kW
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="condensing_boilers[${i}][rend_utile_nom]">
                                        Rend. utile nom. (100%)
                                        <input class="input_small" type="number" name="condensing_boilers[${i}][rend_utile_nom]" id="condensing_boilers[${i}][rend_utile_nom]">
                                        %
                                    </label>
                                    <label for="condensing_boilers[${i}][use_destination]">
                                        <select name="condensing_boilers[${i}][use_destination]" id="condensing_boilers[${i}][use_destination]">
                                            <option value="Riscaldameto ambiente">Riscaldameto ambiente</option>
                                            <option value="Risc. ambiente + prod.ACS">Risc. ambiente + prod.ACS</option>
                                        </select>
                                    </label>
                                    <label for="condensing_boilers[${i}][efficienza_ns]">
                                        Efficienza ns
                                        <input class="input_small" type="number" name="condensing_boilers[${i}][efficienza_ns]" id="condensing_boilers[${i}][efficienza_ns]">
                                        %
                                    </label>
                                    <label for="condensing_boilers[${i}][efficienza_acs_nwh]">
                                        Efficienza ACS nwh
                                        <input class="input_small" type="number" name="condensing_boilers[${i}][efficienza_acs_nwh]" id="condensing_boilers[${i}][efficienza_acs_nwh]">
                                        %
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="condensing_boilers[${i}][tipo_di_alimentazione]">
                                            Tipo di alimentazione
                                            <select name="condensing_boilers[${i}][tipo_di_alimentazione]" id="condensing_boilers[${i}][tipo_di_alimentazione]">
                                                <option value="Metano">Gas Naturale (metano)</option>
                                                <option value="Gpl">Gpl</option>
                                                <option value="Gasolio">Gasolio</option>
                                            </select>
                                        </label>
                                        <label for="condensing_boilers[${i}][classe_termo_evoluto]">
                                            Classe disp. termoregolazione evoluto
                                            <select name="condensing_boilers[${i}][classe_termo_evoluto]" id="condensing_boilers[${i}][classe_termo_evoluto]">
                                                <option value="V">V</option>
                                                <option value="VI">VI</option>
                                                <option value="VIII">VIII</option>
                                                <option value="Nessun dispositivo">Nessun dispositivo</option>
                                            </select>
                                        </label>
                                    </div>
                                    <button onclick="removeCondensingBoiler(${i})" type="button" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Rimuovi</p>
                                    </button>
                                </div>
                            </div>
                    `)
        }
    }

    function deleteCondensingBoiler(pid, cid) {
        axios.delete(`/business/condensing_boilers/${cid}/delete`)
        .then(() => {
            $(`div[data-id=condensing_boiler-${pid}-${cid}]`).remove();
        })
    }

    function removeCondensingBoiler(id) {
    $(`div[data-id=${id}]`).remove();
}
</script>
