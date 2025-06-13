<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
public function __construct()
	{		
		parent::__construct();		
		error_reporting(E_ALL & ~E_NOTICE);
	}

	public function index()
	{
		$this->load->view('admin/login');

	}

	public function dashboard()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'Dashboard';	
		$array = array('view'=>'dashboard','page_title' => $page_title);
		$this->load->view('admin/template',$array);
		
	}
	

	
	public function total_user()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'Total User';	
		$register= $this->dbconnection->select("register","*","");
		// print_r($register);
		$array = array('view'=>'total_user','page_title' => $page_title,'register' =>$register);
		$this->load->view('admin/template',$array);
		
	}
	public function add_form()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'Total application';
		
	$form_add=$this->db->query("SELECT *
		FROM   application_form,adm_transaction  where  adm_transaction.paid_status=1 and adm_transaction.registered_id=application_form.reg_id")->result();
		$array = array('view'=>'add_form','page_title' => $page_title,'form_add' =>$form_add);
		$this->load->view('admin/template',$array);

		
	}

	public function admission_final()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'Total application';
		
	$form_add=$this->db->query("SELECT * FROM   application_form,adm_transaction_final  where  adm_transaction_final.paid_status=1 and adm_transaction_final.registered_id=application_form.reg_id")->result();
		$array = array('view'=>'add_form_final','page_title' => $page_title,'form_add' =>$form_add);
		$this->load->view('admin/template',$array);

		
	}
	public function davb_add_form()
	{
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'Total application';
		
	$form_add=$this->db->query("SELECT *
		FROM   application_form where  student_cat='DAV BARIATU'")->result();
		$array = array('view'=>'add_form_davb','page_title' => $page_title,'form_add' =>$form_add);
		$this->load->view('admin/template',$array);

		
	}
	public function all_add_form()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'All Admissions';
 	
	$form_add=$this->db->query("SELECT *
		FROM   application_form ")->result();
		// print_r($form_add);exit;
		
		// $job_CC = $form_add[0]->job_center;
		// $job_c = unserialize($job_CC);
		$array = array('view'=>'all_add_form','page_title' => $page_title,'form_add' =>$form_add);
		$this->load->view('admin/template1',$array);

		
	}
	public function final_admission()
	{	
		$id=$this->uri->segment(3);
		if($id==0){

		$status="Rejected";
		}
		elseif ($id==1) {
		$status="Approved";	
		}
		$form_no=$this->uri->segment(4).'/'.$this->uri->segment(5);
		$query=$this->db->query("INSERT INTO admission_approval(form_no,status) VALUES('$form_no','$status')");
		if(!$query){
			echo"<script>alert('Error Occured!');</script>";
		}
		redirect("Admin/add_form");
	}
	public function final_admission_dav()
	{	
		$id=$this->uri->segment(3);
		if($id==0){

		$status="Rejected";
		}
		elseif ($id==1) {
		$status="Approved";	
		}
		$form_no=$this->uri->segment(4).'/'.$this->uri->segment(5);
		$query=$this->db->query("INSERT INTO admission_approval(form_no,status) VALUES('$form_no','$status')");
		if(!$query){
			echo"<script>alert('Error Occured!');</script>";
		}
		redirect("Admin/davb_add_form");
	}
	
	public function registration_on_off()
	{
		$value=$this->input->post("value1");
		$this->db->query("INSERT INTO settings(key_name,value) VALUES('registeration','$value') ");
		redirect('admin/dashboard');
	}


	public function admission_on_off()
	{
		$value=$this->input->post("value2");
		$this->db->query("INSERT INTO settings(key_name,value) VALUES('admission','$value') ");
		redirect('admin/dashboard');
	}

	public function add_form_otherclass()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'Total application';

		
	$form_add=$this->db->query("SELECT DISTINCT(other_class_application_form.form_no), other_class_application_form.fname,other_class_application_form.class,other_class_application_form.reg_id,
  other_class_application_form.date_app, other_class_application_form.dob,other_class_application_form.email,other_class_application_form.aadhar,other_class_application_form.gender,other_class_application_form.cat,other_class_application_form.fathername,other_class_application_form.mothername,other_class_application_form.occupational_address,other_class_application_form.home_phone,other_class_application_form.mobile,other_class_application_form.monthly_inc,other_class_application_form.school_last_attend,other_class_application_form.board,other_class_application_form.examination_appeared,other_class_application_form.reg_pri_stud,other_class_application_form.school_attend,other_class_application_form.permanent_address,other_class_application_form.permanent_postoffice,other_class_application_form.permanent_state,other_class_application_form.permanent_district,other_class_application_form.permanent_city,other_class_application_form.permanent_pin,other_class_application_form.present_address,other_class_application_form.present_postoffice,other_class_application_form.present_state,other_class_application_form.present_district,other_class_application_form.present_city,other_class_application_form.present_pin,other_class_application_form.uploads,other_class_application_form.new_certificate,other_class_application_form.ip,other_class_adm_transaction.transaction_id
		FROM   other_class_application_form,other_class_adm_transaction  where  other_class_adm_transaction.paid_status=1 and other_class_adm_transaction.registered_id=other_class_application_form.reg_id")->result();
		$array = array('view'=>'add_form_otherclass','page_title' => $page_title,'form_add' =>$form_add);
		$this->load->view('admin/template',$array);

		
	}
		public function retrive_form_data()
	{	
		if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$id = $this->uri->segment(3);
		$page_title = 'Total application';	
		$form_data= $this->dbconnection->select("application_form","*",'reg_id='.$id);
		//print_r($form_data);
		$array = array('view'=>'retrive_form_data','page_title' => $page_title,'form_add' =>$form_data);
		$this->load->view('admin/template',$array);
		
	}
	
//
	     public  function update_form() 
		  {
			  echo $id= $this->input->post('reg_id');

			 $data = array(
			 'dob' => $this->input->post('dob'),
			 'fname'=>$this->input->post('fname'),
			 'fathername'=>$this->input->post('fathername'),
			'hus_wife_name'=>$this->input->post('hus_wife_name'),
			'aadhar'=>$this->input->post('aadhar'),
			 'mobile'=>$this->input->post('mobile'),
			 'nation'=>$this->input->post('nation'),
			 'religion'=>$this->input->post('religion'),
			 // 'marital'=>$this->input->post('marital'),
			 'permanent_address'=>$this->input->post('permanent_address'),
			 'permanent_postoffice'=>$this->input->post('permanent_postoffice'),
			 'permanent_state'=>$this->input->post('permanent_state'),
			 'permanent_district'=>$this->input->post('permanent_district'),
			 'permanent_city'=>$this->input->post('permanent_city'),
			 'permanent_pin'=>$this->input->post('permanent_pin'),
			 'present_address'=>$this->input->post('present_address'),
			 'present_postoffice'=>$this->input->post('present_postoffice'),
			 'present_state'=>$this->input->post('present_state'),
			 'present_district'=>$this->input->post('present_district'),
			 'mat_percentage'=>$this->input->post('mat_percentage'),
			'mat_subject'=>$this->input->post('mat_subject'),
			'inter_year'=>$this->input->post('inter_year'),
			'inter_board'=>$this->input->post('inter_board'),
			
			 // 'cat'=>$this->input->post('cat'),
			 'tongue'=>$this->input->post('tongue'),
			 'permanent_address'=>$this->input->post('permanent_address'),
		
			'email' => $this->input->post('email')

			);
			// print_r($data);
			 $this->dbconnection->update('application_form',$data,'reg_id='.$id);
				redirect('admin/add_form','');
}

public function total_transaction()
{
	if (($this->session->userdata['loginstatus']!= '1')&&($this->session->userdata['role']!='1')) {
            redirect('login', 'refresh');
        }
		$page_title = 'total_transaction';	
		$total_transaction= $this->dbconnection->select("adm_transaction","*","status='Y' ");
		$array = array('view'=>'total_transaction','page_title' => $page_title,'total_transaction' =>$total_transaction);
		$this->load->view('admin/template',$array);
	
}
           
function adminform_pdf(){
		
		 $id = $this->uri->segment(2);
			
		$row=$this->dbconnection->select('application_form','*','reg_id='.$id);
		$job_CC = $row[0]->job_center;
		
		$job_c = unserialize($job_CC);
		$array = array('data'=>$row,'job_c' => $job_c);
		$this->load->view('user/application_form_pdf',$array);
		$html = $this->output->get_output();	
		$this->load->library('pdf');	
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("application_form.pdf");
	 }

	 function adminadmit_pdf(){
		
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
	 	 function adminpaymentslip_pdf(){
		
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

	  function adminform_pdf_other(){
		
		 $id = $this->uri->segment(2);
			
		$row=$this->dbconnection->select('other_class_application_form','*','reg_id='.$id);
		$job_CC = $row[0]->job_center;
		
		$job_c = unserialize($job_CC);
		$array = array('data'=>$row,'job_c' => $job_c);
		$this->load->view('user/other_application_form_pdf',$array);
		$html = $this->output->get_output();	
		$this->load->library('pdf');	
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("application_form.pdf");
	 }

	 function adminadmit_pdf_other(){
		
		$id = $this->uri->segment(2);
		$row=$this->dbconnection->select('other_class_application_form','*','reg_id='.$id);	
		$job_CC = $row[0]->job_center;
		$job_c = unserialize($job_CC);
		$array = array('data'=>$row,'job_c' => $job_c);
		//$array = array('data'=>$row);
		$this->load->view('user/other_admit_card_pdf',$array);
		$html = $this->output->get_output();
		// Load library
		$this->load->library('pdf');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("admit_card.pdf");
	 }
	 	 function adminpaymentslip_pdf_other(){
		
		$id = $this->uri->segment(2);
		$row=$this->dbconnection->select('other_class_adm_transaction','*','paid_status="1" AND registered_id='.$id);	
		$data_stu = $this->dbconnection->select('other_class_application_form','*','reg_id='.$id);	
		$array = array('data'=>$row,'datauser'=>$data_stu);
		$this->load->view('user/other_payment_receipt_pdf',$array);
		$html = $this->output->get_output();
		// Load library
		$this->load->library('pdf');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("payment_receipt.pdf");
}


public function student_cat()
{
	$query=$this->db->query("SELECT * FROM student_category WHERE status='Active'");
	$query=$query->result();
	$array = array('view'=>'student_cat','page_title' => 'Student Category','data' =>$query);
	$this->load->view('admin/template',$array);
	
}
public function student_cat_add()
{
	$category=$this->input->post('category');
	$this->db->query("INSERT INTO student_category(student_category,status) VALUES('$category','Active')");
	redirect('Admin/student_cat');
}

public function student_cat_delete()
{
	$id=$this->uri->segment(3);
	$query=$this->db->query("UPDATE student_category SET status='Inactive' WHERE id='$id'");	
	redirect('Admin/student_cat');
}	




public function stream()
{
	$query=$this->db->query("SELECT * FROM stream WHERE status='Active'");
	$query=$query->result();
	$array = array('view'=>'stream','page_title' => 'Student Category','data' =>$query);
	$this->load->view('admin/template',$array);
	
}
public function stream_add()
{
	$stream=$this->input->post('stream');
	$this->db->query("INSERT INTO stream(stream,status) VALUES('$stream','Active')");
	redirect('Admin/stream');
}

public function stream_delete()
{
	$id=$this->uri->segment(3);
	$query=$this->db->query("UPDATE stream SET status='Inactive' WHERE id='$id'");	
	redirect('Admin/stream');
}	



public function subjects()
{
	$query=$this->db->query("SELECT * FROM subject WHERE status='Active'");
	$query=$query->result();
	$array = array('view'=>'subject','page_title' => 'Subject','data' =>$query);
	$this->load->view('admin/template',$array);
	
}
public function subject_add()
{
	$subject=$this->input->post('subject');
	$this->db->query("INSERT INTO subject(subject_combination,status) VALUES('$subject','Active')");
	redirect('Admin/subjects');
}

public function subject_delete()
{
	$id=$this->uri->segment(3);
	$query=$this->db->query("UPDATE subject SET status='Inactive' WHERE id='$id'");	
	redirect('Admin/subjects');
}	


public function optional()
{
	$query=$this->db->query("SELECT * FROM optional_subject WHERE status='Active'");
	$query=$query->result();
	$array = array('view'=>'optional','page_title' => 'Optional Subject','data' =>$query);
	$this->load->view('admin/template',$array);
	
}
public function optional_add()
{
	$optional_subject=$this->input->post('optional_subject');
	$this->db->query("INSERT INTO optional_subject(optional_subject,status) VALUES('$optional_subject','Active')");
	redirect('Admin/optional');
}

public function optional_delete()
{
	$id=$this->uri->segment(3);
	$query=$this->db->query("UPDATE optional_subject SET status='Inactive' WHERE id='$id'");	
	redirect('Admin/optional');
}	



public function error_amount()
{
	$query=$this->db->query("SELECT * FROM error_amount");
	$query=$query->result();
	$array = array('view'=>'error_amount','page_title' => 'Error Amount','data' =>$query);
	$this->load->view('admin/template',$array);
	
}
public function error_amount_add()
{
	$error_amount=$this->input->post('error_amount');
	$form_no=$this->input->post('form_no');
	$this->db->query("INSERT INTO error_amount(form_no,amount) VALUES('$form_no','$error_amount')");
	redirect('Admin/error_amount');
}


}
