<div type="text" id="log">
        <div type="text" id="logform">
            <label color="blue" for="username">Username</label>
            <input type="text" id="username" />
            <br/>
            <label for="password">Password</label>
            <input type="password" id="password" />
            <br/>
            <input type="submit" id="submit" value="login">
            <br/>
        </div>
        <input type="submit" id="logout_submit" value="logout" style="display:none">
        <input type="submit" id="registerButton" value="register">
        
        <div id="infoSQL"></div>
</div>
<div type="text" id="form_container" method="post" style="display:none">
    <div class="field">
        <label for="regusername">Choose a username</label>
        <input type="text" name="regusername" id="regusername" value="">
    </div>
    <div class="field">
        <label for="regpassword">Choose a password</label>
        <input type="password" name="regpassword" id="regpassword" value="">
    </div>
    <div class="field">
        <label for="regpassword_again">Enter your password again</label>
        <input type="password" name="regpassword_again" id="regpassword_again">
    </div>
    
    <input type="submit" id="register_submit" value="Register">
</div>
