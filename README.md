# Ambiente de desenvolvimento

1. Apache/2.4.46 (Win64) OpenSSL/1.1.1
2. PHP/7.4.13
3. Base de dados: MariaDB - 10.4.17
4. Laravel Framework 8.26.1 + composer + artisan
5. npm 6.14.10
# Intruções de uso
Para a instalçao do sistema, verifique se seu ambiente de trabalho corresponde as específicações do item acima.
instale a interface gráfica ui do Laravel. nesse projeto foi utilizado Vue
comando:
- npm install vue
Para a utilização inicialmente é preciso criar o sistema de tabelas do banco de dados, rodando o coamando
- php artisan migrate
Após instanciar o banco de dados, será possivel iniciar o uso do sistema.

#Uso do sistema
1. Crie um usuário (login/senha) para utilização do sistema
2. Após registrado será possivel começar a cadastrar novos itens no estoque
3. todo o sistema é protegido pelo sistema de autenticação nativo fornecido pelo laravel

#Cadastro de novos itens
1. Após acionar o botão de cadastro, será apresentado um formulário para que possa infromar os dados de cada item a ser cadastrado
2. Após cadastro, os produtos são automaticamente salvos no banco em uma tabela própia  e juntamente será registrado em outra tabela (historico) um registro sobre a movimentação do banco de dados
- A tabela  historico será responsável por armazenar toda e qualquer movimentação feita no estoque, ou seja, cada produto cadastrado será registrado como um Cadastro e cada produto vendido será registrado como uma Baixa no sistema
- A tabela historico também armazena um campo aonde é destinado para indicar qual foi o sistema utilizado em cada ação, ou seja, se a ação foi feita pelo sistam ou api.

