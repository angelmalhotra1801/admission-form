<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Admin_model');
	}

	public function index()
	{		
		// $state= $this->dbconnection->select("state","*","");		
		$array = array('view'=>'login');
		$this->load->view('frontend/template',$array);
	}
	public function register()
	{		
		// $state= $this->dbconnection->select("state","*","");
		$array = array('view'=>'register');
		$this->load->view('frontend/template',$array);
	}

	public function get_district()
	{		
		$id = $this->input->post('state_id');
		$get = $this->dbconnection->select('district','*',"StCode=$id");
		?><option value="">Select</option><?php			
		foreach ($get as $key => $value) {
			?>
				<option value="<?php echo $value->DistrictName;?>"><?php echo $value->DistrictName;?></option>
			<?php	
		}	
	}
	public function forget()
	{		
		$array = array('view'=>'forget');		
		$this->load->view('frontend/template',$array);
	}

	public function login_user()
	{
		
		$email= $this->input->post('email');
		$password= md5($this->input->post('password'));
		$data=array(
				'email'=>$email,
				'password'=>$password,
			);
		
		$row = $this->Login_model->MatchUsername($data);
		if($row)
    	{
    		foreach($row as $userdata){}

    		if(($password)==$userdata['password'])
    		{

    			$id = $userdata['id'];
    			$contact = $userdata['contact'];
    			$name = $userdata['name'];
    			$email = $userdata['email'];
    			$district = $userdata['district'];
    			$state = $userdata['state'];
    			$city = $userdata['city'];
    			$created = $userdata['created_by'];
    			$role = $userdata['created_by'];
    			$this->session->set_userdata(array(
							'uid' 			=> 	$id,
							'contact'		=>	$contact,
							'email'			=>	$email,
							'name'			=>	$name,							
							'district'	    =>	$district,
							'state'	        =>	$state,
							'city'	        =>	$city,
							'loginstatus'	=> 	'1',
							'created_by'	=> 	$created,
							'role'	=> 	$role,

							
				));	
				
				if($role=='Admin')
				{			
					// redirect('admin/dashboard','refresh');
    			}
				else if($role=='User')
				{	

				redirect('user/dashboard','refresh');
    			}
    			else {
    				
    				redirect('','refresh');
    			}
    			
    		}
    		
		}
		else
    	{
    		
			$this->session->set_flashdata('unnotmatch','Login Details Is Wrong');
			redirect('login', 'refresh');
			

    	}
	}
    		

	public function logout()
	{
		$this->session->unset_userdata('uid');	
		$this->session->unset_userdata('email');	
		$this->session->unset_userdata('contact');	
		$this->session->unset_userdata('name');	
		$this->session->unset_userdata('loginstatus');	
		$this->session->unset_userdata('created_by');
		$this->session->set_flashdata('logout','Logout Successfully');
		redirect('login','refresh');
	}

	public function user_register()
	{
		$name=strtoupper($this->input->post('name'));
		$email=$this->input->post('email');
		$contact=$this->input->post('contact');		
		$password=$this->input->post('password');
		$data = array(
		'name'      => $name,		
		'email'     => $email,
		'contact'   => $contact,		
		'password'  => md5($password),
		'info_pass'  => $password,
		'created_by'=>'User',
		'created_ip'=>$_SERVER['REMOTE_ADDR'],
		'status'    =>'Y',

		);
		
		$this->dbconnection->insert('register',$data);
		$this->session->set_flashdata('register',$name.' Successfully Registerd');
		redirect('register', 'refresh');
	}


	public function adminuser()
	{
		$username= $this->input->post('username');
		$password= md5($this->input->post('password'));
		$data=array(
				'username'=>$username,
				'password'=>$password,
			);
		
		$row = $this->Admin_model->MatchUsername($data);
		if($row)
    	{
    		foreach($row as $userdata){}

    		if(($password)==$userdata['password'])
    		{

    			$id = $userdata['id'];    			
    			$username = $userdata['username'];
    			$password = $userdata['password'];    			
    			$created = $userdata['created_by'];    			
    			$this->session->set_userdata(array(
							'uid' 			=> 	$id,							
							'username'		=>	$username,
							'password'		=>	$password,							
							'loginstatus'	=> 	'1',
							'created_by'	=> 	$created,
				));	
				
				if($created=='Admin')
				{			
					redirect('admin/dashboard','refresh');
    			}
    			else {
    				redirect('','refresh');
    			}
    			
    		}
    		else
    		{
    			$this->session->set_flashdata('pwdnotmatch','Password Is Not Correct');
				$page_title = 'Login';
				$array = array('page_title' => $page_title);
				 $this->load->view('admin/login',$array);
    		}
		}
		else
    	{
    		$this->session->set_flashdata('unnotmatch','Username Is Wrong');
			$page_title = 'Login';
			$array = array('page_title' => $page_title);
			 $this->load->view('admin/login',$array);

    	}
	}

	public function adminlogout()
	{
		$this->session->unset_userdata('uid');	
		$this->session->unset_userdata('username');	
		$this->session->unset_userdata('password');	
		$this->session->unset_userdata('loginstatus');	
		$this->session->unset_userdata('created_by');
		$this->session->set_flashdata('logout','Logout Successfully');
		redirect('admin','refresh');
	}
	public function chkmail()
		{
			$email=$this->input->post('email');
			$data= array(
				'email' =>$email , 
			);			
			$counts = $this->dbconnection->count('register',$data);
			echo $counts;
		}
		public function sendmail()
		{
			$email=$this->input->post('email');
			$rand=rand(100000,999999);
		    
		    $data = array(
			'otp' => $rand,			
			);
			$this->dbconnection->update('register',$data,"email='$email'");
			$to =$email ;
			$subject = "Forget password";

			$message = "
			<html>
			<head>
			<title>Dav Application Form</title>
			</head>
			<body>
			<p>Your Otp code is:$rand</p>
			
			</body>
			</html>
			";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: info@mildtrix.com' . "\r\n";
        	//$headers .= 'bcc: akm9135@gmail.com' . "\r\n";

			mail($to,$subject,$message,$headers);
			echo 1;
			//echo "mesg send";
		}
		public function otpchk()
		{
		    $eemail=$this->input->post('eemail');
		    $cotp=$this->input->post('cotp');
			$data= array(
				'otp' =>$cotp ,
				'email'=>$eemail,
			);
			$counts = $this->dbconnection->count('register',$data,"email='$eemail'");
			echo $counts;
		}
		public function updatepass()
		{
		        $eemail=$this->input->post('eemail');
		    	$password= md5($this->input->post('password'));
        		$data=array(
        				'password'=>$password,
        				'email'=>$eemail,
		    	);
		    	 $this->dbconnection->update('register',$data,"email='$eemail'");
                $this->session->set_flashdata('updatepass','Password successfully updated');
                echo 1;
        		redirect('login', 'refresh');
		}
}
