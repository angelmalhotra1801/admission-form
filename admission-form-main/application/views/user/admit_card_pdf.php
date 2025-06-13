<!DOCTYPE html>
<html lang="en">
<head>
  <title>Application Form</title>

<style>
table, th, td {
  border: 1px solid black;
   border-collapse: collapse;
}
.im{
	
width:150px;	
}
</style>
</head>
<body >
  <?php foreach($data as $value){

  }?>

  <header class="clearfix">
    <div id="logo">
     <center>  <img src="assets/davhzb.png" alt="DAV Bariatu" style="width: 150px;height: 110px;"><br> </center>
      <br/>
      <div id="project">
        <center><h4> DAV PUBLIC SCHOOL, HAZARIBAG </h4><br>
               
          </center>
        
        

      </div>
    </div>
   <center> <h4>Admit Card</h4></center>


    <div id="company" class="clearfix pull-right">     
      Date : <?php echo $value->date_app;?><br><br>
    </div>
  
  </header>
  
<table width="100%">
<h4 style="color:red"> NOTE:-Candidate should bring the hard copies of the admit card, filled-up application form & Payment Slip
Candidate should also bring his/her Adhar card in original for verification</h4>
 <tr>
<!-- <td style="">Roll no</td>
<td> <?php echo $value->reg_id;?></td> -->
<td>Application no</td>
<td colspan="3"> <?php echo $value->form_no;?></td>
<td rowspan="10" class="im" valign="middle"> <img src="uploads/images/<?php echo $value->uploads;?>" class="img-responsive" style="height:150px;width:150px;border:0px solid"></td>

</tr>


  <tr>
<td>Name of Candidate</td>
<td colspan="3"><?php echo $value->fname;?></td>
</tr>

  <tr>
<td>Father Name</td>
<td colspan="3"><?php echo $value->fathername;?></td>
</tr>
 <tr>
<td>Mother Name</td>
<td colspan="3"><?php echo $value->mothername;?></td>
</tr>

<tr>
<td>Date of Birth</td>
<td><?php echo $value->dob;?></td>
<td>Gender</td>
<td><?php echo $value->gender;?></td>
</tr>


<tr>
<td>Aadhaar No</td>
<td colspan="3"><?php echo $value->aadhar;?></td>
</tr>
<?php
 $streams=$value->stream;
 $stream_groups=$value->stream_group;
 ?>
<tr>
<td>STREAM</td>
<td colspan="3"><?php echo $value->stream;?></td>
</tr>
<?php 
 if($streams=='COMMERCE')
   {?>
<tr>
<td>SUBJECT</td>
<td colspan="3"><?php echo $value->opt1comm;?> <?php echo $value->opt2comm;?></td>
</tr>
<?php } else if($streams=='SCIENCE')
 {?>  
 <tr>
   <td>GROUP</td>   
   <td colspan="3"><?php echo $value->stream_group;?></td>   
 </tr> 
 <?php 
 if($stream_groups=='PCM')
   {?>
    <tr>
     <td>SUBJECT</td>
     <td colspan="3"><?php echo $value->opt1math;?> <?php echo $value->opt2math;?></td>
   </tr>
 <?php } else { ?>
   <tr>
     <td><?php echo $value->stream_group;?></td>
     <td colspan="3"><?php echo $value->opt1bio;?> <?php echo $value->opt2bio;?></td>
     </tr> <?php } ?>

   <?php } else { }

   ?>


<tr rowspan="2" style="width:90px">
<td> Date of Admission Test: </td>
 <td colspan="3">  </td>

</tr>
   
</table>

</body>


</html>