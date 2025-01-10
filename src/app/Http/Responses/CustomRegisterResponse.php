<?php 
namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse;

class CustomRegisterResponse implements RegisterResponse {
    /**
     * Handle the response after a successful regustration.
     * 
     * @param mixed $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toResponse($request) {
        return redirect('/login');
    }
}