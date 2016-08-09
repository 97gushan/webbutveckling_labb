
var _send_data = {
    send_data : function(){

        // Values entered by the user
        params = {
            name : $.trim($("#name").val()), // Trim all three from whitespace in the begginging or end of the string
            email : $.trim($("#mail").val()),
            comment : $.trim($("#comment").val())
        };

        // Check so they are not empty
        if(params["name"] == "" ||
            params["email"] == "" ||
            params["comment"] == ""){
            alert("You need to enter text in all three forms");
            location.reload();
        }

        // Check so the email is a valid one
        var emailReg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

        // if it is not make and alert and reload page
        if(!emailReg.test(params["email"])){
            alert("You need to enter a valid email");
            location.reload();
        }

        // use a HTTP GET to call the php script that inserst values in the db
        $.get("add_to_db.php", params, function(data){

            window.location.reload();

        });

    }

};
