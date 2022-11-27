<?php

namespace App\Http\Livewire\Traits;

trait WithAuthRedirects {
    public function redirectToLogin(){
        redirect()->setIntendedUrl(url()->previous());

        return redirect()->route('login');
    }
}
