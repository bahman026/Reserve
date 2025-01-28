# ReserveApp Project

## Project Overview
The ReserveApp system has been developed for the 5040 company to handle core reservation functionalities,
In this project, I utilized several design patterns, including the Repository Pattern, Action Pattern, and DTOs (Data Transfer Objects), to ensure a clean, maintainable, and scalable codebase.

---

## Key Features
1. **Reservation API System**

2. **Localization:**
    - Fully supports multi-language messages for both Persian (fa) and English (en).

3. **API Implementation:**
    - Built using Laravel.
    - Relies on Laravel FormRequests for request validation.

4. **Containerized Environment:**
    - The project is fully Dockerized for easy setup and environment consistency.
    - Command to build and run the container:
      ```bash
      sudo docker compose up -d --build
      ```
    - To access the running container:
      ```bash
      sudo docker exec -it -u www-data reserveapp_app bash
      ```

---

## Deployment Instructions
1. Clone the repository to your local machine.
   ```bash
   git clone <repository_url>
   cd <project_directory>
   ```

2. Create .env
   ```bash
   cp .env.example  .env
   ```

3. Build and start the container using Docker Compose:
   ```bash
   sudo docker compose up -d --build
   ```
    - By default, the application will be accessible at: ```http://127.0.0.1:3535/```
    - Please note that due to the execution of the ENTRYPOINT ["./run.sh"] script, it might take a few seconds for the application to fully load.
    - The commands executed in the run.sh file are:
   ```bash
    composer install
    npm i
    npm run build

    # Remove this line in production environment
    php artisan key:generate

    php artisan migrate --seed
    chmod -R +x /var/www/html/storage/app
    php-fpm -F

   ```

4. Access the application through the container by using the following command:
   ```bash
   sudo docker exec -it -u www-data reserveapp_app bash
   ```
5. Test the API endpoints using tools such as Postman or cURL.
6. For email functionality, ensure the queue worker is running inside the container:
   ```bash
   php artisan queue:work
   ```

---

## Notes
- Use tools like Postman or cURL to manually verify API functionality.

---

This README provides an overview of the ReserveApp project, its setup instructions, and deployment guidelines.

