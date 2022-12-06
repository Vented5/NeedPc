function message(){
    
    var element = document.getElementById("home");

    element.innerHTML = "<form action='../php/update_user.php' method='POST' enctype='multipart/form-data'>" +
        "<div ><label for='user_image'>Change Image</label>" +
        "<input type='file' name='file'/></div><br>" +
        "<label for='username'>Username</label>" +
        "<input type='text' name='ch-username' id='ch-username' placeholder='HuskyPresident64'><br>" +
        "<label for='password'>Password</label>" +
        "<input type='password' name='ch-user-pwd' id='ch-user-pwd' placeholder='*******'><br>" +
        "<label for='confirm-password'>Confirm Password</label>" +
        "<input type='password' name='confirm-ch-user-pwd' id='confirm-ch-user-pwd' placeholder='******'><br>" +
        "<button class='file btn btn-lg btn-primary'>Submit</button>"+                                
    "</form>";

}
