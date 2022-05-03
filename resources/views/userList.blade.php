
<html>
    <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                 integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                 crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <h1>User Details:</h1>

        <table class="table table-stripped">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
                     @foreach($user as $k)
                        <tr>
                                <td> {{$k['name']}} </td>
                                <td> {{$k['email']}} </td>
                                <td> 
                                    <a href="{{route('user.edt',$id=$k['id'])}}"> 
                                        
                                        <button class="btn btn-danger" name="edt">Edit</button>
                                    </a> 
                                </td>

                                <td> 
                                    <a href="{{route('user.del',$id=$k['id'])}}"> 
                                        
                                        <button class="btn btn-danger" name="del">Delete</button>
                                    </a> 
                                </td>

                       </tr>
                      @endforeach    
        </table>

        <center>
            <a href="{{route('user.add')}}">
                <button class="btn btn-purple" name="add">Add</button>
            </a>
            </center>

        </div>
    </body>
</html>