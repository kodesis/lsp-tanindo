<style>
    .chat-bubble {
        max-width: 75%;
        padding: 10px 15px;
        border-radius: 15px;
        margin: 5px;
        display: inline-block;
        word-wrap: break-word;
    }

    .guest-message {
        background-color: #f1f1f1;
        color: black;
        text-align: left;
        border-bottom-left-radius: 0px;
        align-self: flex-start;
    }

    .admin-message {
        background-color: #28a745;
        color: white;
        text-align: right;
        border-bottom-right-radius: 0px;
        align-self: flex-end;
    }

    .chat-box {
        display: flex;
        flex-direction: column;
        height: 300px;
        overflow-y: auto;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
    }

    .message-container {
        display: flex;
        width: 100%;
    }

    .guest-container {
        justify-content: flex-start;
    }

    .admin-container {
        justify-content: flex-end;
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
                            let li = document.createElement("li");
                            li.classList.add("list-group-item", "d-flex", "justify-content-between", "align-items-center");
                            li.textContent = guest.guest_id;
                            li.onclick = function() {
                                selectedGuest = guest.guest_id;
                                loadMessages();
                            };

                            // ✅ Unread message count badge (if any)
                            if (unreadMap[guest.guest_id]) {
                                let badge = document.createElement("span");
                                badge.classList.add("badge", "bg-danger", "rounded-pill");
                                badge.textContent = unreadMap[guest.guest_id];
                                li.appendChild(badge);
                            }

                            guestList.appendChild(li);
                        });
                    });
            });
    }

    function loadMessages() {
        if (!selectedGuest) return;

        fetch("<?= base_url('chat/get_messages_by_guest') ?>?guest_id=" + selectedGuest)
            .then(response => response.json())
            .then(messages => {
                let chatBox = document.getElementById("chatBox");
                let newMessageCount = messages.length;

                // ✅ Find the last message in the chat
                let lastMessage = messages.length > 0 ? messages[messages.length - 1] : null;

                // ✅ Check if there are new messages & the last message is from a guest
                if (newMessageCount > lastAdminMessageCount && lastMessage && lastMessage.sender_type === 'guest') {
                    adminMessageAlert.play(); // 🔊 Play notification sound
                    flashTitleAdmin(); // 🔥 Flash title for admin
                }

                chatBox.innerHTML = ""; // Clear previous messages

                messages.forEach(msg => {
                    let container = document.createElement("div");
                    container.classList.add("message-container");

                    let div = document.createElement("div");
                    div.classList.add("chat-bubble");

                    if (msg.sender_type === 'guest') {
                        container.classList.add("guest-container");
                        div.classList.add("guest-message");
                        div.innerHTML = `<strong>Guest:</strong> ${msg.message}`;
                    } else {
                        container.classList.add("admin-container");
                        div.classList.add("admin-message");
                        div.innerHTML = `<strong>Admin:</strong> ${msg.message}`;
                    }

                    container.appendChild(div);
                    chatBox.appendChild(container);
                });

                // ✅ Scroll to latest message
                chatBox.scrollTop = chatBox.scrollHeight;

                // ✅ Mark messages as read AFTER loading
                fetch("<?= base_url('chat/mark_as_read') ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "guest_id=" + selectedGuest
                }).then(() => {
                    loadGuests(); // ✅ Reload guest list to update unread count
                });

                // ✅ Update lastAdminMessageCount AFTER checking for notifications
                lastAdminMessageCount = newMessageCount;
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

    document.getElementById("sendReply").addEventListener("click", function() {
        if (!selectedGuest) return alert("Select a guest first!");
        let message = document.getElementById("adminReply").value;

        fetch("<?= base_url('chat/admin_reply') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "guest_id=" + selectedGuest + "&message=" + encodeURIComponent(message)
        }).then(() => {
            document.getElementById("adminReply").value = "";
            loadMessages();
        });
    });

    // Refresh chat every 3 seconds
    setInterval(() => {
        loadGuests();
        if (selectedGuest) loadMessages();
    }, 3000);
</script>