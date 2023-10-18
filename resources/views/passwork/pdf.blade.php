<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    
    <table class="table">
        <tbody>
            @foreach ($passworks as $passwork)
                <tr>
                    <td>{{ $passwork->name }}</td>
                    <td>{{ $passwork->user_pass}}</td>
                    <td>{{ $passwork->email_pass }}</td>
                    <td>{{ $passwork->password_pass }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>