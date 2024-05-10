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
    <form id="delete-form" action="{{ route('delete.account.submit') }}" method="post">
        @csrf
        <h1>Delete Account</h1>
        <p>Are you sure you want to delete your account? This action cannot be undone.</p>
        <button id="delete-btn" type="button">Delete Account</button>
    </form>
</div>

<script>
    document.getElementById('delete-btn').addEventListener('click', function() {
        if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
            document.getElementById('delete-form').submit();
        }
    });
</script>
@endsection
