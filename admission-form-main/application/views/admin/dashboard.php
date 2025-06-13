
<div class="main-body">
  <div class="page-wrapper">

    <div class="page-body">
      <div class="row">
        <!-- task, page, download counter  start -->
    <div class="col-xl-3 col-md-6">
          <div class="card bg-c-blue update-card">
            <div class="card-block">
              <div class="row align-items-end">
                <b>Total Forms Filled
                <div class="col-8">
                	<?php 
                	$query=$this->db->query("SELECT count(id) as count_id FROM application_form");
                	$query=$query->result();
                	$query=$query[0]->count_id;
                	echo $query;
                	?>
	                </b></div>
	            </div>
	        </div>
    	</div>
	</div>


	<div class="col-xl-3 col-md-6">
          <div class="card bg-c-blue update-card">
            <div class="card-block">
              <div class="row align-items-end">
                <b>Total Forms with fees paid(FOR FORMS EXCEPT DAV Bariatu Student)
                 <div class="col-8">
                	<?php 
                	$query=$this->db->query("SELECT count(id) as count_id FROM adm_transaction where paid_status=1 and form_no in (SELECT form_no FROM application_form where student_cat!='DAV BARIATU')");
                	$query=$query->result();
                	$query=$query[0]->count_id;
                	echo $query;
                	?>
	                </b></div>
	            </div>
	        </div>
    	</div>
	</div>


	<div class="col-xl-3 col-md-6">
          <div class="card bg-c-blue update-card">
            <div class="card-block">
              <div class="row align-items-end">
                <b>Forms of DAV Bariatu Student
                 <div class="col-8">
                	<?php 
                	$query=$this->db->query("SELECT count(id) as count_id FROM application_form where student_cat='DAV BARIATU'");
                	$query=$query->result();
                	$query=$query[0]->count_id;
                	echo $query;
                	?>
	                </b></div>
	            </div>
	        </div>
    	</div>
	</div>
</div>
</div>
</div>
</div>
  <h6>REGISTRATION ON/OFF</h6>
  <form action="<?php echo base_url();?>Admin/registration_on_off" method="post">
  <?php
  $query=$this->db->query("SELECT * FROM settings where key_name='registeration' order by id desc");
  $query=$query->result();
  $query=$query[0];
  $query=$query->value;
  ?>
  <b>Current Status <?php echo $query;?></b>
  <br>
  <select name="value" id="value">
    <option value="ON">ON</option>
    <option value="OFF">OFF</option>
  </select>
  <input type="submit" name="Submit">
  </form>
                 <!--  <h4 class="text-white">$30200</h4>-->
              