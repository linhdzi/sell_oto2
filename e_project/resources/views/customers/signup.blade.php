<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assest/css/login4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/signup.css">    
</head>

<body>
    <div class="login-form">
        <div class="text">
            SIGN UP
        </div>
        <form method="POST" action="{{ route('customers.signup') }}">
        @csrf    
            <div class="field">
                <div class="fas fa-envelope"></div>
                <input type="text" name="username" placeholder="Phone">
            </div>
            <div class="field">
                <div class="fas fa-lock"></div>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="field">
                <div class="fas fa-lock"></div>
                <input type="password" name="confirm_password" placeholder="Confirm Password">
            </div>
            <button type="submit">SIGNUP</button>
            <div class="link">
                Already a member!
                <a href="/customers/log">Login</a>
            </div>
        </form>
    </div>
</body>

</html>