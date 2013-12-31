<?php namespace Awjudd\Asset\Processors;

use CoffeeScript\Compiler;

class CoffeeScriptProcessor extends BaseProcessor
{
    /**
     * An array containing all of the file extensions that this processor needs
     * to use.
     * 
     * @var array
     */
    public static $extensions = ['coffee'];

    /**
     * The type of processor this instance is.
     * 
     * @return string
     */
    public static function getType()
    {
        return 'Coffee Script Processor';
    }

    /**
     * The description of this processor.
     * 
     * @var string
     */
    public static function getDescription()
    {
        return 'Used in order to process any of the provided Coffee Script files.';
    }

    /**
     * Determines the classification of an asset.
     * 
     * @return string
     */
    public static function getAssetType()
    {
        return 'js';
    }

    /**
     * Used in order to process the input file.  After processing this input
     * file, it will return a new file name for the rest of the process to use
     * if needed.
     * 
     * @param string $filename
     * @return string
     */
    public function process($filename)
    {
        if(!$this->shouldProcess($filename))
        {
            return $this->getFinalName($filename);
        }
        
        return $this->write(Compiler::compile(file_get_contents($filename)), $filename);
    }
}