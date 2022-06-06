<script type="text/javascript">
    $(document).on("keyup", 'input', function (e) {
        if (e.keyCode == 188 || e.keyCode == 110) {  
            $(this).val($(this).val().replace(',', '.'));
        }
        console.log('ciao');
    });
</script>
