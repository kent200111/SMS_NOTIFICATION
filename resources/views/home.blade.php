@extends('layouts.adminapp')

@section('content')
<br>
<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <button type="button" class="btn btn-success">
                                News Feed
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
                                    <img class="img-circle img-bordered-sm" src="{{ asset('images/ssc_logo.png') }}"
                                        alt="User Image">
                                    <span class="username">
                                        <a href="#">Supreme Student Council
                                            <span style="color: gray; font-size: 12px;">
                                                Posted on {{ $item->created_at->format('F j, Y') }}
                                            </span>
                                        </a>
                                        <br><br>
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