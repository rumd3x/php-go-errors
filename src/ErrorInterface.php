<?php
namespace Rumd3x\Errors;

/**
 * The error interface is the conventional interface for representing an error condition, with the null value representing no error.
 */
interface ErrorInterface
{
    /**
     * Returns a new Error
     *
     * @param string $text
     */
    public function __construct(string $text);

    /**
     * Returns the error formatted as a string
     *
     * @param string $text
     * @return string
     */
    public function error();
}
