<?php
namespace TDDIntro\Repository;

interface RepositoryInterface{

  public function findAll();
  public function find(array $criteria = array(), array $orderBy = null, $limit = null, $offset=null);
  
}