Trabalho de programação web

0 -  Clona o repositório (git clone https://github.com/luizamazo/estagio.git)

1 - Cria um arquivo .env na pasta principal, copia o conteúdo de .env.example e cola nele. Em DB_DATABASE coloca o nome do banco de dados que você criou, DB_USERNAME = root, DB_PASSWORD no windows é = '' a não ser que tenha sido especificado a senha

2 - Entra na pasta do repositório pelo terminal e roda: 
npm install
composer install

3 - Dentro da pasta, roda o comando php artisan key:generate se precisar

4 - php artisan migrate

5 - php artisan db:seed

4 - php artisan serve

Rota de admin /admin
Pra acessar os logs (/log), precisa estar logado como admin

admin@admin.com
lana@hotmail.com
sansa@hotmail.com
troste@hotmail.com

Senhas: 123456