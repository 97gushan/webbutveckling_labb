
var _send_data = {
    register_user : function(text){

        var params = {
            email : $.trim($("#mail").val()),
            pass : $.trim($("#pass").val()),
            salt : text
        };

        $.get("database/add_to_db.php", params, function(data){
            if(data == 1){
                alert("Registration sucessfull");
                window.location.assign("index.php");
            }else if(data == 0){
                alert("Registration failed");
            }else{
                alert("Program crashed");
            }
        });

    },

    login_user : function(){

        var params = {
            email : $.trim($("#mail").val()),
            pass : $.trim($("#pass").val())
        }

        $.get("database/retrieve_from_db.php", params, function(data){
            alert(data);
            window.location.assign("index.php");
        });
    },

    log_out : function(){
        $.get("database/log_out.php", function(data){
            window.location.reload();
        });
    }

};
