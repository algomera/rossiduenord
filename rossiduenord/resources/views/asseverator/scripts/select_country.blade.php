<script type="text/javascript">
 
    selectElement = document.querySelector('#nation_of_birth option');
    for (let i = 0; i < selectElement.length; i++) {
        if(selectElement.option[i].value ==  {{$country->id}} ){
            selectElement.option[i].selected = true
        }            
    }

    selectElement = document.querySelector('#country option');
    for (let i = 0; i < selectElement.length; i++) {
        if(selectElement.option[i].value == {{$country->id}}){
            selectElement.option[i].selected = true
        }            
    }

</script>
