

<!-- NAVIGATION BAR -->

<nav>
    <div class="nav_bar">
        <!-- left side menu button -->
        <div class="menu_button" onclick="showMenu(this)">
            <img class="menu_image" src="./Buttons/btn_menu.jpg">
        </div>
        <!-- left side menu -->
        <div id="menu">
            <a href="./index.php">
                <p>Home</p>
                <div class="MENU_images">
                    <img src="./Buttons/home_button cópia.jpg" class="menu_images">
                </div>
            </a>
            <a href="./Theories_List.php">
                <p>Theories</p>
                <div class="MENU_images">

                    <img src="./Buttons/theori_button.jpg" class="menu_images">
                </div>
            </a>
            <a href="./Categories.php">
                <p>Categories</p>
                <div class="MENU_images">
                    <img src="./Buttons/categories_button.jpg" class="menu_images">
                </div>
            </a>
            <a href="./Quiz.php">
                <p>Quiz</p>
                <div class="MENU_images">
                    <img src="./Buttons/quiz_button.jpg" class="menu_images">
                </div>
            </a>
            <a href="./About_00.php">
                <p>About</p>
                <div class="MENU_images">
                    <img src="./Buttons/about_button.jpg" class="menu_images">
                </div>
            </a>
        </div>

        <!-- rigth side login button -->
        <div class="login" onclick="showLogin(this)">
            <img class="login_image" src="./Buttons/Login_Button.jpg">
        </div>
        <!-- rigth side login menu -->
        <div id="login" class="animateLogin">
            <!-- Before the user login is account -->
            <div id="Logged_OUT" class="login_elements">
                <form  method="post" class="login_elements">
                    <br>
                    <label for='email'>Email</label>
                    <input type='text' placeholder='Enter Email' id='emaiLogin' name='email' required><br><br>
                    <label for='pass'>Password</label>
                    <input type='password' placeholder='Enter Password' id='passLogin' name='pass' required><br><br>
                    <button class='submit' onclick='getUser();'>Submit</button>
                    <br>
                </form>
                <p>New? <u onclick="document.getElementById('register').style.display='block'">Register Now</u></p>
            </div>

            <!-- After the user login is account -->
            <div id="Logged_IN" class="login_elements">
                <p class="login_elements" id="greetings">Welcome, <u id ='showName'></u></p>
                <div class="login_elements">
                    <a id="user_options" >
                        <p id="Account" onclick="openUser(this);">Account</p>
                        <p id="Interactivity" onclick="openUser(this);">Interactivity</p>
                        <p id="Stats" onclick="openUser(this);">Stats</p>
                    </a>

                    <p id="logout_button" onclick="LogOut();">Logout</p>
                </div>
            </div>
        </div>
        <!-- LOGO -->
        <a href="./index.php">
            <div class="logo">
                <img src="./Images/logo_2.0.jpg">
                <div class="eye">
                    <div class="eyeball"></div>
                </div>
            </div>
        </a>
    </div>
</nav>
<!-- Register -->
<div id="register" class="modal">

    <form  method= "post" class="modal-content animate">


        <div class="container">
            <label for="uname"><b>Enter Username</b></label>
            <input type="text" id='username' placeholder="Username" name="uname"  required>

            <label for="uname"><b>Enter Email</b></label>
            <input type="text" id='emailReg' placeholder="Username" name="uname"  required>

            <label for="psw"><b>Enter Password</b></label>
            <input id="passwordOne" type="password" placeholder="Password" name="psw"   required>
            <label for="2nd_psw"><b>Enter Password Again</b></label>
            <input id="passwordTwo" type="password" placeholder="Password" name="2nd_psw"  required>
            
            <button onclick="checkPassword();registerUser();" class="registerbtn" >Register</button>
        </div>

        <div class="container" style="background-color:#4b4242">
            <button type="button" onclick="document.getElementById('register').style.display='none'" class="cancelbtn">Cancel</button>

        </div>
    </form>
</div>
<script>
// changes the login menu into logged in and logged out layout
if(logged){
    document.getElementById("Logged_OUT").style.display = "none";
    document.getElementById("showName").textContent = username; // write the username on the logged in layout
}else{
    document.getElementById("Logged_OUT").style.display = "block";
    document.getElementById("Logged_IN").style.display = "none";
}
</script>
