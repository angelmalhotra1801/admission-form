           
<div class="main-body">
	<div class="page-wrapper">
		<!-- Page-header start -->
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<div class="d-inline">
							<h4>Form</h4>
							<span></span>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="page-header-breadcrumb">
						<ul class="breadcrumb-title">
							<li class="breadcrumb-item">
								<a href="<?php echo base_url();?>admin/dashboard"> <i class="feather icon-home"></i> </a>
							</li>
							<li class="breadcrumb-item"><a href="#!">Appliction Form</a>
							</li>

						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Page-header end -->

		<!-- Page body start -->
		<div class="page-body">
			<div class="row">
				<div class="col-sm-12">
					<!-- Basic Inputs Validation start -->
					<div class="card">
						<div class="card-header">
							<h5></h5>


						</div>
						<div class="card-block">
							<div class="dt-responsive table-responsive">
								<table id="simpletable"
								class="table table-striped table-bordered nowrap">
								<thead>
									<tr>
										<th>Sl.No.</th>
										<th>FORM NO</th>
										<th>DOWNLOAD</th>
										<!-- <th>DOCUMENT</th> -->
										<th style="display:none">DATE OF APPLICATION</th>
										<th style="display:none">DATE OF BIRTH</th> 
										<th>STUDENT NAME</th>
										<th>CLASS</th>
										<th>EMAIL </th>
										<th style="display:">AADHAAR NO</th>
										<th style="display:">GENDER </th> 
										<th style="display:">CATEGORY </th>

										<th style="display:none">FATHER'S NAME</th>
										<th style="display:none">MOTHER'S NAME</th>		
										<th style="display:none">OCCUPATIONAL ADDRESS</th>
										<th style="display:none"> HOME PHONE NO</th>
										<th style="display:none">MOBILE NO</th>
										<th style="display:none">GROSS MONTHLY INCOME OF THE PARENT</th>


										<!-- <th style="">Job_Location</th> -->
										<th style="display:none"> PERMANENT ADDRESS</th>
										<th style="display:none"> POST OFFICE</th>
										<th style="display:none">STATE </th>
										<th style="display:none">DISTRICT</th>
										<th style="display:none">CITY </th>
										<th style="display:none"> PIN CODE </th>
										<th style="display:none">PRESENT ADDRESS</th>
										<th style="display:none"> POST OFFICE</th>
										<th style="display:none">STATE </th>
										<th style="display:none">DISTRICT</th>
										<th style="display:none">CITY </th>
										<th style="display:none"> PIN CODE </th>

										<th style="display:none">NAME OF THE SCHOOL LAST ATTENDED</th>
										<th style="display:none">NAME OF EXAMINATION APPEARED</th>
										<th style="display:none"> WHETHER AS A REGULAR STUDENT OR A PRIVATE STUDENT</th>
										<th style="display:none"> MEDIUM OF INSTRUCTION AT THE LAST SCHOOL ATTENDED</th>
										<th style="display:">Transaction Id</th>
									</tr>
								</thead>
								<tbody>


									<?php $x=1;

									foreach ($form_add as $value) {

										?>
										<tr>
											<td><?php echo $x;?></td>
											<td><?php echo $value->form_no;?></td>
											<td>
												<a href="<?php echo base_url().'adminform_pdf_other/'.$value->reg_id;?>" target="_blank"><i class="fa fa-download" title="Download Application Form"></i> &nbsp;&nbsp;
												<!-- <a href="<?php echo base_url().'adminadmit_pdf_other/'.$value->reg_id;?>" target="_blank"><i class="fa fa-download" title="Download Admit Card"></i> &nbsp;&nbsp; -->
												<a href="<?php echo base_url().'adminpaymentslip_pdf_other/'.$value->reg_id;?>" target="_blank"><i class="fa fa-download" title="Download Payment Slip"></i> &nbsp;&nbsp;
													</td>
											<!-- <td>
												<a href="http://feesclub.co.in/zonefapplication/uploads/transfercertificate/<?php echo $value->new_certificate;?>" target="_blank"><i class="fa fa-download" title="Download TRANSFER CERTIFICATE"></i></a> &nbsp;&nbsp;
													<a href="http://feesclub.co.in/zonefapplication/uploads/aadharcard/<?php echo $value->adhar_card_final;?>" target="_blank"><i class="fa fa-download" title="Download AADHAR CARD"></i></a>
														 &nbsp;&nbsp;
													<a href="http://feesclub.co.in/zonefapplication/uploads/reportcard/<?php echo $value->report_card_final;?>" target="_blank"><i class="fa fa-download" title="Download REPORT CARD"></i></a>
												 &nbsp;&nbsp;
												
													</td> -->

													<td style="display:none"><?php echo $value->date_app;?></td>
													<td style="display:none"><?php echo $value->dob;?></td>
													<td><?php echo $value->fname;?></td>
													<td><?php echo $value->class;?></td>
													<td><?php echo $value->email;?></td>
													<td style="display:"><?php echo $value->aadhar;?></td>
													<td style="display:"><?php echo $value->gender;?></td>
													<td style="display:"><?php echo $value->cat;?></td>	
													<td style="display:none"><?php echo $value->fathername;?></td>
													<td style="display:none"><?php echo $value->mothername;?></td>	
													<td style="display:none"><?php echo $value->occupational_address;?></td>

													<td style="display:none"><?php echo $value->home_phone;?></td>
													<td style="display:none"><?php echo $value->mobile;?></td>	
													<td style="display:none"><?php echo $value->monthly_inc;?></td>	

													<td style="display:none"><?php echo $value->permanent_address;?></td>	
													<td style="display:none"><?php echo $value->permanent_postoffice;?></td>	
													<td style="display:none"><?php echo $value->permanent_state;?></td>	
													<td style="display:none"><?php echo $value->permanent_district;?></td>	
													<td style="display:none"><?php echo $value->permanent_city;?></td>	
													<td style="display:none"><?php echo $value->permanent_pin;?></td>

													<td style="display:none"><?php echo $value->present_address;?></td>	
													<td style="display:none"><?php echo $value->present_postoffice;?></td>	
													<td style="display:none"><?php echo $value->present_state;?></td>	
													<td style="display:none"><?php echo $value->present_district;?></td>	
													<td style="display:none"><?php echo $value->present_city;?></td>	
													<td style="display:none"><?php echo $value->present_pin;?></td>	

													<td style="display:none"><?php echo $value->school_last_attend;?></td>	
													<td style="display:none"><?php echo $value->examination_appeared;?></td>	
													<td style="display:none"><?php echo $value->reg_pri_stud;?></td>	
													<td style="display:none"><?php echo $value->school_attend;?></td>	

													


													
													<td style="display:"><?php echo $value->transaction_id;?></td>

												</tr>  


																		<?php  $x++; } ?>
																	</tbody>

																</table>
															</div>
														</div>
													</div>

												</div>
											</div>
										</div>
										<!-- Page body end -->
									</div>
								</div>
								<!-- Main-body end -->

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
								
								

