<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
@auth
<!----------nav cntainer----->

    <div id="blog-navigation ">
        <div class =" nav-content ">
            <form class="logou" action="/logout" method="POST">
                @csrf
                <button>logout</button>
            </form>

             <p><a href="/create-new-post">new post</a></p>
                
        </div>

    </div>

<!------blog-container------->
<div class="blog-container">
  
    <div class="blog-box">
        @if(count($posts) > 0)
        @foreach ($posts as $post)
        <div class="post">
        <h3 class="post-title">{{$post['title']}}</h3>
           <p class="post-body"> {{$post['body']}}</p>
           <div class ="post-button">
            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action ="/delete-post/{{$post->id}}" method="post">
                @csrf
                @method('DELETE')
                <button>delete</button>
            </form>
           </div>
        </div>

        @endforeach
     
        @else
        <p class="no-post">Ooops! No posts available.</p>
        @endif
        
    </div>
        

        
    @else
    <div class="login-container blog-container">
     <div class="login blog-box" >
      <header>Login</header>
        <form class="loginclass" action ="/login" method="post">
            @csrf
            <div class="field input">
             <label for = "loginname">Username</label>  
             <input name="loginname" type ="text" placeholder="name" required>
            </div>
            <div class="field input">
              <label for = "loginpassword">password</label>
              <input name="loginpassword" type ="password" placeholder="password" required>
            </div>
             <button>log in</button>
             <span>New User? Do you want to </span> 
             <a class="link" href="/create-new-user" class="btn btn-primary">Register</a>
        </form>
   
      </div>
    
    </div>          
    @endauth
</div>
</div>
 
</body>
</html>