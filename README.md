
# SIMULA ENEM

Sistema que entrega um simulador online, no qual o usuário dispõe de provas do 
ENEM por seus respectivos anos de aplicação. 

ACESSO ADMINISTRADOR: Para se tornar administrador do sistema, deve
modificar no banco de dados a entidade "permissao" para 2, pois ao cadastrar
qualquer usuário, o valor fica automaticamente como 1. 

Entrando no sistema como administrador, é possível escolher o que quer editar
ou adicionar.

ACESSO COMUM: Ao entrar no sistema como usuário comum, após o cadastro e login, tem-se a tela home
com as provas de acordo com os anos de aplicação. Ao clicar em uma prova, 
será redirecionado para uma página com dois dias de prova, cada um
com suas respectivas perguntas. O primeiro dia é a prova do primeiro domingo, sem redação
e sem língua estrangeira e o segundo segue a prova padrão.

!! ATENÇÃO !!
Toda vez que for cadastrar ou editar uma questão, tem que adicionar uma imagem para que ela seja cadastrada.
Para questões sem imagem, o administrador deverá, manualmente, adicionar a mensagem "sem imagem" no campo imagem no banco.  

CASO HAJA DÚVIDAS (Funcionamento da lógica do sistema):

1-Uma prova é ligada às suas respectivas semanas por meio do ano em que ocorreu (aqui o ano funciona como um id);

2- Uma questão é associada à uma respectiva semana por meio de um id (idProvas), que diz se é da semana 1 ou semana 2. O id é formado pela combinação do número da semana (1 ou 2), mais o ano da prova. 

- Ex de uma prova de 2015 

        Id da primeira semana = 12015

        Id da segunda semana = 22015

3-Já uma questão, é associada às suas alternativas também por meio de um id, formado pelo número da questão, seguido pelo ano da prova. 
- Ex: A questão 1 da prova de 2015 teria o id = 12015