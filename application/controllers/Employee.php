<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('employee/header');
        $this->load->view('employee/login');
        $this->load->view('employee/footer');
    }

    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $authenticated = $this->Employee_model->authenticate($email, $password);
        if ($authenticated) {
            $employee_status = $this->Employee_model->check_employee_status($email);
            if ($employee_status == 1) {
                $employee_details = $this->Employee_model->get_employee_details($email);
                $this->session->set_userdata('employee_logged_in', [
                    'id' => $employee_details['id'],
                    'email' => $employee_details['email']
                ]);
                $response['status'] = 'success';
                $response['message'] = 'Login successful';
                echo json_encode($response);
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Employee is inactive. Please contact your administrator.';
                echo json_encode($response);
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Incorrect email or password';
            echo json_encode($response);
        }
    }


    public function logout() {
        $this->session->unset_userdata('employee_logged_in');
        redirect('employee');
    }

    function dashboard() {
        if ($this->session->userdata('employee_logged_in')) {
            $id = $this->session->userdata('employee_logged_in')['id'];
            $data['employee_details'] = $this->Employee_model->get_employee_profile($id);
            $data['total_salary_given'] = $this->Employee_model->get_total_salary_given($id);
            $data['applied_leave'] = $this->Employee_model->count_applied_leave($id);
            $data['approved_leave'] = $this->Employee_model->count_approved_leave($id);
            $data['rejected_leave'] = $this->Employee_model->count_rejected_leave($id);
            $data['count_salary'] = $this->Employee_model->count_salary($id);
            $this->load->view('employee/header');
            $this->load->view('employee/sidebar', $data);
            $this->load->view('employee/dashboard', $data);
            $this->load->view('employee/footer');
        } else {
            redirect('employee');
        }
    }


    public function profile() {
        if ($this->session->userdata('employee_logged_in')) {
            $id = $this->session->userdata('employee_logged_in')['id'];
            $data['employee_details'] = $this->Employee_model->get_employee_profile($id);
            $data['count_salary'] = $this->Employee_model->count_salary($id);
            $this->load->view('employee/header');
            $this->load->view('employee/sidebar', $data);
            $this->load->view('employee/profile', $data);
            $this->load->view('employee/footer');
        } else {
            redirect('employee');
        }
    }


    function leave_history() {
        if ($this->session->userdata('employee_logged_in')) {
            $id = $this->session->userdata('employee_logged_in')['id'];
            $data['employee_details'] = $this->Employee_model->get_employee_profile($id);
            $data['leave_history'] = $this->Employee_model->get_leave_history($id);
            $data['leave_types'] = $this->Employee_model->get_leave_types();
            $data['count_salary'] = $this->Employee_model->count_salary($id);
            $this->load->view('employee/header');
            $this->load->view('employee/sidebar', $data);
            $this->load->view('employee/leave_history', $data);
            $this->load->view('employee/footer');
        } else {
            redirect('employee');
        }
    }


    function apply_leave() {
        $id = $this->session->userdata('employee_logged_in')['id'];
        $leave_type = $this->input->post('leave_type');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $description = $this->input->post('description');
        if (empty($leave_type) || empty($from_date) || empty($to_date)) {
        }
        $leave_data = array(
            'employee_id' => $id,
            'leave_type' => $leave_type,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'description' => $description,
            'status' => '0'
        );
        $result = $this->Employee_model->apply_leave($leave_data);
        if ($result) {
            redirect('employee/leave_history');
        } else {
            // Failed to save leave application
        }
    }


    function salary() {
        if ($this->session->userdata('employee_logged_in')) {
            $id = $this->session->userdata('employee_logged_in')['id'];
            $data['employee_details'] = $this->Employee_model->get_employee_profile($id);
            $data['salary'] = $this->Employee_model->get_salary($id);
            $data['count_salary'] = $this->Employee_model->count_salary($id);
            $this->load->view('employee/header');
            $this->load->view('employee/sidebar', $data);
            $this->load->view('employee/salary', $data);
            $this->load->view('employee/footer');
        } else {
            redirect('employee');
        }
    }


    function task_list() {
        if ($this->session->userdata('employee_logged_in')) {
            $id = $this->session->userdata('employee_logged_in')['id'];
            $data['employee_details'] = $this->Employee_model->get_employee_profile($id);
            $data['task'] = $this->Employee_model->get_task_list($id);
            $data['count_salary'] = $this->Employee_model->count_salary($id);
            $this->load->view('employee/header');
            $this->load->view('employee/sidebar', $data);
            $this->load->view('employee/task_list', $data);
            $this->load->view('employee/footer');
        } else {
            redirect('employee');
        }
    }

    public function update_task($id) {
        if ($this->session->userdata('employee_logged_in')) {
            // Retrieve task data from the form
            $started_date = $this->input->post('started_date');
            $finished_date = $this->input->post('finished_date');
            
            // Check if start and finish dates are empty and set them to NULL if they are
            $task_data = array(
                'task_description' => $this->input->post('task_description'),
                'started_date' => !empty($started_date) ? $started_date : NULL,
                'finished_date' => !empty($finished_date) ? $finished_date : NULL,
                'task_status' => $this->input->post('task_status')
            );

            // Update the task in the database
            $this->load->model('Employee_model');
            $update_result = $this->Employee_model->update_task($id, $task_data);

            if ($update_result) {
                $this->session->set_flashdata('success', 'Task updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update the task.');
            }

            // Redirect back to the task list
            redirect('employee/task_list');
        } else {
            redirect('employee');
        }
    }




    public function change_password() {
        if ($this->session->userdata('employee_logged_in')) {
            $id = $this->session->userdata('employee_logged_in')['id'];
            $data['employee_details'] = $this->Employee_model->get_employee_profile($id);
            $data['count_salary'] = $this->Employee_model->count_salary($id);
            $this->load->view('employee/header');
            $this->load->view('employee/sidebar', $data);
            $this->load->view('employee/change_password', $data);
            $this->load->view('employee/footer');
        } else {
            redirect('employee');
        }
    }


    public function update_password() {
        if ($this->session->userdata('employee_logged_in')) {
            $id = $this->session->userdata('employee_logged_in')['id'];
            $current_password = $this->input->post('password');
            $new_password = $this->input->post('newPassword');
            $confirm_password = $this->input->post('confirmPassword');
            if ($new_password !== $confirm_password) {
                $response['status'] = 'error';
                $response['message'] = 'New Password and Confirm New Password do not match';
                echo json_encode($response);
                return;
            }
            $authenticated = $this->Employee_model->authenticate_by_id($id, $current_password);
            if ($authenticated) {
                $updated = $this->Employee_model->update_password($id, $new_password);
                if ($updated) {
                    $response['status'] = 'success';
                    $response['message'] = 'Password changed successfully';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Failed to change password';
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Incorrect current password';
            }
            echo json_encode($response);
        } else {
            redirect('employee');
        }
    }


}
?>
