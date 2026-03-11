<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['sometimes', 'boolean'],
        ]);

        $remember = (bool) ($credentials['remember'] ?? false);
        unset($credentials['remember']);

        if (! Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }

        if ($request->hasSession()) {
            $request->session()->regenerate();
        }

        $user = $request->user();
        $token = $user?->createToken('api')?->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'token_type' => $token ? 'Bearer' : null,
        ]);
    }

    public function destroy(Request $request)
    {
        $request->user()?->currentAccessToken()?->delete();

        Auth::guard('web')->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return response()->noContent();
    }
}

