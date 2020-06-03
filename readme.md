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

	1º - Criei o arquivo 'views/layouts/boostrap.blade.php' que servirá de 'layout'. 
	
	2º - Criei o arquivo 'outras/exemplo.blade.php' extendendo o template do bootstrap.

	3º - Configurei o arquivo de rotas (web) para chamar na URL: '.../boostrap'

--------------------------------------------------

## 3) Utilizando Bootstrap 4 no Laravel 6

    Para o Laravel Versão 6.0, é necessário instalar um pacote chamando laravel-ui:
   
    Via cmd:

	composer require laravel/ui
	php artisan ui bootstrap
	npm install && npm run dev

--------------------------------------------------

## 4) Sobre este projeto

   Como exemplo de uso, foi criada uma página com itens de menu para 'Clientes','Produtos','Departamentos' e 'Opcoes';

   Relacionamentos:  
   * produtos (n) x (1) marca         (a PK de marca é FK em produto)
   * produtos (n) x (n) departamentos (foi criada uma tabela de ligação)

## 5) Sobre o comando 'resource'

	Este comando permite criar a estrutura do controlador com todos os métodos HTTP úteis para a realização de CRUD (GET, POST, DESTROY, PUT, SHOW, STORE, CREATE, UPDATE).
	Além disso, ele já cria automaticamente as rotas de acesso ao controlador no arquivo 'routes\web.php'.

	Ex.: Criação do controlador de Clientes:
	cmd: php artisan make:controller ClienteControle --resource

	Consultar as rotas criadas:
	cmd: php artisan route:list

--------------------------------------------------

## 6) Foreach e a Variável $LOOP 

No laravel, o Foreach possui uma uma variável interna chamada '$LOOP'. 
Ela permite obter dados da estrutura do Foreach:

Ex.:    @foreach($clientes as $c)
            ....
                @if($loop->first)   <!-- Verifica se é o 1º elemento do array -->
                    (primeiro) | 
                @endif
                @if($loop->last)   <!-- Verifica se é o último elemento do array -->
                    (último) |
                @endif
                <!--
                    'index'     => pega o índice do registro no array
                    'iteration' => pega a posicao do registro no array
                    'count'     => pega o número de registros do array
                -->
                (Índice: {{$loop->index}})  - {{$loop->iteration}} / {{$loop->count}} 
            </p>
        @endforeach