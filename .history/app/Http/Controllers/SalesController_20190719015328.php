<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
  /**
     * Store a newly created purchase data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validate user input
        $request->validate([
            'item' => 'required|string',
            'amount' => 'required|number',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            'message' => 'User created successfully!'
        ], 201);
    }

    /**
     * Login user and create jwt-token.
     *
     * @param  \Illuminate\Http\Request  $request     
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $creds = request(['email', 'password']);

        if(!Auth::attempt($creds)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('SuperAwesomeSecretTokenKeyForSeamlessHr');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }            
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            'user' => $user
        ]);
    }

    /**
     * Remove the specified user active session.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
