<?php 
class HomeControl extends Controller{
    private $homeModel;
    public function __construct(){
        $this->homeModel = $this->model('Home');
    }
    public function index()
    {
        error_reporting(0);
        $products = $this->homeModel->getProducts();
        $data2 = [
            'products' => $products
        ];
        if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) ||$_SESSION['user_id'] == ' ' ) {
            $loginLogout = [
                'loginLogout' => 'users/login',
                'name' => 'login'
            ];
        }else{
            $loginLogout = [
                'loginLogout' => 'users/logout',
                'name' => 'logout'
            ];
        }
        $this->view('HomePage',$loginLogout,$data2);
    }
    public function Contact()
    {
        error_reporting(0);
        if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) ||$_SESSION['user_id'] == ' ' ) {
            $loginLogout = [
                'loginLogout' => 'users/login',
                'name' => 'login'
            ];
        }else{
            $loginLogout = [
                'loginLogout' => 'users/logout',
                'name' => 'logout'
            ];
        }
        $this->view('Contact',$loginLogout);
    }
}