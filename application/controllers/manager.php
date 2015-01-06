<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $controller = $this->router->fetch_class();
        $action = $this->router->fetch_method();
        $this->user_manager->retaurant_authenticate(mybase64_encode($controller . '/' . $action));
    }

    public function setting() {
        $this->user_manager->authenticate();
        $this->load->model('user_model', 'user');
        $this->data['userInfo'] = $this->user->getUserById($this->auth['us_id']);
        $this->load('front_layout', 'setting');
    }

    public function supplier() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('front_layout', 'manager/supplier');
    }

    public function update_supplier($id = 0) {
        $this->load->model('supplier_model', 'supplier');
        $this->load->library('setting_manager');
        $dataSupplier = array();
        if ($id != 0) {
            $dataSupplier = array(
                'id' => $id,
                'user_id' => $this->auth['id']
            );
            $supplier = $this->supplier->getSupplier($dataSupplier);
            if (empty($supplier))
                redirect('manager/update_supplier');
            $dataSupplier = array(
                'name' => $supplier['name'],
                'phone' => $supplier['phone'],
                'fax' => $supplier['fax'],
                'email' => $supplier['email'],
                'order_submission_method' => $supplier['order_submission_method'],
            );
        }
        $posts = $this->input->post();
        if ($posts) {
            $dataSupplier = $posts;
            $validate = $this->setting_manager->supplierValidate($dataSupplier, $id);
            if (empty($validate)) {
                if (!empty($id)) {
                    $this->supplier->update($dataSupplier, $id);
                    $this->session->set_flashdata('success', 'Update suplier success');
                    redirect('manager/supplier');
                } else {
                    $dataSupplier['user_id'] = $this->auth['id'];
                    $this->supplier->insert($dataSupplier);
                    $this->session->set_flashdata('success', 'Insert suplier success');
                    redirect('manager/supplier');
                }
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['id'] = $id;
        $this->data['supplier'] = $dataSupplier;
        $this->load('front_layout', 'manager/update_supplier');
    }

    public function upload_supplier_csv() {
        $this->load->model('supplier_model', 'supplier');
        $this->load->library('setting_manager');
        $posts = $this->input->post();
        if ($posts) {
            $file = $_FILES['csv'];
            $validate = $this->setting_manager->validateSupplierCsv($file);
            if (!empty($validate)) {
                $this->data['data_error'] = $validate;
            } else {
                $this->setting_manager->uploadSupplier($file);

                $this->session->set_flashdata('success', 'Insert supplier success');
                redirect('manager/supplier');
            }
        }
        $this->load('front_layout', 'manager/upload_supplier_csv');
    }

    public function delete_supplier() {
        $this->load->model('supplier_model', 'supplier');
        $this->load->model('product_model', 'product');
        $id = $this->input->post('id');
        if (!empty($id)) {
            $dataDelete = array(
                'id' => $id,
                'user_id' => $this->auth['id']
            );
            $this->supplier->delete($dataDelete);
            $this->product->delete(array('supplier_id' => $id));
        }
    }

    public function ajax_list_supplier() {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('supplier_model', 'supplier');

        $dataWhere = 'user_id = ' . $this->auth['id'];
        if (!empty($search)) {
            $dataWhere .= " AND (name  like '%{$search}%' or email  like '%{$search}%')";
        }

        $suppliers = $this->supplier->listSuppliers($dataWhere, array(), '*', $recordPerPage, $start, $order, $sort);
        $totalSuppliers = $this->supplier->totalSuppliers($dataWhere);
        $jsonArray = array(
            'iTotalRecords' => $totalSuppliers,
            'iTotalDisplayRecords' => $totalSuppliers,
        );
        $jsonArray['aaData'] = array();
        foreach ($suppliers as $supplier) {
            $data = array(
                'id' => $supplier['id'],
                'name' => $supplier['name'],
                'image' => $supplier['image'],
                'phone' => $supplier['phone'],
                'fax' => $supplier['fax'],
                'email' => $supplier['email'],
                'method' => $supplier['order_submission_method'],
                'action' => 1);
            $jsonArray['aaData'][] = $data;
        }

        echo json_encode($jsonArray);
    }

    public function users() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('front_layout', 'manager/users');
    }

    public function ajax_list_user() {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('user_model', 'user');

        $dataWhere = null;
        if (!empty($search)) {
            $dataWhere = "(us_username  like '%{$search}%' or us_name_display  like '%{$search}%' or us_email  like '%{$search}%')";
        }

        $users = $this->user->listUsers($dataWhere, array(), '*', $recordPerPage, $start, $order, $sort);
        $totalUsers = $this->user->totalUsers($dataWhere);
        $jsonArray = array(
            'iTotalRecords' => $totalUsers,
            'iTotalDisplayRecords' => $totalUsers,
        );
        $jsonArray['aaData'] = array();
        foreach ($users as $user) {
            $data = array(
                'us_id' => $user['us_id'],
                'us_username' => $user['us_username'],
                'us_name_display' => $user['us_name_display'],
                'us_fullname' => $user['us_fullname'],
                'us_email' => $user['us_email'],
                'us_balance' => $user['us_balance'],
                'us_avatar' => $user['us_avatar'],
                'us_password' => $user['us_password'],
                'us_date_created' => $user['us_date_created'],
                'us_status' => $user['us_status'],
                'action' => 1);
            $jsonArray['aaData'][] = $data;
        }
        echo json_encode($jsonArray);
    }

    public function update_user($id = 0) {
        $this->load->model('user_model', 'user');
        $this->load->library('user_manager');
        $dataSupplier = array();
        $dataUser = array();
        if ($id != 0) {
            $datauser = array(
                'us_id' => $id,
            );
            $user = $this->user->getUser($datauser);
            if (empty($user))
                redirect('manager/update_user');
            $dataUser = array(
                'us_username' => $user['us_username'],
                'us_name_display' => $user['us_name_display'],
                'us_fullname' => $user['us_fullname'],
                'us_email' => $user['us_email'],
                'us_balance' => $user['us_balance'],
                'us_avatar' => $user['us_avatar'],
                'us_password' => $user['us_password'],
                'us_date_created' => $user['us_date_created'],
                'us_status' => $user['us_status']
            );
        }
        $posts = $this->input->post();
        $dir = PUBLICPATH . '/upload/';
        if ($posts) {
            $dataUser = $posts;
            $dataUser['us_status'] = !empty($posts['us_status']) ? 1 : 0;
            $file = $_FILES['us_avatar'];
            if (!empty($file))
                $tmp_name = $file["tmp_name"];
            $validate = $this->user_manager->userCreateValidate($dataUser, $id, $file);
            if (empty($validate)) {
                if (!empty($id)) {
                    $dataUserUpdate = array(
                        'us_username' => $dataUser['us_username'],
                        'us_name_display' => $dataUser['us_name_display'],
                        'us_fullname' => $dataUser['us_fullname'],
                        'us_email' => $dataUser['us_email'],
                        'us_balance' => $dataUser['us_balance'],
                    );
                    $dataUserUpdate['us_status'] = $dataUser['us_status'];
                    if (!empty($file)) {
                        $name = $this->auth['us_id'] . $file["name"];
                        if (move_uploaded_file($tmp_name, "$dir/$name")) {
                            $dataUserUpdate['us_avatar'] = $name;
                        }
                    }
                    if (!empty($dataUser['us_password'])) {
                        $dataUserUpdate['us_password'] = md5($dataUser['us_password']);
                    }
                    $this->data['type_page'] = 1;
                    $this->user->update($dataUserUpdate, $id);
                    $this->session->set_flashdata('success', 'Update user success');
                    redirect('manager/users');
                } else {
                    $dataUserInsert = array(
                        'us_username' => $dataUser['us_username'],
                        'us_name_display' => $dataUser['us_name_display'],
                        'us_fullname' => $dataUser['us_fullname'],
                        'us_email' => $dataUser['us_email'],
                        'us_balance' => $dataUser['us_balance'],
                        'us_status' => $dataUser['us_status'],
                        'us_password' => md5($dataUser['us_password']),
                    );
                    $dataUserInsert['us_status'] = $dataUser['us_status'];
                    if (!empty($file)) {
                        $name = $this->auth['us_id'] . $file["name"];
                        if (move_uploaded_file($tmp_name, "$dir/$name")) {
                            $dataUserInsert['us_avatar'] = $name;
                        }
                    }
                    $this->data['type_page'] = 2;
                    $this->user->insert($dataUserInsert);
                    $this->session->set_flashdata('success', 'Insert user success');
                    redirect('manager/users');
                }
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['id'] = $id;
        $this->data['user'] = $dataUser;
        $this->load('front_layout', 'manager/update_user');
    }

    public function delete_user() {
        $this->load->model('user_model', 'user');
        $id = $this->input->post('us_id');
        if (!empty($id)) {
            $dataDelete = array(
                'us_id' => $id
            );
            $this->user->delete($dataDelete);
        }
    }

    public function locations() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('front_layout', 'manager/locations');
    }

    public function ajax_list_location() {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('location_model', 'location');

        $dataWhere = '(user_id = ' . $this->auth['id'] . ')';
        if (!empty($search)) {
            $dataWhere .= " AND (name  like '%{$search}%')";
        }

        $locations = $this->location->listLocations($dataWhere, array(), '*', $recordPerPage, $start, $order, $sort);
        $totalLocations = $this->location->totalLocations($dataWhere);
        $jsonArray = array(
            'iTotalRecords' => $totalLocations,
            'iTotalDisplayRecords' => $totalLocations,
        );
        $jsonArray['aaData'] = array();
        foreach ($locations as $location) {
            $data = array(
                'id' => $location['id'],
                'name' => $location['name'],
                'action' => 1);
            $jsonArray['aaData'][] = $data;
        }

        echo json_encode($jsonArray);
    }

    public function update_location($id = 0) {
        $this->load->model('location_model', 'location');
        $this->load->library('setting_manager');
        $dataLocation = array();
        if ($id != 0) {
            $dataLocationWhere = array(
                'id' => $id,
                'user_id' => $this->auth['id']
            );
            $location = $this->location->getLocation($dataLocationWhere);
            if (empty($location))
                redirect('manager/update_location');
            $dataLocation = array(
                'name' => $location['name'],
            );
        }
        $posts = $this->input->post();
        if ($posts) {
            $dataLocation = $posts;
            $validate = $this->setting_manager->locationValidate($dataLocation);
            if (empty($validate)) {
                if (!empty($id)) {
                    $this->location->update($dataLocation, $id);
                    $this->session->set_flashdata('success', 'Update location success');
                    redirect('manager/locations');
                } else {
                    $dataLocation['user_id'] = $this->auth['id'];
                    $this->location->insert($dataLocation);
                    $this->session->set_flashdata('success', 'Insert location success');
                    redirect('manager/locations');
                }
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['id'] = $id;
        $this->data['location'] = $dataLocation;
        $this->load('front_layout', 'manager/update_location');
    }

    public function delete_location() {
        $this->load->model('location_model', 'location');
        $id = $this->input->post('id');
        if (!empty($id)) {
            $dataDelete = array(
                'id' => $id,
                'user_id' => $this->auth['id']
            );
            $this->location->delete($dataDelete);
        }
    }

    public function product_types() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('front_layout', 'manager/product_types');
    }

    public function ajax_list_product_type() {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('product_type_model', 'product_type');

        $dataWhere = '(user_id = ' . $this->auth['id'] . ')';
        if (!empty($search)) {
            $dataWhere .= " AND (name  like '%{$search}%')";
        }

        $product_types = $this->product_type->listProductTypes($dataWhere, array(), '*', $recordPerPage, $start, $order, $sort);
        $totalProductTypes = $this->product_type->totalProductTypes($dataWhere);
        $jsonArray = array(
            'iTotalRecords' => $totalProductTypes,
            'iTotalDisplayRecords' => $totalProductTypes,
        );
        $jsonArray['aaData'] = array();
        foreach ($product_types as $product_type) {
            $data = array(
                'id' => $product_type['id'],
                'name' => $product_type['name'],
                'action' => 1);
            $jsonArray['aaData'][] = $data;
        }

        echo json_encode($jsonArray);
    }

    public function update_product_type($id = 0) {
        $this->load->model('product_type_model', 'product_type');
        $this->load->library('setting_manager');
        $dataProductType = array();
        if ($id != 0) {
            $dataProductTypeWhere = array(
                'id' => $id,
                'user_id' => $this->auth['id']
            );
            $product_type = $this->product_type->getProductType($dataProductTypeWhere);
            if (empty($product_type))
                redirect('manager/update_product_type');
            $dataProductType = array(
                'name' => $product_type['name'],
            );
        }
        $posts = $this->input->post();
        if ($posts) {
            $dataProductType = $posts;
            $validate = $this->setting_manager->productTypeValidate($dataProductType);
            if (empty($validate)) {
                if (!empty($id)) {
                    $this->product_type->update($dataProductType, $id);
                    $this->session->set_flashdata('success', 'Update product type success');
                    redirect('manager/product_types');
                } else {
                    $dataProductType['user_id'] = $this->auth['id'];
                    $this->product_type->insert($dataProductType);
                    $this->session->set_flashdata('success', 'Insert product type success');
                    redirect('manager/product_types');
                }
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['id'] = $id;
        $this->data['product_type'] = $dataProductType;
        $this->load('front_layout', 'manager/update_product_type');
    }

    public function delete_product_type() {
        $this->load->model('product_type_model', 'product_type');
        $id = $this->input->post('id');
        if (!empty($id)) {
            $dataDelete = array(
                'id' => $id,
                'user_id' => $this->auth['id']
            );
            $this->product_type->delete($dataDelete);
        }
    }

    public function products() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('front_layout', 'manager/products');
    }

    public function ajax_list_product() {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('product_model', 'product');

        $dataWhere = '(user_id = ' . $this->auth['id'] . ')';
        if (!empty($search)) {
            $dataWhere .= " AND (name  like '%{$search}%')";
        }

        $products = $this->product->listProducts($dataWhere, array(), '*', $recordPerPage, $start, $order, $sort);
        $totalProducts = $this->product->totalProducts($dataWhere);
        $jsonArray = array(
            'iTotalRecords' => $totalProducts,
            'iTotalDisplayRecords' => $totalProducts,
        );
        $jsonArray['aaData'] = array();
        foreach ($products as $product) {
            $data = array(
                'id' => $product['id'],
                'name' => $product['name'],
                'supplier' => $product['supplier_id'],
                'image' => $product['image'],
                'name' => $product['name'],
                'unit' => $product['unit'],
                'cost' => $product['cost'],
                'date_added' => $product['date_added'],
                'date_modified' => $product['date_modified'],
                'action' => 1);
            $jsonArray['aaData'][] = $data;
        }

        echo json_encode($jsonArray);
    }

    public function update_product($id = 0) {
        $this->load->model('product_model', 'product');
        $this->load->model('product_type_model', 'product_type');
        $this->load->model('supplier_model', 'supplier');
        $this->load->model('location_model', 'location');
        $this->load->model('product_location_model', 'product_location');
        $this->load->model('product_product_type_model', 'product_product_type');
        $this->load->library('setting_manager');
        $dataProduct = array();

        $locations = $this->location->listLocations(array('user_id' => $this->auth['id']));
        $productTypes = $this->product_type->listProductTypes(array('user_id' => $this->auth['id']));
        $suppliers = $this->supplier->listSuppliers(array('user_id' => $this->auth['id']));
        if ($id != 0) {
            $dataProductWhere = array(
                'id' => $id,
                'user_id' => $this->auth['id']
            );
            $product = $this->product->getProduct($dataProductWhere);
            if (empty($product))
                redirect('manager/update_product');
            $productLocations = $this->product_location->listProductLocations(array('product_id' => $product['id']));
            $productLocationList = array();
            foreach ($productLocations as $productLocation)
                $productLocationList[] = $productLocation['location_id'];
            $productProductTypes = $this->product_product_type->listProductProductTypes(array('product_id' => $product['id']));
            $productProductTypeList = array();
            foreach ($productProductTypes as $productProductType)
                $productProductTypeList[] = $productProductType['product_type_id'];
            $dataProduct = array(
                'name' => $product['name'],
                'supplier_id' => $product['supplier_id'],
                'image' => $product['image'],
                'name' => $product['name'],
                'unit' => $product['unit'],
                'cost' => $product['cost'],
                'qty' => $product['qty'],
                'status' => $product['status'],
                'product_location' => $productLocationList,
                'product_type' => $productProductTypeList,
            );
        }
        $posts = $this->input->post();
        $dir = PUBLICPATH . '/upload/';
        if ($posts) {
            $dataProduct = $posts;
            $file = $_FILES['image'];

            if (!empty($file))
                $tmp_name = $file["tmp_name"];

            if (!empty($id)) {
                $validate = $this->setting_manager->productValidate($dataProduct, $file, $id);
                if (empty($validate)) {
                    $this->setting_manager->updateProduct($dataProduct, $id);
                    if (!empty($file)) {
                        $name = $id . $file["name"];
                        if (move_uploaded_file($tmp_name, "$dir/$name")) {
                            $dataProductUpdate['image'] = $name;
                            $this->product->update($dataProductUpdate);
                        }
                    }

                    $this->session->set_flashdata('success', 'Update product success');
                    redirect('manager/products');
                } else {
                    $this->data['data_error'] = $validate;
                }
            } else {
                $validate = $this->setting_manager->productValidate($dataProduct, $file);
                if (empty($validate)) {
                    $id = $this->setting_manager->insertProduct($dataProduct);

                    if (!empty($file)) {
                        $name = $id . $file["name"];
                        if (move_uploaded_file($tmp_name, "$dir/$name")) {
                            $dataProductImage['image'] = $name;
                            $this->product->update($dataProductImage, $id);
                        }
                    }


                    $this->session->set_flashdata('success', 'Insert product success');
                    redirect('manager/products');
                } else {
                    $this->data['data_error'] = $validate;
                }
            }
        }
        $this->data['id'] = $id;
        $this->data['dir'] = $dir;
        $this->data['product'] = $dataProduct;
        $this->data['locations'] = $locations;
        $this->data['productTypes'] = $productTypes;
        $this->data['suppliers'] = $suppliers;
        $this->load('front_layout', 'manager/update_product');
    }

    public function upload_product_csv($supplier_id = 0) {
        $this->load->model('product_model', 'product');
        $this->load->model('product_type_model', 'product_type');
        $this->load->model('supplier_model', 'supplier');
        $this->load->model('location_model', 'location');
        $this->load->model('product_location_model', 'product_location');
        $this->load->model('product_product_type_model', 'product_product_type');
        $this->load->library('setting_manager');

        $suppliers = $this->supplier->listSuppliers(array('user_id' => $this->auth['id']));
        $posts = $this->input->post();
        $dir = PUBLICPATH . '/upload/csv/';
        if ($posts) {
            $file = $_FILES['csv'];
            $validate = $this->setting_manager->validateProductCsv($file, $posts);
            if (!empty($validate)) {
                $this->data['data_error'] = $validate;
            } else {
                $this->setting_manager->uploadProduct($file, $posts['supplier_id']);

                $this->session->set_flashdata('success', 'Insert product success');
                redirect('manager/products');
            }
        }
        $this->data['suppliers'] = $suppliers;
        $this->data['supplier_id'] = $supplier_id;
        $this->load('front_layout', 'manager/upload_product_csv');
    }

    public function delete_product() {
        $this->load->model('product_model', 'product');
        $this->load->model('product_location_model', 'product_location');
        $this->load->model('product_product_type_model', 'product_product_type');
        $id = $this->input->post('id');
        if (!empty($id)) {
            $dataDelete = array(
                'id' => $id,
                'user_id' => $this->auth['id']
            );
            if ($this->product->delete($dataDelete)) {
                $this->product_location->delete(array('product_id' => $id));
                $this->product_product_type->delete(array('product_id' => $id));
            }
        }
    }

    public function information() {

        $this->load->model('restaurant_model', 'restaurant');
        $this->load->library('setting_manager');
        $this->config->load('config', TRUE);
        $retaurant = $this->restaurant->getRetaurant(array('user_id' => $this->auth['id']));
        $this->load->model('user_model', 'user');
        $this->load->library('user_manager');

        $user = $this->user->getUserById($this->auth['id']);
        $state = $this->config->item('state_restaurant', 'config');
        $dataPost['firstname'] = $user['firstname'];
        $dataPost['lastname'] = $user['lastname'];
        $dataPost['email'] = $user['email'];
        $dataPost['phone'] = $user['phone'];
        $this->data['dataPost'] = $dataPost;
        if (empty($retaurant)) {
            $dataPost['address1'] = null;
            $dataPost['address2'] = null;
            $dataPost['suburb'] = null;
            $dataPost['state'] = null;
            $dataPost['name'] = null;
            $dataPost['postcode'] = null;
            $dataPost['res_phone'] = null;
        } else {
            $dataPost['address1'] = $retaurant['address1'];
            $dataPost['address2'] = $retaurant['address2'];
            $dataPost['suburb'] = $retaurant['suburb'];
            $dataPost['state'] = $retaurant['state'];
            $dataPost['name'] = $retaurant['name'];
            $dataPost['postcode'] = $retaurant['postcode'];
            $dataPost['res_phone'] = $retaurant['name'];
        }
        $posts = $this->input->post();
        if ($posts) {
            $dataPost = $posts;
            $validate = $this->setting_manager->validateRetaurant($dataPost);
            if (empty($validate)) {
                $dataUser['firstname'] = $dataPost['firstname'];
                $dataUser['lastname'] = $dataPost['lastname'];
                $dataUser['email'] = $dataPost['email'];
                $dataUser['phone'] = $dataPost['phone'];
                if (!empty($dataPost['password']))
                    $dataUser['password'] = md5($dataPost['password']);

                $dataRes['address1'] = $dataPost['address1'];
                $dataRes['address2'] = $dataPost['address2'];
                $dataRes['suburb'] = $dataPost['suburb'];
                $dataRes['state'] = $dataPost['state'];
                $dataRes['name'] = $dataPost['name'];
                $dataRes['postcode'] = $dataPost['postcode'];
                $this->user->update($dataUser, $this->auth['id']);
                $this->restaurant->update($dataRes, $retaurant['id']);
                $this->session->set_flashdata('success', 'Update information success');
                redirect(site_url('manager/information'));
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['state_restaurant'] = $state;
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['dataPost'] = $dataPost;
        $this->load('front_layout', 'manager/information');
    }

}
