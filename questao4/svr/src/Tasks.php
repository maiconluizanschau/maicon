<?php
namespace Tarefas;
class Tasks implements Itasks
{
    /**
     * Método para inserção das tarefas
     * recebendo o array de uma tarefa como parâmetro.
     * @param type array $dadosTask
     * @return type bolean
     */
    public function insertTask($dadosTask)
    {
        try{
            $query = "INSERT INTO tasks (title_task,description) VALUES (:titulo,:descricao)";
            $query = Database::getInstance()->prepare($query);
            $query->bindParam("titulo", $dadosTask->title_task);
            $query->bindParam("descricao", $dadosTask->description);
            $query->execute();
            $idTask = Database::lastInsertId();
            $orderTask = Database::orderNewTask();
            $query2 = "UPDATE tasks SET order_task=:orderTask WHERE id_task =:idTask";
            $query2 = Database::getInstance()->prepare($query2);
            $query2->bindParam("orderTask",$orderTask->order_task);
            $query2->bindParam("idTask", $idTask->id_task);
            return $query2->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Método get para busca de todas as tarefas
     * @return type object
     */
    public function allTasks()
    {
        $query = "SELECT id_task,title_task,description,order_task FROM tasks ORDER BY order_task";
        $query = Database::getInstance()->prepare($query);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Método para edição de uma tarefa específica
     * recebe o array dadosTask de uma tarefa como parâmetro
     * @param type array $dadosTask
     * @return type bolean
     */
    public function editTask($dadosTask)
    {
        try{
            $editTask = "UPDATE tasks SET title_task=:title_task,description=:description WHERE id_task=:idTask";
            $query = Database::getInstance()->prepare($editTask);
            $query->bindParam("idTask", $dadosTask[0]->id_task);
            $query->bindParam("title_task", $dadosTask[0]->title_task);
            $query->bindParam("description", $dadosTask[0]->description);
            return $query->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Método para dição de uma tarefa específica
     * recebe o id de uma tarefa como parâmetro
     * @param type int $id
     * @return type bolean
     */
    public function removeTask($id)
    {
        try{
            $removeTask = "DELETE FROM tasks WHERE id_task=:idTask";
            $query = Database::getInstance()->prepare($removeTask);
            $query->bindParam("idTask", $id);
            return $query->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Método syncServer da classe task, que retorna um booleano
     * recebendo o um objeto tarefas como parâmetro.
     * @param type object $tarefas
     * @return type boolean
     */
    public function syncServer($tarefas)
    {
        try{
            $updateTarefas = array();
            foreach ($tarefas as $k => $tarefa){
                $tarefa->order_task = ($k+1);
                $updateTasks[] = $tarefa;
            }
            $query = array();
            $query ='';
            foreach($updateTasks as $key => $task){
                $query .= "UPDATE tasks SET order_task='".$task->order_task."' WHERE id_task='".$task->id_task."';";
            }
            $query = Database::getInstance()->prepare($query);
            return $query->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}