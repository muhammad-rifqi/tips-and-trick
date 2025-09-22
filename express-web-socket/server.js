const express = require("express");
const http = require("http");
const { Server } = require("socket.io");

const app = express();
const server = http.createServer(app);
const io = new Server(server);

app.use(express.static(__dirname + "/public"));

// simpan pesan sementara di memory
let messages = [];

io.on("connection", (socket) => {
  console.log("User connected:", socket.id);

  // kirim data pesan awal ke client yang baru connect
  socket.emit("initMessages", messages);

  // saat client kirim pesan
  socket.on("sendNotif", (data) => {
    const msg = { id: messages.length + 1, text: data.message };
    messages.push(msg);

    // kirim ke semua client tabel terbaru
    io.emit("updateMessages", messages);
  });
});

server.listen(3000, () => {
  console.log("Server jalan di http://localhost:3000");
});
