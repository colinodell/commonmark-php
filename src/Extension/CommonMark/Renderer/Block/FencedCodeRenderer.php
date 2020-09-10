<?php

declare(strict_types=1);

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

namespace League\CommonMark\Extension\CommonMark\Renderer\Block;

use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Util\Xml;

final class FencedCodeRenderer implements NodeRendererInterface
{
    /**
     * @param FencedCode $node
     *
     * {@inheritdoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        if (! ($node instanceof FencedCode)) {
            throw new \InvalidArgumentException('Incompatible node type: ' . \get_class($node));
        }

        $attrs = $node->getData('attributes', []);

        $infoWords = $node->getInfoWords();
        if (\count($infoWords) !== 0 && $infoWords[0] !== '') {
            $attrs['class']  = isset($attrs['class']) ? $attrs['class'] . ' ' : '';
            $attrs['class'] .= 'language-' . $infoWords[0];
        }

        return new HtmlElement(
            'pre',
            [],
            new HtmlElement('code', $attrs, Xml::escape($node->getLiteral()))
        );
    }
}
