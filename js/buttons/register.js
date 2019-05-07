$("#register_submit").click(function(){
    var regusername = $("#regusername").val();
    var regpassword = $("#regpassword").val();
    var regpassword_again = $("#regpassword_again").val();
    
    $("#form_container").next().toggle(250);
    
    if(regpassword != regpassword_again){
        $('#infoSQL').text("password does not match, please try again");
        regpassword = $("#regpassword").val('');
        regpassword_again = $("#regpassword_again").val('');
    } 
    else{
$.post('php_pages/register.php',{regusername: regusername, regpassword: regpassword},function(data){
            $('#infoSQL').text(data.msg);
            if(data.loggedin == "true"){
                registerButton.hide();
                formcontainer.hide();
                SaveLoadOutput.show();
                $("#regusername").val('');
                $("#regpassword").val('');
                $("#regpassword_again").val('');
                $("#name").val('');
            }
        },'json');
    }
});
formcontainer.hide(); 
 $("#registerButton").click(function(){
     formcontainer.toggle();
 });