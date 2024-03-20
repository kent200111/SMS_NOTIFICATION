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
                            <a class="nav-link active" href="#activity" data-toggle="tab"
                                style="background-color: #00491E;">News Feed</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="admin/dist/img/user6-128x128.jpg"
                                        alt="User Image">
                                    <span class="username">
                                        <a href="#">Supreme Student Council</a>

                                    </span>
                                    <br>

                                    <p>
                                        Caption Here!!
                                    </p>
                                </div>
                                <!-- /.user-block -->
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <img class="img-fluid" src="admin/dist/img/photo1.png" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img class="img-fluid mb-3" src="admin/dist/img/photo2.png" alt="Photo">
                                                <img class="img-fluid" src="admin/dist/img/photo3.jpg" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <img class="img-fluid mb-3" src="admin/dist/img/photo4.jpg" alt="Photo">
                                                <img class="img-fluid" src="admin/dist/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <p>
                                    <span class="float-right">
                                        <a href="#" class="link-black text-sm">
                                            <i class="far fa-comments mr-1"></i> Comments
                                        </a>
                                    </span>
                                </p>

                                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
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

@endsection