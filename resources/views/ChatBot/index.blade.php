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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg1">
                            Add ChatBot Queries
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if($faqs->count() > 0)
                        <!-- Display table if there are records -->
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faqs as $item)
                                <tr>
                                    <td>{{ $item->question }}</td>
                                    <td>{{ $item->answer}}</td>
                                    <td style="text-align: center;">
                                        <i class="fas fa-edit" style="color:orange; font-size: 24px; cursor:pointer;"
                                            onclick="editModal('{{ $item->id }}', '{{ $item->question }}', '{{ $item->answer }}')"
                                            data-toggle="modal" data-target="#modal-lg2"></i>

                                            <i class="fas fa-trash" style="color:red; font-size: 24px; cursor: pointer;"
                                                onclick="confirmDelete('{{ $item->id }}')"></i>

                                        <!-- Hidden form for delete action -->
                                        <form id="deleteForm"
                                            action="{{ route('chatbot.destroy', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <!-- Display a message if there are no records -->
                        <p>No records found.</p>
                        @endif
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

<!-- Modal Add -->
<div class="modal fade" id="modal-lg1">
    <div class="modal-dialog modal-lg1">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chatbot Queries</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('chatbot') }}" method="post">
                    {!! csrf_field() !!}
                    <label>Question</label><br>
                    <input type="text" name="question" id="question" class="form-control"><br>

                    <label>Answer</label><br>
                    <input type="text" name="answer" id="answer" class="form-control"><br>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" value="Save" class="btn btn-primary">Add Query</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modal-lg2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Chatbot Query</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('chatbot.update', ['id' => $faqs->isEmpty() ? 0 : $item->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <label>Question</label><br>
                    <input type="text" name="question" id="edit_question" class="form-control"><br>

                    <label>Answer</label><br>
                    <input type="text" name="answer" id="edit_answer" class="form-control"><br>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Query</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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

<script>
function editModal(id, question, answer) {
    $('#edit_id').val(id);
    $('#edit_question').val(question);
    $('#edit_answer').val(answer);
}
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