<?php

namespace Check\Model;

class Article
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \Check\Core\Db;
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM article ORDER BY add_date DESC LIMIT :offset, :limit');
        $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM article WHERE id = :postId LIMIT 1');
        $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
}