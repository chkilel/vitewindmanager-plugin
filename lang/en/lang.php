<?php return [
    'plugin' => [
        'name' => 'Vitewind',
        'description' => 'Inject needed JS and CSS by Vitewind theme',
    ],
    'settings' => [
        'label' => 'Vitewind Theme',
        'description' => ' Manage Vitewind configuration',
        'environmemt' => [
            'label' => 'Environmemt',
            'comment' => 'If .env is selected, please set `APP_ENV` in the .env file accordingly',
            'options' => [
                'env' => 'Use .env configuration',
                'dev' => 'Development',
                'prod' => 'Production',
            ],
        ],
        'port'=>[
            'label'=>'Port number ',
            'comment'=>'Enter the port on which the theme dev server is running (when you run `npm run dev`), default is 3000',
        ],
        'theme'=>[
            'label' => 'Theme',
            'comment' =>'Choose the appropiate theme if you renamed the theme folder',
        ]
    ],
    'component' => [
        'name' => 'Vitewind theme\'s assets',
        'description' => 'This component will inject CSS and JS assets for "Vitewind" theme to work properly with viteJS in development and production.',
        'properties' => [
            'title' => 'Javascript files',
            'description' => 'Enter JS files with the extension .js, files PATH is relative to "resources/js" folder inside the theme folder, each line represents a file.',
            'placeholder' => 'Enter liste of JS files',
        ],
        'different_theme_exception' => 'Make sure you are configuring your theme in the settings area, the active theme does not match the configured one!',
        'manifest_not_found_exception' => 'Make sure to build your theme by runnig `npm run build`, theme assets are not found!',
    ],
    'permission' => [
        'manage_tab' => 'Vitewind theme',
        'access_settings' => 'Configure Vitewind environment',
    ],
];
