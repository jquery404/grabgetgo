let socket;
let peer;

// RTCPeerConnection configuration 
const configuration = {
    "iceServers": [{
            "urls": "stun:stun.l.google.com:19302"
        },
        // public turn @ https://gist.github.com/sagivo/3a4b2f2c7ac6e1b5267c2f1f59ac6c6b
        {
            url: 'turn:192.158.29.39:3478?transport=udp',
            credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
            username: '28224511:1379330808'
        }
    ]
}

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
          video.srcObject = event.streams[0];
        };
        peer.onicecandidate = event => {
          if (event.candidate) {
            socket.emit('candidate', id, event.candidate);
          }
        };
    })

}



init();