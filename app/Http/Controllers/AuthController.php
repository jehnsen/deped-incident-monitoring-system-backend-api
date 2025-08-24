<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\UpdateResidentRequest;
use Illuminate\Http\Request;
use App\Models\User;
// use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Import Validator
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * User registration.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'email' => '',
            'password' => 'required|string|min:6',
            'role_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create user
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id'  => $request->role_id,
            'department_id'  => $request->department_id,
            'school_id'  => $request->school_id,
            'is_active' => 1
        ]);

        // Create access token
        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json([
            'message' => 'User registered successfully!',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    /**
     * User login.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json([
            'message' => 'Login successful!',
            'user' => $user,
            'token' => $token,
        ], 200);

    }

    /**
     * User logout.
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
        $token = $user->token();
        $token->revoke();
        return response()->json(['message' => 'Logout successful!'], 200);
    }

    /**
     * Get all users 
     */
    public function index()
    {
        $users = User::all();
        return ApiResponseClass::sendResponse($users, '', 200);
    }

    /**
     * Get user by ID (Read).
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json([
            'message' => 'User retrieved successfully!',
            'user' => $user,
        ], 200);
    }

    /**
     * Update user (Update).
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'username' => 'sometimes|required|string|unique:users,username,' . $id,
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update user fields
        $user->name = $request->get('name', $user->name);
        $user->username = $request->get('username', $user->username);
        $user->email = $request->get('email', $user->email);
        $user->role = $request->get('role', $user->role);

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json([
            'message' => 'User updated successfully!',
            'user' => $user,
        ], 200);
    }

    /**
     * Delete user (Delete).
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully!'], 200);
    }

}
