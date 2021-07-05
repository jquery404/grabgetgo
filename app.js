const express = require('express')
const app = express()
const port = 3000

const mainRouter = require('./server/main')

app.set("view engine", "ejs");
app.set("views", __dirname + "/client");
app.set("view options", { layout: false });

app.use('/', mainRouter);

app.use('/img', express.static(__dirname + '/client/assets/img'))
app.use('/scripts', express.static(__dirname + '/client/assets/scripts'))
app.use('/js', express.static(__dirname + '/client/assets/js'))
app.use('/css', express.static(__dirname + '/client/assets/css'))
app.use('/fonts', express.static(__dirname + '/client/assets/fonts'))

server = app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})

const io = require('socket.io')(server)

require('./server/sockets')(io)
