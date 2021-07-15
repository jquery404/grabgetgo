let socket;
let peer;
let broadcasterStream;
let audioStream;
const video = document.querySelector("video");

function init() {
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
          window.stream = event.streams[0];
          video.srcObject = window.stream;
          video.play();
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

}


async function getStream() {
  const audioSource = audioSelect.value;
  const constraints = {
    audio: { deviceId: audioSource ? { exact: audioSource } : undefined, echoCancellation: true },
    video: false
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
  audioStream = stream;
  socket.emit("broadcaster");
} 


function toggleMute() {
  
  var audioTracks = window.stream.getAudioTracks();
  if (audioTracks.length === 0) {
    return;
  }
  for (var i = 0; i < audioTracks.length; ++i) {
    audioTracks[i].enabled = !audioTracks[i].enabled;
  }
  
  video.muted = video.muted ? false : true; 
  document.querySelector('#muteButton').innerHTML = document.querySelector('#muteButton').innerHTML === 'Unmute' ? 'Mute' : 'Unmute';
}

function adjustVolume(e, val){
  video.volume = val.toFixed(1);
}

window.onunload = window.onbeforeunload = () => {
  socket.close();
  peer.close();
};

init();