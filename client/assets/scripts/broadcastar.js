let socket;
let broadcasterStream;
const peers = {};

// Get camera and microphone
const videoElement = document.querySelector("video");
const audioSelect = document.querySelector("select#audioSource");
const videoSelect = document.querySelector("select#videoSource");
audioSelect.onchange = getStream;
videoSelect.onchange = getStream;

function init() {
    socket = io()

    getStream()
    .then(getDevices)
    .then(gotDevices);

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

window.onunload = window.onbeforeunload = () => {
  socket.close();
};

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

async function getStream() {
  if (window.stream) {
    window.stream.getTracks().forEach(track => {
      track.stop();
    });
  }
  const audioSource = audioSelect.value;
  const videoSource = videoSelect.value;
  const constraints = {
    audio: { deviceId: audioSource ? { exact: audioSource } : undefined, echoCancellation: true },
    video: { deviceId: videoSource ? { exact: videoSource } : undefined }
  };
  try {
    const stream = await navigator.mediaDevices.getUserMedia(constraints);
    return gotStream(stream);
  }
  catch (error) {
    return handleError(error);
  }
}

function gotStream(stream) {
  window.stream = stream;
  audioSelect.selectedIndex = [...audioSelect.options].findIndex(
    option => option.text === stream.getAudioTracks()[0].label
  );
  videoSelect.selectedIndex = [...videoSelect.options].findIndex(
    option => option.text === stream.getVideoTracks()[0].label
  );
  videoElement.srcObject =  window.stream;
  videoElement.volume = 0
  videoElement.play();

  socket.emit("broadcaster");
}

function handleError(error) {
  console.error("Error: ", error);
}


function toggleMute() {
  var audioTracks = window.stream.getAudioTracks();
  if (audioTracks.length === 0) {
    return;
  }
  for (var i = 0; i < audioTracks.length; ++i) {
    audioTracks[i].enabled = !audioTracks[i].enabled;
  }
  videoElement.muted = videoElement.muted ? false : true; 
  document.querySelector('#muteButton').innerHTML = document.querySelector('#muteButton').innerHTML === 'Unmute' ? 'Mute' : 'Unmute';
}

function adjustVolume(e, val){
  videoElement.volume = val.toFixed(1);
}

function adjustAnswer(e, val){
  let choiceEl;
  let progressEl = document.getElementById("progressbar");
  progressEl.setAttribute('progress', .6);

  for (let i = 1; i < 8; i++) {
    if (i==Math.floor(7*val)) {
      choiceEl = document.querySelector(".choice-"+ Math.floor(7*val))
      choiceEl.setAttribute('width', 10);
    } else {
      choiceEl = document.querySelector(".choice-"+ i)
      choiceEl.setAttribute('width', 5);
    }
  }
}

function btnQusPrev(e, val){
  let quesEl = document.getElementById("questionnaires");
  quesEl.setAttribute("questions", "flash: prev"+Math.random());
}

function btnQusNext(e, val){
  let quesEl = document.getElementById("questionnaires");
  quesEl.setAttribute("questions", "flash: next"+Math.random());
}

init() 