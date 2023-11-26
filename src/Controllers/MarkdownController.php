<?php

namespace Kenura\Mardock\Controllers;

use Illuminate\Routing\Controller;
use Kenura\Mardock\Helpers\Markdown;
use Kenura\Mardock\Models\Markdown as MarkdownModel;

class MarkdownController extends Controller
{
    public function index()
    {
        //
    }

    public function show(string $markdownId)
    {
        $markdown_db = MarkdownModel::findorFail($markdownId);

        $markdown = new Markdown($markdown_db->file_location);

        $markdown->process();

        $outputs = $markdown->render();

        /*

        // Test

        $outputs = $content->process();

        foreach ($outputs as $key => $output) {

            echo $key." :- ";

            echo $output."<br/><br/><br/>";

        }
        */

        return view('mardock::pages.markdown', ['string' => $outputs]);
    }

}