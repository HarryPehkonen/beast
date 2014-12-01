# Beast

A templating tool written in PHP.  The templating language is also PHP.

Inspiration and original code from [http://www.bigsmoke.us/php-templates/functions](http://www.bigsmoke.us/php-templates/functions).

I can't remember how I came up with 'beast.'  Maybe something about a simple
templating language.  Probably a lot to do with how tiny it actually is.

# Usage

## Install

    curl --location -O https://github.com/HarryPehkonen/beast

## Example

    $beast = new Beast('./');
    $content = $beast->render('template.php', $data);
    echo $content;

Please also see example.php and template.php in this repository.
