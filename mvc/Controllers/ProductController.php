<?php
    class ProductController extends BaseController{
        private $productModel;
        //include  folder Model - Product
        // ta đặt vào construct để khỏi phải khai báo nhiều lần
        public function __construct()
        {
            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
        }

        /* xài dấu chấm thay dấu / để quen cách viets của laravel */
        public function index(){
            $selectColumns = ['product_id','product_name'];
            $order =[
              'column' => 'product_id',
              'order'=>'desc'
            ];
        $product= $this->productModel->getAll($selectColumns,$order);
          return $this->view('frontend.products.index',['product' => $product]);  /*include "./Views/frontend/products/index.php"; */
        }
        //insert dữ liệu
        public function store(){
            $data = [
                'product_id'=>4,
                'product_name'=>'Hoa Lan',
                'price'=>5000,
                'product_description'=>'Noi dung 4'
            ];
            $this->productModel->store($data);
        }

        //hàm update dữ liệu
        public function update(){
            $id = $_GET['id'];
            $data = [
                'product_id'=>4,
                'product_name'=>'Hoa Lay ơn',
                'price'=>5000,
                'product_description'=>'Noi dung 4'
            ];
            $this->productModel->updateData($id,$data);
        }

        public function delete(){
            //lấy id trên url
            $id= $_GET['id'] ?? null;
            $this->productModel->destroy($id);

            echo "Xóa thành công";
        }
        public function show(){
            $id= $_GET['id'];
            //tìm id của product và show ra tất cả dử liệu của product đó
            $products = $this->productModel->findById($id);
            $productsRelated = $this->productModel->findProductRelated($id);
            $this->view('frontend.products.index',
                ['products'=>$products,
                  'productsRelated'=>  $productsRelated,
                ]);

        }
    }
?>