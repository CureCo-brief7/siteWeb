<?php
class Admin extends Controller
{
    private $adminModel;
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => $_POST['userEmail'],
                'password' => $_POST['userPassword'],
                'email_err' => '',
                'password_err' => ''
            ];
            // check if email exist
            if (!$this->adminModel->getUserByEmail($data['email'])) {
                $data['email_err'] = 'User not exist';
            }
            if (empty($data['email']))
                $data['email_err'] = 'Please enter email';
            if (empty($data['password']))
                $data['password_err'] = 'Please enter password';

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $user = $this->adminModel->login($data['email'], $data['password']);
                if ($user) {
                    // set The sessions
                    $_SESSION['user_id'] = $user->id_u;
                    $_SESSION['user_name'] = $user->userName;
                    redirect('Admin/dashboard');
                } else {
                    // password incorrect
                    $data['password_err'] = 'Password Incorrect';
                    $this->view('Admin/index', $data);
                }
            } else {
                // user register failed
                $this->view('Admin/index', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm-password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm-password_err' => ''
            ];

            // load the register
            $this->view('Admin/index', $data);
        }
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => $_POST['userName'],
                'email' => $_POST['userEmail'],
                'password' => $_POST['userPassword'],
                'confirm-password' => $_POST['userConfirmPassword'],
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm-password_err' => ''
            ];
            if (empty($data['name']))
                $data['name_err'] = 'Please enter name';
            if (empty($data['email']))
                $data['email_err'] = 'Please enter email';
            if (empty($data['password']))
                $data['password_err'] = 'Please enter password';
            if ($data['confirm-password'] !== $data['password'])
                $data['confirm-password_err'] = 'Passwords don\'t match';
            if (empty($data['confirm-password']))
                $data['confirm-password_err'] = 'Please enter confirm password';
            // check if email exist
            if ($this->adminModel->getUserByEmail($data['email'])) {
                $data['email_err'] = 'Email exist';
            }
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm-password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // user register success
                if ($this->adminModel->register($data['name'], $data['email'], $data['password'])) {
                    // user added successfully
                    redirect('Admin/index');
                } else {
                    // user not added successfully
                    die('something went wrong!!');
                }

            } else {
                // user register failed
                $this->view('Admin/register', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm-password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm-password_err' => ''
            ];

            // load the register
            $this->view('Admin/register', $data);
        }
    }
    public function logout()
    {
        $_SESSION['users_id'] = null;
        $_SESSION['name'] = null;
        session_destroy();
        redirect('Admin/index');
    }
    public function dashboard()
    {
        if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
            redirect('admins');
        } else {
            if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
                $loginLogout = [
                    'loginLogout' => 'admin',
                    'name' => 'login'
                ];
            } else {
                $loginLogout = [
                    'loginLogout' => 'admin/logout',
                    'name' => 'logout'
                ];
            }
            $member = $this->adminModel->countItems('id_u', 'users');
            $product = $this->adminModel->countItems('id_p', 'product');
            $MinPrix = $this->adminModel->getPrix('ASC');
            $MaxPrix = $this->adminModel->getPrix('DESC');
            $sommePrice = $this->adminModel->sumPrice();
            $data2 = [
                'usersMember' => $member,
                'productMember' => $product,
                'MinPrix' => $MinPrix,
                'MaxPrix' => $MaxPrix,
                'Price' => $sommePrice
            ];
            $this->view('admin/dashboard', $loginLogout, $data2);
        }
    }
    public function member()
    {
        if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
            redirect('admins');
        } else {

            if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
                $loginLogout = [
                    'loginLogout' => 'admin',
                    'name' => 'login'
                ];
            } else {
                $loginLogout = [
                    'loginLogout' => 'admin/logout',
                    'name' => 'logout'
                ];
            }
            $users = $this->adminModel->getUsers();
            $data2 = [
                'users' => $users
            ];
            $this->view('admin/member', $loginLogout, $data2);
        }
    }
    public function product()
    {
        if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
            redirect('admins');
        } else {
            $products = $this->adminModel->getProducts();
            $data2 = [
                'products' => $products
            ];
            if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
                $loginLogout = [
                    'loginLogout' => 'admin',
                    'name' => 'login'
                ];
            } else {
                $loginLogout = [
                    'loginLogout' => 'admin/logout',
                    'name' => 'logout'
                ];
            }
            $this->view('admin/product', $loginLogout,$data2);
        }
    }
    public function userProduct($id)
    {
        if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
            redirect('admins');
        } else {
            $products = $this->adminModel->getProductByIdUser($id);
            $data2 = [
                'Products' => $products
            ];
            if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
                $loginLogout = [
                    'loginLogout' => 'admin',
                    'name' => 'login'
                ];
            } else {
                $loginLogout = [
                    'loginLogout' => 'admin/logout',
                    'name' => 'logout'
                ];
            }
            $this->view('admin/userProduct', $loginLogout, $data2);
        }

    }
    public function userEdit($id)
    {
        echo $id;
    }
    public function userDelete($id)
    {
        echo $id;
    }
    public function productAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $name = $_POST['Name'];
            $Prix = $_POST['Prix'];
            $Quantity = $_POST['Quantity'];
            $Description = $_POST['Description'];
            $Image = $_POST['Image'];
                $this->adminModel->addProduct($name, $Prix, $Quantity, $Description, $Image);
            redirectHome('back');
        } else {
            if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
                redirect('admins');
            } else {
                if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
                    $loginLogout = [
                        'loginLogout' => 'admin',
                        'name' => 'login'
                    ];
                } else {
                    $loginLogout = [
                        'loginLogout' => 'admin/logout',
                        'name' => 'logout'
                    ];
                }
                $this->view('admin/productAdd', $loginLogout);
            }
        }
    }
    public function productEdit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $name = $_POST['Name'];
            $Prix = $_POST['Prix'];
            $Quantity = $_POST['Quantity'];
            $Description = $_POST['Description'];
            $Image = $_POST['Image'];
            if (empty($Image) || $Image == '') {
                $this->adminModel->updateProductSansImage($name, $Prix, $Quantity, $Description, $id);
            } else {
                $this->adminModel->updateProduct($name, $Prix, $Quantity, $Description, $Image, $id);
            }
            redirectHome('back');
            
        } else {
            if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
                redirect('admins');
            } else {
                $product = $this->adminModel->getProduct($id);
                $data2 = [
                    'Product' => $product
                ];
                if ($_SESSION['user_id'] == null || empty($_SESSION['user_id']) || $_SESSION['user_id'] == ' ') {
                    $loginLogout = [
                        'loginLogout' => 'admin',
                        'name' => 'login'
                    ];
                } else {
                    $loginLogout = [
                        'loginLogout' => 'admin/logout',
                        'name' => 'logout'
                    ];
                }
                $this->view('admin/productEdit', $loginLogout, $data2);
            }
        }
    }
    public function productDelete($id)
    {
        $this->adminModel->deleteProduct($id);
        redirectHome('back');
    }
    public function showProduct($id)
    {
        echo $id;
    }
}