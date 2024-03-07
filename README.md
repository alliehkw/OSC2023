Currently using Foundation 6.5.3.

OSC2023 is built using Foundation (get.foundation) and JointsWP

## Requirements

OSC2023 theme requires [Node.js](https://nodejs.org) v6.9.x or newer. This doesn't mean you need to understand Node (or even Gulp) - it's just the steps we need to take to make sure all of our development tools are installed.

### Watching for Changes

```bash
$ gulp watch
```

- Watches for changes in the `assets/styles/scss` directory. When a change is made the SCSS files are compiled, concatenated with Foundation files and saved to the `/styles` directory. Sourcemaps will be created.
- Watches for changes in the `assets/scripts/js` directory. When a change is made the JS files are compiled, concatenated with Foundation JS files and saved to the `/scripts` directory. Sourcemaps will be created.
- Watches for changes in the `assets/images` directory. When a change is made the image files are optimized and saved over the original image.

### Watching for Changes with Browsersync

```bash
$ gulp bsWatchTask
```

This will watch the same files as `npm run watch`, but utilizes browsersync for live reloading and style injection. Be sure to update the `URL` variable in the `gulpfile.js` to your local install URL.

## Compile and Minify All Theme Assets

```bash
$ gulp buildit
```

Compiles and minifies all scripts and styles.

## File Structure - "Where to Put Stuff"

### Custom Styles

- `style.css` - this file is never actually loaded, however, this is where you set your theme name and is required by WordPress
- `assets/styles/scss/style.scss` - import all of your styles here. If you create an additional SCSS file, be sure to import it here.
- `assets/styles/scss/_main.scss` - place all of your custom styles here.
- `assets/styles/scss/_settings.scss` - adjust Foundation style settings here.
- `assets/styles/scss/login.scss` - place custom login styles here. This will generate it's own stylesheet.

### Custom Scripts

- `assets/scripts/js/` - place your custom scripts here. Each .JS file will be compiled and concatenated when the build process is ran.

## Packaging Theme Files for Deployment

This script removes files that aren't necessary for the uploaded theme, and zips it for deployment. This script must be run from the /themes/ folder.

```bash
rm OSC2023.zip
mv OSC2023 _OSC2023
cp -R _OSC2023 OSC2023
cd OSC2023
rm .gitignore README.md package.json package-lock.json gulpfile.js
rm -rf .git node_modules
cd ../
zip -r -X OSC2023.zip OSC2023
rm -rf OSC2023
mv _OSC2023 OSC2023
```
