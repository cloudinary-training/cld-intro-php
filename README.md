# Cloudinary Intro using PHP (v2)

The Cloudinary PHP SDK is class based.  This means that your IDE can provide help learning the language.  With code completion, you can discover classes, methods, constants, and enumerated types.
Here are some suggestions for IDE's that can help with PHP code completion and auto import:

* PHP Storm
* Netbeans
* Aptana Studio
* Eclipse
* Visual Studio with Extensions PHP Namespace Resolver and Intelephense
* ZendStudio

You can also browse the [Namespace Reference](https://cloudinary.com/documentation/sdks/php/index) to better understand the SDK's structure.

## Actions and Qualifiers

The PHP SDK also uses a Fluent Interface.  This is a design pattern in which each method returns the context that it received from the method that called it.  This is also known as **function chaining**.  The Fluent Interface is employed to create a Domain Specific Language.

You will experience using the chained methods as you build Transformations out of Action Groups.  Action Groups are methods that call Actions.  Actions may have required arguments that are termed **required Qualifiers**.  Actions may also have optional Qualifiers.  

In the example shown below, the `adjust` Action Group is calling the `Adjust::replaceColor` method with a Qualifier that accepts a constant color value, which in this case is GREEN.  The replaceColor method has an optional Qualifier named `tolerance` that accepts an integer to specify the span of colors that should be replaced.  Read more about the [replaceColor transformation](https://cloudinary.com/documentation/transformation_reference#e_replace_color) in documentation.

The entire set of Action Groups is what makes up a single Transformation.

![Actions and Qualifiers](./assets/actions-qualifiers.png
)



## Topics
We will be covering these topics in this course.

* Upload
* Presets
* Auto-upload-Fetch
* Manage
* Upload For Transformations
* Optimization Transformations
* Aesthetic Transformations
* Named Transformations
* Singleton

## Setup
We'll be running PHP as command line script in this course.  The code can be moved into a PHP web page.

### Install PHP

#### Mac
Mac comes with PHP installed.
To install the latest version of PHP use HomeBrew.  You can [install Homebrew](https://brew.sh/) 

```bash
brew install php
php --version
```
#### Windows

https://windows.php.net/

### Install Composer

```bash
curl -s https://getcomposer.org/installer | php sudo mv ./composer.phar /usr/local/bin/composer composer --version
```

### Composer

Install Cloudinary via composer

```bash
composer require "cloudinary/cloudinary_php"
 ```

This will create a `composer.json` and `composer.lock`. 

```js
{
    "require": {
        "cloudinary/cloudinary_php": "^2.0"
    }
}
```

## Config

There are 2 ways you get an instance of the Cloudinary object, and we'll refer to them as **Constructor** and **Singleton**.  The "Singleton" provides a single instance of a Cloudinary object configured for a single cloud.  It behaves similar to our legacy PHP SDK and is provided to help with migration and the transition from Version 1 to Version 2.  The **Constructor**  allows you to create multiple Cloudinary objects that can reference different clouds.  If you are writing new code you will use the "Constructor".  The scripts used in this training will take advantage of Version 2 functionality by using the **Constructor**. We cover **Singleton** functionality in the Cloudinary PHP SDK Version 2 Migration course.

For both methods of instantiation, you can export your Cloudinary URL, which contains your CLOUD_NAME, API_KEY, and API_SECRET to provide your credentials. You can also use the Cloudinary Config function to pass in the values in the CLOUDINARY_URL.  


You can also provide the credentials in the code.  For this training, we'll export the credentials and in code we'll call `config` and output the cloud we're using for verification.

### Credentials
There are multiple ways that you can supply your Cloudinary credentials. In this course, we'll place the Cloudinary URL in a .env file with an export command.  The .env file is gitignore'd so there is no chance of accidentally checking it in.  With the .env file setup, you can load the current session with the Cloudinary URL from the root folder of the project.

```bash
. ./.env
```

### Constructor 

Export Cloudinary URL

```bash
export CLOUDINARY_URL=cloudinary://API_KEY:API_SECRET@CLOUD_NAME
```

Instantiate Cloudinary

```php
use Cloudinary\Cloudinary;
$cloudinary = new Cloudinary();
echo $cloudinary->configuration->account->cloudName;
```

**Alternative:** Credentials in Code
If you choose not to export your credentials in your shell you can use one of the following way to read in the credentials in code.

Use this for new PHP SDK2 code to create an instance of the Cloudinary object:

```php
use Cloudinary\Cloudinary;
$cloudinary = new Cloudinary('cloudinary://API_KEY:API_SECRET@CLOUD_NAME');
```

or  

```php
use Cloudinary\Cloudinary;
$cloudinary = new Cloudinary(
    [
        'account' => [
            'cloud_name' => 'CLOUD_NAME',
            'key'        => 'API_KEY',
            'secret'     => 'API_SECRET',
        ],
    ]
);
```

```php
$cloudinary = new Cloudinary(
  [
      'cloud' => [
        'cloud_name' => 'CLOUD_NAME', 
        'api_key' => 'API_KEY', 
        'api_secret' => 'API_SECRET'
      ],
      'url' => [
        'secure' => true
      ]
  ]
);
```


## Exercises
You will see that the images and video to be used in the exercises are in the `assets` directory.

We will be using `echo` or `print_r` to display the return value or array. We'll use JSON output for SDK function results.


## Resources

[PHP SDK Documentation](https://cloudinary.com/documentation/php2_integration)
[PHP SDK Code Reference](https://cloudinary.com/documentation/sdks/php/Cloudinary/Cloudinary.html
)