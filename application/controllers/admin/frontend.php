<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend extends MY_Controller {

    public function __construct() {

        parent::__construct();

        $this->user_manager->admin_authenticate();
    }

    public function index() {
        echo "1";
    }

    public function editMenuTop() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('admin_layout', 'admin/frontend/menuTop');
    }

    public function ajax_list_menu_top() {
        $page = 'menu_top';
        $this->ajax_list_frontend($page);
    }

    public function update_menu_top($id = 0) {
        $page = 'menu_top';
        $this->update_frontend($id, $page);
        $this->load('admin_layout', 'admin/frontend/updateMenuTop');
    }

    public function editMenuSecond() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('admin_layout', 'admin/frontend/menuSecond');
    }

    public function ajax_list_menu_second() {
        $page = 'menu_second';
        $this->ajax_list_frontend($page);
    }

    public function update_menu_second($id = 0) {
        $page = 'menu_second';
        $this->update_frontend($id, $page);
        $this->load('admin_layout', 'admin/frontend/updateMenuSecond');
    }
    
     public function editGameFocus() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('admin_layout', 'admin/frontend/gameFocus');
    }

    public function ajax_list_Game_Focus() {
        $page = 'gameFocus';
        $this->ajax_list_frontend($page);
    }

    public function update_Game_Focus($id = 0) {
        $page = 'gameFocus';
        $this->update_frontend($id, $page);
        $this->load('admin_layout', 'admin/frontend/updateGameFocus');
    }
    
     public function editRecommendGame() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('admin_layout', 'admin/frontend/RecommendGame');
    }

    public function ajax_list_Recommend_Game() {
        $page = 'RecommendGame';
        $this->ajax_list_frontend($page);
    }

    public function update_Recommend_Game($id = 0) {
        $page = 'RecommendGame';
        $this->update_frontend($id, $page);
        $this->load('admin_layout', 'admin/frontend/updateRecommendGame');
    }
    
     public function editNews() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('admin_layout', 'admin/frontend/News');
    }

    public function ajax_list_News() {
        $page = 'News';
        $this->ajax_list_frontend($page);
    }

    public function update_News($id = 0) {
        $page = 'News';
        $this->update_frontend($id, $page);
        $this->load('admin_layout', 'admin/frontend/updateNews');
    }

    public function ajax_list_frontend($page) {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('features_model', 'features');
        $dataWhere = "(page = '{$page}')";
        if (!empty($search)) {
            $dataWhere .= " AND (id  like '%{$search}%')";
        }

        $frontends = $this->features->listFeatures($dataWhere, array(), '*', $recordPerPage, $start, $order, $sort);
        $totalFrontend = $this->features->totalFeatures($dataWhere);
        $jsonArray = array(
            'iTotalRecords' => $totalFrontend,
            'iTotalDisplayRecords' => $totalFrontend,
        );
        $jsonArray['aaData'] = array();
        foreach ($frontends as $frontend) {
            $data = array(
                'id' => $frontend['id'],
                'page' => $frontend['page'],
                'status' => $frontend['status'],
                'image' => $frontend['image'],
                'content' => $frontend['content'],
                'order' => $frontend['order'],
                'link' => $frontend['link'],
                'action' => 1);
            $jsonArray['aaData'][] = $data;
        }

        echo json_encode($jsonArray);
    }

    public function update_frontend($id = 0, $page) {
        $this->load->model('features_model', 'features');
        $this->load->library('setting_manager');
        $dataFeatures = array();

        if ($id != 0) {
            $dataProductWhere = array(
                'id' => $id
            );
            $features = $this->features->getFeaturesById($id);
            if (empty($features))
                redirect('features/update_features');
            $dataFeatures = array(
                'id' => $features['id'],
                'page' => $features['page'],
                'status' => $features['status'],
                'image' => $features['image'],
                'content' => $features['content'],
                'order' => $features['order'],
                'title' => $features['title'],
                'link' => $features['link'],
            );
        }
        $posts = $this->input->post();
        $dir = PUBLICPATH . '/upload/frontend/';
        if ($posts) {
            $dataFeatures = $posts;
            $file = $_FILES['image'];
            if (!empty($file))
                $tmp_name = $file["tmp_name"];

            if (!empty($id)) {
                $validate = $this->setting_manager->featuresValidate($dataFeatures, $file, $id);
                if (empty($validate)) {
                    $dataUpdate['status'] = $dataFeatures['status'];
                    $dataUpdate['content'] = $dataFeatures['content'];
                    $dataUpdate['order'] = $dataFeatures['order'];
                    $dataUpdate['title'] = $dataFeatures['title'];
                    $dataUpdate['link'] = $dataFeatures['link'];
                    $this->features->update($dataUpdate, $id);
                    if (!empty($file)) {
                        $name = $id . $file["name"];
                        if (move_uploaded_file($tmp_name, "$dir/$name")) {
                            $dataImage['image'] = $name;
                            $this->features->update($dataImage, $id);
                        }
                    }
                    if ($page == 'menu_top') {
                        $this->session->set_flashdata('success', 'Update Menu top success');
                        redirect('admin/frontend/editMenuTop');
                    }
                    if ($page == 'menu_second') {
                        $this->session->set_flashdata('success', 'Update Menu second  success');
                        redirect('admin/frontend/editMenuSecond');
                    }
                    if ($page == 'gameFocus') {
                        $this->session->set_flashdata('success', 'Update game  success');
                        redirect('admin/frontend/editGameFocus');
                    }
                    if ($page == 'RecommendGame') {
                        $this->session->set_flashdata('success', 'Update recommend game  success');
                        redirect('admin/frontend/editRecommendGame');
                    }
                    if ($page == 'News') {
                        $this->session->set_flashdata('success', 'Update News  success');
                        redirect('admin/frontend/editNews');
                    }
                } else {
                    $this->data['data_error'] = $validate;
                }
            } else {
                $validate = $this->setting_manager->featuresValidate($dataFeatures, $file);
                if (empty($validate)) {
                    $dataInsert['page'] = $page;
                    $dataInsert['content'] = $dataFeatures['content'];
                    $dataInsert['order'] = $dataFeatures['order'];
                    $dataInsert['status'] = $dataFeatures['status'];
                    $dataInsert['title'] = $dataFeatures['title'];
                    $dataInsert['link'] = $dataFeatures['link'];
                    $id = $this->features->insert($dataInsert);
                    if (!empty($file)) {
                        $name = $id . $file["name"];
                        if (move_uploaded_file($tmp_name, "$dir/$name")) {
                            $dataImage['image'] = $name;
                            $this->features->update($dataImage, $id);
                        }
                    }

                    if ($page == 'menu_top') {
                        $this->session->set_flashdata('success', 'Insert Menu Top success');
                        redirect('admin/frontend/editMenuTop');
                    }
                    if ($page == 'menu_second') {
                        $this->session->set_flashdata('success', 'Insert Menu Second success');
                        redirect('admin/frontend/editMenuSecond');
                    }
                    if ($page == 'gameFocus') {
                        $this->session->set_flashdata('success', 'Insert game success');
                        redirect('admin/frontend/editGameFocus');
                    }
                    if ($page == 'RecommendGame') {
                        $this->session->set_flashdata('success', 'Insert recommend game  success');
                        redirect('admin/frontend/editRecommendGame');
                    }
                    if ($page == 'News') {
                        $this->session->set_flashdata('success', 'Insert News  success');
                        redirect('admin/frontend/editNews');
                    }
                } else {
                    $this->data['data_error'] = $validate;
                }
            }
        }
        $this->data['id'] = $id;
        $this->data['dir'] = $dir;
        $this->data['features'] = $dataFeatures;
    }

    public function delete_features() {
        $this->load->model('features_model', 'features');
        $id = $this->input->post('id');
        if (!empty($id)) {
            $dataDelete = array(
                'id' => $id,
            );
            $this->features->delete(array('id' => $id));
        }
    }

}
