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
                        <form>
                            <div class="form-group">
                                <label>Sender Name</label>
                                <input type="text" class="form-control" placeholder="Enter Sender Name">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" rows="6" placeholder="Enter Message"></textarea>
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
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="12" placeholder="History"></textarea>
                            </div>
                            <br>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection