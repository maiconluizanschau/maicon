<?php 
namespace Tarefas;
Interface Itasks
{
	public function insertTask($dadosTask);
    public function syncServer($tarefas);
    public function allTasks();
    public function editTask($dadosTask);
    public function removeTask($id);

}