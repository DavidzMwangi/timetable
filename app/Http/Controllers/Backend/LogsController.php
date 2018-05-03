<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Rap2hpoutre\LaravelLogViewer\LaravelLogViewer;

//if (class_exists("\\Illuminate\\Routing\\Controller")) {
//    class BaseController extends \Illuminate\Routing\Controller {}
//} else if (class_exists("Laravel\\Lumen\\Routing\\Controller")) {
//    class BaseController extends \Laravel\Lumen\Routing\Controller {}
//}
class LogsController extends Controller
{
    //
    protected $request;

    public function __construct ()
    {
        $this->request = app('request');
    }

    public function index()
    {

        if ($this->request->input('l')) {
            LaravelLogViewer::setFile(Crypt::decrypt($this->request->input('l')));
        }

        if ($this->request->input('dl')) {
            try {
                return $this->download(LaravelLogViewer::pathToLogFile(Crypt::decrypt($this->request->input('dl'))));
            } catch (\Exception $e) {
            }
        } elseif ($this->request->has('del')) {
            try {
                app('files')->delete(LaravelLogViewer::pathToLogFile(Crypt::decrypt($this->request->input('del'))));
            } catch (\Exception $e) {
            }
            return $this->redirect($this->request->url());
        } elseif ($this->request->has('delall')) {
            foreach(LaravelLogViewer::getFiles(true) as $file){
                try {
                    app('files')->delete(LaravelLogViewer::pathToLogFile($file));
                } catch (\Exception $e) {
                }
            }
            return $this->redirect($this->request->url());
        }

        $data = [
            'logs' => LaravelLogViewer::all(),
            'files' => LaravelLogViewer::getFiles(true),
            'current_file' => LaravelLogViewer::getFileName()
        ];

        if ($this->request->wantsJson()) {
            return $data;
        }

        return app('view')->make('backend.logs', $data);
//        return app('view')->make('laravel-log-viewer::log', $data);
    }

    private function redirect($to)
    {
        if (function_exists('redirect')) {
            return redirect($to);
        }

        return app('redirect')->to($to);
    }

    private function download($data)
    {
        if (function_exists('response')) {
            return response()->download($data);
        }

        // For laravel 4.2
        return app('\Illuminate\Support\Facades\Response')->download($data);
    }
}
