<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

class UsuarioGateway
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function persistir(Usuario $model)
    {
        $usuario = $model->getArrayCopy();
        $this->tableGateway->insert($usuario);
    }

    public function find($id)
    {
        $result = $this->tableGateway->select(['id' => $id]);
        return $result->current();
    }

    public function listar()
    {
        return $this->tableGateway->select();
    }

    public function visualizar(Usuario $model)
    {
        return $this->tableGateway->select(['id' => $model->id]);
    }

    public function excluir($model)
    {
        $this->tableGateway->delete(['id' => $model->id]);
    }

    public function atualizar($model)
    {
        $usuario = $model->getArrayCopy();
        $this->tableGateway->update($usuario, ['id' => $model->id]);
    }
}
