<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->model('features_model');
        $sliderTop = $this->features_model->getFrontEnd('menu_top','all');
        $sliderSecond = $this->features_model->getFrontEnd('menu_second','all');
        $gameFocus = $this->features_model->getFrontEnd('gameFocus','1');
        $recommendGame = $this->features_model->getFrontEnd('RecommendGame','all');
        $news = $this->features_model->getFrontEnd('News','all');
        
        $this->data['sliderTop']  = $sliderTop;
        $this->data['sliderSecond']  = $sliderSecond;
        $this->data['gameFocus']  = $gameFocus;
        $this->data['recommendGame']  = $recommendGame;
        $this->data['news']  = $news;
        
        $this->data['title']  = 'Cya fun';
        $this->load('front_layout', 'welcome_message');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */