<?php
namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends BaseController
{
    private $producttable = '';
    private $newData = '';
    public function __construct()
    {
        $this->producttable = new ProductModel();
        
        // if (!$this->isUserLoggedIn()) {
        //     // Redirect to login controller
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
        $data['records'] = $this->producttable->findAll();
        return view('product', $data);

    }
    public function updateProduct(){
        $session= session();
        $session->setFlashdata('msg', 'Product updates successfully');
        $data = [
            'image_link' => $this->request->getPost('a_image_link'),
            'description' => $this->request->getPost('a_image_description'),
        ];
        $condition = [
            'id' => $this->request->getPost('id'),
        ];

        $this->producttable->update($condition, $data);

        return redirect()->to(base_url('product'));
    }
    public function addProduct()
    {
        // echo "<pre>";print_r($_POST);exit;
        $session = session();
        $session->setFlashdata('msg', 'Product added successfully');
        $data = [

            'image_link' => $this->request->getPost('a_image_link'), // Use actual post data
            'description' => $this->request->getPost('a_image_description'), // Use actual post data
        ];
        // Debugging



        $this->producttable->save($data);
        echo session()->getFlashdata('msg');
        return redirect()->to(base_url('product'));
    }
    public function deleteProduct($id)
    {
        $session = session();
        if(session()->get('user_id')==''){
            return redirect()->to(base_url('/'));
        }

        // Use the find method to get the record by ID
        $slider = $this->producttable->find($id);

        // Check if the record exists
        if ($slider) {
            // Delete the record
            $this->producttable->delete($id);
            $session->setFlashdata('msg', 'Product deleted successfully');
        } else {
            $session->setFlashdata('msg', 'Product not found');
        }
        echo session()->getFlashdata('msg');
        

        return redirect()->to(base_url('product'));
    }
    


}