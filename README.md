Here is the converted GitHub README.md file:
OpenAI Response Generator API
Description
This API allows you to generate responses and follow-up questions using the OpenAI language model.
Prerequisites
PHP 8.0 or higher
Composer
OpenAI API key
Installation
Clone the repository: git clone <repository-url>
Install dependencies: composer install
Create a .env file and set your OpenAI API key: OPENAI_API_KEY=your_openai_api_key_here
Migrate the database: php artisan migrate
Start the server: php artisan serve
Usage
Endpoint
POST /api/generate
Request Body
JSON
{
"message": "your message here"
}
Response
The API will return a JSON object containing the response and four follow-up questions.
JSON
{
"response": "As of the latest available data, the United States has the highest number of billionaires in the world. According to Forbes, the U.S. consistently tops the list with the most individuals having a net worth of at least one billion dollars.",
"follow_up_questions": [
"How many billionaires are there in the United States?",
"What are the most common industries among billionaires?",
"Who is currently the richest billionaire in the world?",
"How has the number of billionaires changed over the past decade?"
]
}
Example Request
Bash
curl -X POST http://localhost:8000/api/generate -H "Content-Type: application/json" -d '{"message": "Which country has the highest number of billionaires in the world?"}'
Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
License
MIT
Note: I've removed the HTML tags and reformatted the content to fit the GitHub README.md format. Let me know if you need any further adjustments!
