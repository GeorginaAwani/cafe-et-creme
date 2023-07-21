<?php

namespace app\controllers;

use app\models\Booking;
use app\core\Controller;
use app\core\Application;
use app\core\exceptions\FormException;

class BookingController extends Controller
{
	function __construct()
	{
		$this->layout = 'app';
	}

	public function index()
	{
		return $this->render('booking');
	}

	public function create()
	{
		if ($this->request()->isAPIRequest()) {
			$Booking = new Booking;
			$Booking->user_id = Application::$App->user->id;
			$Booking->load();

			if ($Booking->save()) {
				$this->response()->sendSuccess([
					'message' => "Table booked successfully",
				]);
			} else {
				throw new FormException("Failed to ");
			}
		}
	}

	public function update(): void
	{
		if ($this->request()->isAPIRequest()) {
			$Booking = new Booking;
			$Booking->user_id = Application::$App->user->id;
			$Booking->load();

			if ($Booking->save()) {
				$this->response()->sendSuccess([
					'message' => "Table booked successfully",
				]);
			} else {
				throw new FormException("Failed to book table");
			}
		}
	}

	public function destroy(): void
	{
	}
}
