<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function authenticate($email, $password) {
        $query = $this->db->get_where('employees', array('email' => $email, 'password' => $password));
        
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }


    public function check_employee_status($email) {
        $query = $this->db->get_where('employees', array('email' => $email));
        if ($query->num_rows() == 1) {
            $employee = $query->row_array();
            return $employee['employee_status']; // Assuming 'status' is the column name
        } else {
            return -1; // Employee not found
        }
    }


    public function get_employee_details($email) {
        $query = $this->db->get_where('employees', array('email' => $email));
        return $query->row_array();
    }

    public function get_employee_profile($id) {
        $this->db->select('employees.*, departments.department_name');
        $this->db->from('employees');
        $this->db->join('departments', 'departments.id = employees.department_id');
        $this->db->where('employees.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }




    public function get_total_salary_given($id) {
        $this->db->select_sum('total_salary');
        $this->db->where('employee', $id);
        $query = $this->db->get('salary');
        $result = $query->row_array();
        return $result['total_salary'];
    }


    public function count_applied_leave($id) {
        $this->db->from('leave_applications');
        $this->db->where('employee_id', $id);
        return $this->db->count_all_results();
    }

    public function count_approved_leave($id) {
        $this->db->from('leave_applications');
        $this->db->where('employee_id', $id);
        $this->db->where('status', '1'); // Assuming '1' represents approved status
        return $this->db->count_all_results();
    }


    public function count_rejected_leave($id) {
        $this->db->from('leave_applications');
        $this->db->where('employee_id', $id);
        $this->db->where('status', '2'); // Assuming '1' represents approved status
        return $this->db->count_all_results();
    }






    public function get_leave_history($id) {
        $this->db->select('leave_applications.*, leave_type.leave_type');
        $this->db->from('leave_applications');
        $this->db->join('leave_type', 'leave_type.id = leave_applications.leave_type');
        $this->db->where('leave_applications.employee_id', $id);
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }


    public function get_leave_types() {
        $query = $this->db->get('leave_type');
        return $query->result_array();
    }



    public function apply_leave($leave_data) {
        return $this->db->insert('leave_applications', $leave_data);
    }





    public function get_salary($id) {
        $this->db->select('*');
        $this->db->from('salary');
        $this->db->where('salary.employee', $id);
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }




    public function authenticate_by_id($id, $password) {
        $query = $this->db->get_where('employees', array('id' => $id, 'password' => $password));
        
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function update_password($id, $new_password) {
        $this->db->set('password', $new_password);
        $this->db->where('id', $id);
        return $this->db->update('employees');
    }









}
?>
