<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
      //echo 'khoi dong dashboards';
      //sử dụng session để check longin

    }
    public function index(){
        return '<h2>dashboard</h2>';
    }
}