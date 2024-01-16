<?php
namespace App\Controllers;

use App\Models\HeaderModel;
use App\Models\LoginModel;
use CodeIgniter\Controller;

class HeaderController extends BaseController
{
    private $header = '';
    public function __construct()
    {
        
        $this->header = new HeaderModel();
        $this->login = new LoginModel();
    }
    
    private function isUserLoggedIn()
    {
        // Implement your logic to check if the user is logged in
        // You can use session data or any other method to perform this check
        return session()->get('user_id');
    }

    public function index()
    {
        $session = session();
        if(session()->get('user_id')==''){
            return redirect()->to(base_url('/'));
        }
        
        $session->setFlashdata('msg', '');
        $data['records'] = $this->header->findAll();
      
        return view('header', $data);

    }
    public function addHeader()
    {
        
        
        $session = session();
       
        $session->setFlashdata('msg', 'Header added successfully');
        $data = [

            'id' => $this->request->getPost('id'), // Use actual post data
            'header_top' => $this->request->getPost('header_top'), // Use actual post data
            'header_description' => $this->request->getPost('header_description'), // Use actual post data
           
           
        ];
        // Debugging



        $this->header->save($data);
        echo session()->getFlashdata('msg');
        return redirect()->to(base_url('header'));
    }
    //delete

    public function deleteHeader($id)
    {
        $session= session();
        if(session()->get('user_id')==''){
            return redirect()->to(base_url('/'));
        }
       
        $header= $this->header->find($id);
        if ($header) {
            // Delete the record
            $this->header->delete($id);
            $session->setFlashdata('msg', 'Header deleted successfully');
        } else {
            $session->setFlashdata('msg', 'Header not found');
        }

        return redirect()->to(base_url('header'));


      
    }
    public function updateHeader(){
        
        $session = session();
      
        $session->setFlashdata('msg', 'Header updated successfully');

        $data = [
            'header_top' => $this->request->getPost('header_top'),
            'header_description' => $this->request->getPost('header_description'),
        ];

        $condition = [
            'id' => $this->request->getPost('id'),
        ];

        $this->header->update($condition, $data);

        return redirect()->to(base_url('header'));

    }

   

}