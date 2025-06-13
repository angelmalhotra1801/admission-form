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
					<div class="card app-design">
						<p style="margin:0px 0px 10px 5px;color:red"><marquee>*FILL ALL INFORMATION IN BLOCK LETTERS </marquee></p>
						<div id="bgmainwrapper">
							<div id="insidewrapper">
								<div class="container col-xl-12 col-md-12" style="text-align: left!important;">
									<form action='<?php echo base_url();?>save' method='POST' enctype='multipart/form-data' id='admission_form' style="border:1px solid #65a605">
										<div class="panel panel-primary">
											<div class="panel-heading">Applicant Details</div>
											<div class="panel-body">
												<section>
													<div class="row">
														<div class="col-md-2" style="display: none">
															<div class="form-group">
																<label>FORM NO. :</label>
																<input type="text" class="form-control" name='form_no'  readonly value="<?php echo $form_no; ?>" placeholder="FORM NUMBER">
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>DATE OF APPLICATION :</label>
																<input type="date" name="date_app" value="<?php echo date('Y-m-d');?>" readonly class="form-control" placeholder="DATE OF APPLICATION">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Student Category in Class 10 <sup><b>th</b></sup> :</label>
																<select class="form-control" id="student_cat" name="student_cat" required=""
																 onchange="check1()">
																<option value=""> Select Category </option>														
																<option value="DAV BARIATU">DAV Bariatu Student</option>
																<option value="CBSE">CBSE Board Student</option>
																<option value="OTHER BOARD">Other Board Student</option>
																
															</select>
														</div>
													</div>
													
													<div class="col-md-2" style="display: none;" id='board_option' >
														<label>Select Board :</label>
														<select name="board" id="board_opt" class="form-control" required="required" onchange="check1()">			
															<option value="CBSE" id="cbse">CBSE Board</option>
															<option value="ICSE">ICSE Board</option>
															<option value="STATEBOARD">STATE Board</option>
														</select>
													</div>
													<div class="col-md-2">
														<label>Select Stream :</label>
														<select class="form-control" id="sub_stream" name="sub_stream" required="required" onchange="check1()">
															<option value=""> Select Stream </option>
															<option value="SCIENCE">Science</option>
															<option value="COMMERCE">Commerce</option>
															<option value="COMMERCE MATHS">Commerce With Maths</option>
															
														</select>
													</div>
													
												</div>

												<script>

													
												</script>

												</div>
											</section>
										</div>
									</div> 
									<div class="panel panel-primary" id="panel_subjectchos" style="">
										<div class="panel-heading"> Board Exam of Std. X.</div>
										
									<br>
									<h6 id="criteria" style="color:red;"></h6>
									<h6 id="message" style="color:red;"></h6>
										<div class="panel-body">                
											<section>
												<div class="row">                       
														
													<div class="col-md-8 col-lg-12" id="" >
														<table class="table table-sm table-responsive" id="fristmarks">
															<thead>
																<tr ><th colspan="3" style="color: blue;font-weight: bold">Class 10 Preboard Marks Marks</th>
																	<th colspan="7" style="color: red;font-weight: bold" id="notification"></th>
																</tr>
																<tr>
																	<th scope="col">Subject</th>
																	<th scope="col">Percentage</th>
																	<th scope="col">Subject</th>
																	<th scope="col">Percentage</th>
																	<th scope="col">Subject</th>
																	<th scope="col">Percentage</th>
																	<th scope="col">Subject</th>
																	<th scope="col">Percentage</th>
																	<th scope="col">Subject</th>
																	<th scope="col">Percentage</th>
																</tr>
															</thead>
															<tbody >
																<tr>
																	<th scope="row"> English</th>
																	<td><input type="number" class="form-control in" name="english" id="english" placeholder="Percentage" min="1" max="100" required="required" onchange="check2()" value="0"></td>
																	<th>Science</th>
																	<td><input type="number" class="form-control in" name="science" id="science" placeholder="Percentage" min="1" max="100" required="required" onchange="check2()" value="0"></td>
																	<th>Social Science</th> 
																	 <td><input type="number" class="form-control in" name="social_science" id="social_science" placeholder="Percentage" min="1" max="100" required="required" onchange="check2()" value="0"></td> 
																	<th scope="row">Mathematics</th>
																	<td><input type="number" class="form-control in" name="maths" id="maths" placeholder="Percentage" min="1" max="100" required="required" onchange="check2()" value="0"></td>
																	 <th scope="row">Hindi</th> 
																	 <td><input type="number" class="form-control in" name="hindi" id="hindi" placeholder="Percentage" min="1" max="100" required="required" onchange="check2()" value="0"></td>
																
																</tr>
																
																<tr id="comm_socsci_tr">
																	<th scope="row">Aggregate</th>
    
																	<td><input type="number" class="form-control in" name="aggregate" id="aggregate" placeholder="Percentage" min="1" max="100" required="required" step="any" readonly=""></td>
																	
																	
																</tr>
																
															</tbody>
														</table>
														
													</div>
													<div >

													
												</div>               
											</section>
										</div>
									</div> 
									<div class="panel panel-primary">
										<div class="panel-heading">Student Details</div>
										<div class="panel-body">
											<section>

												<div class="row">                          
													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp; Name of the Student:</label>
															<input type="text" class="form-control" name='fname' id="fname" placeholder="Full Name" value="<?php echo $_SESSION['name'];?>"  readonly>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp;DATE OF BIRTH :<small>(as per School Record)</small></label>
															<input type="date" class="form-control" name='dob' placeholder="D/O/B" id="birth_date" required="required">
															<span>Use Calendar to select date</span><br>
														</div>    
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp; EMAIL :</label>
															<input type="text" class="form-control" name="email" id="email" placeholder="EMAIL" value="<?php echo $_SESSION['email'];?>" readonly style="text-transform:none; ">
														</div>
													</div>

												</div>
												<div class="row">
													
													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp; Nationality :</label>
															<input type="text" class="form-control alpha" name="nationality" id="nationality" placeholder="NATIONALITY" required="required" value="INDIAN">
														</div> 

													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleFormControlInput1"><span style="color:red">*</span>&nbsp;GENDER :</label>
															<br>&nbsp;&nbsp;
															<label style="margin-left: 10px;"><input class="form-check-input" type="radio" name='gender' value="male">MALE</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<label><input class="form-check-input" type="radio" name='gender' value="female">FEMALE</label>
														</div> 
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp;CAST CATEGORY :</label>
															<select class="form-control" name="cat" id="cat" required="required">
																<option value="">--Select Category--</option>
																<option value="GENERAL">GENERAL</option>
																<option value="SC">SC</option>
																<option value="ST">ST</option>
																<option value="OBC">OBC</option>
															</select>
														</div>

													</div>
												</div>
												<div class="row">
												

												</div>
											</section>
										</div>
									</div> 

									<div class="panel panel-primary">
										<div class="panel-heading">PERSONAL DETAILS</div>
										<div class="panel-body">                
											<section>

												<div class="row">                       
													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp; Father's Name:</label>
															<input type="text" class="form-control alpha" name='fathername' id="fathername" placeholder="Father Name" required="required">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp; Mother's Name:</label>
															<input type="text" class="form-control alpha" name='mothername' id="mothername" placeholder="Mother Name" required="required">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp;Official/Occupational address :</label>                                          
															<textarea class="form-control " id="occupational_address" name="occupational_address"></textarea>
														</div>
													</div>                                 
												</div>




												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp; Home Phone No. :</label>
															<input type="text" class="form-control" name="home_phone" id="home_phone" placeholder="Home Phone No.">
														</div> 
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp; Mobile NO :</label>
															<input type="text" class="form-control" name="mobile" id="mobile" placeholder="MOBILE NO" value="<?php echo $_SESSION['contact'];?>"  readonly>
														</div> 

													</div>

													<!-- <div class="col-md-4">                                  
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp; Gross Annual income  :</label>
															<input type="number" class="form-control" name="monthly_inc_father" placeholder="Gross Annual income" required="required">
														</div> 
													</div>			 -->											
													
												</div>




											</section>
										</div>
									</div>

									<div class="panel panel-primary">
										<div class="panel-heading">&nbsp;ADDRESS</div>
										<div class="panel-body">
											<section>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp;PERMANENT ADDRESS :</label>                                          
															<textarea class="form-control" id="permanent_address" name="permanent_address"></textarea>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp;POST OFFICE:</label>
															<input type="text" class="form-control" id="permanent_postoffice" name="permanent_postoffice" placeholder="POST OFFICE">          
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label><span style="color:red">*</span>&nbsp;STATE :</label>
															<select class="form-control" id="permanent_state" name="permanent_state">
																<option value="">------------Select State------------</option>
																<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
																<option value="Andhra Pradesh">Andhra Pradesh</option>
																<option value="Arunachal Pradesh">Arunachal Pradesh</option>
																<option value="Assam">Assam</option>
																<option value="Bihar">Bihar</option>
																<option value="Chandigarh">Chandigarh</option>
																<option value="Chhattisgarh">Chhattisgarh</option>
																<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
																<option value="Daman and Diu">Daman and Diu</option>
																<option value="Delhi">Delhi</option>
																<option value="Goa">Goa</option>
																<option value="Gujarat">Gujarat</option>
																<option value="Haryana">Haryana</option>
																<option value="Himachal Pradesh">Himachal Pradesh</option>
																<option value="Jammu and Kashmir">Jammu and Kashmir</option>
																<option value="Jharkhand" selected="">Jharkhand</option>
																<option value="Karnataka">Karnataka</option>
																<option value="Kerala">Kerala</option>
																<option value="Lakshadweep">Lakshadweep</option>
																<option value="Madhya Pradesh">Madhya Pradesh</option>
																<option value="Maharashtra">Maharashtra</option>
																<option value="Manipur">Manipur</option>
																<option value="Meghalaya">Meghalaya</option>
																<option value="Mizoram">Mizoram</option>
																<option value="Nagaland">Nagaland</option>
																<option value="Orissa">Orissa</option>
																<option value="Pondicherry">Pondicherry</option>
																<option value="Punjab">Punjab</option>
																<option value="Rajasthan">Rajasthan</option>
																<option value="Sikkim">Sikkim</option>
																<option value="Tamil Nadu">Tamil Nadu</option>
																<option value="Tripura">Tripura</option>
																<option value="Uttaranchal">Uttaranchal</option>
																<option value="Uttar Pradesh">Uttar Pradesh</option>
																<option value="West Bengal">West Bengal</option>
															</select>
														</div>
													</div>

												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleFormControlInput1"><span style="color:red">*</span>&nbsp;DISTRICT:</label>
															<input type="text" class="form-control alpha" name='permanent_district' id='permanent_district' placeholder="DISTRICT">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp;CITY :</label>
															<input type="text" class="form-control alpha" id="permanent_city" name="permanent_city" placeholder="CITY">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp;Pin code :</label>
															<input type="number" maxlength="6" class="form-control num" name='permanent_pin' id='permanent_pin' placeholder="PIN CODE">
														</div>
													</div>
												</div>
												<!-- <input type="checkbox" value="" name="filltoo" id="filltoo" />Permanent Address Same As Present Address   -->
												<hr>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp;Present Address :</label>
															<textarea class="form-control" id="present_address" name="present_address"></textarea>
														</div>

													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp;Post office:</label>
															<input type="text" class="form-control" id="present_postoffice" name="present_postoffice" placeholder="POST OFFICE">          
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp;STATE :</label>                                 
															<select class="form-control" id="present_state" name="present_state">
																<option value="">------------Select State------------</option>
																<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
																<option value="Andhra Pradesh">Andhra Pradesh</option>
																<option value="Arunachal Pradesh">Arunachal Pradesh</option>
																<option value="Assam">Assam</option>
																<option value="Bihar">Bihar</option>
																<option value="Chandigarh">Chandigarh</option>
																<option value="Chhattisgarh">Chhattisgarh</option>
																<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
																<option value="Daman and Diu">Daman and Diu</option>
																<option value="Delhi">Delhi</option>
																<option value="Goa">Goa</option>
																<option value="Gujarat">Gujarat</option>
																<option value="Haryana">Haryana</option>
																<option value="Himachal Pradesh">Himachal Pradesh</option>
																<option value="Jammu and Kashmir">Jammu and Kashmir</option>
																<option value="Jharkhand" selected="">Jharkhand</option>
																<option value="Karnataka">Karnataka</option>
																<option value="Kerala">Kerala</option>
																<option value="Lakshadweep">Lakshadweep</option>
																<option value="Madhya Pradesh">Madhya Pradesh</option>
																<option value="Maharashtra">Maharashtra</option>
																<option value="Manipur">Manipur</option>
																<option value="Meghalaya">Meghalaya</option>
																<option value="Mizoram">Mizoram</option>
																<option value="Nagaland">Nagaland</option>
																<option value="Orissa">Orissa</option>
																<option value="Pondicherry">Pondicherry</option>
																<option value="Punjab">Punjab</option>
																<option value="Rajasthan">Rajasthan</option>
																<option value="Sikkim">Sikkim</option>
																<option value="Tamil Nadu">Tamil Nadu</option>
																<option value="Tripura">Tripura</option>
																<option value="Uttaranchal">Uttaranchal</option>
																<option value="Uttar Pradesh">Uttar Pradesh</option>
																<option value="West Bengal">West Bengal</option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="exampleFormControlInput1"><span style="color:red"></span>&nbsp;DISTRICT:</label>
															<input type="text" class="form-control alpha" name='present_district' id='present_district' placeholder="DISTRICT">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp;CITY :</label>
															<input type="text" class="form-control alpha" id="present_city" name="present_city" placeholder="CITY">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp;Pin code :</label>
															<input type="number" maxlength="6"  class="form-control num" name='present_pin' id='present_pin' placeholder="PIN CODE">
														</div>
													</div>
												</div>
											</section>
										</div>
									</div> 
									<div class="panel panel-primary">
										<div class="panel-heading">STUDENT ADDITIONAL INFORMATION</div>
										<div class="panel-body">                
											<section>

												<div class="row">                       
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp; Name of the School last attended </label>
															<input type="text" class="form-control alpha" name='school_last_attend' placeholder="Name of the School last attended" id="school_last_attend">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>&nbsp; Recognised By:</label>
															<select class="form-control" name="board" id="board">
																<option value="">--Select Board</option>
																<option value="CBSE Board">CBSE Board</option>
																<option value="JAC Board">JAC Board</option>
																<option value="ICSE Board">ICSE Board</option>
																<option value="OTHER">OTHER</option>

															</select>
														</div>
													</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>&nbsp; Name of Examination appeared:</label>
																<input type="text" class="form-control" name='examination_appeared' id="examination_appeared" placeholder="Name of Examination appeared">
															</div>
														</div>                                 
													</div>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>&nbsp;Whether as a regular student or a private student</label>
																<input type="text" class="form-control alpha" name="reg_pri_stud" id="reg_pri_stud" placeholder="Whether as a regular student or a private student" >
															</div>
														</div>

														<div class="col-md-4">
															<div class="form-group">
																<label>&nbsp; Medium of instruction at the last school attended </label>
																<input type="text" class="form-control alpha" name="school_attend" id="school_attend" placeholder="Medium of instruction at the last school attended" >
															</div> 
														</div>

														<div class="col-md-4">

														</div>
													</div>

												</section>
											</div>
										</div> 


										<div class="panel panel-primary">
											<div class="panel-heading">SIBLINGS DETAILS</div>
											<div class="panel-body">                
												<section>

													<div class="row">                      
														<div class="col-md-3">
															<div class="form-group">
																<label><span style="color:red">*</span>&nbsp; Sibling (Own Brother & Sister) </label><br>
																<input type="radio" id="YES" name="siblings" value="YES" onchange="getsibval()">
																<label for="YES">YES</label>
																<input type="radio" id="NO" name="siblings" value="NO" onchange="getsibval()">
																<label for="NO">NO</label>
															</div>
														</div>
														<!-- <div id="sibys"> -->
														
															<!-- </div>    -->
														</div>

													</section>
												</div>
											</div> 

											

											<div class="panel panel-primary">
												<div class="panel-heading">UPLOADS </div>
												<div class="panel-body">
													<section>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>&nbsp;10th Pre-board marksheet</label>
																	<input type="file" name='img'  id="choose_photo_btn" class="custom-file-input"><span id="err_5" style="color: red;font-weight: bold; " required></span>
																	<b>Note:</b>Allowed format jpg,jpeg,png
																</div>
															</div>
															<div class="col-md-4">
																<img id="blah" src="#"  style="width: 85px;height: 85px;border:1px solid #ccc;display:none"/>
															</div>
														</div>
													</section>
												</div>
											</div>
											<p><h6>The school reserves its right to change the stream after verification of the documents.</h6></p>

											<input name="agree" required="required" id="planned_checked" type="checkbox" required="required"><span> &nbsp; &nbsp;&nbsp;I declare that the information given above is true to be best of my knowledge and belief and nothing concealed thereof.</span>
											<div class="row">
												<div class="col-md-2">
													<input type="submit" id="subm"  value="SAVE & NEXT" class="btn btn-success" style="margin: 18px 20px 20px 20px!important;height: 33px; width: 75%;" >
													<a class="btn btn-success" id="ss" style="margin: 18px 20px 20px 20px;display:none;">SAVE & NEXT</a>
												</div>
											</div>
										</form>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
</div>
</div>
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript">
//TO GET STUDENT CATEGORY AnD STREAM DETAILS
$(document).ready(function(){
    $("#student_cat").on("change", function(){

        var student_cat =$(this).val();
    	// console.log(student_cat);
    });
});

$(document).ready(function(){
    $("#sub_stream").on("change", function(){

        var sub_stream =$(this).val();
    	// console.log(sub_stream);

    });
});



//FOR MINIMUM MARKS VALIDATION 
function check1() {
	var category=$("#student_cat").val();

	var stream =$("#sub_stream").val();	
	if (category=="DAV BARIATU") {
		if (stream=="SCIENCE") {
			console.log("DAVB SCI");
			$("#english").attr("min",60);
			$("#science").attr("min",60);
			$("#maths").attr("min",60);
			$("#aggregate").attr("min",60);
			var aggregate_min=60;
			var criteria="MINIMUM 60 MARKS IN ENGLISH SCIENCE AND MATHS . MINIMUM 60% MARKS IN AGGREGATE "
		}
		else if(stream=="COMMERCE"){
			console.log("DAVB COMM");
			$("#english").attr("min",33);
			$("#science").attr("min",33);
			$("#maths").attr("min",33);
			$("#aggregate").attr("min",33);
			var criteria='PASSED IN PRE BOARD EXAM';
			//ONLY PASSED IN PRE BOARD EXAM NO OTHER CRITERIA
		}
		else if(stream=="COMMERCE MATHS"){
			console.log("DAVB COMM");
			$("#english").attr("min",33);
			$("#science").attr("min",33);
			$("#maths").attr("min",33);
			$("#aggregate").attr("min",33);
			var criteria='PASSED IN PRE BOARD EXAM';
			//ONLY PASSED IN PRE BOARD NO OTHER CRITERIA
		}
	}

	else if (category=="CBSE") {
		
		if (stream=="SCIENCE") {
			console.log("CBSE SCI");
			$("#english").attr("min",60);
			$("#science").attr("min",60);
			$("#maths").attr("min",60);
			$("#aggregate").attr("min",75);
			var aggregate_min=75;
			var criteria="MINIMUM 60 MARKS IN ENGLISH SCIENCE AND MATHS . MINIMUM 75% MARKS IN AGGREGATE "

		}
		else if(stream=="COMMERCE"){
			console.log("CBSE COMM");
				$("#english").attr("min",33);
			$("#science").attr("min",33);
			$("#maths").attr("min",33);
			$("#aggregate").attr("min",60);	

			var aggregate_min=60;
			var criteria="MINIMUM 60% MARKS IN AGGREGATE "


		}
		else if(stream=="COMMERCE MATHS"){
			console.log("CBSE COMM");
			$("#maths").attr("min",60);
				$("#english").attr("min",33);
			$("#science").attr("min",33);

			$("#aggregate").attr("min",60);	
			var aggregate_min=60;
			var criteria="MINIMUM 60 MARKS IN MATHS . MINIMUM 60% MARKS IN AGGREGATE "
			
			}


	}

	else if (category=="OTHER BOARD") {
		
		if (stream=="SCIENCE") {
			console.log("OTH SCI");
			$("#english").attr("min",70);
			$("#science").attr("min",70);
			$("#maths").attr("min",70);
			$("#aggregate").attr("min",85);
			var aggregate_min=85;
			var criteria="MINIMUM 70 MARKS IN ENGLISH SCIENCE AND MATHS . MINIMUM 85% MARKS IN AGGREGATE "

			}
		else if(stream=="COMMERCE"){
			console.log("CBSE COMM");
				$("#english").attr("min",33);
			$("#science").attr("min",33);
			$("#maths").attr("min",33);

			$("#aggregate").attr("min",60);	
			var aggregate_min=60;
			var criteria="MINIMUM 60% MARKS IN AGGREGATE "

			
		}
		else if(stream=="COMMERCE MATHS"){
			console.log("CBSE COMM");
			$("#maths").attr("min",60);
				$("#english").attr("min",33);
			$("#science").attr("min",33);

			$("#aggregate").attr("min",60);	
			var aggregate_min=60;
			var criteria="MINIMUM 60 MARKS IN MATHS . MINIMUM 60% MARKS IN AGGREGATE "
		
		}

	}
	else{
		var criteria='';
		// console.log(category);
		// console.log(stream);
	}
// alert(aggregate_min);
if (stream !='' && category !='') {
	document.getElementById("criteria").innerHTML =criteria;
}
window.value=aggregate_min;
check2();
}


// TO CALCULATE AGGREGATE 
function check2() {
	var english=$("#english").val();
	var maths=$("#maths").val();
	var science=$("#science").val();
	var hindi=$("#hindi").val();
	var social_science=$("#social_science").val();
	english=parseInt(english);
	maths=parseInt(maths);
	science=parseInt(science);
	hindi=parseInt(hindi);
	social_science=parseInt(social_science);
	var total=english + science + maths + social_science + hindi; 	
	var aggregate=total/5;
	
	console.log(english);
	console.log(science);
	console.log(maths);
	console.log(social_science);
	console.log(hindi);
	console.log(total);
	console.log(aggregate);
	
	window.value2=aggregate;
	$("#aggregate").val(aggregate);
	if (english!='' && maths!='' && science!='' && hindi!='' && social_science!='') {
	if (aggregate<window.value) {
		document.getElementById("message").innerHTML ="Marks or aggregate less than the criteria";
		$("input").attr("disabled", true);
		$("select").attr("disabled", true);
		$("textarea").attr("disabled", true);
		
	}
}

}
//TO SELECT BOARD ACCORDING TO CATEGORY

</script>