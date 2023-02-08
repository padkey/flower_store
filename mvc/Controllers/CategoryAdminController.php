<?php
class CategoryAdminController extends BaseController {
    protected $categoryModel;
    protected $productModel;
    protected $orderModel;
    protected $customerModel;
    public function __construct()
    {
        $this->loadModel('CustomerModel');
        $this->loadModel('ProductModel');
        $this->loadModel('OrderModel');
        $this->loadModel('CategoryModel');

        $this->customerModel = new CustomerModel;
        $this->productModel = new ProductModel;
        $this->categoryModel = new CategoryModel;
        $this->customerModel = new CustomerModel;
    }

    public function index(){


    }
  public function addCategory(){
        $this->view("admin.category.edit_category");
  }
    public function saveCategory(){
        $name = $_POST['category_name'];
        $parent_id = $_POST['parent_id'];
        $this->categoryModel->save($name,$parent_id);
        if($parent_id == 0){
            header('location:index.php?controller=CategoryAdmin&action=manageCategoryParent');
        }
       else{
           header('location:index.php?controller=CategoryAdmin&action=manageCategoryChild');
       }
    }
/*-----------------------Parent---------------------------*/
    public function manageCategoryParent(){
        $parent_id = 0;
        $parents = $this->categoryModel->getAll($parent_id);
        $this->view("admin.category.index",[
            'parents'=>$parents
        ]);
    }
    public function deleteCategoryParent(){
        $id = $_GET['id'];
        $tableCategoryName = "category";
        $idName = "category_id";
        $tableProName="product";
        $this->categoryModel->AdminDeleteCategory($tableCategoryName,$idName,$id,$tableProName);
        header('location:index.php?controller=CategoryAdmin&action=manageCategoryParent');
    }
/*-----------------------Child------------------------*/
    public function manageCategoryChild(){
        $childs = $this->categoryModel->getAllChild();
        $this->view("admin.category.index",[
            'childs'=>$childs
        ]);
    }
    public function deleteCategoryChild(){
        $id = $_GET['id'];
        $tableCategoryName = "category";
        $idName = "category_id";
        $tableProName="product";
        $this->categoryModel->AdminDeleteCategory($tableCategoryName,$idName,$id,$tableProName);
        header('location:index.php?controller=CategoryAdmin&action=manageCategoryChild');
    }
}