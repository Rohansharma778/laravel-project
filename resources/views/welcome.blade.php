<?php

use Illuminate\Support\Facades\Auth;

if (Auth::check()) {
    header('Location: /tasks');
} else {
    header('Location: /register');
}
exit;