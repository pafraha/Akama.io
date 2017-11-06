<?php
namespace Framework\Twig;

class TextExtension extends \Twig_Extension
{
    public function getFilters(): array
    {
        return [
            new \Twig_SimpleFilter('excerpt', [$this, 'excerpt']),
            new \Twig_SimpleFilter('excerpt20', [$this, 'excerpt20'])
        ];
    }

    public function excerpt(string $content, int $maxLength = 120): string
    {
        if (mb_strlen($content) > $maxLength) {
            $excerpt = mb_substr($content, 0, $maxLength);
            //$lastSpace = mb_strrpos($excerpt, ' ');

            return mb_substr($excerpt, 0, $maxLength) . '...';
        }

        return $content;
    }

    public function excerpt20(string $content, int $maxLength = 25): string
    {
        if (mb_strlen($content) > $maxLength) {
            $excerpt = mb_substr($content, 0, $maxLength);
            //$lastSpace = mb_strrpos($excerpt, ' ');

            return mb_substr($excerpt, 0, $maxLength) . '...';
        }

        return $content;
    }
}
