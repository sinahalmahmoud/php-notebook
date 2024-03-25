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
          <header>New Post</header>
            <form class="loginclass" action ="/create-post" method="post">
                @csrf
                <div class="field input">
                  
                 <input type="text" name ="title" placeholder ="post title">
                </div>
                <div class="field input">
              
               <textarea name="body" placeholder="Body content ..."></textarea>
                </div>
    
                
                <button>Save Post</button>
                <a class="link" href="/" class="btn btn-primary">Go back to your posts</a>
                
            </form>
       
        </div>
        
    </div> 
</body>
</html>