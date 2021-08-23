<?php namespace Chkilel\VitewindManager;

use System\Classes\PluginBase;
use Chkilel\VitewindManager\Models\Settings;
use Chkilel\VitewindManager\Components\Assets;

/**
 * Vitewind Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'chkilel.vitewindmanager::lang.plugin.name',
            'description' => 'chkilel.vitewindmanager::lang.plugin.description',
            'author'      => 'Chkilel',
            'icon'        => 'icon-rocket'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            Assets::class => 'vitewindAssets',
        ];
    }


    /**
     * Registers back-end settings navigation links
     *
     * @return array[]
     */
    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'chkilel.vitewindmanager::lang.settings.label',
                'description' => 'chkilel.vitewindmanager::lang.settings.description',
                'category' => 'system::lang.system.categories.cms',
                'icon'        => 'icon-tint',
                'class'       => Settings::class,
                'order'       => 500,
                'keywords'    => 'vite tailwind windi css vitewind theme',
                'permissions' => ['chkilel.vitewind.access_settings'],
            ]
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'chkilel.vitewind.access_settings' => [
                'tab' => 'chkilel.vitewindmanager::lang.permission.manag_tab',
                'label' => 'chkilel.vitewindmanager::lang.permission.access_settings',
            ],
        ];
    }
}
