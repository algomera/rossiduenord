<script type="text/javascript">
    let s = 0;
    function addSurface(e){
        e.preventDefault()
        if($('#no_data_row')) {
            $('#no_data_row').remove();
        }
        s++;
        $("#surface_table tbody").append(`
            <tr>
                <td class="text-center">${$("#surface_table tbody tr").length + 1 }</td>
                <td class="text-center">
                    <input name="surfaces[${s}][description_surface]" type="text" style="border:none; width: 100%;">
                </td>
                <td class="text-right">
                    <input name="surfaces[${s}][surface]" type="text" style="border:none; width: 100%;">
                </td>
                <td class="text-right">
                    <input name="surfaces[${s}][trasm_ante]" type="text" style="border:none; width: 100%;">    
                </td>
                <td class="text-right">
                    <input name="surfaces[${s}][trasm_post]" type="text" style="border:none; width: 100%;">        
                </td>
                <td class="text-right">
                    <input name="surfaces[${s}][trasm_term]" type="text" style="border:none; width: 100%;">    
                </td>
                <td class="text-center">
                    <input name="surfaces[${s}][confine]" type="text" style="border:none; width: 100%;">    
                </td>
                <td class="text-center">
                    <input name="surfaces[${s}][insulation]" type="text" style="border:none; width: 100%;">    
                </td>
            </tr>
        `)
    }
</script>
