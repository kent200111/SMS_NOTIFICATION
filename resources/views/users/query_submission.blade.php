@extends('layouts.app')

@section('content')
<br>
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
            <div class="card-header">
                <h3 class="card-title">Chat</h3>
                <div class="card-tools">
                    <!-- Your card tools here -->
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="chat-body">
                <!-- Chat messages -->
                <div class="direct-chat-messages" id="chat-messages" style="height: 450px;">
                    @php
                    $reversedQueries = $queries->reverse();
                    @endphp
                    @foreach ($reversedQueries as $query)
                    <!-- User query -->
                    <div
                        class="direct-chat-msg @if ($loop->last && !$query->reply_text) {{ 'bottom' }} @else {{ 'right' }} @endif">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">{{ $query->user->first_name }}</span>
                            <span
                                class="direct-chat-timestamp float-left">{{ $query->created_at->format('d M H:i') }}</span>
                        </div>
                        <div class="direct-chat-text" style="background-color: #0000ff; color: white;">
                            {{ $query->query_text }}
                        </div>
                    </div>
                    <!-- Admin reply (if available) -->
                    @if ($query->reply_text)
                    <div class="direct-chat-msg @if ($loop->last) {{ 'bottom' }} @endif">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Admin</span>
                            <span
                                class="direct-chat-timestamp float-right">{{ $query->updated_at->format('d M H:i') }}</span>
                        </div>
                        <div class="direct-chat-text">
                            {{ $query->reply_text }}
                        </div>
                    </div>
                    @endif
                    @endforeach

                    <!-- /.direct-chat-messages -->
                    <hr>
                    <form action="{{ route('submit.query') }}" method="post" style="margin-top: 20px;">
                        @csrf
                        <textarea placeholder="Input Queries..." class="col-md-12" name="query_text" rows="4" cols="50"
                            style="padding: 5px; border: 1px solid #ccc; margin-bottom: 10px;"></textarea><br>
                        <button type="submit"
                            style="padding: 8px 16px; background-color: #007bff; color: #fff; border: none; cursor: pointer; border-radius: 4px; float: right;">Submit
                            Query</button>
                        <br>
                    </form>
                    <br>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <!-- Your form for submitting queries here -->
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
    <script>
    var chatMessages = document.getElementById('chat-messages');
    chatMessages.scrollTop = chatMessages.scrollHeight;
    </script>
</section>
@endsection