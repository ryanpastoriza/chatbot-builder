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
                
        <div id="knowledge-base-information">
            
             <h1>Add to Knowledge Base</h1>
            <form action="{{ route('knowledge_base.store') }}" method="POST">
                @csrf

                <!-- Product Section -->
                <h2>Add Product</h2>
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name"><br>
                <label for="product_features">Features (comma separated):</label>
                <input type="text" id="product_features" name="product_features"><br>
                <label for="product_materials">Materials (comma separated):</label>
                <input type="text" id="product_materials" name="product_materials"><br>
                <label for="product_customization">Customization Options (comma separated):</label>
                <input type="text" id="product_customization" name="product_customization"><br>

                <!-- Service Section -->
                <h2>Add Service</h2>
                <label for="service_name">Service Name:</label>
                <input type="text" id="service_name" name="service_name"><br>
                <label for="service_description">Description:</label>
                <textarea id="service_description" name="service_description"></textarea><br>
                <label for="service_process">Process (comma separated):</label>
                <input type="text" id="service_process" name="service_process"><br>
                <label for="service_benefits">Benefits (comma separated):</label>
                <input type="text" id="service_benefits" name="service_benefits"><br>

                <!-- Policy Section -->
                <h2>Add Policy</h2>
                <label for="policy_name">Policy Name:</label>
                <input type="text" id="policy_name" name="policy_name"><br>
                <label for="policy_description">Description:</label>
                <textarea id="policy_description" name="policy_description"></textarea><br>
                <label for="policy_timeframe">Timeframe:</label>
                <input type="text" id="policy_timeframe" name="policy_timeframe"><br>
                <label for="policy_process">Process (comma separated):</label>
                <input type="text" id="policy_process" name="policy_process"><br>
                <label for="policy_refund">Refund:</label>
                <input type="text" id="policy_refund" name="policy_refund"><br>

                <!-- FAQ Section -->
                <h2>Add FAQ</h2>
                <label for="faq_question">Question:</label>
                <input type="text" id="faq_question" name="faq_question"><br>
                <label for="faq_answer">Answer:</label>
                <textarea id="faq_answer" name="faq_answer"></textarea><br>

                <!-- Multiple Choice Section -->
                <h2>Add Multiple Choice Question</h2>
                <label for="mc_question">Question:</label>
                <input type="text" id="mc_question" name="mc_question"><br>
                <label for="mc_options">Options (comma separated):</label>
                <input type="text" id="mc_options" name="mc_options"><br>

                <button type="submit">Submit</button>
            </form>

        </div>
</body>
</html>