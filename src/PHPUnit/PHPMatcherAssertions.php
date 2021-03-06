<?php

declare(strict_types=1);

namespace Coduo\PHPMatcher\PHPUnit;

use Coduo\PHPMatcher\Backtrace;
use PHPUnit\Framework\TestCase;

trait PHPMatcherAssertions
{
    /**
     * @var null|Backtrace
     */
    protected $backtrace;

    protected function setBacktrace(Backtrace $backtrace) : void
    {
        $this->backtrace = $backtrace;
    }

    protected function assertMatchesPattern($pattern, $value, string $message = '') : void
    {
        TestCase::assertThat($value, self::matchesPattern($pattern, $this->backtrace), $message);
    }

    protected static function matchesPattern($pattern, ?Backtrace $backtrace = null) : PHPMatcherConstraint
    {
        return new PHPMatcherConstraint($pattern, $backtrace);
    }
}
