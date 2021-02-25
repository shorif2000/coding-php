# City Pantry - PHP Coding Test

City Pantry is building a simple CLI application to manage its database of vendors. Attached is our first pass
on the implementation. It contains the basic application infrastructure, a search controller and a series of tests cases
that specify the initial intended behaviour.

## Your Task

1. Firstly, you should complete the implementation of the `SearchController::searchVendors` to make the tests pass. This
should help you get familiar with the codebase and prepare for the next job.
2. Adapt the application to accept a new required headcount parameter. The behaviour of the search should change to only
include in the results vendors that have their max headcount attribute higher or equal to the provided headcount value.
So, for example, running the application with `search 2022 12:30 13` as input will include vendors that have at least
13 as their max headcount value.
3. Stretch goal is to add support for fulltext search. The search term should be added as a fourth optional parameter
and the application should use the term to search vendors with menu items that match the given term. For an input with
`search 2022 12:30 13 "pizza"`, the results should show only vendors that have at least one item matching the term "pizza", for
example "Pizza Napoletana", "Neapolitan Pizza", or "Best pizza in the world". 

There are a couple of rules to follow. Please read them carefully as you will be assessed against them:
- do not change the `App` class
- all new classes must be unit-tested to a production standard (i.e. make sure you cover all interesting cases)
- all new behaviour should be tested at least to a level that describes the desired behaviour
- apply principles of [Domain-driven design](https://en.wikipedia.org/wiki/Domain-driven_design), for example consider carefully which layer input validation belongs to, how to name methods in entities, etc.
- adhere to [SOLID](https://en.wikipedia.org/wiki/SOLID) principles, specifically the _single-responsibility_ and _open/close_ principles where appropriate
- follow principles of _clean code_ including _DRY_, _KISS_, _YAGNI_, composition over inheritance, code readability, function length, etc.

## Submitting the solution

Submit your solution compressed in a zip file that includes the source code and a README with your assumptions and any
relevant instructions. Please avoid including your name or any references to your profile. Name the zip file
**"coding-test-solution-php.zip"** and either send it to us via email or a file sharing solution of your choice.

## Setting things up locally

### Installation

Our application uses [Composer](https://getcomposer.org/) to install unit testing dependencies and configure PSR-4 autoloading.
If you aren't familiar with Composer, please refer to the linked website for instructions of how to get started. Alternatively,
if you have Docker installed, you may use the provided Docker image (see **Using Docker image** below) that will run the application
without having to set up the local environment.

If you're not using Docker you'll need to use a modern version of PHP, we use 7.4.

### Running the application

```
php src/index.php search 2022 12:30
```

### Running the tests

```
./vendor/bin/phpunit tests
```

## Using Docker image

You may use the `citypantry/php-coding-test` docker image to run the application environment without PHP installed.
The image contains PHP cli and pre-installed `vendor/` folder with php-unit.

### Running the application

```
docker run \
  --rm \
  -v $(pwd)/src:/srv/src \
  -w /srv \
  citypantry/php-coding-test php src/index.php search 2020-12-24 18:00
```

### Running the tests

```
docker run \
  --rm \
  -v $(pwd)/src:/srv/src \
  -v $(pwd)/tests:/srv/tests \
  -w /srv \
  citypantry/php-coding-test ./vendor/bin/phpunit tests
```
