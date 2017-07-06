# DateTime Constraints
[![Travis](https://img.shields.io/travis/clearvox/constraints-date-php.svg?style=flat-square)]()

DateTime Constraints Library. Use this to add constraints to a validator and verify DateTime objects pass those constraints. Useful for Event or Calendar libraries.

## Install
Via Composer 
```bash
$ composer require zogot/constraints-date
```

## Usage

```php
<?php
require 'vendor/autoload.php';

use Zogo\DateConstraints\Constraints\Day\DayConstraintInterface;
use Zogo\DateConstraints\Constraints\Day\SpecificDayConstraint;
use Zogo\DateConstraints\Constraints\Month\MonthConstraintInterface;
use Zogo\DateConstraints\Constraints\Month\SpecificMonthConstraint;
use Zogo\DateConstraints\Validators\AndValidator;

// Build a validator instance
$validator = new AndValidator();

// Add constraints to that validator
$validator
    ->addConstraint(new SpecificDayConstraint(DayConstraintInterface::TUESDAY))
    ->addConstraint(new SpecificMonthConstraint(MonthConstraintInterface::FEBRUARY))
    
// Attempt a datetime
$validator->validFor(new DateTime('Tuesday, 16 Feb 2016 13:00:00 GMT')) // true
$validator->validFor(new DateTime('Monday, 15 Feb 2016 13:00:00 GMT')) // false

```

Another example with a range of time, useful for workday validation

```php
<?php
// Build the validator instance
$validator = new AndValidator();

// Add Constraints to that validator
$validator
    ->addConstraint(new BetweenTimeConstraint(new DateTime('09:00:00'), new DateTime('17:00:00'))
    
// Attempt a datetime
$validator->validFor(new DateTime('Tuesday, 16 Feb 2016 13:00:00 GMT')) // true
$validator->validFor(new DateTime('Tuesday, 16 Feb 2016 18:00:00 GMT')) // false
```

## Tests

We have a full [PHPUnit](https://phpunit.de) test suite. To run the tests, run the following command from the project folder.
```bash
$ composer test
```

## Contributors

Contributions are welcome and will be fully credited.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
