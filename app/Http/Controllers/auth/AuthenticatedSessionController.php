<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     *
     * @return \App\Http\Resources\UserResource
     */
    public function store(LoginRequest $request)
    {
        // $request->authenticate();

        if (Auth::attempt($request)) {
            $request->session()->regenerate();
            return response()->json([], 200);
        }

        // return new UserResource(Auth::user());
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return integer
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'msg' => 'Logged successfully',
        ], 200);

        // return Response::HTTP_NO_CONTENT;
    }

    /**
     * Returns the logged in user
     *
     * @return \App\Http\Resources\UserResource
     */
    public function me()
    {
        return new UserResource(Auth::user());
    }
}
