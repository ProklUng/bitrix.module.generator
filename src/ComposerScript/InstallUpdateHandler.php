<?php

namespace ProklUng\ModuleGenerator\ComposerScript;

use Composer\Script\Event;
use InvalidArgumentException;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class InstallUpdateHandler
 * @package Local\ComposerScript
 */
class InstallUpdateHandler
{
    /**
     * @param Event $event
     *
     * @throws InvalidArgumentException
     */
    public static function doInstall(Event $event): void
    {
        $io = $event->getIO();

        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');

        $projectRoot = realpath($vendorDir. '/../');

        if (!is_dir($projectRoot) || !is_readable($projectRoot) || !is_writable($projectRoot)) {
            $io->write(
                \sprintf(
                    '<error>Directory "%s" is not writable. Aborting</error>',
                    $projectRoot
                )
            );

            return;
        }

        $filesystem = new Filesystem();
        try {
            $filesystem->mirror(
                __DIR__.'/bin/',
                $projectRoot . '/bin/'
            );
        } catch (IOException $e) {
            $io->write('<error>Error copy command for generate modules : ' . $e->getMessage() . '</error>');
        }

        $io->write('Console command for generate modules successfully installed.');
    }
}