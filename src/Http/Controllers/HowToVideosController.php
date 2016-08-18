<?php

namespace PortOneFive\HowToVideos\Http\Controllers;

use GuzzleHttp\Client;
use LaraPress\Admin\AdminPageController;

class HowToVideosController extends AdminPageController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectId = config('how-to-videos.wistia_project_id');

        if(!$projectId){
            return "You must set the WISTIA_PROJECT_ID in the config or env files.";
        }

        $client = new Client();

        $url = 'https://api.wistia.com/v1/projects/'. $projectId . '.json?api_password=' . config('how-to-videos.wistia_api_key');

        $response = $client->get($url);

        $project = json_decode($response->getBody());

        return view('how-to-videos::how-to-videos', [
            'videos' => $project->medias,
        ]);
    }
}
