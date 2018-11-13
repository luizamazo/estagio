Trabalho de programação web

0 -  Clona o repositório (git clone https://github.com/luizamazo/vaga.git)

1 - Cria um arquivo .env na pasta principal, copia o conteúdo de .env.example e cola nele. Em DB_DATABASE coloca o nome do banco de dados que você criou, DB_USERNAME = root, DB_PASSWORD no windows é = '' a não ser que tenha sido especificado a senha

2 - Entra na pasta do repositório pelo terminal e roda: 
npm install
composer install

3 - Dentro da pasta, roda o comando php artisan key:generate

4 - Pra testar, dentro da pasta, php artisan serve

5 - Comando pra compilar coisa do vue é npm run watch, uma aba fica ele, outra fica o php artisan serve