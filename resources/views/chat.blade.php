<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chatbot</title>
</head>
<body>  

        <div id="chat-container">
            <a href="{{ route('knowledge_base.create') }}">Add Knowledge Base</a>
            <div id="messages"></div>
            <input type="text" id="user-input" placeholder="Type your message...">
            <button id="send-btn">Send</button>
        </div>
</body>
</html>