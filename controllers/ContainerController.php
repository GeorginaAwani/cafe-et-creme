<?php

namespace app\controllers;

use app\core\Controller;
use app\models\products\Container;

class ContainerController extends Controller
{
	private Container $Container;

	function __construct()
	{
		$this->Container = new Container;
	}

	/**
		Get resource list
	 **/
	public function index()
	{
		return $this->Container->retrieve();
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
