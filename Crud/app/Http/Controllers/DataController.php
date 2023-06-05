<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'age' => 'required|integer|min:1',
        'gender' => 'required|in:male,female',
        'email' => 'required|email|unique:users,email',
        'contactnumber' => 'required|string|max:20',
    ]);

    $user = Enrollment::create($validatedData);

    return response()->json([
        'message' => 'User created successfully',
        'user' => $user,
    ], 201);
}

public function destroy($id)
{
    $enrollment = Enrollment::find($id);
    if (!$enrollment) {
        return response()->json([
            'message' => 'Record not found',
        ], 404);
    }
    $enrollment->delete();
    return response()->json([
        'message' => 'Record deleted successfully',
    ], 200);
}

public function update(Request $request, $id)
{
    $enrollment = Enrollment::find($id);
    
    if (!$enrollment) {
        return response()->json(['message' => 'Enrollment not found'], 404);
    }
    
    $validatedData = $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'age' => 'required|integer|min:1',
        'gender' => 'required|in:male,female',
        'email' => 'required|email|unique:users,email',
        'contactnumber' => 'required|string|max:20',
    ]);

    $enrollment->update($validatedData);

    return response()->json([
        'message' => 'Enrollment updated successfully',
        'enrollment' => $enrollment,
    ], 200);
}



}
