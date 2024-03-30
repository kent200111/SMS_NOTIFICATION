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
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->id_number }}</td>
                                    <td>{{ $user->college }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->contact_number }}</td>
                                    <td style="text-align: center;">
                                        <i class="fas fa-trash" style="color:red; font-size: 24px; cursor: pointer;"
                                            onclick="confirmDelete('{{ $user->id }}')"></i>
                                        <form id="deleteForm"
                                            action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
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
    if (confirm("Are you sure you want to delete this record?")) {
        // If the user confirms, submit the form
        document.getElementById('deleteForm').submit();
    }
}
</script>



@endsection