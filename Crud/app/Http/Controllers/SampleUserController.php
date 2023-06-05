<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\sampleuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class SampleUserController extends Controller
{
    public function user($id)
    {
        $user = sampleuser::where('id', $id)->first();
        return response()->json(['username' => $user->username]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:191',
            'password' => 'required|max:191'
        ]);
        // $user = sampleuser::where('username', $request->username)->where('password', $request->password)->first();

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()]);
        } else {
            $user = sampleuser::where('username', $request->username)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Logged in successfully!', 'id' => $user->id, 'flag' => 1], 200);
            } else {
                return response()->json(['message' => 'Invalid Credentials!', 'flag' => 0]);
            }
        }
    }
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|max:191',
            'password' => 'required|max:191'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()]);
        } else {

            $user = sampleuser::where('username', $request->username)->first();
            if ($user) {
                return response()->json(['message' => 'This username is existing, please try another!'], 200);
            }
            else {
                sampleuser::create([
                    'username' => $request->username,
                    'password' => Hash::make($request->password)
                ]);
                return response()->json(['message' => 'Registered successfully!'], 200);
            }
            
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|max:191',
            'username' => 'required|max:191',
            'password' => 'required|max:191'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()]);
        } else {
            $user = sampleuser::find($request->id);
            $user->update([
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
            return response()->json(['message' => 'Updated successfully!'], 200);
        }
    }
    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|max:191'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()]);
        } else {
            $user = sampleuser::find($request->id);
            $user->delete();
            return response()->json(['message' => 'Deleted successfully!'], 200);
        }
    }
}
