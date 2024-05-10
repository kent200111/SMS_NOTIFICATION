<form action="{{ route('submit.query') }}" method="post">
    @csrf
    <textarea name="query_text" rows="4" cols="50"></textarea><br>
    <button type="submit">Submit Query</button>
</form>