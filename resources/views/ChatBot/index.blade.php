@extends('layouts.adminapp')

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
                                        <i class="fas fa-edit" style="color:orange; font-size: 24px;" data-toggle="modal" data-target="#modal-lg2"></i>
                                        <i class="fas fa-trash" style="color:red; font-size: 24px;"></i>
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