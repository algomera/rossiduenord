<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script>   
<script>
      $(document).ready(function(){
      $("#search").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#table_ContentList tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
      });
      });

      $(document).ready(function() {
          
       $('.checkall').click(function() {
           $(":checkbox").attr("checked", true);
       });
       
       $('.uncheckall').click(function() {
           $(":checkbox").attr("checked", false);
       });
   });
  </script>
