<?php

namespace Check\Controller;

class Blog
{
    const MAX_POSTS = 5;

    protected $oUtil, $oModel;
    private $_iId;

    public function __construct()
    {
        $this->oUtil = new \Check\Core\Util;

        /** Get the Model class **/
        $this->oUtil->getModel('Article');
        $this->oModel = new \Check\Model\Article;

        /** Get the Post ID **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    // Homepage
    public function index()
    {
        $this->oUtil->oArticle = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('index');
    }

    public function article()
    {
        $this->oUtil->oPost = $this->oModel->getById($this->_iId); // Get the data of the post

        $this->oUtil->getView('post');
    }

    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }
}