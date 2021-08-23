<?php namespace Chkilel\VitewindManager\Models;

use Cms\Classes\Theme;
use Model;

/**
 * Settings Model
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'vitewind_settings';

    public $settingsFields = 'fields.yaml';


    /**
     * Dropdown options for themes in the settings area
     *
     * @param $value
     * @param $formData
     * @return array
     */
    public function getThemeOptions($value, $formData)
    {
        $themes = Theme::all();
        $options = [];
        foreach ($themes as $theme) {
            $options[$theme->getDirName()] = $theme->getConfigValue('name');
        }

        return $options;
    }
}
