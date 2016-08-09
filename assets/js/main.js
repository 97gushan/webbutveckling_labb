
var _send_data = {
    register_user : function(text){

        var params = {
            email : $.trim($("#mail").val()),
            pass : $.trim($("#pass").val()),
            salt : text
        };

        $.get("add_to_db.php", params, function(data){
            if(data == 1){
                alert("Registration sucessfull");
                window.location.assign("index.php");
            }else{
                alert("Registration failed");
            }
        });

    }

};
