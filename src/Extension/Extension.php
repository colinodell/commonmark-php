<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (http://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension;

use League\CommonMark\Block\Parser\BlockParserInterface;
use League\CommonMark\Block\Renderer\BlockRendererInterface;
use League\CommonMark\ElementVisitorInterface;
use League\CommonMark\Inline\Parser\InlineParserInterface;
use League\CommonMark\Inline\Processor\InlineProcessorInterface;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;

abstract class Extension implements ExtensionInterface, ElementVisitorExtensionInterface
{
    /**
     * @return BlockParserInterface[]
     */
    public function getBlockParsers()
    {
        return [];
    }

    /**
     * @return BlockRendererInterface[]
     */
    public function getBlockRenderers()
    {
        return [];
    }

    /**
     * @return InlineParserInterface[]
     */
    public function getInlineParsers()
    {
        return [];
    }

    /**
     * @return InlineProcessorInterface[]
     */
    public function getInlineProcessors()
    {
        return [];
    }

    /**
     * @return InlineRendererInterface[]
     */
    public function getInlineRenderers()
    {
        return [];
    }

    /**
     * @return ElementVisitorInterface[]
     */
    public function getElementVisitors()
    {
        return [];
    }
}
