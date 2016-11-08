<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <script>
      function init(){    
          var theObject = new XMLHttpRequest();

          theObject.open("POST", "javascript.php", true);
          theObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

          theObject.onreadystatechange = function(){
            if(theObject.readyState == 4 && theObject.status == 200){
              document.getElementById("container").innerHTML = theObject.responseText;      
            }
          }

          theObject.send("username=Edwin&password=Secret");
      }
    </script>
    <button onclick="init()">Send Info</button>
    <div id="container">
        
    </div>
  </body>
</html>
