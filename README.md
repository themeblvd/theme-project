# "Theme Project" WordPress Plugin

This is a WordPress plugin for my local development to help support a more automated workflow for theme development. This plugin is used in local WordPress theme projects where I use Node.js and Gulp.

Below, I'll explain how this plugin fits into my overall theme development workflow, but really this is just a simple plugin showing the usefulness of WordPress's [register_theme_directory()](https://codex.wordpress.org/Function_Reference/register_theme_directory), beyond what it was probably originally intended for. Feel free to take this simple plugin and modify it for your own development workflows.

## Project Structure

We all know the basic structure of WordPress:

* `/wp-content`
	* `/plugins`
	* `/themes`
	* `/uploads`

Well, when developing a theme locally, my current project structure extends that by adding a `{name}-project` to the `/wp-content` directory of WordPress to hold my theme project.

* `/wp-content`
	* `/{name}-project`
		* `/dist`
			* `/{name}`
			* `name-x.x.x.zip`
		* `/lib`
		* `/src`
		* `gulpfile.js`
		* `package.json`
	* `/plugins`
	* `/themes`
	* `/uploads`

## What "Theme Project" Plugin Does

This plugin simply registers a new theme directory with WordPress located at `/wp-content/{name}-project/dist`, allowing for the "active" theme of the local WordPress site to be `/wp-content/{name}-project/dist/{name}`.

## Requirements

In order for this plugin to determine the template parameter, the development URL must be structured a certain way:

 	http://{localhost URL}/themes/{name}/

When the local development URL is structured in this way, the plugin can automatically pick up the `{name}` attribute needed for the project structure.

## My Local Dev Environment

As long as your local development URL is setup as discussed above, you're good. --

But if you're curious, I use [Laravel Valet](https://laravel.com/docs/valet). I run the `valet park` command in the `/Sites` directory on my Mac to serve all development sites. When doing this with Valet, it creates simple environment where each directory within is served as `{directory-name}.dev`.

So for example, I have a separate local site for each theme project. They're all located here on my Mac:

* `/Users/{user}/Sites`
	* `/wordpress`
		* `/themes`
			* `theme-1`
			* `theme-2`
			* `theme-3`
			* `theme-4`
			* etc ...

And so I can access each site in my browser at the URLs:

	* `http://wordpress.dev/themes/theme-1`
	* `http://wordpress.dev/themes/theme-2`
	* `http://wordpress.dev/themes/theme-3`
	* `http://wordpress.dev/themes/theme-4`
	* etc ...
