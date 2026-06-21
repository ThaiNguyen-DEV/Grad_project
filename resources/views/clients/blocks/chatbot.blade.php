<!-- Custom RAG Chatbot UI -->
<style>
    .custom-chatbot-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        font-family: 'Inter', sans-serif;
    }

    .chatbot-toggle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: var(--primary-color, #007bff);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s;
    }

    .chatbot-toggle:hover {
        transform: scale(1.1);
    }

    .chatbot-window {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 350px;
        height: 450px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        transform: scale(0);
        transform-origin: bottom right;
        transition: transform 0.3s ease;
    }

    .chatbot-window.active {
        transform: scale(1);
    }

    .chatbot-header {
        background-color: var(--primary-color, #007bff);
        color: white;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chatbot-header h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        color: white;
    }

    .chatbot-messages {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
        background: #f8f9fa;
    }

    .chat-bubble {
        max-width: 85%;
        padding: 10px 15px;
        border-radius: 15px;
        font-size: 14px;
        line-height: 1.5;
        word-wrap: break-word;
    }

    .chat-bubble.bot {
        background: #e9ecef;
        color: #333;
        align-self: flex-start;
        border-bottom-left-radius: 2px;
    }

    .chat-bubble.user {
        background: var(--primary-color, #007bff);
        color: white;
        align-self: flex-end;
        border-bottom-right-radius: 2px;
    }

    .chatbot-input {
        padding: 10px;
        border-top: 1px solid #eee;
        display: flex;
        gap: 10px;
        background: white;
    }

    .chatbot-input input {
        flex: 1;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 20px;
        outline: none;
    }

    .chatbot-input button {
        background: var(--primary-color, #007bff);
        color: white;
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Custom Tour Box in Chat */
    .chat-tour-box {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 10px;
        margin-top: 8px;
        margin-bottom: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .chat-tour-box strong {
        color: var(--primary-color, #007bff);
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
    }
    .chat-tour-box .btn-book-tour {
        display: inline-block;
        margin-top: 8px;
        padding: 5px 12px;
        background: var(--primary-color, #007bff);
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
    }
    .chat-tour-box .btn-book-tour:hover {
        background: #0056b3;
    }
</style>

<div class="custom-chatbot-container">
    <div class="chatbot-window" id="chatbotWindow">
        <div class="chatbot-header">
            <h5><i class="fas fa-robot me-2"></i> LOTUSMILE Bot</h5>
            <i class="fas fa-times" style="cursor: pointer;" onclick="toggleChatbot()"></i>
        </div>
        <div class="chatbot-messages" id="chatbotMessages">
            <div class="chat-bubble bot">Xin chào! Tôi có thể giúp gì cho bạn trong việc tìm kiếm Tour hôm nay?</div>
        </div>
        <div class="chatbot-input">
            <input type="text" id="chatInput" placeholder="Nhập tin nhắn..." onkeypress="handleChatKeyPress(event)">
            <button onclick="sendChatMessage()"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
    <div class="chatbot-toggle" onclick="toggleChatbot()">
        <i class="fas fa-comment-dots"></i>
    </div>
</div>

<script>
    function toggleChatbot() {
        document.getElementById('chatbotWindow').classList.toggle('active');
    }

    function handleChatKeyPress(e) {
        if (e.key === 'Enter') {
            sendChatMessage();
        }
    }

    async function sendChatMessage() {
        const input = document.getElementById('chatInput');
        const message = input.value.trim();
        if (!message) return;

        const messagesContainer = document.getElementById('chatbotMessages');

        // Add user message
        messagesContainer.innerHTML += `<div class="chat-bubble user">${message}</div>`;
        input.value = '';
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        // Add loading bot message
        const loadingId = 'loading-' + Date.now();
        messagesContainer.innerHTML += `<div class="chat-bubble bot" id="${loadingId}">Đang suy nghĩ...</div>`;
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        try {
            const response = await fetch('/api/chatbot/message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    message: message
                })
            });

            const data = await response.json();
            const loadingEl = document.getElementById(loadingId);

            if (response.ok) {
                // Remove Markdown bolding if any and replace newlines
                let reply = data.reply.replace(/\*\*(.*?)\*\*/g, '<b>$1</b>');
                reply = reply.replace(/\n/g, '<br>');
                loadingEl.innerHTML = reply;
            } else {
                loadingEl.innerHTML = "Xin lỗi, đã có lỗi xảy ra: " + (data.error || 'Server Error');
            }
        } catch (error) {
            document.getElementById(loadingId).innerHTML = "Không thể kết nối đến máy chủ.";
        }

        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
</script>
<!-- End Custom RAG Chatbot UI -->
