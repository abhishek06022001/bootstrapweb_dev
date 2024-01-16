<?php
namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

// class LoginController extends Controller
// {

//     private $login = '';
//     private $is_login = false;
//     public function __construct()
//     {

//         $this->login = new LoginModel();
//     }
//     // show login form
//     public function index()
//     {
//         //     $session = session();  
//         //     $session->setFlashdata('msg', '');
//         //  return view('main_login');
//         $session = session();  
//         $user1= $this->login;
//         if ($user1) {
//             return view('login_boot');
//         } else {
//             echo session()->getFlashdata('msg');
//             return view('main_login');
//         }


//     }


//     public function login()
//     {


//         $session = session();
//         $is_login = true;
//         $session->setFlashdata('msg', 'Invalid User');
//         $data = array(
//             'username' => $this->request->getVar('username'),
//             'password' => $this->request->getVar('password')
//         );

//         $user = $this->login->where($data)->first();

//         if ($user) {
//             return view('main_login');
//         } else {
//             echo session()->getFlashdata('msg');
//             return view('login_boot');
//         }

//     }
//     public function logout()
//     {

//         session_destroy();
//         $is_login = false;
//         return redirect()->to(base_url('login'));

//     }


// }


/// CODE THAT IS CAUSING ERROR 



class LoginController extends Controller
{
    private $login = '';
   

    public function __construct()
    {
        $this->login = new LoginModel();
        
        
    }

    public function index()
    {
        $session = session();
        
       
        if (!$this->isUserLoggedIn()) {
           
            return view('main_login');
        }else{
            return redirect()->to(base_url('header'));
        }
    }

    public function login()
    {
        
        $session = session();
        $session->setFlashdata('msg', 'Invalid User');

        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ];
         
        $user = $this->login->where($data)->first();
        if ($user) {
            $session_data = array(
                'user_id' =>  $user['id'],
                'username' => $user['username'],
                'logged_in' => TRUE
            );
           
            session()->set($session_data);
            return redirect()->to('dashboard');
           
        } else {
            echo session()->getFlashdata('msg');
            return view('main_login');
        }
    }

    public function logout()
    {
        $session = session();
        session_destroy();
       
        return $this->index();
    }
    private function isUserLoggedIn()
    {
        // Implement your logic to check if the user is logged in
        // You can use session data or any other method to perform this check
        return session()->get('user_id');
    }
}
