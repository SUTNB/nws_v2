<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * 测试场
 * 
 * 
 *
 * @copyright  版权所有(C) 2014-2014 沈阳工业大学ACM实验室 沈阳工业大学网络管理中心 *Chen
 * @license    http://www.gnu.org/licenses/gpl-3.0.txt   GPL3.0 License
 * @version    2.0
 * @link       http://acm.sut.edu.cn/
 * @since      File available since Release 2.0
*/
class Test extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    
    public function TestCheckAuthorizee(){
        $this->load->library('authorizee');
        $this->authorizee->CheckAuthorizee('act_add', 1);
    }
    
    public function TestGetUserAuthorizeeList(){
        $this->load->library('authorizee');
        $this->authorizee->GetUserAuthorizeeList(1);
    }
    
    public function TestGetAuthorizeeTypeList(){
        $this->load->model('authorizee_model');
        header('Content-type: text/html; charset=utf-8');
        var_dump($this->authorizee_model->GetAuthorizeeTypeList());        
    }
    
    public function TestGetAuthorizeeList(){
        $this->load->model('authorizee_model');
        header('Content-type: text/html; charset=utf-8');
        var_dump($this->authorizee_model->GetAuthorizeeList());        
    }
    
    public function TestGetRoleAuthorizeeList(){
        $this->load->library('authorizee');
        var_dump($this->authorizee->GetRoleAuthorizeeList('管理员'));
    }
    
    public function TestGetActGlobeInit(){
        $this->load->model('act_model');
        header("Content-type:text/html;charset=utf-8");
        var_dump($this->act_model->GetActList(0, 1, 43));
    }
    
    public function TestGetActInfo(){
        $this->load->model('act_model');
        header("Content-type:text/html;charset=utf-8");
        var_dump($this->act_model->GetActInfo(15));
    }
    
    public function TestMobileUpdate(){
        $this->load->model('mobile_model');
        header("Content-type:text/html;charset=utf-8");
        var_dump($this->mobile_model->CheckUpdate(2.00001));
    }
    
    public function OJ_test(){
        
        $team_number1 = 140406305;
        echo substr($team_number1, 0, 2) ;
        echo "<br/>//////////////<br/>";
                
                echo date("y");
    }
    
    public function test_this_db_set(){
        $this->load->database();        
//        $this->db->set('act_id', 10000);
//        $this->db->set('act_update_sum', 'act_update_sum+1', FALSE);
//        $this->db->update('activity_update');
        $this->db->where('act_id', 10002);        
        if (!$this->db->count_all_results('activity_update')){
            $this->db->insert('activity_update', array('act_id' => 10002));  
        } else {  
            $this->db->where('act_id', 10002);
            $this->db->set('act_update_sum', 'act_update_sum+1', FALSE);
            $this->db->update('activity_update');
        }              
        
    }
}