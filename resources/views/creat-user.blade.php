<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/css/register.css')}}" rel="stylesheet" type="text/css" >
    <title>Document</title>
</head>
<body>
    <section id="blog">
        <div class ="blog-heading">
            <span>welcom to the note book</span>
            <img src="assets/images/notebook.png" alt="My Image">
        </div>
    </section>

    <div class="login-container blog-container">
        <div class="login blog-box" >
          <header>New User</header>
            <form class="loginclass" action ="/register" method="post">
                @csrf
                <div class="field input">
                    <label for = "loginname">Username</label>  
                    <input type="text" id="name" name="name" placeholder="name" required><br>
                </div>
                <div class="field input">
                    <label for = "loginname">Email</label>  
                    <input type="email" id="email" name="email"  placeholder="email" required ><br>
                </div>
                <div class="field input">
                    <label for = "loginname">Password</label>  
                    <input type="password" id="password" name="password"  placeholder="password" required><br>
                </div>
    
                
                <button type="submit">Submit</button>
                <a class="link" href="/" class="btn btn-primary">Go back to the home</a>
                
            </form>
       
        </div>
        
    </div> 
   
</body>
</html>