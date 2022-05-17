<script type="text/javascript">
    let sp = 0;
    function addSolarPanel(e) {
        e.preventDefault()
        if ($('#solar_panels_no_data_row')) {
            $('#solar_panels_no_data_row').remove();
            sp++;
            $("#solar_panel_wrapper").append(`
                <div class="box_input"  data-id="solar_panel-${sp}">
            <div class="row_input">
            <input type="hidden" name="solar_panels[${sp}][is_common]" id="solar_panels[${sp}][is_common]" value="{{ $is_common }}">
                <input type="hidden" name="solar_panels[${sp}][condomino_id]" id="solar_panels[${sp}][condomino_id]" value="{{ $condomino ?? '' }}">
                                    <label for="solar_panels[${sp}][sup_lorda_singolo_modulo]">
                                        Superfice lorda Ag di un singolo modulo
                                        <input class="input_small" type="number" name="solar_panels[${sp}][sup_lorda_singolo_modulo]" id="solar_panels[${sp}][sup_lorda_singolo_modulo]">
                                        m²
                                    </label>
                                    <label for="solar_panels[${sp}][num_moduli]">
                                        N° di moduli
                                        <input class="input_small" type="number" name="solar_panels[${sp}][num_moduli]" id="solar_panels[${sp}][num_moduli]">
                                    </label>
                                    <label for="solar_panels[${sp}][sup_totale]">
                                        Sup. Totale
                                        <input class="input_small" type="number" name="solar_panels[${sp}][sup_totale]" id="solar_panels[${sp}][sup_totale]">
                                        m²
                                    </label>
                                    <label for="solar_panels[${sp}][certificazione_solar_keymark]" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" name="solar_panels[${sp}][certificazione_solar_keymark]" id="solar_panels[${sp}][certificazione_solar_keymark]" value="true">
                                        <span class="checkmark"></span>
                                        Certificazione solar Keymark
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="solar_panels[${sp}][tipo_di_collettori]">
                                        Tipo di collettori
                                        <select name="solar_panels[${sp}][tipo_di_collettori]" id="solar_panels[${sp}][tipo_di_collettori]">
                                            <option value="Piani vetrati">Piani vetrati</option>
                                            <option value="Sotto vuoto o tubi evacuati">Sotto vuoto o tubi evacuati</option>
                                            <option value="A concentrazione">A concentrazione</option>
                                            <option value="Scoperti">Scoperti</option>
                                        </select>
                                    </label>
                                    <label for="solar_panels[${sp}][tipo_di_installazione]">
                                        Tipo di installazione
                                        <select name="solar_panels[${sp}][tipo_di_installazione]" id="solar_panels[${sp}][tipo_di_installazione]">
                                            <option value="Tetto piano">Tetto piano</option>
                                            <option value="Tetto a falda">Tetto a falda</option>
                                            <option value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="solar_panels[${sp}][inclinazione]">
                                        inclinazione
                                        <input class="input_small" type="number" name="solar_panels[${sp}][inclinazione]" id="solar_panels[${sp}][inclinazione]">
                                        %
                                    </label>
                                    <label for="solar_panels[${sp}][orientamento]">
                                        Orientamento
                                        <select name="solar_panels[${sp}][orientamento]" id="solar_panels[${sp}][orientamento]">
                                            <option value="Nord">Nord</option>
                                            <option value="Nord-Est">Nord-Est</option>
                                            <option value="Est">Est</option>
                                            <option value="Sud-Est">Sud-Est</option>
                                            <option value="Sud">Sud</option>
                                            <option value="Sud-Ovest">Sud-Ovest</option>
                                            <option value="Ovest">Ovest</option>
                                            <option value="Nord-Ovest">Nord-Ovest</option>
                                            <option value="P-orizzontale">P-orizzontale</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="solar_panels[${sp}][impianto_factory_made]">
                                        Impianto factory made
                                        <input type="radio" checked name="solar_panels[${sp}][impianto_factory_made]" id="solar_panels[${sp}][impianto_factory_made]" value="N.D">
                                        N.D
                                    </label>
                                    <label for="solar_panels[${sp}][impianto_factory_made]">
                                        <input type="radio" name="solar_panels[${sp}][impianto_factory_made]" id="solar_panels[${sp}][impianto_factory_made]" value="No">
                                        No
                                    </label>
                                    <label for="solar_panels[${sp}][impianto_factory_made]">
                                        <input type="radio" name="solar_panels[${sp}][impianto_factory_made]" id="solar_panels[${sp}][impianto_factory_made]" value="Si">
                                        Si
                                    </label>
                                    <label for="solar_panels[${sp}][q_col_q_sol]">
                                        Q col/Q sol
                                        <input class="input_small" type="number" name="solar_panels[${sp}][q_col_q_sol]" id="solar_panels[${sp}][q_col_q_sol]">
                                        kWht
                                    </label>
                                    <label for="solar_panels[${sp}][ql]">
                                        QL
                                        <input class="input_small" type="number" name="solar_panels[${sp}][ql]" id="solar_panels[${sp}][ql]">
                                        MJ
                                    </label>
                                    <label for="solar_panels[${sp}][accumulo_in_litri]">
                                        Accumulo in litri
                                        <input class="input_small" type="number" name="solar_panels[${sp}][accumulo_in_litri]" id="solar_panels[${sp}][accumulo_in_litri]">
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="solar_panels[${sp}][destinazione_calore]">
                                            Destinazione del calore
                                            <select name="solar_panels[${sp}][destinazione_calore]" id="solar_panels[${sp}][destinazione_calore]">
                                                <option value="Acqua sanitaria">Produzione di acqua calda sanitaria</option>
                                                <option value="Produzione di ACS e riscaldamento ambiente">Produzione di ACS e riscaldamento ambiente</option>
                                                <option value="Produzione di calore di processo">Produzione di calore di processo</option>
                                                <option value="Riscaldamento piscine">Riscaldamento piscine</option>
                                                <option value="Altro">Altro</option>
                                            </select>
                                        </label>
                                        <label for="solar_panels[${sp}][tipo_impianto_integrato_o_sostituito]">
                                            Tipo impianto integrato o sostituito
                                            <select name="solar_panels[${sp}][tipo_impianto_integrato_o_sostituito]" id="solar_panels[${sp}][tipo_impianto_integrato_o_sostituito]">
                                                <option value="Boiler elettrico">Boiler elettrico</option>
                                                <option value="Gas/Gasolio">Gas/Gasolio</option>
                                                <option value="Altro">Altro</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div onclick="removeSolarPanel(${sp})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </div>
                                </div>
                            </div>
                `)
        }
    }

    function deleteSolarPanel(pid, cid) {
        axios.delete(`/solar_panels/${cid}/delete`)
        .then(() => {
            $(`div[data-id=solar_panel-${pid}-${cid}]`).remove();
        })
    }

    function removeSolarPanel(id) {
        $(`div[data-id=solar_panel-${id}]`).remove();
    }
</script>
