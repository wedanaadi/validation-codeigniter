<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class validation extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
    }
    

    public function index()
    {
        $this->load->view('validasi');
    }

    public function save()
    {
        // $input1 = $this->input->post('input_1');
        // $input2 = $this->input->post('select_id');
        $this->form_validation->set_rules('input_1', 'input 1', 'required');
        $this->form_validation->set_rules('select_id', 'input 2', 'required');
        if ($this->form_validation->run() == FALSE){

            // note : ini untuk semua errors ---
            // $errors = validation_errors();
            // echo json_encode(['error'=>$errors]);

            // note : ini untuk error satu per satu ---
            $errors = $this->form_validation->error_array(); 
            echo json_encode(['errors'=> $errors]);

        }else{
            // insert or update database syntax
            echo json_encode(['success'=>'Record added successfully.']);

        }
    }

}

/* End of file validation.php */

?>