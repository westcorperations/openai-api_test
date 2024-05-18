<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenAI Response Generator API</title>
</head>
<body>
    <h1>OpenAI Response Generator API</h1>

    <p>This API allows you to generate responses and follow-up questions using the OpenAI language model.</p>

    <h2>Prerequisites</h2>
    <ul>
        <li>PHP 8.0 or higher</li>
        <li>Composer</li>
        <li>OpenAI API key</li>
    </ul>

    <h2>Installation</h2>
    <ol>
        <li>Clone the repository:</li>
    </ol>
    <pre><code>git clone &lt;repository-url&gt;

cd openai-api</code></pre>

    <ol start="2">
        <li>Install dependencies:</li>
    </ol>
    <pre><code>composer install</code></pre>

    <ol start="3">
        <li>Create a <code>.env</code> file and set your OpenAI API key:</li>
    </ol>
    <pre><code>OPENAI_API_KEY=your_openai_api_key_here</code></pre>

    <ol start="4">
        <li>Migrate the database:</li>
    </ol>
    <pre><code>php artisan migrate</code></pre>

    <ol start="5">
        <li>Start the server:</li>
    </ol>
    <pre><code>php artisan serve</code></pre>

    <h2>Usage</h2>
    <h3>Endpoint</h3>
    <pre><code>POST /api/generate</code></pre>

    <h3>Request Body</h3>
    <pre><code>{

"message": "your message here"
}</code></pre>

    <h3>Response</h3>
    <p>The API will return a JSON object containing the response and four follow-up questions.</p>
    <pre><code>{

"response": "As of the latest available data, the United States has the highest number of billionaires in the world. According to Forbes, the U.S. consistently tops the list with the most individuals having a net worth of at least one billion dollars.",
"follow_up_questions": [
"How many billionaires are there in the United States?",
"What are the most common industries among billionaires?",
"Who is currently the richest billionaire in the world?",
"How has the number of billionaires changed over the past decade?"
]
}</code></pre>

    <h3>Example Request</h3>
    <pre><code>curl -X POST http://localhost:8000/api/generate -H "Content-Type: application/json" -d '{"message": "Which country has the highest number of billionaires in the world?"}'</code></pre>

    <h2>Contributing</h2>
    <p>Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.</p>

    <h2>License</h2>
    <p>MIT</p>

</body>
</html>
