peers = {}
let broadcaster;
let audioBroadcaster;

module.exports = (io) => {
    io.on('connect', (socket) => {
        console.log('a client is connected')

        // Initiate the connection process as soon as the client connects
        peers[socket.id] = socket
        /* Asking all other clients to setup the peer connection receiver */
        for(let id in peers) {
            if(id === socket.id) continue
            console.log('sending init receive to ' + socket.id)
            peers[id].emit('initReceive', socket.id)
        }

        /**
         * relay a peerconnection signal to a specific socket
         */
        socket.on('signal', data => {
            console.log('sending signal from ' + socket.id + ' to ', data)
            if(!peers[data.socket_id])return
            peers[data.socket_id].emit('signal', {
                socket_id: socket.id,
                signal: data.signal
            })
        })

        /**
         * remove the disconnected peer connection from all other connected clients
         */
        socket.on('disconnect', () => {
            console.log('socket disconnected ' + socket.id)
            socket.broadcast.emit('removePeer', socket.id)
            delete peers[socket.id]
        })

        /**
         * Send message to client to initiate a connection
         * The sender has already setup a peer connection receiver
         */
        socket.on('initSend', init_socket_id => {
            console.log('INIT SEND by ' + socket.id + ' for ' + init_socket_id)
            peers[init_socket_id].emit('initSend', socket.id)
        })


        // broadcasting
        socket.on('broadcaster', () => {
            broadcaster = socket.id;
            console.log('broadcaster', broadcaster)
            socket.broadcast.emit('broadcaster');
        })

        socket.on('watcher', () => {
            console.log(socket.id, ' joined: ', broadcaster)
            socket.to(broadcaster).emit('watcher', socket.id);
        })

        socket.on('candidate', (id, message) => {
            console.log(id, ' asking: ', socket.id)
            socket.to(id).emit('candidate', socket.id, message);
        })

        socket.on('offer', (id, message) => {
            console.log(id, ' offering: ', socket.id)
            socket.to(id).emit('offer', socket.id, message);
        })

        socket.on('answer', (id, message) => {
            console.log(id, ' answering: ', socket.id)
            socket.to(id).emit('answer', socket.id, message);
        })

        socket.on('disconnectPeer', () => {
            socket.to(broadcaster).emit('disconnectPeer', socket.id);
        })

        // ...............  ................   ..................   ................
        socket.on('audio-broadcaster', () => {
            audioBroadcaster = socket.id;
            console.log('==.', audioBroadcaster);
            socket.broadcast.emit('audio-broadcaster');
        })

        socket.on('audio-watcher', () => {
            console.log('==', socket.id, audioBroadcaster);
            socket.to(audioBroadcaster).emit('audio-watcher', socket.id);
        })



    })
}
