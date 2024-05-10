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
                                <div class="row col-md-12">
                                    <div class="col-md-12">
                                        <img class="img-fluid" src="admin/dist/img/photo1.png" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <br>
                                <p>
                                    <span class="float-right">
                                        <a href="#" class="link-black text-sm" id="toggleComments">
                                            <i class="far fa-comments mr-1"></i> Comments
                                        </a>
                                    </span>
                                </p>

                                <br>

                                <!-- Comment Section -->
                                <div id="commentsSection" style="display: none;">
                                    <input class="form-control form-control-sm col-md-11" type="text"
                                        placeholder="Type a comment">
                                </div>
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
                <form action="{{ url('chatbot') }}" method="post">
                    {!! csrf_field() !!}
                    <label>Caption</label><br>
                    <input type="text" name="caption" id="caption" class="form-control"><br>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
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
<div class="chatbot-container" id="chatbotContainer" style="width: 270px;">
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
// JavaScript to toggle comment section visibility
document.getElementById("toggleComments").addEventListener("click", function(event) {
    event.preventDefault();
    var commentsSection = document.getElementById("commentsSection");
    commentsSection.style.display = (commentsSection.style.display === "none") ? "block" : "none";
});
</script>
@endsection