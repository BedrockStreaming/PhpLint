<?php

namespace M6Web\PhpLint\Command;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Process\Process;

/**
 * Class Linter
 */
class Linter
{
    /** @var array */
    protected $errors = [];

    /**
     * @param array $paths
     *
     * @return bool
     */
    public function lint($paths)
    {
        $files = [];
        foreach ($paths as $path) {
            $finder = new Finder();
            $finder = $finder->in($path)->files()->name('*.php');
            foreach ($finder as $f) {
                $files[] = $f->getPathname();
            }
        }
        $valid = true;
        foreach ($files as $file) {
            $process = new Process(sprintf('%s -l %s', PHP_BINARY, $file));
            $process->run();
            $success = $process->isSuccessful();
            if (!$success) {
                $this->addError($process->getErrorOutput());
            }
            $valid &= $success;

        }

        return $valid;
    }

    /**
     * @param string $error
     */
    protected function addError($error)
    {
        $this->errors[] = $error;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return string
     */
    public function getDisplayErrors()
    {
        return implode('', $this->getErrors());
    }
}
