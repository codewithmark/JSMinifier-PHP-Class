<?php

class JSMinifier
{
    private string $sourceFolder;
    private string $outputFile;

    public function __construct(string $sourceFolder, string $outputFile)
    {
        if (!is_dir($sourceFolder)) {
            throw new InvalidArgumentException("Invalid source folder: $sourceFolder");
        }

        $this->sourceFolder = realpath($sourceFolder);
        $this->outputFile = $outputFile;
    }

    public function compileIntoOneFile(): void
    {
        $jsFiles = $this->getAllJSFiles($this->sourceFolder);
        $combined = '';

        foreach ($jsFiles as $file) {
            $originalContent = file_get_contents($file);
            $minified = $this->minifyJS($originalContent);
            $combined .= $minified . "\n";
        }

        $this->ensureDirectoryExists(dirname($this->outputFile));
        file_put_contents($this->outputFile, $combined);
    }

    private function getAllJSFiles(string $rootDir): array
    {
        $files = [];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootDir, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $fileInfo) {
            if (
                $fileInfo->isFile() &&
                strtolower($fileInfo->getExtension()) === 'js' &&
                !preg_match('/\.min\.js$/i', $fileInfo->getFilename()) // skip pre-minified files
            ) {
                $files[] = $fileInfo->getPathname();
            }
        }

        // Optional: sort alphabetically by path
        sort($files);
        return $files;
    }

    private function minifyJS(string $js): string
    {
        // Remove multiline comments
        $js = preg_replace('#/\*.*?\*/#s', '', $js);
        // Remove single-line comments
        $js = preg_replace('#//.*$#m', '', $js);
        // Collapse whitespace
        $js = preg_replace('/\s+/', ' ', $js);
        // Remove unnecessary space around common punctuation
        $js = preg_replace('#\s*([{};,:=+\-*()<>])\s*#', '$1', $js);
        return trim($js);
    }

    private function ensureDirectoryExists(string $dir): void
    {
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }
}
?>
