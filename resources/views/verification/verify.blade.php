<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Krystal Digital" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Verify Email</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap"
          rel="stylesheet">
    <style>
        body {
            color: #222222;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

<script src="{{ asset('portal/js/sweetalert.min.js') }}"></script>

<script>
    swal({
        title: "Well Done {{ user('first_name') }}!",
        text: "You've successfully verified your email.",
        icon: "success",
        closeOnClickOutside: false,
        closeOnEsc: false
    }).then(() => (location.href = "{{ route('dashboard') }}"));
</script>

</body>
</html>

