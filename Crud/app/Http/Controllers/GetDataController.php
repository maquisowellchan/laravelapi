<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    public function index()
{
    $enrollments = Enrollment::all();
    return response()->json($enrollments);
}

}
