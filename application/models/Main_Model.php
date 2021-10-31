<?php

require __DIR__.'/../../vendor/autoload.php';
use Kreait\Firebase\Factory;


class Main_Model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$factory = (new Factory)->withServiceAccount(__DIR__.'/../../uploads/cellva-logistics-5b844-firebase-adminsdk-xaas4-3c5cc97033.json')
				->withDatabaseUri('https://cellva-logistics-5b844-default-rtdb.firebaseio.com/');
				$this->database = $factory->createDatabase();
        }
		

	function postAdminLogin($email,$password){		
		$result = $this->database->getReference('INFO')->getChild($email)->getValue();	
		
		if($result == $password){			
				$newdata = array(
					'user_fullname'  => "Admin",
					'email'     => $email,
					'logged_in' => 1,
					'user_image' => "1451418858user_image.jpg"
				);
				$this->session->set_userdata('admin_session',$newdata);			
				return true;
			
		}else{
			return false;
		}
	}

	function getUsers(){
		return $result = $this->database->getReference('USERS')->getValue();	
		
	}

	function getDriverApplications(){
		return $result = $this->database->getReference('DRIVER APPLICATION')->getValue();	
		
	}

	function getOrders(){
		return $result = $this->database->getReference('ORDERS')->getValue();	
		
	}
	
	function assignDriver($driver,$push_data,$order_id,$order_push_data){
		 $this->database->getReference('ORDERS')->getChild($order_id)->update($order_push_data);		
		 $this->database->getReference('DELIVERY BOY')->getChild($driver)->set($push_data);			
		 return true;
	}

	function approveDriver($key){
		$key = base64_decode($key);
		$key = urldecode($key);
		$order_push_data = array('Status'=>'Approved');
		$result = $this->database->getReference('DRIVER APPLICATION')->getChild($key)->getValue();	
		if($result){
			$driver_name = $result['Driver Name'];
			$set_driver_data['Location']=  "";
			$set_driver_data['Mobile']=  $result['Mobile'];
			$set_driver_data['Pass']=  $result['Mobile'];
			$set_driver_data['Status']=  "Active";

			$this->database->getReference('DRIVER APPLICATION')->getChild($key)->update($order_push_data);		
			$this->database->getReference('DELIVERY BOY')->getChild('BOYS')->getChild($driver_name)->set($set_driver_data);			
			return true;

		}else{
			return false;
		}
		
		
   }

	

	function getCategories(){
		return $result = $this->database->getReference('SERVICES')->getChild('CATEGORY')->getValue();			
	}

	function getDrivers(){
		return $result = $this->database->getReference('DELIVERY BOY')->getChild('BOYS')->getValue();			
	}

	function addCategory($key,$value){		
		return $result = $this->database->getReference('SERVICES')->getChild('CATEGORY')->getChild($key)->set($value);
	}

	function removeCategory($key){
		$key = base64_decode($key);
		$key = urldecode($key);
		return $result = $this->database->getReference('SERVICES')->getChild('CATEGORY')->getChild($key)->remove();			
	}

	function findCategoryByKey($selected_category,$result){	

		$result_new = array();
		if (array_key_exists($selected_category, $result['CATEGORY'])) {
			$result_new[$selected_category] = $result['CATEGORY'][$selected_category];
		}
		return $result_new;
	}

	function getSubCategories($selected_category = ""){
		$result = $this->database->getReference('SERVICES')->getValue();

		if($selected_category){
			$result['CATEGORY_NEW']  = $this->findCategoryByKey($selected_category,$result);
		}
		

		$categories = array();
		$sub_categories = array();
		$sub_categories_new = array();
		$new_result = array();
		if($result){
			$result_key = array_keys($result);
			unset($result_key[0]);
			$result_key = array_values($result_key);
			if($result['CATEGORY']){
				foreach($result['CATEGORY'] as $key => $row){
					$categories[] = $key; 
				}
			}

			if($categories && $result_key){
				$i=0;
				foreach($categories as $key => $row){
					if (in_array($row, $result_key)){
						$sub_categories[$i]['category'] = $row;
						$sub_categories[$i]['sub_category'] = $result[$row];						
						$i++;
					}
				}

			}

		}

	//	echo "<pre>"; print_r($sub_categories); exit;

		if($sub_categories){
			$k = 0;
			foreach($sub_categories as $key => $row){
				if($row['sub_category']){
					foreach($row['sub_category'] as $sub_key => $sub_row){

						if($selected_category){
							if($selected_category == $row['category'] ){

							
								$sub_categories_new[$k][] = $row['category'];
								$sub_categories_new[$k][] = $sub_key;
								$sub_categories_new[$k][] = $result[$row['category']][$sub_key]['Charges'];
								
								$sub_categories_new[$k][] = $result[$row['category']][$sub_key]['Image'] ;
								$sub_categories_new[$k][] = $result[$row['category']][$sub_key]['Description'] ;
								$sub_categories_new[$k][] = $result[$row['category']][$sub_key]['Name'] ;

								$k++;
							}

						}else{
							$sub_categories_new[$k][] = $row['category'];
							$sub_categories_new[$k][] = $sub_key;
							
							

							$sub_categories_new[$k][] = $result[$row['category']][$sub_key]['Charges'];
							
							$sub_categories_new[$k][] = $result[$row['category']][$sub_key]['Image'] ;
							$sub_categories_new[$k][] = $result[$row['category']][$sub_key]['Description'] ;
							$sub_categories_new[$k][] = $result[$row['category']][$sub_key]['Name'] ;

							$k++;
						}
						
						
					}
				}
			}
		}

		$new_result['categories'] = $categories;
		$new_result['subcategories'] = $sub_categories_new;

		//echo "<pre>"; print_r($new_result); exit;
		
		return $new_result;		
	}

	function addSubCategory($category,$subcategory,$post_data){		
		return $result = $this->database->getReference('SERVICES')->getChild($category)->getChild($subcategory)->set($post_data);		
	}

	function removeSubCategory($category,$subcategory){
		$category = base64_decode($category);
		$category = urldecode($category);

		$subcategory = base64_decode($subcategory);
		$subcategory = urldecode($subcategory);

		return $result = $this->database->getReference('SERVICES')->getChild($category)->getChild($subcategory)->remove();			
	}
	
	
	

	function admin_email_check($email){
		$id = $this->session->userdata('admin_session')['logged_in'];
		return $this->db->select('user_id')->where('user_id<>',$id)->where('user_email',$email)->get('users')->row();
	}
	
	function user_email_check($email,$user_id){
		if($user_id)
			return $this->db->select('user_id')->where('user_id<>',$user_id)->where('user_email',$email)->get('users')->row();
		else
			return $this->db->select('user_id')->where('user_email',$email)->get('users')->row();
	}

	function getProfileData($id){
		return $this->db->select('user_id,user_fullname,user_password,user_name,user_email,user_address,user_mobile_no_1,user_mobile_no_2,user_pincode,user_image')
		->where('user_id',$id)->get('users')->row();
	}
	
	
	
	

	function submitProfile(){
		$this->db->set($this->input->post());
		$this->db->where('user_id', $this->session->userdata('admin_session')['logged_in']);
		$this->db->update('users'); 
		if($this->db->affected_rows())
			return true;
		else
			return false;
	}
	
	
	
	
	function addUser(){
		if($this->db->insert('users' , $this->input->post()))
			return $this->db->insert_id();
		else	
			return false;
	}
	
	function editUser($id){
		$this->db->set($this->input->post());
		$this->db->where('user_id', $id);
		$this->db->update('users'); 
		if($this->db->affected_rows())
			return true;
		else
			return false;
	}
	
	function getSiteInfo(){
		return $this->db->select('id,name,email,mobile_no_1,mobile_no_2,image,footer')
		->where('id',1)->get('site_setting')->row();
	}
	
	function editSiteInformation(){
		$this->db->set($this->input->post());
		$this->db->where('id', 1);
		$this->db->update('site_setting'); 
		if($this->db->affected_rows())
			return true;
		else
			return false;
	}
	
	
	
	function getAdminAlbum(){
		return $this->db->select('admin_categories.name,user_albums.category_id,user_albums.id,user_albums.user_id,users.user_fullname')
		->from('user_albums')
		->join('users','user_albums.user_id = users.user_id')
		->join('admin_categories','admin_categories.id = user_albums.category_id')
		->where('users.user_is_active', 1)->where('users.user_is_deleted', 0)
		->where('users.user_role_id', 1)->where('users.user_id', 1)->where('user_albums.user_id', 1)
		->group_by(array("user_albums.user_id", "user_albums.category_id"))
		->get()->result();
	}
	
	function getUserAlbum(){
		return $this->db->select('categories.name,user_albums.category_id,user_albums.id,user_albums.user_id,users.user_fullname')
		->from('user_albums')
		->join('users','user_albums.user_id = users.user_id')
		->join('categories','categories.id = user_albums.category_id')
		->group_by(array("user_albums.user_id", "user_albums.category_id"))
		->get()->result();
	}
	
	function getCustomers(){
		return $this->db->select('user_id,user_fullname')
		->where('user_is_active', 1)->where('user_is_deleted', 0)
		->where('user_role_id', 3)
		->from('users')->get()->result();
	}

	function getHomePageAlbum(){
		return $this->db->select('id,image')
		->where('is_deleted', 0)
		->from('home_page_albums')->get()->result();
	}
	
	function addUserAlbum($sql){
		$this->db->query($sql);
		return $this->db->insert_id();
	}
	
	function getAlbumDataByUserId($id){
		return $this->db->select('categories.name,user_albums.category_id,user_albums.id,user_albums.user_id,users.user_fullname,user_albums.image')
		->from('user_albums')
		->join('users','user_albums.user_id = users.user_id')
		->join('categories','categories.id = user_albums.category_id')
		->where('user_albums.category_id',$id)
		->get()->result();
	}
	
	function getAdminAlbumDataByUserId($id){
		return $this->db->select('admin_categories.name,user_albums.category_id,user_albums.id,user_albums.user_id,users.user_fullname,user_albums.image')
		->from('user_albums')
		->join('users','user_albums.user_id = users.user_id')
		->join('admin_categories','admin_categories.id = user_albums.category_id')
		->where('user_albums.category_id',$id)
		->get()->result();
	}
	
	function updateUserAlbum(){
		$this->db->set($this->input->post());
		$this->db->where('id', 1);
		$this->db->update('user_albums'); 
		if($this->db->affected_rows())
			return true;
		else
			return false;
	}
	
	
	
	function getAdminCategories(){
		return $this->db->select('id,name')
		->from('admin_categories')
		->where('is_deleted',0)
		->where('is_active',1)
		->get()->result();
	}
	
	function userDelete($user_id){
		$this->db->set('user_is_deleted','1');
		$this->db->set('user_deleted_at', date('Y-m-d H:i:s'));
		$this->db->where('id', $user_id);
		$this->db->update('users'); 
		if($this->db->affected_rows())
			return true;
		else
			return false;
	}
	
	function deleteUserAlbum($id){
		$this->db->delete('user_albums', array('id' => $id));
		if($this->db->affected_rows())
			return true;
		else
			return false;
	}
	
	
	function getMessage(){
		return $this->db->select('send_messages.id,send_messages.user_id,send_messages.is_message,send_messages.email_template_id,send_messages.message,send_messages.created_at')
		->from('send_messages')
		//->join ('users' , 'users.user_id = send_messages.user_id','left')
		->get()->result();
	}
	
	function getEmailTemplate(){
		return $this->db->select('id,name,image')
		->from('email_templates')
		->get()->result();
	}
	
	function getEmailIdAndDeviceTokenByUserids($user_ids){
		return $this->db->select('users.user_id,users.user_email,device_tokan,mobile_type')
		->from('users')
		->join ('user_device_tokan_mobile_types' , 'user_device_tokan_mobile_types.user_id = users.user_id','left')
		->where('user_is_active', 1)
		->where('user_is_deleted', 0)
		->where_in('users.user_id',$user_ids) 
		->get()->result();
		
	}
	
	function getSiteEmail(){
		return $this->db->select('email,name')
		->from('site_setting')
		->get()->row();
	}
	
	function sendEmail($to,$msg){
		$site_details = $this->getSiteEmail();
		$from = $site_details->email;
		$comp_name = $site_details->name;
		$this->load->library('database_library');
		$this->database_library->sendEmail($from,$to,$sub,$msg,$comp_name);
	}
	
	function getVideos(){
		return $this->db->select('id,video_name,video_link,video_image,created_at')
		->from('videos')
		->where('is_active', 1)
		->where('is_deleted', 0)
		->get()->result();
	}
	
	function editVideo($id){
		return $this->db->select('id,video_link,video_name,video_image,created_at')
		->from('videos')
		->where('id',$id)
		->get()->row();
	}
	
	function updateVideo(){
		$this->db->set($this->input->post());
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('videos'); 
		if($this->db->affected_rows())
			return true;
		else
			return false;
	}
	
	function deleteVideo($id){
		$this->db->set('is_deleted','1');
		$this->db->where('id', $id);
		$this->db->update('videos'); 
		if($this->db->affected_rows())
			return true;
		else
			return false;
	}
	
	
	function addVideo(){
		if($this->db->insert('videos' , $this->input->post()))
			return $this->db->insert_id();
		else	
			return false;
	}
	

//------------------------------------------------ feedback management start -------------------------------------------------------------------
//countNotReadablyMail getInboxMail getSentMail getDraftMail 
	function countNotReadablyMail(){
		return $this->db->select('count(*) as not_readable')
		->from('feedbacks')
		->where('is_readable', 0)
		->where('is_deleted', 0)
		->where('inbox_send_draft', 1)
		->get()->row();
	}
	
	function getInboxMail(){
		$sql = "
			select feedbacks.id,GROUP_CONCAT(users.user_fullname ORDER BY users.user_id) Usersame
			from feedbacks
			join users on FIND_IN_SET(users.user_id,feedbacks.feedback_from)
			group by feedbacks.id
		";
		$this->db->query($sql);
		
		//return $this->db->select('feedbacks.*,GROUP_CONCAT(users.user_fullname ORDER BY users.user_id) Usersame')
	//	->from('feedbacks')
		//->join('users','users.user_id = feedbacks.feedback_from')
		//->where('is_deleted', 0)
	//	->where('inbox_send_draft', 1)
		//->get()->result();
	}
	function getSentMail(){
		return $this->db->select('*')
		->from('feedbacks')
		->where('is_deleted', 0)
		->where('inbox_send_draft', 2)
		->get()->result();
	}
	
	function getDraftMail(){
		return $this->db->select('*')
		->from('feedbacks')
		->where('is_deleted', 0)
		->where('inbox_send_draft', 3)
		->get()->result();
	}

//------------------------------------------------- feedback management end ------------------------------------------------------------------
	
}
	
