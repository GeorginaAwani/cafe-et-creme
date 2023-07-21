<?php

namespace app\controllers;

use app\core\Controller;
use app\models\products\Category;

class CategoryController extends Controller
{
	private Category $Category;

	function __construct()
	{
		$this->Category = new Category;
		$this->Category->load();
	}

	/**
		Get category list
	 **/
	public function index()
	{
		return $this->Category->retrieve();
	}

	/**
		Get a single resource by id
	 **/
	public function show(string $name)
	{
		$this->Category->name = $name;
		return $this->Category->get();
	}

	/**
		Create new resource
	 **/
	public function create()
	{
	}

	/**
		Update existing resource
	 **/
	public function update(int $id)
	{
	}

	/**
		Delete exiting resource
	 **/
	public function delete(int $id)
	{
	}
}
