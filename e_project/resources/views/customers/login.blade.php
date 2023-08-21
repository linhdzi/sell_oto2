<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assest/css/login4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="login-form">
    
        <div class="text">
            LOGIN
        </div>
        <form method="POST" action="{{ route('customers.login') }}">
        @csrf    
            <div class="field">
                <div class="fas fa-envelope"></div>
                <input type="text" name="username" placeholder="Phone">
            </div>
            <div class="field">
                <div class="fas fa-lock"></div>
                <input type="password" name="password" placeholder="Password">
            </div>
            <button type="submit">LOGIN</button>
            
            <div class="link">
                Not a member?
                <a href="/customers/sign">Signup now</a>
            </div>
        </form>
    </div>
</body>

</html>