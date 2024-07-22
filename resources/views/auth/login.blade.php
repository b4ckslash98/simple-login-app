<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AL Fakhri - Nasari Digital Test</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .d-flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>

    <video class="video-background" autoplay muted loop>
        <source src="/background_video_new.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="d-flex-center">
        <div class="card" style="width: 100%; max-width: 400px;background-color: rgba(255, 255, 255, 0.5);">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <form onsubmit="event.preventDefault(); login(event)">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <div id="error-msg" class="text-center mt-2 text-danger"></div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function login(event) {
            var email = $('#email').val();
            var password = $('#password').val();
            var errorHtml = $('#error-msg');

            $.ajax({
                url: "{{ route('login') }}",
                type: "POST",
                data: {
                    email: email,
                    password: password,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if(response.status) {
                        window.location.href = "{{ route('Home') }}";
                    } else {
                        if(response.hasOwnProperty('message')) {
                            errorHtml.html(response.message);
                        } else {
                            errorHtml.html('An error occurred.');
                        }
                    }
                },
                error: function(error) {
                    console.log(error.responseJSON.message)
                    errorHtml.html(error.responseJSON.message);
                }
            });
        }
    </script>
</body>
</html>


