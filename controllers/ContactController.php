<?php

namespace app\controllers;

use app\models\Contact;
use app\core\Controller;
use app\core\exceptions\FormException;

class ContactController extends Controller
{

	function __construct()
	{
		$this->layout = 'main';
	}

	/**
		Get resource list
	 **/
	public function index()
	{
		echo $this->render('contact');
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
		$Contact = new Contact;
		$Contact->load();

		if ($Contact->new()) {
			return $this->response()->sendSuccess([
				'message' => "Your message was sent successfully"
			]);
		}

		throw new FormException("Failed to submit message");
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
