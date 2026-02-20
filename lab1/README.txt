lw3: http://localhost/
lw4: http://localhost/test-cgi/lw4.cgi?Nikita
lw5: http://localhost/test-cgi/lw5.cgi?lanterns=1
lw6: http://localhost/test-cgi/lw6.cgi?name=Nikita
lw7: http://localhost/test-cgi/lw7.cgi?first_name=Nikita&age=17&last_name=Gleb

git add . - Добавление всех файлов в отслеживаемое, такие файлы будут отправлены в предст. коммит
git commit -a -m "Name" - Коммит все изменённые, отслеживаемые файлы
git fetch origin main - если нужно подтянуть в GIT файлы
git pull origin - если нужно применить изменения с гита на локальные файлы

Специфичный кейс, если нам нужно закомитить не все файлы:
git add "file"
git commit -m "Name"

CGI (Common Gateway Interface)
Клиент отправляет запрос
Запрос имеет заголовки и тело
CGI ловит тело в INPUT и заголовки через переменные окружения
Обрабатывает их и отправляет ответ