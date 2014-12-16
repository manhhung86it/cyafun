<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Features extends MY_Controller {

    public function __construct() {

        parent::__construct();

        $this->user_manager->admin_authenticate();
    }

    public function index() {
        $this->load->model('features_model');
        $dataWhere = '(page = 1 AND status =1)';
        $order = 'order';
        $this->data['breadcrumbs'][] = array('title' => 'frontend manager');
        $features = $this->features_model->listFeatures($dataWhere, null, '*', 4, 0, $order);
        $this->data['features'] = $features;
        $this->load('front_layout', 'features');
    }

    public function editFeatures() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('admin_layout', 'admin/frontend/features');
    }

    public function contactPage() {
        $posts = $this->input->post();
        if ($posts) {
            $data = $posts;
            $validate = $this->setting_manager->contactValidate($data);
            if (empty($validate)) {
                $dataUpdate['name'] = $data['name'];
                $dataUpdate['email'] = $data['email'];
                $dataUpdate['phone'] = $data['phone'];
                $dataUpdate['content'] = $data['content'];
                $id = $this->features->insert($dataUpdate);
                $this->session->set_flashdata('success', 'Your Mail has been sent successfully');
                redirect('features/contactPage');
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->load('front_layout', 'contact');
    }

    public function ajax_list_features() {
        $this->ajax_list_frontend(1);
    }

    public function update_features($id = 0) {
        $this->update_frontend($id, 1);
        $this->load('admin_layout', 'admin/frontend/update_features');
    }

    public function aboutPage() {
//        $this->user_manager->authenticate();
        $this->load->model('features_model');
        $dataWhere = '(page = 2 AND status =1)';
        $order = 'order';
        $features = $this->features_model->listFeatures($dataWhere, null, '*', 4, 0, $order);
        $this->data['features'] = $features;
        $this->load('front_layout', 'aboutpage');
    }

    public function editAboutPage() {
        $this->data['success'] = $this->session->flashdata('success');
        $this->load('admin_layout', 'admin/frontend/aboutpage');
    }

    public function ajax_list_AboutPage() {
        $this->ajax_list_frontend(2);
    }

    public function updateAboutPage($id = 0) {
        $this->update_frontend($id, 2);
        $this->load('admin_layout', 'admin/frontend/update_aboutPage');
    }

    public function ajax_list_frontend($page) {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('features_model', 'features');
        $dataWhere = '(page = ' . $page . ')';
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
                    $this->features->update($dataUpdate, $id);
                    if (!empty($file)) {
                        $name = $id . $file["name"];
                        if (move_uploaded_file($tmp_name, "$dir/$name")) {
                            $dataImage['image'] = $name;
                            $this->features->update($dataImage, $id);
                        }
                    }

                    if ($page == 1)
                        $this->session->set_flashdata('success', 'Update Features success');
                    redirect('admin/features/editFeatures');
                    if ($page == 2)
                        $this->session->set_flashdata('success', 'Update Abouts  success');
                    redirect('admin/features/editAboutPage');
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
                    $id = $this->features->insert($dataInsert);
                    if (!empty($file)) {
                        $name = $id . $file["name"];
                        if (move_uploaded_file($tmp_name, "$dir/$name")) {
                            $dataImage['image'] = $name;
                            $this->features->update($dataImage, $id);
                        }
                    }

                    if ($page == 1)
                        $this->session->set_flashdata('success', 'Insert Features success');
                    redirect('admin/features/editFeatures');
                    if ($page == 2)
                        $this->session->set_flashdata('success', 'Insert Abouts success');
                    redirect('admin/features/editAboutPage');
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
    
    
    // contact page
    public function editContactsPage() {
        $this->load->model('contact_model', 'contact');
        $this->load->library('setting_manager');
        $dataContact = array();
        $contact = $this->contact->getContactPages(3);
        $dataContact = array(
            'id' => $contact['id'],
            'page' => $contact['page'],
            'status' => $contact['status'],
            'image' => $contact['image'],
            'content' => $contact['content'],
            'order' => $contact['order'],
            'title' => $contact['title'],
        );
        $posts = $this->input->post();
        if ($posts) {
            $dataContact = $posts;
            $validate = $this->setting_manager->contactPageValidate($dataContact);
            if (empty($validate)) {
                $dataUpdate['content'] = $dataContact['content'];
                $dataUpdate['title'] = $dataContact['title'];
                $this->contact->updateContactPage($dataUpdate, 3);
//                $this->data['success'] = 'Update Contact Page success';
                $this->session->set_flashdata('success', 'Update Contact Page success');
                redirect('admin/features/editContactsPage');
            } else {
                $this->data['data_error'] = $validate;
            }
        }
        $this->data['contact'] = $dataContact;
        $this->load('admin_layout', 'admin/frontend/update_contactPage');
    }

}
