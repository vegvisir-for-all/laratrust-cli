# Laratrust CLI

[![Latest Stable Version](https://poser.pugx.org/vegvisir/laratrust-cli/v/stable)](https://packagist.org/packages/santigarcor/laratrust)
[![Total Downloads](https://poser.pugx.org/vegvisir/laratrust-cli/downloads)](https://packagist.org/packages/santigarcor/laratrust)
[![StyleCI](https://styleci.io/repos/161757913/shield)](https://styleci.io/repos/161757913)
[![License](https://poser.pugx.org/vegvisir/laratrust-cli/license)](https://packagist.org/packages/santigarcor/laratrust)

Provides a command line interface for [Laratrust](https://github.com/santigarcor/laratrust). Inspired by [entrust-cli](https://github.com/LinearSoft/entrust-cli).

## Requirements

You must have Laratrust installed, configured, and working, with database migrated and whatsoever. A good documentation on how to start with Laratrust can be found at [https://laratrust.readthedocs.io/en/4.0/index.html](https://laratrust.readthedocs.io/en/4.0/index.html).

Good news is that Laratrust CLI is compatible also with Team functionality of the Laratrust package.

## Installation

```bash
$ composer require vegvisir/laratrust-cli
```

### 4. Add service provider (Laravel <5.5)

If you're using Laravel up to 5.4.*, you need to add service provider in the `providers` section of `config/app.php`:

```php
Vegvisir\LaratrustCli\LaratrustCliServiceProvider::class,
```

### 5. Publish config file

```bash
$ artisan vendor:publish
```

## Usage

Laratrust CLI add the folowing artisan commands:

```bash
$ artisan list
...
 laratrust-cli
  laratrust-cli:permission:attach  Attach permision to Laratrust role
  laratrust-cli:permission:create  Create a Laratrust permission
  laratrust-cli:permission:delete  Delete a Laratrust permission
  laratrust-cli:permission:detach  Detach permision from Laratrust role
  laratrust-cli:permission:list    Lists all Laratrust permissions
  laratrust-cli:role:attach        Add a Laratrust role to a user
  laratrust-cli:role:create        Create a Laratrust role
  laratrust-cli:role:delete        Delete a Laratrust role
  laratrust-cli:role:detach        Detach a Laratrust role from a user
  laratrust-cli:role:list          Lists all Laratrust roles
  laratrust-cli:team:attach        Add a Laratrust role to a user within a team
  laratrust-cli:team:create        Create a Laratrust team
  laratrust-cli:team:delete        Delete a Laratrust team
  laratrust-cli:team:detach        Detach a Laratrust role from a user within a team
  laratrust-cli:team:list          Lists all Laratrust teams
...
```
| Command             | Action                                    | Parameters                        | Example                                            |
|:--------------------|:------------------------------------------|:----------------------------------|:---------------------------------------------------|
| `*:create`          | Creates a role/permission/team            | name [display name] [description] | `laratrust-cli:role:create myrole "My Role"`       |
| `*:delete`          | Deletes a role/permission/team            | name                              | `laratrust-cli:permission:delete perm1`            |
| `*:list`            | Lists all roles/permissions/teams         | _none_                            | `laratrust-cli:role:list`                          |
| `permission:attach` | Attaches a permission to a role           | permission_name role_name         | `laratrust-cli:permission:attach perm1 myrole`     |
| `permission:detach` | Detaches a permission from a role         | permission_name role_name         | `laratrust-cli:permission:detach perm1 myrole`     |
| `role:attach`       | Attaches a role to a user                 | role_name email                   | `laratrust-cli:role:attach myrole user2@gmail.com` |
| `role:detach`       | Detaches a role from a user               | role_name email                   | `laratrust-cli:role:detach myrole user2`           |
| `team:create`       | Creates a team                            | name                              | `laratrust-cli:team:create myteam`                 |
| `team:delete`       | Deleted a team                            | name                              | `laratrust-cli:team:delete myteam`                 |

### Team functionality

All `laratrust-cli:team:*` commands will not run unless team functionality is turned on in the Laratrust configuration. Please refer to [Laratrust documentation](https://laratrust.readthedocs.io/en/4.0/usage/concepts.html#teams) to discover more about team functionality.

### User identity

Unlike `entrust-cli`, Laratrust CLI looks up for users **only** by e-mail address. However, we intend to extend the functionality of user identification to custom attributes in the future (like in `entrust-cli`).

### User model (Eloquent/MongoDB)

Since we develop this package within an application that utilizes Laratrust with [jenssegers/laravel-mongodb](https://github.com/jenssegers/laravel-mongodb), there's a possibility to use it with `jenssegers/laravel-mongodb` ORM.

In the `config/laratrust-cli.php` you need to set `user_model` as `\Vegvisir\LaratrustCli\Models\User\UserJenssegersMongodb`:

```php
...
'user_model' => '\Vegvisir\LaratrustCli\Models\User\UserJenssegersMongodb'
...
```

Don't forget to clear your config cache after changing of the configuration:

```bash
$ artisan config:clear
```

## About

### Vegvisir

We're a small development team from Warsaw, Poland, looking to work remotely on your projects! 

### Bug reporting

Please submit all bugs and issues via [GitHub](https://github.com/vegvisir-for-all/laratrust-cli/issues). All feedback will be more than welcome!

### Licence

Laratrust CLI is licensed under the GPLv3 License. See the `LICENSE` file for details.

