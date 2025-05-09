const textarea = document.getElementById("textarea");
const startBtn = document.getElementById("start");
const clearBtn = document.getElementById("clear");

// Toggle Sections
function toggleExercise() {
    const div = document.getElementById("exercise-questions");
    div.style.display = div.style.display === "none" ? "block" : "none";
}


function togglenote() {
    fetchNote();
    const div = document.getElementById("notetext");
    div.style.display = div.style.display === "none" ? "block" : "none";
}
function togglefeed() {
    const div = document.getElementById("feedback");
    div.style.display = div.style.display === "none" ? "block" : "none";
}
function toggleai() {
    const ai = document.getElementById('ai');
    ai.style.display = ai.style.display === 'flex' ? 'none' : 'flex';
}

// Clear notes
clearBtn.addEventListener("click", () => textarea.value = "");

// Voice to Text
const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
recognition.lang = 'en-US';
recognition.onresult = (e) => textarea.value += e.results[0][0].transcript + " ";
startBtn.addEventListener("click", () => recognition.start());

// Save Notes
document.getElementById("noteForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch("text.php", { method: "POST", body: formData })
        .then(res => res.text())
        .then(data => alert(data.trim() === "success" ? '✅ Saved successfully' : data))
        .catch(err => alert("Error:" + err));
});

// Fetch Note
function fetchNote() {
    fetch("fetch_text.php")
        .then(res => res.json())
        .then(data => textarea.value = data.status === "success" ? data.text : "")
        .catch(err => console.error("Fetch Error:", err));
}

fetch("get_session.php")
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            sessionStorage.setItem("Roll_Number", data.roll_number);
            fetchNote();
        }
    });

window.onload = () => {
    fetchNote();
};

async function sendMessage() {
    let userInput = document.getElementById("userInput").value;
    if (!userInput.trim()) return;
    let chatBox = document.getElementById("chatBox");

    // Show user's message
    let userDiv = document.createElement("div");
    userDiv.className = "user-msg align-self-end";
    userDiv.innerHTML = `<b>You:</b> ${userInput}`;
    chatBox.appendChild(userDiv);

    document.getElementById("userInput").value = "";

    // Scroll to the bottom
    chatBox.scrollTop = chatBox.scrollHeight;

    try {
        let response = await fetch("chatbot.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ message: userInput })
        });
        let data = await response.json();

        let botDiv = document.createElement("div");
        botDiv.className = "bot-msg align-self-start";
        botDiv.innerHTML = `<b>Bot:</b> ${data.response || "Something went wrong"}`;
        chatBox.appendChild(botDiv);

        // Scroll to the bottom after bot message
        chatBox.scrollTop = chatBox.scrollHeight;
    } catch (err) {
        console.error("Error:", err);
        chatBox.innerHTML += `<div class='bot-msg align-self-start'><b>Bot:</b> Error connecting to server</div>`;
        chatBox.scrollTop = chatBox.scrollHeight;  // Scroll to bottom even in error case
    }
}


const toggleBtn = document.getElementById("themeToggle");
const body = document.getElementById("body");

toggleBtn.addEventListener("click", () => {
    document.body.classList.toggle("light-theme");
    const icon = toggleBtn.querySelector("i");
    if (document.body.classList.contains("light-theme")) {
        body.style.backgroundColor = "black";
        icon.classList.remove("bi-moon-fill");
        icon.classList.add("bi-sun-fill");
    } else {
        body.style.backgroundColor = "white";
        icon.classList.remove("bi-sun-fill");
        icon.classList.add("bi-moon-fill");
    }
});


// Prevent browser back button (as discussed earlier)
history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.go(1);
};

// Automatically logout when the user closes the tab
window.onbeforeunload = function () {
    // Send an AJAX request to logout.php to handle session destroy
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "logout.php", false); // synchronous request to block unloading
    xhr.send();
};

function generateStars(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
        stars += i <= rating ? '⭐' : '☆';
    }
    return stars;
}

function loadFeedbacks() {
    fetch('fetch_feedbacks.php')
        .then(response => response.json())
        .then(data => {
            let feedbackHTML = '<h5 class="border-bottom pb-2">Feedbacks</h5>';
            data.forEach(item => {
                feedbackHTML += `
                    <div class='feedback-item'>
                        <strong>${item.name}:</strong> <span>${generateStars(item.rating)}</span>
                        <p class="mb-0">${item.feedback}</p>
                    </div>`;
            });
            document.getElementById('feedback-list').innerHTML = feedbackHTML;
        })
        .catch(error => console.error('Error:', error));
}
window.onload = loadFeedbacks;


document.getElementById("submitfeedback").addEventListener("submit", function (e) {
    e.preventDefault();
    const sendBtn = document.getElementById('submit');
    const formData = new FormData(this);
    sendBtn.disabled = true;

    fetch("submit_feedback.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            const result = data.trim();
            if (result === "success") {
                window.location.reload();
            } else if (result === "failed") {
                alert('❌ Something went wrong please try again.');
                sendBtn.disabled = false;
            } else {
                alert('❌ Something went wrong: ' + result);
                sendBtn.disabled = false;
            }
        })
});