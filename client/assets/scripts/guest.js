let socket;
let peer;
let broadcasterStream;
const video = document.querySelector("video");
const audioSelect = document.querySelector("select#audioSource");
const guestAudio = document.querySelector("#guestAudio");

function init() {
    socket = io()
    
    getStream().then(getDevices).then(gotDevices);

    socket.on('broadcaster', () => {
        socket.emit('watcher');
    })

    socket.on('candidate', (id, candidate) => {
        peer.addIceCandidate(new RTCIceCandidate(candidate)).catch(e => console.error(e));
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
          window.stream = event.streams[0];
          video.srcObject = window.stream;
        };
        peer.onicecandidate = event => {
          if (event.candidate) {
            socket.emit('candidate', id, event.candidate);
          }
        };
    })

    socket.on('connect', () => {
      socket.emit('watcher');
    })

    // ........  ...........  ...........
    socket.on('audio-watcher', id => {
      console.log('audio-watcher');
    });
    
    
}

function toggleMute() {
  var audioTracks = window.stream.getAudioTracks();
  if (audioTracks.length === 0) {
    return;
  }
  for (var i = 0; i < audioTracks.length; ++i) {
    audioTracks[i].enabled = !audioTracks[i].enabled;
  }
  
}

// transmit audio
async function getStream() {
  
  const audioSource = audioSelect.value;
  const constraints = {
    audio: { deviceId: audioSource ? { exact: audioSource } : undefined, echoCancellation: true },
    video: true
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
  window.localStream = stream;
  guestAudio.srcObject = window.localStream;
  guestAudio.muted = true;

  socket.emit("audio-broadcaster");
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
    }
  }
}

function handleError(error) {
  console.error("Error: ", error);
}

window.onunload = window.onbeforeunload = () => {
  socket.close();
  peer.close();
};

init();