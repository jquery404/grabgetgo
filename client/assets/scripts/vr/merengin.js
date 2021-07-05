const configuration = {
  "iceServers": [{
          "urls": "stun:stun.l.google.com:19302"
      },
      // public turn @ https://gist.github.com/sagivo/3a4b2f2c7ac6e1b5267c2f1f59ac6c6b
      // {
      //     url: 'turn:192.158.29.39:3478?transport=udp',
      //     credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
      //     username: '28224511:1379330808'
      // },
      {
          url: 'turn:numb.viagenie.ca',
          credential: 'jquery404@gmail.com',
          username: 'Pot64hook'
      },
      
  ]
}

// call by af
function onConnect () {
  console.log("onConnect", new Date());
  if (isHosting) HostInit();
  else GuestInit();

  fetch('../data/questionlist.json')
    .then(res => { return res.json() })
    .then(data => {questionList = data; console.log(questionList); })
}

function startVideo() {
  if (navigator.mediaDevices.getUserMedia) {
      navigator.getUserMedia({video: true, audio: false},

      function (stream) {
        const video = document.createElement('video');
        video.setAttribute('id', 'hostVideo');
        video.setAttribute('autoplay', true);
        video.setAttribute('playsinline', true);
        video.setAttribute('muted', true);
        video.srcObject = stream;
        document.querySelector('body').appendChild(video); 

        let skybox = document.querySelector("a-sky");
        skybox.setAttribute('src', '#hostVideo');
      },

      function (err) {
          console.log("The following error occured: " + err);
      });
  }
}

function changeVideoSrc(devId){
  navigator.mediaDevices.getUserMedia({video: {deviceId: {exact: devId}}, audio:toggleMute})
      .then(function(stream){
          var video = document.querySelector("#myVideo");
          video.srcObject = stream;
          video.play();
          localStream = stream;
      })
      .catch(function(err){
          console.log(err);
      });
}


NAF.schemas.add({
  template: '#avatar-template', 
  components: [
    'position', 
    'rotation',
    {
      selector: '.nametag',
      component: 'text',
      property: 'value'
    }
  ]
});

NAF.schemas.add({template: '#player-template', components: ['position', 'rotation']});
NAF.schemas.add({template: '#hand-template', components: ['position', 'rotation']});
NAF.schemas.add({template: '#body-template', components: ['position', 'rotation', 'visible']});
NAF.schemas.add({template: '#video-template', components: ['position']});
// On mobile remove elements that are resource heavy
const isMobile = AFRAME.utils.device.isMobile();
if (isMobile) {
  // TODO 
}




let socket;

// broadcaster 
const peers = {};
const videoElement = document.querySelector("video");
const audioSelect = document.querySelector("select#audioSource");
const videoSelect = document.querySelector("select#videoSource");

function HostInit() {
    socket = io()
    
    getStream().then(getDevices).then(gotDevices);

    socket.on('watcher', id => {
        const peerConnection = new RTCPeerConnection(configuration);
        peers[id] = peerConnection;
    
        let stream = videoElement.srcObject;
        stream.getTracks().forEach(track => peerConnection.addTrack(track, stream));
    
        peerConnection.onicecandidate = event => {
            if (event.candidate) {
                socket.emit('candidate', id, event.candidate);
            }
        };
    
        peerConnection.createOffer()
            .then(sdp => peerConnection.setLocalDescription(sdp))
            .then(() => {
                socket.emit('offer', id, peerConnection.localDescription);
            });
    });

    socket.on('answer', (id, description) => {
        peers[id].setRemoteDescription(description);
    });

    socket.on('candidate', (id, candidate) => {
        peers[id].addIceCandidate(new RTCIceCandidate(candidate));
    });

    socket.on('disconnectPeer', id => {
        peers[id].close();
        delete peers[id];
    });
}

function getDevices() {
  return navigator.mediaDevices.enumerateDevices();
}

function gotDevices(deviceInfos) {
  window.deviceInfos = deviceInfos;
  for (const deviceInfo of deviceInfos) {
    const option = document.createElement("option");
    option.value = deviceInfo.deviceId;
    if (deviceInfo.kind === "audioinput") {
      option.text = deviceInfo.label || `Microphone ${audioSelect.length + 1}`;
      audioSelect.appendChild(option);
    } else if (deviceInfo.kind === "videoinput") {
      option.text = deviceInfo.label || `Camera ${videoSelect.length + 1}`;
      videoSelect.appendChild(option);
    }
  }
}

function getStream() {
  if (window.stream) {
    window.stream.getTracks().forEach(track => {
      track.stop();
    });
  }
  const audioSource = audioSelect.value;
  const videoSource = videoSelect.value;
  const constraints = {
    audio: { deviceId: audioSource ? { exact: audioSource } : undefined },
    video: { deviceId: videoSource ? { exact: videoSource } : undefined }
  };
  return navigator.mediaDevices
    .getUserMedia(constraints)
    .then(gotStream)
    .catch(handleError);
}

function gotStream(stream) {
  window.stream = stream;
  audioSelect.selectedIndex = [...audioSelect.options].findIndex(
    option => option.text === stream.getAudioTracks()[0].label
  );
  videoSelect.selectedIndex = [...videoSelect.options].findIndex(
    option => option.text === stream.getVideoTracks()[0].label
  );
  videoElement.srcObject = stream;
  videoElement.play();
  
  socket.emit("broadcaster");
}

function handleError(error) {
  console.error("Error: ", error);
}


// Viewer
let peer;
const video = document.querySelector("video");


function GuestInit() {
    socket = io()

    socket.on('broadcaster', () => {
        socket.emit('watcher');
    })

    socket.on('candidate', (id, candidate) => {
        peer
          .addIceCandidate(new RTCIceCandidate(candidate))
          .catch(e => console.error(e));
    })

    socket.on('offer', (id, description) => {
        peer = new RTCPeerConnection(configuration);
        peer.setRemoteDescription(description)
            .then(() => peer.createAnswer())
            .then(sdp => peer.setLocalDescription(sdp))
            .then(() => {
                socket.emit('answer', id, peer.localDescription);
            });
        peer.ontrack = event => {
          video.srcObject = event.streams[0];
          video.play();
        };
        peer.onicecandidate = event => {
          if (event.candidate) {
            socket.emit('candidate', id, event.candidate);
          }
        };
    })

}

