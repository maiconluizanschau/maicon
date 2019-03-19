// serviceBase consome os serviços da API
var serviceBase = 'http://localhost/teste-tecnico/teste-4/svr/api/';

angular.module("controleTarefas", ['ng-sortable']).controller("controleTarefasCtrl", function ($scope, $http){

	// Definindo as variáveis globais no scope do angular
	$scope.app = "Controle de Tarefas";
	$scope.tarefas = [];
	$scope.editar = [];
	$scope.orig = angular.copy($scope.editar);

	/**
	 * Declaração de função nos scope do angular para enviar uma requisição
	 * ao endpoit da API responsável pelo recurso de adicionar uma tarefa.
	 */
	$scope.adicionarTarefa = function (tarefa) {
		$http.post(serviceBase + 'Tasks/insertTask', tarefa).success(function(data){
			delete $scope.tarefa;
			listarTarefas();
		});
	};

	/**
	 * Declaração de função nos scope do angular para enviar uma requisição ao endpoit da API
	 * responsável por retornar uma lista com todas as tarefas cadastradas no banco de dados.
	 */
	var listarTarefas = function(){
		$http.get(serviceBase + 'Tasks/allTasks').success(function(data, status){
			$scope.tarefas = data;
		})
	}

	$scope.classe = "selecionado";
	$scope.apagarTarefas = function(tarefas){
		$scope.tarefas = tarefas.filter( function(tarefa){
			if(tarefa.selecionado){
				$http.post(serviceBase + 'Tasks/removeTask', tarefa.id_task).success(function(data){
					delete $scope.tarefas;
					listarTarefas();
				});
			}
		});
	};

	/**
	 * Declaração de variável e função no scope do angular para trabalhar
	 * com os dados em memória ao reordenar as tarefas localmente no aplicativo.
	 */
	$scope.sync = {};
    $scope.sync = function(tarefas){
        syncServer(tarefas);
    };

    /**
	 * Declaração de função nos scope do angular para enviar uma requisição ao endpoit
	 * da API responsável pelo recurso de sincronizar a ordem de prioridade das tarefas
	 * no aplicativo.
	 */
    function syncServer(tarefas){
		$http.post(serviceBase + 'Tasks/syncServer', tarefas).success(function(){
		});
	}

	/**
	 * Declaração de variável e função no scope do angular para trabalhar
	 * com os dados de edição em memória local no aplicativo.
	 */
	$scope.edit = {};
	$scope.edit = function (tarefa,editar) {
		$scope.editar.push(angular.copy(tarefa));
	};

	/**
	 * Declaração de função nos scope do angular para enviar uma requisição ao endpoit
	 * da API responsável pelo recurso de editar uma tarefa específica através de seu id.
	 */
	$scope.editarTarefa = function (editar) {
		$http.put(serviceBase + 'Tasks/editTask', editar).success(function(data){
			resetScope();
			listarTarefas();
			$('#editTarefa').modal('hide');
		});
	};

  	function resetScope(){
    	$scope.editar = angular.copy($scope.orig);
  	};

  	$scope.fecharResetarEdit = function (){
  		resetScope();
  		$('#editTarefa').modal('hide');
  	}

	/**
	 * Chamada jquery para o componente de modal do bootstrap usado para fazer
	 * o cadastro de tarefas
	 */
	$('#addTarefa').on('shown.bs.modal', function () {
			$('#addTarefa').focus();
			listarTarefas();
	});

	/**
	 * Chamada jquery para o componente de modal do bootstrap usado para fazer
	 * a edição das tarefas
	 */
	$('#editTarefa').on('shown.bs.modal', function () {
			$('#editTarefa').focus();
			listarTarefas();
	});

	listarTarefas();
});