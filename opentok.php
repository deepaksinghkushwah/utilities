<html>
  <head>
    <title>Opentok Quick Start</title>
    <script src='http://static.opentok.com/webrtc/v2.2/js/opentok.min.js'></script>
    <script type="text/javascript">
      // Initialize API key, session, and token...
      // Think of a session as a room, and a token as the key to get in to the room
      // Sessions and tokens are generated on your server and passed down to the client
      var apiKey = "45091112";
      var sessionId = "2_MX40NTA5MTExMn5-MTQxNjU0NzY5MzUzM35aQUlFc1h5SWxRdmFNazhuQ0ZaQUU5Vm1-fg";
      var token = "T1==cGFydG5lcl9pZD00NTA5MTExMiZzaWc9ZTcxYjc5OWE1Zjg3NGFhODMzOTgwMGM3MjY3NGVmYjMyZjVmN2FmMTpyb2xlPXB1Ymxpc2hlciZzZXNzaW9uX2lkPTJfTVg0ME5UQTVNVEV4TW41LU1UUXhOalUwTnpZNU16VXpNMzVhUVVsRmMxaDVTV3hSZG1GTmF6aHVRMFphUVVVNVZtMS1mZyZjcmVhdGVfdGltZT0xNDE2NTQ3NzIwJm5vbmNlPTAuOTMxMTY0NDI1Nzk3NDI3MQ==";

      // Initialize session, set up event listeners, and connect
      var session = OT.initSession(apiKey, sessionId);
 
      session.on("streamCreated", function(event) {
        session.subscribe(event.stream);
      });
     
      session.connect(token, function(error) {
        var publisher = OT.initPublisher();
        session.publish(publisher);
      });
    </script>
  </head>
  <body>
    <h1>Awesome video feed!</h1>
    <div id="myPublisherDiv"></div>
  </body>
</html>

