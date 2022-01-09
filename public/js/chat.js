
socket.addEventListener("open", function() {
    console.log("CONNECTED");
});

function addMessage(name, message) {
    const messageHTML = "<div class='message'><strong>" + name + ":</strong> " + message + "</div>";
    document.getElementById("chat").innerHTML += messageHTML
}

socket.addEventListener("message", function(e) {
    console.log(e.data);
    try {
        const message = JSON.parse(e.data);
        addMessage(message.name, message.message);
    } catch(e) {
        // Catch any errors
    }
});

document.getElementById("sendBtn").addEventListener("click", function() {

    let message = document.getElementById("message");

    const data = {
        name: document.getElementById("name").value,
        message: message.value
    };
    socket.send(JSON.stringify(data));
    addMessage(data.name, data.message);
    message.value = '';
});
