<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject;

use function sprintf;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class CannotUseAddMethodsException extends \PHPUnit\Framework\Exception implements Exception
{
    public function __construct(string $type, string $methodName)
    {
        parent::__construct(
            sprintf(
<<<<<<< HEAD
                'Trying to set mock method "%s" with addMethods(), but it exists in class "%s". Use onlyMethods() for methods that exist in the class',
=======
                'Trying to configure method "%s" with addMethods(), but it exists in class "%s". Use onlyMethods() for methods that exist in the class',
>>>>>>> f95fa2af1207193365527f782599d26e4c6a72ba
                $methodName,
                $type
            )
        );
    }
}
