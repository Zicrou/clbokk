<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_validator_function extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_function_validator', 'function_validator');
        $this->load->model('M_configuration', 'configuration');
        $this->load->model('M_function', 'function');
    }

    public function index()
    {
        $data_function = $this->function->get_data();
        $data['data_function'] = $data_function;
        $data['select_function'] = create_select_list($data_function, 'id_function', 'descFunction');

        $data_cats = $this->configuration->get_from_json_liste_categ();
        $data['select_cat'] = create_select_list($data_cats, 'code_country', 'value_country_short');

        $all_data = $this->function_validator->get_data();
        $data['all_data'] = $all_data;


        $this->load->view('V_validator_function', $data);
    }


    public function get_record()
    {
        $args = func_get_args();
        $this->function_validator->id_function_validator = $args[0];
        $this->function_validator->get_record();
        echo json_encode($this->function_validator, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function delete()
    {
        $args = func_get_args();
        $this->function_validator->id_function_validator = $args[0];
        echo json_encode($this->function_validator->delete(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

    public function save()
    {

        foreach($_POST['my_multi_select'] as $key=>$value)
        {
            $this->function_validator->id_function_validator = null;
            $this->function_validator->id_function 	= $value;
            $this->function_validator->id_function_v = $this->input->post('id_function_v');
            $this->function_validator->priority = $key;
            $this->function_validator->id_categorie = $this->input->post('id_categorie');
            $result = $this->function_validator->save();
        }

        //if ($this->input->post('id_function_validator') != '')
        //$this->function_validator->id_function_validator = $this->input->post('id_function_validator');

        echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

}
