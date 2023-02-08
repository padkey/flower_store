<?php
class CheckoutController extends BaseController{
    //thêm order vào database
    public function index(){

        $this->view('frontend.checkout.index');
    }
    public function store(){
        print_r($_POST);
    }
}