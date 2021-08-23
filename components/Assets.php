<?php namespace Chkilel\VitewindManager\Components;

use Chkilel\VitewindManager\Models\Settings;
use Cms\Classes\CmsException;
use Cms\Classes\ComponentBase;
use Cms\Classes\Theme;

class Assets extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'chkilel.vitewindmanager::lang.component.name',
            'description' => 'chkilel.vitewindmanager::lang.component.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'js' => [
                'title' => 'chkilel.vitewindmanager::lang.component.properties.title',
                'description' => 'chkilel.vitewindmanager::lang.component.properties.description',
                'placeholder' => 'chkilel.vitewindmanager::lang.component.properties.placeholder',
                "property" => "js",
                "type" => "stringList",
                "default" => ["app.js", "home.js"],
            ]
        ];
    }

    public function onRun()
    {
        $environment = Settings::get('environment');
        $port = Settings::get('port');
        $theme = Settings::get('theme');


        $theme_dir = Theme::getActiveTheme()->getDirName();
        $theme_path = Theme::getActiveTheme()->getPath();

        // Make sure the configured theme is the activated one
        if ($theme !== $theme_dir) {
            throw new CmsException(trans('chkilel.vitewindmanager::lang.component.different_theme_exception'));
        }

        // Set ENV depending on the settings
        switch ($environment) {
            case 'env':
                $env = env('APP_ENV');
                break;
            case 'dev':
                $env = 'development';
                break;
            default:
                $env = 'production';
        }

        // $env can be any word starting by dev lowercase or uppecase, to manage cases when coming from .env file
        if (stripos($env, 'dev') === 0) {
            // Development
            $jsAssets = $this->property('js');

            $this->addJs("http://localhost:{$port}/@vite/client", ['type' => 'module']);
            foreach ($jsAssets as $jsFile) {
                $this->addJs("http://localhost:{$port}/resources/js/{$jsFile}", ['type' => 'module']);
            }
        } else {
            // Production
            // If Assets not built
            if (@file_get_contents($theme_path . '/public/build/manifest.json')) {
                $manifest = json_decode(file_get_contents($theme_path . '/public/build/manifest.json'), true);
            } else {
                throw new CmsException(trans('chkilel.vitewindmanager::lang.component.manifest_not_found_exception'));
            }

            foreach ($manifest as $key => $builtResource) {
                // if it starts with `_`, this file doesn't need to be injected in the layout
                // because it's imported in one of the injected files as a dependency by ViteJS
                if (!($key[0] === "_")) {
                    $js = $builtResource['file'];

                    // No css was imported in js files
                    $css = array_key_exists('css', $builtResource) ? $builtResource['css'][0] : null;

                    $resourceFile = str_replace('resources/js/', '', $builtResource['src']);

                    if (in_array($resourceFile, $this->property('js'), true)) {
                        $this->addJs("/themes/{$theme_dir}/public/build/{$js}", ['type' => 'module']);

                        if ($css !== null) {
                            $this->addCss("/themes/{$theme_dir}/public/build/{$css}");
                        }
                    }
                }
            }
        }
    }
}
