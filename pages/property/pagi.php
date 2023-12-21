<?php include('../../includes/conf.php');
  get_header();
  get_side();
?>

<div id="main" class="col-md-10">

    <div id="header" >
    </div>

    <div id="table-data">
    </div>
    <div id="searchres">
    </div>
    <div class="container col-md-4 pt-2">
      <input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search">
  </div>
  </div>

<script type="text/javascript">
  $(document).ready(function() {
    function loadTable(page){
      $.ajax({
        url: "propertyviews.php",
        type: "POST",
        data: {page_no :page },
        success: function(data) {
          $("#table-data").html(data);
        }
      });
    }
    loadTable();

    //Pagination Code
    $(document).on("click","#pagination a",function(e) {
      e.preventDefault();
      var page_id = $(this).attr("id");

      loadTable(page_id);
    });


// #search
$("#search").on("keyup",function () { 
      var input = $(this).val();
      console.log(input);
      if(input!=""){
        $.ajax({
          type: "POST",
          url: "propertyviews.php",
          data: {input:input},
          success: function (data) {
            $("#searchres").html(data);
          }
        });
      }else{
        $("#searchres").css("display","none");
      }
    });

  });
</script>