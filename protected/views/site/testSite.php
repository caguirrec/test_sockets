<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'WebSocketServer.php';

$chat = new WebsocketChat();
// new WebSocketServer( socket address, socket port, callback function )
$webSocket = new WebSocketServer("84.38.67.247", 8081, array($chat, 'process'));
$webSocket->run();



?>
<!doctype HTML>   

<html>
     <head>
      <script type="text/javascript">
         function WebSocketTest()
         {
            if ("WebSocket" in window)
            {
               alert("WebSocket is supported by your Browser!");
               
               // Let us open a web socket
               var ws = new WebSocket("ws://localhost:9998/echo");
                                    
               ws.onopen = function()
               {
                  // Web Socket is connected, send data using send()
                  ws.send("Message to send");
                  alert("Message is sent...");
               };
				
               ws.onmessage = function (evt) 
               { 
                  var received_msg = evt.data;
                  alert("Message is received...");
               };
				
               ws.onclose = function()
               { 
                  // websocket is closed.
                  alert("Connection is closed..."); 
               };
            }
            
            else
            {
               // The browser doesn't support WebSocket
               alert("WebSocket NOT supported by your Browser!");
            }
         }
      </script>
		
   </head>
   <body>
   
      <div id="sse">
         <a href="javascript:WebSocketTest()">Run WebSocket</a>
      </div>
      
   </body>
</html>