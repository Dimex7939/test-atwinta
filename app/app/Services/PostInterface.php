<?php

namespace App\Services;

interface PostInterface {
	public function addPost(array $data);

	public function timeAgo($posts, $isList);

	public function getList();

	public function getById($id);

	public function getUserList();
}