# INSTALAÇÃO do BOOTSTRAP via CMD no LARAVEL

## 1) Diferenças entre os arquivos 'composer.json' e 'package.json'

   ### 1.1) "composer.json"

    O arquivo 'composer.json' instala as dependências PHP 'básicas' do Laravel.

	Exemplo de bibliotecas: 
	- laravel/framework
	- laravel/finker
	- laravel/proxy

	Instalação via cmd: composer update

	Local: pasta 'VENDOR'

	--------------------------------------------------

   ### 1.2)	"package.json"

	O arquivo 'package.json' instala as dependências JAVASCRIPT para estilização do Front-End do Laravel.

	Esse arquivo contém bibliotecas de Front-end que podem ser usadas no projeto. 

	Exemplo de bibliotecas: 
	- Bootstrap
	- JQuery
	- vue
	- axios

	Instalação via cmd: php artisan preset <nome_da_biblioteca>

	Obs.: O comando 'preset' seleciona a biblioteca de front-end que desejo usar no meu projeto.

	Local: pasta 'NODE_MODULES' (nova pasta criada automaticamente)


   #### 1.2.1) INSTALAÇÃO da Biblioteca BOOTSTRAP
     
    1º cmd: php artisan preset bootstrap  (Seleciona a biblioteca 'Boostrap')

    2º cmd: npm install    (Obs.: Antes de executar o 3º passo, ler o tópico 'DESABILITAR o Vue.js do Projeto')

    3º cmd: npm run dev    (atualiza os arquivos 'css/app.js' e 'js/app.css' na pasta 'public' com as dependências do bootstrap)


   #### 1.2.2) DESABILITAR o Vue.js do projeto:
	
   	Por padrão, o Laravel traz o Vue.js habilitado. 

    Todavia, para usar outra biblioteca de Front-End, como o Bootstrap é necessário
    desabilitar o Vue, caso contrário ficará dando erro no Browser (F12 = aba Console).

    Desabilitando o Vue:

    1º Comentar ou excluir todos os códigos que fazem refência ao Vue no arquivo 'js/app.js' da pasta 'RESOURCES'
    2º Rodar o cmd: npm run dev (ele vai atualizar os arquivos 'css/app.js' e 'js/app.css' na pasta 'PUBLIC' sem as dependências do Vue.js)
    
--------------------------------------------------

## 2) EXEMPLO de USO do BOOTSTRAP

    Como exemplo de uso, foi criada uma página com itens de menu para 'Clientes','Produtos','Departamentos' e 'Opcoes';

	1º - Criei o arquivo 'views/layouts/boostrap.blade.php' que servirá de 'layout'. 
	
	2º - Criei o arquivo 'outras/exemplo.blade.php' extendendo o template do bootstrap.

	3º - Configurei o arquivo de rotas (web) para chamar na URL: '.../boostrap'

--------------------------------------------------

## 3) Utilizando Bootstrap 4 no Laravel 6

    Para o Laravel Vers�o 6.0, � necess�rio instalar um pacote chamando laravel-ui:
   
    Via cmd:

	composer require laravel/ui
	php artisan ui bootstrap
	npm install && npm run dev