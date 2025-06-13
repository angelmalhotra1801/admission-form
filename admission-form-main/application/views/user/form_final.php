<style type="text/css">
	.panel-heading {
		padding: 4px 15px;
		border-top-left-radius: 3px;
		border-top-right-radius: 3px;
		/*background-color: #b40303;*/
		color: white;
		text-transform: uppercase;
		background-image: url(<?php echo base_url()?>assets/TopBar.jpg);
	}
	
	.panel-body
	{
		/*padding: 10px;*/

		padding: 4px 0px 0px 15px;
		margin-top: 40px;

	}
	label{
		text-transform: uppercase;
	}
	body {
		background-color: #b40303;
		font-size: .75em;
	}
	input,textarea{
		text-transform:uppercase;
	}
	.form-control {
		font-size: 11px!important;

	}


.table.table-sm td, .table.table-sm th {
    padding: 0.5rem 1em;
}
.in{
	width: 120px!important;
}
</style>


<div class="main-body" style="margin-top: -34px;">
	<div class="page-wrapper">
		<div class="page-header">

		</div>

		<div class="page-body">
			<div class="row">				
				<div class="col-xl-12 col-md-12">	
					<button class="btn btn-danger pull-right" onClick="window.location.reload();" style="margin-top: -33px;padding: 6px;">Reload</button>	
						<p style="margin:0px 0px 10px 5px;color:red"><marquee>*FILL ALL INFORMATION IN BLOCK LETTERS </marquee></p>
						<div id="bgmainwrapper">
							<div id="insidewrapper">
								<div class="container col-xl-12 col-md-12" style="text-align: left!important;">
									<form action='<?php echo base_url();?>User/save2' method='POST' enctype='multipart/form-data' id='admission_form' style="border:1px solid #65a605">
										<div class="panel panel-primary">
											<div class="panel-heading">Applicant Details</div>
											<div class="panel-body">
												<section>
													<div class="row">
														
														<div class="col-md-4" >
															<div class="form-group">
																<label>FORM NO. :</label>
																<input type="text" class="form-control" name='form_no'  readonly value="<?php echo $application_no; ?>" required >
															</div>
														</div>

														<div class="col-md-4" >
															<div class="form-group">
																<label>STUDENT CATEGORY:</label>
																<input type="text" class="form-control" name='student_cat'  readonly value="<?php echo $student_cat; ?>" required>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" >
															<div class="form-group">
																<label>NAME:</label>
																<input type="text" class="form-control" name='name'  readonly value="<?php echo $name; ?>" required >
															</div>
														</div>

														<div class="col-md-4" >
															<div class="form-group">
																<label>FATHER'S NAME:</label>
																<input type="text" class="form-control" name='father'  readonly value="<?php echo $father; ?>" required>
															</div>
														</div>
													<div class="col-md-4" >
															<div class="form-group">
																<label>MOTHER'S NAME:</label>
																<input type="text" class="form-control" name='mother'  readonly value="<?php echo $mother; ?>" required>
															</div>
														</div>

													</div>
													<div class="row">
														<div class="col-md-4" >
															<div class="form-group">
																<label>ADDRESS:</label>
																<input type="text" class="form-control" name='address'  readonly value="<?php echo $address; ?>" required >
															</div>
														</div>

														<div class="col-md-4" >
															<div class="form-group">
																<label>WHATSAPP NUMBER:</label>
																<input type="number" class="form-control" name='whatsapp' min="1000000000" max="9999999999" required >
															</div>
														</div>

														<div class="col-md-4" >
															<div class="form-group">
																<label>NAME OF PREVIOUS SCHOOL:</label>
																<input type="text" class="form-control" name='prev_school'  readonly value="<?php echo $prev_school; ?>" required>
															</div>
														</div>

													</div>
													<div class="row">
														<div class="col-md-4" >
															<div class="form-group">
																<label>BOARD:</label>
																<input type="text" class="form-control" name='board'  readonly value="<?php echo $board; ?>" required>
															</div>
														</div>
														<div class="col-md-4" >
															<div class="form-group">
																<label>SUBJECT COMBINATION:</label>
																<select class="form-control" name='subject' id="subject" required oninput="myfunction();">
																	<option value=""></option>
																	<?php 
																	if ($stream=='SCIENCE') {
																		?>
																	<option value="PHYSICS,CHEMISTRY,BIOLOGY,PHE">PHYSICS,CHEMISTRY,BIOLOGY,PHE</option>
																	<option value="PHYSICS,CHEMISTRY,MATHS,PHE">PHYSICS,CHEMISTRY,MATHS,PHE</option>
																	<?php 
																}
																else{
																	?>
																	
																	<option value="ACCOUNTANCY,BUSINESS STUDIES,ECONOMICS,PHE">ACCOUNTANCY,BUSINESS STUDIES,ECONOMICS,PHE</option>
																	<option value="POLITICAL SCIENCE,HISTORY,ECONOMICS,PHE">POLITICAL SCIENCE,HISTORY,ECONOMICS,PHE</option>
																<?php }?>
																</select>
															</div>
														</div>

														<div class="col-md-4" >
																<label>OPTIONAL SUBJECT:</label>
															<div class="form-group" >
																<select class="form-control" name='optional_subject' required>
																	<option value=""></option>
																	<option value="Computer Science" id="1">Computer Science</option>
																	<option value="Fine Art">Fine Art</option>
																	<option value="Automotive">Automotive</option>
																	<option value="Biology">Biology</option>
																	<option value="Nutrition and Diettics">Nutrition and Diettics</option>
																	<option value="Web Application">Web Application</option>
																	<option value="Mathematics">Mathematics</option>
																	<option value="Cost Accounting">Cost Accounting</option>

																</select>
															</div>
														</div>
													</div>
														<b>Note:Computer can be opted with PHYSICS,CHEMISTRY,MATHS,PHE only</b>
<br><br>													<input type="submit" name="Submit">

<script type="text/javascript">
	function myfunction() {
			var sub=$("#subject").val()
			if (sub!="PHYSICS,CHEMISTRY,MATHS,PHE") {
				$("#1").attr("disabled", true);
			}
			else{
				$("#1").attr("disabled", false);

			}
	}
</script>