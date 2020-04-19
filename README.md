* [Installation](#installation)
    + [Requirements](#requirements)
    + [Composer](#composer)
    + [Unit Testing](#unit-testing)
* [Plugin Usage](#plugin-usage)
* [License](#license)

## Installation
Download the repository to your computer in ZIP form, then log in to your WP admin area and go to Plugins > Add New to upload the ZIP file and activate it.

### Requirements

This plugin requires PHP 7 or higher.

### Composer

This project is compliant with [Inpsyde coding style](https://github.com/inpsyde/php-coding-standards) & uses PHPUnit 9 for unit testing. In order to have these resources properly included run the command below in the root directory of this plugin.

```
$ composer update
```

### Unit testing
After running the composer command above refer to [this](https://www.jetbrains.com/help/phpstorm/using-phpunit-framework.html) documentation for unit testing using PHPUnit integration with PhpStorm. My phpunit.xml file is located in the root directory of this plugin. The test class is located in the "tests" directory of this plugin.

## Plugin Usage
When installed, this plugin makes available a custom endpoint on the WordPress site. This endpoint can be accessed using the query string of "?inpsyde-endpoint". This endpoint hooks into the "the_content" filter of WordPress and loads a html table using the REST API of https://jsonplaceholder.typicode.com/. The table will start with three initial columns. Clicking on either one of the details in these columns will load the rest of that specific user’s details individually.

# IDE integration

## PhpStorm

After having installed the package as explained above in the _"Composer"_ section,
open PhpStorm settings, and navigate to

`Language & Frameworks` ->  `PHP` -> `Quality Tools` -> `PHP_CodeSniffer`

Choose _"Local"_ in the _"Configuration"_ dropdown.
Click the _"..."_ button next to the dropdown, it will show a dialog
where you need to specify the path for the Code Sniffer executable.
Open the file selection dialog, navigate to `vendor/bin/` in your project and select `phpcs` (`phpcs.bat` on Windows). 
Click the _"Validate"_ button next to the path input field, if everything is fine
a success message will be shown at the bottom of the window.

Navigate to

`Editor` ->  `Inspections`

Type `codesniffer` in the search field before the list of inspections, select `PHP` -> `Quality Tools` -> `PHP_CodeSniffer validation` and enable it using the checkbox in the list, press _"Apply"_.

Select  _"PHP_CodeSniffer validation"_, press the refresh icon next to the _"Coding standard"_ dropdown on the right and choose `Inpsyde`.

If you do not see `Inpsyde` here, you may need to specify `phpcs.xml` file by selecting _"Custom"_ as standard and using the _"..."_ button next to the dropdown.

Now PhpStorm integration is complete, and errors in the code style will be shown in the IDE editor
allowing to detect them without running any commands at all.

## License

See [LICENSE](LICENSE) (GNU General Public License).
