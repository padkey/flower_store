<?php
class CustomerController extends BaseController{
    private $customerModel;
    public function __construct(){
        $this->loadModel('CustomerModel');
        $this->customerModel = new CustomerModel;
    }
    public function login_page(){
        // check có đang login hay không.
        if(isset($_SESSION["customer_id"])) {}
        else{
            // nếu chưa
            $actionlogin = "index.php?controller=customer&action=login";
            $this->view("frontend.customers.login",['actionlogin'=> $actionlogin]);
        }



        // logined
        //
    }
    public function login(){
        //đường dẫn của login
        $actionlogin = "index.php?controller=customer&action=login";

        //lấy giá trị người dùng nhập vào form
        $username = $_POST["username"];
        $password = $_POST["password"];

        //nếu người dùng không nhập password hoặc username
        if(empty($username) || empty($password)){
            //báo động
            $alert = "Không được để trống tài khoản hoặc mật khẩu";


           return $this->view("frontend.customers.login",[
               'alert'=> $alert,
               'actionlogin'=>$actionlogin
               ]);
        }
        else{

            //truy vấn tìm ra thông tim người dùng
            $loginData= $this->customerModel->login($username,$password);

            //nếu $loginData select ra dữ liệu
            if($loginData != false){

                // customer loggin success
                $_SESSION["customer_id"] =  $loginData['customer_id'];
                $_SESSION["customer_name"] = $loginData['customer_firstname'];

                //check xem có phải admin không
                $checkAdmin= $this->customerModel->checkAdmin($_SESSION["customer_id"]);

                if($checkAdmin  == 1){
                    header('location:index.php?controller=HomeAdmin&action=index');
                    return;
                }

                // Kiem tra cart . nếu người dùng đăng nhập chưa có giỏ hàng hoặc có rồi mà trạng thái đã thanh toán thì ta tạo mới thêm cái giỏ hàng ở trạng thái chưa thanh toán
                $checkCart = $this->customerModel->checkCart($_SESSION['customer_id']);


                //nếu đúng hết thì ta quay về home , header là hàm điều hướng trang
                header('location:index.php?controller=home&action=index');
            }else{
                //Không ra dữ liệu thì
                $alert = "Tài khoản hoặc mật khẩu không đúng";
                return $this->view("frontend.customers.login",[
                    'alert'=> $alert,
                    'actionlogin'=>$actionlogin
                ]);
            }
        }




    }

    //đăng xuất
    public function logout(){
        session_destroy();
        header('location:index.php?controller=home&action=index');
    }


    //Đăng Kí
    public function register_page(){
        $actionRegister ="index.php?controller=customer&action=register";
            $this->view("frontend.customers.register",[
                'actionRegister'=>$actionRegister,
            ]);
    }

    //xử lý đăng kí
    public function register(){
        $actionRegister = "index.php?controller=customer&action=register";
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repeatPassword = $_POST['repeatpassword'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            // kiểm tra các ô nhập vào không được để trống
            if($username==''||$password==''||$repeatPassword==''||$firstname==''||$lastname==''){
                $alert = "Không được để trống";
                return $this->view("frontend.customers.register",[
                    'alert'=> $alert,
                    'actionRegister'=>$actionRegister
                ]);
            }else{
                if($password != $repeatPassword){
                    $alert = "Mật khẩu không trùng khớp";
                    return $this->view("frontend.customers.register",[
                        'alert'=> $alert,
                        'actionRegister'=>$actionRegister
                    ]);
                }else{
                    //truy vấn tìm coi đã  tồn tại  username chưa
                    $checkusername = $this->customerModel->select($username);

                    if($checkusername == true){
                        $alert = "Tài khoản này đã tồn tại ";
                        return $this->view("frontend.customers.register",[
                            'alert'=> $alert,
                            'actionRegister'=>$actionRegister
                        ]);
                    }else{
                        $addAccount = $this->customerModel->insert($username,$password,$firstname,$lastname);
                        $alert = "Tạo tài khoản thành công";
                        return $this->view("frontend.customers.register",[
                            'alert'=> $alert,
                            'actionRegister'=>$actionRegister
                        ]);
                    }
                }
            }

        }


        }


}
?>