@extends('layouts.app')

@section('content')
<br>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Accounts List</h3>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->id_number }}</td>
                                    <td>{{ $user->college }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->contact_number }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<script>
$(function() {
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

@endsection
