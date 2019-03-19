# maicon
Teste de Conhecimentos – Analista Desenvolvedor
Os exercícios propostos a seguir, não possuem apenas uma forma correta de resolução. Aplique seus conhecimentos de forma a fazer uso das boas práticas de programação, sempre prezando
pela qualidade e simplicidade. Desta forma, além de um exercício de lógica de programação, esperamos que você exercite sua
criatividade e procure nos surpreender.

INTRODUÇÃO
Leia atentamente as instruções e desenvolva as soluções conforme proposto. Serão consideradas para a avaliação somente as questões que respeitarem os requisitos.

Com relação a análise de requisitos, arquitetura e modelagem de dados, inclua na entrega, os
artefatos e especificações que achar necessário.
Nossa intenção é entender melhor o seu nível de conhecimento nos aspectos que julgamos
importantes e que são requisitos da vaga que você se candidatou.
REQUISITOS
• Hospedar o código no GitHub (https://github.com/) ou Bitbucket (https://bitbucket.org/)
• Linguagem PHP 5.3
• Siga todas as regras definidas pela PSR-2
• Frameworks e bibliotecas utilizados para solução devem estar inclusos no repositório
• O repositório deve possuir um README.md, contendo instruções de como rodar o projeto
• Todas as questões devem constar no repositório
QUESTÕES
1. Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima
“Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos
de ambos (3 e 5), imprima “FizzBuzz”.

2. Refatore o código abaixo, fazendo as alterações que julgar necessário.
<br>
<?
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 header("Location: http://www.google.com");
 exit();
 } elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {
 header("Location: http://www.google.com");
 exit();
 }
 <br>
3. Refatore o código abaixo, fazendo as alterações que julgar necessário. 
<br>
<?php
class MyUserClass
 {
 public function getUserList()
 {
 $dbconn = new DatabaseConnection('localhost','user','password');
 $results = $dbconn->query('select name from user');

 sort($results);

 return $results;
 }
 }
 <br>
4. Desenvolva uma API Rest para um sistema gerenciador de tarefas (inclusão/alteração/exclusão). As tarefas consistem em título e descrição, ordenadas por prioridade.
<br>
Desenvolver utilizando:
<br>
• Linguagem PHP (ou framework CakePHP);
<br>
• Banco de dados MySQL;
<br>
Diferenciais:
<br>
• Criação de interface para visualização da lista de tarefas;
<br>
• Interface com drag and drop;
<br>
• Interface responsiva (desktop e mobile);
