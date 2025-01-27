# Laravel API Application

This is a simple Laravel API application that demonstrates CRUD operations for blog posts, user registration, and task management. The application is containerized using Docker and Docker Compose for easy setup and testing.

## Requirements

- Docker
- Docker Compose

## Setup

1. **Clone the repository**

    ```bash
    git clone https://github.com/Swannhs/laravel-coding-round.git
    cd laravel-coding-round
    ```

2. **Run and do testing with docker**
    
    ```bash
    docker-compose up -d --build
    ```

   This will start the application and expose it on port 8000. And do all the test and migration.

3. **Access the application**

   The application will be available at:

    ```
    http://localhost:8000
    ```

   You can interact with the API using the following routes:

    - **POST /api/register**: User registration (name, email, password)
    - **POST /api/posts**: Create a blog post (title, content)
    - **GET /api/posts**: List all posts
    - **GET /api/posts/{id}**: View a single post by ID
    - **POST /api/tasks**: Create a task (title, is_completed)
    - **PATCH /api/tasks/{id}**: Mark a task as completed
    - **GET /api/tasks/pending**: Get all pending tasks
