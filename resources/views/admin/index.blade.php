@extends('layouts.app')

@section('content')
<br>

<head>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="admin/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="admin/plugins/dropzone/min/dropzone.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

</head>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
            Add Account
        </button>
        <br> <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage User Accounts</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>ID Number</th>
                                    <th>College</th>
                                    <th>Gender</th>
                                    <th>Contact Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($adminusers as $adminuser)
                            <tr>
                                <td>{{ $adminuser->first_name }} {{ $adminuser->middle_name }}
                                    {{ $adminuser->last_name }}</td>
                                <td>{{ $adminuser->id_number }}</td>
                                <td>{{ $adminuser->college }}</td>
                                <td>{{ $adminuser->gender }}</td>
                                <td>{{ $adminuser->contact_number }}</td>
                                <td style="text-align: center;">
                                    <form action="{{ route('adminusers.destroy', ['id' => $adminuser->id]) }}"
                                        method="POST" id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete('{{ $adminuser->id }}')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog" style="max-width: 62%;">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <section class="content">
                        <div class="container-fluid" style="width: 800px;">
                            <div class="card card-primary">
                                <div class="card-header" style="background-color: #00491e;">
                                    <h3 class="card-title">Add Admin Account</h3>
                                </div>

                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ url('admins') }}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" id="first_name"
                                                    name="first_name" placeholder="Enter First Name">
                                            </div>
                                            <div class="col-4">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" class="form-control" id="middle_name"
                                                    name="middle_name" placeholder="Enter Middle Name">
                                            </div>
                                            <div class="col-4">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                    placeholder="Enter Last Name">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="id_number">ID Number</label>
                                                <input type="text" class="form-control" id="id_number" name="id_number"
                                                    placeholder="Enter ID Number">
                                            </div>
                                            <div class="col-4">
                                                <label for="college">College</label>
                                                <select class="form-control select2" name="college"
                                                    style="width: 100%;">
                                                    <option value="" selected disabled>Select College</option>
                                                    <option>College of Agriculture</option>
                                                    <option>College of Arts and Sciences</option>
                                                    <option>College of Business Management</option>
                                                    <option>College of Education</option>
                                                    <option>College of Engineering</option>
                                                    <option>College of Forestry and Environmental Science</option>
                                                    <option>College of Human Ecology</option>
                                                    <option>College of Information Science and Computing</option>
                                                    <option>College of Nursing</option>
                                                    <option>College of Veterinary Medicine</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="gender">Gender</label>
                                                <select class="form-control select2" name="gender" style="width: 100%;">
                                                    <option value="" selected disabled>Select Gender</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- END FIRST PART -->
                                        <!-- start second Part -->
                                        <hr style="border: 1px solid #808080;">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    name="email" placeholder="Enter email">
                                            </div>
                                            <div class="col-6">
                                                <label for="contact_number">Contact Number</label>
                                                <input type="tel" class="form-control" id="contact_number"
                                                    name="contact_number" placeholder="Enter Contact Number">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="password">Password</label>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="{{ __('Password') }}" required
                                                    autocomplete="new-password">
                                                @error('password')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    placeholder="{{ __('Confirm Password') }}" required
                                                    autocomplete="new-password">
                                            </div>
                                        </div>
                                        <!-- end second part -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="container">
                                        <div class="row justify-content-end">
                                            <!-- /.col -->
                                            <div class="col-4">
                                                <select class="form-control select2" name="usertype"
                                                    style="width: 100%;" required>
                                                    <option value="" selected disabled>Select User Type</option>
                                                    <option>admin</option>
                                                    <option>user</option>
                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary btn-block"
                                                    style="background-color: #00491e">Add Account</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </div>
                                    <br>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </section>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>

<script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this admin?")) {
        // If the user confirms, submit the form
        document.getElementById('deleteForm').submit();
    }
}
</script>




@endsection