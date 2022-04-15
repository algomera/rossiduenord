<script type="text/javascript">
    let i = 0;
    function addRows(e){
        e.preventDefault()
        if($('#no_data_row')) {
            $('#no_data_row').remove();
        }
        i++;
        $("#condominis_table tbody").append(`
                    <tr>
                        <td class="text-center">${$("#condominis_table tbody tr").length + 1 }</td>
                        <td class="text-center">
                            <input type="hidden" name="condomini[${i}][id]">
                            <input name="condomini[${i}][name]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][surname]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][phone]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][email]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][cf]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-center">
                            <input name="condomini[${i}][millesimi_inv]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-center">
                            <input name="condomini[${i}][foglio]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][part]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][sub]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-center">
                            <input name="condomini[${i}][categ_catastale]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-center">
                            <input name="condomini[${i}][sup_catastale]" type="text" style="border:none; width: 100%;">
                        </td>
                        </tr>
                    `)
    }
</script>
