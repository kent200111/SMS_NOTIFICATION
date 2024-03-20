document.addEventListener('DOMContentLoaded', () => {
    const chatbotContainer = document.getElementById('chatbotContainer');
    const chatbotIcon = document.querySelector('.chatbot-icon');
    const chatbotInput = document.getElementById('chatbotInput');
    const sidebar = document.querySelector('.sidebar');

    // Function to check sidebar state and adjust chatbot position
    function adjustChatbotPosition() {
        if (sidebar.classList.contains('active')) {
            chatbotContainer.style.right = '400px'; // Adjust this value based on your sidebar width
            chatbotIcon.style.right = '330px'; // Same as above
        } else {
            chatbotContainer.style.right = '90px';
            chatbotIcon.style.right = '20px';
        }
    }

    // Ensure chatbotContainer is initially hidden
    chatbotContainer.style.display = 'none';

    // Function to toggle chatbot container display and apply click animation
    function toggleChatbot() {
        const isChatbotVisible = chatbotContainer.style.display !== 'none';
        chatbotContainer.style.display = isChatbotVisible ? 'none' : 'block';
        if (!isChatbotVisible) {
            adjustChatbotPosition(); // Adjust position when showing the chatbot
        }

        // Click animation
        chatbotIcon.style.transform = 'scale(0.9)';
        setTimeout(() => {
            chatbotIcon.style.transform = 'scale(1)';
        }, 150);
    }
    
    // Event listener for chatbot icon click
    chatbotIcon.addEventListener('click', toggleChatbot);

    // Function to handle sending a message
    function sendMessage() {
        const message = chatbotInput.value.trim();
        if (message) {
            console.log('User says:', message);
            chatbotInput.value = '';
        }
    }

    // Event listener for chatbot input (Enter key)
    chatbotInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            sendMessage();
        }
    });

    // Listen for sidebar state changes
    const observer = new MutationObserver(adjustChatbotPosition);
    observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });

    // Function for on-click send message icon
    function sendMessageByIcon() {
        sendMessage(); // Call the existing sendMessage function
        chatbotInput.focus(); // Optional: Bring focus back to input after sending
    }
});
