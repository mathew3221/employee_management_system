<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('number');

        // Check if admin is logged in for each function except login and index
        if (!$this->session->userdata('admin_logged_in') && !in_array($this->router->fetch_method(), ['login', 'index'])) {
            redirect('admin/index');
        }
    }

    function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/login');
        $this->load->view('admin/footer');
    }

    function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $authenticated = $this->Admin_model->authenticate($email, $password);

        if ($authenticated) {
            $admin_data = array(
                'email' => $email,
                'admin_logged_in' => true
            );
            $this->session->set_userdata($admin_data);

            $response['status'] = 'success';
            $response['message'] = 'Login successful';
            echo json_encode($response);
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Incorrect email or password';
            echo json_encode($response);
        }
    }

    function dashboard()
    {
        $data['num_employees'] = $this->Admin_model->count_employees();
        $data['num_departments'] = $this->Admin_model->count_departments();
        $data['num_leave_types'] = $this->Admin_model->count_leave_types();
        $data['num_leave_requests'] = $this->Admin_model->count_leave_requests();
        $data['total_salary'] = $this->Admin_model->sum_salary();
        $data['num_pending_leave'] = $this->Admin_model->count_pending_leave();
        $data['num_approved_leave'] = $this->Admin_model->count_approved_leave();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }



    function logout()
    {
        $this->session->unset_userdata('admin_logged_in');
        redirect('home');
    }


    function save_department()
    {
        $data = array();
        $data['department_name'] = $_POST['department_name'];
        $this->Admin_model->add_department($data);
        redirect('admin/manage_department');
    }


    function manage_department()
    {
        $data['departments'] = $this->Admin_model->get_department_names();
        $data['num_pending_leave'] = $this->Admin_model->count_pending_leave();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/manage_department', $data);
        $this->load->view('admin/footer');
    }



    function update_department()
    {
        $department_id = $this->input->post('department_id');
        $edit_department_name = $this->input->post('edit_department_name');
        $data = array('department_name' => $edit_department_name);
        $updated = $this->Admin_model->update_department($department_id, $data);
        $updated ? redirect('admin/manage_department') : show_error("Failed to update department. Please try again.", 500);
    }


    function delete_department()
    {
        $id = $this->input->post('id');
        if ($this->Admin_model->delete_department($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Delete failed']);
        }
    }



    function save_leavetype()
    {
        $data = array();
        $data['leave_type'] = $_POST['leave_type'];
        $this->Admin_model->add_leave($data);
        redirect('admin/manage_leavetype');
    }



    function manage_leavetype()
    {
        $data['leave_type'] = $this->Admin_model->get_leave();
        $data['num_pending_leave'] = $this->Admin_model->count_pending_leave();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/manage_leavetype', $data);
        $this->load->view('admin/footer');
    }


    function update_leave_type()
    {
        $leaveTypeId = $this->input->post('leaveTypeId');
        $leaveType = $this->input->post('edit_leave_type');
        if (!empty($leaveTypeId) && !empty($leaveType)) {
            $data = array(
                'leave_type' => $leaveType
            );
            $updated = $this->Admin_model->update_leave_type($leaveTypeId, $data);

            if ($updated) {
                redirect('admin/manage_leavetype');
            } else {
                echo "Failed to update leave type. Please try again.";
            }
        } else {
            echo "Leave type ID and name are required.";
        }
    }




    function delete_leavetype()
    {
        $id = $this->input->post('id');
        if ($this->Admin_model->delete_leavetype($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Delete failed']);
        }
    }



    function check_unique_employee_id()
    {
        $employee_id = $this->input->post('employee_id');
        $is_unique = $this->Admin_model->is_unique_employee_id($employee_id);
        echo json_encode(['is_unique' => $is_unique]);
    }

    function check_unique_email()
    {
        $email = $this->input->post('email');
        $is_unique = $this->Admin_model->is_unique_email($email);
        echo json_encode(['is_unique' => $is_unique]);
    }


    function save_employee()
    {
        $data = array(
            'employee_id' => $this->input->post('employee_id'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'department_id' => $this->input->post('department_name'),
            'email' => $this->input->post('email'),
            'mobile_no' => $this->input->post('mobile_no'),
            'gender' => $this->input->post('gender'),
            'state' => $this->input->post('state'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'date_of_joining' => $this->input->post('date_of_joining'),
            'address' => $this->input->post('address'),
            'password' => $this->input->post('password'),
            'employee_status' => '0',
            'status' => '1'
        );
        if (!empty($_FILES['photo']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $upload_data = $this->upload->data();
                $data['photo'] = $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                echo $error;
                return;
            }
        }
        $this->Admin_model->save_employee($data);
        redirect('admin/manage_employees');
    }



    function manage_employees()
    {
        $data['employees'] = $this->Admin_model->get_employee_details1();
        $data['departments'] = $this->Admin_model->get_department_names();
        $data['num_pending_leave'] = $this->Admin_model->count_pending_leave();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/manage_employee', $data);
        $this->load->view('admin/footer');
    }


    function view_employee()
    {
        $data = array();
        $id = $_POST['id'];
        $data['employee'] = $this->Admin_model->get_employee_details($id);
        $this->load->view('admin/view_employee', $data);
    }

    function edit_employee()
    {
        $data = array();
        $id = $_POST['id'];
        $data['employee'] = $this->Admin_model->get_employee_details($id);
        $data['departments'] = $this->Admin_model->get_department_names();
        $this->load->view('admin/edit_employee', $data);
    }


    function employee_leave_info()
    {
        $data = array();
        $id = $_POST['id'];
        $data['leave'] = $this->Admin_model->get_leave_application_info($id);
        $this->load->view('admin/employee_leave_info', $data);
    }


    function update_employee()
    {
        $id = $this->input->post('id');
        $data = array(
            'employee_id' => $this->input->post('employee_id'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'department_id' => $this->input->post('department_name'),
            'email' => $this->input->post('email'),
            'mobile_no' => $this->input->post('mobile_no'),
            'gender' => $this->input->post('gender'),
            'state' => $this->input->post('state'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'date_of_joining' => $this->input->post('date_of_joining'),
            'address' => $this->input->post('address'),
            'password' => $this->input->post('password')
        );
        if (!empty($_FILES['photo']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('photo')) {
                $upload_data = $this->upload->data();
                $data['photo'] = $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                echo $error;
                return;
            }
        }
        $this->Admin_model->update_employee($id, $data);
        redirect('admin/manage_employees');
    }

    function toggle_status()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $status = $this->input->post('employee_status'); // Ensure this matches the AJAX request data
            $this->load->model('Admin_model');
            $this->Admin_model->toggle_status($id, $status);
            echo "Status updated successfully";
        } else {
            show_error('Invalid request method', 400);
        }
    }

    function manage_salary()
    {
        $data['employees'] = $this->Admin_model->salary();
        $data['departments'] = $this->Admin_model->get_department_names();
        $data['num_pending_leave'] = $this->Admin_model->count_pending_leave();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/manage_salary', $data);
        $this->load->view('admin/footer');
    }




    function get_employees_by_department()
    {
        $department_id = $this->input->post('department_id');
        $employees = $this->Admin_model->get_employees_by_department($department_id);
        $options = '<option value="">Select Employee</option>';
        foreach ($employees as $es) {
            $options .= '<option value="' . $es['id'] . '">' . $es['first_name'] . ' ' . $es['last_name'] . '</option>';
        }
        echo $options;
    }



    function save_salary()
    {

        $data = array();
        $data['department_name'] = $_POST['department'];
        $data['employee'] = $_POST['employee'];
        $data['salary'] = $_POST['salary'];
        $data['allowance'] = $_POST['allowance'];
        $data['total_salary'] = $_POST['total_salary'];
        $data['status'] = 1;

        $this->Admin_model->save_salary($data);
        redirect('admin/manage_salary');
    }


    function view_salary()
    {
        $data = array();
        $id = $_POST['id'];
        $data['employee'] = $this->Admin_model->get_employees_salary($id);
        $this->load->view('admin/view_salary', $data);
    }


    function view_employee_salary()
    {
        $data = array();
        $id = $_POST['id'];
        $data['employee'] = $this->Admin_model->get_employee_salary($id);
        $this->load->view('admin/view_salary', $data);
    }

    function view_employe()
    {
        $data = array();
        $id = $_POST['id'];
        $data['employee'] = $this->Admin_model->get_employee_details($id);
        $this->load->view('admin/view_employee', $data);
    }

    function edit_salary()
    {
        $data = array();
        $id = $_POST['id'];
        $data['salary'] = $this->Admin_model->get_employees_salary($id);
        $data['departments'] = $this->Admin_model->get_department_names();
        $this->load->view('admin/edit_salary', $data);
    }

    function update_salary()
    {
        $id = $this->input->post('id');
        $data = array(
            'salary' => $this->input->post('salary'),
            'allowance' => $this->input->post('allowance'),
            'total_salary' => $this->input->post('total_salary'),
        );
        $this->Admin_model->update_salary($id, $data);
        redirect('admin/manage_salary');
    }


    function leave_applications()
    {
        $data['leave_applications'] = $this->Admin_model->get_leave_applications();
        $data['num_pending_leave'] = $this->Admin_model->count_pending_leave();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/leave_applications', $data);
        $this->load->view('admin/footer');
    }

    function leave_action()
    {
        $id = $this->input->post('id');
        $data['application'] = $this->Admin_model->get_leave_application_by_id($id);
        $this->load->view('admin/employee_leave_action', $data);
    }

    function view_leave_info()
    {
        $data = array();
        $id = $_POST['id'];
        $data['leave'] = $this->Admin_model->view_leave_info($id);
        $this->load->view('admin/view_leave_info', $data);
    }

    function update_leave_application()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $admin_remark = $this->input->post('admin_remark');
        $data = array(
            'status' => $status,
            'admin_remark' => $admin_remark
        );
        $this->Admin_model->update_leave_application($id, $data);
        redirect('admin/leave_applications');
    }

    function task_manager()
    {
        $data['task'] = $this->Admin_model->get_task_list();
        $data['departments'] = $this->Admin_model->get_department_names();
        $data['num_pending_leave'] = $this->Admin_model->count_pending_leave();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/task_manager', $data);
        $this->load->view('admin/footer');
    }

    function add_task()
    {
        $data = array();
        $data['department_name'] = !empty($_POST['department']) ? $_POST['department'] : null;
        $data['employee'] = !empty($_POST['employee']) ? $_POST['employee'] : null;
        $data['task_title'] = !empty($_POST['task_title']) ? $_POST['task_title'] : null;
        $data['task_description'] = !empty($_POST['task_description']) ? $_POST['task_description'] : null;

        if (empty($_POST['created_date'])) {
            $data['created_date'] = date('Y-m-d H:i:s');  // Save current date and time
        } else {
            $data['created_date'] = $_POST['created_date'];
        }

        $data['started_date'] = !empty($_POST['started_date']) ? $_POST['started_date'] : null;
        $data['finished_date'] = !empty($_POST['finished_date']) ? $_POST['finished_date'] : null;
        $data['task_status'] = !empty($_POST['task_status']) ? $_POST['task_status'] : null;
        $data['status'] = 1;

        $this->Admin_model->save_task($data);
        redirect('admin/task_manager');
    }


    public function update_task()
    {
        // Load model
        $this->load->model('Admin_model');

        // Get form data
        $task_id = $this->input->post('task_id');
        $data = array(
            'task_title' => $this->input->post('task_title'),  // Ensure task_title is updated
            'task_description' => $this->input->post('task_description'),
            'created_date' => $this->input->post('created_date'),
            'started_date' => !empty($started_date) ? $started_date : NULL,
                'finished_date' => !empty($finished_date) ? $finished_date : NULL,
            'task_status' => $this->input->post('task_status'),
        );

        // Update task
        if ($this->Admin_model->update_task($task_id, $data)) {
            $this->session->set_flashdata('success', 'Task updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update task.');
        }

        // Redirect to task manager
        redirect('admin/task_manager');
    }



    public function delete_task($task_id)
    {
        $this->load->model('Admin_model');
        
        if ($this->Admin_model->delete_task($task_id)) {
            // Send JSON response for success
            echo json_encode(['status' => 'success']);
        } else {
            // Send JSON response for failure
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete task.']);
        }
    }



}
