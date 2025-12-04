🌐 Web Fakultas UGK










A Full-Stack Faculty Information Web Application built from scratch using Laravel (Backend) and React.js (Frontend).
Developed independently as a personal project to practice modern API-driven architecture.

🚀 Features

🔹 CRUD Faculty & related academic data

🔹 RESTful API with Laravel

🔹 React-based UI with Axios integration

🔹 Clean separation of backend & frontend repositories

🔹 Scalable and extendable architecture

🛠️ Tech Stack
Area	Technology
Backend	Laravel · PHP · MySQL
Frontend	React.js · JavaScript · Axios
Tools	Composer · NPM · Git · GitHub
📂 Project Structure
web-fakultas-ugk/
├── fakultas-backend/    # Laravel API Service
└── fakultas-frontend/   # React User Interface

⚙️ Installation
Backend — Laravel API
cd fakultas-backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed   # optional
php artisan serve


➡ Default URL: http://localhost:8000

Frontend — React
cd fakultas-frontend
npm install
npm start


➡ Default URL: http://localhost:3000

Make sure API base URL is correctly set in the frontend (Axios / .env).

🔗 API Routes (Example)
Method	Endpoint	Description
GET	/api/fakultas	Get all faculties
POST	/api/fakultas	Create new faculty
GET	/api/fakultas/{id}	Get faculty details
PUT	/api/fakultas/{id}	Update faculty
DELETE	/api/fakultas/{id}	Delete faculty




🧭 Roadmap

Authentication (Admin / Lecturer / Student)

Role-based dashboard UI

Export & Import academic data

Deployment to hosting / cloud server

👤 Developer

Yefta Aditya
Full-Stack Web Developer (Laravel & React)

📧 Email (optional untuk recruiter): —
🔗 LinkedIn (optional): —
📁 Portfolio (optional): —

Open for internship / remote opportunities in Web Development and Software Engineering.
