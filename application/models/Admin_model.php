<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function authenticate($email, $password) {
        $query = $this->db->get_where('adminuser', array('email' => $email, 'password' => $password));
        
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }


    public function count_employees() {
        return $this->db->count_all('employees');
    }

    public function count_departments() {
        return $this->db->count_all('departments');
    }

    public function count_leave_types() {
        return $this->db->count_all('leave_type');
    }



    function add_department($data) {
        return $this->db->insert('departments', $data);
    }

    function get_departments() {
        $this->db->order_by('departments.id', 'ASC');
        return $this->db->get('departments')->result_array();
    }


    function update_department($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('departments', $data);
    }

    public function delete_department($id) {
    $this->db->where('id', $id);
    return $this->db->delete('departments');
}



    function get_departments_paginated($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('departments');
        return $query->result_array();
    }

    




    function add_leave($data) {
        return $this->db->insert('leave_type', $data);
    }

    function get_leave() {
        $this->db->order_by('leave_type.id', 'ASC');
        return $this->db->get('leave_type')->result_array();
    }


    function update_leave_type($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('leave_type', $data);
    }

    public function delete_leavetype($id) {
        $this->db->where('id', $id);
        return $this->db->delete('leave_type');
    }





    function add_employee($data) {
        return $this->db->insert('employees', $data);
    }

    
    function get_department_names() {
        $query = $this->db->get('departments');
        return $query->result_array();
    }

    
    function save_employee($data) {
        return $this->db->insert('employees', $data);
    }



    function is_unique_employee_id($employee_id) {
        $this->db->where('employee_id', $employee_id);
        $query = $this->db->get('employees');
        return $query->num_rows() == 0;
    }

    function is_unique_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('employees');
        return $query->num_rows() == 0;
    }



    function get_employee_details1()
    {
        $this->db->select('employees.*, departments.department_name as department_name');
        $this->db->from('employees');
        $this->db->join('departments', 'departments.id = employees.department_id', 'LEFT');
        $this->db->where('employees.status', 1);
        $this->db->order_by('employees.id', 'ASC');
        $res = $this->db->get()->result_array();
        return $res;
    }





    function get_employee_details($id)
    {
        $this->db->select('employees.*,departments.department_name as department_name');
        $this->db->from('employees');
        $this->db->join('departments', 'departments.id = employees.department_id');
        $this->db->where('employees.id', $id);
        $res = $this->db->get()->result_array();
        return $res;
    }


    


    function update_employee($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('employees', $data);
    }




    function toggle_status($id, $status)
    {
        $data = array('employee_status' => $status);
        $this->db->where('id', $id);
        return $this->db->update('employees', $data);
    }





    function salary()
    {
        $this->db->select('salary.*,departments.department_name, employees.first_name, employees.last_name');
        $this->db->from('salary');
        $this->db->join('departments', 'departments.id = salary.department_name');
        $this->db->join('employees', 'employees.id = salary.employee');
        $this->db->where('salary.status', 1);
        $res = $this->db->get()->result_array();
        return $res;
    }




    function get_employees_salary($id)
    {
        $this->db->select('salary.*,departments.department_name, employees.first_name, employees.last_name');
        $this->db->from('salary');
        $this->db->join('departments', 'departments.id = salary.department_name');
        $this->db->join('employees', 'employees.id = salary.employee');
        $this->db->where('salary.id', $id);
        $res = $this->db->get()->result_array();
        return $res;
    }



    function get_employee_salary($id)
    {
        $this->db->select('salary.*,departments.department_name, employees.first_name, employees.last_name');
        $this->db->from('salary');
        $this->db->join('departments', 'departments.id = salary.department_name');
        $this->db->join('employees', 'employees.id = salary.employee');
        $this->db->where('salary.employee', $id);
        $res = $this->db->get()->result_array();
        return $res;
    }




    function get_employees_by_department($department_id) {
        $this->db->where('department_id', $department_id);
        return $this->db->get('employees')->result_array();
    }




    function save_salary($data) {
        return $this->db->insert('salary', $data);
    }



    function update_salary($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('salary', $data);
    }



    public function get_leave_applications() {
        $this->db->select('leave_applications.*, employees.first_name, employees.last_name, leave_type.leave_type');
        $this->db->from('leave_applications');
        $this->db->join('employees', 'leave_applications.employee_id = employees.id');
        $this->db->join('leave_type', 'leave_applications.leave_type = leave_type.id');
        $query = $this->db->get();

        // Check if there are any leave applications
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array(); // Return an empty array if no leave applications found
        }
    }




    function get_leave_application_by_id($id) {
        $this->db->select('leave_applications.*, employees.first_name, employees.last_name, leave_type.leave_type');
        $this->db->from('leave_applications');
        $this->db->join('employees', 'leave_applications.employee_id = employees.id');
        $this->db->join('leave_type', 'leave_applications.leave_type = leave_type.id');
        $this->db->where('leave_applications.id', $id);
        $query = $this->db->get();

        return $query->row_array(); // Return a single row
    }




    function get_leave_application_info($id) {
        $this->db->select('leave_applications.*, employees.first_name, employees.last_name, leave_type.leave_type');
        $this->db->from('leave_applications');
        $this->db->join('employees', 'leave_applications.employee_id = employees.id');
        $this->db->join('leave_type', 'leave_applications.leave_type = leave_type.id');
        $this->db->where('leave_applications.employee_id', $id);
        $res = $this->db->get()->result_array();
        return $res;
    }




    function view_leave_info($id)
    {
        $this->db->select('leave_applications.*, employees.first_name, employees.last_name, leave_type.leave_type');
        $this->db->from('leave_applications');
        $this->db->join('employees', 'leave_applications.employee_id = employees.id');
        $this->db->join('leave_type', 'leave_applications.leave_type = leave_type.id');
        $this->db->where('leave_applications.id', $id);
        $res = $this->db->get()->result_array();
        return $res;
    }





    function update_leave_application($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('leave_applications', $data);
    }





    






}
?>
