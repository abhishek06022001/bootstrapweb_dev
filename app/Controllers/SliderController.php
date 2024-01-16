<?php
namespace App\Controllers;

use App\Models\SliderModel;
use CodeIgniter\Controller;

class SliderController extends Controller
{
    private $slidertable = '';
    public function __construct()
    {
       
        $this->slidertable = new SliderModel();
        
        
        // if(!$this->isUserLoggedIn()){
        //     return redirect()->to(base_url('/'));
        // }
        
    }
        

    

    public function index()
    {
        $session = session();
        if(session()->get('user_id')==''){
            return redirect()->to(base_url('/'));
        }
        $session->setFlashdata('msg', '');
        $data['records'] = $this->slidertable->findAll();
        return view('slidertable', $data);

    }
    public function addSlider()
    {

        $session = session();
        $session->setFlashdata('msg', 'Slider added successfully');
        $data = [

            'id' => $this->request->getPost('id'),
            'image_link' => $this->request->getPost('image_link'),
        ];
        $this->slidertable->save($data);
        echo session()->getFlashdata('msg');
        return redirect()->to(base_url('slidertable'));
    }
    public function updateSlider()
    {

        $session = session();
        $session->setFlashdata('msg', 'Slider updated successfully');

        $data = [
            'image_link' => $this->request->getPost('image_link'),
        ];

        $condition = [
            'id' => $this->request->getPost('id'),
        ];

        $this->slidertable->update($condition, $data);

        return redirect()->to(base_url('slidertable'));
    }
    public function deleteSlider($id)
    {
        $session = session();
        if(session()->get('user_id')==''){
            return redirect()->to(base_url('/'));
        }

        // Use the find method to get the record by ID
        $slider = $this->slidertable->find($id);

        // Check if the record exists
        if ($slider) {
            // Delete the record
            $this->slidertable->delete($id);
            $session->setFlashdata('msg', 'Slider deleted successfully');
        } else {
            $session->setFlashdata('msg', 'Slider not found');
        }

        return redirect()->to(base_url('slidertable'));
    }
    private function isUserLoggedIn()
    {
        // Implement your logic to check if the user is logged in
        // You can use session data or any other method to perform this check
        return session()->get('user_id');
    }


}