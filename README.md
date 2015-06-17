# uploadit
Transloadit plugin for CakePHP

This plugin allow us delegate upload of files to the cloud service Transloadit. It provides view elements, component and a little js file which enable our app to upload files to Transloadit and proccess the response, in order to save a reference to external stored files.

You will need a Transloadit account and minimal knowldege about how it works. [Transloadit Docs](https://transloadit.com/docs/)

Installation
============

To install the plugin, place the files in a directory labelled "Uploadit/" in your "app/Plugin/" directory.

Then, include the following line in your `app/Config/bootstrap.php` to load the plugin in your application.

```
CakePlugin::load('Uploadit');
```

Git Submodule
-------------

If you're using git for version control, you may want to add the **Uploadit** plugin as a submodule on your repository. To do so, run the following command from the base of your repository:

```
git submodule add git@github.com:wnasich/uploadit.git app/Plugin/Uploadit
```

After doing so, you will see the submodule in your changes pending, plus the file ```.gitmodules```. Simply commit and push to your repository.

To initialize the submodule(s) run the following command:

```
git submodule update --init --recursive
```

To retrieve the latest updates to the plugin, assuming you're using the ```master``` branch, go to ```app/Plugin/Uploadit``` and run the following command:

```
git pull origin master
```

If you're using another branch, just change "master" for the branch you are currently using.

If any updates are added, go back to the base of your own repository, commit and push your changes. This will update your repository to point to the latest updates to the plugin.

Composer
--------

The plugin also provides a "composer.json" file, to easily use the plugin through the Composer dependency manager.
