<?php

namespace app\controllers;

use app\core\Controller;
use app\models\products\Drink;

class DrinkController extends Controller
{
	private Drink $Drink;

	function __construct()
	{
		$this->Drink = new Drink;
		$this->Drink->load();
	}

	/**
		Get resource list
	 **/
	public function index()
	{
		if (!is_null($this->Drink->category))
			$this->Drink->category = str_replace('-', '', $this->Drink->category);

		return $this->Drink->retrieve();
	}

	/**
		Get a single resource by id
	 **/
	public function show(int $id)
	{
		$this->Drink->id = $id;

		return $this->Drink->get();
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
