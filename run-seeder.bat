@echo off
echo Running Student Articles Seeder...
php artisan db:seed --class=StudentArticlesSeeder
echo.
echo Done! Check http://127.0.0.1:8000/student/articles to view the articles.
pause
