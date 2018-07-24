<?php

namespace PortOneFive\HowToVideos\Http\Controllers;

use GuzzleHttp\Client;
use LaraPress\Admin\AdminPageController;

class HowToVideosController extends AdminPageController
{
    protected $apiKey;
    protected $projectId;
    protected $project;

    public function __construct()
    {
        $this->apiKey = config('how-to-videos.htv_wistia_api_key');
        $this->projectId = config('how-to-videos.htv_wistia_project_id');
    }

    public function index()
    {
        $this->warnIfNoApiKey();

        $this->warnIfNoProjectId();

        $this->fetchProject();

        return view('how-to-videos::how-to-videos', [
            'lastSection' => null,
            'videos'      => $this->project->medias,
        ]);
    }

    private function fetchProject()
    {
        $client = new Client();

        $response = $client->get(
            'https://api.wistia.com/v1/projects/' . $this->projectId . '.json', [
            'form_params' => [
                'api_password' => $this->apiKey,
            ],
        ]);

        $this->project = json_decode($response->getBody());

        $this->sortMediaBySection();
    }

    private function warnIfNoApiKey()
    {
        if (!$this->apiKey) {
            wp_die('The .env file requires HTV_WISTIA_API_KEY.');
        }
    }

    private function warnIfNoProjectId()
    {
        if (!$this->projectId) {
            wp_die('The .env file requires HTV_WISTIA_PROJECT_ID.');
        }
    }

    private function sortMediaBySection()
    {
        if ($this->project->medias) {
            usort($this->project->medias, [$this, "sortBySection"]);
        }
    }

    private function sortBySection($a, $b)
    {
        if (isset($a->section) && isset($b->section)) {
            return strcmp($a->section, $b->section);
        }
    }
}
