<?php
return array (
  'createUser' => 
  array (
    'type' => 0,
    'description' => 'создание пользователя',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'viewUsers' => 
  array (
    'type' => 0,
    'description' => 'просмотр списка пользователей',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'readUser' => 
  array (
    'type' => 0,
    'description' => 'просмотр данных пользователя',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'updateUser' => 
  array (
    'type' => 0,
    'description' => 'изменение данных пользователя',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'deleteUser' => 
  array (
    'type' => 0,
    'description' => 'удаление пользователя',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'changeRole' => 
  array (
    'type' => 0,
    'description' => 'изменение роли пользователя',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'root' => 
  array (
    'type' => 2,
    'description' => '',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'createUser',
      1 => 'viewUsers',
      2 => 'readUser',
    ),
    'assignments' => 
    array (
      6 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
);
