@extends('layouts.app')

@section('content')

<style>
/* Styling for the login card body */
.login-card-body {
    width: 300px;
    margin: auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #f8f9fa;
    border: 2px solid #00491e;
    /* Adding border with #00491e color */
}


/* Styling for the message inside the login box */
.login-box-msg {
    font-size: 18px;
    text-align: center;
    margin-bottom: 20px;
}

/* Styling for the success alert */
.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
}

/* Styling for the primary button */
.btn-primary {
    background-color: #00491e;
    border-color: #00491e;
    border-radius: 5px;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

/* Hover effect for the primary button */
.btn-primary:hover {
    background-color: #003d18;
    border-color: #003d18;
}

/* Focus effect for the primary button */
.btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 73, 30, 0.5);
}

.login-box-msg {
    background-color: red;
    color: white;
    /* To ensure text is readable */
    padding: 10px;
    /* Add padding for better appearance */
    border-radius: 5px;
    /* Optional: Add rounded corners */
}
</style>
<br>
<div class="card-body login-card-body">
    <p class="login-box-msg">{{ __('Verify Your Email Address') }}</p>

    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
    @endif

    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <br> <br>
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block"
                    style="background-color: #00491e; border-color: #00491e;">{{ __('click here to request another') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection