<?php

namespace app\controllers;

use app\core\Controller;
use app\models\products\Topping;

class ToppingController extends Controller
{
	private Topping $Topping;

	function __construct()
	{
		$this->Topping = new Topping;
	}

	/**
		Get resource list
	 **/
	public function index()
	{

		return $this->Topping->retrieve();
	}

	/**
		Get a single resource by id
	 **/
	public function show(int $id)
	{
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
