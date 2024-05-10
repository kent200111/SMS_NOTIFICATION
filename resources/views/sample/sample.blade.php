@extends('layouts.app')

@section('content')
<br> 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Request Account Deletion</div>

                <div class="card-body">
                    <p>Are you sure you want to delete your account?</p>

                    <!-- Form for requesting deletion -->
                    <form method="POST" action="#">
                        @csrf
                        <button type="submit" class="btn btn-danger">Yes, Delete My Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection