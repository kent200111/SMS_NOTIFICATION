@extends('layouts.app')

@section('content')

<style>
/* CSS for unreplied queries */
.query-item.unreplied {
    background-color: #ADD8E6;
    /* Light red */
}

/* CSS for replied queries */
.query-item.replied {
    /* You can define the style for replied queries, or just leave it as default */
}
</style>

<section class="content">
    <div class="container-fluid" style="height: 580px; overflow-y: auto;">

        <h1 style="text-align: center;">Query Management</h1>

        @foreach ($queries->sortBy('reply_text') as $query)
        <div class="query-item{{ $query->reply_text ? ' replied' : ' unreplied' }}"
            style="border: 1px solid #ccc; border-radius: 5px; padding: 5px; margin-bottom: 5px;">
            <strong>User:</strong> {{ $query->user->first_name }} {{ $query->user->last_name }} <br>
            <strong>Query:</strong> {{ $query->query_text }} <br>
            <strong>Reply:</strong> {{ $query->reply_text ?: 'No reply yet' }} <br> 
            <form action="{{ route('admin.reply.query', $query->id) }}" method="post"
                style="display: flex; justify-content: space-between; align-items: center;">
                @csrf

                <div class="form-group" style="flex-grow: 1;">
                    <label for="reply_text">Reply:</label>
                    <textarea class="form-control" id="reply_text" name="reply_text" rows="2" cols="50"
                        style="width: 100%;"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Send Reply</button>
            </form>
        </div>
        @endforeach

        {{ $queries->links() }}
        <!-- Pagination links -->
    </div>
</section>



@endsection