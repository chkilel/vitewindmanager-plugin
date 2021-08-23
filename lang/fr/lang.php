<?php return [
    'plugin' => [
        'name' => 'Vitewind',
        'description' => 'Injecte les dépendances JS et CSS utiliséespar le theme Vitewind',
    ],
    'settings' => [
        'label' => 'Vitewind Theme',
        'description' => 'Gerer la configuraton de Vitewind',
        'environmemt' => [
            'label' => 'Environmemt',
            'comment' => 'Si vous choisissez .env, ajustez la variable d\'environement `APP_ENV` du fichier .env',
            'options' => [
                'env' => 'Utiliser la configuration dans .env',
                'dev' => 'Développment',
                'prod' => 'Production',
            ],
        ],
        'port'=>[
            'label'=>'Numéro de port',
            'comment'=>'Entrer le numéro de port du serveur de développment du theme (quand vous executez `npm run dev`), 3000 est la valeur par defaut',
        ],
        'theme'=>[
            'label' => 'Theme',
            'comment' =>'Choisissez le theme approprié, au cas ou vous renommer le dossier du theme',
        ]
    ],
    'component' => [
        'name' => 'Vitewind assets',
        'description' => 'Ce component va injecter les dépendances CSS et JS nécessaires pour que le theme "Vitewind" fonctione en développement et en production',
        'properties' => [
            'title' => 'Fichiers Javascript',
            'description' => 'Entrer les fichiers JS avec l\'extension .js, le chemin des fichiers est relatif au dossier "resources/js", chaque ligne représente un fichier.',
            'placeholder' => 'Entrer la liste des fichiers JS',
        ],
        'different_theme_exception' => 'S\'assurez-vous que la configuration du theme dans la zone settings du backend correspond au theme active!',
        'manifest_not_found_exception' => 'S\'assurez-vous de builder le theme avec ` npn run build`, les assets necessaires manquent!',

    ],
    'permission' => [
        'manage_tab' => 'Theme Vitewind',
        'access_settings' => 'Configurer l\'environement Vitewind',
    ],
];
