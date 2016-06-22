
var _send_data = {
    send_data : function(){

        params = {
            name : $.trim($("#name").val()),
            email : $.trim($("#mail").val()),
            comment : $.trim($("#comment").val())
        };

        if(params["name"] == "" ||
           params["email"] == "" ||
           params["comment"] == ""){
            alert("You need to enter text in all three forms");
            location.reload();
        }

        var emailReg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

        if(!emailReg.test(params["email"])){
            alert("You need to enter a valid email");
            location.reload();
        }
        console.log("test");
        $.get("add_to_db.php", params, function(data){
            console.log("wunwun");

            alert(data);
            window.location.reload();

        });

    }

};
