<?php
namespace App\Controllers;


use CodeIgniter\Controller;
class DashBoardController extends Controller{
    public function __construct()
    {
        
      
        
    }
    public function index(){
         
        if (!$this->isUserLoggedIn()) {
            // Redirect to login controller
            return redirect()->to(base_url('/'));
        }else{
            return redirect()->to(base_url('header'));
        }
    }
    private function isUserLoggedIn()
    {
        // Implement your logic to check if the user is logged in
        // You can use session data or any other method to perform this check
        return session()->get('user_id');
    }
    
}