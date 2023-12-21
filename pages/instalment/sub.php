<!DOCTYPE html>
<html>
<head>
  <title>Modal Example</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<button type="button" class="btn btn-info btn-lg passingID" data-id="10">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function () {
    $(".passingID").click(function () {
      var ids = $(this).attr('data-id');
      alert(ids);
      $("#idkl").val(ids);
      $('#myModal').modal('show');
    });
  });
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['idkl'];
  echo "The ID is: " . $id;
}
?>

</body>
</html>
