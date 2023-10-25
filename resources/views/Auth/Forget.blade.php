<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <style>
        img {
        width: 800px;
        height: 710px;
        float: left;
        margin-right: 10px;
    }
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        display: flex;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        max-width: 100%;
    }

    .form {
        flex: 1;
        padding: 20px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 100%; /* Set form width to 100% */
        max-width: 400px; /* You can adjust the maximum width as needed */
        margin: 0 auto; /* Center the form */
    }

    img {
        max-width: 90%;
        height: auto;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .mb-3, .mb-4 {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #FF6347; /* Orange color */
        color: #fff;
        border: none;
        padding: 10px 0; /* Adjust padding for the button */
        font-size: 20px; /* Increase font size for the button */
        border-radius: 10px; /* Rounded corners for the button */
    }

    .btn-primary:hover {
        background-color: #FF6347; /* Darker shade of orange on hover */
    }

    .d-flex.align-items-center {
        justify-content: center;
    }

    .text-danger {
        color: red; /* Red color for error messages */
    }

    .text-primary {
        color: #007bff; /* Primary color for links */
    }

    a.text-primary:hover {
        text-decoration: underline; /* Underline the link on hover */
    }
    </style>
    <img src="{{ asset('asset/loginregister.jpg') }}" alt="">

    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <h1>Kirim Email</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @if ($errors->has('email'))
            <div class="invalid-feedback" id="validasi">{{ $errors->first('email') }}</div>
            @endif
          </div>
          <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Kirim Email</button>
        </div>
      </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

