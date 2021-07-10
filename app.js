const express = require('express')
const app = express()
const easyrtc = require('open-easyrtc')
const port = 3000

const mainRouter = require('./server/main')

app.set('view engine', 'ejs');
app.set('views', __dirname + '/client');
app.set('view options', { layout: false });

app.use(express.static('client'));
// app.use('/', mainRouter);
// app.use(express.urlencoded({extended: true}));

app.use('/img', express.static(__dirname + '/client/assets/img'))
app.use('/scripts', express.static(__dirname + '/client/assets/scripts'))
app.use('/jsvr', express.static(__dirname + '/client/assets/scripts/vr'))
app.use('/model', express.static(__dirname + '/client/assets/model'))
app.use('/data', express.static(__dirname + '/client/assets/data'))
app.use('/js', express.static(__dirname + '/client/assets/js'))
app.use('/css', express.static(__dirname + '/client/assets/css'))
app.use('/fonts', express.static(__dirname + '/client/assets/fonts'))

const https = require('https');
const fs = require('fs')
const httpsOptions = {
  key: fs.readFileSync('./cert/cert.key'),
  cert: fs.readFileSync('./cert/cert.pem')
}
const server = https.createServer(httpsOptions, app);
const io = require('socket.io')(server)
var socketServer = io.listen(server);

require('./server/sockets')(io)

var myIceServers = [
  {"url":"stun:stun.l.google.com:19302"},
  {"url":"stun:stun1.l.google.com:19302"},
  {"url":"stun:stun2.l.google.com:19302"},
  {"url":"stun:stun3.l.google.com:19302"},
  {
    url: 'turn:numb.viagenie.ca',
    credential: 'jquery404@gmail.com',
    username: 'Pot64hook'
  },
  {
    // url: 'turn:numb.viagenie.ca',
    // credential: 'zx1234',
    // username: 'jquery404@gmail.com'
  }
];
easyrtc.setOption("appIceServers", myIceServers);
easyrtc.setOption("logLevel", "debug");
easyrtc.setOption("demosEnable", false);

easyrtc.events.on("easyrtcAuth", function(socket, easyrtcid, msg, socketCallback, callback) {
  easyrtc.events.defaultListeners.easyrtcAuth(socket, easyrtcid, msg, socketCallback, function(err, connectionObj){
      if (err || !msg.msgData || !msg.msgData.credential || !connectionObj) {
          callback(err, connectionObj);
          return;
      }
      connectionObj.setField("credential", msg.msgData.credential, {"isShared":false});
      callback(err, connectionObj);
  });
});

easyrtc.listen(app, socketServer, null, function(err, rtcRef) { console.log("Initiated"); });

server.listen(port, () => console.log(`Server is running on port ${port}`));