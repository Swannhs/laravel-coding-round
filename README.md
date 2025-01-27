# Laravel API Application

This is a simple Laravel API application that demonstrates CRUD operations for blog posts, user registration, and task management. The application is containerized using Docker and Docker Compose for easy setup and testing.

## Requirements

- Docker
- Docker Compose

## Setup

1. **Clone the repository**

    ```bash
    git clone <repository_url>
    cd <repository_folder>
    ```

2. **Build the Docker container**

   Run the following command to build the Docker image:

    ```bash
    docker-compose build
    ```

3. **Run the Docker container**

   After the build is complete, run the following command to start the containers:

    ```bash
    docker-compose up -d
    ```

   This will start the application and expose it on port 8000.

4. **Run migrations**

   To set up the database schema, run the following command:

    ```bash
    docker-compose exec app php artisan migrate --force
    ```

5. **Run tests**

   After migrations are done, you can run the tests with the following command:

    ```bash
    docker-compose exec app php artisan test
    ```

6. **Access the application**

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

## Folder Structure

- **app/**: Contains the main Laravel application code (Controllers, Models, etc.)
- **database/migrations/**: Contains database migrations for creating necessary tables
- **tests/**: Contains feature and unit tests

## License

This project is open-source and available under the [MIT License](LICENSE).
