import { Inviter, SessionState, UserAgent } from "sip.js";

// Create user agent instance (caller)
const userAgent = new UserAgent({
  uri: UserAgent.makeURI("sip:alice@example.com"),
  transportOptions: {
    server: "wss://sip.example.com"
  },
});

// Connect the user agent
userAgent.start().then(() => {

  // Set target destination (callee)
  const target = UserAgent.makeURI("sip:bob@example.com");
  if (!target) {
    throw new Error("Failed to create target URI.");
  }

  // Create a user agent client to establish a session
  const inviter = new Inviter(userAgent, target, {
    sessionDescriptionHandlerOptions: {
      constraints: { audio: true, video: false }
    }
  });

  // Handle outgoing session state changes
  inviter.stateChange.addListener((newState) => {
    switch (newState) {
      case SessionState.Establishing:
        // Session is establishing
        break;
      case SessionState.Established:
        // Session has been established
        break;
      case SessionState.Terminated:
        // Session has terminated
        break;
      default:
        break;
    }
  });

  // Send initial INVITE request
  inviter.invite()
    .then(() => {
      // INVITE sent
    })
    .catch((error: Error) => {
      // INVITE did not send
    });

});


// Create our JsSIP instance and run it:
//var jssip = new JsSIP();
/*var socket = new JsSIP.WebSocketInterface('wss://172.18.0.2');
var configuration = {
  sockets  : [ socket ],
  uri      : 'sip:1000@172.18.0.2',
  password : 'pbx1000',
};

var ua = new JsSIP.UA(configuration);

ua.start();

// Register callbacks to desired call events
var eventHandlers = {
  'progress': function(e) {
    console.log('call is in progress');
  },
  'failed': function(e) {
    console.log('call failed with cause: '+ e.data.cause);
  },
  'ended': function(e) {
    console.log('call ended with cause: '+ e.data.cause);
  },
  'confirmed': function(e) {
    console.log('call confirmed');
  }
};

var options = {
  'eventHandlers'    : eventHandlers,
  'mediaConstraints' : { 'audio': true, 'video': true }
};

var session = ua.call('sip:bob@example.com', options);
*/
/*var callBtn = document.getElementById("callBtn");
var remoteVideo = document.getElementById("remoteVideo");
var localVideo = document.getElementById("localVideo");

callBtn.addEventListener("click", sipCall);

var userAgent = new SIP.UA({
  uri: "sip:1000@172.18.0.2",
  wsServers: "wss://172.18.0.2",
  password: "pbx1000",
  displayName: "phablor1"
});

function sipCall() {
  var session = userAgent.invite(
    "sip:" + document.getElementById("nvoip-uri").value + "@172.18.0.2"
  );

  var pc;

  session.on("trackAdded", function() {
    // We need to check the peer connection to determine which track was added

    pc = session.sessionDescriptionHandler.peerConnection;

    // Gets remote tracks
    var remoteStream = new MediaStream();
    pc.getReceivers().forEach(function(receiver) {
      remoteStream.addTrack(receiver.track);
    });
    remoteVideo.srcObject = remoteStream;
    remoteVideo.play();

    // Gets local tracks
    var localStream = new MediaStream();
    pc.getSenders().forEach(function(sender) {
      localStream.addTrack(sender.track);
    });
    localVideo.srcObject = localStream;
    localVideo.play();
  });
}

userAgent.on("invite", function(session) {
  console.warn("invite");
  session.accept();
  var pc;

  session.on("trackAdded", function() {
    // We need to check the peer connection to determine which track was added

    pc = session.sessionDescriptionHandler.peerConnection;

    // Gets remote tracks
    var remoteStream = new MediaStream();
    remoteVideo.srcObject = remoteStream;
    remoteVideo.play().then(() => {
      pc.getReceivers().forEach(function(receiver) {
        remoteStream.addTrack(receiver.track);
      });
    });

    // Gets local tracks
    var localStream = new MediaStream();
    pc.getSenders().forEach(function(sender) {
      localStream.addTrack(sender.track);
    });
    localVideo.srcObject = localStream;
    localVideo.play();
  });
});*/