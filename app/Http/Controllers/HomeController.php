<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Entry as Repository;
use Laravel5Helpers\Exceptions\LaravelHelpersExceptions;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id = null)
    {
        try {
            $data = [
                'entries' => $this->getRepository()->getPaginated(),
                'languages' => $this->getRepository()->getLaguages(),
                'interests' => $this->getRepository()->getInterests(),
                'entry' => !empty($id) ? $this->getRepository()->getResource($id) : null,
            ];
            return view('admin.home', $data);
        } catch (LaravelHelpersExceptions $exception) {
            $this->sendError($exception->getMessage());
        }
    }

    protected function getRepository()
    {
        return new Repository;
    }
}
