<?php

namespace Kenura\Mardock\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Markdown
{

    public string $location;

    public string $content = "";

    public array $blockComponents = [];

    public function __construct(string $location)
    {
        $this->location = $location;
    }

    public function process()
    {
        if (Storage::disk('local')->exists($this->location)) {

            $content = Storage::get($this->location);

            return $this->loadCompnents($content);
        }
    }

    public function render()
    {
        foreach ($this->blockComponents as $componentUUID => $component) {

            $this->content = str_replace($componentUUID, htmlspecialchars_decode($component), $this->content);
        }

        return $this->content;
    }

    protected function loadCompnents($content)
    {
        $componentsArray = config('markdown.components');

        foreach ($componentsArray as $component) {

            $view = config("markdown.components_view_container") . $component['view_file'];

            $content = $this->component($component['regex'], $content, $view);
        }

        $this->content = $content;

        return $this->blockComponents;
    }

    protected function component($pattern, $content, $view)
    {
        // Procedure for every component to follow.

        preg_match_all($pattern, $content, $matches);

        foreach ($matches[0] as $key => $match) {

            $output = view($view, ['string' => $match]);

            $componentUUID = $this->generateComponentUUID();

            $this->blockComponents = array_merge(array($componentUUID => htmlspecialchars($output)), $this->blockComponents);

            $content = str_replace($match, $componentUUID, $content);

        }

        return $content;
    }

    protected function generateComponentUUID()
    {
        $start = config('markdown.components_start');

        $end = config('markdown.components_end');

        return $start . Str::uuid() . $end;
    }
}
