@extends('layouts.app')

@section('content')
<br>
<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg1">
                                Add Post
                            </button>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body" style="max-height: 490px; overflow-y: auto;">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                @foreach($posts->reverse() as $item)
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="admin/dist/img/user6-128x128.jpg"
                                        alt="User Image">
                                    <span class="username">
                                        <a href="#">Supreme Student Council
                                            <span style="color: gray; font-size: 12px;">
                                                Posted on {{ $item->created_at->format('F j, Y') }}
                                            </span>
                                        </a>
                                        <form action="{{route('posts.destroy',$item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <div class="text-right">
                                                <!-- Align content to the right -->
                                                <button type="submit" class="btn btn-danger" onclick="confirmDelete()"
                                                    style="padding: 0.25rem 0.5rem; font-size: 0.75rem;">Delete</button>
                                            </div>
                                        </form>
                                    </span>
                                    <strong>{{$item->title}}</strong>
                                    <p style="white-space: pre-wrap;">{{$item->caption}}</p>
                                </div>
                                <!-- /.user-block -->
                                <div class="row col-md-12">
                                    <div class="col-md-12">
                                        <img src="{{ asset($item->photo)}}" width='960' height='800'
                                            clas="img img-responsive" />
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <br>
                                <hr style="border-color: black;">
                                <br>
                                @endforeach
                            </div>
                            <!-- /.post -->
                        </div>
                    </div><!-- /.card-body -->
                </div>
            </div><!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</section>


<!-- Modal Add -->
<div class="modal fade" id="modal-lg1">
    <div class="modal-dialog modal-lg1">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('posts')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <label for="caption">Title</label>
                    <textarea name="title" id="title" class="form-control" required></textarea>

                    <label for="caption">Caption </label><br>
                    <textarea name="caption" id="caption" class="form-control" rows="7" required></textarea>

                    <label for="photo">Photo </label>
                    <input type="file" name="photo" id="photo" class="form-control" required><br>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" value="Save" class="btn btn-primary">Add Post</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- ChatBoT -->
<div class="chatbot-icon" onclick="toggleChatbot()">
    <i class="fas fa-robot"></i> <!-- Chatbot icon -->
</div>

<!-- Chatbot Interface -->
<div class="chatbot-container" id="chatbotContainer">
    <div class="chatbot-header">
        <h2>Chatbot</h2>
    </div>
    <div class="chatbot-messages" id="chatbotMessages"></div>
    <i class="fas fa-paper-plane chatbot-send-icon" onclick="sendMessageByIcon()"></i>
    <input type="text" id="chatbotInput" placeholder="Type a message..." onkeypress="sendMessage(event)">
</div>
<script>
function sendMessageByIcon() {
    var message = document.getElementById('chatbotInput').value;
    if (message.trim() === '') return;

    document.getElementById('chatbotMessages').innerHTML += `<div>You: ${message}</div>`;

    $.ajax({
        url: '/chatbot/respond',
        type: 'POST',
        data: {
            userQuestion: message,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            document.getElementById('chatbotMessages').innerHTML += `<div>Bot: ${response.answer}</div>`;
        },
        error: function() {
            document.getElementById('chatbotMessages').innerHTML +=
                `<div>Bot: Sorry, I can't respond right now.</div>`;
        }
    });

    document.getElementById('chatbotInput').value = '';
}

function sendMessage(event) {
    if (event.key === "Enter") {
        sendMessageByIcon();
    }
}

function bringPostToFront() {
    var postContainer = document.getElementById("mainContent");
    postContainer.classList.toggle("post-container-front");
}

document.getElementById("mainContent").addEventListener("click", bringPostToFront);
</script>

<script>
function confirmDelete() {
    if (confirm('Are you sure you want to delete this post?')) {
        // If user confirms, submit the form
        document.getElementById('deleteForm').submit();
    }
}
</script>

@endsection