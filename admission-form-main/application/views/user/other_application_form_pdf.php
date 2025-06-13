<!DOCTYPE html>
<html lang="en">
<head>
  <title>Application Form</title>

  <style type="text/css">

    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #5D6975;
      text-decoration: underline;
    }

    body {
      position: relative;
      width: 21cm;  
      height: 29.7cm; 
      margin: 0 auto; 
      color: #001028;
      background: #FFFFFF; 
      font-family: "open sans",Arial; 
      font-size: 12px; 
      /*font-family: Arial;*/
    }

    header {
      padding: 10px 0;
      margin-bottom: 30px;
    }

    #logo {
      text-align: center;
      margin-bottom: 10px;

    }

    #logo img {
      width: 100px;
      margin-left:70px;
    }

    h1 {
      border-top: 1px solid  #5D6975;
      border-bottom: 1px solid  #5D6975;
      color: #5D6975;
      font-size: 1.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 40px 0 20px 0;
      background: url(dimension.png);
    }

/*#project {
  float: left;
  }*/

  #project span {
    color: #5D6975;
    text-align: right;
    width: 52px;
    margin-right: 10px;
    display: inline-block;
    font-size: 0.8em;
  }

  #company {
    float: right;
    text-align: right;
  }

  #project div,
  #company div {
    white-space: nowrap;        
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }

  table tr:nth-child(2n-1) td {
    /*background: #F5F5F5;*/
  }
  table td:nth-child(2n-1) td {
    /*background: #F5F5F5;*/
  }

  table th,
  table td {
    text-align: left;
  } 
  table th .mi {
    text-align: center;
    font-size: 18px;
  }

  table th {
    padding: 5px 0px;
    color: #5D6975;
    border-bottom: 1px solid #C1CED9;
    white-space: nowrap;        
    font-weight: bold;
  }

  table .service,
  table .desc {
    text-align: left;
  }

  table td {
    padding: 5px 0px;
    color: #5D6975;
    border-bottom: 1px solid #C1CED9;
    white-space: nowrap;        
    font-weight: bold;
  }

  table td.service,
  table td.desc {
    vertical-align: top;
  }


  #notices .notice {
    color: #5D6975;
    font-size: 1.2em;
  }

  footer {
    color: #5D6975;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #C1CED9;
    padding: 8px 0;
    text-align: center;
  }

</style>

</head>
<body style="width:90%;">
  <?php foreach($data as $value){

  }?>

  <header class="clearfix">
    <div id="logo">
     
       <img src="assets/davhzb.png" alt="DAV HAZARIBAG" style="width:16%"><br>
      <br/>
      <div id="project">
        <div><span></span>DAV PUBLIC SCHOOL, HAZARIBAG </div>
        <div><span></span> </div>

      </div>
    </div>
    <h1>ONLINE ADMISSION FORM </h1>


    <div id="company" class="clearfix pull-right">     
      DATE : <?php echo $value->date_app;?><br><br>
    </div>

  </header>
  


  <table class="table table-bordered">

    <tr>
      <th>FORM NO</th>
      <td> <?php echo $value->form_no;?></td>
    </tr>

    <tr>
      <th>NAME OF THE STUDENT</th>
      <td><?php echo $value->fname;?></td>
    </tr>
    <tr>
      <th>CLASS</th>
      <td><?php echo $value->class;?></td>
    </tr>
    <tr>
      <th>DATE OF BIRTH</th>
      <td><?php echo $value->dob;?></td>
    </tr>
    <tr>
      <th>EMAIL</th>
      <td><?php echo $value->email;?></td>
    </tr>
    <tr>
      <th>AADHAAR NO</th>
      <td><?php echo $value->aadhar;?></td>
    </tr>
    <tr>
      <th>GENDER</th>
      <td><?php echo $value->gender;?></td>
    </tr>
    <tr>
      <th>CATEGORY</th>
      <td><?php echo $value->cat;?></td>
    </tr>

    <tr>
      <th>FATHER'S NAME</th>
      <td><?php echo $value->fathername;?></td>
    </tr>
    <tr>
      <th>MOTHER'S NAME</th>
      <td><?php echo $value->mothername;?></td>
    </tr>
    
    <tr>
      <th>IMAGE</th>
      <td><img src="uploads/images/<?php echo $value->uploads;?>" class="img-responsive" style="height:120px;width:120px" alt="image"></td>
    </tr>
    
   <tr>
     <th>OFFICIAL/OCCUPATIONAL ADDRESS </th>
     <td><?php echo $value->occupational_address;?></td>
   </tr>


   <tr>
     <th>WHATSAPP NUMBER</th>
     <td><?php echo $value->home_phone;?></td>
   </tr>


   <tr>
     <th>MOBILE NO</th>
     <td><?php echo $value->mobile;?></td>
   </tr>

   <tr>
     <th>GROSS MONTHLY INCOME OF THE PARENT</th>
     <td><?php echo $value->monthly_inc;?></td>
   </tr>

   <tr>
     <th colspan="2" class="mi">PERMANENT ADDRESS</th>
   </tr>

   
<?php
$str=$value->permanent_address;
?>
   <tr>
     <th>ADDRESS</th>
     <td><?php echo wordwrap($str,50,"<br>\n");?></td>
   </tr>
   <tr>
     <th>POST OFFICE</th>
     <td><?php echo $value->permanent_postoffice;?></td>
   </tr>
   <tr>
     <th>STATE</th>
     <td><?php echo $value->permanent_state;?></td>
   </tr>
   <tr>
     <th>DISTRICT</th>
     <td><?php echo $value->permanent_district;?></td>
   </tr>
   <tr>
     <th>CITY</th>
     <td><?php echo $value->permanent_city;?></td>
   </tr>
   <tr>
     <th>PIN CODE</th>
     <td><?php echo $value->permanent_pin;?></td>
   </tr>


   <tr style="margin-top: 15px;">
     <th colspan="2"  class="mi">PRESENT ADDRESS</th>
   </tr>
   <?php
$strpre=$value->present_address;
?>
   <tr>
     <th>ADDRESS</th>
     <td><?php echo wordwrap($strpre,50,"<br>\n");?></td>
   </tr>
   <tr>
     <th>POST OFFICE</th>
     <td><?php echo $value->present_postoffice;?></td>
   </tr>
   <tr>
     <th>STATE</th>
     <td><?php echo $value->present_state;?></td>
   </tr>
   <tr>
     <th>DISTRICT</th>
     <td><?php echo $value->present_district;?></td>
   </tr>
   <tr>
     <th>CITY</th>
     <td><?php echo $value->present_city;?></td>
   </tr>
   <tr>
     <th>PIN CODE</th>
     <td><?php echo $value->present_pin;?></td>
   </tr>
   

 </table>
 <table class="table table-bordered">
  <tr>
   <th colspan="2"  class="mi">STUDENT ADDITIONAL INFORMATION</th>
 </tr>

 <tr>
  <th> NAME OF THE SCHOOL LAST ATTENDED</th>
  <th><?php echo $value->school_last_attend;?></th>
</tr>

<tr>
 <td>NAME OF EXAMINATION APPEARED</td>
 <th><?php echo $value->examination_appeared;?></th>
</tr>

<tr>
 <td>WHETHER AS A REGULAR STUDENT OR A PRIVATE STUDENT</td>
 <th><?php echo $value->reg_pri_stud;?></th>
</tr>

<tr>
 <td>MEDIUM OF INSTRUCTION AT THE LAST SCHOOL ATTENDED</td>
 <th><?php echo $value->school_attend;?></th>
</tr>

</table>



</body>
</html>