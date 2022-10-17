# Instruções para rodar a aplicação em sua máquina

1. Clone o repositório em sua máquina
2. Abra ele no vscode ou em seu editor de sua preferência
3. Abra um terminal e digite o comando "composer install"
4. Crie um arquivo .env com o seguinte comando "cp .env.example .env"
5. Gere uma chave com o seguinte comando "php artisan key:generate"
6. Crie um banco de dados mysql com o nome que desejar
7. Agora vamos configurar o arquivo .env de acordo com nossas informações
8. A primeira variável que iremos modificar será a DB_DATABASE, por padrão ela estará como laravel, mude para o mesmo nome do banco de dados que você criou anteriomente
9.  A próxima é a DB_USERNAME, por padrão ela virá como root, você deverá colocar o nome de usuário do seu mysql.
10. E por último a DB_PASSWORD, que por padrão virá vazia, nela você colocará a senha do seu mysql.
11. Feito isso rode o comando "php artisan migrate"
12. Rode também "npm install && npm run dev"
13. E para finalizar rode "php artisan serve"
14. Esse comando vai te retornar um link, dê um ctrl+clique para abrir direto no seu navegador
15. E está lá  aplicação rodando em sua máquina
16. Note que a aplicação tem um limite de 5mb para upload, porém o php tem um limite de 2mb definido por padrão em cada máquina, para resolver esse conflito iremos abrir um terminal fora do projeto e colocar o seguinto comando "php --ini"
17. Esse comando irá gerar um monte de linhas porém é apenas a primeira que nos interessa(Path: /etc/php/8.1/cli), copie o path e digite "cd /etc/php/8.1/cli"
18. Após isso abra no seu vscode ou em um editor de sua preferência
19. Iremos procurar pelo seguinte nome (você pode usar o ctrl+f): upload_max_filesize
20. Por padrão ele vai estar "2M", altere para 5M, que é o limite da aplicação
21. Feito isso a aplicação está pronta para ser utilizada, Logo na página inicial terá um menu de navegação para que você começe a explorar a aplicação :)
