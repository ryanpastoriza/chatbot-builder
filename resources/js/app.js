import './bootstrap';

// resources/js/app.js

document.getElementById('send-btn').addEventListener('click', () => {
    const userInput = document.getElementById('user-input').value;
    if (userInput.trim() === '') return;

    addMessage(userInput, 'user');
    document.getElementById('user-input').value = '';

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/query', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ query: userInput }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        addMessage(data.response, 'bot');
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
});

function addMessage(message, sender) {
    const messageContainer = document.createElement('div');
    messageContainer.className = `message ${sender}`;
    messageContainer.textContent = message;
    document.getElementById('messages').appendChild(messageContainer);
}
