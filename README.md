# Laravel Demo application

## Description
RESTful API 
- users can subscribe to websites
- posts can be published on a particular website
    - all subscribed users receive an email with the post details(title, description)

## Running instructions
- Clone the repository
- Run `composer install`
- Run `php artisan migrate --seed` to seed the database
- Configure `.env` with database access, mail credentials and queue driver (`QUEUE_CONNECTION=database`)
- Run `php artisan queue:work` to listen to events and `php artisan serve` to run the webserver
- Run the `Postman` example endpoints : [Postman JSON link](https://www.getpostman.com/collections/71c35b76dabb919ed63c)
- Run the `php artisan post:notify` command with either a post ID as argument or `--latest` flag to notify users for the latest post

<!-- Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required)

MUST:-
- Use PHP 7.* (i.e. use Laravel 8 as Laravel 9 requires PHP 8.0)
- Write migrations for the required tables.
- Endpoint to create a "post" for a "particular website".
- Endpoint to make a user subscribe to a "particular website" with all the tiny validations included in it.
- Use of command to send email to the subscribers.
- Use of queues to schedule sending in background.
- No duplicate stories should get sent to subscribers.
- Deploy the code on a public github repository.

OPTIONAL:-
- Seeded data of the websites.
- Open API documentation (or) Postman collection demonstrating available APIs & their usage.
- Use of contracts & services.
- Use of caching wherever applicable.
- Use of events/listeners.

Note:- 
1. Please provide special instructions(if any) to make to code base run on our local/remote platform.
2. Only implement what is mentioned in brief, i.e. only the API, no front-end things etc. The codes will never be deployed, we just want to see your coding skills. 
3. There isn't a strict deadline. The faster the better, however code quality (and implementing it as mentioned in brief) is the most important. However, of course it shouldn't take more than a couple of hours. 
4. If anything isn't clear, just implement it according to your understanding. There won't be any further explanations, the task is clear. As long as what you do doesn't contradict the briefing, it's fine.  -->
