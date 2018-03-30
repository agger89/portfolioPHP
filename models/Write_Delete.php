<?php
namespace App;

class Write_Delete
{
    protected $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    //
    // 좋아요 와 댓글은 cascade 액션으로 글이 지워 지면 같이 지워지게 변경 해놓음
    //

    public function deletePic($id)
    {
        $stmt = $this->connect->prepare("DELETE FROM pics WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteArticle($id)
    {
        $stmt = $this->connect->prepare("DELETE FROM articles WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    }

}