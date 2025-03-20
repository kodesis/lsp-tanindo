<style>
    /* Common chat bubble styles */
    .chat-bubble {
        max-width: 60%;
        /* Prevents overly wide messages */
        padding: 10px 15px;
        border-radius: 15px;
        margin: 5px;
        word-wrap: break-word;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Guest messages */
    .guest-message {
        background-color: #f1f1f1;
        color: black;
        text-align: left;
        border-bottom-left-radius: 5px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        align-self: flex-start;
        margin-right: auto;
        /* Pushes to the left */
    }

    /* Admin messages */
    .admin-message {
        background-color: #28a745;
        color: white;
        text-align: right;
        border-bottom-right-radius: 5px;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        align-self: flex-end;
        margin-left: auto;
        /* Pushes to the right */
    }


    .chat-box {
        display: flex;
        flex-direction: column;
        height: 300px;
        overflow-y: auto;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    /* Message container for alignment */
    .message-container {
        display: flex;
        width: 100%;
    }

    /* Guest messages aligned left */
    .guest-container {
        justify-content: flex-start;
    }

    /* Admin messages aligned right */
    .admin-container {
        justify-content: flex-end;
    }

    /* Responsive for small screens */
    @media (max-width: 768px) {
        .chat-bubble {
            max-width: 80%;
            /* Allow more space for smaller screens */
        }
    }
</style>

<div class="content-wrapper">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Manage Staff</span></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Live Chat Panel</h4>
            <div class="row">
                <!-- Guest List -->
                <div class="col-md-4">
                    <h4>Active Guests</h4>
                    <ul id="guestList" class="list-group"></ul>
                </div>

                <!-- Chat Box -->
                <div class="col-md-8">
                    <h4>Chat</h4>
                    <div id="chatBox" class="chat-box">
                        Select a guest to view messages.
                    </div>
                    <textarea id="adminReply" class="form-control mt-2" placeholder="Type a reply..."></textarea>
                    <button id="sendReply" class="btn btn-primary mt-2">Send Reply</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let selectedGuest = null; // Track selected guest
    let lastAdminMessageCount = 0;
    let adminMessageAlert = new Audio("<?= base_url('assets/sounds/notification.mp3') ?>"); // Ensure this file exists
    let lastMessageTimestamp = 0;
    let chatMessages = []; // Stores messages
    let chatData = {}; // Stores messages per guest
    let lastMessageTimestamps = {}; // Track last message per guest

    function loadGuests() {
        fetch("<?= base_url('chat/get_active_guests') ?>")
            .then(response => response.json())
            .then(guests => {
                fetch("<?= base_url('chat/get_unread_counts') ?>")
                    .then(response => response.json())
                    .then(unreadData => {
                        let unreadMap = {};
                        unreadData.forEach(item => unreadMap[item.guest_id] = item.unread_count);

                        let guestList = document.getElementById("guestList");
                        guestList.innerHTML = "";

                        guests.forEach(guest => {
                            if (!chatData[guest.guest_id]) {
                                chatData[guest.guest_id] = []; // Initialize chat storage
                                lastMessageTimestamps[guest.guest_id] = 0;
                            }

                            let li = document.createElement("li");
                            li.classList.add("list-group-item", "d-flex", "justify-content-between", "align-items-center");
                            li.textContent = `Guest ${guest.guest_id}`;
                            li.onclick = function() {
                                selectedGuest = guest.guest_id;
                                updateChatUI();
                                loadMessages();

                                // ✅ Mark messages as read in the database
                                fetch("<?= base_url('chat/mark_as_read') ?>", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/x-www-form-urlencoded"
                                    },
                                    body: "guest_id=" + guest.guest_id
                                });

                                // ✅ Remove the unread badge from the UI
                                let badge = li.querySelector(".badge");
                                if (badge) badge.remove();
                            };

                            // ✅ Show unread messages badge
                            if (unreadMap[guest.guest_id]) {
                                let badge = document.createElement("span");
                                badge.classList.add("badge", "bg-danger", "rounded-pill");

                                // Add exclamation mark (!) instead of number
                                badge.innerHTML = "&#33;"; // HTML code for "!"

                                li.appendChild(badge);


                                flashTitleAdmin();
                                adminMessageAlert.play(); // 🔊 Play notification sound
                            }

                            guestList.appendChild(li);
                        });
                    });
            });
    }



    function loadMessages() {
        if (!selectedGuest) return;

        fetch("<?= base_url('chat/get_messages_by_guest') ?>?guest_id=" + selectedGuest + "&last_timestamp=" + lastMessageTimestamps[selectedGuest])
            .then(response => response.json())
            .then(messages => {
                let newMessages = messages.filter(msg => msg.timestamp > lastMessageTimestamps[selectedGuest]);

                if (newMessages.length > 0) {
                    chatData[selectedGuest] = [...chatData[selectedGuest], ...newMessages]; // ✅ Store messages per guest
                    lastMessageTimestamps[selectedGuest] = newMessages[newMessages.length - 1].timestamp;

                    updateChatUI(); // ✅ Update UI after receiving new messages
                    if (document.hidden || selectedGuest !== newMessages[0].guest_id) {
                        flashTitleAdmin();
                        adminMessageAlert.play();
                    }
                }
                fetch("<?= base_url('chat/mark_as_read') ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "guest_id=" + selectedGuest
                });

                // ✅ Remove the unread badge from the UI
                let badge = li.querySelector(".badge");
                if (badge) badge.remove();
            })
            .catch(error => console.error("Error loading messages:", error));
    }



    // 🔥 Flash Title Notification for Admin
    function flashTitleAdmin() {
        let isFlashing = true;
        let originalTitle = "Admin Chat";
        let newTitle = "🔴 New Guest Message!";

        let interval = setInterval(() => {
            document.title = isFlashing ? newTitle : originalTitle;
            isFlashing = !isFlashing;
        }, 1000);

        // Stop flashing after 5 seconds
        setTimeout(() => {
            clearInterval(interval);
            document.title = originalTitle;
        }, 5000);
    }

    function updateChatUI() {
        let chatBox = document.getElementById("chatBox");
        chatBox.innerHTML = ""; // Clear chat UI

        if (!selectedGuest || !chatData[selectedGuest] || chatData[selectedGuest].length === 0) {
            chatBox.innerHTML = "<p class='text-muted'>No messages yet.</p>";
            return;
        }

        chatData[selectedGuest].forEach(msg => {
            let container = document.createElement("div");
            container.classList.add("message-container");

            let div = document.createElement("div");
            div.classList.add("chat-bubble");

            if (msg.sender === "guest") {
                container.classList.add("guest-container");
                div.classList.add("guest-message");
                div.innerHTML = `<strong>Guest:</strong> ${msg.message}`;
            } else if (msg.sender === "admin") {
                container.classList.add("admin-container");
                div.classList.add("admin-message");
                div.innerHTML = `<strong>Admin:</strong> ${msg.message}`;
            }

            container.appendChild(div);
            chatBox.appendChild(container);
        });

        chatBox.scrollTop = chatBox.scrollHeight; // ✅ Scroll to latest message
    }




    document.getElementById("sendReply").addEventListener("click", function() {
        if (!selectedGuest) return alert("Select a guest first!");
        let message = document.getElementById("adminReply").value.trim();
        if (!message) return;

        let newMessage = {
            sender_type: 'admin',
            message: message,
            timestamp: Date.now() // Local timestamp
        };

        chatData[selectedGuest].push(newMessage); // ✅ Store per guest
        updateChatUI(); // ✅ Update UI instantly

        fetch("<?= base_url('chat/admin_reply') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "guest_id=" + selectedGuest + "&message=" + encodeURIComponent(message)
        }).then(() => {
            document.getElementById("adminReply").value = "";
        });
    });



    let typingTimeout;

    document.getElementById("adminReply").addEventListener("input", function() {
        if (!selectedGuest) return;

        fetch("<?= base_url('chat/admin_typing') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "guest_id=" + selectedGuest
        });

        clearTimeout(typingTimeout);
        typingTimeout = setTimeout(() => {
            fetch("<?= base_url('chat/admin_stopped_typing') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "guest_id=" + selectedGuest
            });
        }, 3000); // Typing stops after 3 seconds of no input
    });


    // Refresh chat every 3 seconds
    setInterval(() => {
        loadGuests();
        if (selectedGuest) loadMessages();
    }, 3000);
</script>