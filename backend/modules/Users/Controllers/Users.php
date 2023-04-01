<?php

/**
 * Users Controller
 */

namespace Modules\Users\Controllers;

use \Modules\Users\Models\UsersModel;
use \Modules\Users\Models\UserrolesModel;
use \Modules\Systems\Models\SystemconfigsModel;

class Users extends \CodeIgniter\Controller
{
   protected $users;
   protected $systemConfiguration;

   function __construct()
   {
      $SystemConfigsModel = new SystemconfigsModel();
      $this->systemConfiguration = $SystemConfigsModel->first();

      $usersModel = new UsersModel();
      $this->user = $usersModel->where('id', session()->get('id'))->first();
   }

   public function index()
   {
      //Verify if there is logged in user! Else redirect to login
      if ( ! session()->get('id')) { return redirect()->to(rdrctn()); }

      $data['nav_id'] = '11';
      $data['pageTitle'] = "Manage Accounts";
      $data['systemConfiguration'] = $this->systemConfiguration;
      $data['account'] = $this->user;

      return view('Modules\Users\Views\index', $data);
   }

   public function login()
   {
      if ($this->request->getMethod() == 'post')
      {
         $usersModel = new UsersModel();

         //Variables
         $Username = $this->request->getVar('email');
         $Password = $this->request->getVar('password');

         //Validate If Accout is Exists
         $user = $usersModel->where('username', $Username)->first();

         if (!empty($user))
         {
            if ($user['password'] == hashpassword($Password))
            {
               $this->setUserSession($user);

               $param_last_login = array('last_login' => time());
               $save_last_login = $usersModel->update($user['id'], $param_last_login);
               if ($save_last_login)
               {
                  return redirect()->to(rtfldr().'/admin/home');
               }
            }
         } else {
            $data['validation'] = "Invalid Username and Password.";
         }
      }

      $data['nav_id'] = '11';
      $data['systemConfiguration'] = $this->systemConfiguration;

      return view('Modules\Users\Views\login', $data);
   }

   public function add_new_user()
   {
      //Verify if there is logged in user! Else redirect to login
      if ( ! session()->get('id')) { return redirect()->to(rdrctn()); }

      $systemRoles = new UserrolesModel();
      $getAllRoles = $systemRoles->where('id !=',' 1')->findAll();

      $data['nav_id'] = '11';
      $data['pageTitle'] = "Users - Add New";
      $data['systemConfiguration'] = $this->systemConfiguration;
      $data['account'] = $this->user;
      $data['getAllRoles'] = $getAllRoles;

      return view('Modules\Users\Views\add', $data);
   }

   public function edit_user($id)
   {
      //Verify if there is logged in user! Else redirect to login
      if ( ! session()->get('id')) { return redirect()->to(rdrctn()); }

      $systemRoles = new UserrolesModel();
      $getAllRoles = $systemRoles->where('id !=',' 1')->findAll();

      $usersModel = new UsersModel();
      $getUserDataForUpdate = $usersModel->where('id', $id)->first();

      $data['nav_id'] = '11';
      $data['pageTitle'] = "Users - Edit";
      $data['systemConfiguration'] = $this->systemConfiguration;
      $data['account'] = $this->user;
      $data['getAllRoles'] = $getAllRoles;
      $data['getUserDataForUpdate'] = $getUserDataForUpdate;

      return view('Modules\Users\Views\edit', $data);
   }

   public function user_profile()
   {
      //Verify if there is logged in user! Else redirect to login
      if ( ! session()->get('id')) { return redirect()->to(rdrctn()); }

      $systemRoles = new UserrolesModel();
      $getAllRoles = $systemRoles->where('id !=',' 1')->findAll();

      $usersModel = new UsersModel();
      $getUserDataForUpdate = $usersModel->where('id', session()->get('id'))->first();

      $data['nav_id'] = '11';
      $data['pageTitle'] = "Users - Profile";
      $data['systemConfiguration'] = $this->systemConfiguration;
      $data['account'] = $this->user;
      $data['getAllRoles'] = $getAllRoles;
      $data['getUserDataForUpdate'] = $getUserDataForUpdate;

      return view('Modules\Users\Views\profile', $data);
   }

   private function setUserSession($user)
   {
      $data = [
      	'id'        => $user['id'],
      	'firstname' => $user['first_name'],
      	'lastname'  => $user['last_name'],
         'email'     => $user['email'],
         'username'  => $user['username'],
         'role'      => $user['role']
      ];

      session()->set($data);
      return true;
   }
   
   public function logout()
   {
      session()->destroy();
      
		return redirect()->to(rdrctn());
   }
   /**
    * Text Return Request
    */
   function getallusers()
   {
      $systemRoles = new UserrolesModel();
      $getAllRoles = $systemRoles->findAll();
      $indexArrRoles = array();
      foreach ($getAllRoles as $rowRoles)
      {
         $indexArrRoles[$rowRoles['id']] = $rowRoles['name'];
      }

      $usersModel = new UsersModel();
      $userLists = $usersModel->where('id !=', '1')->where('id !=', session()->get('id'))->findAll();

      $dataTables = array();
      $ctr = 1;
      
      if (count($userLists) > 0)
      {
         foreach ($userLists as $row) 
         {
            $dataTables[] = array(
               'id'        => $row['id'],
               'name'      => $row['first_name'].' '.$row['last_name'],
               'email'     => $row['username'],
               'contactno' => $row['phone'],
               'position'  => $row['title'],
               'role'      => $indexArrRoles[$row['role']],
               'actions'   => '<a href="'.base_url('/admin/users/edit_user/'.$row['id']).'" class="btn btn-'.$this->systemConfiguration['theme'].'" style="margin-bottom: 2px" title="Edit User"><i class="mdi mdi-pencil"></i></a>
                  <button type="button" onclick="reset_account('.$row['id'].')" class="btn btn-'.$this->systemConfiguration['theme'].'" title="Reset User Account"><i class="mdi mdi-lock-open"></i></button>'
            );

            $ctr++;
         }
      }

		echo json_encode(array("data" => $dataTables));
   }

   function saveuser()
   {
      $ProfilePhotoHolder = $this->request->getPost('ProfilePhotoHolder');
      $FirstName = $this->request->getPost('FirstName');
      $LastName = $this->request->getPost('LastName');
      $Username = $this->request->getPost('Email');
      $Phone = $this->request->getPost('Phone');
      $Position = $this->request->getPost('Position');
      $StaffID = $this->request->getPost('StaffID');
      $Role = $this->request->getPost('Role');
      $TemporaryPassword = generaterandomstring();

      $usersModel = new UsersModel();
      $validateEmailIfExists = $usersModel->where('username', $Username)->first();

      if (!empty($validateEmailIfExists))
      {
         echo "duplicate";  
      } else {
         //Save to Database
         $parameter = array(
            'username'     => $Username,
            'password'     => hashpassword($TemporaryPassword),
            'email'        => $Username,
            'first_name'   => $FirstName,
            'last_name'    => $LastName,
            'title'        => $Position,
            'phone'        => $Phone,
            'photo'        => $ProfilePhotoHolder,
            'staff_id'     => $StaffID,
            'role'         => $Role,
            'created_on'   => time()
         );

         $qryInsert = $usersModel->insert($parameter);
         if ($qryInsert)
         {
            if ($this->systemConfiguration['smtp_is_active'] == '1')
            {
               $html = "<html>";
                  $html .= "<body>";
                     $html .= "<h4>Hi ".$FirstName." ".$LastName."!</h4>";
                     $html .= "<p>Welcome to Generic CMS platform!</p>";
                     $html .= "<p>";
                        $html .= "You may access the CMS portal through this <a href='".base_url()."/admin/'>link</a>.<br/>";
                        $html .= "Your username is: ".$Username." and your temporary password is: ".$TemporaryPassword.".<br/>";
                        $html .= "It is important to change your temporary password upon your initial login for security purposes.";
                     $html .= "</p>";
                     $html .= "<p>Kind regards,</p>";
                     $html .= "<h4>Generic CMS Admin</h4>";
                  $html .= "</body>";
               $html .= "</html>";

               $To_Name = $FirstName.' '.$LastName;
               $Subject = 'Welcome to Generic Content Management System Platform';

               if (custom_email_sending($html, $Username, $To_Name, $Subject, '', ''))
               {
                  echo "ok";
               } else {
                  $get_last_inserted_id = $usersModel->getInsertID();

                  $delete_last_inserted_id = $usersModel->delete($get_last_inserted_id);

                  if ($delete_last_inserted_id)
                  {
                     echo "email_error";
                  }
               }
            } else {
               echo "ok|".$LastName."'s Temporary Password is: ".$TemporaryPassword;
            }
         }
      }
   }

   function updateuser()
   {
      $ProfilePhotoHolder = $this->request->getPost('ProfilePhotoHolder');
      $FirstName = $this->request->getPost('FirstName');
      $LastName = $this->request->getPost('LastName');
      $Username = $this->request->getPost('Email');
      $Phone = $this->request->getPost('Phone');
      $Position = $this->request->getPost('Position');
      $StaffID = $this->request->getPost('StaffID');
      $Role = $this->request->getPost('Role');
      $UserID = $this->request->getPost('UserID');

      $usersModel = new UsersModel();
      $validateEmailIfExists = $usersModel->where('username', $Username)->where('id !=', $UserID)->first();

      if (!empty($validateEmailIfExists))
      {
         echo "duplicate";  
      } else {
         $parameter = array(
            'username'     => $Username,
            'email'        => $Username,
            'first_name'   => $FirstName,
            'last_name'    => $LastName,
            'title'        => $Position,
            'phone'        => $Phone,
            'photo'        => $ProfilePhotoHolder,
            'staff_id'     => $StaffID,
            'role'         => $Role
         );

         $userSaveToDatabase = $usersModel->update($UserID, $parameter);

         if ($userSaveToDatabase)
         {
            echo "ok";
         }
      }
   }

   function updateuserprofile()
   {
      $ProfilePhotoHolder = $this->request->getPost('ProfilePhotoHolder');
      $FirstName = $this->request->getPost('FirstName');
      $LastName = $this->request->getPost('LastName');
      $Phone = $this->request->getPost('Phone');
      $UserID = $this->request->getPost('UserID');

      $usersModel = new UsersModel();

      $parameter = array(
                     'first_name'   => $FirstName,
                     'last_name'    => $LastName,
                     'phone'        => $Phone,
                     'photo'        => $ProfilePhotoHolder
                  );

      $userSaveToDatabase = $usersModel->update($UserID, $parameter);

      if ($userSaveToDatabase)
      {
         echo "ok";
      }
   }

   function updateuserchangepassword()
   {
      $OldPassword = $this->request->getPost('OldPassword');
      $NewPassword = $this->request->getPost('NewPassword');
      $UserID = $this->request->getPost('UserID');

      $usersModel = new UsersModel();
      $validatePassword = $usersModel->where('password', hashpassword($OldPassword))->first();

      if ($validatePassword)
      {
         $parameter = array('password' => hashpassword($NewPassword));

         $updatePassword = $usersModel->update($UserID, $parameter);

         if ($updatePassword)
         {
            echo "ok";
         }
      } else {
         echo "invalidpassword";
      }
   }

   function resetaccountbyid()
   {
      $UserID = $this->request->getPost('id');
      $TemporaryPassword = generaterandomstring();

      $usersModel = new UsersModel();

      $parameter = array(
         'password'     => hashpassword($TemporaryPassword),
      );

      $qryInsert = $usersModel->update($UserID, $parameter);
      if ($qryInsert)
      {
         $getUserDataByID = $usersModel->where('id', $UserID)->first();

         if ($this->systemConfiguration['smtp_is_active'] == '1')
         {
            $html = "<html>";
               $html .= "<body>";
                  $html .= "<h4>Hi ".$getUserDataByID['first_name']." ".$getUserDataByID['last_name']."!</h4>";
                  $html .= "<p>Your Account Has Been Successfully Reset!</p>";
                  $html .= "<p>";
                     $html .= "You may access the CMS portal through this <a href='".base_url()."/admin/'>link</a>.<br/>";
                     $html .= "Your username is: ".$getUserDataByID['username']." and your temporary password is: ".$TemporaryPassword.".<br/>";
                     $html .= "It is important to change your temporary password upon your initial login for security purposes.";
                  $html .= "</p>";
                  $html .= "<p>Kind regards,</p>";
                  $html .= "<h4>Generic CMS Admin</h4>";
               $html .= "</body>";
            $html .= "</html>";

            $To_Name = $getUserDataByID['first_name'].' '.$getUserDataByID['last_name'];
            $Subject = 'Generic CMS Account Reset';

            if (custom_email_sending($html, $getUserDataByID['username'], $To_Name, $Subject, '', ''))
            {
               echo "ok";
            } else {
               echo "email_error";
            }
         } else {
            echo "ok|".$getUserDataByID['last_name']."'s Temporary Password is: ".$TemporaryPassword;
         }
      }
   }
 }

