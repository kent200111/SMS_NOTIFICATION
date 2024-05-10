@extends('layouts.app')

@section('content')
<h1>Admin Queries</h1>

@foreach ($queries as $query)
<div>
    <p><strong>User:</strong> {{ $query->user->first_name }}</p>
    <p><strong>Query:</strong> {{ $query->query_text }}</p>
    @if ($query->reply_text)
    <p><strong>Admin Reply:</strong> {{ $query->reply_text }}</p>
    @else
    <form action="{{ route('admin.reply.query', $query->id) }}" method="post">
        @csrf
        <label for="reply_text">Reply:</label><br>
        <textarea name="reply_text" id="reply_text" rows="4" cols="50"></textarea><br>
        <button type="submit">Send Reply</button>
    </form>
    @endif
</div>
@endforeach

{{ $queries->links() }}
@endsection