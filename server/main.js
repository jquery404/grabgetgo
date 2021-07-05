const express = require('express')
const path = require('path')
const router = express.Router()

router.get('/', (req, res) =>{
    res.sendFile(path.join(__dirname, '..', '/client/index.html'));
});
router.get('/meet', (req, res) =>{
    res.sendFile(path.join(__dirname, '..', '/client/meet.html'));
});
router.get('/broadcast', (req, res) =>{
    res.sendFile(path.join(__dirname, '..', '/client/broadcast.html'));
});
router.get('/viewer', (req, res) =>{
    res.sendFile(path.join(__dirname, '..', '/client/viewer.html'));
});

module.exports = router