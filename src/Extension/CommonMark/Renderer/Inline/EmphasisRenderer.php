<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\CommonMark\Renderer\Inline;

use League\CommonMark\Extension\CommonMark\Node\Inline\Emphasis;
use League\CommonMark\Node\Inline\AbstractInline;
use League\CommonMark\Renderer\ElementRendererInterface;
use League\CommonMark\Renderer\Inline\InlineRendererInterface;
use League\CommonMark\Util\HtmlElement;

final class EmphasisRenderer implements InlineRendererInterface
{
    /**
     * @param Emphasis                 $inline
     * @param ElementRendererInterface $htmlRenderer
     *
     * @return HtmlElement
     */
    public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer)
    {
        if (!($inline instanceof Emphasis)) {
            throw new \InvalidArgumentException('Incompatible inline type: ' . \get_class($inline));
        }

        $attrs = $inline->getData('attributes', []);

        return new HtmlElement('em', $attrs, $htmlRenderer->renderInlines($inline->children()));
    }
}