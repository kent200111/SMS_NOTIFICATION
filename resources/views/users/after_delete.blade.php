@extends('layouts.app')

@section('content')
<style>
    .delete-form-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 400px;
        margin: auto;
        margin-top: 50px;
        text-align: center;
    }

    .delete-form-container p {
        margin-bottom: 20px;
        color: #666666;
    }

    .delete-form-container button {
        padding: 10px 20px;
        background-color: #f44336;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-form-container button:hover {
        background-color: #d32f2f;
    }
</style>

<div class="delete-form-container">
    <p>Your account deletion request has been received and will be processed.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">
            <i class="mr-2 fas fa-sign-out-alt"></i>
            {{ __('Log Out') }}
        </button>
    </form>
</div>

@endsection
