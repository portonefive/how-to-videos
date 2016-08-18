# How To Videos

Display an admin page in the backend of LaraPress, with a grid of videos 
from a Wistia Project.

## Installation

`composer require portonefive/how-to-videos`

## Publishing Configuration Files

In your console you'll run the following command to publish the config,
view and css files;

`php artisan vendor:publish`

## Setting Required Config Values

In order to access the Wistia account, you'll to define the 
`WISTIA_API_KEY` in your config or env file.

This can be found under wistia.com > Account > Advanced > API Access.
 
1. Click _New Token_
2. Input the project name for _Token nickname_
3. Check _Read all data_
4. Click _Create Token_

Next, you'll to define the `WISITIA_PROJECT_ID`, which is the project we 
want to pull videos from. This can be found by navigating to the project 
you want and copying the id from the url.

For this url, `https://portonefive.wistia.com/projects/5jihj33txi` we
want `5jihj33txi`. 
