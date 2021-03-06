# "Theme Project" WordPress Plugin

This is a WordPress plugin for my local development to help support a more automated workflow for theme development. This plugin is used in local WordPress theme projects where I use Node.js and Gulp, and is activated on each theme's WordPress development site.

Below, I'll explain how this plugin fits into my overall theme development workflow, but really this is just a simple plugin showing the usefulness of WordPress's [register_theme_directory()](https://codex.wordpress.org/Function_Reference/register_theme_directory), beyond what it was probably originally intended for. Feel free to take this simple plugin and modify it for your own development workflows.

## Project Structure

Before discussing what this little plugin actually does, let's first go over how my local theme development projects are structured.

We all know the basic structure of WordPress:

* `/wp-content`
	* `/plugins`
	* `/themes`
	* `/uploads`

Well, when developing a theme locally, my current project structure extends that by adding a `{name}-project` to the `/wp-content` directory of WordPress to hold my theme project:

* `/wp-content`
	* `/{name}-project`
		* `/dist`
			* `/{name}` &mdash; Compiled theme that's currently "active" with WordPress.
			* `name-x.x.x.zip` &mdash; Final published installable WordPress theme.
		* `/lib`
		* `/src`
		* `gulpfile.js`
		* `package.json`
	* `/plugins`
	* `/themes`
	* `/uploads`

## What "Theme Project" Plugin Does

This plugin simply registers a new theme directory with WordPress located at `/wp-content/{name}-project/dist`, allowing for the "active" theme of the local WordPress site to be `/wp-content/{name}-project/dist/{name}`.

### Requirements

In order for this plugin to determine the template parameter, the development URL must be structured a certain way:

 	http://{localhost URL}/themes/{name}/

When the local development URL is structured in this way, the plugin can automatically pick up the `{name}` attribute needed for the project structure. But of course, you could easily modify this plugin to support a different system. My main goal here was to be able to copy the exact same plugin to each development site, without having to configure anything specific to each project.

## My Local Dev Environment

As long as your local development URL is setup as discussed above, you're good. &mdash;

But if you're curious, I use [Laravel Valet](https://laravel.com/docs/valet). I run the `valet park` command in the `/Sites` directory on my Mac to serve all development sites. When doing this, Valet creates a simple environment where each directory within is served as `{directory-name}.dev`.

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
