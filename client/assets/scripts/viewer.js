let socket;
let peer;
const video = document.querySelector("video");


function init() {
    socket = io.connect(window.location.origin, {transports: ['websocket']});

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

window.onunload = window.onbeforeunload = () => {
  socket.close();
  peer.close();
};

init();