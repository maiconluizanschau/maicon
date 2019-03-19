<?php
/**
 * cabeçalho que habilita que sejam feitas requisições
 * originadas de qualquer domínio, além do mesmo da API.
 */
header('Access-Control-Allow-Origin: *');
require 'env.php';
require 'vendor/autoload.php';
use Tarefas\Database;
use Tarefas\Tasks;
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array('debug' => true));
$app->contentType("application/json");

//ERROR função que retorna exception por json
$app->error(function ( Exception $e = null) use ($app){
    echo '{"error":{"text":"'. $e->getMessage() .'"}}';
});

$app->get('/', function () use ($app){
    echo "API Rest do Gerenciador de Tarefas";
});

//Grupo de rotas da API
$app->group('/api', function () use ($app) {

    //Rota direta à função de listagem das tarefas
    $app->get('/Tasks/allTasks', function ($parameter = null) use($app) {
        $classe = new Tasks;
        $action = 'allTasks';
        $retorno = call_user_func_array(array($classe,$action), array($parameter));
        echo json_encode($retorno);
    });

    //Cadastro de tarefa não possui parâmetros na URL, e sim no cabeçalho da requisição
    $app->post('/Tasks/insertTask', function () use ($app) {
        $request = json_decode(\Slim\Slim::getInstance()->request()->getBody());
        $classe = new Tasks;
        $action = 'insertTask';
        $retorno = call_user_func_array(array($classe,$action), array($request));
        echo json_encode($retorno);
    });

    //PUT pode possuir um parametro na URL
    $app->put('/Tasks/editTask', function () use($app) {
        $request = json_decode(\Slim\Slim::getInstance()->request()->getBody());
        $classe = new Tasks;
        $action = 'editTask';
        $retorno = call_user_func_array(array($classe,$action), array($request));
        echo json_encode($retorno);
    });

    //Sincronização de tarefas do App com o servidor recebe parâmentros no cabeçalho da requisição
    $app->post('/Tasks/syncServer', function () use($app) {
        $request = json_decode(\Slim\Slim::getInstance()->request()->getBody());
        $classe = new Tasks;
        $action = 'syncServer';
        $retorno = call_user_func_array(array($classe,$action), array($request));
        echo json_encode($retorno);
    });

    //Remoção de tearefa não possui parâmetros na URL, e sim no cabeçalho da requisição 
    $app->post('/Tasks/removeTask', function () use($app) {
        $request = json_decode(\Slim\Slim::getInstance()->request()->getBody());
        $classe = new Tasks;
        $action = 'removeTask';
        $retorno = call_user_func_array(array($classe,$action), array($request));
        echo json_encode($retorno);
    });
});
$app->run();