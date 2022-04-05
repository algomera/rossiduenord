<script type="text/javascript">
    let bg = 0;
    function addBiomeGenerator(e) {
        e.preventDefault()
        if ($('#biome_generators_no_data_row')) {
            $('#biome_generators_no_data_row').remove();
            bg++;
            $("#biome_generator_wrapper").append(`
                <div class="box_input" data-id="biome_generator-${bg}">
                                    <div class="row_input">
                                    <input type="hidden" name="biome_generators[${ah}][condomino_id]" id="biome_generators[${ah}][condomino_id]" value="{{ $condomino ?? '' }}">
                                        <label for="biome_generators[${bg}][tipo_sostituito]">
                                            Tipo sostituito
                                            <select name="biome_generators[${bg}][tipo_sostituito]" id="biome_generators[${bg}][tipo_sostituito]">
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
                                        <label for="biome_generators[${bg}][p_nom_sostituito]">
                                            P. nom. sostituito
                                            <input class="input_small" type="number" name="biome_generators[${bg}][p_nom_sostituito]" id="biome_generators[${bg}][p_nom_sostituito]">
                                            kW
                                        </label>
                                        <label for="biome_generators[${bg}][classe_generatore]">
                                            Classe generatore
                                            <select name="biome_generators[${bg}][classe_generatore]" id="biome_generators[${bg}][classe_generatore]">
                                                <option value="4 stelle">4 stelle</option>
                                                <option value="5 stelle">5 stelle</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="row_input">
                                        <label for="biome_generators[${bg}][tipo_generatore]">
                                            Tipo generatore
                                            <select name="biome_generators[${bg}][tipo_generatore]" id="biome_generators[${bg}][tipo_generatore]">
                                                <option value="Caldaia a biomassa">Caldaia a biomassa</option>
                                                <option value="Termocamini e stufe">Termocamini e stufe</option>
                                            </select>
                                        </label>
                                        <label for="biome_generators[${bg}][use_destination]">
                                            Impianto destinato a
                                            <select name="biome_generators[${bg}][use_destination]" id="biome_generators[${bg}][use_destination]">
                                                <option value="Riscaldamento ambiente">Riscaldamento ambiente</option>
                                                <option value="Risc. amb. + prod. ACS">Risc. amb. + prod. ACS</option>
                                            </select>
                                        </label>
                                        <label for="biome_generators[${bg}][tipo_di_alimentazione]">
                                            Tipo di alimentazione
                                            <select name="biome_generators[${bg}][tipo_di_alimentazione]" id="biome_generators[${bg}][tipo_di_alimentazione]">
                                                <option value="Legna">Legna</option>
                                                <option value="Pellet">Pellet</option>
                                                <option value="Cippato">Cippato</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="row_input">
                                            <label for="biome_generators[${bg}][p_utile_nom]">
                                                Pot. Utile nom.
                                                <input class="input_small" type="number" name="biome_generators[${bg}][p_utile_nom]" id="biome_generators[${bg}][p_utile_nom]">
                                                kW
                                            </label>
                                            <label for="biome_generators[${bg}][p_al_focolare]">
                                                P. al focolare
                                                <input class="input_small" type="number" name="biome_generators[${bg}][p_al_focolare]" id="biome_generators[${bg}][p_al_focolare]">
                                                kW
                                            </label>
                                            <label for="biome_generators[${bg}][rend_utile_alla_pot_nom]">
                                                Rend. utile alla pot. nom.
                                                <input class="input_small" type="number" name="biome_generators[${bg}][rend_utile_alla_pot_nom]" id="biome_generators[${bg}][rend_utile_alla_pot_nom]">
                                                %
                                            </label>
                                            <label for="biome_generators[${bg}][sup_riscaldata]">
                                                Sup. riscaldata
                                                <input class="input_small" type="number" name="biome_generators[${bg}][sup_riscaldata]" id="biome_generators[${bg}][sup_riscaldata]">
                                                m²
                                            </label>
                                        </div>
                                        <div onclick="removeBiomeGenerator(${bg})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                            <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                        </div>
                                    </div>
                                </div>
                `)
        }
    }

    function deleteBiomeGenerator(pid, cid) {
        axios.delete(`/business/biome_generators/${cid}/delete`)
        .then(() => {
            $(`div[data-id=biome_generator-${pid}-${cid}]`).remove();
        })
    }

    function removeBiomeGenerator(id) {
        $(`div[data-id=biome_generator-${id}]`).remove();
    }
</script>
