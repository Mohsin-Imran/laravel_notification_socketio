import express from 'express';
import http from 'http';
import { Server } from 'socket.io';
import cors from 'cors';

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
    cors: {
        origin: "http://localhost:8000", // Allow your Laravel app URL
        methods: ["GET", "POST"],
        credentials: true // Allow credentials if necessary
    }
});

app.use(cors({
    origin: "http://localhost:8000", // Also allow your Laravel app URL here
    credentials: true // Allow credentials if necessary
}));

// Socket.IO connection
io.on('connection', (socket) => {
    console.log('New client connected');

    socket.on('formSubmit', (data) => {
        io.emit('notification', data);
    });

    socket.on('disconnect', () => {
        console.log('Client disconnected');
    });
});

const PORT = process.env.PORT || 3000;
server.listen(PORT, () => {
    console.log(`Listening on port ${PORT}`);
});
