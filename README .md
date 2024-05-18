

# OpenAI Response Generator API
This API allows you to generate responses and follow-up questions using the OpenAI language model.
Prerequisites
PHP 8.0 or higher
Composer
OpenAI API key
## Prerequisites
-PHP 8.0 or higher

-Composer

-OpenAI API key
## Installation


#### Clone the repository:
```bash
 git clone <repository-url>
cd openai-api

```
#### install dependencies:
```bash
composer install

```

####  Create a .env file and set your OpenAI API key:
```bash
OPENAI_API_KEY=your_openai_api_key_here
    
```
#### Migrate the database:
```bash
php artisan migrate
```
#### Start your server:
```bash
php artisan serve
```

## Usage/Examples
### Endpoint
```bash
POST /api/generate
```
### Request Body
```json
{
  "message": "your message here"
}
```
### Response

The API will return a JSON object containing the response and four follow-up questions.

```json

{ 
"response": "As of the latest available data, the United States has the highest number of billionaires in the world. According to the Forbes Billionaires List, the U.S. consistently tops the list with the most individuals having a net worth of at least one billion dollars.", 

"follow_up_questions": [
{ 
"question": "How many billionaires are there in the United States compared to other countries?" 
}, 

{ 
"question": "What industries are most common among billionaires in the United States?" 
}, 
{ 
"question": "Who is currently the richest billionaire in the world and what is their net worth?" 
}, 
{ 
"question": "How has the number of billionaires changed over the past decade in the United States?" 
} 
] 
} 
```



## Contributing

Contributions are always welcome!


## License

[MIT](https://choosealicense.com/licenses/mit/)

