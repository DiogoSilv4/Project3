// this function makes the menu animation
function showMenu(x) {
    if (document.getElementById("menu").style.left != "0.5%") {
        document.getElementById("menu").style.left = "0.5%";
        menu_opened = true;
    } else {
        document.getElementById("menu").style.left = "-300px";
        menu_opened = false;
    }

}
// this function makes the login pop up
function showLogin(x) {
    if (document.getElementById("login").style.display != "initial") {
        document.getElementById("login").style.display = "initial";
        login_opened = true;
    } else {
        document.getElementById("login").style.display = "none";
        login_opened = false;
    }
}
var reg_pass = false;
// checks if the 1st password matches the 2nd
function checkPassword() {
    if (document.getElementById("passwordOne").value != document.getElementById("passwordTwo").value) {
        alert("Second Password do not correspond with first");
        document.getElementById("passwordTwo").value = null;
        reg_pass = false;
    } else {
        reg_pass = true;
    }
}
var inter_bol = false;
var inter_rigth_side = false;
// show the rigth side options in interactivity
function showAccountInter(x) {
    var space = "15%";

    if (document.getElementById("inter_buttons").style.left != space) {
        // document.getElementById("inter_rigth_side_options").style.display = "flex";

        document.getElementById("inter_rigth_side_options").style.opacity = "1";
        document.getElementById("inter_rigth_side_options").style.visibility = "visible";


        document.getElementById("inter_buttons").style.left = space;

    }

}
// Selection of content in the interactivity user option
function showcaseInterText(x) {
    var favorite_button = document.getElementById("favorite_button"),
        quiz_button = document.getElementById("quiz_button"),
        comment_button = document.getElementById("comments_button"),
        favorite = document.getElementById("favorite"),
        quiz = document.getElementById("Quiz_Answers"),
        comment = document.getElementById("Comments");
    all = [favorite, quiz, comment];

    for (var i = 0; i < 3; i++) {
        all[i].style.display = "none";

    }

    switch (x) {
        case favorite_button:
            favorite.style.display = "inline-block";

            break;
        case quiz_button:
            quiz.style.display = "inline-block";
            break;
        case comment_button:
            comment.style.display = "inline-block";
            break;
    }

}

// Function used in the user login account options, that if is the page it just switches content, 
//but if its in another page it saves a value to be open in the other page
function openUser(x) {
    var number;
    switch (x) {
        case document.getElementById("Account"):
            number = "1";
            break;
        case document.getElementById("Interactivity"):
            number = "2";
            break;
        case document.getElementById("Stats"):
            number = "3";
            break;
    }
    localStorage.setItem("OpenUserOption", number);

    var path = window.location.pathname;
    var page = path.split("/").pop();

    if (page == "User_account.php") {
        document.getElementById("AccountPage").style.visibility = "hidden";
        document.getElementById("InteractivityPage").style.visibility = "hidden";
        document.getElementById("StatsPage").style.visibility = "hidden";
        // this ones are inside of the interactivity page
        showcaseInterText(null);
        document.getElementById("inter_rigth_side_options").style.visibility = "hidden";
        document.getElementById("inter_buttons").style.left = null;
        // to here
        switch (number) {
            case "1":
                document.getElementById("AccountPage").style.visibility = "visible";
                break;
            case "2":
                document.getElementById("InteractivityPage").style.visibility = "visible";
                break;
            case "3":
                document.getElementById("StatsPage").style.visibility = "visible";
                break;
        }
    } else {
        window.location.replace("./User_account.php");

    }
}
// Function that opens the user account page in the rigth option(account,interactivity or stats)
function choseFromUserMenu() {
    var inter = localStorage.getItem('OpenUserOption');

    var account01 = document.getElementById("AccountPage");
    var interactivity01 = document.getElementById("InteractivityPage");
    var stats01 = document.getElementById("StatsPage");
    var array01 = [account01, interactivity01, stats01];
    for (var i = 0; i < 3; i++) {
        array01[i].style.visibility = "none";
        if (i + 1 == inter) {
            array01[i].style.visibility = "visible";
        }
    }
}


// Function that makes the of the eye of the logo image follow the mouse
document.onmousemove = function() {
    var eyeball = document.getElementsByClassName("eyeball");
    var eye = document.getElementsByClassName("eye");

    var x = event.clientX * 100 / window.innerWidth + "%";
    var y = event.clientY * 100 / window.innerHeight + "%";

    eyeball[0].style.left = x;
    eyeball[0].style.top = y;

    eyeball[0].style.border = "2px solid black";
    eye[0].style.border = "2px solid rgb(15, 15, 15)";
    eye[0].style.top = "51%";

}

var menu_opened;
var login_opened;

// The next function closes the login and the menu whenever they're opened and the user clicks outside of them

document.onmouseup = function() {
    if ((menu_opened && document.elementFromPoint(event.clientX, event.clientY).className != "menu_image")) {
        document.getElementById("menu").style.left = "-300px";
    }
    if (login_opened && document.elementFromPoint(event.clientX, event.clientY).parentElement.className != "login_elements" && document.elementFromPoint(event.clientX, event.clientY).className != "login_image") {
        document.getElementById("login").style.display = "none";
    }
}



function categoryClicked(x) {
    var IsCategoryClicked = true;

    localStorage.setItem("currentCategory", x);

    localStorage.setItem("IsCategoryClicked", IsCategoryClicked);
    window.location.replace("./Theories_List.php");


}

function WasCategoryClicked() {
    var IsCategoryClicked = localStorage.getItem('IsCategoryClicked');
    var whichCategory;
    if (IsCategoryClicked == "true") {
        whichCategory = localStorage.getItem('currentCategory');
        IsCategoryClicked = false;
        localStorage.setItem("IsCategoryClicked", IsCategoryClicked);
    }
    return whichCategory;
}
// creates a cookie with the theory id, to open it on the next page
function theoryClicked(x) {
    document.cookie = "idTheory = " + x;
    sessionStorage.setItem("theoryClicked", x);
    window.location.replace("./Theory.php");
}

// logout function, that logouts the user from his account
function LogOut() {
    sessionStorage.setItem("username", '');
    sessionStorage.setItem("user_id", '');

    if (window.location.pathname == '/Repository/project3/User_account.php') {
        window.location.replace("./index.php");
    } else {
        location.reload();
    }
}
// Login function that logins the user into their account with the email and password
function getUser() {
    var email = document.getElementById("emaiLogin").value;
    var password = document.getElementById("passLogin").value;

    var name = '';
    $.ajax({
        type: "GET",
        url: "./services/login.php",
        data: { email: email, password: password }, // passing the values
        success: function(res) {
            name = res;
            if (name == 'Password is wrong') {
                alert(name);
                name = '';
            }
            if (name == 'Email not found') {
                alert(name);
                name = '';
            }
            if (name != null && name != '') {
                // sessionStorage.setItem("username", name);
                var data = [];
                data = JSON.parse(name);
                alert('Welcome back ' + data[0]['username']);
                sessionStorage.setItem("username", data[0]['username']);
                sessionStorage.setItem("user_id", data[0]['user_id']);

            }

        }
    });
}
// function that registers a user in the database
function registerUser() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("emailReg").value;
    var password = document.getElementById("passwordOne").value;
    var rex = '';
    if (reg_pass) {

        $.ajax({
            type: "POST",
            url: "./services/signup.php",
            data: { name: username, email: email, password: password }, // passing the values
            success: function(res) {
                rex = res;
                if (rex == 'Email already in use') {
                    alert(rex);
                    rex = '';
                }
                if (rex == 'Username already taken') {
                    alert(rex);
                    rex = '';
                }
                if (rex != null && rex != '') {
                    alert('Registration succesfull. Welcome to the community ' + rex + '. Login afterwards to enter in your account.');
                } else {
                    alert('Registration unsuccesfull. Please try again');
                }

            }
        });

    }
}

// function to change the username
function changeUsername() {
    var username = document.getElementById("newUsername").value;

    var rex = '';
    var id = sessionStorage.getItem("user_id");

    if (username == null || username == '') {
        alert('Username needed');
    } else {
        $.ajax({
            type: "POST",
            url: "./services/changeUsername.php",
            data: { name: username, id: id }, // passing the values
            success: function(res) {
                rex = res;
                if (rex == 'Username Taken') {
                    alert(rex);
                    rex = '';
                } else if (rex != null && rex != '') {
                    sessionStorage.setItem("username", rex);
                    alert('Change Successfull. You change your username to ' + rex);
                    location.reload();
                } else {
                    alert('Change Unsuccessfull. Try again.');
                }

            }
        });
    }
}
// function to change the password
function passwordChange() {
    var oldPassword = document.getElementById("OldPassword").value;
    var newPassword = document.getElementById("NewPassword").value;
    var newPasswordRepeat = document.getElementById("NewPasswordRepeat").value;
    if (newPassword != newPasswordRepeat) {
        alert("Second Password do not correspond with first");
        newPasswordRepeat = null;
        document.getElementById("NewPasswordRepeat").value = null;
    }
    var id = sessionStorage.getItem("user_id");

    if (oldPassword == null || oldPassword == '' || newPassword == null || newPassword == '' || newPasswordRepeat == null || newPasswordRepeat == '') {
        alert('Please fill all the requirements');

    } else {
        var rex = '';
        $.ajax({
            type: "POST",
            url: "./services/changePassword.php",
            data: { id: id, old_password: oldPassword, new_password: newPassword }, // passing the values
            success: function(res) {
                rex = res;
                if (rex == 'Old Password is wrong') {
                    alert(rex);
                    rex = '';
                }
                if (rex != null && rex != '') {
                    alert('Change Successfull.');
                }
            }
        });
    }
}
// function to delete the user account
function deleteAccountForever() {

    var id = sessionStorage.getItem("user_id");

    sessionStorage.setItem("username", '');

    $.ajax({
        type: "POST",
        url: "./services/deleteAccount.php",
        data: { id: id }, // passing the values
        success: function(res) {
            rex = res;
            if (rex == 'Account Deleted Unsuccessfully. Please try again') {
                alert(rex);
            } else if (rex != null && rex != '') {
                alert('Account Deleted Successfully');
                window.location.replace("./index.php");
            }
        }
    });
}
// function to write a comment and post it in the database
function writeComent() {
    var userID = sessionStorage.getItem("user_id");
    var text = document.getElementById('commentArea').value;
    var theoryID = sessionStorage.getItem('theoryClicked');

    var today = new Date();
    var date = new String();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = String(today.getFullYear());
    today = yyyy + '.' + mm + '.' + dd;
    date = today;
    console.log(text);

    if (userID != null && userID != '') {
        $.ajax({
            type: "POST",
            url: "./services/writeComment.php",
            data: { comment: text, date: date, userID: userID, theoryID: theoryID }, // passing the values
            success: function(res) {
                rex = res;
                // alert(rex);
                if (rex == 'We were unable to post your comment. Please try again') {
                    alert(rex);
                } else if (rex != null && rex != '') {
                    // alert('Comment');
                    // location.reload();
                }
            }
        });
    } else {
        alert('You have to create an account in order to comment on theories');
    }
}


var logged = false;
var username = null;
// function that checks the user connection and saves the values in session storage and send the user id to php in a cookie
function checkUserConnection() {

    var getUsername = sessionStorage.getItem("username");
    console.log(getUsername);

    if (getUsername == null || getUsername == '') {
        //When the user is logged out
        sessionStorage.setItem("user_id", '');
    } else {
        // when the user is logged in
        logged = true;
        username = getUsername;
    }

    var IDfromUser = sessionStorage.getItem("user_id");
    console.log(IDfromUser);

    document.cookie = "user_id = " + IDfromUser;
}

//user account.php , it opens the tab into the theory
function tabOpener(id) {
    theoryClicked(id);
    window.location.replace("./Theory.php");
}
//toggle the favorite theory that is clicked and changes the color of the favorite star depending on which page the user is
function ToogleFavoriteTheory(user, theory, number) {

    if (window.location.pathname == '/Repository/project3/User_account.php') {
        var star = document.getElementsByClassName('fa fa-star')[number];
        if (star.style.color != 'black') {
            star.style.color = 'black';
        } else {
            star.style.color = 'yellow';
        }
    } else if (window.location.pathname == '/Repository/project3/Theory.php') {
        var star = document.getElementById("favoryte");
        if (star.style.color == 'yellow') {
            star.style.color = 'black';
        } else {
            star.style.color = 'yellow';
        }
    }

    var userID = user;
    var theoryID = theory;

    $.ajax({
        type: "POST",
        url: "./services/toggleFavorite.php",
        data: { user_id: userID, theory_id: theoryID }, // passing the values
        success: function(res) {
            rex = res;
            if (rex == 'Connection is not working. Please try again') {
                alert(rex);
            } else if (rex != null && rex != '') {
                // alert('');
                // window.location.replace("./index.php");
            }
        }
    });
}
//creates an array of theories -randomized- and starts the quiz
function quizStart() {

    var Username = sessionStorage.getItem("username");
    if (Username == null || Username == '') {
        alert('You must be logged in, in order to access the Quiz. If you still don´t have an account, what are you waiting for ');
    } else {

        sessionStorage.setItem('quizhasStarted', 'true');
        sessionStorage.setItem('questionNumber', 0);
        $.ajax({
            type: "GET",
            url: "./services/startQuiz.php",
            data: {}, // passing the values
            success: function(res) {
                rex = res;

                if (rex != null && rex != '') {
                    sessionStorage.setItem('questionsArray', rex);
                    // alert(rex);
                }
            }
        });

        location.reload();

    }
}
//set the values to empty and false and closes the quiz
function closeQuiz() {
    sessionStorage.setItem('quizhasStarted', 'false');
    sessionStorage.setItem('questionNumber', '');
    sessionStorage.setItem('questionsArray', '');
    location.reload();
}
// passes on to the next question
function nextQuestion(answer, theory_id) {

    var userID = sessionStorage.getItem('user_id');
    var today = new Date();
    var date = new String();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = String(today.getFullYear());
    today = yyyy + '.' + mm + '.' + dd;
    date = today;

    $.ajax({
        type: "POST",
        url: "./services/postQuizAnswer.php",
        data: { user_id: userID, theory_id: theory_id, answer_date: date, answer: answer }, // passing the values
        success: function(res) {
            rex = res;
            if (rex == 'We were unable to post your answer. Please try again') {
                alert(rex);
            } else if (rex != null && rex != '') {
                // alert('Success + ' + rex);
                var currentQuestion = parseInt(sessionStorage.getItem('questionNumber'));
                var nextQuestion = currentQuestion + 1;
                sessionStorage.setItem("questionNumber", nextQuestion);
                location.reload();
            }
        }
    });


}
//closes the quiz
function QuizEnd(currentQuestion, QuestionsNumber) {

    if (parseInt(currentQuestion) == QuestionsNumber) {
        console.log(parseInt(currentQuestion));
        console.log(QuestionsNumber);

        alert('Quiz has ended');
        closeQuiz();
    }
}
// creates the percentages to post it on the theories page
function GetPercentages() {
    var theoryID = sessionStorage.getItem('theoryClicked');
    var rex;
    $.ajax({
        type: "GET",
        url: "./services/getPercentages.php",
        data: { theoryID: theoryID }, // passing the values
        success: function(res) {
            rex = res;
            // alert(rex);
            if (rex == 'Unable to get percentages on the community') {
                alert(rex);
                rex = '';
            } else if (rex != null && rex != '') {
                var believers = parseInt(rex);
                var nonbelievers = 100 - believers;

                document.getElementById('believers').style.width = believers + '%';
                document.getElementById('nonbelievers').style.width = nonbelievers + '%';
                document.getElementById('beliversNumber').innerHTML = believers + '%';
                document.getElementById('UnbeliversNumber').innerHTML = nonbelievers + '%';
                if (believers >= 96) {
                    document.getElementById('believers').style.borderRadius = "40px";
                }
                if (nonbelievers >= 96) {
                    document.getElementById('nonbelievers').style.borderRadius = "40px";
                }

            }

        }
    });

}