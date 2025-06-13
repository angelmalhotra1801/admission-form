<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{		
		parent::__construct();		
		error_reporting(E_ALL & ~E_NOTICE);

		if(empty($this->session->userdata('uid')) || ($this->session->userdata['loginstatus']!= '1') || ($this->session->userdata['role']!='User')) {
			redirect('login','refresh');
		}
		
	}


	public function dashboard()
	{	
		// print_r($_SESSION);
		if (($this->session->userdata['loginstatus']!= '1') && ($this->session->userdata['role']!='User')) {
			redirect('home', 'refresh');
		}
		// print_r($_SESSION); 
		$uid = $this->session->userdata['uid'];        
		$name = $this->session->userdata['name'];
		$data = $this->dbconnection->select('application_form','*','reg_id='.$uid);
 		$admission=$this->db->query("SELECT value FROM settings WHERE key_name='admission' order by id desc");
		$admission=$admission->result();
		$admission=$admission[0]->value;

 		// $cat=$data[0]->comp_employye; 
		$registration=$this->db->query("SELECT value FROM settings WHERE key_name='registeration' order by id desc");
			$registration=$registration->result();
			$registration=$registration[0]->value;


		//TO COLLECT LEFT AMOUNT (ERROR AMOUNT)
		$form_no=$data[0]->form_no;
		$error_amount=$this->db->query("SELECT * FROM error_amount WHERE form_no='$form_no'");
		$error_amount=$error_amount->result();
		$error_amount=$error_amount[0];
		if ($error_amount) {
			$error_paid=$this->dbconnection->select('error_transaction','*',"registered_id='$uid' AND paid_status='1'" );
			if ($error_paid) {	
				$amount=$error_paid[0]->amount;
				$transaction_id=$error_paid[0]->transaction_id;
				$page_title = 'Download';		
				$array = array('view'=>'download','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'amount'->$amount,'transaction_id'=>$transaction_id);	
			}
			else{
			$amount=$error_amount->amount;
			$application_no=$form_no;
			$page_title = 'Payment';		
			$array = array('view'=>'pay_error','page_title' => $page_title,'uid'=>$uid,'application_no'=>$application_no,'amount'=>$amount);

		}}
		else{
		if(isset($data[0]))
		{
			$application_no= $data[0]->form_no;
			$student_cat = $data[0]->student_cat;
        	$totper = $data[0]->totper; 

			$datas = $this->dbconnection->select('adm_transaction','*',"registered_id='$uid' AND paid_status='1'" ); 
			if(isset($datas[0])) 
			{
				$father=$data[0]->fathername;
					$mother=$data[0]->mothername;
					$address=$data[0]->present_address;
					$prev_school=$data[0]->school_last_attend;
					$board=$data[0]->board;
					$stream=$data[0]->stream;
					$query=$this->db->query("SELECT * FROM admission_approval WHERE form_no='$application_no' order by id desc");
					$query=$query->result();
					$query=$query[0];
					if($admission=="OFF"){
					echo "<script>alert('Admission Closed!')</script>";
					die();
					}
					else{
					$query=$query->status;
					if ($query=='Approved') {
						$query2=$this->db->query("SELECT * FROM final_admission WHERE form_no='$application_no'");
						$query2=$query2->num_rows();
						if ($query2==1) {
							redirect('User/pay2', 'refresh');
							
						}
						$array = array('view'=>'form_final','page_title' => "Admission Form",'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'student_cat'=>$student_cat,'cat'=>$cat,'father'=>$father,'mother'=>$mother,'address'=>$address,'prev_school'=>$prev_school,'board'=>$board,'stream'=>$stream);	

					}	
					else{	
				$page_title = 'Download';		
				$array = array('view'=>'download','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'student_cat'=>$student_cat,'totper'=>$totper,'cat'=>$cat);
			}
		}
		}
			else 
			{
				if ($data[0]->student_cat=="DAV BARIATU") {
				// echo $application_no;die();
					// echo"<pre>";print_r($data[0]);die();
					
					$father=$data[0]->fathername;
					$mother=$data[0]->mothername;
					$address=$data[0]->present_address;
					$prev_school=$data[0]->school_last_attend;
					$board=$data[0]->board;
					$stream=$data[0]->stream;

					$query=$this->db->query("SELECT * FROM admission_approval WHERE form_no='$application_no' order by id desc");
					$query=$query->result();
					$query=$query[0];
					$query=$query->status;
					if($admission=="OFF"){
					echo "<script>alert('Admission Closed!')</script>";
					die();
					}
					if ($query=='Approved') {
						$query2=$this->db->query("SELECT * FROM final_admission WHERE form_no='$application_no'");
						$query2=$query2->num_rows();
						if ($query2==1) {
							redirect('User/pay2', 'refresh');
							
						}
						$array = array('view'=>'form_final','page_title' => "Admission Form",'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'student_cat'=>$student_cat,'cat'=>$cat,'father'=>$father,'mother'=>$mother,'address'=>$address,'prev_school'=>$prev_school,'board'=>$board,'stream'=>$stream);	

					}	
					else{	
				$page_title = 'Download';		
				$array = array('view'=>'download','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'student_cat'=>$student_cat,'totper'=>$totper,'cat'=>$cat);	
				}
			}
				else{
			if ($registration=='OFF') {
				echo"<script>alert('Registration Closed Please Contact School');</script>";
				die();
			}
				
				$amount=1500;
				$page_title = 'Pay Now';		
				$array = array('view'=>'pay','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'cat'=>$cat,'amount'=>$amount);
				}
			}
		}
		else
		{
			
			if ($registration=='OFF') {
				echo"<script>alert('Registration Closed Please Contact School');</script>";
				die();
			}
			$application_no=0;
			$serial = $this->dbconnection->get_max_value("id","serial","application_form");
			$serials=$serial+1;
			$serial_n= 'DAVB2021/'.$serials;

			$page_title = 'Dashboard';		
			$array = array('view'=>'dashboard','page_title' => $page_title,'form_no'=>$serial_n,'uid'=>$uid);
			
		}
	}
		$this->load->view('user/template',$array);
		
}
	public function save2()
	{
		$form_no=$this->input->post('form_no');
		$student_category=$this->input->post('student_cat');
		$name=$this->input->post('name');
		$father=$this->input->post('father');
		$mother=$this->input->post('mother');
		$address=$this->input->post('address');
		$whatsapp=$this->input->post('whatsapp');
		$prev_school=$this->input->post('prev_school');
		$board=$this->input->post('board');
		$subjects=$this->input->post('subject');
		$optional=$this->input->post('optional_subject');
		$query=$this->db->query("INSERT INTO final_admission(form_no,student_category,name,father,mother,address,whatsapp,prev_school,board,subjects,optional) VALUES('$form_no','$student_category','$name','$father','$mother','$address','$whatsapp','$prev_school','$board','$subjects','$optional')");
redirect('User/pay2', 'refresh');
	}
	public function save()
	{	error_reporting(0);


		if(empty($this->input->post())) {
			redirect('user/dashboard','refresh');
		}
		// echo "<pre>";print_r($this->input->post());
		$uid = $this->session->userdata['uid'];
		$serial = $this->dbconnection->get_max_value("id","serial","application_form");
		$serials=$serial+1;
		$serial_n= 'DAVB2021/'.$serials;		
		$form_no = $serial_n;
		$date_app=$this->input->post('date_app');		
		$student_cat=$this->input->post('student_cat');		
		$stream=$this->input->post('sub_stream');		
		$optional_sub=$this->input->post('optional_subject');			
		$admission_no=$this->input->post('admission_no');		
		$fname=strtoupper($this->input->post('fname'));	
		$dob=$this->input->post('dob');			
		$email=$this->input->post('email');	
		$medical=$this->input->post('medical');
		$gender=$this->input->post('gender');
		$cat=$this->input->post('cat');
		$nationality=$this->input->post('nationality');

		$fathername=strtoupper($this->input->post('fathername'));
		$mothername=strtoupper($this->input->post('mothername'));
		$occupational_address=strtoupper($this->input->post('occupational_address'));		
		$home_phone=strtoupper($this->input->post('home_phone'));
		$mobile=$this->input->post('mobile');
		$income=$this->input->post('monthly_inc_father');


		$school_last_attend=strtoupper($this->input->post('school_last_attend'));
		$board=strtoupper($this->input->post('board'));
		$examination_appeared=strtoupper($this->input->post('examination_appeared'));
		$reg_pri_stud=strtoupper($this->input->post('reg_pri_stud'));
		// medium of instruction at school
		$school_attend=strtoupper($this->input->post('school_attend'));		
		
		$permanent_address=strtoupper($this->input->post('permanent_address'));
		$permanent_postoffice=strtoupper($this->input->post('permanent_postoffice'));
		$permanent_state=strtoupper($this->input->post('permanent_state'));
		$permanent_district=strtoupper($this->input->post('permanent_district'));
		$permanent_city=strtoupper($this->input->post('permanent_city'));
		$permanent_pin=$this->input->post('permanent_pin');
		$present_address=strtoupper($this->input->post('present_address'));
		$present_postoffice=strtoupper($this->input->post('present_postoffice'));
		$present_state=strtoupper($this->input->post('present_state'));
		$present_district=strtoupper($this->input->post('present_district'));
		$present_city=strtoupper($this->input->post('present_city'));
		$present_pin=$this->input->post('present_pin');

		$siblings=$this->input->post('siblings');
		// $comp_employye=$this->input->post('comp_employee');
		// $comp_place=$this->input->post('place_parents');



		// $stream=$this->input->post('stream');
		// $stream_group=$this->input->post('stream_group');
		
		
		$english=$this->input->post('english');
		$science=$this->input->post('science');		
		$mathematics=$this->input->post('maths');		
		$social_science=$this->input->post('social_science');		
		$hindi=$this->input->post('hindi');		

		

		$rand=mt_rand(100000, 999999);

	 	$photoimg_name=$_FILES['img']['name'];
        $pic_img_name=$uid.'_'.time();
        $fileExt = pathinfo($photoimg_name, PATHINFO_EXTENSION);
        $photoimg_upload_name=$pic_img_name;
	    $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
        $config['file_name'] =$photoimg_upload_name;
        $config['overwrite'] = false;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $upload_1=$this->upload->do_upload("img");


                if ( ! $this->upload->do_upload('img'))
                {
                        // print_r($this->upload->display_errors());
                }
                else{
                	// echo "string";
                }
        $uploadData_1 = $this->upload->data();
// echo "<pre>";print_r($uploadData_1);die;
        $image = $uploadData_1['file_name'];
        // $new_name = $uid.'_'.time().$uploadData_1['file_ext'];
        $new_name = $pic_img_name.$uploadData_1['file_ext'];


        $photomarksheet_name=$_FILES['marksheet']['name'];
        $pic_marksheet_name=$uid.'_'.time();
        $fileExt = pathinfo($photomarksheet_name, PATHINFO_EXTENSION);
        $photomarskeet_upload_name=$pic_marksheet_name;
	    $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] =$photomarskeet_upload_name;
        $config['overwrite'] = false;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $upload_2=$this->upload->do_upload("marksheet");


                if ( ! $this->upload->do_upload('marksheet'))
                {
                        // print_r($this->upload->display_errors());
                }
                else{
                	// echo "string";
                }
        $uploadData_2 = $this->upload->data();
        $image = $uploadData_2['file_name'];
        $markshhet_name = $pic_marksheet_name.$uploadData_2['file_ext'];

		

    

			$data= array(
				'reg_id'=>$uid,
				'form_no' => $form_no, 
				'date_app' => $date_app, 
				'dob' => $dob,
				'student_cat' => $student_cat,

				'fname' => $fname, 			
				'email' => $email, 
				'medical' => $medical, 
				'gender' => $gender,
				'cat' => $cat, 
				'nationality' => $nationality, 

				'fathername' => $fathername, 
				'mothername' => $mothername,				
				'occupational_address' => $occupational_address,
				'home_phone' => $home_phone, 
				'mobile' => $mobile,
				'income' => $income, 
				'school_last_attend' => $school_last_attend, 
				'board' => $board, 
				'examination_appeared' => $examination_appeared, 
				'reg_pri_stud' => $reg_pri_stud, 
				'school_attend' => $school_attend, 
				
				'permanent_address' => $permanent_address, 
				'permanent_postoffice' => $permanent_postoffice, 
				'permanent_state' => $permanent_state, 
				'permanent_district' => $permanent_district, 
				'permanent_city' => $permanent_city, 
				'permanent_pin' => $permanent_pin, 
				'present_address' => $present_address, 
				'present_postoffice' => $present_postoffice, 
				'present_state' => $present_state, 
				'present_district' => $present_district, 
				'present_city' => $present_city, 
				'present_pin' => $present_pin, 

				'stream'=>$stream,

				'siblings'=>$siblings,

				'english' => $english, 
				'science' => $science, 				
				'mathematics' => $mathematics,			
				'social_science' => $social_science,			
				'hindi' => $hindi,

				

				'student_img' => $new_name,
				
				'ip' =>$_SERVER['REMOTE_ADDR'],
				'marksheet' =>$markshhet_name,
			);
			
// echo "<pre>";print_r($data);die();
		$sel = $this->dbconnection->select("application_form","*","reg_id='$uid'");
		if($sel)
		{

		}
		else {
			if(!empty($_POST)){
			  $this->dbconnection->insert('application_form',$data);			 
			}
			else {
				redirect('user/dashboard','refresh');
			}
		}
		  redirect('User/pay', 'refresh');

		
	}

	public function pay()
	{	

		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='User')) {
            redirect('home', 'refresh');
        }
        // echo 'hw'.$row=$this->session->userdata('uid');
        // print_r($_SESSION);
        $uid = $this->session->userdata['uid'];        
        $name = $this->session->userdata['name'];
        $data = $this->dbconnection->select('application_form','*','reg_id='.$uid); 
        $amount=1500;
        $page_title = 'Pay Now';		
		// $array = array('view'=>'pay','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no);

        if(isset($data[0]))
        {
        	$application_no= $data[0]->form_no;  
        	$datas = $this->dbconnection->select('adm_transaction','*',"registered_id='$uid' AND paid_status='1'" ); 
        	if(isset($datas[0])) {
        		$page_title = 'Download';		
        		$array = array('view'=>'download','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'amount'=>$amount);

        	}
        	else {
        		$page_title = 'Pay Now';		
        		$array = array('view'=>'pay','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'amount'=>$amount);
        		if ($data[0]->student_cat=="DAV BARIATU") {
				$page_title = 'Download';		
				$array = array('view'=>'download','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'student_cat'=>$student_cat,'totper'=>$totper,'cat'=>$cat);	
				}
        	}
        }else{

        	$application_no=0;
        	$page_title = 'Pay Now';		
        	$array = array('view'=>'pay','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'amount'=>$amount);

        }

        $this->load->view('user/template',$array);
    }
    public function pay2()
    {
    	if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='User')) {
            redirect('home', 'refresh');
        }
        // echo 'hw'.$row=$this->session->userdata('uid');
        // print_r($_SESSION);
        $uid = $this->session->userdata['uid'];        
        $name = $this->session->userdata['name'];
        $data = $this->dbconnection->select('application_form','form_no','reg_id='.$uid); 
        $form_no=$data[0]->form_no;
        $query=$this->db->query("SELECT * FROM final_admission where form_no='$form_no'");
        $query=$query->result();
        $query=$query[0];
        $student_category=$query->student_category;
        $subjects=$query->subjects;
        $optional=$query->optional;
        if ($student_category=='DAV BARIATU') {
        	if ($subjects=="PHYSICS,CHEMISTRY,MATHS,PHE" or $subjects=="PHYSICS,CHEMISTRY,BIOLOGY,PHE") {
        		if ($optional=='Computer Science') {
        			$amount=16050;
        		}
        		else{
        			$amount=15150;
        		}
        	}
        	else{
        		$amount=14250;
        	}
        }
        else{
        	if ($subjects=="PHYSICS,CHEMISTRY,MATHS,PHE" or $subjects=="PHYSICS,CHEMISTRY,BIOLOGY,PHE") {
        		if ($optional=='Computer Science') {
        			$amount=50150;
        		}
        		else{
        			$amount=51050;
        		}
        	}
        	else{
        		$amount=49250;
        	}
        }
        $page_title = 'Pay Now';
		// $array = array('view'=>'pay','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no);

        if(isset($data[0]))
        {
        	$application_no= $data[0]->form_no;  
        	$datas = $this->dbconnection->select('adm_transaction_final','*',"registered_id='$uid' AND paid_status='1'" ); 
        	if(isset($datas[0])) {
        		$page_title = 'Download';		
        		$array = array('view'=>'download2','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'amount'=>$amount);

        	}
        	else {
        		$page_title = 'Pay Now';		
        		$array = array('view'=>'pay2','page_title' => $page_title,'uid'=>$uid,'name'=>$name,'application_no'=>$application_no,'amount'=>$amount);
        		
        	}
        }else{

        	redirect('User/dashboard','refresh');

        }

        $this->load->view('user/template',$array);
    }
    public function download()
    {	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='User')) {
            redirect('home', 'refresh');
        }
        $uid = $this->session->userdata['uid'];
        $getid = $this->dbconnection->select('application_form','*','reg_id='.$uid);        
        $application_no= $getid[0]->form_no;
        $name = $this->session->userdata['name'];
        $student_cat = $getid[0]->student_cat;
        $totper = $getid[0]->totper;
        $page_title = 'Download';	
        $array = array('view'=>'download','page_title' => $page_title,'name'=>$name,'uid'=>$uid,'application_no'=>$application_no,'student_cat'=>$student_cat,'totper'=>$totper);
        $this->load->view('user/template',$array);

    }

    function form_pdf(){
    	
    	
    	 $id = $this->uri->segment(2);	
    	
    	$row=$this->dbconnection->select('application_form','*','reg_id='.$id);
    	// $job_CC = $row[0]->job_center;

    	// $job_c = unserialize($job_CC);
    	$array = array('data'=>$row);

    	$this->load->view('user/application_form_pdf',$array);
    	$html = $this->output->get_output();	
    	

    	$this->load->library('pdf');

    	$this->dompdf->load_html($html);

    	$this->dompdf->render();

    	// $this->dompdf->stream("application_form.pdf");
    }

    function admit_card(){

    	$id = $this->uri->segment(2);
    	$row=$this->dbconnection->select('application_form','*','reg_id='.$id);	
    	$job_CC = $row[0]->job_center;
    	$job_c = unserialize($job_CC);
    	$array = array('data'=>$row,'job_c' => $job_c);
		//$array = array('data'=>$row);
    	$this->load->view('user/admit_card_pdf',$array);
    	$html = $this->output->get_output();
		// Load library
    	$this->load->library('pdf');

		// Convert to PDF
    	$this->dompdf->load_html($html);
    	$this->dompdf->render();
    	$this->dompdf->stream("admit_card.pdf");
    }

    function payment_receipt(){

    	$id = $this->uri->segment(2);
    	$row=$this->dbconnection->select('adm_transaction','*','paid_status="1" AND registered_id='.$id);	
    	$data_stu = $this->dbconnection->select('application_form','*','reg_id='.$id);	
    	$array = array('data'=>$row,'datauser'=>$data_stu);
    	$this->load->view('user/payment_receipt_pdf',$array);
    	$html = $this->output->get_output();
		// Load library
    	$this->load->library('pdf');

		// Convert to PDF
    	$this->dompdf->load_html($html);
    	$this->dompdf->render();
    	$this->dompdf->stream("payment_receipt.pdf");
    }

    function payment_receipt2(){

    	$id = $this->uri->segment(3);
    	$row=$this->dbconnection->select('adm_transaction_final','*','paid_status="1" AND registered_id='.$id);	
    	$data_stu = $this->dbconnection->select('application_form','*','reg_id='.$id);	
    	$array = array('data'=>$row,'datauser'=>$data_stu);
    	$this->load->view('user/payment_receipt_pdf',$array);
    	$html = $this->output->get_output();
		// Load library
    	$this->load->library('pdf');

		// Convert to PDF
    	$this->dompdf->load_html($html);
    	$this->dompdf->render();
    	$this->dompdf->stream("payment_receipt.pdf");
    }


    public function user_profile()
    {	
		/*if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='User')) {
            redirect('home', 'refresh');
        }*/
        $page_title = 'Profile';	
        $array = array('view'=>'profile','page_title' => $page_title);
        $this->load->view('user/template',$array);

    }

    public function ajax_return()
    {
    	$mobile = $this->input->post('mobile');
    	$data = array(
    		'mobile' =>$mobile,			
    	);

    	$counts = $this->dbconnection->count('register',$data);
    	echo $counts;
    }





}

