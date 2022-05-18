<script type="text/javascript">
    let s = 0;
    function addSurface(e, t){
        e.preventDefault()
        if($('#no_data_row')) {
            $('#no_data_row').remove();
        }
        s++;
        $("#surface_table tbody").append(`
            <tr>
                <input type="hidden" name="surfaces[${s}][intervention]" value="{{Route::currentRouteName() == 'driving_intervention' ? 'driving' : 'towed'}}">
                <input type="hidden" name="surfaces[${s}][condomino_id]" id="" value="{{ $condomino === 'common' ? '' : $condomino}}">
                <input type="hidden" name="surfaces[${s}][is_common]" id="" value="{{ $isCommon }}">
                <input type="hidden" name="surfaces[${s}][type]" id="" value="${t}">

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

    function deleteSurface(pid, cid){
        axios.delete(`/surface/${cid}/delete`)
        .then(() => {
            $(`table#surface_table tbody tr[name=${pid}-${cid}]`).remove();
        })
    }
</script>
