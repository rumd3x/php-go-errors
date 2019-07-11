<?php
namespace Rumd3x\Errors;

/**
 * Error implementation class
 */
class Error implements ErrorInterface
{
    /**
     * The description of the error
     *
     * @var string
     */
    private $text;

    /**
     * Returns a new Error
     *
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * Returns an error that formats as the given text.
     *
     * @param string $text
     * @return Error
     */
    public static function new(string $text)
    {
        return new static($text);
    }

    /**
     * Use the package's formatting features to create descriptive error messages.
     *
     * @param string $text
     * @param string ...$parameters
     * @return Error
     */
    public static function newf(string $text, string ...$parameters)
    {
        return new static(vsprintf($text, $parameters));
    }

    /**
     * Returns the error formatted as a string
     *
     * @return void
     */
    public function error()
    {
        return (string) $this;
    }

    public function __toString()
    {
        return $this->text;
    }
}
