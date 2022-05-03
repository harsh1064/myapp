<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                 integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                 crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<form action="http://127.0.0.1:8000/home" method="post">
  @csrf
<div class="container">
  <h3>Login:</h3>
  <div class="container">
  
  <div class="form-group">
            <label>Email: </label>
            <input type="text" class="form-control" name="email" placeholder="email"/>
            <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </span>
        
        </div> 

        <div class="form-group">
            <label>Password: </label>
            <input type="password" class="form-control" name="password" placeholder="password"/>
            <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror
            </span>
           
        </div> 

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Login </button>
        </div> 

  </form>
  </div>
</div>
</body>
</html>