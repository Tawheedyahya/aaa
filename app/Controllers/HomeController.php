<?php

namespace App\Controllers;

use duncan3dc\Laravel\BladeInstance;

class HomeController
{
    protected $blade;

    public function __construct(BladeInstance $blade)
    {
        $this->blade = $blade;
    }

    public function index()
    {
        // echo 'hii';
        echo $this->blade->render('home', [
            'name' => 'Yahya'
        ]);
    }
    public function about(){
        echo $this->blade->render('about', [
            'name' => 'Yahya'
        ]);
    }

    public function projects(){
        $projects = include dirname(__DIR__, 2) . '/views/data/our_recent_projects.php';
        echo $this->blade->render('projects', [
            'projects' => $projects
        ]);
    }

    public function project($id){
        $allProjects = include dirname(__DIR__, 2) . '/views/data/our_recent_projects.php';
        $project = collect($allProjects)->firstWhere('id', (int)$id);
        if (!$project) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }
        echo $this->blade->render('project-single', [
            'project' => $project
        ]);
    }

    public function contact(){
        echo $this->blade->render('home'); // placeholder
    }
}