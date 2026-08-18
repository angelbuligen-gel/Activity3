<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        session_start();
        $_SESSION['student_access'] = true;

        $this->call->view('student/index');
    }

    public function profile()
    {
        $student = [
            'student_id' => 'MCC2024-00072',
            'name' => 'ANGEL FAITH B. ADA',
            'course' => 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY',
            'year' => '3rd YEAR',
            'section' => '3F2',
            'email' => 'angelbuligenada@gmail.com'
        ];

        $this->call->view('student/profile', $student);
    }
}