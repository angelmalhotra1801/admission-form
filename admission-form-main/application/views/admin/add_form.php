 <style type="text/css">
 	.md div{
 		    padding-top: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #80808059;
 	}
 </style>          
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
							<li class="breadcrumb-item"><a href="#!">Form</a>
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
										<th>ACTION</th>
										<th>STATUS</th>
										<th>DOWNLOAD</th>
										<th style="display:none">DATE OF APPLICATION</th>
										<th style="display:none">DATE OF BIRTH</th> 
										<th>STUDENT NAME</th>
										<!-- <th>ADMISSION NO</th> -->
										<th>AMOUNT</th>
										<th style="display:none">OPTIONAL SUBJECT</th>
										<th>EMAIL </th>
										<th>APPLICATION CATEGORY </th>
										<!-- <td>status</td> -->
										<th style="display:none;">STREAM </th>
										<th style="display:none;">AADHAAR NO</th>
										<th style="display:none;">GENDER </th> 
										<th style="display:none;">CATEGORY </th>

										<th style="display:none">FATHER'S NAME</th>
										<th style="display:none">MOTHER'S NAME</th>		
										<th style="display:none">OCCUPATIONAL ADDRESS</th>
										<th style="display:none"> HOME PHONE NO</th>
										<th style="display:none">MOBILE NO</th>
										<th style="display:none">GROSS MONTHLY INCOME OF THE PARENT</th>


										
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
										<th style="display:none">WHETHER RECOGNIZED BY STATE/CENTRAL/ICSE BOARD</th>
										<th style="display:none">NAME OF EXAMINATION APPEARED</th>
										<th style="display:none"> WHETHER AS A REGULAR STUDENT OR A PRIVATE STUDENT</th>
										<th style="display:none"> MEDIUM OF INSTRUCTION AT THE LAST SCHOOL ATTENDED</th>

										
										<th style="display:none">ENGLISH %</th>	
										<th style="display:none">SCIENCE</th>										
										<th style="display:none">MATHEMATICS %</th>
										<th style="display:none">SOCIAL SCIENCE</th>
										<th style="display:none">HINDI</th> 
										<th style="display:">Transaction Id</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>


									<?php $x=1;
									foreach ($form_add as $value) {
										$student_cat=$value->student_cat;
								
										?>
										<tr>
											<td><?php echo $x;?></td>
											<td><?php echo $value->form_no;?></td>
											<td>
											<button><a href="<?php echo base_url();?>Admin/final_admission_dav/1/<?php echo $value->form_no;?>">Approve</a></button>
												<button><a href="<?php echo base_url();?>Admin/final_admission_dav/0/<?php echo $value->form_no;?>">Reject</a></button>

											</td>
											<?php 
											$query=$this->db->query("SELECT status FROM admission_approval WHERE form_no='$value->form_no' order by id desc");
											$query=$query->result();
											$result=$query;
											$query=$query[0]->status;
											
											?>
											<td><?php echo $query;?></td>
											<td><a href="<?php echo base_url().'adminform_pdf/'.$value->reg_id;?>"><i class="fa fa-download" title="Download Application Form"></i> &nbsp;&nbsp;
												<!-- <a href="<?php echo base_url().'adminadmit_pdf/'.$value->reg_id;?>"><i class="fa fa-download" title="Download Admit Card"></i> &nbsp;&nbsp; -->
													<a href="<?php echo base_url().'adminpaymentslip_pdf/'.$value->reg_id;?>"><i class="fa fa-download" title="Download Payment Slip"></i> &nbsp;&nbsp;
											</td>

											<td style="display:none"><?php echo $value->date_app;?></td>
											<td style="display:none"><?php echo $value->dob;?></td>
											<td><?php echo $value->fname;?></td>
											<!-- <td><?php echo $value->admission_no;?></td> -->
											<td><?php echo $value->total_amount;?></td>
											<td style="display:none;"><?php echo $value->optional_sub;?></td>
											
											<td><?php echo $value->email;?></td>
											<td ><?php echo $value->student_cat;?></td>
											<td style="display:none;"><?php echo $value->sub_cat;?></td>
											<!-- <td style="color: red;"><?php echo $value->status;?></td> -->
											<td style="display:none;"><?php echo $value->aadhar;?></td>
											<td style="display:none;"><?php echo $value->gender;?></td>
											<td style="display:none;"><?php echo $value->cat;?></td>	
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
											<td style="display:none"><?php echo $value->board;?></td>	
											<td style="display:none"><?php echo $value->examination_appeared;?></td>	
											<td style="display:none"><?php echo $value->reg_pri_stud;?></td>	
											<td style="display:none"><?php echo $value->school_attend;?></td>	

											<td style="display:none"><?php echo $value->english;?></td>	
											<td style="display:none"><?php echo $value->science;?></td>	
											<td style="display:none"><?php echo $value->mathematics;?></td>	
											<td style="display:none"><?php echo $value->social_science;?></td>	
											<td style="display:none"><?php echo $value->hindi_sans;?></td> 	
											
											<td style="display:"><?php echo $value->transaction_id;?></td>
											<td>
												<button><a href="<?php echo base_url();?>Admin/final_admission/1/<?php echo $value->form_no;?>">Approve</a></button>
												<button><a href="<?php echo base_url();?>Admin/final_admission/0/<?php echo $value->form_no;?>">Reject</a></button>

											</td>
											<!-- <td><a  class="btn btn-danger" onClick="return statuss('<?php echo $value->reg_id;?>');" data-toggle="modal" data-target="#exampleModalLong">View</a></td> -->
										</tr>  
											<?php  $x++; } ?>
										</tbody>
										<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								      	
								        <h5 class="modal-title" id="exampleModalLongTitle">Get detailed view</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								       <div class="container-fuild">
								      		<div class="row md">
								      			
								      		   <!--  <div class="col-lg-6 col-md-6 col-sm-6">Sl.No.</div><div class="col-lg-6 col-md-6 col-sm-6"></div>  -->            
									            <div class="col-lg-6 col-md-6 col-sm-6">FORM NO </div><div class="col-lg-6 col-md-6 col-sm-6" id="form_no"></div>            
									           <!--  <div class="col-lg-6 col-md-6 col-sm-6">DOWNLOAD</div><div class="col-lg-6 col-md-6 col-sm-6"></div> -->             
										        <div class="col-lg-6 col-md-6 col-sm-6">DATE OF APPLICATION</div><div class="col-lg-6 col-md-6 col-sm-6" id="date_app"></div>
										        <div class="col-lg-6 col-md-6 col-sm-6">DATE OF BIRTH</div><div class="col-lg-6 col-md-6 col-sm-6" id="dob"></div> 
									            <div class="col-lg-6 col-md-6 col-sm-6">STUDENT NAME</div><div class="col-lg-6 col-md-6 col-sm-6" id="name"></div>
									            <!-- <div class="col-lg-6 col-md-6 col-sm-6">ADMISSION NO</div><div class="col-lg-6 col-md-6 col-sm-6" id="admission_no"></div> -->
									           
										        <div class="col-lg-6 col-md-6 col-sm-6">OPTIONAL SUBJECT</div><div class="col-lg-6 col-md-6 col-sm-6" id="optional_sub"></div>
										        <div class="col-lg-6 col-md-6 col-sm-6">EMAIL </div><div class="col-lg-6 col-md-6 col-sm-6" id="email"></div>
						                        <div class="col-lg-6 col-md-6 col-sm-6">APPLICATION CATEGORY </div><div class="col-lg-6 col-md-6 col-sm-6" id="app_cat"></div>
										        <div class="col-lg-6 col-md-6 col-sm-6">status</div><div class="col-lg-6 col-md-6 col-sm-6" id="status"></div>
						                        <div class="col-lg-6 col-md-6 col-sm-6">STREAM </div><div class="col-lg-6 col-md-6 col-sm-6" id="stream"></div>
						                        <div class="col-lg-6 col-md-6 col-sm-6">NATIONALITY</div><div class="col-lg-6 col-md-6 col-sm-6" id="aadhar"></div>
						                        <div class="col-lg-6 col-md-6 col-sm-6">GENDER </div><div class="col-lg-6 col-md-6 col-sm-6" id="gender"></div> 
						                        <div class="col-lg-6 col-md-6 col-sm-6">CATEGORY </div><div class="col-lg-6 col-md-6 col-sm-6" id="category"></div>

										         <div class="col-lg-6 col-md-6 col-sm-6">FATHER'S NAME</div><div class="col-lg-6 col-md-6 col-sm-6" id="fathername"></div>
										         <div class="col-lg-6 col-md-6 col-sm-6">MOTHER'S NAME</div><div class="col-lg-6 col-md-6 col-sm-6" id="mothername"></div>		
										         <div class="col-lg-6 col-md-6 col-sm-6">OCCUPATIONAL ADDRESS</div><div class="col-lg-6 col-md-6 col-sm-6" id="occupation"></div>
										         <div class="col-lg-6 col-md-6 col-sm-6"> HOME PHONE NO</div><div class="col-lg-6 col-md-6 col-sm-6" id="home_phone"></div>
										         <div class="col-lg-6 col-md-6 col-sm-6">MOBILE NO</div><div class="col-lg-6 col-md-6 col-sm-6" id="mobile"></div>
										         <div class="col-lg-6 col-md-6 col-sm-6">FATHER'S INCOME</div><div class="col-lg-6 col-md-6 col-sm-6" id="fatherincome"></div>
										         <div class="col-lg-6 col-md-6 col-sm-6">MOTHER'S INCOME</div><div class="col-lg-6 col-md-6 col-sm-6" id="motherincome"></div>


										
									 <div class="col-lg-6 col-md-6 col-sm-6"> PERMANENT ADDRESS</div><div class="col-lg-6 col-md-6 col-sm-6" id="paddress"></div>
										<div class="col-lg-6 col-md-6 col-sm-6"> POST OFFICE</div><div class="col-lg-6 col-md-6 col-sm-6" id="poffice"></div>
										<div class="col-lg-6 col-md-6 col-sm-6">STATE</div><div class="col-lg-6 col-md-6 col-sm-6" id="pstate"></div> 
										<div class="col-lg-6 col-md-6 col-sm-6">DISTRICT</div><div class="col-lg-6 col-md-6 col-sm-6" id="pdistrict"></div>
										<div class="col-lg-6 col-md-6 col-sm-6">CITY</div><div class="col-lg-6 col-md-6 col-sm-6" id="pcity"></div> 
										<div class="col-lg-6 col-md-6 col-sm-6"> PIN CODE</div><div class="col-lg-6 col-md-6 col-sm-6" id="pcode"></div> 
										<div class="col-lg-6 col-md-6 col-sm-6">PRESENT ADDRESS</div><div class="col-lg-6 col-md-6 col-sm-6" id="taddress"></div>
										<div class="col-lg-6 col-md-6 col-sm-6"> POST OFFICE</div><div class="col-lg-6 col-md-6 col-sm-6" id="toffice"></div>
										<div class="col-lg-6 col-md-6 col-sm-6">STATE</div><div class="col-lg-6 col-md-6 col-sm-6" id="tstate"></div> 
										<div class="col-lg-6 col-md-6 col-sm-6">DISTRICT</div><div class="col-lg-6 col-md-6 col-sm-6" id="tdistrict"></div>
										<div class="col-lg-6 col-md-6 col-sm-6">CITY</div><div class="col-lg-6 col-md-6 col-sm-6" id="tcity"></div>
										<div class="col-lg-6 col-md-6 col-sm-6"> PIN CODE</div><div class="col-lg-6 col-md-6 col-sm-6" id="tcode"></div>

										<div class="col-lg-6 col-md-6 col-sm-6">NAME OF THE SCHOOL LAST ATTENDED</div><div class="col-lg-6 col-md-6 col-sm-6" id="last_school"></div>
										<div class="col-lg-6 col-md-6 col-sm-6">WHETHER RECOGNIZED BY STATE/CENTRAL/ICSE BOARD</div><div class="col-lg-6 col-md-6 col-sm-6 " id="rec"></div>
										<div class="col-lg-6 col-md-6 col-sm-6">NAME OF EXAMINATION APPEARED</div><div class="col-lg-6 col-md-6 col-sm-6" id="last_exam"></div>
										<div class="col-lg-6 col-md-6 col-sm-6"> WHETHER AS A REGULAR STUDENT OR A PRIVATE STUDENT</div><div class="col-lg-6 col-md-6 col-sm-6" id="reg_pri"></div>
										<div class="col-lg-6 col-md-6 col-sm-6"> MEDIUM OF INSTRUCTION AT THE LAST SCHOOL ATTENDED</div><div class="col-lg-6 col-md-6 col-sm-6" id="medium"></div>

										
										<div class="col-lg-6 col-md-6 col-sm-6">10th ENGLISH %</div><div class="col-lg-6 col-md-6 col-sm-6" id="english"></div>	
										<div class="col-lg-6 col-md-6 col-sm-6">10th SCIENCE %</div><div class="col-lg-6 col-md-6 col-sm-6" id="science"></div>										
										<div class="col-lg-6 col-md-6 col-sm-6">10th MATHEMATICS %</div><div class="col-lg-6 col-md-6 col-sm-6" id="mathematics"></div>
										<div class="col-lg-6 col-md-6 col-sm-6">10th SOCIAL SCIENCE %</div><div class="col-lg-6 col-md-6 col-sm-6" id="social_science"></div>
										<div class="col-lg-6 col-md-6 col-sm-6">10th HINDI %</div><div class="col-lg-6 col-md-6 col-sm-6" id="hindi"></div> 

										<div class="col-lg-6 col-md-6 col-sm-6">9th ENGLISH %</div><div class="col-lg-6 col-md-6 col-sm-6" id="english1"></div>	
										<div class="col-lg-6 col-md-6 col-sm-6"> 9th SCIENCE %</div><div class="col-lg-6 col-md-6 col-sm-6" id="science1"></div>										
										<div class="col-lg-6 col-md-6 col-sm-6"> 9th MATHEMATICS %</div><div class="col-lg-6 col-md-6 col-sm-6" id="mathematics1"></div>
										<div class="col-lg-6 col-md-6 col-sm-6"> 9th SOCIAL SCIENCE %</div><div class="col-lg-6 col-md-6 col-sm-6" id="social_science1"></div>
										<div class="col-lg-6 col-md-6 col-sm-6"> 9th HINDI %</div><div class="col-lg-6 col-md-6 col-sm-6" id="hindi1"></div> 
										<div class="col-lg-6 col-md-6 col-sm-6">BLOOD GROUP</div><div class="col-lg-6 col-md-6 col-sm-6" id="str"></div>  
										<!-- <div class="col-lg-6 col-md-6 col-sm-6">SUBJECT</div><div class="col-lg-6 col-md-6 col-sm-6" id="subject"></div>   -->
										<div class="col-lg-6 col-md-6 col-sm-6">Picuture</div><div class="col-lg-6 col-md-6 col-sm-6" id="picture"></div> 
										<div class="col-lg-6 col-md-6 col-sm-6">Marksheet</div><div class="col-lg-6 col-md-6 col-sm-6" id="marksheet"></div>  
										
										
										<div class="col-lg-6 col-md-6 col-sm-6">Transaction Id</div><div class="col-lg-6 col-md-6 col-sm-6" id="transaction_id"></div> 
								      		</div>
								      		
								      	</div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
								      </div>
								    </div>
								  </div>
								</div>
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
							<script type="text/javascript">
								  function statuss(id)
  {
    
    var url="<?php echo site_url('Admin/statuss')?>";
    var data="id="+id;
    $.post(url,data,function(responce){
    	 var a=responce;
         obj = JSON.parse(a);
         $('#form_no').html(obj.form_add[0].form_no);
         $('#date_app').html(obj.form_add[0].date_app);
         $('#dob').html(obj.form_add[0].dob);
         $('#name').html(obj.form_add[0].fname);
         $('#optional_sub').html(obj.form_add[0].optional_sub);
         $('#email').html(obj.form_add[0].email);
         $('#app_cat').html(obj.form_add[0].student_cat);
         $('#subject').html(obj.form_add[0].sub_cat);
       
         $('#stream').html(obj.form_add[0].stream);
         $('#aadhar').html(obj.form_add[0].nationality);
         $('#gender').html(obj.form_add[0].gender);
         $('#category').html(obj.form_add[0].cat);
         $('#fathername').html(obj.form_add[0].fathername);
         $('#mothername').html(obj.form_add[0].mothername);
         $('#occupation').html(obj.form_add[0].occupational_address);
         $('#home_phone').html(obj.form_add[0].home_phone);
         $('#mobile').html(obj.form_add[0].mobile);
         $('#fatherincome').html(obj.form_add[0].monthly_inc_father);
         $('#motherincome').html(obj.form_add[0].monthly_inc_mother);
         $('#paddress').html(obj.form_add[0].permanent_address);
         $('#poffice').html(obj.form_add[0].permanent_postoffice);
         $('#pstate').html(obj.form_add[0].permanent_state);
         $('#pdistrict').html(obj.form_add[0].permanent_district);
         $('#pcity').html(obj.form_add[0].permanent_city);
         $('#pcode').html(obj.form_add[0].permanent_pin);

         $('#taddress').html(obj.form_add[0].present_address);
         $('#toffice').html(obj.form_add[0].present_postoffice);
         $('#tstate').html(obj.form_add[0].present_state);
         $('#tdistrict').html(obj.form_add[0].present_district);
         $('#tcity').html(obj.form_add[0].present_city);

         $('#tcode').html(obj.form_add[0].present_pin);
         $('#last_school').html(obj.form_add[0].school_last_attend);
         $('#rec').html(obj.form_add[0].board);
         $('#last_exam').html(obj.form_add[0].examination_appeared);
         $('#reg_pri').html(obj.form_add[0].reg_pri_stud);
         $('#medium').html(obj.form_add[0].school_attend);

         $('#english').html(obj.form_add[0].english);
         $('#science').html(obj.form_add[0].science);
         $('#mathematics').html(obj.form_add[0].mathematics);
         $('#social_science').html(obj.form_add[0].social_science);
         $('#hindi').html(obj.form_add[0].hindi);

         $('#english1').html(obj.form_add[0].english1);
         $('#science1').html(obj.form_add[0].science1);
         $('#mathematics1').html(obj.form_add[0].mathematics1);
         $('#social_science1').html(obj.form_add[0].social_science1);
         $('#hindi1').html(obj.form_add[0].hindi1);
         $('#str').html(obj.form_add[0].blood_group);
         $('#transaction_id').html(obj.form_add[0].transaction_id);
          var img="<img style='width:100px;hight:100px;' src='<?php echo base_url();?>uploads/images/"+obj.form_add[0].student_img+"' alt='Image'>";
          $('#picture').empty();
         $('#picture').append(img);
         var link="<a href='<?php echo base_url();?>uploads/images/"+obj.form_add[0].marksheet+"' style='color:blue;text-decoration:underline;' target='_blank'>10th marksheet</a>";
          $('#marksheet').empty();
         $('#marksheet').append(link);
         // alert(img);
                    
                    //   $('#title'+i).html(obj.getblog[i].title);
                    //   $('#date'+i).html(obj.getblog[i].blog_date);
                    //   $('#blog'+i).html(obj.getblog[i].blog);

                  
                    // var b=obj.getblog[0].date;
                    // alert(b);
     // alert(responce);
     // window.location.reload();
    });

  }
							</script>