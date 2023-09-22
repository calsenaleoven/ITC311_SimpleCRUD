<?php
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    private $product;
    private $category;
    public function __construct(){

        $this->product = new ProductModel();
        $this->category = new CategoryModel();

    }

    // show product list
    public function index()
{
    $session = session();
    $data['products'] = $this->product->orderBy('id', 'DESC')->findAll();
    $data['categories'] = $this->category->findAll();

    return view('products', $data);
}

    // insert data
    public function store() {

        $data = [
            'ProductName' => $this->request->getVar('ProductName'),
            'ProductDescription'  => $this->request->getVar('ProductDescription'),
            'ProductCategory'  => $this->request->getVar('ProductCategory'),
            'ProductQuantity'  => $this->request->getVar('ProductQuantity'),
            'ProductPrice'  => $this->request->getVar('ProductPrice'),
        ];

        $this->product->insert($data);
        $session = session();
        $session->setFlashdata('msg', 'Product Successfully Added');
        return $this->response->redirect(site_url('/list'));
    }

    // show product by id
    public function edit($id){

        $data['product'] = $this->product->where('id', $id)->first();
        echo json_encode($data['product']);
    }

    // update product data
    public function update(){

         $id = $this->request->getVar('id');
        $data = [
            'ProductName' => $this->request->getVar('ProductName'),
            'ProductDescription'  => $this->request->getVar('ProductDescription'),
            'ProductCategory'  => $this->request->getVar('ProductCategory'),
            'ProductQuantity'  => $this->request->getVar('ProductQuantity'),
            'ProductPrice'  => $this->request->getVar('ProductPrice'),
        ];
        $this->product->update($id, $data);
        return $this->response->redirect(site_url('/list'));
    }

     // delete product
     public function delete(){

        $id = $this->request->getVar('id');
        $data['product'] = $this->product->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/list'));
    }

}
