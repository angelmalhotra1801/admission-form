<!DOCTYPE html>
<html>
<head>
	<title>Optional Subjects</title>
</head>
<body>
<div class="card-block">
<div class="dt-responsive table-responsive">
<table id="simpletable"	class="table table-striped table-bordered nowrap">
	<thead>
	<tr>
		<th>Sl.No</th>
		<th>Form No</th>
		<th>Error Amount</th>		
	</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
	foreach ($data as $key) {
	$i++;
		?>
		<tr>
			<th><?php echo $i;?></th>
			<th><?php echo $key->form_no;?></th>
			<th><?php echo $key->amount;?></th>
		</tr>
	<?php
}
	?>
	</tbody>
</table>
<script>
						$(document).ready(function() {
                            $('#simpletable').DataTable( {
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                ]
                            } );
                        } );
</script>	
<br><br><br>
<h3>Add Error Amount</h3>
<form method="post" action="<?php echo base_url();?>Admin/error_amount_add">
	<b>Form No:</b><input type="text" name="form_no" id="form_no">
	<br><br>
	<b>Error Amount:</b><input type="text" name="error_amount" id="error_amount">
	<br><input type="submit" name="Add">
</form>
</body>
</html>