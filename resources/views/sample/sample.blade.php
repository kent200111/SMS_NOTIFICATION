@extends('layouts.app')

@section('content')


<head>
    <link rel="stylesheet" href="admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="admin/plugins/toastr/toastr.min.css">
</head>

<section>

    <button type="button" class="btn btn-success toastrDefaultSuccess">
        Launch Success Toast
    </button>

    <script>
    $(function() {
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('hello')
        });
    });
    </script>

    <script src="admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="admin/plugins/toastr/toastr.min.js"></script>

</section>
@endsection