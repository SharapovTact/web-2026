lw3: http://localhost/
lw4: http://localhost/test-cgi/lw4.cgi?Nikita
lw5: http://localhost/test-cgi/lw5.cgi?lanterns=1
lw6: http://localhost/test-cgi/lw6.cgi?name=Nikita
lw7: http://localhost/test-cgi/lw7.cgi?first_name=Nikita&age=17&last_name=Gleb

git add . - Добавление всех файлов в отслеживаемое, такие файлы будут отправлены в предст. коммит
git commit -a -m "Name" - Коммит все изменённые, отслеживаемые файлы

Специфичный кейс, если нам нужно закомитить не все файлы:
git add "file"
git commit -m "Name"
