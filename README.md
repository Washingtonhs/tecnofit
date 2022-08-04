# API RestFull - TecnoFit

## Proposta do desafio

Endpoint REST (de preferência em PHP) que retorna o ranking de um determinado movimento, trazendo o nome do movimento e uma lista ordenada com os usuários, seu respectivo recorde pessoal (maior valor), posição e data.

## Instalação

- Faça o download ou clone na raiz do seu servidor
- Acesse o arquivo .env e edite a linha 24 com o caminho do seu servidor
- Acesse o arquivo .env e edite as linhas 43 a 46 com os dados de acesso ao SGDB
- Execute o script db.sql em seu SGBD para criação da estrutura e popular o banco

## Chame pelo navegador

localhost/tecnofit

## Endpoints
- GET
    - localhost/tecnofit/ranking (obtem todos os registros)
    - localhost/tecnofit/ranking/MODALIDADE_ID (obtem o ranking da modalidade)

- POST
    - localhost/tecnofit/ranking
    competitor : 3 (Id competidor)
    movement : 2 (Id movimento)
    score : 150 (Pontuacao)

- PUT/PATCH
    - localhost/tecnofit/ranking/REGISTRO_ID
    competitor : 1 (Novo valor para id competidor)
    movement : 3 (Novo valor para id movimento)
    score : 85 (Nova pontuacao)

- DELETE
    - localhost/tecnofit/ranking/REGISTRO_ID

## Painel Administrativo

Implementei um painel administrativo onde é possivel gerir (CRUD) os movimentos e os competidores.
Ao clicar no nome do usuário logado, é possivel alterar as informações pessoais.
- localhost/tecnofit/ranking/admin
- Usuário: ze
- Senha: 123

## Requisitos

- O PHP versão 7.4 ou mais recente é necessário, com a extensão *intl* e a extensão *mbstring* instaladas.
- MySQL
- mod_rewrite habilitado

## Ferramentas ultilizadas

- CodeIgniter 4.2.1
- AdminLTE v3.2.0

## Licença

Este projeto está sob a licença MIT.
Isto significa que você pode usar e modificar ele livremente para projetos pessoais e comerciais, apenas preservando o crédito dos autores.