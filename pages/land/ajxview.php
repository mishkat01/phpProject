<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>



<div class="col-md-10 table-responsive p-3">
<div class="container col-md-4 pt-2 mb-3">
      <input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search">
  </div>
    <div id="table"></div>
    <div id="table1"></div>
</div>



<script>
    $(document).ready(function(){
        $("#table").load("landview.php");
        $("#search").keyup(function(){
            var a = $(this).val();
           $.ajax({
            type: "POST",
            url: "landviews.php",
            data: {"input":$(this).val()},
            success: function (data) {
                $("#table1").html(data);
                $("#table").hide();
                
                
            }
           });
        });
// pagi
        $(document).on("click","#pagination a",function(e) {
      e.preventDefault();
      var page_id = $(this).attr("id");

      loadTable(page_id);
    });

    });
</script>