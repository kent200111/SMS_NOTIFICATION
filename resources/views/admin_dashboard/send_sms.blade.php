@extends('layouts.app')

@section('content')

<br></br>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Send Notification</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.send.sms') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Admin Name</label>
                                <input type="text" class="form-control" name="admin_name"
                                    value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"
                                    placeholder="Enter Sender Name" readonly>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" rows="6" name="message"
                                    placeholder="Enter Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success float-right">Submit</button>
                            <br><br>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- Add another card on the right side -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Message History</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="overflow-y: auto; max-height: 380px;">
                        <div style="width: 100%;">
                            <!-- Adjust width as necessary -->
                            @foreach ($uniqueNotifications->reverse() as $notification)
                            <p>Admin Name: {{ $notification->admin_name }}</p>
                            <p>Message: {{ $notification->message }}</p>
                            <p>- Sent on: {{ $notification->created_at->format('Y-m-d') }}</p>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    </div>
</section>

@endsection