<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel5Helpers\Exceptions\LaravelHelpersExceptions;
use App\Repositories\Entry as Repository;
use App\Definitions\Entry as Definition;
use App\Jobs\SendEmailJob;

class Entry extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        try {
            if (!empty($request['hobbies']) && isset($request['hobbies']) && !is_null($request['hobbies'][0])) {
                $request['hobbies'] = json_encode($request['hobbies']);
            }
            $entry = $this->getRepository()->createResource($this->getDefinition($request->all()));
            dispatch(new SendEmailJob($entry->email_address, $entry->name));
            return $this->ajaxSuccess('Entry added successfully', false, true);
        } catch (LaravelHelpersExceptions $exception) {
            return $this->ajaxError($exception->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $entry = $this->getRepository()->getResource($id);
            if (!empty($request['hobbies']) && isset($request['hobbies']) && !is_null($request['hobbies'][0])) {
                $hobbies = json_decode($entry->interests, true);
                $request['hobbies'] = json_encode(array_merge($hobbies, $request['hobbies']));
            } else {
                $request['hobbies'] = $entry->interests;
            }
            $this->getRepository()->editResource($this->getDefinition($request->all()), $id);
            return $this->ajaxSuccess('Entry updated successfully', route('admin-home'), true);
        } catch (LaravelHelpersExceptions $exception) {
            return $this->ajaxError($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->getRepository()->deleteResource($id);
            return $this->ajaxSuccess('Entry deleted successfully', false, true);
        } catch (LaravelHelpersExceptions $exception) {
            return $this->ajaxError($exception->getMessage());
        }
    }

    protected function getRepository()
    {
        return new Repository;
    }

    protected function getDefinition($request)
    {
        return new Definition($request);
    }
}
