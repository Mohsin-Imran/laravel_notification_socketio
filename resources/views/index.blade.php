<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submit</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Send Real Time Notification Socket.io</h2>
                </div>
                <div class="card-body">
                    <form id="notifyForm" action="{{ route('submit.form') }}" method="POST">
                        @csrf
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" class="form-control" placeholder="Message"></textarea>
                        <button type="submit" class="btn btn-success mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Socket.io Client -->
        <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Common JavaScript File -->
        <script src="{{ asset('js/common.js') }}"></script>
</body>
</html>
