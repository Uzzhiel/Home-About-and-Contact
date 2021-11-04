<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Contact Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>  


     <form id="myForm" class="contact-form">
    <h4 style="color:  #696969; font-style: oblique;" class="sent-notification"></h4>
    <center> <h3 style="color: green; ; "> Message Us!</h3> </center>
        <br>
    
            <input id="name" class=text-box  type="text" placeholder="Enter Name">
            <input id="email" class=text-box  type="text" placeholder="Enter Email">
            <input id="subject" class=text-box  type="text" placeholder="Enter subject">
            <textarea style="Background: whitesmoke" id="body" rows="5" placeholder="Type Message"></textarea>
            <br>
            <button type="button" class="send-btn" onclick="sendEmail()" value="Send An Email">Submit</button> 
              
      </form>


	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>