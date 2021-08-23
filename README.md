<h1 align='center'>Vitewind Manager plugin</h1>

<p align='center'><a href="https://github.com/windicss/windicss">💨Windi CSS</a> and <a href="https://github.com/vitejs/vite"> ⚡️Vite</a>, for <a href="https://octobercms.com"> 🍂OctoberCMS</a>  & <a href="https://wintercms.com/">❄️WinterCMS</a><br>
</p>

<p align='center'>
  <img src='https://vitejs.dev/logo.svg' alt='Vite' width='100'/>
  <img src='https://windicss.org/assets/logo.svg' alt='Vite' width='100'/>
</p>

## Introduction
This is a helper plugin for <a href="https://github.com/chkilel/vitewind-theme">💨**Vitewind theme**</a>, don't install it if you don't use **Vitewind theme**


## Installation

Go to your backend to **Settings > System > Updates & Plugins** and install the plugin `Chkilel.VitewindManager` (just copy & paste the PluginID below and put it in the search box.)

## Theme settings
Go to your backend to **Settings > Vitewind theme**, and configure the following settings:

![Setting Vitewind](https://res.cloudinary.com/chkilel/image/upload/v1629731690/vitewind-plugin/settings_o4u4xq.png)

        Environment:
            - Use `.env` configuration : will use the `APP_ENV` value in the .env file
            - Development
            - Production

        Port number : Enter the port on which the theme dev server is running (when you run `npm run dev`)

        Theme: choose the appropiate theme, for example if you renamed the theme folder


## Layout component

The **Vitewind Manager plugin** register a layout component to inject JS and CSS assets, manage hot reload in Development and inject built assets in production.

![Layout component](https://res.cloudinary.com/chkilel/image/upload/v1629731693/vitewind-plugin/layout-component_rqbj7b.png)

Put the component in every layout and set the JS files you need to load for that layout.

![Layout component settings](https://res.cloudinary.com/chkilel/image/upload/v1629731691/vitewind-plugin/layout-component-settings_gvygt7.png)

## Theme License

MIT License - check out [LICENSE](LICENSE) file for MIT license details.

## Changelog

### 1.0.0 : initial release

- Vitewind: the magic of Windi CSS and the speed of Vite JS
